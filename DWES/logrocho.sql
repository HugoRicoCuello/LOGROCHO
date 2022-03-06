-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2022 a las 21:30:08
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

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
  `longitud` double NOT NULL,
  `direccion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bares`
--

INSERT INTO `bares` (`id`, `nombre`, `puntuacion`, `latitud`, `longitud`, `direccion`) VALUES
(17, 'Juan y Pinchame', 3, 42.46569218319536, -2.447998486433555, 'Calle del Laurel, 9, 26001 Logroño, La Rioja'),
(20, 'Torecilla', 4.2, 42.46574859891866, -2.4482197152691807, 'Calle del Laurel, 15, 26001 Logroño, La Rioja'),
(21, 'La Rua del Laurel', 2.6, 42.4657102121194, -2.4478862729404947, 'Calle del Laurel, 3, 26001 Logroño, La Rioja'),
(22, 'Bar Ángel', 4.6, 42.465766526436, -2.4481945999265666, 'Calle del Laurel, 12, 26001 Logroño, La Rioja'),
(23, 'La Taberna del Tío Blas', 3.9, 42.46560929502901, -2.4476934017761676, 'Calle del Laurel, 1, 26001 Logroño, La Rioja'),
(24, 'Entretapas 941', 3.1, 42.465672112230166, -2.4484723152691954, 'Calle del Laurel, 25, 26001 Logroño, La Rioja'),
(25, 'Bar Charly', 3.6, 42.46581253946404, -2.4490685575978817, 'Tr.ª de Laurel, 2, 26001 Logroño, La Rioja'),
(26, 'Bar Paganos', 4.8, 42.465662526751686, -2.448809215269218, 'Calle del Laurel, 22, 26001 Logroño, La Rioja'),
(27, 'Bar Jubera', 4.4, 42.46569289768123, -2.448804903625731, 'Calle del Laurel, 18, 26001 Logroño, La Rioja'),
(28, 'Bar Calderas', 0, 42.49545254336065, -2.446319759475379, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `pincho` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id`, `pincho`, `usuario`) VALUES
(38, 25, 'admin@gmail.com'),
(39, 24, 'admin@gmail.com');

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
(20, 'img_bares/27/jubera1.png', 27),
(21, 'img_bares/28/calderas2.png', 28),
(22, 'img_bares/28/calderas1.png', 28);

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
(17, 'img_pinchos/24/pincho4.jpg', 24),
(18, 'img_pinchos/25/esparragosfritos.png', 25),
(19, 'img_pinchos/26/pinchojamon.png', 26),
(20, 'img_pinchos/27/pinchopollo.png', 27),
(21, 'img_pinchos/28/bocatacalamares.png', 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `resegna` int(11) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `resegna`, `likes`) VALUES
(27, 31, 4),
(28, 36, 2),
(29, 34, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mejor_valorados`
--

CREATE TABLE `mejor_valorados` (
  `id` int(11) NOT NULL,
  `pincho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mejor_valorados`
--

INSERT INTO `mejor_valorados` (`id`, `pincho`) VALUES
(1, 15),
(2, 23),
(3, 24);

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
(24, 'Pinchos variados Paganos', 26),
(25, 'esparraguitos', 28),
(26, 'jamocito', 26),
(27, 'pinchopollo', 28),
(28, 'bocatacalamares', 21);

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
(36, 1.2, 'El choripan no habia por donde cogerlo. Asqueroso', 6, 20),
(37, 4.2, 'Los champiñones mu ricos', 6, 22),
(40, 3, 'los esparragos uhhh', 6, 25),
(41, 4.2, 'tortilla mu rica', 1, 15),
(42, 2.7, 'taban frios', 5, 23);

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
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pincho` (`pincho`),
  ADD KEY `usuario` (`usuario`);

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
  ADD KEY `resegna` (`resegna`);

--
-- Indices de la tabla `mejor_valorados`
--
ALTER TABLE `mejor_valorados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pincho` (`pincho`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `imagenes_bares`
--
ALTER TABLE `imagenes_bares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `imagenes_pinchos`
--
ALTER TABLE `imagenes_pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `mejor_valorados`
--
ALTER TABLE `mejor_valorados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`pincho`) REFERENCES `pinchos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `mejor_valorados`
--
ALTER TABLE `mejor_valorados`
  ADD CONSTRAINT `mejor_valorados_ibfk_1` FOREIGN KEY (`pincho`) REFERENCES `pinchos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
