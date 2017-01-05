-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Pharmatie Projet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Pharmatie Projet
-- ----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Pharmacies_Projet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Pharmacies_Projet` ;

-- -----------------------------------------------------
-- Table `Pharmatie Projet`.`pharmatie_enLigne`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pharmacies_Projet`.`pharmatie_enLigne` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom_pharmaLign` VARCHAR(255) NULL,
  `tel1` VARCHAR(45) NULL,
  `tel2` VARCHAR(45) NULL,
  `email1` VARCHAR(255) NULL,
  `email2` VARCHAR(255) NULL,
  `Nom_diri` VARCHAR(255) NULL,
  `tel1_dir` VARCHAR(45) NULL,
  `tel2_dir` VARCHAR(45) NULL,
  `email1_dir` VARCHAR(255) NULL,
  `email2_dir` VARCHAR(255) NULL,
  `Latitude` DOUBLE NULL,
  `Longitude` DOUBLE NULL,
  `DeGarde` VARCHAR(45) NULL,
  `BoolSupp` TINYINT(1) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pharmatie Projet`.`ContactLign`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pharmacies_Projet`.`ContactLign` (
  `id_ContactLign` INT NOT NULL AUTO_INCREMENT,
  `nom_contactLign` VARCHAR(150) NULL,
  `prenom_contLign` VARCHAR(150) NULL,
  `Login` VARCHAR(45) NULL,
  `passWord` VARCHAR(255) NULL,
  `id_pharmatie` INT NOT NULL,
  PRIMARY KEY (`id_ContactLign`, `id_pharmatie`),
  UNIQUE INDEX `id_ContactLign_UNIQUE` (`id_ContactLign` ASC),
  INDEX `fk_ContactLign_pharmatie_enLigne1_idx` (`id_pharmatie` ASC),
  CONSTRAINT `fk_ContactLign_pharmatie_enLigne1`
    FOREIGN KEY (`id_pharmatie`)
    REFERENCES `Pharmacies_Projet`.`pharmatie_enLigne` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pharmatie Projet`.`Stock`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pharmacies_Projet`.`Stock` (
  `id_Stock` INT NOT NULL AUTO_INCREMENT,
  `nom_prodLign` VARCHAR(255) NULL,
  `descrip_prodLign` VARCHAR(255) NULL,
  `famile_prodLign` VARCHAR(150) NULL,
  `qte` INT NULL,
  `Date` DATE NULL,
  `id_pharmatie` INT NOT NULL,
  PRIMARY KEY (`id_Stock`, `id_pharmatie`),
  UNIQUE INDEX `id_Stock_UNIQUE` (`id_Stock` ASC),
  INDEX `fk_Stock_pharmatie_enLigne1_idx` (`id_pharmatie` ASC),
  CONSTRAINT `fk_Stock_pharmatie_enLigne1`
    FOREIGN KEY (`id_pharmatie`)
    REFERENCES `Pharmacies_Projet`.`pharmatie_enLigne` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pharmatie Projet`.`forfaiit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pharmacies_Projet`.`forfaiit` (
  `id_forfaiit` INT NOT NULL AUTO_INCREMENT,
  `nom_Forfait` VARCHAR(255) NULL,
  `duree` INT NULL,
  `montant` DOUBLE NULL,
  PRIMARY KEY (`id_forfaiit`),
  UNIQUE INDEX `id_forfaiit_UNIQUE` (`id_forfaiit` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Pharmatie Projet`.`Abonnement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Pharmacies_Projet`.`Abonnement` (
  `id_abonnement` INT NOT NULL,
  `dateExpire` DATE NULL,
  `id_forfaiit` INT NOT NULL,
  `id_pharm_id` INT NOT NULL,
  `data_abonnement` DATE NULL,
  PRIMARY KEY (`id_abonnement`, `id_forfaiit`),
  INDEX `fk_Abonnement_forfaiit_idx` (`id_forfaiit` ASC),
  INDEX `fk_Abonnement_pharmatie_enLigne1_idx` (`id_pharm_id` ASC),
  CONSTRAINT `fk_Abonnement_forfaiit`
    FOREIGN KEY (`id_forfaiit`)
    REFERENCES `Pharmacies_Projet`.`forfaiit` (`id_forfaiit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Abonnement_pharmatie_enLigne1`
    FOREIGN KEY (`id_pharm_id`)
    REFERENCES `Pharmacies_Projet`.`pharmatie_enLigne` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
