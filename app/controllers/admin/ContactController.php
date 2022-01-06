<?php
namespace App\Controllers\Admin;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\Contact;

class ContactController extends BaseController
{
    public $table_name = 'Contacts';
    public $contact;
    public $links;
    
    public function __construct()
    {
        if(!Role::middleWare('admin')){
            Redirect::to('/login');
        }
        $total = Contact::all()->count();
        $object = new Contact;
    
        list($this->contact, $this->links) = paginate(3, $total, $this->table_name, $object);
    }
    
    public function show()
    {
        return view('admin/table/contact', [
            'contacts' => $this->contact, 'links' => $this->links
        ]);
    }
  
    // public function delete($id)
    // {
    //     if(Request::has('post')){
    //         $request = Request::get('post');
            
    //         if(CSRFToken::verifyCSRFToken($request->token)){
    //             Size::destroy($id);
    //             Session::add('success', 'Size Deleted');
    //             Redirect::to('/admin/product/size');
    //         }
    //         Redirect::to('/admin/product/size');
    //     }
        
    //     return null;
    // }
}