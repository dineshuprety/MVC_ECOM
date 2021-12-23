@extends('layouts.app')
@section('title', 'Register Free Account')
@section('data-page-id', 'auth')
@section('content')
<div class="auth" id="auth">
   <!-- Breadcrumb Area start -->
   <section class="breadcrumb-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="breadcrumb-content">
                  <h1 class="breadcrumb-hrading">Register Page</h1>
                  <ul class="breadcrumb-links">
                     <li><a href="/">Home</a></li>
                     <li>Register</li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Breadcrumb Area End -->
   <!-- login area start -->
   <div class="login-register-area mb-60px mt-53px">
      <div class="container">
         <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
               <div class="login-register-wrapper">
                  <div class="login-register-tab-list nav">
                     <a class="active">
                        <h4>Register</h4>
                     </a>
                  </div>
                  <div class="tab-content">
                     <div class="tab-pane active">
                        <div class="login-form-container">
                           <div class="login-register-form">
                             
                              <form id="register" action="/register" method="POST" autocomplete="off">
                              <div class="notification-register alert alert-success" style="display: none;"></div>
                                 <input type="text" id="fullname" name="fullname" placeholder="Your Full Name"
                                    value="{{ \App\Classes\Request::old('post', 'fullname') }}" >
                                
                                 <input type="email" id="email" name="email" placeholder="Your Email Address"
                                    value="{{ \App\Classes\Request::old('post', 'email') }}">
                                 
                                 <input type="text" id="username" name="username" placeholder="Your Username"
                                    value="{{ \App\Classes\Request::old('post', 'username') }}">
                                 
                                 <input type="number" id="phonenumber" name="phonenumber" placeholder="Your Phone Number"
                                    value="{{ \App\Classes\Request::old('post', 'phonenumber') }}">
                                
                                 <input type="password" id="password" name="password" placeholder="Your Password">

                                 <input type="hidden" id="token" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                 <div class="button-box">
                                    <div class="login-toggle-btn">
                                       <p>You have a account <a href="/login">Login Here</a> </p>
                                    </div>
                                    <button type="submit" value="submit"><span>Register</span></button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- login area end -->
</div>
@stop