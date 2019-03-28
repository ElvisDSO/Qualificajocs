-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 15:37:59
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
-- Estructura de tabla para la tabla `compañia`
--

CREATE TABLE `compañia` (
  `ID_COMPAÑIA` int(11) NOT NULL,
  `NOMBRE_COMPAÑIA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compañia`
--

INSERT INTO `compañia` (`ID_COMPAÑIA`, `NOMBRE_COMPAÑIA`) VALUES
(1, 'Nombre_Compañia_1'),
(2, 'Nombre_Compañia_2'),
(3, 'Nombre_Compañia_3'),
(4, 'Nombre_Compañia_4'),
(5, 'Nombre_Compañia_5'),
(6, 'Nombre_Compañia_6'),
(7, 'Nombre_Compañia_7'),
(8, 'Nombre_Compañia_8'),
(9, 'Nombre_Compañia_9'),
(10, 'Nombre_Compañia_10'),
(11, 'Nombre_Compañia_11'),
(12, 'Nombre_Compañia_12'),
(13, 'Nombre_Compañia_13'),
(14, 'Nombre_Compañia_14'),
(15, 'Nombre_Compañia_15'),
(16, 'Nombre_Compañia_16'),
(17, 'Nombre_Compañia_17'),
(18, 'Nombre_Compañia_18'),
(19, 'Nombre_Compañia_19'),
(20, 'Nombre_Compañia_20'),
(21, 'Nombre_Compañia_21'),
(22, 'Nombre_Compañia_22'),
(23, 'Nombre_Compañia_23'),
(24, 'Nombre_Compañia_24'),
(25, 'Nombre_Compañia_25'),
(26, 'Nombre_Compañia_26'),
(27, 'Nombre_Compañia_27'),
(28, 'Nombre_Compañia_28'),
(29, 'Nombre_Compañia_29'),
(30, 'Nombre_Compañia_30'),
(31, 'Nombre_Compañia_31'),
(32, 'Nombre_Compañia_32'),
(33, 'Nombre_Compañia_33'),
(34, 'Nombre_Compañia_34'),
(35, 'Nombre_Compañia_35'),
(36, 'Nombre_Compañia_36'),
(37, 'Nombre_Compañia_37'),
(38, 'Nombre_Compañia_38'),
(39, 'Nombre_Compañia_39'),
(40, 'Nombre_Compañia_40'),
(41, 'Nombre_Compañia_41'),
(42, 'Nombre_Compañia_42'),
(43, 'Nombre_Compañia_43'),
(44, 'Nombre_Compañia_44'),
(45, 'Nombre_Compañia_45'),
(46, 'Nombre_Compañia_46'),
(47, 'Nombre_Compañia_47'),
(48, 'Nombre_Compañia_48'),
(49, 'Nombre_Compañia_49'),
(50, 'Nombre_Compañia_50');

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

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`ID_GENERO`, `NOMBRE_GENERO_ES`, `NOMBRE_GENERO_EN`, `NOMBRE_GENERO_PT`) VALUES
(1, 'Aventura gráfica', 'Graphic adventure', 'Aventura gráfica'),
(2, 'Estrategia', 'Strategy', 'Estratégia'),
(3, 'Musical', 'Musical', 'Musical'),
(4, 'Plataformas', 'Plataformer', 'Plataforma'),
(5, 'Rol', 'Role', 'Rol'),
(6, 'Automovilismo', 'Racing', 'Automobilismo'),
(7, 'Acción', 'Action', 'Ação'),
(8, 'Estrategia en tiempo', 'Realtime strategy', 'Estratégia em tempo '),
(9, 'Lucha', 'Fighting', 'Luta'),
(10, 'Otros', 'Others', 'Outros'),
(11, 'Puzle', 'Puzzle', 'Quebra-cabeças'),
(12, 'Juego de guerra', 'Wargames', 'jogos de guerra'),
(13, 'Disparos en tercera ', 'Third person shooter', 'Atirador em terceira'),
(14, 'Deportes', 'Sports', 'Desporto'),
(15, 'Realidad Virtual', 'Virtual reality', 'Realidade virtual'),
(16, 'Simulación', 'Simulation', 'Simulação'),
(17, 'Disparos en primera ', 'First-Person shooter', 'Atirador em primeira'),
(18, 'Vuelo', 'Flight', 'Voo'),
(19, 'Fiesta', 'Party', 'Festa'),
(20, 'Estrategia por turno', 'Turn-based strategy', 'Estratégia por turno');

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

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`ID_PLATAFORMA`, `PLATAFORMA`) VALUES
(1, 'Playstation 4'),
(2, 'Xbox One'),
(3, 'Nintendo DS'),
(4, 'Android'),
(5, 'WiiU'),
(6, 'Playstation 2'),
(7, 'DC'),
(8, 'Nintendo 64'),
(9, 'PC'),
(10, 'Switch'),
(11, 'Playstation 3'),
(12, 'iPhone'),
(13, 'Playstation VITA'),
(14, 'XBOX'),
(15, 'Game Boy Advance'),
(16, 'Nintendo Gamecube'),
(17, 'Nintendo 3DS'),
(18, 'XBOX 360'),
(19, 'Wii'),
(20, 'PSP'),
(21, 'Playstation X'),
(22, 'Super Nintendo'),
(23, 'NES'),
(24, 'Game Boy'),
(25, 'Sega Dreamcast'),
(26, 'Sega Mega Drive'),
(27, 'Game Boy Color'),
(28, 'Sega Saturn'),
(29, 'Atari 2600'),
(30, 'Sega Master System'),
(31, 'Atari 5200'),
(32, 'Oculus Go'),
(33, 'HTC VIVE'),
(34, 'Playstation VR');

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
