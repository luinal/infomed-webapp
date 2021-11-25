<?php
 // The MySQL service named in the docker-compose.yml.
	$host = 'infomed-db';

	// Database use name
	$user = 'MYSQL_USER';

	//database user password
	$pass = 'MYSQL_PASSWORD';

	// database name
	$mydatabase = 'MYSQL_DATABASE';

	// check the MySQL connection status
	$conn = new mysqli($host, $user, $pass, $mydatabase);

    $sql = 'SELECT * FROM usuarios';

    if ($result = $conn->query($sql)) {
		while ($data = $result->fetch_object()) {
			$usuarios[] = $data;
		}
	}
/*
    foreach ($usuarios as $user) {
        echo "<br>";
        echo $user->Id;
        echo "<br>";

        echo "<br>";
        echo $user->nome;
        echo "<br>";
        
        echo "<br>";
        echo $user->crm;
        echo "<br>";

        echo "<br>";
        echo $user->telefone_fixo;
        echo "<br>";

        echo "<br>";
        echo $user->telefone_celular;
        echo "<br>";

        echo "<br>";
        echo $user->cep;
        echo "<br>";

        echo "<br>";
        echo $user->especialidade1;
        echo "<br>";

        echo "<br>";
        echo $user->especialidade2;
        echo "<br>";
    }
*/
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected to MySQL server successfully!";
	}
?>