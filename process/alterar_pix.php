<?php
    require_once '../conexao.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pix cofiguraçõoes</title>
    <link rel="stylesheet" href="../css/navbar.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="../assets/img/perfil.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
            <div>
                <a href="../index.php" class="nav__logo active">
                    <img class = "logo" src="../assets/logo.png" alt="">
                    <span class="nav__logo-name">Divã</span>
                </a>

				<div class="nav__list">
                    <a href="../dashboard.php" class="nav__link ">
                    <i class="fas fa-calendar-week"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="../agenda.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="../chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="../notificacao_psic.php" class="nav__link">
                    <i class="far fa-bell"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="../perfil_psic.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                    <a href="../encerra.php" class="nav__link">
                    <i class="fas fa-sign-out-alt"></i>
                        <span class="nav__name">Sair</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="../js/navbar.js"></script>
    <form action="pix.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="chave" placeholder="Chave pix">
        <label for="qrcode">QR-code</label>
        <input type="file" name="arquivo" id="qrcode">
        <input type="submit" value="Finalizar">
    </form>
</body>
</html>