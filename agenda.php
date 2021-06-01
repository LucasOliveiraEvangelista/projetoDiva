<?php
// session_start();
// if (!isset($_SESSION['unique_id'])) {
// header("Location: login.php");
// } exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus horários</title>
    <script src="js/ag.js" defer></script>

    <link rel="stylesheet" type = "text/css" href="css/age.css">
    <link rel="stylesheet" href="css/navbar.css">

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

    <div class="formulario">
       
        <form action="process/criar_horario.php" method="post">
            <div class="dia">
                <p class = "titulo">Adicionar horarios </p>
                <span>Dia: </span>
                <?php
                    require_once 'conexao.php';
                    session_start();

                    $query = mysqli_query($conn, "SELECT * FROM dias");
                    ?>
                    <select name="dia" id="1">
                    <?php 
                    while ($dias = mysqli_fetch_array($query)){
                    echo "<option value='$dias[dia]'>$dias[dia]</option>";
                    }
                    ?>
                    </select>
            </div>

            <div class="horas">
                <span>Horário:</span>
                <select name="hora_inicio" id="1">

                    <?php 
                    $queryhora = mysqli_query($conn, "SELECT * FROM horas");
                    while ($hora = mysqli_fetch_array($queryhora)){
                    echo "<option value='$hora[horarios]'>$hora[horarios]</option>";
                    }
                    ?>
                    </select>
                    <span>  Até  </span>
                    <select name="hora_fim" id="2">

                    <?php 
                    $queryhora = mysqli_query($conn, "SELECT * FROM horas");
                    while ($hora = mysqli_fetch_array($queryhora)){
                    echo "<option value='$hora[horarios]'>$hora[horarios]</option>";
                    }
                    ?>
                </select> 
            </div>
            <input type="submit" value="Criar">   
        </form>
    </div>
    
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Segunda-Feira' ORDER BY dia DESC");
       
       ?>
        <div class="dia">
            <p>Segunda-Feira</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Terça-Feira' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Terça-Feira</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                         echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Quarta-Feira' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Quarta-Feira</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Quinta-Feira' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Quinta-Feira</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Sexta-Feira' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Sexta-Feira</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Sábado' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Sábado</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                ?>
            </div>
        </div>
    </div>
    <div class="horarios">
        <?php
        
        $id = $_SESSION['unique_id'];
        $meus = mysqli_query($conn, "SELECT * FROM horarios WHERE id_psic = '$id' AND dia = 'Domingo' ORDER BY hora_inicio DESC");
       
       ?>
        <div class="dia">
            <p>Domingo</p>
            <div class="horas">
                <?php
                    while ($calenda = mysqli_fetch_array($meus)){
                        echo "<a href='process/delete_horario.php?hora=$calenda[id_agendamento]'><button>$calenda[hora_inicio] - $calenda[hora_fim]</button></a>";
                         }
                        }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
