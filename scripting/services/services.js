$(document).ready(function() {

	$("form#services-form").submit(function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);

	    $.ajax({
	        url: "controllers/services/create_service.php", 
	        type: 'POST',
	        data: formData,
	        success: function (data) {
				swal( 'Serviço inserido com sucesso!', 'Aguarde', 'success');

	                setTimeout(function(){

	                  window.location.href="main.php#view=view_services";

	                }, 1500);
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	});

	$('.cancel-btn').on('click', function () {
		window.location.hash = 'view=view_services';
	});
});