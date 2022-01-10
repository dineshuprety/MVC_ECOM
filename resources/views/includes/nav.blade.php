<?php $categories = \App\Models\Category::with('subCategories')->get(); ?>
 <!-- Header Area Start  -->
 <header class="main-header @yield('headerclass')">
                <!-- Header top Area Start  -->
                <div class="header-top-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--Left Start-->
                            <div class="col-lg-4 col-md-4">
                                <div class="left-text">
                                    <p>Welcome you to ShopifyNepal store!</p>
                                </div>
                            </div>
                            <!--Left end-->
                            <!--Right Start-->
                            <div class="col-lg-8 col-md-8 text-right">
                                <div class="header-right-nav">
                                    <div class="dropdown-navs">
                                        <ul>
                                            <!-- Settings Start  -->
                                            @if(isAuthenticated())
                                            <li class="dropdown after-n">
                                                <a class="angle-icon" href="#">{{user()->username}}</a>
                                                <ul class="dropdown-nav">
                                                    <li><a href="/user/dashboard">User Dashboard</a><li>
                                                    <li><a href="/cart">Cart</a><li>
                                                    <li><a href="/checkout">Checkout</a></li>
                                                    <li><a href="/logout">Logout</a></li>
                                                    <!-- <li><a href="my-account.html">My Account</a></li> -->
                                                    
                                                    <!-- <li><a href="login.html">Login</a></li> -->
                                                   
                                                </ul>
                                            </li>
                                            @else
                                            <li class="dropdown after-n">
                                                <a class="angle-icon" href="/login">login</a>
                                                <ul class="dropdown-nav">
                                                    <li><a href="/register">Register</a><li>
                                                    <li><a href="/inquery/wholeser">Wholeser</a><li>
                                                    <li><a href="/cart">Cart</a><li>
                                                   
                                                </ul>
                                            </li>
                                            @endif

                                            <!-- Settings end  -->
                                        
                                            <!-- Language Start -->
                                            <li class="top-10px mr-15px">
                                                <select class="working">
                                                    
                                                    <option value="2">comming soon</option>
                                                </select>
                                            </li>
                                            <!-- Language End -->
                                        </ul>
                                    </div>
                                    <ul class="res-xs-flex">
                                        <li class="after-n">
                                            <a href="/track/order" data-toggle="modal" data-target="#ordertraking" ><i class="ionicons ion-ios-location"></i>Order Tracking</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                            <!--Right end-->
                        </div>
                    </div>
                </div>
                <!-- Header top Area end  -->
                @include('includes.order_tracking')
                <!-- Header Navigation Area Start  -->
                <div class="header-navigation sticky-nav">
                    <div class="container-fluid">
                        <div class="row">
                            <!--  Logo Area Start-->
                            <div class="col-md-2 col-sm-2">
                                <div class="logo">
                                    <a href="/"><img src="/images/logo/logo-4.jpg" alt=""  /></a>
                                </div>
                            </div>
                            <!--  Logo Area end-->
                            <div class="col-md-10 col-sm-10">
                                <!--Main Navigation Start -->
                                <div class="main-navigation d-none d-lg-block" >
                                    <ul>
                                    @if(count($categories))
                                    <li class="menu-dropdown">
                                            <a href="/products/category"><i class="ionicons ion-android-menu"></i> All Categories <i class="ion-ios-arrow-down"></i></a>
                                            <ul class="sub-menu">
                                            @foreach($categories as $category)
                                                <li class="menu-dropdown position-static">
                                                    <a href="/products/category/{{ $category->slug }}">{{ $category->name }}<i class="ion-ios-arrow-down"></i></a>
                                                    @if(count($category->subCategories))
                                                    <ul class="sub-menu sub-menu-2">
                                                    @foreach($category->subCategories as $subCategory)
                                                        <li><a href="/products/category/{{ $category->slug }}/{{ $subCategory->slug }}">
                                                                {{ $subCategory->name }}
                                                            </a></li>
                                                         @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endforeach 
                                            </ul>
                                        </li>
                                        @endif
                                        <li class="menu-dropdown">
                                            <a href="/">Home </a>
                                           
                                        </li>
                                        <li class="menu-dropdown">
                                            <a href="/products">Shop </a>
                                            
                                        </li>
                                        
                                        <li class="menu-dropdown">
                                            <a href="/about">About Me </a>
                                            
                                        </li>
                                        <li><a href="/contact">Contact Us</a></li>
                                    </ul>
                                </div>
                                <!--Main Navigation End -->
                                <div class="header_account_area">
                                    <!-- Search start -->
                                    <div class="header_account_list search_list">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                        <div class="dropdown_search">
                                            <form action="/search" method="POST">
                                                <input name="search" placeholder="Search entire store here ..." type="text" />
                                               
                                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Search  End -->
                                   
                                    <!--Cart info Start -->
                                    <div class="cart-info d-flex home-13">
                                        
                                        <div class="mini-cart-warp">
                                            <a href="/cart" class="count-cart"><span id="carttotal"></span></a>   
                                        </div>
                                    </div>
                                    <!--Cart info End -->
                                </div>
                            </div>
                        </div>
                        <!-- mobile menu -->
                        @include('includes.mobilenav')
                        <!-- mobile menu end-->
                    </div>
                </div>
                <!--Header Bottom Account End -->
                
            </header>
            <!--  Main Header End -->
          
            
           