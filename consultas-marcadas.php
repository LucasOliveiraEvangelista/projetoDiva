<?php  
	require_once 'conexao.php';
	
?>
<?php
 require_once 'restrito.php';
?>
<!doctype html>
<html lang = "pt-br">
	<head>
		<head>
		<!-- META -->
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<title> Agenda Divã </title>
		<!-- FONT AWESOME -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- FONT LATO -->
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- BOOTSTRAP THEME CSS -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<!-- CSS/JS -->
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
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
							<a href="consultas-marcadas.php">  CONSULTAS AGENDADAS </a>
						</li>
						<li>
							|
						</li>
						<li>
							<a href="consultas-efetuadas.php"> CONSULTAS REALIZADAS </a>
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
	<div class="container-fluid consultasMarcadasMain">
		<div class="row cMarcadasRow">
			<div class="col-xs-8 fundoAg">
				<center><br><h2 style="color: rgba(255, 255, 255, 0.9);">Consultas Agendadas</h2></center>
						<?php 
							$contaAg = 0;
							$contaTb = 0;
							while($mostraPac = mysqli_fetch_array($selectPac)) {
								$cpfPac = $mostraPac["NR_Cpf"];
								$selectAg = mysqli_query($conn, "SELECT * FROM agendamentoconsulta WHERE id_usuario = '$cpfPac' AND NM_Situacao = 'Em Aberto' ORDER BY dt_agendamentoconsulta ASC") or die(mysqli_error($conn));
								$resultAg = mysqli_num_rows($selectAg);
								if($resultAg > 0){

									if($contaTb == 0){
										?>
											<center><table class="table table-hover tableAgp">
											<thead>
												<tr>
													<th>Paciente</th>
													<th>Dia da Consulta</th>
													<th>Tipo da Consulta</th>
													<th>Horario</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
										<?php
										$contaTb++;
									}									

									while($mostraAg = mysqli_fetch_array($selectAg)) {
										$ag = $mostraAg["cd_agendamentoconsulta"];
										$consult = $mostraAg["id_consulta"];
										$selectConsulta = mysqli_query($conn, "SELECT * FROM consulta WHERE cd_consulta = '$consult'") or die(mysqli_error($conn));
										$mostraConsulta = mysqli_fetch_array($selectConsulta);
										$nmConsult = $mostraConsulta["nm_consulta"];
										$hrConsult = $mostraConsulta["hr_consultainicio"] . " ás " . $mostraConsulta["hr_consultafinal"];
										?>
											<tr>
												<td><?php echo $mostraPac["nome"]; ?></td>
												<td><?php echo $mostraAg["dt_agendamento"]; ?></td>
												<td><?php echo $nmConsult; ?></td>
												<td><?php echo $hrConsult; ?></td>
												<td><form action="cancelAg.php" method="POST">
												<button class='btn btn-danger' value="<?php echo $ag ?>" name="cancelAg">Cancelar</button>
												</form></td>
											</tr>
										<?php
									}
									$contaAg++;

								} else {

								}
							}

							if($contaAg == 0) {
								echo "<br><br><br><br><br><br><center><h3 style='color: rgba(255, 255, 255, 0.9);'>Nenhuma consulta agendada</h3></center>";
							} else {
								echo "</tbody></table></center>";
							}
						?>
			</div>
			<div class="col-xs-4 infoCol">
				<br><br><p><i class="glyphicon glyphicon-chevron-right"></i> Consultas Agendadas: <br><br><span>Todas as consultas já agendadas por seu prontuário são mostradas aqui.</span>
				<br><br><span>Sempre cancele um agendamento que não possa comparecer, assim liberando vaga para que outra pessoa receba a consulta.</span>
				<br><br><span>Cancelar um agendamento fará com que o mesmo seja retirado desta lista.</span></p>
			</div>
		</div>
	</div>
	<!-- JQUERY -->
	<script src="js/jquery-3.1.0.min.js"></script>
	<!-- BOOTSTRAP JS -->
	<script src="js/bootstrap.min.js"></script>
	<!-- JS -->
	<script type="text/javascript" src="js/js.js"></script>
</body>
</html>