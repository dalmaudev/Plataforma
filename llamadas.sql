-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2021 a las 09:19:20
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamadas`
--

CREATE TABLE `llamadas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `telefono` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consulta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('a','d') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecllam` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `llamadas`
--

INSERT INTO `llamadas` (`id`, `cliente_id`, `telefono`, `consulta`, `estado`, `fecllam`, `created_at`, `updated_at`) VALUES
(1, 1, '616570615', 'ARRAIGO SOCIAL1', 'a', '2021-10-14', '2021-10-11 10:29:35', '2021-10-11 10:31:00'),
(2, 2, '672484282', 'acta', 'a', '2021-10-11', '2021-10-11 10:33:56', '2021-10-11 10:33:56'),
(3, 3, '616570615', 'ARRAIGO SOCIAL', 'a', '2021-10-11', '2021-10-11 12:19:48', '2021-10-11 12:19:48'),
(4, 4, '123456678', 'AUTONOMO', 'a', '2021-10-15', '2021-10-11 12:34:59', '2021-10-11 12:40:20'),
(5, 4, NULL, 'ARRAIGO SOCIAL', 'a', '2021-10-11', '2021-10-11 12:37:37', '2021-10-11 12:37:37'),
(6, 4, NULL, 'acta de matrimonio', 'a', '2021-10-10', '2021-10-11 12:38:43', '2021-10-11 12:38:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `llamadas`
--
ALTER TABLE `llamadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `llamadas_cliente_id_foreign` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `llamadas`
--
ALTER TABLE `llamadas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `llamadas`
--
ALTER TABLE `llamadas`
  ADD CONSTRAINT `llamadas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
