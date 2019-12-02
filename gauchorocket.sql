-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 01:47:10
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gauchorocket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabina`
--

CREATE TABLE `cabina` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cabina`
--

INSERT INTO `cabina` (`id`, `descripcion`) VALUES
(1, 'General'),
(2, 'Familiar'),
(3, 'Suite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_medico`
--

CREATE TABLE `centro_medico` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `turnos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `centro_medico`
--

INSERT INTO `centro_medico` (`id`, `nombre`, `turnos`) VALUES
(1, 'Buenos Aires', 300),
(2, 'Shangai', 210),
(3, 'Ankara', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `circuito`
--

CREATE TABLE `circuito` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `circuito`
--

INSERT INTO `circuito` (`id`, `descripcion`) VALUES
(1, 'trayecto1'),
(2, 'trayecto2'),
(3, 'trayecto3'),
(4, 'trayecto4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `nombre`, `tipo_cliente`, `usuario`, `telefono`, `foto`, `fecha_nacimiento`) VALUES
(9, 'Root', 1, 6, '1111-1111', NULL, '1994-08-27'),
(13, 'Isaias', 3, 10, '1130394046', ' ', '1994-08-27'),
(17, NULL, NULL, 14, NULL, NULL, NULL),
(18, NULL, NULL, 15, NULL, NULL, NULL),
(19, NULL, NULL, 16, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locacion`
--

CREATE TABLE `locacion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `locacion`
--

INSERT INTO `locacion` (`id`, `descripcion`) VALUES
(1, 'EEI'),
(2, 'Luna'),
(3, 'Ganimedes'),
(4, 'Marte'),
(5, 'Io'),
(6, 'Encedalo'),
(7, 'Titan'),
(8, 'Buenos Aires'),
(9, 'Ankara'),
(10, 'Orbital Hotel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_vuelo` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `descripcion`, `tipo_vuelo`, `capacidad`) VALUES
(1, 'Calandria', 1, 300),
(2, 'Colibri', 1, 120),
(3, 'Zorzal', 2, 100),
(4, 'Carancho', 2, 110),
(5, 'Aguilucho', 2, 60),
(6, 'Canario', 2, 80),
(7, 'Aguila', 3, 300),
(8, 'Condor', 3, 350),
(9, 'Halcon', 3, 200),
(10, 'Guanaco', 3, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_cabina`
--

CREATE TABLE `modelo_cabina` (
  `id` int(11) NOT NULL,
  `modelo` int(11) NOT NULL,
  `cabina` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelo_cabina`
--

INSERT INTO `modelo_cabina` (`id`, `modelo`, `cabina`, `capacidad`) VALUES
(1, 1, 1, 200),
(2, 1, 2, 75),
(3, 1, 3, 25),
(4, 2, 1, 100),
(5, 2, 2, 18),
(6, 2, 3, 2),
(7, 3, 1, 50),
(8, 3, 3, 50),
(9, 4, 1, 110),
(10, 5, 2, 50),
(11, 5, 3, 10),
(12, 6, 2, 70),
(13, 6, 3, 10),
(14, 7, 1, 200),
(15, 7, 2, 75),
(16, 7, 3, 25),
(17, 8, 1, 300),
(18, 8, 2, 10),
(19, 8, 3, 40),
(20, 9, 1, 150),
(21, 9, 2, 25),
(22, 9, 3, 25),
(23, 10, 3, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave`
--

CREATE TABLE `nave` (
  `id` int(11) NOT NULL,
  `matricula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nave`
--

INSERT INTO `nave` (`id`, `matricula`, `modelo`) VALUES
(1, 'AA1', 7),
(2, 'AA5', 7),
(3, 'AA9', 7),
(4, 'AA13', 7),
(5, 'AA17', 7),
(6, 'BA8', 5),
(7, 'BA9', 5),
(8, 'BA10', 5),
(9, 'BA11', 5),
(10, 'BA12', 5),
(11, 'O1', 1),
(12, 'O2', 1),
(13, 'O6', 1),
(14, 'O7', 1),
(15, 'BA13', 6),
(16, 'BA14', 6),
(17, 'BA15', 6),
(18, 'BA16', 6),
(19, 'BA17', 6),
(20, 'BA5', 4),
(21, 'BA6', 4),
(22, 'BA7', 4),
(23, 'O3', 2),
(24, 'O4', 2),
(25, 'O5', 2),
(26, 'O8', 2),
(27, 'O9', 2),
(28, 'AA2', 8),
(29, 'AA6', 8),
(30, 'AA10', 8),
(31, 'AA14', 8),
(32, 'AA18', 8),
(33, 'AA4', 10),
(34, 'AA8', 10),
(35, 'AA12', 10),
(36, 'AA16', 10),
(37, 'AA3', 9),
(38, 'AA7', 9),
(39, 'AA11', 9),
(40, 'AA15', 9),
(41, 'AA19', 9),
(42, 'BA1', 3),
(43, 'BA2', 3),
(44, 'BA3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasaje`
--

CREATE TABLE `pasaje` (
  `id` int(11) NOT NULL,
  `vuelo` int(11) UNSIGNED NOT NULL,
  `cliente` int(11) NOT NULL,
  `reserva` tinyint(1) DEFAULT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `checkin` tinyint(1) DEFAULT NULL,
  `fecha_checkin` datetime DEFAULT NULL,
  `compra` tinyint(1) DEFAULT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `cabina` int(11) NOT NULL,
  `servicio` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `espera` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pasaje`
--

INSERT INTO `pasaje` (`id`, `vuelo`, `cliente`, `reserva`, `fecha_reserva`, `checkin`, `fecha_checkin`, `compra`, `fecha_compra`, `codigo`, `precio`, `cabina`, `servicio`, `origen`, `destino`, `espera`) VALUES
(111, 23, 13, 1, '2019-12-01 01:25:13', NULL, NULL, 1, '2019-12-01 01:30:20', '5cd2edf357', '300', 3, 3, 9, 2, 0),
(112, 23, 17, 1, '2019-12-01 01:25:16', NULL, NULL, NULL, NULL, '5cd2edf357', '300', 3, 3, 9, 2, 0),
(113, 24, 13, 1, '2019-12-01 01:26:33', NULL, NULL, 1, '2019-12-01 01:30:28', 'b6188b8d76', '250', 1, 2, 8, 7, 0),
(114, 24, 18, 1, '2019-12-01 01:26:37', NULL, NULL, NULL, NULL, 'b6188b8d76', '250', 1, 2, 8, 7, 0),
(115, 24, 19, 1, '2019-12-01 01:26:37', NULL, NULL, NULL, NULL, 'b6188b8d76', '250', 1, 2, 8, 7, 0),
(116, 22, 13, 1, '2019-12-01 01:26:53', NULL, NULL, 1, '2019-12-01 01:30:38', '0ee1646419', '200', 2, 1, 8, 8, 0),
(117, 22, 18, 1, '2019-12-01 01:26:57', NULL, NULL, NULL, NULL, '0ee1646419', '200', 2, 1, 8, 8, 0),
(118, 22, 19, 1, '2019-12-01 01:26:57', NULL, NULL, NULL, NULL, '0ee1646419', '200', 2, 1, 8, 8, 0),
(119, 22, 13, 1, '2019-12-01 01:27:24', NULL, NULL, 1, '2019-12-01 01:30:48', '6a79670735', '200', 2, 2, 8, 8, 0),
(120, 22, 18, 1, '2019-12-01 01:27:26', NULL, NULL, NULL, NULL, '6a79670735', '200', 2, 2, 8, 8, 0),
(121, 23, 13, 1, '2019-12-01 01:27:35', NULL, NULL, NULL, NULL, 'fbc86afb64', '200', 2, 2, 9, 9, 0),
(122, 23, 18, 1, '2019-12-01 01:27:38', NULL, NULL, NULL, NULL, 'fbc86afb64', '200', 2, 2, 9, 9, 0),
(123, 24, 13, 1, '2019-12-01 01:56:08', NULL, NULL, NULL, NULL, '3c909c309b', '250', 1, 2, 8, 7, 0),
(124, 24, 18, 1, '2019-12-01 01:56:11', NULL, NULL, NULL, NULL, '3c909c309b', '250', 1, 2, 8, 7, 0),
(125, 24, 13, 1, '2019-12-01 01:58:42', NULL, NULL, NULL, NULL, 'c594bbe41e', '250', 1, 3, 8, 7, 0),
(126, 24, 18, 1, '2019-12-01 01:58:45', NULL, NULL, NULL, NULL, 'c594bbe41e', '250', 1, 3, 8, 7, 0),
(127, 22, 13, 1, '2019-12-01 02:03:25', NULL, NULL, NULL, NULL, '87d6754495', '250', 1, 1, 8, 2, 0),
(128, 22, 18, 1, '2019-12-01 02:03:28', NULL, NULL, NULL, NULL, '87d6754495', '250', 1, 1, 8, 2, 0),
(129, 23, 13, 1, '2019-12-01 02:03:52', NULL, NULL, NULL, NULL, 'bd4bd7d8ba', '300', 3, 2, 9, 9, 0),
(130, 23, 17, 1, '2019-12-01 02:03:54', NULL, NULL, NULL, NULL, 'bd4bd7d8ba', '300', 3, 2, 9, 9, 0),
(131, 24, 13, 1, '2019-12-01 02:05:57', NULL, NULL, NULL, NULL, '6e9c8e6eed', '400', 3, 1, 8, 7, 0),
(132, 24, 18, 1, '2019-12-01 02:06:00', NULL, NULL, NULL, NULL, '6e9c8e6eed', '400', 3, 1, 8, 7, 0),
(133, 24, 13, 1, '2019-12-01 02:06:36', NULL, NULL, NULL, NULL, 'cde0eb6269', '250', 1, 2, 8, 7, 0),
(134, 24, 18, 1, '2019-12-01 02:06:39', NULL, NULL, NULL, NULL, 'cde0eb6269', '250', 1, 2, 8, 7, 0),
(135, 22, 13, 1, '2019-12-01 21:11:00', NULL, NULL, NULL, NULL, '28a4691c38', '200', 2, 3, 8, 8, 0),
(136, 22, 17, 1, '2019-12-01 21:11:03', NULL, NULL, NULL, NULL, '28a4691c38', '200', 2, 3, 8, 8, 0),
(137, 23, 9, 1, '2019-12-01 21:27:58', NULL, NULL, NULL, NULL, '7a0303c5c1', '300', 3, 3, 9, 9, 0),
(138, 23, 18, 1, '2019-12-01 21:28:01', NULL, NULL, NULL, NULL, '7a0303c5c1', '300', 3, 3, 9, 9, 0),
(139, 22, 9, 1, '2019-12-01 21:28:08', NULL, NULL, NULL, NULL, '2350694727', '300', 3, 3, 8, 8, 0),
(140, 22, 18, 1, '2019-12-01 21:28:10', NULL, NULL, NULL, NULL, '2350694727', '300', 3, 3, 8, 8, 0),
(141, 22, 9, 1, '2019-12-01 21:30:23', NULL, NULL, NULL, NULL, '6267c54fbf', '300', 3, 3, 8, 8, 0),
(142, 22, 9, 1, '2019-12-01 21:41:54', NULL, NULL, NULL, NULL, '66d1893770', '300', 3, 3, 8, 8, 0),
(143, 22, 18, 1, '2019-12-01 21:41:57', NULL, NULL, NULL, NULL, '66d1893770', '300', 3, 3, 8, 8, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_vuelo_cabina`
--

CREATE TABLE `precio_vuelo_cabina` (
  `id` int(11) NOT NULL,
  `id_vuelo` int(11) UNSIGNED NOT NULL,
  `id_cabina` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precio_vuelo_cabina`
--

INSERT INTO `precio_vuelo_cabina` (`id`, `id_vuelo`, `id_cabina`, `precio`) VALUES
(19, 22, 1, '250'),
(20, 22, 2, '200'),
(21, 22, 3, '300'),
(22, 23, 1, '250'),
(23, 23, 2, '200'),
(24, 23, 3, '300'),
(25, 24, 1, '250'),
(26, 24, 2, '200'),
(27, 24, 3, '400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `descripcion`) VALUES
(1, 'Standard'),
(2, 'Gourmet'),
(3, 'Spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE `tipo_cliente` (
  `id` int(11) NOT NULL,
  `tipo` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`id`, `tipo`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente_vuelo`
--

CREATE TABLE `tipo_cliente_vuelo` (
  `id` int(11) NOT NULL,
  `tipo_cliente` int(11) NOT NULL,
  `tipo_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_cliente_vuelo`
--

INSERT INTO `tipo_cliente_vuelo` (`id`, `tipo_cliente`, `tipo_vuelo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id`, `descripcion`) VALUES
(9, 'Suborbital'),
(10, 'Entre destino'),
(11, 'Tour');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vuelo_modelo`
--

CREATE TABLE `tipo_vuelo_modelo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_vuelo_modelo`
--

INSERT INTO `tipo_vuelo_modelo` (`id`, `descripcion`) VALUES
(1, 'Orbital'),
(2, 'Baja Aceleracion'),
(3, 'Alta Aceleracion'),
(4, 'Entre destino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` int(11) NOT NULL,
  `centro_medico` int(11) NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `registrado` tinyint(1) DEFAULT 0,
  `administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `email`, `registrado`, `administrador`) VALUES
(6, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@root.com', 1, 1),
(10, 'isaias', 'dc72a933916ab141527fce2bbdfbd6cf', 'isaias.caporusso@gmail.com', 0, 0),
(14, 'lacquaniti@gmail.com', '77d16eb15316d8e785ee2484b8d2f905', 'lacquaniti@gmail.com', 0, 0),
(15, 'pepe@pepe.com', 'c475e8ecf504f7e07cb66867added510', 'pepe@pepe.com', 0, 0),
(16, 'pepe2@pepe.com', '384883d2e16d0414a77c157088afee0e', 'pepe2@pepe.com', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id` int(10) UNSIGNED NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `nave` int(11) NOT NULL,
  `partida` date NOT NULL,
  `hora` time NOT NULL,
  `tipo_vuelo` int(11) NOT NULL,
  `circuito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id`, `origen`, `destino`, `duracion`, `nave`, `partida`, `hora`, `tipo_vuelo`, `circuito`) VALUES
(22, 8, 4, 8, 1, '2020-01-01', '22:00:00', 10, 1),
(23, 9, 4, 8, 28, '2020-01-01', '20:00:00', 10, 2),
(24, 8, 7, 8, 3, '2019-12-02', '20:00:00', 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo_pasaje`
--

CREATE TABLE `vuelo_pasaje` (
  `id` int(11) NOT NULL,
  `vuelo_id` int(11) UNSIGNED NOT NULL,
  `pasaje_id` int(11) NOT NULL,
  `escala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelo_pasaje`
--

INSERT INTO `vuelo_pasaje` (`id`, `vuelo_id`, `pasaje_id`, `escala`) VALUES
(68, 23, 111, 9),
(69, 23, 112, 9),
(70, 22, 116, 8),
(71, 22, 117, 8),
(72, 22, 118, 8),
(73, 22, 119, 8),
(74, 22, 120, 8),
(75, 23, 121, 9),
(76, 23, 122, 9),
(77, 22, 127, 8),
(78, 22, 128, 8),
(79, 23, 129, 9),
(80, 23, 130, 9),
(81, 22, 135, 8),
(82, 22, 136, 8),
(83, 23, 137, 9),
(84, 23, 138, 9),
(85, 22, 139, 8),
(86, 22, 140, 8),
(87, 22, 141, 8),
(88, 22, 142, 8),
(89, 22, 143, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centro_medico`
--
ALTER TABLE `centro_medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `circuito`
--
ALTER TABLE `circuito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_cliente` (`tipo_cliente`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `locacion`
--
ALTER TABLE `locacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_vuelo` (`tipo_vuelo`);

--
-- Indices de la tabla `modelo_cabina`
--
ALTER TABLE `modelo_cabina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cabina` (`cabina`),
  ADD KEY `modelo` (`modelo`);

--
-- Indices de la tabla `nave`
--
ALTER TABLE `nave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nave_ibfk_1` (`modelo`);

--
-- Indices de la tabla `pasaje`
--
ALTER TABLE `pasaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vuelo` (`vuelo`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `cabina` (`cabina`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`),
  ADD KEY `servicio` (`servicio`);

--
-- Indices de la tabla `precio_vuelo_cabina`
--
ALTER TABLE `precio_vuelo_cabina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo` (`id_vuelo`),
  ADD KEY `id_cabina` (`id_cabina`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_cliente_vuelo`
--
ALTER TABLE `tipo_cliente_vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_cliente` (`tipo_cliente`),
  ADD KEY `tipo_vuelo` (`tipo_vuelo`);

--
-- Indices de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vuelo_modelo`
--
ALTER TABLE `tipo_vuelo_modelo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centro_medico` (`centro_medico`),
  ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`),
  ADD KEY `vuelo_ibfk_3` (`nave`),
  ADD KEY `tipo_vuelo` (`tipo_vuelo`),
  ADD KEY `circuito` (`circuito`);

--
-- Indices de la tabla `vuelo_pasaje`
--
ALTER TABLE `vuelo_pasaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasaje_id` (`pasaje_id`),
  ADD KEY `vuelo_id` (`vuelo_id`),
  ADD KEY `escala` (`escala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cabina`
--
ALTER TABLE `cabina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `centro_medico`
--
ALTER TABLE `centro_medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `circuito`
--
ALTER TABLE `circuito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `locacion`
--
ALTER TABLE `locacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `modelo_cabina`
--
ALTER TABLE `modelo_cabina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `nave`
--
ALTER TABLE `nave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pasaje`
--
ALTER TABLE `pasaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `precio_vuelo_cabina`
--
ALTER TABLE `precio_vuelo_cabina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_cliente`
--
ALTER TABLE `tipo_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_cliente_vuelo`
--
ALTER TABLE `tipo_cliente_vuelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo_modelo`
--
ALTER TABLE `tipo_vuelo_modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `vuelo_pasaje`
--
ALTER TABLE `vuelo_pasaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id`),
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo_modelo` (`id`);

--
-- Filtros para la tabla `modelo_cabina`
--
ALTER TABLE `modelo_cabina`
  ADD CONSTRAINT `modelo_cabina_ibfk_1` FOREIGN KEY (`cabina`) REFERENCES `cabina` (`id`),
  ADD CONSTRAINT `modelo_cabina_ibfk_2` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id`);

--
-- Filtros para la tabla `nave`
--
ALTER TABLE `nave`
  ADD CONSTRAINT `nave_ibfk_1` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id`);

--
-- Filtros para la tabla `pasaje`
--
ALTER TABLE `pasaje`
  ADD CONSTRAINT `pasaje_ibfk_1` FOREIGN KEY (`vuelo`) REFERENCES `vuelo` (`id`),
  ADD CONSTRAINT `pasaje_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `pasaje_ibfk_3` FOREIGN KEY (`cabina`) REFERENCES `cabina` (`id`),
  ADD CONSTRAINT `pasaje_ibfk_4` FOREIGN KEY (`origen`) REFERENCES `locacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pasaje_ibfk_5` FOREIGN KEY (`destino`) REFERENCES `locacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pasaje_ibfk_6` FOREIGN KEY (`servicio`) REFERENCES `servicio` (`id`);

--
-- Filtros para la tabla `precio_vuelo_cabina`
--
ALTER TABLE `precio_vuelo_cabina`
  ADD CONSTRAINT `precio_vuelo_cabina_ibfk_1` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id`),
  ADD CONSTRAINT `precio_vuelo_cabina_ibfk_2` FOREIGN KEY (`id_cabina`) REFERENCES `cabina` (`id`);

--
-- Filtros para la tabla `tipo_cliente_vuelo`
--
ALTER TABLE `tipo_cliente_vuelo`
  ADD CONSTRAINT `tipo_cliente_vuelo_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id`),
  ADD CONSTRAINT `tipo_cliente_vuelo_ibfk_2` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo_modelo` (`id`);

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `turno_ibfk_1` FOREIGN KEY (`centro_medico`) REFERENCES `centro_medico` (`id`),
  ADD CONSTRAINT `turno_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `client` (`id`);

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `locacion` (`id`),
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `locacion` (`id`),
  ADD CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`nave`) REFERENCES `nave` (`id`),
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vuelo_ibfk_5` FOREIGN KEY (`circuito`) REFERENCES `circuito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelo_pasaje`
--
ALTER TABLE `vuelo_pasaje`
  ADD CONSTRAINT `vuelo_pasaje_ibfk_1` FOREIGN KEY (`pasaje_id`) REFERENCES `pasaje` (`id`),
  ADD CONSTRAINT `vuelo_pasaje_ibfk_2` FOREIGN KEY (`vuelo_id`) REFERENCES `vuelo` (`id`),
  ADD CONSTRAINT `vuelo_pasaje_ibfk_3` FOREIGN KEY (`escala`) REFERENCES `locacion` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
