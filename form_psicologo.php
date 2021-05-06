<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se no Divã</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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
                    <a href="index.php" class="nav__logo">
                        <i class=''>D</i>
                        <span class="nav__logo-name">Divã</span>
                    </a>

                    <div class="nav__list">
                        <a href="feed.php" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon' ></i>
                            <span class="nav__name">Feed</span>
                        </a>
                        
                        <a href="consulta.php" class="nav__link">
                            <i class='bx bx-notification'></i>
                            <span class="nav__name">Consulta</span>
                        </a>

                        <a href="sobre.php" class="nav__link">
                            <i class='bx bx-book-reader'></i>
                            <span class="nav__name">Sobre nós</span>
                        </a>

                        <a href="contato.php" class="nav__link">
                            <i class='bx bx-mail-send' ></i>
                            <span class="nav__name">Contato</span>
                        </a>

                        <a href="perfil.php" class="nav__link">
                            <i class='bx bx-user nav__icon' ></i>
                            <span class="nav__name">Perfil</span>
                        </a>
                    </div>
                </div>

                <a href="logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Sair</span>
                </a>
            </nav>
        </div>
    <main>
        <h1>Cadastrar conta</h1>
        <div class="cad">
            <a href="login.php">Já tem uma conta ainda então acesse!!!</a>
            
        </div>
        <div class="alter">
            <span>Ou</span>
        </div>
        <form action="process/cad_psicologo.php" method="POST">
            
            <p><input type="text" name="nome" placeholder="Nome">
            <input type="text" name="email" placeholder="E-mail"></p>
            <p><input type="password" name="senha" placeholder="Senha">
            <input type="text" name="nasc" placeholder="Data de nascimento"></p>
            <p><input type="text" name="rg" placeholder="RG">
            <input type="text" name="cpf" placeholder="CPF"></p>
            <p><input type="text" name="cep" placeholder="CEP">
            <input type="text" name="crp" placeholder="CRP">
            </p>
            <p><input type="submit" value="Cadastrar"></p>
        </form>
    </main>
    <section class="images">
       <img src="imag/doctor.svg" alt="">
    </section>

    <script src="js/navbar.js"></script>
    <script src="javascript/signup_paci.js"></script>
</body>
</html>