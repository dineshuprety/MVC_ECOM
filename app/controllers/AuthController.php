<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\UploadFile;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
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
        return view('register');
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function showWholesalerForm()
    {
        return view('wholesaler');
    }
    
    public function register()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                  'username' => ['required' => true, 'maxLength' => 20, 'string' => true, 'unique' => 'users'],
                  'email' => ['required' => true, 'email' => true, 'unique' => 'users'],
                  'password' => ['required' => true, 'minLength' => 6],
                  'fullname' => ['required' => true, 'minLength' => 6, 'maxLength' => 50],
                  'phone_number' => ['required' => true, 'minLength' => 10, 'maxLength' => 10],
                  'address' => ['required' => true, 'minLength' => 4, 'maxLength' => 500, 'mixed' => true]
                ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('register', ['errors' => $errors]);
                }
                
                //insert into database
                user::create([
                    'username' => $request->username,
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'password' => password_hash($request->password , PASSWORD_BCRYPT),
                    'phone_number'=>$request->phonenumber,
                    'pan_number' => NULL,       
                    'address' => $request->address,
                    'pan_image' => NULL,
                    'role' => 'user'
                ]);
                
                Request::refresh();
                return view('register', ['success' => 'Account created, please login']);
            }
            // throw new \Exception('Token Mismatch');
            Redirect::to('/register');
        }
        return null;
    }

    public function registerWholeSaler(){
        if(Request::has('post')){
            $request= Request::get('post');
          if(CSRFToken::verifyCSRFToken($request->token)){
            $file = Request::get('file');
              $rules=[
                  'username' => ['required'=>true , 'maxLength'=>20 , 'string'=>true, 'unique'=>'users'],
                  'email' => ['required'=>true,'email'=>true, 'unique'=>'users'],
                  'password' => ['required'=>true,'minLength'=>5],
                  'fullname' => ['required'=>true,'minLength'=>3,'maxLength'=>40],
                  'address' => ['required'=>true,'minLength'=>4,'maxLength'=>500 , 'mixed'=>true],
                  'phone_number'=>['required'=>true,'minLength'=>10,'maxlength'=>15],
                  'pan_number'=>['required'=>true]
              ];
        
              $validate= new ValidateRequest;
              $validate->abide($_POST , $rules);
        
              $filename = $file->image_path->name;
              if(empty($file->image_path->name)){
                $file_error['image_path'] = ['The pan  image is required'];
              }
              else if(!UploadFile::isImage($filename)){
                $file_error['image_path'] =['image is invaldid, Please try again'];
              }
              if($validate -> hasError()){
                $response= $validate->getErrorMessage();
               count($file_error) ? $errors = array_merge($response,$file_error)
               : $errors = $response;
              return view('register/Wholesaler',['errors'=> $errors ]);
              }
            $ds = DIRECTORY_SEPARATOR;
            $temp_file = $file->image_path->tmp_name;
            $pan_image_path =UploadFile::move($temp_file,"images{$ds}uploads{$ds}pans"
                            ,$filename)->path();
              user::create([
                  'username' => $request->name,
                  'fullname' => $request->fullname,
                  'email' => $request->email,
                  'password' => password_hash($request->password , PASSWORD_BCRYPT),
                  'phone_number'=>$request->phoneNumber,
                  'pan_number' => $request->panNumber,       
                  'address' => $request->address,
                  'pan_image' =>$pan_image_path,
                  'role' => 'Wholesaler'
              ]);
              Request::refresh();
              return view('register/Wholesaler' , ['success' => 'WholeSaler Account created , Please login']);
              die();
           }
           throw new \Exception('Token mismatch');     
        }
        return null;
    }
        
    
    public function login()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                    'username' => ['required' => true],
                    'password' => ['required' => true],
                ];
            
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
            
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('login', ['errors' => $errors]);
                }
    
                /**
                 * Check if user exist in db
                 */
                $user = User::where('username', $request->username)
                    ->orWhere('email', $request->username)->first();
                
                if($user){
                    if(!password_verify($request->password, $user->password)){
                        Session::add('error', 'Incorrect password');
                        return view('login');
                    }else{
                        Session::add('SESSION_USER_ID', $user->id);
                        Session::add('SESSION_USER_NAME', $user->username);
                        
                        if($user->role == 'admin'){
                            Redirect::to('/admin');
                            die();
                        }else if($user->role == 'user' && Session::has('user_cart')){
                            Redirect::to('/cart');
                            die();
                        }else{
                            Redirect::to('/');
                            die();
                        }
                    }
                }else{
                    Session::add('error', 'User not found, please try again');
                    return view('login');
                }
                exit;
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