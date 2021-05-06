<?php
    require_once 'conexao.php';
?>
<?php
 require_once 'restrito.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Consultas</title>
    <link rel="stylesheet" href="css/feed.css">
    <link rel="stylesheet" href="css/navbar.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<?php
    require_once 'navbar.php';
?>
        <?php
        $query = "SELECT nome, email, foto FROM cad_usuario ORDER BY nome ASC";
        $exec = mysqli_query($conexao, $query);
        ?>

        <div class="main">
        <ul class="cards">
        <?php
            while ($paciente = mysqli_fetch_array($exec)){
            echo "<li class='cards_item'>
                    <div class='card'>
                        <div class='card_image'><img src='imagens/$paciente[foto]'></div>
                            <div class='card_content'>";
                                    echo "<h2 class='card_title'>$paciente[nome]</h2>";
                                    echo "<p class='card_text'>$paciente[email]</p>";
									echo "<button class='infos'>Infantil</button>
                            <a href='marcar_consulta.php'><button class='btn card_btn'>Marcar</button></a>
                        </div>
                </div>
            </li>";
            }?>

        </ul>
    </div>
    

    <script src="js/navbar.js"></script>
</body>
 
</html>