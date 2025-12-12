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
    `isAdmin` boolean,
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
) ENGINE=InnoDB

INSERT INTO cascos (marca, modelo, tipo, certificaciones, precio_aprox, imagen, descripcion, fecha_registro)
VALUES ("KOV", "KOV Casco Estelar Negro Mate ", "modular", "DOT, ECE", 1253, LOAD_FILE("C:\xampp\htdocs\Accidentes-en-moto\assets\casco_modular.jpg"),
"LUZ TRASERA
VISOR HUMO CON TECNOLOGÍA ANTISCRATCH
ACOLCHADO ERGONÓMICO Y DESPRENDIBLE PARA UNA FÁCIL LIMPIEZA
TELA INTERNA ANTIALERGÉNICA E HIPOALERGÉNICA
PINTURA CON EXCELENTE ACABADO EVITA EL DESGASTE DE LOS GRÁFICOS
DISEÑO AERODINÁMICO TIPO RACING", '2025-12-10');