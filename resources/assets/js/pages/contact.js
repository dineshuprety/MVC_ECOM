(function () {
    'use strict';
   
SHOPIFYNEPAL.validation.contact = function (){

    $("form").submit(function (event) {
        var formData = {
          name: $("#name").val(),
          email: $("#email").val(),
          subject: $("#subject").val(),
          message: $("#message").val(),
          token: $("#token").val(),
        };
       
        // $(".help-block").remove();
        $.ajax({
          type: "POST",
          url: "/contact/store",
          data: formData,
          dataType: "json",
          encode: true,
        }).done(function (data) {

          // console.log(data);

          if (!data.success) {
            if (data.errors.name) {
             
              $("#names").text(data.errors.name);
            }
    
            if (data.errors.email) {
               
                $("#emails").text(data.errors.email);
               
            }

            if (data.errors.subject) {
               
                $("#subjects").text(data.errors.subject);
                
              }
    
            if (data.errors.message) {
              
                $("#messages").text(data.errors.message);
               
            }
            setTimeout(function(){
              $(".form-messege").remove();
            }, 2000);
            
          } else {
                $(".notify").css("display", 'block').delay(4000).slideUp(300)
                .html(data.success);
                setTimeout(function(){
                  $("#myform")[0].reset();
                }, 2000);
                
          }
        })
        .fail(function (data) {
          $("form").html(
            '<div class="alert alert-danger">Could not reach server, please try again later.</div>'
          );
        });
    
        event.preventDefault();
      });
   
}


})();