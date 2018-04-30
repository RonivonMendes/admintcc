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
				
				<div class="dropdown">
  					<button id="m1" class="dropbtn"> <a href="index.php"> Início</a></button>
				</div>		

				<div class="dropdown">
  					<button id="m2" class="dropbtn"> <a href="cadastrarUsuario.php"> Cadastrar Usuário</a></button>
				</div>

				<div class="dropdown">
  					<button id="m3" class="dropbtn"> <a href="cadastroTcc.php"> Cadastrar TCC</a></button>
  					
				</div>

				<div class="dropdown">
  				    <button id="m4" class="dropbtn"> <a href="aceitarcadastrotcc.php"> Projeto TCC</a></button>
        		    
         		</div>

        		<div class="dropdown">
            		<button id="m5" class="dropbtn" image="fa-exclamation"> <a href="resumotcc.php"> Resumo TCC</a></button>
            		
				</div>

				<div class="dropdown">
            		<button id="m6" class="dropbtn"> <a href="resumotccsupervisor.php"> Resumo TCC Supervisor</a></button>
            		
				</div>

				<div class="dropdown">
            		<button id="m7" class="dropbtn"> <a href="aprovaprojeto.php"> Aprovar Projeto</a></button>
            		
				</div>

				<div class="dropdown">
            		<button id="m8" type="button"  class="dropbtn"  style="background-color: red"> <a href="php/deslogar.php"> Sair</a></button>
            		
				</div>
            		
			</div>
	</div>
</body>
</html>