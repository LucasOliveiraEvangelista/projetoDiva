<?php

    require_once '../conexao.php';
    session_start();
	$id = $_SESSION['unique_id'];

    if(isset($_FILES['pic']))
 {
    $ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
    $new_name = uniqid(time()). $ext; //Definindo um novo nome para o arquivo
    $dir = '../imagens/'; //Diretório para uploads 
    move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagen enviada com sucesso!");
 } 

    $query = "UPDATE psicologos SET foto = '$new_name'
        WHERE unique_id = $id";
    $atualizar = mysqli_query($conn, $query);

		if($atualizar == 1){
			echo "
				<script>
				alert('Foto editado com sucesso!');
				location.href='../perfil_psic.php';
				</script>
			";
		}else{
			echo "
				<script>
				alert('Erro ao mudar foto');
				location.href='alterar_psic.php';
				</script>
			";  
	}

?>