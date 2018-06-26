<?php
	require_once 'php/tcc.php';

	session_start();

	if ($_SESSION['logado']!=1||$_SESSION['tipoPerfil']==4||$_SESSION['tipoPerfil']==5)
	{
		header('location: login.php');
	}

	#consultar todos os projetos
	$tcc = new CadastroTcc("","","","","");
	$consultatcc = $tcc->buscar();

	#pequisa por Orientador ou aluno
	if (isset($_POST['pesquisar']))
	{
		if ($_POST['pesquisar']=="pesquisar")
		{
			$pesquisaTcc = new CadastroTcc("","","","","");
			$pesq = $pesquisaTcc->pesquisar($_POST['busca']);

		}
	}

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Listar TCC's</title>
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

<div id="page-wrapper" style="padding-top: 5%">


		<div class="main-page login-page" style="width: 90%"> 
			
				<h2 class="title1" style="text-align: center; font-weight: bold;">Listar  TCC's</h2>
					<div class="widget-shadow">
		
						<table class="table table-bordered"> 
							
							<div style="text-align: right;">
								<br>
								<h2 style="text-align: center">Projetos em Andamento</h2>
								<form action="#" method="post">
									<input type="hidden" name="pesquisar" value="pesquisar">
									<input type="text" name="busca" placeholder="buscar aluno ou projeto">
									<button type="submit"><i class="fas fa-search"></i></button>
								</form>
								<br><br>
							</div>

					

							<thead> 
								<tr> 
									<th>Id</th> 
									<th>Aluno</th> 
									<th>Curso</th> 
									<th>Título do Projeto</th>
									<th>Detalhes</th>
								</tr>
							</thead> 
							<tbody>
								
								<tr>
								<?php

								#se não realizou nenhuma pesquisa, lista todos, se não, lista apenas os retornos da pesquisa, se nenhum item for encontrado, exibe uma mensagem!
								if(!isset($_POST['pesquisar']))
								{
									#Somente Supervisor, Orientador ou Admin do sistema tem acesso a visualização
									if($_SESSION['tipoPerfil']==3 || $_SESSION['tipoPerfil']==2 || $_SESSION['tipoPerfil']==1)
									{
										foreach ($consultatcc as $key => $value)
										{
											echo "<tr>";
											echo "<td class='".$value['id']."'>".$value['id']."</td>"; 
											echo "<td>".$value['nome']."</td>";
											echo "<td>".$value['curso']."</td>";
											echo "<td>".$value['titulo']."</td>";
											echo "<td><a id='".$value['id']."' class='btn btn-default' href='detalhes.php?id=".$value['id']."'><i class='fas fa-info-circle'></i></link></td>";
											echo "</tr></div></a>";
										}
									} 
								}
								else if($_SESSION['tipoPerfil']==3 || $_SESSION['tipoPerfil']==2 || $_SESSION['tipoPerfil']==1&&$pesq!="0")
								{
									foreach ($pesq as $key => $value)
									{
										echo "<tr>";
										echo "<td class='".$value['id']."'>".$value['id']."</td>"; 
										echo "<td>".$value['nome']."</td>";
										echo "<td>".$value['curso']."</td>";
										echo "<td>".$value['titulo']."</td>";
										echo "<td><a id='".$value['id']."' class='btn btn-default' href='detalhes.php?id=".$value['id']."'><i class='fas fa-info-circle'></i></link></td>";
										echo "</tr></div></a>";
									}
								}
								elseif ($pesq=="0")
								{
									echo "<tr>";
										echo "<td colspan='5' align='center'>Nenhum item encontrado!</td>";
										echo "</tr>";
								}

									
								?>  
							</tr>
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
