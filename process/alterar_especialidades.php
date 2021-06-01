<?php
			require_once '../conexao.php';
			session_start();
			if(isset($_SESSION["unique_id"])){
				$query = "SELECT unique_id
				FROM psicologos WHERE unique_id = ". $_SESSION["unique_id"];
				//echo $query;
				$executar = mysqli_query($conn,$query);
				$usuario = mysqli_fetch_array($executar);	
				//print_r($usuario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Especialidade </title>
    <link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="../css/psico.css">
    <link rel="stylesheet" href="../css/psic.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__img">
            <img src="assets/img/perfil.jpg" alt="">
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
    <nav class="nav">
            <div>
                <a href="../index.php" class="nav__logo active">
                    <img class = "logo" src="assets/logo.png" alt="">
                    <span class="nav__logo-name">Divã</span>
                </a>

                <div class="nav__list">
                    <a href="../dashboard.php" class="nav__link ">
                    <i class="fas fa-calendar-week"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    
                    <a href="../consulta.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="../chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="../sobre.php" class="nav__link">
                    <i class="fas fa-book"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="../perfil_psic.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="../js/navbar.js"></script>

        
        <div class="cards">
            <div class="especialidades">
                <p class="nome">Especialidades</p>
                <form method="POST" action="edit_especialidade.php">
                    <p>Especialidade:
                        <select name="espec" id="">
                        <option value=""></option>
                            <?php
                            
                                $espec = mysqli_query($conn, "SELECT nome FROM especialidade ORDER BY nome ASC");
                                while ($especialidades = mysqli_fetch_array($espec)){
                                echo "<option name='espec' value='$especialidades[nome]'>$especialidades[nome]</option>";
                                    }
                            ?>
                        </select>
                    </p>
                    <input type="submit" value="Adicionar">
                </form>
                
                        <?php
                        $id = $_SESSION['unique_id'];
                        $busca = mysqli_query($conn, "SELECT * FROM esp_psico WHERE id_psic = '$id' ORDER BY nome ASC");
                        while ($acho = mysqli_fetch_array($busca)){
                            echo "<p> $acho[nome]<a href='delete_esp.php?esp=$acho[id]'><button>Deletar</button></a></p>";
                        }
                                 
                        ?>
            
            </div>
            <div class="experiencias">
            <p class="nome">Experiências</p>
            <form method="POST" action="edit_exp.php">
                    <p>Experiência:
                        <select name="exp" id="">
                        <option value=""></option>
                            <?php
                            
                                $exp = mysqli_query($conn, "SELECT nicho FROM nicho_psicologico  ORDER BY nicho ASC");
                                while ($exps = mysqli_fetch_array($exp)){
                                echo "<option name='exp' value='$exps[nicho]'>$exps[nicho]</option>";
                                    }
                            ?>
                        </select>
                    </p>
                    <input type="submit" value="Adicionar">
            </form>
           
            <?php
            $id = $_SESSION['unique_id'];
                $busca = mysqli_query($conn, "SELECT * FROM tipo_nicho WHERE id_psic = '$id' ORDER BY nome ASC");
                while ($acho = mysqli_fetch_array($busca)){
                  echo "<p> $acho[nome]<a href='delete_exp.php?exp=$acho[id_tipo_nicho]'><button>Deletar</button></a></p>";
                        }
            ?>
            
        </div>
        </div>
        
        

        <!-- <a href="edit_especialidade.php"><button class="btn">mudar</button></a> -->

       
<?php
}
?>
    
</body>
</html>