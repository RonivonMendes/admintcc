<?php
	session_start();
	require_once 'conexao.php';

	Class CadastroTcc
	{
		$idAluno, $idIntegrante, $titulo, $grupoPesquisa, $aceite

		function __construct($idAluno, $idIntegrante, $titulo, $grupoPesquisa)
		{
			$this->idAluno=$idAluno;
			$this->idIntegrante=$idIntegrante;
			$this->titulo=$titulo;
			$this->grupoPesquisa=$grupoPesquisa;
		}

		#professor vai cadastrar um novo projeto, o resumo e o aceite são preenchidos pelo aluno.
		function NovoProjeto (CadastroTcc $novo)
		{
			$conexao = Database::conexao();

				$sql = "INSERT INTO `cadastrosTcc` (`acesso_id`, `alunos_id`, `integrantes_id`, `titulo`, `grupoPesquisa`, `aceite`, `telefone`) VALUES ('$idAcesso', '$idEndereco', '$this->nome', '$this->cpf', '$this->rg', '$this->orgaoexpedidor','$this->telefone')";
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