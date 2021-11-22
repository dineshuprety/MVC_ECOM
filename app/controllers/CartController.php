<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Cart;
use App\Classes\Session;
use App\Models\Product;
use App\Models\Size;
use App\Models\Productattribute;


class CartController extends BaseController
{
    public function show()
    {
        return view('cart');
    }
    public function addItem()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                if(!$request->product_id){
                    throw new \Exception('Malicious Activity');
                }
                Cart::add($request);
                echo json_encode(['success' => 'Product Added to Cart Successfully']);
                exit;
            }
        }
    }

    public function getCartItems()
    {
        try{
            $result = array();
            $cartTotal = 0;
            if(!Session::has('user_cart') || count(Session::get('user_cart')) < 1){
                echo json_encode(['fail' => "No item in the cart"]);
                exit;
            }
            $index = 0;
            foreach ($_SESSION['user_cart'] as $cart_items){
                $productId = $cart_items['product_id'];
                $quantity = $cart_items['quantity']; 
                // $size_id = $cart_items['size_id'];
                
                if($cart_items['size_id'] == null){
                    $size_id = 1;
                }else{
                    $size_id = $cart_items['size_id'];
                }

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
                
                array_push($result, [
                    'id' => $item->id,
                    'title' => $item->title,
                    'image' => $item->product_image_path,
                    'price' => $price,
                    'total' => $totalPrice,
                    'quantity' => $quantity,
                    'stock' => $stock,
                    'size'  => $size->name,
                    'index' => $index
                ]);
                $index++;
            }
    
            $cartTotal = number_format($cartTotal, 2);
            echo json_encode(['items' => $result, 'cartTotal' => $cartTotal]);

            exit;
        }catch (\Exception $ex){
            echo $ex->getMessage() .' '.$ex->getLine();
            //log this in database or email admin
        }
    }
    
}