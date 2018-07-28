$( document ).ready(function() {

	function getAppointments()
	{

		$.ajax({

				type: "GET",
			 	url: "controllers/appointments/read_Appointments.php",
		   	dataType: 'json',
			  success: function(data)
			  {
				 	 $('#data').html('');
			     for (var i = 0; i < data.length; i++)
			     {

					 		var table_tr = "<tr appointmentcode='"+ data[i].schedule_id +"' class='dataClient'>"+
					 					"<td><img src='uploads/"+data[i].client_photo+"' alt='photo'  width='24px'></td>" +
		    		 				"<td>"+ data[i].client_name +"</td> "+
										"<td>"+ data[i].user_responsable +"</td> "+
										"<td>"+ data[i].service_type +"</td> "+
										"<td>"+ data[i].schedule_date +"</td> "+
										"<td>"+ data[i].time_need +" min</td> "+
										"<td><img src='graphics/icons/edit.png' width='24px' alt='edit'></td> "+
					 					"<td><img src='graphics/icons/x-button.png' width='24px' alt='delete'></td></td> "+
					 				"</tr>";

						$('#data').append(table_tr);
			     }

			 }

		   });

	}

	getAppointments();

	$('tbody').on('click', 'tr', function () {
		var id_client = $(this).attr('appointmentcode');
		window.location.hash = 'view=edit-client&id_client='+id_client;
	})
});
