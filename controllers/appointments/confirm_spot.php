<?php


require_once '../basedados.php';


$date_choice = mysqli_real_escape_string($database, $_GET['date_choice']);
$time_to_minutes = mysqli_real_escape_string($database, $_GET['time_need']);
$resource = mysqli_real_escape_string($database, $_GET['resource']);

$time_explode = explode(':', $time_to_minutes);
$extract_minutes = ($time_explode[0] * 60.0 + $time_explode[1] * 1.0);

$date_end_task = strtotime('+' . $extract_minutes . ' minutes', strtotime($date_choice));
$date_plus_service_time = date('Y/m/d H:i:s', $date_end_task);

$schedule_query ="SELECT schedule.*, services.time, ADDTIME(schedule.datetime, services.time) as enddate
FROM barbershop.schedule
LEFT JOIN services
ON schedule.id_service = services.id_service
WHERE datetime >= '$date_choice' and datetime < '$date_plus_service_time' and id_resource = '$resource';";

  $executar_query = mysqli_query($database, $schedule_query);

  $result = mysqli_num_rows($executar_query);

  if($result > 0)
  {
    echo "not_available";
  }
  else
  {
    echo "available";
  }

?>
