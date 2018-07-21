<?php

if (isset($_FILES)) {
        $error = false;
        $files = array();

        $uploaddir = "../../uploads/";
        foreach ($_FILES as $file) {
			$imagem = $_FILES['image']['name'];
			$imagemNome  = time() . ".png";
            if (move_uploaded_file($file['tmp_name'], $uploaddir . $imagemNome)) {
                $files[] = $uploaddir . $file['name'];
            } else {
                $error = true;
            }
        }
        $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    } else {
        $data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
    }
	
	$nome = $_POST['name'];
	$aniversario = $_POST['birth'];
	$tempo_inicio = $_POST['time_begin'];
	$tempo_fim = $_POST['time_end'];
	$ferias_inicio = $_POST['holidays_begin'];
	$ferias_fim = $_POST['holidays_end'];

	$imagem = $_FILES['image']['name'];
	
	if ($imagem == ""){
		$imagemNome = "undifined.png";
	}
	else {
		$imagemNome  = time() . ".png";
	}
	
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
	
	$query ="INSERT INTO `resources` (`name`, `birth_date`, `start_hour`, `end_hour`, `holidays_begin`, `holidays_end`, `photo_resources`)
VALUES
	('$nome', '$aniversario', '$tempo_inicio', '$tempo_fim', '$ferias_inicio', '$ferias_fim', '$imagemNome');";
	$executar_query = mysqli_query($database, $query);

?>