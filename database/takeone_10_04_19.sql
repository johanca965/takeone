-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2019 a las 16:37:30
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `takeone_10_04_19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE `audits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tabla` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `action` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `code` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `audits`
--

INSERT INTO `audits` (`id`, `user_id`, `tabla`, `action`, `code`, `description`, `created_at`) VALUES
(1, 2, 'Club', 'Create', 1, 'Club registration with title: club example, slug: club-example, established: 2019-05-03 00:00:00, address_line1: , address_line2: , country_id: 47, city: Bucaramanga, lat: 7.13867, lon: -73.1232, logo: 1556926802-club-example.png, phone: 3222183955, email: johanca965@hotmail.com, uniqe_id: 10215201.', '2019-05-03 18:40:10'),
(2, 2, 'Club package', 'Create', 1, 'Package registration with club code: 1, title: example, capacity: 20, gender: ALL, min age: 5, max age: 10, price: 50, discount: 0, picture: 1557504028-example.png, status: Enabled.', '2019-05-10 11:00:30'),
(3, 3, 'Members', 'Request join ', 1, 'New club member.', '2019-05-10 11:00:38'),
(4, 2, 'Members', 'Accept/Reject', 1, 'Accept/Reject member of club.', '2019-05-10 11:00:51'),
(5, 2, 'Stock', 'Create', 1, 'Stock registration with name: ejemplo, slug: ejemplo, price: 50.00, quantity: 8, state: active.', '2019-05-10 11:01:18'),
(6, 2, 'Sale', 'Create', 1, 'Sale registration with club code: 1, member code: 1, total: 50, payment method: cash.', '2019-05-10 11:01:32'),
(7, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-05-10 13:17:52'),
(8, 2, 'Stock', 'Create', 2, 'Stock registration with name: example stock, slug: example-stock, price: 50.00, quantity: 5, state: active.', '2019-05-19 14:50:18'),
(9, 2, 'Stock', 'Update', 2, 'Stock update with name: example stock, slug: example-stock, price: 50.00, quantity: 5, state: active.', '2019-05-19 14:51:34'),
(10, 2, 'Stock', 'Update', 2, 'Stock update with name: Example Stock, slug: example-stock, price: 50.00, quantity: 5, state: active.', '2019-05-19 14:52:21'),
(11, 2, 'Users', 'Upgrade', 2, 'User update with code 2 pfor the following data with their respective values: name: johan castro, slug: johan-castro created the day 2019-04-24 14:30:13.', '2019-05-19 15:22:04'),
(12, 2, 'Members', 'Accept/Reject', 4, 'Accept/Reject member of club.', '2019-05-19 16:57:15'),
(13, 2, 'Suscription', 'Update', 4, 'Sale update with state: \"paid\".', '2019-05-25 07:29:08'),
(14, 2, 'Suscription', 'Update', 5, 'Sale update with state: \"paid\".', '2019-05-25 07:29:17'),
(15, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-05-25 11:26:57'),
(16, 2, 'Members', 'Locked/Unlocked', 6, 'Locked/Unlocked member of club.', '2019-05-25 12:39:38'),
(17, 2, 'Suscription', 'Update', 4, 'Sale update with state: \"paid\".', '2019-05-25 12:46:17'),
(18, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-05-25 12:46:29'),
(19, 2, 'Members', 'Locked/Unlocked', 6, 'Locked/Unlocked member of club.', '2019-05-25 12:47:24'),
(20, 2, 'Members', 'Locked/Unlocked', 6, 'Locked/Unlocked member of club.', '2019-05-25 12:47:32'),
(21, 2, 'Suscription', 'Update', 4, 'Sale update with state: \"paid\".', '2019-05-25 12:47:44'),
(22, 2, 'Suscription', 'Update', 4, 'Sale update with state: \"paid\".', '2019-05-25 12:48:16'),
(23, 2, 'Members', 'Accept/Reject', 6, 'Accept/Reject member of club.', '2019-05-25 12:50:14'),
(24, 2, 'Members', 'Accept/Reject', 6, 'Accept/Reject member of club.', '2019-05-25 12:50:28'),
(25, 2, 'Suscription', 'Update', 4, 'Sale update with state: \"paid\".', '2019-05-25 12:50:32'),
(26, 6, 'Members', 'Request join ', 9, 'New club member.', '2019-05-25 12:54:34'),
(27, 2, 'Suscription', 'Update', 5, 'Sale update with state: \"canceled\".', '2019-05-25 12:55:56'),
(28, 2, 'Members', 'Accept/Reject', 9, 'Accept/Reject member of club.', '2019-05-26 07:11:16'),
(29, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-05-26 07:12:50'),
(30, 2, 'Suscription', 'Update', 2, 'Sale update with state: \"paid\".', '2019-05-26 07:16:00'),
(31, 2, 'Members', 'Locked/Unlocked', 9, 'Locked/Unlocked member of club.', '2019-05-26 07:17:25'),
(32, 2, 'Members', 'Locked/Unlocked', 9, 'Locked/Unlocked member of club.', '2019-05-26 07:17:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `championships`
--

CREATE TABLE `championships` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `inscription_code` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubs`
--

CREATE TABLE `clubs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `established` datetime NOT NULL,
  `address_line1` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `address_line2` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `lat` float DEFAULT NULL,
  `lon` float DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `uniqe_id` int(45) NOT NULL,
  `approved` int(1) DEFAULT '1',
  `addedby` int(11) DEFAULT NULL,
  `currency` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `gmt_time` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `administration_fee` float(15,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clubs`
--

INSERT INTO `clubs` (`id`, `user_id`, `title`, `slug`, `established`, `address_line1`, `address_line2`, `country_id`, `city`, `lat`, `lon`, `logo`, `phone`, `email`, `uniqe_id`, `approved`, `addedby`, `currency`, `gmt_time`, `administration_fee`, `created_at`, `updated_at`) VALUES
(1, 2, 'club example', 'club-example', '2019-05-03 00:00:00', '', '', 47, 'Bucaramanga', 7.13867, -73.1232, '1556926802-club-example.png', '3222183955', 'johanca965@hotmail.com', 10215201, 2, 1, 'COP', 'America/Bogota', 50.00, '2019-05-03 18:40:10', '2019-05-03 18:41:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_notifications`
--

CREATE TABLE `club_notifications` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `importance` varchar(250) NOT NULL,
  `section` varchar(150) NOT NULL COMMENT 'tabla a la cual pertenece la notificación',
  `section_id` int(11) NOT NULL COMMENT 'id de la tabla a la que pertenece la notificación',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club_notifications`
--

INSERT INTO `club_notifications` (`id`, `club_id`, `importance`, `section`, `section_id`, `created_at`, `updated_at`) VALUES
(4, 1, '2', 'suscription', 3, '2019-05-19 15:24:34', '2019-05-19 15:24:34'),
(10, 1, '2', 'suscription', 8, '2019-05-25 12:54:34', '2019-05-25 12:54:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_packages`
--

CREATE TABLE `club_packages` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(250) NOT NULL,
  `capacity` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `min_age` int(11) NOT NULL,
  `max_age` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `picture` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club_packages`
--

INSERT INTO `club_packages` (`id`, `club_id`, `title`, `slug`, `capacity`, `gender`, `min_age`, `max_age`, `price`, `discount`, `picture`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'example', 'example', 20, 'ALL', 5, 10, 50.00, 0, '1557504028-example.png', 'Enabled', '2019-05-10 11:00:30', '2019-05-10 11:00:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_schedule`
--

CREATE TABLE `club_schedule` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `trainner_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `class_timing` varchar(100) NOT NULL,
  `days` varchar(250) NOT NULL,
  `extra_information` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club_schedule`
--

INSERT INTO `club_schedule` (`id`, `club_id`, `package_id`, `activity`, `trainner_id`, `start_time`, `end_time`, `class_timing`, `days`, `extra_information`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Muai Thai', 3, '1:45 PM', '1:45 PM', 'Single Class', 'Saturday', '', '2019-05-10 13:38:54', '2019-05-10 13:38:54'),
(3, 1, 1, 'Muai Thai', 3, '1:45 PM', '2:00 PM', 'Parallel Classes', 'Sunday,Monday', '', '2019-05-10 13:49:08', '2019-05-10 13:49:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_trainners`
--

CREATE TABLE `club_trainners` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `salary` float(15,2) NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club_trainners`
--

INSERT INTO `club_trainners` (`id`, `club_id`, `user_id`, `activity`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 6, 'Muai Thai', 560.00, 'Accept', '2019-05-10 13:19:14', '2019-05-10 13:19:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competitors`
--

CREATE TABLE `competitors` (
  `id` int(11) NOT NULL,
  `championship_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `flatFlag` varchar(45) DEFAULT NULL COMMENT 'image link to country flag',
  `shinyFlag` varchar(45) DEFAULT NULL COMMENT 'shiny image link to country flag',
  `iso` char(2) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `gmt_time` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `nicename`, `flatFlag`, `shinyFlag`, `iso`, `iso3`, `numcode`, `phonecode`, `currency`, `gmt_time`) VALUES
(1, 'AFGHANISTAN', 'Afghanistan', 'https://www.countryflags.io/af/flat/64.png', 'https://www.countryflags.io/af/shiny/64.png', 'AF', 'AFG', 4, 93, '', 'Asia/Kabul'),
(2, 'ALBANIA', 'Albania', 'https://www.countryflags.io/al/flat/64.png', 'https://www.countryflags.io/al/shiny/64.png', 'AL', 'ALB', 8, 355, '', 'Europe/Tirane'),
(3, 'ALGERIA', 'Algeria', 'https://www.countryflags.io/dz/flat/64.png', 'https://www.countryflags.io/dz/shiny/64.png', 'DZ', 'DZA', 12, 213, '', 'Africa/Algiers'),
(4, 'AMERICAN SAMOA', 'American Samoa', 'https://www.countryflags.io/as/flat/64.png', 'https://www.countryflags.io/as/shiny/64.png', 'AS', 'ASM', 16, 1684, '', 'Pacific/Pago_Pago'),
(5, 'ANDORRA', 'Andorra', 'https://www.countryflags.io/ad/flat/64.png', 'https://www.countryflags.io/ad/shiny/64.png', 'AD', 'AND', 20, 376, '', 'Europe/Andorra'),
(6, 'ANGOLA', 'Angola', 'https://www.countryflags.io/ao/flat/64.png', 'https://www.countryflags.io/ao/shiny/64.png', 'AO', 'AGO', 24, 244, '', ''),
(7, 'ANGUILLA', 'Anguilla', 'https://www.countryflags.io/ai/flat/64.png', 'https://www.countryflags.io/ai/shiny/64.png', 'AI', 'AIA', 660, 1264, '', ''),
(8, 'ANTARCTICA', 'Antarctica', 'https://www.countryflags.io/aq/flat/64.png', 'https://www.countryflags.io/aq/shiny/64.png', 'AQ', 'ATA', NULL, 0, '', ''),
(9, 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'https://www.countryflags.io/ag/flat/64.png', 'https://www.countryflags.io/ag/shiny/64.png', 'AG', 'ATG', 28, 1268, '', ''),
(10, 'ARGENTINA', 'Argentina', 'https://www.countryflags.io/ar/flat/64.png', 'https://www.countryflags.io/ar/shiny/64.png', 'AR', 'ARG', 32, 54, '', ''),
(11, 'ARMENIA', 'Armenia', 'https://www.countryflags.io/am/flat/64.png', 'https://www.countryflags.io/am/shiny/64.png', 'AM', 'ARM', 51, 374, '', ''),
(12, 'ARUBA', 'Aruba', 'https://www.countryflags.io/aw/flat/64.png', 'https://www.countryflags.io/aw/shiny/64.png', 'AW', 'ABW', 533, 297, '', ''),
(13, 'AUSTRALIA', 'Australia', 'https://www.countryflags.io/au/flat/64.png', 'https://www.countryflags.io/au/shiny/64.png', 'AU', 'AUS', 36, 61, '', ''),
(14, 'AUSTRIA', 'Austria', 'https://www.countryflags.io/at/flat/64.png', 'https://www.countryflags.io/at/shiny/64.png', 'AT', 'AUT', 40, 43, '', ''),
(15, 'AZERBAIJAN', 'Azerbaijan', 'https://www.countryflags.io/az/flat/64.png', 'https://www.countryflags.io/az/shiny/64.png', 'AZ', 'AZE', 31, 994, '', ''),
(16, 'BAHAMAS', 'Bahamas', 'https://www.countryflags.io/bs/flat/64.png', 'https://www.countryflags.io/bs/shiny/64.png', 'BS', 'BHS', 44, 1242, '', ''),
(17, 'BAHRAIN', 'Bahrain', 'https://www.countryflags.io/bh/flat/64.png', 'https://www.countryflags.io/bh/shiny/64.png', 'BH', 'BHR', 48, 973, '', 'Asia/Bahrain'),
(18, 'BANGLADESH', 'Bangladesh', 'https://www.countryflags.io/bd/flat/64.png', 'https://www.countryflags.io/bd/shiny/64.png', 'BD', 'BGD', 50, 880, '', ''),
(19, 'BARBADOS', 'Barbados', 'https://www.countryflags.io/bb/flat/64.png', 'https://www.countryflags.io/bb/shiny/64.png', 'BB', 'BRB', 52, 1246, '', ''),
(20, 'BELARUS', 'Belarus', 'https://www.countryflags.io/by/flat/64.png', 'https://www.countryflags.io/by/shiny/64.png', 'BY', 'BLR', 112, 375, '', ''),
(21, 'BELGIUM', 'Belgium', 'https://www.countryflags.io/be/flat/64.png', 'https://www.countryflags.io/be/shiny/64.png', 'BE', 'BEL', 56, 32, '', ''),
(22, 'BELIZE', 'Belize', 'https://www.countryflags.io/bz/flat/64.png', 'https://www.countryflags.io/bz/shiny/64.png', 'BZ', 'BLZ', 84, 501, '', ''),
(23, 'BENIN', 'Benin', 'https://www.countryflags.io/bj/flat/64.png', 'https://www.countryflags.io/bj/shiny/64.png', 'BJ', 'BEN', 204, 229, '', ''),
(24, 'BERMUDA', 'Bermuda', 'https://www.countryflags.io/bm/flat/64.png', 'https://www.countryflags.io/bm/shiny/64.png', 'BM', 'BMU', 60, 1441, '', ''),
(25, 'BHUTAN', 'Bhutan', 'https://www.countryflags.io/bt/flat/64.png', 'https://www.countryflags.io/bt/shiny/64.png', 'BT', 'BTN', 64, 975, '', ''),
(26, 'BOLIVIA', 'Bolivia', 'https://www.countryflags.io/bo/flat/64.png', 'https://www.countryflags.io/bo/shiny/64.png', 'BO', 'BOL', 68, 591, '', ''),
(27, 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'https://www.countryflags.io/ba/flat/64.png', 'https://www.countryflags.io/ba/shiny/64.png', 'BA', 'BIH', 70, 387, '', ''),
(28, 'BOTSWANA', 'Botswana', 'https://www.countryflags.io/bw/flat/64.png', 'https://www.countryflags.io/bw/shiny/64.png', 'BW', 'BWA', 72, 267, '', ''),
(29, 'BOUVET ISLAND', 'Bouvet Island', 'https://www.countryflags.io/bv/flat/64.png', 'https://www.countryflags.io/bv/shiny/64.png', 'BV', 'BVT', NULL, 0, '', ''),
(30, 'BRAZIL', 'Brazil', 'https://www.countryflags.io/br/flat/64.png', 'https://www.countryflags.io/br/shiny/64.png', 'BR', 'BRA', 76, 55, '', ''),
(31, 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', 'https://www.countryflags.io/io/flat/64.png', 'https://www.countryflags.io/io/shiny/64.png', 'IO', 'IOT', NULL, 246, '', ''),
(32, 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'https://www.countryflags.io/bn/flat/64.png', 'https://www.countryflags.io/bn/shiny/64.png', 'BN', 'BRN', 96, 673, '', ''),
(33, 'BULGARIA', 'Bulgaria', 'https://www.countryflags.io/bg/flat/64.png', 'https://www.countryflags.io/bg/shiny/64.png', 'BG', 'BGR', 100, 359, '', ''),
(34, 'BURKINA FASO', 'Burkina Faso', 'https://www.countryflags.io/bf/flat/64.png', 'https://www.countryflags.io/bf/shiny/64.png', 'BF', 'BFA', 854, 226, '', ''),
(35, 'BURUNDI', 'Burundi', 'https://www.countryflags.io/bi/flat/64.png', 'https://www.countryflags.io/bi/shiny/64.png', 'BI', 'BDI', 108, 257, '', ''),
(36, 'CAMBODIA', 'Cambodia', 'https://www.countryflags.io/kh/flat/64.png', 'https://www.countryflags.io/kh/shiny/64.png', 'KH', 'KHM', 116, 855, '', ''),
(37, 'CAMEROON', 'Cameroon', 'https://www.countryflags.io/cm/flat/64.png', 'https://www.countryflags.io/cm/shiny/64.png', 'CM', 'CMR', 120, 237, '', ''),
(38, 'CANADA', 'Canada', 'https://www.countryflags.io/ca/flat/64.png', 'https://www.countryflags.io/ca/shiny/64.png', 'CA', 'CAN', 124, 1, '', ''),
(39, 'CAPE VERDE', 'Cape Verde', 'https://www.countryflags.io/cv/flat/64.png', 'https://www.countryflags.io/cv/shiny/64.png', 'CV', 'CPV', 132, 238, '', ''),
(40, 'CAYMAN ISLANDS', 'Cayman Islands', 'https://www.countryflags.io/ky/flat/64.png', 'https://www.countryflags.io/ky/shiny/64.png', 'KY', 'CYM', 136, 1345, '', ''),
(41, 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'https://www.countryflags.io/cf/flat/64.png', 'https://www.countryflags.io/cf/shiny/64.png', 'CF', 'CAF', 140, 236, '', ''),
(42, 'CHAD', 'Chad', 'https://www.countryflags.io/td/flat/64.png', 'https://www.countryflags.io/td/shiny/64.png', 'TD', 'TCD', 148, 235, '', ''),
(43, 'CHILE', 'Chile', 'https://www.countryflags.io/cl/flat/64.png', 'https://www.countryflags.io/cl/shiny/64.png', 'CL', 'CHL', 152, 56, '', ''),
(44, 'CHINA', 'China', 'https://www.countryflags.io/cn/flat/64.png', 'https://www.countryflags.io/cn/shiny/64.png', 'CN', 'CHN', 156, 86, '', ''),
(45, 'CHRISTMAS ISLAND', 'Christmas Island', 'https://www.countryflags.io/cx/flat/64.png', 'https://www.countryflags.io/cx/shiny/64.png', 'CX', 'CXR', NULL, 61, '', ''),
(46, 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', 'https://www.countryflags.io/cc/flat/64.png', 'https://www.countryflags.io/cc/shiny/64.png', 'CC', 'CCK', NULL, 672, '', ''),
(47, 'COLOMBIA', 'Colombia', 'https://www.countryflags.io/co/flat/64.png', 'https://www.countryflags.io/co/shiny/64.png', 'CO', 'COL', 170, 57, '', 'America/Bogota'),
(48, 'COMOROS', 'Comoros', 'https://www.countryflags.io/km/flat/64.png', 'https://www.countryflags.io/km/shiny/64.png', 'KM', 'COM', 174, 269, '', ''),
(49, 'CONGO', 'Congo', 'https://www.countryflags.io/cg/flat/64.png', 'https://www.countryflags.io/cg/shiny/64.png', 'CG', 'COG', 178, 242, '', ''),
(50, 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'https://www.countryflags.io/cd/flat/64.png', 'https://www.countryflags.io/cd/shiny/64.png', 'CD', 'COD', 180, 242, '', ''),
(51, 'COOK ISLANDS', 'Cook Islands', 'https://www.countryflags.io/ck/flat/64.png', 'https://www.countryflags.io/ck/shiny/64.png', 'CK', 'COK', 184, 682, '', ''),
(52, 'COSTA RICA', 'Costa Rica', 'https://www.countryflags.io/cr/flat/64.png', 'https://www.countryflags.io/cr/shiny/64.png', 'CR', 'CRI', 188, 506, '', ''),
(53, 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'https://www.countryflags.io/ci/flat/64.png', 'https://www.countryflags.io/ci/shiny/64.png', 'CI', 'CIV', 384, 225, '', ''),
(54, 'CROATIA', 'Croatia', 'https://www.countryflags.io/hr/flat/64.png', 'https://www.countryflags.io/hr/shiny/64.png', 'HR', 'HRV', 191, 385, '', ''),
(55, 'CUBA', 'Cuba', 'https://www.countryflags.io/cu/flat/64.png', 'https://www.countryflags.io/cu/shiny/64.png', 'CU', 'CUB', 192, 53, '', ''),
(56, 'CYPRUS', 'Cyprus', 'https://www.countryflags.io/cy/flat/64.png', 'https://www.countryflags.io/cy/shiny/64.png', 'CY', 'CYP', 196, 357, '', ''),
(57, 'CZECH REPUBLIC', 'Czech Republic', 'https://www.countryflags.io/cz/flat/64.png', 'https://www.countryflags.io/cz/shiny/64.png', 'CZ', 'CZE', 203, 420, '', ''),
(58, 'DENMARK', 'Denmark', 'https://www.countryflags.io/dk/flat/64.png', 'https://www.countryflags.io/dk/shiny/64.png', 'DK', 'DNK', 208, 45, '', ''),
(59, 'DJIBOUTI', 'Djibouti', 'https://www.countryflags.io/dj/flat/64.png', 'https://www.countryflags.io/dj/shiny/64.png', 'DJ', 'DJI', 262, 253, '', ''),
(60, 'DOMINICA', 'Dominica', 'https://www.countryflags.io/dm/flat/64.png', 'https://www.countryflags.io/dm/shiny/64.png', 'DM', 'DMA', 212, 1767, '', ''),
(61, 'DOMINICAN REPUBLIC', 'Dominican Republic', 'https://www.countryflags.io/do/flat/64.png', 'https://www.countryflags.io/do/shiny/64.png', 'DO', 'DOM', 214, 1809, '', ''),
(62, 'ECUADOR', 'Ecuador', 'https://www.countryflags.io/ec/flat/64.png', 'https://www.countryflags.io/ec/shiny/64.png', 'EC', 'ECU', 218, 593, '', ''),
(63, 'EGYPT', 'Egypt', 'https://www.countryflags.io/eg/flat/64.png', 'https://www.countryflags.io/eg/shiny/64.png', 'EG', 'EGY', 818, 20, '', ''),
(64, 'EL SALVADOR', 'El Salvador', 'https://www.countryflags.io/sv/flat/64.png', 'https://www.countryflags.io/sv/shiny/64.png', 'SV', 'SLV', 222, 503, '', ''),
(65, 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'https://www.countryflags.io/gq/flat/64.png', 'https://www.countryflags.io/gq/shiny/64.png', 'GQ', 'GNQ', 226, 240, '', ''),
(66, 'ERITREA', 'Eritrea', 'https://www.countryflags.io/er/flat/64.png', 'https://www.countryflags.io/er/shiny/64.png', 'ER', 'ERI', 232, 291, '', ''),
(67, 'ESTONIA', 'Estonia', 'https://www.countryflags.io/ee/flat/64.png', 'https://www.countryflags.io/ee/shiny/64.png', 'EE', 'EST', 233, 372, '', ''),
(68, 'ETHIOPIA', 'Ethiopia', 'https://www.countryflags.io/et/flat/64.png', 'https://www.countryflags.io/et/shiny/64.png', 'ET', 'ETH', 231, 251, '', ''),
(69, 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'https://www.countryflags.io/fk/flat/64.png', 'https://www.countryflags.io/fk/shiny/64.png', 'FK', 'FLK', 238, 500, '', ''),
(70, 'FAROE ISLANDS', 'Faroe Islands', 'https://www.countryflags.io/fo/flat/64.png', 'https://www.countryflags.io/fo/shiny/64.png', 'FO', 'FRO', 234, 298, '', ''),
(71, 'FIJI', 'Fiji', 'https://www.countryflags.io/fj/flat/64.png', 'https://www.countryflags.io/fj/shiny/64.png', 'FJ', 'FJI', 242, 679, '', ''),
(72, 'FINLAND', 'Finland', 'https://www.countryflags.io/fi/flat/64.png', 'https://www.countryflags.io/fi/shiny/64.png', 'FI', 'FIN', 246, 358, '', ''),
(73, 'FRANCE', 'France', 'https://www.countryflags.io/fr/flat/64.png', 'https://www.countryflags.io/fr/shiny/64.png', 'FR', 'FRA', 250, 33, '', ''),
(74, 'FRENCH GUIANA', 'French Guiana', 'https://www.countryflags.io/gf/flat/64.png', 'https://www.countryflags.io/gf/shiny/64.png', 'GF', 'GUF', 254, 594, '', ''),
(75, 'FRENCH POLYNESIA', 'French Polynesia', 'https://www.countryflags.io/pf/flat/64.png', 'https://www.countryflags.io/pf/shiny/64.png', 'PF', 'PYF', 258, 689, '', ''),
(76, 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', 'https://www.countryflags.io/tf/flat/64.png', 'https://www.countryflags.io/tf/shiny/64.png', 'TF', 'ATF', NULL, 0, '', ''),
(77, 'GABON', 'Gabon', 'https://www.countryflags.io/ga/flat/64.png', 'https://www.countryflags.io/ga/shiny/64.png', 'GA', 'GAB', 266, 241, '', ''),
(78, 'GAMBIA', 'Gambia', 'https://www.countryflags.io/gm/flat/64.png', 'https://www.countryflags.io/gm/shiny/64.png', 'GM', 'GMB', 270, 220, '', ''),
(79, 'GEORGIA', 'Georgia', 'https://www.countryflags.io/ge/flat/64.png', 'https://www.countryflags.io/ge/shiny/64.png', 'GE', 'GEO', 268, 995, '', ''),
(80, 'GERMANY', 'Germany', 'https://www.countryflags.io/de/flat/64.png', 'https://www.countryflags.io/de/shiny/64.png', 'DE', 'DEU', 276, 49, '', ''),
(81, 'GHANA', 'Ghana', 'https://www.countryflags.io/gh/flat/64.png', 'https://www.countryflags.io/gh/shiny/64.png', 'GH', 'GHA', 288, 233, '', ''),
(82, 'GIBRALTAR', 'Gibraltar', 'https://www.countryflags.io/gi/flat/64.png', 'https://www.countryflags.io/gi/shiny/64.png', 'GI', 'GIB', 292, 350, '', ''),
(83, 'GREECE', 'Greece', 'https://www.countryflags.io/gr/flat/64.png', 'https://www.countryflags.io/gr/shiny/64.png', 'GR', 'GRC', 300, 30, '', ''),
(84, 'GREENLAND', 'Greenland', 'https://www.countryflags.io/gl/flat/64.png', 'https://www.countryflags.io/gl/shiny/64.png', 'GL', 'GRL', 304, 299, '', ''),
(85, 'GRENADA', 'Grenada', 'https://www.countryflags.io/gd/flat/64.png', 'https://www.countryflags.io/gd/shiny/64.png', 'GD', 'GRD', 308, 1473, '', ''),
(86, 'GUADELOUPE', 'Guadeloupe', 'https://www.countryflags.io/gp/flat/64.png', 'https://www.countryflags.io/gp/shiny/64.png', 'GP', 'GLP', 312, 590, '', ''),
(87, 'GUAM', 'Guam', 'https://www.countryflags.io/gu/flat/64.png', 'https://www.countryflags.io/gu/shiny/64.png', 'GU', 'GUM', 316, 1671, '', ''),
(88, 'GUATEMALA', 'Guatemala', 'https://www.countryflags.io/gt/flat/64.png', 'https://www.countryflags.io/gt/shiny/64.png', 'GT', 'GTM', 320, 502, '', ''),
(89, 'GUINEA', 'Guinea', 'https://www.countryflags.io/gn/flat/64.png', 'https://www.countryflags.io/gn/shiny/64.png', 'GN', 'GIN', 324, 224, '', ''),
(90, 'GUINEA-BISSAU', 'Guinea-Bissau', 'https://www.countryflags.io/gw/flat/64.png', 'https://www.countryflags.io/gw/shiny/64.png', 'GW', 'GNB', 624, 245, '', ''),
(91, 'GUYANA', 'Guyana', 'https://www.countryflags.io/gy/flat/64.png', 'https://www.countryflags.io/gy/shiny/64.png', 'GY', 'GUY', 328, 592, '', ''),
(92, 'HAITI', 'Haiti', 'https://www.countryflags.io/ht/flat/64.png', 'https://www.countryflags.io/ht/shiny/64.png', 'HT', 'HTI', 332, 509, '', ''),
(93, 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', 'https://www.countryflags.io/hm/flat/64.png', 'https://www.countryflags.io/hm/shiny/64.png', 'HM', 'HMD', NULL, 0, '', ''),
(94, 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'https://www.countryflags.io/va/flat/64.png', 'https://www.countryflags.io/va/shiny/64.png', 'VA', 'VAT', 336, 39, '', ''),
(95, 'HONDURAS', 'Honduras', 'https://www.countryflags.io/hn/flat/64.png', 'https://www.countryflags.io/hn/shiny/64.png', 'HN', 'HND', 340, 504, '', ''),
(96, 'HONG KONG', 'Hong Kong', 'https://www.countryflags.io/hk/flat/64.png', 'https://www.countryflags.io/hk/shiny/64.png', 'HK', 'HKG', 344, 852, '', ''),
(97, 'HUNGARY', 'Hungary', 'https://www.countryflags.io/hu/flat/64.png', 'https://www.countryflags.io/hu/shiny/64.png', 'HU', 'HUN', 348, 36, '', ''),
(98, 'ICELAND', 'Iceland', 'https://www.countryflags.io/is/flat/64.png', 'https://www.countryflags.io/is/shiny/64.png', 'IS', 'ISL', 352, 354, '', ''),
(99, 'INDIA', 'India', 'https://www.countryflags.io/in/flat/64.png', 'https://www.countryflags.io/in/shiny/64.png', 'IN', 'IND', 356, 91, '', ''),
(100, 'INDONESIA', 'Indonesia', 'https://www.countryflags.io/id/flat/64.png', 'https://www.countryflags.io/id/shiny/64.png', 'ID', 'IDN', 360, 62, '', ''),
(101, 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'https://www.countryflags.io/ir/flat/64.png', 'https://www.countryflags.io/ir/shiny/64.png', 'IR', 'IRN', 364, 98, '', ''),
(102, 'IRAQ', 'Iraq', 'https://www.countryflags.io/iq/flat/64.png', 'https://www.countryflags.io/iq/shiny/64.png', 'IQ', 'IRQ', 368, 964, '', ''),
(103, 'IRELAND', 'Ireland', 'https://www.countryflags.io/ie/flat/64.png', 'https://www.countryflags.io/ie/shiny/64.png', 'IE', 'IRL', 372, 353, '', ''),
(104, 'ISRAEL', 'Israel', 'https://www.countryflags.io/il/flat/64.png', 'https://www.countryflags.io/il/shiny/64.png', 'IL', 'ISR', 376, 972, '', ''),
(105, 'ITALY', 'Italy', 'https://www.countryflags.io/it/flat/64.png', 'https://www.countryflags.io/it/shiny/64.png', 'IT', 'ITA', 380, 39, '', ''),
(106, 'JAMAICA', 'Jamaica', 'https://www.countryflags.io/jm/flat/64.png', 'https://www.countryflags.io/jm/shiny/64.png', 'JM', 'JAM', 388, 1876, '', ''),
(107, 'JAPAN', 'Japan', 'https://www.countryflags.io/jp/flat/64.png', 'https://www.countryflags.io/jp/shiny/64.png', 'JP', 'JPN', 392, 81, '', ''),
(108, 'JORDAN', 'Jordan', 'https://www.countryflags.io/jo/flat/64.png', 'https://www.countryflags.io/jo/shiny/64.png', 'JO', 'JOR', 400, 962, '', ''),
(109, 'KAZAKHSTAN', 'Kazakhstan', 'https://www.countryflags.io/kz/flat/64.png', 'https://www.countryflags.io/kz/shiny/64.png', 'KZ', 'KAZ', 398, 7, '', ''),
(110, 'KENYA', 'Kenya', 'https://www.countryflags.io/ke/flat/64.png', 'https://www.countryflags.io/ke/shiny/64.png', 'KE', 'KEN', 404, 254, '', ''),
(111, 'KIRIBATI', 'Kiribati', 'https://www.countryflags.io/ki/flat/64.png', 'https://www.countryflags.io/ki/shiny/64.png', 'KI', 'KIR', 296, 686, '', ''),
(112, 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'https://www.countryflags.io/kp/flat/64.png', 'https://www.countryflags.io/kp/shiny/64.png', 'KP', 'PRK', 408, 850, '', ''),
(113, 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'https://www.countryflags.io/kr/flat/64.png', 'https://www.countryflags.io/kr/shiny/64.png', 'KR', 'KOR', 410, 82, '', ''),
(114, 'KUWAIT', 'Kuwait', 'https://www.countryflags.io/kw/flat/64.png', 'https://www.countryflags.io/kw/shiny/64.png', 'KW', 'KWT', 414, 965, '', 'Asia/Kuwait'),
(115, 'KYRGYZSTAN', 'Kyrgyzstan', 'https://www.countryflags.io/kg/flat/64.png', 'https://www.countryflags.io/kg/shiny/64.png', 'KG', 'KGZ', 417, 996, '', ''),
(116, 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'https://www.countryflags.io/la/flat/64.png', 'https://www.countryflags.io/la/shiny/64.png', 'LA', 'LAO', 418, 856, '', ''),
(117, 'LATVIA', 'Latvia', 'https://www.countryflags.io/lv/flat/64.png', 'https://www.countryflags.io/lv/shiny/64.png', 'LV', 'LVA', 428, 371, '', ''),
(118, 'LEBANON', 'Lebanon', 'https://www.countryflags.io/lb/flat/64.png', 'https://www.countryflags.io/lb/shiny/64.png', 'LB', 'LBN', 422, 961, '', ''),
(119, 'LESOTHO', 'Lesotho', 'https://www.countryflags.io/ls/flat/64.png', 'https://www.countryflags.io/ls/shiny/64.png', 'LS', 'LSO', 426, 266, '', ''),
(120, 'LIBERIA', 'Liberia', 'https://www.countryflags.io/lr/flat/64.png', 'https://www.countryflags.io/lr/shiny/64.png', 'LR', 'LBR', 430, 231, '', ''),
(121, 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'https://www.countryflags.io/ly/flat/64.png', 'https://www.countryflags.io/ly/shiny/64.png', 'LY', 'LBY', 434, 218, '', ''),
(122, 'LIECHTENSTEIN', 'Liechtenstein', 'https://www.countryflags.io/li/flat/64.png', 'https://www.countryflags.io/li/shiny/64.png', 'LI', 'LIE', 438, 423, '', ''),
(123, 'LITHUANIA', 'Lithuania', 'https://www.countryflags.io/lt/flat/64.png', 'https://www.countryflags.io/lt/shiny/64.png', 'LT', 'LTU', 440, 370, '', ''),
(124, 'LUXEMBOURG', 'Luxembourg', 'https://www.countryflags.io/lu/flat/64.png', 'https://www.countryflags.io/lu/shiny/64.png', 'LU', 'LUX', 442, 352, '', ''),
(125, 'MACAO', 'Macao', 'https://www.countryflags.io/mo/flat/64.png', 'https://www.countryflags.io/mo/shiny/64.png', 'MO', 'MAC', 446, 853, '', ''),
(126, 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'https://www.countryflags.io/mk/flat/64.png', 'https://www.countryflags.io/mk/shiny/64.png', 'MK', 'MKD', 807, 389, '', ''),
(127, 'MADAGASCAR', 'Madagascar', 'https://www.countryflags.io/mg/flat/64.png', 'https://www.countryflags.io/mg/shiny/64.png', 'MG', 'MDG', 450, 261, '', ''),
(128, 'MALAWI', 'Malawi', 'https://www.countryflags.io/mw/flat/64.png', 'https://www.countryflags.io/mw/shiny/64.png', 'MW', 'MWI', 454, 265, '', ''),
(129, 'MALAYSIA', 'Malaysia', 'https://www.countryflags.io/my/flat/64.png', 'https://www.countryflags.io/my/shiny/64.png', 'MY', 'MYS', 458, 60, '', ''),
(130, 'MALDIVES', 'Maldives', 'https://www.countryflags.io/mv/flat/64.png', 'https://www.countryflags.io/mv/shiny/64.png', 'MV', 'MDV', 462, 960, '', ''),
(131, 'MALI', 'Mali', 'https://www.countryflags.io/ml/flat/64.png', 'https://www.countryflags.io/ml/shiny/64.png', 'ML', 'MLI', 466, 223, '', ''),
(132, 'MALTA', 'Malta', 'https://www.countryflags.io/mt/flat/64.png', 'https://www.countryflags.io/mt/shiny/64.png', 'MT', 'MLT', 470, 356, '', ''),
(133, 'MARSHALL ISLANDS', 'Marshall Islands', 'https://www.countryflags.io/mh/flat/64.png', 'https://www.countryflags.io/mh/shiny/64.png', 'MH', 'MHL', 584, 692, '', ''),
(134, 'MARTINIQUE', 'Martinique', 'https://www.countryflags.io/mq/flat/64.png', 'https://www.countryflags.io/mq/shiny/64.png', 'MQ', 'MTQ', 474, 596, '', ''),
(135, 'MAURITANIA', 'Mauritania', 'https://www.countryflags.io/mr/flat/64.png', 'https://www.countryflags.io/mr/shiny/64.png', 'MR', 'MRT', 478, 222, '', ''),
(136, 'MAURITIUS', 'Mauritius', 'https://www.countryflags.io/mu/flat/64.png', 'https://www.countryflags.io/mu/shiny/64.png', 'MU', 'MUS', 480, 230, '', ''),
(137, 'MAYOTTE', 'Mayotte', 'https://www.countryflags.io/yt/flat/64.png', 'https://www.countryflags.io/yt/shiny/64.png', 'YT', 'MYT', NULL, 269, '', ''),
(138, 'MEXICO', 'Mexico', 'https://www.countryflags.io/mx/flat/64.png', 'https://www.countryflags.io/mx/shiny/64.png', 'MX', 'MEX', 484, 52, '', ''),
(139, 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'https://www.countryflags.io/fm/flat/64.png', 'https://www.countryflags.io/fm/shiny/64.png', 'FM', 'FSM', 583, 691, '', ''),
(140, 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'https://www.countryflags.io/md/flat/64.png', 'https://www.countryflags.io/md/shiny/64.png', 'MD', 'MDA', 498, 373, '', ''),
(141, 'MONACO', 'Monaco', 'https://www.countryflags.io/mc/flat/64.png', 'https://www.countryflags.io/mc/shiny/64.png', 'MC', 'MCO', 492, 377, '', ''),
(142, 'MONGOLIA', 'Mongolia', 'https://www.countryflags.io/mn/flat/64.png', 'https://www.countryflags.io/mn/shiny/64.png', 'MN', 'MNG', 496, 976, '', ''),
(143, 'MONTSERRAT', 'Montserrat', 'https://www.countryflags.io/ms/flat/64.png', 'https://www.countryflags.io/ms/shiny/64.png', 'MS', 'MSR', 500, 1664, '', ''),
(144, 'MOROCCO', 'Morocco', 'https://www.countryflags.io/ma/flat/64.png', 'https://www.countryflags.io/ma/shiny/64.png', 'MA', 'MAR', 504, 212, '', ''),
(145, 'MOZAMBIQUE', 'Mozambique', 'https://www.countryflags.io/mz/flat/64.png', 'https://www.countryflags.io/mz/shiny/64.png', 'MZ', 'MOZ', 508, 258, '', ''),
(146, 'MYANMAR', 'Myanmar', 'https://www.countryflags.io/mm/flat/64.png', 'https://www.countryflags.io/mm/shiny/64.png', 'MM', 'MMR', 104, 95, '', ''),
(147, 'NAMIBIA', 'Namibia', 'https://www.countryflags.io/na/flat/64.png', 'https://www.countryflags.io/na/shiny/64.png', 'NA', 'NAM', 516, 264, '', ''),
(148, 'NAURU', 'Nauru', 'https://www.countryflags.io/nr/flat/64.png', 'https://www.countryflags.io/nr/shiny/64.png', 'NR', 'NRU', 520, 674, '', ''),
(149, 'NEPAL', 'Nepal', 'https://www.countryflags.io/np/flat/64.png', 'https://www.countryflags.io/np/shiny/64.png', 'NP', 'NPL', 524, 977, '', ''),
(150, 'NETHERLANDS', 'Netherlands', 'https://www.countryflags.io/nl/flat/64.png', 'https://www.countryflags.io/nl/shiny/64.png', 'NL', 'NLD', 528, 31, '', ''),
(151, 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'https://www.countryflags.io/an/flat/64.png', 'https://www.countryflags.io/an/shiny/64.png', 'AN', 'ANT', 530, 599, '', ''),
(152, 'NEW CALEDONIA', 'New Caledonia', 'https://www.countryflags.io/nc/flat/64.png', 'https://www.countryflags.io/nc/shiny/64.png', 'NC', 'NCL', 540, 687, '', ''),
(153, 'NEW ZEALAND', 'New Zealand', 'https://www.countryflags.io/nz/flat/64.png', 'https://www.countryflags.io/nz/shiny/64.png', 'NZ', 'NZL', 554, 64, '', ''),
(154, 'NICARAGUA', 'Nicaragua', 'https://www.countryflags.io/ni/flat/64.png', 'https://www.countryflags.io/ni/shiny/64.png', 'NI', 'NIC', 558, 505, '', ''),
(155, 'NIGER', 'Niger', 'https://www.countryflags.io/ne/flat/64.png', 'https://www.countryflags.io/ne/shiny/64.png', 'NE', 'NER', 562, 227, '', ''),
(156, 'NIGERIA', 'Nigeria', 'https://www.countryflags.io/ng/flat/64.png', 'https://www.countryflags.io/ng/shiny/64.png', 'NG', 'NGA', 566, 234, '', ''),
(157, 'NIUE', 'Niue', 'https://www.countryflags.io/nu/flat/64.png', 'https://www.countryflags.io/nu/shiny/64.png', 'NU', 'NIU', 570, 683, '', ''),
(158, 'NORFOLK ISLAND', 'Norfolk Island', 'https://www.countryflags.io/nf/flat/64.png', 'https://www.countryflags.io/nf/shiny/64.png', 'NF', 'NFK', 574, 672, '', ''),
(159, 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'https://www.countryflags.io/mp/flat/64.png', 'https://www.countryflags.io/mp/shiny/64.png', 'MP', 'MNP', 580, 1670, '', ''),
(160, 'NORWAY', 'Norway', 'https://www.countryflags.io/no/flat/64.png', 'https://www.countryflags.io/no/shiny/64.png', 'NO', 'NOR', 578, 47, '', ''),
(161, 'OMAN', 'Oman', 'https://www.countryflags.io/om/flat/64.png', 'https://www.countryflags.io/om/shiny/64.png', 'OM', 'OMN', 512, 968, '', 'Asia/Muscat'),
(162, 'PAKISTAN', 'Pakistan', 'https://www.countryflags.io/pk/flat/64.png', 'https://www.countryflags.io/pk/shiny/64.png', 'PK', 'PAK', 586, 92, '', ''),
(163, 'PALAU', 'Palau', 'https://www.countryflags.io/pw/flat/64.png', 'https://www.countryflags.io/pw/shiny/64.png', 'PW', 'PLW', 585, 680, '', ''),
(164, 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', 'https://www.countryflags.io/ps/flat/64.png', 'https://www.countryflags.io/ps/shiny/64.png', 'PS', 'PSE', 275, 970, '', ''),
(165, 'PANAMA', 'Panama', 'https://www.countryflags.io/pa/flat/64.png', 'https://www.countryflags.io/pa/shiny/64.png', 'PA', 'PAN', 591, 507, '', ''),
(166, 'PAPUA NEW GUINEA', 'Papua New Guinea', 'https://www.countryflags.io/pg/flat/64.png', 'https://www.countryflags.io/pg/shiny/64.png', 'PG', 'PNG', 598, 675, '', ''),
(167, 'PARAGUAY', 'Paraguay', 'https://www.countryflags.io/py/flat/64.png', 'https://www.countryflags.io/py/shiny/64.png', 'PY', 'PRY', 600, 595, '', ''),
(168, 'PERU', 'Peru', 'https://www.countryflags.io/pe/flat/64.png', 'https://www.countryflags.io/pe/shiny/64.png', 'PE', 'PER', 604, 51, '', ''),
(169, 'PHILIPPINES', 'Philippines', 'https://www.countryflags.io/ph/flat/64.png', 'https://www.countryflags.io/ph/shiny/64.png', 'PH', 'PHL', 608, 63, '', ''),
(170, 'PITCAIRN', 'Pitcairn', 'https://www.countryflags.io/pn/flat/64.png', 'https://www.countryflags.io/pn/shiny/64.png', 'PN', 'PCN', 612, 0, '', ''),
(171, 'POLAND', 'Poland', 'https://www.countryflags.io/pl/flat/64.png', 'https://www.countryflags.io/pl/shiny/64.png', 'PL', 'POL', 616, 48, '', ''),
(172, 'PORTUGAL', 'Portugal', 'https://www.countryflags.io/pt/flat/64.png', 'https://www.countryflags.io/pt/shiny/64.png', 'PT', 'PRT', 620, 351, '', ''),
(173, 'PUERTO RICO', 'Puerto Rico', 'https://www.countryflags.io/pr/flat/64.png', 'https://www.countryflags.io/pr/shiny/64.png', 'PR', 'PRI', 630, 1787, '', ''),
(174, 'QATAR', 'Qatar', 'https://www.countryflags.io/qa/flat/64.png', 'https://www.countryflags.io/qa/shiny/64.png', 'QA', 'QAT', 634, 974, '', ''),
(175, 'REUNION', 'Reunion', 'https://www.countryflags.io/re/flat/64.png', 'https://www.countryflags.io/re/shiny/64.png', 'RE', 'REU', 638, 262, '', ''),
(176, 'ROMANIA', 'Romania', 'https://www.countryflags.io/ro/flat/64.png', 'https://www.countryflags.io/ro/shiny/64.png', 'RO', 'ROM', 642, 40, '', ''),
(177, 'RUSSIAN FEDERATION', 'Russian Federation', 'https://www.countryflags.io/ru/flat/64.png', 'https://www.countryflags.io/ru/shiny/64.png', 'RU', 'RUS', 643, 70, '', ''),
(178, 'RWANDA', 'Rwanda', 'https://www.countryflags.io/rw/flat/64.png', 'https://www.countryflags.io/rw/shiny/64.png', 'RW', 'RWA', 646, 250, '', ''),
(179, 'SAINT HELENA', 'Saint Helena', 'https://www.countryflags.io/sh/flat/64.png', 'https://www.countryflags.io/sh/shiny/64.png', 'SH', 'SHN', 654, 290, '', ''),
(180, 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'https://www.countryflags.io/kn/flat/64.png', 'https://www.countryflags.io/kn/shiny/64.png', 'KN', 'KNA', 659, 1869, '', ''),
(181, 'SAINT LUCIA', 'Saint Lucia', 'https://www.countryflags.io/lc/flat/64.png', 'https://www.countryflags.io/lc/shiny/64.png', 'LC', 'LCA', 662, 1758, '', ''),
(182, 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'https://www.countryflags.io/pm/flat/64.png', 'https://www.countryflags.io/pm/shiny/64.png', 'PM', 'SPM', 666, 508, '', ''),
(183, 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'https://www.countryflags.io/vc/flat/64.png', 'https://www.countryflags.io/vc/shiny/64.png', 'VC', 'VCT', 670, 1784, '', ''),
(184, 'SAMOA', 'Samoa', 'https://www.countryflags.io/ws/flat/64.png', 'https://www.countryflags.io/ws/shiny/64.png', 'WS', 'WSM', 882, 684, '', ''),
(185, 'SAN MARINO', 'San Marino', 'https://www.countryflags.io/sm/flat/64.png', 'https://www.countryflags.io/sm/shiny/64.png', 'SM', 'SMR', 674, 378, '', ''),
(186, 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'https://www.countryflags.io/st/flat/64.png', 'https://www.countryflags.io/st/shiny/64.png', 'ST', 'STP', 678, 239, '', ''),
(187, 'SAUDI ARABIA', 'Saudi Arabia', 'https://www.countryflags.io/sa/flat/64.png', 'https://www.countryflags.io/sa/shiny/64.png', 'SA', 'SAU', 682, 966, '', 'Asia/Riyadh'),
(188, 'SENEGAL', 'Senegal', 'https://www.countryflags.io/sn/flat/64.png', 'https://www.countryflags.io/sn/shiny/64.png', 'SN', 'SEN', 686, 221, '', ''),
(189, 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', 'https://www.countryflags.io/cs/flat/64.png', 'https://www.countryflags.io/cs/shiny/64.png', 'CS', 'SCG', NULL, 381, '', ''),
(190, 'SEYCHELLES', 'Seychelles', 'https://www.countryflags.io/sc/flat/64.png', 'https://www.countryflags.io/sc/shiny/64.png', 'SC', 'SYC', 690, 248, '', ''),
(191, 'SIERRA LEONE', 'Sierra Leone', 'https://www.countryflags.io/sl/flat/64.png', 'https://www.countryflags.io/sl/shiny/64.png', 'SL', 'SLE', 694, 232, '', ''),
(192, 'SINGAPORE', 'Singapore', 'https://www.countryflags.io/sg/flat/64.png', 'https://www.countryflags.io/sg/shiny/64.png', 'SG', 'SGP', 702, 65, '', ''),
(193, 'SLOVAKIA', 'Slovakia', 'https://www.countryflags.io/sk/flat/64.png', 'https://www.countryflags.io/sk/shiny/64.png', 'SK', 'SVK', 703, 421, '', ''),
(194, 'SLOVENIA', 'Slovenia', 'https://www.countryflags.io/si/flat/64.png', 'https://www.countryflags.io/si/shiny/64.png', 'SI', 'SVN', 705, 386, '', ''),
(195, 'SOLOMON ISLANDS', 'Solomon Islands', 'https://www.countryflags.io/sb/flat/64.png', 'https://www.countryflags.io/sb/shiny/64.png', 'SB', 'SLB', 90, 677, '', ''),
(196, 'SOMALIA', 'Somalia', 'https://www.countryflags.io/so/flat/64.png', 'https://www.countryflags.io/so/shiny/64.png', 'SO', 'SOM', 706, 252, '', ''),
(197, 'SOUTH AFRICA', 'South Africa', 'https://www.countryflags.io/za/flat/64.png', 'https://www.countryflags.io/za/shiny/64.png', 'ZA', 'ZAF', 710, 27, '', ''),
(198, 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', 'https://www.countryflags.io/gs/flat/64.png', 'https://www.countryflags.io/gs/shiny/64.png', 'GS', 'SGS', NULL, 0, '', ''),
(199, 'SPAIN', 'Spain', 'https://www.countryflags.io/es/flat/64.png', 'https://www.countryflags.io/es/shiny/64.png', 'ES', 'ESP', 724, 34, '', ''),
(200, 'SRI LANKA', 'Sri Lanka', 'https://www.countryflags.io/lk/flat/64.png', 'https://www.countryflags.io/lk/shiny/64.png', 'LK', 'LKA', 144, 94, '', ''),
(201, 'SUDAN', 'Sudan', 'https://www.countryflags.io/sd/flat/64.png', 'https://www.countryflags.io/sd/shiny/64.png', 'SD', 'SDN', 736, 249, '', ''),
(202, 'SURINAME', 'Suriname', 'https://www.countryflags.io/sr/flat/64.png', 'https://www.countryflags.io/sr/shiny/64.png', 'SR', 'SUR', 740, 597, '', ''),
(203, 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'https://www.countryflags.io/sj/flat/64.png', 'https://www.countryflags.io/sj/shiny/64.png', 'SJ', 'SJM', 744, 47, '', ''),
(204, 'SWAZILAND', 'Swaziland', 'https://www.countryflags.io/sz/flat/64.png', 'https://www.countryflags.io/sz/shiny/64.png', 'SZ', 'SWZ', 748, 268, '', ''),
(205, 'SWEDEN', 'Sweden', 'https://www.countryflags.io/se/flat/64.png', 'https://www.countryflags.io/se/shiny/64.png', 'SE', 'SWE', 752, 46, '', ''),
(206, 'SWITZERLAND', 'Switzerland', 'https://www.countryflags.io/ch/flat/64.png', 'https://www.countryflags.io/ch/shiny/64.png', 'CH', 'CHE', 756, 41, '', ''),
(207, 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'https://www.countryflags.io/sy/flat/64.png', 'https://www.countryflags.io/sy/shiny/64.png', 'SY', 'SYR', 760, 963, '', ''),
(208, 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'https://www.countryflags.io/tw/flat/64.png', 'https://www.countryflags.io/tw/shiny/64.png', 'TW', 'TWN', 158, 886, '', ''),
(209, 'TAJIKISTAN', 'Tajikistan', 'https://www.countryflags.io/tj/flat/64.png', 'https://www.countryflags.io/tj/shiny/64.png', 'TJ', 'TJK', 762, 992, '', ''),
(210, 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'https://www.countryflags.io/tz/flat/64.png', 'https://www.countryflags.io/tz/shiny/64.png', 'TZ', 'TZA', 834, 255, '', ''),
(211, 'THAILAND', 'Thailand', 'https://www.countryflags.io/th/flat/64.png', 'https://www.countryflags.io/th/shiny/64.png', 'TH', 'THA', 764, 66, '', ''),
(212, 'TIMOR-LESTE', 'Timor-Leste', 'https://www.countryflags.io/tl/flat/64.png', 'https://www.countryflags.io/tl/shiny/64.png', 'TL', 'TLS', NULL, 670, '', ''),
(213, 'TOGO', 'Togo', 'https://www.countryflags.io/tg/flat/64.png', 'https://www.countryflags.io/tg/shiny/64.png', 'TG', 'TGO', 768, 228, '', ''),
(214, 'TOKELAU', 'Tokelau', 'https://www.countryflags.io/tk/flat/64.png', 'https://www.countryflags.io/tk/shiny/64.png', 'TK', 'TKL', 772, 690, '', ''),
(215, 'TONGA', 'Tonga', 'https://www.countryflags.io/to/flat/64.png', 'https://www.countryflags.io/to/shiny/64.png', 'TO', 'TON', 776, 676, '', ''),
(216, 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'https://www.countryflags.io/tt/flat/64.png', 'https://www.countryflags.io/tt/shiny/64.png', 'TT', 'TTO', 780, 1868, '', ''),
(217, 'TUNISIA', 'Tunisia', 'https://www.countryflags.io/tn/flat/64.png', 'https://www.countryflags.io/tn/shiny/64.png', 'TN', 'TUN', 788, 216, '', ''),
(218, 'TURKEY', 'Turkey', 'https://www.countryflags.io/tr/flat/64.png', 'https://www.countryflags.io/tr/shiny/64.png', 'TR', 'TUR', 792, 90, '', ''),
(219, 'TURKMENISTAN', 'Turkmenistan', 'https://www.countryflags.io/tm/flat/64.png', 'https://www.countryflags.io/tm/shiny/64.png', 'TM', 'TKM', 795, 7370, '', ''),
(220, 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'https://www.countryflags.io/tc/flat/64.png', 'https://www.countryflags.io/tc/shiny/64.png', 'TC', 'TCA', 796, 1649, '', ''),
(221, 'TUVALU', 'Tuvalu', 'https://www.countryflags.io/tv/flat/64.png', 'https://www.countryflags.io/tv/shiny/64.png', 'TV', 'TUV', 798, 688, '', ''),
(222, 'UGANDA', 'Uganda', 'https://www.countryflags.io/ug/flat/64.png', 'https://www.countryflags.io/ug/shiny/64.png', 'UG', 'UGA', 800, 256, '', ''),
(223, 'UKRAINE', 'Ukraine', 'https://www.countryflags.io/ua/flat/64.png', 'https://www.countryflags.io/ua/shiny/64.png', 'UA', 'UKR', 804, 380, '', ''),
(224, 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'https://www.countryflags.io/ae/flat/64.png', 'https://www.countryflags.io/ae/shiny/64.png', 'AE', 'ARE', 784, 971, '', 'Asia/Kolkata'),
(225, 'UNITED KINGDOM', 'United Kingdom', 'https://www.countryflags.io/gb/flat/64.png', 'https://www.countryflags.io/gb/shiny/64.png', 'GB', 'GBR', 826, 44, '', ''),
(226, 'UNITED STATES', 'United States', 'https://www.countryflags.io/us/flat/64.png', 'https://www.countryflags.io/us/shiny/64.png', 'US', 'USA', 840, 1, '', ''),
(227, 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', 'https://www.countryflags.io/um/flat/64.png', 'https://www.countryflags.io/um/shiny/64.png', 'UM', 'UMI', NULL, 1, '', ''),
(228, 'URUGUAY', 'Uruguay', 'https://www.countryflags.io/uy/flat/64.png', 'https://www.countryflags.io/uy/shiny/64.png', 'UY', 'URY', 858, 598, '', ''),
(229, 'UZBEKISTAN', 'Uzbekistan', 'https://www.countryflags.io/uz/flat/64.png', 'https://www.countryflags.io/uz/shiny/64.png', 'UZ', 'UZB', 860, 998, '', ''),
(230, 'VANUATU', 'Vanuatu', 'https://www.countryflags.io/vu/flat/64.png', 'https://www.countryflags.io/vu/shiny/64.png', 'VU', 'VUT', 548, 678, '', ''),
(231, 'VENEZUELA', 'Venezuela', 'https://www.countryflags.io/ve/flat/64.png', 'https://www.countryflags.io/ve/shiny/64.png', 'VE', 'VEN', 862, 58, '', ''),
(232, 'VIET NAM', 'Viet Nam', 'https://www.countryflags.io/vn/flat/64.png', 'https://www.countryflags.io/vn/shiny/64.png', 'VN', 'VNM', 704, 84, '', ''),
(233, 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'https://www.countryflags.io/vg/flat/64.png', 'https://www.countryflags.io/vg/shiny/64.png', 'VG', 'VGB', 92, 1284, '', ''),
(234, 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'https://www.countryflags.io/vi/flat/64.png', 'https://www.countryflags.io/vi/shiny/64.png', 'VI', 'VIR', 850, 1340, '', ''),
(235, 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'https://www.countryflags.io/wf/flat/64.png', 'https://www.countryflags.io/wf/shiny/64.png', 'WF', 'WLF', 876, 681, '', ''),
(236, 'WESTERN SAHARA', 'Western Sahara', 'https://www.countryflags.io/eh/flat/64.png', 'https://www.countryflags.io/eh/shiny/64.png', 'EH', 'ESH', 732, 212, '', ''),
(237, 'YEMEN', 'Yemen', 'https://www.countryflags.io/ye/flat/64.png', 'https://www.countryflags.io/ye/shiny/64.png', 'YE', 'YEM', 887, 967, '', ''),
(238, 'ZAMBIA', 'Zambia', 'https://www.countryflags.io/zm/flat/64.png', 'https://www.countryflags.io/zm/shiny/64.png', 'ZM', 'ZMB', 894, 260, '', ''),
(239, 'ZIMBABWE', 'Zimbabwe', 'https://www.countryflags.io/zw/flat/64.png', 'https://www.countryflags.io/zw/shiny/64.png', 'ZW', 'ZWE', 716, 263, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fights`
--

CREATE TABLE `fights` (
  `id` int(11) NOT NULL,
  ` first_competitor_id` int(11) NOT NULL,
  `second_competitor_id` int(11) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  `loser` tinyint(1) DEFAULT NULL,
  `winner_points` int(11) DEFAULT NULL,
  `loser_points` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `followers_club`
--

CREATE TABLE `followers_club` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `following` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `accepted` int(1) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `user_id`, `club_id`, `accepted`, `active`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 2, 2, '2019-05-10 11:00:38', '2019-05-10 11:00:51'),
(6, 2, 1, 2, 2, '2019-05-19 15:24:34', '2019-05-25 12:50:28'),
(8, 10, 1, 1, 1, '2019-05-19 15:30:47', '2019-05-19 15:30:47'),
(9, 6, 1, 2, 2, '2019-05-25 12:54:34', '2019-05-26 07:17:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `member_packages`
--

CREATE TABLE `member_packages` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `member_packages`
--

INSERT INTO `member_packages` (`id`, `member_id`, `package_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-05-10 11:00:38', '2019-05-10 11:00:38'),
(3, 6, 1, '2019-05-19 15:24:34', '2019-05-19 15:24:34'),
(5, 8, 1, '2019-05-19 15:30:48', '2019-05-19 15:30:48'),
(6, 9, 1, '2019-05-25 12:54:34', '2019-05-25 12:54:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `shipping_user_id` int(11) NOT NULL,
  `reception_user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_spanish_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `message` text COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification_sends`
--

CREATE TABLE `notification_sends` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `readed` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_sales`
--

CREATE TABLE `product_sales` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `subtotal` float(15,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `product_sales`
--

INSERT INTO `product_sales` (`id`, `sale_id`, `stock_id`, `cant`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 50.00, '2019-05-10 11:01:32', '2019-05-10 11:01:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publications`
--

CREATE TABLE `publications` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'member', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'club', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'federation', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `total` float(15,2) NOT NULL,
  `payment_method` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `state` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `club_id`, `member_id`, `total`, `payment_method`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50.00, 'cash', 'paid', '2019-05-10 11:01:31', '2019-05-10 11:01:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `price` float(15,2) NOT NULL,
  `cant` int(11) DEFAULT NULL,
  `state` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `photo` text COLLATE utf8_spanish_ci NOT NULL,
  `code` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `club_id`, `name`, `slug`, `price`, `cant`, `state`, `photo`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'ejemplo', 'ejemplo', 50.00, 7, 'active', '', '', '2019-05-10 11:01:18', '2019-05-10 11:01:32'),
(2, 1, 'Example Stock', 'example-stock', 50.00, 5, 'active', '1558295540-example-stock.png', 'codeexample', '2019-05-19 14:50:17', '2019-05-19 14:52:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptions`
--

CREATE TABLE `suscriptions` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `payment_method` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscriptions`
--

INSERT INTO `suscriptions` (`id`, `club_id`, `member_id`, `price`, `payment_method`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 100.00, 'cash', 'paid', '2019-05-10 11:00:38', '2019-05-10 11:00:38'),
(2, 1, 6, 100.00, 'cash', 'paid', '2019-05-19 15:28:34', '2019-05-19 15:28:34'),
(3, 1, 8, 100.00, 'cash', 'approval', '2019-05-19 15:30:48', '2019-05-19 15:30:48'),
(8, 1, 9, 100.00, 'cash', 'approval', '2019-05-25 12:54:34', '2019-05-25 12:54:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `clubschedule_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `photo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `online` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `username`, `password`, `email_verified_at`, `role_id`, `photo`, `online`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'administrator', 'platformtakeone@gmail.com', '$2y$10$hZ4Qauf5axJCciSkaz2gZeU1zTpZdxqiDzQnqWaGMzhO60.q9FsSC', '2019-04-23 00:00:00', 4, 'avatar.png', 1, '2019-04-23 00:00:00', '2019-04-23 00:00:00'),
(2, 'Johan Castro', 'johan-castro', 'johanca965@hotmail.com', '$2y$10$R.Rxf4vODSbNGu7NYntIZ./i5XcOcQgb.R5iOUSb4OYDGOYwMTbi2', '2019-04-24 07:31:56', 2, 'avatar.png', 1, '2019-04-24 14:30:13', '2019-05-19 15:22:04'),
(3, 'johan castro palomares 2', 'johancastro2', 'johanca965@gmail.com', '$2y$10$gN1rZfUnYaxqZa6A3U7ooOLnS9E55zAmYTrf42C0GgIoq.TWDblWC', '0000-00-00 00:00:00', 1, 'avatar.png', 1, '2019-04-24 23:01:46', '2019-04-24 23:01:46'),
(6, 'lizeth russi', 'lizeth-russi', 'lizrussi1995@hotmail.com', '$2y$10$E37AfQiJDktY0RbdRzfuKu1ePpAYSzGbShfC/RQt2TkKE7NI1cc8i', '2019-05-10 20:19:13', 1, 'lizrussi1995-hotmail.com/1557512343-lizrussi1995-hotmail.com.png', 0, '2019-05-10 20:19:13', '2019-05-10 20:19:13'),
(10, 'lizeth russi 233', 'lizeth-russi-233', 'comercial@hyperlinkse.com', '$2y$10$if7/iXNWeKlFKusyWgUsWORUZgMyLmbp7cpq73k3zFrZf3wiy2bMi', '2019-05-19 15:30:45', 1, 'comercial-hyperlinkse.com/1558297840-comercial-hyperlinkse.com.png', 0, '2019-05-19 15:30:45', '2019-05-19 15:30:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_achievements`
--

CREATE TABLE `user_achievements` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `championship_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `rfid` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cpr` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `passport` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `helth_issues` text COLLATE utf8_spanish_ci,
  `gender` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marital` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bloodtype` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `social_link` text COLLATE utf8_spanish_ci,
  `confirm_code` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `country_id`, `city`, `rfid`, `cpr`, `passport`, `helth_issues`, `gender`, `marital`, `bloodtype`, `birthday`, `address`, `mobile`, `social_link`, `confirm_code`, `confirmed`, `created_at`, `updated_at`) VALUES
(1, 1, 47, 'bucaramanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-23 00:00:00', '2019-04-23 00:00:00'),
(2, 2, 47, 'AbriaquÃ­', NULL, 'ABC1234567', NULL, NULL, NULL, NULL, NULL, NULL, 'sin direccion', NULL, NULL, NULL, NULL, '2019-04-24 14:30:13', '2019-04-24 14:30:13'),
(3, 3, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 23:01:47', '2019-04-24 23:01:47'),
(6, 6, 47, 'Leticia', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'sin direccion', 'NULL', 'NULL', 'NULL', 0, '2019-05-10 20:19:13', '2019-05-10 20:19:13'),
(10, 10, 47, 'Plato', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-05-19 15:30:46', '2019-05-19 15:30:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `championships`
--
ALTER TABLE `championships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inscription_code` (`inscription_code`),
  ADD KEY `championships_fk0` (`club_id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clubs_fk0` (`user_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indices de la tabla `club_notifications`
--
ALTER TABLE `club_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `club_packages`
--
ALTER TABLE `club_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indices de la tabla `club_schedule`
--
ALTER TABLE `club_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `trainner_id` (`trainner_id`);

--
-- Indices de la tabla `club_trainners`
--
ALTER TABLE `club_trainners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `competitors`
--
ALTER TABLE `competitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `competitors_fk0` (`championship_id`),
  ADD KEY `competitors_fk1` (`member_id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fights`
--
ALTER TABLE `fights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fights_fk0` (` first_competitor_id`),
  ADD KEY `fights_fk1` (`second_competitor_id`);

--
-- Indices de la tabla `followers_club`
--
ALTER TABLE `followers_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_club_fk0` (`user_id`),
  ADD KEY `followers_club_fk1` (`club_id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_fk0` (`user_id`),
  ADD KEY `members_fk1` (`club_id`);

--
-- Indices de la tabla `member_packages`
--
ALTER TABLE `member_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_fk0` (`shipping_user_id`),
  ADD KEY `messages_fk1` (`reception_user_id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notification_sends`
--
ALTER TABLE `notification_sends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Indices de la tabla `product_sales`
--
ALTER TABLE `product_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sales_fk0` (`sale_id`),
  ADD KEY `product_sales_fk1` (`stock_id`);

--
-- Indices de la tabla `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publications_fk0` (`club_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_fk0` (`club_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indices de la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_fk0` (`club_id`);

--
-- Indices de la tabla `suscriptions`
--
ALTER TABLE `suscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suscriptions_fk0` (`member_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indices de la tabla `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_fk0` (`member_id`),
  ADD KEY `clubschedule_id` (`clubschedule_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_fk0` (`role_id`);

--
-- Indices de la tabla `user_achievements`
--
ALTER TABLE `user_achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_achievements_fk0` (`member_id`),
  ADD KEY `user_achievements_fk1` (`championship_id`);

--
-- Indices de la tabla `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_data_fk0` (`user_id`),
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `championships`
--
ALTER TABLE `championships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `club_notifications`
--
ALTER TABLE `club_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `club_packages`
--
ALTER TABLE `club_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `club_schedule`
--
ALTER TABLE `club_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `club_trainners`
--
ALTER TABLE `club_trainners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `competitors`
--
ALTER TABLE `competitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de la tabla `fights`
--
ALTER TABLE `fights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `followers_club`
--
ALTER TABLE `followers_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `member_packages`
--
ALTER TABLE `member_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notification_sends`
--
ALTER TABLE `notification_sends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `suscriptions`
--
ALTER TABLE `suscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `user_achievements`
--
ALTER TABLE `user_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `championships`
--
ALTER TABLE `championships`
  ADD CONSTRAINT `championships_fk0` FOREIGN KEY (`club_id`) REFERENCES `clubs` (`id`);

--
-- Filtros para la tabla `competitors`
--
ALTER TABLE `competitors`
  ADD CONSTRAINT `competitors_fk0` FOREIGN KEY (`championship_id`) REFERENCES `championships` (`id`),
  ADD CONSTRAINT `competitors_fk1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Filtros para la tabla `fights`
--
ALTER TABLE `fights`
  ADD CONSTRAINT `fights_fk0` FOREIGN KEY (` first_competitor_id`) REFERENCES `competitors` (`id`),
  ADD CONSTRAINT `fights_fk1` FOREIGN KEY (`second_competitor_id`) REFERENCES `competitors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
