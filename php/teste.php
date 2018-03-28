<?php 
require_once './endereco.php';
require_once './usuario.php';


$usuarioTeste = new Usuario('Josefina', '12334343456', 'MG3456785', 'PC/MG', '34996520750', 'mail@mail.com', 'senha');
$endteste = new Endereco( 'Brasil', 'MG', 'Itajai', 'Platina', 'Rua Pio Goulart', '337', '38307066');

//$endteste->atualiza(1, $endteste);
$iduser = 21;
$idend = 40;


$usuarioTeste->atualiza($iduser,$usuarioTeste, $idend, $endteste);

 ?>