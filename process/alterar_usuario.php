<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perfil</title>
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/perfi.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
		
		<script src="../js/validacao.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
			$( function() {
			$( "#progressbar" ).progressbar({
			value: 50
			});
			} );
		</script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script>
			
			function limpa_formulário_cep() {
					//Limpa valores do formulário de cep.
					document.getElementById('rua').value=("");
					document.getElementById('bairro').value=("");
					document.getElementById('cidade').value=("");
					document.getElementById('estado').value=("");
			}

			function meu_callback(conteudo) {
				if (!("erro" in conteudo)) {
					//Atualiza os campos com os valores.
					document.getElementById('rua').value=(conteudo.logradouro);
					document.getElementById('bairro').value=(conteudo.bairro);
					document.getElementById('cidade').value=(conteudo.localidade);
					document.getElementById('estado').value=(conteudo.uf);
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
						document.getElementById('estado').value="...";

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
	
		<?php
			require_once 'conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT nome, nascimento, telefone, sexo, cpf, cep, rua, num, bairro, cidade, estado, foto
				FROM cad_usuario WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
			?>
	<?php
	require_once 'navbar.php';
	?>
        

        <div class="wrapper">
            <div class="left">
				<form action="editar_usuario.php" method="post" enctype="multpart/data-form">
                <?php echo "<img src='../imagens/$usuario[foto]' alt='user' width='20vw'>";?>
				<h4>Paciente</h4>
            </div>
            <div class="right">
                <div class="info">
                    <h3>EDITAR INFORMAÇÕES</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Nome</h4>
                            <p><?php echo "<input type='text' name='nome' value='$usuario[nome]'/>";?></p>
                        </div>
                        <div class="data">
                        <h4>Data de nascimento</h4>
                            <p><?php echo "<input type='date' name='data_nasc' value='$usuario[data_nasc]'/>"?></p>
                    </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>Telefone</h4>
                            <p><?php echo "<input type='text' name='telefone' id='telefone' onkeyup='masc_telefone()' maxlength='19' value='$usuario[telefone]'/>"?></p>
                        </div>
                        <div class="data">
							<h4>Sexo</h4>
							<p>
								<select name="sexo">
											<?php 
												if($usuario['sexo']=='f'){
													$sexo = "
																<option value='f'>Feminino
																<option value='m'>Masculino</option>
																<option value='o'>Outro</option>
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($usuario['sexo']=='m'){
													$sexo = "
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='o'>Outro</option>
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($usuario['sexo']=='o'){
													$sexo = "
																<option value='o'>Outro</option>
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($usuario['sexo']=='n'){
													$sexo = "
																<option value='n'>Não sei dizer</option>
																<option value='o'>Outro</option>
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='r'>Prefiro não responder</option>
															";
												}else{
													$sexo = "
																<option value='r'>Prefiro não responder</option>
																<option value='o'>Outro</option>
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='n'>Não sei dizer</option>
															";
												}
												echo $sexo;
								
											?>
										</select>
									</p>
                    </div>
                    </div>
                    <div class="info_data">
						<div class="data">
							<h4>CEP</h4>
                            <p><?php echo "<input name='cep' type='text' id='cep' maxlength='9' onkeyup='masc_cep()' value='$usuario[cep]' onblur='pesquisacep(this.value);'/>"?></p>
						</div>
						<div class="data">
                            <h4>Rua</h4>
                            <p><?php echo "<input name='rua' id='rua' type='text' value='$usuario[rua]'/>"?></p>
                        </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>Número</h4>
                            <p><?php echo "<input type='text' name='num' value='$usuario[num]'/>"?></p>
                        </div>
                        <div class="data">
                        <h4>Bairro</h4>
                            <p><?php echo "<input name='bairro' id='bairro' type='text' value='$usuario[bairro]'/>"?></p>
                    </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>Cidade</h4>
                            <p><?php echo "<input name='cidade' type='text' id='cidade' value='$usuario[cidade]'/>"?></p>
                        </div>
                        <div class="data">
                        <h4>Estado</h4>
                            <p><?php echo "<input name='estado' id='estado' type='text' value='$usuario[estado]'/>"?></p>
                    </div>
                    </div>
                </div>
            
                <div class="social-media">
                    <ul>
                        <li><a href="process/editar_usuario.php"><button>Editar</button></a></li>
          
				</form>
					<form action="excluir_usuario.php" method="post" enctype="multipart/data-form">
						<li><a href="process/excluir_usuario.php"><button>Excluir</button></a></li>
					</ul>
				</div>
				</form>
            </div>
        </div>
        <script src="js/navbar.js"></script>
	<?php
		}else{
			echo "Acesso negado";
		} 
	?>
</body>
</html>