<?php
    require_once '../conexao.php';
    session_start();
    $hora = $_GET['hora'];
    $id = $_SESSION['unique_id'];

    $deletar = mysqli_query($conn, "DELETE FROM horarios WHERE id_agendamento = '$hora' AND id_psic = '$id' ");

    if($deletar){
        echo "
			<script>
				alert('Horário apagada com Sucesso!');
				location.href='../agenda.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('Erro ao excluir horário');
				location.href='../agenda.php';
			</script>
		";
	
    }

?>