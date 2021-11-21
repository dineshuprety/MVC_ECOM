<?php

namespace App\Classes;


class Cart 
{
    // protected static $isItemInCart = false;
    
    public static function add($request) {
        // $request = array();
       $product_id = $request->product_id;
       $size_id = $request->size_id;
       echo $size_id;
        try {
            if(!isset($_SESSION['user_cart'][$product_id]) || $_SESSION['user_cart'][$product_id] < 1) 
            {
                    $_SESSION['user_cart'][$product_id]
                    [$size_id] =  1;
            } 
	        else {
                if(!isset($_SESSION['user_cart'][$product_id][$size_id])){
                    $_SESSION['user_cart'][ $product_id]
                    [$size_id] =  1;   
                } else {
                    $qty = $_SESSION['user_cart'][$product_id][$size_id];
                    $_SESSION['user_cart'][$product_id]
                    [$size_id] =  $qty + 1; 
                }
                    
            }
        }
        catch (Exception $ex){
            echo $ex->getMessage();
        }
        
    } //add ends here

}
