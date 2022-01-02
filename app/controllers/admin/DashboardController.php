<?php
namespace App\Controllers\Admin;

use App\Classes\Redirect;
use App\Classes\Role;
use App\Classes\Session;
use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Capsule\Manager as Capsule;

class DashboardController extends BaseController
{
    public function __construct()
    {
        if(!Role::middleware('admin')){
            Redirect::to('/login');
        }
    }
    
    public function show()
    {
    
        $orders = Order::all()->count();
        $products = Product::all()->count();
        $users = User::where(role,'user')->count();
        $wholseler = User::where(role,'wholesaler')->count();
        $wholselerPending = User::where(role,'wholesaler')->where(status,'0')->count();
        $paymentsPending = Order::where(status,'pending')->sum('amount');
        $orderPending = Order::where(status,'pending')->count();
        $payments = Order::where(status,'paid')->sum('amount');
        return view('admin/dashboard', compact('orders', 'products', 'payments', 'users', 'wholseler', 'wholselerPending', 'paymentsPending', 'orderPending'));
    }
    
    public function getChartData()
    {
        $revenue = Capsule::table('payments')->select(
            Capsule::raw('sum(amount) / 100 as `amount`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, Month(created_at) month')
        )->groupby('year', 'month')->get();
        //04-2017
        $orders = Capsule::table('orders')->select(
            Capsule::raw('count(id) as `count`'),
            Capsule::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),
            Capsule::raw('YEAR(created_at) year, Month(created_at) month')
        )->groupby('year', 'month')->get();
        
        echo json_encode([
            'revenues' => $revenue, 'orders' => $orders
        ]);
    }
}