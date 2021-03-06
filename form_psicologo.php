<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se no Divã</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
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