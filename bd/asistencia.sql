-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-01-2020 a las 20:10:09
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkin`
--

CREATE TABLE `checkin` (
  `idempleado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horarioentrada` time NOT NULL,
  `inciob` time NOT NULL,
  `salidab` time NOT NULL,
  `horariosalida` time NOT NULL,
  `checkinicio` time NOT NULL,
  `chekinciob` time DEFAULT NULL,
  `checksalidab` time DEFAULT NULL,
  `checksalida` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `checkin`
--

INSERT INTO `checkin` (`idempleado`, `fecha`, `horarioentrada`, `inciob`, `salidab`, `horariosalida`, `checkinicio`, `chekinciob`, `checksalidab`, `checksalida`) VALUES
(25, '0000-00-00', '12:11:00', '16:11:00', '17:11:00', '22:11:00', '11:46:00', '00:00:00', '00:00:00', '22:15:00'),
(25, '2020-01-07', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '11:46:00', '00:00:00', '00:00:00', '22:15:00'),
(25, '2020-01-08', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '12:12:00', '00:00:00', '00:00:00', '22:21:00'),
(25, '2020-01-09', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '11:49:00', '00:00:00', '00:00:00', '22:47:00'),
(25, '2020-01-10', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '11:55:00', '00:00:00', '00:00:00', '19:53:00'),
(25, '2020-01-11', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '12:00:00', '00:00:00', '00:00:00', '21:33:00'),
(25, '2020-01-12', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '12:15:00', '00:00:00', '00:00:00', '22:15:00'),
(25, '2020-01-13', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '11:30:00', '00:00:00', '00:00:00', '22:18:00'),
(25, '2020-01-14', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '12:23:00', '00:00:00', '00:00:00', '22:24:00'),
(25, '2020-01-15', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '12:00:00', '00:00:00', '00:00:00', '23:10:00'),
(25, '2020-01-16', '12:00:00', '16:00:00', '17:00:00', '22:00:00', '11:49:00', '00:00:00', '00:00:00', '23:58:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamaneto`
--

CREATE TABLE `departamaneto` (
  `iddepartamento` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamaneto`
--

INSERT INTO `departamaneto` (`iddepartamento`, `nombre`, `descripcion`) VALUES
(1, 'ventas', 'area de ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `iddepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idempleado`, `nombre`, `apellido`, `iddepartamento`) VALUES
(25, 'jorge', 'perez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo`
--

CREATE TABLE `nuevo` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horingreso` time NOT NULL,
  `horibi` time DEFAULT NULL,
  `horibs` time DEFAULT NULL,
  `horisalida` time NOT NULL,
  `maringreso` time DEFAULT NULL,
  `maribi` time DEFAULT NULL,
  `maribs` time DEFAULT NULL,
  `marsalida` time DEFAULT NULL,
  `tardanza` time DEFAULT NULL,
  `temprano` time DEFAULT NULL,
  `worktime` time DEFAULT NULL,
  `tiempototal` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nuevo`
--

INSERT INTO `nuevo` (`id`, `fecha`, `horingreso`, `horibi`, `horibs`, `horisalida`, `maringreso`, `maribi`, `maribs`, `marsalida`, `tardanza`, `temprano`, `worktime`, `tiempototal`) VALUES
(25, '2021-01-07', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '22:58:00', '00:00:00', '00:00:00', '05:58:00', '00:00:00', '00:00:00', '06:58:00', '06:59:00'),
(25, '2021-01-08', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '22:56:00', '00:00:00', '00:00:00', '05:57:00', '00:00:00', '00:00:00', '06:57:00', '07:00:00'),
(25, '2021-01-10', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:20:00', '00:00:00', '00:00:00', '05:45:00', '00:20:00', '00:15:00', '06:24:00', '06:24:00'),
(25, '2021-01-11', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:30:00', '00:00:00', '00:00:00', '06:04:00', '00:30:00', '00:00:00', '06:29:00', '06:34:00'),
(25, '2022-01-09', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:16:00', '00:00:00', '00:00:00', '06:54:00', '00:16:00', '00:00:00', '06:43:00', '07:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(30) NOT NULL,
  `Rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombres`, `Apellidos`, `Correo`, `Contraseña`, `Rol`) VALUES
(1, 'Marco', 'Hoyos', 'maro.hoyos@gmail.com', '123456', 0),
(2, 'rodrigo', 'mozo', 'rodrigomozo@gmail.com', '654321', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`idempleado`,`fecha`);

--
-- Indices de la tabla `departamaneto`
--
ALTER TABLE `departamaneto`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `iddepartamento` (`iddepartamento`);

--
-- Indices de la tabla `nuevo`
--
ALTER TABLE `nuevo`
  ADD PRIMARY KEY (`id`,`fecha`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `idempleado` FOREIGN KEY (`idempleado`) REFERENCES `empleados` (`idempleado`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `iddepartamento` FOREIGN KEY (`iddepartamento`) REFERENCES `departamaneto` (`iddepartamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
