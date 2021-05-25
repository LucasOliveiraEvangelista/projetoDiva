
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Consultas</title>
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/navbar.css">
    
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

                        <a href="perfil-usuario.php" class="nav__link">
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
        <?php
			require_once '../conexao.php';
	
			$pesquisar = $_POST['pesquisar'];
			$executar = "SELECT * FROM psicologos WHERE nome LIKE '%$pesquisar%' LIMIT 5";
			$resultados = mysqli_query($conn, $executar);
        ?>

        <div class="main">
        <ul class="cards">
        <?php
           while($psic = mysqli_fetch_array($resultados)){
            echo "<div class='card_psicologo'>
            <div class='coluna'>
            <img src='../imagens/$psic[foto]' alt='user'>
                <div class='btn_chat'>
                    <a href='chat_psic/chat.php?user_id=$psic[unique_id]'><button class='chat'>Chat</button></a>
                </div>
                <div class='btn_chat'>
                <a href='psicologo.php?psic=$psic[unique_id]' target='_self'><button class='chat'>Ver</button></a>
            </div>
            </div>
            <div class='coluna2'>
                <div class='info'>
                    <p class = 'nome'>$psic[nome]</p>
                    <p>Formado na: $psic[diploma]</p>
                    <p>CRP: $psic[crp]</p>
                    <p>Estado: $psic[estado]</p>
                    <p>Valor: R$ $psic[valor]/$psic[tempo_consulta]</p>
                </div>
                <hr>
                <p class='texto'>
                $psic[resumo]
                </p>
            </div>
        </div>";;
            }?>

        </ul>
    </div>
    

    <script src="js/navbar.js"></script>
</body>
 
</html>