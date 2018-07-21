<?php
$id_client = $_GET['id_client'];

	require_once '../basedados.php';
	
	$query ="SELECT clients.*, notification.* FROM clients LEFT JOIN notification ON clients.notification = notification.id_notification  WHERE id_client = $id_client ORDER BY id_client ASC";
	
	$executar_query = mysqli_query($database, $query);
	
	            while($row=mysqli_fetch_array($executar_query)) 
				{
				  $client['client_id'] = $row['id_client'];
	              $client['client_name'] = $row['name'];
	              $client['client_date'] = $row['birth_date'];
	              $client['client_address'] = $row['address'];
	              $client['client_email'] = $row['email'];
				  $client['client_phone'] = $row['phone'];
				  $client['client_nif'] = $row['nif'];
				  $client['client_notification'] = $row['nome'];
				  $client['client_notification_value'] = $row['notification'];
				  $client['client_photo'] = $row['photo'];

	            }

	            echo json_encode($client);
				
						
?>