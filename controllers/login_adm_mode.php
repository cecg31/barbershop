<?php
	if (isset($_POST['username']) && isset($_POST['userpassword']))
	{
		#BASEDADOS
		require_once 'basedados.php';

		#Credenciais de Login - Injection
		$login_id = mysqli_real_escape_string($database, $_POST['username']);
		$password_injection = mysqli_real_escape_string($database, $_POST['userpassword']);
		$password_md5 = md5($password_injection);

		#Query de Login
		$login_query ="SELECT * FROM admins WHERE username = '$login_id' AND password = '$password_md5'";
		$executar_query = mysqli_query($database, $login_query);
		$isValid = mysqli_num_rows($executar_query);

			#Se nº linhas = 1 significa que há resultado para a query
			if($isValid == 1)
			{

					if (session_status() == PHP_SESSION_NONE)
					{
						@session_start();
					}

					$array = mysqli_fetch_array($executar_query);

				  /*$_SESSION['ADM_MODE'] = true;
					$_SESSION['USERID'] = $array['id_admin'];
					$_SESSION['USERNAME'] = $array['username'];*/

					echo 'verificado';
			}
			else
			{
				echo 'erro';
			}

	}

	#Encerrar conexão
	mysqli_close($database);

?>
