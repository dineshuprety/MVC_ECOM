<div class="panel panel-default single-my-account">
   <div class="panel-heading my-account-title">
      <h3 class="panel-title"><span>1 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h3>
   </div>
   <div id="my-account-1" class="panel-collapse collapse show">
      <div class="panel-body">
         <div class="myaccount-info-wrapper">
            <div class="account-info-wrapper">
               <h4>My Account Information</h4>
               <h5>Your Personal Details</h5>
            </div>
            <form id="chnageinformation" action="/user/changeinformation" method="POST">
            <div class="notification alert alert-success" style="display: none;"></div>
               <div class="row">
                  <div class="col-lg-6 col-md-6">
                     <div class="billing-info">
                        <label>Full Name*</label>
                        <input type="text" value="{{user()->fullname}}" name="fullname" id="fullname" />
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="billing-info">
                        <label>Email Address*</label>
                        <input type="email" value="{{user()->email}}" name="email" id="email" />
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="billing-info">
                        <label>phone number*</label>
                        <input type="number" value="{{user()->phone_number}}" name="phonehumber" id="phonenumber" />
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                        <textarea class="form-control" cols="30" rows="4" id="address" placeholder=" Enter Your  Address" name="address">{{ (user()->address == null)? \App\Classes\Request::old('post', 'notes') : user()->address }}</textarea>
                     </div>
                     <!-- // end form group  -->
                  </div>
               </div>
               <div class="billing-back-btn">
                  <div class="billing-back">
                     <a data-toggle="collapse" data-parent="#faq" href="#my-account-1"><i class="ionicons ion-android-arrow-up"></i> back</a>
                  </div>
                  <div class="billing-btn">
                  <!-- <input type="hidden" id="token" name="token" value="{{ \App\Classes\CSRFToken::_token() }}"> -->
                     <button type="submit">Update Information</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>