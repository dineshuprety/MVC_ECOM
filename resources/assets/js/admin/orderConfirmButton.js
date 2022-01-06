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

        $(document).on('click','#processing',function(e){
            $("button").html("<i class='icon ion-loading-c'></i> sending").attr("disabled", true);
            e.preventDefault();
            var link = $(this).attr("href");
            setTimeout(function(){
                window.location.href = link
            },500);
        });
        $(document).on('click','#picked',function(e){
            $("button").html("<i class='icon ion-loading-c'></i> sending").attr("disabled", true);
            e.preventDefault();
            var link = $(this).attr("href");
            setTimeout(function(){
                window.location.href = link
            },500);
        });
        $(document).on('click','#shipped',function(e){
            $("button").html("<i class='icon ion-loading-c'></i> sending").attr("disabled", true);
            e.preventDefault();
            var link = $(this).attr("href");
            setTimeout(function(){
                window.location.href = link
            },500);
        });
        $(document).on('click','#delivered',function(e){
            $("button").html("<i class='icon ion-loading-c'></i> sending").attr("disabled", true);
            e.preventDefault();
            var link = $(this).attr("href");
            setTimeout(function(){
                window.location.href = link
            },500);
        });
        
    };

})();