<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="Admin Dashboard" name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- compress css -->
        <link href="./css/plugin/plugins.css" rel="stylesheet" type="text/css">
        <link href="./css/plugin/_style.css" rel="stylesheet" type="text/css">
</head>
<body class="fixed-left">

        <!-- Loader -->
            <div id="preloader">
                <div id="status">
                    <div class="spinner"></div>
                </div>
            </div>
        <!-- Begin page -->
        <div id="wrapper">

        @include('includes._adminsidebar')

<!-- Start right Content here -->

<div class="content-page">
    <!-- Start content -->
    <div class="content">

       @include('includes._admintopbar')

        <div class="page-content-wrapper ">
                <!-- page content lives here -->
                
                @yield('content')

            
        </div>
        <!-- Page content Wrapper -->

    </div>
    <!-- content -->

    @include('includes._adminfooter')

</div>
<!-- End Right content here -->

</div>
<!-- END wrapper -->
    <!-- jQuery  -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <!-- compress script -->
    <script src="js/plugins/plugins.min.js"></script>
    <!-- Main _script js -->
    <script src="js/_script.js"></script>
    <script>
        /* 
         *  Window On Load Functions Active
        */
         $(window).on('load', function(event) {
            $('#preloader').delay(500).fadeOut(500);
        });
    </script>
</body>
</html>