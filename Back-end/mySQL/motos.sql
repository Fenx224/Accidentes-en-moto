DROP DATABASE IF EXISTS accidentes_en_moto;
CREATE DATABASE `accidentes_en_moto` DEFAULT CHARACTER SET utf8mb4;

USE `accidentes_en_moto`;

CREATE TABLE `users` (
	`userID` INT NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(20) NOT NULL,
    `userPassword` VARCHAR(25) NOT NULL,
    `name` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(35) NOT NULL,
    `mail` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(14) NOT NULL,
    `isAdmin` boolean,
    PRIMARY KEY (`userID`),
    UNIQUE KEY `userID`(`userID`),
    UNIQUE KEY `userName`(`userName`),
    UNIQUE KEY `mail`(`mail`),
    UNIQUE KEY `telephone`(`telephone`)
) ENGINE=innoDB;

CREATE TABLE IF NOT EXISTS `cascos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `marca` VARCHAR(75) NOT NULL,
    `modelo` VARCHAR(50) NOT NULL,
    `tipo` VARCHAR(30) NOT NULL,
    `certificacion` VARCHAR(255) NOT NULL, 
    `precio` DECIMAL(10, 2),             
    `imagen_url` VARCHAR(255),           
    PRIMARY KEY (`id`),
    UNIQUE KEY `id_unique` (`id`)
) ENGINE=InnoDB;

CREATE TABLE `accidentes`(
	`accidenteID` INT NOT NULL AUTO_INCREMENT,
    `fecha` DATE,
    `lugar` VARCHAR(50),
    `descripcion` LONGTEXT NOT NULL,
    `causa` LONGTEXT NOT NULL,
    `lesionado` VARCHAR(150) NOT NULL,
    `uso_caso` CHAR(4) NOT NULL,
    `nivel_gravedad` VARCHAR(30),
    `imagen_evidencia` BLOB,
    PRIMARY KEY (`accidenteID`),
    UNIQUE KEY `accidenteID`(`accidenteID`)
) ENGINE=InnoDB;

DELETE FROM cascos;

INSERT INTO cascos (marca, modelo, tipo, certificacion, precio, imagen_url)
VALUES ("KOV", "KOV Casco Estelar Negro Mate ", "modular", "DOT, ECE", 1253,"C:\xampp\htdocs\Accidentes-en-moto\Back-end\PHP\uploads\casco_modular.jpg");