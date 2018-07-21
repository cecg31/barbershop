<?php
$id_client = $_POST['id_client'];
	

require_once '../basedados.php';

$clients_data ="UPDATE clients SET active = '0' WHERE id_client = $id_client";

$executar_query = mysqli_query($database, $clients_data);
echo "true";
?>