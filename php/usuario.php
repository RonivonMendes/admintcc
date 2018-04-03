<?php	
	require_once './conexao.php';

	class Usuario
	{
		private $nome, $cpf, $rg, $orgaoexpedidor, $telefone, $email, $senha;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone)
		{
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->orgaoexpedidor = $orgaoexpedidor;
			$this->telefone=$telefone;
		}

		function cadastra(Usuario $user, Endereco $endereco, Acesso $acesso)
		{
			#cadastrando acesso e pegando id
			$idAcesso = $acesso->Cadastra($acesso);

			#cadastrando o endereço e pegando o ultimo id para associar ao cadastro de usuario
			$idEndereco = $endereco->Cadastra($endereco);

			$conexao = Database::conexao();

			$sql = "INSERT INTO usuarios (nome, cpf, rg, orgao_expeditor, telefone, acessos_id, enderecos_id) VALUES ('$this->nome', '$this->cpf', '$this->rg', '$this->orgaoexpedidor','$this->telefone', '1', '$idEndereco')";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}

			echo $temp->rowCount(). "Usuario cadastrado com sucesso<br>";

			if ($temp->rowCount()>0)
			{
				$ultimoId = $conexao->lastInsertId();

				return $ultimoId;
			}
		}

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
		}

	}

?>