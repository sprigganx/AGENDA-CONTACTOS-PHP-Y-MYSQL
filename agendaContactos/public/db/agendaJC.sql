CREATE SCHEMA `agendajc` DEFAULT CHARACTER SET utf8mb4 ;
use agendajc

CREATE TABLE `agendajc`.`t_categorias` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` TEXT NULL,
  `fechaInsert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_categoria`));

CREATE TABLE `agendajc`.`t_contactos` (
  `id_agenda` INT NOT NULL AUTO_INCREMENT,
  `id_categoria` INT NOT NULL,
  `nombre` VARCHAR(245) NULL,
  `paterno` VARCHAR(245) NULL,
  `materno` VARCHAR(245) NULL,
  `telefono` VARCHAR(145) NULL,
  `email` VARCHAR(245) NULL,
  `fechaInsert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`id_agenda`));


ALTER TABLE `agendajc`.`t_contactos` 
ADD INDEX `fkContactoCategoria_idx` (`id_categoria` ASC);
;
ALTER TABLE `agendajc`.`t_contactos` 
ADD CONSTRAINT `fkContactoCategoria`
  FOREIGN KEY (`id_categoria`)
  REFERENCES `agendajc`.`t_categorias` (`id_categoria`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;