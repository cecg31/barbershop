$( document ).ready(function() {

	var array=checkLink();
	var id_resource = array['id_resource'];
	
	//hide or show holidays boxes
	$('#holidays').on('click', function() {
		$( ".date_holiday" ).toggleClass("holidays_date");
	})

	//pre-visualizar foto
	 function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#image_upload_preview').attr('src', e.target.result);
	            }

	            reader.readAsDataURL(input.files[0]);
	        }
	    }

	$("#photo").change(function () {
	    readURL(this);
	});
	
	function editResources()
	{

		$.ajax({

			 type: "GET",
			 url: "controllers/resources/read_resources_edit.php",
			 data: {id_resource:id_resource},
		   	 dataType: 'json',
			 success: function(data)
			 {

				 var src1 = 'uploads/' + data.resource_photo;
				 $("#image_upload_preview").attr("src", src1);

				 $('#name').val(data.resource_name);
				 $('#data-date').val(data.resource_date);
				 $('#time_begin').val(data.resource_start_hour);
				 $('#time_end').val(data.resource_end_hour);
				 $('#holidays_begin').val(data.resource_holidays_begin);
				 $('#holidays_end').val(data.resource_holidays_end);
				
				 if (data.resource_holidays_begin !== ''){
					 $( ".date_holiday" ).removeClass("holidays_date");
					 $('input[type=checkbox]').attr('checked', true);
				 }
			 }

		})

	}
	
	editResources();

	 $("form#resources-form").submit(function(e) {
	         e.preventDefault();
	         var formData = new FormData(this);

			 formData.append("id_resource", id_resource);

	         $.ajax({
	             url: "controllers/resources/update_resource.php",
	             type: 'POST',
	             data: formData,
	             success: function (data) {
		             swal( 'Dados atualizados com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view_resources";

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
	 			 url: "controllers/resources/delete_resource.php",
	 			 data: {id_resource:id_resource},
	 		   	 dataType: 'json',
	 			 success: function(data)
	 			 {
		             swal( 'Recurso removido com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view_resources";

		                 }, 1500);
	 			 }
	 		   });
	 	});

		$('.cancel-btn').on('click', function () {
			window.location.hash = 'view=view_resources';
		});
 })
