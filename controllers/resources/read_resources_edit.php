<?php
$id_resource = $_GET['id_resource'];

	require_once '../basedados.php';
	
	$query ="SELECT * FROM resources WHERE id_resource = $id_resource ORDER BY id_resource ASC";
	
	$executar_query = mysqli_query($database, $query);
	
	            while($row=mysqli_fetch_array($executar_query)) 
				{
	  			  $resource['resource_id'] = $row['id_resource'];
                  $resource['resource_name'] = $row['name'];
                  $resource['resource_date'] = $row['birth_date'];
                  $resource['resource_start_hour'] = $row['start_hour'];
                  $resource['resource_end_hour'] = $row['end_hour'];
	  			  $resource['resource_holidays_begin'] = $row['holidays_begin'];
	  			  $resource['resource_holidays_end'] = $row['holidays_end'];
	  			  $resource['resource_photo'] = $row['photo_resources'];

	            }

	            echo json_encode($resource);
				
						
?>