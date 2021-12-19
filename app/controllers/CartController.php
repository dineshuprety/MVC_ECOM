<?php
namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\Redirect;
use App\Classes\Cart;
use App\Classes\Session;
use App\Models\Product;
use App\Models\Size;
use App\Models\Productattribute;


class CartController extends BaseController
{
    public function __construct(){
        // Initialize cart object
         $this->cart = new Cart([
            // Maximum item can added to cart, 0 = Unlimited
            'cartMaxItem' => 0,

            // Maximum quantity of a item can be added to cart, 0 = Unlimited
            'itemMaxQuantity' => 20,

            // Do not use cookie, cart items will gone after browser closed
            'useCookie' => false,
        ]);
    }

    public function show()
    {
        return view('cart');
    }

    public function addItem()
    {
        if(Request::has('post')){
            // $request = array();
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token, false)){
                if(!$request->product_id){
                    throw new \Exception('Malicious Activity');
                }

                $productId = $request->product_id;
                $sizeId = $request->size_id;
                $this->cart->add($productId,1,[
                    'size' => $sizeId
                ]);
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
            if($this->cart->isEmpty()){
                echo json_encode(['fail' => "No item in the cart"]);
                exit;
            }

            $allItems = $this->cart->getItems();

            foreach ($allItems as $id => $items) {
                $index = 0;
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
            }

            $cartTotal = number_format($cartTotal, 2);
            Session::add('cartTotal', $cartTotal);
            echo json_encode([
                'items' => $result, 
                'cartTotal' => $cartTotal,
                'authenticated' => isAuthenticated(),
            ]);
            exit;
        }catch (\Exception $ex){
            echo $ex->getMessage() .' '.$ex->getLine();
            //log this in database or email admin
        }
        
        
    }

    public function updateQuantity()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(!$request->product_id){
                throw new \Exception('Malicious Activity');
            }

            $size = $request->size;
            
            $sizeId = Size::where('name', $size)->first();

            switch ($request->operator){
                case '+':
                   // Set quantity for item #id to +1
                   if($this->cart->update($request->product_id,$request->qty + 1,[
                    'size' => strval($sizeId->id),
                    ])){
                        echo json_encode(['success' => 'Product updated to Cart Successfully']);
                    }
                    break;
                case '-':
                     // Set quantity for item #id to -1
                   if($this->cart->update($request->product_id,$request->qty - 1,[
                    'size' => strval($sizeId->id),
                    ])){
                        echo json_encode(['success' => 'Product updated to Cart Successfully']);
                    }
                    break;
            }
           
           
            
        }
    }

    public function removeItem()
    {
        if(Request::has('post')){
            $request = Request::get('post');
    
            if(!$request->product_id){
                throw new \Exception('Malicious Activity');
            }

            $size = $request->size;
            $sizeId = Size::where('name', $size)->first();
            //remove item
           $this->cart->remove($request->product_id,[
               'size' => strval($sizeId->id)
           ]);
            echo json_encode(['success' => "Product Removed From Cart!"]);
            exit;
        }
    }

    public function emptyCart()
    {
        $this->cart->destroy();
        echo json_encode(['success' => 'Shopping Cart Emptied!']);
        exit;
    }



    
}