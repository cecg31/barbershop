<?php
$id_service = $_GET['id_service'];

	require_once '../basedados.php';
	
	$query ="SELECT * FROM services WHERE id_service = $id_service";
	
	$executar_query = mysqli_query($database, $query);
	
	            while($row=mysqli_fetch_array($executar_query)) 
				{
	  			  $service['service_id'] = $row['id_service'];
		          $service['service_name'] = $row['name'];
		          $service['service_time'] = $row['time'];
	  			  $service['service_color'] = $row['color'];
				  $service['service_price'] = $row['price'];
			  
	            }

	            echo json_encode($service);
				
						
?>