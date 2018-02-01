-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2018 a las 15:30:34
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

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
CREATE DATABASE IF NOT EXISTS `inventariogr02` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventariogr02`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` int(10) NOT NULL,
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
(3, 'Cartera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_productos`
--

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
(3, 'Cafeteria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companias`
--

CREATE TABLE `companias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companias`
--

INSERT INTO `companias` (`id`, `nombre`) VALUES
(1, 'Recordar S.A.S'),
(2, 'Jardines de valledupar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_entrada`
--

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

CREATE TABLE `detalle_solicitud` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`id`, `n_compra`, `n_remision`, `n_devolucion`, `id_productos`, `cantidad`, `observacion`, `tipo_movimiento`, `realizadopor`, `referencia`, `unidad`, `centrocosto`, `created_at`, `updated_at`) VALUES
(6, NULL, 16, NULL, 2, 1, 'uno', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 16, NULL, 4, 2, 'dos', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 16, NULL, 12, 3, 'tres', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 17, NULL, 12, 3, 'uno', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 18, NULL, 7, 4, 'okkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, 18, NULL, 3, 8, 'pkkk', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 19, NULL, 4, 3, 'uno', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 20, NULL, 2, 4, 'una tijera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 21, NULL, 2, 4, 'una tijera', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 22, NULL, 2, 48, 'todo bien', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 23, NULL, 13, 3, 'okokokokok', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(17, NULL, 24, NULL, 3, 2, 'okokok', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(18, NULL, 25, NULL, 5, 2, 'comercial', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(19, NULL, 26, NULL, 3, 1, 'bien bien bien', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(20, NULL, 26, NULL, 5, 1, 'bien bien bien......................', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(21, NULL, 27, NULL, 21, 1, 'bie........', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(22, NULL, 27, NULL, 3, 6, 'bie.....', 'salida', 'Marcos Ortiz', NULL, NULL, NULL, NULL, NULL),
(23, NULL, 28, NULL, 23, 2, 'los guantes probando', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(24, NULL, 29, NULL, 23, 1, 'bien bien pero no', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(25, NULL, 29, NULL, 4, 1, NULL, 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(26, NULL, 29, NULL, 21, 1, NULL, 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(27, NULL, 29, NULL, 13, 1, 'ahi pero no', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(28, NULL, 29, NULL, 12, 1, NULL, 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(29, NULL, 29, NULL, 3, 1, NULL, 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(30, NULL, 29, NULL, 8, 1, 'esta perfecto', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(31, NULL, 29, NULL, 7, 1, NULL, 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(32, NULL, 29, NULL, 18, 1, 'perfect', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(33, NULL, 29, NULL, 11, 1, 'ok esta este producto', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL),
(34, NULL, 30, NULL, 3, 1, 'prueba', 'salida', 'Ruth Gutierrez', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

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

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `almacen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_almacen` int(10) UNSIGNED NOT NULL,
  `url_imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `cantidad`, `id_categoria`, `almacen`, `id_almacen`, `url_imagen`, `usuario`, `created_at`, `updated_at`) VALUES
(2, '77489999885', 'Tijeras', 0, 2, 'Comercial', 1, 'producto-77489999885.png', NULL, '2018-01-06 20:31:16', '2018-01-21 05:27:42'),
(3, '7748123456999', 'lapicero kilometrico', 81, 1, 'Parques', 1, 'producto-7748123456999.jpg', NULL, NULL, '2018-01-26 19:45:09'),
(4, '774896555', 'limpido', 17, 2, 'Comercial', 2, 'producto-774896555.jpg', NULL, '2018-01-07 03:55:58', '2018-01-26 17:00:03'),
(5, '6544565', 'limpido 03', 65, 2, 'Comercial', 3, 'producto-6544565.jpg', NULL, '2018-01-07 04:27:56', '2018-01-26 01:31:16'),
(6, '12345888888', 'prueba', 56, 1, 'Funeraria Recordar', 3, 'producto-12345888888.jpg', NULL, '2018-01-07 05:24:09', '2018-01-07 05:24:09'),
(7, '454541111111', 'Marcos Antonio Ortiz Manjarres', 93, 1, 'Funeraria Recordar', 3, 'producto-454541111111.jpg', NULL, '2018-01-07 05:26:26', '2018-01-26 17:00:04'),
(8, '7749123456', 'mar antony', 22, 1, 'Funeraria Recordar', 4, 'producto-7749123456.jpg', NULL, '2018-01-07 05:30:20', '2018-01-26 17:00:04'),
(11, '12456678ii', 'Marcos', 49, 3, 'Funeraria Arcangeles', 4, 'producto-12456678ii.jpg', NULL, '2018-01-09 05:18:44', '2018-01-26 17:00:04'),
(12, '7748123456999333', 'prueba productos', 49, 3, 'Comercial', 5, 'producto-7748123456999333.jpg', 'Marcos Ortiz', '2018-01-15 17:02:18', '2018-01-26 17:00:04'),
(13, '454541231', 'iphone x', 96, 1, 'Funeraria Arcangeles', 3, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:09:50', '2018-01-26 17:00:03'),
(14, '454541231', 'iphone x', 100, 1, 'Funeraria Arcangeles', 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:11:33', '2018-01-15 17:11:33'),
(15, '454541231', 'iphone x', 100, 1, 'Funeraria Arcangeles', 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:12:06', '2018-01-15 17:12:06'),
(16, '454541231', 'iphone x', 100, 1, 'Funeraria Arcangeles', 2, 'producto-454541231.jpg', 'operador Prueba', '2018-01-15 17:13:04', '2018-01-15 17:13:04'),
(17, '1254878', 'TALONARIO RECIBO DE CAJA RECORDAR', 17, 1, 'Funeraria Arcangeles', 1, 'producto-1254878.jpg', 'Marcos Ortiz', '2018-01-18 01:32:28', '2018-01-18 01:32:28'),
(18, '7748123456', 'AZUCAR 500 GR', 51, 3, 'Funeraria Recordar', 2, 'producto-7748123456.jpg', 'Marcos Ortiz', '2018-01-26 03:31:17', '2018-01-26 17:00:04'),
(19, '77481236545', 'aromaticas', 502, 1, 'Funeraria Recordar', 1, 'producto-77481236545.jpg', 'Marcos Ortiz', '2018-01-26 03:37:19', '2018-01-26 03:37:19'),
(20, '74812455', 'AMBIENTADOR', 100, 2, 'Funeraria Recordar', 1, 'producto-74812455.jpg', 'Marcos Ortiz', '2018-01-26 03:40:22', '2018-01-26 03:40:22'),
(21, '7714', 'Bolsas verdes grandes', 158, 3, 'Funeraria Recordar', 1, '', 'Marcos Ortiz', '2018-01-26 04:22:22', '2018-01-26 17:00:03'),
(22, '774124', 'Cafe de colombia', 23, 3, 'Parques', 1, 'producto-774124.jpg', 'Hilmer', '2018-01-26 16:31:40', '2018-01-26 16:31:40'),
(23, '77412488', 'Guantes de madrid', 1022, 2, 'Parques', 3, 'producto-77412488.jpg', 'Hilmer', '2018-01-26 16:36:29', '2018-01-26 17:00:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

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
(16, '2018-01-19', 1, 2, 1, '100000000000000000000000000', '1', '2018-02-20 04:01:17', '2018-01-20 04:01:17'),
(17, '2018-01-19', 1, 2, 2, '123456', '1', '2018-01-20 04:40:42', '2018-01-20 04:40:42'),
(18, '2018-01-19', 1, 1, 2, '1000', '3', '2018-03-20 04:45:59', '2018-01-20 04:45:59'),
(19, '2018-01-19', 3, 2, 1, '100089', '3', '2018-01-20 04:52:08', '2018-01-20 04:52:08'),
(20, '2018-01-20', 3, 2, 1, '654', '3', '2018-01-20 05:12:39', '2018-01-20 05:12:39'),
(21, '2018-01-20', 3, 2, 1, '654', '3', '2018-01-20 05:14:10', '2018-01-20 05:14:10'),
(22, '2018-01-21', 1, 1, 2, '10231', '1', '2018-01-21 05:27:42', '2018-01-21 05:27:42'),
(23, '2018-01-21', 3, 1, 2, '100232', '1', '2018-01-21 06:20:45', '2018-01-21 06:20:45'),
(24, '2018-01-21', 3, 2, 1, '1001212', '1', '2018-01-21 20:33:45', '2018-01-21 20:33:45'),
(25, '2018-01-21', 1, 2, 2, '100121', '1', '2018-01-21 20:45:41', '2018-01-21 20:45:41'),
(26, '2018-01-25', 5, 2, 1, '1001210', '1', '2018-01-26 01:31:16', '2018-01-26 01:31:16'),
(27, '2018-01-25', 4, 2, 2, '1001245', '1', '2018-01-26 04:36:31', '2018-01-26 04:36:31'),
(28, '2018-01-26', 1, 2, 1, '100123', '5', '2018-01-26 16:43:47', '2018-01-26 16:43:47'),
(29, '2018-01-26', 5, 1, 1, '100123', '5', '2018-01-26 17:00:03', '2018-01-26 17:00:03'),
(30, '2018-01-26', 4, 2, 1, '454', '5', '2018-01-26 19:45:09', '2018-01-26 19:45:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

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
(1, NULL, 'Marcos Ortiz', 'ing.marcosortiz@hotmail.com', NULL, NULL, NULL, '$2y$10$8niqqGSzm7wyoQXowl6EG.o3LJ3gEpMs5S2JiapLhGCnCho8RQ7fy', 3, '7H8TdQQMXXqypwMf7GJIXTVDzexTZGWbJtvsFaHbwpd6z44KOsET3Ch7mB2F', '2018-01-12 23:53:30', '2018-01-12 23:53:30'),
(3, NULL, 'operador Prueba', 'operador@prueba.com', NULL, NULL, NULL, '$2y$10$AdbxCEIn1eLDxc9Z6..bsOlqO7i24Ho8onu4KZK9W3F4mCB3BuIJu', 4, 'xSEfVNvoinxWhEIX8S7EHSMZ2cne4XOBpeE37ZVezshoosEtQgm7GHVvx2tx', '2018-01-15 01:00:04', '2018-01-15 01:00:04'),
(4, NULL, 'Hilmer', 'prueba@prueba.com', NULL, NULL, NULL, '$2y$10$KDVry4RII2v8fDARBllsM.iGWEn7cVWchq41uElvZtsg.86J68AH.', 4, 'UAOiH4fCOsxYC7UNvomqMmnHdbDqttD9HNUMRRGYKUgNiuN3oQqzakDWqnhQ', '2018-01-24 14:41:05', '2018-01-24 14:41:05'),
(5, NULL, 'Ruth Gutierrez', 'compras.valledupar@gruporecordar.com.co', NULL, NULL, NULL, '$2y$10$prhQbSK4HyosogxIMK3MFeio1bgFHze6xwvoG/7P1.ndTYq3STfeS', 3, 'XGNE0lRyUYMj8km5TD1CMf9ktXnmpa4HwktxzhpnM4Rc7qEigSpY05SdVcnF', '2018-01-24 15:21:52', '2018-01-24 15:21:52');

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
  ADD KEY `detalle_solicitud_id_producto_foreign` (`id_producto`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categorias_productos`
--
ALTER TABLE `categorias_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `companias`
--
ALTER TABLE `companias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `remision_salida`
--
ALTER TABLE `remision_salida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `detalle_solicitud_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

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
  ADD CONSTRAINT `movimiento_id_productos_foreign` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_productos` (`id`);

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
