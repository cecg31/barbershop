<?php


require_once '../basedados.php';

$schedule_query ="SELECT schedule.*, services.time, ADDTIME(schedule.datetime, services.time) as enddate
FROM barbershop.schedule
LEFT JOIN services ON schedule.id_service = services.id_service order by datetime;";

  $executar_query = mysqli_query($database, $schedule_query);

  $schedule_data = array();

            while($row=mysqli_fetch_array($executar_query))
			      {
              $appointment = array();
              $appointment['schedule_date'] = $row['datetime'];
      			  $appointment['end_date'] = $row['enddate'];
      			  $appointment['time_need'] = $row['time'];
              array_push($schedule_data, $appointment);
            }


                $spots_available = array();
                $time_needed = $_GET['timespent'];
                $opening_hour = strtotime("2018-07-21 07:00:00.0");
                $closing_hour = strtotime("2018-07-21 23:59:00.0");
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
                  array_push($spots_available, $spot);

                }

            for ($i=0; $i < sizeof($schedule_data); $i++)
            {
              $j = $i + 1;
               $appoint_end = $schedule_data[$i]['end_date'];

               if ($i + 1 < sizeof($schedule_data))
               {
                  $appoint_next = $schedule_data[$j]['schedule_date'];
               }
               $temp_appoint_date = strtotime('+' . $time_needed . ' minutes',strtotime($appoint_end));

               if($temp_appoint_date <= strtotime($appoint_next) && $temp_appoint_date <= $closing_hour)
               {
                 //echo "vaga às " . $appoint_end . "<br>";
                 $spot = array();
                 $spot['spot_start'] = date('H:i', strtotime($appoint_end));
                 $spot['spot_end'] = date('H:i', strtotime($appoint_next));
                 array_push($spots_available, $spot);
               }

            }

            if($last_appoint_plus_time < $closing_hour)
            {
              //echo "vaga das " . date('H:i', strtotime($last_appoint)) . " até às " . date('H:i', $closing_hour) . "<br>";
              $spot = array();
              $spot['spot_start'] = date('H:i', strtotime($last_appoint));
              $spot['spot_end'] = date('H:i', $closing_hour);
              array_push($spots_available, $spot);
            }

            echo json_encode($spots_available);


?>
