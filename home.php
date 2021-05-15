
<?php
session_start();
 require_once 'restrito.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seja bem-vindo</title>
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>

    <section>
        <input type="checkbox"  id="check">
        <header>
            <h2><a href="#" class="logo">Divã</a></h2>
            <div class="navigation">
                <a href="#">Home</a>
                <a href="#">Consulta</a>
                <a href="#">Sobre</a>
                <a href="#">Contato</a>
                <a href="login.php" target="_self">Perfil</a>
                <a href="#">Sair</a>
            </div>
            <label for="check">
                <i class="fas fa-bars menu-btn"></i>
                <i class="fas fa-times close-btn"></i>
            </label>
        </header>
        <div class="content">
            <div class="info">
                <h2>Criado para ajudar pessoas,</br>o <span>Divã</span></h2>
                <p>Tem como objetivo levar ajuda psicológica para pessoas de baixa renda a fazer acompanhamentos 
                    com profissionais da área por um preço acessível e uma proximidade 
                    maior do psicologo com o paciente com nossa plataforma.</p>
                <a href="#" class="info-btn">Ver Mais</a>
            </div>
            
            
        </div>
        
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </section>

  </body>
</html>