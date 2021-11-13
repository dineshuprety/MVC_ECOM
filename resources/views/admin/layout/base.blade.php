<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="Admin Dashboard" name="description" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Panel - @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- compress css -->
        <link href="/css/plugins.css" rel="stylesheet" type="text/css">
        <link href="/css/admin.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" integrity="sha512-pDpLmYKym2pnF0DNYDKxRnOk1wkM9fISpSOjt8kWFKQeDmBTjSnBZhTd41tXwh8+bRMoSaFsRnznZUiH9i3pxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body data-page-id="@yield('data-page-id')" class="fixed-left">

        <!-- Loader --> 
            <!-- <div id="preloader">
                <div id="status">
                    <div class="spinner"></div>
                </div>
            </div> -->
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
    <script src="/js/all.js"></script>
     <!--Summernote js-->
     <script src="/js/summernote/summernote-bs4.min.js"></script>
    <script>
        /* 
         *  Window On Load Functions Active
        */
         $(window).on('load', function(event) {
            $('#preloader').delay(500).fadeOut(500);
            $('[data-toggle="tooltip"]').tooltip()
        });

           
 
    </script>
</body>
</html>