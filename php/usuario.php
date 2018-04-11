<?php	
	require_once 'conexao.php';
	require_once 'endereco.php';

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

			if ($idAcesso!="false"&&$idEndereco!="false") 
			{
				$conexao = Database::conexao();

				$sql = "INSERT INTO `usuarios` (`idAcesso`, `idEndereco`, `nome`, `cpf`, `rg`, `orgao_expeditor`, `telefone`) VALUES ('$idAcesso', '$idEndereco', '$this->nome', '$this->cpf', '$this->rg', '$this->orgaoexpedidor','$this->telefone')";
				$temp = $conexao->prepare($sql);
				$result = $temp->execute();

				if(!$result)
				{
					var_dump($temp->errorInfo());
					exit();
				}

				#echo $temp->rowCount(). "Usuario cadastrado com sucesso<br>";

				if ($temp->rowCount()>0)
				{
					$ultimoId = $conexao->lastInsertId();

					return $ultimoId;
				}
			}

			else
				return "false";

			
		}

		function atualiza($iduser, Usuario $user)
		{
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

		#buscar todos
		function buscar()
		{
			$conexao = Database::conexao();

			$sql = "SELECT *FROM usuarios";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			#rodar consulta
			foreach ($res as $dados)
			{
				echo $dados['id']."<br>";
				echo $dados['nome']."<br>";
				echo $dados['cpf']."<br>";
				echo $dados['rg']."<br>";
				echo $dados['orgao_expeditor']."<br>";
				echo $dados['telefone']."<br>";
			}
			return $res;
		}

		#buscarEspecifico
		function buscarUsuario($cpf)
		{
			$conexao = Database::conexao();

			$sql = "SELECT *FROM `usuarios` WHERE `cpf` LIKE '%cpf%'";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			#rodar consulta
			foreach ($res as $dados)
			{
				echo $dados['id']."<br>";
				echo $dados['idAcesso']."<br>";
				echo $dados['idEndereco']."<br>";
				echo $dados['nome']."<br>";
				echo $dados['cpf']."<br>";
				echo $dados['rg']."<br>";
				echo $dados['orgao_expeditor']."<br>";
				echo $dados['telefone']."<br>";
			}
			if(isset($res))
				return $res;
			else
				return 0;
		}


	}

?>