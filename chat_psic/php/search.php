<?php
    session_start();
    include_once "../../conexao.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM psicologos WHERE NOT unique_id = {$outgoing_id} AND (nome LIKE '%{$searchTerm}%' OR telefone LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'Nenhum usuário corresponde a pesquisa';
    }
    echo $output;
?>