

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
	<script src="../js/validacao.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
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
			require_once "conexao.php";
				session_start();
				if(isset($_SESSION['unique_id'])){
					$query = "SELECT nome, nascimento, telefone, sexo, email, cpf, cep, rua, num, bairro, cidade, estado, crp, foto 
							 FROM psicologos WHERE unique_id = ".$_SESSION['unique_id'];
					$executar = mysqli_query($conn,$query);
					$profissional = mysqli_fetch_array($executar);
	?>
	<?php
	require_once 'navbar.php';
	?>

        
                <div class="wrapper">
				<div class="left">
					<form action="editar_psic.php" method="post" enctype="multipart/data/form">
						 <?php echo "<img src='../imagens$profissional[foto]'  alt='user' width='20vw'>";?> 
						<h4>Psicólogo(a)</h4>
					</div>
					<div class="right">
						<div class="info">
							<h3>EDITAR INFORMAÇÕES</h3>
							<div class="info_data">
								<div class="data">
									<h4>Nome</h4>
									<p><?php echo "<input type='text' name='nome' value='$profissional[nome]'/>"?></p>
								</div>
								<div class="data">
								<h4>Data de nascimento</h4>
									<p><?php echo "<input type='date' name='data_nasc' value='$profissional[nascimento]'/>"; ?></p>
								</div>
							</div>
							<div class="info_data">
								<div class="data">
									<h4>Telefone</h4>
									<p><?php echo "<input type='text' name='telefone' value='$profissional[telefone]' onkeyup='masc_telefone()' maxlength='19'/>"; ?></p>
								</div>
								<div class="data">
								<h4>Sexo</h4>
									<p>
										<select name="sexo">
											<?php 
												if($profissional['sexo']=='f'){
													$sexo = "
																<option value='f'>Feminino
																<option value='m'>Masculino</option>
																<option value='o'>Outro</option>
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($profissional['sexo']=='m'){
													$sexo = "
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='o'>Outro</option>
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($profissional['sexo']=='o'){
													$sexo = "
																<option value='o'>Outro</option>
																<option value='m'>Masculino</option>
																<option value='f'>Feminino
																<option value='n'>Não sei dizer</option>
																<option value='r'>Prefiro não responder</option>
															";
												}else if($profissional['sexo']=='n'){
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
										<p><?php echo "<input type='text' name='cep' id='cep' size='10' value='$profissional[cep]' onkeyup='masc_cep()' maxlength='9' onblur='pesquisacep(this.value);'/>"; ?></p>
								</div>
								<div class="data">
									<h4>Rua</h4>
									<p><?php echo "<input name='rua' type='text' value='$profissional[rua]' id='rua'/>"; ?></p>
								</div>
							</div>
							<div class="info_data">
								<div class="data">
								<h4>Número</h4>
									<p><?php echo "<input type='text' name='num' value='$profissional[num]'/>"; ?></p>
								</div>
								<div class="data">
								<h4>Bairro</h4>
									<p><?php echo "<input name='bairro' type='text' id='bairro' value='$profissional[bairro]'/>"; ?></p>
								</div>
							</div>
							 <div class="info_data">
								<div class="data">
									<h4>Cidade</h4>
									<p><?php echo "<input type='text' name='cidade' id='cidade' value='$profissional[cidade]'/>"; ?></p>
								</div>
								<div class="data">
								<h4>Estado</h4>
									<p><?php echo "<input type='text' name='estado' id='estado' value='$profissional[estado]'/>"; ?></p>
								</div>
							</div>
						</div>
					
						<div class="projects">
							<h3>ESPECIALIDADES</h3>
							<div class="projects_data">
								<div class="data">
									<?php
											$querynicho = "SELECT a.nicho, a.id_nicho AS id FROM nicho_psicologico AS a INNER JOIN tipo_nicho AS b ON a.id_nicho = b.id_nicho";
											$execute = mysqli_query($conexao,$querynicho);
											while($nichos = mysqli_fetch_array($execute)){
										?>
									<h4><?php echo $nichos['nicho']; }?></h4>
								</div>
							</div>
						</div>
						<div class="social-media">
							<ul>
								<li><a href="editar_psic.php"><button>Editar</button></a></li>
					</form>
						<form action='excluir_psic.php' method='post' action='multipart/data-form'>
							<li><a href="excluir_psic.php"><button>Excluir</button></a></li>
							</ul>
						</div>
						</form>
				</div>
			</div>
        <script src="../js/navbar.js"></script>
</body>
</html>
<?php
		}else{
			echo "Acesso negado!";
		}
	?>

