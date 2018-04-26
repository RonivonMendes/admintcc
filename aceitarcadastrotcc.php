<?php
 require once'cadastroTcc.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Aceitar Projeto TCC</title>
<meta http-equiv="Page-Enter" content="RevealTrans(Duration=6)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="shortcut icon" href="icon1.ico" type="image/x-icon" />
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome  icons CSS-->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
 
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">


<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
	</head> 
<body>

<div id="page-wrapper" style="padding-top: 5%;">
			
			<?php

			include 'menu.php';

			?>

			<div class="main-page login-page" style="width: 90%"> 
				<h2 class="title1" style="text-align: center; font-weight: bold;">Aceitar Projeto TCC</h2>
				<div class="widget-shadow">
		
					
						
						<form action="aceitartcc.php" method="post" class="form-horizontal">	
							
								<br>
								<br>

							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Aluno</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="nome" id="a1" value="" required="" maxlength="14" disabled="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Título do Projeto</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="projeto" id="a2" value="" required="" maxlength="14" disabled="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Grupo de Pesquisa</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="gPesquisa" id="a3" value="" required="" disabled="">
									</div>
								</div>

								<div class="form-group">
									<h2 style="text-align: center;">Resumo</h2>
								</div>

								<div>
									<textarea style="width: 98%" id="text-control" id="a4" name="resumo" rows="13" cols="143" placeholder="Insira o seu resumo aqui..." required="" ></textarea>

								</div>

								<br>

								<div class="check-aceitar">
									<input type="radio"  name="aceitar" id="a5">Aceitar
									<input type="radio"  name="aceitar" id="a6">Recusar
								</div>

								<br>

								<div style="text-align: center;" class="form-group">
									<input type="submit" name="enviar" id="a7" value="Enviar">
								</div>
								<br>
							</form>
						</div>		
					</div>
				<br>
			<br>
		<br>
	<br>
	<br>
	</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>


