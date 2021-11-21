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
            print_r($_SESSION['user_cart']);
            exit;
        }catch (\Exception $ex){
            echo $ex->getMessage() .' '.$ex->getLine();
            //log this in database or email admin
        }
    }
    
}