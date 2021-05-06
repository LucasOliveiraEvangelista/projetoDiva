<?php
 require_once 'restrito.php';
?>]
<?php  
	require_once'conexao.php';
	session_start();
	if(!isset($_SESSION["pront"]) || !isset($_SESSION["senha"])) {
		$_SESSION["loginErro"] = "Prontuario ou Senha inválido.";
		header("Location: index.php");
		die();
	} else {

	}

	if( !isset($_POST["nmConsulta"]) ){
		$_SESSION["erroConsulta"] = "Escolha uma consulta.";
		header("Location: agendamento.php");
		die();

	} else {
		$nmConsulta = $_POST["nmConsulta"];
	}

	if( $_POST["nmDia"] == "" ){
		$_SESSION["erroConsulta"] = "Escolha um dia.";
		header("Location: agendamento.php");
		die();

	} else {
		$nmDia = $_POST["nmDia"];
	}
	$query = mysqli_query($conn, "SELECT cd_agendamentoconsulta, id_usuario, id_consulta, dt_agendamentoconsulta, NM_Situacao FROM agendamentoconsulta WHERE ID_Paciente = '$membro' AND ID_Consulta = '$nmConsulta' AND DT_AgendamentoConsulta = '$nmDia' AND NM_Situacao = 'Em Aberto'") or die(mysqli_error($conn));
	$resultAgendamento = mysqli_num_rows($query);
	if ($resultAgendamento > 0){
		$_SESSION["erroConsulta"] = "Está consulta já foi marcada.";
		header("Location: agendamento.php");
		die();
	}

	$queryNum = mysqli_query($conn, "SELECT * FROM agendamentoconsulta WHERE dt_agendamentoconsulta = '$nmDia'") or die(mysqli_error($conn));
	$resultNum = mysqli_num_rows($queryNum);
	if ($resultNum == 15){
		$_SESSION["erroConsulta"] = "Este dia já tem o limite de consultas.";
		header("Location: agendamento.php");
		die();
	}

	$insert = mysqli_query($conn, "INSERT INTO agendamentoconsulta VALUES (NULL, '$nmDia', 'Em Aberto', NULL, '$membro', '$nmConsulta')") or die(mysqli_error($conn));
?>
<html lang = "pt-br">
	<head>
		<head>
		<!-- META -->
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<title> Agende Saúde </title>
		<meta name="description" content="Agende sua consulta com os melhores profissionais do segmento com o Divã">
	</head>
<body>
	<div class="container-fluid cPerfil azul">
		<div class="row rowPerfil">
			<div class="menuPerfil">
				<div class="navimg col-xs-2">
					<img src="IMG/TopPSemfundo.png" alt="">
				</div>
				<div class="nav col-xs-10">
					<ul>
						<li>
							<a href="perfil.php"> INICIO </a>
						</li>
						<li>
							|
						</li>
						<li>
							<a href="agendamento.php"> AGENDAMENTO </a>
						</li>
						<li>
							|
						</li>
						<li>
							<a href="consultas-marcadas.php">  CONSULTAS MARCADAS </a>
						</li>
						<li>
							|
						</li>
						<li>
							<a href="consultas-efetuadas.php"> CONSULTAS EFETUADAS </a>
						</li>
						<li>
							|
						</li>
						<li>
							<a href="sair.php"> SAIR </a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid agendamentoMain">
		<div class="row agendamentoRow">
			<div class="col-xs-7 formCol">
				<div class="row">
					<div class="sucesso col-xs-12">
						<h1>Agendamento realizado com sucesso</h1>
						<table>							
							<tbody>
								<tr>
									<td>
										<h2>
											Nicho: 
										</h2>
									</td>
									<td>
										<h2>
											<?php  
												if ($_SESSION["cd_nicho"] == 1){
													echo "<a href='index.php' target='_blank'>";
												}
												echo $_SESSION["nm_nicho"];
											?> </a>
										</h2>
									</td>
								</tr>	
								<tr>
									<td>
										<h2>
											Nome do Paciente: 
										</h2>
									</td>
									<td>
										<h2>
											<?php 
												$selectPac = mysqli_query($conn, "SELECT nome, cpf FROM usuario WHERE cpf ") or die (mysqli_error($conn));
												$resultPac = mysqli_fetch_array($selectPac);
												echo $resultPac["nome"]; 
											?>			
										</h2>
									</td>
								</tr>
								<tr>
									<td>
										<h2>
											CPF do Paciente: 
										</h2>
									</td>
									<td>
										<h2>
											<?php
												echo $resultPac["c´f"]; 
											?>		
										</h2>
									</td>
								</tr>	
								<tr>
									<td>
										<h2>
											Consulta: 
										</h2>
									</td>
									<td>
										<h2>
											<?php
												$selectCon = mysqli_query($conn, "SELECT nm_consulta FROM consulta WHERE cd_consulta = '$nmConsulta'") or die(mysqli_error($conn));
												$resultCon = mysqli_fetch_array($selectCon);
												echo $resultCon["nm_consulta"]; 
											?>		
										</h2>
									</td>
								</tr>
								<tr>
									<td>
										<h2>
											Dia marcado:  
										</h2>
									</td>
									<td>
										<h2>
											<?php
												echo $nmDia;
											?>		
										</h2>
									</td>
								</tr>						
							</tbody>
						</table>
					</div>
				</div>	
				<div class="row">
					<div class="col-xs-12 btnSucesso">
						<a class="btn btn-default" href="agendamento.php" role="button">Agendar outra Consulta</a>
						<a class="btn btn-default" href="home.php" role="button">Voltar para Inicio</a>
					</div>
				</div>
			</div>
			<div class="col-xs-5 infoCol">
				<p><i class="glyphicon glyphicon-chevron-right"></i> Membro do grupo residencial: <span>Escolha o membro de seu grupo residencial a qual irá realizar a consulta.</span></p>
				<p><i class="glyphicon glyphicon-chevron-right"></i> Tipo de consulta: <span>Escolha a consulta que precisa.</span></p>
				<p><i class="glyphicon glyphicon-chevron-right"></i> Dia do agendamento: <span>Escolha um dia disponivel a qual será realizado a consulta.</span></p>
				<p><i class="glyphicon glyphicon-chevron-right"></i> Consultas: <span>As consultas serão feitas por ordem de chegada a UBS.</span></p>
			</div>
		</div>
	</div>
	<!-- JQUERY -->
	<script src="js/jquery-3.1.0.min.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- BOOTSRAP DATAPICKER -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- BOOTSRAP DATAPICKER -->
	<script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>