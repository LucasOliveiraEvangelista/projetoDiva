<?php
    require_once '../conexao.php';
    session_start();
    $esp = $_GET['exp'];
    $id = $_SESSION['unique_id'];

    $deletar = mysqli_query($conn, "DELETE FROM tipo_nicho WHERE id_tipo_nicho = '$esp' AND id_psic = '$id' ");

    if($deletar){
        echo "
			<script>
				alert('Experiência apagada com Sucesso!');
				location.href='alterar_especialidades.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Erro ao excluir expereência');
				location.href='alterar_especialidades.php';
			</script>
		";
	
    }

?>