<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Size;

class SizeController extends BaseController
{
    public $table_name = 'sizes';
    public $size;
    public $links;
    
    public function __construct()
    {
        if(!Role::middleWare('admin')){
            Redirect::to('/login');
        }
        $total = Size::all()->count();
        $object = new Size;
    
        list($this->size, $this->links) = paginate(3, $total, $this->table_name, $object);
    }
    
    public function show()
    {
        return view('admin/products/size', [
            'sizes' => $this->size, 'links' => $this->links
        ]);
    }
    
    public function store()
    {
        if(Request::has('post')){
            $request = Request::get('post');
            // var_dump($request);
            // die();
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                $rules = [
                  'name' => ['required' => true, 'minLength' => 1, 'string' => true, 'unique' => 'sizes']
                ];
                
                $validate = new ValidateRequest;
                $validate->abide($_POST, $rules);
                
                if($validate->hasError()){
                    $errors = $validate->getErrorMessages();
                    return view('admin/products/size', [
                        'sizes' => $this->size, 'links' => $this->links, 'errors' => $errors
                    ]);
                }
                //process form data
                Size::create([
                    'name' => $request->name
                ]);
                
                $total = Size::all()->count();
                list($this->size, $this->links) = paginate(3, $total, $this->table_name, new Size);
                return view('admin/products/size', [
                    'sizes' => $this->size, 'links' => $this->links, 'success' => 'Size Created'
                ]);
            }
            throw new \Exception('Token mismatch');
        }
        
        return null;
    }
    
    public function delete($id)
    {
        if(Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                Size::destroy($id);
                Session::add('success', 'Size Deleted');
                Redirect::to('/admin/product/size');
            }
            Redirect::to('/admin/product/size');
        }
        
        return null;
    }
}