<?php

namespace App\Controllers;

use App\Classes\CSRFToken;
use App\Classes\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;

class CategoryController extends BaseController
{
    public function show(array $params)
    {
       
        $showBreadCrumbs = true;
        if (isset($params['subcategory']) && $params['subcategory'] !== null) {
            $category = Category::findBySlug($params['slug']);
            $subcategory = SubCategory::findBySlug($params['subcategory']);
            if (!$category) {
                throw new \RuntimeException(
                    sprintf('No category with the slug %s found', $params['slug'])
                );
            }
            if (!$subcategory) {
                throw new \RuntimeException(
                    sprintf(
                        'The categories %s/%s combination was not found', $params['slug'], $params['subcategory']
                    )
                );
            }
            // dd($subcategory);
            $urlParams = json_encode(['slug' => $category->slug, 'subcategory' => $subcategory->slug]);
        } else if (isset($params['slug']) && $params['slug'] !== null) {
            $category = Category::findBySlug($params['slug']);
            $urlParams = json_encode(['slug' => $category->slug]);
        } else {
            $category = Category::all();
            $showBreadCrumbs = false;
        }
        //  echo json_encode($category); exit;
        $token = CSRFToken::_token();
        return view('categories', compact('token', 'category', 'subcategory', 'showBreadCrumbs', 'urlParams'));
       
    }

    public function loadMoreProducts()
    {
        $request = Request::get('post');
        if (CSRFToken::verifyCSRFToken($request->token, false)) {
            $count = $request->count;

            $subcategory = null;
            if(isset($request->subcategory)){
                $subcategory = SubCategory::findBySlug($request->subcategory);
            }
            $category = null;
            if(isset($request->slug)){
                $category = Category::findBySlug($request->slug);
            }

            $item_per_page = $count + $request->next;
            if($subcategory && $category){
                $products = Product::orderBy('id', 'DESC')->where('category_id', $category->id)
                    ->where('sub_category_id', $subcategory->id)
                    ->skip(0)->take($item_per_page)->get();
            }else if ($category) {
                $products = Product::orderBy('id', 'DESC')->where('category_id', $category->id)
                    ->skip(0)->take($item_per_page)->get();
            }else {
                $products = Product::orderBy('id', 'DESC')->skip(0)->take($item_per_page)->get();
            }
            echo json_encode(['products' => $products, 'count' => count($products)]);
        }
    }
}