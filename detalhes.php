<?php
	require_once 'php/tcc.php';
	require_once 'php/integrante.php';

	session_start();

	if ($_SESSION['logado']!=1||$_SESSION['tipoPerfil']==5)
	{
		header('location: login.php');
	}

	if (isset($_GET['id']))
	{
		$tcc = new CadastroTcc("","","","","");
		$consultatcc = $tcc->buscar($_GET['id']);

		#se não encontrar projeto com esse ID, redireciona pata index
		if($consultatcc=="0")
		{
			header('location: index.php');

		}

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
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Detalhes</title>
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
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
				
				<h2 class="title1" style="text-align: center; font-weight: bold;">Detalhes</h2>
				<div class="widget-shadow">
						
						<form action="" method="post" class="form-horizontal">
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
										echo "<textarea style='width: 98%' id='text-control' id='a7' name='resumo' rows='13' cols='143' required='' disabled=''>".$consultatcc[0]['resumo']."</textarea>";
									?>
								
								</div>

									<br>
									<div class='check-aceitar'>

									

								<br>

						<table class="table table-bordered"> 

							<thead> 
								<tr> 
									<th>Aceite Aluno</th> 
									<th>Aprovação Orientador</th> 
									<th>Autorização Supervisor</th> 
									
								</tr>

								<tr>
									<?php
										if ($consultatcc[0]['aceite']==1)
										{
											echo "<td style='color:blue'><strong>Aceito</strong></td>"; //azul 
										}
										else
											echo "<td style='color:orange'><strong>Pendente</strong></td>"; //laranja

										if ($consultatcc[0]['aprovacaoOrientador']==1)
										{
											echo "<td style='color:blue'><strong>Aprovado</strong></td>"; //azul
										}
										else if($consultatcc[0]['aprovacaoOrientador']==0)
											echo "<td style='color:orange'><strong>Pendente</strong></td>"; //laranja

										if ($consultatcc[0]['aprovacaoSuper']==1)
										{
											echo "<td style='color:blue'><strong>Autorizado</strong></td>"; //azul
										}
										else if($consultatcc[0]['aprovacaoSuper']==0)
											echo "<td style='color:orange'><strong>Pendente</strong></td>"; //laranja
									?>
									<td></td>
								</tr>
							</thead> 

						</table>

							</form>
						</div>
						<br><br>
<h2 style="text-align: center;">Documentação</h2>
<center>
    <br>
<table>
    
    <tr>
    	<td style="border: 10px solid #fff; background: #629aa9; padding: 15px; border-radius: 5px; color: white; font-weight: bold;"><a target="_blank" style="color: white" href="docformalizacaotcc.php?id=<?php echo $_GET['id']; ?>"><i class="fas fa-file-download"></i> FORMALIZAÇÃO DE TCC</a></td>
    	<td style="border: 10px solid #fff; background: #629aa9; padding: 15px; border-radius: 5px; color: white; font-weight: bold;"><a target="_blank" style="color: white" href="docresponsabilidade.php?id=<?php echo $_GET['id']; ?>"><i class="fas fa-file-download"></i> TERMO DE RESPONSABILIDADE</a></td>
	</tr>
</table>
</center>
<br><br>
					</div>
				<br>
			<br>
		<br><br><br>
		
	</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>