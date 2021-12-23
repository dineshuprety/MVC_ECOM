<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Models\User;


class UserController extends BaseController
{
    public function show()
    {
        $token = CSRFToken::_token();
        return view('dashboard', compact('token'));
        exit;
    }
    
    public function changeUserInformation()
    {
        // dd(Request::get('post'));
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                $rules = [
                    'fullname' => ['required' => true, 'minLength' => 5, 'maxLength'=> 100 , 'string' => true],
                    'phonenumber'=> ['required'=>true , 'minLength'=>10,'maxLength'=> 10],
                    'email' =>['required' => true,'email'=>true],                 
                  ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($errors);
                    exit;
                }

                User::where('id', user()->id )->update(
                    [
                    'fullname' => $request->fullname, 
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone_number' => $request->phonenumber
                    ]
                );
                echo json_encode(['success' => 'User Information Updated Successfully']);
                exit;
                   
                
            }
            throw new \Exception('Token mismatch');
           
        }
        return null;
    }

    public function changePassword()
    {
        if(Request::has('post')){
            $request = Request::get('post');
           
            $extra_errors = []; 
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                $rules = [
                    'password' => ['required'=>true,'minLength'=>5],
                    'confirmpassword' => ['required'=>true,'minLength'=>5],
                ];
            
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                
                
                 if($request->password != $request->confirmpassword){
                    $extra_errors['confirmpassword'] = array('Password is not match.');
                 }
                 if($validate->hasError() || $request->password != $request->confirmpassword){
                    $errors = $validate->getErrorMessages();
                    count($extra_errors) ? $response = array_merge($errors, $extra_errors) : $response = $errors;
                    header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                    echo json_encode($response);
                    exit;
                }else{

                /**
                 * change the passport
                 */
                User::where('id', user()->id )->update(
                    [
                    'password' => password_hash($request->confirmpassword , PASSWORD_BCRYPT),
                    ]
                );
                echo json_encode(['success' => 'User Password Updated Successfully']);
                exit;
                }
                
            }
            throw new \Exception('Token Mismatch');
        }
        return null;
    }

    
}