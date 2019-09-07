-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2019 a las 21:58:24
-- Versión del servidor: 5.7.27-0ubuntu0.19.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.19.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutrisurvey_desa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_alimentos`
--

CREATE TABLE `ns_alimentos` (
  `id_alimento` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_unidad` int(11) NOT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla general de alimentos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_entrevistados`
--

CREATE TABLE `ns_entrevistados` (
  `rut` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(30) NOT NULL,
  `materno` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `direccion2` varchar(80) NOT NULL,
  `region` int(11) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `comuna` int(11) NOT NULL,
  `tipo_area` int(11) NOT NULL,
  `mail` varchar(80) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `referencia1_nombre` varchar(40) NOT NULL,
  `referencia1_numero` varchar(20) NOT NULL,
  `referencia2_nombre` varchar(40) NOT NULL,
  `referencia2_numero` varchar(20) NOT NULL,
  `codigo_encuestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos personales del encuestado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_modulos`
--

CREATE TABLE `ns_modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `usuario_creacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definicion de Modulos ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_parametros`
--

CREATE TABLE `ns_parametros` (
  `id_param` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `label` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_creacion` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definicion de parametros generales del sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_preguntas`
--

CREATE TABLE `ns_preguntas` (
  `id_pregunta` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `codigo_pregunta` varchar(10) NOT NULL,
  `label_pregunta` varchar(50) NOT NULL,
  `tipo_respuesta` int(11) NOT NULL,
  `tipo_detalle_respuesta` int(11) DEFAULT NULL,
  `usuario_creacion` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definición de preguntas de la encuesta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_registro_encuestas`
--

CREATE TABLE `ns_registro_encuestas` (
  `folio` int(11) NOT NULL,
  `codigo_zona` int(11) NOT NULL,
  `codigo_supevisor` int(11) NOT NULL,
  `codigo_encuestador` int(11) NOT NULL,
  `codigo_encuestado` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `usuario_creacion` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `usuario_modificacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Informacion general de la encuesta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ns_unidades`
--

CREATE TABLE `ns_unidades` (
  `id_unidad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_cantidad` int(11) NOT NULL,
  `id_graduacion` int(11) NOT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de definicion de unidades de medida';

-- --------------------------------------------------------

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ns_alimentos`
--
ALTER TABLE `ns_alimentos`
  ADD UNIQUE KEY `idx_id_alimento` (`id_alimento`);

--
-- Indices de la tabla `ns_entrevistados`
--
ALTER TABLE `ns_entrevistados`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- Indices de la tabla `ns_modulos`
--
ALTER TABLE `ns_modulos`
  ADD UNIQUE KEY `idx_id_modulo_encuesta` (`id_modulo`);

--
-- Indices de la tabla `ns_parametros`
--
ALTER TABLE `ns_parametros`
  ADD UNIQUE KEY `idx_id_param` (`id_param`);

--
-- Indices de la tabla `ns_preguntas`
--
ALTER TABLE `ns_preguntas`
  ADD UNIQUE KEY `idx_id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `ns_registro_encuestas`
--
ALTER TABLE `ns_registro_encuestas`
  ADD UNIQUE KEY `idx_folio` (`folio`),
  ADD KEY `codigo_encuestador` (`codigo_encuestador`);

--
-- Indices de la tabla `ns_unidades`
--
ALTER TABLE `ns_unidades`
  ADD UNIQUE KEY `idx_id_unidad` (`id_unidad`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
