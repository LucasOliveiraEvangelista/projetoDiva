<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar no divã</title>
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link rel="stylesheet" href="css/login.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
</head>
<?php
    require_once 'navbar_user.php';
?>

    <main>
        <h1>Entrar na conta</h1>
        <div class="cad">
           <p><a href="form_paciente.php">Você Paciente não tem uma conta ainda? Então crie uma!</a></p>
		   <p><a href="form_psicologo.php">Você Profissional não tem uma conta ainda? Então crie uma!</a></p>
            
        </div>
        <div class="alter">
            <span>Ou</span>
        </div>
        <form action="process/entrar.php" method="POST">

            <p> <input type="text" name="emailL" placeholder="E-mail"></p>
            <p> <input type="password" name="senhaL" placeholder="senha"></p>
            <p><select name="op">
                <option value="psic">Psicologo(a)</option>
                <option value="paci">Usuario</option>
            </select></p>
            <p> <input type="submit" name="entrar" value="Entrar" id="button"></p>
        </form>
    </main>
    
 <section class="images">
        <img src="imag/medico.svg" alt="">
    </section>

    <script src="js/navbar.js"></script>
    

</body>
</html>