<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\UploadFile;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Slider;

class SliderController extends BaseController
{
    public $table_name = 'sliders';
    public $Slider;
    public $links;

    public function __construct()
    {
        if(!Role::middleWare('admin')){
            Redirect::to('/login');
        }
        $total = Slider::all()->count();
        $object = new Slider;
    
        list($this->Slider, $this->links) = paginate(3, $total, $this->table_name, $object);
    }

    public function show()
    {
        return view('admin/products/manage_slider', [
            'sliders' => $this->Slider, 'links' => $this->links
        ]);
    }

    public function showCreateSliderForm()
    {
        return view('admin/products/slider');
    }

    public function showEditSlidertForm($id)
    {
        $slider = Slider::where('id', $id)->first();
        return view('admin/products/editslider', compact('slider'));
    }


    public function store()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            $file = Request::get('file');
            $file_error = [];
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                  'title' => ['required' => true, 'minLength' => 3,'maxLength' => 70, 'mixed' => true, 'unique' => $this->table_name],
                  'url' => ['required' => true],
                  'description' => ['required' => true]
                ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                isset($file->sliderImage->name)?  $filename = $file->sliderImage->name : $filename = '';
                
                if(empty($filename)){
                    $file_error['sliderImage'] = ['The slider image is required <br>'];
                }else if(!UploadFile::isImage($filename)){
                    $file_error['sliderImage'] = ['The image is invalid, please try again. <br>'];
                }
                
                if($validate->hasError()){
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/slider', ['errors' => $errors
                    ]);
                }
                
                $ds = DIRECTORY_SEPARATOR;
                $temp_file = $file->sliderImage->tmp_name;
                $image_path = UploadFile::move($temp_file, "images{$ds}slider-image", $filename)->path();
                
                //process form data
                Slider::create([
                    'title' => $request->title,
                    'url' => $request->url,
                    'description' => $request->description,
                    'image_path' => $image_path
                ]);
                
                Request::refresh();
                return view('admin/products/slider', [
                    'success' => 'Record Created'
                ]);
            }
            throw new \Exception('Token mismatch');
        }
        
        return null;
    }
    
    public function edit($id)
    {
        if(Request::has('post')){
            $request = Request::get('post');
            $file = Request::get('file');
            $file_error = [];
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                  'title' => ['required' => true, 'minLength' => 3,'maxLength' => 70, 'mixed' => true],
                  'url' => ['required' => true],
                  'description' => ['required' => true, 'mixed' => true, 'minLength' => 4,'maxLength' => 150,]
                ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);

                isset($file->sliderImage->name)?  $filename = $file->sliderImage->name : $filename = '';
                
               if( isset($file->sliderImage->name) && !UploadFile::isImage($filename)){
                    $file_error['sliderImage'] = ['The image is invalid, please try again. <br>'];
                }
                
                if($validate->hasError()){
                    $response = $validate->getErrorMessages();
                    count($file_error) ? $errors = array_merge($response, $file_error) : $errors = $response;
                    return view('admin/products/slider', ['errors' => $errors
                    ]);
                }
                
                $slider = Slider::findOrFail($request->slider_id);
                $slider->title = $request->title;
                $slider->url = $request->url;
                $slider->description = $request->description;
                $slider->title = $request->title;
                

                if($filename){
                    $ds = DIRECTORY_SEPARATOR;
                    $old_image_path = BASE_PATH."{$ds}public{$ds}$slider->image_path";
                    $temp_file = $file->sliderImage->tmp_name;
                    $image_path = UploadFile::move($temp_file, "images{$ds}slider-image", $filename)->path();
                    unlink($old_image_path);
                    $slider->image_path = $image_path;
                }
                $slider->save();
                Session::add('success', 'Record Updated');
                Redirect::to('/admin/manageslider');
            }
            Redirect::to('/admin/manageslider');
        }
        
        return null;
    }

    public function delete($id)
    {
        if(Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                $ds = DIRECTORY_SEPARATOR;
                $slider = Slider::where('id', $id)->value('image_path');
                $old_image_path = BASE_PATH."{$ds}public{$ds}$slider";
                if(unlink($old_image_path)){
                    Slider::destroy($id);
                    Session::add('success', 'Slider Deleted');
                    Redirect::to('/admin/manageslider');
                }
                
            }
            Redirect::to('/admin/manageslider');
        }
        
        return null;
    }
}