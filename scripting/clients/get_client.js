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
										"<td><img src='graphics/icons/edit.png' width='24px' alt='edit'></td> "+
					 				"</tr>";

					$('#data').append(table_tr);
			     }

			 }

		   });

	}

	getClients();

	$('tbody').on('click', 'tr', function () {
		var id_client = $(this).attr('clientcode');
		window.location.hash = 'view=edit-client&id_client='+id_client;
	})
	
	$("#search").keyup(function () {
	    var value = this.value.toLowerCase().trim();

	    $("table tr").each(function (index) {
	        if (!index) return;
	        $(this).find("td").each(function () {
	            var id = $(this).text().toLowerCase().trim();
	            var not_found = (id.indexOf(value) == -1);
	            $(this).closest('tr').toggle(!not_found);
	            return not_found;
	        });
	    });
	});

});
