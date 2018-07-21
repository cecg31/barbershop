$( document ).ready(function() {

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
					 
					 var table_tr = "<tr servicecode='"+ data[i].service_id +"' style='background-color:#"+data[i].service_color+";'>"+
		    		 					"<td>"+ data[i].service_name +"</td> "+
										"<td>"+ data[i].service_time +"</td> "+
										"<td><img src='graphics/icons/edit.png' width='24px' alt='edit'></td> "+
					 				"</tr>";

					$('#data').append(table_tr);
			     }

			 }

		   });

	}

	getServices();

	$('tbody').on('click', 'tr', function () {
		var id_service = $(this).attr('servicecode');
		window.location.hash = 'view=edit_services&id_service='+id_service;
	})

});
