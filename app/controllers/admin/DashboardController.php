<?php
namespace App\Controllers\Admin;
use App\Classes\Session;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        // Session::add('Admin', 'Hey hero wellcome to dashboard');
        // Session::remove('Admin');

        // if(Session::has('Admin')){
        //     $msg =Session::get('Admin');
        // }else{
        //     $msg = 'Not define';
        // }
        //it will redricet to dashboard 
        return view('admin/dashboard', ['admin' => $msg]);
    }
}