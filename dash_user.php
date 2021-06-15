<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashoboard</title>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/dash.css">
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
                    <a href="lista_psicologos.php" class="nav__link ">
                    <i class="fas fa-th-large"></i>
                        <span class="nav__name">Feed</span>
                    </a>
                    
                    <a href="consulta.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="sobre.php" class="nav__link">
                    <i class="fas fa-book"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="perfil_user.php" class="nav__link">
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
    ?>

    <div class="conteudo">
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
            <a href='notificacao_psic.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
            </span></a>
            </div>";
         }
         else{
            echo "<div class='alert hide'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Nova notificação</span>
            <a href='notificacao_psic.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
        </span></a>
            </div>";
         }
    }

?>
        <div class="card">
            <p>Consultas realizadas</p>
            <?php
                
                $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_user = '$id' AND realizada = 1");
                $realizadas = mysqli_num_rows($consultas);

                echo "<span>$realizadas</span>";
            ?>
           <a href="feitas.php"><button>VER</button></a>
        </div>
        <div class="card">
            <p>Consultas marcadas</p>
            <?php
                
                $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_user = '$id' AND realizada = 0");
                $marcadas = mysqli_num_rows($consultas);

                echo "<span>$marcadas</span>";
            ?>
            <a href="agendadas.php"><button>VER</button></a>
        </div>
        <div class="card">
            <p>Aguardando pagamento</p>
            <?php
                
                $horarios = mysqli_query($conn, "SELECT * FROM consulta WHERE id_user = '$id' AND pago = 0");
                $meus = mysqli_num_rows($horarios);

                echo "<span>$meus</span>";
            ?>
            <a href="pagar.php"><button>VER</button></a>
        </div>
    </div>
    
</body>
</html>