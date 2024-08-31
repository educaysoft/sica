-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-05-2024 a las 20:53:48
-- Versión del servidor: 8.0.37
-- Versión de PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `educayso_facae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `calidadcarrera` (
  `idcalidadcarrera` int NOT NULL,
  `nombre` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_general_ci DEFAULT NULL,
  `archivo` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `iddepartamento` int NOT NULL,
  `idcriteriocalidad` int NOT NULL,
  `idsubcriteriocalidad` int NOT NULL,
  `idindicadorcalidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--


--
-- Indices de la tabla `articulo`
--
ALTER TABLE `calidadcarrera`
  ADD PRIMARY KEY (`idcalidadcarrera`),
  ADD KEY `fk_articulo_departamento1_idx` (`iddepartamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `calidadcarrera`
  MODIFY `idcalidadcarrera` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

