-- Adminer 4.8.1 MySQL 5.5.5-10.3.31-MariaDB-0+deb10u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1,	'Deportessss'),
(2,	'Cine'),
(3,	'Videojuegos');

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entradas_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `texto` text COLLATE utf8_spanish2_ci NOT NULL,
  `aprobado` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entradas_id` (`entradas_id`),
  KEY `usuarios_id` (`usuarios_id`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`entradas_id`) REFERENCES `entradas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `comentarios` (`id`, `entradas_id`, `fecha`, `usuarios_id`, `texto`, `aprobado`) VALUES
(1,	1,	'2022-01-12',	1,	'Este es el comentario',	'A'),
(2,	1,	'2022-01-12',	1,	'Este es otro comentario',	'A'),
(3,	1,	'2022-01-16',	1,	'Este es el tercer comentario',	'A'),
(4,	1,	'2022-01-18',	1,	'Este es el cuarto comentario',	'A'),
(5,	1,	'2022-01-18',	1,	'Este es el cuarto comentario',	'A'),
(6,	1,	'2022-01-20',	1,	'asdasdasd',	NULL),
(7,	1,	'2022-01-20',	1,	'OTRO MAS',	NULL),
(8,	1,	'2022-01-20',	1,	'dd',	NULL);

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` text COLLATE utf8_spanish2_ci NOT NULL,
  `aprobada` enum('P','A') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'P',
  `categorias_id` int(11) NOT NULL,
  `tags` varchar(256) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_id` (`usuarios_id`),
  KEY `categorias_id` (`categorias_id`),
  CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `entradas` (`id`, `usuarios_id`, `fecha`, `texto`, `aprobada`, `categorias_id`, `tags`) VALUES
(1,	1,	'2021-12-16 12:51:49',	'PIRULAs',	'A',	2,	NULL),
(34,	1,	'2021-12-16 12:57:48',	'dddddddddddddddddddd',	'A',	3,	NULL),
(35,	1,	'2021-12-16 12:57:53',	'sssssssssssssssssssssssss',	'A',	3,	NULL),
(36,	1,	'2021-01-01 00:00:00',	'asda',	'A',	1,	NULL),
(37,	2,	'2022-01-18 07:48:47',	'Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum Lore ipsum ',	'P',	1,	'[\"I\",\"E\"]'),
(38,	2,	'2022-01-18 08:28:57',	'Y otra entrada',	'P',	2,	'[\"E\"]');

DROP VIEW IF EXISTS `entradasx`;
CREATE TABLE `entradasx` (`id` int(11), `usuarios_id` int(11), `fecha` datetime, `texto` text, `aprobada` enum('P','A'), `categorias_id` int(11), `nombre_usuario` varchar(60), `nombre_cat` varchar(60));


DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `activo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `productos` (`id`, `descripcion`, `imagen`, `precio`, `activo`) VALUES
(1,	'MANZANA',	'1_AJHZ9.png',	3.00,	''),
(2,	'PERA',	'2_KIJY.jpg',	2.00,	'A'),
(3,	'KIWI',	'3_KJUIO.png',	7.00,	'A'),
(4,	'PERSIMON',	'4_KAKU.png',	7.00,	'A'),
(6,	'LIMÓN',	'5_LLMM.jpg',	2.00,	'A');

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` char(16) COLLATE utf8_spanish2_ci NOT NULL,
  `password` char(32) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` enum('A','I','B','') COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` char(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `estado`, `email`, `rol`) VALUES
(1,	'Carlos garcía Gil',	'carlos',	'b59c67bf196a4758191e42f76670ceba',	'A',	'',	'A'),
(2,	'Laura Camino',	'laura',	'b59c67bf196a4758191e42f76670ceba',	'A',	'',	'U'),
(3,	'Felipe',	'felipe',	'b59c67bf196a4758191e42f76670ceba',	'B',	'',	'U');

DROP TABLE IF EXISTS `entradasx`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `entradasx` AS select `e`.`id` AS `id`,`e`.`usuarios_id` AS `usuarios_id`,`e`.`fecha` AS `fecha`,`e`.`texto` AS `texto`,`e`.`aprobada` AS `aprobada`,`e`.`categorias_id` AS `categorias_id`,`u`.`nombre` AS `nombre_usuario`,`c`.`nombre` AS `nombre_cat` from ((`entradas` `e` join `usuarios` `u`) join `categorias` `c`) where `u`.`id` = `e`.`usuarios_id` and `c`.`id` = `e`.`categorias_id` order by `e`.`id` desc;

-- 2022-01-20 10:50:08
