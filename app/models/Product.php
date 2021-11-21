<?php
namespace App\Models;
use illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
//use illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model{
    //use SoftDeletes;
 public $timestamp = true;
 protected $fillable = ['title' ,'price','wholesell_price','sales_price','description','product_on','category_id','sub_category_id','product_image_path','hover_image_path'];
 protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    

 public function transform($data)
 {
    $products = [];
    foreach ($data as $item){
        $added = new Carbon($item->created_at);
        array_push($products, [
            'id' => $item->id,
            'title' => $item->title,
            'price' => $item->price,
            'wholesell_price' => $item->wholesell_price,
            'sales_price' => $item->sales_price,
            'description' => $item->description,
            'category_id' => $item->category_id,
            'category_name' => Category::where('id', $item->category_id)->first()->name,
            'sub_category_id' => $item->sub_category_id,
            'sub_category_name' => SubCategory::where('id', $item->sub_category_id)->first()->name,
            'product_image_path' => $item->product_image_path,
            'hover_image_path' => $item->hover_image_path,
            'product_on' => $item->product_on,
            
            'added' => $added->toFormattedDateString()
        ]);
    }
    
    return $products; 
}
}
?>
