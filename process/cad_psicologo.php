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

        function validaCpf($cpf){
            $cpf = preg_replace('/[^0-9]/','', $cpf);
            $digitoA = 0;
            $digitoB = 0;

            for($i = 0, $x = 10; $i <= 8; $i++, $x--){
                $digitoA += $cpf[$i] * $x;
            }
            for($i = 0, $x = 11; $i <= 9; $i++, $x--){
            if(str_repeat($i, 11) == $cpf){
                return false;
            }
            $digitoB += $cpf[$i] * $x;
            }

            $somaA = (($digitoA%11) < 2) ? 0 : 11-($digitoA%11);
            $somaB = (($digitoB%11) < 2) ? 0 : 11-($digitoB%11);

            if($somaA != $cpf[9] || $somaB != $cpf[10]){
                return false;
            }
            else{
                return true;
            }
        }
        if(validaCpf($cpf)){
            echo "Cpf válido";
            
        }else{
            echo "<script>
            alert('Ops! Número de CPF inválido');
            history.back();
            </script>";exit;
        }
        
        
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
        }else if(empty($crp)){
            echo "<script>
            alert('Ops! Campo CPF vazio');
            history.back();
        </script>";
        }else if(empty($cpf)){
            echo "<script>
            alert('Ops! CRP vazio');
            history.back();
        </script>";
        }else{
           
        $inserir =  "INSERT INTO psicologos (nome, email, senha, nascimento, rg, cpf, cep, crp, status, unique_id, situacao, foto, desativada)
        VALUES('$nome', '$email', '$senhacry', '$nasc', '$rg', '$cpf', '$cep', '$crp', '$status', '$ran_id', 0, 'user.png', 0)";
        $query = mysqli_query($conn, $inserir);
        if($inserir){
            $select_sql2 = mysqli_query($conn, "SELECT * FROM psicologos WHERE email = '{$email}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['unique_id'] = $result['unique_id'];
                        echo "<script>
                            alert('Cadastrado com sucesso! Seja bem-vindo!! A validação do CRP leva de 3 á 5 dias');
                            alert('Enquanto isso complete suas informações no seu Perfil');
                            location.href='../perfil_psic.php';
                            </script>";

                        
                    }else{
                        echo "Email não existe";
                    }
                }else{
                    echo "Algo deu errado tente novamente";
                }
            }
?>