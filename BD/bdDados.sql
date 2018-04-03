-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema TCCData
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `TCCData` ;

-- -----------------------------------------------------
-- Schema TCCData
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `TCCData` DEFAULT CHARACTER SET utf8 ;
USE `TCCData` ;

-- -----------------------------------------------------
-- Table `TCCData`.`perfis`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`perfis` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`perfis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL COMMENT 'Tipos:\n1- Admin \n2- Supervisor TCC\n3- Orientador\n4- Coorientador\n5-Aluno',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`acessos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`acessos` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`acessos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idPerfis` INT NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_acessos_perfis1_idx` (`idPerfis` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_acessos_perfis1`
    FOREIGN KEY (`idPerfis`)
    REFERENCES `TCCData`.`perfis` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`enderecos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`enderecos` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`enderecos` (
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
-- Table `TCCData`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`usuarios` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`usuarios` (
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
    REFERENCES `TCCData`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_enderecos1`
    FOREIGN KEY (`idEndereco`)
    REFERENCES `TCCData`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`integrantes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`integrantes` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`integrantes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `acessos_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  `instituicao` VARCHAR(60) NOT NULL,
  `titulacao` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_orientadores_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_orientadores_acessos1_idx` (`acessos_id` ASC),
  CONSTRAINT `fk_usuario_orientadores_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `TCCData`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orientadores_acessos1`
    FOREIGN KEY (`acessos_id`)
    REFERENCES `TCCData`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`tipos` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL COMMENT 'Ex:\nTécnicos\nGraduação\nEspecialização\nMestrado\nIdiomas',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`cursos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`cursos` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idTipo` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fktipos_idx` (`idTipo` ASC),
  CONSTRAINT `fktipos`
    FOREIGN KEY (`idTipo`)
    REFERENCES `TCCData`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `TCCData`.`alunos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `TCCData`.`alunos` ;

CREATE TABLE IF NOT EXISTS `TCCData`.`alunos` (
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
    REFERENCES `TCCData`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orientandos_acessos1`
    FOREIGN KEY (`idAcesso`)
    REFERENCES `TCCData`.`acessos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkCursos`
    FOREIGN KEY (`idCurso`)
    REFERENCES `TCCData`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;