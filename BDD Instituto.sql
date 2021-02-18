-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2021 a las 20:14:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` int(10) UNSIGNED NOT NULL,
  `alum_nombre` text NOT NULL,
  `alum_apellido` text NOT NULL,
  `dni` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `alum_nombre`, `alum_apellido`, `dni`, `email`, `telefono`) VALUES
(10, 'Julian', 'Cardozo', 43234123, 'caju3@mail.com', 1157833313),
(11, 'Antonella', 'Pecorelli', 0, 'pean@mail.com', 0),
(13, 'Federica', 'Ramirez', 0, '', 0),
(16, 'Ruben', 'Garmendia', 0, '', 0),
(19, 'Ramon', 'Vicente', 0, '', 0),
(22, 'Belen', 'Gutierrez', 0, '', 0),
(23, 'Jose', 'Sandes', 0, '', 0),
(24, 'Jazmin', 'Bertotti', 0, '', 0),
(44, 'Monica', 'Mendoza', 46872199, 'menmo@mail.com', 1123564100),
(45, 'Norma', 'Presentado', 47292111, 'preno@mail.com', 4672912),
(46, 'German', 'Cespedes', 40321234, 'cesge@mail.com', 4882134);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_curso`
--

CREATE TABLE `alumno_curso` (
  `matricula` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno_curso`
--

INSERT INTO `alumno_curso` (`matricula`, `id_curso`) VALUES
(10, 5),
(11, 5),
(13, 5),
(23, 4),
(19, 5),
(24, 10),
(24, 5),
(23, 5),
(22, 5),
(44, 5),
(45, 5),
(46, 5),
(10, 1),
(13, 1),
(22, 3),
(24, 4),
(44, 6),
(19, 8),
(45, 3),
(10, 12),
(46, 11),
(22, 2),
(16, 9),
(11, 7),
(22, 6),
(23, 6),
(44, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE `aulas` (
  `id_aula` int(10) UNSIGNED NOT NULL,
  `aula` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`id_aula`, `aula`) VALUES
(1, 'Laboratorio 1'),
(2, 'Laboratorio 2'),
(3, 'Laboratorio 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(10) UNSIGNED NOT NULL,
  `curso` varchar(40) NOT NULL,
  `id_profesor` int(10) UNSIGNED NOT NULL,
  `id_aula` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `curso`, `id_profesor`, `id_aula`) VALUES
(1, 'Photoshop', 2, 3),
(2, 'Excel', 1, 1),
(3, 'Ingles', 1, 2),
(4, 'Corel Draw', 6, 3),
(5, 'Matematicas', 4, 1),
(6, 'Portugues', 5, 3),
(7, 'Word', 2, 1),
(8, 'Pintura', 4, 2),
(9, 'Paint', 9, 2),
(10, 'Fotografia', 14, 3),
(11, 'Redes', 13, 1),
(12, 'Diseño web', 13, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(10) UNSIGNED NOT NULL,
  `prof_nombre` text NOT NULL,
  `prof_apellido` text DEFAULT NULL,
  `dni` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `prof_nombre`, `prof_apellido`, `dni`, `email`, `telefono`) VALUES
(1, 'Jorge', 'Caruso', 30123001, 'cajo@mail.com', 1165577700),
(2, 'Damian', 'Altamirano', 30123002, 'alda@mail.com', 1165577701),
(3, 'Natalia', 'Gomez', 30123003, 'gona@mail.com', 1165577702),
(4, 'Roberto', 'Sandes', 30123004, 'saro@mail.com', 1165577703),
(5, 'Juan', 'Varela', 30123005, 'vaju@mail.com', 1165577704),
(6, 'Valeria', 'Lopez', 30123006, 'lova@mail.com', 1165577705),
(7, 'Mateo', 'Coll', 30123007, 'coma@mail.com', 1165577706),
(8, 'Facundo', 'Gomez', 30123008, 'gofa@mail.com', 1165577707),
(9, 'Sebastian', 'Ruiz', 30123009, 'ruse@mail.com', 1165577708),
(10, 'Fatima', 'Gonzales', 30123010, 'gonfa@mail.com', 1165577709),
(12, 'Ramon', 'Valdez', 30123011, 'vara@mail.com', 1165577710),
(13, 'Manuel', 'Estrada', 30123012, 'esma@mail.com', 1165577711),
(14, 'Luis', 'Freedo', 30123013, 'frelu@mail.com', 1165577712),
(15, 'Gaston', 'Minervino', 34123456, 'migas@mail.com', 1161271300),
(16, 'Gabriela', 'Lobato', 33567123, 'loga@mail.com', 1145567712),
(18, 'Norberto', 'Aquiles', 24567123, 'aqui@mail.com', 1123367412);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `nombre`, `email`, `password`) VALUES
(1, 'Marco', 'marco@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`);

--
-- Indices de la tabla `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id_aula`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `matricula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id_aula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
