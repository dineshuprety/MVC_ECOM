<?php
namespace App\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Models\Productattribute;


class IndexController extends BaseController
{
    public function show()
    {
        $token = CSRFToken::_token();
        $slider = Slider::all();
        $featureproducts = Product::where('product_on', 2)->inRandomOrder()->limit(14)->get();
        $hotproducts = Product::where('product_on', 1)->inRandomOrder()->limit(14)->get();
        return view('home', compact('slider', 'featureproducts' , 'hotproducts', 'token'));
        exit;
    }

    public function getProducts()
    {
        $products = Product::skip(0)->take(8)->get();
        echo json_encode(['products' => $products, 'count' => count($products)]);
    }

    public function loadMoreProducts()
    {
        $request = Request::get('post');
        if(CSRFToken::verifyCSRFToken($request->token, false)){
            $count = $request->count;
            $item_per_page = $count + $request->next;
            $products = Product::skip(0)->take($item_per_page)->get();
            echo json_encode(['products' => $products, 'count' => count($products)]);
            exit;
        }
    }

    public function viewProduct($id)
    {
        $result = array();
                if(!$id){
                    throw new \Exception('Malicious Activity');
                }
                   
                    $item = Product::where('id', $id)->first();
                    $stock = Productattribute::where('product_id', $id)->sum('quntity');
                    $productSize = Productattribute::where('product_id', $id)->get();

                   echo json_encode([
                        'item' => $item,
                        'size' => $productSize,
                        'stock' => $stock
                    ]);
                    exit;
           
    }

    public function aboutMe()
    {
        return view('about');
        exit;
    }

    public function contactMe()
    {
        return view('contact');
        exit;
    }

   

   

    
}