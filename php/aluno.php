<?php	
	require_once 'conexao.php';
	require_once 'usuario.php';

	class Aluno extends Usuario
	{
		private $ra, $curso;

		function __construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone, $ra, $curso)
		{
			parent::__construct($nome, $cpf, $rg, $orgaoexpedidor, $telefone);
			$this->ra = $ra;
			$this->curso = $curso;
		}

		function cadastra(Usuario $user, Endereco $endereco, Acesso $acesso)
		{
			#cadastrando acesso e pegando id
			$idUser = parent::cadastra($user, $endereco, $acesso);

			//echo "<br>Id usuario cadastrado".$idUser."<br>";

			if($idUser!="false")
			{
				$conexao = Database::conexao();

				#idAcesso é quem está realizando o cadastro no sistema!
				#idCurso é o id do curso selecionado!
				$sql = "INSERT INTO `alunos` (`idUsuario`, `idAcesso`, `idCurso`, `ra`) VALUES ('$idUser', '1', '1', '$this->ra')";
				$temp = $conexao->prepare($sql);
				$result = $temp->execute();
				if(!$result)
				{
					var_dump($temp->errorInfo());
					exit();
				}
				#echo $temp->rowCount(). "Aluno Cadastrado com sucesso";
				if($temp->rowCount()>0)
				{
					return "Aluno cadastrado com sucesso!";
				}
				else
					return "Erro ao cadastrar aluno!";

			}

		}

		function atualiza($idAluno, $idUser, Aluno $aluno, $idend, Endereco $endereco)
		{
			#atualizando dados de usuario e endereço
			$user->atualiza($idUser, $aluno);
			$endereco->atualiza($idend, $endereco);

			$conexao = Database::conexao();

			$sql = "UPDATE `alunos` SET `idCurso`='$this->curso', `ra`='$this->ra' WHERE id='$idAluno'";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Aluno atualizando com sucesso!";
		}

		function buscarAluno($cpf)
		{
			#buscando o id de Usuario primeiro referente ao cpf para buscar o aluno
			$consulta = parent::buscarUsuario($aluno);

			#se encontrar o usuario com cpf passado, então vamos consultar o aluno associado a ele:
			if ($consulta!=0)
			{
				$conexao = Database::conexao();

				$sql = "SELECT *FROM `alunos`";
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