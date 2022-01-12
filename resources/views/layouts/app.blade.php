@extends('layouts.base')
@section('body')
<!--Navigation -->
@include('includes.nav')
@yield('content')
<div class="notify text-center" ></div>
<div class="notifyerror text-center" ></div>
<!-- hotline number  -->
<div class="hotline-phone-ring-wrap">
   <div class="hotline-phone-ring">
      <div class="hotline-phone-ring-circle"></div>
      <div class="hotline-phone-ring-circle-fill"></div>
      <div class="hotline-phone-ring-img-circle">
         <a href="tel:9844407569" class="pps-btn-img">
         <img src="/images/icons/icon-1.png" alt="Hotline" width="50">
         </a>
      </div>
   </div>
   <div class="hotline-bar">
      <a href="tel:9844407569">
      <span class="text-hotline">9844407569</span>
      </a>
   </div>
</div>
<!-- hot line number -->
@stop
