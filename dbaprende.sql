-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2018 a las 15:28:32
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbaprende`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(12) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `idEscuela` int(11) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `estatus` int(1) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `grupo` char(1) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `fechaN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `idEscuela`, `idProfesor`, `estatus`, `grado`, `grupo`, `contrasena`, `fechaN`) VALUES
('BaVV05BA3B', 'Valeria', 'Barcelata', 'Vera', 'Joaquin Baranda #12', '733 457 1241', 1, 4, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-07-12 00:00:00'),
('BeCR05IV3A', 'Renée ', 'Betancourt ', 'Caraballo', 'Camiño Real, 18', NULL, 1, 4, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-02-14 00:00:00'),
('BeCR05IV3B', 'Renée ', 'Betancourt ', 'Caraballo', 'Camiño Real, 18', '733 123 1213', 4, 3, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-02-14 00:00:00'),
('GaZJ05IV3B', 'Jesus Alberto', 'Garcia', 'Zarate', 'Morelos #43. Col. Pajaritos', NULL, 3, 4, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-06-14 00:00:00'),
('GoAR05IV3D', 'Raúl', 'Govela', 'Atela', 'Hidalgo #124, Col. Ferrocarril', '733 124 1247', 4, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-02-06 00:00:00'),
('JaCA08GT3B', 'Austin', 'Jaimes', 'Cruz', 'C/ Rosa de los Vientos, 47', NULL, 4, 3, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2008-05-12 00:00:00'),
('JaVD04GT3D', 'Diego', 'Jaimes', 'Vazquez', 'Mexico Iguala #34', NULL, 4, 4, 1, '3', 'D', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2004-01-02 00:00:00'),
('JuMR05IV3A', 'Ramon', 'Juarez', 'Moreno', 'Aldama #13, Col. Centro', NULL, 3, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-03-14 00:00:00'),
('PaND07BA3B', 'Dolly ', 'Paredes ', 'Noriega', 'Quevedo, 50', NULL, 1, 4, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2007-10-11 00:00:00'),
('PrHM05IV3B', 'Mariana', 'Prieto', 'Hernandez', 'Tuxpan #12, Col. Centro', '733 547 6521', 4, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2005-04-14 00:00:00'),
('TaAL04IV3C', 'Luisa', 'Tapia', 'Alamilla', 'Zapata #37. Col. Centro', '733 123 54 78', 4, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2004-10-21 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE `avance` (
  `idMateria` int(11) DEFAULT NULL,
  `matricula` varchar(12) DEFAULT NULL,
  `puntuacion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bloque` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `avance`
--

INSERT INTO `avance` (`idMateria`, `matricula`, `puntuacion`, `fecha`, `bloque`) VALUES
(3, 'TaAL04IV3C', 0, '0000-00-00 00:00:00', 1),
(3, 'TaAL04IV3C', 2, '0000-00-00 00:00:00', 1),
(3, 'TaAL04IV3C', 30, '2018-04-25 03:49:03', 1),
(3, 'TaAL04IV3C', 30, '2018-04-25 03:50:24', 1),
(3, 'TaAL04IV3C', 30, '2018-04-25 03:52:42', 1),
(3, 'TaAL04IV3C', 30, '2018-04-25 03:52:59', 1),
(3, 'TaAL04IV3C', 60, '2018-04-25 03:55:27', 1),
(3, 'TaAL04IV3C', 50, '2018-04-25 00:00:00', 1),
(3, 'GoAR05IV3D', 80, '2018-04-25 15:35:33', 1),
(3, '', 0, '2018-04-27 19:14:02', 0),
(3, '', 0, '2018-04-27 19:14:20', 0),
(3, 'TaAL04IV3C', 20, '2018-04-27 20:31:46', 0),
(3, 'TaAL04IV3C', 50, '2018-05-02 18:25:10', 0),
(3, 'TaAL04IV3C', 30, '2018-05-02 18:29:21', 1),
(1, 'TaAL04IV3C', 50, '2018-05-01 00:00:00', 1),
(2, 'TaAL04IV3C', 70, '2018-05-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `director` varchar(70) DEFAULT NULL,
  `identificador` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id`, `nombre`, `direccion`, `telefono`, `director`, `identificador`) VALUES
(1, 'Benemerito de las Americas', 'Periférico Oriente S/N, San Jose, 40050 Iguala de la Independencia, Gro.', '733 332 4311', 'Juanito Salgado', 'BA'),
(3, 'Instituto Versalles', 'Guillermo Prieto #78', '733 112 67 12', 'Pedro Hernandez', 'IV'),
(4, 'Gregorio Torres Quintero', 'Salvador Herrera #43', '733 245 7412', 'Enrique Segoviano', 'GT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`) VALUES
(1, 'Espanol'),
(2, 'Matematicas'),
(3, 'Ciencias Naturales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidoP` varchar(100) DEFAULT NULL,
  `apellidoM` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `usuario` varchar(30) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `cargo` varchar(15) DEFAULT NULL,
  `idEscuela` int(11) DEFAULT NULL,
  `grupo` char(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `correo`, `usuario`, `contrasena`, `cargo`, `idEscuela`, `grupo`) VALUES
(1, 'Diego', 'Jaimes', 'Vazquez', 'H. Colegio Militar', '7332945812', 'djaimes10@gmail.com', 'diegojava', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', NULL, ''),
(3, 'Laodicea', 'Pabón', 'Castaneda', 'Quevedo #94', '756 694 679', 'Laodicea@gustr.com', 'Forneved1948', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 4, 'A'),
(4, 'Apolinario ', 'Aguilera ', 'Arce', 'Avda. Enrique Peinador, 15 37180 Machacón', '654 448 512', 'Apolinario@superrito.com', 'submis1987', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 1, 'B'),
(5, 'Madelaine ', 'Valle ', 'Sarabia', '51 Freedom Lane ', '209-434-8151', 'Madelaine@superrito.com', 'Warithassaw61', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 3, 'B');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
