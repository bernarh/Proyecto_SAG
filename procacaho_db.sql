-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2016 a las 08:46:04
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `procacaho_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

CREATE TABLE `tbl_bitacora` (
  `codigo_registro` int(100) NOT NULL,
  `codigo_usuario` int(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `comentario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_municipios`
--

CREATE TABLE `tbl_municipios` (
  `codigo_municipio` int(10) NOT NULL,
  `nombre_municipio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `ubicacion_exacta` varchar(50) NOT NULL,
  `supervisor_de_zona` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `codigo_producto` int(10) NOT NULL,
  `codigo_productor` int(10) NOT NULL,
  `codigo_tipo_transaccion` int(10) NOT NULL,
  `codigo_tipo_cacao` int(11) NOT NULL,
  `codigo_tipo_produccion` int(11) NOT NULL,
  `volumen` double(10,2) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `fecha_ingreso_producto` datetime NOT NULL,
  `comentarios` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='aca se almacena la informacion general de cada producto ingresado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_de_cacao`
--

CREATE TABLE `tbl_tipos_de_cacao` (
  `codigo_tipo_cacao` int(10) NOT NULL,
  `nombre_tipo_cacao` varchar(15) NOT NULL,
  `codigo_unidad_de_medida` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_produccion`
--

CREATE TABLE `tbl_tipo_produccion` (
  `codigo_tipo_produccion` int(10) NOT NULL,
  `tipo_produccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_transaccion`
--

CREATE TABLE `tbl_tipo_transaccion` (
  `codigo_tipo_transaccion` int(11) NOT NULL,
  `tipo_transaccion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_usuario`
--

CREATE TABLE `tbl_tipo_usuario` (
  `codigo_tipo_usuario` int(10) NOT NULL,
  `nombre_tipo_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_usuario`
--

INSERT INTO `tbl_tipo_usuario` (`codigo_tipo_usuario`, `nombre_tipo_usuario`) VALUES
(1, 'técnico digitador'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_unidad_de_medida`
--

CREATE TABLE `tbl_unidad_de_medida` (
  `codigo_unidad_de_medida` int(10) NOT NULL,
  `nombre_unidad_de_medida` varchar(20) NOT NULL,
  `abreviatura` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `codigo_usuario` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pw` varchar(40) NOT NULL,
  `codigo_tipo_usuario` int(10) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_zonas`
--

CREATE TABLE `tbl_zonas` (
  `codigo_zona` int(10) NOT NULL,
  `ubicacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`codigo_registro`),
  ADD KEY `codigo_usuario` (`codigo_usuario`);

--
-- Indices de la tabla `tbl_municipios`
--
ALTER TABLE `tbl_municipios`
  ADD PRIMARY KEY (`codigo_municipio`);

--
-- Indices de la tabla `tbl_productores`
--
ALTER TABLE `tbl_productores`
  ADD PRIMARY KEY (`codigo_productor`),
  ADD KEY `codigo_zona` (`codigo_zona`),
  ADD KEY `codigo_municipio` (`codigo_municipio`),
  ADD KEY `ubicacion_exacta` (`ubicacion_exacta`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `codigo_tipo_produccion` (`codigo_tipo_produccion`),
  ADD KEY `codigo_tipo_cacao` (`codigo_tipo_cacao`),
  ADD KEY `codigo_tipo_transaccion` (`codigo_tipo_transaccion`),
  ADD KEY `codigo_productor` (`codigo_productor`);

--
-- Indices de la tabla `tbl_tipos_de_cacao`
--
ALTER TABLE `tbl_tipos_de_cacao`
  ADD PRIMARY KEY (`codigo_tipo_cacao`),
  ADD KEY `codigo_unidad_de_medida` (`codigo_unidad_de_medida`);

--
-- Indices de la tabla `tbl_tipo_produccion`
--
ALTER TABLE `tbl_tipo_produccion`
  ADD PRIMARY KEY (`codigo_tipo_produccion`);

--
-- Indices de la tabla `tbl_tipo_transaccion`
--
ALTER TABLE `tbl_tipo_transaccion`
  ADD PRIMARY KEY (`codigo_tipo_transaccion`);

--
-- Indices de la tabla `tbl_tipo_usuario`
--
ALTER TABLE `tbl_tipo_usuario`
  ADD PRIMARY KEY (`codigo_tipo_usuario`);

--
-- Indices de la tabla `tbl_unidad_de_medida`
--
ALTER TABLE `tbl_unidad_de_medida`
  ADD PRIMARY KEY (`codigo_unidad_de_medida`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`codigo_usuario`),
  ADD KEY `codigo_tipo_usuario` (`codigo_tipo_usuario`);

--
-- Indices de la tabla `tbl_zonas`
--
ALTER TABLE `tbl_zonas`
  ADD PRIMARY KEY (`codigo_zona`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD CONSTRAINT `tbl_bitacora_ibfk_1` FOREIGN KEY (`codigo_usuario`) REFERENCES `tbl_usuarios` (`codigo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_productores`
--
ALTER TABLE `tbl_productores`
  ADD CONSTRAINT `tbl_productores_ibfk_1` FOREIGN KEY (`codigo_zona`) REFERENCES `tbl_zonas` (`codigo_zona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_productores_ibfk_2` FOREIGN KEY (`codigo_municipio`) REFERENCES `tbl_municipios` (`codigo_municipio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD CONSTRAINT `tbl_productos_ibfk_1` FOREIGN KEY (`codigo_tipo_produccion`) REFERENCES `tbl_tipo_produccion` (`codigo_tipo_produccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_productos_ibfk_2` FOREIGN KEY (`codigo_tipo_transaccion`) REFERENCES `tbl_tipo_transaccion` (`codigo_tipo_transaccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_productos_ibfk_3` FOREIGN KEY (`codigo_productor`) REFERENCES `tbl_productores` (`codigo_productor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_productos_ibfk_4` FOREIGN KEY (`codigo_tipo_cacao`) REFERENCES `tbl_tipos_de_cacao` (`codigo_tipo_cacao`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_tipos_de_cacao`
--
ALTER TABLE `tbl_tipos_de_cacao`
  ADD CONSTRAINT `tbl_tipos_de_cacao_ibfk_1` FOREIGN KEY (`codigo_unidad_de_medida`) REFERENCES `tbl_unidad_de_medida` (`codigo_unidad_de_medida`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`codigo_tipo_usuario`) REFERENCES `tbl_tipo_usuario` (`codigo_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
