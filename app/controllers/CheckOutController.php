<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Classes\Redirect;
use App\Classes\Cart;
use App\Classes\Session;
use App\Models\Product;

class CheckOutController extends BaseController
{
    public function __construct(){
        // Initialize cart object
         $this->cart = new Cart();
    }

    public function show()
    {
        if(isAuthenticated()){
            if(!$this->cart->isEmpty()){

                return view('checkout'); 

            }else{
                Session::add('error', 'First Add Product To Cart');
                Redirect::to('/products');
                die();
            }
           
        }else
        {
            // echo json_encode(['fail' => 'First need to login']);
            Session::add('error', 'First need to login');
            Redirect::to('/login');
            die();
        }

    }

    // check out method

    public function getCheckOutItems()
    {
        try{

            $result = array();
            $cartTotal = 0;
          
            $allItems = $this->cart->getItems();

            foreach ($allItems as $id => $items) {
                foreach ($items as $cart_items) {

                    $productId = $cart_items['id'];
                    $quantity = $cart_items['quantity'];
            
                    $item = Product::where('id', $productId)->first();
                   
                    if(!$item) { continue; }

                    // check if product is in hotsales or not

                    if($item->product_on == 1){
                        $price = $item->sales_price;
                    }else{
                        $price = $item->price;
                    }

                    $totalPrice = $price * $quantity;
                    $cartTotal = $totalPrice + $cartTotal;
                    $totalPrice = number_format($totalPrice, 2);

                    array_push($result, [
                        'id' => $item->id,
                        'title' => $item->title,
                        'image' => $item->product_image_path,
                        'price' => $price,
                        'total' => $totalPrice,
                        'quantity' => $quantity,
                    ]);
                   
                }
            }

            $cartTotal = number_format($cartTotal, 2);
            echo json_encode([
                'items' => $result, 
                'cartTotal' => $cartTotal,
            ]);
            exit;
        }catch (\Exception $ex){
            echo $ex->getMessage() .' '.$ex->getLine();
            //log this in database or email admin
        }
       
    } // end method

    public function CheckoutStore(){
    	// dd(Request::get('post'));
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                    'shipping_name' => ['required' => true, 'minLength' => 4, 'maxLength'=> 100 , 'string' => true],
                    'shipping_address'=> ['required'=>true , 'minLength'=>3,'maxLength'=> 150],
                    'shipping_town_city'=>['required' => true , 'minLength'=>3 ,'maxLength'=> 150], 
                    'shipping_province'=> ['required'=>true] ,
                    'shipping_postcode_zip'=>['required'=> true , 'number'=>true ,'minLength'=>4,'maxLength'=> 10],
                    'shipping_phone' => ['required'=>true,'minLength'=>10,'maxlength'=>15 ,'number'=>true],
                    'shipping_email' =>['required' => true,'email'=>true], 
                    'notes' =>['required' => true,'string'=>true,'minLength'=>5,'maxlength'=>200],
                    'payment_method'=>['required' => true , 'string'=>true]
                  ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('checkout', [
                        'errors' => $errors
                    ]);
                }
                    $data = array();
                    $data['shipping_name'] = $request->shipping_name;
                    $data['shipping_email'] = $request->shipping_email;
                    $data['shipping_phone'] = $request->shipping_phone;
                    $data['shipping_postcode_zip'] = $request->shipping_postcode_zip;
                    $data['shipping_province'] = $request->shipping_province;
                    $data['shipping_town_city'] = $request->shipping_town_city;
                    $data['shipping_address'] = $request->shipping_address;
                    $data['notes'] = $request->notes;
                    $cartTotal = Session::get('cartTotal');

                    // $details = json_encode([
                    //     'data' => $data, 
                    //     'cartTotal' => $cartTotal,
                    // ]);
                   
                    if ($request->payment_method == 'cash') {
                        return view('cash',compact('data','cartTotal'));
                        die();
                    }
                
            }
            Redirect::to('/checkout');
        }
        return null;
    }
    	 
    
}