<?php
	/*require_once 'php/tcc.php';
	require_once 'php/integrante.php';

	session_start();

	if (($_SESSION['logado']==0))
	{
		header('location: login.php');
	}

	if (isset($_GET['id']))
	{
		$tcc = new CadastroTcc("","","","","");
		$consultatcc = $tcc->buscar($_GET['id']);

		if($consultatcc=="0")
			header('location: index.php');

		$integrante = new Integrante("", "", "", "", "", "", "");
		$consultaOrientador=$integrante->buscar($consultatcc[0]['integrantes_id']);

		#se tiver coorientador, consultar
		if($consultatcc[0]['coorientador_id']!="")
		{
			$consultaCoorientador=$integrante->buscar($consultatcc[0]['coorientador_id']);
		}
	}

	if (isset($_POST['aprovacao']))
	{
		if ($_POST['aprovacao']=="aprovacao")
		{
			echo "2ºIF";
			$tcc = new CadastroTcc("","","","","");
			$alerta = $tcc->aprovar($consultatcc[0]['id'], $_POST['aprovar']);
		}
	}
*/
?>


<!DOCTYPE HTML>
<html>
<head>
<title>Aprovação Projeto</title>
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
				
				<h2 class="title1" style="text-align: center; font-weight: bold;">Aprovação do Projeto</h2>
				<div class="widget-shadow">
						
						<form action="?id='".$consultatcc[0]['id']."' method="post" class="form-horizontal">
							<input type="hidden" name="aprovacao" value="aprovacao">	
							
								<br>
								<br>

							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome do Autor</label>
									<div class="col-sm-8">
										<?php
											echo "<input style='width: 50%' type='text' class='form-control1' id='a1' name='autor' value='".$consultatcc[0]['nome']."' disabled=''>";
										?>	
										</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Título da Tese</label>
									<div class="col-sm-8">
										<?php
											echo "<input style='width: 50%' type='text' class='form-control1' id='a2' name='titulo-tese' value='".$consultatcc[0]['titulo']."' disabled=''>";
										?>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome do Orientador</label>
									<div class="col-sm-8">

										<?php
											echo "<input style='width: 50%' type='text' class='form-control1' id='a3' name='orientador' value='".$consultaOrientador[0]['nome']."' disabled=''>";
										?>

									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instituição</label>
									<div class="col-sm-8">

										<?php
											echo "<input style='width: 75%' type='text' class='form-control1' id='a5' name='instituicao' value='".$consultaOrientador[0]['instituicao']."' disabled=''>";
										?>
										
										
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coorientador</label>						
									
									<div class="col-sm-8">
										<input style="width: 50%" type="text" name="nCoorientador" class="form-control1" value="" id="a4" >										
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instituição Coorientador</label>						
									
									<div class="col-sm-8">
										<input type="text" name="nCoorientador" class="form-control1" value="" id="a4" >										
									</div>
								</div>

								<div class="form-group">
									<h2 style="text-align: center;">Resumo</h2>
								</div>
								<div>
									<?php
										echo "<textarea style='width: 98%' id='text-control' id='a6' name='resumo' rows='13' cols='143' required='' disabled=''>".$consultatcc[0]['titulo']."</textarea>";
									?>
								
								</div>

									<br>
									<div class='check-aceitar'>

									<?php
										if($consultatcc[0]['aprovacaoOrientador']==0)
										{
											echo "<input type='radio'  name='aprovar' value='1' id='a5'>Aprovar
													<input type='radio'  name='aprovar' value='0' id='a6'>Reprovar

													</div>
													<br>
								<div style='text-align: center;' class='form-group'>
									<input type='submit' name='enviar' id='a7' value='Enviar'>
								</div>";
								
										}
										else
											echo "Esse projeto, já está aprovado pelo Orientador
										</div>";
									?>
									

								<br>
							</form>
						</div>	

					</div>
				<br>
			<br>
		<br><br><br><br><br><br><br>
		
	</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>