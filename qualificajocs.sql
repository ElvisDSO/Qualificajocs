-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2019 a las 00:16:58
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `qualificajocs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `ID_GENERO` int(11) NOT NULL,
  `NOMBRE_GENERO_ES` varchar(20) NOT NULL,
  `NOMBRE_GENERO_EN` varchar(20) NOT NULL,
  `NOMBRE_GENERO_PT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero_videojuego`
--

CREATE TABLE `genero_videojuego` (
  `ID_VIDEOJUEGO` int(11) NOT NULL,
  `ID_GENERO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_jugados`
--

CREATE TABLE `lista_jugados` (
  `ID_VIDEOJUEGO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `VALORACION` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_pendientes`
--

CREATE TABLE `lista_pendientes` (
  `ID_VIDEOJUEGO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `ID_PLATAFORMA` int(11) NOT NULL,
  `PLATAFORMA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_videojuego`
--

CREATE TABLE `plataforma_videojuego` (
  `ID_VIDEOJUEGO` int(11) NOT NULL,
  `ID_PLATAFORMA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE `textos` (
  `ID_TEXTO` int(11) NOT NULL,
  `TEXTO_ES` varchar(200) NOT NULL,
  `TEXTO_EN` varchar(200) NOT NULL,
  `TEXTO_PT` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `CONSTRASEÑA` varchar(20) NOT NULL,
  `NOMBRE_USUARIO` varchar(20) NOT NULL,
  `APELLIDOS_USUARIO` varchar(40) NOT NULL,
  `EMAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `ID_VIDEOJUEGO` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `COMPAÑÍA` varchar(20) NOT NULL,
  `FECHA_LANZAMIENTO` date NOT NULL,
  `NUM_JUGADORES` int(11) NOT NULL,
  `RATING` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Indices de la tabla `genero_videojuego`
--
ALTER TABLE `genero_videojuego`
  ADD PRIMARY KEY (`ID_VIDEOJUEGO`,`ID_GENERO`);

--
-- Indices de la tabla `lista_jugados`
--
ALTER TABLE `lista_jugados`
  ADD PRIMARY KEY (`ID_VIDEOJUEGO`,`ID_USUARIO`);

--
-- Indices de la tabla `lista_pendientes`
--
ALTER TABLE `lista_pendientes`
  ADD PRIMARY KEY (`ID_VIDEOJUEGO`,`ID_USUARIO`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`ID_PLATAFORMA`);

--
-- Indices de la tabla `plataforma_videojuego`
--
ALTER TABLE `plataforma_videojuego`
  ADD PRIMARY KEY (`ID_VIDEOJUEGO`,`ID_PLATAFORMA`);

--
-- Indices de la tabla `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`ID_TEXTO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`ID_VIDEOJUEGO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `ID_PLATAFORMA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `textos`
--
ALTER TABLE `textos`
  MODIFY `ID_TEXTO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `ID_VIDEOJUEGO` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
