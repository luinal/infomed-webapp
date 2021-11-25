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

    $sql=$conn->prepare("insert into usuarios values (?,?,?,?,?,?,?,?)");

    $sql->bind_param("isssssss",$id,$nome,$crm,$telefone_fixo,$telefone_celular,$cep,$especialidade1,$especialidade2);

    $sql->execute();

    $sql->store_result();

    $result=$sql->affected_rows;

    if($result > 0){
        echo "Dados Inseridos com Sucesso!";
    }else{
        echo "Houve um erro";
    }
?>

<!doctype html>
<html lang="pt-br">
	<head>
		<title>Infomed - Tela Inicial</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

    <body id="tela_inicial">

		<div id="container">
			<div id="logo">
				<h1>Info<span id="title-span">med</span></h1>
				
			</div>
			<h2><i>Dados inseridos com sucesso!</i></h2>
			<!--<img src="imagens/perfil.png"> -->

				<ul>
                    <li><a href="../../index.html">Voltar para o menu inicial</a></li>	
					<li><a href="cadastro.php">Cadastrar outro Médico</a></li>
					<li><a href="consulta.php">Procurar Médico</a></li>					
				</ul>

			<form>
				
	
			</form>

		</div>

	</body>

</html>