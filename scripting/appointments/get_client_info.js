$( document ).ready(function() {

	function getClients()
	{

		$.ajax({

			 type: "GET",
			 url: "controllers/clients/read_Clients.php",
		   	 dataType: 'json',
			 success: function(data)
			 {
				 		$('#data').html('');
			     for (var i = 0; i < data.length; i++)
			     {

					 var table_tr = "<tr clientcode='"+ data[i].client_id +"' class='dataClient'>"+
					 					"<td><img src='uploads/"+data[i].client_photo+"' alt='photo'  width='24px'></td>" +
		    		 					"<td>"+ data[i].client_name +"</td> "+
										"<td>"+ data[i].client_date +"</td> "+
										"<td>"+ data[i].client_address +"</td> "+
										"<td>"+ data[i].client_email +"</td> "+
										"<td>"+ data[i].client_phone +"</td> "+
										"<td>"+ data[i].client_nif +"</td> "+
										"<td>"+ data[i].client_notification +"</td> "+
										"<td><img src='graphics/icons/edit.png' width='24px' alt='edit'></td> " +
					 				"</tr>";

										$('#data').append(table_tr);
			     }

			 }

		   });

	}

	getClients();

		$('tbody').on('click', 'tr', function () {
			var id_client = $(this).attr('clientcode');

		$.ajax({

			 type: "GET",
			 url: "controllers/clients/read_Client_edit.php",
			 data: {id_client:id_client},
		   dataType: 'json',
			 success: function(data)
			 {

				 var src1 = 'uploads/' + data.client_photo;
				 $("#image_upload_preview").attr("src", src1);

				 $('#name').html(data.client_name);
				 $('#data-date').html(data.client_date);
				 $('#address').html(data.client_address);
				 $('#email').html(data.client_email);
				 $('#phone').html(data.client_phone);
				 $('#nif').html(data.client_nif);

				 //var notification = data.client_notification_value;
				 // alert (notification);

				//$('input[type=radio][value='+notification+']').attr('checked', true);
				$('#search-for-client').fadeOut();
				$('.tab-options ul li[tab-toggle="1"]').html("Cliente");
				$('#client-info').fadeIn();
			 }

		 });

		 });


		 function getServices()
	 	{

	 		$.ajax({

	 			 type: "GET",
	 			 url: "controllers/services/read_services.php",
	 		   	 dataType: 'json',
	 			 success: function(data)
	 			 {
	 				 $('#data').html('');
	 			     for (var i = 0; i < data.length; i++)
	 			     {

						var option = "<option sid='" + data[i].service_id + "' value='" + data[i].service_time + "'>" + data[i].service_name + "</option>";

	 					$('#service-list-choice').append(option);
	 			     }

	 			 }

	 		   });

	 	}

		getServices();

});
