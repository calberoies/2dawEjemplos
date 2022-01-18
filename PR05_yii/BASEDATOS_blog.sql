-- Adminer 4.8.1 MySQL 5.5.5-10.3.31-MariaDB-0+deb10u1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `blog`;

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;


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


DROP VIEW IF EXISTS `entradasx`;
CREATE TABLE `entradasx` (`id` int(11), `usuarios_id` int(11), `fecha` datetime, `texto` text, `aprobada` enum('P','A'), `categorias_id` int(11), `nombre_usuario` varchar(60), `nombre_cat` varchar(60));


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

-- 2022-01-18 08:39:19
