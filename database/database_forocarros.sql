-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-06-2021 a las 00:04:18
-- Versión del servidor: 10.4.15-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u548785262_forocarros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `comments_text` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments_date` datetime NOT NULL,
  `comments_last_modified_date` datetime NOT NULL,
  `comments_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liked_comments`
--

CREATE TABLE `liked_comments` (
  `comments_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liked_posts`
--

CREATE TABLE `liked_posts` (
  `users_id` int(11) DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `posts_id` int(11) NOT NULL,
  `posts_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_text` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts_date` datetime NOT NULL,
  `posts_last_modification_date` datetime NOT NULL,
  `posts_visits_counter` int(11) NOT NULL,
  `posts_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `topics_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`posts_id`, `posts_title`, `posts_text`, `posts_date`, `posts_last_modification_date`, `posts_visits_counter`, `posts_image`, `users_id`, `topics_id`) VALUES
(2, 'Prime Post de ForoCarros', 'Hey! muy buenas a todos.\r\n\r\nOficialmente se inaugura ForoCarros.\r\n\r\nSalu2.', '2021-06-05 22:46:51', '2021-06-05 22:46:51', 0, NULL, 1, 1),
(3, 'Segundo Post', 'Comprobando qué tal funciona ForoCarros', '2021-06-05 23:16:19', '2021-06-05 23:16:19', 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `topics_id` int(11) NOT NULL,
  `topics_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topics_image` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`topics_id`, `topics_name`, `topics_image`) VALUES
(1, 'General', 'General.jpg'),
(2, 'Anime', 'Anime.jpg'),
(3, 'Deportes', 'Deportes.jpg'),
(4, 'Informática', 'Informática.jpg'),
(5, 'Videojuegos', 'Videojuegos.jpg'),
(6, 'Música', 'Música.jpg'),
(7, 'Series', 'Series.jpg'),
(8, 'Cine', 'Cine.jpg'),
(9, 'Humor', 'Humor.jpg'),
(10, 'Política', 'Política.jpg'),
(11, 'Viajes', 'Viajes.jpg'),
(12, 'Economía', 'Economía.jpg'),
(13, 'Cocina', 'Cocina.jpg'),
(14, 'Arte', 'Arte.jpg'),
(15, 'Historia', 'Historia.jpg'),
(16, 'Moda', 'Moda.jpg'),
(17, 'Animales', 'Animales.jpg'),
(18, 'Paranormal', 'Paranormal.jpg'),
(19, 'Conspiraciones', 'Conspiraciones.jpg'),
(20, 'Carros', 'Carros.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_bio` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_sign` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_interests` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_birth_date` date NOT NULL,
  `users_registration_date` datetime NOT NULL,
  `users_last_connection_date` datetime DEFAULT NULL,
  `users_profile_photo` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_profile_visits_counter` int(11) DEFAULT NULL,
  `users_rol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_password`, `users_email`, `users_bio`, `users_sign`, `users_interests`, `users_birth_date`, `users_registration_date`, `users_last_connection_date`, `users_profile_photo`, `users_profile_visits_counter`, `users_rol`) VALUES
(1, 'ForoCarros', '$2y$04$DiebaXLBHV2quu4ngvlQt.FYq7aBW/olNsIZ/ESJJD4oZ.gcWIJGS', 'pedrodb74@gmail.com', 'Me llama Peter', 'Salu2', 'Coca-Cola', '1994-09-24', '2021-06-05 11:06:35', '2021-06-05 11:06:35', NULL, NULL, 'user'),
(2, 'Henar', '$2y$04$NMHBfslbN0CMWIDmdD.76OrCHBDlcgJw2Cs5gqQaDs56bnbpGPtcq', 'mhenavi@gmail.com', NULL, NULL, NULL, '1991-05-27', '2021-06-05 10:06:04', '2021-06-05 10:06:04', NULL, NULL, 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `posts_id` (`posts_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indices de la tabla `liked_comments`
--
ALTER TABLE `liked_comments`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `comments_id` (`comments_id`);

--
-- Indices de la tabla `liked_posts`
--
ALTER TABLE `liked_posts`
  ADD KEY `users_id` (`users_id`),
  ADD KEY `posts_id` (`posts_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `topics_id` (`topics_id`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topics_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `topics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`posts_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);

--
-- Filtros para la tabla `liked_comments`
--
ALTER TABLE `liked_comments`
  ADD CONSTRAINT `liked_comments_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `liked_comments_ibfk_2` FOREIGN KEY (`comments_id`) REFERENCES `comments` (`comments_id`);

--
-- Filtros para la tabla `liked_posts`
--
ALTER TABLE `liked_posts`
  ADD CONSTRAINT `liked_posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `liked_posts_ibfk_2` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`posts_id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`topics_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
