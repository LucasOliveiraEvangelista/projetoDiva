<!DOCTYPE html>
<html>
<head>
	<title>Pagamento</title>
	<link rel="stylesheet" type="text/css" href="css/pagamento.css">

    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/marcada.css">
    <link rel="stylesheet" href="css/not.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="index.php" class="nav__logo active">
                    <img class = "logo" src="assets/logo.png" alt="">
                    <span class="nav__logo-name">Divã</span>
                </a>

                <div class="nav__list">
                    <a href="lista_psicologos.php" class="nav__link ">
                    <i class="fas fa-th-large"></i>
                        <span class="nav__name">Feed</span>
                    </a>
                    
                    <a href="dash_user.php" class="nav__link">
                    <i class="far fa-calendar-alt"></i>
                        <span class="nav__name">Consulta</span>
                    </a>
                    <a href="chat/users.php" class="nav__link">
                    <i class="far fa-comment-alt"></i>
                        <span class="nav__name">Chat</span>
                    </a>

                    <a href="sobre.php" class="nav__link">
                    <i class="fas fa-book"></i>
                        <span class="nav__name">Sobre nós</span>
                    </a>

                    <a href="perfil_user.php" class="nav__link">
                    <i class="far fa-user"></i>
                        <span class="nav__name">Perfil</span>
                    </a>
                </div>
            </div>

        </nav>
    </div>
        <script src="js/navbar.js"></script>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form action="">
	<h1>Cartão de crédito</h1>
	<div class="social-container">
		<a href="#" class="social"><i class="fa fa-cc-visa"></i></a>
		<a href="#" class="social"><i class="fa fa-cc-mastercard"></i></a>
		<a href="#" class="social"><i class="fa fa-cc-paypal"></i></a>
	</div>
	<span></span>
        <input type="text" data-mask="0000 0000 0000 0000" placeholder="Número do Cartão">
        <input type="text" name="expiry-data" class="input" data-mask="00 / 00"  placeholder="Data de venc.">
        <input type="text" class="input" data-mask="000" placeholder="CVC">
	<button>Confirmar</button>
</form>
</div>
<div class="form-container sign-in-container">
	<form action="#">
		<h1>Pix</h1>
		<div class="social-container">
		<a href="#" class="social"><i class="fa fa-cc-visa"></i></a>
		<a href="#" class="social"><i class="fa fa-cc-mastercard"></i></a>
		<a href="#" class="social"><i class="fa fa-cc-paypal"></i></a>
	</div>
	<span></span>
	<input type="text" name="pix" placeholder="aer3249">
	<img src="assets/qr.svg" alt="">

	<button>Confirmar</button>
	</form>
</div>
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Prefere usar o PIX</h1>
			<p>Transferência instantanea, o pagamento cai na hora</p>
			<button class="ghost" id="signIn">PIX</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Prefere pagar com o cartão de crédito</h1>
			<p>Transfêrencia pode demorar de 2 a 5 dias utéis para ser efetuada</p>
			<button class="ghost" id="signUp">Cartão de crédito</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


</body>
</html>