<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Request;
use App\Classes\Session;
use App\Models\User;

class WholesalerController extends BaseController
{

    public $table_name = 'users';
    public $links;
    public function __construct()
    {

        if (!Role::middleWare('admin'))
        {
            Redirect::to('/login');
        }

        $totalWholsalers = User::where('role', 'wholesaler')->count();
        list($this->users, $this->links) = paginateWholesalers(10, $totalWholsalers, $this->table_name, new User);
    }

    public function getWholesalers()
    {
        $WholesaleUsers = $this->users;
        $links = $this->links;
        return view('admin/table/Wholesaler', compact('WholesaleUsers', 'links'));
    }

    public function changeStatus($id)
    {
                User::where('id',$id)->where(role, 'wholesaler')->update([
                    'status'=>1,
                ]);
                Session::add('success', 'Status has been approved');
                Redirect::to('/admin/users/wholesalers');
                exit;
           
        

    }

    public function delete($id)
    {
        if(Request::has('post')){
            $request = Request::get('post');
            
            if(CSRFToken::verifyCSRFToken($request->token)){
                $ds = DIRECTORY_SEPARATOR;
                $pan_image = User::where('id', $id)->value('pan_image');
                $old_image_path = BASE_PATH."{$ds}public{$ds}$pan_image";
                if(unlink($old_image_path)){
                    User::destroy($id);
                    Session::add('success', 'Wholesaler User Deleted');
                    Redirect::to('/admin/users/wholesalers');
                    exit();
                }
               
            }
            Redirect::to('/admin/users/wholesalers');
        }
        
        return null;
    }

}

