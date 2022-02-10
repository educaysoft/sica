-- MySQL Workbench Synchronization
-- Generated: 2022-02-09 23:34
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Francis Stalin

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

ALTER TABLE `educayso_facae`.`documento` 
ADD COLUMN `documento_estado_iddocumento_estado` INT(11) NOT NULL AFTER `iddirectorio`,
ADD INDEX `fk_documento_documento_estado1_idx` (`documento_estado_iddocumento_estado` ASC) VISIBLE;
;

CREATE TABLE IF NOT EXISTS `educayso_facae`.`documento_estado` (
  `iddocumento_estado` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`iddocumento_estado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8_general_ci;

ALTER TABLE `educayso_facae`.`documento` 
ADD CONSTRAINT `fk_documento_documento_estado1`
  FOREIGN KEY (`documento_estado_iddocumento_estado`)
  REFERENCES `educayso_facae`.`documento_estado` (`iddocumento_estado`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
