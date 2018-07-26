<?php

require_once '../basedados.php';

$service = mysqli_real_escape_string($database, $_POST['sid']);
$resource = mysqli_real_escape_string($database, $_POST['rid']);
$client = mysqli_real_escape_string($database, $_POST['cid']);
$datetime_appointment = mysqli_real_escape_string($database, $_POST['datetime']);

$query = "INSERT INTO schedule (id_client, id_resource, id_service, datetime)
VALUES ('$client', '$resource', '$service', '$datetime_appointment');";

$execute_query = mysqli_query($database, $query);

if($execute_query)
{
  echo "success";
}

?>
