-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2022 a las 04:19:05
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webceron`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `codigo_pro` varchar(255) DEFAULT NULL,
  `nombre_pro` varchar(255) DEFAULT NULL,
  `descripccion` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `fecha_regis` date DEFAULT NULL,
  `estado` int(10) DEFAULT NULL,
  `img` mediumblob DEFAULT NULL,
  `tipo_imagen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `codigo_pro`, `nombre_pro`, `descripccion`, `tipo`, `precio`, `cantidad`, `fecha_regis`, `estado`, `img`, `tipo_imagen`) VALUES
(8, '117', 'Dirulan 15 mg y 50 mg', 'Dirulán es un diurético de acción rápida, se emplea en todos aquellos casos en que se requiera la eliminación de líquidos orgánicos retenidos a través de la orina. Indicado en el tratamiento Golpe de calor, Insuficiencia Cardíaca Congestiva. Edema pulmona', 'MEDICAMENTO', '133.00', 12, '2022-04-25', 1, 0x646972756c616e2e6a7067, NULL),
(9, '111', 'Pro Plan Lata Gato Reduced Calorie 85G', 'Pro Plan Lata Gato Reduced Calorie 85G', 'ALIMENTO', '45.00', 12, '2022-04-25', 1, 0x6c6174612d70726f2d706c616e2d726564756365642d63616c6f7269652e6a7067, NULL),
(10, '222', 'Disfraz de Dinosaurio para perro', 'Con este disfraz de dinosaurio tu mascota será la sensación del lugar. Disponible en color  verde. Tiene abertura en la espalda para la correa.', 'ACCESORIO', '150.00', 3, '2022-04-25', 1, 0x64696e6f73617572696f2d312e6a7067, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name_serv` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `estado` int(20) DEFAULT NULL,
  `img` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `name_serv`, `description`, `estado`, `img`) VALUES
(4, 'Cirugía ', 'La Clínica Veterinaria Dr. Ceron cuenta con médicos veterinarios expertos en diferentes disciplinas y con la metodología necesaria para llegar a los diagnósticos que permitirán enfocar los tratamientos de manera eficiente y oportuna, seguimos a detalle el expediente clínico orientado a problemas, en el que al conjuntar los datos generales, la historia clínica y el examen clínico podemos arrojar la lista de problemas que nos permitirá agrupar los signos de acuerdo a problemas específicos y recomendar las pruebas de laboratorio e imageniología complementarias. ', 1, 0x706572726f636972756769612e6a7067);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_regis` date DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `status` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `date_regis`, `tipe`, `status`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$ZRNO8WknLpebysKB1zOAquN5eWgWT8j4PNjLPmnuJHlzFG.IQpAF.', '2022-04-12', 'ADMINISTRADOR', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
