<?php
  require_once 'php/tcc.php';
  
  session_start();

  if ($_SESSION['tipoPerfil']==5)
  {
    $tcc = new CadastroTcc("","","","","");

    $consulta = $tcc->buscar($_SESSION['idAluno']);
  }
date_default_timezone_set('America/Sao_Paulo'); 
$hr = date("H");
if($hr >= 12 && $hr<18) {
$resp = "<i class='fas fa-sun'></i> Boa tarde";}
else if ($hr >= 0 && $hr <12 ){
$resp = "<i class='fas fa-sun'></i> Bom dia";}
else {
$resp = "<i class='fas fa-moon'></i> Boa noite";}

?>
<style>
#menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #629aa9;
    border-bottom: 5px solid #4b7884;
    height: 60px;
}

#menu li {
    float: left;
}

#menu li a {
    display: block;
    color: white;
    line-height: 60px;
    text-align: center;
    padding: 0px 16px;
    text-decoration: none;
}

#menu li a:hover:not(.active) {
    background-color: #4b7884;
}

#menu .active {
    background-color: #4b7884;
}
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
<ul id="menu">
  <li><a href="index.php"><i class="fas fa-home"></i>&nbsp;&nbsp;Início</a></li>
  <?php if($_SESSION['tipoPerfil']==1||$_SESSION['tipoPerfil']==2||$_SESSION['tipoPerfil']==3) {?>
  <li><a href="cadastrarUsuario.php"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Cadastrar Usuário</a></li>
  <?php } if ($_SESSION['tipoPerfil']==1||$_SESSION['tipoPerfil']==2||$_SESSION['tipoPerfil']==3) {?>
  <li><a href="cadastroTcc.php"><i class="fas fa-file-medical"></i>&nbsp;&nbsp;Cadastrar TCC</a></li>
  <?php } if ($_SESSION['tipoPerfil']==5) { ?>
  <li><a href="aceitartcc.php"><i class="fas fa-file"></i>&nbsp;&nbsp;Projeto TCC</a></li>
  <?php } ?>
  <li style="float:right"><a class="active" href='php/deslogar.php'><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Sair</a></li>
    <li style="color: white; float: right; padding: 0px 20px; line-height: 60px;"><?php echo $resp.", ".strstr($_SESSION['nomeUser'], ' ', true); ?>!</li>
</ul>