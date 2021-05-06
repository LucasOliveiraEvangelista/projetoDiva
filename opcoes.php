<?php
    require_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções</title>
</head>
<body>
    <form action="horario.php" method="POST">
        <p>Seus dias de atendimentos</p>
        <input type="checkbox" name="dia[]" value="1"> Domingo
        <input type="checkbox" name="dia[]" value="2"> Segunda-feira
        <input type="checkbox" name="dia[]" value="3"> Terça-feira
        <input type="checkbox" name="dia[]" value="4"> Quarta-feira
        <input type="checkbox" name="dia[]" value="5"> Quinta-feira
        <input type="checkbox" name="dia[]" value="6"> Sexta-feira
        <input type="checkbox" name="dia[]" value="7"> Sábado
        <p>Seus horários de atendimentos</p>
        <p><input type="checkbox" name="hora[]" value="1"> 7:00 - 7:30
        <input type="checkbox" name="hora[]" value="2"> 7:30 - 8:00
        <input type="checkbox" name="hora[]" value="3"> 8:00- 8:30
        <input type="checkbox" name="hora[]" value="4"> 8:30 - 9:00
        <input type="checkbox" name="hora[]" value="5"> 9:00 - 9:30
        <input type="checkbox" name="hora[]" value="6"> 9:30 - 10:00
        <input type="checkbox" name="hora[]" value="7"> 10:00 - 10:30
        <input type="checkbox" name="hora[]" value="8"> 10:30 - 11:00
        <input type="checkbox" name="hora[]" value="9"> 11:00 - 11:30
        <input type="checkbox" name="hora[]" value="10"> 11:30 - 12:00
        <input type="checkbox" name="hora[]" value="11"> 12:00 - 12:30
        <input type="checkbox" name="hora[]" value="12"> 13:00 - 13:30
        <input type="checkbox" name="hora[]" value="13"> 13:30 - 14:00
        <input type="checkbox" name="hora[]" value="14"> 14:00 - 14:30
        <input type="checkbox" name="hora[]" value="15"> 14:30 - 15:00
        <input type="checkbox" name="hora[]" value="16"> 15:00- 15:30
        <input type="checkbox" name="hora[]" value="17"> 15:30 - 16:00
        <input type="checkbox" name="hora[]" value="18"> 16:00 - 16:30
        <input type="checkbox" name="hora[]" value="19"> 16:30 - 17:00
        <input type="checkbox" name="hora[]" value="20"> 17:00 - 17:30
        <input type="checkbox" name="hora[]" value="21"> 17:30 - 18:00
        <input type="checkbox" name="hora[]" value="22"> 18:00- 18:30
        <input type="checkbox" name="hora[]" value="23"> 18:30 - 19:00
        <input type="checkbox" name="hora[]" value="24"> 19:00 - 19:30
        <input type="checkbox" name="hora[]" value="25"> 19:30 - 20:00
        <input type="checkbox" name="hora[]" value="26"> 20:00 - 20:30
        <input type="checkbox" name="hora[]" value="27"> 20:30 - 21:00
        <input type="checkbox" name="hora[]" value="28"> 21:00 - 21:30
        <input type="checkbox" name="hora[]" value="29"> 21:30 - 22:00</p>



        <input type="submit" value="dias">
    </form>
</body>
</html>