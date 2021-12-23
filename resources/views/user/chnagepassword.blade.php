<div class="panel panel-default single-my-account">
                           <div class="panel-heading my-account-title">
                              <h3 class="panel-title"><span>2 .</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h3>
                           </div>
                           <div id="my-account-2" class="panel-collapse collapse">
                              <div class="panel-body">
                                 <div class="myaccount-info-wrapper">
                                    <div class="account-info-wrapper">
                                       <h4>Change Password</h4>
                                       <h5>Your Password</h5>
                                    </div>
                                    <form id="changepassword" action="/user/changepassword" method="POST">
                                    <div class="notification-password alert alert-success" style="display: none;"></div>
                                    <div class="row">
                                       <div class="col-lg-12 col-md-12">
                                          <div class="billing-info">
                                             <label> New Password</label>
                                             <input type="password" name="password" id="password" placeholder="New Password" />
                                          </div>
                                       </div>
                                       <div class="col-lg-12 col-md-12">
                                          <div class="billing-info">
                                             <label>Password Confirm</label>
                                             <input type="password"  name="confirmpassword" id="confirmpassword" placeholder="Confirm Password"/>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="billing-back-btn">
                                       <div class="billing-back">
                                          <a data-toggle="collapse" data-parent="#faq" href="#my-account-2"><i class="fa fa-arrow-up"></i> back</a>
                                       </div>
                                       <div class="billing-btn">
                                          <!-- <input type="hidden" id="tokens" value="{{ \App\Classes\CSRFToken::_token() }}" /> -->
                                          <button type="submit">Change Password</button>
                                       </div>
                                    </div>
                                 </form>
                                 </div>
                              </div>
                           </div>
                        </div>