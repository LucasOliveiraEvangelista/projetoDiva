<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../conexao.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            $notif = mysqli_query($conn, "INSERT INTO notificacao (id_para, id_enviou, msg, status) VALUES ('$incoming_id', '$outgoing_id', 'Nova Mensagem', 'Não Visto')");
        }
    }else{
        header("location: ../../login.php");
    }


    
?>