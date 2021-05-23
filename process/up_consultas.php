<?php
    require_once '../conexao.php';
    $rea = $_POST['realizada'];
    

    $realizou = mysqli_query($conn, "UPDATE consulta SET realizada = 1 WHERE id_consulta = '$rea'");
    if($realizou){
        echo "<script>
        alert('Consulta marcada como realizada com sucesso!');
        location.href='../marcadas.php';
        </script>";
    }else{
        echo "<script>
        alert('Erro ao marcar como realizada consulta!');
        location.href='../marcadas.php';
        </script>";
    }

?>