$( document ).ready(function() {

	var array=checkLink();
	var id_service = array['id_service'];
	
	function editServices()
	{
		$.ajax({

			 type: "GET",
			 url: "controllers/services/read_services_edit.php",
			 data: {id_service:id_service},
		   	 dataType: 'json',
			 success: function(data)
			 {

				 $('#name').val(data.service_name);
				 $('#color').val(data.service_color);
				 $('#time').val(data.service_time);
				 
				 $("#color").css("background-color","#" + data.service_color);
	
			 }

		})

	}
	
	editServices();

	 $("form#services-form").submit(function(e) {
	         e.preventDefault();
	         var formData = new FormData(this);

			 formData.append("id_service", id_service);

	         $.ajax({
	             url: "controllers/services/update_services.php",
	             type: 'POST',
	             data: formData,
	             success: function (data) {
		             swal( 'Dados atualizados com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view_services";

		                 }, 1500);
	             },
	             cache: false,
	             contentType: false,
	             processData: false
	         });
	     });

	 	$('.remove-btn').on('click', function () {
	 		$.ajax({

	 			 type: "POST",
	 			 url: "controllers/services/delete_service.php",
	 			 data: {id_service:id_service},
	 		   	 dataType: 'json',
	 			 success: function(data)
	 			 {
		             swal( 'Serviço removido com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view_services";

		                 }, 1500);
	 			 }
	 		   });
	 	});

		$('.cancel-btn').on('click', function () {
			window.location.hash = 'view=view_services';
		});
 })
