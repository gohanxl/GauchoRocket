-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 11:11:49
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
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`id`, `nombre`, `tipo_cliente`, `usuario`, `telefono`, `foto`, `fecha_nacimiento`) VALUES
(4, 'Root', 2, 0, '11111111', '', '1994-08-27');

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
  `precio` decimal(10,0) NOT NULL,
  `cabina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(15, '2019-10-03', 4, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `password`) VALUES
(0, 'root', '63a9f0ea7bb98050796b649e85481845');

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
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id`, `origen`, `destino`, `duracion`, `nave`, `partida`, `hora`) VALUES
(2, 8, 2, 8, 1, '2019-11-01', '00:00:00'),
(3, 9, 2, 8, 4, '2019-11-01', '00:00:00'),
(4, 2, 8, 8, 1, '2019-11-08', '00:00:00'),
(5, 2, 9, 8, 4, '2019-11-08', '00:00:00'),
(6, 8, 2, 8, 30, '2019-11-01', '13:00:00'),
(7, 8, 2, 8, 3, '2019-11-01', '05:00:00'),
(8, 2, 8, 8, 7, '2019-11-08', '06:00:00');

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
  ADD KEY `vuelo_ibfk_3` (`nave`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  ADD CONSTRAINT `client_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`);

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
  ADD CONSTRAINT `tipo_cliente_vuelo_ibfk_2` FOREIGN KEY (`tipo_vuelo`) REFERENCES `tipo_vuelo` (`id`);

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
  ADD CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`nave`) REFERENCES `nave` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
