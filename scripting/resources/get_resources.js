$( document ).ready(function() {

	function getResources()
	{

		$.ajax({

			 type: "GET",
			 url: "controllers/resources/read_resources.php",
		   	 dataType: 'json',
			 success: function(data)
			 {
				 $('#data').html('');
			     for (var i = 0; i < data.length; i++)
			     {
					 var begin_date = data[i].resource_holidays_begin;
					 var end_date = data[i].resource_holidays_end;
					 
					 if (begin_date == '') {
						 begin_date = " - ";
					 }
					 
					 if (end_date == '') {
						 end_date = " - ";
					 }

					 var table_tr = "<tr resourcecode='"+ data[i].resource_id +"'>"+
					 					"<td><img src='uploads/"+data[i].resource_photo+"' alt='photo'  width='24px'></td>" +
		    		 					"<td>"+ data[i].resource_name +"</td> "+
										"<td>"+ data[i].resource_date +"</td> "+
										"<td>"+ data[i].resource_start_hour + " - " + data[i].resource_end_hour + "</td> "+
										"<td>"+ begin_date + " até " + end_date  +"</td> "+
										"<td><img src='graphics/icons/edit.png' width='24px' alt='edit'></td> "+
					 				"</tr>";

					$('#data').append(table_tr);
			     }

			 }

		   });

	}

	getResources();

	$('tbody').on('click', 'tr', function () {
		var id_resource = $(this).attr('resourcecode');
		window.location.hash = 'view=edit_resources&id_resource='+id_resource;
	})

});
