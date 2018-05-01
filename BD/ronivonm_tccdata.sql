-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ronivonm_tccdata
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ronivonm_tccdata
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ronivonm_tccdata` DEFAULT CHARACTER SET utf8 ;
USE `ronivonm_tccdata` ;

-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`perfis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`perfis` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`perfis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL COMMENT 'Tipos:\n1- Admin \n2- Supervisor TCC\n3- Orientador\n4- Coorientador\n5-Aluno',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`acessos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`acessos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`acessos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idPerfis` INT NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acessos_perfis1_idx` (`idPerfis` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_acessos_perfis1`
    FOREIGN KEY (`idPerfis`)
    REFERENCES `ronivonm_tccdata`.`perfis` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`enderecos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`enderecos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`enderecos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idAcesso` INT NOT NULL,
  `idEndereco` INT NOT NULL,
  `nome` VARCHAR(250) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` VARCHAR(20) NOT NULL,
  `orgao_expeditor` VARCHAR(10) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_acessos1_idx` (`idAcesso` ASC),
  INDEX `fk_usuarios_enderecos1_idx` (`idEndereco` ASC),
  CONSTRAINT `fk_usuarios_acessos1`
    FOREIGN KEY (`idAcesso`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_enderecos1`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `ronivonm_tccdata`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`integrantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`integrantes` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`integrantes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acessos_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  `instituicao` VARCHAR(200) NOT NULL,
  `titulacao` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_orientadores_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_orientadores_acessos1_idx` (`acessos_id` ASC),
  CONSTRAINT `fk_usuario_orientadores_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `ronivonm_tccdata`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orientadores_acessos1`
    FOREIGN KEY (`acessos_id`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`tiposCursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`tiposCursos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`tiposCursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL COMMENT 'Ex:\nTécnicos\nGraduação\nEspecialização\nMestrado\nIdiomas',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`cursos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idTipo` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fktipos_idx` (`idTipo` ASC),
  CONSTRAINT `fktipos`
    FOREIGN KEY (`idTipo`)
    REFERENCES `ronivonm_tccdata`.`tiposCursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`alunos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`alunos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`alunos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idUsuario` INT NOT NULL,
  `idAcesso` INT NOT NULL,
  `idCurso` INT NOT NULL,
  `ra` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_orientandos_usuarios1_idx` (`idUsuario` ASC),
  INDEX `fk_orientandos_acessos1_idx` (`idAcesso` ASC),
  INDEX `fkCursos_idx` (`idCurso` ASC),
  CONSTRAINT `fk_orientandos_usuarios1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `ronivonm_tccdata`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orientandos_acessos1`
    FOREIGN KEY (`idAcesso`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkCursos`
    FOREIGN KEY (`idCurso`)
    REFERENCES `ronivonm_tccdata`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`cadastrostcc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`cadastrostcc` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`cadastrostcc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acessos_id` INT NOT NULL,
  `alunos_id` INT NOT NULL,
  `integrantes_id` INT NOT NULL,
  `coorientador_id` INT NULL,
  `titulo` VARCHAR(200) NOT NULL,
  `grupoPesquisa` VARCHAR(200) NOT NULL,
  `resumo` TEXT NULL,
  `aceite` TINYINT NOT NULL DEFAULT 0,
  `aceitedata` DATETIME NULL,
  `aprovacaoOrientador` TINYINT NOT NULL DEFAULT 0 COMMENT '0 - pendente ou reprovado\n1 - aprovado',
  `dataApOrientador` DATETIME NULL,
  `aprovacaoSuper` TINYINT NOT NULL DEFAULT 0 COMMENT '0 - pendente ou reprovado\n1 - aprovado',
  `dataApSuper` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cadastroTcc_acessos1_idx` (`acessos_id` ASC),
  INDEX `fk_cadastroTcc_integrantes1_idx` (`integrantes_id` ASC),
  INDEX `fk_cadastroTcc_alunos_idx` (`alunos_id` ASC),
  INDEX `fk_cadastroTcc_integrantes2_idx` (`coorientador_id` ASC),
  CONSTRAINT `fk_cadastroTcc_acessos1`
    FOREIGN KEY (`acessos_id`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastroTcc_integrantes1`
    FOREIGN KEY (`integrantes_id`)
    REFERENCES `ronivonm_tccdata`.`integrantes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastroTcc_alunos`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `ronivonm_tccdata`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cadastroTcc_integrantes2`
    FOREIGN KEY (`coorientador_id`)
    REFERENCES `ronivonm_tccdata`.`integrantes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`resumos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`resumos` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`resumos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acessos_id` INT NOT NULL,
  `alunos_id` INT NOT NULL,
  `integrantes_id` INT NOT NULL,
  `resumo` TEXT NOT NULL,
  `aceite` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_resumos_acessos1_idx` (`acessos_id` ASC),
  INDEX `fk_resumos_alunos1_idx` (`alunos_id` ASC),
  INDEX `fk_resumos_integrantes1_idx` (`integrantes_id` ASC),
  CONSTRAINT `fk_resumos_acessos1`
    FOREIGN KEY (`acessos_id`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resumos_alunos1`
    FOREIGN KEY (`alunos_id`)
    REFERENCES `ronivonm_tccdata`.`alunos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_resumos_integrantes1`
    FOREIGN KEY (`integrantes_id`)
    REFERENCES `ronivonm_tccdata`.`integrantes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`atividadesTcc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ronivonm_tccdata`.`atividadesTcc` ;

CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`atividadesTcc` (
  `atividades` INT NOT NULL AUTO_INCREMENT,
  `acessos_id` INT NOT NULL,
  `cadastrostcc_id` INT NOT NULL,
  `atividade` MEDIUMTEXT NOT NULL,
  `cargaHoraria` TIME NOT NULL,
  `dataCadastro` DATETIME NOT NULL,
  `aceite` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`atividades`),
  INDEX `fk_atividades_acessos1_idx` (`acessos_id` ASC),
  INDEX `fk_atividadesTcc_cadastrostcc1_idx` (`cadastrostcc_id` ASC),
  CONSTRAINT `fk_atividades_acessos1`
    FOREIGN KEY (`acessos_id`)
    REFERENCES `ronivonm_tccdata`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_atividadesTcc_cadastrostcc1`
    FOREIGN KEY (`cadastrostcc_id`)
    REFERENCES `ronivonm_tccdata`.`cadastrostcc` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
