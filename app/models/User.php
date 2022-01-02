<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class User extends Model
{
    // use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['username' ,'fullname','email','password','phone_number','pan_number','pan_image','address','role','status'];
    protected $dates = ['deleted_at'];

    public function transform($data){
        $users =[];
        foreach($data as $item){
            $added = new Carbon($item->created_at);
            array_push($users , [
                'id'=>$item->id,
                'username'=>ucfirst($item->username),
                'fullname' => ucfirst($item->fullname),
                'email'=> $item->email,
                'password'=>$item->password,
                'phone_number'=> $item->phone_number,
                'pan_number'=>$item->pan_number,
                'pan_image'=>$item->pan_image,
                'address'=>$item->address,
                'role'=>$item->role,
                'status'=>$item->status,
                'added' => $added->toFormattedDateString()
            ]);
        }
        return $users;

    }


    
}