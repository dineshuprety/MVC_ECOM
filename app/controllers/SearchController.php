<?php
namespace App\Controllers;


use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;


class SearchController extends BaseController
{
   
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
            
            return view('search', compact('searchResults', 'searchTerm'));
        }
       
    }


   

    
}