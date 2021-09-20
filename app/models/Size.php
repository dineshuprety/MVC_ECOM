<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Size extends Model
{
    // use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];
    
    
    public function transform($data)
    {
        $size = [];
        foreach ($data as $item){
            $added = new Carbon($item->created_at);
            array_push($size, [
                'id' => $item->id,
                'name' => $item->name,
                'added' => $added->toFormattedDateString()
            ]);
        }
        
        return $size;
    }
}