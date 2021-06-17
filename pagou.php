<?php
    require_once 'conexao.php';
    session_start();
    $id_user = $_SESSION['unique_id'];
    $cons = $_GET['pagou'];

    $query = mysqli_query($conn, "SELECT * FROM consulta WHERE id_consulta = '$cons' AND id_user = '$id_user'");
    $achou = mysqli_fetch_array($query);
    $id_psic = $achou['id_psic'];

    $query = mysqli_query($conn, "UPDATE consulta SET tipo_pagamento = 'Pix' WHERE id_consulta = '$cons' AND id_user = '$id_user'");
    $achou = mysqli_fetch_array($query);

   if($query){
    $notif = mysqli_query($conn, "INSERT INTO notificacao (id_para, id_enviou, msg, status) VALUES ('$id_psic', '$id_user', 'Pagou consulta', 'Não Visto')");
    echo "<script>
                alert('Consulta paga com sucesso! Aguarde a confirmação do Psicólogo');
                location.href='pagar.php';
                </script>";
   }
?>