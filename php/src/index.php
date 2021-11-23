<?php
	// The MySQL service named in the docker-compose.yml.
	$host = 'db';

	// Database use name
	$user = 'MYSQL_USER';

	//database user password
	$pass = 'MYSQL_PASSWORD';

	// database name
	$mydatabase = 'MYSQL_DATABASE';

	// check the MySQL connection status
	$conn = new mysqli($host, $user, $pass, $mydatabase);

	$sql = 'SELECT * FROM users';

	if ($result = $conn->query($sql)) {
		while ($data = $result->fetch_object()) {
			$users[] = $data;
		}
	}

	foreach ($users as $user) {
		echo "<br>";
		echo $user->username . " " . $user->password;
		echo "<br>";
	}

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else {
		echo "Connected to MySQL server successfully!";
	}

?>
<!doctype html>
<html lang="pt-br">
	<head>
		<title>Basic Webapp Test</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">

	</head>

	<body>
		<h1>Lorem Ipsum</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam placerat odio vitae nisi elementum, ac volutpat felis pharetra. Aliquam condimentum tellus ac nibh mollis rutrum. Maecenas vel ultricies enim, vitae lacinia nibh. Maecenas in tincidunt enim. Quisque fringilla sapien ac elit vestibulum, eget consequat risus venenatis. </p>
		<p>A random phrase emerges!</p>
		<h1>Now with db!</h1>

       
	</body>

</html>

