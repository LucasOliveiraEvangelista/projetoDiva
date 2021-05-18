<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do User</title>



<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/psico.css">

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
                        <!-- <img class = "logo" src="assets/logo.png" alt=""> -->
                        <p>D</p>
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

                        <a href="perfil.php" class="nav__link">
                        <i class="far fa-user"></i>
                            <span class="nav__name">Perfil</span>
                        </a>
                    </div>
                </div>

            </nav>
    </div>

    <?php
			require_once 'conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT *
				FROM psicologos WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
	?>
    <div class="card_psicologo">
        <div class="coluna">
            <?php echo "<img src='imagens/$usuario[foto]' alt='user'>";  ?>
        </div>
        <div class="coluna2">
            <div class="info">
                <p class = "nome"><?php echo $usuario['nome']?></p>
                <p>E-mail: <?php echo $usuario['email'] ?></p>
                <p>tempo de experiência: <?php 
                    $tempo = 2021 - $usuario['tempo_experiencia'];
                echo "$tempo Anos"; ?></p>
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
                <p>CEP: <?php echo $usuario['cep'] ?></p>
                <p>Estado: <?php echo $usuario['estado'] ?></p>
                <p>Local do consultório: <?php echo $usuario['local'] ?></p>
                <p>Idioma: <?php echo $usuario['idioma'] ?></p>
                <p>Valor: R$ <?php echo $usuario['valor'] ?></p>
            </div>

            <div class="btn">
                <a href="process/alterar_psico.php"><button class="alter">Alterar Informações</button></a>
            </div>
        </div>
    </div>


<script src="js/navbar.js"></script> 

<?php
		}else{
			echo "Acesso negado";
		} 
	?>
</body>
</html>