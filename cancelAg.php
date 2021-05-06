<?php
 require_once 'restrito.php';
?>
<?php  
	require_once 'conexao.php';

	$ag = $_POST["cancelAg"];

	$updateAg = mysqli_query($conn, "UPDATE agendamentoconsulta SET nm_situacao = 'cancelada' WHERE cd_agendamentoconsulta = '$ag'") or die(mysqli_error($conn));
	
	header("Location: consultas-marcadas.php");

?>