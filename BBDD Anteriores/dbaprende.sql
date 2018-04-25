-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2018 a las 15:50:57
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL DEFAULT '',
  `cargo` varchar(45) NOT NULL DEFAULT '',
  `idEscuela` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `correo`, `contrasena`, `usuario`, `cargo`, `idEscuela`) VALUES
(1, 'Diego', 'Jaimes', 'Vazquez', 'H. Colegio Militar SN', '7332945812', 'djaimes10@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'diegojava', 'admin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(12) NOT NULL DEFAULT '',
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `idEscuela` int(11) DEFAULT NULL,
  `idProfesor` int(11) DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `grado` char(1) NOT NULL DEFAULT '',
  `grupo` char(1) NOT NULL DEFAULT '',
  `contrasena` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `idEscuela`, `idProfesor`, `estatus`, `grado`, `grupo`, `contrasena`) VALUES
('ADR33A', 'Ariadna Teresa', 'Diaz', 'Roman', NULL, NULL, 3, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('BWK43C', 'Bruce', 'Wayne', 'Kane', NULL, NULL, 4, NULL, 1, '3', 'C', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('DJV13B', 'Diego', 'Jaimes', 'Vazquez', NULL, NULL, 3, 3, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('JSMGT3B', 'Juan', 'Salgado', 'Macedonio', NULL, NULL, 4, NULL, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('jsp13B', 'Javier', 'Salgado', 'Piedra', NULL, NULL, 4, NULL, 1, '3', 'B', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('PPR13A', 'Pompeyo', 'Piedra', 'Ramos', NULL, NULL, 4, NULL, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('RJCBA3A', 'Rania', 'Jaimes', 'Cruz', NULL, NULL, 1, NULL, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
('TJVIV3A', 'Terry', 'Jaimes', 'Vázquez', NULL, NULL, 3, 3, 1, '3', 'A', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE `avance` (
  `idMateria` int(11) DEFAULT NULL,
  `matricula` varchar(12) DEFAULT NULL,
  `modulo` int(11) DEFAULT NULL,
  `tiempo` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `idEscuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidoP`, `apellidoM`, `direccion`, `telefono`, `correo`, `usuario`, `contrasena`, `cargo`, `idEscuela`) VALUES
(1, 'Diego', 'Jaimes', 'Vazquez', 'H. Colegio Militar', '7332945812', 'djaimes10@gmail.com', 'diegojava', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin', NULL),
(3, 'Laodicea', 'Pabón', 'Castaneda', 'Quevedo #94', '756 694 679', 'LaodiceaPabonCastaneda@gustr.com', 'Forneved1948', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'profesor', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
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
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
