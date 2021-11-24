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
		<title>Infomed Test</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">

	</head>

	<body>
	<form>
		
		<fieldset>
			<legend>Detalhes de Contato</legend>

			<div>
				<label for="nome">Nome: </label>
				<input type="text" name="Nome" id="nome" size="8" required>
			</div>

			<div>
				<label for="crm">CRM: </label>
				<input type="text" name="CRM" id="crm" required>
			</div>

			<div>
				<label for="especialidade">Especialidade: </label>
				<select id="especialidade">
					<option value="Alergologia">Alergologia</option>
					<option value="Angiologia">Angiologia</option>
					<option value="Buco maxilo">Buco Maxilo</option>
					<option value="Cardiologia clinica">Cardiologia Clínica</option>
					<option value="Cardiologia infantil">Cardiologia Infantil</option>
					<option value="Cirurgia cabeca e pescoco">Cirurgia Cabeça e Pescoço</option>
					<option value="Cirurgia cardiaca">Cirurgia Cardíaca</option>
					<option value="Cirurgia de torax">Cirurgia de Tórax</option>
				</datalist>
			</div>

		</fieldset>

		<fieldset>
			<legend>Comentários</legend>
			<div>
				<label for="mensagem">Mensagem:</label>
				<textarea name="mensagem" id="mensagem"></textarea>
			</div>
		</fieldset>

		<fieldset>
			<legend>Lembrar de mim</legend>
			<div>
				<label>
					<input class="radio" type="radio" name="lembrar" id="sim"> Sim
				</label>
			</div>

			<div>
				<label>
					<input class="radi" type="radio" name="lembrar" id="nao"> Não
				</label>
			</div>

		</fieldset>

		</form>

       
	</body>

</html>

