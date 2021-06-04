<?php
    require_once '../conexao.php';
    session_start();
    $consulta = $_GET['horario'];

    // print_r($consulta);
    
    $select = mysqli_query($conn, "SELECT * FROM horarios WHERE id_agendamento = '$consulta' ");
    $ag = mysqli_fetch_array($select);
    $id_hora = $ag['horario'];

    $acha = mysqli_query($conn, "SELECT dia, hora_inicio, hora_fim FROM horarios WHERE id_agendamento = '$consulta'");
    $foi = mysqli_fetch_array($acha);
    $hr = "$foi[dia], $foi[hora_inicio] - $foi[hora_fim]";

    $id_psic = $ag['id_psic']; 
    $id_user = $_SESSION['unique_id'];
    

    $tipo = "Dinheiro";
    // Dinheiro, pix, cartao, mercado pago, transferencia

    
    $marcou = mysqli_query($conn, "UPDATE horarios SET marcado = 1 WHERE id_agendamento = '$consulta'");
    if($marcou){
        $query = mysqli_query($conn, "INSERT INTO consulta (horario, id_psic, id_user, realizada, pago, tipo_pagamento) VALUES ('$hr', '$id_psic', '$id_user', '0', 'Não', '$tipo')");
        if($query){
            echo "<script>
                        alert('Consulta marcada com sucesso!');
                        location.href='../psicologo.php';
                        </script>";
        }
    }
    // meios de pagamento 

?>