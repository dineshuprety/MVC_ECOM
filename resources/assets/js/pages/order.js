(function () {
	'use strict';

	

	SHOPIFYNEPAL.order.cash = function () {

		$("#cashOrder").submit(function (e) {

			$("button").html("<i class='icon ion-loading-c'></i> Placing Order").attr("disabled", true);
			$.ajax({
				type: 'POST',
				url: '/cash/order',
				data: new FormData(this),
				contentType: false,
    	    	cache: false,
				processData:false,	
				success: function (data) {

					var response = jQuery.parseJSON(data);
					// $("button").html("<i class='icon ion-loading-c'></i> Placing Order");
						$("#cashOrder")[0].reset();
						$(".notify").css("display", 'block').delay(5000).slideUp(300)
                        .html(response.success);
						$("button").html("Submit Order").attr("disabled", true);
						setTimeout(function(){
							window.location.href = "/";
						},4000);	
						
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$("button").html("Submit Order");
					$(".notifyerror").css("display", 'block').delay(4000).slideUp(300)
                        .html(ul);
				}
			});

			e.preventDefault();
		})

	}


})();