-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-01-2020 a las 09:29:51
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `EMPRESA`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTES`
--

CREATE TABLE `CLIENTES` (
                            `CLIENTE_NO` int(4) NOT NULL,
                            `NOMBRE` varchar(25) DEFAULT NULL,
                            `LOCALIDAD` varchar(14) DEFAULT NULL,
                            `VENDEDOR_NO` int(4) DEFAULT NULL,
                            `DEBE` float(9,2) DEFAULT NULL,
                            `HABER` float(9,2) DEFAULT NULL,
                            `LIMITE_CREDITO` float(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CLIENTES`
--

INSERT INTO `CLIENTES` (`CLIENTE_NO`, `NOMBRE`, `LOCALIDAD`, `VENDEDOR_NO`, `DEBE`, `HABER`, `LIMITE_CREDITO`) VALUES
                                                                                                                   (101, 'DISTRIBUCIONES GOMEZ', 'MADRID', 7499, 0.00, 0.00, 5000.00),
                                                                                                                   (102, 'LOGITRONICA S.L', 'BARCELONA', 7654, 0.00, 0.00, 5000.00),
                                                                                                                   (103, 'INDUSTRIAS LACTEAS S.A.', 'LAS ROZAS', 7844, 0.00, 0.00, 10000.00),
                                                                                                                   (104, 'TALLERES ESTESO S.A.', 'SEVILLA', 7654, 0.00, 0.00, 5000.00),
                                                                                                                   (105, 'EDICIONES SANZ', 'BARCELONA', 7499, 0.00, 0.00, 5000.00),
                                                                                                                   (106, 'SIGNOLOGIC S.A.', 'MADRID', 7654, 0.00, 0.00, 7000.00),
                                                                                                                   (107, 'MARTIN Y ASOCIADOS S.L.', 'ARAVACA', 7844, 0.00, 0.00, 10000.00),
                                                                                                                   (108, 'MANUFACTURAS ALI S.A.', 'SEVILLA', 7654, 0.00, 0.00, 8000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DEPARTAMENTOS`
--

CREATE TABLE `DEPARTAMENTOS` (
                                 `DEP_NO` int(2) NOT NULL,
                                 `DNOMBRE` varchar(14) DEFAULT NULL,
                                 `LOCALIDAD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DEPARTAMENTOS`
--

INSERT INTO `DEPARTAMENTOS` (`DEP_NO`, `DNOMBRE`, `LOCALIDAD`) VALUES
                                                                   (10, 'CONTABILIDAD', 'BARCELONA'),
                                                                   (20, 'INVESTIGACION', 'VALENCIA'),
                                                                   (30, 'VENTAS', 'MADRID'),
                                                                   (40, 'PRODUCCION', 'SEVILLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPLEADOS`
--

CREATE TABLE `EMPLEADOS` (
                             `EMP_NO` int(4) NOT NULL,
                             `APELLIDO` varchar(8) DEFAULT NULL,
                             `OFICIO` varchar(10) DEFAULT NULL,
                             `DIRECTOR` int(4) DEFAULT NULL,
                             `FECHA_ALTA` date DEFAULT NULL,
                             `SALARIO` float(6,2) DEFAULT NULL,
                             `COMISION` float(6,2) DEFAULT NULL,
                             `DEP_NO` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `EMPLEADOS`
--

INSERT INTO `EMPLEADOS` (`EMP_NO`, `APELLIDO`, `OFICIO`, `DIRECTOR`, `FECHA_ALTA`, `SALARIO`, `COMISION`, `DEP_NO`) VALUES
                                                                                                                        (7499, 'ALONSO', 'VENDEDOR', 7698, '1981-02-23', 1400.00, 400.00, 30),
                                                                                                                        (7521, 'LOPEZ', 'EMPLEADO', 7782, '1981-05-08', 1362.50, NULL, 10),
                                                                                                                        (7654, 'MARTIN', 'VENDEDOR', 7698, '1981-09-28', 1500.00, 1600.00, 30),
                                                                                                                        (7698, 'GARRIDO', 'DIRECTOR', 7839, '1981-05-01', 3850.12, NULL, 30),
                                                                                                                        (7782, 'MARTINEZ', 'DIRECTOR', 7839, '1981-06-09', 2450.00, NULL, 10),
                                                                                                                        (7839, 'REY', 'PRESIDENTE', NULL, '1981-11-17', 6000.00, NULL, 10),
                                                                                                                        (7844, 'CALVO', 'VENDEDOR', 7698, '1981-09-08', 1800.00, 0.00, 30),
                                                                                                                        (7876, 'GIL', 'ANALISTA', 7782, '1982-05-06', 3350.00, NULL, 20),
                                                                                                                        (7900, 'JIMENEZ', 'EMPLEADO', 7782, '1983-03-24', 1412.00, NULL, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDOS`
--

CREATE TABLE `PEDIDOS` (
                           `PEDIDO_NO` int(4) NOT NULL,
                           `PRODUCTO_NO` int(4) NOT NULL,
                           `CLIENTE_NO` int(4) DEFAULT NULL,
                           `UNIDADES` int(4) DEFAULT NULL,
                           `FECHA_PEDIDO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PEDIDOS`
--

INSERT INTO `PEDIDOS` (`PEDIDO_NO`, `PRODUCTO_NO`, `CLIENTE_NO`, `UNIDADES`, `FECHA_PEDIDO`) VALUES
                                                                                                 (1000, 20, 103, 3, '2018-12-06'),
                                                                                                 (1001, 50, 106, 2, '2019-02-06'),
                                                                                                 (1002, 10, 101, 4, '2019-03-07'),
                                                                                                 (1003, 20, 105, 4, '2019-04-16'),
                                                                                                 (1005, 30, 105, 2, '2019-07-20'),
                                                                                                 (1006, 70, 103, 3, '2019-07-03'),
                                                                                                 (1007, 50, 101, 2, '2019-10-06'),
                                                                                                 (1008, 10, 106, 6, '2019-10-16'),
                                                                                                 (1009, 20, 105, 2, '2019-11-26'),
                                                                                                 (1011, 30, 106, 2, '2019-12-15'),
                                                                                                 (1012, 10, 105, 3, '2019-12-06'),
                                                                                                 (1013, 30, 106, 2, '2019-12-06'),
                                                                                                 (1014, 20, 101, 4, '2020-01-07'),
                                                                                                 (1015, 70, 105, 4, '2020-01-16'),
                                                                                                 (1017, 20, 105, 6, '2020-01-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTOS`
--

CREATE TABLE `PRODUCTOS` (
                             `PRODUCTO_NO` int(4) NOT NULL,
                             `DESCRIPCION` varchar(30) DEFAULT NULL,
                             `PRECIO_ACTUAL` float(8,2) DEFAULT NULL,
                             `STOCK_DISPONIBLE` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `PRODUCTOS`
--

INSERT INTO `PRODUCTOS` (`PRODUCTO_NO`, `DESCRIPCION`, `PRECIO_ACTUAL`, `STOCK_DISPONIBLE`) VALUES
                                                                                                (10, 'MESA DESPACHO MOD. GAVIOTA', 550.00, 50),
                                                                                                (20, 'SILLA DIRECTOR MOD. BUFALO', 670.00, 25),
                                                                                                (30, 'ARMARIO NOGAL DOS PUERTAS', 460.00, 20),
                                                                                                (50, 'ARCHIVADOR CEREZO', 1050.00, 20),
                                                                                                (60, 'CAJA SEGURIDAD MOD B222', 280.00, 15),
                                                                                                (70, 'DESTRUCTORA DE PAPEL A3', 450.00, 25),
                                                                                                (80, 'MODULO ORDENADOR MOD. ERGOS', 550.00, 25);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
    ADD PRIMARY KEY (`CLIENTE_NO`),
    ADD KEY `FK_CLI_EMP_NO` (`VENDEDOR_NO`);

--
-- Indices de la tabla `DEPARTAMENTOS`
--
ALTER TABLE `DEPARTAMENTOS`
    ADD PRIMARY KEY (`DEP_NO`);

--
-- Indices de la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
    ADD PRIMARY KEY (`EMP_NO`),
    ADD KEY `FK_EMP_DIRECTOR` (`DIRECTOR`),
    ADD KEY `FK_EMP_DEP_NO` (`DEP_NO`);

--
-- Indices de la tabla `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
    ADD PRIMARY KEY (`PEDIDO_NO`,`PRODUCTO_NO`),
    ADD KEY `FK_PEDIDOS_PRODUCTO_NO` (`PRODUCTO_NO`),
    ADD KEY `FK_PEDIDOS_CLIENTE_NO` (`CLIENTE_NO`);

--
-- Indices de la tabla `PRODUCTOS`
--
ALTER TABLE `PRODUCTOS`
    ADD PRIMARY KEY (`PRODUCTO_NO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
    ADD CONSTRAINT `FK_CLI_EMP_NO` FOREIGN KEY (`VENDEDOR_NO`) REFERENCES `EMPLEADOS` (`EMP_NO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
    ADD CONSTRAINT `FK_EMP_DEP_NO` FOREIGN KEY (`DEP_NO`) REFERENCES `DEPARTAMENTOS` (`DEP_NO`) ON UPDATE CASCADE,
    ADD CONSTRAINT `FK_EMP_DIRECTOR` FOREIGN KEY (`DIRECTOR`) REFERENCES `EMPLEADOS` (`EMP_NO`) ON DELETE CASCADE;

--
-- Filtros para la tabla `PEDIDOS`
--
ALTER TABLE `PEDIDOS`
    ADD CONSTRAINT `FK_PEDIDOS_CLIENTE_NO` FOREIGN KEY (`CLIENTE_NO`) REFERENCES `CLIENTES` (`CLIENTE_NO`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_PEDIDOS_PRODUCTO_NO` FOREIGN KEY (`PRODUCTO_NO`) REFERENCES `PRODUCTOS` (`PRODUCTO_NO`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;