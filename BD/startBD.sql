INSERT INTO `perfis` (`nome`) VALUES ('Administrador');
INSERT INTO `perfis` (`nome`) VALUES ('Supervisor TCC');
INSERT INTO `perfis` (`nome`) VALUES ('Orientador');
INSERT INTO `perfis` (`nome`) VALUES ('Coorientador');
INSERT INTO `perfis` (`nome`) VALUES ('Aluno');

INSERT INTO `tiposCursos` (`tipo`) VALUES ('Graduação');
INSERT INTO `tiposCursos` (`tipo`) VALUES ('Pós-Graduação');
INSERT INTO `tiposCursos` (`tipo`) VALUES ('Técnico Concomitante');
INSERT INTO `tiposCursos` (`tipo`) VALUES ('Técnico Integrado');

INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('1', 'Análise e Desenvolvimento de Sistemas', '1');
INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('1', 'Ciência da Computação', '1');
INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('1', 'Processos Químicos', '1');
INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('1', 'Tecnologia em Alimentos', '1');

INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('2', 'Ciências Ambientais', '1');
INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('2', 'Higiene e Segurança Alimentar', '1');
INSERT INTO `cursos` (`idTipo`, `nome`, `status`) VALUES ('2', 'Novas Tecnologias Aplicadas à Educação', '1');

INSERT INTO `acessos` (`idPerfis`, `email`, `senha`, `status`) VALUES ('1', 'admin@master.com.br', '3decd49a6c6dce88c16a85b9a8e42b51aa36f1e2', '1');
INSERT INTO `enderecos` (`estado`, `cidade`, `bairro`, `rua`, `numero`, `cep`) VALUES ('Minas gerais', 'Ituiutaba', 'Novo Tempo 2', 'Rua Belarmino Vilela Junqueira', 'S/Nº', '38305200');
INSERT INTO `usuarios` (`idAcesso`, `idEndereco`, `nome`, `cpf`, `rg`, `orgao_expeditor`, `telefone`) VALUES ('1', '1', 'Administrador Master', '11111111111', 'MG123.123.12', 'PC/MG', '3432714000');
INSERT INTO `integrantes` (`acessos_id`, `usuarios_id`, `instituicao`, `titulacao`) VALUES ('1', '1', 'Instituto Federal de Educação, Ciência e Tecnologia do Triângulo Mineiro', 'Doutor TI');

INSERT INTO `acessos` (`idPerfis`, `email`, `senha`, `status`) VALUES ('5', 'aluno1@mail.com', '3decd49a6c6dce88c16a85b9a8e42b51aa36f1e2', '1');
INSERT INTO `enderecos` (`estado`, `cidade`, `bairro`, `rua`, `numero`, `cep`) VALUES ('Minas gerais', 'Ituiutaba', 'Centro', 'Rua 22', '123', '38300000');
INSERT INTO `usuarios` (`idAcesso`, `idEndereco`, `nome`, `cpf`, `rg`, `orgao_expeditor`, `telefone`) VALUES ('2', '2', 'aluno1', '11111111111', 'MG123.123.12', 'PC/MG', '34999998888');
INSERT INTO `alunos` (`idUsuario`, `idAcesso`, `idCurso`, `ra`) VALUES ('2', '2', '1', '162767656721');

