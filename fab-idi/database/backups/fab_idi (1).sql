-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 00:12:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fab_idi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `colaborador` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `colaborador`, `created_at`, `updated_at`) VALUES
(1, '', NULL, NULL),
(2, 'embajador', NULL, NULL),
(3, 'mentor', NULL, NULL),
(4, 'instituto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `representante` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `web` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `nombre`, `representante`, `telefono`, `email`, `web`, `imagen`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'rrrrrrrrr', 'rrrrrrrrrrrrrr', NULL, 'entity@gmail.com', NULL, NULL, 1, '2023-05-13 14:45:25', '2023-05-13 14:45:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `fecha`, `descripcion`, `imagen`, `url`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'evento 1', '2023-06-04', 'descripción del evento 1', 'evento-default.webp', NULL, 1, NULL, NULL),
(2, 'evento 2', '2023-06-04', 'descripción del evento 2', 'evento-default.webp', NULL, 1, NULL, NULL),
(3, 'evento 3', '2023-06-04', 'descripción del evento 3', 'evento-default.webp', NULL, 1, NULL, NULL),
(4, 'evento 4', '2023-06-04', 'descripción del evento 4', 'evento-default.webp', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_06_160750_create_videos_table', 1),
(6, '2023_05_08_172951_create_perfiles_table', 1),
(7, '2023_05_09_163504_add_foreign_key_to_users_table', 2),
(8, '2023_05_09_193635_create_colaboradores_table', 3),
(9, '2023_05_13_150902_create_users_table', 4),
(10, '2023_05_13_151843_create_colaboradores_table', 5),
(11, '2023_05_13_153153_create_usuarios_table', 6),
(12, '2023_05_13_161437_create_usuarios_table', 7),
(13, '2023_05_13_162409_create_entidades_table', 8),
(14, '2023_05_13_172941_create_users_table', 9),
(15, '2023_05_13_173203_create_users_table', 10),
(16, '2023_05_15_173113_create_colaboradores_table', 11),
(17, '2023_05_15_173345_create_colaboradores_table', 12),
(18, '2023_05_15_195132_create_colaboradores_table', 13),
(19, '2023_05_15_200157_agregar_campo_id_colaborador_a_users', 14),
(20, '2023_05_23_201552_create_premios_table', 15),
(21, '2023_06_02_173827_create_premios_table', 16),
(22, '2023_06_02_211939_create_eventos_table', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `perfil`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'usuario', NULL, NULL),
(3, 'mentor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `destacado` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `premios`
--

INSERT INTO `premios` (`id`, `titulo`, `fecha`, `descripcion`, `imagen`, `url`, `activo`, `destacado`, `created_at`, `updated_at`) VALUES
(1, 'premio 1', '2023-06-14', 'este es el premio 1', 'premio.jpg', NULL, 1, 1, NULL, '2023-06-02 18:51:15'),
(2, 'premio 2', '2023-06-14', 'este es el premio 2', 'premio.jpg', NULL, 1, 0, NULL, '2023-06-02 18:51:05'),
(3, 'premio 3', '2023-06-14', 'este es el premio 3', 'premio.jpg', NULL, 1, 1, NULL, NULL),
(4, 'premio 4', '2023-06-14', 'este es el premio 4', 'premio.jpg', NULL, 1, 0, NULL, NULL),
(5, 'premio 5', '2023-06-14', 'este es el premio 5', 'premio.jpg', NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `perfil_id` bigint(20) UNSIGNED NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_colaborador` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `email`, `password`, `telefono`, `twitter`, `instagram`, `linkedin`, `perfil_id`, `imagen`, `activo`, `remember_token`, `created_at`, `updated_at`, `id_colaborador`) VALUES
(7, 'virginia', 'ssss', 'vir@gmail.com', '$2y$10$G/5dzQK/ii4/f8EplIKucupn6CW7yeC/bYXZW1gVxaWQzNpG0HAb6', '', '', '', '', 1, NULL, 1, NULL, '2023-05-13 16:06:42', '2023-05-26 07:51:33', NULL),
(9, 'Ana', 'Pérez', 'pedro@gmail.com', '$2y$10$3PBpifJdTLa1U/nMZwMs1.rK6MamgyubUYEI8o.jDZWPOKrkk9yA.', NULL, NULL, NULL, NULL, 2, NULL, 0, NULL, '2023-05-13 16:12:10', '2023-05-25 08:13:45', NULL),
(10, 'Ana', 'Sánchez', 'ana@gmail.com', '$2y$10$4FFR5Bh/9mEWm13WXcMUMOQAAQmHC48MczAj77FW5QLSC./x77XDu', NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, '2023-05-13 16:12:49', '2023-05-20 05:42:25', 2),
(11, 'Sofía', 'Sillero', 'sofia@gmail.com', '$2y$10$WJCXGTejwR7zFWKPCr1.AOCFsBvwEQZyQFh.GeteG3ETMCzmmS2Fq', NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, '2023-05-13 16:13:12', '2023-05-21 17:44:12', NULL),
(12, 'Sofia', 'Peralta', 'paco@gmail.com', '$2y$10$FcMTz/v2i4JWFghKT31Hhu7NuwEody8c9LZlGnQi/WvZ95/76XCyW', NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, '2023-05-13 16:14:17', '2023-05-16 16:17:51', NULL),
(13, 'Lucas', 'Sillero', 'andrea@gmail.com', '$2y$10$WJCXGTejwR7zFWKPCr1.AOCFsBvwEQZyQFh.GeteG3ETMCzmmS2Fq', NULL, NULL, NULL, NULL, 2, NULL, 0, NULL, '2023-05-13 16:13:12', '2023-05-20 05:41:32', NULL),
(15, 'Hugo', 'Rodríguez', 'marianico@gmail.com', '$2y$10$ja2TY5y8teyoVfpTXEux1O42ha7j4D4E2EC1SgEoRvEUtwo/BOnVS', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, '2023-05-15 18:12:14', '2023-05-20 06:04:13', NULL),
(16, 'user1', 'user1', 'user1@gmail.com', '$2y$10$nWR8cynhEjQ7TwHn/mniJuZf4jDVF3X3u6Aogli3VkU3HPYFT1WvK', NULL, NULL, NULL, NULL, 2, NULL, 1, NULL, '2023-05-22 14:05:30', '2023-05-22 14:05:30', NULL),
(17, 'admin1', 'admin1', 'admin1@gmail.com', '$2y$10$ICaWcNhLd50QFoWDJzQr6Oj8z8jiM58oVaLsnHZXldJ6tCC9NVnM.', NULL, NULL, NULL, NULL, 1, NULL, 1, NULL, '2023-05-22 14:05:48', '2023-05-22 14:05:48', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `nombre`, `url`, `created_at`, `updated_at`) VALUES
(1, 'vide', 'https://www.youtube.com/watch?v=gXPbJuZP7VM&list=PLlP7RS2XhMsSeMufaJuiYU_zNS8nqDROS', NULL, '2023-05-29 16:09:56'),
(2, 'video 2', 'https://www.youtube.com/watch?v=gXPbJuZP7VM&list=PLlP7RS2XhMsSeMufaJuiYU_zNS8nqDRO', NULL, '2023-05-29 16:10:05'),
(3, 'video 3', 'https://www.youtube.com/watch?v=gXPbJuZP7VM&list=PLlP7RS2XhMsSeMufaJuiYU_zNS8nqDROS', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entidades_email_unique` (`email`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_perfil_id_foreign` (`perfil_id`),
  ADD KEY `users_id_colaborador_foreign` (`id_colaborador`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_colaborador_foreign` FOREIGN KEY (`id_colaborador`) REFERENCES `colaboradores` (`id`),
  ADD CONSTRAINT `users_perfil_id_foreign` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
