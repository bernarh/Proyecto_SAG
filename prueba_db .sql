-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2016 a las 04:46:28
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE IF NOT EXISTS `tbl_bitacora` (
  `codigo_registro` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(20) NOT NULL,
  PRIMARY KEY (`codigo_registro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `tbl_bitacora`
--

INSERT INTO `tbl_bitacora` (`codigo_registro`, `nombre_usuario`, `fecha`, `accion`) VALUES
(3, 'atecnico', '2016-10-13 18:20:02', 'Ingreso'),
(4, 'atecnico', '2016-10-13 18:22:06', 'Cerro Sesion'),
(5, 'atecnico', '2016-10-13 18:26:28', 'Ingreso'),
(6, 'atecnico', '2016-10-13 18:26:53', 'Cerro Sesion'),
(7, 'atecnico', '2016-10-13 18:27:02', 'Ingreso'),
(8, 'atecnico', '2016-10-13 18:27:24', 'Cerro Sesion'),
(9, 'atecnico', '2016-10-13 18:29:39', 'Ingreso'),
(10, 'atecnico', '2016-10-13 18:29:44', 'Cerro Sesion'),
(11, 'atecnico', '2016-10-13 18:32:12', 'Ingreso'),
(12, 'atecnico', '2016-10-16 10:05:56', 'Ingreso'),
(13, 'atecnico', '2016-10-16 11:25:08', 'Ingreso'),
(14, 'atecnico', '2016-10-16 11:35:56', 'Ingreso'),
(15, 'atecnico', '2016-10-17 12:56:43', 'Ingreso'),
(16, 'atecnico', '2016-10-17 18:15:00', 'Ingreso'),
(17, 'atecnico', '2016-10-17 18:28:00', 'Cerro Sesion'),
(18, 'atecnico', '2016-10-17 18:28:08', 'Ingreso'),
(19, 'atecnico', '2016-10-25 23:05:07', 'Ingreso'),
(20, 'atecnico', '2016-10-26 00:08:37', 'Ingreso'),
(21, 'atecnico', '2016-10-26 00:09:28', 'Ingreso'),
(22, 'atecnico', '2016-10-31 18:07:34', 'Ingreso'),
(23, 'atecnico', '2016-10-31 18:42:48', 'Cerro Sesion'),
(24, 'atecnico', '2016-10-31 18:44:14', 'Ingreso'),
(25, 'atecnico', '2016-10-31 18:51:46', 'Ingreso'),
(26, 'atecnico', '2016-10-31 18:52:20', 'Cerro Sesion'),
(27, 'atecnico', '2016-10-31 21:45:27', 'Ingreso'),
(28, 'atecnico', '2016-10-31 21:46:02', 'Cerro Sesion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_codigo_tipo_produccion`
--

CREATE TABLE IF NOT EXISTS `tbl_codigo_tipo_produccion` (
  `codigo_tipo_produccion` int(10) NOT NULL,
  `tipo_produccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_codigo_tipo_produccion`
--

INSERT INTO `tbl_codigo_tipo_produccion` (`codigo_tipo_produccion`, `tipo_produccion`) VALUES
(1, 'ORGANICO'),
(2, 'CONVENCIONAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

CREATE TABLE IF NOT EXISTS `tbl_municipios` (
  `codigo_municipio` int(10) NOT NULL,
  `nombre_municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_municipios`
--

INSERT INTO `tbl_municipios` (`codigo_municipio`, `nombre_municipio`) VALUES
(1, 'municipio 1'),
(2, 'municipio 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productores`
--

CREATE TABLE IF NOT EXISTS `tbl_productores` (
  `codigo_productor` int(19) NOT NULL AUTO_INCREMENT,
  `nombre_productor` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo_zona` int(10) NOT NULL,
  `codigo_municipio` int(10) NOT NULL,
  `ubicacion_exacta` varchar(50) NOT NULL,
  `fecha_ingreso_productor` datetime NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `estado_productor` int(11) NOT NULL,
  PRIMARY KEY (`codigo_productor`),
  UNIQUE KEY `codigo_productor` (`codigo_productor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbl_productores`
--

INSERT INTO `tbl_productores` (`codigo_productor`, `nombre_productor`, `telefono`, `correo`, `codigo_zona`, `codigo_municipio`, `ubicacion_exacta`, `fecha_ingreso_productor`, `codigo_usuario`, `estado_productor`) VALUES
(1, 'juan', '12344321', 'correo.com', 2, 1, 'ubicacion exacta 1', '2016-10-16 06:18:18', 4, 0),
(2, 'jose', '2223434', '2@g.com', 1, 2, 'aldea 1 calle 2', '2016-10-31 02:00:00', 3, 0),
(3, 'mario', '1233', '', 1, 1, 'ubicacion exacta 2', '2016-10-16 11:59:46', 4, 0),
(4, 'pepito', '12', '', 2, 1, 'ubicacion xxxxxxxx', '2016-10-17 18:19:21', 4, 0),
(5, 'mafalda', '1234', 'correo.com', 1, 1, 'ubicacion', '2016-10-31 18:31:54', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productores_x_producto`
--

CREATE TABLE IF NOT EXISTS `tbl_productores_x_producto` (
  `codigo_productor` int(10) NOT NULL,
  `codigo_producto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `fecha_ingreso_producto` datetime NOT NULL,
  `codigo_tipo_produccion` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha_recoleccion` datetime NOT NULL,
  `codigo_tipo_transaccion` int(11) NOT NULL,
  `codigo_punto_recoleccion` int(11) NOT NULL,
  `estado_producto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productores_x_producto`
--

INSERT INTO `tbl_productores_x_producto` (`codigo_productor`, `codigo_producto`, `cantidad`, `precio`, `fecha_ingreso_producto`, `codigo_tipo_produccion`, `codigo_usuario`, `comentario`, `fecha_recoleccion`, `codigo_tipo_transaccion`, `codigo_punto_recoleccion`, `estado_producto`) VALUES
(1, 1, 75, 100.00, '2016-10-23 02:02:00', 1, 3, 'intermediario 1', '2016-10-22 09:00:00', 1, 2, 0),
(2, 2, 50, 80.00, '2016-10-25 00:00:00', 2, 3, 'hina', '2016-10-24 12:00:00', 2, 2, 0),
(3, 3, 150, 120.00, '2016-10-26 07:00:00', 1, 3, 'cooperativa', '2016-10-25 08:00:00', 2, 3, 0),
(4, 4, 200, 70.00, '2016-10-30 09:00:00', 1, 3, 'cacao', '2016-10-27 00:00:00', 2, 3, 0),
(3, 4, 200, 120.00, '2016-10-25 02:00:00', 2, 3, 'cooperativa 3', '2016-10-24 10:00:00', 2, 4, 0),
(2, 1, 250, 90.00, '2016-10-27 04:00:00', 1, 3, 'independiente', '2016-10-26 03:00:00', 1, 3, 0),
(1, 1, 10, 10.00, '2016-10-31 18:29:23', 2, 4, 'presentacion', '2016-10-31 00:00:00', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productores_x_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_productores_x_usuarios` (
  `codigo_productor` int(10) NOT NULL,
  `codigo_usuario` int(10) NOT NULL,
  `comentario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productores_x_usuarios`
--

INSERT INTO `tbl_productores_x_usuarios` (`codigo_productor`, `codigo_usuario`, `comentario`) VALUES
(1, 2, 'tipo de producto 1'),
(2, 2, 'tipo de produto 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE IF NOT EXISTS `tbl_productos` (
  `codigo_producto` int(10) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `codigo_tipo_cacao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`codigo_producto`, `descripcion_producto`, `codigo_tipo_cacao`) VALUES
(1, 'BELLOTA', 0),
(2, 'BABA', 1),
(3, 'BABA', 2),
(4, 'FERMENTADO SECO', 1),
(5, 'FERMENTADO SECO', 2),
(6, 'SECO SIN FERMENTAR', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_punto_recoleccion`
--

CREATE TABLE IF NOT EXISTS `tbl_punto_recoleccion` (
  `codigo_punto_recoleccion` int(11) NOT NULL AUTO_INCREMENT,
  `punto_recoleccion` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_punto_recoleccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbl_punto_recoleccion`
--

INSERT INTO `tbl_punto_recoleccion` (`codigo_punto_recoleccion`, `punto_recoleccion`) VALUES
(1, 'PRODUCTOR'),
(2, 'EMPRESA ORGANIZADA'),
(3, 'MAYORISTA'),
(4, 'INTERMEDIARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_de_cacao`
--

CREATE TABLE IF NOT EXISTS `tbl_tipos_de_cacao` (
  `codigo_tipo_cacao` int(10) NOT NULL,
  `nombre_tipo_cacao` varchar(15) NOT NULL,
  `codigo_unidad_de_medida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipos_de_cacao`
--

INSERT INTO `tbl_tipos_de_cacao` (`codigo_tipo_cacao`, `nombre_tipo_cacao`, `codigo_unidad_de_medida`) VALUES
(1, 'tipo a', 1),
(2, 'tipo b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_tipos_usuario` (
  `codigo_tipo_usuario` int(10) NOT NULL,
  `nombre_tipo_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipos_usuario`
--

INSERT INTO `tbl_tipos_usuario` (`codigo_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'administrador'),
(3, 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_transaccion`
--

CREATE TABLE IF NOT EXISTS `tbl_tipo_transaccion` (
  `codigo_tipo_transaccion` int(11) NOT NULL,
  `tipo_transaccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_transaccion`
--

INSERT INTO `tbl_tipo_transaccion` (`codigo_tipo_transaccion`, `tipo_transaccion`) VALUES
(1, 'COMPRA'),
(2, 'VENTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_unidad_de_medida`
--

CREATE TABLE IF NOT EXISTS `tbl_unidad_de_medida` (
  `codigo_unidad_de_medida` int(10) NOT NULL,
  `nombre_unidad_de_medida` varchar(20) NOT NULL,
  `abreviatura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_unidad_de_medida`
--

INSERT INTO `tbl_unidad_de_medida` (`codigo_unidad_de_medida`, `nombre_unidad_de_medida`, `abreviatura`) VALUES
(1, 'libra', 'lb'),
(2, 'unidad 2', 'u2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `codigo_usuario` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pw` varchar(40) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo_tipo_usuario` int(10) NOT NULL,
  `estado_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `user`, `pw`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`, `estado_usuario`) VALUES
(1, 'tecnico', '1234', 'direccion1', '12344321', 'correo.com', 1, 0),
(2, 'tecnico2', '1234', 'direccion2', '12344321', 'correo.com', 3, 0),
(4, 'atecnico', 'hola', 'direccion3', '12344321', 'correo.com', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zonas`
--

CREATE TABLE IF NOT EXISTS `tbl_zonas` (
  `codigo_zona` int(10) NOT NULL,
  `numero_zona` int(10) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `punto_de_recoleccion` int(10) NOT NULL,
  `tipo_de_transaccion` int(10) NOT NULL,
  `produccion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_zonas`
--

INSERT INTO `tbl_zonas` (`codigo_zona`, `numero_zona`, `ubicacion`, `punto_de_recoleccion`, `tipo_de_transaccion`, `produccion`) VALUES
(1, 1, 'ubicacion1', 12, 12, 150),
(2, 2, 'ubicacion2', 13, 13, 160);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;