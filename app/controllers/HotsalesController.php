<?php
namespace App\Controllers;


use App\Models\Product;
use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Classes\ValidateRequest;


class HotsalesController extends BaseController
{
    public function show()
    {
        $token = CSRFToken::_token();
        return view('hotsales', compact('token'));
        exit;
    }

    public function gethotProducts()
    {
        $hotproducts = Product::where('product_on', 1)->skip(0)->take(8)->get();
        echo json_encode(['hotproducts' => $hotproducts, 'count' => count($hotproducts)]);
        exit;
    }

    public function hotloadMoreProducts()
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


    
}