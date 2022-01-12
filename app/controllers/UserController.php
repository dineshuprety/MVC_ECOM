<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Classes\Role;
use App\Classes\Datatable;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Dompdf\Dompdf;
use Dompdf\Options;



class UserController extends BaseController
{
    use Datatable;
   

    public function __construct()
    {
        if(isAuthenticated())
        {

            // if(user()->role == 'admin')
            // {
            //     Session::add('error','You are not Autthorized to view this Page.');
            //     Redirect::to('/');
            // }
            
        }
        else
        {
            Session::add('error','You are not Autthorized to view this Page. Login First');
            Redirect::to('/login');
            exit;
        }
        
    }

    public function show()
    {
       $token = CSRFToken::_token();
       return view('dashboard', compact('token'));
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

                if(User::where('id', user()->id )->where(role , 'user')->update(
                    [
                    'fullname' => $request->fullname, 
                    'email' => $request->email,
                    'address' => $request->address,
                    'phone_number' => $request->phonenumber
                    ]
                )){
                    echo json_encode(['success' => 'User Information Updated Successfully']);
                    exit;
                }
                // else{
                //     header('HTTP/1.1 422 Unprocessable Entity', true, 422);
                //     echo jason_encode(['error'=> 'User Information Can not be Updated']);
                // }
                
                   
                
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

    public function MyOrders(){

		if(Request::has('post')){
            $request = Request::get('post');
			$this->UserDataTableInOrders($request);
			exit;
		}

    } // end mehtod 

    public function InvoiceDownload($id)
	{
		
		$order = Order::with('user')->where('id',$id)->get()->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
		

		$options = new Options();
		$options->set(array(
			'tempDir' => BASE_PATH,
			'chroot' => BASE_PATH,
		));
		$pdf = new Dompdf($options);
		// load pdf from view
		$pdf->loadHtml(pdf('admin/orders/order_invoice',compact('order','orderItem')));
		// (Optional) Setup the paper size and orientation 
		$pdf->setPaper('A4', 'portrait');
		// Render the HTML as PDF 
	    $pdf->render(); 
		// Output the generated PDF (1 = download and 0 = preview) 
			ob_end_clean();
			$pdf->stream("billing_invoice.pdf", array("Attachment" => 0));
	} // end mehtod



    
}