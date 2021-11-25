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