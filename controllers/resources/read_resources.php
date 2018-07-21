<?php

require_once '../basedados.php';

$resources_data ="SELECT * FROM resources WHERE active = '1' ORDER BY id_resource ASC";

$executar_query = mysqli_query($database, $resources_data);

$data_resource = array();

            while($row=mysqli_fetch_array($executar_query))
			{

              $resource = array();
			  $resource['resource_id'] = $row['id_resource'];
              $resource['resource_name'] = $row['name'];
              $resource['resource_date'] = $row['birth_date'];
              $resource['resource_start_hour'] = $row['start_hour'];
              $resource['resource_end_hour'] = $row['end_hour'];
			  $resource['resource_holidays_begin'] = $row['holidays_begin'];
			  $resource['resource_holidays_end'] = $row['holidays_end'];
			  $resource['resource_photo'] = $row['photo_resources'];

              array_push($data_resource, $resource);

            }

            echo json_encode($data_resource);

?>
