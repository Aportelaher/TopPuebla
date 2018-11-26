-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 26-11-2018 a las 04:38:39
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `TopPuebla`
--
CREATE DATABASE IF NOT EXISTS `TopPuebla` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `TopPuebla`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Publicacion`
--

DROP TABLE IF EXISTS `Publicacion`;
CREATE TABLE IF NOT EXISTS `Publicacion` (
  `id_usuario` int(30) NOT NULL,
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(15) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reporte`
--

DROP TABLE IF EXISTS `Reporte`;
CREATE TABLE IF NOT EXISTS `Reporte` (
  `NoRep` int(11) NOT NULL AUTO_INCREMENT,
  `idUs` int(11) DEFAULT NULL,
  `Calle` varchar(50) DEFAULT NULL,
  `Latitud` varchar(30) DEFAULT NULL,
  `Longitud` varchar(30) NOT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NoRep`),
  KEY `idUs` (`idUs`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Reporte`
--

INSERT INTO `Reporte` (`NoRep`, `idUs`, `Calle`, `Latitud`, `Longitud`, `Colonia`, `Imagen`, `Descripcion`) VALUES
(2, 5, 'Prol. De la 14 sur', '19.0057767', '-98.2049665', 'Cd Universitaria', 'Tope1.png', 'No tiene señalamientos de tope, no se distingue desde lejos.'),
(3, 5, 'Río Sabinas', '19.0042031', '-98.1947903', 'Cnel. Miguel Auza', 'Tope2.png', 'El tope si esta señalado debidamente '),
(4, 4, '6133 Rio Sabinas', '19.0028511', '-98.1950426', 'Cnel. Miguel Auza', 'Tope3.png', 'El tope si esta señalado debidamente'),
(5, 2, 'Av San Claudio', '19.0021116', '-98.1964312', 'Cnel. Miguel Auza', 'Tope4.png', 'El tope abarca tres calles, está bien señalado'),
(6, 5, 'Av San Claudio', '19.003356', '-98.1991288', 'Cd Universitaria', 'Tope5.png', 'El tope abarca tres calles, está bien señalado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tope`
--

DROP TABLE IF EXISTS `Tope`;
CREATE TABLE IF NOT EXISTS `Tope` (
  `id_tope` int(11) NOT NULL AUTO_INCREMENT,
  `idUs` int(11) DEFAULT NULL,
  `Calle` varchar(15) DEFAULT NULL,
  `Latitud` varchar(30) DEFAULT NULL,
  `Longitud` varchar(50) NOT NULL,
  `Colonia` varchar(15) DEFAULT NULL,
  `Imagen` varchar(15) DEFAULT NULL,
  `Desripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tope`),
  KEY `idUs` (`idUs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
CREATE TABLE IF NOT EXISTS `Usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`id_usuario`, `nombre`, `username`, `correo`, `password`, `tipo`) VALUES
(1, 'erafaerg', 'wweqreq', 'wrfr@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Hugo Hernández', 'Aportelaher', 'hugo.aportela.20@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(3, 'Fernando Martínez', 'Admin', 'admin@hotmail.com', '202cb962ac59075b964b07152d234b70', 2),
(4, 'Fernanda Villavicencio', 'Fernanda', 'fer@hotmail.com', '202cb962ac59075b964b07152d234b70', 1),
(5, 'Omar Zepeda', 'Omar', 'Omar@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Reporte`
--
ALTER TABLE `Reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idUs`) REFERENCES `Usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Tope`
--
ALTER TABLE `Tope`
  ADD CONSTRAINT `tope_ibfk_1` FOREIGN KEY (`idUs`) REFERENCES `Usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
