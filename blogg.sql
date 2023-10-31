-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2023 a las 21:04:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blogg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_perfil`
--

CREATE TABLE `imagenes_perfil` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes_perfil`
--

INSERT INTO `imagenes_perfil` (`id`, `usuario_id`, `ruta_imagen`) VALUES
(1, 1, '/img/pfp/pfp-0.png'),
(2, 2, '/img/pfp/pfp-2.png'),
(3, 3, '/img/pfp/pfp-3.png'),
(4, 4, '/img/pfp/pfp-0.png'),
(5, 5, '/img/pfp/pfp-0.png'),
(6, 6, '/img/pfp/pfp-0.png'),
(7, 7, '/img/pfp/pfp-0.png'),
(8, 8, '/img/pfp/pfp-0.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email`, `password`) VALUES
(1, 'Usuario1', 'micorreo1@correo.com', '1234'),
(2, 'Usuario2', 'micorreo2@correo.com', 'password2'),
(3, 'Usuario3', 'micorreo3@correo.com', 'password3'),
(4, 'Usuario4', 'correo4@mail.com', 'password4'),
(5, 'batman', 'notbruce@batimail.com', 'batipassword'),
(6, 'superman', 'clack-kent@krypton.com', 'krypton'),
(7, 'flash', 'theredblurr@gmail.com', 'password'),
(8, 'Usuario99', 'correo99@mail.com', 'password99');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_perfil`
--
ALTER TABLE `imagenes_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes_perfil`
--
ALTER TABLE `imagenes_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_perfil`
--
ALTER TABLE `imagenes_perfil`
  ADD CONSTRAINT `imagenes_perfil_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
