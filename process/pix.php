<?php
    require_once '../conexao.php';
    session_start();
	 $id = $_SESSION['unique_id'];
    $chave = $_POST['chave'];

    if(isset($_FILES['arquivo']))
 {
    $ext = strtolower(substr($_FILES['arquivo']['name'],-4)); //Pegando extensão do arquivo
    $new_name = uniqid(time()). $ext; //Definindo um novo nome para o arquivo
    $dir = 'qrs/'; //Diretório para uploads 
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    echo("Imagen enviada com sucesso!");
 } 

    $query = "UPDATE psicologos SET qrcode = '$new_name', chave = '$chave' WHERE unique_id = '$id'";
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