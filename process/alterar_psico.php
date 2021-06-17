<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perfil</title>
		<link rel="stylesheet" href="../css/navbar.css">
		<link rel="stylesheet" href="../css/psico.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		
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
				FROM psicologos WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
			?>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="../assets/img/perfil.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
            <div>
                <a href="../index.php" class="nav__logo active">
                    <img class = "logo" src="../assets/logo.png" alt="">
                    <span class="nav__logo-name">Divã</span>
                </a>

				<div class="nav__list">
                    <a href="../dashboard.php" class="nav__link ">
                    <i class="fas fa-calendar-week"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="../agenda.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="../chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="../notificacao_psic.php" class="nav__link">
                    <i class="far fa-bell"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="../perfil_psic.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                    <a href="../encerra.php" class="nav__link">
                    <i class="fas fa-sign-out-alt"></i>
                        <span class="nav__name">Sair</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="../js/navbar.js"></script>
        
		<div class="card_psicologo">
        	<div class="coluna">

			<form class = "formulario"  action="foto_psic.php" method="POST" enctype="multipart/form-data">
				<?php echo "<img src='../imagens/$usuario[foto]' value='$usuario[foto]' alt='user'>"; ?>
				<label for="foto">Escolher nova foto</label>
				<input type="file" name="pic" accept="image/*" id = "foto" hidden value="<?php echo $usuario['foto']?>">
				<p><input type="submit"></p>
			</form>
        	</div>

			<div class="coluna2">
				<div class="info">
					<form class = "formulario"  action="editar_psic.php" method="POST" enctype="multipart/form-data">
					<p>Nome:<?php echo "<input type='text' name='nome' value='$usuario[nome]'/>";?>
					CEP: <?php echo "<input name='cep' type='text' id='cep' maxlength='9' onkeyup='masc_cep()' value='$usuario[cep]' onblur='pesquisacep(this.value);'/>"?></p>
					<p>Nasceu em: <?php echo "<input type='text' name='data_nasc' value='$usuario[nascimento]'/>" ?>
					Sexo: <select name="sexo">
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
					<p>Estado: <?php echo "<input type='text' name='estado' id='estado' value='$usuario[estado]'/>" ?>
					Consultório: <?php echo "<input type='text' name='local'  value='$usuario[local]'/>" ?></p>
					<p>Idioma: <?php echo "<input type='text' name='idioma'  value='$usuario[idioma]'/>" ?>
					Valor: <?php echo "<input type='text' name='valor' value='$usuario[valor]'/>" ?></p>
					<p>Duração da consulta: <?php echo "<input type='text' name='tempo' value='$usuario[tempo_consulta]'/>" ?></p>
					Ano que começou: <?php echo "<input type='text' name='ano' value='$usuario[tempo_experiencia]'/>" ?></p>
					<p>Politica de remarcação: <?php echo "<input type='text' name='remarcacao' value='$usuario[remarcacao]'/>" ?></p>
					Telefone: <?php echo "<input type='text' name='telefone' id='telefone' onkeyup='masc_telefone()' maxlength='19' value='$usuario[telefone]'/>"?></p>
					<p>Descrição de carreira: <?php echo "<textarea name='texto'>$usuario[texto]</textarea>"?></p>
					<p>Resumo: <?php echo "<textarea name='resumo'>$usuario[resumo]</textarea>"?></p>
												</div>
			</div>
		

			
        <script src="../js/navbar.js"></script>

		<div class="coluna3">
				<a href="editar_psic.php"><button>Editar</button></a>
								</form>

				<form action="excluir_psic.php" method="post" enctype="multipart/data-form">
							<a href="excluir_psic.php"><button>Excluir</button></a>
						
					
				</form>
				<form action="desativa_psic.php" method="post" enctype="multipart/data-form">
							<a href="desativa_psic.php"><button>Desativar conta</button></a>
						
					
				</form>
			</div>
	<?php
		}else{
			echo "Acesso negado";
		} 
	?>
</body>
</html>