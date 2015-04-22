# Host: localhost  (Version: 5.6.12-log)
# Date: 2015-04-17 11:32:46
# Generator: MySQL-Front 5.3  (Build 4.133)

/*!40101 SET NAMES utf8 */;
CREATE DATABASE IF NOT EXISTS `auditoriaphp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auditoriaphp`;

#
# Structure for table "tab_auditoria"
#

CREATE TABLE `tab_auditoria` (
  `idtab_auditoria` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `trama` text,
  `tiempo` time DEFAULT NULL,
  PRIMARY KEY (`idtab_auditoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "tab_estudiantes"
#

CREATE TABLE `tab_estudiantes` (
  `idtab_estudiantes` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idtab_estudiantes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "tab_materias"
#

CREATE TABLE `tab_materias` (
  `idtab_materias` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtab_materias`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "tab_notas"
#

CREATE TABLE `tab_notas` (
  `idtab_notas` int(11) NOT NULL AUTO_INCREMENT,
  `nota` decimal(10,0) DEFAULT NULL,
  `tab_estudiantes_idtab_estudiantes` int(11) NOT NULL,
  `tab_materias_idtab_materias` int(11) NOT NULL,
  PRIMARY KEY (`idtab_notas`),
  KEY `fk_tab_notas_tab_estudiantes_idx` (`tab_estudiantes_idtab_estudiantes`),
  KEY `fk_tab_notas_tab_materias1_idx` (`tab_materias_idtab_materias`),
  CONSTRAINT `fk_tab_notas_tab_estudiantes` FOREIGN KEY (`tab_estudiantes_idtab_estudiantes`) REFERENCES `tab_estudiantes` (`idtab_estudiantes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tab_notas_tab_materias1` FOREIGN KEY (`tab_materias_idtab_materias`) REFERENCES `tab_materias` (`idtab_materias`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for table "tab_usuarios"
#

CREATE TABLE `tab_usuarios` (
  `idtab_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tipo_usuario` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtab_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into tab_usuarios (nombre_usuario,password,tipo_usuario) values('admin','admin','ADMINISTRADOR');
