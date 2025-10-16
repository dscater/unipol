-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-10-2025 a las 01:18:56
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `unipol_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre_sistema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio_email` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `nombre_sistema`, `alias`, `logo`, `envio_email`, `created_at`, `updated_at`) VALUES
(1, 'UNIPOL S.A.', 'UNIPOL', 'logo.png', '{\"host\": \"smtp.gmail.com\", \"correo\": \"kingcerocias@gmail.com\", \"driver\": \"smtp\", \"nombre\": \"unipol\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}', '2025-10-14 23:02:13', '2025-10-15 00:53:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_accions`
--

CREATE TABLE `historial_accions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `accion` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos_original` json DEFAULT NULL,
  `datos_nuevo` json DEFAULT NULL,
  `modulo` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `historial_accions`
--

INSERT INTO `historial_accions` (`id`, `user_id`, `accion`, `descripcion`, `datos_original`, `datos_nuevo`, `modulo`, `fecha`, `hora`, `created_at`, `updated_at`) VALUES
(1, 1, 'MODIFICACIÓN', 'EL USUARIO admin ACTUALIZÓ LA CONFIGURACIÓN DEL SISTEMA', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-14T23:02:13.000000Z\", \"envio_email\": \"{\\n                                \\\"host\\\": \\\"smtp.hostinger.com\\\",\\n                                \\\"correo\\\": \\\"mensaje@emsytsrl.com\\\",\\n                                \\\"driver\\\": \\\"smtp\\\",\\n                                \\\"nombre\\\": \\\"unibienes\\\",\\n                                \\\"puerto\\\": \\\"587\\\",\\n                                \\\"password\\\": \\\"8Z@d>&kj^y\\\",\\n                                \\\"encriptado\\\": \\\"tls\\\"\\n                            }\", \"nombre_sistema\": \"UNIPOL S.A.\"}', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-15T00:42:01.000000Z\", \"envio_email\": {\"host\": \"smtp.hostinger.com\", \"correo\": \"mensaje@emsytsrl.com\", \"driver\": \"smtp\", \"nombre\": \"unibienes\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}, \"nombre_sistema\": \"UNIPOL S.A.\"}', 'CONFIGURACIÓN SISTEMA', '2025-10-14', '20:42:01', '2025-10-15 00:42:01', '2025-10-15 00:42:01'),
(2, 1, 'MODIFICACIÓN', 'EL USUARIO admin ACTUALIZÓ LA CONFIGURACIÓN DEL SISTEMA', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-15T00:42:01.000000Z\", \"envio_email\": {\"host\": \"smtp.hostinger.com\", \"correo\": \"mensaje@emsytsrl.com\", \"driver\": \"smtp\", \"nombre\": \"unibienes\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}, \"nombre_sistema\": \"UNIPOL S.A.\"}', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-15T00:42:39.000000Z\", \"envio_email\": {\"host\": \"smtp.hostinger.com\", \"correo\": \"kingcerocias@gmail.com\", \"driver\": \"smtp\", \"nombre\": \"unipol\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}, \"nombre_sistema\": \"UNIPOL S.A.\"}', 'CONFIGURACIÓN SISTEMA', '2025-10-14', '20:42:39', '2025-10-15 00:42:39', '2025-10-15 00:42:39'),
(3, 1, 'MODIFICACIÓN', 'EL USUARIO admin ACTUALIZÓ LA CONFIGURACIÓN DEL SISTEMA', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-15T00:42:39.000000Z\", \"envio_email\": {\"host\": \"smtp.hostinger.com\", \"correo\": \"kingcerocias@gmail.com\", \"driver\": \"smtp\", \"nombre\": \"unipol\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}, \"nombre_sistema\": \"UNIPOL S.A.\"}', '{\"id\": 1, \"logo\": \"logo.png\", \"alias\": \"UNIPOL\", \"created_at\": \"2025-10-14T23:02:13.000000Z\", \"updated_at\": \"2025-10-15T00:53:30.000000Z\", \"envio_email\": {\"host\": \"smtp.gmail.com\", \"correo\": \"kingcerocias@gmail.com\", \"driver\": \"smtp\", \"nombre\": \"unipol\", \"puerto\": \"587\", \"password\": \"bubtfibqsypckzzz\", \"encriptado\": \"tls\"}, \"nombre_sistema\": \"UNIPOL S.A.\"}', 'CONFIGURACIÓN SISTEMA', '2025-10-14', '20:53:30', '2025-10-15 00:53:30', '2025-10-15 00:53:30'),
(4, 1, 'CREACIÓN', 'EL USUARIO admin REGISTRO UN POSTULANTE (PREINSCRIPCIÓN)', '{\"ci\": \"6767677\", \"id\": 5, \"cel\": \"777777777\", \"ci_exp\": \"LP\", \"codigo\": \"A-0000001\", \"correo\": \"victorgonzalo.as@gmail.com\", \"estado\": \"PREINSCRITO\", \"genero\": \"M\", \"nombre\": \"JUAN\", \"unidad\": \"ANAPOL\", \"materno\": \"MAMANI\", \"paterno\": \"PEREZ\", \"user_id\": 6, \"nro_insc\": 1, \"fecha_nac\": \"2006-01-01\", \"created_at\": \"2025-10-15T00:53:40.000000Z\", \"nro_cuenta\": \"100000000333\", \"updated_at\": \"2025-10-15T00:53:40.000000Z\", \"complemento\": \"\", \"observacion\": \"OBS\", \"lugar_preins\": \"ANAPOL\", \"fecha_registro\": \"2025-10-14\"}', NULL, 'POSTULANTE', '2025-10-14', '20:53:47', '2025-10-15 00:53:47', '2025-10-15 00:53:47'),
(5, 6, 'CREACIÓN', 'EL USUARIO juan@gmail.com REGISTRO UN USUARIO', '{\"id\": 3, \"file1\": \"131760577367.pdf\", \"file2\": \"231760577367.pdf\", \"file3\": \"331760577367.pdf\", \"file4\": \"431760577367.pdf\", \"file6\": \"631760577367.pdf\", \"file7\": \"731760577367.pdf\", \"file8\": \"831760577367.pdf\", \"file9\": \"931760577367.pdf\", \"file10\": \"1031760577367.pdf\", \"file11\": \"1131760577367.pdf\", \"file12\": \"1231760577367.pdf\", \"file13\": \"1331760577367.pdf\", \"file14\": \"1431760577367.pdf\", \"user_id\": 6, \"created_at\": \"2025-10-16T01:16:07.000000Z\", \"updated_at\": \"2025-10-16T01:16:07.000000Z\", \"postulante_id\": 5}', NULL, 'REQUISITOS', '2025-10-15', '21:16:07', '2025-10-16 01:16:07', '2025-10-16 01:16:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_01_31_165641_create_configuracions_table', 1),
(2, '2024_11_02_153317_create_users_table', 1),
(3, '2024_11_02_153318_create_historial_accions_table', 1),
(4, '2025_10_14_151340_create_postulantes_table', 1),
(5, '2025_10_15_201634_create_requisitos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE `postulantes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `cel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nro_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_preins` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `nro_insc` bigint NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ecodigo` int NOT NULL DEFAULT '0',
  `epass` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`id`, `nombre`, `paterno`, `materno`, `ci`, `ci_exp`, `complemento`, `genero`, `unidad`, `fecha_nac`, `cel`, `correo`, `nro_cuenta`, `lugar_preins`, `observacion`, `estado`, `foto`, `user_id`, `fecha_registro`, `nro_insc`, `codigo`, `ecodigo`, `epass`, `status`, `created_at`, `updated_at`) VALUES
(5, 'JUAN', 'PEREZ', 'MAMANI', '6767677', 'LP', '', 'M', 'ANAPOL', '2006-01-01', '777777777', 'juan@gmail.com', '100000000333', 'ANAPOL', 'OBS', 'PREINSCRITO', '61760559326.jpg', 6, '2025-10-14', 1, 'A-0000001', 1, 1, 1, '2025-10-15 00:53:40', '2025-10-15 20:15:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos`
--

CREATE TABLE `requisitos` (
  `id` bigint UNSIGNED NOT NULL,
  `postulante_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `file1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file12` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file13` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file14` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requisitos`
--

INSERT INTO `requisitos` (`id`, `postulante_id`, `user_id`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `file7`, `file8`, `file9`, `file10`, `file11`, `file12`, `file13`, `file14`, `edad`, `created_at`, `updated_at`) VALUES
(3, 5, 6, '131760577367.pdf', '231760577367.pdf', '331760577367.pdf', '431760577367.pdf', NULL, '631760577367.pdf', '731760577367.pdf', '831760577367.pdf', '931760577367.pdf', '1031760577367.pdf', '1131760577367.pdf', '1231760577367.pdf', '1331760577367.pdf', '1431760577367.pdf', NULL, '2025-10-16 01:16:07', '2025-10-16 01:16:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(600) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceso` int NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `nombre`, `paterno`, `materno`, `ci`, `ci_exp`, `dir`, `correo`, `fono`, `password`, `acceso`, `tipo`, `foto`, `fecha_registro`, `status`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '', '0', '', '', '', '', '$2y$12$65d4fgZsvBV5Lc/AxNKh4eoUdbGyaczQ4sSco20feSQANshNLuxSC', 1, 'ADMINISTRADOR', NULL, '2025-10-14', 1, NULL, '2025-10-14 23:02:13', '2025-10-14 23:02:13'),
(6, 'juan@gmail.com', 'JUAN', 'PEREZ', 'MAMANI', '6767677', 'LP', NULL, 'victorgonzalo.as@gmail.com', '777777777', '$2y$12$JWHNcI3nC88tscBw1kvu5eeFsdjblMWW2tpCpyuHBBl1Sy/4DZZR2', 1, 'POSTULANTE', '61760559326.jpg', '2025-10-14', 1, '6423', '2025-10-15 00:53:40', '2025-10-16 01:11:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historial_accions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `postulantes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitos_postulante_id_foreign` (`postulante_id`),
  ADD KEY `requisitos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_accions`
--
ALTER TABLE `historial_accions`
  ADD CONSTRAINT `historial_accions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD CONSTRAINT `postulantes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `requisitos`
--
ALTER TABLE `requisitos`
  ADD CONSTRAINT `requisitos_postulante_id_foreign` FOREIGN KEY (`postulante_id`) REFERENCES `postulantes` (`id`),
  ADD CONSTRAINT `requisitos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
