<?php
//  require_once 'restrito.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perfil</title>
		<link rel="stylesheet" href="css/navbar.css">
		<link rel="stylesheet" href="css/perfi.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
			
	</head>
		<?php
			require_once "conexao.php";
			session_start();
			if(isset($_SESSION['unique_id'])){
				$query = "SELECT *
						 FROM psicologos WHERE unique_id = ".$_SESSION['unique_id'];
				$executar = mysqli_query($conn,$query);
				$profissional = mysqli_fetch_array($executar);
		?>
		<?php
		require_once 'navbar.php';
		?>
			
			<div class="wrapper">
				<div class="left">
					 <?php echo "<img src='imagens-profissional/fotos-capa/$profissional[foto]'  alt='user' width='20vw'>";?> 
					<h4><?php echo $profissional['nome']; ?></h4>
					<p>Psicólogo(a)</p>
				</div>
				<div class="right">
					<div class="info">
						<h3>INFORMAÇÕES</h3>
						<div class="info_data">
							<div class="data">
								<h4>Email</h4>
								<p><?php echo $profissional['email'] ?></p>
							</div>
							<div class="data">
							<h4>Data de nascimento</h4>
								<p><?php echo $profissional['nascimento']; ?></p>
						</div>
						</div>
						<div class="info_data">
							<div class="data">
								<h4>Telefone</h4>
								<p><?php echo $profissional['telefone']; ?></p>
							</div>
							<div class="data">
							<h4>Sexo</h4>
								<p>
									<?php 
									if($profissional['sexo']=='f'){
										echo "Feminino";
									}else if($profissional['sexo']=='m'){
										echo "Masculino";
									}else if($profissional['sexo']=='o'){
										echo "Outro";
									}else if($profissional['sexo']=='n'){
										echo "Não sei responder";
									}else{
										echo "Pefiro não responder";
									}
									?>
								</p>
						</div>
						</div>
						<div class="info_data">
							<div class="data">
								<h4>CPF</h4>
								<p><?php echo $profissional['cpf']; ?></p>
							</div>
							<div class="data">
							<h4>CEP</h4>
								<p><?php echo $profissional['cep']; ?></p>
						</div>
						</div>
						<!-- <div class="info_data">
							<div class="data">
								<h4>Rua</h4>
								<p><?php echo $profissional['rua']; ?></p>
							</div>
							<div class="data">
							<h4>Bairro</h4>
								<p><?php echo $profissional['bairro']; ?></p>
						</div>
						</div>
						<div class="info_data">
							<div class="data">
								<h4>Cidade</h4>
								<p><?php echo $profissional['cidade']; ?></p>
							</div>
							<div class="data">
							<h4>Estado</h4>
								<p><?php echo $profissional['estado']; ?></p>
						</div>
						</div> -->
						 <div class="info_data">
							<div class="data">
								<h4>CRP</h4>
								<p><?php echo $profissional['crp']; ?></p>
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
							<li><a href="process/alterar_psic.php"><button>Editar</button></a></li>
						</ul>
					</div>
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