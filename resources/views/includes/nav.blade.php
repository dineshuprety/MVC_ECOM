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
                                            <li class="dropdown after-n">
                                                <a class="angle-icon" href="#">Settings</a>
                                                <ul class="dropdown-nav">
                                                    <li><a href="my-account.html">My Account</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                </ul>
                                            </li>
                                            <!-- Settings end  -->
                                        
                                            <!-- Language Start -->
                                            <li class="top-10px mr-15px">
                                                <select>
                                                    <option value="1">English</option>
                                                    <option value="2">France</option>
                                                </select>
                                            </li>
                                            <!-- Language End -->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Right end-->
                        </div>
                    </div>
                </div>
                <!-- Header top Area end  -->
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
                                        <li class="menu-dropdown">
                                            <a href="#">Home </a>
                                           
                                        </li>
                                        <li class="menu-dropdown">
                                            <a href="#">Shop </a>
                                            
                                        </li>
                                        
                                        <li class="menu-dropdown">
                                            <a href="#">About Me </a>
                                            
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
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
                                            <a href="/cart" class="count-cart"><span>$20.00</span></a>
                                           
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