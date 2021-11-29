<?php
    include_once 'conecta.php';
    $id = $_GET['id'];

    $del = mysqli_query($conn,"delete from usuarios where id = '$id'"); 
    

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
                <li><h2>Cadastro excluído com sucesso.</h2></li>            
                <li><a href="../../index.html">Voltar para o menu inicial</a></li>	
				<li><a href="cadastro.php">Cadastrar outro Médico</a></li>
				<li><a href="consulta.php">Procurar Médico</a></li>					
			</ul>

		</div>

	</body>

</html>