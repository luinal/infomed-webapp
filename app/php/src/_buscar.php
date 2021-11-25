<?php
	if (!isset($_GET['digito_busca'])){
		header("Location: consulta.php");
		exit;
	}

$nome = "%".trim($_GET['digito_busca'])."%";

$host = 'infomed-db';
$user = 'MYSQL_USER';
$pass = 'MYSQL_PASSWORD';
$mydatabase = 'MYSQL_DATABASE';

//Create connection
$conn = new mysqli($host, $user, $pass, $mydatabase);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

//Defines and executes the query
$sql = "SELECT * FROM usuarios;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Nome: " . $row["nome"]. " " . " - CRM: " . $row["crm"]. "<br>";
  }
} else {
  echo "0 results";
}

echo "$nome";

$resultados = $result->fetch_assoc();

$conn->close();

?>

<!doctype html>
<html lang="pt-br">
	<head>
		<title>Resultado da busca</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

    <body>
   		
   		<h2>Resultado da busca</h2>
		<?php
		if (count($resultados)) {
			foreach($resultados as $Resultado) {
		?>
		<label><?php echo $Resultado['id']; ?><?php echo $Resultado['nome']; ?></label>
		<br>

		<label>Não foram encontrados resultados para o termo procurado. </label>
		<?php
	}
}
	?>

	</body>

</html>