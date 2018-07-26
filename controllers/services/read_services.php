<?php

require_once '../basedados.php';

$services_data ="SELECT * FROM services WHERE active = '1' ORDER BY id_service ASC";

$executar_query = mysqli_query($database, $services_data);

$data_services = array();

            while($row=mysqli_fetch_array($executar_query))
			{

              $service = array();
			        $service['service_id'] = $row['id_service'];
              $service['service_name'] = $row['name'];
              $service['service_time'] = $row['time'];
			        $service['service_color'] = $row['color'];
			        $service['service_price'] = $row['price'];

              array_push($data_services, $service);

            }

            echo json_encode($data_services);

?>
