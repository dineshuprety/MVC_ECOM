<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\UploadFile;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Classes\Mail;
use App\Models\User;


class AuthController extends BaseController
{
    public function __construct()
    {
        if(isAuthenticated()){
            Redirect::to('/');
        }
    }
    
    public function showRegisterForm()
    {
        return view('auth/register');
    }
    
    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function showWholesalerForm()
    {
        return view('auth/wholesaler');
    }
    
    public function register()
    {
            if(Request::has('post')){
            try{
                    $request = Request::get('post');
                    if(CSRFToken::verifyCSRFToken($request->token, false)){
                        $rules = [
                        'username' => ['required' => true, 'maxLength' => 20, 'string' => true, 'unique' => 'users'],
                        'email' => ['required' => true, 'email' => true, 'unique' => 'users'],
                        'password' => ['required' => true, 'minLength' => 6],
                        'fullname' => ['required' => true, 'minLength' => 6, 'maxLength' => 50],
                        'phonenumber' => ['required' => true, 'minLength' => 10, 'maxLength' => 10]
                        ];
                        
                        $validate = new ValidateRequest;
                        $validate->abide($_POST, $rules);
                        
                        if($validate->hasError()){
                            $errors = $validate->getErrorMessages();
                            header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                            echo json_encode($errors);
                            exit;
                        }
        
                        // Start Send Email 
                    
                        $data = [
                            'to' => $request->email,
                            'subject' => 'Welcome TO ShopifyNepal',
                            'view' => 'welcome',
                            'name' => ucfirst($request->fullname),
                            'body' => ucfirst($request->fullname)
                        ];
                        (new Mail())->send($data);

                        //insert into database
                        User::create([
                            'username' => $request->username,
                            'fullname' => $request->fullname,
                            'email' => $request->email,
                            'password' => password_hash($request->password , PASSWORD_BCRYPT),
                            'phone_number'=>$request->phonenumber,
                            'pan_number' => NULL,       
                            'address' => Null,
                            'pan_image' => NULL,
                            'role' => 'user',
                            'status' => 1,
                        ]);
                        Request::refresh();
                        echo json_encode(['success' => 'Account created']);
                        exit;
                    
                    }
                    throw new \Exception('Token Mismatch');
                    // Redirect::to('/register');
                }catch (\Exception $ex){
                    //    log or sent mail
                        
                }
               
               
            }
            return null;
    }

    public function registerWholeSaler(){
        if(Request::has('post')){
            $request= Request::get('post');
            $file_error = [];
          if(CSRFToken::verifyCSRFToken($request->token, false)){
            $file = Request::get('file');
            // dd($file);
              $rules=[
                  'username' => ['required'=>true , 'maxLength'=>20 , 'string'=>true, 'unique'=>'users'],
                  'email' => ['required'=>true,'email'=>true, 'unique'=>'users'],
                  'password' => ['required'=>true,'minLength'=>5],
                  'fullname' => ['required'=>true,'minLength'=>3,'maxLength'=>40],
                  'address' => ['required'=>true,'minLength'=>4,'maxLength'=>500 , 'mixed'=>true],
                  'phone_number'=>['required'=>true,'minLength'=>10,'maxlength'=>10],
                  'pan_number'=>['required'=>true,'minLength'=>10,'maxlength'=>10]
              ];
        
              $validate = new ValidateRequest;
              $validate->abide($_POST, $rules);
        
              isset($file->image_path->name)?  $filename = $file->image_path->name : $filename = '';

              if(empty($file->image_path->name)){
                $file_error['image_path'] = ['The pan  image is required'];
              }
              else if(!UploadFile::isImage($filename)){
                $file_error['image_path'] =['image is invaldid, Please try again'];
              }

              if($request->password != $request->confirmpassword){
                $file_error['password'] = array('Password is not match.');
                }
              if($validate->hasError()){
                $response = $validate->getErrorMessages();
                count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                echo json_encode($errors);
                exit;
              }
                
                $ds = DIRECTORY_SEPARATOR;
                $temp_file = $file->image_path->tmp_name;
                $pan_image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}pans", $filename)->path();

                // send mail
                $data = [
                    'to' => $request->email,
                    'subject' => 'Wellcome TO ShopifyNepal',
                    'view' => 'welcome',
                    'name' => ucfirst($request->fullname),
                    'body' => ucfirst($request->fullname)
                    ];
                (new Mail())->send($data);
                //end mail

              User::create([
                  'username' => $request->username,
                  'fullname' => $request->fullname,
                  'email' => $request->email,
                  'password' => password_hash($request->password , PASSWORD_BCRYPT),
                  'phone_number'=>$request->phonenumber,
                  'pan_number' => $request->pannumner,       
                  'address' => $request->address,
                  'pan_image' =>$pan_image_path,
                  'role' => 'wholesaler',
                  'status' => 0
              ]);
              Request::refresh();
              echo json_encode(['success' => 'Account created, We will call you']);
              exit;
           }
           throw new \Exception('Token mismatch');     
        }
        return null;

    }
        
    public function login()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            $extra_errors = []; 
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                $rules = [
                    'username' => ['required' => true],
                    'password' => ['required' => true],
                ];
            
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    // count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }
            
                /**
                 * Check if user exist in db
                 */
                $user = User::where('username', $request->username)
                    ->orWhere('email', $request->username)->first();
                
                if($user){
                    if(!password_verify($request->password, $user->password)){
                        header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                        echo json_encode(['username' => 'User Candidate Not Match']);
                        exit;
                    }else{
                        Session::add('SESSION_USER_ID', $user->id);
                        Session::add('SESSION_USER_NAME', $user->username);
                        
                        if($user->role == 'admin'){
                            echo json_encode('admin');
                            die();
                            
                        }else if($user->role == 'user' && Session::has('user_cart')){
                            echo json_encode('cart');
                            die();
                        }else{
                            echo json_encode('index');
                            die();
                        }
                    }
                }else{
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode(['username' => 'User not found, please try again']);
                    exit;
                }
              
            }
            throw new \Exception('Token Mismatch');
        }
        return null;
    }
    
    public function logout()
    {
        if(isAuthenticated()){
            Session::remove('SESSION_USER_ID');
            Session::remove('SESSION_USER_NAME');
            
            if(!Session::has('user_cart')){
                session_destroy();
                session_regenerate_id(true);
            }
        }
        Redirect::to('/');
    }
    
}