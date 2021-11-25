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
		<title>Infomed - Cadastro</title>
		<meta charset="utf-8">

		<link rel="stylesheet" type="text/css" href="estilo.css">
		
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
		<a href="index.html" id="back-button">Voltar</a>
		
		<fieldset>
		<legend>Detalhes de Contato</legend>
			<form name="form1" action="processa.php" method="post"> 	
				
				<div>
					<label for="nome">Nome: </label>
					<input type="text" name="nome" id="nome" size="8" required>
				</div>

				<div>
					<label for="crm">CRM: </label>
					<input type="text" name="crm" id="crm" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
				</div>

				<div>
					<label for="telefone_fixo">Telefone Fixo (opcional): </label>
					<input type="tel" name="telefone_fixo" id="telefone_fixo" pattern="[0-9]+" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"/>
				</div>

				<div>
					<label for="telefone_celular">Telefone Celular: </label>
					<input type="tel" name="telefone_celular" id="telcelular" pattern="[0-9]+" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
				</div>

				<div>
					<label for="especialidade">Selecione as especialidades: </label>
					<select id="especialidade" name="especialidades">
                        <option value="Alergologia">-Selecione aqui-</option>
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
                
				<div>
					<label for="especialidade2">Segunda Especialidade: </label>
					<select id="especialidade2" name="especialidade2">
                        <option value="Alergologia">-Selecione aqui-</option>
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
		<!--
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
		-->
		

		<fieldset>
			<legend>Endereço</legend>
			  <!-- Inicio do formulario -->
			
				<label>Cep:
				<input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
					onblur="pesquisacep(this.value);" /></label><br />
				<label>Rua:
				<input name="rua" type="text" id="rua" size="60" /></label><br />
				<label>Bairro:
				<input name="bairro" type="text" id="bairro" size="40" /></label><br />
				<label>Cidade:
				<input name="cidade" type="text" id="cidade" size="40" /></label><br />
				<label>Estado:
				<input name="uf" type="text" id="uf" size="2" /></label><br />

				<div>
					<input type="submit" name="botao" value="Cadastrar" id="submit">
				</div>

     		</form>
		</fieldset>

		
	</body>
 
</html>

