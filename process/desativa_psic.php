<?php

    require_once '../conexao.php';
    session_start();
    $id = $_SESSION['unique_id'];

        $query = "UPDATE psicologos SET desativada = 1 WHERE unique_id = $id";
        $atualizar = mysqli_query($conn, $query);

        if($atualizar == 1){
            echo "
                <script>
                alert('Conta desativada com sucesso! Esperamos te ver novamente em breve');
                location.href='../index.php';
                </script>
            ";
            
        }else{
            echo "
                <script>
                alert('Erro ao desativar conta');
                history.back();
                </script>
            ";  
        }
        
	        session_destroy();
	        

?>