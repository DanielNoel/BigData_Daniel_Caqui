-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2020 a las 22:44:13
-- Versión del servidor: 5.5.1-m2-community
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdexamenn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `titulo` varchar(123) NOT NULL,
  `fecInicio` date NOT NULL,
  `hrInicio` time DEFAULT NULL,
  `fecFin` date DEFAULT NULL,
  `hrFin` time DEFAULT NULL,
  `diaEntero` tinyint(4) DEFAULT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `titulo`, `fecInicio`, `hrInicio`, `fecFin`, `hrFin`, `diaEntero`, `idusuario`) VALUES
(4, 'zczc', '2019-11-04', '00:00:00', '0000-00-00', '00:00:00', 0, 1),
(11, 'probando2', '2019-11-24', '08:00:00', '0000-00-00', '05:00:00', 0, 2),
(14, 'probando2', '2020-02-04', '07:00:00', '2020-02-06', '07:30:00', 0, 1),
(15, 'probando2', '2020-02-02', '07:00:00', '2020-02-04', '07:30:00', 0, 1),
(16, 'probandoss', '2019-11-07', '05:00:00', '2019-11-08', '07:00:00', 0, 2),
(17, 'probanddo en usuario 2', '2019-11-13', '05:00:00', '2019-11-14', '07:00:00', 0, 1),
(18, 'probandosssaas', '2019-11-15', '05:00:00', '2019-11-16', '07:00:00', 0, 2),
(19, 'probando2', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 2),
(20, 'probando3', '2019-11-05', '05:00:00', '2019-11-06', '07:00:00', 0, 2),
(21, 'probando3w', '2019-11-05', '05:00:00', '2019-11-08', '07:00:00', 0, 1),
(22, 'probando3', '2019-11-05', '05:30:00', '2019-11-08', '07:00:00', 0, 2),
(23, 'probando2', '2019-11-05', '05:00:00', '2019-11-06', '07:00:00', 0, 2),
(24, 'probando44', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 2),
(25, 'probandoss', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(26, 'qwewqeqwewqe', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(28, 'eeeqwq', '2019-11-12', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(29, 'probando2', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(30, 'la ultis', '2019-11-14', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(31, 'qwrrqwwqr', '2019-11-04', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(32, 'probando2', '2020-02-18', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(33, 'eqwwqeqew', '2019-11-15', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(36, 'qwrqwr', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(37, 'probando2', '2019-11-08', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(38, 'probando2', '2019-11-09', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(39, 'zczc', '2019-11-05', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(40, 'probando2', '2019-11-02', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(42, 'vcvcjg', '2019-11-01', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(43, 'probando2', '2020-02-06', '08:00:00', '0000-00-00', '05:00:00', 0, 1),
(44, 'la ultis', '2019-11-02', '08:00:00', '0000-00-00', '05:00:00', 0, 2),
(45, 'fvczvzv', '2020-02-16', '08:00:00', '0000-00-00', '05:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombusuario` varchar(145) NOT NULL,
  `login` varchar(45) NOT NULL,
  `passw` varchar(145) DEFAULT NULL,
  `fecNac` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombusuario`, `login`, `passw`, `fecNac`) VALUES
(1, 'Daniel ', 'caqui.g@mail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '1994-07-18 22:09:17'),
(2, 'Noel', 'mejia@hotmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '1999-05-01 18:03:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`),
  ADD KEY `fk_evento_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
