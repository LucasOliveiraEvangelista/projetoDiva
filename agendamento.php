<?php  
	require_once 'conexao.php';
?>
<?php
//  require_once 'restrito.php';
?>
<!doctype html>
<html lang = "pt-br">
	<head>
		<head>
		<!-- META -->
		<meta http-equiv="content-type" content="text/html" charset="UTF-8">
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
		<title> Agende sua consulta </title>
		<meta name="description" content="divã - agendamentos">
		<!-- FONT AWESOME -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- FONT LATO -->
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- BOOTSTRAP THEME CSS -->
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<!-- BOOTSTRAP DATAPICKER -->
		<link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
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
	<div class="container-fluid agendamentoMain">
		<div class="row agendamentoRow">
			<div class="col-xs-7 formCol">
				<h1>nicho: 
				<?php  
					if ($resultnicho["cd_nicho"] == 1){
					echo $resultnicho["nm_nicho"];
				
					$_SESSION["nm_nicho"] = $resultUbs["nm_nicho"];
					$_SESSION["cd_nicho"] = $resultUbs["cd_nicho"];
				?>
				</a></h1>
				<form action="valida-agendamento.php" method="POST">
					<div class="form-group">
						<label for="membroGrupo">Selecione o membro do grupo residencial:</label>
					</div>
					<div class="form-group">
						<label for="tipoConsulta">Selecione o tipo da consulta:</label>
						<select id="tipoConsulta" class="form-control" name="nmConsulta" required>
							<option disabled selected>Selecione ...</option>
							<?php
								$selectConsulta = mysqli_query($conn, "SELECT * FROM consulta WHERE id_nicho = '1'") or die(mysqli_error($conn));
								$resultConsulta	= mysqli_num_rows($selectConsulta);
								$semana = array();
								$desabilita = array();
								$s = 0;
								$d = 1;

								for ($i = 0; $i <= $resultConsulta; $i++){
									$semana[$i][0] = "";
									$semana[$i][1] = "";
									$semana[$i][2] = "";
									$semana[$i][3] = "";
									$semana[$i][4] = "";
									$semana[$i][5] = "";
									$semana[$i][6] = "";
								}

								while($mostraConsulta = mysqli_fetch_array($selectConsulta)) {
								
									$status = $mostraConsulta["id_status"];
									$valor = $mostraConsulta["nm_diasemana"];
									$dia = " / ";

									$n[0] = substr($valor,0,1);
									$n[1] = substr($valor,1,1);
									$n[2] = substr($valor,2,1);
									$n[3] = substr($valor,3,1);
									$n[4] = substr($valor,4,1);
									$n[5] = substr($valor,5,1);
									$n[6] = substr($valor,6,1);
							
									$conta = $n[0] + $n[1] + $n[2] + $n[3] + $n[4] + $n[5] + $n[6];
									$num = 1;
									$desabilita[$d] = "";
									
									if($n[0] == "1"){
										if($conta == 1){
											$dia .= "Domingo.";
										}
										else if(($num + 1) == $conta){
											$dia .= "s";
										}
										else if($conta == $num){
											$dia .= " e Domingo.";
										}
										else if ($num < $conta){
											$dia .= "Domingo, ";
										} 
										$num++;
										$semana[$s][0] = "0,";
									} else {
										$desabilita[$d] .= "0";
									}

									if($n[1] == "1"){
										if($conta == 1){
											$dia .= "Segunda-Feira.";
										}
										else if(($num + 1) == $conta){
											$dia .= "Segunda-Feira";
										}
										else if($conta == $num){
											$dia .= " e Segunda-Feira.";
										}
										else if ($num < $conta){
											$dia .= "Segunda-Feira, ";
										} 
										$num++;
										$semana[$s][1] = "1,";
									} else {
										$desabilita[$d] .= "1";
									}

									if($n[2] == "1"){
										if($conta == 1){
											$dia .= "Terça-Feira.";
										}
										else if(($num + 1) == $conta){
											$dia .= "Terça-Feira";
										}
										else if($conta == $num){
											$dia .= " e Terça-Feira.";
										}
										else if ($num < $conta){
											$dia .= "Terça-Feira, ";
										} 
										$num++;
										$semana[$s][2] = "2,";
									} else {
										$desabilita[$d] .= "2";
									}

									if($n[3] == "1"){
										if($conta == 1){
											$dia .= "Quarta-Feira.";
										}
										else if(($num + 1) == $conta){
											$dia .= "Quarta-Feira";
										}
										else if($conta == $num){
											$dia .= " e Quarta-Feira.";
										}
										else if ($num < $conta){
											$dia .= "Quarta-Feira, ";
										} 
										$num++;
										$semana[$s][3] = "3";
									} else {
										$desabilita[$d] .= "3";
									}

									if($n[4] == "1"){
										if($conta == 1){
											$dia .= "Quinta-Feira.";
										}
										else if(($num + 1) == $conta){
											$dia .= "Quinta-Feira";
										}
										else if($conta == $num){
											$dia .= " e Quinta-Feira.";
										}
										else if ($num < $conta){
											$dia .= "Quinta-Feira, ";
										} 
										$num++;
										$semana[$s][4] = "4,";
									} else {
										$desabilita[$d] .= "4";
									}

									if($n[5] == "1"){
										if($conta == 1){
											$dia .= "Sexta-Feira.";
										}
										else if($num == 1 && $conta == 2){
											$dia .= "Sexta-Feira";
										}
										else if($conta == $num){
											$dia .= " e Sexta-Feira.";
										}
										else if ($num < $conta){
											$dia .= "Sexta-Feira, ";
										} 
										$num++;
										$semana[$s][5] = "5,";
									} else {
										$desabilita[$d] .= "5";
									}

									if($n[6] == "1"){
										if($conta == 1){
											$dia .= "Sabado.";
										}
										else if(($num + 1) == $conta){
											$dia .= "Sabado";
										}
										else if($conta == $num){
											$dia .= " e Sabado.";
										}
										else if ($num < $conta){
											$dia .= "Sabado, ";
										} 
										$num++;
										$semana[$s][6] = "6,";
									} else {
										$desabilita[$d] .= "6";
									}

									if($status == 1) {
										echo "<option value='" . $mostraConsulta["cd_consulta"] . "'>" . $mostraConsulta["nm_consulta"] . " - " . $mostraConsulta["hr_consultainicio"] . " ás " . $mostraConsulta["hr_consultafinal"] . $dia . "</option>";
									} else {
										
									}
									
									$s++;
									$d++;
								}
								?>
						</select>
					</div>
					<div class="form-group">
						<?php 
							$t = 1;
							for ($i = 0; $i < $resultConsulta; $i++){
								$mostrasemana[$t] = $semana[$i][0] . " " . $semana[$i][1] . " " . $semana[$i][2] . " " . $semana[$i][3] . " " . $semana[$i][4] . " " . $semana[$i][5] . " " . $semana[$i][6];
								$t++;
							}
						?>
						<label for="datepicker">Selecione o dia da consulta:</label>
						<div class="input-group date">
							<input type="text" class="form-control" autocomplete="off" name="nmDia" id="nmDia" required disabled>
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-th"></i>
							</span>
						</div>
					</div>
					<p class="text-danger">
						<?php 
							if(isset($_SESSION['erroConsulta'])){
								echo "<p class='text-danger text-center'>" . $_SESSION["erroConsulta"] . "</p>";
								unset($_SESSION['erroConsulta']);
							} 
						?>						
					</p>
					<button type="submit" class="btn btn-default pull-right">Agendar</button>
				</form>
			</div>
			<div class="col-xs-5 infoCol">
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
	<script type="text/javascript">
		$(document).ready(function() {
		    $("#tipoConsulta").change(function(){
		    	$('.input-group.date').datepicker('destroy');
		    	$("#nmDia").val("");
		        // pega o valor do select selecionado
		        $("#nmDia").prop("disabled", true);
		        var valor = $(this).val();
		        var sem = ['',<?php for ($i=1; $i <= $resultConsulta ; $i++) { 
		        	echo "'" . $mostrasemana[$i] . "',";
		        } ?>];
		        var des = ['',<?php for ($i=1; $i <= $resultConsulta ; $i++) { 
		        	echo "'" . $desabilita[$i] . "',";
		        } ?>];
		        if (valor > 0){
		        	$("#nmDia").prop("disabled", false);
		        }
		        $("#nmDia").val(teste[valor]);
		       	alert(teste[1]);
		        insere o valor no input desejado
		        alert(title);
		        $('.input-group.date').datepicker({
				format: "dd/mm/yyyy",
				startDate: "today",
				maxViewMode: 1,
				language: "pt-BR",
				todayHighlight: true,
				datesDisabled: [''],
				daysOfWeekDisabled: des[valor],
	   			daysOfWeekHighlighted: sem[valor],
				toggleActive: true
				});
		    });
		});
	</script>
	
</body>
</html>