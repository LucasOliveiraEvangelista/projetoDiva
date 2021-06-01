<?php

    require_once '../conexao.php';
    session_start();
    $espec = $_POST['espec'];
    $id = $_SESSION['unique_id'];

    $verifica = mysqli_query($conn, "SELECT * FROM esp_psico WHERE id_psic = '$id'");
    $achou = mysqli_num_rows($verifica);

    if($achou >= 5){
        echo "
            <script>
            alert('Pode apenas 5 especialidades');
            history.back();
            </script>
        ";  
    }else{

    $insert = mysqli_query($conn, "INSERT INTO esp_psico (nome, id_psic) VALUES ('$espec', '$id')");

    if($insert == 1){
        echo "
            <script>
            alert('Dado(s) editado com sucesso!');
            location.href='alterar_especialidades.php';
            </script>
        ";
    }else{
        echo "
            <script>
            alert('Erro ao editar');
            location.href='../perfil_psic.php';
            </script>
        ";  
}
    }

?>