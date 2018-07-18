<?php

 $host = "localhost";
 $scheme = "barbershop";
 $userdb = "root";
 $password = "root";


 $database = mysqli_connect($host, $userdb, $password, $scheme);
 mysqli_set_charset ( $database , "utf8");
 if(!$database)
 {

 	echo "Problema na base de dados";

 }


?>
