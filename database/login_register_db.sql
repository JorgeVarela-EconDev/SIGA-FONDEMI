-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-02-2025 a las 00:56:12
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `login_register_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `cedula` int NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `edad` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `estatus` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`cedula`, `nombre`, `edad`, `cargo`, `estatus`) VALUES
(20594211, 'Maria Gonzalez', '28 de enero de 2000', 'Administracion', 'inactivo'),
(31293421, 'Alex', '22 de febrero de 1972', 'Vigilante', 'activo'),
(30245478, 'Miguel Bolaños', '2 de julio de 1988', 'Gerente', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb3_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `contrasena`) VALUES
(1, 'andres', 'jvare500@gmail.com', '123'),
(18, 'alejandro', 'lifeplay08@gmail.com', '1234'),
(3, 'jorge', 'levorse@outlook.es', '1234'),
(17, 'gaby', 'gacroquer@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
