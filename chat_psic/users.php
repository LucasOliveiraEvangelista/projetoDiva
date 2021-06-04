<?php 
  session_start();
  include_once "../conexao.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>usuarios</title>

  <link rel="stylesheet" href="../css/navbar.css">
  <link rel="stylesheet" href="../css/chat.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body id="body-pd">
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
                    <a href="../lista_psicologos.php" class="nav__link ">
                    <i class="fas fa-th-large"></i>
                        <span class="nav__name">Feed</span>
                    </a>
                    
                    <a href="../consulta.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="../sobre.php" class="nav__link">
                    <i class="fas fa-book"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="../perfil_user.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="../js/navbar.js"></script>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM cad_usuario WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <?php echo "<img src='../imagens/$row[foto]' alt=''>";?>
          <div class="details">
            <span><?php echo $row['nome']; ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
       
      </header>
      <div class="search">
        <span class="text">Selecione alguém para conversar</span>
        <input type="text" placeholder="Insira o nome aqui">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>
  <script src="../js/navbar.js"></script>

</body>
</html>
