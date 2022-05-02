-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2022 a las 17:46:30
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_encuestas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_etapa`
--

CREATE TABLE `cat_etapa` (
  `id_etapa` varchar(11) NOT NULL,
  `etapa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_etapa`
--

INSERT INTO `cat_etapa` (`id_etapa`, `etapa`) VALUES
('1', 'Inicial'),
('2', 'Complementaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_oficinas`
--

CREATE TABLE `cat_oficinas` (
  `num_oficina` varchar(50) NOT NULL,
  `oficina` varchar(250) NOT NULL,
  `ubicacion` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_oficinas`
--

INSERT INTO `cat_oficinas` (`num_oficina`, `oficina`, `ubicacion`, `direccion`) VALUES
('01', 'Adolescentes', 'Mérida', 'Centro Especializado en la Aplicación de Medidas para Adolescentes. Anillo Periférico Poniente Km.45, Mérida, Yucatán'),
('02', 'Central', 'Mérida', 'Calle 35 No. 501-A x 62 y 62-A Col. Centro C.P. 97000, Mérida, Yucatán'),
('03', 'Kanasin', 'Kanasín', 'Calle 23 No. 20 x 36 y 38, Kanasín, Yucatán'),
('04', 'Penal', 'Mérida', 'Calle 60, Ex. Hacienda San José Tecoh, por Anillo Periférico, Sección Sur. Mérida, Yucatán. Juzgados Penales del Primer Departamento'),
('05', 'Progreso', 'Progreso', 'Calle 37 No. 85 x 18 y 20, Puerto de Abrigo. Progreso, Yucatán'),
('06', 'Tekax', 'Tekax', 'Calle 41. Solar Número 2, Manzana 59. Tekax Yucatán'),
('07', 'Ticul', 'Ticul', 'Calle 26 S/N entre 21 y 23 Centro. Ticul, Yucatán'),
('08', 'Uman', 'Umán', 'Calle 25 No. 144, Carretera Umán-Celestún, Umán, Yuc. (Fte. Campo Siglo XXI)'),
('09', 'Valladolid', 'Valladolid', 'Calle 45 No. 228. Calzada de los Frailes. Barrio de Sisal. Valladolid, Yucatán'),
('10', 'CJOM', 'Mérida', 'Centro de Justicia Oral de Mérida. Calle 145, No. 299, Colonia San José Tecoh'),
('11', 'Centro de Justicia para las Mujeres', 'Mérida', 'Periférico Poniente km 46.5 tramo Susúla-Caucel detrás del edificio que ocupa la Fiscalía General del Estado de Yucatán en esta ciudad de Mérida, Yucatán'),
('12', 'Juzgado Primero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
('13', 'Juzgado Tercero de Oralidad Familiar (Turno Matutino)', 'Mérida', ''),
('14', 'Juzgado Séptimo de Oralidad Familiar', 'Mérida', ''),
('15', 'Juzgado Tercero de Oralidad Familiar (Turno Vespertino)', 'Mérida', ''),
('16', 'Centro de Convivencia Familiar (CECOFAY)', 'Mérida', ''),
('17', 'Motul', 'Motul', 'Juzgado Tercero Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, ubicado en la calle 29 número 379 por 46 y 48, Motul, Yucatán'),
('18', 'Izamal', 'Izamal', 'Juzgado Quinto Mixto de lo Civil y Familiar del Primer Departamento Judicial del Estado, calle 37 número 295 entre 22 y 24 de la Colonia San Marcos de esta ciudad de Izamal, Yucatán'),
('19', 'Tizimin', 'Tizimín', 'Juzgado Segundo Mixto de lo Civil y Familiar del Tercer Departamento Judicial del Estado, ubicado en la calle 41 número 354 por 47 y 49, de esta ciudad de Tizimín, Yucatán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_status_anios`
--

CREATE TABLE `cat_status_anios` (
  `id_anios` int(25) NOT NULL,
  `anio` varchar(25) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_status_anios`
--

INSERT INTO `cat_status_anios` (`id_anios`, `anio`, `status`) VALUES
(1, '2022', 'activado'),
(2, '2019', 'activado'),
(3, '2018', 'activado'),
(4, '2017', 'activado'),
(5, '2016', 'activado'),
(6, '2020', 'activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id_encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_inicio` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_final` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id_encuesta`, `id_usuario`, `titulo`, `descripcion`, `estado`, `fecha_inicio`, `fecha_final`) VALUES
(1, 0, 'Encuesta 1', 'Esta es una encuesta de prueba para el gobierno del estado', 1, '2022-03-22 16:33:46', '2022-03-22 16:33:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `valor` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `id_pregunta`, `valor`) VALUES
(1, 1, 'Opción 1'),
(2, 1, 'Opción 2'),
(3, 1, 'Opción 3'),
(4, 2, 'Opción 1'),
(5, 2, 'Opción 2'),
(6, 2, 'Opción 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `id_encuesta`, `titulo`, `id_tipo_pregunta`) VALUES
(1, 1, '¿Pregunta 1?', 1),
(2, 1, '¿Pregunta 2?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_resultado` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_resultado`, `id_opcion`) VALUES
(1, 1),
(7, 1),
(3, 2),
(5, 3),
(2, 4),
(4, 5),
(6, 6),
(8, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

CREATE TABLE `tipo_pregunta` (
  `id_tipo_pregunta` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`id_tipo_pregunta`, `nombre`, `descripcion`) VALUES
(1, 'Selección múltiple', 'Se podrá escoger solo una opción\r\nelemento input type radio'),
(2, 'Desplegable', 'Se podrá escoger una opción\r\nElemento select y option'),
(3, 'Casilla de verificación', 'Se podrá escoger más de una opción\r\ninput type checkbox'),
(4, 'Texto', 'Se almacenara la respuesta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `clave`, `nombres`, `apellidos`, `email`, `id_tipo_usuario`) VALUES
('admifull', '1234', 'Gerardo', 'Lopez', 'Sa.we@gmail.com', 1),
('usuario1', '1234', 'Juan', 'Chavez', 'Sa.we12@gmail.com', 2),
('usuario2', '1234', 'Fabio', 'perez', 'Sa.we23@gmail.com', 2),
('usuario3', '1234', 'Carlos', 'Sanchez', 'Sa.we142@gmail.com', 2),
('usuario4', '1234', 'Diego', 'Poot', 'Sa.we144e42@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_encuestas`
--

CREATE TABLE `usuarios_encuestas` (
  `id_usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_encuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_encuestas`
--

INSERT INTO `usuarios_encuestas` (`id_usuario`, `id_encuesta`) VALUES
('usuario1', 1),
('usuario2', 1),
('usuario3', 1),
('usuario4', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_encuesta` (`id_encuesta`),
  ADD KEY `id_tipo_pregunta` (`id_tipo_pregunta`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_resultado`),
  ADD KEY `id_opcion` (`id_opcion`);

--
-- Indices de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  ADD PRIMARY KEY (`id_tipo_pregunta`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios_encuestas`
--
ALTER TABLE `usuarios_encuestas`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_encuesta` (`id_encuesta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_resultado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_pregunta`
--
ALTER TABLE `tipo_pregunta`
  MODIFY `id_tipo_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_tipo_pregunta`) REFERENCES `tipo_pregunta` (`id_tipo_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `preguntas_ibfk_2` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_ibfk_1` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_encuestas`
--
ALTER TABLE `usuarios_encuestas`
  ADD CONSTRAINT `usuarios_encuestas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_encuestas_ibfk_2` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
