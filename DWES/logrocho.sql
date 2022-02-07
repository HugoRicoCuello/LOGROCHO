-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 13:02:35
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
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bares`
--

INSERT INTO `bares` (`id`, `nombre`, `puntuacion`, `latitud`, `longitud`) VALUES
(5, 'El Muro', 0, 42.465359382007364, -2.4486111279235963),
(6, 'Donosti', 0, 42.46557670698048, -2.44819164675331),
(7, 'La Taberna del Laurel', 0, 42.46553872838531, -2.4479557179337275),
(8, 'Letras del Laurel', 0, 42.46556942836399, -2.4489130823515577),
(9, 'Bar Achurri', 0, 42.46554521389095, -2.4481775001426356),
(10, 'Paganos', 0, 42.46549634217663, -2.4488521289783067),
(17, 'Juan y Pinchame', 0, 42.46569218319536, -2.447998486433555);

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
(1, 'img_bares/17/bar1.jpg', 17);

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
(11, 'img_pinchos/20/choripan1.jpg', 20);

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
(1, 'pincho tortilla', 5),
(15, 'Pincho Tortilla Achurri', 9),
(20, 'Choripan Donosti', 6);

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
(22, 1.7, 'La tortilla estaba fria y seca. No recomendable', 6, 1),
(25, 3.8, 'Mu rico el pincho de tortilla', 5, 1),
(31, 4.8, 'El choripan estaba delicioso. Recomendable totalmente', 5, 20);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `imagenes_bares`
--
ALTER TABLE `imagenes_bares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes_pinchos`
--
ALTER TABLE `imagenes_pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pinchos`
--
ALTER TABLE `pinchos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
