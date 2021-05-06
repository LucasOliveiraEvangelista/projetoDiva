<?php
    session_start();
    require_once 'conexao.php';
    // print_r($_POST);
    $id = $_SESSION['unique_id'];

if(isset($_POST['dia'])){
    $lista = $_POST['dia'];

    foreach ($lista as $dia) {
        echo $dia.", ";
        $acha = mysqli_query($conn, "SELECT id_psicologos FROM psicologos WHERE unique_id = {$_SESSION['unique_id']}");
        if($am = mysqli_num_rows($acha)){
            echo 'deu bom';
        $inse = mysqli_query($conn, "INSERT INTO diaT ( nome, id_psicologo ) VALUES('$dia', '$am')");
        }else{
            echo 'deu ruim';
        }
    }
 }
// if(isset($_POST['hora'])){
//     $lis = $_POST['hora'];

//     foreach ($lis as $hora) {
//         echo $hora.", ";
//         //$insert = mysqli_query($conn,  "INSERT INTO horarios ( horario, unique_id) VALUES('$hora', '$id')");
//     }
// }

?>