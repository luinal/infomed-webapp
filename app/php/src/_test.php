<?php
    include("conecta.php");

    if (!isset($_GET['digito_busca'])){
        header("Location: consulta.php");
        exit;
    }

    $busca = "%".trim($_GET['digito_busca'])."%";

    //Defines and executes the query
    $sql = "SELECT * FROM usuarios WHERE CONCAT(nome, crm, telefone_fixo, telefone_celular, cep, especialidade1, especialidade2) LIKE '$busca' ORDER BY id";

    
    $query = mysqli_query($conn,$sql);
 
    if(!$query)
    {
        echo "Query does not work.".mysqli_error($conn);die;
    }

  

    $all_property = array();

?>
<!doctype html>
<html lang="pt-br">
	<head>
		<title>Resultado da busca</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">

    <body>
         <div id="cabecalho">
            <p id="logo"><span style="color:white">Info</span><span style="color:red">Med</span></p>
         </div>

            <div id="navegacao">
                    <ul>
                        <li><a href="../../index.html">Voltar para página inicial</a></li>
                        <li><a href="consulta.php">Consulta</a></li>
                        <li><a href="cadastro.php">Cadastrar</a></li>
                    </ul>
                </div>

                <div id="resultado">
                    <h2 class="pesquisar">Pesquisar</h2>
         
            
                    <form action="_test.php" method="GET">
                        <input type="text" name="digito_busca" size="50" placeholder="Digite aqui">
                        <button style="width:100px";>Buscar</button>
                    </form>
                    <p class="texto-resultado">

                <table>

                <?php
                    // Checando quantidade de resultados retornados
                    if (($rows = $query->num_rows) > 0) {
                        if ($rows != 1) {
                            echo '<h3>'.'Foram encontrados ' . $rows , ' resultados correspondentes à pesquisa:'.'</h3>';      
                        } else {
                            echo '<h3>'.'Foi encontrado um resultado correspondente à busca:'.'</h3>';                                                      
                        }
                        
                        //Desenhando cabeçalho da tabela
                        echo '<table class="data-table" width="80%" border="1" style="border-collapse:collapse;">
                                    
                        <tr class="data-heading">';  

                        
                        echo '<td align="center" style="border: none;"' . '<strong>' . '' . '</strong>' . '</td>';
                        echo '<td align="center" style="border: none;"' . '<strong>' . '' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'ID' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'Nome' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'CRM' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'Telefone Fixo' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'Celular' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'CEP' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'Especialidade 1' . '</strong>' . '</td>';
                        echo '<td align="center">' . '<strong>' . 'Especialidade 2' . '</strong>' . '</td>';

                        echo '</tr>';
                        
                        //Desenhando resultados da busca
                        while($data = mysqli_fetch_array($query))
                            {
                            ?>
                                <tr>
                                <td><a href="atualizacao_cadastral.php?id=<?php echo $data['id']; ?>"><img src="../../imagens/edit.png" width='18' height='18'></a></td>
                                <td><a href="_delete.php?id=<?php echo $data['id']; ?>"><img src="../../imagens/delete.png" width='18' height='18'></a></td> 

                                
                                <td><?php echo $data['id']; ?></td>
                                <td width="450" align="left"><?php echo $data['nome']; ?></td>
                                <td><?php echo $data['crm']; ?></td>
                                <td><?php echo $data['telefone_fixo']; ?></td>
                                <td><?php echo $data['telefone_celular']; ?></td>
                                <td><?php echo $data['cep']; ?></td>
                                <td><?php echo $data['especialidade1']; ?></td>
                                <td><?php echo $data['especialidade2']; ?></td>    
                                                              
                            </tr>
                            <?php
                            }

                    } else {
                        echo '<h3>'."Nenhum resultado encontrado para a busca.".'</h3>';
                    }
                
                $conn->close();
                ?>

                </table>
                </p>
                </div>
                    
         
         <div id="rodape"></div>
    </body>

</html>