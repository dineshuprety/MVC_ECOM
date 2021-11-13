<?php
namespace App\Models;
use illuminate\Database\Eloquent\Model;
//use illuminate\Database\Eloquent\SoftDeletes;

class Productattribute extends Model{
 //   use SoftDeletes;
 public $timestamp = true;
 protected $fillable = ['product_id','sku','quntity', 'size_id'];
}

?>