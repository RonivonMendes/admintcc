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
CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`perfis` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL COMMENT 'Tipos:\n1- Admin \n2- Supervisor TCC\n3- Orientador\n4- Coorientador\n5-Aluno',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`acessos`
-- -----------------------------------------------------
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
CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`integrantes` (
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
-- Table `ronivonm_tccdata`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL COMMENT 'Ex:\nTécnicos\nGraduação\nEspecialização\nMestrado\nIdiomas',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ronivonm_tccdata`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idTipo` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `status` TINYINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fktipos_idx` (`idTipo` ASC),
  CONSTRAINT `fktipos`
    FOREIGN KEY (`idTipo`)
    REFERENCES `ronivonm_tccdata`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ronivonm_tccdata`.`alunos`
-- -----------------------------------------------------
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


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
