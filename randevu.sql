-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2020 at 11:02 AM
-- Server version: 10.2.25-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randevu`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `user_id`, `name`, `phone`, `address`, `active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sürücü Kursu 1', '123456789', 'deneme listesi', 1, NULL, '2015-10-31 19:38:40', '2018-11-06 12:20:21'),
(2, 1, 'Sürücü Kursu 2', '', NULL, 1, NULL, '2015-11-26 19:55:46', '2018-11-06 12:20:12'),
(3, 1, 'Filliale 1', '', NULL, 1, '2015-12-15 12:37:07', '2015-12-15 12:36:30', '2015-12-15 12:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '{\"system\":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Managers', '{\"branch\":1,\"randevu.index\":1,\"randevu.update\":1,\"randevu.edit\":1,\"randevu.store\":1,\"randevu.create\":1,\"randevu.delete\":1,\"randevu.show\":1}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
('2015_10_29_032534_create_settings_table', 3),
('2015_10_29_125509_create_event_table', 3),
('2015_11_01_012744_create_branch_table', 5),
('2015_10_29_010515_create_randevu_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `randevu`
--

CREATE TABLE `randevu` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `staff` int(11) NOT NULL DEFAULT 1,
  `branch` int(11) NOT NULL,
  `name_surname` varchar(200) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `number_people` tinyint(4) NOT NULL DEFAULT 0,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `action_to_be_taken` text NOT NULL,
  `transaction` text NOT NULL,
  `amount` float(8,2) NOT NULL DEFAULT 0.00,
  `discount` float(8,2) NOT NULL DEFAULT 0.00,
  `total` float(8,2) NOT NULL DEFAULT 0.00,
  `continuous_customer` tinyint(4) NOT NULL DEFAULT 0,
  `invoice` tinyint(4) NOT NULL DEFAULT 1,
  `number_of_appointments` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `completion` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `randevu`
--

INSERT INTO `randevu` (`id`, `user_id`, `staff`, `branch`, `name_surname`, `phone`, `number_people`, `start_date`, `end_date`, `transaction_date`, `action_to_be_taken`, `transaction`, `amount`, `discount`, `total`, `continuous_customer`, `invoice`, `number_of_appointments`, `color`, `completion`, `deleted_at`, `created_at`, `updated_at`) VALUES
(57, 1, 1, 1, 'mesut', '01635678', 1, '2015-12-24 08:00:00', '2015-12-24 08:30:00', NULL, 'bhvmbvmn', '', 100.00, 0.00, 100.00, 0, 1, '6nc4DJ0yTw', NULL, 1, '2015-12-15 12:35:43', '2015-12-13 21:27:01', '2015-12-15 12:35:43'),
(58, 1, 0, 0, 'Mesut Demirel', '01635678258', 1, '2015-12-15 11:30:00', '2015-12-15 12:00:00', NULL, 'Massage', '', 20.00, 0.00, 20.00, 0, 1, 'G7Li0eCFrq', NULL, 1, '2015-12-15 12:35:48', '2015-12-14 19:03:28', '2015-12-15 12:35:48'),
(59, 1, 0, 0, 'Mesut Demirel', '123123123', 1, '2016-01-06 02:00:00', '2016-01-06 02:30:00', NULL, 'ggjfgjghj', '', 0.00, 0.00, 0.00, 0, 1, 'jQLiQ46MbS', NULL, 0, '2016-01-06 13:11:46', '2016-01-06 13:11:28', '2016-01-06 13:11:46'),
(60, 1, 0, 0, 'Mesut Demirel', '2113123', 1, '2016-01-06 04:00:00', '2016-01-06 04:30:00', NULL, '1ölklö', '', 30.00, 0.00, 30.00, 0, 1, 'O3BtN6nOXw', NULL, 1, '2016-01-06 13:12:27', '2016-01-06 13:11:56', '2016-01-06 13:12:27'),
(61, 1, 0, 2, 'Mesut Demirel', '01635678258', 1, '2016-01-18 10:00:00', '2016-01-18 10:30:00', NULL, 'Nägel', '', 30.00, 5.00, 25.00, 0, 1, 'StNNGiNJy9', NULL, 1, '2016-01-16 12:29:12', '2016-01-16 12:22:24', '2016-01-16 12:29:12'),
(62, 1, 0, 2, 'hans', '0122222', 1, '2016-01-18 10:00:00', '2016-01-18 10:30:00', NULL, 'Wim', '', 0.00, 0.00, 0.00, 0, 1, 'y3cerPMqdX', NULL, 0, NULL, '2016-01-16 12:25:51', '2016-01-16 12:25:51'),
(63, 1, 0, 0, 'Mesut Demirel', '01635678258', 1, '2016-01-18 10:00:00', '2016-01-18 10:30:00', NULL, '', '', 0.00, 0.00, 0.00, 0, 1, 'fPgzGkXtbu', NULL, 1, NULL, '2016-01-16 12:36:16', '2016-01-20 14:41:02'),
(64, 1, 1, 1, 'Mesut Demirel', '01635678258', 5, '2016-01-19 04:00:00', '2016-01-19 04:30:00', NULL, 'fgfgfgggg', '', 0.00, 0.00, 0.00, 0, 1, '5C4GeX6fBL', NULL, 0, '2016-01-21 07:09:09', '2016-01-21 07:09:04', '2016-01-21 07:09:09'),
(65, 1, 0, 2, 'Marion', '6556', 1, '2016-04-11 09:00:00', '2016-04-11 10:00:00', NULL, 'Fusspflege inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'osGnSrFFmv', NULL, 0, '2016-04-03 17:13:18', '2016-04-03 16:40:50', '2016-04-03 17:13:18'),
(66, 1, 0, 2, 'Marion', '6556', 1, '2016-04-11 09:00:00', '2016-04-11 10:00:00', NULL, 'Fusspflege inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'c70s83eSsC', NULL, 0, '2016-04-03 17:13:22', '2016-04-03 16:40:51', '2016-04-03 17:13:22'),
(67, 1, 0, 0, 'marion', '1466445354', 1, '2016-03-28 09:00:00', '2016-03-28 09:30:00', NULL, 'sdfsdfsddc', '', 0.00, 0.00, 0.00, 0, 1, 'dItzH3hi1y', NULL, 0, '2016-04-03 16:45:11', '2016-04-03 16:43:29', '2016-04-03 16:45:11'),
(68, 1, 0, 1, 'sdd', 'dds', 1, '2016-03-28 04:00:00', '2016-03-28 04:30:00', NULL, 'dads', '', 0.00, 0.00, 0.00, 0, 1, 'rZKGF4st1K', NULL, 0, '2016-04-03 16:47:55', '2016-04-03 16:45:38', '2016-04-03 16:47:55'),
(69, 1, 0, 2, 'sfds', 'fsf', 1, '2016-03-28 07:00:00', '2016-03-28 07:30:00', NULL, 'sfsf', '', 0.00, 0.00, 0.00, 0, 1, 'BUR5MKCMBP', NULL, 0, '2016-04-03 16:50:01', '2016-04-03 16:46:01', '2016-04-03 16:50:01'),
(70, 1, 0, 1, 'sdfs', 'fss', 1, '2016-03-28 05:00:00', '2016-03-28 05:30:00', NULL, 'sffsgf', '', 0.00, 0.00, 0.00, 0, 1, 'F8FLRnEqyM', NULL, 0, '2016-04-03 16:49:57', '2016-04-03 16:46:30', '2016-04-03 16:49:57'),
(71, 1, 0, 1, 'jgjh', 'ujj', 1, '2016-03-28 02:00:00', '2016-03-28 02:30:00', NULL, 'ljl', '', 0.00, 0.00, 0.00, 0, 1, 'GVuJ9rWIQb', NULL, 0, '2016-04-03 16:47:49', '2016-04-03 16:46:58', '2016-04-03 16:47:49'),
(72, 1, 0, 2, 'Marion', '1111111', 1, '2016-04-04 09:00:00', '2016-04-04 10:00:00', NULL, 'Fusspflege inkl Striplac', '', 92.00, 15.00, 77.00, 0, 1, '0OeVNzH9TA', NULL, 1, '2016-04-04 09:14:46', '2016-04-03 16:52:41', '2016-04-04 09:14:46'),
(73, 1, 0, 2, 'Fr Weber', '11111111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'Füsse', '', 0.00, 0.00, 0.00, 0, 1, 'JcbHwaUq6M', NULL, 0, '2016-04-06 09:00:51', '2016-04-03 16:53:49', '2016-04-06 09:00:51'),
(74, 1, 0, 2, 'Fr John', '1111111', 1, '2016-04-05 10:00:00', '2016-04-05 11:00:00', NULL, 'Füsse', '', 0.00, 0.00, 0.00, 0, 1, 'Fl1QVaeXKp', NULL, 0, '2016-04-03 17:14:00', '2016-04-03 16:55:31', '2016-04-03 17:14:00'),
(75, 1, 0, 2, 'Patrick', '111111', 1, '2016-04-04 11:00:00', '2016-04-04 12:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'FkyKOzgQ9c', NULL, 0, '2016-04-06 09:00:58', '2016-04-03 17:03:33', '2016-04-06 09:00:58'),
(76, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'bgIKdYUN6g', NULL, 0, '2016-04-03 17:08:03', '2016-04-03 17:05:21', '2016-04-03 17:08:03'),
(77, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'JLsLl0MW2V', NULL, 0, '2016-04-03 17:07:57', '2016-04-03 17:05:21', '2016-04-03 17:07:57'),
(78, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'Qso4GffY1T', NULL, 0, '2016-04-03 17:07:19', '2016-04-03 17:05:22', '2016-04-03 17:07:19'),
(79, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, '26uWzLINo0', NULL, 0, '2016-04-03 17:06:01', '2016-04-03 17:05:22', '2016-04-03 17:06:01'),
(80, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, '8QcMGAPTLC', NULL, 0, '2016-04-03 17:05:44', '2016-04-03 17:05:22', '2016-04-03 17:05:44'),
(81, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'hFlvLSkfAK', NULL, 0, '2016-04-03 17:05:55', '2016-04-03 17:05:22', '2016-04-03 17:05:55'),
(82, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'Bh3WyoEmGb', NULL, 0, '2016-04-03 17:07:12', '2016-04-03 17:05:22', '2016-04-03 17:07:12'),
(83, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'w6nPiWs11W', NULL, 0, '2016-04-03 17:07:54', '2016-04-03 17:05:22', '2016-04-03 17:07:54'),
(84, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'zQPSEKPoVl', NULL, 0, '2016-04-03 17:07:51', '2016-04-03 17:05:22', '2016-04-03 17:07:51'),
(85, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'Yq1NnlmJ6f', NULL, 0, '2016-04-03 17:07:47', '2016-04-03 17:05:22', '2016-04-03 17:07:47'),
(86, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'RISgAp9cfX', NULL, 0, '2016-04-03 17:07:43', '2016-04-03 17:05:23', '2016-04-03 17:07:43'),
(87, 1, 0, 2, 'jhkh', 'hjh', 1, '2016-04-04 11:30:00', '2016-04-04 12:00:00', NULL, 'vvv', '', 0.00, 0.00, 0.00, 0, 1, 'dEx7TRb1Ag', NULL, 0, '2016-04-03 17:07:35', '2016-04-03 17:05:23', '2016-04-03 17:07:35'),
(88, 1, 0, 2, 'Doris', '11111111', 1, '2016-04-04 09:45:00', '2016-04-04 10:00:00', NULL, 'ABZ', '', 0.00, 0.00, 0.00, 0, 1, 'wnxqz3rT1E', NULL, 1, '2016-04-06 09:01:20', '2016-04-03 17:08:58', '2016-04-06 09:01:20'),
(89, 1, 0, 2, 'Fr John', '111111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'brArtMERt6', NULL, 0, '2016-04-03 17:20:36', '2016-04-03 17:20:17', '2016-04-03 17:20:36'),
(90, 1, 0, 2, 'Fr John', '111111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'anHJI4pruU', NULL, 0, '2016-04-06 09:01:14', '2016-04-03 17:20:18', '2016-04-06 09:01:14'),
(91, 1, 0, 2, 'Fr Sell', '111111', 1, '2016-04-04 12:00:00', '2016-04-04 13:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'PZhWEaOPNn', NULL, 0, '2016-04-06 09:01:29', '2016-04-03 17:21:38', '2016-04-06 09:01:29'),
(92, 1, 0, 2, 'Fr Cooper', '111111', 1, '2016-04-04 13:00:00', '2016-04-04 14:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'AamFfC6H0t', NULL, 0, '2016-04-06 09:01:33', '2016-04-03 17:22:44', '2016-04-06 09:01:33'),
(93, 1, 0, 2, 'Fr Gawenda', '111111', 1, '2016-04-04 14:00:00', '2016-04-04 15:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'EE6c57U8In', NULL, 0, '2016-04-06 09:01:38', '2016-04-03 17:23:48', '2016-04-06 09:01:38'),
(94, 1, 0, 2, 'Fr Krieger', '111111', 1, '2016-04-04 15:00:00', '2016-04-04 16:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'orioXzoISn', NULL, 0, '2016-04-06 09:02:01', '2016-04-03 17:55:01', '2016-04-06 09:02:01'),
(95, 1, 0, 2, 'Alexa', '111111', 1, '2016-04-04 16:00:00', '2016-04-04 17:00:00', NULL, 'H und AB', '', 0.00, 0.00, 0.00, 0, 1, '4iwaTAdBpg', NULL, 0, '2016-04-06 09:02:05', '2016-04-03 17:56:18', '2016-04-06 09:02:05'),
(96, 1, 0, 2, 'Hr Meets', '11111', 1, '2016-04-04 17:00:00', '2016-04-04 18:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, '35QPj1sRKH', NULL, 0, '2016-04-06 09:01:57', '2016-04-03 17:57:19', '2016-04-06 09:01:57'),
(97, 1, 0, 2, 'Hr Meets', '11111', 1, '2016-04-04 17:00:00', '2016-04-04 18:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, '3axGslWpkT', NULL, 0, '2016-04-03 17:57:53', '2016-04-03 17:57:20', '2016-04-03 17:57:53'),
(98, 1, 0, 2, 'Hr Meets', '11111', 1, '2016-04-04 17:00:00', '2016-04-04 18:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'iLHRuuseVR', NULL, 0, '2016-04-03 17:57:48', '2016-04-03 17:57:20', '2016-04-03 17:57:48'),
(99, 1, 0, 2, 'Jeanette', '1111111', 1, '2016-04-04 18:00:00', '2016-04-04 18:30:00', NULL, 'Lasern', '', 0.00, 0.00, 0.00, 0, 1, 'z7zRuaArZs', NULL, 0, '2016-04-06 09:01:46', '2016-04-03 17:58:37', '2016-04-06 09:01:46'),
(100, 1, 0, 2, 'Skreta', '1111111', 1, '2016-04-04 10:45:00', '2016-04-04 11:00:00', NULL, 'Lasern', '', 0.00, 0.00, 0.00, 0, 1, 'DwmG2FkUIS', NULL, 0, '2016-04-06 09:01:02', '2016-04-03 18:00:10', '2016-04-06 09:01:02'),
(101, 1, 0, 2, 'Skreta', '1111111', 1, '2016-04-04 10:45:00', '2016-04-04 11:00:00', NULL, 'Lasern', '', 0.00, 0.00, 0.00, 0, 1, 'KoS4IhK8H0', NULL, 0, '2016-04-03 18:01:12', '2016-04-03 18:00:11', '2016-04-03 18:01:12'),
(102, 1, 0, 2, 'Skreta', '1111111', 1, '2016-04-04 10:45:00', '2016-04-04 11:00:00', NULL, 'Lasern', '', 0.00, 0.00, 0.00, 0, 1, 'u7mOH3c1XV', NULL, 0, '2016-04-03 18:01:06', '2016-04-03 18:00:11', '2016-04-03 18:01:06'),
(103, 1, 0, 2, 'Kata', '111111', 1, '2016-04-04 11:00:00', '2016-04-04 12:00:00', NULL, 'F und AB färben', '', 0.00, 0.00, 0.00, 0, 1, 'jnY69Ug21a', NULL, 0, '2016-04-03 18:02:25', '2016-04-03 18:02:07', '2016-04-03 18:02:25'),
(104, 1, 0, 2, 'Kata', '111111', 1, '2016-04-04 11:00:00', '2016-04-04 12:00:00', NULL, 'F und AB färben', '', 0.00, 0.00, 0.00, 0, 1, 'DCthvtaDUP', NULL, 0, '2016-04-06 09:01:24', '2016-04-03 18:02:07', '2016-04-06 09:01:24'),
(105, 1, 0, 0, 'Fr Lang', '02234601606', 1, '2016-04-04 12:00:00', '2016-04-04 12:30:00', NULL, '?', '', 0.00, 0.00, 0.00, 0, 1, 'aQhmkQcGOD', NULL, 0, '2016-04-06 09:01:06', '2016-04-03 18:04:49', '2016-04-06 09:01:06'),
(106, 1, 0, 0, 'Fr Lang', '02234601606', 1, '2016-04-04 12:00:00', '2016-04-04 12:30:00', NULL, '?', '', 0.00, 0.00, 0.00, 0, 1, 'IJcV74oUlM', NULL, 0, '2016-04-03 18:05:10', '2016-04-03 18:04:49', '2016-04-03 18:05:10'),
(107, 1, 0, 1, 'Fr Longerich', '11111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, '38tzvESyim', NULL, 0, '2016-04-06 09:00:55', '2016-04-03 18:10:27', '2016-04-06 09:00:55'),
(108, 1, 0, 1, 'Fr Longerich', '11111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'tyijOrRJid', NULL, 0, '2016-04-03 18:11:09', '2016-04-03 18:10:28', '2016-04-03 18:11:09'),
(109, 1, 0, 1, 'Fr Longerich', '11111', 1, '2016-04-04 10:00:00', '2016-04-04 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'fp0tJtiVzA', NULL, 0, '2016-04-03 18:11:16', '2016-04-03 18:10:28', '2016-04-03 18:11:16'),
(110, 1, 0, 1, 'Stefanie Treatwell', '11111111', 1, '2016-04-04 13:00:00', '2016-04-04 14:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'RlsiW0yvZu', NULL, 0, '2016-04-06 09:01:10', '2016-04-04 09:01:00', '2016-04-06 09:01:10'),
(111, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-22 09:00:00', '2016-04-22 10:00:00', NULL, 'F inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'xK6AHXYPFD', NULL, 0, '2016-04-06 09:06:20', '2016-04-06 09:00:36', '2016-04-06 09:06:20'),
(112, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-22 09:00:00', '2016-04-22 10:00:00', NULL, 'F inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'y28JBv8xRr', NULL, 0, '2016-04-06 09:06:28', '2016-04-06 09:00:37', '2016-04-06 09:06:28'),
(113, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-22 09:00:00', '2016-04-22 10:00:00', NULL, 'F inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'GRuLcWPwly', NULL, 0, '2016-04-06 09:06:32', '2016-04-06 09:00:37', '2016-04-06 09:06:32'),
(114, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-22 09:00:00', '2016-04-22 10:00:00', NULL, 'F inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'jD6BWBRkC7', NULL, 0, '2016-04-06 09:06:37', '2016-04-06 09:00:37', '2016-04-06 09:06:37'),
(115, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-22 09:00:00', '2016-04-22 10:00:00', NULL, 'F inkl Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'OsagJG8q7j', NULL, 0, '2016-04-06 09:06:45', '2016-04-06 09:00:38', '2016-04-06 09:06:45'),
(116, 1, 0, 2, 'Fr. Schülter', '11111111', 1, '2016-04-11 10:00:00', '2016-04-11 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'J79CM4JEHJ', NULL, 0, NULL, '2016-04-06 09:05:43', '2016-04-06 09:05:43'),
(117, 1, 0, 2, 'Fr. Jeatte', '1111111', 1, '2016-04-11 11:00:00', '2016-04-11 12:00:00', NULL, 'F + Striplac', '', 0.00, 0.00, 0.00, 0, 1, 'wUWp7YxTRf', NULL, 0, NULL, '2016-04-06 09:11:36', '2016-04-06 09:11:36'),
(118, 1, 0, 2, 'Frau Müller', '111111', 1, '2016-04-04 01:00:00', '2016-04-04 01:30:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'bZQ5SjnNFi', NULL, 0, '2016-04-06 09:23:49', '2016-04-06 09:23:36', '2016-04-06 09:23:49'),
(119, 1, 0, 2, 'Frau Müller', '111111', 1, '2016-04-04 01:00:00', '2016-04-04 01:30:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'wXZJplJEPz', NULL, 0, '2016-04-06 09:24:10', '2016-04-06 09:23:37', '2016-04-06 09:24:10'),
(120, 1, 0, 1, 'Fr. Störe', '11111111', 1, '2016-04-11 11:00:00', '2016-04-11 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'FvY4raN0Rt', NULL, 0, NULL, '2016-04-06 09:55:11', '2016-04-06 09:55:11'),
(121, 1, 0, 1, 'Fr. Störe', '11111111', 1, '2016-04-11 11:00:00', '2016-04-11 11:00:00', NULL, 'F', '', 0.00, 0.00, 0.00, 0, 1, 'GA5yCyCYEP', NULL, 0, '2016-04-06 09:55:36', '2016-04-06 09:55:11', '2016-04-06 09:55:36'),
(122, 1, 0, 2, 'test', '123452', 1, '2016-04-08 10:30:00', '2016-04-08 11:00:00', NULL, 'f', '', 0.00, 0.00, 0.00, 0, 1, 'dxzIj1LSF0', NULL, 0, '2016-04-07 07:16:24', '2016-04-07 07:16:10', '2016-04-07 07:16:24'),
(123, 1, 0, 2, 'test', '123452', 1, '2016-04-08 10:30:00', '2016-04-08 11:00:00', NULL, 'f', '', 0.00, 0.00, 0.00, 0, 1, 'iPtHu3rbuZ', NULL, 0, '2016-04-07 07:16:42', '2016-04-07 07:16:10', '2016-04-07 07:16:42'),
(124, 1, 0, 2, 'test', '123452', 1, '2016-04-08 10:30:00', '2016-04-08 11:00:00', NULL, 'f', '', 0.00, 0.00, 0.00, 0, 1, 'x2EOnhGlut', NULL, 0, '2016-04-07 07:16:36', '2016-04-07 07:16:10', '2016-04-07 07:16:36'),
(125, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-14 09:00:00', '2016-04-14 10:00:00', NULL, '', '', 0.00, 0.00, 0.00, 0, 1, '3OhUuJtPam', NULL, 0, NULL, '2016-04-09 07:50:18', '2016-04-09 07:50:18'),
(126, 1, 0, 2, 'Fr Müller', '1111111', 1, '2016-04-14 09:00:00', '2016-04-14 10:00:00', NULL, '', '', 0.00, 0.00, 0.00, 0, 1, 'kCeG0NJntM', NULL, 0, NULL, '2016-04-09 07:50:18', '2016-04-09 07:50:18'),
(127, 1, 1, 1, 'de', '05320139423', 1, '2018-09-26 20:30:00', '2018-09-23 23:00:00', NULL, '', '', 0.00, 0.00, 0.00, 0, 1, 'eWOuHKOOj4', 'blue', 0, NULL, '2018-09-28 09:26:49', '2018-09-28 09:26:49'),
(128, 1, 1, 1, 'deh', '(507) 094-0363', 1, '2018-09-23 23:00:00', '2018-09-23 23:30:00', NULL, 'ddd', '', 0.00, 0.00, 0.00, 0, 1, 'qIj76vsnMd', 'blue', 0, NULL, '2018-09-28 09:27:27', '2018-09-28 09:27:27'),
(129, 1, -1, -1, 'Mehmet Deneme', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, '123tretreterter', '', 0.00, 0.00, 0.00, 0, 1, 'z93tpYqlmW', 'blue', 1, NULL, '2018-11-06 12:24:01', '2018-11-06 12:24:54'),
(130, 1, 2, 1, 'Mehmet Deneme', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, '123tretreterter', '', 0.00, 0.00, 0.00, 0, 1, 'vd6OW4gl2d', 'blue', 1, '2018-11-06 12:26:18', '2018-11-06 12:24:01', '2018-11-06 12:26:18'),
(131, 1, 2, 1, 'Mehmet Deneme', '1234567', 2, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, '123tretreterter', '', 0.00, 0.00, 0.00, 0, 1, 'Cvl0RZtOCY', 'blue', 0, '2018-11-06 12:26:14', '2018-11-06 12:24:01', '2018-11-06 12:26:14'),
(132, 1, 2, 1, 'Mehmet Deneme', '1234567', 2, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, '123tretreterter', '', 0.00, 0.00, 0.00, 0, 1, 'SVG3K3HuvU', 'blue', 0, '2018-11-06 12:26:08', '2018-11-06 12:24:02', '2018-11-06 12:26:08'),
(133, 1, 2, 2, 'Mehmet', 'Deneme2', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'dadasdasdasdadasdasdasdasd', '', 0.00, 0.00, 0.00, 0, 1, 'Lk4QNiLSvy', 'red', 1, NULL, '2018-11-06 12:25:57', '2018-11-06 12:29:43'),
(134, 1, 1, 2, 'Mehmet', 'Deneme2', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'dadasdasdasdadasdasdasdasd', '', 0.00, 0.00, 0.00, 0, 1, 'rKANQ7t4hG', 'red', 0, '2018-11-06 12:27:25', '2018-11-06 12:25:58', '2018-11-06 12:27:25'),
(135, 1, 1, 2, 'Mehmet', 'Deneme2', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'dadasdasdasdadasdasdasdasd', '', 0.00, 0.00, 0.00, 0, 1, '9cqam0DKDk', 'red', 0, '2018-11-06 12:27:22', '2018-11-06 12:25:58', '2018-11-06 12:27:22'),
(136, 1, 1, 2, 'Mehmet', 'Deneme2', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'dadasdasdasdadasdasdasdasd', '', 0.00, 0.00, 0.00, 0, 1, 'xHT9YsJw2x', 'red', 0, '2018-11-06 12:27:19', '2018-11-06 12:25:58', '2018-11-06 12:27:19'),
(137, 1, 2, 1, 'dsadasd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'dsadasdad', '', 0.00, 0.00, 0.00, 0, 1, 'Em1i7QbaV8', 'green', 0, NULL, '2018-11-06 12:37:20', '2018-11-06 12:37:20'),
(138, 1, 2, 2, 'fdsfsdfsf', '1234567', 1, '2018-11-08 09:00:00', '2018-11-08 09:55:00', NULL, 'fdsfdsfsfsdfsf', '', 0.00, 0.00, 0.00, 0, 1, 'i7NpUYtyJ6', 'blue', 0, NULL, '2018-11-06 12:38:23', '2018-11-06 12:38:23'),
(139, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'iV0wmP1WNI', 'green', 0, '2018-11-06 12:39:55', '2018-11-06 12:39:37', '2018-11-06 12:39:55'),
(140, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, '9RBPNj5yS6', 'green', 0, NULL, '2018-11-06 12:39:37', '2018-11-06 12:39:37'),
(141, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'ogBeaQllno', 'green', 0, NULL, '2018-11-06 12:39:38', '2018-11-06 12:39:38'),
(142, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, '22OJ7qPOBP', 'green', 0, NULL, '2018-11-06 12:39:38', '2018-11-06 12:39:38'),
(143, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'fWYnaA6ZFc', 'green', 0, NULL, '2018-11-06 12:39:38', '2018-11-06 12:39:38'),
(144, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, '2m23Ao1Wd1', 'green', 0, '2018-11-06 12:40:01', '2018-11-06 12:39:38', '2018-11-06 12:40:01'),
(145, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'fPX6YDHKvD', 'green', 0, NULL, '2018-11-06 12:39:38', '2018-11-06 12:39:38'),
(146, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'XNMnsKxIaA', 'green', 0, NULL, '2018-11-06 12:39:38', '2018-11-06 12:39:38'),
(147, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'os4vRBt9Cp', 'green', 0, '2018-11-06 12:39:59', '2018-11-06 12:39:38', '2018-11-06 12:39:59'),
(148, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'rIH6sNc6pI', 'green', 0, '2018-11-06 12:40:05', '2018-11-06 12:39:38', '2018-11-06 12:40:05'),
(149, 1, 2, 2, 'gdfgfdgdfgfdgd', '1234567', 1, '2018-11-04 09:00:00', '2018-11-04 09:55:00', NULL, 'gfdgdfgdgdgdfg', '', 0.00, 0.00, 0.00, 0, 1, 'jcSOFVNyFq', 'green', 0, '2018-11-06 12:40:07', '2018-11-06 12:39:38', '2018-11-06 12:40:07');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, '{\"language\":\"de\",\"visitors_appointment_query\":\"telefon\",\"mail_gonderim\":\"false\",\"visitors_appointment\":\"true\",\"staff_assignment\":\"true\",\"appointment_alert\":\"true\",\"home_back_color\":\"#B9DDE1\",\"color_marker\":\"#204CCD\",\"max_appointment\":\" 0 \",\"title\":\"Randevu Sistemi\",\"firma_adi\":\"Demo \\u015eirketi\",\"email\":\"kontakt@vailetkosmetik.de\",\"phone\":\"(02234) 766-05\",\"fax\":\"\",\"adres\":\"Aachener Str 1240\\r\\n50859 K\\u00f6ln\",\"facebook\":\"facebook\",\"twitter\":\"twitter\",\"likedin\":\"likedin\",\"google\":\"google\"}', '2015-12-05 20:11:03', '2015-12-05 20:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT 0,
  `suspended` tinyint(1) NOT NULL DEFAULT 0,
  `banned` tinyint(1) NOT NULL DEFAULT 0,
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 2, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(3, 1, '162.158.88.49', 0, 0, 0, NULL, NULL, NULL),
(4, 2, '162.158.89.78', 0, 0, 0, NULL, NULL, NULL),
(5, 1, '198.41.242.201', 0, 0, 0, NULL, NULL, NULL),
(6, 1, '162.158.89.78', 0, 0, 0, NULL, NULL, NULL),
(7, 1, '198.41.242.26', 0, 0, 0, NULL, NULL, NULL),
(8, 1, '198.41.243.26', 0, 0, 0, NULL, NULL, NULL),
(9, 1, '162.158.88.68', 0, 0, 0, NULL, NULL, NULL),
(10, 1, '141.101.104.174', 0, 0, 0, NULL, NULL, NULL),
(11, 1, '141.101.104.96', 0, 0, 0, NULL, NULL, NULL),
(12, 1, '198.41.242.27', 0, 0, 0, NULL, NULL, NULL),
(13, 1, '162.158.210.23', 0, 0, 0, NULL, NULL, NULL),
(14, 1, '162.158.88.65', 0, 0, 0, NULL, NULL, NULL),
(15, 1, '141.101.105.51', 0, 0, 0, NULL, NULL, NULL),
(16, 1, '198.41.243.27', 0, 0, 0, NULL, NULL, NULL),
(17, 1, '198.41.243.28', 0, 0, 0, NULL, NULL, NULL),
(18, 1, '162.158.89.65', 0, 0, 0, NULL, NULL, NULL),
(19, 1, '141.101.104.140', 0, 0, 0, NULL, NULL, NULL),
(20, 1, '141.101.104.219', 0, 0, 0, NULL, NULL, NULL),
(21, 1, '162.158.210.26', 0, 0, 0, NULL, NULL, NULL),
(22, 1, '198.41.243.25', 0, 0, 0, NULL, NULL, NULL),
(23, 1, '198.41.242.23', 0, 0, 0, NULL, NULL, NULL),
(24, 1, '162.158.94.136', 0, 0, 0, NULL, NULL, NULL),
(25, 1, '198.41.243.24', 0, 0, 0, NULL, NULL, NULL),
(26, 1, '198.41.243.23', 0, 0, 0, NULL, NULL, NULL),
(27, 1, '162.158.94.152', 0, 0, 0, NULL, NULL, NULL),
(28, 1, '162.158.94.168', 0, 0, 0, NULL, NULL, NULL),
(29, 1, '176.88.40.159', 0, 0, 0, NULL, NULL, NULL),
(30, 1, '213.14.33.50', 0, 0, 0, NULL, NULL, NULL),
(31, 1, '85.104.111.176', 0, 0, 0, NULL, NULL, NULL),
(32, 1, '176.54.163.49', 0, 0, 0, NULL, NULL, NULL),
(33, 1, '185.219.176.42', 0, 0, 0, NULL, NULL, NULL),
(34, 1, '176.88.40.224', 0, 0, 0, NULL, NULL, NULL),
(35, 1, '78.190.195.228', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0,
  `activation_code` varchar(255) DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) DEFAULT NULL,
  `reset_password_code` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$ypD65GPQNP0BtGLP7FMNGu5w.8G.p38DbU53aZj8p9N1yMrHKRC7O', NULL, 1, NULL, NULL, '2019-01-12 15:08:45', '$2y$10$15an8OV9rCq38C7P6i9YOOH4gS/AkIZ3uv5/fv2W63Rkfrh0v1wTa', NULL, 'Personel 1', 'Tasarım', NULL, '2015-10-29 06:36:58', '2019-01-12 15:08:45'),
(2, '1@1.com', '$2y$10$TUZU5c.MI94555zoFVgZUuaDF1.AQmj6o6303onKV5a8wn./JzTz.', NULL, 1, 'pgu7srffHksQzr2q0gIMr4Qs3R300OSirJUEqdA0Dc', NULL, NULL, NULL, NULL, 'Öğretmen', 'Öğretmen', NULL, '2018-11-06 12:22:22', '2018-11-06 12:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`);

--
-- Indexes for table `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_activation_code_index` (`activation_code`),
  ADD KEY `users_reset_password_code_index` (`reset_password_code`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`user_id`,`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `randevu`
--
ALTER TABLE `randevu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
