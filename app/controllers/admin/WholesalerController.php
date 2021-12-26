<?php
namespace App\Controllers\Admin;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\ValidateRequest;
use App\Controllers\BaseController;
use App\Models\User;

class WholesalerController extends BaseController{

    public $table_name ='users';
      public $links;
     public function __construct()
     {
        
            if(!Role::middleWare('admin')){
                Redirect::to('/login');
            }
        
         $totalWholsalers = User::where('role', 'Wholesaler')->count();
         list($this->users, $this->links) = paginateWholesalers(10, $totalWholsalers, $this->table_name, new User);
      }
     function getWholesalers(){
    $WholesaleUsers = $this->users;  
    $links = $this->links;
      return view('admin/table/Wholesaler',compact('WholesaleUsers','links'));
     }

}    
