<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "pizzariatech";

    $conn = mysqli_connect($host, $user, $password, $database);
	
	if(!$conn){
		echo "A conexão falhou. Erro: " . mysqli_connect_error();
	}

?>