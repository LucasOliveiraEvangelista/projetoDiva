<?php
// session_start();
// if (!isset($_SESSION['unique_id'])) 
// header("Location: login.php");
// exit;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/dash.css">

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
                    
                    <a href="agenda.php" class="nav__link">
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
    ?>

    <div class="conteudo">
        <div class="card">
            <p>Consultas realizadas</p>
            <?php
                
                $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_psic = '$id' AND realizada = 1");
                $realizadas = mysqli_num_rows($consultas);

                echo "<span>$realizadas</span>";
            ?>
           <a href="realizadas.php"><button>VER</button></a>
        </div>
        <div class="card">
            <p>Consultas marcadas</p>
            <?php
                
                $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_psic = '$id' AND realizada = 0");
                $marcadas = mysqli_num_rows($consultas);

                echo "<span>$marcadas</span>";
            ?>
            <a href="marcadas.php"><button>VER</button></a>
        </div>
        <div class="card">
            <p>Pedidos de Remarcação</p>
            <?php
                
                $consultas = mysqli_query($conn, "SELECT * FROM consulta WHERE id_psic = '$id' AND realizada = 2");
                $remarca = mysqli_num_rows($consultas);

                echo "<span>$remarca</span>";
            ?>
            <button>VER</button>
        </div>
    </div>
    
</body>
</html>