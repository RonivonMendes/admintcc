<?php
	
	require_once './conexao.php';

	class Endereco
	{
		private $estado, $cidade, $bairro, $rua, $numero, $cep;

		function __construct($estado, $cidade, $bairro, $rua, $numero, $cep)
		{
			$this->estado = $estado;
			$this->cidade = $cidade;
			$this->bairro = $bairro;
			$this->rua = $rua;
			$this->numero = $numero;
			$this->cep = $cep;
		}

		function cadastra(Endereco $endereco)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `enderecos` (`estado`, `cidade`, `bairro`, `cep`, `numero`) VALUES ('$this->estado', '$this->cidade','$this->bairro', '$this->cep', '$this->numero')";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Linhas inseridas";

			if ($temp->rowCount()>0)
			{
				$ultimoId = $conexao->lastInsertId();

				return $ultimoId;
			}
		}


		function atualiza($id, Endereco $endereco)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `enderecos` SET `cidade`='$this->cidade', `estado`='$this->estado', `cep`='$this->cep' WHERE id='$id'";
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
