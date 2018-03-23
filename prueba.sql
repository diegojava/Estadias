-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2018 a las 22:40:56
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` varchar(15) NOT NULL DEFAULT '',
  `nombreA` varchar(100) DEFAULT NULL,
  `apellidoP` varchar(50) DEFAULT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `contrasena` varchar(90) DEFAULT NULL,
  `grado` varchar(1) DEFAULT NULL,
  `grupo` varchar(1) DEFAULT NULL,
  `escuela` varchar(45) DEFAULT NULL,
  `isActivo` tinyint(1) NOT NULL DEFAULT '1',
  `rol` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombreA`, `apellidoP`, `apellidoM`, `contrasena`, `grado`, `grupo`, `escuela`, `isActivo`, `rol`) VALUES
('', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', 'UT', 1, 1),
('ADAUT4q', 'Anthony', 'D', 'Angelo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4', 'q', 'UT', 1, 1),
('adrUTA', 'ariadna', 'diaz', 'roman', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3', 'A', 'UT', 1, 1),
('AJCBA4A', 'Austin', 'Jaimes', 'Cruz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4', 'A', 'BA', 1, 1),
('AMUUT4B', 'Adata', 'Memoria', 'USB', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4', 'B', 'UT', 1, 1),
('cltUT3a', 'christian omar', 'lugo', 'tovar', '8cb2237d0679ca88db6464eac60da96345513964', '3', 'a', 'UT', 1, 1),
('djvuta', 'diego', 'jaimes', 'vazquez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3', 'a', 'PI', 1, 1),
('hcstecb', 'hola', 'como', 'stasss', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3', 'b', 'BA', 1, 1),
('HJSNH3A', 'Heidi', 'Jimenez', 'Silva', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3', 'A', 'NH', 1, 2),
('HPLBA6A', 'Huawei', 'P10', 'Lite', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '6', 'A', 'BA', 1, 1),
('HPLBA6B', 'Huawei', 'P10', 'Lite', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '6', 'B', 'BA', 1, 1),
('LMPUT4B', 'Laptop', 'Macbook', 'Pro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4', 'B', 'UT', 1, 1),
('LPAPI6A', 'Luis', 'Perez', 'Avalos', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '6', 'A', 'PI', 1, 1),
('MPSUT5B', 'Manuel', 'Perez', 'Sosa', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '5', 'B', 'UT', 1, 1),
('PPAPI4b', 'PEdro', 'Picapiedra', 'Alvarez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '4', 'b', 'PI', 1, 1),
('RJCBA3A', 'Rania Fernanda', 'Jaimes ', 'Cruz', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3', 'A', 'BA', 1, 1),
('TJVNH6B', 'Terry', 'Jaimes', 'Vazquez', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '6', 'B', 'NH', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
