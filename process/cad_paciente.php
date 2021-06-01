<?php
        session_start();
        require_once '../conexao.php';
        $nome = $_POST['nome'];
        $email =$_POST['email'];
        $senha = $_POST['senha'];
        $nasc = $_POST['nascimento'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $tel = $_POST['telefone'];

        if($nome == ""){
            echo "<script>
            alert('Ops! Campo nome vazio');
            history.back();
        </script>";
        }else if(strlen($nome) > 80){
            echo "<script>
            alert('Ops! Nome muito grande');
            history.back();
        </script>";
        }else if(strlen($email) > 60){
            echo "<script>
            alert('Ops! E-mail muito grande');
            history.back();
        </script>";
        }else if($email == ""){
            echo "<script>
            alert('Ops! Campo E-mail vazio');
            history.back();
        </script>";
        }else if($senha == ""){
            echo "<script>
            alert('Ops! Campo senha vazio');
            history.back();
        </script>";
        }else if(strlen($nasc) > 10){
            echo "<script>
            alert('Ops! Data muito grande');
            history.back();
        </script>";
        }else if($nasc == ""){
            echo "<script>
            alert('Ops! Data de nascimento vazia');
            history.back();
        </script>";
        }else if($cep == ""){
            echo "<script>
            alert('Ops! CEP vazio');
            history.back();
        </script>";
        }else if(strlen($cep) > 9){
            echo "<script>
            alert('Ops! Cep muito grande');
            history.back();
        </script>";
        }else if($rg == ""){
            echo "<script>
            alert('Ops! Campo RG vazio');
            history.back();
        </script>";
        }else if($cpf == ""){
            echo "<script>
            alert('Ops! Campo CPF vazio');
            history.back();
        </script>";
        }else if($tel == ""){
            echo "<script>
            alert('Ops! Telefpne vazio');
            history.back();
        </script>";
        }else{
                $ran_id = rand(time(), 100000000);
                $status = "Online";
                $senhacry = sha1($senha);
                $_SESSION['unique_id'] = $ran_id;
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $nome;
                
                $query= "INSERT INTO cad_usuario (nome, email, senha, nascimento, rg, cpf, cep, status, unique_id, foto, telefone) 
                VALUES ('$nome', '$email', '$senhacry', '$nasc', '$rg', '$cpf', '$cep', '$status', '$ran_id', 'user.png', '$tels')";
                $inserir = mysqli_query($conn, $query);
                if($inserir){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM cad_usuario WHERE email = '{$email}'");
                                if(mysqli_num_rows($select_sql2) > 0){
                                    $result = mysqli_fetch_assoc($select_sql2);
                                    $_SESSION['unique_id'] = $result['unique_id'];
                                    echo "<script>
                                        alert('Cadastrado com sucesso! Seja bem-vindo');
                                        location.href='../lista_psicologos.php';
                                        </script>";
                                }else{
                                    echo "Email não existe";
                                }
                            }else{
                                echo "Algo deu errado tente novamente";
                            }
            }
?>