-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2016 a las 05:39:23
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `codigo_registro` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion_realizada` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_codigo_tipo_produccion`
--

CREATE TABLE `tbl_codigo_tipo_produccion` (
  `codigo_tipo_produccion` int(10) NOT NULL,
  `tipo_produccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_codigo_tipo_produccion`
--

INSERT INTO `tbl_codigo_tipo_produccion` (`codigo_tipo_produccion`, `tipo_produccion`) VALUES
(1, 'tipo produccion 1'),
(2, 'tipo produccion 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

CREATE TABLE `tbl_municipios` (
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

CREATE TABLE `tbl_productores` (
  `codigo_productor` int(19) NOT NULL,
  `nombre_productor` varchar(30) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo_zona` int(10) NOT NULL,
  `codigo_municipio` int(10) NOT NULL,
  `ubicacion_exacta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productores`
--

INSERT INTO `tbl_productores` (`codigo_productor`, `nombre_productor`, `telefono`, `correo`, `codigo_zona`, `codigo_municipio`, `ubicacion_exacta`) VALUES
(1, 'nombre productor 1', '12344321', 'correo.com', 1, 1, 'ubicacion exacta 1'),
(2, 'nombre productor 2', '12344321', 'correo.com', 2, 2, 'ubicacion exacta 2'),
(3, 'nombre productor 2', '12344321', 'correo.com', 2, 2, 'ubicacion exacta 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productores_x_producto`
--

CREATE TABLE `tbl_productores_x_producto` (
  `codigo_productor` int(10) NOT NULL,
  `codigo_producto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `fecha_ingreso_producto` datetime NOT NULL,
  `codigo_tipo_produccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productores_x_producto`
--

INSERT INTO `tbl_productores_x_producto` (`codigo_productor`, `codigo_producto`, `cantidad`, `precio`, `fecha_ingreso_producto`, `codigo_tipo_produccion`) VALUES
(1, 1, 150, 10.00, '2016-10-17 12:36:03', 0),
(1, 2, 120, 11.00, '2016-10-07 09:12:04', 0),
(2, 1, 111, 9.00, '2016-10-06 06:02:02', 0),
(1, 2, 10, 8.50, '2016-10-25 02:13:17', 0),
(2, 2, 123, 12.00, '2016-10-23 00:00:00', 0),
(1, 2, 1, 10.00, '2016-10-06 02:19:18', 0),
(2, 2, 2, 9.00, '2016-10-25 00:00:00', 0),
(1, 1, 100, 20.00, '2016-10-08 08:00:00', 1),
(1, 4, 100, 12.00, '2016-10-08 09:00:00', 1),
(1, 1, 10, 12.00, '2016-10-08 09:00:00', 1),
(1, 2, 200, 45.00, '2016-10-29 00:00:00', 2),
(0, 2, 1234, 1234.00, '2016-10-08 00:00:00', 2),
(1, 1, 1, 1.00, '2016-10-08 00:00:00', 2),
(0, 1, 66, 66.00, '2016-10-09 00:00:00', 2),
(1, 0, 66, 12.00, '2016-10-09 00:00:00', 2),
(1, 1, 66, 66.00, '2016-10-09 00:00:00', 2),
(0, 2, 65, 65.00, '2016-10-09 00:00:00', 2),
(1, 1, 768, 45.00, '2016-10-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productores_x_usuarios`
--

CREATE TABLE `tbl_productores_x_usuarios` (
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

CREATE TABLE `tbl_productos` (
  `codigo_producto` int(10) NOT NULL,
  `descripcion_producto` varchar(50) NOT NULL,
  `codigo_tipo_cacao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`codigo_producto`, `descripcion_producto`, `codigo_tipo_cacao`) VALUES
(1, 'descripcion producto 1', 1),
(2, 'descripcion producto 2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_de_cacao`
--

CREATE TABLE `tbl_tipos_de_cacao` (
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

CREATE TABLE `tbl_tipos_usuario` (
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

CREATE TABLE `tbl_tipo_transaccion` (
  `codigo_tipo_transaccion` int(11) NOT NULL,
  `tipo_transaccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_transaccion`
--

INSERT INTO `tbl_tipo_transaccion` (`codigo_tipo_transaccion`, `tipo_transaccion`) VALUES
(1, 'tipo trans'),
(2, 'tipo trans'),
(3, 'tra1'),
(4, 'tra2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_unidad_de_medida`
--

CREATE TABLE `tbl_unidad_de_medida` (
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

CREATE TABLE `tbl_usuarios` (
  `codigo_usuario` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pw` varchar(40) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo_tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `user`, `pw`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`) VALUES
(1, 'tecnico', '1234', 'direccion1', '12344321', 'correo.com', 1),
(2, 'tecnico2', '1234', 'direccion2', '12344321', 'correo.com', 3),
(4, 'atecnico', '4321', 'direccion3', '12344321', 'correo.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zonas`
--

CREATE TABLE `tbl_zonas` (
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`codigo_registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  MODIFY `codigo_registro` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
