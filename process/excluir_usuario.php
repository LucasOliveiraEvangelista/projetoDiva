<?php
	require_once '../conexao.php';

	session_start();
	$query = "DELETE FROM cad_usuario WHERE unique_id = ".$_SESSION['unique_id'];
	$excluir = mysqli_query($conn, $query);
	if($excluir==1){
		echo "
			<script>
				alert('Conta apagada com Sucesso. Esperamos te ver novamente!');
				location.href='../index.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Erro ao excluir conta.');
				location.href='alterar_psic.php';
			</script>
		";
	}
?>