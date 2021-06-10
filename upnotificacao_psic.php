<?php

    require_once 'conexao.php';

    $id_msg = $_GET['id_not'];

    $update = mysqli_query($conn, "UPDATE notifcacao SET status = 'Visto' WHERE id = '$id_msg'");
    if($update){
        echo "<script>
        alert('Marcado como Visto');
        location.href='notificacao_psic.php';
        </script>";
    }else {
        echo "<script>
        alert('erro ao marcar como visto');
        location.href='notificacao_psic.php';
        </script>";
    }

?>