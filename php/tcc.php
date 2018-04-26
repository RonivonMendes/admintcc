<?php
	session_start();
	require_once 'conexao.php';

	Class CadastroTcc
	{
		private $idAluno, $idIntegrante, $titulo, $grupoPesquisa, $aceite, $resumo;

		function __construct($idAluno, $idIntegrante, $titulo, $grupoPesquisa, $resumo)
		{
			$this->idAluno=$idAluno;
			$this->idIntegrante=$idIntegrante;
			$this->titulo=$titulo;
			$this->grupoPesquisa=$grupoPesquisa;
			$this->resumo=$resumo;
		}

		#professor vai cadastrar um novo projeto, o resumo e o aceite são preenchidos pelo aluno.
		function cadastrar(CadastroTcc $novo)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `cadastrosTcc` (`acessos_id`, `alunos_id`, `integrantes_id`, `titulo`, `grupoPesquisa`, `resumo`) VALUES ('1', '$this->idAluno', '$this->idIntegrante', '$this->titulo', '$this->grupoPesquisa', '$this->resumo');";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			/*if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}*/
			#echo $temp->rowCount(). "Projeto cadastrado<br>";

			if ($temp->rowCount()>0)
				return "Projeto cadastrado com sucesso!";
				
			else
				return "Falha ao cadastrar Projeto!";
		}

		function buscar()
		{
			$conexao = Database::conexao();

			$sql = "SELECT *FROM cadastroTcc;";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			return $res;
		}

		function buscarCadastroTcc($idAluno)
		{
			$conexao = Database::conexao();

			$sql = "SELECT *FROM cadastroTcc WHERE idAluno=$idAluno;";
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			return $res;
		}

		function atualizar($id, CadastroTcc $atualizar)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cadastrosTcc` SET `acessos_id`='1',`alunos_id`='$this->idAluno',`integrantes_id`='1',`titulo`='$this->titulo',`grupoPesquisa`='$this->grupoPesquisa' WHERE id = $id;";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			/*if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}*/
			#echo $temp->rowCount(). "Projeto cadastrado<br>";

			if ($temp->rowCount()>0)
				return "Projeto atualizado com sucesso!";
				
			else
				return "Falha ao atualizar Projeto!";
		}


	}#Fim da classe CadastroTcc

	Class ProjetoTcc 
	{

	}#Fim da classe ProjetoTcc

	Class AtividadeTcc
	{

	}#Fim da classe AtividadesTcc

	#Associar e manipular dados de um Coorientador Externo
	Class CoorientadorTcc
	{

	}#Fim da Classe CoorientadorTcc

?>