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
      <!-- DataTables -->
      <link href="/js/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <link href="/js/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <!-- Responsive datatable examples -->
      <link href="/js/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

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
      <script type="text/javascript">
         $(".img-user img").click(function(){
            $("#full-image").attr("src", $(this).attr("src"));
            $('#image-viewer').show();
         });
         
         $("#image-viewer .close").click(function(){
            $('#image-viewer').hide();
         });
      </script>

       <!-- Required datatable js -->
       <script src="/js/datatables/jquery.dataTables.min.js"></script>
        <script src="/js/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/js/datatables/dataTables.buttons.min.js"></script>
        <script src="/js/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/js/datatables/jszip.min.js"></script>
        <script src="/js/datatables/buttons.html5.min.js"></script>
        <!-- Responsive examples -->
        <script src="/js/datatables/dataTables.responsive.min.js"></script>
        <script src="/js/datatables/responsive.bootstrap4.min.js"></script>
   </body>
</html>
