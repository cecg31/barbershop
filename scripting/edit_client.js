$( document ).ready(function() {
	
	var array=checkLink();
	var id_client = array['id_client'];
	
	function editClients()
	{

		$.ajax({

			 type: "GET",
			 url: "controllers/edit_client.php",
			 data: {id_client:id_client},
		   	 dataType: 'json',
			 success: function(data)
			 {
				 
				 var src1 = 'uploads/' + data.client_photo;
				 $("#image_upload_preview").attr("src", src1);
					
				 $('#name').val(data.client_name); 
				 $('#data-date').val(data.client_date);
				 $('#address').val(data.client_address); 
				 $('#email').val(data.client_email); 
				 $('#phone').val(data.client_phone); 
				 $('#nif').val(data.client_nif);
				 
				 var notification = data.client_notification_value;
				 // alert (notification);
				 
				$('input[type=radio][value='+notification+']').attr('checked', true); 
			 }

				 })

		  	 }
	 editClients();	  
	 
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
	 
	 $("form#clients-form").submit(function(e) { 
	         e.preventDefault();     
	         var formData = new FormData(this); 
   		  	 
			 formData.append("id_client", id_client);
			 
	         $.ajax({ 
	             url: "controllers/updateClient.php", 
	             type: 'POST', 
	             data: formData, 
	             success: function (data) { 
		             swal( 'Dados atualizados com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view-client";

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
	 			 url: "controllers/delete_client.php",
	 			 data: {id_client:id_client},
	 		   	 dataType: 'json',
	 			 success: function(data)
	 			 {
		             swal( 'Cliente removido com sucesso.', 'Aguarde', 'success');

		                 setTimeout(function(){

		                   window.location.href="main.php#view=view-client";

		                 }, 1500);
	 			 }
	 		   });
	 	});
		
		$('.cancel-btn').on('click', function () { 
			window.location.hash = 'view=view-client';
		});
 })
	
	
