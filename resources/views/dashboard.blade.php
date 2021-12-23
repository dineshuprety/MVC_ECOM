@extends('layouts.app') 
@section('title'){{user()->username}}@endsection
@section('data-page-id', 'user') 
@section('content') 
<div class="home">
   <section class="display-products" data-token={{$token}}>
      <!-- Breadcrumb Area start -->
      <section class="breadcrumb-area"  v-cloak>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="breadcrumb-content">
                     <h1 class="breadcrumb-hrading">User Dashboard</h1>
                     <ul class="breadcrumb-links">
                        <li>
                           <a href="/">Home</a>
                        </li>
                        <li>{{user()->username}}</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
      <!-- account area start -->
      <div class="checkout-area mtb-60px">
         <div class="container">
            <div class="row">
               <div class="ml-auto mr-auto col-lg-9">
                  <div class="checkout-wrapper">
                     <div id="faq" class="panel-group">
                       <!-- include information page -->
                       @include('user.changeuserinformation')
                        <!-- end information -->

                        <!-- include change password  -->
                        @include('user.chnagepassword')
                        <!-- end password -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- account area end -->
   </section>
</div>
@stop