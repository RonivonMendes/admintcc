<?php
	require_once 'php/tcc.php';
	require_once 'php/integrante.php';

	session_start();

	if ($_SESSION['logado']==0 || $_SESSION['tipoPerfil']!=1 && $_SESSION['tipoPerfil']!=2)
	{
		header('location: login.php');
	}

	if (isset($_GET['id']))
	{
		$tcc = new CadastroTcc("","","","","");
		$consultatcc = $tcc->buscar($_GET['id']);

		$integrante = new Integrante("", "", "", "", "", "", "");
		$consultaOrientador=$integrante->buscar($consultatcc[0]['integrantes_id']);

		#se tiver coorientador, consultar
		if($consultatcc[0]['coorientador_id']!="")
		{
			$consultaCoorientador=$integrante->buscar($consultatcc[0]['coorientador_id']);
		}
	}

	else
		header('location: index.php');

	if (isset($_POST['autorizacao']))
	{
		if ($_POST['autorizacao']=="autorizacao")
		{
			$tcc = new CadastroTcc("","","","","");
			#se estiver autorizado, autoriza no sistema e libera as atividades para que o aluno inicie!
			if($_POST['resposta']==1)
				$alerta = $tcc->autorizar($consultatcc[0]['id'], $_POST['resposta']);
			
			#se não reabre para Orientador
			else
			{
				$tcc->aprovar($consultatcc[0]['id'], $_POST['resposta']);
				$alerta = "Resumo e aceite reaberto para que o aluno faça correções!";
			}

		}
		
	}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Autorizar TCC</title>
<meta charset="utf-8">
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
				
				<h2 class="title1" style="text-align: center; font-weight: bold;">Autorizar TCC</h2>
				<div class="widget-shadow">
		
					
						
						<form action="" method="post" class="form-horizontal">	
							
								<br>
								<br>

							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome do Autor</label>
									<div class="col-sm-8">
										<input type="hidden" name="autorizacao" value="autorizacao">
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
											echo "<input style='width: 75%' type='text' class='form-control1' id='a4' name='instituicao' value='".$consultaOrientador[0]['instituicao']."' disabled=''>";
										?>
										
										
									</div>
								</div>

								<?php
									if(isset($consultaCoorientador))
									{
										echo "<div class='form-group'> <label for='focusedinput' class='col-sm-2 control-label'>Coorientador</label>
										<div class='col-sm-8'>";

										echo "<input style='width: 50%' type='text' name='nCoorientador' class='form-control1' value='".$consultaCoorientador[0]['nome']."' id='a5'>";

										echo "</div>
											</div>";


										echo "<div class='form-group'> <label for='focusedinput' class='col-sm-2 control-label'>Instituição Coorientador</label>
										<div class='col-sm-8'>";

										echo "<input type='text' name='nCoorientador' class='form-control1' value='".$consultaCoorientador[0]['instituicao']."' id='a6'>";

										echo "</div>
											</div>";

									}
								?>		

								<div class="form-group">
									<h2 style="text-align: center;">Resumo</h2>
								</div>
								<div>
									<?php
										echo "<textarea style='width: 98%' id='text-control' id='a7' name='resumo' rows='13' cols='143' required='' disabled=''>".$consultatcc[0]['titulo']."</textarea>";
									?>
								
								</div>



								<br>
									<div class='check-aceitar'>

										<div>
											<textarea style="width: 50%" id="text-control" id="r5" name="resumo" rows="13" cols="143" disabled="">					Termo de Responsabilidade de Autoria
	Eu, ___________________________________________, matrícula______________,
estudante do curso ____________________________________________, estou ciente de
que é considerada utilização indevida, ilegal e/ou plágio, os seguintes casos:
• Texto de autoria de terceiros;
• Texto adaptado em parte ou totalmente;
• Texto produzido por terceiros, sob encomenda, mediante pagamento (ou não) de
honorários profissionais.
Logo, declaro ser de minha inteira responsabilidade a autoria do texto referente ao Trabalho
de Conclusão de Curso sob o título ____________________________________________.

			  ________________________, ____ de _______________ de 20___. </textarea>
										
										</div>
								</div>

									<?php
										if($consultatcc[0]['aceite']==1&&$consultatcc[0]['aprovacaoOrientador']==1&&$consultatcc[0]['aprovacaoSuper']==0)
										{
											echo "<input type='radio'  name='resposta' value='1' id='a8'>Autorizar
													<input type='radio'  name='resposta' value='2' id='a9'>Negar

													</div>
													<br>
											<div style='text-align: center;' class='form-group'>
												<input type='submit' name='enviar' id='a10' value='Enviar'>
											</div>";
									
										}
										else if($consultatcc[0]['aceite']==0||$consultatcc[0]['aprovacaoOrientador']==0)
										{
											echo "<p style='color: red'><strong>Aguardando Aluno e Orientador enviar para autorizacao</strong></p>
											</div>";

										}
										else if($consultatcc[0]['aprovacaoOrientador']==2)
										{
											echo "<p style='color: red'><strong>Projeto foi Negado, aguardando o aluno e Orientador refazer as devidas correções em seu resumo e reenviar para autorização!</strong></p>
											</div>";
										}
										else
											echo "<p style='color: orange'><strong>Esse projeto, já está autorizado</strong></p>
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