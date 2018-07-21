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
	$id_resource = $_POST['id_resource'];

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

	if ($imagem !== "") {
		$query ="UPDATE `resources` SET name =  '$nome', birth_date = '$aniversario', start_hour = '$tempo_inicio', end_hour = '$tempo_fim', holidays_begin = '$ferias_inicio', holidays_end = '$ferias_fim', photo_resources = '$imagemNome' WHERE id_resource = '$id_resource'";
	}
	else {
		$query ="UPDATE `resources` SET name =  '$nome', birth_date = '$aniversario', start_hour = '$tempo_inicio', end_hour = '$tempo_fim', holidays_begin = '$ferias_inicio', holidays_end = '$ferias_fim' WHERE id_resource = '$id_resource'";
	}

	$executar_query = mysqli_query($database, $query);
?>
