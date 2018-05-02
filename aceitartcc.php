<?php
	require_once 'php/tcc.php';
	session_start();

	if (($_SESSION['logado']==0))
	{
		header('location: login.php');
	}


	#se for aluno que está logado, consultar se o termo está aceito ou não
	if ($_SESSION['tipoPerfil']!=5)
	{
		header('location: index.php');
	}

	else
	{
		$tcc = new CadastroTcc("","","","","");

		$consulta = $tcc->buscar($_SESSION['idAluno']);
	}

	if(isset($_POST['cadastrar']))
	{
		if($_POST['cadastrar']=="aceite")
		{
			$alerta =  $tcc->aceitar($consulta[0]['id'], $_POST['aceitar'], $_POST['resumo']);

			$_POST['cadastrar']="";

			#header('location: aceitarcadastrotcc.php');
		}
	}

	
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Meu Projeto TCC</title>
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

<?php include 'menu.php'; ?>
<div id="page-wrapper" style="padding-top: 5%;">
			

			<div class="main-page login-page" style="width: 90%"> 
				<h2 class="title1" style="text-align: center; font-weight: bold;">Meu Projeto TCC</h2>
				<div class="widget-shadow">
		
					
						<?php
							#Se não tem projeto para aceitar, não carrega nada 
							if($consulta==0)
							{
								echo "Você não possui projeto cadastrado, fale com seu Orientador!";
							}

							else
							{
								echo "<form action='aceitartcc.php' method='post' class='form-horizontal'>
								<input type='hidden' name='cadastrar' value='aceite'>	
								<br>
								<br>

								<div class='form-group'>
								<label for='focusedinput' class='col-sm-2 control-label'>Aluno</label>
								<div class='col-sm-8'>";
								
								echo "<input style='width: 50%' type='text' class='form-control1' name='nome' id='a1' value='".$_SESSION['nomeUser']."' required='' maxlength='14' disabled=''>";
								
								echo "</div>
								</div>
								<div class='form-group'>
								<label for='focusedinput' class='col-sm-2 control-label'>Título do Projeto</label>
								<div class='col-sm-8'>";	
									
										
								echo "<input style='width: 50%' type='text' class='form-control1' name='projeto' id='a2' value='".$consulta[0]['titulo']."' required='' maxlength='14' disabled=''>";

								echo "</div>
								</div>
								<div class='form-group'>
								<label for='focusedinput' class='col-sm-2 control-label'>Grupo de Pesquisa</label>
								<div class='col-sm-8'>";
										
								echo "<input style='width: 50%' type='text' class='form-control1' name='gPesquisa' id='a3' value='".$consulta[0]['grupoPesquisa']."' required='' disabled=''>";

								echo "</div>
								</div>
								<div class='form-group'>
								<h2 style='text-align: center;''>Resumo</h2>
								</div>";
								
								
								if($consulta[0]['aceite']!=1)
								{

									echo "<div>";
									echo "<textarea style='width: 98%' id='text-control' id='a4' name='resumo' rows='13' cols='143' placeholder='Insira o seu resumo aqui...' value='' required='' >".$consulta[0]['resumo']."</textarea>";
									echo "</div>

									<br>

									<div class='check-aceitar'>";

									echo "<p>Inserir os termos do aceite que o aluno tem que estar ciente ao iniciar o TCC!</p>";

									echo "<input type='radio'  name='aceitar' value='1' id='a5'><strong>Li e concordo</strong> com os termos!";
									echo "</div>";

									echo "<br>
									<div style='text-align: center;' class='form-group'>
									<input type='submit' name='enviar' id='a7' value='Enviar'>";

									if($consulta[0]['aceite']==2)
									{
										echo "<p style='color: red'><strong>O Resumo foi reprovado pelo Orientador, Faça as correções e envie novamente!</strong></p>";
									}

									echo "</div>";
								}

								else
								{
									echo "<div>";
									echo "<textarea style='width: 98%' id='text-control' id='a4' name='resumo' rows='13' cols='143' disabled='' >".$consulta[0]['resumo']."</textarea>";
									echo "</div>

									<br>";
								}

							}
						?>
						

							
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


