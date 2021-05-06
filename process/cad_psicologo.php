<?php
        session_start();
        require_once '../conexao.php';
        $nome = $_POST['nome'];
        $email =$_POST['email'];
        $senha = $_POST['senha'];
        $nasc = $_POST['nasc'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $crp = $_POST['crp'];

        $senhacry = sha1($senha);
        $ran_id = rand(time(), 100000000);
        $status = "Online";
        $_SESSION['unique_id'] = $ran_id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        
        
        if(empty($nome)){
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
        }else if(empty($email)){
            echo "<script>
            alert('Ops! Campo E-mail vazio');
            history.back();
        </script>";
        }else if(empty($senha)){
            echo "<script>
            alert('Ops! Campo senha vazio');
            history.back();
        </script>";
        }else if(strlen($nasc) > 10){
            echo "<script>
            alert('Ops! Data muito grande');
            history.back();
        </script>";
        }else if(empty($nasc)){
            echo "<script>
            alert('Ops! Data de nascimento vazia');
            history.back();
        </script>";
        }else if(empty($cep)){
            echo "<script>
            alert('Ops! CEP vazio');
            history.back();
        </script>";
        }else if(strlen($cep) > 9){
            echo "<script>
            alert('Ops! Cep muito grande');
            history.back();
        </script>";
        }else if(empty($rg)){
            echo "<script>
            alert('Ops! Campo RG vazio');
            history.back();
        </script>";
        }else if(empty($cpf)){
            echo "<script>
            alert('Ops! Campo CPF vazio');
            history.back();
        </script>";
        }else if(empty($crp)){
            echo "<script>
            alert('Ops! CRP vazio');
            history.back();
        </script>";
        }else{
        $inserir =  "INSERT INTO psicologos (nome, email, senha, nascimento, rg, cpf, cep, crp, status, unique_id, situacao)
        VALUES('$nome', '$email', '$senhacry', '$nasc', '$rg', '$cpf', '$cep', '$crp', '$status', '$ran_id', 0)";
        $query = mysqli_query($conn, $inserir);
        if($inserir){
            $select_sql2 = mysqli_query($conn, "SELECT * FROM psicologos WHERE email = '{$email}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['unique_id'] = $result['unique_id'];
                        echo "<script>
                            alert('Cadastrado com sucesso! Seja bem-vindo!! A validação do CRP leva de 3 á 5 dias');
                            location.href='home.php';
                            </script>";
                    }else{
                        echo "Email não existe";
                    }
                }else{
                    echo "Algo deu errado tente novamente";
                }
            }
?>