<?php
$id_service = $_POST['id_service'];
	

require_once '../basedados.php';

$resources_data ="UPDATE services SET active = '0' WHERE id_service = $id_service";

$executar_query = mysqli_query($database, $resources_data);
echo "true";
?>