<?php	
	require_once 'conexao.php';

	class Integrante extends Usuario
	{
		private $titulacao, $instituicao;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone, $titulacao, $instituicao)
		{
			parent::__construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone);
			$this->titulacao = $titulacao;
			$this->instituicao=$instituicao;
		}

		function cadastra(Integrante $user, Endereco $endereco, Acesso $acesso)
		{
			#cadastrando acesso e pegando id
			$idUser = parent::cadastra($user, $endereco, $acesso);

			echo "<br>Id usuario cadastrado".$idUser."<br>";

			$conexao = Database::conexao();

			$sql = "INSERT INTO `integrantes`(`acessos_id`, `usuarios_id`, `instituicao`, `titulacao`) VALUES ('1','$idUser', '$this->instituicao', '$this->titulacao')"; #acesso id, é o id de quem está realizando o cadastro
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Cadastrado com sucesso";
		}
		
		function atualiza($idIntegrante, Integrante $user, $idend, Endereco $endereco)
		{
			#atualizando o endereço e o usuario
			$endereco->atualiza($idend, $endereco);
			$user->atualiza($this->iduser, $user);

			$conexao = Database::conexao();

			$sql = "UPDATE `integrantes` SET `instituicao`='$this->instituicao', `titulacao`='$this->titulacao' WHERE id='$idIntegrante'";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Linhas inseridas / ATUALIZADO COM SUCESSO";
		}

		function buscarIntegrante($cpf)
		{
			#buscando o id de Usuario primeiro referente ao cpf para buscar o aluno
			$consulta = parent::buscarUsuario($cpf);

			#se encontrar o usuario com cpf passado, então vamos consultar o aluno associado a ele:
			if ($consulta!=0)
			{
				$conexao = Database::conexao();

				//$sql = "SELECT *FROM `alunos` WHERE `idUsuario`='$consulta['id']'";
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
				return $res;
			}

			#se não encomtrar nada retorna 0
			else
				return 0;
		}


	}
?>