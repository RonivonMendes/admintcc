<?php
	/*
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

	#consultar projetos para verificar se o aluno já não tem projeto cadastrado
	$tcc = new CadastroTcc("","","","","");
	$consultatcc = $tcc->buscar();
*/
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Inicio</title>
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




<div id="page-wrapper" style="padding-top: 5%">

			<?php
				include 'menu.php';
			?>

		<div class="main-page login-page" style="width: 90%"> 
			<?php
					echo "Seja bem vindo(a), ".$_SESSION['nomeUser'].".";
				?>
				<h2 class="title1" style="text-align: center; font-weight: bold;">Início</h2>
					<div class="widget-shadow">
		
						<table class="table table-bordered"> 
							
							<div>
								<br>
								<h2 style="text-align: center">Projetos em Andamento</h2>
								<br>
							</div>

							<thead> 
								<tr> 
									<th>Id</th> 
									<th>Aluno</th> 
									<th>Curso</th> 
									<th>Título do Projeto</th>
								</tr> 
							</thead> 
							<tbody> 
								
								<tr>
									<!--teste-->
									<td><a href="login.php">teste</a></td>
									

								</tr>

								<?php
									foreach ($consultatcc as $key => $value)
									{
										echo "<a href='aprovarprojeto.php?id=".$value['id']."'><tr>";
										echo "<td>".$value['id']."</td>"; 
										echo "<td>".$value['nome']."</td>";
										echo "<td>".$value['curso']."</td>";
										echo "<td>".$value['titulo']."</td>";
										echo "<a href='aprovaprojeto.php</a>";
										echo "</tr></a>";
									}
									
								?>  
							
							</tbody> 
						</table>
						<br>
					</div>
		</div>		
</div>

		<!--footer-->
		<div class="footer">
		   <p>&copy; 2018 Todos os direitos reservados a ARCH Software.</a></p>		
		</div>
        <!--//footer-->	
</body>
</html>
