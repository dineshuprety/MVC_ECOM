<?php

namespace App\Classes;


class Cart 
{
    protected static $isItemInCart = false;
    
    public static function add($request)
    {
        try{
            $index = 0;
            if(!Session::has('user_cart') || count(Session::get('user_cart')) < 1){
                
                    Session::add('user_cart', [
                        0 => ['product_id' => $request->product_id, 'quantity' => 1, 'size_id' => $request->size_id]
                     ]);
 
            }else{
               
                foreach ($_SESSION['user_cart'] as $cart_items){
                    $index++;
                    foreach ($cart_items as $key => $value){
                       
                        if($key=='product_id' && $request->product_id){
                           
                                array_splice($_SESSION['user_cart'], $index-1, 1,
                                array(
                                    [
                                        'product_id' => $request->product_id,
                                        'quantity' => $cart_items['quantity'] + 1,
                                       
                                    ]
                                ));
                                self::$isItemInCart = true;
                                
                               

                        }
                        
                    }
                    
                }

                if(!self::$isItemInCart){
                    
                    array_push($_SESSION['user_cart'], 
                    [
                        'product_id' => $request->product_id, 
                        'quantity' => 1,
                        'size_id' => $request->size_id
                        
                    ]);
                    self::$isItemInCart = false;
                }
               
            }
        }catch (\Exception $ex){
            echo $ex->getMessage();
        }
    }
    

}
