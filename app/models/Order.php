<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Order extends Model
{
    // use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['user_id' ,'name','email','phone','post_code','address','city','notes','payment_type','payment_method', 'transaction_id','currency', 'amount','order_number', 'invoice_no', 'order_date', 'order_month', 'order_year', 'confirmed_date', 'processing_date' ,'picked_date', 'shipped_date', 'delivered_date', 'cancel_date', 'return_date','return_reason','status'];
    protected $dates = ['deleted_at'];

    public function user(){
    	return $this->belongsTo(User::class,'user_id','id');
    }


    

}