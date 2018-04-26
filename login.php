<?php
	require_once 'php/acesso.php';

	session_start();

	if(isset($_POST['logon']))
	{
		if($_POST['logon']=='true')
		{
			$acesso = new Acesso('','','','');
			$acesso->logar($_POST['email'], $_POST['senha']);
		}
	}
	if (isset($_SESSION))
	{
		echo $_SESSION['nomeUser'];
	}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="shortcut icon" href="icon1.ico" type="image/x-icon" />

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<link href="css/styleLogin.css" rel='stylesheet' type='text/css' />

<link href="css/font-awesome.css" rel="stylesheet">

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">

</head> 
<body>
		<!--Começo do codigo principal-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<h2 style="font-weight: bold;" class="title1">SATI - Sistema de acompanhamento de TCC IFTM</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form action="login.php" method="post">
							<input type="hidden" name="logon" value="true">
							<input type="email" class="user" name="email" placeholder="Entre com seu e-mail" required="">
							<input type="password" name="senha" class="lock" placeholder="Senha" required="">
							<div class="forgot-grid">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Lembrar me</label>
								<div class="forgot">
									<a href="#">Esqueceu sua senha?</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<input type="submit" name="logar" value="Logar">
							<div class="registration">
								Não tem uma conta ?
								<a class="" href="signup.html">
									Criar conta
								</a>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div>
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		</div>
	</div>
</body>
</html>