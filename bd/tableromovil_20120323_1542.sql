-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2012 a las 00:29:10
-- Versión del servidor: 5.1.61
-- Versión de PHP: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tableromovil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit`
--

CREATE TABLE IF NOT EXISTS `audit` (
  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_tabla` varchar(150) DEFAULT NULL,
  `audit_evento` varchar(50) DEFAULT NULL,
  `audit_usuario` varchar(100) DEFAULT NULL,
  `audit_fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`audit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_tabgral`
--

CREATE TABLE IF NOT EXISTS `grupos_tabgral` (
  `grupos_tabgral_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupos_tabgral_descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grupos_tabgral_updated_at` datetime NOT NULL,
  PRIMARY KEY (`grupos_tabgral_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `grupos_tabgral`
--

INSERT INTO `grupos_tabgral` (`grupos_tabgral_id`, `grupos_tabgral_descripcion`, `grupos_tabgral_created_at`, `grupos_tabgral_updated_at`) VALUES
(1, 'Estados', '2012-02-28 20:23:07', '0000-00-00 00:00:00'),
(2, 'Estados menus', '2012-02-28 20:25:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `localidades_id` int(11) NOT NULL AUTO_INCREMENT,
  `localidades_nombre` varchar(150) NOT NULL,
  `localidades_codpostal` int(11) DEFAULT NULL,
  `provincias_id` int(11) NOT NULL,
  `localidades_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `localidades_updated_at` datetime NOT NULL,
  PRIMARY KEY (`localidades_id`),
  KEY `localidades_provincias_id` (`provincias_id`),
  KEY `provincias_id` (`provincias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `perfiles_id` int(11) NOT NULL AUTO_INCREMENT,
  `perfiles_descripcion` varchar(150) DEFAULT NULL,
  `perfiles_estado` int(11) DEFAULT '0',
  `perfiles_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `perfiles_updated_at` datetime NOT NULL,
  PRIMARY KEY (`perfiles_id`),
  KEY `perfiles_tabgral_id` (`perfiles_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfiles_id`, `perfiles_descripcion`, `perfiles_estado`, `perfiles_created_at`, `perfiles_updated_at`) VALUES
(1, 'admin', 1, '2012-02-28 03:00:00', '0000-00-00 00:00:00'),
(4, 'clientes', 1, '2012-02-29 03:00:00', '2012-03-05 05:07:15'),
(7, 'Conserje', 1, '2012-03-05 07:04:21', '2012-03-05 11:46:02'),
(8, 'test1', 1, '2012-03-05 07:37:35', '0000-00-00 00:00:00'),
(9, 'test2', 1, '2012-03-05 07:38:03', '0000-00-00 00:00:00'),
(10, 'test 3', 1, '2012-03-05 07:38:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `provincias_id` int(11) NOT NULL AUTO_INCREMENT,
  `provincias_nombre` varchar(150) NOT NULL,
  `provincias_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `provincias_updated_at` datetime NOT NULL,
  PRIMARY KEY (`provincias_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sismenu`
--

CREATE TABLE IF NOT EXISTS `sismenu` (
  `sismenu_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_descripcion` varchar(150) DEFAULT NULL,
  `sismenu_estado` int(11) DEFAULT '0',
  `sismenu_parent` int(11) DEFAULT NULL,
  `sismenu_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sismenu_updated_at` datetime DEFAULT NULL,
  `sismenu_iconpath` text,
  PRIMARY KEY (`sismenu_id`),
  KEY `sismenu_tabgral_id` (`sismenu_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sismenu`
--

INSERT INTO `sismenu` (`sismenu_id`, `sismenu_descripcion`, `sismenu_estado`, `sismenu_parent`, `sismenu_created_at`, `sismenu_updated_at`, `sismenu_iconpath`) VALUES
(1, 'Administración', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'icon-setting.png'),
(2, 'Usuarios', 3, 1, '2012-02-28 20:29:40', '0000-00-00 00:00:00', 'icon-default.png'),
(3, 'Perfiles', 3, 1, '2012-02-28 20:29:40', '0000-00-00 00:00:00', 'icon-default.png'),
(4, 'Seguridad', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'icon-seguridad.png'),
(5, 'Agua', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'icon-riego.png'),
(6, 'Iluminación', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'icon-iluminacion.png'),
(7, 'Refrigeración', 3, 0, '2012-02-28 22:19:58', '0000-00-00 00:00:00', 'icon-refrigeracion.png'),
(8, 'Cámara y control de acceso', 3, 0, '2012-02-28 22:19:57', '0000-00-00 00:00:00', 'icon-camara.png'),
(9, 'Audio', 3, 0, '2012-02-28 22:19:57', '0000-00-00 00:00:00', 'icon-audio.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisperfil`
--

CREATE TABLE IF NOT EXISTS `sisperfil` (
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
  KEY `tabgral_id` (`sisperfil_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sisperfil`
--

INSERT INTO `sisperfil` (`sisperfil_id`, `sismenu_id`, `perfiles_id`, `sisperfil_estado`, `sisperfil_created_at`, `sisperfil_updated_at`) VALUES
(1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, 1, '2012-02-28 20:31:17', '0000-00-00 00:00:00'),
(3, 3, 1, 1, '2012-02-28 20:31:17', '0000-00-00 00:00:00'),
(4, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 7, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 9, 1, 1, '2012-02-28 22:24:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sispermisos`
--

CREATE TABLE IF NOT EXISTS `sispermisos` (
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
  KEY `sispermisos_perfiles_id` (`perfiles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sispermisos`
--

INSERT INTO `sispermisos` (`sispermisos_id`, `sispermisos_tabla`, `sispermisos_flag_read`, `sispermisos_flag_insert`, `sispermisos_flag_update`, `sispermisos_flag_delete`, `perfiles_id`, `sispermisos_created_at`, `sispermisos_updated_at`) VALUES
(1, 'usuarios', 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'perfiles', 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'sisperfil', 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'sismenu', 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'sisvinculos', 1, 1, 1, 1, 1, '2012-02-28 20:24:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sisvinculos`
--

CREATE TABLE IF NOT EXISTS `sisvinculos` (
  `sisvinculos_id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) DEFAULT NULL,
  `sisvinculos_link` varchar(250) DEFAULT NULL,
  `sisvinculos_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sisvinculos_updated_at` datetime NOT NULL,
  PRIMARY KEY (`sisvinculos_id`),
  KEY `sismenu_id` (`sismenu_id`),
  KEY `sisvinculos_sismenu_id` (`sismenu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `sisvinculos`
--

INSERT INTO `sisvinculos` (`sisvinculos_id`, `sismenu_id`, `sisvinculos_link`, `sisvinculos_created_at`, `sisvinculos_updated_at`) VALUES
(1, 1, '#', '2012-02-28 20:30:27', '0000-00-00 00:00:00'),
(2, 2, 'usuarios_controller/index', '2012-02-28 20:30:27', '0000-00-00 00:00:00'),
(3, 3, 'perfiles_controller/index', '2012-02-28 20:30:27', '0000-00-00 00:00:00'),
(4, 4, '#', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 'agua_controller/index', '2012-02-28 22:23:00', '0000-00-00 00:00:00'),
(6, 6, 'iluminacion_controller/index', '2012-02-28 22:23:00', '0000-00-00 00:00:00'),
(7, 7, '#', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 8, '#', '2012-02-28 22:23:00', '0000-00-00 00:00:00'),
(9, 9, '#', '2012-02-28 22:23:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabgral`
--

CREATE TABLE IF NOT EXISTS `tabgral` (
  `tabgral_id` int(11) NOT NULL AUTO_INCREMENT,
  `tabgral_descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_id` int(11) NOT NULL,
  `tabgral_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tabgral_updated_at` datetime NOT NULL,
  PRIMARY KEY (`tabgral_id`),
  KEY `grupos_tabgral_id` (`grupos_tabgral_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tabgral`
--

INSERT INTO `tabgral` (`tabgral_id`, `tabgral_descripcion`, `grupos_tabgral_id`, `tabgral_created_at`, `tabgral_updated_at`) VALUES
(1, 'Disponible', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'No disponible ', 1, '2012-02-28 20:23:46', '0000-00-00 00:00:00'),
(3, 'Disponible', 2, '2012-02-28 20:27:00', '0000-00-00 00:00:00'),
(4, 'Eliminado', 2, '2012-02-28 20:27:00', '0000-00-00 00:00:00'),
(5, 'Temporalmente deshabilitado', 2, '2012-02-28 20:27:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
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
  KEY `usuarios_provincias_id` (`provincias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_username`, `usuarios_password`, `usuarios_nombre`, `usuarios_apellido`, `usuarios_email`, `usuarios_direccion`, `usuarios_telefono`, `usuarios_estado`, `usuarios_legajo`, `perfiles_id`, `provincias_id`, `localidades_id`, `usuarios_activationcode`, `usuarios_tokenforgotpasswd`, `usuarios_created_at`, `usuarios_updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '', NULL, NULL, 1, NULL, 1, NULL, NULL, NULL, NULL, '2012-02-28 20:32:28', '0000-00-00 00:00:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD CONSTRAINT `localidades_provincias_id` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`provincias_id`);

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `perfiles_tabgral_id` FOREIGN KEY (`perfiles_estado`) REFERENCES `tabgral` (`tabgral_id`);

--
-- Filtros para la tabla `sismenu`
--
ALTER TABLE `sismenu`
  ADD CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`sismenu_estado`) REFERENCES `tabgral` (`tabgral_id`);

--
-- Filtros para la tabla `sisperfil`
--
ALTER TABLE `sisperfil`
  ADD CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`),
  ADD CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`),
  ADD CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`sisperfil_estado`) REFERENCES `tabgral` (`tabgral_id`);

--
-- Filtros para la tabla `sispermisos`
--
ALTER TABLE `sispermisos`
  ADD CONSTRAINT `sispermisos_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`);

--
-- Filtros para la tabla `sisvinculos`
--
ALTER TABLE `sisvinculos`
  ADD CONSTRAINT `sisvinculos_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sismenu` (`sismenu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tabgral`
--
ALTER TABLE `tabgral`
  ADD CONSTRAINT `grupos_tabgral_id` FOREIGN KEY (`grupos_tabgral_id`) REFERENCES `grupos_tabgral` (`grupos_tabgral_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_estado` FOREIGN KEY (`usuarios_estado`) REFERENCES `tabgral` (`tabgral_id`),
  ADD CONSTRAINT `usuarios_localidades_id` FOREIGN KEY (`localidades_id`) REFERENCES `localidades` (`localidades_id`),
  ADD CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `perfiles` (`perfiles_id`),
  ADD CONSTRAINT `usuarios_provincias_id` FOREIGN KEY (`provincias_id`) REFERENCES `provincias` (`provincias_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
