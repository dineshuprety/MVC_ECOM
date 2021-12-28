@extends('layouts.app')
@section('title', 'Login to Your Account')
@section('data-page-id', 'auth')

@section('content')
    <div class="auth" id="auth">
       <!-- Breadcrumb Area start -->
       <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Login</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="/">Home</a></li>
                                    <li>Login</li>
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
                                        <h4>login</h4>
                                    </a>
                                    
                                </div>
                                <div class="tab-content">
                                    <div  class="tab-pane active">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
                                                <form id="login" action="/login" method="post">
                                                <div class="notification-login alert alert-success" style="display: none;"></div>
                                                    <input type="text" id="username" name="username" value="{{ \App\Classes\Request::old('post', 'username') }}" placeholder="Your Username or Email" />
                                                    <input type="password" id="password" name="password" placeholder="Password" />
                                                    <input type="hidden" id="token" name="token" value="{{ \App\Classes\CSRFToken::_token() }}">
                                                    <div class="button-box">
                                                        <div class="login-toggle-btn">
                                                            
                                                        <p>Not yet a member? <a href="/register">Register Here</a> </p>
                                                        </div>
                                                        <button type="submit"><span>Login</span></button>
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