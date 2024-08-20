-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2024 a las 23:09:28
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreta_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `persona_idpersona` int(11) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `secundario` enum('si','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_carrera_inscriptos`
--

CREATE TABLE `alumnos_carrera_inscriptos` (
  `alumno_persona_idpersona` int(11) NOT NULL,
  `carrera_carrera` varchar(100) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `carrera` varchar(100) NOT NULL,
  `descrip` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`carrera`, `descrip`) VALUES
('Ingeniera Informática', 'La ingeniería informática es una disciplina que se centra en el diseño, desarrollo, implementación y gestión de sistemas y tecnologías computacionales. Combina principios de la ingeniería y la informática para crear soluciones eficientes y efectivas en áreas como software, hardware, redes y sistemas de información. Los ingenieros informáticos trabajan en la creación de aplicaciones, la optimización de sistemas, el desarrollo de algoritmos y la resolución de problemas tecnológicos, aplicando conocimientos en programación, matemáticas, lógica y arquitectura de computadoras. Su objetivo es mejorar la funcionalidad y la eficiencia de los sistemas informáticos en diversos contextos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursar_materia`
--

CREATE TABLE `cursar_materia` (
  `alumno_persona_idpersona` int(11) NOT NULL,
  `materia_nombre` varchar(100) NOT NULL,
  `estado` enum('pendiente','inactivo','activo') DEFAULT NULL,
  `fecha_inscripcion` datetime DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentarios` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `materia` varchar(100) NOT NULL,
  `año` varchar(100) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `creditos` varchar(45) DEFAULT NULL,
  `horarios` varchar(45) DEFAULT NULL,
  `materiacol` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `carrera_carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`materia`, `año`, `codigo`, `descripcion`, `creditos`, `horarios`, `materiacol`, `tipo`, `carrera_carrera`) VALUES
('álgebra ', '2019', 'ALG1', 'conceptos fundamentales', '20', '20:00-00:00', 'zzz', 'presencial', 'Ingeniera Informática');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `nombre`, `apellido`, `dni`, `telefono`) VALUES
(1, 'tiago', 'raminelli', '43766375', '3408430891');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `persona_idpersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `contraseña`, `persona_idpersona`) VALUES
(1, 'deviliinopg', '123456789', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`persona_idpersona`),
  ADD KEY `fk_alumno_persona_idx` (`persona_idpersona`);

--
-- Indices de la tabla `alumnos_carrera_inscriptos`
--
ALTER TABLE `alumnos_carrera_inscriptos`
  ADD PRIMARY KEY (`alumno_persona_idpersona`,`carrera_carrera`),
  ADD KEY `fk_alumno_has_carrera_carrera1_idx` (`carrera_carrera`),
  ADD KEY `fk_alumno_has_carrera_alumno1_idx` (`alumno_persona_idpersona`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`carrera`);

--
-- Indices de la tabla `cursar_materia`
--
ALTER TABLE `cursar_materia`
  ADD PRIMARY KEY (`alumno_persona_idpersona`,`materia_nombre`),
  ADD KEY `fk_alumno_has_materia_materia1_idx` (`materia_nombre`),
  ADD KEY `fk_alumno_has_materia_alumno1_idx` (`alumno_persona_idpersona`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`materia`),
  ADD KEY `fk_materia_carrera1_idx` (`carrera_carrera`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_persona1_idx` (`persona_idpersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_persona` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `alumnos_carrera_inscriptos`
--
ALTER TABLE `alumnos_carrera_inscriptos`
  ADD CONSTRAINT `fk_alumno_has_carrera_alumno1` FOREIGN KEY (`alumno_persona_idpersona`) REFERENCES `alumno` (`persona_idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_carrera_carrera1` FOREIGN KEY (`carrera_carrera`) REFERENCES `carrera` (`carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cursar_materia`
--
ALTER TABLE `cursar_materia`
  ADD CONSTRAINT `fk_alumno_has_materia_alumno1` FOREIGN KEY (`alumno_persona_idpersona`) REFERENCES `alumno` (`persona_idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alumno_has_materia_materia1` FOREIGN KEY (`materia_nombre`) REFERENCES `materia` (`materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `fk_materia_carrera1` FOREIGN KEY (`carrera_carrera`) REFERENCES `carrera` (`carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`persona_idpersona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
