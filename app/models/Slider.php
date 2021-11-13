<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Slider extends Model
{
    // use SoftDeletes;
    
    public $timestamps = true;
    protected $fillable = ['title', 'url', 'description', 'image_path'];
    protected $dates = ['deleted_at'];
    
    
    public function transform($data)
    {
        $slider = [];
        foreach ($data as $item){
            $added = new Carbon($item->created_at);
            array_push($slider, [
                'id' => $item->id,
                'title' => $item->title,
                'url' => $item->url,
                'description' => $item->description,
                'image_path' => $item->image_path,
                'added' => $added->toFormattedDateString()
            ]);
        }
        
        return $slider;
    }
}