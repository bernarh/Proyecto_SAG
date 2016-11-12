-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2016 a las 22:56:40
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

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
  `codigo_registro` int(10) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `accion` varchar(1000) NOT NULL
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
(1, 'ORGANICO'),
(2, 'CONVENCIONAL');

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
  `fecha_ingreso_productor` datetime NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `estado_productor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `tbl_productores`
--
DELIMITER $$
CREATE TRIGGER `tr_nuevo_productor` AFTER INSERT ON `tbl_productores` FOR EACH ROW BEGIN
SELECT user INTO @nombre from tbl_usuarios where codigo_usuario =NEW.codigo_usuario;
INSERT INTO tbl_bitacora 
(codigo_registro, fecha, nombre_usuario, accion) 
VALUES ('',now() ,@nombre,
CONCAT('Se agrego un productor ','(',NEW.nombre_productor,',', NEW.telefono,',',NEW.ubicacion_exacta,',',
NEW.codigo_productor,',', NEW.fecha_ingreso_productor,') '));

END
$$
DELIMITER ;

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
  `codigo_tipo_produccion` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha_recoleccion` datetime NOT NULL,
  `codigo_tipo_transaccion` int(11) NOT NULL,
  `codigo_punto_recoleccion` int(11) NOT NULL,
  `estado_producto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `tbl_productores_x_producto`
--
DELIMITER $$
CREATE TRIGGER `tr_nuevo_precio` AFTER INSERT ON `tbl_productores_x_producto` FOR EACH ROW BEGIN 
SELECT user INTO @nombre from tbl_usuarios where codigo_usuario =NEW.codigo_usuario; 
INSERT INTO tbl_bitacora 
(codigo_registro, fecha, nombre_usuario, accion) 
VALUES ('',now() ,@nombre,
CONCAT('Se agrego el precio (cantidad, precio, codigo_productor,codigo_producto, fecha_ingreso )','(',NEW.cantidad,',', NEW.precio,',',NEW.codigo_productor,',',
NEW.codigo_producto,',', NEW.fecha_ingreso_producto,') '));

END
$$
DELIMITER ;

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
(1, 'BELLOTA', 3),
(2, 'BABA', 1),
(3, 'BABA', 2),
(4, 'FERMENTADO SECO', 1),
(5, 'FERMENTADO SECO', 2),
(6, 'SECO SIN FERMENTAR', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_punto_recoleccion`
--

CREATE TABLE `tbl_punto_recoleccion` (
  `codigo_punto_recoleccion` int(11) NOT NULL,
  `punto_recoleccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'tipo b', 1),
(3, 'tipo c', 2),
(3, 'tipo c', 2);

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
(3, 'tecnico'),
(2, 'director');

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
(1, 'COMPRA'),
(2, 'VENTA');

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
  `pw` varchar(1000) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `codigo_tipo_usuario` int(10) NOT NULL,
  `estado_usuario` int(1) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `codigo_usuario_ingreso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`codigo_usuario`, `user`, `pw`, `direccion`, `telefono`, `correo`, `codigo_tipo_usuario`, `estado_usuario`, `fecha_ingreso`, `codigo_usuario_ingreso`) VALUES
(5, 'admin', 'sEugYGNCGver6wz04/AB0I8OseIJhKS96KCGy0jtI6I=', 'correo1.com', '1234', 'correoelectronica.com', 1, 1, '2016-11-10 22:45:04', 0);

--
-- Disparadores `tbl_usuarios`
--
DELIMITER $$
CREATE TRIGGER `tr_nuevo_usuario` AFTER INSERT ON `tbl_usuarios` FOR EACH ROW BEGIN 
SELECT user INTO @nombre from tbl_usuarios where codigo_usuario =NEW.codigo_usuario_ingreso; 
INSERT INTO tbl_bitacora 
(codigo_registro, fecha, nombre_usuario, accion) 
VALUES ('',now() ,@nombre,
CONCAT('Se agrego un usuario (codigo_usuario, nombre_usuario) ','(',NEW.codigo_usuario,',', NEW.user,')'));

END
$$
DELIMITER ;

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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  ADD PRIMARY KEY (`codigo_registro`);

--
-- Indices de la tabla `tbl_codigo_tipo_produccion`
--
ALTER TABLE `tbl_codigo_tipo_produccion`
  ADD PRIMARY KEY (`codigo_tipo_produccion`);

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
  ADD UNIQUE KEY `codigo_productor` (`codigo_productor`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`codigo_producto`);

--
-- Indices de la tabla `tbl_punto_recoleccion`
--
ALTER TABLE `tbl_punto_recoleccion`
  ADD PRIMARY KEY (`codigo_punto_recoleccion`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`codigo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_bitacora`
--
ALTER TABLE `tbl_bitacora`
  MODIFY `codigo_registro` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_productores`
--
ALTER TABLE `tbl_productores`
  MODIFY `codigo_productor` int(19) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_punto_recoleccion`
--
ALTER TABLE `tbl_punto_recoleccion`
  MODIFY `codigo_punto_recoleccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `codigo_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
