<?php use \App\Classes\Session; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shopifynepal - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet" />
    
    <script src="https://unpkg.com/vue"></script>

    <link rel="stylesheet" href="/css/home.css">
   

</head> 
<body  class="home-furniture home-15" data-page-id="@yield('data-page-id')">
    
    <div id="main"> 

@yield('body')

</div>

<script src="/js/all.js"></script>

<script>
 @if(Session::has('error'))
 var type = "{{ Session::get('error') }}";
 setTimeout(function () {
    $(".notifyerror").css("display", 'block').delay(4000).slideUp(200).html(type);
    }, 500);
    {{Session::remove('error')}}
 @endif 
</script>

<script type="text/javascript">
     function miniCart(){
        $.ajax({
            type: 'GET',
            url: '/cart/items',
            dataType:'json',
            success:function(response){

                if(response.fail){
                    $('#carttotal').text('रु 0.00');
                }else{
                    $('#carttotal').text('रु ' + response.cartTotal);
                }

            }
        })
     }
     miniCart();
</script>
</body>
</html>

