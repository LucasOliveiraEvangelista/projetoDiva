<?php

    require_once '../conexao.php';
    $email = $_POST['emailL'];
    $senha = $_POST['senhaL'];
    $op = $_POST['op'];

    $senhacry = sha1($senha);

    session_start();

    

    if($op == "paci"){
        if(!empty($email) && !empty($senha)){
            $sql = mysqli_query($conn, "SELECT nome, email, senha, unique_id from cad_usuario WHERE email = '$email' AND senha = '$senhacry'");
            if( mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                if($senhacry == $row['senha']){
                    $status = "Online";
                    $desa = mysqli_query($conn, "SELECT * FROM cad_usuario WHERE email = '$email'");
                    $ta = mysqli_fetch_array($desa);
                    if($ta['desativada'] == 1){
                        $ativa = mysqli_query($conn, "UPDATE cad_usuario SET desativada = 0 WHERE unique_id = {$row['unique_id']}");
                        if($ativa){
                            echo "<script>
                            alert('Sua conta estava desativada, e esta sendo reativada novamente');
                            </script>";
                            }
                    }
                    $sql2 = mysqli_query($conn, "UPDATE cad_usuario SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2){
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "<script>
                        alert('Bem-Vindo! novamente {$row['nome']}');
                        location.href='../lista_psicologos.php';
                        </script>";
                    }else{
                        echo "Algo deu erro, tente novamente!";
                        
                    }
                }else{
                    echo "Email ou senha Incorreto!";
                }
            }else{
               
            }
            
        }else{
            echo "todos os campos são necessarios!";
        }
    }else if($op == "psic"){
        if (!empty($email) && !empty($senha)){
            $sql3 = mysqli_query($conn, "SELECT * FROM psicologos WHERE email = '$email' AND senha = '$senhacry'");
        if( mysqli_num_rows($sql3) > 0){
            $row2 = mysqli_fetch_assoc($sql3);
            if($senhacry == $row2['senha']){
                $status = "Online";
                $desa = mysqli_query($conn, "SELECT * FROM psicologos WHERE email = '$email'");
                $ta = mysqli_fetch_array($desa);
                if($ta['desativada'] == 1){
                    $ativa = mysqli_query($conn, "UPDATE psicologos SET desativada = 0 WHERE unique_id = {$row['unique_id']}");
                    if($ativa){
                    echo "<script>
                    alert('Sua conta estava desativada, e esta sendo reativada novamente');
                    </script>";
                    }
                }
                $sql4 = mysqli_query($conn, "UPDATE psicologos SET status = '{$status}', desativada = 0 WHERE unique_id = {$row['unique_id']}");
                if($sql3){
                    $_SESSION['unique_id'] = $row2['unique_id'];
                    echo "<script>
                    alert('Bem-Vindo! novamente {$row2['nome']}');
                    location.href='../perfil_psic.php';
                    </script>";
                }else{
                    echo "Algo deu erro, tente novamnete!";
                    
                }
            }else{
                echo "Email ou senha Incorreto!";
            }
        }
        }else{
            echo 'Todos os campos são necessarios';
        }
    }
    
?>