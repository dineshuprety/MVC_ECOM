@extends('layouts.app')
@section('title', 'Inquery Wholeser Account')
@section('data-page-id', 'auth')
@section('content')
<div class="auth" id="auth">
   <!-- Breadcrumb Area start -->
   <section class="breadcrumb-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="breadcrumb-content">
                  <h1 class="breadcrumb-hrading">Inquery Wholeser  Page</h1>
                  <ul class="breadcrumb-links">
                     <li><a href="/">Home</a></li>
                     <li>Wholeser Register</li>
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
                        <h4>Wholeser Register</h4>
                     </a>
                  </div>
                  <div class="tab-content">
                     <div class="tab-pane active">
                        <div class="login-form-container">
                           <div class="login-register-form">
                              <form id="wholeser" action="/wholeser/details" method="POST" enctype="multipart/form-data" autocomplete="off">
                                 <div class="notification-wregister alert alert-success" style="display: none;"></div>
                                 <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Full Name</label>
                                          <input type="text" id="fullname" name="fullname"  placeholder="Your Full Name"
                                             value="{{ \App\Classes\Request::old('post', 'fullname') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Email</label>
                                          <input type="email" id="email" name="email" placeholder="Your Email"
                                             value="{{ \App\Classes\Request::old('post', 'email') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                       <div class="">
                                          <label>Company/Pasal Name</label>
                                          <input type="text" id="username" name="username" placeholder="Your Company/Pasal name"
                                             value="{{ \App\Classes\Request::old('post', 'username') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Password</label>
                                          <input type="password" id="password" name="password" placeholder="Your password"
                                             value="{{ \App\Classes\Request::old('post', 'password') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Confirm Password</label>
                                          <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Your Confirm Password "
                                             value="{{ \App\Classes\Request::old('post', 'confirmpassword') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Phone Number</label>
                                          <input type="number" id="phonenumber" name="phonenumber" placeholder="Your phone number"
                                             value="{{ \App\Classes\Request::old('post', 'phonenumber') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Pann Number</label>
                                          <input type="number" id="pannumner" name="pannumner" placeholder="Your pan number"
                                             value="{{ \App\Classes\Request::old('post', 'pannumner') }}" >
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="">
                                          <label>Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="3">{{ \App\Classes\Request::old('post', 'address') }}</textarea>
                                       </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                       <div class="form-group">
                                          <label>Pann Image</label>
                                          <input class="form-control" type="file" onChange="mainThamUrl(this)" id="image_path" name="image_path"
                                             value="{{ \App\Classes\Request::old('post', 'image_path') }}" >
                                       </div>
                                       <img src="" id="mainThmb">
                                    </div>
                                    <div class="button-box">
                                       <div class="login-toggle-btn">
                                         
                                       </div>
                                       <input type="hidden" id="token" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                       <button type="submit" value="submit"><span>Inquery</span></button>
                                    </div>
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
<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(150).height(100);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}	
</script>
@stop