@extends('admin.layout.base')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
<div class="page-content-wrapper ">
   <div class="container-fluid">
     
      <div class="row">
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-white">
               <span class="mini-stat-icon"><i class="ti-shopping-cart"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$payments}}</span> Total Earnings
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-success">
               <span class="mini-stat-icon"><i class="ti-user"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$orderPending}}</span> Pending Orders
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-orange">
               <span class="mini-stat-icon"><i class="ti-user"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$users}}</span> Users
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-info">
               <span class="mini-stat-icon"><i class="ti-user"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$wholseler}}</span> Wholesaler
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-warning">
               <span class="mini-stat-icon"><i class="ti-user"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$wholselerPending}}</span> Pending Wholesaler
               </div>
            </div>
         </div>
         <div class="col-md-6 col-xl-3">
            <div class="mini-stat clearfix bg-primary">
               <span class="mini-stat-icon"><i class="ti-package"></i></span>
               <div class="mini-stat-info text-right text-light">
                  <span class="counter text-white">{{$products}}</span> Products
               </div>
            </div>
         </div>
      </div>
      
      <!-- end row -->
   </div>
   <!-- container -->
</div>
<!-- container -->
@endsection
