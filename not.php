
<?php
    $notificado = $_SESSION['unique_id'];
    $notify = mysqli_query($conn, "SELECT * FROM notificacao WHERE id_para = '$notificado'");
    $not = mysqli_num_rows($notify);
     if($not){
         if($not == 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Nova notificação</span>
            <span class='close-btn'>
                <span class='fas fa-times'></span>
            </span>
            </div>";
         }
         else if($not > 1){
            echo "<div class='alert show'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Novas notificações</span>
            <span class='close-btn'>
                <span class='fas fa-times'></span>
            </span>
            </div>";
         }
         else{
            echo "<div class='alert hide'>
            <span class='fas fa-exclamation-circle'></span>
            <span class='msg'>$not Nova notificação</span>
            <span class='close-btn'>
                <span class='fas fa-times'></span>
            </span>
            </div>";
         }

    }

?>
