<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/navbar.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>


<?php
    $frases = array('Se podemos sonhar, também podemos tornar nossos sonhos realidade.',
    'A única maneira de fazer um bom trabalho é amando o que você faz. Se você ainda não encontrou, continue procurando. Não se desespere. Assim como no amor, você saberá quando tiver encontrado.',
    'A vontade de se preparar tem que ser maior do que a vontade de vencer. Vencer será consequência da boa preparação.',
    'Devemos não somente nos defender, mas também nos afirmar, e nos afirmar não somente enquanto identidades, mas enquanto força criativa.',
    'Há sempre a escolha entre voltar atrás para a segurança ou seguir em frente para o crescimento. O crescimento deve ser escolhido uma, duas, três e infinitas vezes; o medo deve ser superado uma, duas, três e infinitas vezes.',
    'Quando você tiver feito algo bem, não tenha medo de admitir que você conseguiu.',
    'Não deixe que o ruído da opinião alheia impeça que você escute a sua voz interior.',
    'Sempre parece impossível até que seja feito.',
    'Sábio é o ser humano que tem coragem de ir diante do espelho da sua alma para reconhecer seus erros e fracassos e utilizá-los para plantar as mais belas sementes no terreno de sua inteligência.',
    'O tamanho dos seus sonhos deve sempre exceder a sua capacidade de alcançá-los. Se os seus sonhos não te assustam, eles não são grandes o suficiente.',
    'crie objetivos em sua vida e você sentirá prazer sempre que conseguir realizá-los.',
    'Uma das lições com as quais eu cresci foi a de sempre permanecer verdadeiro consigo mesmo e nunca deixar que as palavras de alguém distraia você dos seus objetivos.',
    'Se você ultrapassar aquela sensação de medo, aquele sentimento de estar correndo um risco, coisas verdadeiramente maravilhosas podem acontecer.',
    'Se você olha para o que você tem na vida, você sempre terá mais. Se você olha para o que você não tem na vida, você nunca terá o suficiente.',
);
?>
<?php
    require_once 'navbar.php';
?>
        <div class="landing">
            <div class="landingText" data-aos="fade-up" data-aos-duration="1000">
                <h1>Mensagen do dia: </h1>
                <h3>" <?php echo $frases[rand(0, 13)];?>"</h3>
            </div>
            <div class="landingImage" data-aos="fade-down" data-aos-duration="2000">
                <img src="img/bg.png" alt="">
            </div>
        </div>
        <div class="about">
            <div class="aboutText" data-aos="fade-up" data-aos-duration="1000">
                <h1>O por que é importante procurar<br> <span style="color:#db65be;font-size:3vw">Ajuda psicologica?</span> </h1>
                <img src="img/doctor-woman-400px.png" alt="">
            </div>
            <div class="aboutList" data-aos="fade-left" data-aos-duration="1000">
                <ol>
                    <li> 
                        <span>01</span>
                         <p> orientações e esclarecimentos, dificuldades existenciais ou mesmo pela busca de autoconhecimento.</p>
                    </li>
                    <li> 
                        <span>02</span>
                         <p>Sentimentos constantes de tristeza, ansiedade, estresse, raiva, desânimo.</p>
                    </li>
                    <li> 
                        <span>03</span>
                         <p> Quando passamos por uma situação complicada, parece que não conseguimos enxergar sozinhos uma solução.</p>
                    </li>
                    <li> 
                        <span>04</span>
                         <p>Dificuldades de relacionamento, relacionar-se não é uma tarefa fácil, seja o relacionamento amoroso, com a família, com amigos ou com colegas de trabalho.</p>
                    </li>

                </ol>
            </div>
        </div>

        <div class="infoSection">
            <div class="infoHeader" data-aos="fade-up" data-aos-duration="1000">
                <h1>O que você pode fazer na<br> <span style="color:#c91be0">Plataforma do Divã</span> </h1>
            </div>
            <div class="infoCards">
                <div class="card one" data-aos="fade-up" data-aos-duration="1000">
                    <img src="img/cale.png" style="width: 288px;" class="cardoneImg" alt="" data-aos="fade-up" data-aos-duration="1100">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Marcar consultas</h2>
                        <p>Na plataforma é possivel agendar consultas com psicólogos</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card two" data-aos="fade-up" data-aos-duration="1300">
                    <img src="img/procura.svg"  style="width: 255px;" class="cardtwoImg" alt="" data-aos="fade-up" data-aos-duration="1200">
                    <div class="cardbgtwo"></div>
                    <div class="cardContent">
                        <h2>Busque por psicólogos</h2>
                        <p>Encontre psicólogos pelo nicho de atuação ou se estão perto de você</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card three" data-aos="fade-up" data-aos-duration="1600">
                    <img src="img/videocall.png" class="cardthreeImg" alt="" data-aos="fade-up" data-aos-duration="1300">
                    <div class="cardbgone"></div>
                    <div class="cardContent">
                        <h2>Chat</h2>
                        <p>Onde você pode tirar duvidas com doutores especialistas!</p>
                        <a href="#">
                            <div class="cardBtn">
                                <img src="img/next.png" alt="" class="cardIcon">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <h2>Diva</h2>
            <div class="footerlinks">
                <a href="#" class="mainlink">Entrar para o divã</a>
                <a href="#">chat</a>
                <a href="#">feed</a>
                <a href="#">Contato</a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
            AOS.init();
    </script>
    <script src="js/navbar.js"></script>
</body>
</html>