<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perfil</title>
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/user.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		
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
			require_once '../conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT *
				FROM cad_usuario WHERE unique_id = {$_SESSION['unique_id']}";
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
			?>
	<?php
	require_once '../navbar_user.php';
	?>
        
		<div class="card_psicologo">
        <div class="coluna">

		<form class = "formulario"  action="foto_paci.php" method="POST" enctype="multipart/form-data">
            <?php echo "<img src='../imagens/$usuario[foto]' value='$usuario[foto]' alt='user'>"; ?>
			<label for="foto">escolher</label>
			<input type="file" name="pic" accept="image/*" id = "foto" hidden value="<?php echo $usuario['foto']?>">
			<p><input type="submit"></p>
			</form>
        </div>

        <div class="coluna2">
            <div class="info">
				<form class = "formulario"  action="editar_usuario.php" method="POST" enctype="multipart/form-data">
					<p>Nome:<?php echo "<input type='text' name='nome' value='$usuario[nome]'/>";?></p>
					<p>CEP: <?php echo "<input name='cep' type='text' id='cep' maxlength='9' onkeyup='masc_cep()' value='$usuario[cep]' onblur='pesquisacep(this.value);'/>"?></p>
					<p>Nasceu em: <?php echo "<input type='text' name='data_nasc' value='$usuario[nascimento]'/>" ?></p>
					<p>Sexo: <select name="sexo">
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
										</select></p>
					<p>Estado: <?php echo "<input type='text' name='estado' id='estado' value='$usuario[estado]'/>" ?></p>
					<p>Telefone: <?php echo "<input type='text' name='telefone' id='telefone' onkeyup='masc_telefone()' maxlength='19' value='$usuario[telefone]'/>"?></p>
			</div>

						<li><a href="editar_usuario.php"><button>Editar</button></a></li>
						</form>

					<form action="excluir_usuario.php" method="post" enctype="multipart/form-data">
						<li><a href="excluir_usuario.php"><button>Excluir</button></a></li>
					</ul>
				</div>
				</form>
				<form action="desativa_user.php" method="post" enctype="multipart/data-form">
						<li><a href="desativa_user.php"><button>Desativar conta</button></a></li>
					</ul>
				</div>
			</form>
        <script src="../js/navbar.js"></script>
	<?php
		}else{
			echo "Acesso negado";
			header("Location:../index.php");
		} 
	?>
</body>
</html>