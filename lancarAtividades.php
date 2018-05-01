<?php
	require_once 'php/tcc.php';
	session_start();

	echo "SESSÃO DO ALUNO ID". $_SESSION['idAluno'];

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

		#consultar TCC do aluno para vincular a atividade, e preencher os campos do cabeçalho
		$consultatcc = $tcc->buscar($_SESSION['idAluno']);
	}

	if(isset($_POST['autorizacao']))
	{
		if($_POST['autorizacao']=="autorizacao")
		{

			$lancamento = new AtividadeTcc($consultatcc[0]['id'], $_POST['atividade'], $_POST['cargaHoraria'], $_POST['dataExecucao'], "0");

			$alerta = $lancamento->lancar($_SESSION['idAluno'], $consultatcc[0]['id'], $_POST['atividade'], $_POST['cargaHoraria'], $_POST['dataExecucao'], "0");
		}

	}


?>

<!DOCTYPE HTML>
<html>
<head>
<title>Lançar Atividades</title>
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
				<h2 class="title1" style="text-align: center; font-weight: bold;">Lançar Atividades</h2>
				<div class="widget-shadow">
		
					
						
						<form action="" method="post" class="form-horizontal">	
							
								<br>
								<br>

							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Aluno</label>
									<div class="col-sm-8">
										<input type="hidden" name="autorizacao" value="autorizacao">
										<?php
											echo "<input style='width: 50%' type='text' class='form-control1' id='a1' name='autor' value='".$consultatcc[0]['nome']."' disabled=''>";
										?>	
										</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Título do Projeto</label>
									<div class="col-sm-8">
										<?php
											echo "<input style='width: 50%' type='text' class='form-control1' id='a2' name='titulo-tese' value='".$consultatcc[0]['titulo']."' disabled=''>";
										?>
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Carga horária</label>
									<div class="col-sm-8">
										<input style="width: 23%" type="time" class="form-control1" name="cargaHoraria" id="l3" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Dia de execução</label>
									<div class="col-sm-8">
										<input style="width: 23%" type="date" class="form-control1" name="dataExecucao" id="l4" value="" required="">
									</div>
								</div>

								<div>
									<label for="focusedinput" class="col-sm-2 control-label">Atividade</label>
									<textarea style="width: 50%; height: 60%; margin-left: 0.5%; margin-bottom: 1%" id="text-control" id="l5" name="atividade" placeholder="Insira a sua atividade aqui..." required=""></textarea>

								</div>

								<br>

								<br>

								<div style="text-align: center;" class="form-group">
									<input type="submit" name="lancar" id="l6" value="Lançar">
								</div>
								<br>
							</form>
						</div>		
					</div>
					<br><br>
					<br><br>
					<br>
	</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>


