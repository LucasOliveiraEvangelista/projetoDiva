<?php
	require_once 'conexao.php';
	//print_r($_POST);
	$nome = $_POST['nome'];
	$data_nasc = $_POST['data_nasc'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$num = $_POST['num'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	
	session_start();
	$checagem="SELECT telefone FROM psicologos WHERE telefone='$telefone' 
			   AND unique_id <> $_SESSION[unique_id]";
			   //echo $checagem;exit;
	$checar = mysqli_query($conn,$checagem);
	$registros = mysqli_num_rows($checar);
	if($registros>0){
		echo "
				<script>
					alert('Telefone já cadastrado em outra conta!');
					location.href='alterar_usuario.php';
				</script>";
	}else if($nome==""){
		echo "
				<script>
					alert('Digite seu nome!');
					history.back();
				</script>
			";
	}else if(strlen($nome)>50){
		echo "
				<script>
					alert('Nome muito grande!');
					history.back();
				</script>
			";
	}else if($telefone==""){
		echo "
				<script>
					alert('Digite seu telefone!');
					history.back();
				</script>
			";
	}else if(strlen($telefone)>19){
		echo "
				<script>
					alert('Número de telefone inválido!');
					history.back();
				</script>
			";
	}else if($cep==""){
		echo "
				<script>
					alert('Digite seu CEP!');
					history.back();
				</script>
			";
	}else if(strlen($cep)>9){
		echo "
				<script>
					alert('CEP inválido!');
					history.back();
				</script>
			";
	}else if($rua==""){
		echo "
			<script>
				alert('Digite o nome da sua rua!');
				history.back();
			</script>
		";
	}else if(strlen($rua)>30){
		echo "
				<script>
					alert('Nome da rua muito grande. Digite uma menor!');
					history.back();
				</script>
			";
	}else if($num==""){
		echo "
				<script>
					alert('Digite o número da sua residência!');
					history.back();
				</script>
			";
	}else if(strlen($num)>5){
		echo "
				<script>
					alert('Número inválido!');
					history.back();
				</script>
			";
	}else if($bairro==""){
		echo "
				<script>
					alert('Digite seu bairro!');
					history.back();
				</script>
			";
	}else if(strlen($bairro)>30){
		echo "
				<script>
					alert('Nome do bairro muito grande. Digite um nome menor!');
					history.back();
				</script>
			";
	}else if($cidade==""){
		echo "
				<script>
					alert('Digite sua Cidade!');
					history.back();
				</script>
			";
	}else if(strlen($cidade)>30){
		echo "
				<script>
					alert('Nome da Cidade muito extenso. Digite uma menor!');
					history.back();
				</script>
			";
	}else if($estado==""){
		echo "
				<script>
					alert('Digite o nome do seu Estado!');
					history.back();
				</script>
			";
	
	}else{	
		$query = "UPDATE psicologos SET nome='$nome', nascimento='$data_nasc', telefone='$telefone', sexo='$sexo', cep='$cep', rua='$rua', num='$num', bairro='$bairro', cidade='$cidade', estado='$estado' 
				   WHERE unique_id = $_SESSION[unique_id]";
		$atualizar = mysqli_query($conn, $query);

		if($atualizar == 1){
			echo "
				<script>
				alert('Dado(s) editado com sucesso!');
				location.href='alterar_psic.php';
				</script>
			";
		}else{
			echo "
				<script>
				alert('Erro ao editar');
				location.href='alterar_psic.php';
				</script>
			";  
		}
	}
?>