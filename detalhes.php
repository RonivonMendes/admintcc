<?php
	/*require_once 'php/tcc.php';
	require_once 'php/integrante.php';

	session_start();

	if ($_SESSION['logado']!=1)
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


	if (isset($_POST['aprovacao']))
	{
		if ($_POST['aprovacao']=="aprovacao")
		{
			$tcc = new CadastroTcc("","","","","");
			#se estiver aprovado, aprovar no sistema e enviar para o supervisor aprovar
			if($_POST['aprovar']==1)
				$alerta = $tcc->aprovar($consultatcc[0]['id'], $_POST['aprovar']);
			
			#se não reabre o aceite do aluno para que ele faça alterações no resumo!
			else
			{
				$tcc->aceitar($consultatcc[0]['id'], $_POST['aprovar'], $consultatcc[0]['resumo']);
				$alerta = "Resumo e aceite reaberto para que o aluno faça correções!";
			}

		}
		
	}*/
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
										echo "<textarea style='width: 98%' id='text-control' id='a7' name='resumo' rows='13' cols='143' required='' disabled=''>".$consultatcc[0]['titulo']."</textarea>";
									?>
								
								</div>

									<br>
									<div class='check-aceitar'>

									<?php
										/*if($consultatcc[0]['aceite']==1&&$consultatcc[0]['aprovacaoOrientador']==0||$consultatcc[0]['aprovacaoOrientador']==2)
										{
											echo "<input type='radio'  name='aprovar' value='1' id='a8'>Aprovar
													<input type='radio'  name='aprovar' value='2' id='a9'>Reprovar
											</div>
											<br>
											<div style='text-align: center;' class='form-group'>
												<input type='submit' name='enviar' id='a10' value='Enviar'>";

											if($consultatcc[0]['aceite']==1&&$consultatcc[0]['aprovacaoOrientador']==2)
												echo "<p style='color: red'><strong>O projeto foi reprovado pelo Supervisor de TCC, o aluno já efetuar suas correções, envie novamente para autorização!</strong></p>
												</div>
												</div>";
											

									
										}

										else if($consultatcc[0]['aceite']==0)
										{
											echo "<p style='color: red'><strong>Aguardando o aluno concluir seu resumo e/ou aceitar os termos!</strong></p>
											</div>";

										}
										else if($consultatcc[0]['aceite']==2)
										{
											echo "<p style='color: red'><strong>Projeto foi reprovado, aguardando o aluno fazer as devidas correções em seu resumo e/ou aceitar os termos!</strong></p>
											</div>";
										}
										else if($consultatcc[0]['aceite']==3&&$consultatcc[0]['aprovacaoOrientador']==2)
											echo "<p style='color: red'><strong>O projeto foi reprovado pelo Supervisor de TCC, aguardando o aluno efetuar correções e  enviar novamente para sua aprovação!</strong></p>
											</div>";
										else if($consultatcc[0]['aceite']==1&&$consultatcc[0]['aprovacaoOrientador']==1&&$consultatcc[0]['aprovacaoSuper'==0])
											echo "<p style='color: red'><strong>O projeto já foi aprovado, aguardando autorização do Supervisor</strong></p>
											</div>";
										*/	
									?>

								<br>

						<table class="table table-bordered"> 

							<thead> 
								<tr> 
									<th>Status Aluno</th> 
									<th>Status Orientador</th> 
									<th>Status Supervisor</th> 
									
								</tr> 
							</thead> 
							<tbody>
							
								
								<tr>
								<?php
								
									#Se for aluno, ele so pode ver o projeto dele!
									if($_SESSION['tipoPerfil']==5 && $consultatcc!="0")
									{
										foreach ($consultatcc as $key => $value)
										{
											if($value['alunos_id'] == $_SESSION['idAluno'])
											{
												echo "<tr onclick=\"javascript:window.location.href='lancarAtividades.php'; return false;\" style='cursor: hand;'>";
												echo "<td>".$value['id']."</td>"; 
												echo "<td>".$value['nome']."</td>";
												echo "<td>".$value['curso']."</td>";
												echo "<td>".$value['titulo']."</td>";
												echo "</tr></div></a>";
											}
										}
									}
									/*
									#se for Orientador, visualiza todo que ele orienta, porém o link é para aprovar
									else if($_SESSION['tipoPerfil']==3 && $consultatcc!="0")
									{
										foreach ($consultatcc as $key => $value)
										{
											if($value['integrantes_id']==$_SESSION['idIntegrante'])
											{
												echo "<tr onclick=\"javascript:window.location.href='aprovartcc.php?id=".$value['id']."'; return false;\" style='cursor: hand;'>";
												echo "<td>".$value['id']."</td>"; 
												echo "<td>".$value['nome']."</td>";
												echo "<td>".$value['curso']."</td>";
												echo "<td>".$value['titulo']."</td>";
												echo "</tr></div></a>";
											}

										}
									} 

									#se for Supervisor, visualiza todos, porém o link é para autorizar
									else if($_SESSION['tipoPerfil']==1 || $_SESSION['tipoPerfil']==2 && $consultatcc!="0")
									{
										foreach ($consultatcc as $key => $value)
										{
											echo "<tr onclick=\"javascript:window.location.href='autorizartcc.php?id=".$value['id']."'; return false;\" style='cursor: hand;'>";
											echo "<td>".$value['id']."</td>"; 
											echo "<td>".$value['nome']."</td>";
											echo "<td>".$value['curso']."</td>";
											echo "<td>".$value['titulo']."</td>";
											echo "</tr></div></a>";
										}
									}*/
								?>  
							</tr> 
							</tbody> 
						</table>

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