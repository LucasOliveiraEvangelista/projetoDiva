<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    n
<?php

require_once 'conexao.php';
session_start();
$id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$id'");
$tem = mysqli_num_rows($query);

if($query){
    if($tem == 1){
        echo "<script>
            alert('Você tem $tem Nova Notificação');
        </script>";
    }else{
        echo "<script>
            alert('Você tem $tem Novas Notificações');
        </script>";
    }
}
$query2 = mysqli_query($conn, "SELECT u.nome, u.unique_id, n.msg, n.id_para, n.id, n.id_enviou, n.status FROM cad_usuario AS u INNER JOIN notificacao AS n ON u.unique_id = n.id_enviou WHERE id_para = '$id'");
while($notif = mysqli_fetch_array($query2)){
    echo "<div>
    <p>$notif[nome]</p>
    <p>$notif[msg]</p>
    <p>$notif[status]</p>
    <a href='upnotificacao_psic.php?id_not=$notif[id]'><button>Visto</button></a>
    </div>";
}
print_r($query2);
?>
</body>
</html>