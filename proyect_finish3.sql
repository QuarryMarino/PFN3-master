-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2023 a las 18:51:07
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
-- Base de datos: `proyect_finish3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id` int(11) NOT NULL,
  `id_teacher` int(11) DEFAULT NULL,
  `students_list` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`students_list`)),
  `name_clases` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id`, `id_teacher`, `students_list`, `name_clases`) VALUES
(1, 1, '[{\"id\": 1, \"nombre\": \"Estudiante Ana García\"}, {\"id\": 2, \"nombre\": \"Estudiante Luis Martínez\"}]', 'Matemáticas Avanzadas'),
(2, 2, '[{\"id\": 3, \"nombre\": \"Estudiante Laura Sánchez\"}]', 'Ciencias de la Computación'),
(3, 3, '[]', 'Historia del Arte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roll`
--

CREATE TABLE `roll` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `roles` varchar(250) DEFAULT NULL,
  `teacher` varchar(250) DEFAULT NULL,
  `students` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roll`
--

INSERT INTO `roll` (`id`, `users_id`, `roles`, `teacher`, `students`) VALUES
(1, 2, 'teacher', NULL, NULL),
(2, 3, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `Nacimiento` varchar(250) DEFAULT NULL,
  `clases` varchar(250) DEFAULT NULL,
  `roll_id` enum('student','teacher','admin') NOT NULL,
  `direccion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `apellido`, `email`, `password`, `Nacimiento`, `clases`, `roll_id`, `direccion`) VALUES
(1, 'Quarry', 'Mariño', 'admi@admin', '$2y$10$yFJyjjFgGvAR.jnvBDpRj.kNQwpAFiKxx4OfhESMW9v1OEhYhKuQq', '1991-12-14', NULL, 'admin', 'santo americo'),
(2, 'João', 'Silva', 'joao@example', 'joao@example', '1990-05-15', 'Yoga, Pilates', 'student', 'Rua Principal, 123'),
(3, 'Mariaaaa', 'Santos', 'maria@example', '$2y$10$cwdXrRi2ixuSGpYB142fkeprDFTbrEQMuSefeThaXwCVZYxGFlxI6', '1985-09-20', 'Zumba, CrossFit', 'teacher', 'Avenida Secundária, 456'),
(4, 'Pedro', 'Ferreira', 'pedro@example', 'pedro@example', '2000-03-10', 'Spinning, Musculação', 'student', 'Travessa da Rua, 789'),
(5, 'test', 'test', 'test@test', 'test', '1114-12-14', '', 'student', 'test'),
(6, 'tucacas', 'tucacas', 'tucaca@tu', 'tucacas', '1411-12-14', '', 'student', 'tucacas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roll`
--
ALTER TABLE `roll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roll`
--
ALTER TABLE `roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `roll`
--
ALTER TABLE `roll`
  ADD CONSTRAINT `roll_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
