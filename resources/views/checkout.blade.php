@extends('layouts.app')
@section('title') checkout @endsection
@section('data-page-id', 'checkout')
@section('headerclass', '')
@section('content')
<!-- Breadcrumb Area start -->

<div class="checkout" id="checkout">
   <div class="product-center">
      <img v-show="loading" src="/images/icons/loading.gif" alt="frontloading.gif" width="70px">
   </div>
   <section class="breadcrumb-area" v-if="loading == false">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="breadcrumb-content">
                  <!-- <h1 class="breadcrumb-hrading"></h1> -->
                  <ul class="breadcrumb-links">
                     <li><a href="/">Home</a></li>
                     <li>checkout</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Breadcrumb Area End -->
   <!-- checkout area start -->
   <div class="checkout-area mt-60px mb-40px" v-cloak v-if="loading == false">
   <div class="container">
      <form method="post" action="/checkout/store" >
         <div class="row">
            <div class="col-lg-7">
               <div class="billing-info-wrap">
                  <h3>Billing Details</h3>
                  @include('includes.message')
                  <div class="row">
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Full Name <span style="color:red;"> * </span></label>
                           <input type="text" name="shipping_name"  value="{{user()->fullname}}" required />
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Street Address<span style="color:red;"> * </span></label>
                           <input class="billing-address" name="shipping_address" placeholder="House number and street name" type="text" value="{{user()->address}}"required />
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Town / City<span style="color:red;"> * </span></label>
                           <input type="text" name="shipping_town_city" placeholder="Enter Town / City"  value="{{ \App\Classes\Request::old('post', 'shipping_town_city')}}"  required/>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Province<span style="color:red;"> * </span></label>
                           <select name="shipping_province" id="shipping" class="working" required>
                              <option>Select a Province</option>
                              <option data-value="Province_1" value="Province_1">Province No. 1</option>
                              <option value="Province_2">Province No. 2</option>
                              <option value="Bagmati">Bagmati Province</option>
                              <option value="Gandaki">Gandaki Province</option>
                              <option value="Lumbini">Lumbini Province</option>
                              <option value="Karnali">Karnali Province</option>
                              <option value="Sudurpashchim">Sudurpashchim Province</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Postcode / ZIP<span style="color:red;"> * </span></label>
                           <input type="number" name="shipping_postcode_zip"  value="{{ \App\Classes\Request::old('post', 'shipping_postcode_zip')}}" required />
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Phone<span style="color:red;"> * </span></label>
                           <input type="number" name="shipping_phone" value="{{user()->phone_number}}" required  />
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="billing-info mb-20px">
                           <label>Email Address<span style="color:red;"> * </span></label>
                           <input type="email" name="shipping_email" value="{{user()->email}}" required/>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                           <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                           <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery. " name="notes">{{ \App\Classes\Request::old('post', 'notes')}}</textarea>
                        </div>
                        <!-- // end form group  -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-5">
               <div class="your-order-area">
                  <h3>Your order</h3>
                  <div class="your-order-wrap gray-bg-4">
                     <div class="your-order-product-info">
                        <div class="your-order-top">
                           <ul>
                              <li>Image</li>
                              <li>Product</li>
                              <li>Total</li>
                           </ul>
                        </div>
                        <div class="your-order-middle">
                           <ul>
                              <li v-for="item in items"><img :src="'/' + item.image" height="30px" width="30px" alt="item.title"  /><span class="order-middle-left">@{{stringLimit(item.title, 18)}} X  @{{ item.quantity }}</span> <span class="order-price">रु @{{ item.total }}</span></li>
                           </ul>
                        </div>
                        <div class="your-order-bottom">
                           <ul>
                              <li class="your-order-shipping">Shipping</li>
                              <li class="rateship"></li>
                           </ul>
                        </div>
                        <div class="your-order-total">
                           <ul>
                              <li class="order-total">Total</li>
                              <li>रु @{{ cartTotal }}</li>
                           </ul>
                        </div>
                     </div>
                     <div class="payment-method">
                        <div class="payment-accordion element-mrg">
                           <div class="row">
                              <div class="col-md-4">
                                 <label for="">Cash on delivery</label> 		
                                 <input type="radio" name="payment_method" value="cash">	
                                 <img src="/images/misc/6.png">  		
                              </div>
                              <!-- end col md 4 -->
                              <div class="col-md-4">
                                 <label for="">Esewa</label> 		
                                 <input type="radio" name="payment_method" value="esewa" title="comming soon" disabled >	
                                 <img src="/images/misc/esewa1.jpg" height="70px" width="70px" >  		
                              </div>
                              <!-- end col md 4 -->
                              
                           </div>
                           <div class="Place-order mt-25">
                                <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                    <button class="btn btn-danger" type="submit" class="btn-hover">Payment Step</button>
                                </div>
                        </div>
                     </div>
                  </div>
                  
               </div>
      </form>
      </div>
      </div>
   </div>
</div>
   <!-- checkout area end -->
   
@stop
