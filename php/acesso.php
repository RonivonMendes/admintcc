<?php	
	require_once 'conexao.php';

	class Acesso
	{
		private $perfilUsuario, $email, $senha, $status;

		function __construct($perfilUsuario, $email, $senha, $status)
		{
			$this->perfilUsuario = $perfilUsuario;
			$this->email = $email;
			$this->senha = sha1($senha);
			$this->status = $status;
		}

		function cadastra(Acesso $acesso)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `acessos` (`idPerfis`, `email`, `senha`, `status`) VALUES ('$this->perfilUsuario', '$this->email', '$this->senha', '$this->status')";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			#echo $temp->rowCount(). "Acesso cadastrado com sucesso<br>";

			if ($temp->rowCount()>0)
			{
				$ultimoId = $conexao->lastInsertId();

				return $ultimoId;
			}
			else
				return "false";
		}

		function atualiza($id, Acesso $acesso)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `acessos` SET `perfis_id`='$this->perfilUsuario', `email`='$this->email', `senha`='$this->senha' WHERE id='$id'";
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
