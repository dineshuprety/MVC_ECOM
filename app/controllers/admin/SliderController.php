<?php
namespace App\Controllers\Admin;
use App\Classes\Session;
use App\Controllers\BaseController;

class SliderController extends BaseController
{
    public function showCreateProductForm()
    {
        // Session::add('Admin', 'Hey hero wellcome to dashboard');
        // Session::remove('Admin');

        // if(Session::has('Admin')){
        //     $msg =Session::get('Admin');
        // }else{
        //     $msg = 'Not define';
        // }
        //it will redricet to dashboard 
        return view('admin/products/slider');
    }
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
        return view('admin/products/manage_slider');
    }
}