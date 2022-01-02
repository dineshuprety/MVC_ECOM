@extends('layouts.app')
@section('title') Cash @endsection
@section('data-page-id', 'cash')
@section('headerclass', '')
@section('content')
<!-- Breadcrumb Area start -->
<div class="cash" id="cash">
   <section class="breadcrumb-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="breadcrumb-content">
                  <!-- <h1 class="breadcrumb-hrading"></h1> -->
                  <ul class="breadcrumb-links">
                     <li><a href="/checkout">checkout</a></li>
                     <li>Cash On delivery</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Breadcrumb Area End -->
   <!-- checkout area start -->
   <div class="checkout-area mt-60px mb-40px">
      <div class="container">
         <form id="cashOrder" method="post" action="/cash/order" >
            <div class="row">
               <div class="col-lg-12">
                  <div class="your-order-area">
                     <h3>Your order</h3>
                     <div class="your-order-wrap gray-bg-4">
                        <div class="your-order-product-info">
                           <div class="your-order-total">
                              <ul>
                                 <li class="order-total">SubTotal</li>
                                 <li>रु {{ $cartTotal }}</li>
                              </ul>
                           </div>
                           <div class="your-order-bottom">
                              <ul>
                                 <li class="your-order-shipping">Shipping</li>
                                 <li class="rateship">Free</li>
                              </ul>
                           </div>
                           <div class="your-order-total">
                              <ul>
                                 <li class="order-total">GrandTotal</li>
                                 <li>रु {{ $cartTotal }}</li>
                              </ul>
                           </div>
                        </div>
                        <div class="payment-method">
                           <div class="payment-accordion element-mrg">
                              <img src="/images/misc/cash.png">  		
                              <div class="Place-order mt-25">
                                 <label for="card-element">
                                 <input type="hidden" name="shipping_name" value="{{ $data['shipping_name'] }}">
                                 <input type="hidden" name="shipping_email" value="{{ $data['shipping_email'] }}">
                                 <input type="hidden" name="shipping_phone" value="{{ $data['shipping_phone'] }}">
                                 <input type="hidden" name="shipping_postcode_zip" value="{{ $data['shipping_postcode_zip'] }}">
                                 <input type="hidden" name="shipping_province" value="{{ $data['shipping_province'] }}">
                                 <input type="hidden" name="shipping_town_city" value="{{ $data['shipping_town_city'] }}">
                                 <input type="hidden" name="shipping_address" value="{{ $data['shipping_address'] }}">
                                 <input type="hidden" name="notes" value="{{ $data['notes'] }}"> 
                                 
                                 </label>
                                 <input type="hidden" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                 <button class="btn btn-danger" type="submit" class="btn-hover">Submit Order</button>
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
</div>
@stop