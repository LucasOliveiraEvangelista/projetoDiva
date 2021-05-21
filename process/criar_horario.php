<?php
    require_once '../conexao.php';
    $inicio = $_POST['hora_inicio'];
    $fim = $_POST['hora_fim'];
    $dia = $_POST['dia'];

    session_start();

    // $id = $_SESSION['unique_id'];
    $id = "687908762";

    if($inicio == $fim){
        echo "<script>
        alert('Horário de inicio e fim iguais');
        history.back();
        </script>";
    }else{

    $query = mysqli_query($conn, "INSERT INTO horarios (dia, hora_inicio, hora_fim, id_psic) VALUES ('$dia', '$inicio', '$fim', $id)");

    if($query){
        echo "<script>
        alert('Horário cadastrado com sucesso!');
        location.href='../agenda.php';
        </script>";
    }else{
    echo "Email não existe";
    }
}
    


?>