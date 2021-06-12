(function($) {
    "use strict";
    /*--document ready functions--*/
    jQuery(document).ready(function($) {

        /* 

        THESE FOLLOWING SCRIPTS ONLY FOR BASIC USAGE, 
        For sliders, interactions and other

        */


        // Prevent closing from click inside dropdown
        $(document).on('click', '.dropdown-menu', function(e) {
            e.stopPropagation();
        });


        $('.js-check :radio').change(function() {
            var check_attr_name = $(this).attr('name');
            if ($(this).is(':checked')) {
                $('input[name=' + check_attr_name + ']').closest('.js-check').removeClass('active');
                $(this).closest('.js-check').addClass('active');
                // item.find('.radio').find('span').text('Add');

            } else {
                item.removeClass('active');
                // item.find('.radio').find('span').text('Unselect');
            }
        });

        $('.js-check :checkbox').change(function() {
            var check_attr_name = $(this).attr('name');
            if ($(this).is(':checked')) {
                $(this).closest('.js-check').addClass('active');
                // item.find('.radio').find('span').text('Add');
            } else {
                $(this).closest('.js-check').removeClass('active');
                // item.find('.radio').find('span').text('Unselect');
            }
        });

        if ($('[data-toggle="tooltip"]').length > 0) { // check if element exists
            $('[data-toggle="tooltip"]').tooltip()
        } // end if

        /*--------------------------
            ScrollUp
        ---------------------------- */
        $.scrollUp({
            scrollText: '<div class="bg-blue"><i class="fa fa-arrow-up"></i></div>',
            easingType: 'linear',
            scrollSpeed: 900,
            animation: 'fade'
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

         /*---------------------
            Image Zoom
        --------------------- */

        $('#zoomimg').width(200);  
        $('#zoomimg').mouseover(function () {  
        $(this).css("cursor", "pointer");  
        $(this).animate({ 
            width: "500px" 
        }, 600);  
        });  
        $('#zoomimg').mouseout(function () {  
        $(this).animate({ 
            width: "200px" 
        }, 600);  
        });  


    });

    
    /*---------------------------
       Menu Fixed On Scroll Active
    ------------------------------ */
    $(window).scroll(function() {
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

    $(window).on('load', function(event) {
        $('#preloader').delay(500).fadeOut(500);
    });

    


}(jQuery));