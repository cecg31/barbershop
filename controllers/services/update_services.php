<?php
	$nome = $_POST['name'];
	$cor = $_POST['color'];
	$tempo = $_POST['time'];
	$preco = $_POST['price'];
	
	$id_service = $_POST['id_service'];

	// echo $nome;
	// echo $aniversario;
	// echo $morada;
	// echo $email;
	// echo $contacto;
	// echo $nif;
	// echo "here:" . $notificacao;
	// echo $imagem;
	// echo $imagemNome;

	require_once '../basedados.php';


	$query ="UPDATE `services` SET name =  '$nome', time = '$tempo', color = '$cor', price = '$preco' WHERE id_service = '$id_service'";
		
	$executar_query = mysqli_query($database, $query);
?>
