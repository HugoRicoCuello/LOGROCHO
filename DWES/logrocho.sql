-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 20:02:58
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logrocho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bares`
--

CREATE TABLE `bares` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `puntuacion` float NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bares`
--

INSERT INTO `bares` (`id`, `nombre`, `puntuacion`, `latitud`, `longitud`) VALUES
(17, 'Juan y Pinchame', 0, 42.46569218319536, -2.447998486433555),
(20, 'Torecilla', 0, 42.46574859891866, -2.4482197152691807),
(21, 'La Rua del Laurel', 0, 42.4657102121194, -2.4478862729404947),
(22, 'Bar Ángel', 0, 42.465766526436, -2.4481945999265666),
(23, 'La Taberna del Tío Blas', 0, 42.46560929502901, -2.4476934017761676),
(24, 'Entretapas 941', 0, 42.465672112230166, -2.4484723152691954),
(25, 'Bar Charly', 0, 42.46581253946404, -2.4490685575978817),
(26, 'Bar Paganos', 0, 42.465662526751686, -2.448809215269218),
(27, 'Bar Jubera', 0, 42.46569289768123, -2.448804903625731);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_bares`
--

CREATE TABLE `imagenes_bares` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `bar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_bares`
--

INSERT INTO `imagenes_bares` (`id`, `imagen`, `bar`) VALUES
(1, 'img_bares/17/bar1.jpg', 17),
(5, 'img_bares/20/torecilla3.png', 20),
(6, 'img_bares/20/torecilla2.png', 20),
(7, 'img_bares/20/torecilla.png', 20),
(8, 'img_bares/21/rua2.png', 21),
(9, 'img_bares/21/rua1.png', 21),
(10, 'img_bares/22/angel2.png', 22),
(11, 'img_bares/22/angel1.png', 22),
(12, 'img_bares/23/blas2.png', 23),
(13, 'img_bares/23/blas1.png', 23),
(14, 'img_bares/24/entretapas2.png', 24),
(15, 'img_bares/24/entretapas1.png', 24),
(16, 'img_bares/25/charly2.png', 25),
(17, 'img_bares/25/charly1.png', 25),
(18, 'img_bares/26/paganos2.png', 26),
(19, 'img_bares/26/paganos1.png', 26),
(20, 'img_bares/27/jubera1.png', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_pinchos`
--

CREATE TABLE `imagenes_pinchos` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `pincho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_pinchos`
--

INSERT INTO `imagenes_pinchos` (`id`, `imagen`, `pincho`) VALUES
(1, 'img_pinchos/15/pinchoTortilla3.jpg', 15),
(2, 'img_pinchos/15/pinchoTortilla2.jpg', 15),
(3, 'img_pinchos/15/pinchoTortilla.jpg', 15),
(10, 'img_pinchos/20/choripan2.jpg', 20),
(11, 'img_pinchos/20/choripan1.jpg', 20),
(14, 'img_pinchos/22/pincho2.jpg', 22),
(15, 'img_pinchos/22/pincho1.jpg', 22),
(16, 'img_pinchos/23/pincho3.jpg', 23),
(17, 'img_pinchos/24/pincho4.jpg', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `resegna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pinchos`
--

CREATE TABLE `pinchos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `bar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pinchos`
--

INSERT INTO `pinchos` (`id`, `nombre`, `bar`) VALUES
(15, 'Pincho Tortilla Juan y Pinchame', 17),
(20, 'Choripan Juan y Pinchame', 17),
(22, 'Pincho champiñones Torecilla', 20),
(23, 'Pinchos variados Bar Angel', 22),
(24, 'Pinchos variados Paganos', 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id` int(11) NOT NULL,
  `puntuacion` float NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pincho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id`, `puntuacion`, `descripcion`, `usuario`, `pincho`) VALUES
(31, 4.8, 'El choripan estaba delicioso. Recomendable totalmente', 5, 20),
(34, 3.4, 'Los pinchos estaban muy ricos a excepcion de los que llevaban pimientos rojos', 6, 24),
(35, 2.1, 'Los champiñones estaban secos y asquerosos', 6, 22),
(36, 1.2, 'El choripan no habia por donde cogerlo. Asqueroso', 6, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `admin`) VALUES
(1, 'admin@gmail.com', '2b12e1a2252d642c09f640b63ed35dcc5690464a', 1),
(5, 'latabernadellaurel@gmail.com', 'c3f5041adb884866767b095f62b401e1ce3dfd0f', 0),
(6, 'elquejas@laurel.com', 'b360b90edea443132443483c23f71d0ce3412463', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bares`
--
ALTER TABLE `bares`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `imagenes_bares`
--
ALTER TABLE `imagenes_bares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bar` (`bar`);

--
-- Indices de la tabla `imagenes_pinchos`
--
ALTER TABLE `imagenes_pinchos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pincho` (`pincho`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resegna` (`resegna`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD KEY `fk_id_bar` (`bar`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `pincho` (`pincho`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bares`
--
ALTER TABLE `bares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `imagenes_bares`
--
ALTER TABLE `imagenes_bares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `imagenes_pinchos`
--
ALTER TABLE `imagenes_pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes_bares`
--
ALTER TABLE `imagenes_bares`
  ADD CONSTRAINT `imagenes_bares_ibfk_1` FOREIGN KEY (`bar`) REFERENCES `bares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_pinchos`
--
ALTER TABLE `imagenes_pinchos`
  ADD CONSTRAINT `imagenes_pinchos_ibfk_1` FOREIGN KEY (`pincho`) REFERENCES `pinchos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`resegna`) REFERENCES `reseñas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pinchos`
--
ALTER TABLE `pinchos`
  ADD CONSTRAINT `fk_id_bar` FOREIGN KEY (`bar`) REFERENCES `bares` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`pincho`) REFERENCES `pinchos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
