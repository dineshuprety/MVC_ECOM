@extends('layouts.app')
@section('title') Contact @endsection
@section('data-page-id', 'contact')
@section('headerclass', '')
@section('content')

<!-- Breadcrumb Area start -->
<div class="display-products" id="search">
   <!-- <div id="preloader">
        <div class="preloader">
        <img src="/images/icons/loading.gif" alt="frontloading.gif" width="70px">
        </div>
    </div> -->
<section class="breadcrumb-area">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="breadcrumb-content">
               <h1 class="breadcrumb-hrading">Contact Page</h1>
               <ul class="breadcrumb-links">
                  <li><a href="/">Home</a></li>
                  <li>Contact</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
<!-- contact area start -->
<div class="contact-area mtb-60px">
   <div class="container">
      <div class="contact-map mb-10">
         <div id="mapid"></div>
      </div>
      <div class="custom-row-2">
         <div class="col-lg-4 col-md-5">
            <div class="contact-info-wrap">
               <div class="single-contact-info">
                  <div class="contact-icon">
                  <i class="ionicons ion-android-call"></i>
                  </div>
                  <div class="contact-info-dec">
                     <p>+012 345 678 102</p>
                  </div>
               </div>
               <div class="single-contact-info">
                  <div class="contact-icon">
                  <i class="ionicons ion-android-mail"></i>
                  </div>
                  <div class="contact-info-dec">
                     <p><a href="#">Email</a></p>
                     <p><a href="#">info@shopifynepal.com</a></p>
                  </div>
               </div>
               <div class="single-contact-info">
                  <div class="contact-icon">
                  <i class="ionicons ion-location"></i>
                  </div>
                  <div class="contact-info-dec">
                     <p>Address goes here,</p>
                     <p>street, Crossroad 123.</p>
                  </div>
               </div>
               <div class="contact-social">
                  <h3>Follow Us</h3>
                  <div class="social-info">
                     <ul>
                        <li>
                           <a href="#"><i class="ion-social-facebook"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="ion-social-twitter"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="ion-social-youtube"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="ion-social-google"></i></a>
                        </li>
                        <li>
                           <a href="#"><i class="ion-social-instagram"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-8 col-md-7">
            <div class="contact-form">
               <div class="contact-title mb-30">
                  <h2>Get In Touch</h2>
               </div>
               <form class="contact-form-style" id="myform" action="/contact/store" method="post">
                  <div class="row">
                     <div class="col-lg-6">
                     <p class="form-messege" style="color:red;" id="names"></p>
                        <input name="name" id="name" value="{{(isAuthenticated())? ucfirst(user()->username) : '' }}" placeholder="Name*" type="text" />
                     </div>
                     <div class="col-lg-6">
                     <p class="form-messege" style="color:red;" id="emails"></p>
                        <input name="email" id="email"  value="{{(isAuthenticated())? user()->email : '' }}" placeholder="Email*" type="email" />
                     </div>
                     <div class="col-lg-12">
                     <p class="form-messege" style="color:red;" id="subjects"></p>
                        <input name="subject" id="subject" placeholder="Subject*" type="text" />
                        <p class="form-messege" id="subjects"></p>
                     </div>
                     <div class="col-lg-12">
                     <p class="form-messege" style="color:red;" id="messages"></p>
                        <textarea name="message" id="message" placeholder="Your Message*"></textarea>
                        <input type="hidden" id="token" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                        <button class="submit" type="submit">SEND</button>
                        
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@include('includes.footer')
<!-- contact area end -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
<script type="text/javascript">
   var mymap = L.map('mapid').setView([27.7052613,85.3109979], 13);
   var image = '<img style="text-align: center;" src="/images/logo/logo.jpg" alt="" class="img-responsive" height="50px" width="50px" />';
   
   
   L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
   attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
   maxZoom: 18,
   id: 'mapbox/streets-v11',
   tileSize: 512,
   zoomOffset: -1,
   accessToken: 'pk.eyJ1IjoiZGluZXNodXByZXR5IiwiYSI6ImNreGN5ZDZvODFkd2QyeHBmb2FlaHNsMnUifQ.9v2AtxLOfRXUUtAZPovt8Q'
   }).addTo(mymap);
   
   var marker = L.marker([27.7052613,85.3109979]).addTo(mymap);
   var circle = L.circle([27.7052613,85.3109979], {
   color: 'red',
   fillColor: '#f03',
   fillOpacity: 0.5,
   radius: 500
   }).addTo(mymap);
   marker.bindPopup(image +"<b>ShopifyNepal</b><br>Contact<br>9844407569").openPopup();
</script>
<script type="text/javascript">
   //  $(window).on('load', function(event) {
   //      $('#loading').delay(500).fadeOut(500);
   //  });
   </script>
@stop