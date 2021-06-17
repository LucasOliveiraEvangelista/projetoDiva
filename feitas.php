<?php
    require_once 'conexao.php';
    session_start();
    
        $id = $_SESSION['unique_id'];
        $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_user = '$id' AND realizada = 1");
        $marcadas = mysqli_num_rows($consultas);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Consultas Realizadas ($marcadas)";?></title>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/marcada.css">
    <link rel="stylesheet" href="css/not.css">

    

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
                    <a href="dash_user.php" class="nav__link ">
                    <i class="fas fa-th-large"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="lista_psicologos.php" class="nav__link">
                    <i class="fas fa-list-ul"></i>
                        <span class="nav__name">Feed</span>
                    </a>
                    <a href="chat_psic/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="notificacao_user.php" class="nav__link">
                    <i class="far fa-bell"></i>
                        <span class="nav__name">Notificações</span>
                    </a>

                    <a href="perfil_user.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                    <a href="encerra.php" class="nav__link">
                    <i class="fas fa-sign-out-alt"></i>
                        <span class="nav__name">Sair</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="js/navbar.js"></script>
    <?php
    $notificado = $_SESSION['unique_id'];
    $notify = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$notificado'");
    $not = mysqli_num_rows($notify);
     if($not){
        if($not == 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>Você tem $not Nova notificação</span>
            <a href='notificacao_psic.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
        </span></a>
            </div>";
         }
         else if($not > 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>Você tem $not Novas notificações</span>
            <a href='notificacao_user.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
            </span></a>
            </div>";
         }
         else{
            echo "<div class='alert hide'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Nova notificação</span>
            <a href='notificacao_user.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
        </span></a>
            </div>";
         }
    }

?>
    <?php
    $acha = mysqli_query($conn, "SELECT u.nome, u.foto, u.unique_id, c.id_user, c.id_consulta, c.horario, c.realizada, c.id_psic, c.pago, c.tipo_pagamento FROM psicologos AS u INNER JOIN consulta AS c ON u.unique_id = c.id_psic  WHERE id_user = '$id' AND realizada = 1");
        
        while($consul = mysqli_fetch_array($acha)){
            echo "<div class='pacientes'>
                        <div class='card'>
                            <div class='col1'>
                                <img src='imagens/user.png' alt='imagens'>
                            </div>
                            <div class='col2'>
                                <p>$consul[nome]</p>
                                <p>$consul[horario]</p>
                                <p>Pagamento: $consul[tipo_pagamento]</p>
                                <p>Pago: $consul[pago]</p>
                            </div>
                            <div class='col3'>
                                <a href='chat/chat.php?user_id=$consul[id_user]'><button class='chat'>Chat</button></a>
                            </div>
                        </div>
            
                    </div>";
        }
    ?>
   
</body>
</html>