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

    

    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		//echo "Connected to MySQL server successfully!";
	}