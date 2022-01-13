@extends('admin.layout.base')
 @section('title', 'Dashboard') 
 @section('content')
<div class="container-fluid">
    <div class="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-white">
                        <span class="mini-stat-icon"><i class="ti-shopping-cart"></i></span>
                        <div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$payments}}</span> Total Earnings</div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-success">
                        <span class="mini-stat-icon"><i class="ti-user"></i></span>
                        <a href="/admin/pending/orders"><div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$orderPending}}</span> Pending Orders</div></a>

                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-orange">
                        <span class="mini-stat-icon"><i class="ti-user"></i></span>
                        <a href="/admin/users/retailers"><div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$users}}</span> Users</div></a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-info">
                        <span class="mini-stat-icon"><i class="ti-user"></i></span>
                        <a href="/admin/users/wholesalers" ><div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$wholseler}}</span> Wholesaler</div></a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-warning">
                        <span class="mini-stat-icon"><i class="ti-user"></i></span>
                        <a href="/admin/users/wholesalers" ><div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$wholselerPending}}</span> Pending Wholesaler</div></a>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="mini-stat clearfix bg-primary">
                        <span class="mini-stat-icon"><i class="ti-package"></i></span>
                        <a href="/admin/products"><div class="mini-stat-info text-right text-light"><span class="counter text-white">{{$products}}</span> Products</div></a>
                    </div>
                </div>
            </div>

            <!-- end row -->
        </div>
        <!-- container -->
    </div>
    <!-- container -->
    @endsection
</div>
