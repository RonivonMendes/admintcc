<?php
	require_once 'php/aluno.php';
	require_once 'php/endereco.php';
	require_once 'php/acesso.php';
	require_once 'php/usuario.php';
	require_once 'php/integrante.php';
	
	if(isset($_POST['tipocadastro'])) 
	{

		if($_POST['tipocadastro']=="aluno")
		{
			$alunoCadastra = new Aluno($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['orgao_expeditor'], $_POST['telefone'], $_POST['ra'], '1');
			$endcadastra = new Endereco($_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['cep']);
			$acessoCadastra= new Acesso('1',$_POST['email'],$_POST['senha'], '1');
			$alunoCadastra->cadastra($alunoCadastra, $endcadastra, $acessoCadastra);
			

		}

		else if($_POST['tipocadastro']=='orientador')
		{
			#CADASTRANDO UM INTEGRANTE
			$orientadorCadastra = new Integrante($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['orgao_expeditor'], $_POST['telefone'], $_POST['titulacao'], $_POST['institucao']);
			$endCadastra = new Endereco(  $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['cep']);
			$acessoCadastra = new Acesso('3',$_POST['email'],$_POST['senha'], '1');
			$orientadorCadastra->cadastra($orientadorCadastra, $endCadastra, $acessoCadastra);
		}

		else if($_POST['tipocadastro']=='coorientador')
		{
			#CADASTRANDO UM INTEGRANTE
			$coorientadorCadastra = new Integrante($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['orgao_expeditor'], $_POST['telefone'], $_POST['titulacao'], $_POST['institucao']);
			$endCadastra = new Endereco(  $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['cep']);
			$acessoCadastra = new Acesso('4',$_POST['email'],$_POST['senha'], '1');
			$coorientadorCadastra->cadastra($coorientadorCadastra, $endCadastra, $acessoCadastra);
		}

		else if($_POST['tipocadastro']=='supervisor')
		{
			echo "<br><br>E-MAIL:".$_POST[''];
			#CADASTRANDO UM INTEGRANTE
			$supervisorCadastra = new Integrante($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['orgao_expeditor'], $_POST['telefone'], $_POST['titulacao'], $_POST['institucao']);
			$endCadastra = new Endereco(  $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['logradouro'], $_POST['numero'], $_POST['cep']);
			$acessoCadastra = new Acesso('2',$_POST['email'],$_POST['senha'], '1');
			$supervisorCadastra->cadastra($supervisorCadastra, $endCadastra, $acessoCadastra);
		}
		
	}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Cadastro</title>
<meta http-equiv="Page-Enter" content="RevealTrans(Duration=6)">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<style>
	.ds{
  cursor: pointer;
}

</style>

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
		$("div#d1").fadeIn();
		$("div#d2").hide();
		$("div#d3").hide();
		$("div#d4").hide();
	
		$("button#f1").click(function(){

			$("div#d2").hide();
			$("div#d3").hide();
			$("div#d4").hide();
			$("div#d1").fadeIn();
		});

		$("button#f2").click(function(){
			$("div#d1").hide();
			$("div#d3").hide();
			$("div#d4").hide();		
			$("div#d2").fadeIn();
		});

		$("button#f3").click(function(){
			$("div#d1").hide();
			$("div#d2").hide();
			$("div#d4").hide();
			$("div#d3").fadeIn();
		});

		$("button#f4").click(function(){
			$("div#d1").hide();
			$("div#d2").hide();
			$("div#d3").hide();
			$("div#d4").fadeIn();
		});

		function limpa_formulário_cep() {
	    		// Limpa valores do formulário de cep.
	   	 		$(".rua").val("");
				$(".bairro").val("");
	        	$(".cidade").val("");
	        	$(".estado").val("");	     
	    	}

	    	$(".cep").click(function(){
	    		console.log("cliquei no cep");
	    	});
	    
	    	//Quando o campo cep perde o foco.
	    	$(".cep").blur(function() {
	    		console.log("entrei no cep");
	        	//Nova variável "cep" somente com dígitos.
	        	var cep = $(this).val().replace(/\D/g, '');

	        	//Verifica se campo cep possui valor informado.
	        	if (cep != "") {

	            	//Expressão regular para validar o CEP.
	            	var validacep = /^[0-9]{8}$/;

	            	//Valida o formato do CEP.
	            	if(validacep.test(cep)) {

	                	//Preenche os campos com "..." enquanto consulta webservice.
	                	$(".rua").val("buscando...");
	                	$(".bairro").val("buscando...");
	                	$(".cidade").val("buscando...");
	                	$(".estado").val("...");
	               

	                	//Consulta o webservice viacep.com.br/
	                	$.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

	                    	if (!("erro" in dados)) {
	                        	//Atualiza os campos com os valores da consulta.
	                        	$(".rua").val(dados.logradouro);
	                        	$(".bairro").val(dados.bairro);
	                        	$(".cidade").val(dados.localidade);
	                        	$(".estado").val(dados.uf);
	                    	} //end if.
	                    	else {
	                        	//CEP pesquisado não foi encontrado.
	                        	limpa_formulário_cep();
	                        	alert("CEP não encontrado.");
	                    	}
	                	});
	            	} //end if.
	            	else {
	                	//cep é inválido.
	                	limpa_formulário_cep();
	                	alert("Formato de CEP inválido.");
	            	}
	        	} //end if.
	        	else {
	            	//cep sem valor, limpa formulário.
	            	limpa_formulário_cep();
	        	}
	    	});
		});</script>

	</head> 
<body>

<div id="page-wrapper" style="padding-top: 5%;">
			<div class="main-page login-page" style="width: 80%"> 
				<h2 class="title1" style="text-align: center; font-weight: bold;">Cadastrar Novo Usuário</h2>
				<div class="widget-shadow">
		
					<div style="text-align: center;">
						<br>
						<button id="f1">Aluno</button>
						<button id="f2">Orientador</button>
						<button id="f3">Coorientador</button>
						<button id="f4">Supervisor</button>
					</div>
					
					<br>
				</div>
				
				<div class="widget-shadow">		
					<!--Aluno-->
					<div id="d1">
						
						<form action="cadastrarUsuario.php" method="post" class="form-horizontal">
							<input type="hidden" name="tipocadastro" value="aluno">
								<div class="form-group">
									<br>
									<h3 style="text-align: center;">Aluno</h3>
								</div>

							<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome Completo</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="nome" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">RG</label>
									<div class="col-sm-8">
										<input style="width: 16%" type="text" class="form-control1" name="rg" value="" required="" maxlength="14">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Orgão Epeditor</label>
									<div class="col-sm-8">
										<input style="width: 10%" type="text" class="form-control1" name="orgao_expeditor" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CPF (Somente números)</label>
									<div class="col-sm-8">
										<input style="width: 13%" type="text" class="form-control1" name="cpf" value="" required=""  maxlength="11">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Curso</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="curso" value="" >
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Matrícula (RA)</label>
									<div class="col-sm-8">
										<input style="width: 19%" type="text" class="form-control1" name="ra" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone</label>
									<div class="col-sm-8">
										<input style="width: 15%" type="text" class="form-control1" class="telefone" name="telefone" value="" required="" maxlength="15">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Cep</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="cep" class="form-control1" name="cep" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
									<div class="col-sm-8">
										<input style="width: 5%" type="text" class="estado" class="form-control1" name="estado" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cidade</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="cidade" class="form-control1" name="cidade" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bairro</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="bairro" class="form-control1" name="bairro" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Logradouro</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="rua" class="form-control1" name="logradouro" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="form-control1" name="numero" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="email" class="form-control1" name="email" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
									<div class="col-sm-8">
										<input style="width: 30%" type="password" class="form-control1" name="senha" value="" required="">
									</div>
								</div>
								 
								<div style="text-align: center;" class="form-group">
									<input type="submit" name="enviar" value="Cadastrar">
									<input type="reset" name="limpar" value="Limpar">
								</div>
								<br>
							</form>
						</div>	
					
					<!--Orientador-->
					<div id="d2">

						<form action="?action=orientador" method="post" class="form-horizontal">
								
								<div class="form-group">
									<br>
									<h3 style="text-align: center;">Orientador</h3>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome Completo</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="nome" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">RG</label>
									<div class="col-sm-8">
										<input style="width: 16%" type="text" class="form-control1" name="rg" value="" required="" maxlength="14">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Orgão Epeditor</label>
									<div class="col-sm-8">
										<input style="width: 10%" type="text" class="form-control1" name="orgao_expeditor" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CPF (Somente números)</label>
									<div class="col-sm-8">
										<input style="width: 13%" type="text" class="form-control1" name="cpf" value="" required=""  maxlength="11">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Titulação</label>
									<div class="col-sm-8">
										<input style="width: 45%" type="text" class="form-control1" name="titulacao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instituição</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="institucao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone</label>
									<div class="col-sm-8">
										<input style="width: 15%" type="text" class="form-control1" class="telefone" name="telefone" value="" required="" maxlength="15">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Cep</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="cep" class="form-control1" name="cep" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
									<div class="col-sm-8">
										<input style="width: 5%" type="text" class="estado" class="form-control1" name="estado" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cidade</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="cidade" class="form-control1" name="cidade" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bairro</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="bairro" class="form-control1" name="bairro" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Rua</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="rua" class="form-control1" name="rua" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="form-control1" name="numero" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="email" class="form-control1" name="email" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="password" class="form-control1" name="senha" value="" required="">
									</div>
								</div>
								 
								<div class="form-group" style="text-align: center;">
									<input type="submit" name="enviar" value="Cadastrar">
									<input type="reset" name="limpar" value="Limpar">
								</div>
								<br>
							</form>
						</div>
					
					<!--Coorientador-->
					<div id="d3">

						<form action="?action=coorientador" method="post" class="form-horizontal">
								
								<div class="form-group">
									<br>
									<h3 style="text-align: center;">Coorientador</h3>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome Completo</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="nomeAluno" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">RG</label>
									<div class="col-sm-8">
										<input style="width: 16%" type="text" class="form-control1" name="rg" value="" required="" maxlength="14">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Orgão Epeditor</label>
									<div class="col-sm-8">
										<input style="width: 10%" type="text" class="form-control1" name="orgao_expeditor" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CPF (Somente números)</label>
									<div class="col-sm-8">
										<input style="width: 13%" type="text" class="form-control1" name="cpf" value="" required=""  maxlength="11">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Titulação</label>
									<div class="col-sm-8">
										<input style="width: 45%" type="text" class="form-control1" name="titulacao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instituição</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="institucao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone</label>
									<div class="col-sm-8">
										<input style="width: 15%" type="text" class="form-control1" class="telefone" name="telefoneAluno" value="" required="" maxlength="15">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Cep</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="cep" class="form-control1" name="cep" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
									<div class="col-sm-8">
										<input style="width: 5%" type="text" class="estado" class="form-control1" name="estado" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cidade</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="cidade" class="form-control1" name="cidade" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bairro</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="bairro" class="form-control1" name="bairro" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Rua</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="rua" class="form-control1" name="rua" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="form-control1" name="numero" value="" required="">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="email" class="form-control1" name="emailAluno" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="password" class="form-control1" name="senhaAluno" value="" required="">
									</div>
								</div>
								 
								<div class="form-group" style="text-align: center;">
									<input type="submit" name="enviar" value="Cadastrar">
									<input type="reset" name="limpar" value="Limpar">
								</div>
								<br>
							</form></div>
					
					<!--Supervisor-->
					<div id="d4">
						<form action="?action=supervisor" method="post" class="form-horizontal">
								
								<div class="form-group">
									<br>
									<h3 style="text-align: center;">Supervisor</h3>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Nome Completo</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="text" class="form-control1" name="nomeAluno" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">RG</label>
									<div class="col-sm-8">
										<input style="width: 16%" type="text" class="form-control1" name="rg" value="" required="" maxlength="14">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Orgão Epeditor</label>
									<div class="col-sm-8">
										<input style="width: 10%" type="text" class="form-control1" name="orgao_expeditor" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">CPF (Somente números)</label>
									<div class="col-sm-8">
										<input style="width: 13%" type="text" class="form-control1" name="cpf" value="" required=""  maxlength="11">
									</div>
								</div>


								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Titulação</label>
									<div class="col-sm-8">
										<input style="width: 45%" type="text" class="form-control1" name="titulacao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Instituição</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="institucao" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Telefone</label>
									<div class="col-sm-8">
										<input style="width: 15%" type="text" class="form-control1" class="telefone" name="telefoneAluno" value="" required="" maxlength="15">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Cep</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="cep" class="form-control1" name="cep" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Estado</label>
									<div class="col-sm-8">
										<input style="width: 5%" type="text" class="estado" class="form-control1" name="estado" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Cidade</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="cidade" class="form-control1" name="cidade" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Bairro</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="bairro" class="form-control1" name="bairro" value="" required="">
									</div>
								</div>
								
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Rua</label>
									<div class="col-sm-8">
										<input style="width: 40%" type="text" class="rua" class="form-control1" name="rua" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Número</label>
									<div class="col-sm-8">
										<input style="width: 12%" type="text" class="form-control1" name="numero" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputEmail" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="email" class="form-control1" name="emailAluno" value="" required="">
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword" class="col-sm-2 control-label">Senha</label>
									<div class="col-sm-8">
										<input style="width: 50%" type="password" class="form-control1" name="senhaAluno" value="" required="">
									</div>
								</div>
								 
								<div class="form-group" style="text-align: center;">
									<input type="submit" name="enviar" value="Cadastrar">
									<input type="reset" name="limpar" value="Limpar">
								</div>
								<br>
							</form>
						</div>		
				</div>

					<div class="registration">Já possui uma conta?
						<a class="" href="login.html">Login</a>
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


