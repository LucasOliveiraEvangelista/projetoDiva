<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar-se no Divã</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<?php

require_once 'navbar.php';

?>
    <main>
        <h1>Cadastrar conta</h1>
        <div class="cad">
            <a href="login.php">Já tem uma conta ainda então acesse!!!</a>
            
        </div>
        <div class="alter">
            <span>Ou</span>
        </div>
       <div class="signup">
        <form  action="process/cad_paciente.php" method="POST" enctype="multipart/form-data">
            
            <p class="input"><input type="text" name="nome" placeholder="Nome">
            <input type="text" name="email" placeholder="E-mail"></p>
            <p class="input"><input type="password" name="senha" placeholder="Senha">
            <input type="text" name="nascimento" placeholder="Data de nascimento"></p>
            <p class="input"><input type="text" name="rg" placeholder="RG">
            <input type="text" name="cpf" placeholder="CPF"></p>
            <p class="input"><input type="text" name="cep" placeholder="CEP">
            <input type="text" name="telefone" placeholder="Telefone"></p>
            <p ><input id="button" type="submit" value="Cadastrar"></p>
        </form>
       </div>
    </main>
    <section class="images">
       <img src="imag/doctor.svg" alt="">
    </section>

    <script src="js/navbar.js"></script>
    <script src="javascript/signup_paci.js"></script>
</body>
</html>