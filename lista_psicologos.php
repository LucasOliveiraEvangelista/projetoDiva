<?php
    require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Psicologos</title>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/not.css">
    <link rel="stylesheet" href="css/perfil.css">

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


    <div class="pesquisa">
        <form action="process/pesquisa_esp.php" method="POST">
            <select name="espe" id="">
                <?php
                   $espec = mysqli_query($conn, "SELECT nome FROM especialidade ORDER BY nome ASC");
                   while ($especialidades = mysqli_fetch_array($espec)){
                   echo "<option name='espec' value='$especialidades[nome]'>$especialidades[nome]</option>";
                       }
                ?>
            </select>
            <input type='submit' value='Pesquisar'/>
        </form>
        <form action="process/pesquisar_psic.php" method="post">
            <input type='text' name='pesquisar' placeholder='Pesquise aqui os psicólogos ou pelo crp'/>
            <input type='submit' value='Pesquisar'/>
        </form>
    </div>

    <?php
    $notificado = $_SESSION['unique_id'];
    $notify = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$notificado' AND status = 'Não visto'");
    $not = mysqli_num_rows($notify);
     if($not){
         if($not == 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>Você tem $not Nova notificação</span>
            <a href='notificacao_user.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt'></span>
        </span></a>
            </div>";
         }
         else if($not > 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>Você tem $not Novas notificações</span>
            <a href='notificacao_user.php'><span class='close-btn'>
            <span class='fas fa-external-link-alt link'></span>
        </span></a>
            </div>";
         }
         else{
            echo "<div class='alert hide'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Nova notificação</span>
            <span class='close-btn'>
                <span class='fas fa-external-link-alt'></span>
            </span>
            </div>";
         }

    }

?>

    <?php
        $query = "SELECT * FROM psicologos WHERE situacao = '1' ORDER BY nome ASC";
        $exec = mysqli_query($conn, $query);
        ?>
        <?php
            while ($psic = mysqli_fetch_array($exec)){
            echo "<div class='card_psicologo'>
            <div class='coluna'>
            <img src='imagens/$psic[foto]' alt='user'>
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
                    <p>Formado na: $psic[faculdade]</p>
                    <p>CRP: $psic[crp]</p>
                    <p>Estado: $psic[estado]</p>
                    <p>Valor: R$ $psic[valor]/$psic[tempo_consulta]</p>
                </div>
                <hr>
                <p class='texto'>
                $psic[resumo]
                </p>
            </div>
        </div>";
            }?>
<a href='psicologo.php?psicologo=$psic[unique_id]'>

    <script src="js/navbar.js"></script>
    
</body>
</html>
