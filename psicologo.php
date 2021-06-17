<?php 
        require_once 'conexao.php';
        session_start();
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
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/age.css">
    <link rel="stylesheet" href="css/modal.css">
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
    // $notificado = $_SESSION['unique_id'];
    // $notify = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$notificado' AND status = 'Não visto'");
    // $not = mysqli_num_rows($notify);
    //  if($not){
    //      if($not == 1){
    //         echo "<div class='alert show'>
    //         <span class='fas fa-exclamation-circle'></span>
    //         <span class='msg'>Você tem $not Nova notificação</span>
    //         <a href='notificacao_user.php'><span class='close-btn'>
    //         <span class='fas fa-external-link-alt'></span>
    //     </span></a>
    //         </div>";
    //      }
    //      else if($not > 1){
    //         echo "<div class='alert show'>
    //         <span class='fas fa-exclamation-circle'></span>
    //         <span class='msg'>Você tem $not Novas notificações</span>
    //         <a href='notificacao_user.php'><span class='close-btn'>
    //         <span class='fas fa-external-link-alt link'></span>
    //     </span></a>
    //         </div>";
    //      }
    //      else{
    //         echo "<div class='alert hide'>
    //         <span class='fas fa-exclamation-circle'></span>
    //         <span class='msg'>$not Nova notificação</span>
    //         <span class='close-btn'>
    //             <span class='fas fa-external-link-alt'></span>
    //         </span>
    //         </div>";
    //      }

    // }

?>
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
								if($row['sexo']=='f'){
									echo "Feminino";
								}else if($row['sexo']=='m'){
									echo "Masculino";
								}else if($row['sexo']=='o'){
									echo "Outro";
								}else if($row['sexo']=='n'){
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

            <?php
            
            $espec = mysqli_query($conn, "SELECT * FROM esp_psico WHERE id_psic = '$row[unique_id]' ORDER BY nome ASC LIMIT 6");
                while ($especialidades = mysqli_fetch_array($espec)){
                    echo "<p>$especialidades[nome]</p>";
                }
            ?>
        </div>
        <div class="experiencias">
            <p class="nome">Experiências</p>
            <?php
            
            $exp = mysqli_query($conn, "SELECT * FROM tipo_nicho WHERE id_psic = '$row[unique_id]' ORDER BY nicho ASC LIMIT 6");
                while ($experiencia = mysqli_fetch_array($exp)){
                    echo "<p>$experiencia[nicho]</p>";
                }
            ?>
            
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

    <div class="navigation-manual">
        <label for="seg" class="manual-btn">S</label>
        <label for="ter" class="manual-btn">T</label>
        <label for="qua" class="manual-btn">Q</label>
        <label for="qui" class="manual-btn">Q</label>
        <label for="sex" class="manual-btn">S</label>
        <label for="sab" class="manual-btn">S</label>
        <label for="dom" class="manual-btn">D</label>
    </div>

    <div class="slider">
        <div class="slides">
                <input type="radio" name="radio-btn" id="seg">
                <input type="radio" name="radio-btn" id="ter">
                <input type="radio" name="radio-btn" id="qua">
                <input type="radio" name="radio-btn" id="qui">
                <input type="radio" name="radio-btn" id="sex">
                <input type="radio" name="radio-btn" id="sab">
                <input type="radio" name="radio-btn" id="dom">

                

                <div class="horarios first">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Segunda-Feira' ORDER BY dia DESC");
            
            ?>
                <div class="dia">
                    <p>Segunda-Feira</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Terça-Feira' ORDER BY hora_inicio DESC");
            
            ?>
                <div class="dia">
                    <p>Terça-Feira</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Quarta-Feira' ORDER BY hora_inicio ASC");
            
            ?>
                <div class="dia">
                    <p>Quarta-Feira</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Quinta-Feira' ORDER BY hora_inicio ASC");
            
            ?>
                <div class="dia">
                    <p>Quinta-Feira</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Sexta-Feira' ORDER BY hora_inicio ASC");
            
            ?>
                <div class="dia">
                    <p>Sexta-Feira</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Sábado' ORDER BY hora_inicio ASC");
            
            ?>
                <div class="dia">
                    <p>Sábado</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "<a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
            <div class="horarios">
                <?php
                
                $id = $_GET['psic'];
                $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND marcado = 0 AND dia = 'Domingo' ORDER BY hora_inicio ASC");
            
            ?>
                <div class="dia">
                    <p>Domingo</p>
                    <div class="horas">
                        <?php
                            while ($calenda = mysqli_fetch_array($meus)){
                                echo "
                                <a href='process/criar_consulta.php?horario=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                                }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <!-- <div class="center">
        <input type="checkbox" name="" id="click">
        <label for="click" class="click-me">Horario</label>
        <div class="cont">
            <div class="top">
            <h2>Formulario</h2>
                <label for="click" class="fas fa-times"></label>
            </div>
            <form action="" meyhod="">
                <p>Tipo de pagamento:
                <input type="radio" name="tipo" id="">Dinheiro
                <input type="radio" name="tipo" id="">Pix
                <input type="radio" name="tipo" id="">Cartão de crédito
                </p>
            </form>
            <div class="line"></div>
            <label for="click" class="close-btn">Fechar</label>
        </div>
    </div> -->
   
   
   
    <script src="js/ag.js"></script>
    <script src="js/navbar.js"></script>

   
</body>
</html>

