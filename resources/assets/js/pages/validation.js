(function () {
	'use strict';

	SHOPIFYNEPAL.validation.register = function () {

		$("#register").submit(function (e) {
			
			var formData = {
				fullname: $("#fullname").val(),
				email: $("#email").val(),
				username: $("#username").val(),
				phonenumber: $("#phonenumber").val(),
				password: $("#password").val(),
				token: $("#token").val(),
			};
			$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
			$.ajax({
				type: 'POST',
				url: '/register',
				data: formData,
				success: function (data) {
					var response = jQuery.parseJSON(data);
					
					// $("button").html("<i class='icon ion-loading-c'></i> Loading");
						setTimeout(function(){
							$("#register")[0].reset();
							$(".notify").css("display", 'block').delay(6000).slideUp(300)
                        .html(response.success);
								$("button").html("Register");
						},1000);	
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$("button").html("Register");
						$(".notification-register").css("display", 'block').removeClass('alert-success')
							.addClass('alert-danger').delay(6000).slideUp(300)
							.html(ul);
				}
			});

			e.preventDefault();
		})

	}

	SHOPIFYNEPAL.validation.wholeser = function () {

		$("#wholeser").submit(function (e) {

			$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
			$.ajax({
				type: 'POST',
				url: '/wholeser/details',
				data: new FormData(this),
				contentType: false,
    	    	cache: false,
				processData:false,	
				success: function (data) {

					var response = jQuery.parseJSON(data);
					
						setTimeout(function(){
							$("#wholeser")[0].reset();
							$("#mainThmb").hide();
							$(".notify").css("display", 'block').delay(4000).slideUp(300)
                        .html(response.success);
								$("button").html("Inquery");
						},2000);	
						
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$("button").html("Inquery");
					$(".notification-wregister").css("display", 'block').removeClass('alert-success')
						.addClass('alert-danger').delay(6000).slideUp(300)
						.html(ul);
				}
			});

			e.preventDefault();
		})

	}

	SHOPIFYNEPAL.validation.login = function () {

		$("#login").submit(function (e) {

			var formData = {
				username: $("#username").val(),
				password: $("#password").val(),
				token: $('#token').val(),
			};

			$.ajax({
				type: 'POST',
				url: '/login',
				data: formData,
				success: function (data) {
					const response = jQuery.parseJSON(data);

					if(response ==='admin'){
						$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
						setTimeout(' window.location.href = "/admin"; ',2000);
	  					//redirect url in this page
     				}else if(response ==='cart'){
						$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
						setTimeout(' window.location.href = "/cart"; ',2000);
	  					//redirect url in this page
     				}else{
						$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
						setTimeout(' window.location.href = "/"; ',2000);
					 }

				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$(".notification-login").css("display", 'block').removeClass('alert-success')
						.addClass('alert-danger').delay(6000).slideUp(300)
						.html(ul);
				}
			});

			e.preventDefault();
		})
		

	}

	SHOPIFYNEPAL.validation.changeinformation = function () {

		$("#chnageinformation").submit(function (e) {

			var formData = {
				fullname: $("#fullname").val(),
				email: $("#email").val(),
				address: $("#address").val(),
				phonenumber: $("#phonenumber").val(),
				token: $('.display-products').data('token'),
			};

			$.ajax({
				type: 'POST',
				url: '/user/changeinformation',
				data: formData,
				success: function (data) {
					var response = jQuery.parseJSON(data);
					$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
						setTimeout(function(){
							
							$(".notify").css("display", 'block').delay(4000).slideUp(300)
                        .html(response.success);
								$("button").html("Update Information");
						},2000);
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$(".notification").css("display", 'block').removeClass('alert-success')
						.addClass('alert-danger').delay(6000).slideUp(300)
						.html(ul);
				}
			});

			e.preventDefault();
		})
	}

	SHOPIFYNEPAL.validation.changepassword = function () {

		$("#changepassword").submit(function (e) {

			var formData = {
				password: $("#password").val(),
				confirmpassword: $("#confirmpassword").val(),
				token: $('.display-products').data('token'),
			};

			$.ajax({
				type: 'POST',
				url: '/user/changepassword',
				data: formData,
				success: function (data) {
					var response = jQuery.parseJSON(data);
					$("button").html("<i class='icon ion-loading-c'></i> Loading").attr("disabled", true);
						setTimeout(function(){
							$("#changepassword")[0].reset();
							$(".notify").css("display", 'block').delay(4000).slideUp(300)
                        .html(response.success);
								$("button").html("Change Password");
						},2000);
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$(".notification-password").css("display", 'block').removeClass('alert-success')
						.addClass('alert-danger').delay(6000).slideUp(300)
						.html(ul);
				}
			});

			e.preventDefault();
		})
	}


})();