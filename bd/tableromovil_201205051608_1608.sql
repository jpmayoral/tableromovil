-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.62-0ubuntu0.11.10.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema tableromovil
--

CREATE DATABASE IF NOT EXISTS tableromovil;
USE tableromovil;

--
-- Definition of table `tableromovil`.`audit`
--

DROP TABLE IF EXISTS `tableromovil`.`audit`;
CREATE TABLE  `tableromovil`.`audit` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_tabla` varchar(150) DEFAULT NULL,
  `audit_evento` varchar(50) DEFAULT NULL,
  `audit_usuario` varchar(100) DEFAULT NULL,
  `audit_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`audit`
--

/*!40000 ALTER TABLE `audit` DISABLE KEYS */;
LOCK TABLES `audit` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `audit` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`escenarios`
--

DROP TABLE IF EXISTS `tableromovil`.`escenarios`;
CREATE TABLE  `tableromovil`.`escenarios` (
  `escenarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `escenarios_descripcion` varchar(50) NOT NULL,
  `escenarios_estado` varchar(20) NOT NULL,
  `escenarios_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `escenarios_updated_at` datetime NOT NULL,
  `escenarios_iconpath` text,
  PRIMARY KEY (`escenarios_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`escenarios`
--

/*!40000 ALTER TABLE `escenarios` DISABLE KEYS */;
LOCK TABLES `escenarios` WRITE;
INSERT INTO `tableromovil`.`escenarios` VALUES  (1,'Me voy de vacaciones','desactivado','2012-04-25 19:17:43','2012-04-25 19:17:43','icon-holiday.png'),
 (2,'Me voy a trabajar','desactivado','2012-04-25 19:17:43','2012-04-25 19:17:43','icon-work.png'),
 (3,'Estoy en casa','activado','2012-04-25 19:18:09','2012-04-25 19:18:09','icon-home.png');
UNLOCK TABLES;
/*!40000 ALTER TABLE `escenarios` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`grupos_tabgral`
--

DROP TABLE IF EXISTS `tableromovil`.`grupos_tabgral`;
CREATE TABLE  `tableromovil`.`grupos_tabgral` (
  `grupos_tabgral_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_tabgral_descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grupos_tabgral_updated_at` datetime NOT NULL,
  PRIMARY KEY (`grupos_tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`grupos_tabgral`
--

/*!40000 ALTER TABLE `grupos_tabgral` DISABLE KEYS */;
LOCK TABLES `grupos_tabgral` WRITE;
INSERT INTO `tableromovil`.`grupos_tabgral` VALUES  (1,'Estados','2012-02-28 17:23:07','0000-00-00 00:00:00'),
 (2,'Estados menus','2012-02-28 17:25:57','0000-00-00 00:00:00'),
 (3,'Módulos del sistema','2012-05-03 18:53:25','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `grupos_tabgral` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`localidades`
--

DROP TABLE IF EXISTS `tableromovil`.`localidades`;
CREATE TABLE  `tableromovil`.`localidades` (
  `localidades_id` int(11) NOT NULL AUTO_INCREMENT,
  `localidades_nombre` varchar(150) NOT NULL,
  `localidades_codpostal` int(11) DEFAULT NULL,
  `provincias_id` int(11) NOT NULL,
  `localidades_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `localidades_updated_at` datetime NOT NULL,
  PRIMARY KEY (`localidades_id`),
  KEY `localidades_provincias_id` (`provincias_id`),
  KEY `provincias_id` (`provincias_id`),
  CONSTRAINT `localidades_provincias_id` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`provincias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`localidades`
--

/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
LOCK TABLES `localidades` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`perfiles`
--

DROP TABLE IF EXISTS `tableromovil`.`perfiles`;
CREATE TABLE  `tableromovil`.`perfiles` (
  `perfiles_id` int(11) NOT NULL AUTO_INCREMENT,
  `perfiles_descripcion` varchar(150) DEFAULT NULL,
  `perfiles_estado` int(11) DEFAULT '0',
  `perfiles_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `perfiles_updated_at` datetime NOT NULL,
  PRIMARY KEY (`perfiles_id`),
  KEY `perfiles_tabgral_id` (`perfiles_estado`),
  CONSTRAINT `perfiles_tabgral_id` FOREIGN KEY (`perfiles_estado`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`perfiles`
--

/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
LOCK TABLES `perfiles` WRITE;
INSERT INTO `tableromovil`.`perfiles` VALUES  (1,'admin',1,'2012-02-28 00:00:00','0000-00-00 00:00:00'),
 (11,'super admin',1,'2012-05-03 12:39:00','2012-05-03 12:39:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`provincias`
--

DROP TABLE IF EXISTS `tableromovil`.`provincias`;
CREATE TABLE  `tableromovil`.`provincias` (
  `provincias_id` int(11) NOT NULL AUTO_INCREMENT,
  `provincias_nombre` varchar(150) NOT NULL,
  `provincias_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `provincias_updated_at` datetime NOT NULL,
  PRIMARY KEY (`provincias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`provincias`
--

/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
LOCK TABLES `provincias` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`salidad`
--

DROP TABLE IF EXISTS `tableromovil`.`salidad`;
CREATE TABLE  `tableromovil`.`salidad` (
  `salidad_id` int(11) NOT NULL AUTO_INCREMENT,
  `salidad_relay` varchar(150) DEFAULT NULL,
  `salidad_value` int(11) DEFAULT NULL,
  `salidad_modulo` int(11) DEFAULT NULL,
  `salidad_descripcion` text,
  `salidad_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `salidad_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`salidad_id`),
  KEY `salidad_tabgral_id_modulo` (`salidad_modulo`),
  CONSTRAINT `salidad_tabgral_id_modulo` FOREIGN KEY (`salidad_modulo`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`salidad`
--

/*!40000 ALTER TABLE `salidad` DISABLE KEYS */;
LOCK TABLES `salidad` WRITE;
INSERT INTO `tableromovil`.`salidad` VALUES  (1,'RELAY 0',1,6,'Foco 1',NULL,'2012-05-05 16:06:49'),
 (2,'RELAY 1',0,6,'Foco 2',NULL,'2012-05-05 16:07:08'),
 (3,'RELAY 2',0,6,'Foco 3',NULL,'2012-05-05 16:07:07'),
 (4,'RELAY 3',0,6,'Foco 4',NULL,'2012-05-05 16:07:06'),
 (5,'RELAY 4',1,6,'Foco 5',NULL,'2012-05-05 13:47:58'),
 (6,'RELAY 5',1,7,'Riego',NULL,'2012-05-05 14:32:22'),
 (7,'RELAY 6',0,7,'Piscina',NULL,'2012-05-05 13:59:17'),
 (8,'RELAY 7',1,7,'Bomba',NULL,'2012-05-05 14:32:32');
UNLOCK TABLES;
/*!40000 ALTER TABLE `salidad` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`sismenu`
--

DROP TABLE IF EXISTS `tableromovil`.`sismenu`;
CREATE TABLE  `tableromovil`.`sismenu` (
  `sismenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_descripcion` varchar(150) DEFAULT NULL,
  `sismenu_estado` int(11) DEFAULT '0',
  `sismenu_parent` int(11) DEFAULT NULL,
  `sismenu_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sismenu_updated_at` datetime DEFAULT NULL,
  `sismenu_iconpath` text,
  PRIMARY KEY (`sismenu_id`),
  KEY `sismenu_tabgral_id` (`sismenu_estado`),
  CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`sismenu_estado`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`sismenu`
--

/*!40000 ALTER TABLE `sismenu` DISABLE KEYS */;
LOCK TABLES `sismenu` WRITE;
INSERT INTO `tableromovil`.`sismenu` VALUES  (1,'Administración',3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','icon-setting.png'),
 (2,'Usuarios',3,1,'2012-02-28 17:29:40','0000-00-00 00:00:00','icon-users.png'),
 (3,'Perfiles',3,1,'2012-02-28 17:29:40','0000-00-00 00:00:00','icon-profile.png'),
 (4,'Seguridad',3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','icon-seguridad.png'),
 (5,'Agua',3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','icon-riego.png'),
 (6,'Iluminación',3,0,'0000-00-00 00:00:00','0000-00-00 00:00:00','icon-iluminacion.png'),
 (7,'Refrigeración',3,0,'2012-02-28 19:19:58','0000-00-00 00:00:00','icon-refrigeracion.png'),
 (8,'Cámara y control de acceso',3,0,'2012-02-28 19:19:57','0000-00-00 00:00:00','icon-camara.png'),
 (9,'Audio',3,0,'2012-02-28 19:19:57','0000-00-00 00:00:00','icon-audio.png'),
 (10,'Cámara',3,8,'2012-03-30 11:55:02','0000-00-00 00:00:00','icon-default.png'),
 (11,'Control de Acceso',3,8,'2012-03-30 11:55:02','0000-00-00 00:00:00','icon-default.png'),
 (12,'Escenarios',3,1,'2012-04-25 16:37:07','2012-04-25 16:37:07','icon-escenarios.png'),
 (13,'Config salidad',3,1,'2012-05-03 13:37:57',NULL,'icon-iluminacion.png');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sismenu` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`sisperfil`
--

DROP TABLE IF EXISTS `tableromovil`.`sisperfil`;
CREATE TABLE  `tableromovil`.`sisperfil` (
  `sisperfil_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL,
  `sisperfil_estado` int(11) DEFAULT '0',
  `sisperfil_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sisperfil_updated_at` datetime NOT NULL,
  PRIMARY KEY (`sisperfil_id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sisperfil_sismenu_id` (`sismenu_id`),
  KEY `sisperfil_tabgral_id` (`sisperfil_estado`),
  KEY `tabgral_id` (`sisperfil_estado`),
  CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`sisperfil_estado`) REFERENCES `tabgral` (`tabgral_id`),
  CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`),
  CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`sisperfil`
--

/*!40000 ALTER TABLE `sisperfil` DISABLE KEYS */;
LOCK TABLES `sisperfil` WRITE;
INSERT INTO `tableromovil`.`sisperfil` VALUES  (1,1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,2,1,1,'2012-02-28 17:31:17','0000-00-00 00:00:00'),
 (3,3,1,1,'2012-02-28 17:31:17','0000-00-00 00:00:00'),
 (4,4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,5,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (6,6,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (7,7,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,8,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (9,9,1,1,'2012-02-28 19:24:21','0000-00-00 00:00:00'),
 (10,10,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,11,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (12,12,1,1,'2012-04-25 16:38:01','2012-04-25 16:38:01'),
 (13,12,11,1,'2012-05-03 13:15:45','0000-00-00 00:00:00'),
 (14,11,11,1,'2012-05-03 13:15:45','0000-00-00 00:00:00'),
 (15,10,11,1,'2012-05-03 13:15:45','0000-00-00 00:00:00'),
 (16,9,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (17,8,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (18,7,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (19,6,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (20,5,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (21,4,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (22,3,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (23,2,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (24,1,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (25,13,11,1,'2012-05-03 13:39:19','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sisperfil` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`sispermisos`
--

DROP TABLE IF EXISTS `tableromovil`.`sispermisos`;
CREATE TABLE  `tableromovil`.`sispermisos` (
  `sispermisos_id` int(11) NOT NULL AUTO_INCREMENT,
  `sispermisos_tabla` varchar(150) NOT NULL,
  `sispermisos_flag_read` int(11) DEFAULT '1',
  `sispermisos_flag_insert` int(11) DEFAULT '0',
  `sispermisos_flag_update` int(11) DEFAULT '0',
  `sispermisos_flag_delete` int(11) DEFAULT '0',
  `perfiles_id` int(11) NOT NULL,
  `sispermisos_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sispermisos_updated_at` datetime NOT NULL,
  PRIMARY KEY (`sispermisos_id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sispermisos_perfiles_id` (`perfiles_id`),
  CONSTRAINT `sispermisos_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`sispermisos`
--

/*!40000 ALTER TABLE `sispermisos` DISABLE KEYS */;
LOCK TABLES `sispermisos` WRITE;
INSERT INTO `tableromovil`.`sispermisos` VALUES  (1,'usuarios',1,1,1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,'perfiles',1,1,1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (3,'sisperfil',1,1,1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (4,'sismenu',1,1,1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,'sisvinculos',1,1,1,1,1,'2012-02-28 17:24:18','0000-00-00 00:00:00'),
 (6,'salidad',1,1,1,1,11,'2012-05-03 13:39:58','0000-00-00 00:00:00'),
 (7,'usuarios',1,1,1,1,11,'2012-05-05 16:05:30','0000-00-00 00:00:00'),
 (8,'perfiles',1,1,1,1,11,'2012-05-05 16:05:30','0000-00-00 00:00:00'),
 (9,'sisperfil',1,1,1,1,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (10,'sismenu',1,1,1,1,11,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,'sisvinculos',1,1,1,1,11,'2012-05-05 16:05:30','0000-00-00 00:00:00'),
 (12,'salidad',1,1,1,1,1,'2012-05-05 16:06:40','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sispermisos` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`sisvinculos`
--

DROP TABLE IF EXISTS `tableromovil`.`sisvinculos`;
CREATE TABLE  `tableromovil`.`sisvinculos` (
  `sisvinculos_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) DEFAULT NULL,
  `sisvinculos_link` varchar(250) DEFAULT NULL,
  `sisvinculos_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sisvinculos_updated_at` datetime NOT NULL,
  PRIMARY KEY (`sisvinculos_id`),
  KEY `sismenu_id` (`sismenu_id`),
  KEY `sisvinculos_sismenu_id` (`sismenu_id`),
  CONSTRAINT `sisvinculos_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`sisvinculos`
--

/*!40000 ALTER TABLE `sisvinculos` DISABLE KEYS */;
LOCK TABLES `sisvinculos` WRITE;
INSERT INTO `tableromovil`.`sisvinculos` VALUES  (1,1,'#','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (2,2,'usuarios_controller/index','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (3,3,'perfiles_controller/index','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (4,4,'seguridad_controller/index','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,5,'agua_controller/index','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (6,6,'iluminacion_controller/index','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (7,7,'refrigeracion_controller/index','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,8,'#','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (9,9,'audio_controller/index','2012-02-28 19:23:27','0000-00-00 00:00:00'),
 (10,10,'camara_controller/index','2012-04-23 09:52:29','0000-00-00 00:00:00'),
 (11,11,'acceso_controller/index','2012-04-23 09:52:29','0000-00-00 00:00:00'),
 (12,12,'escenarios_controller/index','2012-04-25 16:38:41','2012-04-25 16:38:41'),
 (13,13,'salidad_controller/index','2012-05-03 13:38:51','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sisvinculos` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`tabgral`
--

DROP TABLE IF EXISTS `tableromovil`.`tabgral`;
CREATE TABLE  `tableromovil`.`tabgral` (
  `tabgral_id` int(11) NOT NULL AUTO_INCREMENT,
  `tabgral_descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_id` int(11) NOT NULL,
  `tabgral_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tabgral_updated_at` datetime NOT NULL,
  PRIMARY KEY (`tabgral_id`),
  KEY `grupos_tabgral_id` (`grupos_tabgral_id`),
  CONSTRAINT `grupos_tabgral_id` FOREIGN KEY (`grupos_tabgral_id`) REFERENCES `grupos_tabgral` (`grupos_tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`tabgral`
--

/*!40000 ALTER TABLE `tabgral` DISABLE KEYS */;
LOCK TABLES `tabgral` WRITE;
INSERT INTO `tableromovil`.`tabgral` VALUES  (1,'Disponible',1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,'No disponible ',1,'2012-02-28 17:23:46','0000-00-00 00:00:00'),
 (3,'Disponible',2,'2012-02-28 17:27:00','0000-00-00 00:00:00'),
 (4,'Eliminado',2,'2012-02-28 17:27:00','0000-00-00 00:00:00'),
 (5,'Temporalmente deshabilitado',2,'2012-02-28 17:27:00','0000-00-00 00:00:00'),
 (6,'Iluminación',3,'2012-05-03 18:54:00','0000-00-00 00:00:00'),
 (7,'Agua',3,'2012-05-03 18:54:00','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `tabgral` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`usuarios`
--

DROP TABLE IF EXISTS `tableromovil`.`usuarios`;
CREATE TABLE  `tableromovil`.`usuarios` (
  `usuarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_username` varchar(150) DEFAULT NULL,
  `usuarios_password` varchar(150) DEFAULT NULL,
  `usuarios_nombre` varchar(150) DEFAULT NULL,
  `usuarios_apellido` varchar(150) DEFAULT NULL,
  `usuarios_email` varchar(150) DEFAULT NULL,
  `usuarios_direccion` varchar(200) DEFAULT NULL,
  `usuarios_telefono` varchar(50) DEFAULT NULL,
  `usuarios_estado` int(11) DEFAULT NULL,
  `usuarios_legajo` int(11) DEFAULT NULL,
  `perfiles_id` int(11) NOT NULL,
  `provincias_id` int(11) DEFAULT NULL,
  `localidades_id` int(11) DEFAULT NULL,
  `usuarios_activationcode` varchar(150) DEFAULT NULL,
  `usuarios_tokenforgotpasswd` text,
  `usuarios_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_updated_at` datetime NOT NULL,
  PRIMARY KEY (`usuarios_id`),
  KEY `localidades_id` (`localidades_id`),
  KEY `perfiles_id` (`usuarios_telefono`),
  KEY `perfiles_id_usuarios` (`perfiles_id`),
  KEY `provincias_id` (`provincias_id`),
  KEY `tabgral_id` (`usuarios_direccion`),
  KEY `usuarios_estado` (`usuarios_estado`),
  KEY `usuarios_perfiles_id` (`perfiles_id`),
  KEY `usuarios_provincias_id` (`provincias_id`),
  CONSTRAINT `usuarios_provincias_id` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`provincias_id`),
  CONSTRAINT `usuarios_estado` FOREIGN KEY (`usuarios_estado`) REFERENCES `tabgral` (`tabgral_id`),
  CONSTRAINT `usuarios_localidades_id` FOREIGN KEY (`localidades_id`) REFERENCES `localidades` (`localidades_id`),
  CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
LOCK TABLES `usuarios` WRITE;
INSERT INTO `tableromovil`.`usuarios` VALUES  (1,'admin','81dc9bdb52d04dc20036dbd8313ed055','admin','admin','',NULL,NULL,1,NULL,1,NULL,NULL,NULL,NULL,'2012-02-28 17:32:28','2012-05-01 10:53:10'),
 (2,'super','1b3231655cebb7a1f783eddf27d254ca','super admin','super admin','superadmin@gmail.com',NULL,NULL,1,NULL,11,NULL,NULL,NULL,NULL,'2012-05-03 13:13:43','2012-05-03 13:13:43');
UNLOCK TABLES;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
