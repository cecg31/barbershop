<?php

require_once '../basedados.php';

if(isset($_GET['date_selection']))
{
  $date_appointment = $_GET['date_selection'];
}
else
{
  exit();
}



$resources_available ="SELECT * from resources";

if(isset($_GET['resource']))
{
  $resource_id = mysqli_real_escape_string($database, $_GET['resource']);
  if($resource_id != "none")
  {
      $resources_available .= " WHERE id_resource = " . $resource_id;
  }
}

$executar_query_resources = mysqli_query($database, $resources_available);

            $resource_data = array();

            while($row=mysqli_fetch_array($executar_query_resources))
			      {
                $resource = array();
                $resource['enter_hour'] = $row['start_hour'];
        			  $resource['end_hour'] = $row['end_hour'];
        			  $resource['resource_code'] = $row['id_resource'];
                $resource['resource_name'] = $row['name'];
                array_push($resource_data, $resource);
            }

    $spots_available = array();

    for ($d=0; $d < sizeof($resource_data) ; $d++)
    {

      $opening_hour = strtotime($date_appointment . $resource_data[$d]['enter_hour']);
      $closing_hour = strtotime($date_appointment . $resource_data[$d]['end_hour']);

      $resource = $resource_data[$d]['resource_code'];
      $resource_name = $resource_data[$d]['resource_name'];

      $schedule_query ="SELECT schedule.*, services.time, ADDTIME(schedule.datetime, services.time) as enddate
      FROM barbershop.schedule
      LEFT JOIN services
      ON schedule.id_service = services.id_service
      WHERE DATE(schedule.datetime) = '$date_appointment'
      AND id_resource = '$resource'
      ORDER BY datetime;";

        $executar_query = mysqli_query($database, $schedule_query);

              if(mysqli_num_rows($executar_query) > 0)
              {
                $schedule_data = array();

                while($row=mysqli_fetch_array($executar_query))
                {
                    $appointment = array();
                    $appointment['schedule_date'] = $row['datetime'];
                    $appointment['end_date'] = $row['enddate'];
                    $appointment['time_need'] = $row['time'];
                    array_push($schedule_data, $appointment);
                }

                    //GET MINUTES OUT
                    $time_to_minutes= $_GET['timespent'];
                    $time_explode = explode(':', $time_to_minutes);
                    $time_needed = ($time_explode[0] * 60.0 + $time_explode[1] * 1.0);


                    $appoint_plus_opening = strtotime('+' . $time_needed . ' minutes', $opening_hour);
                    $first_appoint = $schedule_data[0]['schedule_date'];
                    $last_appoint = $schedule_data[sizeof($schedule_data) - 1]['schedule_date'];
                    $last_appoint_plus_time = strtotime('+' . $time_needed . ' minutes', strtotime($last_appoint));

                    $time = strtotime($first_appoint);

                    if($appoint_plus_opening < $time)
                    {
                      //echo "vaga das " . date('H:i', $opening_hour) . " até às " . $first_appoint . "<br>";
                      $spot = array();
                      $spot['spot_start'] = date('H:i', $opening_hour);
                      $spot['spot_end'] = date('H:i', strtotime($first_appoint));
                      $spot['resource_code'] = $resource;
                      $spot['resource_name'] = $resource_name;
                      array_push($spots_available, $spot);

                    }

                for ($i=0; $i < sizeof($schedule_data); $i++)
                {
                   $j = $i + 1;
                   $appoint_end = $schedule_data[$i]['end_date'];

                   if (isset($schedule_data[$j]))
                   {
                      $appoint_next = $schedule_data[$j]['schedule_date'];
                   }
                   else
                   {
                      $appoint_next = $closing_hour;
                   }

                   $temp_appoint_date = strtotime('+' . $time_needed . ' minutes',strtotime($appoint_end));

                   if($temp_appoint_date <= strtotime($appoint_next) && $temp_appoint_date <= $closing_hour)
                   {
                     //echo "vaga às " . $appoint_end . "<br>";
                     $spot = array();
                     $spot['spot_start'] = date('H:i', strtotime($appoint_end));
                     $spot['spot_end'] = date('H:i', strtotime($appoint_next));
                     $spot['resource_code'] = $resource;
                     $spot['resource_name'] = $resource_name;
                     array_push($spots_available, $spot);
                   }

                }

                if($last_appoint_plus_time < $closing_hour)
                {
                  //echo "vaga das " . date('H:i', strtotime($last_appoint)) . " até às " . date('H:i', $closing_hour) . "<br>";
                  $spot = array();
                  $spot['spot_start'] = date('H:i', $last_appoint_plus_time);
                  $spot['spot_end'] = date('H:i', $closing_hour);
                  $spot['resource_code'] = $resource;
                  $spot['resource_name'] = $resource_name;
                  array_push($spots_available, $spot);
                }

              }
              else
              {
                $spot = array();
                $spot['spot_start'] = date('H:i', $opening_hour);
                $spot['spot_end'] = date('H:i', $closing_hour);
                $spot['resource_code'] = $resource;
                $spot['resource_name'] = $resource_name;
                array_push($spots_available, $spot);
              }


    }

echo json_encode($spots_available);

?>
