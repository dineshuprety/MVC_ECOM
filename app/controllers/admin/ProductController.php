<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Productattribute;
use App\Classes\Role;

class ProductController extends BaseController
{
    public $table_name = 'products';
    public $categories;
    public $sizes;
    public $subcategories;
    public $links;

    public function __construct()
    {
        if(!Role::middleWare('admin')){
            Redirect::to('/login');
        }
        $this->categories = Category::all();
        $this->subcategories = SubCategory::all();
        $this->sizes = Size::all();
        $total = Product::all()->count();
        list($this->products, $this->links) = paginate(10, $total, $this->table_name, new Product);
    }

    public function show()
    {
        $products = $this->products;
        $links = $this->links;

        return view('admin/products/inventory', compact('products', 'links'));
    }
    
    public function showCreateProductForm()
    {
        $categories = $this->categories;
        $sizes = $this->sizes;
        
        return view('admin/products/product', compact('categories', 'sizes'));
    }

    public function showEditProductForm($id)
    {
       
        $categories = $this->categories;
        $subcategories =$this->subcategories;
        $sizes = $this->sizes;

        $arr = Product::where('id',$id)->get(); 
        
        $result['title']=$arr['0']->title;
        $result['price']=$arr['0']->price;
        $result['wholesell_price']=$arr['0']->wholesell_price;
        $result['sales_price']=$arr['0']->sales_price;
        $result['description']=$arr['0']->description;
        $result['producton'] = $arr['0']->producton;
        $result['category_id']=$arr['0']->category_id;
        $result['sub_category_id']=$arr['0']->sub_category_id;
        $result['product_image_path']=$arr['0']->product_image_path;
        $result['hover_image_path']=$arr['0']->hover_image_path;
        $result['id'] =$arr['0']->id;
    
        $result['productAttrArr']= Productattribute::where('product_id',$id)->get();
 
        return view('admin/products/editproduct', compact('result', 'categories', 'sizes' , 'subcategories'));
    }


    public function store()
    {
        if (Request::has('post'))
        {

            $request = Request::get('post');
            $file = Request::get('file');
            $file_error = [];

            if (CSRFToken::verifyCSRFToken($request->token))
            {
                $rules = ['title' => ['required' => true, 'minLength' => 3], 'price' => ['required' => true, 'minLength' => 2, 'number' => true], 'wholesell_price' => ['required' => true, 'minLength' => 2, 'number' => true],  'category_id' => ['required' => true], 'color' => ['required' => true], 'sub_category_id' => ['required' => true], 'description' => ['required' => true]];

                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                $filename = $file
                    ->product_image_path->name;
                $hoverimagefilename = $file
                ->hover_image_path->name;

                if (empty($filename))
                {
                    $file_error['product_image_path'] = ['The product image is required'];
                }
                elseif (!UploadFile::isImage($filename))
                {
                    $file_error['product_image_path'] = ['image is invaldid, Please try again'];
                }
                elseif (empty($hoverimagefilename))
                {
                    $file_error['hover_image_path'] = ['The product hover image is required'];
                }
                elseif (!UploadFile::isImage($hoverimagefilename))
                {
                    $file_error['hover_image_path'] = ['image is invaldid, Please try again'];
                }
                if ($validate->hasError())
                {
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/product', [
                        'categories' => $this->categories, 'sizes' => $this->sizes, 'errors' => $errors
                    ]);
                }
                $product = new Product;
                $ds = DIRECTORY_SEPARATOR;
                $temp_file = $file
                    ->product_image_path->tmp_name;
                $tmp_hoverfile = $file
                    ->hover_image_path->tmp_name;
                $prouct_image_path = UploadFile::move($temp_file, "images{$ds}uploads{$ds}products", $filename)->path();
                $hoverimage_path =   UploadFile::move($tmp_hoverfile, "images{$ds}uploads{$ds}products", $hoverimagefilename)->path();

                $product->title = $request->title;
                $product->price = $request->price;
                $product->wholesell_price = $request->wholesell_price;
                $product->sales_price = $request->sales_price;
                $product->category_id = $request->category_id;
                $product->sub_category_id = $request->sub_category_id;
                $product->product_on = $request->product_on;
                $product->product_image_path = $prouct_image_path;
                $product->hover_image_path = $hoverimage_path;
                $product->description = $request->description;
                $product->save();
                $pid = $product->id;

                $skuArr = $request->sku;
                $qtyArr = $request->quntity;
                $size_idArr = $request->size_id;
                foreach ($skuArr as $key => $value)
                {
                    # code...
                    if ($size_idArr[$key] == '')
                    {

                        $size_idValue = 0;

                    }
                    else
                    {
                        $size_idValue = $size_idArr[$key];

                    }
                    Productattribute::create(['product_id' => $pid, 'sku' => $skuArr[$key], 'quntity' => $qtyArr[$key], 'size_id' => $size_idValue]);

                }
                Request::refresh();
                Redirect::to('/admin/product/create');
                Session::add('success', 'Product Created');

            }
            Redirect::to('/admin/product/create');
        }

        return null;

    }

   private function editFormWithError($id , $errors){
    $categories = $this->categories;
    $subcategories =$this->subcategories;
    $sizes = $this->sizes;

    $arr = Product::where('id',$id)->get(); 
    
    $result['title']=$arr['0']->title;
    $result['price']=$arr['0']->price;
    $result['wholesell_price']=$arr['0']->wholesell_price;
    $result['sales_price']=$arr['0']->sales_price;
    $result['description']=$arr['0']->description;
    $result['producton'] = $arr['0']->producton;
    $result['category_id']=$arr['0']->category_id;
    $result['sub_category_id']=$arr['0']->sub_category_id;
    $result['product_image_path']=$arr['0']->product_image_path;
    $result['hover_image_path']=$arr['0']->hover_image_path;    
    $result['id'] =$arr['0']->id;

    $result['productAttrArr']= Productattribute::where('product_id',$id)->get();

    return view('admin/products/editproduct', compact('result', 'categories', 'sizes' , 'subcategories' , 'errors'));

   }

    public function edit()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            if(CSRFToken::verifyCSRFToken($request->token)){
            $request = Request::get('post');
            $file = Request::get('file');
            $file_error[] = [];
            $id = $request->id;
            $rules = [
                'title' => ['required'=> true ,'minLength'=>3],
                'price'=>['required' => true , 'minLength'=> 2 , 'number'=> true],
                'wholesell_price'=>['required' => true , 'minLength'=> 2 , 'number'=> true],
                'sales_price'=>['minLength'=>2 ,'number' => true],
                'product_on'=>['required' => true],
                'category'=>['required' => true],
                'subcategory'=>['required' => true],
                'description'=>['required'=> true , 
                'minLength'=>3,
                'maxLength'=> 1000],
            ];

            $validate = new ValidateRequest;
            $validate-> abide($_POST , $rules);
            
            $filename = $file->product_image_path->name;
            $hoverimagefilename =$file->hover_image_path->name;
            
            if(empty($file->product_image_path->name)){
                       $file_error['image_path'] = ['The product image is required'];
            }
            else if(!UploadFile::isImage($filename)){
                       $file_error['image_path'] =['image is invaldid, Please try again'];
            }
            if(empty($file->hover_image_path->name)){
                $file_error['hover_image_path'] = ['The product hover image is required'];
            }
            else if(!UploadFile::isImage($hoverimagefilename)){
                     $file_error['hover_image_path'] =['image is invaldid, Please try again'];
                }
            //     if(!empty($file_error)){
            //         // echo "error in file";
            //         //   dd($file_error);
            //         $this->showEditProductForm($id , $file_error);
            //         exit;
            //    } 
            if($validate -> hasError()){
               
                //dd("error in product on");
                  $response= $validate->getErrorMessages();
                 count($file_error) ? $errors = array_merge($response,$file_error)
                 : $errors = $response;
                
                $this->editFormWithError($id , $errors);
                exit;
              }

            
        $model=Product::find($id);
    
        $ds = DIRECTORY_SEPARATOR;
        $temp_file = $file->product_image_path->tmp_name;
        $tmp_hoverfile = $file->hover_image_path->tmp_name;
        $prouct_image_path =UploadFile::move($temp_file,"images{$ds}uploads{$ds}products"
                        ,$filename)->path();
        $hoverimage_path =  UploadFile::move($tmp_hoverfile,"images{$ds}uploads{$ds}products"
                        ,$hoverimagefilename)-> path();
    
                        $model->title = $request->title;
                        $model->price= $request->price;
                        $model->wholesell_price =$request->wholesell_price;
                        $model->sales_price= $request->sales_price;
                        $model->category_id= $request->category_id;
                        $model->sub_category_id= $request->sub_category_id;
                        $model->product_on= $request->product_on;
                        $model->product_image_path= $prouct_image_path;
                        $model->hover_image_path=$hoverimage_path;
                        $model->description= $request->description;
                        $model->save();
                        $pid=$model->id;
    $paidArr = $request->paid;
    $skuArr = $request->sku;
    $qtyArr= $request->quntity; 
    $size_idArr= $request->size_id; 
    
    foreach ($skuArr as $key => $value) {
        # code...
        if($size_idArr[$key] ==''){
            $size_idValue = 0;
           }    
            else{
             $size_idValue =$size_idArr[$key];
           }   
           Productattribute::where('id' , $paidArr[$key])->delete();
           
           Productattribute::create([
            'product_id'=>$pid,
            'sku'=>$skuArr[$key],
            'quntity'=>$qtyArr[$key],
            'size_id'=>$size_idValue
           ]);
    }
    Redirect::to('/admin/products');
    Session::add('success', 'Product Updated Successfully');
    }
    }
    }


    public function deleteAttr($arr=[]){
        ProductAttribute::where('id',$arr['paid'])->delete();
        Redirect::to("/admin/product/$arr[id]/manages");
     }

    public function getSubcategories($id)
    {
        $subcategories = SubCategory::where('category_id', $id)->get();
        echo json_encode($subcategories);
        exit;
    }
   
    public function deleteProduct($id){
       
        if(Request::has('post')){
            
            $productFilepath = Product::where('id', $id)->value('product_image_path');
            $hoverProductpath= product::where('id',$id)->value('hover_image_path');
            $ds = DIRECTORY_SEPARATOR;
            $oldproductFilepath =  BASE_PATH."{$ds}public{$ds}$productFilepath";
            $oldhoverProductpath =  BASE_PATH."{$ds}public{$ds}$hoverProductpath";
             
             unlink($oldproductFilepath);
             unlink($oldhoverProductpath);
             product::destroy($id);
             $productAttributes = Productattribute::where('product_id' ,$id)->get();
             if(count($productAttributes)){
               foreach($productAttributes as $productAttribute){
                         $productAttribute->delete();
                       }
             } 

             Redirect::to('/admin/products');
             Session::add('success', 'Product updated Successfully');
            }
          
       

      
    }
}
      
    

   


