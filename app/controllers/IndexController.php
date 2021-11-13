<?php
namespace App\Controllers;

use App\Models\Slider;
use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;


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
        }
    }

    public function search(){
        if(Request::has('post')){
            $request = Request::get('post');   
            $rules = ['search'=>['required' => true]];
            $validate = new ValidateRequest;
            $validate-> abide($_POST , $rules);
            if($validate->hasError()){
                Redirect::to('search');
                exit;
            }
            $searchTerm = $request->search;
            $searchResults = Product::where('title', 'LIKE', "%{$searchTerm}%")->get();
            return view('search', compact('searchResults','searchTerm'));
            exit;
        }
    }


   

    
}