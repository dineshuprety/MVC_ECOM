<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopifynepal - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet" />
    
    <script async src="/js/all.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    <link rel="stylesheet" href="/css/home.css">
    <!-- <link rel="stylesheet" href="/assets/css/vendor/plugins.min.css">
    <link rel="stylesheet" href="/assets/css/style.min.css">
    <link rel="stylesheet" href="/assets/css/responsive.min.css"> -->

</head> 
<body  class="home-furniture home-15" data-page-id="@yield('data-page-id')">
    <!-- <div id="preloader">
        <div class="preloader">
        <img src="/images/icons/loading.gif" alt="frontloading.gif" width="100px" >
        </div>
    </div> -->
    <div id="main"> 

@yield('body')

</div>


</body>
</html>

