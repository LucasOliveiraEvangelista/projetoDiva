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
</head><body id="body-pd">
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
                    <a href="../dash_user.php" class="nav__link ">
                    <i class="fas fa-th-large"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="../lista_psicologos.php" class="nav__link">
                    <i class="fas fa-list-ul"></i>
                        <span class="nav__name">Feed</span>
                    </a>
                    <a href="../chat_psic/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="../notificacao_user.php" class="nav__link">
                    <i class="far fa-bell"></i>
                        <span class="nav__name">Notificações</span>
                    </a>

                    <a href="../perfil_user.php" class="nav__link">
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
        <?php
			require_once '../conexao.php';
            $esp = $_POST['espe'];
			$executar = "SELECT p.nome AS nombre, p.unique_id, p.resumo, p.foto, p.diploma, p.crp, p.situacao, p.estado, p.valor, p.tempo_consulta, e.nome, e.id_psic FROM psicologos AS p JOIN esp_psico AS e WHERE e.id_psic = p.unique_id AND e.nome LIKE '%$esp%'";
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
                    <p class = 'nome'>$psic[nombre]</p>
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