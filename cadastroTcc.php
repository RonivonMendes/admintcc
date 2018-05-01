<?php
	require_once 'php/aluno.php';
	require_once 'php/tcc.php';

	session_start();

	if (($_SESSION['logado']==0))
	{
		header('location: login.php');
	}


	if(isset($_POST['cadastro']))
	{
		if ($_POST['cadastro']=='cadastroTcc')
		{
			$tcc = new CadastroTcc($_POST['aluno'], $_SESSION['idAcesso'], $_POST['projeto'], $_POST['gPesquisa'], "");
			$alerta = $tcc->cadastrar($tcc);

			$_POST['cadastro']="false";
		}
	}

	#Consulta de alunos, para listar
	$buscaAluno = new Aluno("","","","","","","");
	$lista = $buscaAluno->buscar();

	#consultar projetos para verificar se o aluno já não tem projeto cadastrado
	$tcc = new CadastroTcc("","","","","");
	$consultatcc = $tcc->buscar();
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cadastro</title>
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
	
	<script>
			$(document).ready(function(){		
			
			$(".alert").fadeIn(1000).delay(3000).fadeOut(1000);
		});
	</script>

	</head> 
<body>

<div id="page-wrapper" style="padding-top: 5%;">
	
	<?php

		include 'menu.php'; 

	 ?>

	<?php
		if(isset($_POST['cadastro']))
		{
			echo "<div class='alert'>";
			 echo "<span class='closebtn' onclick='this.parentElement.style.display='none';''></span>"; 
			  	echo $alerta;
				echo "</div>";
		}
	?>

			<div class="main-page login-page" style="width: 90%"> 

				<h2 class="title1" style="text-align: center; font-weight: bold;">Cadastrar Projeto TCC</h2>
				<div class="widget-shadow">

						<form action="cadastroTcc.php" method="post" class="form-horizontal">	
							
								<br>
								<br>


							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Aluno</label>
									<div class="col-sm-8">
										<select class="form-control1" name="aluno" id="c1" style="width: 75%" place required>
    										<option value="" ></option>
    										<?php
    											foreach ($lista as $valor)
    											{
    												
    												if(!(array_key_exists($valor['id'], $consultatcc)))	
    												{
    													echo "<option value='".$valor['id']."'>".$valor['nome']." (".$valor['nomeCurso'].")</option>";
    												}
    											}
    										?>
										</select>
										<p> *caso o aluno não esteja sendo listado, ele já possuí um Tcc Ativo, ou ele não está cadastrado no sistema! consulte o aluno <a href="#">Lista de alunos</a></p>
									</div>

								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Título do Projeto</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="projeto" id="c2" value="" required="" maxlength="14">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Grupo de Pesquisa</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="gPesquisa" id="c3" value="" required="">
									</div>
									
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Coorientador</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="coorientador" id="c4" value="" required="">
									</div>
									
								</div>

								<div style="text-align: center;" class="form-group">
									<input type="submit" name="enviar" id="c5" value="Cadastrar">
									<input type="reset" name="limpar" id="c6" value="Limpar">

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


