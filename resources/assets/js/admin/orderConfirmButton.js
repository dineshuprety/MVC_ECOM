(function () {
    'use strict';
    SHOPIFYNEPAL.admin.confirmButtonsOrders = function (){
    
        $(document).on('click','.confirm',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            $('#confirm').modal('show').on('click', '#confirm-btn', function () {
                $("#confirm-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                setTimeout(function(){
                    window.location.href = link;
                },100);
               
            });
        });

        $(document).on('click','.processing',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            $('#processing').modal('show').on('click', '#processing-btn', function () {
                $("#processing-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                setTimeout(function(){
                    window.location.href = link;
                },100);
               
            });
        });

        $(document).on('click','.picked',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            $('#picked').modal('show').on('click', '#picked-btn', function () {
                $("#picked-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                setTimeout(function(){
                    window.location.href = link;
                },100);
               
            });
        });

        $(document).on('click','.shipped',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            $('#shipped').modal('show').on('click', '#shipped-btn', function () {
                $("#shipped-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                setTimeout(function(){
                    window.location.href = link;
                },100);
               
            });
        });
        $(document).on('click','.delivered',function(e){
            e.preventDefault();
            var link = $(this).attr("href");
            $('#delivered').modal('show').on('click', '#delivered-btn', function () {
                $("#delivered-btn").html("<i class='icon ion-loading-c'></i>").attr("disabled", true);
                setTimeout(function(){
                    window.location.href = link;
                },100);
               
            });
        });
        
    };

})();