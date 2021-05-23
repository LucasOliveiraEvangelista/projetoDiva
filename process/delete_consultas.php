<?php

    require_once '../conexao.php';
    $cancel = $_POST['cancelada'];
    $r = 1;

    $apaga = mysqli_query($conn, "DELETE FROM consulta WHERE id_consulta = '$cancel'");
    if($apaga){
        echo "<script>
        alert('Consulta deletada com sucesso!');
        location.href='../marcadas.php';
        </script>";
    }else{
        echo "<script>
        alert('Erro ao Deletar consulta!');
        location.href='../marcadas.php';
        </script>";
    }


?>