<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Product;
use App\Models\Productattribute;


class ProductController extends BaseController
{
    public function show($id)
    {
        $token = CSRFToken::_token();
        $product = Product::where('id', $id)->first();
        $productSize = Productattribute::where('product_id', $id)->get();
        return view('product', compact('token', 'product', 'productSize'));
    }
    
    public function get($id)
    {
        $product = Product::where('id', $id)->with(['category', 'subCategory'])->first();
        $stock = Productattribute::where('product_id', $id)->sum('quntity');
        

        if($product){
            
            $similar_products = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $id)->inRandomOrder()->limit(8)->get();
            
            echo json_encode([
                'product' => $product, 'category' => $product->category,
                'subCategory' => $product->subCategory,
                'similarProducts' => $similar_products,
                'stock' => $stock

            ]);
            exit;
        }
        header('HTTP/1.1 422 Uprocessable Entity', true, 422);
        echo 'Product not found';
        exit;
    }
    public function showAll()
    {
        $token = CSRFToken::_token();
        return view('products', compact('token'));
    }
    
}