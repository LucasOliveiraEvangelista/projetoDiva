<?php
	require_once 'conecta.php';

	session_start();
	$query = "DELETE FROM cad_profissional WHERE id_profissional = $_SESSION[id_profissional]";
	$excluir = mysqli_query($conexao, $query);
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