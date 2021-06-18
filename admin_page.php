<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="css/admin_page.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="las la-clinic-medical"></span> <span>Divã</span></h2>
        </div>
        <!--Secciones-del-tablero-->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-spa"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-stethoscope"></span>
                    <span>Doutores</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-user"></span>
                    <span>Usuarios</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-user-injured"></span>
                    <span>Pacientes</span></a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label> Adiministração
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Buscar aquí" />
            </div> -->
            <div class="user-wrapper">

                <?php
                require_once 'conexao.php';
                
                session_start();
                $id = $_SESSION['unique_id'];
                $user = mysqli_query($conn, "SELECT nome, unique_id, foto FROM cad_usuario WHERE unique_id = '$id'");
                $usuario = mysqli_fetch_array($user);

                


                ?>
                <?php 
                    echo "<img src='imagens/$usuario[foto]' width='60px' height='60px' alt=''>";
                ?>
                <div>
                    <?php 
                        echo "<h4>$usuario[nome]</h4>"
                    ?>
                    <small>Super Admin</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">

            <?php
            
                

                $paci = mysqli_query($conn, "SELECT unique_id FROM cad_usuario");
                $qtd_paci = mysqli_num_rows($paci);

                $psic = mysqli_query($conn, "SELECT unique_id FROM psicologos");
                $qtd_psic = mysqli_num_rows($psic);

                $rea = mysqli_query($conn, "SELECT realizada FROM consulta WHERE realizada = 1");
                $qtd_rea = mysqli_num_rows($rea);

                $libe = mysqli_query($conn, "SELECT unique_id FROM psicologos WHERE situacao = 0");
                $qtd_libe = mysqli_num_rows($libe);
                
            
            ?>

                <div class="card-single">
                    <div>
                        <h1><?php echo $qtd_paci?></h1>
                        <span>Número do pacientes</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php echo $qtd_psic?></h1>
                        <span>Número de Psicólogos</span>
                    </div>
                    <div>
                        <span class="las la-stethoscope"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php echo $qtd_rea?></h1>
                        <span>Número de consultas realizadas</span>
                    </div>
                    <div>
                        <span class="las la-check-circle"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1><?php echo $qtd_libe?></h1>
                        <span>Aguardando liberação</span>
                    </div>
                    <div>
                        <span class="las la-user-clock"></span>
                    </div>
                </div>
            </div>

            <!--Tabla-->
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Psicologos Cadastrados</h3>

                            
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Nome</td>
                                            <td>CRP</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $verif = mysqli_query($conn, "SELECT nome, situacao, crp FROM psicologos ORDER BY situacao ASC");
                                        while($psico = mysqli_fetch_array($verif)){

                                            if($psico['situacao'] == 0){

                                            echo "<tr>
                                            <td>$psico[nome]</td>
                                            <td>$psico[crp]</td>
                                            <td>
                                                <span class='status yellow'></span> Aguardando
                                            </td>
                                            </tr>";
                                            }
                                            if($psico['situacao'] == 1){

                                                echo "<tr>
                                                <td>$psico[nome]</td>
                                                <td>$psico[crp]</td>
                                                <td>
                                                    <span class='status green'></span> Liberado
                                                </td>
                                                </tr>";
                                                }
                                                if($psico['situacao'] == 2){

                                                    echo "<tr>
                                                    <td>$psico[nome]</td>
                                                    <td>$psico[crp]</td>
                                                    <td>
                                                        <span class='status red'></span> Negado
                                                    </td>
                                                    </tr>";
                                                    }
                                        }
                                    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- <div class="customers">

                    <div class="card">
                        <div class="card-header">
                            <h3>Nuevos pacientes</h3>

                            <button>Mostrar todo <span class="las la-arrow-right">
                            </span></button>
                        </div>

                        <div class="card-body">

                            <div class="customer">
                                <div class="info">
                                    <img src="avatars/1.png" width="40px" height="40px" alt="">
                                    <div>
                                        <h4>Ana Maria Acosta</h4>
                                        <small>Diarrea</small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-user-circle"></span>
                                    <span class="lab la-whatsapp"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>

                            <div class="customer">
                                <div class="info">
                                    <img src="avatars/2.png" 40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Karen Orozco</h4>
                                        <small>Gripa</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/3.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Kelly Ortiz</h4>
                                        <small>Intoxicación</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/4.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Julian Quesada</h4>
                                        <small>Malestar general</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/5.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Nelson Stiven</h4>
                                        <small>Bartolinitis</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/6.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Sara Cortez</h4>
                                        <small>Acné</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/7.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Mario Ortiz</h4>
                                        <small>Demencia</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/8.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Leopoldo Sas</h4>
                                        <small>Eccema</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/9.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Stiven Alrboleda</h4>
                                        <small>Encefalitis</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            <div class="customer ">
                                <div class="info ">
                                    <img src="avatars/10.png " width="40px " height="40px " alt=" ">
                                    <div>
                                        <h4>Brandon Carnadona</h4>
                                        <small>Faringitis</small>
                                    </div>
                                </div>
                                <div class="contact ">
                                    <span class="las la-user-circle "></span>
                                    <span class="lab la-whatsapp "></span>
                                    <span class="las la-phone "></span>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div> -->
                
            </div>
        </main>

    </div>

</body>

</html>