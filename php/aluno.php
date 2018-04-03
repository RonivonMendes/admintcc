<?php	
	require_once './conexao.php';

	class Aluno extends Usuario
	{
		private $ra;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone, $ra)
		{
			parent::__construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone);
			$this->ra = $ra;
		}

		function cadastra(Usuario $user, Endereco $endereco, Acesso $acesso)
		{
			#cadastrando acesso e pegando id
			$idUser = parent::cadastra($user, $endereco, $acesso);

			echo "<br>Id usuario cadastrado".$idUser."<br>";

			$conexao = Database::conexao();

			$sql = "INSERT INTO `alunos` (`ra`, `usuarios_id`, `acessos_id`) VALUES ('$this->ra', '$idUser', '1')"; #id de quem está cadastrando
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Aluno Cadastrado com sucesso";
		}

		/*
		function atualiza($iduser, Usuario $user, $idend, Endereco $endereco)
		{
			#atualizando o endereço
			$endereco->atualiza($idend, $endereco);

			$conexao = Database::conexao();

			$sql = "UPDATE `usuarios` SET `nome`='$this->nome', `cpf`='$this->cpf', `rg`='$this->rg', `orgao_expeditor`='$this->orgaoexpedidor', `telefone`='$this->telefone'WHERE id='$iduser'";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Linhas inseridas / ATUALIZADO COM SUCESSO";
		}*/

	}

?>