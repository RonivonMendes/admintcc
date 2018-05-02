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

			$sql = "INSERT INTO `cadastrostcc` (`acessos_id`, `alunos_id`, `integrantes_id`, `titulo`, `grupoPesquisa`, `resumo`) VALUES ('1', '$this->idAluno', '$this->idIntegrante', '$this->titulo', '$this->grupoPesquisa', '$this->resumo');";
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

		function buscar($cons=false)
		{
			$conexao = Database::conexao();

			if($cons==false)
			{
				$sql = "SELECT cadastrostcc.*, usuarios.nome, cursos.nome AS curso FROM cadastrostcc JOIN alunos JOIN usuarios JOIN cursos ON cadastrostcc.alunos_id = alunos.id AND alunos.idUsuario = usuarios.id AND alunos.idCurso = cursos.id;";
			}
			else
				$sql = "SELECT cadastrostcc.*, usuarios.nome, cursos.nome AS curso FROM cadastrostcc JOIN alunos JOIN usuarios JOIN cursos ON cadastrostcc.alunos_id = alunos.id AND alunos.idUsuario = usuarios.id AND alunos.idCurso = cursos.id WHERE cadastrostcc.alunos_id=".$cons.";";
			
			$temp = $conexao->prepare($sql);
			$temp->execute();
			$res = $temp->fetchAll();

			if($temp->rowCount()<1)
				return "0";

			else
				return $res;
		}


		#aluno completa o resumo e aceita o projeto
		function aceitar($id, $aceite, $resumo)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cadastrostcc` SET `aceite`='$aceite',`resumo`='$resumo' WHERE id = $id;";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if ($temp->rowCount()>0)
				return "Termo Aceite Preenchido com sucesso!";
				
			else
				return "Falha ao aceitar Projeto!";
		}

		#Professor aprova o resumo do projeto
		function aprovar($id, $aprovacao)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cadastrostcc` SET `aprovacaoOrientador`='$aprovacao' WHERE id = $id;";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if ($temp->rowCount()>0)
				return "Projeto Aprovado com sucesso!";
				
			else
				return "Falha ao Aprovar Projeto!";
		}

		#Professor aprova o resumo do projeto
		function autorizar($id, $autorizacao)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cadastrostcc` SET `aprovacaoOrientador`='$autorizacao' WHERE id = $id;";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if ($temp->rowCount()>0)
				return "Projeto Autorizado com sucesso!";
				
			else
				return "Projeto Negado!";
		}

		function atualizar($id, CadastroTcc $atualizar)
		{
			$conexao = Database::conexao();

			$sql = "UPDATE `cadastrostcc` SET `acessos_id`='1',`alunos_id`='$this->idAluno',`integrantes_id`='1',`titulo`='$this->titulo',`grupoPesquisa`='$this->grupoPesquisa' WHERE id = $id;";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			if ($temp->rowCount()>0)
				return "Projeto atualizado com sucesso!";
				
			else
				return "Falha ao atualizar Projeto!";
		}


	}#Fim da classe CadastroTcc

	Class AtividadeTcc
	{
		private $idTcc, $atividade, $cargaHoraria, $dataExecucao, $aceite;

		function __construct($idTcc, $atividade, $cargaHoraria, $dataExecucao, $aceite=0)
		{
			$this->idTcc = $idTcc;
			$this->atividade = $atividade;
			$this->cargaHoraria = $cargaHoraria;
			$this->dataExecucao = $dataExecucao;
			$this->aceite = $aceite;
		}


		function lancar($acesso, $idTcc, $atividade, $cargaHoraria, $dataExecucao, $aceite)
		{
			$conexao = Database::conexao();

			$sql = "INSERT INTO `AtividadesTcc` (`acessos_id`, `cadastrostcc_id`, `atividade`, `cargaHoraria`, `dataExecucao`, `aceite`) VALUES ('$acesso', '$idTcc', '$atividade', '$cargaHoraria', '$dataExecucao', '$aceite');";
			$temp = $conexao->prepare($sql);
			$result = $temp->execute();

			/*if(!$result)
			{
				var_dump($temp->errorInfo());
				exit();
			}*/
			#echo $temp->rowCount(). "Projeto cadastrado<br>";

			if ($temp->rowCount()>0)
				return "Atividade Lançada com sucesso!";
				
			else
				return "Falha ao lançar atividade!";
		}

	}#Fim da classe AtividadesTcc

	#Associar e manipular dados de um Coorientador Externo
	Class CoorientadorTcc
	{

	}#Fim da Classe CoorientadorTcc

?>