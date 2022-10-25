-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2021 a las 22:00:07
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lebarberia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cliente_ID` int(11) NOT NULL,
  `Cliente_nombres` varchar(50) NOT NULL,
  `Cliente_telefono` varchar(11) NOT NULL,
  `Cliente_direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cliente_ID`, `Cliente_nombres`, `Cliente_telefono`, `Cliente_direccion`) VALUES
(1, 'Julian Quiroga', '3105448902', 'calle 80 numero 65-80 conjunto gibraltar bogota'),
(2, 'Juan Perez', '3212045673', 'cra2 b numero 76-42 chapinero bogota'),
(3, 'fabian perez', '3223456234', 'calle 3'),
(4, 'rosa maria', '3112345612', 'calle5'),
(5, 'juan ortega', '3223334144', 'calle6'),
(6, 'juan mecanico', '3456789120', 'calle1'),
(7, 'juanpis rivera', '3000000000', 'calle 23'),
(10, 'simon talomeo', '4000000000', 'calle 22'),
(1242, 'ricardo ojeda', '300001288', 'calle 34 a sur'),
(1247, 'daniela', '32132165', 'calle 34'),
(1254, 'felipe urtado', '300001255', 'calle 15'),
(1255, 'benito', '32132165', 'calle 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Emple_ID` int(11) NOT NULL,
  `Emple_nombres` varchar(50) NOT NULL,
  `Emple_telefono` varchar(20) NOT NULL,
  `Emple_direccion` varchar(50) NOT NULL,
  `Emple_eps` varchar(30) NOT NULL,
  `Emple_fech_nacimiento` date NOT NULL,
  `Emple_salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Emple_ID`, `Emple_nombres`, `Emple_telefono`, `Emple_direccion`, `Emple_eps`, `Emple_fech_nacimiento`, `Emple_salario`) VALUES
(1000, 'Miguel Arevalo', '3106050789', 'calle 94 este numero 94-72 barrio el rosario bogot', 'famisanar', '1990-10-05', 1014980),
(2000, 'manuel', '3002405763', 'calle 76 numero 44-57 santa isabel bogota	', 'compensar', '2007-07-18', 88888),
(3000, 'venito ramirez', '3212222128', 'cra77', 'compensar', '1998-03-02', 999999),
(4000, 'william ferney', '3120009890', 'cra12', 'saludtotal', '1998-12-09', 899999),
(5000, 'esperanza', '3456789120', 'calle1', 'confa', '2021-06-10', 900),
(6173, 'marcela', '3223915810', 'calle 34 a sur n13-55', 'compensar', '2000-07-21', 1290000),
(6175, 'fernan', '3132548987', 'calle 34 a sur n13-99', 'salud total', '1996-06-14', 1500000),
(6178, 'jhon', '3001006001', 'calle12', 'compensar', '2021-07-19', 6161);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idproducto` int(11) NOT NULL,
  `Producto_Nombre` varchar(45) NOT NULL,
  `Producto_tipo` varchar(45) DEFAULT NULL,
  `Producto_cantidad_actual` int(11) DEFAULT NULL,
  `Producto_precio` int(11) NOT NULL,
  `Producto_fecha_entrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idproducto`, `Producto_Nombre`, `Producto_tipo`, `Producto_cantidad_actual`, `Producto_precio`, `Producto_fecha_entrada`) VALUES
(123, 'cremaflan', 'crema', 110, 0, '2021-01-20'),
(124, 'gorilla', 'gel', 85, 0, '2021-01-20'),
(125, 'cepillo', 'cepillo', 60, 0, '2021-01-20'),
(126, 'savital', 'shampoo', 201, 0, '2021-01-20'),
(127, 'moquillo', 'gel', 47, 0, '2021-01-20'),
(128, 'palmolive', 'crema', 310, 0, '2021-01-20'),
(129, 'tintura', 'crema', 220, 0, '2021-01-20'),
(130, 'tintura', 'crema', 220, 0, '2021-02-01'),
(137, 'barbera', 'navaja', 0, 200000, '2021-09-02'),
(138, 'jabon barba', 'jabon', 0, 30000, '2021-09-04'),
(139, 'crema de peinar', 'crema', 300, 300000, '2021-09-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Pedidos_ID` int(11) NOT NULL,
  `Proveedor_ID` int(11) NOT NULL,
  `Producto_ID` int(11) NOT NULL,
  `Fecha_Pedido` date DEFAULT NULL,
  `Cantidad_Pedido` int(11) DEFAULT NULL,
  `Valor_Pedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Pedidos_ID`, `Proveedor_ID`, `Producto_ID`, `Fecha_Pedido`, `Cantidad_Pedido`, `Valor_Pedido`) VALUES
(100001, 1230000001, 126, '2021-01-09', 95, 95000),
(100003, 1888888884, 123, '2021-01-09', 52, 52000),
(100004, 1000920, 123, '2021-02-01', 15, 15000),
(100007, 1000920, 124, '2021-04-18', 14, 14000),
(100008, 1000920, 124, '2021-03-11', 11, 11000),
(100023, 1230000001, 125, '2021-03-05', 10, 5000),
(100024, 1230000001, 123, '2021-07-02', 11, 1000),
(100025, 1230000001, 123, '2021-07-02', 11, 1000),
(100026, 1230000001, 123, '2021-07-02', 11, 1000),
(100040, 1000920, 123, '0000-00-00', 10, 25000),
(100046, 1000000002, 130, '2021-09-04', 10, 100000),
(100052, 1999999994, 126, '2021-09-09', 10, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Proveedor_ID` int(11) NOT NULL,
  `Proveedor_Nombre` varchar(45) NOT NULL,
  `Proveedor_Telefono` varchar(20) DEFAULT NULL,
  `Proveedor_Direccion` varchar(45) DEFAULT NULL,
  `Proveedor_Email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Proveedor_ID`, `Proveedor_Nombre`, `Proveedor_Telefono`, `Proveedor_Direccion`, `Proveedor_Email`) VALUES
(1000920, 'dayanaa', '3456789120', 'calle 34', 'lorena@hotmail.com'),
(1000000002, 'paulaa', '3222222210', 'cra99a', 'paula@gmail.com'),
(1230000001, 'giselle', '3100009010', 'cra100b', 'giselle@gmail.com'),
(1888888884, 'nicol', '3122222229', 'calle89a', 'nicol@gmail.com'),
(1999999993, 'paola', '3211111110', 'calle65b', 'paola@gmail.com'),
(1999999994, 'lore', '321321313', 'clle01', 'lorem@hotmail.com'),
(2000000010, 'pedro', '3001006001', 'calle1', 'pedro@hotmail.com'),
(2000000011, 'nancy', '3', 'calle12', 'lorena@hotmail.com'),
(2000000012, 'nancy', '3132548987', 'calle2', 'nancyh@hotmail.com'),
(2000000013, 'nancy', '3', '', ''),
(2000000014, 'florian', '3132548987', 'calle', 'florian@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passwordUsuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `passwordUsuario`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'gerente', 'gerente', 'gerente', 2),
(15, 'empleado', 'empleado', 'empleado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `Emple_ID` int(11) NOT NULL,
  `Cliente_ID` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `Venta_fecha` date DEFAULT NULL,
  `Venta_cant` int(11) NOT NULL,
  `Vent_Valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idVentas`, `Emple_ID`, `Cliente_ID`, `idproducto`, `Venta_fecha`, `Venta_cant`, `Vent_Valor`) VALUES
(1100, 1000, 1, 124, '2021-03-20', 0, 10000),
(1101, 3000, 3, 124, '2021-03-21', 14, 14000),
(1104, 1000, 2, 123, '2021-04-02', 0, 14000),
(1106, 2000, 1, 124, '2021-04-02', 0, 11000),
(1130, 4000, 2, 123, '2021-07-09', 0, 4435435),
(1162, 6175, 4, 138, '2021-09-23', 2, 2000),
(1163, 6178, 1242, 137, '2021-09-16', 2, 10000),
(1164, 6175, 10, 139, '2021-09-17', 3, 3000),
(1165, 6175, 7, 137, '2021-09-16', 3, 15000),
(1167, 6175, 3, 125, '2021-09-22', 1, 3000),
(1168, 6173, 7, 130, '2021-09-18', 2, 20000),
(1169, 1000, 1, 123, '2021-09-10', 10, 55555);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cliente_ID`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Emple_ID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Pedidos_ID`),
  ADD KEY `Producto_ID_idx` (`Producto_ID`),
  ADD KEY `Proveedor_ID_idx` (`Proveedor_ID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Proveedor_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`),
  ADD KEY `Emple_ID_idx` (`Emple_ID`),
  ADD KEY `Cliente_ID_idx` (`Cliente_ID`),
  ADD KEY `idproducto_idx` (`idproducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Cliente_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1256;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Emple_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6181;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Pedidos_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100053;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Proveedor_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000015;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1172;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_producto_id` FOREIGN KEY (`Producto_ID`) REFERENCES `inventario` (`idproducto`),
  ADD CONSTRAINT `FK_proveedor_id` FOREIGN KEY (`Proveedor_ID`) REFERENCES `proveedor` (`Proveedor_ID`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `FK_idcliente` FOREIGN KEY (`Cliente_ID`) REFERENCES `clientes` (`Cliente_ID`),
  ADD CONSTRAINT `FK_idempleado` FOREIGN KEY (`Emple_ID`) REFERENCES `empleados` (`Emple_ID`),
  ADD CONSTRAINT `FK_idproducto` FOREIGN KEY (`idproducto`) REFERENCES `inventario` (`idproducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
