<?php
namespace App\Controllers\Admin;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\User;

class ViewUserController extends BaseController{

      public $table_name ='users';
     // public $links;
     public function __construct()
     {
            if(!Role::middleWare('admin')){
                Redirect::to('/login');
            }
        
         $totalRetailers = User::where('role', 'user')->count();
         list($this->users, $this->links) = paginateRetailer(1, $totalRetailers, $this->table_name, new User);
      }
 
     function getRetailers(){
    $retailerUsers = $this->users;  
    $links = $this->links;
      return view('admin/table/userTable',compact('retailerUsers','links'));
     }
}