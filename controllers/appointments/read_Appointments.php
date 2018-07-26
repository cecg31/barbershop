<?php


require_once '../basedados.php';

$schedule_query ="SELECT schedule.*, clients.name, clients.photo, resources.name as resource_name, services.name as service_name, services.time
FROM schedule
LEFT JOIN clients
ON schedule.id_client = clients.id_client
LEFT JOIN resources
ON schedule.id_resource = resources.id_resource
LEFT JOIN services
ON schedule.id_service = services.id_service;";

  $executar_query = mysqli_query($database, $schedule_query);

  $schedule_data = array();

            while($row=mysqli_fetch_array($executar_query))
			{

              $appointment = array();
			        $appointment['schedule_id'] = $row['id_schedule'];
              $appointment['schedule_date'] = $row['datetime'];
              $appointment['client_name'] = $row['name'];
              $appointment['client_photo'] = $row['photo'];
              $appointment['user_responsable'] = $row['resource_name'];
      			  $appointment['service_type'] = $row['service_name'];
      			  $appointment['time_need'] = $row['time'];

              array_push($schedule_data, $appointment);

            }

            echo json_encode($schedule_data);

?>
