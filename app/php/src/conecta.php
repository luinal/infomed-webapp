<?php
 	// O serviço MySQL denominado em docker-compose.yml
	$host = 'infomed-db';

	// usuário da database
	$user = 'MYSQL_USER';

	//senha da database
	$pass = 'MYSQL_PASSWORD';

	// nome da database
	$mydatabase = 'MYSQL_DATABASE';

	// verifica a conexão MySQL
	$conn = new mysqli($host, $user, $pass, $mydatabase);

    

    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		//echo "Conectado ao servidor MySQL.";
	}