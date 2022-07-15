-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2022 a las 23:23:32
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
-- Base de datos: `ecolimpieza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(12) NOT NULL,
  `numero_documento` int(13) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `email` varchar(35) NOT NULL,
  `numero_celular` varchar(14) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `metodos_pago_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `tipo_documento`, `numero_documento`, `nombre`, `apellidos`, `email`, `numero_celular`, `clave`, `direccion`, `latitud`, `longitud`, `metodos_pago_id`) VALUES
(3, 'CC', 2312312, 'User', 'Prueba', 'pruebas@gmail.com', '334244444', '$2y$10$iicAupSApbycpuiqbL49.eYht8DJxuWl6Le24.cmSnwleZtONK8se', 'Cra 33 #3F 22', 3.37578, -76.5485, NULL),
(4, 'CC', 45454545, 'Usuario 2', 'Prueba 2', 'pruebas2@gmail.com', '34444', '$2y$10$iicAupSApbycpuiqbL49.eYht8DJxuWl6Le24.cmSnwleZtONK8se', 'Cra p2 #33', 3.37559, -76.5486, NULL),
(5, 'CC', 11133313, 'Jonathan', 'Velásquez Vargas', 'jon@gmail.com', '444444444', '$2y$10$iicAupSApbycpuiqbL49.eYht8DJxuWl6Le24.cmSnwleZtONK8se', 'Cra 44 #3 F2', 4.66441, -74.0924, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_hogar`
--

CREATE TABLE `cliente_hogar` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `hogar_en_mt2` int(5) NOT NULL,
  `numero_habitaciones` int(2) NOT NULL,
  `numero_bathing` int(2) NOT NULL,
  `numero_personas` int(2) NOT NULL,
  `mascotas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente_hogar`
--

INSERT INTO `cliente_hogar` (`id`, `cliente_id`, `hogar_en_mt2`, `numero_habitaciones`, `numero_bathing`, `numero_personas`, `mascotas`) VALUES
(1, 5, 40, 3, 1, 4, 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(12) NOT NULL,
  `numero_documento` int(12) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero_celular` varchar(14) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `eps` varchar(15) NOT NULL,
  `meses_experiencia` int(3) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `metodos_pago_id` int(3) NOT NULL,
  `evaluacion_rendimiento` float NOT NULL,
  `cantidad_servicios` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `tipo_documento`, `numero_documento`, `nombre`, `apellidos`, `email`, `numero_celular`, `clave`, `direccion`, `eps`, `meses_experiencia`, `foto_perfil`, `metodos_pago_id`, `evaluacion_rendimiento`, `cantidad_servicios`) VALUES
(1, 'C.C', 32323, 'Maid', 'Prueba', 'maid@gmail.com', '444444', '$2y$10$iicAupSApbycpuiqbL49.eYht8DJxuWl6Le24.cmSnwleZtONK8se', 'cra 34 #55 - 22', 'Sanitas', 3, 'FOTOCARNET.png', 1, 3.2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojas_de_vida`
--

CREATE TABLE `hojas_de_vida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `tipo_documento` varchar(12) NOT NULL,
  `numero_documento` int(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero_celular` int(14) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_residencia` varchar(50) NOT NULL,
  `lugar_nacimiento` varchar(20) NOT NULL,
  `nivel_educativo` varchar(15) NOT NULL,
  `estado_civil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id` int(11) NOT NULL,
  `tipo_metodo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id`, `tipo_metodo`) VALUES
(1, 'AV Villas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_cliente`
--

CREATE TABLE `pagos_cliente` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `solicitudes_id` int(11) NOT NULL,
  `metodos_pagos_id` int(3) NOT NULL,
  `valor_consignacion` int(11) NOT NULL,
  `fecha_consignacion` datetime NOT NULL,
  `estado` varchar(10) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_empleado`
--

CREATE TABLE `pagos_empleado` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `solicitudes_id` int(11) NOT NULL,
  `metodos_pagos_id` int(3) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pqrs`
--

CREATE TABLE `pqrs` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `tipo_solicitud` varchar(15) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_sol` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `empleado_id` int(11) DEFAULT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_prestacion_servicio` datetime NOT NULL,
  `estado` varchar(10) NOT NULL,
  `valor_estimado` int(11) NOT NULL,
  `detalles_servicio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_sol`, `cliente_id`, `empleado_id`, `fecha_solicitud`, `fecha_prestacion_servicio`, `estado`, `valor_estimado`, `detalles_servicio`) VALUES
(4, 4, NULL, '2022-04-28 18:52:47', '2022-04-30 18:52:00', 'Publicado', 120000, 'Incluye los Servicios Básicos más limpieza a todo el hogar (Sala - Habitaciones - Baños )'),
(33, 5, 1, '2022-07-15 16:00:59', '2022-07-16 18:00:00', 'En proceso', 120000, 'Barrer, trapear, lavado de ropa, limpieza de polvo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `tipo_rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metodos_pago_id` (`metodos_pago_id`);

--
-- Indices de la tabla `cliente_hogar`
--
ALTER TABLE `cliente_hogar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metodos_pago_id` (`metodos_pago_id`);

--
-- Indices de la tabla `hojas_de_vida`
--
ALTER TABLE `hojas_de_vida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos_cliente`
--
ALTER TABLE `pagos_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `solicitudes_id` (`solicitudes_id`),
  ADD KEY `metodos_pagos_id` (`metodos_pagos_id`);

--
-- Indices de la tabla `pagos_empleado`
--
ALTER TABLE `pagos_empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`),
  ADD KEY `solicitudes_id` (`solicitudes_id`),
  ADD KEY `metodos_pagos_id` (`metodos_pagos_id`);

--
-- Indices de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente_hogar`
--
ALTER TABLE `cliente_hogar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hojas_de_vida`
--
ALTER TABLE `hojas_de_vida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pagos_cliente`
--
ALTER TABLE `pagos_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagos_empleado`
--
ALTER TABLE `pagos_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pqrs`
--
ALTER TABLE `pqrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`metodos_pago_id`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `cliente_hogar`
--
ALTER TABLE `cliente_hogar`
  ADD CONSTRAINT `cliente_hogar_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`metodos_pago_id`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `pagos_cliente`
--
ALTER TABLE `pagos_cliente`
  ADD CONSTRAINT `pagos_cliente_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `pagos_cliente_ibfk_2` FOREIGN KEY (`solicitudes_id`) REFERENCES `solicitudes` (`id_sol`),
  ADD CONSTRAINT `pagos_cliente_ibfk_3` FOREIGN KEY (`metodos_pagos_id`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `pagos_empleado`
--
ALTER TABLE `pagos_empleado`
  ADD CONSTRAINT `pagos_empleado_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`),
  ADD CONSTRAINT `pagos_empleado_ibfk_2` FOREIGN KEY (`solicitudes_id`) REFERENCES `solicitudes` (`id_sol`),
  ADD CONSTRAINT `pagos_empleado_ibfk_3` FOREIGN KEY (`metodos_pagos_id`) REFERENCES `metodos_pago` (`id`);

--
-- Filtros para la tabla `pqrs`
--
ALTER TABLE `pqrs`
  ADD CONSTRAINT `pqrs_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);

--
-- Filtros para la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD CONSTRAINT `tipos_usuario_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
