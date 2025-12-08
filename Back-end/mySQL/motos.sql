DROP DATABASE IF EXISTS accidentes_en_moto;
CREATE DATABASE `accidentes_en_moto` DEFAULT CHARACTER SET utf8mb4;

USE `accidentes_en_moto`;

CREATE TABLE `users` (
	`userID` INT NOT NULL AUTO_INCREMENT,
    `userName` VARCHAR(20) NOT NULL,
    `userPassword` VARCHAR(25) NOT NULL,
    `firstName` VARCHAR(20) NOT NULL,
    `lastName` VARCHAR(35) NOT NULL,
    `mail` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(14) NOT NULL,
    PRIMARY KEY (`userID`),
    UNIQUE KEY `userID`(`userID`),
    UNIQUE KEY `userName`(`userName`),
    UNIQUE KEY `mail`(`mail`),
    UNIQUE KEY `telephone`(`telephone`)
) ENGINE=innoDB;

CREATE TABLE `cascos`(
	`cascoID` INT NOT NULL AUTO_INCREMENT,
    `marca` VARCHAR(75) NOT NULL,
    `modelo` VARCHAR(50) NOT NULL,
    `tipo` VARCHAR(30) NOT NULL,
    `certificaciones` LONGTEXT NOT NULL,
    `precio_aprox` INT,
    `imagen` BLOB,
    `descripcion` LONGTEXT,
    `fecha_registro` DATE,
    PRIMARY KEY (`cascoID`),
    UNIQUE KEY `cascoID`(`cascoID`)
) ENGINE=InnoDB;