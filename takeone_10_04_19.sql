-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2019 a las 17:26:08
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
(1, 2, 'Club', 'Create', 1, 'Club registration with title: Club colombiano, slug: club-colombiano, established: 2019-04-23 00:00:00, address_line1: calle 11 # 27-51, address_line2: , country_id: 47, city: Bucaramanga, lat: 0, lon: 0, logo: 1556071643-club-colombiano.png, phone: 3222183956, email: Clubcolombiano@example.com, uniqe_id: 123456789.', '2019-04-23 21:08:00'),
(2, 2, 'Club package', 'Create', 1, 'Package registration with club code: 1, title: example, capacity: 10, gender: ALL, min age: 5, max age: 20, price: 50, discount: 10, picture: 1556109562-example.png, status: Enabled.', '2019-04-24 07:39:28'),
(3, 4, 'Members', 'Request join ', 1, 'New club member.', '2019-04-24 07:40:05'),
(4, 2, 'Members', 'Accept/Reject', 1, 'Accept/Reject member of club.', '2019-04-24 07:42:33'),
(5, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-04-24 07:43:07'),
(6, 6, 'Members', 'Request join ', 2, 'New club member.', '2019-04-24 23:06:50'),
(7, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-04-24 23:06:56'),
(8, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-04-24 23:07:03'),
(9, 2, 'Members', 'Accept/Reject', 2, 'Accept/Reject member of club.', '2019-04-24 23:18:44'),
(10, 5, 'Club', 'Create', 2, 'Club registration with title: TAKEONE, slug: takeone, established: 2020-01-30 00:00:00, address_line1: Road 1121, Block 411, House 551, Al-Musalla, address_line2: , country_id: 17, city: Jidhafs, lat: 0, lon: 0, logo: 1556206522-takeone.png, phone: 33165444, email: ghassan.yousif.83@gmail.com, uniqe_id: 0.', '2019-04-25 18:35:32'),
(11, 5, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-04-25 18:36:35'),
(12, 5, 'Users', 'Upgrade', 5, 'User update with code 5 pfor the following data with their respective values: name: Ghassan Yusuf, slug: ghassan-yusuf created the day 2019-04-24 14:10:57.', '2019-04-30 17:32:49'),
(13, 5, 'Users', 'Upgrade', 5, 'User update with code 5 pfor the following data with their respective values: name: Ghassan Yusuf, slug: ghassan-yusuf created the day 2019-04-24 14:10:57.', '2019-05-01 18:22:50'),
(14, 2, 'Club', 'Actualizaci+on', 1, 'Club update with title: Club Colombiano, slug: club-colombiano, established: 2019-04-23 00:00:00, address_line1: Calle 11 # 27-51, address_line2: , country_id: 47, city: Bucaramanga, lat: 0, lon: 0, logo: 1556071643-club-colombiano.png, phone: 3222183956.', '2019-05-02 06:34:16'),
(15, 5, 'Club package', 'Create', 2, 'Package registration with club code: 2, title: Horse Riding, capacity: 50, gender: ALL, min age: 5, max age: 12, price: 15, discount: 1, picture: 1556810659-horse-riding.png, status: Enabled.', '2019-05-02 18:24:40'),
(16, 5, 'Club', 'Actualizaci+on', 2, 'Club update with title: TAKEONE, slug: takeone, established: 2020-01-30 00:00:00, address_line1: Road 1121, Block 411, House 551, Al-Musalla, address_line2: , country_id: 17, city: Jidhafs, lat: 0, lon: 0, logo: 1556206522-takeone.png, phone: 33165444.', '2019-05-02 18:34:26'),
(17, 7, 'Club', 'Create', 3, 'Club registration with title: Warrior TaeKwonDo Academy, slug: warrior-taekwondo-academy, established: 2017-03-02 00:00:00, address_line1: Flat 11, Building 232, Road 111, Block 701, address_line2: , country_id: 17, city: Tubli, lat: 0, lon: 0, logo: 1556815455-warrior-taekwondo-academy.png, phone: +973 33233533, email: braa.aji1388@gmail.com, uniqe_id: fsdkfjslkdf.', '2019-05-02 19:46:53'),
(18, 7, 'Club package', 'Create', 3, 'Package registration with club code: 3, title: Kids TaeKwonDo, capacity: 50, gender: ALL, min age: 5, max age: 14, price: 25, discount: 5, picture: 1556816072-kids-taekwondo.png, status: Enabled.', '2019-05-02 19:54:50'),
(19, 7, 'Club package', 'Create', 4, 'Package registration with club code: 3, title: Kids Kickboxing, capacity: 25, gender: ALL, min age: 5, max age: 14, price: 30, discount: 1, picture: 1556816794-kids-kickboxing.png, status: Enabled.', '2019-05-02 20:06:40'),
(20, 7, 'Club package', 'Create', 5, 'Package registration with club code: 3, title: Adults TaeKwonDo, capacity: 30, gender: ALL, min age: 14, max age: 100, price: 25, discount: 5, picture: 1556818239-adults-taekwondo.png, status: Enabled.', '2019-05-02 20:30:43'),
(21, 7, 'Members', 'Accept/Reject', 3, 'Accept/Reject member of club.', '2019-05-02 20:37:12'),
(22, 7, 'Suscription', 'Update', 3, 'Sale update with state: \"paid\".', '2019-05-02 20:38:52'),
(23, 7, 'Stock', 'Create', 1, 'Stock registration with name: Water Bottel, slug: water-bottel, price: 0.10, quantity: 30, state: active.', '2019-05-02 20:49:23'),
(24, 7, 'Sale', 'Create', 1, 'Sale registration with club code: 3, member code: 3, total: 0.1, payment method: cash.', '2019-05-02 20:52:33'),
(25, 2, 'Users', 'Upgrade', 2, 'User update with code 2 pfor the following data with their respective values: name: Johan Castro , slug: johan-castro created the day 2019-04-24 02:02:46.', '2019-05-02 17:09:18'),
(26, 5, 'Club package', 'Create', 6, 'Package registration with club code: 2, title: Kids Summer, capacity: 50, gender: ALL, min age: 5, max age: 14, price: 25, discount: 1, picture: 1556897001-kids-summer.png, status: Enabled.', '2019-05-03 18:23:38'),
(27, 7, 'Users', 'Upgrade', 7, 'User update with code 7 pfor the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-05-03 19:46:09'),
(28, 7, 'Users', 'Upgrade', 7, 'User update with code 7 pfor the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-05-03 19:50:46'),
(29, 2, 'Club', 'Actualizaci+on', 1, 'Club update with title: Club Colombiano, slug: club-colombiano, established: 2019-04-23 00:00:00, address_line1: Calle 11 # 27-51, address_line2: , country_id: 47, city: Bucaramanga, lat: 7.1376, lon: -73.1266, logo: 1556071643-club-colombiano.png, phone: 3222183956.', '2019-05-03 14:02:05'),
(30, 5, 'Club', 'Actualizaci+on', 2, 'Club update with title: TAKEONE, slug: takeone, established: 2020-01-30 00:00:00, address_line1: Road 1121, Block 411, House 551, Al-Musalla, address_line2: , country_id: 17, city: Jidhafs, lat: 26.2125, lon: 50.5418, logo: 1556206522-takeone.png, phone: 33165444.', '2019-05-04 01:14:24'),
(31, 2, 'Club package', 'Create', 7, 'Package registration with club code: 1, title: example, capacity: 20, gender: ALL, min age: 5, max age: 6, price: 50, discount: 0, picture: 1556923259-example.png, status: Enabled.', '2019-05-03 17:41:01'),
(32, 7, 'Members', 'Accept/Reject', 7, 'Accept/Reject member of club.', '2019-05-04 12:28:47'),
(33, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-04 13:32:58'),
(34, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-04 13:37:36'),
(35, 7, 'Users', 'Upgrade', 7, 'User update with code 7 pfor the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-05-04 18:19:21'),
(36, 5, 'Members', 'Accept/Reject', 10, 'Accept/Reject member of club.', '2019-05-05 15:57:23'),
(37, 16, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-05-05 15:58:12'),
(38, 5, 'Suscription', 'Update', 7, 'Sale update with state: \"paid\".', '2019-05-05 15:58:39'),
(39, 5, 'Stock', 'Create', 2, 'Stock registration with name: DaeDo Dobok XL, slug: daedo-dobok-xl, price: 25.00, quantity: 10, state: active.', '2019-05-05 16:03:38'),
(40, 5, 'Sale', 'Create', 2, 'Sale registration with club code: 2, member code: 10, total: 50, payment method: cash.', '2019-05-05 16:05:05'),
(41, 7, 'Members', 'Accept/Reject', 11, 'Accept/Reject member of club.', '2019-05-05 17:43:11'),
(42, 7, 'Members', 'Accept/Reject', 12, 'Accept/Reject member of club.', '2019-05-05 19:16:32'),
(43, 7, 'Suscription', 'Update', 9, 'Sale update with state: \"paid\".', '2019-05-05 19:17:01'),
(44, 7, 'Members', 'Accept/Reject', 13, 'Accept/Reject member of club.', '2019-05-05 20:15:46'),
(45, 7, 'Members', 'Accept/Reject', 8, 'Accept/Reject member of club.', '2019-05-05 20:17:20'),
(46, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-05 20:17:24'),
(47, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-05 20:18:14'),
(48, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-05 20:21:12'),
(49, 15, 'Users', 'Upgrade', 15, 'User update with code 15 pfor the following data with their respective values: name: Ebrahim Ehab Ebrahim, slug: ebrahim-ehab-ebrahim created the day 2019-05-04 10:30:43.', '2019-05-05 20:23:27'),
(50, 7, 'Members', 'Locked/Unlocked', 7, 'Locked/Unlocked member of club.', '2019-05-05 20:24:23'),
(51, 7, 'Members', 'Locked/Unlocked', 7, 'Locked/Unlocked member of club.', '2019-05-05 20:24:32'),
(52, 7, 'Members', 'Accept/Reject', 7, 'Accept/Reject member of club.', '2019-05-05 20:24:36'),
(53, 7, 'Members', 'Accept/Reject', 7, 'Accept/Reject member of club.', '2019-05-05 20:24:47'),
(54, 7, 'Members', 'Accept/Reject', 7, 'Accept/Reject member of club.', '2019-05-05 20:25:04'),
(55, 7, 'Suscription', 'Update', 4, 'Sale update with state: \"canceled\".', '2019-05-05 20:27:19'),
(56, 7, 'Suscription', 'Update', 6, 'Sale update with state: \"canceled\".', '2019-05-05 20:27:27'),
(57, 7, 'Suscription', 'Update', 5, 'Sale update with state: \"canceled\".', '2019-05-05 20:27:33'),
(58, 5, 'Club', 'Actualizaci+on', 2, 'Club update with title: TAKEONE, slug: takeone, established: 2020-01-30 00:00:00, address_line1: Road 1121, Block 411, House 551, Al-Musalla, address_line2: , country_id: 17, city: Jidhafs, lat: 26.115, lon: 50.5003, logo: 1556206522-takeone.png, phone: 33165444.', '2019-05-06 11:44:05'),
(59, 7, 'Members', 'Accept/Reject', 14, 'Accept/Reject member of club.', '2019-05-08 02:21:49'),
(60, 2, 'Suscription', 'Update', 1, 'Sale update with state: \"paid\".', '2019-05-10 11:15:42'),
(61, 2, 'Suscription', 'Update', 2, 'Sale update with state: \"paid\".', '2019-05-10 11:15:47'),
(62, 2, 'Stock', 'Create', 3, 'Stock registration with name: ejemplo, slug: ejemplo, price: 500.00, quantity: 5, state: active.', '2019-05-10 11:16:27'),
(63, 2, 'Sale', 'Create', 3, 'Sale registration with club code: 1, member code: 1, total: 1000, payment method: cash.', '2019-05-10 11:16:45'),
(64, 7, 'Members', 'Accept/Reject', 7, 'Accept/Reject member of club.', '2019-05-11 01:53:03'),
(65, 7, 'Members', 'Accept/Reject', 8, 'Accept/Reject member of club.', '2019-05-11 02:23:43'),
(66, 7, 'Members', 'Locked/Unlocked', 8, 'Locked/Unlocked member of club.', '2019-05-11 02:24:17'),
(67, 7, 'Members', 'Accept/Reject', 8, 'Accept/Reject member of club.', '2019-05-11 02:24:27'),
(68, 7, 'Members', 'Accept/Reject', 16, 'Accept/Reject member of club.', '2019-05-12 18:29:01'),
(69, 7, 'Members', 'Accept/Reject', 17, 'Accept/Reject member of club.', '2019-05-14 17:31:03'),
(70, 7, 'Suscription', 'Update', 11, 'Sale update with state: \"paid\".', '2019-05-14 18:09:49'),
(71, 7, 'Members', 'Accept/Reject', 18, 'Accept/Reject member of club.', '2019-05-16 17:33:10'),
(72, 7, 'Suscription', 'Update', 14, 'Sale update with state: \"paid\".', '2019-05-16 17:34:21'),
(73, 7, 'Members', 'Accept/Reject', 19, 'Accept/Reject member of club.', '2019-05-16 17:37:30'),
(74, 23, 'Users', 'Upgrade', 23, 'User update with code 23 pfor the following data with their respective values: name: Alvin Thomas, slug: alvin-thomas created the day 2019-05-13 19:19:05.', '2019-05-20 21:28:10'),
(75, 23, 'Users', 'Upgrade', 23, 'User update with code 23 pfor the following data with their respective values: name: Alvin Thomas, slug: alvin-thomas created the day 2019-05-13 19:19:05.', '2019-05-20 21:28:38'),
(76, 7, 'Members', 'Accept/Reject', 20, 'Accept/Reject member of club.', '2019-05-22 21:57:50'),
(77, 7, 'Suscription', 'Update', 16, 'Sale update with state: \"paid\".', '2019-05-23 18:21:37'),
(78, 4, 'Members', 'Request join ', 21, 'New club member.', '2019-05-25 12:16:33'),
(79, 5, 'Suscription', 'Update', 17, 'Sale update with state: \"paid\".', '2019-05-25 20:21:30'),
(80, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 20:53:24'),
(81, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 20:53:32'),
(82, 5, 'Members', 'Accept/Reject', 1, 'Accept/Reject member of club.', '2019-05-25 20:53:44'),
(83, 5, 'Members', 'Accept/Reject', 1, 'Accept/Reject member of club.', '2019-05-25 20:54:07'),
(84, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 20:57:48'),
(85, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 20:57:56'),
(86, 5, 'Members', 'Accept/Reject', 1, 'Accept/Reject member of club.', '2019-05-25 20:58:31'),
(87, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 20:58:34'),
(88, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 21:00:42'),
(89, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 21:01:00'),
(90, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 21:01:07'),
(91, 5, 'Members', 'Locked/Unlocked', 1, 'Locked/Unlocked member of club.', '2019-05-25 21:02:28'),
(92, 5, 'Members', 'Locked/Unlocked', 21, 'Locked/Unlocked member of club.', '2019-05-25 21:11:32'),
(93, 5, 'Members', 'Accept/Reject', 21, 'Accept/Reject member of club.', '2019-05-27 15:42:51'),
(94, 5, 'Members', 'Accept/Reject', 21, 'Accept/Reject member of club.', '2019-05-27 15:44:48'),
(95, 5, 'Members', 'Accept/Reject', 21, 'Accept/Reject member of club.', '2019-05-27 15:46:18'),
(96, 7, 'Club package', 'Create', 3, 'Package registration with title: Kids TaeKwonDo, capacity: 50, gender: ALL, min age: 5, max age: 14, price: 25.00, discount: 10, picture: 1556816072-kids-taekwondo.png, status: Enabled.', '2019-05-27 16:33:52'),
(97, 27, 'Members', 'Request join ', 22, 'New club member.', '2019-05-30 18:39:46'),
(98, 27, 'Users', 'Upgrade', 27, 'User update with code 27 pfor the following data with their respective values: name: Hassan jassim ali, slug: hassan-jassim-ali created the day 2019-05-30 15:38:56.', '2019-05-30 18:42:49'),
(99, 27, 'Users', 'Upgrade', 27, 'User update with code 27 pfor the following data with their respective values: name: Hassan Jassim Ali, slug: hassan-jassim-ali created the day 2019-05-30 15:38:56.', '2019-05-30 18:43:59'),
(100, 27, 'Users', 'Upgrade', 27, 'User update with code 27 pfor the following data with their respective values: name: Hassan Jassim Ali, slug: hassan-jassim-ali created the day 2019-05-30 15:38:56.', '2019-05-30 18:44:34'),
(101, 7, 'Members', 'Accept/Reject', 22, 'Accept/Reject member of club.', '2019-05-30 19:51:50'),
(102, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-05-31 21:01:49'),
(103, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-05-31 21:01:54'),
(104, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-05-31 21:02:25'),
(105, 6, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-05-31 21:02:31'),
(106, 7, 'Club package', 'Create', 8, 'Package registration with club code: 3, title: Horse raiding , capacity: 50, gender: ALL, min age: 5, max age: 999, price: 20, discount: 0%, picture: 1560030089-horse-raiding.png, status: Enabled.', '2019-06-09 00:45:47'),
(107, 7, 'Club package', 'Create', 4, 'Package registration with title: Kids Kickboxing, capacity: 25, gender: ALL, min age: 7, max age: 17, price: 30.00, discount: 0%, picture: 1556816794-kids-kickboxing.png, status: Enabled.', '2019-06-09 00:47:39'),
(108, 7, 'Club package', 'Create', 5, 'Package registration with title: Adults TaeKwonDo, capacity: 30, gender: ALL, min age: 14, max age: 100, price: 25.00, discount: 5, picture: 1560030548-adults-taekwondo.png, status: Enabled.', '2019-06-09 00:49:11'),
(109, 7, 'Club package', 'Create', 5, 'Package registration with title: Adults TaeKwonDo, capacity: 30, gender: ALL, min age: 14, max age: 100, price: 25.00, discount: 5, picture: 1560030548-adults-taekwondo.png, status: Enabled.', '2019-06-09 00:49:34'),
(110, 7, 'Suscription', 'Update', 19, 'Sale update with state: \"paid\".', '2019-06-09 18:26:08'),
(111, 7, 'Suscription', 'Update', 20, 'Sale update with state: \"paid\".', '2019-06-09 18:26:13'),
(112, 7, 'Suscription', 'Update', 15, 'Sale update with state: \"paid\".', '2019-06-09 18:32:37'),
(113, 7, 'Suscription', 'Update', 21, 'Sale update with state: \"paid\".', '2019-06-10 19:58:56'),
(114, 7, 'Suscription', 'Update', 22, 'Sale update with state: \"paid\".', '2019-06-10 20:00:15'),
(115, 7, 'Suscription', 'Update', 23, 'Sale update with state: \"paid\".', '2019-06-10 20:00:53'),
(116, 30, 'Users', 'Upgrade', 30, 'User update with code 30 pfor the following data with their respective values: name: marvin, slug: marvin created the day 2019-06-10 19:49:35.', '2019-06-11 16:12:34'),
(117, 30, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-06-11 16:13:33'),
(118, 30, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-06-11 16:13:39'),
(119, 30, 'Users', 'Upgrade', 30, 'User update with code 30 pfor the following data with their respective values: name: Marvin, slug: marvin created the day 2019-06-10 19:49:35.', '2019-06-11 16:14:21'),
(120, 30, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-06-11 16:14:40'),
(121, 30, 'Followers club', 'Following', 0, 'Club follow-up.', '2019-06-11 16:14:42'),
(122, 31, 'Users', 'Upgrade', 31, 'User update with code 31 pfor the following data with their respective values: name: Myziah, slug: myziah created the day 2019-06-10 19:53:44.', '2019-06-11 16:21:49'),
(123, 31, 'Users', 'Upgrade', 31, 'User update with code 31 pfor the following data with their respective values: name: Myziah, slug: myziah created the day 2019-06-10 19:53:44.', '2019-06-11 16:22:22'),
(124, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:03:00'),
(125, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:03:01'),
(126, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:03:06'),
(127, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:03:07'),
(128, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:06:12'),
(129, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:06:12'),
(130, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:06:19'),
(131, 22, 'Users', 'Upgrade', 22, 'User update with code 22 pfor the following data with their respective values: name: Fatima Hussain Alsayegh , slug: fatima-hussain-alsayegh created the day 2019-05-12 13:37:22.', '2019-06-11 17:06:19'),
(132, 7, 'Members', 'Accept/Reject', 29, 'Accept/Reject member of club.', '2019-06-13 17:05:55'),
(133, 7, 'Members', 'Accept/Reject', 28, 'Accept/Reject member of club.', '2019-06-13 17:06:19'),
(134, 7, 'Suscription', 'Update', 12, 'Sale update with state: \"paid\".', '2019-06-13 17:42:53'),
(135, 7, 'Suscription', 'Update', 26, 'Sale update with state: \"paid\".', '2019-06-13 17:45:45'),
(136, 7, 'Suscription', 'Update', 27, 'Sale update with state: \"paid\".', '2019-06-13 17:48:46'),
(137, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: mohamed abdulredha isa abdulla abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:13:09'),
(138, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: Mohamed Abdulredha Isa Abdulla Abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:13:32'),
(139, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: Mohamed Abdulredha Isa Abdulla Abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:13:38'),
(140, 7, 'Suscription', 'Update', 28, 'Sale update with state: \"paid\".', '2019-06-15 17:14:57'),
(141, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: Mohamed Abdulredha Isa Abdulla Abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:17:56'),
(142, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: Mohamed Abdulredha Isa Abdulla Abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:44:27'),
(143, 37, 'Users', 'Upgrade', 37, 'User update with code 37 pfor the following data with their respective values: name: Mohamed Abdulredha Isa Abdulla Abdulredha, slug: mohamed-abdulredha-isa-abdulla-abdulredha created the day 2019-06-15 17:01:01.', '2019-06-15 17:47:40'),
(144, 35, 'Users', 'Upgrade', 35, 'User update with code 35 pfor the following data with their respective values: name: Tariq Adel, slug: tariq-adel created the day 2019-06-13 17:45:23.', '2019-06-15 17:49:02'),
(145, 36, 'Users', 'Upgrade', 36, 'User update with code 36 pfor the following data with their respective values: name: Naif mohammed, slug: naif-mohammed created the day 2019-06-13 17:48:34.', '2019-06-15 18:24:53'),
(146, 34, 'Users', 'Upgrade', 34, 'User update with code 34 pfor the following data with their respective values: name: Mahmood Saleh mohsen, slug: mahmood-saleh-mohsen created the day 2019-06-13 13:26:55.', '2019-06-16 15:59:29'),
(147, 34, 'Users', 'Upgrade', 34, 'User update with code 34 pfor the following data with their respective values: name: Mahmood Saleh Mohsen, slug: mahmood-saleh-mohsen created the day 2019-06-13 13:26:55.', '2019-06-16 16:00:24'),
(148, 7, 'Members', 'Accept/Reject', 12, 'Accept/Reject member of club.', '2019-06-17 03:21:31'),
(149, 7, 'Members', 'Accept/Reject', 12, 'Accept/Reject member of club.', '2019-06-17 03:21:39'),
(150, 7, 'Members', 'Locked/Unlocked', 28, 'Locked/Unlocked member of club.', '2019-06-17 04:51:20'),
(151, 7, 'Members', 'Locked/Unlocked', 28, 'Locked/Unlocked member of club.', '2019-06-17 04:51:22'),
(152, 7, 'Suscription', 'Update', 8, 'Sale update with state: \"paid\".', '2019-06-18 00:12:37'),
(153, 7, 'Users', 'Upgrade', 7, 'User update with code 7 pfor the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-06-18 02:12:02'),
(154, 7, 'Members', 'Accept/Reject', 14, 'Accept/Reject member of club.', '2019-06-18 05:02:14'),
(155, 7, 'Members', 'Accept/Reject', 14, 'Accept/Reject member of club.', '2019-06-18 05:02:46'),
(156, 11, 'Users', 'Upgrade', 0, 'User update with code  for the following data with their respective values: name: , slug: n-a created the day .', '2019-07-14 21:49:06'),
(157, 11, 'Users', 'Upgrade', 0, 'User update with code  for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:05:08.', '2019-07-14 22:05:10'),
(158, 11, 'Users', 'Upgrade', 0, 'User update with code  for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:08:16.', '2019-07-14 22:08:16'),
(159, 11, 'Users', 'Upgrade', 40, 'User update with code 40 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:08:16.', '2019-07-14 22:08:48'),
(160, 11, 'Users', 'Upgrade', 40, 'User update with code 40 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:08:16.', '2019-07-14 22:09:22'),
(161, 11, 'Users', 'Upgrade', 40, 'User update with code 40 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:08:16.', '2019-07-14 22:09:32'),
(162, 11, 'Users', 'Upgrade', 44, 'User update with code 44 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:10:40.', '2019-07-14 22:10:41'),
(163, 11, 'Users', 'Upgrade', 45, 'User update with code 45 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:12:18.', '2019-07-14 22:12:19'),
(164, 11, 'Users', 'Upgrade', 46, 'User update with code 46 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:15:11.', '2019-07-14 22:15:11'),
(165, 11, 'Users', 'Upgrade', 47, 'User update with code 47 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-07-14 22:15:56.', '2019-07-14 22:15:57'),
(166, 47, 'Members', 'Request join ', 34, 'New club member.', '2019-07-15 05:43:00'),
(167, 2, 'Members', 'Accept/Reject', 34, 'Accept/Reject member of club.', '2019-07-14 22:54:52'),
(168, 7, 'Suscription', 'Update', 96, 'Sale update with state: \"canceled\".', '2019-07-23 18:53:47'),
(169, 7, 'Suscription', 'Update', 97, 'Sale update with state: \"canceled\".', '2019-07-23 18:53:53'),
(170, 7, 'Suscription', 'Update', 98, 'Sale update with state: \"canceled\".', '2019-07-23 18:57:44'),
(171, 7, 'Suscription', 'Update', 99, 'Sale update with state: \"canceled\".', '2019-07-23 18:59:53'),
(172, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-23 23:46:16'),
(173, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-23 23:46:18'),
(174, 7, 'Members', 'Accept/Reject', 32, 'Accept/Reject member of club.', '2019-07-24 00:01:47'),
(175, 7, 'Members', 'Accept/Reject', 32, 'Accept/Reject member of club.', '2019-07-24 00:01:49'),
(176, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:23:24'),
(177, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:24:01'),
(178, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:24:03'),
(179, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:24:15'),
(180, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:26:34'),
(181, 7, 'Members', 'Locked/Unlocked', 32, 'Locked/Unlocked member of club.', '2019-07-24 00:26:35'),
(182, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:33:48'),
(183, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:36:45'),
(184, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:39:22'),
(185, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:39:57'),
(186, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:40:24'),
(187, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:40:43'),
(188, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:40:46'),
(189, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:35'),
(190, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:37'),
(191, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:39'),
(192, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:41'),
(193, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:43'),
(194, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:43:45'),
(195, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:54:49'),
(196, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:56:56'),
(197, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 00:57:28'),
(198, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:00:53'),
(199, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:01:56'),
(200, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:04:38'),
(201, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:05:45'),
(202, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:06:01'),
(203, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:06:32'),
(204, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:06:55'),
(205, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:07:33'),
(206, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:08:18'),
(207, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:08:46'),
(208, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:09:33'),
(209, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:09:43'),
(210, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:09:52'),
(211, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:09:56'),
(212, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:11:06'),
(213, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:11:11'),
(214, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:11:45'),
(215, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:12:51'),
(216, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:12:57'),
(217, 7, 'Members', 'Locked/Unlocked', 22, 'Locked/Unlocked member of club.', '2019-07-24 01:16:21'),
(218, 7, 'Members', 'Locked/Unlocked', 17, 'Locked/Unlocked member of club.', '2019-07-24 01:21:13'),
(219, 7, 'Members', 'Locked/Unlocked', 17, 'Locked/Unlocked member of club.', '2019-07-24 01:25:15'),
(220, 7, 'Members', 'Locked/Unlocked', 17, 'Locked/Unlocked member of club.', '2019-07-24 01:25:28'),
(221, 7, 'Members', 'Locked/Unlocked', 17, 'Locked/Unlocked member of club.', '2019-07-24 01:25:32'),
(222, 47, 'Members', 'Request join ', 35, 'New club member.', '2019-07-29 04:24:44'),
(223, 47, 'Members', 'Request join ', 36, 'New club member.', '2019-07-29 04:27:02'),
(224, 2, 'Members', 'Accept/Reject', 36, 'Accept/Reject member of club.', '2019-07-28 21:27:30'),
(225, 7, 'Users', 'Upgrade', 7, 'User update with code 7 for the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-08-04 20:46:15'),
(226, 7, 'Users', 'Upgrade', 7, 'User update with code 7 for the following data with their respective values: name: Ebrahim Al-Haji, slug: ebrahim-al-haji created the day 2019-05-02 15:41:24.', '2019-08-04 20:46:39'),
(227, 11, 'Users', 'Upgrade', 48, 'User update with code 48 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-08-04 12:55:10.', '2019-08-04 12:55:11'),
(228, 11, 'Users', 'Upgrade', 49, 'User update with code 49 for the following data with their respective values: name: example kid account, slug: example-kid-account created the day 2019-08-04 12:58:22.', '2019-08-04 12:58:23'),
(229, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: johan castro, slug: johan-castro created the day 2019-05-02 16:41:07.', '2019-08-08 22:18:57'),
(230, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-08 22:19:05'),
(231, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-09 00:02:41'),
(232, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-09 10:41:35'),
(233, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-09 10:41:59'),
(234, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-09 10:42:11'),
(235, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-25 09:53:53'),
(236, 11, 'Users', 'Upgrade', 11, 'User update with code 11 for the following data with their respective values: name: Johan David Castro Palomares, slug: johan-david-castro-palomares created the day 2019-05-02 16:41:07.', '2019-08-25 09:54:01'),
(237, 11, 'Members', 'Request join ', 38, 'New club member.', '2019-09-07 18:11:24'),
(238, 7, 'Members', 'Accept/Reject', 38, 'Accept/Reject member of club.', '2019-09-08 02:11:40');

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
  `uniqe_id` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
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
(1, 2, 'Club Colombiano', 'club-colombiano', '2019-04-23 00:00:00', 'Calle 11 # 27-51', '', 47, 'Bucaramanga', 7.1376, -73.1266, '1556071643-club-colombiano.png', '3222183956', 'Clubcolombiano@example.com', '123456789', 2, 1, 'COP', 'America/Bogota', 59000.00, '2019-05-03 14:02:05', '2019-05-03 14:02:05'),
(2, 5, 'TAKEONE', 'takeone', '2020-01-30 00:00:00', 'Road 1121, Block 411, House 551, Al-Musalla', '', 17, 'Jidhafs', 26.115, 50.5003, '1556206522-takeone.png', '33165444', 'ghassan.yousif.83@gmail.com', '0', 2, 1, 'BHD', 'Asia/Bahrain', 5.00, '2019-05-06 11:44:05', '2019-05-06 11:44:05'),
(3, 7, 'Warrior TaeKwonDo Academy', 'warrior-taekwondo-academy', '2017-03-02 00:00:00', 'Flat 11, Building 232, Road 111, Block 701', '', 17, 'Tubli', 0, 0, '1556815455-warrior-taekwondo-academy.png', '+973 33233533', 'braa.aji1388@gmail.com', 'fsdkfjslkdf', 2, 1, 'BHD', 'Asia/Bahrain', 5.00, '2019-05-02 19:46:53', '2019-05-02 11:47:52');

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
(21, 3, '3', 'suscription', 10, '2019-05-05 19:54:11', '2019-06-17 21:02:37'),
(27, 3, '3', 'suscription', 13, '2019-05-13 22:19:05', '2019-06-17 21:02:37'),
(49, 3, '1', 'member', 33, '2019-06-13 12:54:49', '2019-06-13 12:54:49'),
(50, 3, '2', 'suscription', 24, '2019-06-13 12:54:49', '2019-06-13 12:54:49'),
(122, 3, '3', 'suscription', 101, '2019-06-17 22:04:41', '2019-07-24 01:25:14'),
(123, 3, '2', 'suscription', 102, '2019-06-17 22:04:42', '2019-06-17 22:04:42'),
(124, 3, '2', 'suscription', 103, '2019-06-17 22:04:43', '2019-06-17 22:04:43'),
(125, 3, '2', 'suscription', 104, '2019-06-17 22:04:44', '2019-06-17 22:04:44'),
(126, 2, '2', 'suscription', 105, '2019-06-17 22:04:45', '2019-06-17 22:04:45'),
(132, 3, '3', 'suscription', 18, '0000-00-00 00:00:00', '2019-07-24 01:05:44'),
(133, 3, '6', 'suscription', 110, '2019-07-24 01:05:44', '2019-07-24 01:08:18'),
(135, 3, '6', 'suscription', 112, '2019-07-24 01:08:46', '2019-07-24 01:12:57'),
(136, 3, '6', 'suscription', 113, '2019-07-24 01:25:15', '2019-07-24 01:25:28'),
(140, 1, '2', 'suscription', 115, '2019-07-29 04:27:02', '2019-07-29 04:27:02'),
(142, 3, '2', 'suscription', 115, '2019-08-09 06:42:53', '2019-08-09 06:42:53'),
(144, 3, '2', 'suscription', 116, '2019-08-09 06:45:57', '2019-08-09 06:45:57'),
(146, 3, '2', 'suscription', 117, '2019-08-09 19:02:20', '2019-08-09 19:02:20'),
(148, 3, '2', 'suscription', 119, '2019-09-07 18:11:24', '2019-09-07 18:11:24');

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
(3, 3, 'Kids TaeKwonDo', 'kids-taekwondo', 50, 'ALL', 5, 14, 25.00, 10, '1556816072-kids-taekwondo.png', 'Enabled', '2019-05-02 19:54:50', '2019-05-27 16:33:52'),
(4, 3, 'Kids Kickboxing', 'kids-kickboxing', 25, 'ALL', 7, 17, 30.00, 0, '1556816794-kids-kickboxing.png', 'Enabled', '2019-05-02 20:06:40', '2019-06-09 00:47:39'),
(5, 3, 'Adults TaeKwonDo', 'adults-taekwondo', 30, 'ALL', 14, 100, 25.00, 5, '1560030548-adults-taekwondo.png', 'Enabled', '2019-05-02 20:30:43', '2019-06-09 00:49:34'),
(6, 2, 'Kids Summer', 'kids-summer', 50, 'ALL', 5, 14, 25.00, 1, '1556897001-kids-summer.png', 'Enabled', '2019-05-03 18:23:38', '2019-05-03 18:23:38'),
(7, 1, 'example', 'example', 20, 'ALL', 5, 6, 50.00, 0, '1556923259-example.png', 'Enabled', '2019-05-03 17:41:01', '2019-05-03 17:41:01'),
(8, 3, 'Horse raiding ', 'horse-raiding', 50, 'ALL', 5, 999, 20.00, 0, '1560030089-horse-raiding.png', 'Enabled', '2019-06-09 00:45:47', '2019-06-09 00:45:47');

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
(1, 1, 1, 'TaeKwonDo', 0, '7:45 AM', '7:45 AM', 'Single Class', 'Saturday,Sunday,Thursday', '', '2019-04-24 07:39:41', '2019-04-24 07:39:41'),
(2, 2, 2, 'Horse Riding', 0, '4:30 PM', '6:30 PM', 'Parallel Classes', 'Saturday,Monday,Wednesday', '', '2019-05-02 18:28:32', '2019-05-02 18:28:57'),
(3, 3, 3, 'TaeKwonDo', 0, '4:00 PM', '5:30 PM', 'Parallel Classes', 'Sunday,Tuesday,Thursday', '', '2019-05-02 19:59:21', '2019-05-02 19:59:21'),
(4, 3, 4, 'Mix Martial Arts', 0, '6:30 PM', '8:00 PM', 'Parallel Classes', 'Saturday,Monday,Wednesday', '', '2019-05-02 20:11:01', '2019-06-09 00:51:59'),
(5, 3, 5, 'TaeKwonDo', 0, '4:00 PM', '5:30 PM', 'Parallel Classes', 'Sunday,Tuesday,Thursday', '', '2019-05-02 20:32:56', '2019-05-02 20:32:56'),
(6, 2, 6, 'TaeKwonDo', 2, '4:00 PM', '7:30 PM', 'Single Class', 'Sunday', '', '2019-05-03 18:25:12', '2019-05-04 02:45:41'),
(7, 1, 7, 'TaeKwonDo', 1, '6:15 PM', '6:15 PM', 'Single Class', 'Sunday', '', '2019-05-03 18:07:32', '2019-05-03 18:07:32'),
(11, 2, 6, 'Horse Riding', 0, '4:00 PM', '5:00 PM', 'Single Class', 'Tuesday', 'Pleas wear normal clothes with rubber boots', '2019-05-04 02:14:21', '2019-05-04 02:27:57'),
(15, 2, 6, 'Swimming', 0, '4:00 PM', '5:00 PM', 'Single Class', 'Thursday', 'Please Wear Swimming Suit And Shorts', '2019-05-04 02:29:38', '2019-05-04 02:29:38'),
(16, 1, 7, 'Karate', 0, '6:15 PM', '6:30 PM', 'Parallel Classes', 'Wednesday', '', '2019-05-03 18:30:12', '2019-05-03 18:30:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_trainners`
--

CREATE TABLE `club_trainners` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(150) NOT NULL,
  `salary` float(15,2) UNSIGNED NOT NULL,
  `status` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `club_trainners`
--

INSERT INTO `club_trainners` (`id`, `club_id`, `user_id`, `activity`, `salary`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'TaeKwonDo', 100.00, 'Accept', '2019-04-24 07:45:32', '2019-04-24 12:45:53'),
(2, 2, 5, 'TaeKwonDo', 1.00, 'Accept', '2019-05-04 02:38:40', '2019-05-05 15:31:44'),
(3, 2, 6, 'Mix Martial Arts', 2.00, 'send', '2019-05-04 02:39:45', '2019-05-04 02:39:45'),
(4, 2, 2, 'Muai Thai', 6.00, 'Accept', '2019-05-04 02:40:18', '2019-05-03 23:56:05'),
(5, 1, 21, 'Swimming', 500.00, 'Accept', '2019-05-10 13:25:05', '2019-05-10 13:25:05'),
(6, 3, 11, 'TaeKwonDo', 0.00, 'send', '2019-09-08 02:13:27', '2019-09-08 02:13:27');

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

--
-- Volcado de datos para la tabla `followers_club`
--

INSERT INTO `followers_club` (`id`, `user_id`, `club_id`, `following`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, '2019-04-24 23:06:56', '2019-04-24 23:07:03'),
(2, 5, 1, 1, '2019-04-25 18:36:35', '2019-04-25 18:36:35'),
(3, 16, 2, 1, '2019-05-05 15:58:12', '2019-05-05 15:58:12'),
(4, 6, 2, 2, '2019-05-31 21:01:49', '2019-05-31 21:01:54'),
(5, 6, 3, 2, '2019-05-31 21:02:24', '2019-05-31 21:02:31'),
(6, 30, 3, 2, '2019-06-11 16:13:33', '2019-06-11 16:14:42');

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
(1, 11, 1, 2, 2, '2019-04-24 07:40:05', '2019-05-25 21:02:28'),
(2, 6, 1, 2, 2, '2019-04-24 23:06:50', '2019-04-24 23:18:44'),
(3, 12, 3, 2, 2, '2019-05-02 20:36:28', '2019-05-02 20:37:12'),
(4, 5, 2, 2, 2, '2019-05-04 02:38:40', '2019-05-04 02:38:40'),
(5, 6, 2, 2, 2, '2019-05-04 02:39:45', '2019-05-04 02:39:45'),
(7, 13, 3, 2, 2, '2019-05-04 11:38:25', '2019-05-11 01:53:03'),
(8, 14, 3, 4, 1, '2019-05-04 12:30:33', '2019-05-11 02:24:27'),
(10, 16, 2, 2, 2, '2019-05-05 15:55:41', '2019-05-05 15:57:23'),
(11, 17, 3, 2, 2, '2019-05-05 17:37:31', '2019-05-05 17:43:10'),
(12, 18, 3, 2, 2, '2019-05-05 18:40:57', '2019-05-05 19:16:31'),
(13, 19, 3, 2, 2, '2019-05-05 19:54:09', '2019-05-05 20:15:46'),
(14, 20, 3, 2, 2, '2019-05-07 18:06:44', '2019-06-18 05:02:46'),
(15, 21, 1, 2, 2, '2019-05-10 13:25:05', '2019-05-10 13:25:05'),
(16, 22, 3, 2, 2, '2019-05-12 16:37:23', '2019-05-12 18:29:00'),
(17, 23, 3, 2, 2, '2019-05-13 22:19:05', '2019-07-24 01:25:32'),
(18, 24, 3, 2, 2, '2019-05-16 17:16:40', '2019-05-16 17:33:10'),
(19, 25, 3, 2, 2, '2019-05-16 17:36:53', '2019-05-16 17:37:30'),
(20, 26, 3, 2, 2, '2019-05-22 21:37:13', '2019-05-22 21:57:49'),
(21, 4, 2, 2, 2, '2019-05-25 12:16:33', '2019-05-27 15:46:17'),
(22, 27, 3, 2, 2, '2019-05-30 18:39:46', '2019-07-24 01:16:21'),
(23, 28, 3, 2, 2, '2019-06-02 16:33:10', '2019-06-02 16:33:10'),
(24, 29, 3, 2, 2, '2019-06-02 16:42:12', '2019-06-02 16:42:12'),
(25, 30, 3, 2, 2, '2019-06-10 19:49:35', '2019-06-10 19:49:35'),
(26, 31, 3, 2, 2, '2019-06-10 19:53:44', '2019-06-10 19:53:44'),
(27, 32, 3, 2, 2, '2019-06-10 19:56:23', '2019-06-10 19:56:23'),
(28, 33, 3, 2, 2, '2019-06-13 12:54:49', '2019-06-17 04:51:21'),
(29, 34, 3, 2, 2, '2019-06-13 16:26:56', '2019-06-13 17:05:55'),
(30, 35, 3, 2, 2, '2019-06-13 17:45:24', '2019-06-13 17:45:24'),
(31, 36, 3, 2, 2, '2019-06-13 17:48:35', '2019-06-13 17:48:35'),
(32, 37, 3, 2, 2, '2019-06-15 17:01:02', '2019-07-24 00:26:35'),
(33, 38, 3, 1, 1, '2019-06-16 19:27:02', '2019-06-16 19:27:02'),
(34, 39, 3, 2, 2, '2019-08-09 06:42:53', '2019-08-09 06:42:53'),
(35, 40, 3, 2, 2, '2019-08-09 06:45:56', '2019-08-09 06:45:56'),
(36, 45, 3, 2, 2, '2019-08-09 19:02:19', '2019-08-09 19:02:19'),
(37, 48, 3, 1, 1, '2019-08-09 11:22:51', '2019-08-09 11:22:51'),
(38, 11, 3, 2, 2, '2019-09-07 18:11:23', '2019-09-08 02:11:39');

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
(1, 1, 7, '2019-04-24 07:40:05', '2019-04-24 07:40:05'),
(2, 2, 1, '2019-04-24 23:06:50', '2019-04-24 23:06:50'),
(4, 7, 3, '2019-05-04 11:38:25', '2019-05-04 11:38:25'),
(5, 8, 5, '2019-05-04 12:30:34', '2019-05-04 12:30:34'),
(7, 10, 6, '2019-05-05 15:55:41', '2019-05-05 15:55:41'),
(8, 11, 5, '2019-05-05 17:37:31', '2019-05-05 17:37:31'),
(9, 12, 3, '2019-05-05 18:40:57', '2019-05-05 18:40:57'),
(10, 13, 5, '2019-05-05 19:54:10', '2019-05-05 19:54:10'),
(11, 14, 3, '2019-05-07 18:06:44', '2019-05-07 18:06:44'),
(12, 16, 3, '2019-05-12 16:37:23', '2019-05-12 16:37:23'),
(13, 17, 3, '2019-05-13 22:19:05', '2019-05-13 22:19:05'),
(14, 18, 3, '2019-05-16 17:16:40', '2019-05-16 17:16:40'),
(15, 19, 3, '2019-05-16 17:36:53', '2019-05-16 17:36:53'),
(16, 20, 3, '2019-05-22 21:37:14', '2019-05-22 21:37:14'),
(17, 21, 6, '2019-05-25 12:16:33', '2019-05-25 12:16:33'),
(18, 22, 5, '2019-05-30 18:39:46', '2019-05-30 18:39:46'),
(19, 23, 3, '2019-06-02 16:33:11', '2019-06-02 16:33:11'),
(20, 24, 3, '2019-06-02 16:42:13', '2019-06-02 16:42:13'),
(21, 25, 5, '2019-06-10 19:49:35', '2019-06-10 19:49:35'),
(23, 27, 5, '2019-06-10 19:56:23', '2019-06-10 19:56:23'),
(24, 33, 3, '2019-06-13 12:54:49', '2019-06-13 12:54:49'),
(25, 33, 8, '2019-06-13 12:54:49', '2019-06-13 12:54:49'),
(27, 30, 4, '2019-06-13 17:45:24', '2019-06-13 17:45:24'),
(28, 31, 4, '2019-06-13 17:48:35', '2019-06-13 17:48:35'),
(29, 32, 3, '2019-06-15 17:01:02', '2019-06-15 17:01:02'),
(30, 38, 3, '2019-06-16 19:27:02', '2019-06-16 19:27:02'),
(31, 34, 3, '2019-08-09 06:42:53', '2019-08-09 06:42:53'),
(32, 35, 3, '2019-08-09 06:45:57', '2019-08-09 06:45:57'),
(33, 35, 4, '2019-08-09 06:45:57', '2019-08-09 06:45:57'),
(34, 36, 4, '2019-08-09 19:02:20', '2019-08-09 19:02:20'),
(35, 48, 3, '2019-08-09 11:22:51', '2019-08-09 11:22:51'),
(74, 3, 8, '2019-08-25 20:05:33', '2019-08-25 20:05:33'),
(75, 38, 3, '2019-09-07 18:11:23', '2019-09-07 18:11:23'),
(76, 38, 5, '2019-09-07 18:11:23', '2019-09-07 18:11:23'),
(80, 26, 3, '2019-09-08 02:43:29', '2019-09-08 02:43:29');

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

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `club_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dear Johan Castro 2 trainer. <br> You have been selected to be trainer of TaeKwonDo in Club Colombiano. <br> Your salary is 100, <br> Best Regards. <br><a target=\"_new\" href=\"http://adminlte.takeone.tech//Clubs/Trainner/Status/Decline/1/4/TaeKwonDo\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"http://adminlte.takeone.tech//Clubs/Trainner/Status/Accept/1/4/TaeKwonDo\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-04-24 07:45:32', '2019-04-24 07:45:32'),
(2, 2, 'Dear Ghassan Yusuf trainer. <br> You have been selected to be trainer of TaeKwonDo in TAKEONE. <br> Your salary is 1, <br> Best Regards. <br><a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Decline/2/5/TaeKwonDo\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Accept/2/5/TaeKwonDo\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-05-04 02:38:40', '2019-05-04 02:38:40'),
(3, 2, 'Dear Andres Florez trainer. <br> You have been selected to be trainer of Mix Martial Arts in TAKEONE. <br> Your salary is 2, <br> Best Regards. <br><a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Decline/2/6/Mix Martial Arts\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Accept/2/6/Mix Martial Arts\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-05-04 02:39:45', '2019-05-04 02:39:45'),
(4, 2, 'Dear Johan Castro  trainer. <br> You have been selected to be trainer of Muai Thai in TAKEONE. <br> Your salary is 6, <br> Best Regards. <br><a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Decline/2/2/Muai Thai\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"https://takeone.technology/Clubs/Trainner/Status/Accept/2/2/Muai Thai\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-05-04 02:40:18', '2019-05-04 02:40:18'),
(5, 1, 'Dear Johan David Castro Palomares trainer. <br> You have been selected to be trainer of Muai Thai in Club Colombiano. <br> Your salary is 50000, <br> Best Regards. <br><a target=\"_new\" href=\"http://localhost/proyectos/takeone/Clubs/Trainner/Status/Decline/1/11/Muai Thai\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"http://localhost/proyectos/takeone/Clubs/Trainner/Status/Accept/1/11/Muai Thai\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-08-09 11:29:26', '2019-08-09 11:29:26'),
(6, 3, 'Dear Johan David Castro Palomares trainer. <br> You have been selected to be trainer of TaeKwonDo in Warrior TaeKwonDo Academy. <br> Your salary is 0, <br> Best Regards. <br><a target=\"_new\" href=\"http://localhost/proyectos/takeone/Clubs/Trainner/Status/Decline/3/11/TaeKwonDo\" class=\"btn btn-danger btn-sm\">Decline</a> <a target=\"_new\" href=\"http://localhost/proyectos/takeone/Clubs/Trainner/Status/Accept/3/11/TaeKwonDo\" class=\"btn btn-primary btn-sm\">Accept</a>', '2019-09-08 02:13:27', '2019-09-08 02:13:27');

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

--
-- Volcado de datos para la tabla `notification_sends`
--

INSERT INTO `notification_sends` (`id`, `notification_id`, `member_id`, `readed`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2019-04-24 07:45:32', '2019-04-24 07:45:44'),
(2, 2, 4, 2, '2019-05-04 02:38:40', '2019-05-04 03:15:08'),
(3, 3, 5, 1, '2019-05-04 02:39:45', '2019-05-04 02:39:45'),
(4, 4, 6, 2, '2019-05-04 02:40:18', '2019-05-03 18:53:48'),
(5, 5, 11, 1, '2019-08-09 11:29:26', '2019-08-09 11:29:26'),
(6, 6, 11, 1, '2019-09-08 02:13:27', '2019-09-08 02:13:27');

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
(1, 1, 1, 1, 0.10, '2019-05-02 20:52:33', '2019-05-02 20:52:33'),
(2, 2, 2, 2, 25.00, '2019-05-05 16:05:05', '2019-05-05 16:05:05'),
(3, 3, 3, 2, 500.00, '2019-05-10 11:16:45', '2019-05-10 11:16:45');

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
(1, 3, 3, 0.10, 'cash', 'paid', '2019-05-02 20:52:33', '2019-05-02 20:52:33'),
(2, 2, 10, 50.00, 'cash', 'paid', '2019-05-05 16:05:05', '2019-05-05 16:05:05'),
(3, 1, 1, 1000.00, 'cash', 'paid', '2019-05-10 11:16:45', '2019-05-10 11:16:45');

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
(1, 3, 'Water Bottel', 'water-bottel', 0.10, 29, 'active', '', '', '2019-05-02 20:49:23', '2019-05-02 20:52:33'),
(2, 2, 'DaeDo Dobok XL', 'daedo-dobok-xl', 25.00, 8, 'active', '', '', '2019-05-05 16:03:36', '2019-05-05 16:05:05'),
(3, 1, 'ejemplo', 'ejemplo', 500.00, 3, 'active', '', '', '2019-05-10 11:16:27', '2019-05-10 11:16:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptions`
--

CREATE TABLE `suscriptions` (
  `id` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `price` float(15,2) NOT NULL,
  `total_discount` float(15,2) DEFAULT '0.00',
  `payment_method` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `observation` text COLLATE utf8_spanish_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `suscriptions`
--

INSERT INTO `suscriptions` (`id`, `club_id`, `member_id`, `price`, `total_discount`, `payment_method`, `state`, `observation`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 59050.00, 0.00, 'cash', 'approval', NULL, '2019-05-21 00:00:00', '2019-06-17 21:20:57'),
(2, 1, 2, 59050.00, 0.00, 'cash', 'paid', NULL, '2019-04-24 23:06:50', '2019-04-24 23:06:50'),
(3, 3, 3, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-02 20:36:28', '2019-05-02 20:36:28'),
(4, 3, 7, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-04 11:38:25', '2019-05-04 11:38:25'),
(5, 3, 8, 30.00, 0.00, 'cash', 'canceled', NULL, '2019-05-04 12:30:34', '2019-05-04 12:30:34'),
(6, 3, 9, 30.00, 0.00, 'cash', 'canceled', NULL, '2019-05-04 13:30:43', '2019-05-04 13:30:43'),
(7, 3, 10, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-05 15:55:42', '2019-05-05 15:55:42'),
(8, 3, 11, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-05 17:37:31', '2019-06-17 21:02:36'),
(9, 3, 12, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-05 18:40:58', '2019-05-05 18:40:58'),
(10, 3, 13, 30.00, 0.00, 'cash', 'expired', NULL, '2019-05-05 19:54:11', '2019-06-17 21:02:37'),
(11, 3, 14, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-07 18:06:44', '2019-05-07 18:06:44'),
(12, 3, 16, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-12 16:37:24', '2019-05-12 16:37:24'),
(13, 3, 17, 30.00, 0.00, 'cash', 'expired', NULL, '2019-05-13 22:19:05', '2019-06-17 21:02:37'),
(14, 3, 18, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-16 17:16:41', '2019-05-16 17:16:41'),
(15, 3, 19, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-16 17:36:53', '2019-05-16 17:36:53'),
(16, 3, 20, 30.00, 0.00, 'cash', 'paid', NULL, '2019-05-22 21:37:14', '2019-05-22 21:37:14'),
(17, 2, 21, 30.00, 0.00, 'cash', 'approval', NULL, '2019-05-25 12:16:33', '2019-06-17 19:02:11'),
(18, 3, 22, 30.00, 0.00, 'cash', 'expired', 'NULL', '2019-05-30 18:39:46', '2019-07-24 01:05:44'),
(19, 3, 23, 30.00, 0.00, 'cash', 'paid', NULL, '2019-06-02 16:33:11', '2019-06-02 16:33:11'),
(20, 3, 24, 30.00, 0.00, 'cash', 'paid', NULL, '2019-06-02 16:42:13', '2019-06-02 16:42:13'),
(21, 3, 25, 25.00, 5.00, 'cash', 'paid', NULL, '2019-06-10 19:49:35', '2019-06-10 19:49:35'),
(22, 3, 26, 20.00, 10.00, 'cash', 'paid', NULL, '2019-06-10 19:53:44', '2019-06-10 19:53:44'),
(23, 3, 27, 25.00, 5.00, 'cash', 'paid', NULL, '2019-06-10 19:56:23', '2019-06-10 19:56:23'),
(24, 3, 33, 50.00, 0.00, 'cash', 'approval', NULL, '2019-06-13 12:54:49', '2019-06-13 12:54:49'),
(26, 3, 30, 35.00, 0.00, 'cash', 'paid', NULL, '2019-06-13 17:45:24', '2019-06-13 17:45:24'),
(27, 3, 31, 35.00, 0.00, 'cash', 'paid', NULL, '2019-06-13 17:48:35', '2019-06-13 17:48:35'),
(28, 3, 32, 30.00, 0.00, 'cash', 'paid', NULL, '2019-06-15 17:01:02', '2019-06-15 17:01:02'),
(29, 3, 38, 30.00, 0.00, 'cash', 'approval', NULL, '2019-06-16 19:27:03', '2019-06-16 19:27:03'),
(96, 3, 12, 25.00, 0.00, 'cash', 'canceled', NULL, '2019-06-17 22:04:30', '2019-06-17 22:04:30'),
(97, 3, 11, 25.00, 0.00, 'cash', 'canceled', NULL, '2019-06-17 22:04:33', '2019-06-17 22:04:33'),
(98, 3, 19, 25.00, 0.00, 'cash', 'canceled', NULL, '2019-06-17 22:04:35', '2019-06-17 22:04:35'),
(99, 3, 18, 25.00, 0.00, 'cash', 'canceled', 'example of cancelation', '2019-06-17 22:04:37', '2019-06-17 22:04:37'),
(100, 3, 3, 55.00, 0.00, 'cash', 'paid', NULL, '2019-06-17 22:04:38', '2019-08-25 20:04:38'),
(101, 3, 17, 25.00, 0.00, 'cash', 'expired', 'NULL', '2019-06-17 22:04:39', '2019-07-24 01:25:14'),
(102, 3, 16, 25.00, 0.00, 'cash', 'approval', NULL, '2019-06-17 22:04:41', '2019-06-17 22:04:41'),
(103, 3, 14, 25.00, 0.00, 'cash', 'approval', NULL, '2019-06-17 22:04:42', '2019-06-17 22:04:42'),
(104, 3, 13, 25.00, 0.00, 'cash', 'approval', NULL, '2019-06-17 22:04:43', '2019-06-17 22:04:43'),
(105, 2, 10, 25.00, 0.00, 'cash', 'approval', NULL, '2019-06-17 22:04:44', '2019-06-17 22:04:44'),
(106, 1, 34, 59050.00, 0.00, 'cash', 'approval', NULL, '2019-07-15 05:43:00', '2019-07-15 05:43:00'),
(110, 3, 22, 25.00, 0.00, 'cash', 'canceled', 'The subscription has been canceled due to member blocking.', '2019-07-24 01:05:44', '2019-07-24 01:05:44'),
(112, 3, 22, 25.00, 0.00, 'cash', 'approval', 'NULL', '2019-07-24 01:08:46', '2019-07-24 01:08:46'),
(113, 3, 17, 25.00, 0.00, 'cash', 'approval', 'NULL', '2019-07-24 01:25:15', '2019-07-24 01:25:15'),
(114, 1, 35, 59050.00, 0.00, 'cash', 'approval', '', '2019-07-29 04:24:44', '2019-07-29 04:24:44'),
(115, 3, 34, 30.00, 0.00, 'cash', 'approval', '', '2019-08-09 06:42:53', '2019-08-09 06:42:53'),
(116, 3, 35, 60.00, 0.00, 'cash', 'approval', '', '2019-08-09 06:45:57', '2019-08-09 06:45:57'),
(117, 3, 36, 35.00, 0.00, 'cash', 'approval', '', '2019-08-09 19:02:20', '2019-08-09 19:02:20'),
(118, 3, 48, 30.00, 0.00, 'cash', 'approval', '', '2019-08-09 11:22:51', '2019-08-09 11:22:51'),
(119, 3, 38, 55.00, 0.00, 'cash', 'approval', '', '2019-09-07 18:11:23', '2019-09-07 18:11:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscription_packages`
--

CREATE TABLE `suscription_packages` (
  `id` int(11) NOT NULL,
  `suscription_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscription_packages`
--

INSERT INTO `suscription_packages` (`id`, `suscription_id`, `package_id`, `created_at`) VALUES
(1, 1, 7, '2019-06-17 21:52:17'),
(2, 3, 3, '2019-06-17 21:52:17'),
(3, 4, 3, '2019-06-17 21:52:17'),
(4, 5, 5, '2019-06-17 21:52:17'),
(5, 7, 6, '2019-06-17 21:52:17'),
(6, 8, 5, '2019-06-17 21:52:17'),
(7, 9, 3, '2019-06-17 21:52:17'),
(8, 10, 5, '2019-06-17 21:52:17'),
(9, 11, 3, '2019-06-17 21:52:17'),
(10, 12, 3, '2019-06-17 21:52:17'),
(11, 13, 3, '2019-06-17 21:52:17'),
(12, 14, 3, '2019-06-17 21:52:17'),
(13, 15, 3, '2019-06-17 21:52:18'),
(14, 16, 3, '2019-06-17 21:52:18'),
(15, 17, 6, '2019-06-17 21:52:18'),
(16, 18, 5, '2019-06-17 21:52:18'),
(17, 19, 3, '2019-06-17 21:52:18'),
(18, 20, 3, '2019-06-17 21:52:18'),
(19, 21, 5, '2019-06-17 21:52:18'),
(20, 22, 3, '2019-06-17 21:52:18'),
(21, 23, 5, '2019-06-17 21:52:18'),
(22, 24, 3, '2019-06-17 21:52:18'),
(23, 24, 8, '2019-06-17 21:52:18'),
(24, 25, 3, '2019-06-17 21:52:18'),
(27, 26, 4, '2019-06-17 21:52:18'),
(28, 27, 4, '2019-06-17 21:52:18'),
(29, 28, 3, '2019-06-17 21:52:18'),
(30, 29, 3, '2019-06-17 21:52:19'),
(31, 96, 3, '2019-06-17 22:04:31'),
(32, 97, 5, '2019-06-17 22:04:33'),
(33, 98, 3, '2019-06-17 22:04:36'),
(34, 99, 3, '2019-06-17 22:04:38'),
(36, 101, 3, '2019-06-17 22:04:40'),
(37, 102, 3, '2019-06-17 22:04:42'),
(38, 103, 3, '2019-06-17 22:04:42'),
(39, 104, 5, '2019-06-17 22:04:43'),
(40, 105, 6, '2019-06-17 22:04:45'),
(41, 106, 7, '2019-07-15 05:43:00'),
(45, 110, 5, '2019-07-24 01:05:44'),
(47, 112, 5, '2019-07-24 01:08:46'),
(48, 113, 3, '2019-07-24 01:25:15'),
(49, 114, 7, '2019-07-29 04:24:44'),
(50, 115, 7, '2019-07-29 04:27:02'),
(51, 115, 3, '2019-08-09 06:42:53'),
(52, 116, 3, '2019-08-09 06:45:57'),
(53, 116, 4, '2019-08-09 06:45:57'),
(54, 117, 4, '2019-08-09 19:02:20'),
(55, 118, 3, '2019-08-09 11:22:51'),
(63, 100, 3, '2019-08-25 20:04:37'),
(64, 100, 4, '2019-08-25 20:04:38'),
(65, 119, 3, '2019-09-07 18:11:23'),
(66, 119, 5, '2019-09-07 18:11:23');

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

--
-- Volcado de datos para la tabla `trainings`
--

INSERT INTO `trainings` (`id`, `clubschedule_id`, `member_id`, `created_at`) VALUES
(6, 3, 7, '2019-06-18 05:17:44'),
(7, 3, 7, '2019-06-18 05:24:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `slug` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telephone` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `account_verified_at` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `photo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `online` tinyint(1) NOT NULL,
  `type_account` varchar(15) COLLATE utf8_spanish_ci NOT NULL COMMENT 'tipo de cuenta del usuario: normal, padre o kid',
  `parent_account` int(11) DEFAULT NULL COMMENT 'id de la cuenta padre en caso que la cuenta sea kid',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `slug`, `username`, `telephone`, `password`, `account_verified_at`, `role_id`, `photo`, `online`, `type_account`, `parent_account`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'administrator', 'platformtakeone@gmail.com', NULL, '$2y$10$hZ4Qauf5axJCciSkaz2gZeU1zTpZdxqiDzQnqWaGMzhO60.q9FsSC', '2019-04-23 00:00:00', 4, 'avatar.png', 1, '', NULL, '2019-04-23 00:00:00', '2019-04-23 00:00:00'),
(2, 'Johan Castro ', 'johan-castro', 'Johanc@hotmail.com ', NULL, '$2y$10$hZ4Qauf5axJCciSkaz2gZeU1zTpZdxqiDzQnqWaGMzhO60.q9FsSC', '2019-04-23 21:03:21', 2, 'johanca965-hotmail.com/1556834944-johanca965-hotmail.com.png', 0, '', NULL, '2019-04-24 02:02:46', '2019-05-02 17:09:18'),
(4, 'johan castro 2', 'johan-castro-2', 'johanca96@gmail.com ', NULL, '$2y$10$OVp3OTah8n9XAwmB5bCIb.gtvVwFsu6EIXoEsUb1C5sbdniSHC2Q.', '0000-00-00 00:00:00', 1, 'avatar.png', 0, '1', NULL, '2019-04-24 12:37:54', '2019-04-24 12:37:54'),
(5, 'Ghassan Yusuf', 'ghassan-yusuf', 'ghassan.yousif.83@gmail.com', NULL, '$2y$10$hZ4Qauf5axJCciSkaz2gZeU1zTpZdxqiDzQnqWaGMzhO60.q9FsSC', '2019-04-24 17:16:39', 2, 'ghassan.yousif.83-gmail.com/1556634765-ghassan.yousif.83-gmail.com.png', 0, '', NULL, '2019-04-24 14:10:57', '2019-05-01 11:12:53'),
(6, 'Andres Florez', 'andres-florez', 'af27industries@outlook.com', NULL, '$2y$10$0zlsZZcEl7svgbGRoTxK3eiXkK7yNXva9TPuimejOwPjIMzsJGadm', '2019-04-24 23:04:49', 1, 'avatar.png', 1, '', NULL, '2019-04-25 04:03:30', '2019-04-25 04:03:30'),
(7, 'Ebrahim Al-Haji', 'ebrahim-al-haji', 'Johanca965@hotmail.com', '', '$2y$10$Ygk7FhSddlb9WzzleO1nTekyF8Ur2SrbAC2FGyx.OG.PhkMZqI.na', '2019-07-01 00:00:00', 2, 'braa.aji1388-gmail.com/1556902240-braa.aji1388-gmail.com.png', 0, '', NULL, '2019-05-02 15:41:24', '2019-08-04 20:46:39'),
(11, 'Johan David Castro Palomares', 'johan-david-castro-palomares', 'test-user@hyperlinkse.com', '+57-3222183956', '$2y$10$SJO8E7sBvztCptzPrRNJ5eXI0LBpC8nY4.zrJVmYRNUaQh6vjZkum', '2019-09-08 13:14:54', 1, 'avatar.png', 0, 'father', NULL, '2019-05-02 16:41:07', '2019-08-25 09:54:01'),
(12, 'kahlil algazal ', 'kahlil-algazal', 'k.algazal@icloud.com', NULL, '$2y$10$EQWc1eiDmEQ4aunLc59B2uoxCr5Jzn.xXquxZkvvK5/RWh8Zx0HaC', '2019-05-02 17:36:27', 1, 'k.algazal-icloud.com/1556818176-k.algazal-icloud.com.png', 1, '', NULL, '2019-05-02 17:36:27', '2019-05-02 17:36:27'),
(13, 'Ebrahim Ehab Ebrahim', 'ebrahim-ehab-ebrahim', 'ehab.hassan.bh@gmail.com', NULL, '$2y$10$Xcgm31WK6bwZLaq7vEjAIODQRB25fX7Kh.LHxq1IAudiOT2u1KOlG', '2019-05-04 08:38:25', 1, 'ehab.hassan.bh-gmail.com/1556959005-ehab.hassan.bh-gmail.com.png', 0, '', NULL, '2019-05-04 08:38:25', '2019-05-04 08:38:25'),
(14, 'Ali ebrahim', 'ali-ebrahim', 'm.r-bemo@hotmail.com', NULL, '$2y$10$.m/ljJv6MK3Qt8gsIeDh0OADnUmRJvp0GOlPbWteKw/yRnlZ5zBB2', '2019-05-04 09:30:33', 1, 'm.r-bemo-hotmail.com/1556962226-m.r-bemo-hotmail.com.png', 0, '', NULL, '2019-05-04 09:30:33', '2019-05-04 09:30:33'),
(15, 'Ebrahim Ehab Ebrahim', 'ebrahim-ehab-ebrahim', 'ehab-hassan@hotmail.com', NULL, '$2y$10$J6Lm/oCb1uOuFTZ/6Lyzh.gsPQlGFC9mf657VuwKu7uBAv6ofMtIS', '2019-05-04 10:30:43', 1, 'ehab-hassan-hotmail.com/1556965895-ehab-hassan-hotmail.com.png', 1, '', NULL, '2019-05-04 10:30:43', '2019-05-05 20:23:27'),
(16, 'Ahmed Alsanadi', 'ahmed-alsanadi', 'ahmed.kadhem.ali@gmail.com ', NULL, '$2y$10$eEsVUofc0/BVjOhCgMm4yuss1ttiS1AL0VPCaShbaDi8cyiY/kldm', '2019-05-05 12:55:40', 1, 'ahmed.kadhem.ali-gmail.com/1557060893-ahmed.kadhem.ali-gmail.com.png', 1, '', NULL, '2019-05-05 12:55:40', '2019-05-05 12:55:40'),
(17, 'Ali Ebrahim alghazal', 'ali-ebrahim-alghazal', 'Alibh032@gmali.com', NULL, '$2y$10$mAWG9ZD7XihWRT80V16qpuw.PBfEtO4xsZsoVZ8zvev4wcrVgBR9u', '2019-05-05 14:37:30', 1, 'alibh032-gmali.com/1557067037-alibh032-gmali.com.png', 0, '', NULL, '2019-05-05 14:37:30', '2019-05-05 14:37:30'),
(18, 'Jana Hussain AlSayegh ', 'jana-hussain-alsayegh', 'Hussain.alsayegh.hhs@gmail.com', NULL, '$2y$10$a5R4dcxQFaPg2XZTLmniM.4gRwYpTGFobt8SCJTl5CMw9UKKkZtnW', '2019-05-05 15:40:56', 1, 'hussain.alsayegh.hhs-gmail.com/1557070831-hussain.alsayegh.hhs-gmail.com.png', 1, '', NULL, '2019-05-05 15:40:56', '2019-05-05 15:40:56'),
(19, 'Hasan Mohammed Al Khaja ', 'hasan-mohammed-al-khaja', 'Jalila.s.sharaf@gmail.com ', NULL, '$2y$10$FbtKwHbMxgqv4XoB1xnODeCPuTLhDhwwqsLlfCQzuq0ytzCqTR51m', '2019-05-05 16:54:09', 1, 'jalila.s.sharaf-gmail.com/1557074794-jalila.s.sharaf-gmail.com.png', 1, '', NULL, '2019-05-05 16:54:09', '2019-05-05 16:54:09'),
(20, 'ARNAV NITIN BULAGANNAWAR', 'arnav-nitin-bulagannawar', 'drraj1975@yahoo.com', NULL, '$2y$10$axrhSZDtXZwdF.mHwb5FJOzMU0hxgcamECTUCxXHTM4Lg/sz8iKme', '2019-05-07 15:06:44', 1, 'drraj1975-yahoo.com/1557241422-drraj1975-yahoo.com.png', 0, '', NULL, '2019-05-07 15:06:44', '2019-05-07 15:06:44'),
(21, 'lizeth russi', 'lizeth-russi', 'lizrussi1995@hotmail.com', NULL, '$2y$10$QLyFJM72FLVFfQXCqR0L9.J9vRLNyBQEY3c6THu0.da39XpxhQo8S', '2019-05-10 18:25:04', 1, 'lizrussi1995-hotmail.com/1557512623-lizrussi1995-hotmail.com.png', 0, '', NULL, '2019-05-10 18:25:04', '2019-05-10 18:25:04'),
(22, 'Fatima Hussain Alsayegh ', 'fatima-hussain-alsayegh', 'hussainalsaegh3084@gmail.com', NULL, '$2y$10$bxa4H4Exb58ab8q9Yumfh.v6Xz0lLt/pAbHH1gjBSn1XSn0XRVuTC', '2019-05-12 13:37:22', 1, 'hussainalsaegh3084-gmail.com/1557668052-hussainalsaegh3084-gmail.com.png', 1, '', NULL, '2019-05-12 13:37:22', '2019-06-11 17:06:19'),
(23, 'Alvin Thomas', 'alvin-thomas', 'thomas@dtconsultancy. net', NULL, '$2y$10$x52JvCgmevmG7clOwjOQxeRVucHd03wV23qan6lZlGvlUe8G0RZoW', '2019-05-13 19:19:05', 1, 'thomas-dtconsultancy.-net/1558376835-thomas-dtconsultancy.-net.png', 1, '', NULL, '2019-05-13 19:19:05', '2019-05-20 21:28:37'),
(24, 'Nirvaan Vadgaonkar ', 'nirvaan-vadgaonkar', 'pallavinayak@live.in', NULL, '$2y$10$a9vWRSZxAZ5f4h99rlvh/OT3pKgA9vprh3..pOSARkLa880Jh33Qa', '2019-05-16 14:16:40', 1, 'pallavinayak-live.in/1558016188-pallavinayak-live.in.png', 1, '', NULL, '2019-05-16 14:16:40', '2019-05-16 14:16:40'),
(25, 'RASHED TAREQ', 'rashed-tareq', 'tthawadi@yahoo.com', NULL, '$2y$10$qPg21dbaf4sAlv/ciGsRneRYGgMKlE2GOKnmgIH6BKYcazQzAcamS', '2019-05-16 14:36:53', 1, 'tthawadi-yahoo.com/1558017116-tthawadi-yahoo.com.png', 1, '', NULL, '2019-05-16 14:36:53', '2019-05-16 14:36:53'),
(26, 'Talal', 'talal', 'emanmbk@yahoo.com', NULL, '$2y$10$3nQ78.umtVRxSDUv2.uNKuHnCcb4IRJJL6B8xKxtfOMQ.HyEGaiaq', '2019-05-22 18:37:13', 1, 'emanmbk-yahoo.com/1558550223-emanmbk-yahoo.com.png', 1, '', NULL, '2019-05-22 18:37:13', '2019-05-22 18:37:13'),
(27, 'Hassan Jassim Ali', 'hassan-jassim-ali', 'h.j-3372@hotmail.com', NULL, '$2y$10$12gA7BOWaDQoK0JrRWsSluy7d10qv23WJNz7Xds0Q4o0tOJdBSHVi', '2019-05-30 15:41:35', 1, 'h.j-3372-hotmail.com/1559231015-h.j-3372-hotmail.com.png', 1, '', NULL, '2019-05-30 15:38:56', '2019-05-30 18:44:34'),
(28, 'Zainab husain Ali habib algallaf ', 'zainab-husain-ali-habib-algallaf', 'Xf19@hotmail.com', NULL, '$2y$10$.D/tMBf..ElYppPYHoGtxuPb4/FCvQ.xnrxAuEynqSczzkgbnKXGe', '2019-06-02 16:33:10', 1, 'xf19-hotmail.com/1559482346-xf19-hotmail.com.png', 1, '', NULL, '2019-06-02 16:33:10', '2019-06-02 16:33:10'),
(29, 'Ali husain Ali habib algallaf', 'ali-husain-ali-habib-algallaf', 'Ettravel0@gmail.com', NULL, '$2y$10$pWGxrvCmbJydLyaZ8ME4aub3bqQ5GXZWgcxWuQ5d4HCPWZNYsA0Ye', '2019-06-02 16:42:12', 1, 'ettravel0-gmail.com/1559482922-ettravel0-gmail.com.png', 1, '', NULL, '2019-06-02 16:42:12', '2019-06-02 16:42:12'),
(30, 'Marvin', 'marvin', 'marvin.evangelista@kar-group.com', NULL, '$2y$10$s/e.KXs.qaim6dwWLaQq/uol9MZ4lxinhyUcWWU1vexHh/9r5xjte', '2019-06-10 19:49:35', 1, 'marvin.evangelista-kar-group.com/1560258699-marvin.evangelista-kar-group.com.png', 0, '', NULL, '2019-06-10 19:49:35', '2019-06-11 16:14:21'),
(31, 'Myziah', 'myziah', 'maryannmyziah@gmail.com', NULL, '$2y$10$IsXXQi0QvJ.EMgJJ/SbzI.wS92zKvpzuIyKHb6jBmt0f/VKdq9c7G', '2019-06-10 19:53:44', 1, 'maryannmyziah-gmail.com/1560259074-maryannmyziah-gmail.com.png', 0, '', NULL, '2019-06-10 19:53:44', '2019-06-11 16:22:21'),
(32, 'Angelica', 'angelica', 'evangelistaangel410@gmail.com', NULL, '$2y$10$tj0qgGwV9lJ.bL4VWnMF/emDaQdoZS5aAMj53KwsLBSRxsZMThsEK', '2019-06-10 19:56:22', 1, 'evangelistaangel410-gmail.com/1560185774-evangelistaangel410-gmail.com.png', 1, '', NULL, '2019-06-10 19:56:22', '2019-06-10 19:56:22'),
(33, 'Abdulla Mohamed Alhamad', 'abdulla-mohamed-alhamad', 'Falhaji78@gmail.com ', NULL, '$2y$10$lE9AnUkEsmUZUgFXYSldOutXabrOynFz4gP6VBCVDyy7Vn5NO8tEW', '2019-06-13 09:54:49', 1, 'falhaji78-gmail.com/1560419470-falhaji78-gmail.com.png', 1, '', NULL, '2019-06-13 09:54:49', '2019-06-13 09:54:49'),
(34, 'Mahmood Saleh Mohsen', 'mahmood-saleh-mohsen', 'Alsaleh79@gmail.com', NULL, '$2y$10$Co.klW/c5vAAVddbC6jdf.HbJqGtclLMTdAcwZJDXqn.jnPUUBBZ2', '2019-06-13 13:26:55', 1, 'alsaleh79-gmail.com/1560432264-alsaleh79-gmail.com.png', 1, '', NULL, '2019-06-13 13:26:55', '2019-06-16 16:00:23'),
(35, 'Tariq Adel', 'tariq-adel', 'Tariqadel209@gmail.com', NULL, '$2y$10$qz66nrYhaoDiAUB4iRFB6uAoccmeXncjcOv7XjhTRNW3iZh6k8kQW', '2019-06-13 17:45:23', 1, 'tariqadel209-gmail.com/1560437080-tariqadel209-gmail.com.png', 0, '', NULL, '2019-06-13 17:45:23', '2019-06-15 17:49:02'),
(36, 'Naif Mohammed', 'naif-mohammed', 'al_homed_8j@hotmail.com', NULL, '$2y$10$LPBR9YypT7hkgC4HUJu6.OK5ckCDoBPiZ6ocD1MlfujzfvaI30kje', '2019-06-13 17:48:34', 1, 'al-homed-85hotmail.com/1560611353-al-homed-85hotmail.com.png', 0, '', NULL, '2019-06-13 17:48:34', '2019-06-15 18:24:53'),
(37, 'Mohamed Abdulredha Isa Abdulla Abdulredha', 'mohamed-abdulredha-isa-abdulla-abdulredha', 'isa.reda7@gmail.com', NULL, '$2y$10$CRPu4pXsf79ifo/ECn4DTOwYEqIB6aqS1YwRaaWeEpG7jh0cDz1I2', '2019-06-15 17:01:01', 1, 'isa.reda7-gmail.com/1560610053-isa.reda7-gmail.com.png', 1, '', NULL, '2019-06-15 17:01:01', '2019-06-15 17:47:39'),
(38, 'Yusuf Saqib', 'yusuf-saqib', 'saqib86@live.com', NULL, '$2y$10$wfYIDqb0iuQl.icmjtoEfeG8sVj2yAG4WYu.p6c8Z0BdijhaSWtfa', '2019-06-16 16:27:01', 1, 'saqib86-live.com/1560702282-saqib86-live.com.png', 1, '', NULL, '2019-06-16 16:27:01', '2019-06-16 16:27:01');

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
(2, 2, 47, 'Bucaramanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 02:02:46', '2019-04-24 02:02:46'),
(3, 3, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 12:35:39', '2019-04-24 12:35:39'),
(4, 4, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-24 12:37:54', '2019-04-24 12:37:54'),
(5, 5, 17, 'Jidhafs', NULL, '830108246', NULL, NULL, 'male', 'married', 'O+', '1983-01-30', 'Road 1121, Block 411, House 551, Al-Musalla, Jidhafs', '+97333165444', NULL, NULL, NULL, '2019-04-24 14:10:57', '2019-04-24 14:10:57'),
(6, 6, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-25 04:03:30', '2019-04-25 04:03:30'),
(7, 7, 17, 'Jablt habshi', NULL, '880104252', NULL, NULL, 'male', 'married', 'O+', '1988-01-13', NULL, '+97333233533', 'https://instagram.com/bu_fatoom33?utm_source=ig_profile_share&igshid=msf8a7hypavb', NULL, NULL, '2019-05-02 15:41:24', '2019-05-02 15:41:24'),
(8, 8, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:18:43', '2019-05-02 16:18:43'),
(9, 9, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:29:48', '2019-05-02 16:29:48'),
(10, 10, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 16:39:48', '2019-05-02 16:39:48'),
(11, 11, 47, 'bucaramanga', NULL, '680002', NULL, NULL, NULL, NULL, NULL, NULL, 'calle 8a # 24 - 67', NULL, NULL, NULL, NULL, '2019-05-02 16:41:07', '2019-05-02 16:41:07'),
(12, 12, 17, 'Hamad town', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'single', 'O-', '0000-00-00', '2434', '34579786', 'NULL', 'NULL', 0, '2019-05-02 17:36:27', '2019-05-02 17:36:27'),
(13, 13, 17, 'Isa Town', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'A+', '2004-10-31', 'V.: 1016, R.:1424, Block: 814', '38887771', 'NULL', 'NULL', 0, '2019-05-04 08:38:25', '2019-06-17 05:23:20'),
(14, 14, 17, 'Manama', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'NULL', '1994-06-28', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-05-04 09:30:33', '2019-05-04 09:30:33'),
(15, 13, 17, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-05-04 10:30:43', '2019-05-04 10:30:43'),
(16, 16, 17, 'Hamad Town', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'married', 'i don\'t know', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-05-05 12:55:41', '2019-05-05 12:55:41'),
(17, 17, 17, 'Hand town', 'NULL', 'NULL', 'NULL', 'NULL', 'female', 'single', 'O-', '2003-04-18', '2434', '39277111', 'NULL', 'NULL', 0, '2019-05-05 14:37:30', '2019-05-05 14:37:30'),
(18, 18, 17, 'Sanad', 'NULL', 'NULL', 'NULL', 'NULL', 'female', 'single', 'O+', '2008-03-05', 'Home 2191 Road 4379 Block 743 Sanad ', '38887388', 'NULL', 'NULL', 0, '2019-05-05 15:40:56', '2019-05-05 15:40:56'),
(19, 19, 17, 'Isa Town ', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'NULL', 'NULL', '2012-04-11', '784 Road 204 Block 802', '36717939', 'Hasanalkhaja ', 'NULL', 0, '2019-05-05 16:54:09', '2019-05-05 16:54:09'),
(20, 20, 17, 'Isa Town ', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'B+', '2009-12-06', 'Flat 14, Building 14, Road 19, Block 801', 'NULL', 'NULL', 'NULL', 0, '2019-05-07 15:06:44', '2019-05-07 15:06:44'),
(21, 21, 47, 'Leticia', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'sin direccion', 'NULL', 'NULL', 'NULL', 0, '2019-05-10 18:25:04', '2019-05-10 18:25:04'),
(22, 22, 17, 'Salmabad', 'NULL', 'NULL', 'NULL', 'NULL', 'female', 'single', 'O+', '2011-03-16', 'Villa 940 road 632 block 706', '36444194', 'NULL', 'NULL', 0, '2019-05-12 13:37:22', '2019-05-12 13:37:22'),
(23, 23, 17, 'Tubli', 'asd', '120509318', 'NULL', 'NULL', 'male', 'single', 'A+', '2012-05-30', 'Flat-23,Building-556,Block-711,Road-1111', '36155121', 'NULL', 'NULL', 0, '2019-05-13 19:19:05', '2019-06-17 05:19:31'),
(24, 24, 17, 'West riffa', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'A+', '2014-09-25', 'Flat 32, road-1632, building-1257, block 916, ', '38363610', 'NULL', 'NULL', 0, '2019-05-16 14:16:40', '2019-05-16 14:16:40'),
(25, 25, 17, 'ZAYED TOWN', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'O+', '2011-06-23', 'HOUSE 123 ROAD 2001 BLOCK 720', '39444629', 'NULL', 'NULL', 0, '2019-05-16 14:36:53', '2019-05-16 14:36:53'),
(26, 26, 17, 'Tubli', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'NULL', 'NULL', '2011-10-23', 'NULL', '33308885', 'NULL', 'NULL', 0, '2019-05-22 18:37:13', '2019-05-22 18:37:13'),
(27, 27, 17, 'Banijamrah', NULL, '980801877', NULL, NULL, 'male', 'married', 'O+', '1998-08-08', '696', '36854585', NULL, NULL, NULL, '2019-05-30 15:38:56', '2019-05-30 15:38:56'),
(28, 28, 17, 'Aali', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-06-02 16:33:10', '2019-06-02 16:33:10'),
(29, 29, 17, 'Aali', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-06-02 16:42:12', '2019-06-02 16:42:12'),
(30, 30, 17, 'mahooz', 'NULL', '780341619', 'NULL', 'NULL', 'male', 'married', 'B+', '1978-03-01', 'NULL', '66399379', 'NULL', 'NULL', 0, '2019-06-10 19:49:35', '2019-06-10 19:49:35'),
(31, 31, 17, 'mahooz', 'NULL', 'NULL', 'NULL', 'NULL', 'female', 'single', 'NULL', '2012-08-27', 'NULL', '66399379', 'NULL', 'NULL', 0, '2019-06-10 19:53:44', '2019-06-10 19:53:44'),
(32, 32, 17, 'mahooz', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-06-10 19:56:22', '2019-06-10 19:56:22'),
(33, 33, 17, 'Jabelt habshi', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'A+', '2014-06-24', 'Flat21 building630 road3514 block435', '33364414', 'NULL', 'NULL', 0, '2019-06-13 09:54:49', '2019-06-13 09:54:49'),
(34, 34, 17, 'Aali', 'NULL', '110706129', 'NULL', 'NULL', 'male', 'single', 'i don\'t know', '2011-07-19', 'Flat 12 building 347 road 4011 aali 740', '39811152', 'NULL', 'NULL', 0, '2019-06-13 13:26:55', '2019-06-13 13:26:55'),
(35, 35, 17, 'isa town', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', '33686881', 'NULL', 'NULL', 0, '2019-06-13 17:45:23', '2019-06-13 17:45:23'),
(36, 36, 17, 'manama', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'NULL', 'NULL', '0000-00-00', 'NULL', '33380381', 'NULL', 'NULL', 0, '2019-06-13 17:48:34', '2019-06-13 17:48:34'),
(37, 37, 17, 'Abu quwa', 'NULL', '120163926', 'NULL', 'Nothing ', 'male', 'single', 'i don\'t know', '2012-01-22', '1792', '39001005', 'NULL', 'NULL', 0, '2019-06-15 17:01:01', '2019-06-15 17:01:01'),
(38, 38, 17, 'Tubli', 'NULL', 'NULL', 'NULL', 'NULL', 'male', 'single', 'AB+', '2015-05-03', 'NULL', '34073276', 'NULL', 'NULL', 0, '2019-06-16 16:27:01', '2019-06-16 16:27:01'),
(50, 48, 47, 'AchÃ­', '', '680002', '', '', '', '', '', '0000-00-00', 'calle 11 # 27-51', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 49, 47, 'Leticia', '', '0000', '', '', '', '', '', '0000-00-00', 'calle 11 # 27-51', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(53, 40, 47, 'bucaramanga', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-08-09 06:45:56', '2019-08-09 06:45:56'),
(54, 41, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 06:52:17', '2019-08-09 06:52:17'),
(55, 42, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 06:56:20', '2019-08-09 06:56:20'),
(56, 43, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 17:29:28', '2019-08-09 17:29:28'),
(57, 44, 47, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-08-09 17:30:58', '2019-08-09 17:30:58'),
(58, 45, 47, 'Abejorral', 'NULL', '0000', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-08-09 19:02:19', '2019-08-09 19:02:19'),
(59, 46, 47, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-08-09 18:15:49', '2019-08-09 18:15:49'),
(60, 47, 47, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-08-09 18:22:24', '2019-08-09 18:22:24'),
(61, 48, 47, 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '0000-00-00', 'NULL', 'NULL', 'NULL', 'NULL', 0, '2019-08-09 18:22:51', '2019-08-09 18:22:51');

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
-- Indices de la tabla `suscription_packages`
--
ALTER TABLE `suscription_packages`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `club_notifications`
--
ALTER TABLE `club_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT de la tabla `club_packages`
--
ALTER TABLE `club_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `club_schedule`
--
ALTER TABLE `club_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `club_trainners`
--
ALTER TABLE `club_trainners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `member_packages`
--
ALTER TABLE `member_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `notification_sends`
--
ALTER TABLE `notification_sends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `product_sales`
--
ALTER TABLE `product_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `suscriptions`
--
ALTER TABLE `suscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `suscription_packages`
--
ALTER TABLE `suscription_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `user_achievements`
--
ALTER TABLE `user_achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
