<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Contact extends Model
{
    use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['username' ,'email','subject','message'];
    protected $dates = ['deleted_at'];

    public function transform($data)
    {
        $size = [];
        foreach ($data as $item){
            $added = new Carbon($item->created_at);
            array_push($size, [
                'id' => $item->id,
                'name' => $item->username,
                'email' => $item->email,
                'subject' => $item->subject,
                'message' => $item->message,
                'added' => $added->toFormattedDateString()
            ]);
        }
        
        return $size;
    }
    
}