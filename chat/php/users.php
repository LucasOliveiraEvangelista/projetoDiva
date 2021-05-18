<?php
    session_start();
    include_once "../../conexao.php";
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM cad_usuario WHERE  unique_id = 
    {$outgoing_id} ORDER BY nome ASC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Sem usuarios por aqui";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>