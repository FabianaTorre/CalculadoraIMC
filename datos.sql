-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2019 a las 21:49:46
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `imc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `datos_id` int(5) NOT NULL,
  `datos_fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `datos_altura` float(3,2) NOT NULL,
  `datos_peso` float(5,2) NOT NULL,
  `datos_imc` float(4,2) NOT NULL,
  `datos_mensaje` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`datos_id`, `datos_fecha`, `datos_altura`, `datos_peso`, `datos_imc`, `datos_mensaje`) VALUES
(1, '2019-11-30 18:23:20', 1.51, 56.00, 24.60, 'Tu peso es normal'),
(2, '2019-11-30 18:24:04', 1.79, 108.00, 33.70, 'Obesidad'),
(3, '2019-11-30 19:45:54', 1.80, 95.00, 29.30, 'Tu peso es superior al normal'),
(4, '2019-11-30 19:52:48', 1.78, 72.00, 22.70, 'Tu peso es normal'),
(5, '2019-11-30 19:53:19', 1.56, 61.00, 25.10, 'Tu peso es superior al normal'),
(6, '2019-11-30 19:58:23', 1.54, 69.00, 29.10, 'Tu peso es superior al normal'),
(7, '2019-11-30 20:45:39', 1.58, 54.00, 21.60, 'Tu peso es normal'),
(8, '2019-11-30 20:45:58', 1.68, 79.00, 28.00, 'Tu peso es superior al normal'),
(9, '2019-11-30 20:46:15', 1.65, 63.00, 23.10, 'Tu peso es normal'),
(10, '2019-11-30 20:46:53', 1.59, 64.30, 25.40, 'Tu peso es superior al normal'),
(11, '2019-11-30 20:47:25', 1.71, 68.10, 23.30, 'Tu peso es normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`datos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `datos_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
