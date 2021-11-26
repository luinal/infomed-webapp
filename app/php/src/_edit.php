<?php 
 
include_once 'conecta.php';

$nome=$_POST['nome'];
$crm=$_POST['crm'];
$telefone_fixo=$_POST['telefone_fixo'];
$telefone_celular=$_POST['telefone_celular'];
$cep=$_POST['cep'];
$especialidade1=$_POST['especialidades'];
$especialidade2=$_POST['especialidade2'];
 
$sql = "UPDATE usuarios SET nome = '$nome', crm = '$crm', telefone_fixo = '$telefone_fixo', telefone_celular = '$telefone_celular', cep = '$cep', especialidade1 = '$especialidade1', especialidade2 = '$especialidade2' WHERE id=$id";
 
 
$query = mysqli_query($conn,$sql);
if(!$query)
{
    echo "Query does not work.".mysqli_error($conn);die;
}
else
{
    echo "Data successfully updated";
}
 
   
?>