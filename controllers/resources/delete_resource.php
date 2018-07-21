<?php
$id_resource = $_POST['id_resource'];
	

require_once '../basedados.php';

$resources_data ="UPDATE resources SET active = '0' WHERE id_resource = $id_resource";

$executar_query = mysqli_query($database, $resources_data);
echo "true";
?>