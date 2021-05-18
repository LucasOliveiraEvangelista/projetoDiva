<?php 
        require_once 'conexao.php';
          $psic_id = mysqli_real_escape_string($conn, $_GET['psic']);
          $sql = mysqli_query($conn, "SELECT * FROM psicologos WHERE unique_id = {$psic_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: lista_psicologos.php");
          }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['nome']?></title>

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/psic.css">

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
                    <a href="feed.php" class="nav__link ">
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
    <div class="conteudo">
        <div class="card_psicologo">
            <div class="coluna">
            <?php echo "<img src='imagens/$row[foto]' alt='user'>"?>
                <div class="btn_chat">
                    <button class="chat">Chat</button>
                </div>
            </div>
            <div class="coluna2">
                <div class="info">
                    <p class = "nome"><?php echo $row['nome']?></p>
                    <p>Formado na: <?php echo $row['diploma']?></p>
                    <p>CRP: <?php echo $row['crp']?></p>
                    <p>Tempo de Profissão: <?php 
                    $tempo = 2021 - $row['tempo_experiencia'];
                echo "$tempo Anos"; ?></p>
                    <p>Nasceu em: <?php echo $row['nascimento']?></p>
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
                    <p>Idioma(s): <?php echo $row['idioma']?></p>
                    <p>Estado: <?php echo $row['estado']?></p>
                    <p>Endereço do consultório: <?php echo $row['local']?></p>
                    <p>Valor: R$ <?php echo "$row[valor] / $row[tempo_consulta]"; ?></p>
                    <p>Telefone: <?php echo $row['telefone']?></p>
                </div>
        </div>
        
       
    </div>
    <div class="cards">
        <div class="especialidades">
            <p class="nome">Especialidades</p>
            <p>Ansiedade</p>
            <p>Depressão</p>
            <p>Medo e Fobias</p>
            <p>Raiva</p>
            <p>Abuso Psicológico</p>
        </div>
        <div class="experiencias">
            <p class="nome">Experiência</p>
            <p>Gestalt Terapia</p>
            <p>Psicológia Positiva</p>
            <p>Psicológia Educacional</p>
            <p>Psicológia Emocional</p>
            
            
        </div>
    </div>

    <div class="card_formacao">
            <div class="info">
                <p class = "nome">Formação</p>
                    <p>Monitora na disciplina de Avaliação Psicológica, pela Unifacid - Conclusão em 2019</p>
                    <p>I Simpósio Regional sobre Dislexia - Transtorno de Leitura e Escrita - Conclusão em 2019</p>
                    <p>Jornada Brasileira sobre depressão - Conclusão em 2020</p>
                    <p>Workshop de Inteligência Emocional: competências, gestão e autoconhecimento. - Conclusão em 2020</p>
                    <p>I Congresso Nacional de Cuidados Paliativos - Conclusão em 2020</p>
                    <p>Capacitação TDAH na prática, pelo Instituto Neuro - Conclusão em 2020</p>
                    <p>Jornada Psicologia Positiva - Conclusão em 2020</p>
                    <p>Graduação - Psicologia no Centro Universitário Unifacid - Conclusão em 2021</p>
            </div>
    </div>
    <div class="card_formacao">
        <div class="info">
            <p class = "titulo">Descrição Pessoal</p>
                <p class = "desc"><?php echo $row['texto']?></p>
        </div>
</div>
    
    <script src="js/navbar.js"></script>
</body>
</html>

