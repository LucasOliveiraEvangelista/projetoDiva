<?php
    require_once '../conexao.php';
    session_start();
    $esp = $_GET['esp'];
    $id = $_SESSION['unique_id'];

    $deletar = mysqli_query($conn, "DELETE FROM esp_psico WHERE id = '$esp' AND id_psic = '$id' ");

    if($deletar){
        echo "
			<script>
				alert('Especialidade apagada com Sucesso!');
				location.href='alterar_especialidades.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Erro ao excluir especialidade');
				location.href='alterar_especialidades.php';
			</script>
		";
	
    }

?>