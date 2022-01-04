<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class OrderItem extends Model
{
    // use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['order_id','product_id','size','qty','price'];
    protected $dates = ['deleted_at'];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }
    
    
   
}