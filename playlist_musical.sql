-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2025 a las 07:35:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `playlist musical`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) DEFAULT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `nombre_cancion` varchar(200) NOT NULL,
  `año` year(4) DEFAULT NULL,
  `album` varchar(100) NOT NULL,
  `duracion` decimal(4,2) NOT NULL,
  `mood_cancion` varchar(100) DEFAULT NULL,
  `genero_musical` varchar(100) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios` (MODIFICADA para LOGIN/ADMIN)
--

-- Se usa DROP/CREATE para asegurar que los nuevos campos estén correctos y no haya conflictos con los índices.
-- La definición original de la tabla usuarios era: CREATE TABLE `usuarios` (`id_usuario` int(11) NOT NULL, `nombre` varchar(100) NOT NULL, `email` varchar(150) NOT NULL, `dni` float NOT NULL, `nacimiento` date NOT NULL)
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
    `id_usuario` INT(11) NOT NULL,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(150) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL, -- CAMPO AÑADIDO: Contraseña para el login
    `rol` ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario', -- CAMPO AÑADIDO: Rol para acceso al panel
    `dni` FLOAT DEFAULT NULL, -- Mantenemos los campos originales (DNI ahora puede ser NULL)
    `nacimiento` DATE DEFAULT NULL -- Mantenemos los campos originales (nacimiento ahora puede ser NULL)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias` (NUEVA: Lado 1 de la relación)
--

CREATE TABLE `categorias` (
    `id_categoria` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `imagen` VARCHAR(255) -- Para almacenar URL de la imagen
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items` (NUEVA: Lado N de la relación)
--

CREATE TABLE `items` (
    `id_item` INT AUTO_INCREMENT PRIMARY KEY,
    `id_categoria` INT NOT NULL,
    `nombre` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `imagen` VARCHAR(255), -- Para almacenar URL de la imagen
    FOREIGN KEY (`id_categoria`) REFERENCES `categorias`(`id_categoria`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);

--
-- Insertar un usuario administrador de prueba (REQUERIDO)
-- Usuario: "webadmin", Contraseña: "admin"
--
INSERT INTO `usuarios` (`nombre`, `email`, `password`, `rol`)
VALUES ('Administrador Web', 'webadmin', MD5('admin'), 'admin');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
