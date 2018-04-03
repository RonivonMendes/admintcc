<?php	
	require_once './conexao.php';

	class Acesso
	{
		private $nivelUsuario, $email, $senha;

		function __construct($nivelUsuario, $email, $senha)
		{
			$this->nivelUsuario = $nivelUsuario;
			$this->email = $email;
			$this->senha = sha1($senha);
		}

		function cadastra(Acesso $acesso)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `acessos` (`perfis_id`, `email`, `senha`) VALUES ('$this->nivelUsuario', '$this->email', '$this->senha')";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Acesso cadastrado com sucesso<br>";

			if ($temp->rowCount()>0)
			{
				$ultimoId = $conexao->lastInsertId();

				return $ultimoId;
			}
		}

		function atualiza($id, Acesso $acesso)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `acessos` SET `perfis_id`='$this->nivelUsuario', `email`='$this->email', `senha`='$this->senha' WHERE id='$id'";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Linhas inseridas / ATUALIZADO COM SUCESSO";

		}

	}
?>
