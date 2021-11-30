<?php
include("conecta.php");

$id=0;
$nome=$_POST['nome'];
$crm=$_POST['crm'];
$telefone_fixo=$_POST['telefone_fixo'];
$telefone_celular=$_POST['telefone_celular'];
$cep=$_POST['cep'];
$especialidade1=$_POST['especialidades'];
$especialidade2=$_POST['especialidade2'];

$sql = "INSERT INTO usuarios (id,nome,crm,telefone_fixo,telefone_celular,cep,especialidade1,especialidade2) VALUES ('$id','$nome','$crm','$telefone_fixo','$telefone_celular','$cep','$especialidade1','$especialidade2')";

?>

<!doctype html>
<html lang="pt-br">
	<head>
		<title>Infomed - Tela Inicial</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

    <body>


		<div id="container-indice">
			<div id="logo-indice-container">
				<p id="logo-indice"><span style="color:black">Info</span><span style="color:red">Med</span></p>	
			</div>
          

			<ul id="ul-resultado">
        <li><h2>
          <?php
            if (mysqli_query($conn, $sql)) {
              echo "Usuário cadastrado com sucesso.";
            } else {
              echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
            }       
            $conn->close();
          ?>
        </h2></li>
        <li><a href="../../index.html">Voltar para o menu inicial</a></li>	
				<li><a href="cadastro.php">Cadastrar outro Médico</a></li>
				<li><a href="consulta.php">Procurar Médico</a></li>					
			</ul>

		</div>

	</body>

</html>