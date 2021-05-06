<?php
//  require_once 'restrito.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Perfil</title>
		<link rel="stylesheet" href="css/navbar.css">
		<link rel="stylesheet" href="css/perfi.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

		<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
		
	</head>
	
		<?php
			require_once 'conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT nome, nascimento, telefone, sexo, email, cpf, cep, rua, bairro, cidade, estado, foto
				FROM cad_usuario WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
				
			?>
       <?php
       require_once 'navbar.php';
       ?>

        <div class="wrapper">
            <div class="left">
                <?php echo "<img src='imagens/$usuario[foto]' alt='user' width='20vw'>";?>
                <h4><?php echo $usuario['nome']?></h4>
                <p>Paciente</p>
            </div>
            <div class="right">
                <div class="info">
                    <h3>INFORMAÇÕES</h3>
                    <div class="info_data">
                        <div class="data">
                            <h4>Email</h4>
                            <p><?php echo $usuario['email']?></p>
                        </div>
                        <div class="data">
                        <h4>Data de nascimento</h4>
                            <p><?php echo $usuario['nascimento']?></p>
                    </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>Telefone</h4>
                            <p><?php 
                                
                            
                            echo $usuario['telefone']?></p>
                        </div>
                        <div class="data">
                        <h4>Sexo</h4>
                            <p><?php 
								if($usuario['sexo']=='f'){
									echo "Feminino";
								}else if($usuario['sexo']=='m'){
									echo "Masculino";
								}else if($usuario['sexo']=='o'){
									echo "Outro";
								}else if($usuario['sexo']=='n'){
									echo "Não sei responder";
								}else{
									echo "Pefiro não responder";
								}
								?></p>
                    </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>CPF</h4>
                            <p><?php echo $usuario['cpf']?></p>
                        </div>
                        <div class="data">
                        <h4>CEP</h4>
                            <p><?php echo $usuario['cep']?></p>
                    </div>
                    </div>
                    <!-- <div class="info_data">
                        <div class="data">
                            <h4>Rua</h4>
                            <p><?php echo $usuario['rua']?></p>
                        </div>
                        <div class="data">
                        <h4>Bairro</h4>
                            <p><?php echo $usuario['bairro']?></p>
                    </div>
                    </div>
                    <div class="info_data">
                        <div class="data">
                            <h4>Cidade</h4>
                            <p><?php echo $usuario['cidade']?></p>
                        </div>
                        <div class="data">
                        <h4>Estado</h4>
                            <p><?php echo $usuario['estado']?></p>
                    </div>
                    </div> -->
                </div>
            
                <div class="social-media">
                    <ul>
                        <li><a href="process/alterar_usuario.php"><button>Editar informações</button></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="js/navbar.js"></script>
	<?php
		}else{
			echo "Acesso negado";
		} 
	?>
</body>
</html>