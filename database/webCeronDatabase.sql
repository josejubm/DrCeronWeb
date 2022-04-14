

CREATE DATABASE webceron;

CREATE TABLE `services` (
  `id` int AUTO_INCREMENT,
  `name_serv` varchar(255),
  `description` varchar(1000),
  `estado` int(20),
  `img` MEDIUMBLOB,
  PRIMARY KEY (`id`)
);

CREATE TABLE `products` (
  `id` int AUTO_INCREMENT,
  `codigo_pro` varchar(255),
  `nombre_pro` varchar(255),
  `descripccion` varchar(255),
  `tipo` varchar(255),
  `precio` decimal(5,2),
  `cantidad` int(50),
  `fecha_regis` date,
  `estado` int(10),
  `img` MEDIUMBLOB,
  `tipo_imagen` varchar(30),
  PRIMARY KEY (`id`)
);


CREATE TABLE `users` (
  `id` int AUTO_INCREMENT,
  `name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `date_regis` date,
  `tipe` varchar(255),
  `status` int(20),
  PRIMARY KEY (`id`)
);
