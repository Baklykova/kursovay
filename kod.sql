-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema kurs
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema kurs
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `kurs` DEFAULT CHARACTER SET utf8 ;
USE `kurs` ;

-- -----------------------------------------------------
-- Table `kurs`.`zayvitel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`zayvitel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fio` VARCHAR(100) NULL COMMENT 'фио заявителя',
  `address` VARCHAR(250) NULL COMMENT 'адресс заявителя',
  `telefon` INT NULL COMMENT 'номер телефона',
  `e-mail` VARCHAR(100) NULL COMMENT 'адресс электроной почты',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kurs`.`vid_obr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`vid_obr` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL COMMENT 'название',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'вид обращения (обращение, жалоба, ходотайство)';


-- -----------------------------------------------------
-- Table `kurs`.`obrachenie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`obrachenie` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `krat_obr` VARCHAR(250) NULL COMMENT 'краткое содержание обращения',
  `dop_sved` TEXT NULL COMMENT 'дополнительные сведенья',
  `primechanie` MEDIUMBLOB NULL COMMENT 'прикрепление необходимых документов (скриншот, пдф-файл)',
  `vid_obr_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_obrachenie_vid_obr1_idx` (`vid_obr_id` ASC),
  CONSTRAINT `fk_obrachenie_vid_obr1`
    FOREIGN KEY (`vid_obr_id`)
    REFERENCES `kurs`.`vid_obr` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'таблица обращений';


-- -----------------------------------------------------
-- Table `kurs`.`ispolnitel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`ispolnitel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fio` VARCHAR(100) NULL COMMENT 'фио исполнителя',
  `dolgnost` VARCHAR(80) NULL COMMENT 'должность исполнителя',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'таблица исполнителдей';


-- -----------------------------------------------------
-- Table `kurs`.`reg_obr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`reg_obr` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reg-num` INT NOT NULL,
  `zayvitel_id` INT NOT NULL,
  `ispolnitel_id` INT NOT NULL COMMENT 'кому направленно обращение и кто его исполнитель',
  `tema_obr` VARCHAR(100) NULL COMMENT 'тема обращения',
  `date` DATE NULL COMMENT 'дата обращения',
  `obrachenie_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reg_obr_zayvitel_idx` (`zayvitel_id` ASC),
  INDEX `fk_reg_obr_obrachenie1_idx` (`obrachenie_id` ASC),
  INDEX `fk_reg_obr_ispolnitel1_idx` (`ispolnitel_id` ASC),
  UNIQUE INDEX `reg-num_UNIQUE` (`reg-num` ASC),
  CONSTRAINT `fk_reg_obr_zayvitel`
    FOREIGN KEY (`zayvitel_id`)
    REFERENCES `kurs`.`zayvitel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reg_obr_obrachenie1`
    FOREIGN KEY (`obrachenie_id`)
    REFERENCES `kurs`.`obrachenie` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reg_obr_ispolnitel1`
    FOREIGN KEY (`ispolnitel_id`)
    REFERENCES `kurs`.`ispolnitel` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'регистрация обращений';


-- -----------------------------------------------------
-- Table `kurs`.`type_vydacha_otveta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`type_vydacha_otveta` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL COMMENT 'название типа',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = 'таблица типов выдачи ответа (устный, по почте, эл.почта...)';


-- -----------------------------------------------------
-- Table `kurs`.`ispolnenie_obr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `kurs`.`ispolnenie_obr` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reg_obr_id` INT NOT NULL,
  `date_otveta` DATE NULL COMMENT 'дата ответа на обращение',
  `rezyltat_otveta` VARCHAR(45) NULL COMMENT 'результат ответа',
  `otvet` TEXT NULL COMMENT 'текст ответа',
  `dop_otveta` MEDIUMBLOB NULL COMMENT 'дополнительные документы',
  `type_vydacha_otveta_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ispolnenie_obr_reg_obr1_idx` (`reg_obr_id` ASC),
  INDEX `fk_ispolnenie_obr_type_vydacha_otveta1_idx` (`type_vydacha_otveta_id` ASC),
  CONSTRAINT `fk_ispolnenie_obr_reg_obr1`
    FOREIGN KEY (`reg_obr_id`)
    REFERENCES `kurs`.`reg_obr` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ispolnenie_obr_type_vydacha_otveta1`
    FOREIGN KEY (`type_vydacha_otveta_id`)
    REFERENCES `kurs`.`type_vydacha_otveta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'таблица исполнения обращения';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
