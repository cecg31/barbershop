<?php
if (isset($_FILES)) {
        $error = false;
        $files = array();

        $uploaddir = "../uploads/";
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
	$morada = $_POST['address'];
	$email = $_POST['email'];
	$contacto = $_POST['phone'];
	$nif = $_POST['nif'];
	$notificacao = $_POST['notificacao'];
	
	$imagem = $_FILES['image']['name'];
	$imagemNome  = time() . ".png";
	
	$id_client = $_POST['id_client'];

	// echo $nome;
	// echo $aniversario;
	// echo $morada;
	// echo $email;
	// echo $contacto;
	// echo $nif;
	// echo "here:" . $notificacao;
	// echo $imagem;
	// echo $imagemNome;
	
	require_once 'basedados.php';
	
	if ($imagem !== "") {
		$query ="UPDATE `clients` SET name =  '$nome', birth_date = '$aniversario', address = '$morada', email = '$email', phone = '$contacto', photo = '$imagemNome', nif = '$nif', notification = '$notificacao' WHERE id_client = '$id_client'";
	}
	else {
		$query ="UPDATE `clients` SET name =  '$nome', birth_date = '$aniversario', address = '$morada', email = '$email', phone = '$contacto', nif = '$nif', notification = '$notificacao' WHERE id_client = '$id_client'";
	}

	$executar_query = mysqli_query($database, $query);
?>