-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2019 a las 22:50:12
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: nutrisurvey_desa
--
CREATE DATABASE IF NOT EXISTS nutrisurvey_desa DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE nutrisurvey_desa;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla groups
--

DROP TABLE IF EXISTS groups;
CREATE TABLE groups (
  id mediumint(8) UNSIGNED NOT NULL,
  name varchar(20) NOT NULL,
  description varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla groups
--

INSERT INTO groups (id, `name`, description) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla login_attempts
--

DROP TABLE IF EXISTS login_attempts;
CREATE TABLE login_attempts (
  id int(11) UNSIGNED NOT NULL,
  ip_address varchar(45) NOT NULL,
  login varchar(100) NOT NULL,
  time int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_alimentos
--

DROP TABLE IF EXISTS ns_alimentos;
CREATE TABLE ns_alimentos (
  id_alimento int(11) NOT NULL,
  id_modulo int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  tipo_medida int(11) NOT NULL,
  descripcion varchar(80) DEFAULT NULL,
  usuario_creacion varchar(50) NOT NULL,
  fecha_creacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla general de alimentos';

--
-- Volcado de datos para la tabla ns_alimentos
--

INSERT INTO ns_alimentos (id_alimento, id_modulo, nombre, tipo_medida, descripcion, usuario_creacion, fecha_creacion) VALUES
(1, 1, 'Arroz Blanco como acompañamiento', 1, NULL, '1', '2019-09-02 23:55:23'),
(2, 1, 'Arroz Integral como acompañamiento', 1, '', '1', '2019-09-09 13:58:13'),
(3, 1, 'Arroz Blanco como preparaciones', 1, '', '1', '2019-09-09 13:59:49'),
(4, 1, 'Arroz Integral como preparaciones', 1, '', '1', '2019-09-09 14:00:29'),
(5, 1, 'Fideos Blancos como acompañamiento', 1, '', '1', '2019-09-09 14:01:53'),
(6, 1, 'Fideos Integrales como acompañamiento', 1, '', '1', '2019-09-09 14:03:02'),
(7, 1, 'Fideos Blancos como preparaciones', 1, '', '1', '2019-09-09 14:03:33'),
(8, 1, 'Fideos Integrales como preparaciones', 1, '', '1', '2019-09-09 14:05:02'),
(9, 1, 'Raviole', 1, '', '1', '2019-09-09 14:06:32'),
(10, 1, 'Gnocchi', 1, '', '1', '2019-09-09 14:07:17'),
(11, 1, 'Fettuccini', 1, '', '1', '2019-09-09 14:10:50'),
(12, 1, 'Agnolotti', 1, '', '1', '2019-09-09 14:11:20'),
(13, 1, 'Tortelloni', 1, '', '1', '2019-09-09 14:12:03'),
(14, 1, 'Otra (especificar)', 1, '', '1', '2019-09-09 14:20:29'),
(15, 1, 'Mote Trigo', 1, '', '1', '2019-09-09 14:27:13'),
(16, 1, 'Mote Maiz', 1, NULL, '1', '2019-09-09 14:00:29'),
(17, 1, 'Quínoa', 1, NULL, '1', '2019-09-09 00:00:00'),
(18, 1, 'Choclo', 1, NULL, '1', '2019-09-09 00:00:00'),
(19, 1, 'Yuca', 1, NULL, '1', '2019-09-09 00:00:00'),
(20, 1, 'Papa con Cáscara', 1, NULL, '1', '2019-09-09 00:00:00'),
(21, 1, 'Papa sin Cáscara', 1, NULL, '1', '2019-09-09 00:00:00'),
(22, 1, 'Chuchoca', 1, NULL, '1', '2019-09-09 00:00:00'),
(23, 1, 'Sémola', 1, NULL, '1', '2019-09-09 00:00:00'),
(24, 1, 'Maicena', 1, NULL, '1', '2019-09-09 00:00:00'),
(25, 1, 'Chuño', 1, NULL, '1', '2019-09-09 00:00:00'),
(26, 1, 'Harina Tostada', 1, NULL, '1', '2019-09-09 00:00:00'),
(27, 1, 'Marraqueta Corriente', 1, NULL, '1', '2019-09-09 00:00:00'),
(28, 1, 'Marraqueta Integral', 1, NULL, '1', '2019-09-09 00:00:00'),
(29, 1, 'Marraqueta sin sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(30, 1, 'Hallulla Corriente', 1, NULL, '1', '2019-09-09 00:00:00'),
(31, 1, 'Hallulla Integral', 1, NULL, '1', '2019-09-09 00:00:00'),
(32, 1, 'Hallulla sin sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(33, 1, 'Hotdog', 1, NULL, '1', '2019-09-09 00:00:00'),
(34, 1, 'Pita Blanco', 1, NULL, '1', '2019-09-09 00:00:00'),
(35, 1, 'Pita Integral', 1, NULL, '1', '2019-09-09 00:00:00'),
(36, 1, 'Tortilla de Taco', 1, NULL, '1', '2019-09-09 00:00:00'),
(37, 1, 'Tortilla de Rescoldo', 1, NULL, '1', '2019-09-09 00:00:00'),
(38, 1, 'Tortilla al Horno', 1, NULL, '1', '2019-09-09 00:00:00'),
(39, 1, 'Amasado', 1, NULL, '1', '2019-09-09 00:00:00'),
(40, 1, 'Molde Blanco Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(41, 1, 'Molde Blanco Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(42, 1, 'Molde Integral', 1, NULL, '1', '2019-09-09 00:00:00'),
(43, 1, 'Dobladita', 1, NULL, '1', '2019-09-09 00:00:00'),
(44, 1, 'Croissant', 1, NULL, '1', '2019-09-09 00:00:00'),
(45, 1, 'Rosita', 1, NULL, '1', '2019-09-09 00:00:00'),
(46, 1, 'Frica', 1, NULL, '1', '2019-09-09 00:00:00'),
(47, 1, 'Paris', 1, NULL, '1', '2019-09-09 00:00:00'),
(48, 1, 'Tapadito', 1, NULL, '1', '2019-09-09 00:00:00'),
(49, 1, 'Bocado', 1, NULL, '1', '2019-09-09 00:00:00'),
(50, 1, 'Otro (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(51, 1, 'Galletas de Agua Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(52, 1, 'Galletas de Agua Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(53, 1, 'Galletas de Agua sin sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(54, 1, 'Galletas de Soda Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(55, 1, 'Galletas de Soda Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(56, 1, 'Galletas Integrales Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(57, 1, 'Galletas Integrales Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(58, 1, 'Cerelac Corriente', 1, NULL, '1', '2019-09-09 00:00:00'),
(59, 1, 'Cerelac 5 Cereales', 1, NULL, '1', '2019-09-09 00:00:00'),
(60, 1, 'Cerelac Trigo Prebiótico', 1, NULL, '1', '2019-09-09 00:00:00'),
(61, 1, 'Nestum Corriente', 1, NULL, '1', '2019-09-09 00:00:00'),
(62, 1, 'Nestum Arroz', 1, NULL, '1', '2019-09-09 00:00:00'),
(63, 1, 'Nestum Avena', 1, NULL, '1', '2019-09-09 00:00:00'),
(64, 1, 'Nestum Maíz', 1, NULL, '1', '2019-09-09 00:00:00'),
(65, 1, 'Nestum Miel', 1, NULL, '1', '2019-09-09 00:00:00'),
(66, 1, 'Nestum 3 Cereales', 1, NULL, '1', '2019-09-09 00:00:00'),
(67, 1, 'Nestum Plátano', 1, NULL, '1', '2019-09-09 00:00:00'),
(68, 1, 'Nestum Frutilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(69, 1, 'Nestum Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(70, 1, 'Nestum Vainilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(71, 1, 'Avena', 1, NULL, '1', '2019-09-09 00:00:00'),
(72, 1, 'Integral', 1, NULL, '1', '2019-09-09 00:00:00'),
(73, 1, 'Fibra', 1, NULL, '1', '2019-09-09 00:00:00'),
(74, 1, 'Trigo Hojuela', 1, NULL, '1', '2019-09-09 00:00:00'),
(75, 1, 'Granola', 1, NULL, '1', '2019-09-09 00:00:00'),
(76, 1, 'con Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(77, 1, 'Inflado de Arroz', 1, NULL, '1', '2019-09-09 00:00:00'),
(78, 1, 'Inflado de Maiz', 1, NULL, '1', '2019-09-09 00:00:00'),
(79, 1, 'Inflado de Trigo', 1, NULL, '1', '2019-09-09 00:00:00'),
(80, 2, 'Acelga', 1, NULL, '1', '2019-09-09 00:00:00'),
(81, 2, 'Achicoria', 1, NULL, '1', '2019-09-09 00:00:00'),
(82, 2, 'Ají', 1, NULL, '1', '2019-09-09 00:00:00'),
(83, 2, 'Ajo', 1, NULL, '1', '2019-09-09 00:00:00'),
(84, 2, 'Alcachofa', 1, NULL, '1', '2019-09-09 00:00:00'),
(85, 2, 'Brote de Alfalfa', 1, NULL, '1', '2019-09-09 00:00:00'),
(86, 2, 'Apio', 1, NULL, '1', '2019-09-09 00:00:00'),
(87, 2, 'Berengena', 1, NULL, '1', '2019-09-09 00:00:00'),
(88, 2, 'Berro', 1, NULL, '1', '2019-09-09 00:00:00'),
(89, 2, 'Betarraga', 1, NULL, '1', '2019-09-09 00:00:00'),
(90, 2, 'Brócoli', 1, NULL, '1', '2019-09-09 00:00:00'),
(91, 2, 'Bruselas', 1, NULL, '1', '2019-09-09 00:00:00'),
(92, 2, 'Cebolla', 1, NULL, '1', '2019-09-09 00:00:00'),
(93, 2, 'Cebollín', 1, NULL, '1', '2019-09-09 00:00:00'),
(94, 2, 'Champignon', 1, NULL, '1', '2019-09-09 00:00:00'),
(95, 2, 'Ciboulette', 1, NULL, '1', '2019-09-09 00:00:00'),
(96, 2, 'Cilantro', 1, NULL, '1', '2019-09-09 00:00:00'),
(97, 2, 'Cochayuyo', 1, NULL, '1', '2019-09-09 00:00:00'),
(98, 2, 'Coliflor', 1, NULL, '1', '2019-09-09 00:00:00'),
(99, 2, 'Diente de Dragón', 1, NULL, '1', '2019-09-09 00:00:00'),
(100, 2, 'Endivia', 1, NULL, '1', '2019-09-09 00:00:00'),
(101, 2, 'Espárrago', 1, NULL, '1', '2019-09-09 00:00:00'),
(102, 2, 'Espinaca', 1, NULL, '1', '2019-09-09 00:00:00'),
(103, 2, 'Lechuga', 1, NULL, '1', '2019-09-09 00:00:00'),
(104, 2, 'Luche', 1, NULL, '1', '2019-09-09 00:00:00'),
(105, 2, 'Palmito', 1, NULL, '1', '2019-09-09 00:00:00'),
(106, 2, 'Penca', 1, NULL, '1', '2019-09-09 00:00:00'),
(107, 2, 'Pepino', 1, NULL, '1', '2019-09-09 00:00:00'),
(108, 2, 'Perejil', 1, NULL, '1', '2019-09-09 00:00:00'),
(109, 2, 'Pimentón', 1, NULL, '1', '2019-09-09 00:00:00'),
(110, 2, 'Poroto Verde', 1, NULL, '1', '2019-09-09 00:00:00'),
(111, 2, 'Rabanito', 1, NULL, '1', '2019-09-09 00:00:00'),
(112, 2, 'Repollo Amarillo', 1, NULL, '1', '2019-09-09 00:00:00'),
(113, 2, 'Repollo Morado', 1, NULL, '1', '2019-09-09 00:00:00'),
(114, 2, 'Rúcula', 1, NULL, '1', '2019-09-09 00:00:00'),
(115, 2, 'Tomate', 1, NULL, '1', '2019-09-09 00:00:00'),
(116, 2, 'Ulte', 1, NULL, '1', '2019-09-09 00:00:00'),
(117, 2, 'Zanahoria', 1, NULL, '1', '2019-09-09 00:00:00'),
(118, 2, 'Zapallo', 1, NULL, '1', '2019-09-09 00:00:00'),
(119, 2, 'Zapallo Italiano', 1, NULL, '1', '2019-09-09 00:00:00'),
(120, 2, 'Otro (espeficicar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(121, 3, 'Arándano', 1, NULL, '1', '2019-09-09 00:00:00'),
(122, 3, 'Calafate', 1, NULL, '1', '2019-09-09 00:00:00'),
(123, 3, 'Caqui', 1, NULL, '1', '2019-09-09 00:00:00'),
(124, 3, 'Cereza', 1, NULL, '1', '2019-09-09 00:00:00'),
(125, 3, 'Cereza en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(126, 3, 'Chirimoya', 1, NULL, '1', '2019-09-09 00:00:00'),
(127, 3, 'Ciruela', 1, NULL, '1', '2019-09-09 00:00:00'),
(128, 3, 'Clementina', 1, NULL, '1', '2019-09-09 00:00:00'),
(129, 3, 'Damasco', 1, NULL, '1', '2019-09-09 00:00:00'),
(130, 3, 'Damasco en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(131, 3, 'Durazno', 1, NULL, '1', '2019-09-09 00:00:00'),
(132, 3, 'Durazno Conservero', 1, NULL, '1', '2019-09-09 00:00:00'),
(133, 3, 'Durazno en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(134, 3, 'Frambuesa', 1, NULL, '1', '2019-09-09 00:00:00'),
(135, 3, 'Frutilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(136, 3, 'Frutilla en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(137, 3, 'Granada', 1, NULL, '1', '2019-09-09 00:00:00'),
(138, 3, 'Grosella', 1, NULL, '1', '2019-09-09 00:00:00'),
(139, 3, 'Guayaba', 1, NULL, '1', '2019-09-09 00:00:00'),
(140, 3, 'Guinda', 1, NULL, '1', '2019-09-09 00:00:00'),
(141, 3, 'Higo', 1, NULL, '1', '2019-09-09 00:00:00'),
(142, 3, 'Jugo de Limón', 1, NULL, '1', '2019-09-09 00:00:00'),
(143, 3, 'Kiwi', 1, NULL, '1', '2019-09-09 00:00:00'),
(144, 3, 'Limón', 1, NULL, '1', '2019-09-09 00:00:00'),
(145, 3, 'Lúcuma', 1, NULL, '1', '2019-09-09 00:00:00'),
(146, 3, 'Macedonia', 1, NULL, '1', '2019-09-09 00:00:00'),
(147, 3, 'Mandarina', 1, NULL, '1', '2019-09-09 00:00:00'),
(148, 3, 'Mango', 1, NULL, '1', '2019-09-09 00:00:00'),
(149, 3, 'Mango en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(150, 3, 'Manzana', 1, NULL, '1', '2019-09-09 00:00:00'),
(151, 3, 'Maqui', 1, NULL, '1', '2019-09-09 00:00:00'),
(152, 3, 'Maracuyá', 1, NULL, '1', '2019-09-09 00:00:00'),
(153, 3, 'Melón Calameño', 1, NULL, '1', '2019-09-09 00:00:00'),
(154, 3, 'Malón Tuna', 1, NULL, '1', '2019-09-09 00:00:00'),
(155, 3, 'Membrillo', 1, NULL, '1', '2019-09-09 00:00:00'),
(156, 3, 'Mora', 1, NULL, '1', '2019-09-09 00:00:00'),
(157, 3, 'Murtilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(158, 3, 'Naranja', 1, NULL, '1', '2019-09-09 00:00:00'),
(159, 3, 'Níspero', 1, NULL, '1', '2019-09-09 00:00:00'),
(160, 3, 'Papaya Cocida', 1, NULL, '1', '2019-09-09 00:00:00'),
(161, 3, 'Papaya en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(162, 3, 'Pepino Dulce', 1, NULL, '1', '2019-09-09 00:00:00'),
(163, 3, 'Pera', 1, NULL, '1', '2019-09-09 00:00:00'),
(164, 3, 'Piña', 1, NULL, '1', '2019-09-09 00:00:00'),
(165, 3, 'Piña en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(166, 3, 'Plátano', 1, NULL, '1', '2019-09-09 00:00:00'),
(167, 3, 'Pomelo', 1, NULL, '1', '2019-09-09 00:00:00'),
(168, 3, 'Sandía', 1, NULL, '1', '2019-09-09 00:00:00'),
(169, 3, 'Tuna', 1, NULL, '1', '2019-09-09 00:00:00'),
(170, 3, 'Uva', 1, NULL, '1', '2019-09-09 00:00:00'),
(171, 3, 'Otra (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(172, 3, 'Huesillos Deshidratados', 1, NULL, '1', '2019-09-09 00:00:00'),
(173, 3, 'Damascos Deshidratados', 1, NULL, '1', '2019-09-09 00:00:00'),
(174, 3, 'Ciruelas Deshidratadas', 1, NULL, '1', '2019-09-09 00:00:00'),
(175, 3, 'Manzanas Deshidratadas', 1, NULL, '1', '2019-09-09 00:00:00'),
(176, 3, 'Pasas Deshidratadas', 1, NULL, '1', '2019-09-09 00:00:00'),
(177, 4, 'Porotos Burros', 1, NULL, '1', '2019-09-09 00:00:00'),
(178, 4, 'Porotos Negros', 1, NULL, '1', '2019-09-09 00:00:00'),
(179, 4, 'Porotos Granados', 1, NULL, '1', '2019-09-09 00:00:00'),
(180, 4, 'Lentejas', 1, NULL, '1', '2019-09-09 00:00:00'),
(181, 4, 'Garbanzos', 1, NULL, '1', '2019-09-09 00:00:00'),
(182, 4, 'Arvejas', 1, NULL, '1', '2019-09-09 00:00:00'),
(183, 4, 'Habas', 1, NULL, '1', '2019-09-09 00:00:00'),
(184, 5, 'Leche Líquida', 0, NULL, '1', '2019-09-09 00:00:00'),
(185, 5, 'Leche en Polvo', 0, NULL, '1', '2019-09-09 00:00:00'),
(186, 5, 'No especificada', 0, NULL, '1', '2019-09-09 00:00:00'),
(187, 5, 'Leche Cultivada Normal', 0, NULL, '1', '2019-09-09 00:00:00'),
(188, 5, 'Leche Cultivada Diet o Light', 0, NULL, '1', '2019-09-09 00:00:00'),
(189, 5, 'Leche de Cabra', 0, NULL, '1', '2019-09-09 00:00:00'),
(190, 5, 'Leche de Oveja', 0, NULL, '1', '2019-09-09 00:00:00'),
(191, 5, 'Leche de Burra', 0, NULL, '1', '2019-09-09 00:00:00'),
(192, 5, 'Leche de Soya Líquida', 0, NULL, '1', '2019-09-09 00:00:00'),
(193, 5, 'Leche de Soya en Polvo', 0, NULL, '1', '2019-09-09 00:00:00'),
(194, 5, 'Yogourt sin Sabor', 0, NULL, '1', '2019-09-09 00:00:00'),
(195, 5, 'Yogourt con Sabor', 0, NULL, '1', '2019-09-09 00:00:00'),
(196, 5, 'Yogourt con Frutas', 0, NULL, '1', '2019-09-09 00:00:00'),
(197, 5, 'Yogourt con Cereales', 0, NULL, '1', '2019-09-09 00:00:00'),
(198, 5, 'Yogourt con Fruto Secos', 0, NULL, '1', '2019-09-09 00:00:00'),
(199, 5, 'Otro Normal', 0, NULL, '1', '2019-09-09 00:00:00'),
(200, 5, 'Otro Diet o Light', 0, NULL, '1', '2019-09-09 00:00:00'),
(201, 5, 'Postre de Leche Casero', 0, NULL, '1', '2019-09-09 00:00:00'),
(202, 5, 'Queso Gauda', 1, NULL, '1', '2019-09-09 00:00:00'),
(203, 5, 'Queso Mantecoso', 1, NULL, '1', '2019-09-09 00:00:00'),
(204, 5, 'Queso Chanco', 1, NULL, '1', '2019-09-09 00:00:00'),
(205, 5, 'Queso Edam', 1, NULL, '1', '2019-09-09 00:00:00'),
(206, 5, 'Queso Azul', 1, NULL, '1', '2019-09-09 00:00:00'),
(207, 5, 'Queso Fresco', 1, NULL, '1', '2019-09-09 00:00:00'),
(208, 5, 'Quesillo Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(209, 5, 'Quesillo Normal con Sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(210, 5, 'Quesillo Normail sin Sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(211, 5, 'Queso Untable con Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(212, 5, 'Queso Untable sin Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(213, 5, 'Queso Parmesano', 1, NULL, '1', '2019-09-09 00:00:00'),
(214, 5, 'Queso de Cabra Entero Maduro', 1, NULL, '1', '2019-09-09 00:00:00'),
(215, 5, 'Queso de Cabra Entero Fresco', 1, NULL, '1', '2019-09-09 00:00:00'),
(216, 5, 'Queso de Cabra Descremado', 1, NULL, '1', '2019-09-09 00:00:00'),
(217, 5, 'Queso de Oveja Entero Maduro', 1, NULL, '1', '2019-09-09 00:00:00'),
(218, 5, 'Queso de Oveja Entero Fresco', 1, NULL, '1', '2019-09-09 00:00:00'),
(219, 5, 'Queso de Oveja Descremado', 1, NULL, '1', '2019-09-09 00:00:00'),
(220, 5, 'Otro (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(221, 6, 'Posta Negra', 1, NULL, '1', '2019-09-09 00:00:00'),
(222, 6, 'Posta Rosada', 1, NULL, '1', '2019-09-09 00:00:00'),
(223, 6, 'Plateada', 1, NULL, '1', '2019-09-09 00:00:00'),
(224, 6, 'Huachalomo', 1, NULL, '1', '2019-09-09 00:00:00'),
(225, 6, 'Asiento', 1, NULL, '1', '2019-09-09 00:00:00'),
(226, 6, 'Pollo Ganso', 1, NULL, '1', '2019-09-09 00:00:00'),
(227, 6, 'Osobuco', 1, NULL, '1', '2019-09-09 00:00:00'),
(228, 6, 'Asado de Tira', 1, NULL, '1', '2019-09-09 00:00:00'),
(229, 6, 'Sobrecostilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(230, 6, 'Lomo Liso', 1, NULL, '1', '2019-09-09 00:00:00'),
(231, 6, 'Lomo Vetado', 1, NULL, '1', '2019-09-09 00:00:00'),
(232, 6, 'Filete', 1, NULL, '1', '2019-09-09 00:00:00'),
(233, 6, 'Molida Corriente', 1, NULL, '1', '2019-09-09 00:00:00'),
(234, 6, 'Molida Tártaro', 1, NULL, '1', '2019-09-09 00:00:00'),
(235, 6, 'Charqui', 1, NULL, '1', '2019-09-09 00:00:00'),
(236, 6, 'No espeficifada', 1, NULL, '1', '2019-09-09 00:00:00'),
(237, 6, 'Pechuga', 1, NULL, '1', '2019-09-09 00:00:00'),
(238, 6, 'Trutro', 1, NULL, '1', '2019-09-09 00:00:00'),
(239, 6, 'Ala', 1, NULL, '1', '2019-09-09 00:00:00'),
(240, 6, 'Espinazo', 1, NULL, '1', '2019-09-09 00:00:00'),
(241, 6, 'Rabadilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(242, 6, 'Picada de Pollo', 1, NULL, '1', '2019-09-09 00:00:00'),
(243, 6, 'Ala Media', 1, NULL, '1', '2019-09-09 00:00:00'),
(244, 6, 'Trutro Corto', 1, NULL, '1', '2019-09-09 00:00:00'),
(245, 6, 'Osobuco', 1, NULL, '1', '2019-09-09 00:00:00'),
(246, 6, 'Carne Molida', 1, NULL, '1', '2019-09-09 00:00:00'),
(247, 6, 'Bistec', 1, NULL, '1', '2019-09-09 00:00:00'),
(248, 6, 'Pulpa', 1, NULL, '1', '2019-09-09 00:00:00'),
(249, 6, 'Cazuela', 1, NULL, '1', '2019-09-09 00:00:00'),
(250, 6, 'Chuleta de Centro', 1, NULL, '1', '2019-09-09 00:00:00'),
(251, 6, 'Chuleta Vetada', 1, NULL, '1', '2019-09-09 00:00:00'),
(252, 6, 'Pernil', 1, NULL, '1', '2019-09-09 00:00:00'),
(253, 6, 'Costillar', 1, NULL, '1', '2019-09-09 00:00:00'),
(254, 6, 'Lomo', 1, NULL, '1', '2019-09-09 00:00:00'),
(255, 6, 'No epeficifada', 1, NULL, '1', '2019-09-09 00:00:00'),
(256, 6, 'Pulpa', 1, NULL, '1', '2019-09-09 00:00:00'),
(257, 6, 'Chuletas', 1, NULL, '1', '2019-09-09 00:00:00'),
(258, 6, 'Costillar', 1, NULL, '1', '2019-09-09 00:00:00'),
(259, 6, 'Pulpa', 1, NULL, '1', '2019-09-09 00:00:00'),
(260, 6, 'Chuletas', 1, NULL, '1', '2019-09-09 00:00:00'),
(261, 6, 'Costillar', 1, NULL, '1', '2019-09-09 00:00:00'),
(262, 6, 'Equino', 1, NULL, '1', '2019-09-09 00:00:00'),
(263, 6, 'Llama', 1, NULL, '1', '2019-09-09 00:00:00'),
(264, 6, 'Alpaca', 1, NULL, '1', '2019-09-09 00:00:00'),
(265, 6, 'Conejo', 1, NULL, '1', '2019-09-09 00:00:00'),
(266, 6, 'Vegetal', 1, NULL, '1', '2019-09-09 00:00:00'),
(267, 6, 'Pana o Hígado', 1, NULL, '1', '2019-09-09 00:00:00'),
(268, 6, 'Guatitas', 1, NULL, '1', '2019-09-09 00:00:00'),
(269, 6, 'Riñones', 1, NULL, '1', '2019-09-09 00:00:00'),
(270, 6, 'Lengua', 1, NULL, '1', '2019-09-09 00:00:00'),
(271, 6, 'Criadillas', 1, NULL, '1', '2019-09-09 00:00:00'),
(272, 6, 'Chunchules', 1, NULL, '1', '2019-09-09 00:00:00'),
(273, 6, 'Ubres', 1, NULL, '1', '2019-09-09 00:00:00'),
(274, 6, 'Sesos', 1, NULL, '1', '2019-09-09 00:00:00'),
(275, 6, 'Corazón', 1, NULL, '1', '2019-09-09 00:00:00'),
(276, 6, 'No especificada', 1, NULL, '1', '2019-09-09 00:00:00'),
(277, 6, 'Pana o Hígado', 1, NULL, '1', '2019-09-09 00:00:00'),
(278, 6, 'Guatitas', 1, NULL, '1', '2019-09-09 00:00:00'),
(279, 6, 'Riñones', 1, NULL, '1', '2019-09-09 00:00:00'),
(280, 6, 'Lengua', 1, NULL, '1', '2019-09-09 00:00:00'),
(281, 6, 'Criadillas', 1, NULL, '1', '2019-09-09 00:00:00'),
(282, 6, 'Chunchules', 1, NULL, '1', '2019-09-09 00:00:00'),
(283, 6, 'Ubres', 1, NULL, '1', '2019-09-09 00:00:00'),
(284, 6, 'Sesos', 1, NULL, '1', '2019-09-09 00:00:00'),
(285, 6, 'Corazón', 1, NULL, '1', '2019-09-09 00:00:00'),
(286, 6, 'No especificada', 1, NULL, '1', '2019-09-09 00:00:00'),
(287, 6, 'Panitas', 1, NULL, '1', '2019-09-09 00:00:00'),
(288, 6, 'Contre', 1, NULL, '1', '2019-09-09 00:00:00'),
(289, 6, 'Cogote', 1, NULL, '1', '2019-09-09 00:00:00'),
(290, 6, 'Corazón', 1, NULL, '1', '2019-09-09 00:00:00'),
(291, 6, 'Patas', 1, NULL, '1', '2019-09-09 00:00:00'),
(292, 6, 'Vienesas', 1, NULL, '1', '2019-09-09 00:00:00'),
(293, 6, 'Gordas', 1, NULL, '1', '2019-09-09 00:00:00'),
(294, 6, 'Hamburguesas', 1, NULL, '1', '2019-09-09 00:00:00'),
(295, 6, 'Prietas', 1, NULL, '1', '2019-09-09 00:00:00'),
(296, 6, 'Chorizos', 1, NULL, '1', '2019-09-09 00:00:00'),
(297, 6, 'Choricillos', 1, NULL, '1', '2019-09-09 00:00:00'),
(298, 6, 'Longanizas', 1, NULL, '1', '2019-09-09 00:00:00'),
(299, 6, 'Jamón Crudo', 1, NULL, '1', '2019-09-09 00:00:00'),
(300, 6, 'Jamón Cocido', 1, NULL, '1', '2019-09-09 00:00:00'),
(301, 6, 'Mortadela', 1, NULL, '1', '2019-09-09 00:00:00'),
(302, 6, 'Jamonada', 1, NULL, '1', '2019-09-09 00:00:00'),
(303, 6, 'Salame', 1, NULL, '1', '2019-09-09 00:00:00'),
(304, 6, 'Arrollado Huaso', 1, NULL, '1', '2019-09-09 00:00:00'),
(305, 6, 'Salchichón Cerveza', 1, NULL, '1', '2019-09-09 00:00:00'),
(306, 6, 'Jamón de Pavo', 1, NULL, '1', '2019-09-09 00:00:00'),
(307, 6, 'Jamón de Pollo', 1, NULL, '1', '2019-09-09 00:00:00'),
(308, 6, 'Jamón Ahumado', 1, NULL, '1', '2019-09-09 00:00:00'),
(309, 6, 'Huevos de Gallina Enteros', 1, NULL, '1', '2019-09-09 00:00:00'),
(310, 6, 'Huevos de Gallina Claras', 1, NULL, '1', '2019-09-09 00:00:00'),
(311, 6, 'Huevos de Gallina Yemas', 1, NULL, '1', '2019-09-09 00:00:00'),
(312, 6, 'Huevos de Codorniz', 1, NULL, '1', '2019-09-09 00:00:00'),
(313, 6, 'Huevos de Avestruz', 1, NULL, '1', '2019-09-09 00:00:00'),
(314, 6, 'Huevos de Pato', 1, NULL, '1', '2019-09-09 00:00:00'),
(315, 6, 'Huevos de Pavo', 1, NULL, '1', '2019-09-09 00:00:00'),
(316, 7, 'Atún', 1, NULL, '1', '2019-09-09 00:00:00'),
(317, 7, 'Blanquillo', 1, NULL, '1', '2019-09-09 00:00:00'),
(318, 7, 'Carpa', 1, NULL, '1', '2019-09-09 00:00:00'),
(319, 7, 'Congrio', 1, NULL, '1', '2019-09-09 00:00:00'),
(320, 7, 'Corvina', 1, NULL, '1', '2019-09-09 00:00:00'),
(321, 7, 'Jurel', 1, NULL, '1', '2019-09-09 00:00:00'),
(322, 7, 'Lenguado', 1, NULL, '1', '2019-09-09 00:00:00'),
(323, 7, 'Pescada', 1, NULL, '1', '2019-09-09 00:00:00'),
(324, 7, 'Pejegallo', 1, NULL, '1', '2019-09-09 00:00:00'),
(325, 7, 'Pejerey', 1, NULL, '1', '2019-09-09 00:00:00'),
(326, 7, 'Reineta', 1, NULL, '1', '2019-09-09 00:00:00'),
(327, 7, 'Roncador', 1, NULL, '1', '2019-09-09 00:00:00'),
(328, 7, 'Salmón', 1, NULL, '1', '2019-09-09 00:00:00'),
(329, 7, 'Sardina', 1, NULL, '1', '2019-09-09 00:00:00'),
(330, 7, 'Otro (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(331, 7, 'Atún en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(332, 7, 'Jurel en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(333, 7, 'Sardina en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(334, 7, 'Almeja', 1, NULL, '1', '2019-09-09 00:00:00'),
(335, 7, 'Calamar', 1, NULL, '1', '2019-09-09 00:00:00'),
(336, 7, 'Camarón', 1, NULL, '1', '2019-09-09 00:00:00'),
(337, 7, 'Cholga', 1, NULL, '1', '2019-09-09 00:00:00'),
(338, 7, 'Chorito', 1, NULL, '1', '2019-09-09 00:00:00'),
(339, 7, 'Erizo', 1, NULL, '1', '2019-09-09 00:00:00'),
(340, 7, 'Jaiba', 1, NULL, '1', '2019-09-09 00:00:00'),
(341, 7, 'Jibia', 1, NULL, '1', '2019-09-09 00:00:00'),
(342, 7, 'Macha', 1, NULL, '1', '2019-09-09 00:00:00'),
(343, 7, 'Navajuela', 1, NULL, '1', '2019-09-09 00:00:00'),
(344, 7, 'Ostión', 1, NULL, '1', '2019-09-09 00:00:00'),
(345, 7, 'Ostra', 1, NULL, '1', '2019-09-09 00:00:00'),
(346, 7, 'Picoroco', 1, NULL, '1', '2019-09-09 00:00:00'),
(347, 7, 'Piure', 1, NULL, '1', '2019-09-09 00:00:00'),
(348, 7, 'Almeja en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(349, 7, 'Calamar en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(350, 7, 'Camarón en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(351, 7, 'Cholga en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(352, 7, 'Chorito en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(353, 7, 'Erizo en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(354, 7, 'Jaiba en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(355, 7, 'Jibia en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(356, 7, 'Macha en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(357, 7, 'Navajuela en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(358, 7, 'Ostión en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(359, 7, 'Ostra en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(360, 7, 'Picoroco en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(361, 7, 'Piure en Conserva', 1, NULL, '1', '2019-09-09 00:00:00'),
(362, 8, 'Maiz', 0, NULL, '1', '2019-09-09 00:00:00'),
(363, 8, 'Maravilla', 0, NULL, '1', '2019-09-09 00:00:00'),
(364, 8, 'Canola', 0, NULL, '1', '2019-09-09 00:00:00'),
(365, 8, 'Soya', 0, NULL, '1', '2019-09-09 00:00:00'),
(366, 8, 'Oliva', 0, NULL, '1', '2019-09-09 00:00:00'),
(367, 8, 'Aceite de palta', 0, NULL, '1', '2019-09-09 00:00:00'),
(368, 8, 'Pepa de Uva', 0, NULL, '1', '2019-09-09 00:00:00'),
(369, 8, 'Mezcla', 0, NULL, '1', '2019-09-09 00:00:00'),
(370, 8, 'No sabe qué aceite', 0, NULL, '1', '2019-09-09 00:00:00'),
(371, 8, 'Margarina', 1, NULL, '1', '2019-09-09 00:00:00'),
(372, 8, 'Mantequilla con Sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(373, 8, 'Mantequilla sin Sal', 1, NULL, '1', '2019-09-09 00:00:00'),
(374, 8, 'Mayonesa', 0, NULL, '1', '2019-09-09 00:00:00'),
(375, 8, 'Crema Ácida', 0, NULL, '1', '2019-09-09 00:00:00'),
(376, 8, 'Crema Batida', 0, NULL, '1', '2019-09-09 00:00:00'),
(377, 8, 'Crema Chantillí', 0, NULL, '1', '2019-09-09 00:00:00'),
(378, 8, 'Crema Espesa', 0, NULL, '1', '2019-09-09 00:00:00'),
(379, 8, 'Crema Light', 0, NULL, '1', '2019-09-09 00:00:00'),
(380, 8, 'No sabe qué crema', 0, NULL, '1', '2019-09-09 00:00:00'),
(381, 8, 'Paté', 1, NULL, '1', '2019-09-09 00:00:00'),
(382, 8, 'Tocino', 1, NULL, '1', '2019-09-09 00:00:00'),
(383, 8, 'Chicharrones', 1, NULL, '1', '2019-09-09 00:00:00'),
(384, 8, 'Manteca de Cerdo', 1, NULL, '1', '2019-09-09 00:00:00'),
(385, 8, 'Almendras', 1, NULL, '1', '2019-09-09 00:00:00'),
(386, 8, 'Avellanas', 1, NULL, '1', '2019-09-09 00:00:00'),
(387, 8, 'Maní', 1, NULL, '1', '2019-09-09 00:00:00'),
(388, 8, 'Nuez', 1, NULL, '1', '2019-09-09 00:00:00'),
(389, 8, 'Pistacho', 1, NULL, '1', '2019-09-09 00:00:00'),
(390, 8, 'Castaña de Cajú', 1, NULL, '1', '2019-09-09 00:00:00'),
(391, 8, 'Linaza de Harina', 1, NULL, '1', '2019-09-09 00:00:00'),
(392, 8, 'Linaza de Semilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(393, 8, 'Sésamo', 1, NULL, '1', '2019-09-09 00:00:00'),
(394, 8, 'Aceituna', 1, NULL, '1', '2019-09-09 00:00:00'),
(395, 8, 'Palta', 1, NULL, '1', '2019-09-09 00:00:00'),
(396, 8, 'Piñones', 1, NULL, '1', '2019-09-09 00:00:00'),
(397, 8, 'Castañas', 1, NULL, '1', '2019-09-09 00:00:00'),
(398, 9, 'Azúcar Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(399, 9, 'Azúcar Rubia', 1, NULL, '1', '2019-09-09 00:00:00'),
(400, 9, 'Azúcar Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(401, 9, 'Azúcar Flor', 1, NULL, '1', '2019-09-09 00:00:00'),
(402, 9, 'Mermelada Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(403, 9, 'Mermelada Diet o Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(404, 9, 'Miel de Palma', 1, NULL, '1', '2019-09-09 00:00:00'),
(405, 9, 'Miel de Abeja', 1, NULL, '1', '2019-09-09 00:00:00'),
(406, 9, 'Jarabe para Postres', 1, NULL, '1', '2019-09-09 00:00:00'),
(407, 9, 'Jalea Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(408, 9, 'Jalea Diet o Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(409, 9, 'Leche Condensada Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(410, 9, 'Leche Condensada Diet o Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(411, 9, 'Manjar Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(412, 9, 'Manjar Diet o Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(413, 9, 'Chocolate Sólido con relleno', 1, NULL, '1', '2019-09-09 00:00:00'),
(414, 9, 'Chocolate Sólido sin relleno', 1, NULL, '1', '2019-09-09 00:00:00'),
(415, 9, 'Chocolate Sólido con semilla', 1, NULL, '1', '2019-09-09 00:00:00'),
(416, 9, 'Chocolate en Polvo', 1, NULL, '1', '2019-09-09 00:00:00'),
(417, 9, 'Dulce o Caramelo', 1, NULL, '1', '2019-09-09 00:00:00'),
(418, 9, 'Caramelos Masticables', 1, NULL, '1', '2019-09-09 00:00:00'),
(419, 9, 'Caramelos Calugas', 1, NULL, '1', '2019-09-09 00:00:00'),
(420, 9, 'Cuchufli sin Baño Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(421, 9, 'Cuchufli con Baño Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(422, 9, 'Galletas con Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(423, 9, 'Galletas Dulces con Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(424, 9, 'Galletas Dulces con Crema', 1, NULL, '1', '2019-09-09 00:00:00'),
(425, 9, 'Galletas Dulces con Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(426, 9, 'Galletas Dulces con Crema y Chocolate', 1, NULL, '1', '2019-09-09 00:00:00'),
(427, 9, 'Torta Mil Hojas', 1, NULL, '1', '2019-09-09 00:00:00'),
(428, 9, 'Torta Biscocho Relleno', 1, NULL, '1', '2019-09-09 00:00:00'),
(429, 9, 'Torta Panqueque', 1, NULL, '1', '2019-09-09 00:00:00'),
(430, 9, 'Pie Limón', 1, NULL, '1', '2019-09-09 00:00:00'),
(431, 9, 'Kuchen', 1, NULL, '1', '2019-09-09 00:00:00'),
(432, 9, 'Tartaleta', 1, NULL, '1', '2019-09-09 00:00:00'),
(433, 9, 'Berlín', 1, NULL, '1', '2019-09-09 00:00:00'),
(434, 9, 'Queque Casero', 1, NULL, '1', '2019-09-09 00:00:00'),
(435, 9, 'Alfajor Envasado', 1, NULL, '1', '2019-09-09 00:00:00'),
(436, 9, 'Alfajor Casero', 1, NULL, '1', '2019-09-09 00:00:00'),
(437, 9, 'Sacarina', 1, NULL, '1', '2019-09-09 00:00:00'),
(438, 9, 'Sucralosa', 1, NULL, '1', '2019-09-09 00:00:00'),
(439, 9, 'Otro', 1, NULL, '1', '2019-09-09 00:00:00'),
(440, 10, 'Flan', 1, NULL, '1', '2019-09-09 00:00:00'),
(441, 10, 'Leche Asada', 1, NULL, '1', '2019-09-09 00:00:00'),
(442, 10, 'Jalea', 1, NULL, '1', '2019-09-09 00:00:00'),
(443, 10, 'Mousse', 1, NULL, '1', '2019-09-09 00:00:00'),
(444, 10, 'Arroz con Leche', 1, NULL, '1', '2019-09-09 00:00:00'),
(445, 10, 'Helado de Agua', 1, NULL, '1', '2019-09-09 00:00:00'),
(446, 10, 'Helado de Crema Normal o Diet', 1, NULL, '1', '2019-09-09 00:00:00'),
(447, 10, 'Helado de Yogourt Normal o Diet', 1, NULL, '1', '2019-09-09 00:00:00'),
(448, 11, 'Jugo Líquido Envasado Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(449, 11, 'Jugo Líquido Envasado Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(450, 11, 'Jugo en Polvo Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(451, 11, 'Jugo en Polvo Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(452, 11, 'Bebida de Fantasía Normal', 1, NULL, '1', '2019-09-09 00:00:00'),
(453, 11, 'Bebida de Fantasía Light', 1, NULL, '1', '2019-09-09 00:00:00'),
(454, 11, 'Bebida de Fantasía Zero', 1, NULL, '1', '2019-09-09 00:00:00'),
(455, 11, 'Bebida de Fantasía Otra (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(456, 11, 'Agua Mineral sin Gas', 1, NULL, '1', '2019-09-09 00:00:00'),
(457, 11, 'Agua Mineral con Gas', 1, NULL, '1', '2019-09-09 00:00:00'),
(458, 11, 'Agua Mineral con Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(459, 11, 'Pisco', 1, NULL, '1', '2019-09-09 00:00:00'),
(460, 11, 'Ron', 1, NULL, '1', '2019-09-09 00:00:00'),
(461, 11, 'Vodka', 1, NULL, '1', '2019-09-09 00:00:00'),
(462, 11, 'Whisky', 1, NULL, '1', '2019-09-09 00:00:00'),
(463, 11, 'Tequila', 1, NULL, '1', '2019-09-09 00:00:00'),
(464, 11, 'Aguardiente', 1, NULL, '1', '2019-09-09 00:00:00'),
(465, 11, 'Vino Tinto', 1, NULL, '1', '2019-09-09 00:00:00'),
(466, 11, 'Vino Blanco', 1, NULL, '1', '2019-09-09 00:00:00'),
(467, 11, 'Vino Rose', 1, NULL, '1', '2019-09-09 00:00:00'),
(468, 11, 'Champaña', 1, NULL, '1', '2019-09-09 00:00:00'),
(469, 11, 'sidra', 1, NULL, '1', '2019-09-09 00:00:00'),
(470, 11, 'Chicha', 1, NULL, '1', '2019-09-09 00:00:00'),
(471, 11, 'Cerveza', 1, NULL, '1', '2019-09-09 00:00:00'),
(472, 11, 'Otra Bebida Alcohólica (especificar)', 1, NULL, '1', '2019-09-09 00:00:00'),
(473, 11, 'Bebidas Energéticas', 1, NULL, '1', '2019-09-09 00:00:00'),
(474, 11, 'Bebidas Deportivas', 1, NULL, '1', '2019-09-09 00:00:00'),
(475, 12, 'Té Negro', 1, NULL, '1', '2019-09-09 00:00:00'),
(476, 12, 'Té Verde', 1, NULL, '1', '2019-09-09 00:00:00'),
(477, 12, 'Té Rojo', 1, NULL, '1', '2019-09-09 00:00:00'),
(478, 12, 'Hierbas', 1, NULL, '1', '2019-09-09 00:00:00'),
(479, 12, 'Café Normal con Cafeína', 1, NULL, '1', '2019-09-09 00:00:00'),
(480, 12, 'Café Descafeinado', 1, NULL, '1', '2019-09-09 00:00:00'),
(481, 12, 'Café Reducido en Cafeína', 1, NULL, '1', '2019-09-09 00:00:00'),
(482, 12, 'Mate Hoja Natural', 1, NULL, '1', '2019-09-09 00:00:00'),
(483, 12, 'Mate Hoja con Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(484, 12, 'Mate Bolsita Natural', 1, NULL, '1', '2019-09-09 00:00:00'),
(485, 12, 'Mate Bolsita con Sabor', 1, NULL, '1', '2019-09-09 00:00:00'),
(486, 13, 'Mi Sopita', 1, NULL, '1', '2019-09-09 00:00:00'),
(487, 13, 'Purita Cereal', 1, NULL, '1', '2019-09-09 00:00:00'),
(488, 13, 'Purita Fortificada', 1, NULL, '1', '2019-09-09 00:00:00'),
(489, 13, 'Purita Mamá', 1, NULL, '1', '2019-09-09 00:00:00'),
(490, 13, 'Bebida Años Dorados', 1, NULL, '1', '2019-09-09 00:00:00'),
(491, 13, 'Crema Años Dorados', 1, NULL, '1', '2019-09-09 00:00:00'),
(492, 13, 'Vitaminas', 1, NULL, '1', '2019-09-09 00:00:00'),
(493, 13, 'Minerales', 1, NULL, '1', '2019-09-09 00:00:00'),
(494, 13, 'Polivitamínicos', 1, NULL, '1', '2019-09-09 00:00:00'),
(495, 13, 'Otro (especificar)', 1, NULL, '1', '2019-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_entrevistados
--

DROP TABLE IF EXISTS ns_entrevistados;
CREATE TABLE ns_entrevistados (
  rut varchar(10) NOT NULL,
  nombre varchar(50) NOT NULL,
  paterno varchar(30) NOT NULL,
  materno varchar(30) NOT NULL,
  fecha_nacimiento date NOT NULL,
  direccion varchar(80) NOT NULL,
  direccion2 varchar(80) NOT NULL,
  region int(11) NOT NULL,
  ciudad int(11) NOT NULL,
  comuna int(11) NOT NULL,
  tipo_area int(11) NOT NULL,
  mail varchar(80) NOT NULL,
  celular varchar(20) NOT NULL,
  telefono varchar(20) NOT NULL,
  referencia1_nombre varchar(40) NOT NULL,
  referencia1_numero varchar(20) NOT NULL,
  referencia2_nombre varchar(40) NOT NULL,
  referencia2_numero varchar(20) NOT NULL,
  codigo_encuestado int(11) NOT NULL,
  usuario_creacion int(11) NOT NULL,
  fecha_creacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Datos personales del encuestado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_modulos
--

DROP TABLE IF EXISTS ns_modulos;
CREATE TABLE ns_modulos (
  id_modulo int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  descripcion varchar(200) NOT NULL,
  usuario_creacion int(11) UNSIGNED NOT NULL,
  fecha_creacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definicion de Modulos ';

--
-- Volcado de datos para la tabla ns_modulos
--

INSERT INTO ns_modulos (id_modulo, nombre, descripcion, usuario_creacion, fecha_creacion) VALUES
(1, 'Cereales', 'Cereales consumidos durante el último mes', 1, '2019-09-02 21:55:02'),
(2, 'Verduras', 'Verduras consumidas durante el último mes', 1, '2019-09-02 21:58:22'),
(3, 'Frutas', 'Frutas consumidas durante el último mes', 1, '2019-09-02 22:03:01'),
(4, 'Legumbres', 'Legumbres consumidas durante el último mes', 1, '2019-09-02 22:03:18'),
(5, 'Lácteos', 'Lácteos consumidos durante el último mes', 1, '2019-09-02 22:11:33'),
(6, 'Carnes', 'Carnes consumidas durante el último mes', 1, '2019-09-02 22:12:12'),
(7, 'Pescados y Mariscos', 'Pescados y Mariscos consumidos durante el último mes', 1, '2019-09-02 22:13:16'),
(8, 'Aceites y Grasas', 'Aceites, Grasas y otros alimentos ricos en Lípidos consumidos durante el último mes', 1, '2019-09-02 22:14:05'),
(9, 'Azúcares', 'Azúcares consumidas durante el último mes', 1, '2019-09-02 22:14:57'),
(10, 'Postres y Helados', 'Postres y Helados consumidos durante el último mes', 1, '2019-09-02 22:15:46'),
(11, 'Bebidas y Alcoholes', 'Bebidas, Jugos y Alcoholes consumidos durante el último mes', 1, '2019-09-02 22:16:33'),
(12, 'Infusiones', 'Té, Café y Otras Hierbas consumidas durante el último mes', 1, '2019-09-02 22:17:15'),
(13, 'Complementos Nutritivos', 'Alimentos complementarios y Vitaminas consumidos durante el último mes', 1, '2019-09-02 22:18:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_parametros
--

DROP TABLE IF EXISTS ns_parametros;
CREATE TABLE ns_parametros (
  id_param int(11) UNSIGNED NOT NULL,
  tipo int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  label varchar(50) NOT NULL,
  tipo_dato varchar(20) NOT NULL,
  valor int(11) NOT NULL,
  fecha_creacion datetime NOT NULL,
  usuario_creacion int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definicion de parametros generales del sistema';

--
-- Volcado de datos para la tabla ns_parametros
--

INSERT INTO ns_parametros (id_param, tipo, nombre, label, tipo_dato, valor, fecha_creacion, usuario_creacion) VALUES
(35, 1, 'Si o No', 'Si', 'int', 0, '2019-09-10 00:44:38', 1),
(36, 1, 'Si o No', 'No', 'int', 1, '2019-09-10 00:44:38', 1),
(37, 2, 'Frecuencia de consumo', 'Días por semana', 'int', 0, '2019-09-10 00:44:38', 1),
(38, 2, 'Frecuencia de consumo', 'Días por mes', 'int', 1, '2019-09-10 00:44:38', 1),
(39, 3, 'Seleccionar imágen', 'Unidad', 'int', 0, '2019-09-10 00:44:38', 1),
(40, 3, 'Seleccionar imágen', 'Cantidad', 'int', 1, '2019-09-10 00:44:38', 1),
(41, 4, 'Forma de consumir fruta', 'Fresca', 'int', 0, '2019-09-10 00:44:38', 1),
(42, 4, 'Forma de consumir fruta', 'Cocida', 'int', 1, '2019-09-10 00:44:38', 1),
(43, 4, 'Forma de consumir fruta', 'Conserva', 'int', 2, '2019-09-10 00:44:38', 1),
(44, 5, 'tamaño', 'Pequeño', 'int', 0, '2019-09-10 00:44:38', 1),
(45, 5, 'tamaño', 'Mediano', 'int', 1, '2019-09-10 00:44:38', 1),
(46, 5, 'tamaño', 'Grande', 'int', 2, '2019-09-10 00:44:38', 1),
(47, 6, 'tipo_leche', 'Entera', 'int', 0, '2019-09-10 00:44:38', 1),
(48, 6, 'tipo_leche', 'Semidescremada', 'int', 1, '2019-09-10 00:44:38', 1),
(49, 6, 'tipo_leche', 'Descremada', 'int', 2, '2019-09-10 00:44:38', 1),
(50, 6, 'tipo_leche', 'No especificado', 'int', 3, '2019-09-10 00:44:38', 1),
(51, 7, 'sabor_leche', 'Sin Sabor', 'int', 0, '2019-09-10 00:44:38', 1),
(52, 7, 'sabor_leche', 'Con Sabor Normal', 'int', 1, '2019-09-10 00:44:38', 1),
(53, 7, 'sabor_leche', 'Con Sabor Diet', 'int', 2, '2019-09-10 00:44:38', 1),
(54, 7, 'sabor_leche', 'Con Calcio', 'int', 3, '2019-09-10 00:44:38', 1),
(55, 7, 'sabor_leche', 'Con Omega3', 'int', 4, '2019-09-10 00:44:38', 1),
(56, 7, 'sabor_leche', 'Con Fibras', 'int', 5, '2019-09-10 00:44:38', 1),
(57, 8, 'lactosa_leche', 'Con Lactosa', 'int', 0, '2019-09-10 00:44:38', 1),
(58, 8, 'lactosa_leche', 'Sin Lactosa', 'int', 1, '2019-09-10 00:44:38', 1),
(59, 8, 'lactosa_leche', 'No especificado', 'int', 2, '2019-09-10 00:44:38', 1),
(60, 9, 'tipo_yogourt', 'Normal', 'int', 0, '2019-09-10 00:44:38', 1),
(61, 9, 'tipo_yogourt', 'Diet o Light', 'int', 1, '2019-09-10 00:44:38', 1),
(62, 10, 'tipo_semillas', 'Con Sal', 'int', 0, '2019-09-10 00:44:38', 1),
(63, 10, 'tipo_semillas', 'Con Miel', 'int', 1, '2019-09-10 00:44:38', 1),
(64, 10, 'tipo_semillas', 'Con Merkén', 'int', 2, '2019-09-10 00:44:38', 1),
(65, 10, 'tipo_semillas', 'Con Orégano', 'int', 3, '2019-09-10 00:44:38', 1),
(66, 10, 'tipo_semillas', 'Confitado', 'int', 4, '2019-09-10 00:44:38', 1),
(67, 10, 'tipo_semillas', 'Otra Forma', 'int', 5, '2019-09-10 00:44:38', 1),
(68, 10, 'tipo_semillas', 'Natural', 'int', 6, '2019-09-10 00:44:38', 1),
(69, 11, 'Medida', 'ml.', 'int', 0, '2019-09-29 23:15:08', 1),
(70, 11, 'Medida', 'gr.', 'int', 1, '2019-09-29 23:15:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_preguntas
--

DROP TABLE IF EXISTS ns_preguntas;
CREATE TABLE ns_preguntas (
  id_pregunta int(11) UNSIGNED NOT NULL,
  id_modulo int(11) NOT NULL,
  codigo_pregunta varchar(10) NOT NULL,
  label_pregunta varchar(200) NOT NULL,
  tipo_respuesta int(11) NOT NULL,
  tipo_detalle_respuesta int(11) DEFAULT NULL,
  usuario_creacion int(11) NOT NULL,
  fecha_creacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definición de preguntas de la encuesta';

--
-- Volcado de datos para la tabla ns_preguntas
--

INSERT INTO ns_preguntas (id_pregunta, id_modulo, codigo_pregunta, label_pregunta, tipo_respuesta, tipo_detalle_respuesta, usuario_creacion, fecha_creacion) VALUES
(1, 1, 'DA1', 'Durante los últimos 30 días ¿ha consumido usted?', 1, 0, 1, '2019-09-09 23:52:06'),
(2, 1, 'DA3', 'Durante los últimos 30 días, ¿Cuántos días ha consumido?', 2, 1, 1, '2019-09-10 11:26:41'),
(3, 1, 'DA4', '¿Qué cantidad consumió cada día?', 3, 1, 1, '2019-09-10 11:28:51'),
(4, 1, 'DB1', 'Durante los últimos 30 días ¿ha consumido usted?', 1, 0, 1, '2019-09-09 23:52:06'),
(5, 1, 'DB3', 'Durante los últimos 30 días, ¿Cuántos días ha consumido?', 2, 1, 1, '2019-09-10 11:26:41'),
(6, 1, 'DB4', '¿Qué cantidad consumió cada día?', 3, 1, 1, '2019-09-10 11:28:51'),
(7, 1, 'DD1', 'Durante los últimos 30 días ¿ha consumido usted?', 1, 0, 1, '2019-09-09 23:52:06'),
(8, 1, 'DD3', 'Durante los últimos 30 días, ¿Cuántos días ha consumido?', 2, 1, 1, '2019-09-10 11:26:41'),
(9, 1, 'DD4', '¿Qué cantidad consumió cada día?', 3, 1, 1, '2019-09-10 11:28:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_registro_encuestas
--

DROP TABLE IF EXISTS ns_registro_encuestas;
CREATE TABLE ns_registro_encuestas (
  folio int(11) NOT NULL,
  codigo_zona int(11) NOT NULL,
  codigo_supevisor int(11) NOT NULL,
  codigo_encuestador int(11) NOT NULL,
  codigo_encuestado int(11) NOT NULL,
  fecha_creacion datetime NOT NULL,
  usuario_creacion datetime NOT NULL,
  fecha_modificacion datetime NOT NULL,
  usuario_modificacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Informacion general de la encuesta';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_relacion_alimento_foto
--

DROP TABLE IF EXISTS ns_relacion_alimento_foto;
CREATE TABLE ns_relacion_alimento_foto (
  id_rel_ali_foto int(11) NOT NULL,
  id_modulo int(11) NOT NULL,
  id_alimento int(11) DEFAULT NULL,
  pos_catalogo varchar(10) DEFAULT NULL,
  descripcion_catalogo varchar(100) DEFAULT NULL,
  url_foto1 varchar(200) DEFAULT NULL,
  valor_foto1 int(11) DEFAULT NULL,
  url_foto2 varchar(200) DEFAULT NULL,
  valor_foto2 int(11) DEFAULT NULL,
  url_foto3 varchar(200) DEFAULT NULL,
  valor_foto3 int(11) DEFAULT NULL,
  usuario_creacion varchar(50) DEFAULT NULL,
  fecha_creacion date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Medidas de vol. y masa de alimentos y preparaciones chilenas';

--
-- Volcado de datos para la tabla ns_relacion_alimento_foto
--

INSERT INTO ns_relacion_alimento_foto (id_rel_ali_foto, id_modulo, id_alimento, pos_catalogo, descripcion_catalogo, url_foto1, valor_foto1, url_foto2, valor_foto2, url_foto3, valor_foto3, usuario_creacion, fecha_creacion) VALUES
(222, 1, 1, '17a', 'Arroz Graneado', '17a1.jpg', 100, '17a2.jpg', 150, '17a3.jpg', 200, '1', '2019-09-09'),
(223, 1, 2, '17b', 'Arroz Integral', '17b1.jpg', 60, '17b2.jpg', 120, '17b3.jpg', 180, '1', '2019-09-09'),
(224, 1, 6, '17c', 'Spaghetti', '17c1.jpg', 110, '17c2.jpg', 220, '17c3.jpg', 320, '1', '2019-09-09'),
(225, 1, 7, '18a', 'Spaghetti Integral', '18a1.jpg', 110, '18a2.jpg', 220, '18a3.jpg', 320, '1', '2019-09-09'),
(226, 1, NULL, '18b', 'Corbatitas', '18b1.jpg', 100, '18b2.jpg', 150, '18b3.jpg', 200, '1', '2019-09-09'),
(227, 1, NULL, '18c', 'Cabellos de Ángel', '18c1.jpg', 110, '18c2.jpg', 220, '18c3.jpg', 330, '1', '2019-09-09'),
(228, 1, NULL, '19a', 'Tallarines', '19a1.jpg', 110, '19a2.jpg', 220, '19a3.jpg', 330, '1', '2019-09-09'),
(229, 1, 9, '19b', 'Ravioles Secos', '19b1.jpg', 120, '19b2.jpg', 180, '19b3.jpg', 240, '1', '2019-09-09'),
(230, 1, 9, '19c', 'Ravioles Frescos', '19c1.jpg', 120, '19c2.jpg', 180, '19c3.jpg', 240, '1', '2019-09-09'),
(231, 1, 15, '20a', 'Mote Trigo', '20a1.jpg', 100, '20a2.jpg', 150, '20a3.jpg', 200, '1', '2019-09-09'),
(232, 1, 16, '20b', 'Mote de Maíz', '20b1.jpg', 50, '20b2.jpg', 100, '20b3.jpg', 150, '1', '2019-09-09'),
(233, 1, 17, '20c', 'Quínoa', '20c1.jpg', 30, '20c2.jpg', 60, '20c3.jpg', 90, '1', '2019-09-09'),
(234, 1, 18, '21a', 'Choclo Entero', '21a1.jpg', 144, '21a2.jpg', 214, '21a3.jpg', 453, '1', '2019-09-09'),
(235, 1, NULL, '21b', 'Choclo Desgranado', '21b1.jpg', 100, '21b2.jpg', 150, '21b3.jpg', 200, '1', '2019-09-09'),
(236, 1, 19, '21c', 'Yuca', '21c1.jpg', 100, '21c2.jpg', 200, '21c3.jpg', 300, '1', '2019-09-09'),
(237, 1, 20, '22a', 'Papa Cocida con Cáscara', '22a1.jpg', 94, '22a2.jpg', 186, '22a3.jpg', 312, '1', '2019-09-09'),
(238, 1, 21, '22b', 'Papa Cocida sin Cáscara', '22b1.jpg', 87, '22b2.jpg', 165, '22b3.jpg', 294, '1', '2019-09-09'),
(239, 1, NULL, '22c', 'Piñones Cocidos', '22c1.jpg', 40, '22c2.jpg', 80, '22c3.jpg', 120, '1', '2019-09-09'),
(240, 1, NULL, '23a', 'Castañas Cocidas', '23a1.jpg', 40, '23a2.jpg', 80, '23a3.jpg', 120, '1', '2019-09-09'),
(241, 1, 48, '23b', 'Pan Tapadito', '23b1.jpg', 19, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(242, 1, 49, '23b', 'Pan Bocado de Dama', NULL, NULL, '23b2.jpg', 25, NULL, NULL, '1', '2019-09-09'),
(243, 1, 47, '23b', 'Pan Paris Ovalado', NULL, NULL, NULL, NULL, '23b3.jpg', 28, '1', '2019-09-09'),
(244, 1, 46, '23c', 'Pan Frica', '23c1.jpg', 82, '23c2.jpg', 106, '23c3.jpg', 161, '1', '2019-09-09'),
(245, 1, 45, '24a', 'Pan Rosita', '24a1.jpg', 29, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(246, 1, 43, '24a', 'Pan Amasado', NULL, NULL, '24a2.jpg', 59, NULL, NULL, '1', '2019-09-09'),
(247, 1, 39, '24a', 'Pan Dobladita', NULL, NULL, NULL, NULL, '24a3.jpg', 97, '1', '2019-09-09'),
(248, 1, 35, '24b', 'Pan Pita Integral', '24b1.jpg', 45, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(249, 1, 34, '24b', 'Pan Pita', NULL, NULL, '24b2.jpg', 48, NULL, NULL, '1', '2019-09-09'),
(250, 1, 44, '24b', 'Pan Crossaint', NULL, NULL, NULL, NULL, '24b3.jpg', 60, '1', '2019-09-09'),
(251, 1, 27, '24c', 'Pan Marraqueta', '24c1.jpg', 52, '24c2.jpg', 84, '24c3.jpg', 98, '1', '2019-09-09'),
(252, 1, 30, '25a', 'Pan Hallulla', '25a1.jpg', 37, '25a2.jpg', 67, '25a3.jpg', 93, '1', '2019-09-09'),
(253, 1, 37, '25c', 'Tortilla de Rescoldo', '25c1.jpg', 50, '25c2.jpg', 75, '25c3.jpg', 100, '1', '2019-09-09'),
(254, 1, 38, '26a', 'Tortilla al Horno ', '26a1.jpg', 50, '26a2.jpg', 75, '26a3.jpg', 100, '1', '2019-09-09'),
(255, 1, 42, '26b', 'Molde Integral', '26b1.jpg', 40, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(256, 1, 40, '26b', 'Molde Blanco', NULL, NULL, '26b2.jpg', 43, NULL, NULL, '1', '2019-09-09'),
(257, 1, NULL, '26b', 'Molde Grande', NULL, NULL, NULL, NULL, '26b3.jpg', 70, '1', '2019-09-09'),
(258, 1, 36, '26c', 'Tortilla Trigo', '26c1.jpg', 28, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(259, 1, NULL, '27a', 'Panqueques Extendido', '27a1.jpg', 23, '27a2.jpg', 46, '27a3.jpg', 76, '1', '2019-09-09'),
(260, 1, NULL, '27b', 'Panqueques Triangular', '27b1.jpg', 23, '27b2.jpg', 46, '27b3.jpg', 76, '1', '2019-09-09'),
(261, 1, NULL, '27c', 'Panqueques Rollo', '27c1.jpg', 23, '27c2.jpg', 46, '27c3.jpg', 76, '1', '2019-09-09'),
(262, 1, NULL, '28a', 'Milcao Horneado', '28a1.jpg', 126, '28a2.jpg', 150, '28a3.jpg', 227, '1', '2019-09-09'),
(263, 1, NULL, '28b', 'Milcao Frito', '28b1.jpg', 193, '28b2.jpg', 210, '28b3.jpg', 275, '1', '2019-09-09'),
(264, 1, NULL, '28c', 'Chochoca', '28c1.jpg', 280, '28c2.jpg', 344, '28c3.jpg', 453, '1', '2019-09-09'),
(265, 1, NULL, '29a', 'Chapalele', '29a1.jpg', 154, '29a2.jpg', 211, '29a3.jpg', 281, '1', '2019-09-09'),
(266, 1, NULL, '29b', 'Sopaipilla', '29b1.jpg', 35, '29b2.jpg', 73, '29b3.jpg', 151, '1', '2019-09-09'),
(267, 1, NULL, '29c', 'Cereal forma de Estrellitas', '29c1.jpg', 20, '29c2.jpg', 40, '29c3.jpg', 60, '1', '2019-09-09'),
(268, 1, 74, '30a', 'Cereal Hojuelas de Trigo Chocolate', '30a1.jpg', 20, '30a2.jpg', 40, '30a3.jpg', 60, '1', '2019-09-09'),
(269, 1, 71, '30b', 'Avena', '30b1.jpg', 20, '30b2.jpg', 40, '30b3.jpg', 60, '1', '2019-09-09'),
(270, 1, 75, '30c', 'Granola', '30c1.jpg', 20, '30c2.jpg', 40, '30c3.jpg', 60, '1', '2019-09-09'),
(271, 1, NULL, '31a', 'Cereal Hojuelas de Maíz Azucarado', '31a1.jpg', 20, '31a2.jpg', 40, '31a3.jpg', 60, '1', '2019-09-09'),
(272, 1, 79, '31b', 'Cereal Trigo Inflado', '31b1.jpg', 10, '31b2.jpg', 20, '31b3.jpg', 30, '1', '2019-09-09'),
(273, 1, 77, '31c', 'Cereal Arroz Inflado', '31c1.jpg', 5, '31c2.jpg', 10, '31c3.jpg', 15, '1', '2019-09-09'),
(274, 1, 78, '32a', 'Cereal Maíz Inflado', '32a1.jpg', 10, '32a2.jpg', 20, '32a3.jpg', 30, '1', '2019-09-09'),
(275, 2, 80, '33a', 'Acelga Cocida', '33a1.jpg', 50, '33a2.jpg', 110, '33a3.jpg', 170, '1', '2019-09-09'),
(276, 2, 80, '33b', 'Acelga Cruda', '33b1.jpg', 25, '33b2.jpg', 60, '33b3.jpg', 100, '1', '2019-09-09'),
(277, 2, 81, '33c', 'Achicoria', '33c1.jpg', 40, '33c2.jpg', 70, '33c3.jpg', 100, '1', '2019-09-09'),
(278, 2, 82, '34a', 'Ají Verde', '34a1.jpg', 9, '34a2.jpg', 19, '34a3.jpg', 55, '1', '2019-09-09'),
(279, 2, 83, '34b', 'Ajo Cabeza (Diente unidad)', '34b1.jpg', 4, '34b2.jpg', 6, '34b3.jpg', 16, '1', '2019-09-09'),
(280, 2, 84, '34c', 'Alcachofa', '34c1.jpg', 179, '34c2.jpg', 259, '34c3.jpg', 462, '1', '2019-09-09'),
(281, 2, 84, '', 'Carne Hojas', '1.jpg', 25, '2.jpg', 42, '3.jpg', 50, '1', '2019-09-09'),
(282, 2, 84, '', 'Fondo Alcachofas', '1.jpg', 21, '2.jpg', 30, '3.jpg', 57, '1', '2019-09-09'),
(283, 2, 84, '', 'Tallo', '1.jpg', 13, '2.jpg', 16, '3.jpg', 26, '1', '2019-09-09'),
(284, 2, 85, '35a', 'Alfalfa Brotes', '35a1.jpg', 30, '35a2.jpg', 90, '35a3.jpg', 150, '1', '2019-09-09'),
(285, 2, 86, '35b', 'Apio Bastones', '35b1.jpg', 35, '35b2.jpg', 88, '35b3.jpg', 140, '1', '2019-09-09'),
(286, 2, 86, '35c', 'Apio Picado', '35c1.jpg', 35, '35c2.jpg', 88, '35c3.jpg', 140, '1', '2019-09-09'),
(287, 2, 87, '36a', 'Berenjena', '36a1.jpg', 40, '36a2.jpg', 100, '36a3.jpg', 160, '1', '2019-09-09'),
(288, 2, 88, '36b', 'Berros', '36b1.jpg', 40, '36b2.jpg', 70, '36b3.jpg', 100, '1', '2019-09-09'),
(289, 2, 89, '36c', 'Betarraga Cubos', '36c1.jpg', 50, '36c2.jpg', 110, '36c3.jpg', 170, '1', '2019-09-09'),
(290, 2, 89, '37a', 'Betarraga Media Luna', '37a1.jpg', 50, '37a2.jpg', 110, '37a3.jpg', 170, '1', '2019-09-09'),
(291, 2, 90, '37b', 'Brócoli', '37b1.jpg', 40, '37b2.jpg', 100, '37b3.jpg', 160, '1', '2019-09-09'),
(292, 2, NULL, '37c', 'Brote de Soya', '37c1.jpg', 40, '37c2.jpg', 100, '37c3.jpg', 160, '1', '2019-09-09'),
(293, 2, 91, '38a', 'Bruselas', '38a1.jpg', 50, '38a2.jpg', 125, '38a3.jpg', 200, '1', '2019-09-09'),
(294, 2, 92, '38b', 'Cebolla en Cubitos', '38b1.jpg', 30, '38b2.jpg', 75, '38b3.jpg', 120, '1', '2019-09-09'),
(295, 2, 92, '38c', 'Cebolla Pluma', '38c1.jpg', 30, '38c2.jpg', 75, '38c3.jpg', 120, '1', '2019-09-09'),
(296, 2, 93, '39a', 'Cebollín Picado', '39a1.jpg', 10, '39a2.jpg', 100, '39a3.jpg', 160, '1', '2019-09-09'),
(297, 2, 94, '39b', 'Champiñón Picado', '39b1.jpg', 50, '39b2.jpg', 125, '39b3.jpg', 200, '1', '2019-09-09'),
(298, 2, 95, '39c', 'Ciboulette', '39c1.jpg', 25, '39c2.jpg', 63, '39c3.jpg', 100, '1', '2019-09-09'),
(299, 2, 96, '40a', 'Cilantro', '40a1.jpg', 3, '40a2.jpg', 9, '40a3.jpg', 15, '1', '2019-09-09'),
(300, 2, 97, '40b', 'Cochayuyo Picado', '40b1.jpg', 25, '40b2.jpg', 63, '40b3.jpg', 100, '1', '2019-09-09'),
(301, 2, 98, '40c', 'Coliflor', '40c1.jpg', 55, '40c2.jpg', 138, '40c3.jpg', 220, '1', '2019-09-09'),
(302, 2, 100, '41a', 'Endivia', '41a1.jpg', 25, '41a2.jpg', 63, '41a3.jpg', 100, '1', '2019-09-09'),
(303, 2, 101, '41b', 'Espárragos', '41b1.jpg', 50, '41b2.jpg', 125, '41b3.jpg', 200, '1', '2019-09-09'),
(304, 2, 102, '41c', 'Espinaca Cocida', '41c1.jpg', 50, '41c2.jpg', 125, '41c3.jpg', 200, '1', '2019-09-09'),
(305, 2, 102, '42a', 'Espinaca Cruda', '42a1.jpg', 25, '42a2.jpg', 63, '42a3.jpg', 100, '1', '2019-09-09'),
(306, 2, 103, '42b', 'Lechuga Costina Hoja', '42b1.jpg', 50, '42b2.jpg', 125, '42b3.jpg', 200, '1', '2019-09-09'),
(307, 2, 103, '42c', 'Lechuga Costina Picada', '42c1.jpg', 40, '42c2.jpg', 70, '42c3.jpg', 100, '1', '2019-09-09'),
(308, 2, 103, '43a', 'Lechuga Escarola', '43a1.jpg', 50, '43a2.jpg', 125, '43a3.jpg', 200, '1', '2019-09-09'),
(309, 2, 104, '43b', 'Luche Cocido', '43b1.jpg', 25, '43b2.jpg', 63, '43b3.jpg', 100, '1', '2019-09-09'),
(310, 2, 105, '43c', 'Palmitos Enteros', '43c1.jpg', 52, '43c2.jpg', 76, '43c3.jpg', 116, '1', '2019-09-09'),
(311, 2, 105, '44a', 'Palmitos en Rodelas', '44a1.jpg', 30, '44a2.jpg', 75, '44a3.jpg', 120, '1', '2019-09-09'),
(312, 2, 106, '44b', 'Penca', '44b1.jpg', 25, '44b2.jpg', 63, '44b3.jpg', 100, '1', '2019-09-09'),
(313, 2, 107, '44c', 'Pepino en Rodela', '44c1.jpg', 60, '44c2.jpg', 120, '44c3.jpg', 180, '1', '2019-09-09'),
(314, 2, 108, '45a', 'Perejil', '45a1.jpg', 3, '45a2.jpg', 9, '45a3.jpg', 15, '1', '2019-09-09'),
(315, 2, 109, '45b', 'Pimiento Verde en Cubitos', '45b1.jpg', 60, '45b2.jpg', 120, '45b3.jpg', 180, '1', '2019-09-09'),
(316, 2, 109, '45c', 'Pimiento Verde en Juliana', '45c1.jpg', 60, '45c2.jpg', 120, '45c3.jpg', 180, '1', '2019-09-09'),
(317, 2, 110, '46a', 'Poroto Verde', '46a1.jpg', 35, '46a2.jpg', 88, '46a3.jpg', 140, '1', '2019-09-09'),
(318, 2, 111, '46b', 'Rabanito en Rodelas', '46b1.jpg', 20, '46b2.jpg', 50, '46b3.jpg', 80, '1', '2019-09-09'),
(319, 2, 112, '46c', 'Repollo Crudo', '46c1.jpg', 50, '46c2.jpg', 125, '46c3.jpg', 200, '1', '2019-09-09'),
(320, 2, 113, '47a', 'Repollo Morado Crudo', '47a1.jpg', 50, '47a2.jpg', 125, '47a3.jpg', 200, '1', '2019-09-09'),
(321, 2, 114, '47b', 'Rúcula', '47b1.jpg', 20, '47b2.jpg', 35, '47b3.jpg', 50, '1', '2019-09-09'),
(322, 2, 115, '47c', 'Tomate en Rodelas', '47c1.jpg', 40, '47c2.jpg', 100, '47c3.jpg', 160, '1', '2019-09-09'),
(323, 2, 115, '48a', 'Tomate en Cubos', '48a1.jpg', 60, '48a2.jpg', 120, '48a3.jpg', 240, '1', '2019-09-09'),
(324, 2, 116, '48b', 'Ulte', '48b1.jpg', 40, '48b2.jpg', 100, '48b3.jpg', 160, '1', '2019-09-09'),
(325, 2, 117, '48c', 'Zanahoria en Cubo', '48c1.jpg', 50, '48c2.jpg', 125, '48c3.jpg', 200, '1', '2019-09-09'),
(326, 2, 117, '49a', 'Zanahoria Rallada', '49a1.jpg', 50, '49a2.jpg', 125, '49a3.jpg', 200, '1', '2019-09-09'),
(327, 2, 118, '49b', 'Zapallo Camote en Trozo', '49b1.jpg', 50, '49b2.jpg', 110, '49b3.jpg', 170, '1', '2019-09-09'),
(328, 2, 118, '49c', 'Zapallo Camote en Cubo', '49c1.jpg', 50, '49c2.jpg', 110, '49c3.jpg', 170, '1', '2019-09-09'),
(329, 2, 118, '50a', 'Zapallo Camote Molido', '50a1.jpg', 50, '50a2.jpg', 110, '50a3.jpg', 170, '1', '2019-09-09'),
(330, 2, 119, '50b', 'Zapallo Italiano en Media Luna', '50b1.jpg', 60, '50b2.jpg', 150, '50b3.jpg', 240, '1', '2019-09-09'),
(331, 2, 119, '50c', 'Zapallo Italiano Entero', '50c1.jpg', 228, '50c2.jpg', 437, '50c3.jpg', 625, '1', '2019-09-09'),
(332, 2, 119, '51a', 'Zapallo Italiano Mitades/Interior', '51a1.jpg', 3, '51a2.jpg', 4, '51a3.jpg', 5, '1', '2019-09-09'),
(333, 3, 121, '52a', 'Arándanos', '52a1.jpg', 65, '52a2.jpg', 98, '52a3.jpg', 130, '1', '2019-09-09'),
(334, 3, 124, '52b', 'Cerezas', '52b1.jpg', 90, '52b2.jpg', 135, '52b3.jpg', 180, '1', '2019-09-09'),
(335, 3, 126, '52c', 'Chirimoya Picada', '52c1.jpg', 90, '52c2.jpg', 135, '52c3.jpg', 150, '1', '2019-09-09'),
(336, 3, 126, '53a', 'Chirimoya en Cuartos', '53a1.jpg', 110, '53a2.jpg', 160, '53a3.jpg', 210, '1', '2019-09-09'),
(337, 3, 127, '53b', 'Ciruelas', '53b1.jpg', 68, '53b2.jpg', 87, '53b3.jpg', 108, '1', '2019-09-09'),
(338, 3, 129, '53c', 'Damascos', '53c1.jpg', 110, '53c2.jpg', 160, '53c3.jpg', 270, '1', '2019-09-09'),
(339, 3, 134, '54a', 'Frambuesas', '54a1.jpg', 130, '54a2.jpg', 195, '54a3.jpg', 250, '1', '2019-09-09'),
(340, 3, 145, '54b', 'Frutillas', '54b1.jpg', 65, '54b2.jpg', 130, '54b3.jpg', 195, '1', '2019-09-09'),
(341, 3, 137, '54c', 'Granada', '54c1.jpg', 48, '54c2.jpg', 85, '54c3.jpg', 132, '1', '2019-09-09'),
(342, 3, 141, '55a', 'Higos', '55a1.jpg', 80, '55a2.jpg', 130, '55a3.jpg', 177, '1', '2019-09-09'),
(343, 3, 143, '55b', 'Kiwi', '55b1.jpg', 38, '55b2.jpg', 52, '55b3.jpg', 83, '1', '2019-09-09'),
(344, 3, 143, '55c', 'Kiwi en Rodelas', '55c1.jpg', 100, '55c2.jpg', 150, '55c3.jpg', 200, '1', '2019-09-09'),
(345, 3, 144, '56a', 'Limón', '56a1.jpg', 23, '56a2.jpg', 30, '56a3.jpg', 44, '1', '2019-09-09'),
(346, 3, 144, '56b', 'Limón de Pica', '56b1.jpg', 14, '56b2.jpg', 21, '56b3.jpg', 30, '1', '2019-09-09'),
(347, 3, 146, '56c', 'Macedonia Natural', '56c1.jpg', 120, '56c2.jpg', 180, '56c3.jpg', 240, '1', '2019-09-09'),
(348, 3, 147, '57a', 'Mandarinas', '57a1.jpg', 26, '57a2.jpg', 50, '57a3.jpg', 57, '1', '2019-09-09'),
(349, 3, 128, '57b', 'Clementinas', '57b1.jpg', 43, '57b2.jpg', 97, '57b3.jpg', 139, '1', '2019-09-09'),
(350, 3, 158, '57c', 'Naranjas', '57c1.jpg', 125, '57c2.jpg', 193, '57c3.jpg', 296, '1', '2019-09-09'),
(351, 3, 148, '58a', 'Mangos', '58a1.jpg', 119, '58a2.jpg', 140, '58a3.jpg', 181, '1', '2019-09-09'),
(352, 3, 148, '58b', 'Mangos Picados', '58b1.jpg', 50, '58b2.jpg', 100, '58b3.jpg', 150, '1', '2019-09-09'),
(353, 3, 150, '58c', 'Manzana Fuji', '58c1.jpg', 90, '58c2.jpg', 110, '58c3.jpg', 170, '1', '2019-09-09'),
(354, 3, 150, '59a', 'Manzana Roja', '59a1.jpg', 121, '59a2.jpg', 176, '59a3.jpg', 229, '1', '2019-09-09'),
(355, 3, 150, '59b', 'Manzana Verde', '59b1.jpg', 107, '59b2.jpg', 176, '59b3.jpg', 208, '1', '2019-09-09'),
(356, 3, 153, '59c', 'Melón Calameño', '59c1.jpg', 171, '59c2.jpg', 257, '59c3.jpg', 343, '1', '2019-09-09'),
(357, 3, 154, '60a', 'Melón Tuna', '60a1.jpg', 174, '60a2.jpg', 262, '60a3.jpg', 343, '1', '2019-09-09'),
(358, 3, 155, '60b', 'Membrillo', '60b1.jpg', 120, '60b2.jpg', 172, '60b3.jpg', 216, '1', '2019-09-09'),
(359, 3, 156, '60c', 'Mora', '60c1.jpg', 130, '60c2.jpg', 195, '60c3.jpg', 250, '1', '2019-09-09'),
(360, 3, 131, '61a', 'Durazno', '61a1.jpg', 99, '61a2.jpg', 137, '61a3.jpg', 227, '1', '2019-09-09'),
(361, 3, 132, '61b', 'Durazno Conservero', '61b1.jpg', 173, '61b2.jpg', 214, '61b3.jpg', 285, '1', '2019-09-09'),
(362, 3, NULL, '61c', 'Durazno Plátano', '61c1.jpg', 100, '61c2.jpg', 125, '61c3.jpg', 134, '1', '2019-09-09'),
(363, 3, 159, '62a', 'Níspero', '62a1.jpg', 29, '62a2.jpg', 45, '62a3.jpg', 52, '1', '2019-09-09'),
(364, 3, 160, '62b', 'Papaya Picada', '62b1.jpg', 50, '62b2.jpg', 100, '62b3.jpg', 150, '1', '2019-09-09'),
(365, 3, 162, '62c', 'Pepino Dulce', '62c1.jpg', 125, '62c2.jpg', 163, '62c3.jpg', 214, '1', '2019-09-09'),
(366, 3, 163, '63a', 'Peras', '63a1.jpg', 77, '63a2.jpg', 111, '63a3.jpg', 159, '1', '2019-09-09'),
(367, 3, 165, '63b', 'Piñas en Cubo', '63b1.jpg', 120, '63b2.jpg', 186, '63b3.jpg', 246, '1', '2019-09-09'),
(368, 3, 164, '63c', 'Piñas en Rodelas', '63c1.jpg', 62, '63c2.jpg', 112, '63c3.jpg', 144, '1', '2019-09-09'),
(369, 3, 166, '64a', 'Plátano', '64a1.jpg', 68, '64a2.jpg', 88, '64a3.jpg', 129, '1', '2019-09-09'),
(370, 3, 167, '64b', 'Pomelo', '64b1.jpg', 146, '64b2.jpg', 299, '64b3.jpg', 336, '1', '2019-09-09'),
(371, 3, 168, '64c', 'Sandía', '64c1.jpg', 400, '64c2.jpg', 600, '64c3.jpg', 800, '1', '2019-09-09'),
(372, 3, 169, '65a', 'Tuna', '65a1.jpg', 48, '65a2.jpg', 61, '65a3.jpg', 87, '1', '2019-09-09'),
(373, 3, 170, '65b', 'Uva Blanca', '65b1.jpg', 112, '65b2.jpg', 200, '65b3.jpg', 309, '1', '2019-09-09'),
(374, 3, 170, '65c', 'Uva Blanca Desgranada', '65c1.jpg', 90, '65c2.jpg', 135, '65c3.jpg', 180, '1', '2019-09-09'),
(375, 3, 170, '66a', 'Uva Rosada', '66a1.jpg', 114, '66a2.jpg', 203, '66a3.jpg', 310, '1', '2019-09-09'),
(376, 3, 170, '66b', 'Uva Rosada Desgranada', '66b1.jpg', 100, '66b2.jpg', 150, '66b3.jpg', 200, '1', '2019-09-09'),
(377, 4, 182, '67a', 'Arvejas', '67a1.jpg', 50, '67a2.jpg', 125, '67a3.jpg', 200, '1', '2019-09-09'),
(378, 4, 181, '67b', 'Garbanzos', '67b1.jpg', 50, '67b2.jpg', 125, '67b3.jpg', 200, '1', '2019-09-09'),
(379, 4, 183, '67c', 'Habas', '67c1.jpg', 50, '67c2.jpg', 125, '67c3.jpg', 200, '1', '2019-09-09'),
(380, 4, 180, '68a', 'Lentejas', '68a1.jpg', 50, '68a2.jpg', 125, '68a3.jpg', 200, '1', '2019-09-09'),
(381, 4, 178, '68b', 'Porotos Negros', '68b1.jpg', 50, '68b2.jpg', 125, '68b3.jpg', 200, '1', '2019-09-09'),
(382, 4, 177, '68c', 'Porotos', '68c1.jpg', 50, '68c2.jpg', 125, '68c3.jpg', 200, '1', '2019-09-09'),
(383, 5, 203, '69a', 'Queso Mantecoso', '69a1.jpg', 25, '69a2.jpg', 50, '69a3.jpg', 75, '1', '2019-09-09'),
(384, 5, 212, '69b', 'Queso Crema', '69b1.jpg', 6, '69b2.jpg', 12, '69b3.jpg', 18, '1', '2019-09-09'),
(385, 5, 202, '69c1', 'Queso Gauda', '69c11.jpg', 30, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(386, 5, 203, '69c2', 'Queso Mantecoso', NULL, NULL, '69c22.jpg', 43, NULL, NULL, '1', '2019-09-09'),
(387, 5, 204, '69c3', 'Queso Ranco', NULL, NULL, NULL, NULL, '69c33.jpg', 31, '1', '2019-09-09'),
(388, 5, NULL, '70a', 'Queso Láminas de trozo 1', '70a1.jpg', 10, '70a2.jpg', 20, '70a3.jpg', 30, '1', '2019-09-09'),
(389, 5, NULL, '70b', 'Queso Láminas de trozo 2', '70b1.jpg', 20, '70b2.jpg', 40, '70b3.jpg', 60, '1', '2019-09-09'),
(390, 5, 214, '70c', 'Queso Cabra', '70c1.jpg', 25, '70c2.jpg', 50, '70c3.jpg', 75, '1', '2019-09-09'),
(391, 5, NULL, '71a', 'Queso Camembert', '71a1.jpg', 25, '71a2.jpg', 50, '71a3.jpg', 75, '1', '2019-09-09'),
(392, 5, NULL, '71b', 'Queso Provoleta', '71b1.jpg', 25, '71b2.jpg', 50, '71b3.jpg', 75, '1', '2019-09-09'),
(393, 5, 205, '71c', 'Queso Edam', '71c1.jpg', 25, '71c2.jpg', 50, '71c3.jpg', 75, '1', '2019-09-09'),
(394, 5, 213, '72a', 'Queso Parmesano Rallado', '72a1.jpg', 10, '72a2.jpg', 15, '72a3.jpg', 20, '1', '2019-09-09'),
(395, 5, NULL, '72b', 'Quesillo Laminado', '72b1.jpg', 60, '72b2.jpg', 90, '72b3.jpg', 120, '1', '2019-09-09'),
(396, 5, 209, '72c', 'Quesillo Trozo', '72c1.jpg', 60, '72c2.jpg', 90, '72c3.jpg', 120, '1', '2019-09-09'),
(397, 5, NULL, '73a', 'Queso Brie', '73a1.jpg', 25, '73a2.jpg', 50, '73a3.jpg', 75, '1', '2019-09-09'),
(398, 5, NULL, '73b', 'Queso Gruyere Trozo', '73b1.jpg', 25, '73b2.jpg', 50, '73b3.jpg', 75, '1', '2019-09-09'),
(399, 6, NULL, '76a', 'Bistec', '76a1.jpg', 50, '76a2.jpg', 100, '76a3.jpg', 150, '1', '2019-09-09'),
(400, 6, NULL, '76b', 'Carne Trozo 1', '76b1.jpg', 50, '76b2.jpg', 100, '76b3.jpg', 150, '1', '2019-09-09'),
(401, 6, NULL, '76c', 'Carne Trozo 2', '76c1.jpg', 47, '76c2.jpg', 96, '76c3.jpg', 146, '1', '2019-09-09'),
(402, 6, NULL, '77a', 'Bife', '77a1.jpg', 96, '77a2.jpg', 252, '77a3.jpg', 387, '1', '2019-09-09'),
(403, 6, NULL, '77b', 'Cazuela', '77b1.jpg', 65, '77b2.jpg', 116, '77b3.jpg', 161, '1', '2019-09-09'),
(404, 6, NULL, '', 'Carne', '1.jpg', 50, '2.jpg', 85, '3.jpg', 111, '1', '2019-09-09'),
(405, 6, NULL, '', 'Huesos', '1.jpg', 15, '2.jpg', 31, '3.jpg', 50, '1', '2019-09-09'),
(406, 6, 227, '77c', 'Osobuco', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(407, 6, NULL, '', 'Carne', '1.jpg', 44, '2.jpg', 91, '3.jpg', 153, '1', '2019-09-09'),
(408, 6, NULL, '', 'Hueso', '1.jpg', 32, '2.jpg', 53, '3.jpg', 65, '1', '2019-09-09'),
(409, 6, NULL, '', 'Médula', '1.jpg', 2, '2.jpg', 7, '3.jpg', 15, '1', '2019-09-09'),
(410, 6, 233, '78a', 'Carne Molida/Vegetal seca', '78a1.jpg', 2, '78a2.jpg', 2, '78a3.jpg', 2, '1', '2019-09-09'),
(411, 6, NULL, '78b', 'Carne Picada', '78b1.jpg', 50, '78b2.jpg', 100, '78b3.jpg', 150, '1', '2019-09-09'),
(412, 6, 294, '78c', 'Hamburguesas Preelaboradas', '78c1.jpg', 49, '78c2.jpg', 96, '78c3.jpg', 123, '1', '2019-09-09'),
(413, 6, 270, '79a', 'Lengua de Vacuno Trozo', '79a1.jpg', 60, '79a2.jpg', 120, '79a3.jpg', 180, '1', '2019-09-09'),
(414, 6, NULL, '79b', 'Lengua de Vacuno Lámina', '79b1.jpg', 60, '79b2.jpg', 120, '79b3.jpg', 180, '1', '2019-09-09'),
(415, 6, 273, '79c', 'Ubre Laminada', '79c1.jpg', 60, '79c2.jpg', 120, '79c3.jpg', 180, '1', '2019-09-09'),
(416, 6, 238, '80a', 'Pollo Trutro Entero', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(417, 6, NULL, '', 'Carne', '1.jpg', 74, '2.jpg', 109, '3.jpg', 151, '1', '2019-09-09'),
(418, 6, NULL, '', 'Cuero', '1.jpg', 11, '2.jpg', 16, '3.jpg', 22, '1', '2019-09-09'),
(419, 6, NULL, '', 'Hueso', '1.jpg', 29, '2.jpg', 42, '3.jpg', 58, '1', '2019-09-09'),
(420, 6, NULL, '80b', 'Pollo Trutro Corto', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(421, 6, NULL, '', 'Carne', '1.jpg', 43, '2.jpg', 64, '3.jpg', 86, '1', '2019-09-09'),
(422, 6, NULL, '', 'Cuero', '1.jpg', 8, '2.jpg', 10, '3.jpg', 12, '1', '2019-09-09'),
(423, 6, NULL, '', 'Hueso', '1.jpg', 13, '2.jpg', 17, '3.jpg', 22, '1', '2019-09-09'),
(424, 6, NULL, '80c', 'Pollo Trutro Largo', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(425, 6, NULL, '', 'Carne', '1.jpg', 31, '2.jpg', 44, '3.jpg', 66, '1', '2019-09-09'),
(426, 6, NULL, '', 'Cuero', '1.jpg', 4, '2.jpg', 6, '3.jpg', 10, '1', '2019-09-09'),
(427, 6, NULL, '', 'Hueso', '1.jpg', 16, '2.jpg', 25, '3.jpg', 36, '1', '2019-09-09'),
(428, 6, NULL, '81a', 'Pollo Pechuga Filetillo', '81a1.jpg', 50, '81a2.jpg', 100, '81a3.jpg', 150, '1', '2019-09-09'),
(429, 6, 237, '81b', 'Pollo Pechuga Deshuesada', '81b1.jpg', 50, '81b2.jpg', 100, '81b3.jpg', 150, '1', '2019-09-09'),
(430, 6, 239, '81c', 'Pollo Ala', '81c1.jpg', 73, '81c2.jpg', 82, '81c3.jpg', 102, '1', '2019-09-09'),
(431, 6, NULL, '82a', 'Pollo Truto Ala', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(432, 6, NULL, '', 'Carne', '1.jpg', 13, '2.jpg', 14, '3.jpg', 20, '1', '2019-09-09'),
(433, 6, NULL, '', 'Cuero', '1.jpg', 2, '2.jpg', 5, '3.jpg', 7, '1', '2019-09-09'),
(434, 6, NULL, '', 'Hueso', '1.jpg', 7, '2.jpg', 11, '3.jpg', 13, '1', '2019-09-09'),
(435, 6, NULL, '82b', 'Pollo Pata', '82b1.jpg', 40, '82b2.jpg', 55, '82b3.jpg', 65, '1', '2019-09-09'),
(436, 6, 242, '82c', 'Pollo Picado', '82c1.jpg', 50, '82c2.jpg', 100, '82c3.jpg', 150, '1', '2019-09-09'),
(437, 6, 245, '83a', 'Pavo Osobuco', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(438, 6, NULL, '', 'Carne', '1.jpg', 49, '2.jpg', 62, '3.jpg', 105, '1', '2019-09-09'),
(439, 6, NULL, '', 'Cuero', '1.jpg', 9, '2.jpg', 15, '3.jpg', 4, '1', '2019-09-09'),
(440, 6, NULL, '', 'Hueso', '1.jpg', 9, '2.jpg', 23, '3.jpg', 60, '1', '2019-09-09'),
(441, 6, 243, '83b', 'Pavo Ala Media', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(442, 6, NULL, '', 'Carne', '1.jpg', 42, '2.jpg', 51, '3.jpg', 83, '1', '2019-09-09'),
(443, 6, NULL, '', 'Cuero', '1.jpg', 15, '2.jpg', 24, '3.jpg', 46, '1', '2019-09-09'),
(444, 6, NULL, '', 'Hueso', '1.jpg', 22, '2.jpg', 25, '3.jpg', 54, '1', '2019-09-09'),
(445, 6, NULL, '83c1', 'Pavo Trutro Ala', '83c11.jpg', 125, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(446, 6, 244, '83c2', 'Pavo Trutro Corto', NULL, NULL, '83c22.jpg', 310, NULL, NULL, '1', '2019-09-09'),
(447, 6, 248, '84a', 'Cerdo Pulpa', '84a1.jpg', 50, '84a2.jpg', 100, '84a3.jpg', 150, '1', '2019-09-09'),
(448, 6, 253, '84b', 'Cerdo Costilla', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(449, 6, NULL, '', 'Carne', '1.jpg', 95, '2.jpg', 129, '3.jpg', 169, '1', '2019-09-09'),
(450, 6, NULL, '', 'Hueso', '1.jpg', 15, '2.jpg', 27, '3.jpg', 38, '1', '2019-09-09'),
(451, 6, 250, '84c', 'Cerdo Chuleta', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(452, 6, NULL, '', 'Carne', '1.jpg', 61, '2.jpg', 98, '3.jpg', 138, '1', '2019-09-09'),
(453, 6, NULL, '', 'Hueso', '1.jpg', 17, '2.jpg', 23, '3.jpg', 36, '1', '2019-09-09'),
(454, 6, 252, '85a', 'Cerdo Pernil', '85a1.jpg', 50, '85a2.jpg', 92, '85a3.jpg', 140, '1', '2019-09-09'),
(455, 6, NULL, '85b', 'Cerdo Pernil láminas', '85b1.jpg', 50, '85b2.jpg', 92, '85b3.jpg', 140, '1', '2019-09-09'),
(456, 6, NULL, '85c', 'Cerdo Picado', '85c1.jpg', 50, '85c2.jpg', 100, '85c3.jpg', 150, '1', '2019-09-09'),
(457, 6, NULL, '86a', 'Cerdo Cuero en Juliana', '86a1.jpg', 20, '86a2.jpg', 40, '86a3.jpg', 60, '1', '2019-09-09'),
(458, 6, 269, '86b', 'Riñones', '86b1.jpg', 50, '86b2.jpg', 100, '86b3.jpg', 150, '1', '2019-09-09'),
(459, 6, NULL, '87a', 'Conejo Muslo', '87a1.jpg', 100, '87a2.jpg', 120, '87a3.jpg', 140, '1', '2019-09-09'),
(460, 6, NULL, '87b', 'Conejo Lomo', '87b1.jpg', 126, '87b2.jpg', 144, '87b3.jpg', 174, '1', '2019-09-09'),
(461, 6, NULL, '87c', 'Conejo Pata', '87c1.jpg', 48, '87c2.jpg', 64, '87c3.jpg', 82, '1', '2019-09-09'),
(462, 6, NULL, '88a', 'Charqui Equino', '88a1.jpg', 18, '88a2.jpg', 36, '88a3.jpg', 552, '1', '2019-09-09'),
(463, 7, NULL, '89a', 'Pescado Medallón', '89a1.jpg', 79, '89a2.jpg', 150, '89a3.jpg', 230, '1', '2019-09-09'),
(464, 7, NULL, '89b', 'Merluza Filete', '89b1.jpg', 80, '89b2.jpg', 120, '89b3.jpg', 160, '1', '2019-09-09'),
(465, 7, NULL, '89c', 'Merluza Entera Trozo', '89c1.jpg', 70, '89c2.jpg', 126, '89c3.jpg', 163, '1', '2019-09-09'),
(466, 7, 326, '90a', 'Reineta Filete', '90a1.jpg', 80, '90a2.jpg', 120, '90a3.jpg', 160, '1', '2019-09-09'),
(467, 7, 328, '90b', 'Salmón Filete', '90b1.jpg', 80, '90b2.jpg', 160, '90b3.jpg', 240, '1', '2019-09-09'),
(468, 7, 325, '90c', 'Pejerrey', '90c1.jpg', 20, '90c2.jpg', 31, '90c3.jpg', 56, '1', '2019-09-09'),
(469, 7, 334, '91a', 'Almejas', '91a1.jpg', 8, '91a2.jpg', 11, '91a3.jpg', 24, '1', '2019-09-09'),
(470, 7, 338, '91b', 'Choritos', '91b1.jpg', 4, '91b2.jpg', 6, '91b3.jpg', 10, '1', '2019-09-09'),
(471, 7, NULL, '91c', 'Choro Maltón', '91c1.jpg', 30, '91c2.jpg', 50, '91c3.jpg', 105, '1', '2019-09-09'),
(472, 7, 337, '92a', 'Cholga', '92a1.jpg', 7, '92a2.jpg', 19, '92a3.jpg', 29, '1', '2019-09-09'),
(473, 7, 342, '92b', 'Machas', '92b1.jpg', 10, '92b2.jpg', 12, '92b3.jpg', 20, '1', '2019-09-09'),
(474, 7, 344, '92c', 'Ostiones', '92c1.jpg', 12, '92c2.jpg', 18, '92c3.jpg', 24, '1', '2019-09-09'),
(475, 7, 335, '93a', 'Calamar Picado', '93a1.jpg', 20, '93a2.jpg', 40, '93a3.jpg', 60, '1', '2019-09-09'),
(476, 7, NULL, '93b', 'Calamar Anillos', '93b1.jpg', 10, '93b2.jpg', 15, '93b3.jpg', 20, '1', '2019-09-09'),
(477, 7, NULL, '93c', 'Jibia Picada', '93c1.jpg', 40, '93c2.jpg', 80, '93c3.jpg', 120, '1', '2019-09-09'),
(478, 7, 341, '94a', 'Jibia Trozo', '94a1.jpg', 43, '94a2.jpg', 82, '94a3.jpg', 118, '1', '2019-09-09'),
(479, 7, NULL, '95a', 'Colitas Camarón', '95a1.jpg', 60, '95a2.jpg', 90, '95a3.jpg', 120, '1', '2019-09-09'),
(480, 7, 336, '95b', 'Camarón Entero', '95b1.jpg', 7, '95b2.jpg', 10, '95b3.jpg', 13, '1', '2019-09-09'),
(481, 7, 347, '96a', 'Piure', '96a1.jpg', 9, '96a2.jpg', 13, '96a3.jpg', 24, '1', '2019-09-09'),
(482, 7, 346, '96b', 'Picoroco', '96b1.jpg', 12, '96b2.jpg', 17, '96b3.jpg', 27, '1', '2019-09-09'),
(483, 7, 339, '96c', 'Erizos Lenguas', '96c1.jpg', 19, '96c2.jpg', 31, '96c3.jpg', 64, '1', '2019-09-09'),
(484, 7, 348, '97a', 'Almejas en Conserva', '97a1.jpg', 50, '97a2.jpg', 75, '97a3.jpg', 100, '1', '2019-09-09'),
(485, 7, 351, '97b', 'Cholgas en Conserva', '97b1.jpg', 50, '97b2.jpg', 75, '97b3.jpg', 100, '1', '2019-09-09'),
(486, 7, 352, '97c', 'Choritos en Conserva', '97c1.jpg', 50, '97c2.jpg', 75, '97c3.jpg', 100, '1', '2019-09-09'),
(487, 7, 356, '98a', 'Machas en Conserva', '98a1.jpg', 50, '98a2.jpg', 75, '98a3.jpg', 100, '1', '2019-09-09'),
(488, 7, 332, '98b', 'Jurel Desmenuzado en Conserva', '98b1.jpg', 60, '98b2.jpg', 90, '98b3.jpg', 120, '1', '2019-09-09'),
(489, 7, 331, '98c', 'Atún Lomitos en Conserva', '98c1.jpg', 60, '98c2.jpg', 90, '98c3.jpg', 120, '1', '2019-09-09'),
(490, 7, 331, '99a', 'Atún Desmenuzado Conserva', '99a1.jpg', 60, '99a2.jpg', 90, '99a3.jpg', 120, '1', '2019-09-09'),
(491, 7, 333, '99b', 'Sardina en Conserva', '99b1.jpg', 60, '99b2.jpg', 90, '99b3.jpg', 120, '1', '2019-09-09'),
(492, 6, NULL, '100a', 'Panita de Vacuno', '100a1.jpg', 60, '100a2.jpg', 120, '100a3.jpg', 180, '1', '2019-09-09'),
(493, 6, NULL, '100b', 'Chunchul', '100b1.jpg', 60, '100b2.jpg', 90, '100b3.jpg', 120, '1', '2019-09-09'),
(494, 6, NULL, '100c', 'Chunchul Picado', '100c1.jpg', 60, '100c2.jpg', 90, '100c3.jpg', 120, '1', '2019-09-09'),
(495, 6, NULL, '101a1', 'Jamón Colonial', '101a11.jpg', 33, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(496, 6, NULL, '101a2', 'Jamón Praga', NULL, NULL, '101a22.jpg', 33, NULL, NULL, '1', '2019-09-09'),
(497, 6, 300, '101a3', 'Jamón Sándwich', NULL, NULL, NULL, NULL, '101a33.jpg', 30, '1', '2019-09-09'),
(498, 6, 301, '101b1', 'Mortadela', '101b11.jpg', 12, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(499, 6, 302, '101b2', 'Jamonada', NULL, NULL, '101b22.jpg', 15, NULL, NULL, '1', '2019-09-09'),
(500, 6, 303, '101b3', 'Salame', NULL, NULL, NULL, NULL, '101b33.jpg', 5, '1', '2019-09-09'),
(501, 6, 304, '101c1', 'Arrollado de Huaso', '101c11.jpg', 25, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(502, 6, 305, '101c2', 'Salchichón Cerveza', NULL, NULL, '101c22.jpg', 14, NULL, NULL, '1', '2019-09-09'),
(503, 6, NULL, '101c3', 'Panceta', NULL, NULL, NULL, NULL, '101c33.jpg', 9, '1', '2019-09-09'),
(504, 6, 287, '102a', 'Pollo Hígado', '102a1.jpg', 50, '102a2.jpg', 75, '102a3.jpg', 100, '1', '2019-09-09'),
(505, 6, 286, '102b', 'Pollo Contre', '102b1.jpg', 50, '102b2.jpg', 75, '102b3.jpg', 100, '1', '2019-09-09'),
(506, 6, 295, '103a', 'Prieta', '103a1.jpg', 70, '103a2.jpg', 106, '103a3.jpg', 127, '1', '2019-09-09'),
(507, 6, 298, '103b', 'Longaniza', '103b1.jpg', 65, '103b2.jpg', 104, '103b3.jpg', 140, '1', '2019-09-09'),
(508, 6, NULL, '103c1', 'Longanicilla', '103c11.jpg', 20, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(509, 6, 296, '103c2', 'Chorizo Alemán', NULL, NULL, '103c22.jpg', 50, NULL, NULL, '1', '2019-09-09'),
(510, 6, 293, '103c3', 'Gorda', NULL, NULL, NULL, NULL, '103c33.jpg', 105, '1', '2019-09-09'),
(511, 6, 292, '104a', 'Vienesas', '104a1.jpg', 50, '104a2.jpg', 94, '104a3.jpg', 115, '1', '2019-09-09'),
(512, 6, 309, '104b', 'Huevos', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(513, 6, NULL, '104b', 'Cáscara', '104b1.jpg', 6, '104b2.jpg', 7, '104b3.jpg', 10, '1', '2019-09-09'),
(514, 6, 311, '104b', 'Yema', '104b1.jpg', 11, '104b2.jpg', 15, '104b3.jpg', 19, '1', '2019-09-09'),
(515, 6, 310, '104b', 'Clara', '104b1.jpg', 28, '104b2.jpg', 34, '104b3.jpg', 40, '1', '2019-09-09'),
(516, 6, NULL, '104c', 'Huevos en Sartén', '104c1.jpg', 54, '104c2.jpg', 108, '104c3.jpg', 162, '1', '2019-09-09'),
(517, 6, NULL, '105a', 'Huevo en Pan', '105a1.jpg', 54, '105a2.jpg', 108, '105a3.jpg', 162, '1', '2019-09-09'),
(518, 8, 362, '106a', 'Aceite 1', '106a1.jpg', 5, '106a2.jpg', 10, '106a3.jpg', 20, '1', '2019-09-09'),
(519, 8, 363, '106b', 'Aceite 2', '106b1.jpg', 5, '106b2.jpg', 10, '106b3.jpg', 20, '1', '2019-09-09'),
(520, 8, 371, '107a', 'Margarina', '107a1.jpg', 5, '107a2.jpg', 10, '107a3.jpg', 15, '1', '2019-09-09'),
(521, 8, 372, '107b', 'Mantequilla Trozo y Bolitas', '107b1.jpg', 5, '107b2.jpg', 10, '107b3.jpg', 15, '1', '2019-09-09'),
(522, 8, 374, '107c', 'Mayonesa', '107c1.jpg', 10, '107c2.jpg', 20, '107c3.jpg', 30, '1', '2019-09-09'),
(523, 8, NULL, '108a', 'Manteca Cucharadas', '108a1.jpg', 20, '108a2.jpg', 40, '108a3.jpg', 60, '1', '2019-09-09'),
(524, 8, 384, '108b', 'Manteca Trozos', '108b1.jpg', 20, '108b2.jpg', 40, '108b3.jpg', 60, '1', '2019-09-09'),
(525, 8, 383, '108c', 'Chicharrón', '108c1.jpg', 20, '108c2.jpg', 40, '108c3.jpg', 60, '1', '2019-09-09'),
(526, 8, 381, '109a', 'Paté', '109a1.jpg', 5, '109a2.jpg', 10, '109a3.jpg', 15, '1', '2019-09-09'),
(527, 8, 377, '109b', 'Crema Chantilly', '109b1.jpg', 10, '109b2.jpg', 20, '109b3.jpg', 30, '1', '2019-09-09'),
(528, 8, 378, '109c', 'Crema Espesa', '109c1.jpg', 10, '109c2.jpg', 20, '109c3.jpg', 30, '1', '2019-09-09'),
(529, 8, 385, '110a', 'Almendras', '110a1.jpg', 15, '110a2.jpg', 30, '110a3.jpg', 45, '1', '2019-09-09'),
(530, 8, 388, '110b', 'Nueces', '110b1.jpg', 15, '110b2.jpg', 30, '110b3.jpg', 45, '1', '2019-09-09'),
(531, 8, 386, '110c', 'Avellana', '110c1.jpg', 15, '110c2.jpg', 30, '110c3.jpg', 45, '1', '2019-09-09'),
(532, 8, 387, '111a', 'Maní', '111a1.jpg', 15, '111a2.jpg', 30, '111a3.jpg', 45, '1', '2019-09-09'),
(533, 8, 390, '111b', 'Castañas de Cajú', '111b1.jpg', 15, '111b2.jpg', 30, '111b3.jpg', 45, '1', '2019-09-09'),
(534, 8, 389, '111c', 'Pistachos', '111c1.jpg', 15, '111c2.jpg', 30, '111c3.jpg', 45, '1', '2019-09-09'),
(535, 8, NULL, '112a', 'Palta Rebanadas', '112a1.jpg', 45, '112a2.jpg', 90, '112a3.jpg', 135, '1', '2019-09-09'),
(536, 8, NULL, '112b', 'Palta Molida', '112b1.jpg', 45, '112b2.jpg', 90, '112b3.jpg', 135, '1', '2019-09-09'),
(537, 8, 395, '112c', 'Palta Entera', '112c1.jpg', 90, '112c2.jpg', 130, '112c3.jpg', 170, '1', '2019-09-09'),
(538, 8, NULL, '113a', 'Palta Mitad', '113a1.jpg', 45, '113a2.jpg', 65, '113a3.jpg', 85, '1', '2019-09-09'),
(539, 8, NULL, '114a', 'Aceituna Verde sin Carozo', '114a1.jpg', 50, '114a2.jpg', 100, '114a3.jpg', 150, '1', '2019-09-09'),
(540, 8, 394, '114b', 'Aceituna', '114b1.jpg', 50, '114b2.jpg', 100, '114b3.jpg', 150, '1', '2019-09-09'),
(541, 9, 398, '115', 'Azúcar', '1151.jpg', 2, '1152.jpg', 6, '1153.jpg', 8, '1', '2019-09-09'),
(542, 9, NULL, '115', 'Dulce de Membrillo', '1151.jpg', 30, '1152.jpg', 45, '1153.jpg', 60, '1', '2019-09-09'),
(543, 9, 435, '115', 'Alfajores', '1151.jpg', 20, '1152.jpg', 35, '1153.jpg', 60, '1', '2019-09-09'),
(544, 9, 433, '116', 'Berlín', '1161.jpg', 60, '1162.jpg', 80, '1163.jpg', 140, '1', '2019-09-09'),
(545, 9, 442, '116', 'Jalea', '1161.jpg', 120, '1162.jpg', 180, '1163.jpg', 240, '1', '2019-09-09'),
(546, 9, 445, '116', 'Helados', '1161.jpg', 60, '1162.jpg', 90, '1163.jpg', 120, '1', '2019-09-09'),
(547, 9, 434, '117', 'Queque 1', '1171.jpg', 40, '1172.jpg', 80, '1173.jpg', 120, '1', '2019-09-09'),
(548, 9, NULL, '117', 'Queque 2', '1171.jpg', 20, '1172.jpg', 40, '1173.jpg', 60, '1', '2019-09-09'),
(549, 9, NULL, '117', 'Queques Individuales', '1171.jpg', 48, '1172.jpg', 77, '1173.jpg', 100, '1', '2019-09-09'),
(550, 9, NULL, '118', 'Macedonia en Conserva', '1181.jpg', 120, '1182.jpg', 180, '1183.jpg', 240, '1', '2019-09-09'),
(551, 9, 428, '118', 'Torta Bizcocho Piña', '1181.jpg', 100, '1182.jpg', 150, '1183.jpg', 200, '1', '2019-09-09'),
(552, 9, 427, '118', 'Torta Hojarasca Lúcuma', '1181.jpg', 100, '1182.jpg', 150, '1183.jpg', 200, '1', '2019-09-09'),
(553, 9, 429, '119', 'Torta Panqueque Naranja', '1191.jpg', 100, '1192.jpg', 150, '1193.jpg', 200, '1', '2019-09-09'),
(554, 9, 432, '119', 'Tartaleta de Frutas', '1191.jpg', 150, '1192.jpg', 233, '1193.jpg', 300, '1', '2019-09-09'),
(555, 9, 431, '119', 'Kuchen', '1191.jpg', 100, '1192.jpg', 150, '1193.jpg', 200, '1', '2019-09-09'),
(556, 9, 430, '120', 'Pie de Limón', '1201.jpg', 100, '1202.jpg', 150, '1203.jpg', 200, '1', '2019-09-09'),
(557, 9, NULL, '120b1', 'Tartaleta de Fruta Individual', '120b11.jpg', 120, NULL, NULL, NULL, NULL, '1', '2019-09-09'),
(558, 9, NULL, '120b2', 'Kuchen Individual', NULL, NULL, '120b22.jpg', 80, NULL, NULL, '1', '2019-09-09'),
(559, 9, NULL, '120b3', 'Pie de Limón Individual', NULL, NULL, NULL, NULL, '120b33.jpg', 100, '1', '2019-09-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla ns_unidades
--

DROP TABLE IF EXISTS ns_unidades;
CREATE TABLE ns_unidades (
  id_unidad int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  id_cantidad int(11) NOT NULL,
  id_graduacion int(11) NOT NULL,
  usuario_creacion varchar(50) NOT NULL,
  fecha_creacion datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de definicion de unidades de medida';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users
--

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id int(11) UNSIGNED NOT NULL,
  ip_address varchar(45) NOT NULL,
  username varchar(100) DEFAULT NULL,
  password varchar(255) NOT NULL,
  email varchar(254) NOT NULL,
  activation_selector varchar(255) DEFAULT NULL,
  activation_code varchar(255) DEFAULT NULL,
  forgotten_password_selector varchar(255) DEFAULT NULL,
  forgotten_password_code varchar(255) DEFAULT NULL,
  forgotten_password_time int(11) UNSIGNED DEFAULT NULL,
  remember_selector varchar(255) DEFAULT NULL,
  remember_code varchar(255) DEFAULT NULL,
  created_on int(11) UNSIGNED NOT NULL,
  last_login int(11) UNSIGNED DEFAULT NULL,
  active tinyint(1) UNSIGNED DEFAULT NULL,
  first_name varchar(50) DEFAULT NULL,
  last_name varchar(50) DEFAULT NULL,
  company varchar(100) DEFAULT NULL,
  phone varchar(20) DEFAULT NULL,
  codigo_encuestador int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla users
--

INSERT INTO users (id, ip_address, username, `password`, email, activation_selector, activation_code, forgotten_password_selector, forgotten_password_code, forgotten_password_time, remember_selector, remember_code, created_on, last_login, active, first_name, last_name, company, phone, codigo_encuestador) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$JR4LQsk/cSHoN8LzcgKNiu5SbynP9UzawPQ1XSEwQjOn/bESMbEd.', 'admin@admin.com', NULL, '', NULL, NULL, NULL, 'b627c263e7b8daf957a1cc6ccd4d93c04ba8f730', '$2y$10$c6c59XPaAxsZ8v0BPlua6ulEijEpQmkH1BOpR/Xxh/QcPtV.KJA9y', 1268889823, 1565744719, 1, 'Admin', 'istrator', 'ADMIN', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla users_groups
--

DROP TABLE IF EXISTS users_groups;
CREATE TABLE users_groups (
  id int(11) UNSIGNED NOT NULL,
  user_id int(11) UNSIGNED NOT NULL,
  group_id mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla users_groups
--

INSERT INTO users_groups (id, user_id, group_id) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista vw_tipo_medida
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_tipo_medida`;
CREATE TABLE `vw_tipo_medida` (
`valor` int(11)
,`label` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista vw_tipo_respuesta
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vw_tipo_respuesta`;
CREATE TABLE `vw_tipo_respuesta` (
`tipo` int(11)
,`nombre` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista vw_tipo_medida
--
DROP TABLE IF EXISTS `vw_tipo_medida`;

CREATE ALGORITHM=UNDEFINED DEFINER=webjob@localhost SQL SECURITY DEFINER VIEW vw_tipo_medida  AS  select ns_parametros.valor AS valor,ns_parametros.label AS label from ns_parametros where ns_parametros.tipo = 11 group by ns_parametros.valor,ns_parametros.label ;

-- --------------------------------------------------------

--
-- Estructura para la vista vw_tipo_respuesta
--
DROP TABLE IF EXISTS `vw_tipo_respuesta`;

CREATE ALGORITHM=UNDEFINED DEFINER=webjob@localhost SQL SECURITY DEFINER VIEW vw_tipo_respuesta  AS  select ns_parametros.tipo AS tipo,ns_parametros.nombre AS nombre from ns_parametros group by ns_parametros.tipo,ns_parametros.nombre ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla groups
--
ALTER TABLE groups
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla login_attempts
--
ALTER TABLE login_attempts
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla ns_alimentos
--
ALTER TABLE ns_alimentos
  ADD UNIQUE KEY idx_id_alimento (id_alimento);

--
-- Indices de la tabla ns_entrevistados
--
ALTER TABLE ns_entrevistados
  ADD PRIMARY KEY (rut),
  ADD UNIQUE KEY rut (rut),
  ADD UNIQUE KEY idx_codigo_encuestado (codigo_encuestado);

--
-- Indices de la tabla ns_modulos
--
ALTER TABLE ns_modulos
  ADD UNIQUE KEY idx_id_modulo_encuesta (id_modulo);

--
-- Indices de la tabla ns_parametros
--
ALTER TABLE ns_parametros
  ADD UNIQUE KEY idx_id_param (id_param),
  ADD KEY idx_tipo (tipo);

--
-- Indices de la tabla ns_preguntas
--
ALTER TABLE ns_preguntas
  ADD UNIQUE KEY idx_id_pregunta (id_pregunta);

--
-- Indices de la tabla ns_registro_encuestas
--
ALTER TABLE ns_registro_encuestas
  ADD UNIQUE KEY idx_folio (folio),
  ADD KEY codigo_encuestador (codigo_encuestador);

--
-- Indices de la tabla ns_relacion_alimento_foto
--
ALTER TABLE ns_relacion_alimento_foto
  ADD PRIMARY KEY (id_rel_ali_foto);

--
-- Indices de la tabla ns_unidades
--
ALTER TABLE ns_unidades
  ADD UNIQUE KEY idx_id_unidad (id_unidad);

--
-- Indices de la tabla users
--
ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY uc_email (email),
  ADD UNIQUE KEY codigo_encuestador (codigo_encuestador),
  ADD UNIQUE KEY uc_activation_selector (activation_selector),
  ADD UNIQUE KEY uc_forgotten_password_selector (forgotten_password_selector),
  ADD UNIQUE KEY uc_remember_selector (remember_selector);

--
-- Indices de la tabla users_groups
--
ALTER TABLE users_groups
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY uc_users_groups (user_id,group_id),
  ADD KEY fk_users_groups_users1_idx (user_id),
  ADD KEY fk_users_groups_groups1_idx (group_id);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla groups
--
ALTER TABLE groups
  MODIFY id mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla login_attempts
--
ALTER TABLE login_attempts
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ns_alimentos
--
ALTER TABLE ns_alimentos
  MODIFY id_alimento int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;

--
-- AUTO_INCREMENT de la tabla ns_entrevistados
--
ALTER TABLE ns_entrevistados
  MODIFY codigo_encuestado int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla ns_modulos
--
ALTER TABLE ns_modulos
  MODIFY id_modulo int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla ns_parametros
--
ALTER TABLE ns_parametros
  MODIFY id_param int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla ns_preguntas
--
ALTER TABLE ns_preguntas
  MODIFY id_pregunta int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla ns_relacion_alimento_foto
--
ALTER TABLE ns_relacion_alimento_foto
  MODIFY id_rel_ali_foto int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=560;

--
-- AUTO_INCREMENT de la tabla ns_unidades
--
ALTER TABLE ns_unidades
  MODIFY id_unidad int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla users
--
ALTER TABLE users
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla users_groups
--
ALTER TABLE users_groups
  MODIFY id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla users_groups
--
ALTER TABLE users_groups
  ADD CONSTRAINT fk_users_groups_groups1 FOREIGN KEY (group_id) REFERENCES `groups` (id) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_users_groups_users1 FOREIGN KEY (user_id) REFERENCES `users` (id) ON DELETE CASCADE ON UPDATE NO ACTION;


--
-- Metadatos
--
USE phpmyadmin;

--
-- Metadatos para la tabla groups
--

--
-- Metadatos para la tabla login_attempts
--

--
-- Metadatos para la tabla ns_alimentos
--

--
-- Metadatos para la tabla ns_entrevistados
--

--
-- Metadatos para la tabla ns_modulos
--

--
-- Metadatos para la tabla ns_parametros
--

--
-- Metadatos para la tabla ns_preguntas
--

--
-- Metadatos para la tabla ns_registro_encuestas
--

--
-- Metadatos para la tabla ns_relacion_alimento_foto
--

--
-- Metadatos para la tabla ns_unidades
--

--
-- Metadatos para la tabla users
--

--
-- Metadatos para la tabla users_groups
--

--
-- Metadatos para la tabla vw_tipo_medida
--

--
-- Metadatos para la tabla vw_tipo_respuesta
--

--
-- Metadatos para la base de datos nutrisurvey_desa
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
