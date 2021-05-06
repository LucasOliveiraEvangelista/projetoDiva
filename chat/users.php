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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<?php
  require_once '../navbar.php';
?>
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
          <img src="" alt="">
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
