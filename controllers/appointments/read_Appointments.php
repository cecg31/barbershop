<?php


require_once '../basedados.php';

$today_date =  date("Y/m/d H:i:s");
$operator = " >= ";
if(isset($_POST['custom_date']))
{
  $today_date = mysqli_real_escape_string($database, $_POST['custom_date']);
  $operator = " = ";
}



$schedule_query ="SELECT schedule.*, clients.name, clients.photo, resources.name as resource_name, services.name as service_name, services.time,ADDTIME(schedule.datetime, services.time) as enddate
FROM schedule
LEFT JOIN clients
ON schedule.id_client = clients.id_client
LEFT JOIN resources
ON schedule.id_resource = resources.id_resource
LEFT JOIN services
ON schedule.id_service = services.id_service WHERE DATE(schedule.datetime)" . $operator . "'$today_date'";

    if(isset($_POST['resource']))
    {
      $resource_id = mysqli_real_escape_string($database, $_POST['resource']);
      if($resource_id != "none")
      {
          $schedule_query .= " AND schedule.id_resource = " . $resource_id;
      }
    }

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
              $appointment['enddate'] = $row['enddate'];
              $appointment['onlyhour_sch_date'] = date('H:i', strtotime($row['datetime']));
              $appointment['onlyhour_enddate'] = date('H:i', strtotime($row['enddate']));

              array_push($schedule_data, $appointment);

            }

            echo json_encode($schedule_data);

?>
