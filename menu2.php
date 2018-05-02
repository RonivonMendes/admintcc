<?php
	require_once 'php/tcc.php';
	
	session_start();

	if ($_SESSION['tipoPerfil']==5)
	{
		$tcc = new CadastroTcc("","","","","");

		$consulta = $tcc->buscar($_SESSION['idAluno']);
	}	
?>


<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Page-Enter" content="RevealTrans(Duration=6)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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

<div id="page-wrapper" style="padding-top: 1px; padding-bottom: 2px">
	
	<div class="menu-dash" style="text-align: center; padding-top: 1px;">
				<?php

					#index para todos (restrição de conteúdo feitos na página)
					echo "<div class='dropdown'>
  					<a href='index.php'> 
  					<button id='m1' class='dropbtn'>Início</button>
  					</a>
					</div>";

					#Cadastro de úsuario somente para quem tem permissão
					if($_SESSION['tipoPerfil']==1||$_SESSION['tipoPerfil']==2||$_SESSION['tipoPerfil']==3)
					{
						echo "<div class='dropdown'>
  						<a href='cadastrarUsuario.php'>
  						<button id='m2' class='dropbtn'>Cadastrar Usuário</button>
						</a>
						</div>";
					}

					#cadastrarTcc Tem que ser Supervisor ou Orientador
					if ($_SESSION['tipoPerfil']==1||$_SESSION['tipoPerfil']==2||$_SESSION['tipoPerfil']==3)
					{
						echo "<div class='dropdown'>
  						<a href='cadastroTcc.php'>
  						<button id='m3' class='dropbtn'>Cadastrar TCC</button>
  						</a>
						</div>";
					}

					#Visualizar/aceitar projeto, somente aluno
					if ($_SESSION['tipoPerfil']==5)
					{
						echo "<div class='dropdown'>
  				    	<a href='aceitartcc.php'>
  				    	<button id='m4' class='dropbtn'>Projeto TCC</button>
        		    	</a>
         				</div>";
					}

					#Deslogar para todos
					echo "<div class='dropdown'>
            		<a href='php/deslogar.php'>
            		<button id='m8' type='button'  class='dropbtn'  style='background-color: red'>Sair</button>
            		</a>
					</div>";
				?>
	
			</div>
	</div>
</body>
</html>