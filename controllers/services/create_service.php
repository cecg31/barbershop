<?php
	$nome = $_POST['name'];
	$cor = $_POST['color'];
	$tempo = $_POST['time'];
	
	require_once '../basedados.php';
	
	$query ="INSERT INTO `services` (`name`, `time`, `color`)
VALUES
	( '$nome', '$tempo', '$cor');";
	$executar_query = mysqli_query($database, $query);

?>