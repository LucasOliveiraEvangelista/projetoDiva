<?php
	require_once '../conexao.php';
	//print_r($_POST);
	$nome = $_POST['nome'];
	$data_nasc = $_POST['data_nasc'];
	$telefone = $_POST['telefone'];
	$sexo = $_POST['sexo'];
	$cep = $_POST['cep'];
	$local = $_POST['local'];
	$estado = $_POST['estado'];
	$idioma = $_POST['idioma'];
	$valor = $_POST['valor'];
	$ano = $_POST['ano'];
	$tempo = $_POST['tempo'];
	$remarca = $_POST['remarcacao'];
	$texto = $_POST['texto'];
	$resumo = $_POST['resumo'];
	
	session_start();
	$id = $_SESSION['unique_id'];
	$checagem="SELECT telefone FROM psicologos WHERE telefone='$telefone' 
			   AND unique_id <> $_SESSION[unique_id]";
			   //echo $checagem;exit;
	$checar = mysqli_query($conn,$checagem);
	$registros = mysqli_num_rows($checar);
	if($registros>0){
		echo "
				<script>
					alert('Telefone já cadastrado em outra conta!');
					history.back();
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
	}else if($local==""){
		echo "
			<script>
				alert('Digite o local do seu consultório');
				history.back();
			</script>
		";
	}else if(strlen($local)>90){
		echo "
				<script>
					alert('Nome da rua muito grande. Digite uma menor!');
					history.back();
				</script>
			";
	}else if($idioma==""){
		echo "
				<script>
					alert('Digite os idiomas que você fala');
					history.back();
				</script>
			";
	}else if(strlen($ano)>4){
		echo "
				<script>
					alert('Número inválido!');
					history.back();
				</script>
			";
	}else if($ano==""){
		echo "
				<script>
					alert('Digite o ano que você começou a exercer a profissão!');
					history.back();
				</script>
			";
	}else if(strlen($texto)>800){
		echo "
				<script>
					alert('Texto muito grande. Digite um texto menor!');
					history.back();
				</script>
			";
	}else if($remarca==""){
		echo "
				<script>
					alert('Defina o tempo para a remarcação sem custo adicional');
					history.back();
				</script>
			";
	}else if(strlen($resumo)>600){
		echo "
				<script>
					alert('Resumo muito extenso. Digite um menor!');
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
	
	}else if(empty($valor)){
		echo "
				<script>
					alert('Digite o valor da sua consulta');
					history.back();
				</script>
			";
	}else if(empty($tempo)){
		echo "
				<script>
					alert('Digite a duração da sua consulta');
					history.back();
				</script>
			";
	}
	else{	
		if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {
			echo 'Você enviou o arquivo: <strong>' . $_FILES[ 'arquivo' ][ 'name' ] . '</strong><br />';
			echo 'Este arquivo é do tipo: <strong > ' . $_FILES[ 'arquivo' ][ 'type' ] . ' </strong ><br />';
			echo 'Temporáriamente foi salvo em: <strong>' . $_FILES[ 'arquivo' ][ 'tmp_name' ] . '</strong><br />';
			echo 'Seu tamanho é: <strong>' . $_FILES[ 'arquivo' ][ 'size' ] . '</strong> Bytes<br /><br />';
		 
			$arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
			$foto_nome = $_FILES[ 'arquivo' ][ 'name' ];
		 
			// Pega a extensão
			$extensao = pathinfo ( $foto_nome, PATHINFO_EXTENSION );
		 
			// Converte a extensão para minúsculo
			$extensao = strtolower ( $extensao );
		 
			// Somente imagens, .jpg;.jpeg;.gif;.png
			// Aqui eu enfileiro as extensões permitidas e separo por ';'
			// Isso serve apenas para eu poder pesquisar dentro desta String
			if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
				// Cria um nome único para esta imagem
				// Evita que duplique as imagens no servidor.
				// Evita nomes com acentos, espaços e caracteres não alfanuméricos
				$novoNome = uniqid(time() ) . '.' . $extensao;
		 
				// Concatena a pasta com o nome
				$destino = '../imagens/ ' . $novoNome;
		 
				// tenta mover o arquivo para o destino
				if (move_uploaded_file ($arquivo_tmp, $destino ) ) {
					echo 'Arquivo salvo com sucesso em : <strong>' .$destino.'</strong><br />';
					echo ' <img src="' .$destino. '" />';
				}
				else
					echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
			}
			else
				echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
		}
		else{
			echo 'Você não enviou nenhum arquivo!';
		}

		$query = "UPDATE psicologos SET nome='$nome', nascimento='$data_nasc', telefone='$telefone', sexo='$sexo', cep='$cep', tempo_experiencia='$ano', tempo_consulta='$tempo', local ='$local', valor='$valor', estado='$estado', texto='$texto', idioma='$idioma', remarcacao='$remarca', resumo='$resumo', foto='$novoNome'
				   WHERE unique_id = $id";
		$atualizar = mysqli_query($conn, $query);

		if($atualizar == 1){
			echo "
				<script>
				alert('Dado(s) editado com sucesso!');
				location.href='../perfil_psic.php';
				</script>
			";
		}else{
			echo "
				<script>
				alert('Erro ao editar');
				history.back();
				</script>
			";  
		}
	}
?>