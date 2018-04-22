<?php	
	require_once 'conexao.php';

	class Curso
	{
		private $tipo, $nome, $status;

		function __construct($tipo, $nome, $status)
		{
			$this->tipo = $tipo;
			$this->nome = $nome;
			$this->status= $status;
		}

		function cadastra(Curso $curso)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('$this->tipo', '$this->nome', '$this->status')";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Curso cadastrado com sucesso!<br>";

			if ($temp->rowCount()>0)
			{
				$ultimoId = $conexao->lastInsertId();

				return $ultimoId;
			}
		}

		#consultar todos
		function buscar()
		{
			$conexao = Database::conexao();

			$sql = "SELECT cursos.nome, tiposCursos.tipo FROM cursos JOIN tiposCursos ON cursos.idTipo = tiposCursos.id;";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			return $res;
			#rodar consulta
			//foreach ($res as $dados)
			/*{
				echo $dados['id']."<br>";
				echo $dados['nome']."<br>";
				echo $dados['status']."<br>";
			}*/
		}

		#consultar por nome
		function buscarCurso($curso)
		{
			$conexao = Database::conexao();

			$sql = "SELECT * FROM `cursos` WHERE `nome` LIKE '%$curso%'";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			#rodar consulta
			foreach ($res as $dados)
			{
				echo $dados['id']."<br>";
				echo $dados['nome']."<br>";
				echo $dados['status']."<br>";
			}
		}

		function atualiza($id, Curso $curso)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cursos` SET `idTipo`='$this->tipo', `nome`='$this->nome' WHERE id='$id'";
			$temp = $conexao->prepare($sql);
			$result =$temp->execute();

			if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}
			echo $temp->rowCount(). "Curso atualizado com suceso!";
		}

		function alteraStatus(Curso $curso, $id)
		{
			$sql = "UPDATE `cursos` SET `status`='$this->status' WHERE id='$id'";

		}
	}
?>
