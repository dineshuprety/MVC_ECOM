 <!-- Top Bar Start -->
 <div class="topbar">

<nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">
       
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="/images/logo/logo.jpg" alt="user" class="rounded-circle">
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
               
                <a class="dropdown-item" href="#"><i class="ti-plus"></i> Add User</a>
                <a class="dropdown-item" href="#"><i class="ti-eye"></i> View Orders</a>
                <a class="dropdown-item" href="/logout"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
            </div>
        </li>

    </ul>

    <ul class="list-inline menu-left mb-0">
        <li class="list-inline-item">
            <button type="button" class="button-menu-mobile open-left waves-effect">
                <i class="ion-navicon"></i>
            </button>
        </li>
        <li class="hide-phone list-inline-item app-search">
            <h3 class="page-title">{{ getenv('APP_NAME') }}</h3>
        </li>
    </ul>

    <div class="clearfix"></div>

</nav>

</div>
<!-- Top Bar End -->