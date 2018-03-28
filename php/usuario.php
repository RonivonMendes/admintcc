<?php	
	require_once './conexao.php';

	class Usuario
	{
		private $nome, $cpf, $rg, $orgaoexpedidor, $telefone, $email, $senha;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone, $email, $senha)
		{
			$this->nome = $nome;
			$this->cpf = $cpf;
			$this->rg = $rg;
			$this->orgaoexpedidor = $orgaoexpedidor;
			$this->telefone=$telefone;
			$this->email = $email;
			$this->senha = $senha;
		}

		function cadastra(Usuario $user, Endereco $endereco)
		{
			#cadastrando o endereço e pegando o ultimo id para associar ao cadastro de usuario
			$idEndereco = $endereco->Cadastra($endereco);

			echo "<br> ID Enderço aqui:".$idEndereco;
			echo "<br>Telefone:". $this->telefone;
			echo "<br>";

			$conexao = Database::conexao();

			$sql = "INSERT INTO usuarios (nome, cpf, rg, orgao_expeditor, telefone, acessos_id, enderecos_id) VALUES ('$this->nome', '$this->cpf', '$this->rg', '$this->orgaoexpedidor','$this->telefone', '2', '$idEndereco')";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Linhas inseridas";
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