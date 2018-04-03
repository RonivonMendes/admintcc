<?php	
	require_once './conexao.php';

	class Coorientador extends Usuario
	{
		private $titulacao, $instituicao;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone, $titulacao, $instituicao)
		{
			parent::__construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone);
			$this->titulacao = $titulacao;
			$this->instituicao=$instituicao;
		}

		function cadastra(Usuario $user, Endereco $endereco, Acesso $acesso)
		{
			#cadastrando acesso e pegando id
			$idUser = parent::cadastra($user, $endereco, $acesso);

			echo "<br>Id usuario cadastrado".$idUser."<br>";

			$conexao = Database::conexao();

			$sql = "INSERT INTO `coorientadores` (`acessos_id`, `usuarios_id`, `titulacao`, `instituicao`) VALUES ('1', '$idUser', '$this->titulacao', '$this->instituicao')"; #acesso id, é o id de quem está realizando o cadastro
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Coorientador Cadastrado com sucesso";
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