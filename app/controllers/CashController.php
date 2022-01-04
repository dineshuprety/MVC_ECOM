<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Classes\Redirect;
use App\Classes\Cart;
use App\Classes\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Productattribute;
use App\Models\Size;
use Carbon\Carbon;
use App\Classes\Mail;

class CashController extends BaseController
{
    public function __construct(){
        // Initialize cart object
         $this->cart = new Cart();
    }

    public function CashOrder(){

        if(Request::has('post'))
        {
            $request = Request::get('post');

            // dd($request);

            try{

                $result['product'] = [];
                $result['order_no'] = [];
                $result['total'] = [];
    
                $order_id = Order::insertGetId([
                    'user_id' => user()->id,
                    'name' => $request->shipping_name,
                    'email' => $request->shipping_email,
                    'phone' => $request->shipping_phone,
                    'post_code' => $request->shipping_postcode_zip,
                    'notes' => $request->notes,
                    'address' => $request->shipping_address,
                    'city' => $request->shipping_town_city,
                    'province' => $request->shipping_province,
                    'payment_type' => 'Cash On Delivery',
                    'payment_method' => 'Cash On Delivery',
                     
                    'currency' =>  'Rs',
                    'amount' => Session::get('cartTotal'),
                     
                    'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
                    'order_date' => Carbon::now()->format('d F Y'),
                    'order_month' => Carbon::now()->format('F'),
                    'order_year' => Carbon::now()->format('Y'),
                    'status' => 'pending',
                    'created_at' => Carbon::now(),	 
           
                ]);
           
                
           
                $allItems = $this->cart->getItems();

                foreach ($allItems as $id => $items) {
                    foreach ($items as $cart_items) {
    
                        $productId = $cart_items['id'];
                        $quantity = $cart_items['quantity'];
                        $size_id = $cart_items['attributes']['size'];
    
                        $item = Product::where('id', $productId)->first();
                        $stock = Productattribute::where('product_id', $productId)->sum('quntity');
                        $size = Size::where('id', $size_id)->first();
    
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

                        OrderItem::create([
                            'order_id' => $order_id, 
                            'product_id' => $item->id,
                            'size'  => $size->name,
                            'qty' => $quantity,
                            'price' => $totalPrice,
                            'created_at' => Carbon::now(),
               
                        ]);
    
                        array_push($result['product'], [
                            'name' => $item->title,
                            'price' => $item->price,
                            'total' => $totalPrice,
                            'quantity' => $quantity,
                            'size'  => $size->name,
                        ]);
                    }
                }
               
                // Start Send Email 
                $invoice = Order::findOrFail($order_id);
                $result['invoice_no'] = $invoice->invoice_no;
                $result['total'] = Session::get('cartTotal');
                $data = [
                    'to' => $request->shipping_email,
                    'subject' => 'Order Confirmation',
                    'view' => 'purchase',
                    'name' => ucfirst($request->shipping_name),
                    'body' => $result
                ];
                (new Mail())->send($data);

                // End Send Email 

            }catch (\Exception $ex){
                  echo $ex->getMessage();
            }

            $this->cart->destroy();
            echo json_encode([
                'success' => 'Thank you, we have received your order.'
            ]);
            exit;
            
            
        }
    
    

    } // end method 


    	 
    
}