(function () {
    'use strict';

    SHOPIFYNEPAL.homeslider.mainjs = function () {
       
        /*---------------------
        Nice Select
         --------------------- */
         $('.working').niceSelect(); 

         /*---------------------
        Toggle Search Bar
        --------------------- */
        $(".search_list > a").on("click", function() {
            $(this).toggleClass('active');
            $('.dropdown_search').slideToggle('medium');
        }); 

        /*---------------------
        Cart Dropdown 
    --------------------- */
    var iconCart = $('.mini-cart-warp');
    iconCart.on('click', function() {
        $('.mini-cart-content').toggleClass('cart-visible');
    });

 

        /*---------------------
            Mobile Menu Active
        --------------------- */
        $('#mobile-menu-active').meanmenu({
            meanScreenWidth: "991",
            meanMenuContainer: ".mobile-menu",
        });

        /*---------------------
        Main Slider Active
    --------------------- */
    $('.slider-active-3').owlCarousel({
        loop: true,
        nav: false,
        dots:true,
        autoplay: true,
        autoplayTimeout: 5000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        item: 1,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
    
     /*---------------------------
       Best Sell Slider Active
    ------------------------------ */
    $('.best-sell-slider').owlCarousel({
        autoplay :   false,
        loop: false,
        smartSpeed : 1000,
        nav :  true ,
        dots :  false ,
        touchDrag: false,
        mouseDrag: false,
        margin:30,
        responsive:{
            0:{
                items:1,
                autoplay: true,
                loop: true,
            },
            360:{
                items:1,
                autoplay: true,
                loop: true,
            },
            500:{
                items:2,
                autoplay: true,
                loop: true,
            },
            768:{
                items:3,
            },
            992:{
                items:4,
            },
            1200:{
                items:5,
            }
        }
        });
/*---------------------
        Product dec slider
    --------------------- */
    $('.product-dec-slider-2').slick({
        infinite: true,
        slidesToShow: 4,
        arrows:false,
        slidesToScroll: 1,
        responsive: [{
                breakpoint: 992,
                Settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                Settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 479,
                Settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }
        ]
    });

    
   

   /*--------------------------
        ScrollUp
    ---------------------------- */
    $.scrollUp({
        scrollText: '<i class="ionicons ion-android-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
    /*--------------------------
            Product Zoom
    ---------------------------- */
    $(".zoompro").elevateZoom({
        gallery: "gallery",
        galleryActiveClass: "active",
        zoomWindowWidth: 300,
        zoomWindowHeight: 100,
        scrollZoom: false,
        zoomType: "inner",
        cursor: "crosshair"
    });
        /*---------------------
        Countdown
    --------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<span class="cdown day">%-D <p>Days</p></span> <span class="cdown hour">%-H <p>Hours</p></span> <span class="cdown minutes">%M <p>Mins</p></span> <span class="cdown second">%S <p>Sec</p></span>'));
        });
    });

 /*---------------------------
       Menu Fixed On Scroll Active
    ------------------------------ */
    $(window).scroll(function () {
        var window_top = $(window).scrollTop() + 1;
        if (window_top > 50) {
          $('.sticky-nav').addClass('menu_fixed animated fadeInDown');
        } else {
          $('.sticky-nav').removeClass('menu_fixed animated fadeInDown');
        }
      });

    /*---------------------------
       Window On Load Functions Active
    ------------------------------ */
    
    // $(window).on('load', function(event) {
    //     $('#preloader').delay(500).fadeOut(500);
    // });

   


};
})();
