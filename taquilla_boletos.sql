-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2018 a las 15:09:56
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taquilla_boletos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_users`
--

CREATE TABLE `registro_users` (
  `id` int(11) NOT NULL,
  `Nteam` varchar(30) DEFAULT NULL,
  `NCteam` varchar(5) DEFAULT NULL,
  `Fcreacion` date DEFAULT NULL,
  `Dresponsable` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_users`
--

INSERT INTO `registro_users` (`id`, `Nteam`, `NCteam`, `Fcreacion`, `Dresponsable`, `email`, `website`, `user`, `pass`) VALUES
(1, 'admin', 'AD', '2018-02-01', '', 'admin@user.com', '', 'admin', 'admin'),
(22, 'Cochinitos Revoltosos', 'CR', '2018-02-02', 'Santa teresa', 'daniel.krdns@gmail.com', '', 'yuncozer', '12345'),
(25, 'Zoolander Systems Hash', 'ZSH', '1999-10-02', 'San Cristobal', 'diego.solorzano@gmail.com', 'http://diegosolorzano.com', 'dsolorzano', 'diego1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `user` varchar(20) DEFAULT NULL,
  `equipo` varchar(30) DEFAULT NULL,
  `torneo` varchar(20) DEFAULT NULL,
  `fecha_torneo` date DEFAULT NULL,
  `cantidadp` int(11) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id`, `user`, `equipo`, `torneo`, `fecha_torneo`, `cantidadp`, `categoria`) VALUES
(75, 'yuncozer', 'Cochinitos Revoltosos', 'Ajedrez', '2018-02-28', 2, 'Principiante'),
(76, 'yuncozer', 'Cochinitos Revoltosos', 'Bolas Criollas', '2018-04-01', 5, 'Profesionales'),
(79, 'yuncozer', 'Cochinitos Revoltosos', 'Futbol', '2018-04-11', 7, 'Aficionados'),
(80, 'dsolorzano', 'Zoolander Systems Hash', 'NataciÃ³n', '2018-08-10', 5, 'Principiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos_db`
--

CREATE TABLE `torneos_db` (
  `id` int(11) NOT NULL,
  `torneo` varchar(20) DEFAULT NULL,
  `fecha_torneo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneos_db`
--

INSERT INTO `torneos_db` (`id`, `torneo`, `fecha_torneo`) VALUES
(16, 'Futbol', '2018-04-11'),
(17, 'BasketBall', '2018-03-21'),
(18, 'NataciÃ³n', '2018-08-10'),
(19, 'Chapita', '2018-03-02'),
(20, 'Bolas Criollas', '2018-04-01'),
(21, 'Ajedrez', '2018-03-08'),
(26, 'Domino', '2018-03-03'),
(29, 'Futbol', '2018-03-11'),
(30, 'Ajedrez', '2018-02-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_users`
--
ALTER TABLE `registro_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `torneos_db`
--
ALTER TABLE `torneos_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_users`
--
ALTER TABLE `registro_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `torneos_db`
--
ALTER TABLE `torneos_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
