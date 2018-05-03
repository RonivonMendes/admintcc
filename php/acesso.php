<?php	
	session_start();
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

		function logar($email, $senha)
		{
			$conexao = Database::conexao();

			$senha = sha1($senha);

			$sql = "SELECT *FROM `acessos` WHERE `email`='$email' AND `senha`='$senha' AND `status`='1'";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();
		

			if ($temp->rowCount()==1)
			{
				echo "<sc>VOCÊ ESTÁ LOGADO";
				#se encontrar um úsuario, verificar status, conferir tipo de perfil, para consultar e associar os dados na seção:
				$_SESSION['logado']=1;
				$_SESSION['idAcesso']= $res[0]['id'];
				$_SESSION['email']= $res[0]['email'];

				#selecionar o tipo de perfil
				$sql = "SELECT *FROM `perfis` WHERE `id`='".$res[0]['idPerfis']."'";
				$temp5 = $conexao->prepare($sql);
				$temp5->execute();
				$tpPerfil = $temp5->fetchAll();

				$_SESSION['tipoPerfil']=$res[0]['idPerfis'];

				#buscar dados basicos do objeto úsuario
				$sql = "SELECT *FROM `usuarios` WHERE `idAcesso`='".$res[0]['id']."'";
				$temp2 = $conexao->prepare($sql);
				$temp2->execute();
				$dados = $temp2->fetchAll();

				if ($temp2->rowCount()==1)
				{
					$_SESSION['idUsuario']= $dados[0]['id'];
					$_SESSION['idEndereco']=$dados[0]['idEndereco'];
					$_SESSION['nomeUser']=$dados[0]['nome'];
				}

				#se aluno, buscar os dados complementares do aluno
				if($res[0]['idPerfis']==5)
				{
					$sql = "SELECT *FROM `alunos` WHERE `idUsuario`='".$dados[0]['id']."'";
					#$sql = "SELECT alunos.*, cursos.nome FROM `alunos` JOIN `cursos` ON alunos.idCurso=cursos.id WHERE alunos.id='1';";
					$temp3 = $conexao->prepare($sql);
					$temp3->execute();
					$resalunos = $temp3->fetchAll();

					if ($temp3->rowCount()==1)
					{
						$_SESSION['ra']=$resalunos[0]['ra'];
						$_SESSION['idAluno'] = $resalunos[0]['id'];
						#$_SESSION['cursoAluno'] = $resalunos[0]['nome'];
					}


					$sqla = "SELECT *FROM `cursos` WHERE id = '".$resalunos[0]['idCurso']."';";
					$ret = $conexao->prepare($sqla);
					$ret->execute();
					$curso = $ret->fetchAll();

					if($ret->rowCount()==1)
					{
						$_SESSION['curso']=$cursos[0]['nome'];
					}




				}

				else
				{
					$sql = "SELECT `id`, `instituicao`, `titulacao` FROM `integrantes` WHERE `usuarios_id`='".$dados[0]['id']."'";
					$temp3 = $conexao->prepare($sql);
					$temp3->execute();
					$resintegrantes = $temp3->fetchAll();

					if ($temp3->rowCount()==1)
					{
						$_SESSION['idIntegrante']=$resintegrantes[0]['id'];
						$_SESSION['instituicao'] = $resintegrantes[0]['instituicao'];
						$_SESSION['titulacao'] = $resintegrantes[0]['titulacao'];
					}
				}

				echo "<script>location.href='index.php';</script>";
				//header('location: cadastrarUsuario.php');

				#se não é aluno, buscar na tabela integrantes
			}

			else
				echo "VOCÊ NÃO LOGOU";
		}

	}
?>
