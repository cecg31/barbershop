<?php

if (isset($_FILES)) {
        $error = false;
        $files = array();

        $uploaddir = "../uploads/";
        foreach ($_FILES as $file) {
			$imagem = $_FILES['image']['name'];
			$imagemNome  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$imagem);
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
	$imagemNome  = preg_replace('/[^a-zA-Z0-9_ -]/s','',$imagem);
	//
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
	
	$query ="INSERT INTO `clients` ( `name`, `birth_date`, `address`, `email`, `phone`, `photo`, `nif`, `notification`, `date_add`)
VALUES
	('$nome', '$aniversario', '$morada', '$email', '$contacto', '$imagemNome', '$nif', '$notificacao', 'CURRENT_TIMESTAMP');
";
	$executar_query = mysqli_query($database, $query);

?>