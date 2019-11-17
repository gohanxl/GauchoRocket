-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2019 a las 00:56:55
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
(4, 'Root', 3, 0, '11111111', '', '1994-08-27'),
(5, NULL, NULL, 2, NULL, NULL, NULL),
(6, NULL, NULL, 3, NULL, NULL, NULL);

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
(9, 'Ankara');

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
  `cabina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pasaje`
--

INSERT INTO `pasaje` (`id`, `vuelo`, `cliente`, `reserva`, `fecha_reserva`, `checkin`, `fecha_checkin`, `compra`, `fecha_compra`, `codigo`, `precio`, `cabina`) VALUES
(1, 2, 4, 1, '2019-11-12 02:51:40', NULL, NULL, NULL, NULL, '15b56bce6e', NULL, 2),
(2, 2, 4, 1, '2019-11-12 03:41:35', NULL, NULL, NULL, NULL, 'a994b7ac4c', NULL, 1),
(3, 2, 4, 1, '2019-11-12 03:41:53', NULL, NULL, NULL, NULL, '12fa3768fb', NULL, 2),
(4, 3, 4, 1, '2019-11-12 03:44:02', NULL, NULL, NULL, NULL, 'fa80fb3576', NULL, 1),
(5, 3, 4, 1, '2019-11-12 03:46:44', NULL, NULL, NULL, NULL, '00d4839ea4', NULL, 2),
(6, 3, 4, 1, '2019-11-12 03:46:49', NULL, NULL, NULL, NULL, '6f05c47818', NULL, 2),
(7, 3, 4, 1, '2019-11-12 03:47:01', NULL, NULL, NULL, NULL, '0a8b318322', NULL, 2),
(8, 3, 4, 1, '2019-11-12 03:47:24', NULL, NULL, NULL, NULL, '4e5a33be72', NULL, 1),
(9, 2, 4, 1, '2019-11-12 03:52:42', NULL, NULL, NULL, NULL, '83c90b1ee6', NULL, 3),
(10, 2, 4, 1, '2019-11-12 03:52:57', NULL, NULL, NULL, NULL, '414283a370', NULL, 1),
(11, 2, 4, 1, '2019-11-12 03:55:04', NULL, NULL, NULL, NULL, '287ec6d8a8', NULL, 3),
(12, 2, 4, 1, '2019-11-12 03:55:13', NULL, NULL, NULL, NULL, '65ca809e2e', NULL, 2),
(13, 3, 4, 1, '2019-11-12 03:57:26', NULL, NULL, NULL, NULL, '50c0793dd2', NULL, 2),
(14, 3, 4, 1, '2019-11-12 04:21:31', NULL, NULL, NULL, NULL, '88e4ec1d11', NULL, 2),
(15, 3, 4, 1, '2019-11-12 04:21:53', NULL, NULL, NULL, NULL, 'd230a65c09', NULL, 2),
(16, 2, 4, 1, '2019-11-12 04:22:01', NULL, NULL, NULL, NULL, 'e49dcd1526', NULL, 2),
(17, 2, 4, 1, '2019-11-12 04:22:43', NULL, NULL, NULL, NULL, '3ff744edfa', NULL, 2),
(18, 5, 4, 1, '2019-11-12 04:22:49', NULL, NULL, NULL, NULL, '2bcb137d82', NULL, 2),
(19, 5, 4, 1, '2019-11-12 04:24:14', NULL, NULL, NULL, NULL, 'e09fec9d1f', NULL, 2),
(20, 5, 4, 1, '2019-11-12 04:25:15', NULL, NULL, NULL, NULL, '9b87431560', NULL, 2),
(21, 5, 4, 1, '2019-11-12 04:26:00', NULL, NULL, NULL, NULL, '37f783a63c', NULL, 2),
(22, 5, 4, 1, '2019-11-12 04:26:28', NULL, NULL, NULL, NULL, 'f2cb2ee0ca', NULL, 2),
(23, 5, 4, 1, '2019-11-12 04:26:35', NULL, NULL, NULL, NULL, '8f6f54e124', NULL, 1),
(24, 6, 4, 1, '2019-11-12 04:27:33', NULL, NULL, NULL, NULL, '0eec182903', NULL, 2),
(25, 3, 4, 1, '2019-11-12 04:28:18', NULL, NULL, NULL, NULL, 'ac596454c3', NULL, 2),
(26, 3, 4, 1, '2019-11-12 04:29:04', NULL, NULL, NULL, NULL, '1481feeea3', NULL, 2),
(27, 3, 4, 1, '2019-11-12 04:29:10', NULL, NULL, NULL, NULL, '1489c65ab2', NULL, 2),
(28, 2, 5, 1, '2019-11-13 00:39:07', NULL, NULL, NULL, NULL, '2d9b8f0b00', NULL, 3),
(29, 2, 6, 1, '2019-11-13 00:39:43', NULL, NULL, NULL, NULL, '19ae5cdfe7', NULL, 2),
(30, 2, 5, 1, '2019-11-13 00:50:55', NULL, NULL, NULL, NULL, '406a81b95c', NULL, 3),
(31, 2, 5, 1, '2019-11-13 00:51:46', NULL, NULL, NULL, NULL, '1c5291d37d', NULL, 2),
(32, 2, 6, 1, '2019-11-13 00:52:32', NULL, NULL, NULL, NULL, '21a38d933f', NULL, 1),
(33, 2, 5, 1, '2019-11-13 00:54:18', NULL, NULL, NULL, NULL, '2831859e63', NULL, 2),
(34, 2, 5, 1, '2019-11-13 00:55:45', NULL, NULL, NULL, NULL, '62bc14af91', NULL, 2);

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
(2, 'Tour'),
(5, 'Entre destino'),
(6, 'Suborbital');

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
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE `trayecto` (
  `id` int(11) NOT NULL,
  `vuelo_id` int(10) UNSIGNED NOT NULL,
  `origen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto_pasaje`
--

CREATE TABLE `trayecto_pasaje` (
  `id` int(11) NOT NULL,
  `trayecto_id` int(11) NOT NULL,
  `pasaje_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `fecha`, `cliente`, `centro_medico`, `asistencia`) VALUES
(5, '2019-11-30', 4, 1, NULL),
(6, '2019-12-31', 4, 1, NULL),
(7, '2019-10-22', 4, 1, NULL),
(8, '2019-10-17', 4, 1, NULL),
(9, '2019-10-11', 4, 1, NULL),
(10, '2019-10-11', 4, 1, NULL),
(11, '2019-10-11', 4, 1, NULL),
(12, '2019-10-09', 4, 1, NULL),
(13, '2019-10-10', 4, 1, NULL),
(14, '2019-10-10', 4, 1, NULL),
(15, '2019-10-03', 4, 1, NULL),
(16, '2019-12-01', 4, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `registrado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`, `email`, `registrado`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'root@root.com', 1),
(2, 'pepe@pepe.com', '924ade4907bb60d1efa87f826a4af324', 'pepe@pepe.com', 0),
(3, 'lacquaniti@gmail.com', '093be985814bba353ab09c410a43b072', 'lacquaniti@gmail.com', 0);

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
  `tipo_vuelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id`, `origen`, `destino`, `duracion`, `nave`, `partida`, `hora`, `tipo_vuelo`) VALUES
(2, 8, 2, 8, 1, '2019-11-01', '00:00:00', 5),
(3, 9, 2, 8, 4, '2019-11-01', '00:00:00', 6),
(4, 2, 8, 8, 1, '2019-11-08', '00:00:00', 6),
(5, 2, 9, 8, 4, '2019-11-08', '00:00:00', 6),
(6, 8, 2, 8, 30, '2019-11-01', '13:00:00', 6),
(7, 8, 2, 8, 3, '2019-11-01', '05:00:00', 6),
(8, 2, 8, 8, 7, '2019-11-08', '06:00:00', 6);

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
  ADD KEY `cabina` (`cabina`);

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
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vuelo_id` (`vuelo_id`),
  ADD KEY `origen` (`origen`);

--
-- Indices de la tabla `trayecto_pasaje`
--
ALTER TABLE `trayecto_pasaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pasaje_id` (`pasaje_id`),
  ADD KEY `trayecto_id` (`trayecto_id`);

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
  ADD KEY `tipo_vuelo` (`tipo_vuelo`);

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
-- AUTO_INCREMENT de la tabla `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `locacion`
--
ALTER TABLE `locacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo_modelo`
--
ALTER TABLE `tipo_vuelo_modelo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trayecto_pasaje`
--
ALTER TABLE `trayecto_pasaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `pasaje_ibfk_3` FOREIGN KEY (`cabina`) REFERENCES `cabina` (`id`);

--
-- Filtros para la tabla `tipo_cliente_vuelo`
--
ALTER TABLE `tipo_cliente_vuelo`
  ADD CONSTRAINT `tipo_cliente_vuelo_ibfk_1` FOREIGN KEY (`tipo_cliente`) REFERENCES `tipo_cliente` (`id`),
  ADD CONSTRAINT `tipo_cliente_vuelo_ibfk_2` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo_modelo` (`id`);

--
-- Filtros para la tabla `trayecto`
--
ALTER TABLE `trayecto`
  ADD CONSTRAINT `trayecto_ibfk_1` FOREIGN KEY (`vuelo_id`) REFERENCES `vuelo` (`id`),
  ADD CONSTRAINT `trayecto_ibfk_2` FOREIGN KEY (`origen`) REFERENCES `vuelo` (`origen`);

--
-- Filtros para la tabla `trayecto_pasaje`
--
ALTER TABLE `trayecto_pasaje`
  ADD CONSTRAINT `trayecto_pasaje_ibfk_1` FOREIGN KEY (`pasaje_id`) REFERENCES `pasaje` (`id`),
  ADD CONSTRAINT `trayecto_pasaje_ibfk_2` FOREIGN KEY (`trayecto_id`) REFERENCES `trayecto` (`id`);

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
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
