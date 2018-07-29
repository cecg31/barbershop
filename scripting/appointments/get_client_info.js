
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


	function getAppointmentsBooked(date_selected)
	{

			$.ajax({
				 type: "POST",
				 url: "controllers/appointments/read_Appointments.php",
				 data:{custom_date:date_selected},
			   dataType: 'json',
				 success: function(data)
				 {
					 	$('#already-booked').html('');
				     for (var i = 0; i < data.length; i++)
				     {
						 var table_tr = "<tr>"+
						 								"<td>" + data[i].user_responsable + "</td>" +
						 								"<td>" + data[i].onlyhour_sch_date + "</td>" +
			    		 							"<td> " + data[i].onlyhour_enddate + " </td>" + "</tr>";
								$('#already-booked').append(table_tr);
				     }
				 }

			   });

		}

		function getAppointmentsHoles(date_selected, time_needed)
		{

				$.ajax({
					 type: "POST",
					 url: "controllers/appointments/find_spot.php?date_selection=" + date_selected + "&timespent=" + time_needed,
				   dataType: 'json',
					 success: function(data)
					 {
						 	$('#book-spots').html('');
					     for (var i = 0; i < data.length; i++)
					     {
							 var table_tr = "<tr>"+
							 								"<td>" + data[i].spot_start + "</td>" +
							 								"<td>" + data[i].spot_end + "</td>" +
				    		 							"<td>Usar</td>" + "</tr>";
									$('#book-spots').append(table_tr);
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

$( document ).ready(function() {

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

/* CHECK IF AVAILABLE*/
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

/* DATE CHANGES - GET APPOINTMENTS */
$('#date_chosen').on('change', function()
{
	var date_selected = $('#date_chosen').val();
	var time_needed = $('#service-list-choice option:selected').val();
	if(date_selected.length > 0)
	{
		getAppointmentsBooked(date_selected);
		if(time_needed.length > 0)
		{
			getAppointmentsHoles(date_selected, time_needed);
		}

	}

});

$('#service-list-choice').on('change', function()
{
	var date_selected = $('#date_chosen').val();
	var time_needed = $('#service-list-choice option:selected').val();
	if(date_selected.length > 0 && time_needed.length > 0)
	{
			getAppointmentsHoles(date_selected, time_needed);
	}

});



$('.datepicker').datepicker({
language: 'pt',
format: 'yyyy/mm/dd'

});

$('.clockpicker').clockpicker();


		getServices();
		getResources();
		getClients();


});
