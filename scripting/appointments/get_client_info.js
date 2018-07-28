$( document ).ready(function() {

function getClients()
{

		$.ajax({
			 type: "GET",
			 url: "controllers/clients/read_Clients.php",
		   dataType: 'json',
			 success: function(data)
			 {
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




function getResources()
{
		$.ajax({
			 type: "GET",
			 url: "controllers/resources/read_resources.php",
		   dataType: 'json',
			 success: function(data)
			 {
			     for (var i = 0; i < data.length; i++)
			     {
						  var option = "<option value='" + data[i].resource_id + "'>" + data[i].resource_name + "</option>";
	 	 					$('#resource-list-choice').append(option);
			     }
			 }

		   });

}

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

				 $('#cid-code').html(data.client_id);
				 $('#name').html(data.client_name);
				 $('#data-date').html(data.client_date);
				 $('#address').html(data.client_address);
				 $('#email').html(data.client_email);
				 $('#phone').html(data.client_phone);
				 $('#nif').html(data.client_nif);

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

	 			     for (var i = 0; i < data.length; i++)
	 			     {

							 var option = "<option sid='" + data[i].service_id + "' value='" + data[i].service_time + "'>" + data[i].service_name + "</option>";

	 						$('#service-list-choice').append(option);
	 			     }

	 			 }

	 		   });

}

/* TAB - JS */
$('.tab-options ul').on('click', 'li', function()
{
		var tab_to_toggle = $(this).attr('tab-toggle');
		$('.tab-options ul li').removeClass('tab-li-active');
		$(this).addClass('tab-li-active');
		$('.tab').removeClass('tab-active');
		$('.tab[tab-index="'+tab_to_toggle+'"]').addClass('tab-active');

});
/* TAB - JS END */

$('#check_availability').on('click', function()
{
		var date = $('#date_chosen').val();
		var hour = $('#time_begin').val();
		var datetime = date + " " + hour;
		var time_needed = $('#service-list-choice').val();
		var resource = $('#resource-list-choice').val();
		getConfirmation(datetime, time_needed, resource);

});

$('#insert_appointment').on('click', function()
{
	insertAppointment();
});

function getConfirmation(date, time_need, resource)
{
var url = "controllers/appointments/confirm_spot.php?date_choice="
+ date + "&time_need=" + time_need + "&resource=" + resource;
$.ajax({

	type: "GET",
	url: url,
	success: function(data)
	{
		if(data == "available")
		{
			 swal( 'Livre', 'Não existem marcações.', 'success');
			 $('#insert_appointment').css('visibility', "visible");
		}else
		{

			 swal({
				  title: 'Ups!',
					text: "Já existe marcação para essa hora, quer continuar?",
	 				type: "warning",
				  confirmButtonText:  'Sim',
				  cancelButtonText:  'Não',
				  showCancelButton: true,
				  showCloseButton: true,
				}).then(
       function () { $('#insert_appointment').css('visibility', "visible");},
       function () { return false; });
		}

	}

	});

}

function insertAppointment()
{
			var date = $('#date_chosen').val();
			var hour = $('#time_begin').val();
			var datetime = date + " " + hour;
			var sid = $('#service-list-choice option:selected').attr('sid');
			var resource = $('#resource-list-choice').val();
			var cid = $('#cid-code').html();

	 		$.ajax({

	 			 type: "POST",
	 			 url: "controllers/appointments/create_appointment.php",
	 		   data: {cid: cid, sid: sid,rid: resource, datetime: datetime,},
	 			 success: function(data)
	 			 {
					  swal( 'Sucesso', 'Marcação registada.', 'success');
						setTimeout(function(){

							window.location.href="main.php#view=appointments-table";

						}, 1500);
	 			 }

	 		   });

}

$('.datepicker').datepicker({
language: 'pt',
format: 'yyyy/mm/dd'

});

$('.clockpicker').clockpicker();


		getServices();
		getResources();
		getClients();

});
