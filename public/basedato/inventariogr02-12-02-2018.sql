-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2018 a las 16:15:20
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventariogr02`
--
DROP DATABASE IF EXISTS `inventariogr02`;
CREATE DATABASE IF NOT EXISTS `inventariogr02` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventariogr02`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

DROP TABLE IF EXISTS `almacen`;
CREATE TABLE `almacen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`) VALUES
(1, 'Funeraria recordar'),
(2, 'Comercial'),
(3, 'Parques'),
(4, 'Funeraria arcangeles'),
(5, 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administractivo'),
(2, 'Auxiliar de sistemas'),
(3, 'Cartera'),
(4, 'Auxiliar de archivo'),
(5, 'Gestion humana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

DROP TABLE IF EXISTS `categorias_productos`;
CREATE TABLE `categorias_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias_productos`
--

INSERT INTO `categorias_productos` (`id`, `nombre`) VALUES
(1, 'Papeleria'),
(2, 'Aseo'),
(3, 'Cafeteria'),
(4, 'Probando guardando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companias`
--

DROP TABLE IF EXISTS `companias`;
CREATE TABLE `companias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companias`
--

INSERT INTO `companias` (`id`, `nombre`) VALUES
(1, 'Recordar S.A.S'),
(2, 'Jardines de valledupar'),
(3, 'Barranquilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_entrada`
--

DROP TABLE IF EXISTS `compra_entrada`;
CREATE TABLE `compra_entrada` (
  `id` int(10) UNSIGNED NOT NULL,
  `n_compra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `facturapdf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `realidopor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_movimientos` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

DROP TABLE IF EXISTS `detalle_solicitud`;
CREATE TABLE `detalle_solicitud` (
  `id` int(10) UNSIGNED NOT NULL,
  `N_solicitud` int(10) UNSIGNED NOT NULL,
  `unidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `centro_costo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

DROP TABLE IF EXISTS `devolucion`;
CREATE TABLE `devolucion` (
  `id` int(10) UNSIGNED NOT NULL,
  `n_devolucion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `realizadopor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_movimientos` int(10) UNSIGNED NOT NULL,
  `n_remision` int(11) NOT NULL,
  `tipo_devolucion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_11_164414_perfilesmigration', 1),
(2, '2017_11_11_164449_areasmigration', 1),
(3, '2017_11_11_164528_conmpaniasmigration', 1),
(4, '2017_11_11_164614_create_users_table', 1),
(5, '2017_11_11_164624_create_password_resets_table', 1),
(6, '2017_11_11_164915_categorias_productosmigration', 1),
(7, '2017_11_11_164949_productosmigration', 1),
(8, '2017_11_11_165122_detalle_solicitudmigration', 1),
(9, '2017_11_11_165123_solicitudmigration', 1),
(10, '2017_11_11_165530_movimientomigration', 1),
(11, '2017_11_11_165701_remision_salidamigration', 1),
(12, '2017_11_11_165935_proveedoresmigration', 1),
(13, '2017_11_11_165936_compra_entradamigration', 1),
(14, '2017_11_11_170009_devoluciondamigration', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
CREATE TABLE `movimiento` (
  `id` int(10) UNSIGNED NOT NULL,
  `n_compra` int(11) DEFAULT NULL,
  `n_remision` int(11) NOT NULL,
  `n_devolucion` int(11) DEFAULT NULL,
  `id_productos` int(10) UNSIGNED DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `observacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_movimiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realizadopor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referencia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `centrocosto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `n_compra`, `n_remision`, `n_devolucion`, `id_productos`, `cantidad`, `observacion`, `tipo_movimiento`, `realizadopor`, `referencia`, `unidad`, `centrocosto`, `created_at`, `updated_at`) VALUES
(45, NULL, 39, NULL, 4, 2, 'ok', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, '2018-02-02', NULL),
(46, NULL, 40, NULL, 4, 3, 'otro', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-02-02', NULL),
(47, NULL, 40, NULL, 27, 10, 'otro mas', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-02-02', NULL),
(48, NULL, 41, NULL, 27, 5, 'bien', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-03-07', NULL),
(49, NULL, 41, NULL, 4, 6, 'mejor', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-03-07', NULL),
(50, NULL, 41, NULL, 3, 2, 'producto con destino a chile', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-03-07', NULL),
(51, NULL, 42, NULL, 27, 4, 'salen 4 productos para arendy', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-02-02', NULL),
(52, NULL, 43, NULL, 4, 3, 'probando', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, '2018-04-10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ing.marcosortiz@hotmail.com', '$2y$10$l24z.xTz0P5dhCYp69xlIeBe/fF/U.T3GiP5WkL25BXzqzVXZk32y', '2018-01-13 00:32:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`) VALUES
(3, 'Administrador'),
(4, 'Operador'),
(5, 'Solcitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_almacen` int(10) UNSIGNED NOT NULL,
  `url_imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `cantidad`, `id_categoria`, `id_almacen`, `url_imagen`, `usuario`, `created_at`, `updated_at`) VALUES
(2, '77489999885', 'Tijeras', 0, 2, 1, 'producto-77489999885.png', NULL, '2018-01-06 20:31:16', '2018-01-21 05:27:42'),
(3, '7748123456999', 'lapicero kilometrico negro', 76, 1, 1, 'producto-7748123456999.jpg', NULL, NULL, '2018-02-03 16:17:50'),
(4, '774896555', 'limpido', 5, 2, 2, 'producto-774896555.jpg', NULL, '2018-01-07 03:55:58', '2018-02-10 23:19:55'),
(5, '6544565', 'limpido 03', 61, 2, 3, 'producto-6544565.jpg', NULL, '2018-01-07 04:27:56', '2018-02-01 05:40:54'),
(6, '12345888888', 'prueba', 56, 1, 3, 'producto-12345888888.jpg', NULL, '2018-01-07 05:24:09', '2018-01-07 05:24:09'),
(7, '454541111111', 'Marcos Antonio Ortiz Manjarres', 93, 1, 3, 'producto-454541111111.jpg', NULL, '2018-01-07 05:26:26', '2018-01-26 17:00:04'),
(8, '7749123456', 'mar antony', 22, 1, 4, 'producto-7749123456.jpg', NULL, '2018-01-07 05:30:20', '2018-01-26 17:00:04'),
(12, '7748123456999333', 'prueba productos', 47, 3, 5, 'producto-7748123456999333.jpg', 'Marcos Ortiz', '2018-01-15 17:02:18', '2018-01-29 22:30:00'),
(13, '454541231', 'iphone x', 96, 1, 3, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:09:50', '2018-01-26 17:00:03'),
(14, '454541231', 'iphone x', 100, 1, 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:11:33', '2018-01-15 17:11:33'),
(15, '454541231', 'iphone x', 100, 1, 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:12:06', '2018-01-15 17:12:06'),
(16, '454541231', 'iphone x', 100, 1, 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:13:04', '2018-01-15 17:13:04'),
(17, '1254878', 'TALONARIO RECIBO DE CAJA RECORDAR', 8, 1, 1, 'producto-1254878.jpg', 'Marcos Ortiz', '2018-01-18 01:32:28', '2018-02-02 04:40:42'),
(18, '7748123456', 'AZUCAR 500 GR', 51, 3, 2, 'producto-7748123456.jpg', 'Marcos Ortiz', '2018-01-26 03:31:17', '2018-01-26 17:00:04'),
(19, '77481236545', 'aromaticas', 502, 1, 1, 'producto-77481236545.jpg', 'Marcos Ortiz', '2018-01-26 03:37:19', '2018-01-26 03:37:19'),
(20, '74812455', 'AMBIENTADOR', 100, 2, 1, 'producto-74812455.jpg', 'Marcos Ortiz', '2018-01-26 03:40:22', '2018-01-26 03:40:22'),
(21, '7714', 'Bolsas verdes grandes', 158, 3, 1, '', 'Marcos Ortiz', '2018-01-26 04:22:22', '2018-01-26 17:00:03'),
(22, '774124', 'Cafe de colombia', 9, 3, 1, 'producto-774124.jpg', 'Hilmer', '2018-01-26 16:31:40', '2018-02-02 19:18:08'),
(23, '77412488', 'Guantes de madrid', 1022, 2, 3, 'producto-77412488.jpg', 'Hilmer', '2018-01-26 16:36:29', '2018-01-26 17:00:03'),
(24, '774812356', 'Aires acondicionado lg', 500, 1, 5, 'producto-774812356.jpg', 'Ruth Gutierrez', '2018-01-29 16:55:29', '2018-01-29 16:55:29'),
(25, '774111', 'Pc mac 2050', 369, 1, 5, 'producto-774111.jpg', 'Hilmer', '2018-01-30 03:18:26', '2018-01-30 03:18:26'),
(26, '12345698', 'Probando producto', 1520, 3, 3, 'producto-12345698.jpg', 'operador Prueba', '2018-01-30 06:23:02', '2018-01-30 06:23:02'),
(27, '712345689', 'Rema de papel reprograf', 230, 1, 4, 'producto-712345689.jpg', 'operador Prueba', '2018-01-30 20:47:01', '2018-02-03 04:20:39'),
(28, '12456678ii', 'Prueba limpido', 120, 3, 5, 'producto-12456678ii.jpg', 'Marcos Ortiz', '2018-02-01 03:39:10', '2018-02-01 03:39:10'),
(29, '44', 'hhh', 44, 2, 2, '', 'Marcos Ortiz', '2018-02-02 05:52:13', '2018-02-02 05:52:13'),
(30, '55555', 'HIT NARANJA PIÑA', 454, 3, 2, 'producto-55555.jpg', 'Marcos Ortiz', '2018-02-02 06:09:49', '2018-02-02 06:09:49'),
(31, '4569', 'Guardando probando seguro', 12356, 3, 4, '', 'Marcos Ortiz', '2018-02-02 13:08:31', '2018-02-02 13:08:31'),
(32, '45690123', 'Prueba de guardado', 456, 2, 2, '', 'Marcos Ortiz', '2018-02-02 13:10:02', '2018-02-02 13:10:02'),
(33, '9565458', 'Hit naranja pina', 124545, 3, 5, '', 'Marcos Ortiz', '2018-02-02 13:10:57', '2018-02-02 13:10:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE `proveedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision_salida`
--

DROP TABLE IF EXISTS `remision_salida`;
CREATE TABLE `remision_salida` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_solicitante` int(10) UNSIGNED NOT NULL,
  `compania` int(10) UNSIGNED NOT NULL,
  `area` int(10) UNSIGNED NOT NULL,
  `centroCosto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `realizadopor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `remision_salida`
--

INSERT INTO `remision_salida` (`id`, `fecha`, `id_solicitante`, `compania`, `area`, `centroCosto`, `realizadopor`, `created_at`, `updated_at`) VALUES
(39, '2018-02-02', 5, 2, 2, '1001', 'Marcos Ortiz', '2018-02-03 03:46:56', '2018-02-03 03:46:56'),
(40, '2018-02-02', 6, 2, 1, '1001', '1', '2018-02-03 04:02:26', '2018-02-03 04:02:26'),
(41, '2018-02-02', 5, 1, 1, '1201', '1', '2018-02-03 04:06:55', '2018-02-03 04:06:55'),
(42, '2018-02-02', 6, 2, 1, '1001', '1', '2018-02-03 04:20:39', '2018-02-03 04:20:39'),
(43, '2018-02-10', 6, 1, 1, '10012', '1', '2018-02-10 23:19:55', '2018-02-10 23:19:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
CREATE TABLE `solicitud` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `n_solicitud` int(11) NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprovado_por` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_detalle` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_area` int(10) UNSIGNED DEFAULT NULL,
  `id_compania` int(10) UNSIGNED DEFAULT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_perfil` int(10) UNSIGNED NOT NULL DEFAULT '4',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cedula`, `name`, `email`, `id_area`, `id_compania`, `user`, `password`, `id_perfil`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Marcos Ortiz', 'ing.marcosortiz@hotmail.com', NULL, NULL, NULL, '$2y$10$8niqqGSzm7wyoQXowl6EG.o3LJ3gEpMs5S2JiapLhGCnCho8RQ7fy', 3, 'Nge5QPU6RHZapKmbzC44HvYjLFpwG9mzhQro7gYnpIQHKWUuQup2t9mIiLmU', '2018-01-12 23:53:30', '2018-01-12 23:53:30'),
(3, NULL, 'operador Prueba', 'operador@prueba.com', NULL, NULL, NULL, '$2y$10$AdbxCEIn1eLDxc9Z6..bsOlqO7i24Ho8onu4KZK9W3F4mCB3BuIJu', 4, 'NoLADaZYvJ9tG1m8HqOuF2JeHlP8fu8ootJvvlTlG96NraAGECxNOwBjppDX', '2018-01-15 01:00:04', '2018-01-15 01:00:04'),
(4, NULL, 'Hilmer', 'prueba@prueba.com', NULL, NULL, NULL, '$2y$10$KDVry4RII2v8fDARBllsM.iGWEn7cVWchq41uElvZtsg.86J68AH.', 5, 'UAOiH4fCOsxYC7UNvomqMmnHdbDqttD9HNUMRRGYKUgNiuN3oQqzakDWqnhQ', '2018-01-24 14:41:05', '2018-01-24 14:41:05'),
(5, NULL, 'Ruth Gutierrez', 'compras.valledupar@gruporecordar.com.co', NULL, NULL, NULL, '$2y$10$prhQbSK4HyosogxIMK3MFeio1bgFHze6xwvoG/7P1.ndTYq3STfeS', 3, 'sCeHNCPQatEPLNNQaLrwxEIYy0fhb7q5gHy8rxt59epXMTHeMstuVJImjsVZ', '2018-01-24 15:21:52', '2018-01-24 15:21:52'),
(6, NULL, 'Arendy Gutierrez', 'funeraria.valledupar@gruporecordar.com.co', NULL, NULL, NULL, '$2y$10$t2JXI2xqti2.xM95KqTcVeMpVKKY77W1ZWv0j816jl513KidlF5EC', 4, NULL, '2018-02-02 00:40:08', '2018-02-02 00:40:08');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companias`
--
ALTER TABLE `companias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra_entrada`
--
ALTER TABLE `compra_entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_entrada_id_proveedor_foreign` (`id_proveedor`),
  ADD KEY `compra_entrada_id_movimientos_foreign` (`id_movimientos`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_solicitud_id_producto_foreign` (`id_producto`),
  ADD KEY `N_solicitud` (`N_solicitud`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devolucion_id_movimientos_foreign` (`id_movimientos`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimiento_id_productos_foreign` (`id_productos`),
  ADD KEY `n_remision` (`n_remision`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id_categoria_foreign` (`id_categoria`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `remision_salida`
--
ALTER TABLE `remision_salida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `remision_salida_id_solicitante_foreign` (`id_solicitante`),
  ADD KEY `compania` (`compania`),
  ADD KEY `area` (`area`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_area_foreign` (`id_area`),
  ADD KEY `users_id_compania_foreign` (`id_compania`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `companias`
--
ALTER TABLE `companias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compra_entrada`
--
ALTER TABLE `compra_entrada`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `remision_salida`
--
ALTER TABLE `remision_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra_entrada`
--
ALTER TABLE `compra_entrada`
  ADD CONSTRAINT `compra_entrada_id_movimientos_foreign` FOREIGN KEY (`id_movimientos`) REFERENCES `movimiento` (`id`),
  ADD CONSTRAINT `compra_entrada_id_proveedor_foreign` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `detalle_solicitud_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_solicitud_ibfk_2` FOREIGN KEY (`N_solicitud`) REFERENCES `solicitud` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_id_movimientos_foreign` FOREIGN KEY (`id_movimientos`) REFERENCES `movimiento` (`id`);

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`n_remision`) REFERENCES `remision_salida` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `almacen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `remision_salida`
--
ALTER TABLE `remision_salida`
  ADD CONSTRAINT `remision_salida_ibfk_1` FOREIGN KEY (`compania`) REFERENCES `companias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remision_salida_ibfk_2` FOREIGN KEY (`area`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `remision_salida_id_solicitante_foreign` FOREIGN KEY (`id_solicitante`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`),
  ADD CONSTRAINT `users_id_compania_foreign` FOREIGN KEY (`id_compania`) REFERENCES `companias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
