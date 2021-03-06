<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do User</title>



<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/user.css">
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
			require_once 'conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT nome, nascimento, telefone, sexo, email, cpf, cep, estado, foto
				FROM cad_usuario WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
	?>
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
    <div class="cont">
    
    <div class="card_psicologo">
        <div class="coluna">
            <?php echo "<img src='imagens/$usuario[foto]' alt='user'>";  ?>
        </div>
        <div class="coluna2">
            <div class="info">
                <p class = "nome"><?php echo $usuario['nome']?></p>
                <p>E-mail: <?php echo $usuario['email'] ?></p>
                <p>Nasceu em: <?php echo $usuario['nascimento'] ?></p>
                <p>Sexo: <?php 
								if($usuario['sexo']=='f'){
									echo "Feminino";
								}else if($usuario['sexo']=='m'){
									echo "Masculino";
								}else if($usuario['sexo']=='o'){
									echo "Outro";
								}else if($usuario['sexo']=='n'){
									echo "Não sei responder";
								}else{
									echo "Pefiro não responder";
								}
								?></p>
                <p>Estado: <?php echo $usuario['estado'] ?></p>
                <p>Telefone: <?php echo $usuario['telefone'] ?></p>
            </div>

            <div class="btn">
                <a href="process/alterar_usuario.php"><button class="alter">Alterar Informações</button></a>
            </div>
        </div>
    </div>
    </div>
    

<?php
		}else{
			echo "Acesso negado";
		} 
	?>
</body>
</html>