<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="assets/img/perfil.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
            <div>
                <a href="index.php" class="nav__logo active">
                    <img class = "logo" src="assets/logo.png" alt="">
                    <span class="nav__logo-name">Divã</span>
                </a>

                <div class="nav__list">
                    <a href="dashboard.php" class="nav__link ">
                    <i class="fas fa-calendar-week"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="consulta.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="chat_psic/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="sobre.php" class="nav__link">
                    <i class="fas fa-book"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="perfil_psic.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
    <script src="js/navbar.js"></script>
<?php

require_once 'conexao.php';
session_start();
$id = $_SESSION['unique_id'];
$query = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$id' AND status = 'Não visto'");
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
$query2 = mysqli_query($conn, "SELECT u.nome, u.unique_id, n.msg, n.id_para, n.id, n.id_enviou, n.status 
FROM psicologos AS u INNER JOIN notificacao AS n ON u.unique_id = n.id_enviou WHERE id_para = '$id'");
while($notif = mysqli_fetch_array($query2)){
    echo "<div>
    <p>$notif[nome]</p>
    <p>$notif[msg]</p>
    <p>$notif[status]</p>
    <a href='upnotificacao_user.php?id_not=$notif[id]'><button>Visto</button></a>
    </div>";
}
?>
</body>
</html>