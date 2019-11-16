-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2019 a las 06:01:11
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electivas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activid`
--

CREATE TABLE `activid` (
  `id_act` int(11) NOT NULL,
  `name_act` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cupo` int(5) NOT NULL,
  `cred_act` int(2) NOT NULL,
  `id_inter` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO ASIGNADO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `activid`
--

INSERT INTO `activid` (`id_act`, `name_act`, `description`, `cupo`, `cred_act`, `id_inter`) VALUES
(1, 'TEST', 'PRUEBA DE LLAVES FORANEAS', 50, 2, 'UPIICSA'),
(2, 'probando', 'el codigo ya jala :3', 7, 12, '1234'),
(3, 'querer', 'dormir', 7, 2, 'UPIICSA'),
(4, 'como', 'estas', 5, 6, '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `ap` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `password`, `name`, `ap`) VALUES
('2011130598', 'pass', 'Ricardo', 'Jimenez Chavez'),
('201130598', 'pass', 'Ricardo', 'Jimenez Chavez'),
('admin', 'pass', 'prueba', 'p'),
('aide', 'leches', 'aide', 'cruz'),
('erika', 'flaca', 'aidecita', 'mil cruz'),
('turrom', 'romi', 'bebe', 'baby'),
('validar', 'xc', 'admin', 'pass');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu`
--

CREATE TABLE `alu` (
  `boleta` int(10) NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name_a` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `ap_a` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `cred` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alu`
--

INSERT INTO `alu` (`boleta`, `password`, `name_a`, `ap_a`, `cred`) VALUES
(2, '', 'sdghj', 'sdghjkl', 0),
(4, '4', 'cuatro', 'cuatro', 0),
(1558, 'pass', 'w', 'd', 0),
(20000, 'pass', 'aidecita', 'mil cruz', 0),
(201213, '', 'erika', 'cruz', 7),
(2016600853, '22', 'Alejandra', 'Jimenez Chavez', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alu_act`
--

CREATE TABLE `alu_act` (
  `id_bol_act` int(11) NOT NULL,
  `boleta` int(10) NOT NULL,
  `id_act` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `alu_act`
--

INSERT INTO `alu_act` (`id_bol_act`, `boleta`, `id_act`) VALUES
(101, 2016600853, 1),
(102, 2, 1),
(103, 4, 1),
(104, 20000, 3),
(110, 2, 4),
(111, 4, 4),
(112, 2016600853, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inter`
--

CREATE TABLE `inter` (
  `id_inter` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name_inter` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `ap_inter` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `inter`
--

INSERT INTO `inter` (`id_inter`, `password`, `name_inter`, `ap_inter`) VALUES
('0', '', 'SIN', 'ASIGNAR'),
('123', '', 'aide', 'mil cruz'),
('1234', '2903', 'test', 'prueba'),
('UPIICSA', '', 'escuela', 'ipn');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activid`
--
ALTER TABLE `activid`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `id_inter` (`id_inter`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `alu`
--
ALTER TABLE `alu`
  ADD PRIMARY KEY (`boleta`);

--
-- Indices de la tabla `alu_act`
--
ALTER TABLE `alu_act`
  ADD PRIMARY KEY (`id_bol_act`),
  ADD KEY `boleta` (`boleta`),
  ADD KEY `id_act` (`id_act`);

--
-- Indices de la tabla `inter`
--
ALTER TABLE `inter`
  ADD PRIMARY KEY (`id_inter`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activid`
--
ALTER TABLE `activid`
  MODIFY `id_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activid`
--
ALTER TABLE `activid`
  ADD CONSTRAINT `activid_ibfk_1` FOREIGN KEY (`id_inter`) REFERENCES `inter` (`id_inter`);

--
-- Filtros para la tabla `alu_act`
--
ALTER TABLE `alu_act`
  ADD CONSTRAINT `alu_act_ibfk_1` FOREIGN KEY (`boleta`) REFERENCES `alu` (`boleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alu_act_ibfk_2` FOREIGN KEY (`id_act`) REFERENCES `activid` (`id_act`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
