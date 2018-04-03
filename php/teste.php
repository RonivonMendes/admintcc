<?php 
require_once './endereco.php';
require_once './usuario.php';
require_once './acesso.php';
require_once './aluno.php';


#CADASTRANDO UM ALUNO
/*$alunoTeste = new Aluno('Joana', '12334343456', 'MG3456785', 'PC/MG', '34996520750', '123456789876');
$endteste = new Endereco( 'Brasil', 'MG', 'Udia', 'Platina', 'Rua Pio Goulart', '337', '38307066');
$acesso = new Acesso('1','teste@mail.com','senha123');
$idcadastrando = 1;
$alunoTeste->cadastra($alunoTeste, $endteste, $acesso);
*/

#CADASTRANDO UM PROFESSOR
$coorientadorTeste = new Coorientador('Joana', '12334343456', 'MG3456785', 'PC/MG', '34996520750', '123456789876');
$endteste = new Endereco( 'Brasil', 'MG', 'Udia', 'Platina', 'Rua Pio Goulart', '337', '38307066');
$acesso = new Acesso('1','teste@mail.com','senha123');
$idcadastrando = 1;
$coorientadorTeste->cadastra($coorientadorTeste, $endteste, $acesso);


 ?>