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
			     }

				 })

		  	 }
	 editClients();	  
	})
	
