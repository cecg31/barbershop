<?php
	$nome = $_POST['name'];
	$cor = $_POST['color'];
	$tempo = $_POST['time'];
	$preco = $_POST['price'];
	
	require_once '../basedados.php';
	
	$query ="INSERT INTO `services` (`name`, `time`, `color`, `price`)
VALUES
	( '$nome', '$tempo', '$cor', '$preco');";
	$executar_query = mysqli_query($database, $query);

?>