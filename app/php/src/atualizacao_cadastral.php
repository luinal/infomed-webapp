<?php
    include_once 'conecta.php';
    
    $id=$_GET['id'];

    $sql = "SELECT * FROM usuarios WHERE id='$id'";

    $query = mysqli_query($conn,$sql);

    $data = mysqli_fetch_array($query);

    if(isset($_POST['update']))
    {
        $nome = $_POST['nome'];
        $crm = $_POST['crm'];
        $telefone_fixo = $_POST['telefone_fixo'];
        $telefone_celular = $_POST['telefone_celular'];
        $cep = $_POST['cep'];
        $especialidade1 = $_POST['especialidades'];
        $especialidade2 = $_POST['especialidade2'];

        $edit = mysqli_query($conn,"update usuarios set nome='$nome', crm='$crm', telefone_fixo='$telefone_fixo', telefone_celular='$telefone_celular', cep='$cep', especialidade1='$especialidade1', especialidade2='$especialidade2' where id='$id'");
    }

    if($edit)
    {
        mysqli_close($conn); 
        header('Location: _edit.php');
        exit;
    }
    else
    {
        echo mysqli_error($conn);
    }    	

    

?>

<!doctype html>
<html lang="pt-br">
	<head>
		<title>Infomed - Cadastro</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="../../css/estilo.css">
		
        <script>
            
            function limpa_formulário_cep() {
                    //Limpa valores do formulário de cep.
                    document.getElementById('rua').value=("");
                    document.getElementById('bairro').value=("");
                    document.getElementById('cidade').value=("");
                    document.getElementById('uf').value=("");
            }

            function meu_callback(conteudo) {
                if (!("erro" in conteudo)) {
                    //Atualiza os campos com os valores.
                    document.getElementById('rua').value=(conteudo.logradouro);
                    document.getElementById('bairro').value=(conteudo.bairro);
                    document.getElementById('cidade').value=(conteudo.localidade);
                    document.getElementById('uf').value=(conteudo.uf);
                } //end if.
                else {
                    //CEP não Encontrado.
                    limpa_formulário_cep();
                    alert("CEP não encontrado.");
                }
            }
                
            function pesquisacep(valor) {

                //Nova variável "cep" somente com dígitos.
                var cep = valor.replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        document.getElementById('rua').value="...";
                        document.getElementById('bairro').value="...";
                        document.getElementById('cidade').value="...";
                        document.getElementById('uf').value="...";

                        //Cria um elemento javascript.
                        var script = document.createElement('script');

                        //Sincroniza com o callback.
                        script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                        //Insere script no documento e carrega o conteúdo.
                        document.body.appendChild(script);

                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            };
			

        </script>

        
	</head>

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
             	
		<fieldset>
		<legend>Detalhes de Contato</legend>
			<form method="post"> 	

                
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
				
				<div>
					<label for="nome">Nome: </label>
					<input type="text" name="nome" id="nome" size="8" required maxlength="120" value="<?php echo $data['nome']; ?>">
				</div>


				<div>
					<label for="crm">CRM: </label>
					<input type="text" name="crm" id="crm" value="<?php echo $data['crm']; ?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" / maxlength="7">
				</div>

				<div>
					<label for="telefone_fixo">Telefone Fixo (opcional): </label>
					<input type="tel" name="telefone_fixo" id="telefone_fixo" value="<?php echo $data['telefone_fixo']; ?>" pattern="[0-9]+" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/ maxlength="9">
				</div>

				<div>
					<label for="telefone_celular">Telefone Celular: </label>
					<input type="tel" name="telefone_celular" id="telcelular" value="<?php echo $data['telefone_celular']; ?>" pattern="[0-9]+" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" / maxlength="9">
				</div>

				<div>
					<label for="especialidade">Selecione as especialidades: </label>
					<select id="especialidade" name="especialidades" required value="<?php echo $data['especialidade1']; ?>">
						<option value="Alergologia">Alergologia</option>
						<option value="Angiologia">Angiologia</option>
						<option value="Buco maxilo">Buco Maxilo</option>
						<option value="Cardiologia clinica">Cardiologia Clínica</option>
						<option value="Cardiologia infantil">Cardiologia Infantil</option>
						<option value="Cirrgia cabeca e pescoco">Cirurgia Cabeça e Pescoço</option>
						<option value="Cirurgia cardiaca">Cirurgia Cardíaca</option>
						<option value="Cirurgia de torax">Cirurgia de Tórax</option>
					</select>
				</div>
                
				<div>
					<label for="especialidade2">Segunda Especialidade: </label>
					<select id="especialidade2" name="especialidade2" required value="<?php echo $data['especialidade2']; ?>">
						<option value="Alergologia">Alergologia</option>
						<option value="Angiologia">Angiologia</option>
						<option value="Buco maxilo">Buco Maxilo</option>
						<option value="Cardiologia clinica">Cardiologia Clínica</option>
						<option value="Cardiologia infantil">Cardiologia Infantil</option>
						<option value="Cirurgia cabeca e pescoco">Cirurgia Cabeça e Pescoço</option>
						<option value="Cirurgia cardiaca">Cirurgia Cardíaca</option>
						<option value="Cirurgia de torax">Cirurgia de Tórax</option>
					</select>
				</div>

       			
		</fieldset>

		<fieldset>
			<legend>Endereço</legend>
			
				<label>Cep:</label>
				<input name="cep" type="text" id="cep" value="" size="10" maxlength="9" required value="<?php echo $data['cep']; ?>"
					onblur="pesquisacep(this.value);" /></label><br />
				<label>Rua:</label>
				<input name="rua" type="text" id="rua" size="60" /></label><br />
				<label>Bairro:</label>
				<input name="bairro" type="text" id="bairro" size="40" /></label><br />
				<label>Cidade:</label>
				<input name="cidade" type="text" id="cidade" size="40" /></label><br />
				<label>Estado:</label>
				<input name="uf" type="text" id="uf" size="2" /></label><br />

				<div id="cadastro-submit">
					<input type="submit" name="update" value="Atualizar Cadastro" id="submit">
				</div>
                
     		</form>
		</fieldset>

            </div>
           
                
         
         <div id="rodape"></div>
				
	</body>
 
</html>

