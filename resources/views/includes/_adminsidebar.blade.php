<!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                <i class="ion-close"></i>
            </button>

            <!-- LOGO -->
            <div class="topbar-left">
                <div class="text-center">
                    <a href="/admin" class="logo" >Admin</a>
                    <!-- <a href="/admin" class="logo"><img src="../images/logo/logo-4.jpg" height="33" alt="logo"></a> -->
                </div>
            </div>

            <div class="sidebar-inner slimscrollleft">

                <div class="user-details">
                    <div class="text-center">
                        <img src="/images/logo/logo.jpg" alt="" class="rounded-circle">
                    </div>
                    <div class="user-info">
                    
                            <h4 class="font-16 text-white">{{ucfirst(user()->username)}}</h4>
                            <span class="text-white"><i class="fa fa-dot-circle-o text-success"></i> Online</span>
                    </div>
                </div>

            <div id="sidebar-menu">
                <ul>
                        <li class="menu-title text-white">Menus</li>

                        <li>
                            <a href="/admin" class="waves-effect">
                                <i class="ti-home"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-exchange-vertical"></i> <span> Category </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/product/categories"><i class="ti-plus"></i>Add Category</a></li>
                                
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart-full"></i> <span> Size </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/product/size"><i class="ti-plus"></i>Add Size</a></li>
                                <!-- <li><a href="#"><i class="ti-pencil-alt"></i>Manage Product</a></li> -->
                            </ul>
                        </li>

                        
                        
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart-full"></i> <span> Product </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/product/create"><i class="ti-plus"></i>Add Product</a></li>
                                <li><a href="/admin/products"><i class="ti-pencil-alt"></i>Manage Product</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-shopping-cart"></i> <span> Order </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/pending/orders"><i class="fa fa-clock-o"></i>Pending Orders <span class="badge badge-primary">{{\App\Models\Order::where('status','pending')->count()}}</span></a></li>
                                <li></i><a href="/admin/confirm/orders"><i class="fa fa-telegram"></i>Confirm Orders  <span class="badge badge-primary">{{\App\Models\Order::where('status','confirm')->count()}}</span></a></li>
                                <li></i><a href="/admin/processing/orders"><i class="fa fa-cogs"></i>Processing Orders  <span class="badge badge-primary">{{\App\Models\Order::where('status','processing')->count()}}</span></a></li>
                                <li></i><a href="/admin/picked/orders"><i class="fa fa-suitcase"></i>Picked Orders <span class="badge badge-primary">{{\App\Models\Order::where('status','picked')->count()}}</span></a></li>
                                <li></i><a href="/admin/shipped/orders"><i class="fa fa-truck"></i>Shipped Orders <span class="badge badge-primary">{{\App\Models\Order::where('status','shipped')->count()}}</span> </a></li>
                                <li></i><a href="/admin/delivered/orders"><i class="fa fa-handshake-o"></i>Delivered Orders <span class="badge badge-primary">{{\App\Models\Order::where('status','delivered')->count()}}</span></a></li>
                                <li></i><a href="/admin/cancel/orders"><i class="fa fa-ban"></i>Cancel Orders <span class="badge badge-primary">{{\App\Models\Order::where('status','cancel')->count()}}</span></a></li>

                                <!-- <li><a href="#"><i class="ti-plus"></i>Add Order</a></li> -->
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span> Users </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/users/retailers"><i class="ti-eye"></i>View Users </a></li>
                                <li></i><a href="/admin/users/wholesalers"><i class="ti-eye"></i>View Wholesalers </a></li>
                                <li><a href="#"><i class="ti-plus"></i>Add Users</a></li>
                            </ul>
                        </li>

                        <!-- <li>
                            <a href="/admin" class="waves-effect">
                                <i class="ti-image"></i>
                                <span> Media </span>
                            </a>
                        </li> -->

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span> Frontend Managed </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="/admin/slider"><i class="ti-layout-slider"></i>Add Slider</a></li>
                                <li><a href="/admin/manageslider"><i class="ti-layout-list-thumb-alt"></i>Manage Slider</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> Setting </span> <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="list-unstyled">
                                <li></i><a href="#"><i class="mdi mdi-account-circle"></i>Profile</a></li>
                                <li><a href="#"><i class="ti-settings"> Settings</i></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin" class="waves-effect">
                                <i class="ti-star"></i>
                                <span> Reviews </span>
                            </a>
                        </li>
                        <li>
                            <a href="/logout" class="waves-effect">
                                <i class="mdi mdi-logout"></i>
                                <span> logout </span>
                            </a>
                        </li>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- end sidebarinner -->
        </div>
        <!-- Left Sidebar End -->