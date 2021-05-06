<?php
    require_once 'conexao.php';
    $id = $_GET['psicologo'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aendamento</title>
</head>
<body>
    <?php
        $busca = mysqli_query($conn, "SELECT nome, unique_id FROM psicologos WHERE unique_id = '$id'");
        // $psicologo = mysqli_fetch_array($busca);

        if(mysqli_num_rows($busca) > 0){
            $row = mysqli_fetch_assoc($busca);
            }
        print_r($row);
    ?>
</body>
</html>