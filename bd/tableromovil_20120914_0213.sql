-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1


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
-- Definition of table `tableromovil`.`btncameras`
--

DROP TABLE IF EXISTS `tableromovil`.`btncameras`;
CREATE TABLE  `tableromovil`.`btncameras` (
  `btncameras_id` int(11) NOT NULL AUTO_INCREMENT,
  `btncameras_nombre` varchar(150) DEFAULT NULL,
  `btncameras_label` text,
  `btncameras_url` text,
  `salidad_id` int(11) NOT NULL,
  `cameras_id` int(11) NOT NULL,
  `btncameras_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `btncameras_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`btncameras_id`),
  KEY `btncameras_cameras_id` (`cameras_id`),
  KEY `btncameras_salidad_id` (`salidad_id`),
  CONSTRAINT `btncameras_cameras_id` FOREIGN KEY (`cameras_id`) REFERENCES `cameras` (`cameras_id`),
  CONSTRAINT `btncameras_salidad_id` FOREIGN KEY (`salidad_id`) REFERENCES `salidad` (`salidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`btncameras`
--

/*!40000 ALTER TABLE `btncameras` DISABLE KEYS */;
LOCK TABLES `btncameras` WRITE;
INSERT INTO `tableromovil`.`btncameras` VALUES  (6,'open_door','Abrir puerta','btncameras_controller/setBtnIpCam/',3,1,'2012-06-04 11:01:17','2012-08-01 02:41:20'),
 (7,'abrir_puerta','Abrir Puerta','btncameras_controller/setBtnIpCam/',1,3,'2012-08-01 03:05:21','2012-08-01 03:05:21'),
 (8,'abrir_ventana','Abrir Ventana','btncameras_controller/setBtnIpCam/',2,3,'2012-08-01 03:05:45','2012-08-01 03:05:45'),
 (9,'subir_cortina','Subir Cortina','btncameras_controller/setBtnIpCam/',4,4,'2012-08-01 03:06:28','2012-08-01 03:06:28');
UNLOCK TABLES;
/*!40000 ALTER TABLE `btncameras` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`cameras`
--

DROP TABLE IF EXISTS `tableromovil`.`cameras`;
CREATE TABLE  `tableromovil`.`cameras` (
  `cameras_id` int(11) NOT NULL AUTO_INCREMENT,
  `cameras_descripcion` text,
  `cameras_url` text,
  `cameras_port` text,
  `cameras_estado` int(11) DEFAULT NULL,
  `cameras_user` text,
  `cameras_password` text,
  `cameras_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cameras_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cameras_id`),
  KEY `cameras_estado_tabgral_id` (`cameras_estado`),
  CONSTRAINT `cameras_estado_tabgral_id` FOREIGN KEY (`cameras_estado`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`cameras`
--

/*!40000 ALTER TABLE `cameras` DISABLE KEYS */;
LOCK TABLES `cameras` WRITE;
INSERT INTO `tableromovil`.`cameras` VALUES  (1,'Cámara 1','http://192.168.2.105','2000',9,'admin','123456','2012-05-19 21:37:28','2012-09-10 15:47:32'),
 (3,'Cámara 2','http://192.168.2.107','8080',9,'','','2012-05-20 00:20:16','2012-06-06 02:56:01'),
 (4,'Camara 3','http://192.168.2.101','8080',9,'','','2012-06-05 04:50:29','2012-06-05 04:50:29');
UNLOCK TABLES;
/*!40000 ALTER TABLE `cameras` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`entradaa`
--

DROP TABLE IF EXISTS `tableromovil`.`entradaa`;
CREATE TABLE  `tableromovil`.`entradaa` (
  `entradaa_id` int(11) NOT NULL AUTO_INCREMENT,
  `entradaa_nombre` text,
  `entradaa_value` float DEFAULT NULL,
  `entradaa_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entradaa_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`entradaa_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`entradaa`
--

/*!40000 ALTER TABLE `entradaa` DISABLE KEYS */;
LOCK TABLES `entradaa` WRITE;
INSERT INTO `tableromovil`.`entradaa` VALUES  (1,'ai1',0,'2012-05-09 18:52:55','0000-00-00 00:00:00'),
 (2,'ai2',0,'2012-05-09 18:53:41','0000-00-00 00:00:00'),
 (3,'ai3',0,'2012-05-09 18:53:53','0000-00-00 00:00:00'),
 (4,'ai4',0,'2012-05-09 18:54:05','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `entradaa` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`entradad`
--

DROP TABLE IF EXISTS `tableromovil`.`entradad`;
CREATE TABLE  `tableromovil`.`entradad` (
  `entradad_id` int(11) NOT NULL AUTO_INCREMENT,
  `entradad_din` text,
  `entradad_value` tinyint(4) DEFAULT NULL,
  `entradad_modulo` int(11) DEFAULT NULL,
  `entradad_descripcion` text,
  `entradad_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `entradad_updated_at` datetime DEFAULT NULL,
  `sismenu_id` int(11) DEFAULT NULL,
  `entradad_estado` int(11) DEFAULT '1',
  `entradad_iconon` text,
  `entradad_iconoff` text,
  PRIMARY KEY (`entradad_id`),
  KEY `entradad_estados_id` (`entradad_estado`),
  KEY `entradad_modulo_tabgral_id` (`entradad_modulo`),
  KEY `entradad_sismenu_id` (`sismenu_id`),
  CONSTRAINT `entradad_estados_id` FOREIGN KEY (`entradad_estado`) REFERENCES `estados` (`estados_id`),
  CONSTRAINT `entradad_modulo_tabgral_id` FOREIGN KEY (`entradad_modulo`) REFERENCES `tabgral` (`tabgral_id`),
  CONSTRAINT `entradad_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`entradad`
--

/*!40000 ALTER TABLE `entradad` DISABLE KEYS */;
LOCK TABLES `entradad` WRITE;
INSERT INTO `tableromovil`.`entradad` VALUES  (1,'DIN0',1,11,'Electricidad','0000-00-00 00:00:00','2012-09-14 01:47:07',4,2,'thumb_rfutXDk6kJ5hh5KJxDynnrc5e.png','thumb_rfutXDk6kJ5hh5KJxDynnrc5e1.png'),
 (2,'DIN1',1,11,'Gas','0000-00-00 00:00:00','2012-09-14 01:47:08',4,2,'thumb_m9hf8MrE4vxakTfmYvZopajRI.png','thumb_m9hf8MrE4vxakTfmYvZopajRI1.png'),
 (3,'DIN2',1,11,'Agua','0000-00-00 00:00:00','2012-09-14 01:47:09',4,2,'thumb_wHc844WIdR62ABOkyseFBFEww.png','thumb_wHc844WIdR62ABOkyseFBFEww1.png'),
 (4,'DIN3',0,11,'Iluminación','0000-00-00 00:00:00','2012-09-12 18:33:55',4,2,'thumb_cmduR9BYluz4FxXICzn7YGz9p.png','thumb_cmduR9BYluz4FxXICzn7YGz9p1.png'),
 (5,'DIN4',0,11,'Alarma','0000-00-00 00:00:00','2012-09-12 18:33:56',4,2,'thumb_ZMTWjsJl06tWPgIjGwCQlBkN3.png','thumb_ZMTWjsJl06tWPgIjGwCQlBkN31.png'),
 (6,'DIN5',1,11,'Audio 1','0000-00-00 00:00:00','2012-07-01 05:40:40',9,1,NULL,NULL),
 (7,'DIN6',0,11,'Audio 2','0000-00-00 00:00:00','2012-07-01 05:41:06',9,1,NULL,NULL),
 (8,'DIN7',NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,1,NULL,NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `entradad` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`escenarios`
--

DROP TABLE IF EXISTS `tableromovil`.`escenarios`;
CREATE TABLE  `tableromovil`.`escenarios` (
  `escenarios_id` int(11) NOT NULL AUTO_INCREMENT,
  `escenarios_descripcion` varchar(150) DEFAULT NULL,
  `escenarios_estado` int(11) DEFAULT NULL,
  `escenarios_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `escenarios_updated_at` datetime DEFAULT NULL,
  `escenarios_iconpath` text,
  PRIMARY KEY (`escenarios_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`escenarios`
--

/*!40000 ALTER TABLE `escenarios` DISABLE KEYS */;
LOCK TABLES `escenarios` WRITE;
INSERT INTO `tableromovil`.`escenarios` VALUES  (12,'Vacaciones familiares',1,'2012-06-30 22:28:22','2012-07-02 15:06:18','thumb_Juj3bybYl27m6e7KwonNnTC9X.png'),
 (15,'Trabajo',0,'2012-06-30 23:16:37','2012-09-11 18:25:49','thumb_xXywMkI2DKSWl70eoE0qUtsVL.png'),
 (17,'En casa',0,'2012-06-30 23:19:01','2012-06-30 23:24:33','thumb_KeUtV52JyJiC9OWUaRTwyY605.png'),
 (18,'Viaje de negocios',0,'2012-06-30 23:23:24','2012-07-31 21:20:07','thumb_ZGgG8CtMoL5VFwZnENoGiB9bP.png'),
 (19,'Picnic familiar',0,'2012-06-30 23:23:48','2012-06-30 23:23:48','thumb_Lx27xpwMWiEfl0ZJW8BBIDi21.png'),
 (21,'Pesca con amigos',0,'2012-06-30 23:26:23','2012-06-30 23:26:23','thumb_nutxIxrLE6gu3bvnt25iff6iX.png');
UNLOCK TABLES;
/*!40000 ALTER TABLE `escenarios` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`estados`
--

DROP TABLE IF EXISTS `tableromovil`.`estados`;
CREATE TABLE  `tableromovil`.`estados` (
  `estados_id` int(11) NOT NULL AUTO_INCREMENT,
  `estados_descripcion` varchar(150) DEFAULT NULL,
  `estados_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estados_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`estados_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`estados`
--

/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
LOCK TABLES `estados` WRITE;
INSERT INTO `tableromovil`.`estados` VALUES  (1,'Libre','2012-06-04 10:07:22',NULL),
 (2,'Asignada','2012-06-04 10:07:22',NULL),
 (3,'No funcional','2012-06-04 10:07:22',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`grupos_tabgral`
--

/*!40000 ALTER TABLE `grupos_tabgral` DISABLE KEYS */;
LOCK TABLES `grupos_tabgral` WRITE;
INSERT INTO `tableromovil`.`grupos_tabgral` VALUES  (1,'Estados','2012-02-28 17:23:07','0000-00-00 00:00:00'),
 (2,'Estados menus','2012-02-28 17:25:57','0000-00-00 00:00:00'),
 (3,'Módulos del sistema','2012-05-03 18:53:25','0000-00-00 00:00:00'),
 (4,'Estados de las cámaras','2012-05-19 21:10:41','0000-00-00 00:00:00'),
 (5,'Estados de novedades','2012-09-11 15:19:32','0000-00-00 00:00:00');
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
-- Definition of table `tableromovil`.`novedades`
--

DROP TABLE IF EXISTS `tableromovil`.`novedades`;
CREATE TABLE  `tableromovil`.`novedades` (
  `novedades_id` int(11) NOT NULL AUTO_INCREMENT,
  `novedades_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `novedades_descripcion` text,
  `novedades_estado` int(11) DEFAULT NULL,
  `novedades_tipo` int(11) DEFAULT NULL,
  `novedades_leido` int(11) DEFAULT NULL,
  PRIMARY KEY (`novedades_id`),
  KEY `novedades_tabgral_id` (`novedades_estado`),
  CONSTRAINT `novedades_tabgral_id` FOREIGN KEY (`novedades_estado`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`novedades`
--

/*!40000 ALTER TABLE `novedades` DISABLE KEYS */;
LOCK TABLES `novedades` WRITE;
INSERT INTO `tableromovil`.`novedades` VALUES  (1,'2012-08-08 21:33:06','Relay 1',13,0,1),
 (2,'2012-08-08 21:37:44','Relay 2',13,1,1),
 (3,'2012-08-08 21:37:51','Relay 3',13,1,1),
 (4,'2012-08-08 21:37:57','Relay 4',13,0,1),
 (5,'2012-08-08 21:38:03','Relay 5',13,0,1),
 (6,'2012-08-08 21:38:11','Relay 6 activado',14,2,1),
 (7,'2012-08-16 08:09:12','Relay 7 activado',14,0,1),
 (8,'2012-08-16 08:10:47','Entrada 1',14,1,1),
 (9,'2012-08-16 08:11:09','Entrada 2',14,2,1),
 (10,'2012-08-16 23:22:33','Entrada 3',14,0,1),
 (11,'2012-08-16 23:22:52','Entrada 4',14,1,1),
 (12,'2012-09-11 16:02:11','Relay 5',13,1,1),
 (13,'2012-09-11 16:26:44','Salida 5',13,2,1),
 (14,'2012-09-11 16:27:04','Salida 6',13,1,1),
 (15,'2012-09-11 16:27:17','Salida 7',14,0,1),
 (16,'2012-09-11 16:27:37','Salida 8',14,1,1),
 (17,'2012-09-11 16:27:55','Salida 1',13,2,1),
 (18,'2012-09-11 16:28:05','Salida 2',13,1,1),
 (19,'2012-09-12 01:56:03','Salida 3',13,0,0),
 (20,'2012-09-12 01:56:12','Salida 4',13,1,0),
 (21,'2012-09-12 01:56:22','Salida 5',14,2,0),
 (22,'2012-09-12 01:56:34','Entrada 5',14,1,0),
 (23,'2012-09-12 01:56:44','Entrada 6',14,1,0),
 (24,'2012-09-12 01:56:57','Entrada 7',13,0,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `novedades` ENABLE KEYS */;


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
-- Definition of table `tableromovil`.`playlist`
--

DROP TABLE IF EXISTS `tableromovil`.`playlist`;
CREATE TABLE  `tableromovil`.`playlist` (
  `playlist_id` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_descripcion` varchar(150) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `playlist_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `playlist_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`playlist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`playlist`
--

/*!40000 ALTER TABLE `playlist` DISABLE KEYS */;
LOCK TABLES `playlist` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `playlist` ENABLE KEYS */;


--
-- Definition of table `tableromovil`.`playlistlinea`
--

DROP TABLE IF EXISTS `tableromovil`.`playlistlinea`;
CREATE TABLE  `tableromovil`.`playlistlinea` (
  `playlistlinea_id` int(11) NOT NULL AUTO_INCREMENT,
  `playlistlinea_path` text,
  `playlistlinea_namesong` varchar(150) DEFAULT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `playlistlinea_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `playlistlinea_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`playlistlinea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`playlistlinea`
--

/*!40000 ALTER TABLE `playlistlinea` DISABLE KEYS */;
LOCK TABLES `playlistlinea` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `playlistlinea` ENABLE KEYS */;


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
-- Definition of table `tableromovil`.`salidaa`
--

DROP TABLE IF EXISTS `tableromovil`.`salidaa`;
CREATE TABLE  `tableromovil`.`salidaa` (
  `salidaa_id` int(11) NOT NULL AUTO_INCREMENT,
  `salidaa_nombre` text,
  `salidaa_value` int(11) DEFAULT NULL,
  `salidaa_modulo` int(11) DEFAULT NULL,
  `salidaa_descripcion` text,
  `salidaa_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `salidaa_updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`salidaa_id`),
  KEY `salidaa_modulo_tabgral_id` (`salidaa_modulo`),
  CONSTRAINT `salidaa_modulo_tabgral_id` FOREIGN KEY (`salidaa_modulo`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`salidaa`
--

/*!40000 ALTER TABLE `salidaa` DISABLE KEYS */;
LOCK TABLES `salidaa` WRITE;
INSERT INTO `tableromovil`.`salidaa` VALUES  (1,'ao1',500,NULL,NULL,'2012-05-09 18:29:03','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `salidaa` ENABLE KEYS */;


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
  `salidad_created_at` datetime DEFAULT NULL,
  `salidad_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sismenu_id` int(11) DEFAULT NULL,
  `salidad_estado` int(11) DEFAULT '1',
  `salidad_iconon` text,
  `salidad_iconoff` text,
  PRIMARY KEY (`salidad_id`),
  KEY `salidad_estados_id` (`salidad_estado`),
  KEY `salidad_sismenu_id` (`sismenu_id`),
  KEY `salidad_tabgral_id_modulo` (`salidad_modulo`),
  CONSTRAINT `salidad_estados_id` FOREIGN KEY (`salidad_estado`) REFERENCES `estados` (`estados_id`),
  CONSTRAINT `salidad_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`),
  CONSTRAINT `salidad_tabgral_id_modulo` FOREIGN KEY (`salidad_modulo`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`salidad`
--

/*!40000 ALTER TABLE `salidad` DISABLE KEYS */;
LOCK TABLES `salidad` WRITE;
INSERT INTO `tableromovil`.`salidad` VALUES  (1,'RELAY 0',1,12,'abrir_puerta',NULL,'2012-08-01 03:05:21',6,2,'thumb_Dd0Opwj9hj9PrtAFck7rJ9bSq.png','thumb_Dd0Opwj9hj9PrtAFck7rJ9bSq1.png'),
 (2,'RELAY 1',1,12,'abrir_ventana',NULL,'2012-08-01 03:07:18',16,2,'thumb_diXShM71SSEbFK1EDU1RjYnhj.png','thumb_diXShM71SSEbFK1EDU1RjYnhj1.png'),
 (3,'RELAY 2',1,12,'open_door',NULL,'2012-08-01 02:44:36',NULL,2,NULL,NULL),
 (4,'RELAY 3',0,12,'subir_cortina',NULL,'2012-08-01 03:06:28',16,2,'thumb_aO8d87GKV13A4lWvWwDDyRbmL.png','thumb_aO8d87GKV13A4lWvWwDDyRbmL1.png'),
 (5,'RELAY 4',1,11,'Aire 1',NULL,'2012-09-12 18:34:49',7,2,'thumb_EWtTIiEEKrpPQa5Dh7B3um3AC.png','thumb_EWtTIiEEKrpPQa5Dh7B3um3AC1.png'),
 (6,'RELAY 5',1,11,'Riego',NULL,'2012-09-11 20:48:28',5,2,'thumb_PmS6La9XTqnkEQXqDmObX485s.png','thumb_PmS6La9XTqnkEQXqDmObX485s1.png'),
 (7,'RELAY 6',0,11,'Piscina',NULL,'2012-09-14 00:28:18',5,2,'thumb_VkZWC4hNrNcd8nLxDvBQ4VKmJ.png','thumb_VkZWC4hNrNcd8nLxDvBQ4VKmJ1.png'),
 (8,'RELAY 7',0,11,'Bomba',NULL,'2012-09-11 20:48:26',5,2,'thumb_d7CD4z4cvSSDbUgqqaPOYR5jZ.png','thumb_d7CD4z4cvSSDbUgqqaPOYR5jZ1.png');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
 (12,'Escenarios',3,1,'2012-04-25 16:37:07','2012-04-25 16:37:07','icon-escenarios.png'),
 (13,'Config Salidad',3,1,'2012-05-03 13:37:57',NULL,'icon-default.png'),
 (14,'Config Entradad',3,1,'2012-05-12 02:37:14',NULL,'icon-default.png'),
 (15,'Config Cámaras',3,1,'2012-05-19 20:54:12',NULL,'icon-default.png'),
 (16,'Portones',3,0,'2012-06-30 17:21:22',NULL,'icon-default.png'),
 (17,'Escenarios',3,0,'2012-07-01 01:31:55',NULL,'icon-escenarios.png'),
 (18,'Novedades',3,1,'2012-08-17 03:50:00',NULL,'icon-default.png');
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
  CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`),
  CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`),
  CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`sisperfil_estado`) REFERENCES `tabgral` (`tabgral_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

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
 (12,12,1,1,'2012-04-25 16:38:01','2012-04-25 16:38:01'),
 (13,12,11,1,'2012-05-03 13:15:45','0000-00-00 00:00:00'),
 (16,9,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (17,8,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (18,7,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (19,6,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (20,5,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (21,4,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (22,3,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (23,2,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (24,1,11,1,'2012-05-03 13:15:46','0000-00-00 00:00:00'),
 (25,13,11,1,'2012-05-03 13:39:19','0000-00-00 00:00:00'),
 (26,14,11,1,'2012-05-12 02:38:35','0000-00-00 00:00:00'),
 (27,15,11,1,'2012-05-19 20:55:10','0000-00-00 00:00:00'),
 (28,16,11,1,'2012-06-30 17:22:35','0000-00-00 00:00:00'),
 (29,17,11,1,'2012-07-01 01:33:18','0000-00-00 00:00:00'),
 (30,17,1,1,'2012-07-01 01:33:18','0000-00-00 00:00:00'),
 (31,18,1,1,'2012-08-17 03:50:54','0000-00-00 00:00:00'),
 (32,18,11,1,'2012-08-17 03:51:09','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

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
 (12,'salidad',1,1,1,1,1,'2012-05-05 16:06:40','0000-00-00 00:00:00'),
 (13,'entradad',1,1,0,1,11,'2012-05-12 02:39:31','0000-00-00 00:00:00'),
 (14,'entradad',1,1,0,0,1,'2012-05-12 02:39:30','0000-00-00 00:00:00'),
 (15,'cameras',1,1,1,1,11,'2012-05-19 20:55:59','0000-00-00 00:00:00'),
 (16,'cameras',1,1,1,1,1,'2012-05-19 20:56:15','0000-00-00 00:00:00'),
 (17,'btncameras',1,1,1,1,11,'2012-06-04 08:43:26','0000-00-00 00:00:00'),
 (18,'btncameras',1,1,1,1,1,'2012-06-04 08:43:25','0000-00-00 00:00:00'),
 (19,'escenarios',1,1,1,1,11,'2012-06-30 21:47:17','0000-00-00 00:00:00'),
 (20,'escenarios',1,0,1,0,1,'2012-06-30 21:47:40','0000-00-00 00:00:00'),
 (21,'playlist',1,1,1,1,1,'2012-08-01 06:39:08','0000-00-00 00:00:00'),
 (22,'playlist',1,1,1,1,11,'2012-08-01 06:39:08','0000-00-00 00:00:00'),
 (23,'playlistlinea',1,1,1,1,1,'2012-08-01 06:39:08','0000-00-00 00:00:00'),
 (24,'playlistlinea',1,1,1,1,11,'2012-08-01 06:39:08','0000-00-00 00:00:00'),
 (25,'novedades',1,1,1,1,1,'2012-08-08 21:30:26','0000-00-00 00:00:00'),
 (26,'novedades',1,1,1,1,11,'2012-08-08 21:30:26','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tableromovil`.`sisvinculos`
--

/*!40000 ALTER TABLE `sisvinculos` DISABLE KEYS */;
LOCK TABLES `sisvinculos` WRITE;
INSERT INTO `tableromovil`.`sisvinculos` VALUES  (1,1,'#','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (2,2,'usuarios_controller/index','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (3,3,'perfiles_controller/index','2012-02-28 17:30:27','0000-00-00 00:00:00'),
 (4,4,'entradadg_controller/index/4','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,5,'salidadg_controller/index/5','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (6,6,'salidadg_controller/index/6','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (7,7,'salidadg_controller/index/7','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,8,'controlaccess_controller/index','2012-02-28 19:23:00','0000-00-00 00:00:00'),
 (9,9,'audio_controller/index','2012-02-28 19:23:27','0000-00-00 00:00:00'),
 (12,12,'escenarios_controller/index','2012-04-25 16:38:41','2012-04-25 16:38:41'),
 (13,13,'salidad_controller/index','2012-05-03 13:38:51','0000-00-00 00:00:00'),
 (14,14,'entradad_controller/index','2012-05-12 02:37:54','0000-00-00 00:00:00'),
 (15,15,'cameras_controller/index','2012-05-19 20:54:39','0000-00-00 00:00:00'),
 (16,16,'salidadg_controller/index/16','2012-06-30 17:22:09','0000-00-00 00:00:00'),
 (17,17,'escenariospublic_controller/index','2012-07-01 01:32:45','0000-00-00 00:00:00'),
 (18,18,'novedades_controller/index','2012-08-17 03:50:19','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
 (9,'Activa',4,'2012-05-19 21:11:05','0000-00-00 00:00:00'),
 (10,'No activa',4,'2012-05-19 21:11:05','0000-00-00 00:00:00'),
 (11,'Genérico',3,'2012-06-04 04:06:34','0000-00-00 00:00:00'),
 (12,'Botones',3,'2012-06-04 08:58:18','0000-00-00 00:00:00'),
 (13,'Activada',5,'2012-09-11 15:20:21','0000-00-00 00:00:00'),
 (14,'Desactivada',5,'2012-09-11 15:20:20','0000-00-00 00:00:00');
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
  CONSTRAINT `usuarios_estado` FOREIGN KEY (`usuarios_estado`) REFERENCES `tabgral` (`tabgral_id`),
  CONSTRAINT `usuarios_localidades_id` FOREIGN KEY (`localidades_id`) REFERENCES `localidades` (`localidades_id`),
  CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`),
  CONSTRAINT `usuarios_provincias_id` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`provincias_id`)
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
