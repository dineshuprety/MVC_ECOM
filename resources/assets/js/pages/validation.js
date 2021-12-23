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

			$.ajax({
				type: 'POST',
				url: '/register',
				data: formData,
				success: function (data) {
					var response = jQuery.parseJSON(data);
					$("#register")[0].reset();
					$(".notification-register").css("display", 'block').addClass('alert-success').removeClass('alert-danger').delay(4000).slideUp(300)
						.html(response.success);
						
				},
				error: function (request, error) {
					var errors = jQuery.parseJSON(request.responseText);
					var ul = document.createElement('ul');
					$.each(errors, function (key, value) {
						var li = document.createElement('li');
						li.appendChild(document.createTextNode(value));
						ul.appendChild(li);
					});
					$(".notification-register").css("display", 'block').removeClass('alert-success')
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
					var response = jQuery.parseJSON(data);

					if(response ==='admin'){
						$("button").html("<i class='icon ion-loading-c'></i> Loading");
						setTimeout(' window.location.href = "/admin"; ',2000);
	  					//redirect url in this page
     				}else if(response ==='cart'){
						$("button").html("<i class='icon ion-loading-c'></i> Loading");
						setTimeout(' window.location.href = "/cart"; ',2000);
	  					//redirect url in this page
     				}else{
						$("button").html("<i class='icon ion-loading-c'></i> Loading");
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
					$(".notification").css("display", 'block').addClass('alert-success').removeClass('alert-danger').delay(4000).slideUp(300)
						.html(response.success);
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
					$(".notification-password").css("display", 'block').addClass('alert-success').removeClass('alert-danger').delay(4000).slideUp(300)
						.html(response.success);
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