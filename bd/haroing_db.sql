-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-09-2017 a las 19:11:52
-- Versión del servidor: 5.5.55-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `haroing_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_documentos`
--

CREATE TABLE IF NOT EXISTS `aprobacion_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nro_documento` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `firma_1` tinyint(4) NOT NULL,
  `firma_2` tinyint(4) NOT NULL,
  `firma_3` tinyint(4) NOT NULL,
  `firma_4` tinyint(4) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `aprobacion_documentos`
--

INSERT INTO `aprobacion_documentos` (`id`, `nro_documento`, `tipo`, `firma_1`, `firma_2`, `firma_3`, `firma_4`, `fecha_creacion`) VALUES
(14, 1, 'RQ', 0, 0, 0, 0, '2017-09-05 00:37:31'),
(15, 2, 'RQ', 0, 0, 0, 0, '2017-09-05 00:37:31'),
(16, 1, 'OC', 0, 0, 0, 0, '2017-09-05 17:44:54'),
(17, 2, 'OC', 0, 0, 0, 0, '2017-09-05 17:44:54'),
(18, 3, 'OC', 0, 0, 0, 0, '2017-09-05 17:44:54'),
(19, 1, 'RS', 0, 0, 0, 0, '2017-09-05 17:45:51'),
(20, 1, 'OS', 0, 0, 0, 0, '2017-09-05 17:48:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, '01', 'SISTEMAS', '2017-08-23 16:04:36'),
(2, '02', 'INGENIERIA', '2017-08-23 16:04:44'),
(3, '03', 'CONTABILIDAD', '2017-08-23 16:05:01'),
(4, '04', 'VENTAS', '2017-08-23 16:05:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `codigo2` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `descripcion2` varchar(200) NOT NULL,
  `ficha` text NOT NULL,
  `id_familia` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `codigo`, `codigo2`, `descripcion`, `descripcion2`, `ficha`, `id_familia`, `id_unidad`, `id_tipo`, `estado`, `fecha_creacion`) VALUES
(1, '0513100-45', '-', 'RODAMIENTO TIMKEN 363', '-', '-', 2, 2, 1, 1, '2017-08-23 15:59:31'),
(2, '0513100-42', '-', 'RODAMIENTO TIMKEN 369A', '-', '-', 1, 2, 1, 1, '2017-08-23 16:00:14'),
(3, '140600163-114', '-', 'TUERCA DE FIJACION CON TRABA NYLON 1/2&quot;', '-', '-', 2, 1, 1, 1, '2017-08-23 16:01:16'),
(4, 'SERREINS', '-', 'SERVICIO REPARACION E INSTALACION', '-', '-', 1, 1, 2, 1, '2017-08-23 16:02:26'),
(5, 'SERINSP', '-', 'SERVICIO DE INSPECCION', '-', '-', 1, 1, 2, 1, '2017-08-23 16:03:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_file`
--

CREATE TABLE IF NOT EXISTS `articulo_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `articulo_file`
--

INSERT INTO `articulo_file` (`id`, `nombre`, `ruta`, `id_articulo`) VALUES
(1, 'FAIL', 'FAIL.png', 2),
(2, 'GORDO', 'GORDO.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_tipo`
--

CREATE TABLE IF NOT EXISTS `articulo_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `articulo_tipo`
--

INSERT INTO `articulo_tipo` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'N', 'ARTÍCULOS CON MOVIMIENTOS', '2017-08-23 15:52:36'),
(2, 'S', 'ARTÍCULOS DE TIPO SERVICIO', '2017-08-23 15:52:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costo`
--

CREATE TABLE IF NOT EXISTS `centro_costo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `centro_costo`
--

INSERT INTO `centro_costo` (`id`, `codigo`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(1, '000001', 'ACCESORIOS DE PERFORACIÓN', 1, '2017-08-23 16:06:12'),
(2, '000002', 'MAQUINARIA', 1, '2017-08-23 16:06:20'),
(3, '000003', 'SERVICIOS', 1, '2017-08-23 16:06:27'),
(4, '000004', 'ENTRENAMIENTO', 1, '2017-08-23 16:06:36'),
(5, '000005', 'COSTOS Y PLANEAMIENTO', 1, '2017-08-23 16:06:44'),
(6, '000006', 'INGENIERÍA', 1, '2017-08-23 16:07:08'),
(7, '000007', 'COMPRAS', 1, '2017-08-23 16:07:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion1` varchar(200) NOT NULL,
  `direccion2` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `codigo`, `contacto`, `razon_social`, `ruc`, `dni`, `direccion1`, `direccion2`, `telefono`, `correo`, `fecha_creacion`) VALUES
(1, '001', 'GENARO ZEA', 'PEUSAC S.A.', '20114663616', '46636118', 'CALLE LAS ORQUÍDEAS', 'SAN JUAN DE LURIGANCHO', '943502140', 'JOSE@PERUTEC.COM.PE', '2017-08-23 17:25:51'),
(2, '002', 'JOEL FLORES', 'FLORES S.A.C.', '20074567997', '87654321', 'LOS JAZMINES', 'SAN JUAN DE LURIGANCHO', '123-4567', 'FLORESSAC@GMAIL.COM', '2017-08-24 20:50:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comovc`
--

CREATE TABLE IF NOT EXISTS `comovc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(200) NOT NULL,
  `ot` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` enum('OC','OS') NOT NULL,
  `estado` enum('00','01','02','03','04','05') NOT NULL DEFAULT '00',
  `prioridad` enum('1','2','3') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `comovc`
--

INSERT INTO `comovc` (`id`, `numero`, `id_usuario`, `id_proveedor`, `fecha_inicio`, `fecha_fin`, `comentario`, `centro_costo`, `ot`, `area`, `tipo`, `estado`, `prioridad`, `fecha_creacion`) VALUES
(4, 1, 1, 6, '2017-08-23', '2017-08-23', '-', '000004', 'RCC-0491', '04', 'OC', '00', '3', '2017-08-23 17:17:27'),
(5, 1, 1, 2, '2017-08-23', '2017-08-23', '-', '000001', 'RCC-0491', '03', 'OS', '00', '3', '2017-08-23 17:42:47'),
(6, 2, 1, 5, '2017-08-23', '2017-08-24', '-', '000001', 'RCC-0491', '03', 'OC', '00', '2', '2017-08-23 17:48:18'),
(7, 3, 1, 2, '2017-08-23', '2017-08-23', '-', '000005', 'RCC-0490', '02', 'OC', '00', '2', '2017-08-23 17:48:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comovd`
--

CREATE TABLE IF NOT EXISTS `comovd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `saldo` decimal(15,6) NOT NULL,
  `precio` decimal(15,6) NOT NULL,
  `estado` enum('A','P') NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `maquina` varchar(100) NOT NULL,
  `tipo` enum('OC','OS') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativo`
--

CREATE TABLE IF NOT EXISTS `correlativo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `correlativo`
--

INSERT INTO `correlativo` (`id`, `codigo`, `descripcion`, `numero`, `fecha_creacion`) VALUES
(1, 'RQ', 'REQUERIMIENTO DE COMPRA', 2, '2017-08-23 16:07:54'),
(2, 'RS', 'REQUERIMIENTO DE SERVICIO', 1, '2017-08-23 16:08:10'),
(3, 'OC', 'ORDEN DE COMPRA', 3, '2017-08-23 16:08:21'),
(4, 'OS', 'ORDEN  DE SERVICIO', 1, '2017-08-23 16:08:35'),
(5, 'NI', 'NOTAS DE INGRESO', 0, '2017-08-23 16:34:58'),
(6, 'NS', 'NOTAS DE SALIDA', 0, '2017-08-23 16:35:12'),
(7, 'GS', 'GUÍA DE SALIDA', 0, '2017-08-23 16:35:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE IF NOT EXISTS `familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'SERV', 'SERVICIOS', '2017-08-23 15:57:17'),
(2, 'IN', 'INSUMOS', '2017-08-23 15:57:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE IF NOT EXISTS `maquina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_termino` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `contrato_factura` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `descripcion_abrv` varchar(200) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`id`, `codigo`, `fecha_adquisicion`, `fecha_inicio`, `fecha_termino`, `cantidad`, `contrato_factura`, `descripcion`, `descripcion_abrv`, `modelo`, `serie`, `marca`, `estado`, `fecha_creacion`) VALUES
(1, '001', '2017-08-01', '2017-08-08', '2017-08-31', 3, 'F-01', 'MAQUINARIA PESADA', 'MP', 'M-01', 'K310', 'CAT', 'ACTIVO', '2017-08-25 17:02:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `item` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `descripcion`, `item`) VALUES
(1, 'BASE DE DATOS', 1),
(2, 'TABLAS DE AYUDA', 2),
(3, 'GESTIÓN DE COMPRAS', 3),
(4, 'ADMINISTRADOR', 5),
(5, 'ANALÍTICAS ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movalmcab`
--

CREATE TABLE IF NOT EXISTS `movalmcab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fecha_incio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(200) NOT NULL,
  `ot` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `estado` enum('A','P') NOT NULL DEFAULT 'P',
  `prioridad` enum('1','2','3') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movalmdet`
--

CREATE TABLE IF NOT EXISTS `movalmdet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `saldo` decimal(15,6) NOT NULL,
  `precio` decimal(15,6) NOT NULL,
  `estado` enum('A','P') NOT NULL DEFAULT 'P',
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `maquina` varchar(100) NOT NULL,
  `tipo` enum('NI','NS','GS') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ord_fab`
--

CREATE TABLE IF NOT EXISTS `ord_fab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `codigo_cliente` int(11) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `observacion` text NOT NULL,
  `estado` enum('ACTIVO','LIQUIDADO') NOT NULL DEFAULT 'ACTIVO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `ord_fab`
--

INSERT INTO `ord_fab` (`id`, `codigo`, `codigo_cliente`, `unidad`, `descripcion`, `fecha_inicio`, `fecha_fin`, `cantidad`, `observacion`, `estado`, `fecha_creacion`) VALUES
(1, 'RCC-0490', 2, '5', 'REPARACION DE MORDAZAS  ROD HOLDER NQ  DE LM -75', '2017-08-01', '2017-08-31', 3.000000, 'POR REPARAR', 'LIQUIDADO', '2017-08-23 17:28:58'),
(5, 'RCC-0491', 1, '3', 'DSC', '2017-08-24', '2017-08-24', 1.000000, 'OBS', 'ACTIVO', '2017-08-24 21:06:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_menu`
--

CREATE TABLE IF NOT EXISTS `permiso_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_submenu` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Volcado de datos para la tabla `permiso_menu`
--

INSERT INTO `permiso_menu` (`id`, `id_submenu`, `id_usuario`, `estado`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 10, 1, 1),
(10, 11, 1, 1),
(11, 17, 1, 1),
(17, 1, 2, 1),
(18, 3, 2, 1),
(19, 6, 2, 1),
(20, 4, 2, 1),
(21, 8, 2, 1),
(22, 7, 2, 1),
(23, 5, 2, 1),
(24, 10, 2, 1),
(25, 2, 2, 1),
(26, 11, 2, 1),
(27, 17, 2, 1),
(28, 18, 1, 1),
(29, 18, 2, 1),
(34, 21, 1, 1),
(35, 21, 2, 1),
(36, 22, 1, 1),
(37, 22, 2, 1),
(38, 23, 1, 1),
(39, 23, 2, 1),
(40, 24, 1, 1),
(41, 24, 2, 1),
(42, 25, 1, 1),
(43, 25, 2, 1),
(44, 26, 1, 1),
(45, 26, 2, 1),
(46, 4, 4, 0),
(47, 4, 3, 0),
(48, 5, 4, 0),
(49, 5, 3, 0),
(50, 3, 4, 0),
(51, 3, 3, 0),
(52, 23, 4, 0),
(53, 23, 3, 0),
(54, 24, 4, 0),
(55, 24, 3, 0),
(56, 25, 4, 0),
(57, 25, 3, 0),
(58, 10, 4, 0),
(59, 10, 3, 0),
(60, 26, 4, 0),
(61, 26, 3, 0),
(62, 1, 4, 0),
(63, 1, 3, 0),
(64, 11, 4, 0),
(65, 11, 3, 0),
(66, 2, 4, 0),
(67, 2, 3, 0),
(68, 17, 4, 0),
(69, 17, 3, 0),
(70, 8, 4, 0),
(71, 8, 3, 0),
(74, 7, 4, 0),
(75, 7, 3, 0),
(76, 18, 4, 0),
(77, 18, 3, 0),
(78, 21, 4, 0),
(79, 21, 3, 0),
(80, 6, 4, 0),
(81, 6, 3, 0),
(82, 22, 4, 0),
(83, 22, 3, 0),
(84, 27, 4, 0),
(85, 27, 3, 0),
(86, 27, 1, 1),
(87, 27, 2, 1),
(88, 28, 4, 0),
(89, 28, 3, 0),
(90, 28, 1, 1),
(91, 28, 2, 1),
(104, 32, 4, 0),
(105, 32, 3, 0),
(106, 32, 1, 1),
(107, 32, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `razon_social` varchar(200) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `direccion1` varchar(200) NOT NULL,
  `direccion2` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `codigo`, `contacto`, `razon_social`, `ruc`, `dni`, `direccion1`, `direccion2`, `telefono`, `correo`, `fecha_creacion`) VALUES
(1, '001', 'LUIS CLAUDIO', 'PERUTEC', '20174666361', '08794081', 'SEÑOR DE LOS MILAGROS', 'CANTO REY', '3421246', 'OMAR.FERZEA29@GMAIL.COM', '2017-08-09 23:55:31'),
(2, '002', 'OMAR FERNANDEZ', 'OMAR FERNANDEZ', '20111234567', '12345678', 'SANTA MARTHA', 'SANTA FE', '943502140', 'MEGABYTE1507@GMAIL.COM', '2017-08-10 00:03:46'),
(5, '003', 'JOSÉ ADRIÁN', 'ADRIAN HNOS', '20602324321', '12345678', 'JR. RIO PUTUMAYO', 'CANTO REY', '123-4567', 'ADRIANHNOS@GMAIL.COM', '2017-08-20 17:30:48'),
(6, '004', 'LISS NAVARRO', 'FAMILIA PELUCHE', '20100170842', '12345678', 'EL COLLAR', 'SAN JUAN DE LURIGANCHO', '3549864', 'L.NAVARRO@PERUTEC.COM.PE', '2017-08-23 14:39:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisc`
--

CREATE TABLE IF NOT EXISTS `requisc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `tipo` enum('RQ','RS') NOT NULL,
  `estado` enum('A','P') NOT NULL DEFAULT 'P',
  `prioridad` enum('1','2','3') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `requisc`
--

INSERT INTO `requisc` (`id`, `numero`, `id_usuario`, `fecha_inicio`, `fecha_fin`, `comentario`, `centro_costo`, `ot`, `area`, `tipo`, `estado`, `prioridad`, `fecha_creacion`) VALUES
(1, 1, 1, '2017-08-23', '2017-08-23', 'TEST', '000004', 'RCC-0490', '02', 'RQ', 'A', '2', '2017-08-23 16:22:20'),
(2, 1, 1, '2017-08-23', '2017-08-23', 'REVISAR', '000005', 'RCC-0490', '03', 'RS', 'A', '1', '2017-08-23 16:29:38'),
(3, 2, 1, '2017-08-31', '2017-08-02', 'REQUERIR', '000007', 'RCC-0490', '04', 'RQ', 'A', '3', '2017-08-26 17:53:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisd`
--

CREATE TABLE IF NOT EXISTS `requisd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` decimal(15,6) NOT NULL,
  `saldo` decimal(15,6) NOT NULL,
  `estado` enum('A','P') NOT NULL DEFAULT 'P',
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `centro_costo` varchar(20) NOT NULL,
  `ot` varchar(20) NOT NULL,
  `maquina` varchar(100) NOT NULL,
  `tipo` enum('RQ','RS') NOT NULL DEFAULT 'RS',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `requisd`
--

INSERT INTO `requisd` (`id`, `numero`, `item`, `codigo`, `descripcion`, `unidad`, `cantidad`, `saldo`, `estado`, `fecha`, `comentario`, `centro_costo`, `ot`, `maquina`, `tipo`, `fecha_creacion`) VALUES
(1, 1, 1, '0513100-42', 'RODAMIENTO TIMKEN 369A', 'PIEZA', 3.000000, 3.000000, 'P', '0000-00-00', 'COMENTARIO', '000001', 'RCC-0490', 'RCC-0490', 'RQ', '2017-08-23 16:26:06'),
(5, 1, 2, '0513100-45', 'RODAMIENTO TIMKEN 363', 'PIEZA', 5.000000, 5.000000, 'P', '2017-08-28', 'URGENTE', '000005', 'RCC-0490', '', 'RQ', '2017-08-28 23:18:01'),
(6, 1, 3, '140600163-114', 'TUERCA DE FIJACION CON TRABA NYLON 1/2&amp;quot;', 'UNIDAD', 2.000000, 2.000000, 'P', '2017-08-28', 'ATENDER', '000006', 'RCC-0491', '', 'RQ', '2017-08-28 23:18:59'),
(9, 1, 1, 'SERINSP', 'SERVICIO DE INSPECCION', 'UNIDAD', 1.000000, 1.000000, 'P', '2017-08-28', 'NECESARIO', '000005', 'RCC-0491', '', 'RS', '2017-08-29 00:15:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `item` int(10) unsigned NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`id`, `descripcion`, `ruta`, `item`, `id_menu`) VALUES
(1, 'ARTÍCULOS', 'pages/articulo', 1, 1),
(2, 'FAMILIA', 'pages/familia', 4, 1),
(3, 'MENÚ', 'pages/menu', 1, 4),
(4, 'SUB MENÚ', 'pages/submenu', 2, 4),
(5, 'USUARIOS', 'pages/usuario', 3, 4),
(6, 'REQUERIMIENTO DE COMPRAS', 'pages/rq-compra', 1, 3),
(7, 'REQUERIMIENTO DE SERVICIO', 'pages/rq-servicio', 2, 3),
(8, 'UNIDAD DE MEDIDA', 'pages/unidad', 2, 1),
(10, 'ÁREA', 'pages/area', 3, 1),
(11, 'CENTRO DE COSTO', 'pages/centro-costo', 5, 1),
(17, 'PROVEEDOR', 'pages/proveedor', 6, 1),
(18, 'ORDENES DE SERVICIO', 'pages/ordenes-servicio', 4, 3),
(21, 'ORDENES DE COMPRA', 'pages/ordenes-compra', 3, 3),
(22, 'CORRELATIVOS', 'pages/correlativo', 1, 2),
(23, 'STOCK', '#', 1, 5),
(24, 'COMPRAS', '#', 2, 5),
(25, 'ORDEN DE TRABAJO', 'pages/orden-trabajo', 9, 1),
(26, 'TIPO DE ARTICULO', 'pages/articulo-tipo', 7, 1),
(27, 'CLIENTE', 'pages/cliente', 10, 1),
(28, 'MÁQUINA', 'pages/maquina', 11, 1),
(32, 'APROBACIÓN DE DOCUMENTOS', 'pages/aprobacion-documentos', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `codigo`, `descripcion`, `fecha_creacion`) VALUES
(1, 'UND', 'UNIDAD', '2017-08-23 15:55:15'),
(2, 'PC', 'PIEZA', '2017-08-23 15:55:28'),
(3, 'CJA', 'CAJA', '2017-08-23 15:55:37'),
(4, 'GL', 'GALÓN', '2017-08-23 15:55:48'),
(5, 'JGO', 'JUEGO', '2017-08-23 15:56:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(200) NOT NULL,
  `apellidos` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `user` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `tipo` enum('user','admin') NOT NULL DEFAULT 'user',
  `img_fima` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `correo`, `celular`, `user`, `pass`, `tipo`, `img_fima`, `fecha_creacion`) VALUES
(1, 'LUIS AUGUSTO', 'CLAUDIO PONCE', 'luis.claudio@perutec.com.pe', '997935085', 'luis.claudio@perutec.com.pe', '502ff82f7f1f8218dd41201fe4353687', 'admin', 'firma01.jpg', '2017-07-04 22:14:23'),
(2, 'OMAR JESUS', 'FERNANDEZ ZEA', 'omar.fernandez@perutec.com.pe', '943502140', 'omar.fernandez@perutec.com.pe', 'd4466cce49457cfea18222f5a7cd3573', 'user', 'firma02.jpg', '2017-08-09 22:20:22'),
(3, 'LISS', 'NAVARRO', 'liss.navarro@perutec.com.pe', '0', 'liss.navarro@perutec.com.pe', '6e25079982c372cc9fdb129c6b5cf311', 'user', 'firma03.jpg', '2017-08-17 01:00:17'),
(4, 'JOSE', 'ADRIAN', 'jose@perutec.com.pe', '0', 'jose@perutec.com.pe', '662eaa47199461d01a623884080934ab', 'user', 'firma04.jpg', '2017-08-17 01:03:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_tipo`
--

CREATE TABLE IF NOT EXISTS `usuario_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `solicitante` tinyint(1) NOT NULL DEFAULT '0',
  `compras` tinyint(1) NOT NULL DEFAULT '0',
  `jefe_area` tinyint(1) NOT NULL DEFAULT '0',
  `gerente` tinyint(1) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuario_tipo`
--

INSERT INTO `usuario_tipo` (`id`, `id_usuario`, `solicitante`, `compras`, `jefe_area`, `gerente`, `fecha_creacion`) VALUES
(1, 1, 1, 0, 0, 1, '2017-08-16 22:36:56'),
(2, 2, 1, 0, 0, 0, '2017-08-16 22:36:56'),
(3, 3, 0, 1, 0, 0, '2017-08-17 01:00:24'),
(4, 4, 0, 0, 1, 0, '2017-08-17 01:04:43');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
