-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2020 a las 00:16:01
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
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `idlocal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `Nombre`, `idlocal`) VALUES
(1, 'ventas', 1),
(2, 'rrhh', 1),
(3, 'contabilidad', 1),
(4, 'marketing', 1),
(5, 'tthh', 1),
(6, 'tesoreria', 1),
(7, 'TI', 1),
(8, 'opraciones', 1),
(9, 'recepcion', 1),
(10, 'logistica', 1),
(11, 'proyectos', 1),
(12, 'dsjl', 6),
(13, 'dmolina', 5),
(14, 'dchorrillos', 2),
(15, 'dbarranco', 3),
(16, 'dpto abancay', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `iddepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idempleado`, `nombre`, `apellido`, `iddepartamento`) VALUES
(25, 'jorge', 'Muñoz', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hijo`
--

CREATE TABLE `hijo` (
  `idhijo` int(255) NOT NULL,
  `idpadre` int(255) NOT NULL DEFAULT 0,
  `hijo` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `hijo`
--

INSERT INTO `hijo` (`idhijo`, `idpadre`, `hijo`) VALUES
(1, 1, 'ventas'),
(2, 1, 'rrhh'),
(3, 1, 'contabilidad'),
(4, 1, 'marketing'),
(5, 1, 'tthh'),
(6, 1, 'tesoreria'),
(7, 1, 'TI'),
(8, 1, 'opraciones'),
(9, 1, 'recepcion'),
(10, 1, 'logistica'),
(11, 1, 'proyectos'),
(12, 6, 'dsjl'),
(13, 5, 'dmolina'),
(14, 2, 'dchorrillos'),
(15, 3, 'dbarranco'),
(16, 4, 'dpto abancay');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

CREATE TABLE `local` (
  `idlocal` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`idlocal`, `nombre`, `direccion`) VALUES
(1, 'corporacion', 'av javier prado'),
(2, 'chorrillos', 'av chorrillos'),
(3, 'barranco', 'av barranco 123'),
(4, 'abancay', 'av abancay 777'),
(5, 'molina', 'av javierprado666'),
(6, 'sjl3', 'porton');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nieto`
--

CREATE TABLE `nieto` (
  `idnieto` int(255) NOT NULL,
  `idhijo` int(255) NOT NULL DEFAULT 0,
  `nieto` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `nieto`
--

INSERT INTO `nieto` (`idnieto`, `idhijo`, `nieto`) VALUES
(6, 4, 'Jorge Muñoz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo`
--

CREATE TABLE `nuevo` (
  `idempleado` int(11) NOT NULL,
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

INSERT INTO `nuevo` (`idempleado`, `fecha`, `horingreso`, `horibi`, `horibs`, `horisalida`, `maringreso`, `maribi`, `maribs`, `marsalida`, `tardanza`, `temprano`, `worktime`, `tiempototal`) VALUES
(25, '2021-01-07', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '22:58:00', '00:00:00', '00:00:00', '05:58:00', '00:00:00', '00:00:00', '06:58:00', '06:59:00'),
(25, '2021-01-08', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '22:56:00', '00:00:00', '00:00:00', '05:57:00', '00:00:00', '00:00:00', '06:57:00', '07:00:00'),
(25, '2021-01-10', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:20:00', '00:00:00', '00:00:00', '05:45:00', '00:20:00', '00:15:00', '06:24:00', '06:24:00'),
(25, '2021-01-11', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:30:00', '00:00:00', '00:00:00', '06:04:00', '00:30:00', '00:00:00', '06:29:00', '06:34:00'),
(25, '2022-01-09', '23:00:00', '00:00:00', '00:00:00', '06:00:00', '23:16:00', '00:00:00', '00:00:00', '06:54:00', '00:16:00', '00:00:00', '06:43:00', '07:38:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `idpadre` int(255) NOT NULL,
  `padre` text COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`idpadre`, `padre`, `direccion`) VALUES
(1, 'corporacion', 'av javier prado'),
(2, 'chorrillos', 'av chorrillos'),
(3, 'barranco', 'av barranco 123'),
(4, 'abancay', 'av abancay 777'),
(5, 'molina', 'av javierprado666'),
(6, 'sjl3', 'porton');

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
(2, 'rodrigo', 'mozo', 'rodrigomozo@gmail.com', '654321', 0),
(3, 'Joshep', 'Mendoza', 'mendoza.joshep@gmail.com', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`),
  ADD KEY `nuevo3` (`idlocal`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `hijo`
--
ALTER TABLE `hijo`
  ADD PRIMARY KEY (`idhijo`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`idlocal`);

--
-- Indices de la tabla `nieto`
--
ALTER TABLE `nieto`
  ADD PRIMARY KEY (`idnieto`);

--
-- Indices de la tabla `nuevo`
--
ALTER TABLE `nuevo`
  ADD PRIMARY KEY (`idempleado`,`fecha`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`idpadre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hijo`
--
ALTER TABLE `hijo`
  MODIFY `idhijo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `nieto`
--
ALTER TABLE `nieto`
  MODIFY `idnieto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `padre`
--
ALTER TABLE `padre`
  MODIFY `idpadre` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `nuevo3` FOREIGN KEY (`idlocal`) REFERENCES `local` (`idlocal`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `idpdepfk` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`);

--
-- Filtros para la tabla `nuevo`
--
ALTER TABLE `nuevo`
  ADD CONSTRAINT `nuevo_ibfk_1` FOREIGN KEY (`idempleado`) REFERENCES `empleados` (`idempleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
