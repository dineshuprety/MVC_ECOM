<?php
namespace App\Controllers;


use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\ValidateRequest;


class SearchController extends BaseController
{
   
    public function searchProduct(){

        if(Request::has('post')){
            $request = Request::get('post');   
            $rules = ['search'=>['required' => true]];
            $validate = new ValidateRequest;
            $validate-> abide($_POST , $rules);
            if($validate->hasError()){
                Redirect::to('/');
                exit;
            }
            $searchTerm = $request->search;
            $searchResults = Product::where('title', 'LIKE', "%{$searchTerm}%")->take(8)->inRandomOrder()->get();
            $token = CSRFToken::_token();
            return view('search', compact('searchResults', 'searchTerm', 'token'));
        }
       
    }

    public function loadMoreProducts()
    {
        // $request = Request::get('post');
        // if(CSRFToken::verifyCSRFToken($request->token, false)){
        //     $count = $request->count;
        //     $item_per_page = $count + $request->next;
        //     $searchTerm = $request->search;
        //     $products = Product::orderBy('id', 'DESC')->where('title', 'LIKE', "%{$searchTerm}%")->skip(0)->take($item_per_page)->get();
            
        //     foreach($products as $product){
        //         echo '<pre>';
        //         echo $product;
        //     }
               
           
        // }
    }


   

    
}