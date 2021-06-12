<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function show()
    {
        //it will redricet to dashboard 
        return view('admin/dashboard');
    }
}