@extends('layouts.app')
@section('title',order track) 
@section('data-page-id', 'trackOrder')
@section('headerclass', '')
@section('content')
<!-- Breadcrumb Area start -->
<div class="display-products" data-token="{{ $token }}" id="search">
   <section class="breadcrumb-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="breadcrumb-content">
                  <h1 class="breadcrumb-hrading">Order Track Page</h1>
                  <ul class="breadcrumb-links">
                     <li><a href="/">Home</a></li>
                     <li>Track Order</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
<!-- Breadcrumb Area End -->
<div class="container">
   <article class="card">
      <header class="card-header"> <b> My Orders / Tracking </b> </header>
      <div class="card-body">
         <div class="row" style="margin-left: 30px; margin-top: 20px;">
            <div class="col-md-2">
               <b> Invoice Number </b><br>
               {{ $track->invoice_no }}
            </div>
            <!-- // end col md 2 -->
            <div class="col-md-2">
               <b> Order Date </b><br>
               {{ $track->order_date }}
            </div>
            <!-- // end col md 2 -->
            <div class="col-md-2">
               <b> Shipping By - {{ $track->name }} </b><br>
               {{ $track->division->division_name }} / {{ $track->district->district_name }}
            </div>
            <!-- // end col md 2 -->
            <div class="col-md-2">
               <b> User Mobile Number </b><br>
               {{ $track->phone }}
            </div>
            <!-- // end col md 2 -->
            <div class="col-md-2">
               <b> Payment Method  </b><br>
               {{ $track->payment_method  }}
            </div>
            <!-- // end col md 2 -->
            <div class="col-md-2">
               <b> Total Amount  </b><br>
               $ {{ $track->amount  }}
            </div>
            <!-- // end col md 2 -->
         </div>
         <!-- // end row   -->     
         <div class="track">
            @if($track->status == 'pending')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @elseif($track->status == 'confirm')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @elseif($track->status == 'processing')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @elseif($track->status == 'picked')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @elseif($track->status == 'shipped')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @elseif($track->status == 'delivered')
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Confirmed</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"> Order Processing  </span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Picked</span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Shipped </span> </div>
            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Delivered </span> </div>
            @endif  
         </div>
         <!-- // end track  -->
         <hr>
         <br><br>
      </div>
   </article>
</div>


</div>
<!-- Shop Category Area End -->
@stop