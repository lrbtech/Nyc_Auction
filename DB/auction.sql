-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2021 at 08:06 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$e5D4Q5L954x3DeH0.CHqtu0AVXdOaYCtoHkTYBqgjRkxgn.Dm1AI2', '0', NULL, '2020-06-10 06:30:45', '2020-06-10 06:30:45'),
(2, 'Aravind', 'aravind.0216@gmail.com', NULL, NULL, '$2y$10$DhVQJ.K4qMpwU0Hb38x3Z.OUjUwZmnW1NVq9anfOyXwj2/jCLPzGe', '0', NULL, '2020-09-12 10:18:46', '2020-09-12 10:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `auction_vehicles`
--

CREATE TABLE `auction_vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `channel_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_vehicles`
--

INSERT INTO `auction_vehicles` (`id`, `auction_title`, `starting_date`, `starting_time`, `minimum_percentage`, `channel_name`, `status`, `created_at`, `updated_at`) VALUES
(75, 'salvage vehicles', '2021-01-09', '11:00 pm', '10', '01', '0', '2021-01-08 12:32:36', '2021-01-08 23:24:00'),
(76, 'test auction', '2021-01-09', '10:00 am', '20', 'test', '0', '2021-01-08 12:35:26', '2021-01-08 23:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `auction_vehicle_ids`
--

CREATE TABLE `auction_vehicle_ids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `un_bid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_vehicle_ids`
--

INSERT INTO `auction_vehicle_ids` (`id`, `auction_id`, `vehicle_id`, `order_id`, `bid_id`, `starting_price`, `status`, `un_bid`, `created_at`, `updated_at`) VALUES
(92, '75', '30', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(93, '75', '31', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(94, '75', '32', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(95, '75', '33', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(96, '75', '34', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(97, '75', '35', NULL, NULL, NULL, '0', '0', '2021-01-08 23:24:00', '2021-01-08 23:24:00'),
(100, '76', '30', NULL, NULL, NULL, '0', '0', '2021-01-08 23:30:52', '2021-01-08 23:30:52'),
(101, '76', '31', NULL, NULL, NULL, '0', '0', '2021-01-08 23:30:52', '2021-01-08 23:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bid_values`
--

CREATE TABLE `bid_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `sub_title`, `keyword`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Stories Behind Car Brand Names', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). There are many variations of passages of Lorem Ipsum available', '1012654202.jpg', '2020-06-15 00:05:10', '2020-06-15 00:05:10'),
(2, 'Stories Behind Car Names', NULL, NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like). There are many variations of passages of Lorem Ipsum available', '398494747.jpg', '2020-06-15 00:05:29', '2020-06-15 00:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hyundai', '1718626812.png', '2020-06-23 01:18:33', '2021-01-08 01:58:26'),
(2, 'Maruti Suzuki', '1590541435.png', '2020-06-23 01:19:20', '2021-01-08 02:20:00'),
(5, 'Toyoto', '98580026.png', '2020-08-26 07:10:47', '2021-01-08 02:34:07'),
(6, 'Skoda', '415368854.png', '2020-08-26 07:24:44', '2021-01-08 02:25:19'),
(7, 'Mahindra', '1696639488.png', '2020-08-26 08:24:26', '2021-01-08 02:03:38'),
(8, 'Honda', '504383400.png', '2020-08-26 09:10:55', '2021-01-08 02:28:36'),
(9, 'Audi', '1055147493.png', '2020-09-12 05:58:30', '2021-01-08 02:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, '1', 'I 20', NULL, '2020-08-08 10:14:41', '2020-08-08 10:14:41'),
(2, '1', 'Creta', NULL, '2020-08-08 10:14:51', '2020-08-08 10:14:51'),
(3, '2', 'Aurora', NULL, '2020-08-12 00:54:19', '2020-08-12 00:54:19'),
(4, '2', 'Serpent', NULL, '2020-08-12 00:54:30', '2020-08-12 00:54:30'),
(5, '2', 'Basilisk', NULL, '2020-08-12 00:54:36', '2020-08-12 00:54:36'),
(6, '2', 'Mirage', NULL, '2020-08-12 00:54:42', '2020-08-12 00:54:42'),
(7, '2', 'Realm', NULL, '2020-08-12 00:54:48', '2020-08-12 00:54:48'),
(8, '2', 'Empire', NULL, '2020-08-12 00:54:55', '2020-08-12 00:54:55'),
(9, '2', 'Universe', NULL, '2020-08-12 00:55:04', '2020-08-12 00:55:04'),
(10, '2', 'Dawn', NULL, '2020-08-12 00:55:09', '2020-08-12 00:55:09'),
(11, '2', 'Nissan', NULL, '2020-08-12 00:55:15', '2020-08-12 00:55:15'),
(12, '2', 'Swift Dzire', NULL, '2020-08-26 06:41:52', '2020-08-26 06:41:52'),
(13, '5', 'Innova', NULL, '2020-08-26 07:15:17', '2020-08-26 07:15:17'),
(14, '6', 'Rapid', NULL, '2020-08-26 07:26:48', '2020-08-26 07:26:48'),
(15, '7', 'Bolero', NULL, '2020-08-26 08:24:37', '2020-08-26 08:24:37'),
(16, '8', 'Civic', NULL, '2020-08-26 09:11:13', '2020-08-26 09:11:13'),
(18, '1', 'Venue', NULL, '2021-01-08 02:37:53', '2021-01-08 02:37:53'),
(19, '1', 'Grand i10', NULL, '2021-01-08 02:38:07', '2021-01-08 02:38:07'),
(20, '1', 'Verna', NULL, '2021-01-08 02:38:21', '2021-01-08 02:38:21'),
(21, '1', 'Aura', NULL, '2021-01-08 02:38:32', '2021-01-08 02:38:32'),
(22, '1', 'Santro', NULL, '2021-01-08 02:38:44', '2021-01-08 02:38:44'),
(23, '1', 'Tucson', NULL, '2021-01-08 02:38:55', '2021-01-08 02:38:55'),
(24, '1', 'Kona Electric', NULL, '2021-01-08 02:39:22', '2021-01-08 02:39:22'),
(25, '1', 'Elantra', NULL, '2021-01-08 02:39:32', '2021-01-08 02:39:32'),
(26, '1', 'Grand i10 Nios', NULL, '2021-01-08 02:39:47', '2021-01-08 02:39:47'),
(27, '1', 'Sonata', NULL, '2021-01-08 02:40:03', '2021-01-08 02:40:03'),
(28, '1', 'Palisade', NULL, '2021-01-08 02:40:32', '2021-01-08 02:40:32'),
(29, '1', 'Kona Electric 2021', NULL, '2021-01-08 02:40:42', '2021-01-08 02:40:42'),
(30, '1', 'Elantra 2021', NULL, '2021-01-08 02:40:52', '2021-01-08 02:40:52'),
(31, '1', 'Nexo', NULL, '2021-01-08 02:41:03', '2021-01-08 02:41:03'),
(32, '2', 'Swift', NULL, '2021-01-08 02:41:55', '2021-01-08 02:41:55'),
(33, '2', 'Baleno', NULL, '2021-01-08 02:42:04', '2021-01-08 02:42:04'),
(34, '2', 'Ertiga', NULL, '2021-01-08 02:42:13', '2021-01-08 02:42:13'),
(35, '2', 'Vitara Brezza', NULL, '2021-01-08 02:42:23', '2021-01-08 02:42:23'),
(36, '2', 'Alto', NULL, '2021-01-08 02:42:33', '2021-01-08 02:42:33'),
(37, '2', 'Dzire', NULL, '2021-01-08 02:42:47', '2021-01-08 02:42:47'),
(38, '2', 'Wagon R', NULL, '2021-01-08 02:42:57', '2021-01-08 02:42:57'),
(39, '2', 'Celerio', NULL, '2021-01-08 02:43:13', '2021-01-08 02:43:13');

-- --------------------------------------------------------

--
-- Table structure for table `damages`
--

CREATE TABLE `damages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `damage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `damages`
--

INSERT INTO `damages` (`id`, `damage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Water Flood', '0', '2020-07-25 01:29:32', '2020-07-25 01:29:32'),
(2, 'Full Engine  Damage', '0', '2020-08-08 10:15:40', '2020-08-08 10:15:40'),
(3, 'frontpart damage', '0', '2020-09-12 06:01:20', '2020-09-12 06:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_temps`
--

CREATE TABLE `email_temps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_temps`
--

INSERT INTO `email_temps` (`id`, `content`, `logo`, `created_at`, `updated_at`) VALUES
(1, '&lt;h2&gt;This is second level header&lt;/h2&gt;\r\n&lt;p&gt;This template lets you select from a range of different text and image formatting for your email content. These are just samples of the formatting you can choose from when you add your content in the next step.&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;This template lets you select from&lt;/li&gt;\r\n&lt;li&gt;Range of different text and image formatting for your email content&lt;/li&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;These are just samples&lt;/li&gt;\r\n&lt;li&gt;Formatting you can&lt;/li&gt;\r\n&lt;li&gt;Choose from&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;li&gt;When you add your content in the next step&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '203401708.png', NULL, '2020-09-17 08:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_passwords`
--

CREATE TABLE `member_passwords` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_10_114607_create_blogs_table', 1),
(5, '2020_06_10_114633_create_site_infos_table', 2),
(6, '2020_06_10_114641_create_sliders_table', 2),
(7, '2020_06_22_133335_create_admins_table', 3),
(8, '2020_06_23_063451_create_brands_table', 4),
(10, '2020_06_23_100501_create_vehicles_table', 5),
(11, '2020_06_23_100508_create_vehicle_images_table', 5),
(12, '2020_07_21_085117_create_member_passwords_table', 6),
(13, '2020_07_24_080937_create_vehicle_types_table', 7),
(14, '2020_07_24_095223_create_push_notifications_table', 8),
(15, '2020_07_25_063121_create_damages_table', 9),
(18, '2020_07_25_064214_create_cars_table', 10),
(19, '2020_07_27_074835_create_banks_table', 10),
(20, '2020_07_27_075651_create_deposits_table', 10),
(21, '2020_08_07_133647_create_auction_vehicles_table', 11),
(22, '2020_08_15_082853_create_withdrawals_table', 12),
(23, '2020_08_30_150354_create_bid_values_table', 13),
(24, '2020_08_30_175929_create_auction_vehicle_ids_table', 14),
(25, '2020_08_31_145730_create_pre_bid_values_table', 15),
(26, '2020_09_05_064421_create_orders_table', 16),
(27, '2020_09_17_114350_create_email_temps_table', 17),
(28, '2016_06_01_000001_create_oauth_auth_codes_table', 18),
(29, '2016_06_01_000002_create_oauth_access_tokens_table', 18),
(30, '2016_06_01_000003_create_oauth_refresh_tokens_table', 18),
(31, '2016_06_01_000004_create_oauth_clients_table', 18),
(32, '2016_06_01_000005_create_oauth_personal_access_clients_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'n4MS0U31fZIghenw2Zmz1HlmnkhpBRHV2q8BSULP', 'http://localhost', 1, 0, 0, '2021-01-04 05:12:51', '2021-01-04 05:12:51'),
(2, NULL, 'Laravel Password Grant Client', '0eKukfNx9K5IZWPhj8aiTHz8LEZJ57FgCy7CxRbP', 'http://localhost', 0, 1, 0, '2021-01-04 05:12:51', '2021-01-04 05:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-01-04 05:12:51', '2021-01-04 05:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auction_vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` int(191) NOT NULL DEFAULT 0,
  `appointment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(191) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pre_bid_values`
--

CREATE TABLE `pre_bid_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `push_notifications`
--

CREATE TABLE `push_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `push_notifications`
--

INSERT INTO `push_notifications` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fhhsfht', 'ghasdadvdvrg', '0', '2020-09-12 06:39:55', '2020-09-12 06:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `site_infos`
--

CREATE TABLE `site_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_iframe` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `how_it_works` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_fees` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_and_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `withdrawal_limit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_infos`
--

INSERT INTO `site_infos` (`id`, `mobile_1`, `mobile_2`, `email_1`, `email_2`, `city`, `state`, `address`, `map_iframe`, `facebook_url`, `twitter_url`, `instagram_url`, `youtube_url`, `linkedin_url`, `google_plus_url`, `about_title`, `about_info`, `how_it_works`, `services`, `member_fees`, `terms_and_conditions`, `logo`, `withdrawal_limit`, `created_at`, `updated_at`) VALUES
(1, '+1-202-555-0137', '+1-202-555-0137', 'dummymail@mail.com', 'yourmail@mail.com', 'Orlando , US', NULL, '514 S. Magnolia St.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14523.868361362094!2d54.3596453!3d24.4865971!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x27f86f27f04b128!2sLRB%20INFO%20TECH%20(Best%20Website%20Design%20%7C%20Web%20Development%20%7C%20Digital%20Marketing%20%7C%20Ecommerce%20%7C%20SEO%20%7C%20IT%20%7C%20Company%20in%20abu%20dhabi%20%7C%20UAE%20)!5e0!3m2!1sen!2sin!4v1591617863833!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', NULL, NULL, NULL, NULL, NULL, NULL, 'ABOUT US', '&lt;div class=&quot;col-md-12&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;p&gt;Established in 2006, we are UAE&#39;s leading car auctioneers with around 5 outlets located all around the UAE. We have consistently delivered superior customer service by bridging the gap between a buyer and a seller. With the abundance of our seller databases, we have always provided the buyer with a wide variety of vehicles to choose from. Honesty and integrity are two of our core principals that guide us in providing a 100% satisfaction to both the buyer and the seller.&lt;/p&gt;\r\n&lt;p&gt;From Shipping services for the seller, to Live online and physical auctions for the buyer, we can offer the service that best suits your needs. New York Car Auto Auctions has got you covered if you want to ship your used car from USA or Canada.&lt;/p&gt;\r\n&lt;p&gt;With Live Online and Physical bidding, buyers can now bid for their chosen car at the comfort of their home or visit us anytime during the auction. By choosing New York Car Auto Auction in UAE, buyers can reduce the cost of selling the car significantly and the buyers can source good quality finds at the touch of their fingertips.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '&lt;p&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;&lt;strong&gt;Seller:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;If you are a seller, please read the following carefully to understand the process involved in selling your car through New York Car Auction in UAE.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Register on our website or visit our office to complete the registration form.&lt;/li&gt;\r\n&lt;li&gt;Read the Terms and Conditions carefully and then sign them.&lt;/li&gt;\r\n&lt;li&gt;Submit pictures of the vehicle from all sides and angles, including the interior.&lt;/li&gt;\r\n&lt;li&gt;Provide details on the usage and/or the extent of the damage.&lt;/li&gt;\r\n&lt;li&gt;Submit the paperwork related to the ownership of the car like the registration, etc.&lt;/li&gt;\r\n&lt;li&gt;Provide us with your estimated sale value.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;p&gt;After all the documents have been submitted, we will review your application and choose to accept or decline the same. The decision will be entirely dependent on the discretion of the company and will be final.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 14px;&quot;&gt;Buyer:&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Interested bidders must read the following process carefully:&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Create a log-in using a valid Email and Phone number.&lt;/li&gt;\r\n&lt;li&gt;Read the Terms and Conditions carefully and accept them.&lt;/li&gt;\r\n&lt;li&gt;Choose the right plan based on the car value you are interested in.&lt;/li&gt;\r\n&lt;li&gt;Make the deposit. (The deposit will usually be around 10% of the Bid Limit Value. Please read the Terms and Conditions for more information.)&lt;/li&gt;\r\n&lt;li&gt;Start bidding online in the comfort of your home using our Live Auction Platform. All the information about the car will be made available.&lt;/li&gt;\r\n&lt;li&gt;Visit our store anytime to bid at one of the Live Physical Auctions.&lt;/li&gt;\r\n&lt;li&gt;Once the car has been sold to the highest bidder, the Deposit will be utilized immediately against the payment. The remaining amount must be cleared within 48 hours.&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;p&gt;&lt;strong&gt;We are providing the following services:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Sell cars through our Online Platform&lt;/li&gt;\r\n&lt;li&gt;Buy Car online from the USA and Canada&lt;/li&gt;\r\n&lt;li&gt;Shipping and Customs Clearance&lt;/li&gt;\r\n&lt;li&gt;Storage Facilities and Auctioning (Online and Physical)&lt;/li&gt;\r\n&lt;/ol&gt;', '&lt;p&gt;We are&amp;nbsp; Auctioning Cars every day From&amp;nbsp;&lt;strong&gt;Saturday&lt;/strong&gt;&amp;nbsp;to&lt;strong&gt;&amp;nbsp;Thursday at 6:00 PM&amp;nbsp;&lt;/strong&gt;and&amp;nbsp;&lt;strong&gt;Special Auction on Friday at 4:00 PM&lt;/strong&gt;&amp;nbsp;through&amp;nbsp;Live&amp;nbsp;&lt;strong&gt;Online&amp;nbsp;&lt;/strong&gt;and&amp;nbsp;&lt;strong&gt;In-House&lt;/strong&gt;&lt;strong&gt;&amp;nbsp;Auction&lt;/strong&gt;.&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;Through&amp;nbsp;Online Bid on our Live Auction along other Bidders, you can win a Bid on your desire Car at Home/Office Comfort.&lt;/p&gt;\r\n&lt;p&gt;In order to get an Online Auction Facility, we have a&amp;nbsp;&lt;strong&gt;Deposit Fee&lt;/strong&gt;&amp;nbsp;for an online Bidder to secure the Bid on the live auction that is&amp;nbsp;&lt;strong&gt;Refundable&amp;nbsp;&lt;/strong&gt;at any time. After paying that Deposit you will get the&amp;nbsp;&lt;strong&gt;User ID&lt;/strong&gt;&amp;nbsp;and&amp;nbsp;&lt;strong&gt;Pass&lt;/strong&gt;&amp;nbsp;with Approved Account Status&amp;nbsp;for Live Online Auction.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Deposit Fee:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;3000 AED&lt;/strong&gt;&amp;nbsp;for 70,000 AED Limit Car&lt;/p&gt;\r\n&lt;p&gt;To bid&lt;strong&gt;&amp;nbsp;&lt;/strong&gt;up-to 70,000 AED worth a Car you have to Deposit 3,000 AED Fee (Deposit is completely refundable anytime or can be adjusted with the purchased car).&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;You can pay this Fee by visiting our Auction House (2nd Industrial Area, Sharjah) or can Send us through Remittance (We will provide the detail on demand).&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;For In-house Auction, please visit our Auction House every Sunday,&amp;nbsp;Tuesday, and Thursday&amp;nbsp;Live Auction and place your Bid for&amp;nbsp;Free (&lt;/strong&gt;No&amp;nbsp;&lt;strong&gt;Registration&lt;/strong&gt;&amp;nbsp;and&amp;nbsp;&lt;strong&gt;Fee&lt;/strong&gt;&amp;nbsp;Required for In-house Bidder&lt;strong&gt;).&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;If you are not registered Member then You can register yourself on our website and participate Online in a Live Auction.&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;For registration, you can follow&amp;nbsp;the link.&amp;nbsp;&lt;br /&gt;&lt;br /&gt;We will also send you the detail for our auction list through Whatsapp before the auction so you can better make your mind for your desire Car.&lt;/p&gt;\r\n&lt;p&gt;Kindly don&#39;t hesitate to contact us for any query @&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;For regular update, Kindly do like our&amp;nbsp;&lt;strong&gt;Facebook&amp;nbsp;Page&lt;/strong&gt;&amp;nbsp;(&amp;nbsp;&amp;nbsp;) And follows on&amp;nbsp;&lt;strong&gt;Instagram&lt;/strong&gt;&amp;nbsp;(&amp;nbsp;&amp;nbsp;).&lt;/p&gt;', '&lt;p&gt;&lt;strong&gt;English Language:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;Any user of our services online and or offline is liable to have read and understood these Terms and Conditions. In this document, terms like &amp;ldquo;We&amp;rdquo;, &amp;ldquo;Us&amp;rdquo;, &amp;ldquo;Our&amp;rdquo;, are invariably a reference to New York Car Auction Co. LLC. By continuing the use of the Website, the user is in acceptance of our Terms and Conditions.&lt;/p&gt;\r\n&lt;p&gt;If you don&amp;rsquo;t accept or agree to our Terms and Conditions, please stop using our services immediately and contact us for any further clarification. New York Car Auction Co. LLC reserves the right to change, in any way, shape or form, the Terms and Conditions without any prior notice to you. We will not be held liable in case of any issues that may arise while the use of our services.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Buyer Terms and Conditions:&lt;/strong&gt;&lt;br /&gt;By signing up, you are accepting the terms and conditions set forth. New York Car Auction Co. LLC shall not be held liable in the case of disputes arising after the bidding has been won. We relinquish all liability related to the transaction. The used cars / vehicles that are sold will be sold &amp;lsquo;as is&amp;rsquo; and the buyer is liable to have checked and examined the car / vehicle before bidding. We are not responsible to verify the accuracy of the information provided by the seller of the Car / vehicle.&lt;/p&gt;\r\n&lt;p&gt;Any issues resulting from faulty information about the car / vehicle are not the responsibility of New York Car Auction Co. LLC. After the bidding process is complete, and the highest bidder has been sold the car, the deposit will be used as the basis for the payment. The remaining amount mustbe cleared within 48 hours of the bidding. Failure to do so will result in the revoking of the bid with the deposit being non-refundable.&lt;/p&gt;\r\n&lt;p&gt;If the buyer has made a bid and decides that they don&amp;rsquo;t want the car / vehicle, the deposit will be charged and will be non-refundable. In the case of the buyer making no bids whatsoever, the deposit can be reclaimed at the time of deactivating the account. However, as long as the account remains active, the deposit cannot be withdrawn.&lt;/p&gt;\r\n&lt;p&gt;&lt;br /&gt;&lt;strong&gt;Seller Terms and Conditions:&lt;/strong&gt;&lt;br /&gt;New York Car Auction Co. LLC hereby renounces all the obligations and liabilities with regards to the sale of your car / vehicle. Our commission will be charged on the Bid Limit Value and it will be a fixed percentage charge for our services. New York Car Auction Co. LLC will not be responsible for guaranteeing the safety and security of the car / vehicle if the shipping services are availed.&lt;/p&gt;\r\n&lt;p&gt;Any issues resulting from damage during the shipping must be taken up with the Shipping Company; we will not be held liable for the same. All the fees and payments must be cleared in a timely manner.&lt;/p&gt;\r\n&lt;p&gt;Failure to do so will result in the agreement becoming void. If the car / vehicle has already been shipped to the UAE and the Seller wishes to withdraw the car from the auction, they will be responsible for arranging for the shipping and removal of the car / vehicle from our storage facility within 3 business days.&lt;/p&gt;\r\n&lt;p&gt;Once the bidding process has begun for the car, it cannot be withdrawn. The Seller is responsible for providing us with the accurate documentation that we request before we accept the car for the auction. We may choose to accept or reject any car / vehicle. The decision will be final and it will depend on the sole discretion of New York Car Auction Co. LLC&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Payment &amp;amp; Privacy Terms:&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Privacy Terms:&lt;/strong&gt;&amp;nbsp;The website will use cookies to enhance the user experience. All the information that is provided to us by you is done so voluntarily. New York Car Auction Co. LLC, or any persons associated with it, will never sell or distribute your private information including your E-mail, Contact Number and/or your payment information.&lt;/p&gt;\r\n&lt;p&gt;However, New York Car Auction Co. LLC will not be held responsible for the leak of the said information. The private information will only be used to contact you and to make the payment or the deposit.&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;Payment Terms:&lt;/strong&gt;&amp;nbsp;We do not&amp;nbsp; accept Credit and Debit Cards as of now, payments can be made via Direct Bank Transfer and cash. Once the payment has been made, you will receive a notification on your email and the mobile number provided.&lt;/p&gt;\r\n&lt;p&gt;In the event of New York Car Auction Co. LLC paying the Seller the sale amount of the car, the amount will be sent to the Seller using their preferred method after the deduction of our commission. New York Car Auction Co. LLC will not be held responsible for any issues relating to the amount being paid. Any issues arising out of the misunderstanding of these Terms and Conditions cannot be used against New York Car Auction Co. LLC at any given moment.&lt;/p&gt;\r\n&lt;p&gt;The Website contains hypertext links to websites that are not operated by us or by our associated companies. We do not control such websites and are not responsible for their content. Our inclusion of hypertext links to such websites does not imply any endorsement of the material contained on the websites or of the owners.&lt;/p&gt;\r\n&lt;p&gt;To gain access to certain services on the Website you will need to register (free of charge). As part of the registration process, you will select a username and password. You agree that the information supplied with your registration will be truthful, accurate and complete.&lt;/p&gt;\r\n&lt;p&gt;You also agree that you will not attempt to register in the name of any other individual nor will you adopt any username with we deem to be offensive. All personal information supplied by you as part of the registration process will be protected.&lt;/p&gt;\r\n&lt;p&gt;Our website (www.New York Carautoauction.com) uses &#39;cookie&#39; The cookies we use do not reveal any personal information about you. Cookies help us improve your experience of the Site and also help us understand what content you are interested.&lt;/p&gt;\r\n&lt;p&gt;You are always free to decline our cookies if your browser permits, although doing so may interfere with your use of the Site. Except as expressly permitted by these terms and conditions, you may not copy, reproduce, redistribute, download, republish, transmit, display, adapt, alter, create derivative works from or otherwise extract or re-utilize any of the contents of the Website. In particular, you must not cache any of the contents for access by third parties nor mirror or frame any of the content of the Website nor incorporate it into another website without our express written permission.&lt;/p&gt;\r\n&lt;p&gt;We make no warranty that the Website (or websites which are linked to the Website) is free from computer viruses or any other malicious or impairing computer programs. It is your responsibility to ensure that you use appropriate virus checking software. We are not liable for any failure to perform any of our obligations under these terms and conditions caused by matters beyond our reasonable control.&lt;/p&gt;\r\n&lt;p&gt;If you do not agree to obey these terms and conditions, you must stop using the platforms we are providing. We also keep updating our Terms and Conditions as we update and improve our services and introduce new features and or functions or services with in our company (online and or offline). It is your sole responsibility to keep your self updated with the terms and conditions statement and privacy policies. If you have any questions, you can get in touch with us using the following information for correspondence.&lt;/p&gt;', '994420274.png', '200', NULL, '2020-06-15 00:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `url`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Accelerate Your Dreams', 'Buy your car on New York car Auction', NULL, '537221141.jpg', '2020-06-13 11:43:10', '2020-06-13 11:43:10'),
(2, 'We\'re Your One Stop <br /> Destination for That !', NULL, NULL, '430844800.jpg', '2020-06-13 11:43:45', '2020-06-13 11:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `busisness_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_extension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `most_intrested` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buy_vehicles_for` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `otp` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firebase_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `upload_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_passport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_emirate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `busisness_type`, `company_name`, `address`, `country`, `state`, `city`, `postal_code`, `phone_number`, `phone_extension`, `most_intrested`, `buy_vehicles_for`, `wallet`, `role_id`, `otp`, `firebase_key`, `status`, `upload_image`, `upload_passport`, `upload_emirate_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(52, 'aravind', 'aravind.0216@gmail.com', NULL, '$2y$10$e5D4Q5L954x3DeH0.CHqtu0AVXdOaYCtoHkTYBqgjRkxgn.Dm1AI2', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', NULL, '0', '0', '7287', NULL, '0', '1208290140.jpg', NULL, NULL, NULL, '2020-08-30 09:56:46', '2021-01-05 09:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lot_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_bid_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exterior_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interior_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `odometer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `engine_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highlights` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primary_damage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transmission` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_damage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cylinders` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keys` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bid_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_enable_future_vehicles` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_visible_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `drive` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `lot_number`, `car_id`, `brand_id`, `vehicle_model`, `vehicle_status`, `colour`, `vehicle_type`, `price`, `minimum_bid_value`, `year`, `document_type`, `exterior_color`, `interior_color`, `odometer`, `engine_type`, `highlights`, `primary_damage`, `transmission`, `secondary_damage`, `cylinders`, `fuel`, `vin`, `keys`, `body_style`, `sales_type`, `description`, `image`, `bid_id`, `is_enable_future_vehicles`, `is_visible_website`, `drive`, `location`, `status`, `created_at`, `updated_at`) VALUES
(29, NULL, '12', '2', 'VXi', 'Old', 'White', '1', '695000', '1000', '2017', 'clear', 'White', NULL, '26,600 km', '1.2 Vxi BSIV', NULL, NULL, 'Manual', NULL, '4', 'Petrol', '0001', 'Manual key', 'Sedan', 'On Reserve', '<p>Engine Type : BS 6</p>', '1162312672.webp', '128', '1', '1', 'FWD', 'Dubai Industrials', '1', '2020-08-26 07:00:07', '2020-09-12 11:25:53'),
(30, NULL, '13', '5', '2.5 GX BS IV', 'Old', 'white', '1', '1200000', '500', '2015', 'clear', 'white', NULL, '26000 km', '2.5', NULL, NULL, 'Manual', NULL, '4', 'Diesel', '0002', 'Remote key', 'SUV', 'On Reserve', NULL, '174973685.webp', '127', '1', '1', 'RWD', NULL, '0', '2020-08-26 07:23:25', '2020-09-06 01:05:57'),
(31, NULL, '14', '6', '1.5 TDI CR', 'Old', 'Silver', '1', '690000', '500', '2015', 'Clear', 'Silver', 'Beige', '60,000 KM', 'BS IV', NULL, NULL, 'Automatic', NULL, '4', 'Diesel', '0003', 'Remote Controlled key', 'Sedan', 'On Reserve', NULL, '1110853525.webp', '87', '0', '1', 'FWD', NULL, '0', '2020-08-26 07:46:22', '2020-09-01 03:26:37'),
(32, NULL, '1', '1', 'i20 Active', 'Old', 'white', '1', '600000', '500', '2016', 'clear', 'white', 'Beige', '33,062 km', 'BS IV', NULL, NULL, 'Manual', NULL, '4 cylinder', 'Petrol', '0004', 'Remote Controlled key', NULL, 'On Reserve', NULL, '1948597218.webp', '131', '1', '1', 'Front Wheel Drive', NULL, '0', '2020-08-26 08:06:59', '2020-09-06 09:36:34'),
(33, NULL, '2', '1', '1.6 SX Plus Auto', 'Old', 'Bordeaux/Maroon', '1', '1550000', '500', '2019', 'Clear', 'Bordeaux/Maroon', 'Grey', '12,500 km', 'BS VI', NULL, NULL, 'Automatic', NULL, '4 cylinder', 'Diesel', '0005', 'Remote Controlled key', 'SUV', 'On Reserve', NULL, '185262435.webp', '82', '1', '1', 'Front Wheel Drive', NULL, '0', '2020-08-26 08:13:43', '2020-08-31 11:19:15'),
(34, NULL, '12', '2', 'ZDi', 'Old', 'Blue', '1', '795000', '1000', '2018', 'Clear', 'Blue', 'Beige', '20,321 km', 'BS IV', NULL, NULL, 'Manual', NULL, NULL, 'Diesel', '0006', 'Remote Controlled key', 'Sedan', 'On Reserve', NULL, '246976188.webp', NULL, '1', '1', 'Front Wheel Drive', NULL, '0', '2020-08-26 08:21:00', '2020-08-30 08:49:14'),
(35, NULL, '15', '7', 'ZLX', 'Old', 'White', '1', '750000', '500', '2016', 'Clear', 'White', 'Brown', '87,000 km', NULL, NULL, NULL, 'Manual', '1', NULL, 'Diesel', '0007', 'Manual Controlled key', 'SUV', 'On Reserve', NULL, '592973581.webp', '112', '1', '1', '4 Wheel Drive', NULL, '0', '2020-08-26 08:30:39', '2020-09-05 09:45:15'),
(37, NULL, '1', '5', '2020', 'New', NULL, '9', '2000', '2500', '2020', NULL, 'green', 'black', NULL, 'lmompom', 'mpm;,mp', '3', 'lmpojlmpo', '1', '2', '1', 'sssssd', 'sdsa', 'Couple', 'On Reserve', NULL, '1121836362.jpg', NULL, '1', '1', 'xvss', 'delhi', '0', '2020-09-12 06:23:42', '2020-09-12 06:23:42'),
(38, NULL, '1', '1', '1900', 'Old', NULL, '9', NULL, NULL, NULL, NULL, 'white', 'white', NULL, NULL, NULL, '2', NULL, '1', NULL, NULL, NULL, NULL, NULL, 'On Reserve', NULL, '1648896376.jpeg', NULL, '1', '1', NULL, NULL, '0', '2020-09-12 07:57:42', '2020-09-12 07:57:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_images`
--

CREATE TABLE `vehicle_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_images`
--

INSERT INTO `vehicle_images` (`id`, `vehicle_id`, `image`, `created_at`, `updated_at`) VALUES
(48, '29', '1162312672.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(49, '29', '1928012816.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(50, '29', '1425558242.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(51, '29', '708786471.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(52, '29', '1368558072.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(53, '29', '1562082641.webp', '2020-08-26 07:00:07', '2020-08-26 07:00:07'),
(54, '30', '1867268034.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(55, '30', '1423405575.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(56, '30', '40143583.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(57, '30', '1973805983.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(58, '30', '1403524719.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(59, '30', '505619006.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(60, '30', '458672450.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(61, '30', '1703208101.webp', '2020-08-26 07:23:25', '2020-08-26 07:23:25'),
(62, '31', '790310393.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(63, '31', '1538524741.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(64, '31', '1859529905.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(65, '31', '252496709.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(66, '31', '1866804634.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(67, '31', '1913791794.webp', '2020-08-26 07:46:22', '2020-08-26 07:46:22'),
(68, '32', '1878154148.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(69, '32', '1798414892.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(70, '32', '1382608151.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(71, '32', '987984329.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(72, '32', '1174587893.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(73, '32', '1059544518.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(74, '32', '700114398.webp', '2020-08-26 08:06:59', '2020-08-26 08:06:59'),
(75, '33', '1603871646.webp', '2020-08-26 08:13:43', '2020-08-26 08:13:43'),
(76, '33', '1819793705.webp', '2020-08-26 08:13:43', '2020-08-26 08:13:43'),
(77, '33', '527799399.webp', '2020-08-26 08:13:43', '2020-08-26 08:13:43'),
(78, '33', '1892707744.webp', '2020-08-26 08:13:43', '2020-08-26 08:13:43'),
(79, '33', '1076727002.webp', '2020-08-26 08:13:43', '2020-08-26 08:13:43'),
(80, '34', '403482873.webp', '2020-08-26 08:21:00', '2020-08-26 08:21:00'),
(81, '34', '907838304.webp', '2020-08-26 08:21:00', '2020-08-26 08:21:00'),
(82, '34', '1476747800.webp', '2020-08-26 08:21:00', '2020-08-26 08:21:00'),
(83, '34', '495896543.webp', '2020-08-26 08:21:00', '2020-08-26 08:21:00'),
(84, '34', '1635427422.webp', '2020-08-26 08:21:00', '2020-08-26 08:21:00'),
(85, '35', '1032959818.webp', '2020-08-26 08:30:39', '2020-08-26 08:30:39'),
(86, '35', '1766144127.webp', '2020-08-26 08:30:39', '2020-08-26 08:30:39'),
(87, '35', '919803790.webp', '2020-08-26 08:30:39', '2020-08-26 08:30:39'),
(88, '35', '1602150303.webp', '2020-08-26 08:30:39', '2020-08-26 08:30:39'),
(94, '37', '2079699947.jpg', '2020-09-12 06:23:42', '2020-09-12 06:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE `vehicle_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Auto Mobile', '0', '2020-07-24 02:48:19', '2020-08-12 05:37:20'),
(2, 'Boat', '0', '2020-07-24 02:48:29', '2020-08-12 05:37:26'),
(7, 'Motorcycles', '0', '2020-08-12 05:42:25', '2020-08-12 05:42:25'),
(8, 'RVs', '0', '2020-08-12 05:42:29', '2020-08-12 05:42:29'),
(9, 'cars', '0', '2020-09-12 05:59:30', '2020-09-12 05:59:30'),
(10, 'ferrari', '0', '2020-09-12 06:00:27', '2020-09-12 06:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `auction_vehicles`
--
ALTER TABLE `auction_vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auction_vehicle_ids`
--
ALTER TABLE `auction_vehicle_ids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bid_values`
--
ALTER TABLE `bid_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damages`
--
ALTER TABLE `damages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_temps`
--
ALTER TABLE `email_temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_passwords`
--
ALTER TABLE `member_passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pre_bid_values`
--
ALTER TABLE `pre_bid_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `push_notifications`
--
ALTER TABLE `push_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_infos`
--
ALTER TABLE `site_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auction_vehicles`
--
ALTER TABLE `auction_vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `auction_vehicle_ids`
--
ALTER TABLE `auction_vehicle_ids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bid_values`
--
ALTER TABLE `bid_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `damages`
--
ALTER TABLE `damages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_temps`
--
ALTER TABLE `email_temps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_passwords`
--
ALTER TABLE `member_passwords`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pre_bid_values`
--
ALTER TABLE `pre_bid_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `push_notifications`
--
ALTER TABLE `push_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_infos`
--
ALTER TABLE `site_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vehicle_images`
--
ALTER TABLE `vehicle_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `vehicle_types`
--
ALTER TABLE `vehicle_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
