<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Model
{
    use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['username', 'fullname', 'email', 'password', 'address', 'role'];
    protected $dates = ['deleted_at'];
    
}