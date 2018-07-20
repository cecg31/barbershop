<?php


require_once 'basedados.php';

$clients_data ="SELECT clients.*, notification.* FROM clients LEFT JOIN notification ON clients.notification = notification.id_notification WHERE active = '1' ORDER BY id_client ASC";

$executar_query = mysqli_query($database, $clients_data);

$data_client = array();

            while($row=mysqli_fetch_array($executar_query)) 
			{

              $client = array();
			  $client['client_id'] = $row['id_client'];
              $client['client_name'] = $row['name'];
              $client['client_date'] = $row['birth_date'];
              $client['client_address'] = $row['address'];
              $client['client_email'] = $row['email'];
			  $client['client_phone'] = $row['phone'];
			  $client['client_nif'] = $row['nif'];
			  $client['client_notification'] = $row['nome'];
			  $client['client_photo'] = $row['photo'];

              array_push($data_client, $client);

            }

            echo json_encode($data_client);
			
?>