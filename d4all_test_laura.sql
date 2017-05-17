-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2017 a las 02:13:20
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `d4all_test_laura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `pk_autor` smallint(6) NOT NULL,
  `nombre` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_p` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_m` char(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`pk_autor`, `nombre`, `apellido_p`, `apellido_m`) VALUES
(1, 'Laura', 'Valdez', 'Morones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `pk_categoria` smallint(6) NOT NULL,
  `categoria` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fk_subcategoria` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`pk_categoria`, `categoria`, `fk_subcategoria`) VALUES
(2, 'Peliculas', 1),
(3, 'Peliculas', 2),
(4, 'Peliculas', 3),
(5, 'Novelas', 4),
(6, 'Novelas', 5),
(7, 'Novelas', 6),
(8, 'Infantiles', 6),
(9, 'Ciencia Ficcion', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `pk_libro` smallint(6) NOT NULL,
  `titulo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `fk_autor` smallint(6) NOT NULL,
  `fecha_publicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`pk_libro`, `titulo`, `fk_autor`, `fecha_publicacion`) VALUES
(1, 'alicia', 1, '2017-05-14'),
(3, 'El principito', 1, '2017-05-14'),
(9, 'dsdsd', 1, '2017-05-14'),
(10, 'la sirenita', 1, '2017-05-14'),
(11, 'popeye el marino', 1, '2017-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_categoria`
--

CREATE TABLE `libro_categoria` (
  `pk_libro_categoria` smallint(6) NOT NULL,
  `fk_libro` smallint(6) NOT NULL,
  `fk_categoria` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libro_categoria`
--

INSERT INTO `libro_categoria` (`pk_libro_categoria`, `fk_libro`, `fk_categoria`) VALUES
(5, 9, 8),
(6, 10, 8),
(7, 11, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `pk_subcategoria` smallint(6) NOT NULL,
  `subcategoria` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`pk_subcategoria`, `subcategoria`) VALUES
(1, 'Romances'),
(2, 'Comedia'),
(3, 'Medieval'),
(4, 'Desamores'),
(5, 'Asesinatos'),
(6, 'No tiene');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`pk_autor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`pk_categoria`),
  ADD KEY `fk_subcategoria` (`fk_subcategoria`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`pk_libro`),
  ADD KEY `fk_autor` (`fk_autor`);

--
-- Indices de la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD PRIMARY KEY (`pk_libro_categoria`),
  ADD KEY `fk_libro` (`fk_libro`),
  ADD KEY `fk_categoria` (`fk_categoria`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`pk_subcategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `pk_autor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `pk_categoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `pk_libro` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  MODIFY `pk_libro_categoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `pk_subcategoria` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`fk_subcategoria`) REFERENCES `subcategoria` (`pk_subcategoria`);

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`fk_autor`) REFERENCES `autor` (`pk_autor`);

--
-- Filtros para la tabla `libro_categoria`
--
ALTER TABLE `libro_categoria`
  ADD CONSTRAINT `libro_categoria_ibfk_1` FOREIGN KEY (`fk_libro`) REFERENCES `libro` (`pk_libro`),
  ADD CONSTRAINT `libro_categoria_ibfk_2` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`pk_categoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
