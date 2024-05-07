-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 02:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mazar_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\Admin', 1, '{\"attributes\":{\"password\":\"$2y$10$ys\\/hWBylP7at8u7ZIpeHSu.8lf3estxKG5bTvPAKN0A.dka9.aDju\",\"conditions\":\"[\\\"1\\\",\\\"3\\\",\\\"5\\\",\\\"7\\\",\\\"8\\\",\\\"9\\\"]\",\"colors\":\"[\\\"1\\\",\\\"2\\\",\\\"3\\\"]\",\"updated_by\":1,\"updated_at\":\"2023-01-20T16:40:33.000000Z\"},\"old\":{\"password\":\"$2y$10$Zs1\\/n\\/se2ERLixRcpuQdJe0nC5NY\\/nk1lBQaDzt8bjLZ7rwvuX9JC\",\"conditions\":\"[\\\"1\\\",\\\"3\\\",\\\"5\\\",\\\"9\\\"]\",\"colors\":\"[\\\"1\\\",\\\"2\\\"]\",\"updated_by\":null,\"updated_at\":\"2023-01-20T16:04:37.000000Z\"}}', NULL, '2023-01-20 16:40:33', '2023-01-20 16:40:33'),
(2, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\Admin', 1, '{\"attributes\":{\"password\":\"$2y$10$5yq.0ZBacNwQ7bNhpzS4bulTzYnCP80.d.wCNuRY2mzLXyoae4Kzq\",\"user_code\":\"20001\",\"unit_code\":\"2001\",\"you_unit_code\":\"201\",\"updated_at\":\"2023-01-20T16:40:54.000000Z\"},\"old\":{\"password\":\"$2y$10$ys\\/hWBylP7at8u7ZIpeHSu.8lf3estxKG5bTvPAKN0A.dka9.aDju\",\"user_code\":\"10001\",\"unit_code\":\"1001\",\"you_unit_code\":\"101\",\"updated_at\":\"2023-01-20T16:40:33.000000Z\"}}', NULL, '2023-01-20 16:40:54', '2023-01-20 16:40:54'),
(3, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\Admin', 1, '{\"attributes\":{\"password\":\"$2y$10$5Q.\\/vgKQ4bF.F80IdbdLneGL0I\\/5KJDo3vKso6XwGRRT8.L5Q7Dmm\",\"updated_at\":\"2023-01-20T16:42:57.000000Z\"},\"old\":{\"password\":\"$2y$10$5yq.0ZBacNwQ7bNhpzS4bulTzYnCP80.d.wCNuRY2mzLXyoae4Kzq\",\"updated_at\":\"2023-01-20T16:40:54.000000Z\"}}', NULL, '2023-01-20 16:42:57', '2023-01-20 16:42:57'),
(4, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\Admin', 1, '{\"attributes\":{\"password\":\"$2y$10$\\/\\/dAeeCOpWDS0UX1I.vZAu3k6WnH55s1mz0rP..KFvfRIaw2mkdHa\",\"thumb\":\"user\\/2023\\/January\\/thumb-1-1674233722554.png\",\"updated_at\":\"2023-01-20T16:55:22.000000Z\"},\"old\":{\"password\":\"$2y$10$5Q.\\/vgKQ4bF.F80IdbdLneGL0I\\/5KJDo3vKso6XwGRRT8.L5Q7Dmm\",\"thumb\":null,\"updated_at\":\"2023-01-20T16:42:57.000000Z\"}}', NULL, '2023-01-20 16:55:22', '2023-01-20 16:55:22'),
(5, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"lmKqqHlUMQOOReUt5P4uNrrwpinGGYmcUgZ3D9H4rrYmbwmukpOsMwzz7mfC\"},\"old\":{\"remember_token\":\"Ty5OrQghxHeZUinIxn1XAXBKQTlTkFg0F0hsKadw7sUtHjeiBNiVHfM155Em\"}}', NULL, '2023-01-22 06:13:10', '2023-01-22 06:13:10'),
(6, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"dSlGWAxzlmitVeGVCL1fJdoNTFaT5uN1mynEq8P5R6g4w1FB3282SDRF3nXp\"},\"old\":{\"remember_token\":\"lmKqqHlUMQOOReUt5P4uNrrwpinGGYmcUgZ3D9H4rrYmbwmukpOsMwzz7mfC\"}}', NULL, '2023-01-23 08:08:35', '2023-01-23 08:08:35'),
(7, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"5f9H1EvNjA1FNcYxeE3yUzmQ2NGU2drjwMb8MpedR0ApAE8QtOtuZAdXM0Dw\"},\"old\":{\"remember_token\":\"dSlGWAxzlmitVeGVCL1fJdoNTFaT5uN1mynEq8P5R6g4w1FB3282SDRF3nXp\"}}', NULL, '2023-01-23 08:46:21', '2023-01-23 08:46:21'),
(8, 'associations', 'updated', 'App\\Models\\Association', 'updated', 2, 'App\\Models\\Admin', 1, '{\"attributes\":{\"contact\":\"01900000000\",\"updated_by\":1,\"updated_at\":\"2023-01-23T09:11:56.000000Z\"},\"old\":{\"contact\":\"01943817351\",\"updated_by\":null,\"updated_at\":\"2023-01-23T09:11:05.000000Z\"}}', NULL, '2023-01-23 09:11:56', '2023-01-23 09:11:56'),
(9, 'branch_units', 'updated', 'App\\Models\\BranchUnit', 'updated', 2, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u099f\\u09bf\\u09a8\\u09be\\u09a8\\u09c0 \\u09aa\\u09be\\u09dc\\u09be \\u0987\\u0989\\u09a8\\u09bf\\u099f-\\u09e7\",\"title_en\":\"Tinani Para Unit-1\",\"updated_by\":1,\"updated_at\":\"2023-01-25T04:57:41.000000Z\"},\"old\":{\"title_bn\":\"\\u0987\\u0989\\u09a8\\u09bf\\u099f-\\u09e7\",\"title_en\":\"Unit-1\",\"updated_by\":null,\"updated_at\":\"2023-01-25T04:54:15.000000Z\"}}', NULL, '2023-01-25 04:57:41', '2023-01-25 04:57:41'),
(10, 'branch_units', 'updated', 'App\\Models\\BranchUnit', 'updated', 3, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u099f\\u09bf\\u09a8\\u09be\\u09a8\\u09c0 \\u09aa\\u09be\\u09dc\\u09be \\u0987\\u0989\\u09a8\\u09bf\\u099f-\\u09e8\",\"title_en\":\"Tinani Para Unit-2\",\"updated_by\":1,\"updated_at\":\"2023-01-25T04:58:24.000000Z\"},\"old\":{\"title_bn\":\"\\u0987\\u0989\\u09a8\\u09bf\\u099f-\\u09e8\",\"title_en\":\"Unit-2\",\"updated_by\":null,\"updated_at\":\"2023-01-25T04:55:34.000000Z\"}}', NULL, '2023-01-25 04:58:24', '2023-01-25 04:58:24'),
(11, 'branch_units', 'deleted', 'App\\Models\\BranchUnit', 'deleted', 63, 'App\\Models\\Admin', 1, '{\"old\":{\"id\":63,\"association_id\":2,\"area_id\":6,\"division_id\":null,\"district_id\":null,\"upazila_id\":null,\"branch_id\":51,\"code\":\"63\",\"name\":null,\"title_bn\":\"\\u0986\\u099c\\u09ae\\u09bf\\u09b0\\u0997\\u099e\\u09cd\\u099c- \\u0997\\u09c1\\u09aa\\u09be\\u09b2 \\u09aa\\u09c1\\u09b0-\\u09e9 \\u0987\\u0989\\u09a8\\u09bf\\u099f-\\u09e8\",\"title_en\":\"Ajmirgonj - Gupal Pur -3 Unit-2\",\"address_bn\":\"\\u0986\\u099c\\u09ae\\u09bf\\u09b0\\u09c0\\u0997\\u099e\\u09cd\\u099c, \\u09ac\\u0995\\u09b6\\u09c0\\u0997\\u099e\\u09cd\\u099c, \\u099c\\u09be\\u09ae\\u09be\\u09b2\\u09aa\\u09c1\\u09b0\",\"address_en\":\"Ajmirgonj, Bakshigonj, Jamalpur\",\"contact\":\"01900000000\",\"status\":\"Active\",\"created_by\":1,\"updated_by\":null,\"created_at\":\"2023-01-26T05:05:55.000000Z\",\"updated_at\":\"2023-01-26T05:05:55.000000Z\"}}', NULL, '2023-01-26 05:09:55', '2023-01-26 05:09:55'),
(12, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"kcRS2CklDtoVZ0FHAvDG0RiMt3vHCIpKO6pDafxcpF5OKjTeLXF1GCxU5BI8\"},\"old\":{\"remember_token\":\"5f9H1EvNjA1FNcYxeE3yUzmQ2NGU2drjwMb8MpedR0ApAE8QtOtuZAdXM0Dw\"}}', NULL, '2023-02-08 07:20:20', '2023-02-08 07:20:20'),
(13, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"07OozFYkvTzaADuq8h9cyVpNFZYIg8R4cWoZHxJgY09qf5Cy8KIA3qA18kv9\"},\"old\":{\"remember_token\":\"kcRS2CklDtoVZ0FHAvDG0RiMt3vHCIpKO6pDafxcpF5OKjTeLXF1GCxU5BI8\"}}', NULL, '2023-02-08 09:05:36', '2023-02-08 09:05:36'),
(14, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"nSZOIOlLzX3fut1QSWS61QDE8bXSbBxZJks5kGT9W6LB6At7rdyOo5ceOwKL\"},\"old\":{\"remember_token\":\"07OozFYkvTzaADuq8h9cyVpNFZYIg8R4cWoZHxJgY09qf5Cy8KIA3qA18kv9\"}}', NULL, '2023-02-08 09:22:54', '2023-02-08 09:22:54'),
(15, 'branches', 'updated', 'App\\Models\\Branch', 'updated', 80, 'App\\Models\\Admin', 1, '{\"attributes\":{\"address_en\":\"Phulpur Nalitabari\",\"address_bn\":\"\\u09ab\\u09c1\\u09b2\\u09aa\\u09c1\\u09b0 \\u09a8\\u09be\\u09b2\\u09bf\\u09a4\\u09be\\u09ac\\u09be\\u09dc\\u09c0\",\"updated_by\":1,\"updated_at\":\"2023-02-13T08:07:37.000000Z\"},\"old\":{\"address_en\":\"Nalitabari\",\"address_bn\":\"\\u09a8\\u09be\\u09b2\\u09bf\\u09a4\\u09be\\u09ac\\u09be\\u09dc\\u09c0\",\"updated_by\":null,\"updated_at\":\"2023-02-13T08:03:15.000000Z\"}}', NULL, '2023-02-13 08:07:37', '2023-02-13 08:07:37'),
(16, 'branch_units', 'updated', 'App\\Models\\BranchUnit', 'updated', 131, 'App\\Models\\Admin', 1, '{\"attributes\":{\"contact\":\"01900000000\",\"updated_by\":1,\"updated_at\":\"2023-02-13T08:19:18.000000Z\"},\"old\":{\"contact\":null,\"updated_by\":null,\"updated_at\":\"2023-02-13T08:15:06.000000Z\"}}', NULL, '2023-02-13 08:19:18', '2023-02-13 08:19:18'),
(17, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 9, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u09b9\\u09af\\u09b0\\u09a4 \\u0996\\u09be\\u099c\\u09be\\u09b0 \\u09ac\\u09b6\\u09bf\\u09b0 (\\u09b0\\u09b9:)\",\"title_en\":\"Hazrat Khajar Bashir (RA)\",\"contact\":\"01900000000\",\"username\":\"caliph-1\",\"email\":\"caliph-1@kbf.com\",\"updated_by\":1,\"updated_at\":\"2023-02-13T09:33:50.000000Z\"},\"old\":{\"title_bn\":\"ABC\",\"title_en\":\"ABC\",\"contact\":\"01712616057\",\"username\":\"abck@kcs.com\",\"email\":\"abck@kcs.com\",\"updated_by\":null,\"updated_at\":\"2023-02-13T08:28:39.000000Z\"}}', NULL, '2023-02-13 09:33:50', '2023-02-13 09:33:50'),
(18, 'roles', 'updated', 'App\\Models\\Role', 'updated', 5, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u098f\\u09b0\\u09bf\\u09df\\u09be \\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"Area President\",\"updated_by\":1,\"updated_at\":\"2023-02-13T09:44:14.000000Z\"},\"old\":{\"title_bn\":\"\\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"President\",\"updated_by\":null,\"updated_at\":\"2023-01-20T15:27:16.000000Z\"}}', NULL, '2023-02-13 09:44:14', '2023-02-13 09:44:14'),
(19, 'roles', 'updated', 'App\\Models\\Role', 'updated', 6, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"President\",\"updated_by\":1,\"updated_at\":\"2023-02-13T09:44:26.000000Z\"},\"old\":{\"title_bn\":\"\\u09b8\\u09b9 \\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"Vice President\",\"updated_by\":null,\"updated_at\":\"2023-01-20T15:27:16.000000Z\"}}', NULL, '2023-02-13 09:44:26', '2023-02-13 09:44:26'),
(20, 'user_types', 'updated', 'App\\Models\\UserType', 'updated', 5, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u098f\\u09b0\\u09bf\\u09df\\u09be \\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"Area President\",\"updated_by\":1,\"updated_at\":\"2023-02-13T09:45:38.000000Z\"},\"old\":{\"title_bn\":\"\\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"President\",\"updated_by\":null,\"updated_at\":\"2023-01-20T15:27:18.000000Z\"}}', NULL, '2023-02-13 09:45:38', '2023-02-13 09:45:38'),
(21, 'user_types', 'updated', 'App\\Models\\UserType', 'updated', 6, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"President\",\"updated_by\":1,\"updated_at\":\"2023-02-13T09:45:51.000000Z\"},\"old\":{\"title_bn\":\"\\u09b8\\u09b9 \\u09b8\\u09ad\\u09be\\u09aa\\u09a4\\u09bf\",\"title_en\":\"Vice President\",\"updated_by\":null,\"updated_at\":\"2023-01-20T15:27:18.000000Z\"}}', NULL, '2023-02-13 09:45:51', '2023-02-13 09:45:51'),
(22, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_en\":\"Mahmood Enamul Kabir\",\"password\":\"$2y$10$qPWsaq.WfWKlJu3bJAaKSO3Uet2ml2em65okOoOJgt8oFhDMXQBh2\",\"thumb\":\"user\\/2023\\/February\\/thumb-1-1676284067208.jpeg\",\"updated_by\":1,\"updated_at\":\"2023-02-13T10:27:49.000000Z\"},\"old\":{\"title_en\":\"Mahmud Enamul Kabir\",\"password\":\"$2y$10$CIp8qx2Ec9JxK3ScsxtdRenDk19wMRNiW15y1woZnw8tRQbJHtRbq\",\"thumb\":null,\"updated_by\":null,\"updated_at\":\"2023-02-13T10:25:40.000000Z\"}}', NULL, '2023-02-13 10:27:49', '2023-02-13 10:27:49'),
(23, 'conditions', 'updated', 'App\\Models\\Condition', 'updated', 1, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u0989\\u09b6\\u09b0 \\u09ae\\u09c1\\u09b7\\u09cd\\u099f\\u09bf \\u0986\\u09a6\\u09be\\u09af\\u09bc \\u0995\\u09b0\\u09c7 ?\",\"title_en\":\"Usor earn fist ?\",\"updated_by\":1,\"updated_at\":\"2023-02-13T10:45:13.000000Z\"},\"old\":{\"title_bn\":\"\\u0993\\u09b0\\u09b6 \\u09ae\\u09c1\\u09b7\\u09cd\\u099f\\u09bf \\u0986\\u09a6\\u09be\\u09af\\u09bc \\u0995\\u09b0\\u09c7 ?\",\"title_en\":\"Orsh earn fist ?\",\"updated_by\":null,\"updated_at\":\"2023-01-18T11:13:31.000000Z\"}}', NULL, '2023-02-13 10:45:13', '2023-02-13 10:45:13'),
(24, 'conditions', 'updated', 'App\\Models\\Condition', 'updated', 9, 'App\\Models\\Admin', 1, '{\"attributes\":{\"title_bn\":\"\\u09ab\\u09be\\u0989\\u09a8\\u09cd\\u09a1\\u09c7\\u09b6\\u09a8\\u09c7\\u09b0 \\u09b8\\u09a6\\u09b8\\u09cd\\u09af \\u0995\\u09bf\\u09a8\\u09be ?\",\"title_en\":\"Whether the lover is a member of the foundation ?\",\"updated_by\":1,\"updated_at\":\"2023-02-13T10:47:27.000000Z\"},\"old\":{\"title_bn\":\"\\u09aa\\u09cd\\u09b0\\u09c7\\u09ae\\u09bf\\u0995 \\u0990\\u0995\\u09cd\\u09af \\u09aa\\u09b0\\u09bf\\u09b7\\u09a6\\u09c7\\u09b0 \\u09b8\\u09a6\\u09b8\\u09cd\\u09af \\u0995\\u09bf\\u09a8\\u09be ?\",\"title_en\":\"Whether the lover is a member of the council ?\",\"updated_by\":null,\"updated_at\":\"2023-01-18T11:15:08.000000Z\"}}', NULL, '2023-02-13 10:47:27', '2023-02-13 10:47:27'),
(25, 'users', 'users has been updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\Admin', 1, '{\"attributes\":{\"code\":\"M-004-000001\",\"title_en\":\"Mahmud Enamul Kabir\",\"password\":\"$2y$10$B0HNy1CUKiVp1Su8RE5YWuA\\/T.bMJR0JLKo\\/p9Bwq63AL8peeBXhO\",\"updated_at\":\"2023-02-14T04:10:06.000000Z\"},\"old\":{\"code\":null,\"title_en\":\"Mahmood Enamul Kabir\",\"password\":\"$2y$10$qPWsaq.WfWKlJu3bJAaKSO3Uet2ml2em65okOoOJgt8oFhDMXQBh2\",\"updated_at\":\"2023-02-13T10:27:49.000000Z\"}}', NULL, '2023-02-14 04:10:06', '2023-02-14 04:10:06'),
(26, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"lKHAPCUCAhjZdWZ49pCP3VcEhDjkNp5Y4O0idyPr08c3bO88eIxe9efMKnot\"},\"old\":{\"remember_token\":\"nSZOIOlLzX3fut1QSWS61QDE8bXSbBxZJks5kGT9W6LB6At7rdyOo5ceOwKL\"}}', NULL, '2023-02-14 12:54:58', '2023-02-14 12:54:58'),
(27, 'admins', 'updated', 'App\\Models\\Admin', 'updated', 1, NULL, NULL, '{\"attributes\":{\"remember_token\":\"tSSiwLBJAqPymgoc8ZNKMMSLdYKklijp7nha0nSVmoeVL2ZAJHbkEQY3OIFi\"},\"old\":{\"remember_token\":\"lKHAPCUCAhjZdWZ49pCP3VcEhDjkNp5Y4O0idyPr08c3bO88eIxe9efMKnot\"}}', NULL, '2023-02-14 13:00:46', '2023-02-14 13:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `association_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `area_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `upazila_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '01*********',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$Gkvr53MZBrPViW8jKqjq/.3wW7pnzUDZZ61qHUBHh62gCzICJB7We',
  `thumb` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user_type_id`, `role_id`, `association_id`, `area_id`, `division_id`, `district_id`, `upazila_id`, `branch_id`, `branch_unit_id`, `code`, `name`, `title_bn`, `title_en`, `office_bn`, `office_en`, `address_bn`, `address_en`, `contact`, `username`, `email`, `area`, `email_verified_at`, `password`, `thumb`, `remember_token`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 3, 18, 117, NULL, NULL, '1', 'Mr.Master Admin', 'মিস্টার মিস্টার এডমিন', 'Mr.Master Admin', 'মাস্টার এডমিন অফিস', 'Master Admin Office', 'মাস্টার এডমিন অফিস, পশ্চিম আগারগাঁও, ঢাকা', 'Master Admin Office, West Agargaon, Dhaka', '01700000000', '1001', 'superadmin@kbf.com', NULL, '2022-07-18 14:01:35', '$2y$10$Gkvr53MZBrPViW8jKqjq/.3wW7pnzUDZZ61qHUBHh62gCzICJB7We', NULL, 'tSSiwLBJAqPymgoc8ZNKMMSLdYKklijp7nha0nSVmoeVL2ZAJHbkEQY3OIFi', 1, NULL, 1, '2022-07-18 14:01:35', '2022-07-18 16:10:02'),
(2, 2, 2, NULL, NULL, 3, 18, 117, NULL, NULL, '2', 'Mr.System Admin', 'মিস্টার সিস্টেম এডমিন', 'Mr.System Admin', 'সিস্টেম এডমিন অফিস', 'System Admin Office', 'সিস্টেম এডমিন অফিস, পশ্চিম আগারগাঁও, ঢাকা', 'System Admin Office, West Agargaon, Dhaka', '01700000000', '2001', 'systemadmin@kbf.com', NULL, '2022-07-18 14:01:35', '$2y$10$Gkvr53MZBrPViW8jKqjq/.3wW7pnzUDZZ61qHUBHh62gCzICJB7We', NULL, '66XUsklleU', 1, NULL, 1, '2022-07-18 14:01:36', '2022-07-18 16:12:04'),
(3, 3, 3, NULL, NULL, 3, 18, 117, NULL, NULL, '3', 'Mr.ADMIN', 'জনাব এডমিন', 'Mr.Admin', 'এডমিন অফিস', 'Admin Office', 'এডমিন অফিস, পশ্চিম আগারগাঁও, ঢাকা', 'A Admin Office, West Agargaon, Dhaka', '01700000000', 'ADMIN', 'admin@kbf.com', NULL, '2022-07-18 14:01:36', '$2y$10$Gkvr53MZBrPViW8jKqjq/.3wW7pnzUDZZ61qHUBHh62gCzICJB7We', NULL, '89jKo5EgEUjONy7P15WeYVQLLXhedOvL6awap81JqpFJEPOmxDm3rs3mDyyW', 1, NULL, 1, '2022-07-18 14:01:36', '2022-12-05 17:55:28'),
(9, 7, 7, 2, 7, 9, 27, 217, 67, NULL, '9', NULL, 'হযরত খাজার বশির (রহ:)', 'Hazrat Khajar Bashir (RA)', NULL, NULL, NULL, NULL, '01900000000', 'caliph-1', 'caliph-1@kbf.com', NULL, '2023-02-13 08:28:38', '$2y$10$WmcvMf8Dh6tvtN0VAZaVbOZGXwxyKEjwZFbOYKFk9254Q/2i.wTCm', NULL, 'AtPq3U4O98', 1, 1, 1, '2023-02-13 08:28:39', '2023-02-13 09:33:50'),
(10, 7, 7, 2, NULL, 9, 27, 217, NULL, NULL, '10', NULL, 'হযরত শহীদ খাজা (রাহঃ)', 'Hazrat Shaheed Khwaja (RA)', NULL, NULL, NULL, NULL, '01900000000', 'caliph-2@kbf.com', 'caliph-2@kbf.com', NULL, '2023-02-13 09:36:33', '$2y$10$UzlIux4dtcbqo8yEerbq7emt/z3gw.7qgIo.AxKdyqhGdyEX4Rzne', NULL, 'zSEfk053La', 1, 1, NULL, '2023-02-13 09:36:33', '2023-02-13 09:36:33'),
(11, 7, 7, 2, NULL, 9, 27, 217, NULL, NULL, '11', NULL, 'হযরত খাজা নাসীরুল্লাহ (রাহঃ)', 'Hazrat Khwaja Nasirullah (RA)', NULL, NULL, NULL, NULL, '01900000000', 'caliph-3@kbf.com', 'caliph-3@kbf.com', NULL, '2023-02-13 09:39:07', '$2y$10$NE6mSleZO7G35CcfQQ1kRuWLfCA7guF7H9NVOeSjctqfzzpW5Uqce', NULL, 'iwuGYHPder', 1, 1, NULL, '2023-02-13 09:39:07', '2023-02-13 09:39:07'),
(12, 7, 7, 2, NULL, 9, 27, 217, NULL, NULL, '12', NULL, 'হযরত খাজা তৌহিদুল্লাহ (মা.জি.আ)', 'Hazrat Khwaja Tawhidullah (M.G.A.)', NULL, NULL, NULL, NULL, '01900000000', 'caliph-4@kbf.com', 'caliph-4@kbf.com', NULL, '2023-02-13 09:42:37', '$2y$10$A2zVDQrRYXY011pCrkML4uM9SUpg1nMjidMSrtfkqA0ex5V4KVLlu', NULL, 'nPNYl97Ygg', 1, 1, NULL, '2023-02-13 09:42:37', '2023-02-13 09:42:37'),
(13, 5, 5, 2, 4, 9, 27, 217, NULL, NULL, '13', NULL, 'আক্তারুজ্জামান', 'Aktaruzzaman', NULL, NULL, NULL, NULL, '01900000000', 'aktaruzzaman@kbf.com', 'aktaruzzaman@kbf.com', NULL, '2023-02-13 09:49:38', '$2y$10$.kV1EfdqTQOscTKZ8PK6qOP3EFIUPRgN2zckrRygznFQYGfkGppHK', NULL, 'KpGsgB6ndc', 1, 1, NULL, '2023-02-13 09:49:38', '2023-02-13 09:49:38'),
(14, 5, 5, 2, 3, 9, 27, 217, NULL, NULL, '14', NULL, 'হাসেন ফকির', 'Hasen Fakir', NULL, NULL, NULL, NULL, '01900000000', 'hasenfakir@kbf.com', 'hasenfakir@kbf.com', NULL, '2023-02-13 09:51:42', '$2y$10$DCNt4qQU1KREFPsCH4W.4uqFOCnStyAPJSLXolBxtT4aZGM7hV9l2', NULL, 'mrafrN3Mvt', 1, 1, NULL, '2023-02-13 09:51:42', '2023-02-13 09:51:42'),
(15, 5, 5, 2, 5, 9, 27, 217, NULL, NULL, '15', NULL, 'মফিজুল হক', 'Mofizul Haque', NULL, NULL, NULL, NULL, '01900000000', 'mofizulhaque@kbf.com', 'mofizulhaque@kbf.com', NULL, '2023-02-13 09:53:30', '$2y$10$.O7.TnLpFhAFghkBhxAp4.tZtRQkwliRBFdlsHubJSXOBHYgJ2r3e', NULL, 'lUh4UaOToZ', 1, 1, NULL, '2023-02-13 09:53:30', '2023-02-13 09:53:30'),
(16, 5, 5, 2, 6, 9, 27, 217, NULL, NULL, '16', NULL, 'হারুন আর রশিদ', 'Harun-Or-Rashid', NULL, NULL, NULL, NULL, '01900000000', 'rarunorrashid@kbf.com', 'rarunorrashid@kbf.com', NULL, '2023-02-13 09:56:24', '$2y$10$o2zusJ.e4es3S.Bw7DI5G.5oX3xW5BjOSmQy8Wn3wsX897Ioe94Im', NULL, 'skxKCa7Jmg', 1, 1, NULL, '2023-02-13 09:56:24', '2023-02-13 09:56:24'),
(17, 5, 5, 2, 7, 9, 27, NULL, NULL, NULL, '17', NULL, 'নিজাম উদ্দীন আহম্মেদ', 'Nizam Uddin Ahmed', NULL, NULL, NULL, NULL, '01900000000', 'nizamuddinahmed@kbf.com', 'nizamuddinahmed@kbf.com', NULL, '2023-02-13 09:58:08', '$2y$10$Z6RcEBLJ03JX4WsrvyyVnuWq.5tnvaXVCrJn5jOFKW0AOqlrmQ3vq', NULL, 'UopH8jqDfF', 1, 1, NULL, '2023-02-13 09:58:08', '2023-02-13 09:58:08'),
(18, 6, 6, 2, 3, 9, 22, 173, 4, NULL, '18', NULL, 'খোকন মিঞা', 'Khokon Mia', NULL, NULL, NULL, NULL, '01943817351', 'khokonmia@kbf.com', 'khokonmia@kbf.com', NULL, '2023-02-13 10:01:24', '$2y$10$rsJJfdrgk0UYHLILcB66OOJoLz7me0m31H0Mwo2o3Zd.o18ITcILu', NULL, 'Crn2Ivn4vy', 1, 1, NULL, '2023-02-13 10:01:25', '2023-02-13 10:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `association_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT '01*********',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `association_id`, `code`, `name`, `title_bn`, `title_en`, `address_bn`, `address_en`, `contact`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, 2, '3', NULL, 'হাসেন সাহেব', 'Mr. Hasen', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01700000000', 1, 1, NULL, '2023-01-23 09:13:54', '2023-01-23 09:13:54'),
(4, 2, '4', NULL, 'আখতারুজ্জামান সাহেব', 'Mr. Akhteruzzaman', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01700000000', 1, 1, NULL, '2023-01-23 09:43:51', '2023-01-23 09:43:51'),
(5, 2, '5', NULL, 'মফিজল হক সাহেব', 'Mr. Mofizal Hoque', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01700000000', 1, 1, NULL, '2023-01-23 09:49:21', '2023-01-23 09:49:21'),
(6, 2, '6', NULL, 'জনাব হারুন-অর-রশিদ (হরমাস)', 'Mr. Harun-Or-Rashid (Hormus)', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01700000000', 1, 1, NULL, '2023-01-23 09:50:46', '2023-01-23 09:50:46'),
(7, 2, '7', NULL, 'জনাব নিজাম উদ্দিন আহমেদ', 'Mr. Nizam Uddin Ahmed', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01700000000', 1, 1, NULL, '2023-01-23 09:52:02', '2023-01-23 09:52:02');

-- --------------------------------------------------------

--
-- Table structure for table `associations`
--

CREATE TABLE `associations` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT '01*********',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associations`
--

INSERT INTO `associations` (`id`, `code`, `name`, `title_bn`, `title_en`, `address_bn`, `address_en`, `contact`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, '2', NULL, 'হযরত খাজর বশীর (র.) ফাউন্ডেশন', 'Hazrat Khajar Bashir (R.A.) Foundation', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, 1, '2023-01-23 09:11:05', '2023-01-23 09:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_type_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `association_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `area_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `upazila_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT '01*********',
  `percent` smallint(6) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `office_type_id`, `association_id`, `area_id`, `division_id`, `district_id`, `upazila_id`, `code`, `name`, `title_bn`, `title_en`, `address_en`, `address_bn`, `contact`, `percent`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(3, NULL, 2, 3, 3, 18, 140, '003', NULL, 'তিনানী পাড়া', 'Tinani Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:22:19', '2023-01-23 09:22:19'),
(4, NULL, 2, 3, 3, 18, 140, '004', NULL, 'মেশের চর-২', 'Mesher Char-2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:24:12', '2023-01-23 09:24:12'),
(5, NULL, 2, 3, 3, 18, 140, '005', NULL, 'টুপকার চর- পুরাতন', 'Tupkar Char - Old', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:25:38', '2023-01-23 09:25:38'),
(6, NULL, 2, 3, 3, 18, 140, '006', NULL, 'টুপকার চর - নতুন', 'Tupkar Char - New', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:31:52', '2023-01-23 09:31:52'),
(7, NULL, 2, 3, 3, 18, 140, '007', NULL, 'জিগার টোলা', 'Ziger Tola', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:36:41', '2023-01-23 09:36:41'),
(8, NULL, 2, 3, 3, 18, 140, '008', NULL, 'শেখের চর', 'Sheker Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:38:03', '2023-01-23 09:38:03'),
(9, NULL, 2, 3, 3, 18, 140, '009', NULL, 'মোহল গিরি', 'Mohal Giri', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:39:45', '2023-01-23 09:39:45'),
(10, NULL, 2, 4, 3, 18, 140, '010', NULL, 'সাভার, শাটুরিয়া, মানিকগঞ্জ', 'Savar, Shaturia, Manikgonj', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:46:24', '2023-01-23 09:46:24'),
(11, NULL, 2, 4, 3, 18, 140, '011', NULL, 'বোরনল', 'Boronol', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:48:49', '2023-01-23 09:48:49'),
(12, NULL, 2, 4, 3, 18, 140, '012', NULL, 'ভিটিপাড়া', 'Vitipara', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:49:58', '2023-01-23 09:49:58'),
(13, NULL, 2, 4, 3, 18, 140, '013', NULL, 'সুনাবোর', 'Sunabor', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:51:01', '2023-01-23 09:51:01'),
(14, NULL, 2, 4, 3, 18, 140, '014', NULL, 'গোয়ারপাড়', 'Goyarpar', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:51:42', '2023-01-23 09:51:42'),
(15, NULL, 2, 4, 3, 18, 140, '015', NULL, 'ভাদাইল', 'Vadail', 'Ajmirgonj, Bakshigonj, Jamalpur', 'Ajmirgonj, Bakshigonj, Jamalpur', '01*********', 1, 1, 1, NULL, '2023-01-23 09:52:21', '2023-01-23 09:52:21'),
(16, NULL, 2, 4, 3, 18, 140, '016', NULL, 'পোবনার তাক', 'Pobnar Tak', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:53:26', '2023-01-23 09:53:26'),
(17, NULL, 2, 4, 3, 18, 140, '017', NULL, 'ডান্ডাবোর', 'Dandabor', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:54:16', '2023-01-23 09:54:16'),
(18, NULL, 2, 4, 3, 18, 140, '018', NULL, 'উত্তরা, ঢাকা', 'Uttara, Dhaka', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:55:02', '2023-01-23 09:55:02'),
(19, NULL, 2, 3, 3, 18, 140, '019', NULL, 'ফকির পাড়া', 'Fakir Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:55:09', '2023-01-23 09:55:09'),
(20, NULL, 2, 4, 3, 18, 140, '020', NULL, 'নন্দী পাড়া, ঢাকা', 'Nandi Para, Dhaka', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:56:02', '2023-01-23 09:56:02'),
(21, NULL, 2, 3, 3, 18, 141, '021', NULL, 'ফকির পাড়া', 'Fakir Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:56:05', '2023-01-23 09:56:05'),
(22, NULL, 2, 4, 3, 18, 140, '022', NULL, 'কালিয়াকোর', 'Kaliakor', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:57:16', '2023-01-23 09:57:16'),
(23, NULL, 2, 3, 3, 18, 140, '023', NULL, 'কোলকিহারা- ১', 'Kolkihara - 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:57:18', '2023-01-23 09:57:18'),
(24, NULL, 2, 3, 3, 18, 140, '024', NULL, 'কোলকিহারা- 2', 'Kolkihara - 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:58:13', '2023-01-23 09:58:13'),
(25, NULL, 2, 4, 3, 18, 140, '025', NULL, 'মাদার টেক, ঢাকা', 'Madar Tak, Dhaka', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:58:20', '2023-01-23 09:58:20'),
(26, NULL, 2, 3, 3, 18, 140, '026', NULL, 'তিলাত পুর', 'Tilat Pur', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 09:59:46', '2023-01-23 09:59:46'),
(27, NULL, 2, 5, 3, 18, 140, '027', NULL, 'বালুর ঘাট', 'Balu Ghat', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:00:56', '2023-01-23 10:00:56'),
(28, NULL, 2, 3, 3, 18, 140, '028', NULL, 'গোয়ালের চর', 'Gowaler Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:01:46', '2023-01-23 10:01:46'),
(29, NULL, 2, 5, 3, 18, 140, '029', NULL, 'নবী নগর', 'Nobi Nagar', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:02:05', '2023-01-23 10:02:05'),
(30, NULL, 2, 3, 3, 18, 140, '030', NULL, 'শোভার চর', 'Shovar Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:02:41', '2023-01-23 10:02:41'),
(31, NULL, 2, 5, 3, 18, 140, '031', NULL, 'শ্রীবর্দী- নয়াপাড়া- ১', 'Sreebordi - Noyapara- 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:04:42', '2023-01-23 10:04:42'),
(32, NULL, 2, 3, 3, 18, 140, '032', NULL, 'পুরার চর', 'Purar Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:05:24', '2023-01-23 10:05:24'),
(33, NULL, 2, 5, 3, 18, 140, '033', NULL, 'শ্রীবর্দী- নয়াপাড়া- 2', 'Sreebordi - Noyapara- 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:05:31', '2023-01-23 10:05:31'),
(34, NULL, 2, 5, 3, 18, 140, '034', NULL, 'চকক কাওরিয়া', 'Chowak Kawria', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:06:35', '2023-01-23 10:06:35'),
(35, NULL, 2, 3, 3, 18, 140, '035', NULL, 'আগলার চর', 'Agler Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:06:45', '2023-01-23 10:06:45'),
(36, NULL, 2, 5, 3, 18, 140, '036', NULL, 'ঘাগরার চর- ১', 'Jhagrar Char- 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:08:13', '2023-01-23 10:08:13'),
(37, NULL, 2, 3, 3, 18, 140, '037', NULL, 'বুলাকি পাড়া', 'Bulaki Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:08:44', '2023-01-23 10:08:44'),
(38, NULL, 2, 5, 3, 18, 140, '038', NULL, 'ঘাগরার চর- 2', 'Jhagrar Char- 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:08:55', '2023-01-23 10:08:55'),
(39, NULL, 2, 5, 3, 18, 140, '039', NULL, 'ঘাগরার চর- 3', 'Jhagrar Char- 3', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:09:36', '2023-01-23 10:09:36'),
(40, NULL, 2, 3, 3, 18, 140, '040', NULL, 'নওলামারি', 'Nowlamari', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:10:00', '2023-01-23 10:10:00'),
(41, NULL, 2, 5, 3, 18, 140, '041', NULL, 'নলিতা বাড়ি- ১', 'Nalita Bari- 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:10:29', '2023-01-23 10:10:29'),
(42, NULL, 2, 3, 3, 18, 140, '042', NULL, 'মেশের চর-১', 'Mesher Char-1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:11:43', '2023-01-23 10:11:43'),
(43, NULL, 2, 5, 3, 18, 140, '043', NULL, 'নলিতা বাড়ী-২', 'Nalita Bari- 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:12:39', '2023-01-23 10:12:39'),
(44, NULL, 2, 3, 3, 18, 140, '044', NULL, 'কোলকিহারা - 3', 'Kolkihara - 3', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:13:05', '2023-01-23 10:13:05'),
(45, NULL, 2, 5, 3, 18, 140, '045', NULL, 'চর শেরপুর - সাতানী পাড়া', 'Char Sherpur - Satani Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:13:30', '2023-01-23 10:13:30'),
(46, NULL, 2, 3, 3, 18, 140, '046', NULL, 'মালমারা', 'Malmara', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:14:25', '2023-01-23 10:14:25'),
(47, NULL, 2, 5, 3, 18, 140, '047', NULL, 'বোরোই কুচি- কাকিলাকুড়া', 'Boroi Kuchi- Kakilakura', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:14:32', '2023-01-23 10:14:32'),
(48, NULL, 2, 5, 3, 18, 140, '048', NULL, 'বোরোই কুচি', 'Boroi Kuchi', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:15:15', '2023-01-23 10:15:15'),
(49, NULL, 2, 6, 3, 18, 140, '049', NULL, 'আজমিরগঞ্জ-নিজ গ্রাম-১', 'Ajmirgonj - Nij Gram -1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:16:52', '2023-01-23 10:16:52'),
(50, NULL, 2, 6, 3, 18, 140, '050', NULL, 'আজমিরগঞ্জ- ভাটিয়া পাড়া-২', 'Ajmirgonj - Vatia Para -2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:18:08', '2023-01-23 10:18:08'),
(51, NULL, 2, 6, 3, 18, 140, '051', NULL, 'আজমিরগঞ্জ- গুপাল পুর-৩', 'Ajmirgonj - Gupal Pur -3', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:19:39', '2023-01-23 10:19:39'),
(52, NULL, 2, 7, 3, 18, 140, '052', NULL, 'নান্দিনা টাউন- ১', 'Nandina Town- 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:19:55', '2023-01-23 10:19:55'),
(53, NULL, 2, 7, 3, 18, 140, '053', NULL, 'নান্দিনা টাউন- 2', 'Nandina Town- 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:20:40', '2023-01-23 10:20:40'),
(54, NULL, 2, 6, 3, 18, 140, '054', NULL, 'আলীর পাড়া', 'Alir Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:20:49', '2023-01-23 10:20:49'),
(55, NULL, 2, 7, 3, 18, 140, '055', NULL, 'নন্দিনা চর- 1', 'Nandina Char- 1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশিগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:21:22', '2023-01-23 10:21:22'),
(56, NULL, 2, 7, 3, 18, 140, '056', NULL, 'নান্দিনার চর- 2', 'Nandina Char- 2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:22:17', '2023-01-23 10:22:17'),
(57, NULL, 2, 7, 3, 18, 140, '057', NULL, 'নান্দিনার চর- বকের চর- 3', 'Nandina Char- Bok Char - 3', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:23:01', '2023-01-23 10:23:01'),
(58, NULL, 2, 6, 3, 18, 140, '058', NULL, 'তালিয়া পাড়া- চৌখার চর', 'Talia Para - Chowkhar Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:23:23', '2023-01-23 10:23:23'),
(59, NULL, 2, 7, 3, 18, 140, '059', NULL, 'মেলান্দাহ - জালালপুর', 'Melandah - Jalalpur', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশিগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:23:40', '2023-01-23 10:23:40'),
(60, NULL, 2, 6, 3, 18, 140, '060', NULL, 'বাশ টলি', 'Bash Toli', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:24:24', '2023-01-23 10:24:24'),
(61, NULL, 2, 7, 3, 18, 140, '061', NULL, 'মেলান্দহ - শহর', 'Melandah - Town', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:24:28', '2023-01-23 10:24:28'),
(62, NULL, 2, 7, 3, 18, 140, '062', NULL, 'মেলান্দ - পোচা বোহালা', 'Melandah - Pocha Bohala', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:25:14', '2023-01-23 10:25:14'),
(63, NULL, 2, 6, 3, 18, 140, '063', NULL, 'নয়ার চর', 'Noyar Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:25:21', '2023-01-23 10:25:21'),
(64, NULL, 2, 7, 3, 18, 140, '064', NULL, 'দেওয়ানগঞ্জ বাজার', 'Dewangonj Bazar', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:25:54', '2023-01-23 10:25:54'),
(65, NULL, 2, 6, 3, 18, 140, '065', NULL, 'সুনা কুরা', 'Suna Kura', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:26:29', '2023-01-23 10:26:29'),
(66, NULL, 2, 7, 3, 18, 140, '066', NULL, 'দেওয়ানগঞ্জ- গামারিয়া-২', 'Dewangonj - Gamaria-2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:26:45', '2023-01-23 10:26:45'),
(67, NULL, 2, 7, 3, 18, 140, '067', NULL, 'দেওয়ানগঞ্জ - গামারিয়া', 'Dewangonj - Gamaria', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:27:27', '2023-01-23 10:27:27'),
(68, NULL, 2, 6, 3, 18, 140, '068', NULL, 'পাখি উরা', 'Pakhi Ura', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:27:33', '2023-01-23 10:27:33'),
(69, NULL, 2, 7, 3, 18, 140, '069', NULL, 'দোয়ানগঞ্জ-খোরমা বাড়ি', 'Dwengonj-Khorma Bari', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:28:26', '2023-01-23 10:28:26'),
(70, NULL, 2, 6, 3, 18, 140, '070', NULL, 'গুয়াল কান্দা', 'Gual Kanda', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:28:59', '2023-01-23 10:28:59'),
(71, NULL, 2, 7, 3, 18, 140, '071', NULL, 'দেওয়ানগঞ্জ - সুগার মিল', 'Dewangonj - Suger Mill', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:29:07', '2023-01-23 10:29:07'),
(72, NULL, 2, 7, 3, 18, 140, '072', NULL, 'দেওয়ানগঞ্জ-ভালামারি', 'Dewangonj - Bhalamari', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:29:52', '2023-01-23 10:29:52'),
(73, NULL, 2, 6, 3, 18, 140, '073', NULL, 'মোদের চর', 'Modher Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:29:57', '2023-01-23 10:29:57'),
(74, NULL, 2, 7, 3, 18, 140, '074', NULL, 'শেরপুর - দুক পাড়া', 'Sherpur - Duk Para', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:30:35', '2023-01-23 10:30:35'),
(75, NULL, 2, 6, 3, 18, 140, '075', NULL, 'রাজিবপুর', 'Rajibpur', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:30:59', '2023-01-23 10:30:59'),
(76, NULL, 2, 7, 3, 18, 140, '076', NULL, 'জামালপুর - বানিয়া বাজার', 'Jamalpur - Bania Bazar', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:31:13', '2023-01-23 10:31:13'),
(77, NULL, 2, 6, 3, 18, 140, '077', NULL, 'আগলার চর', 'Aglar Char', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:32:06', '2023-01-23 10:32:06'),
(78, NULL, 2, 6, 3, 18, 140, '078', NULL, 'দিনাজপুর-১', 'Dinajpur -1', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:33:35', '2023-01-23 10:33:35'),
(79, NULL, 2, 6, 3, 18, 140, '079', NULL, 'দিনাজপুর-২', 'Dinajpur -2', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', '01*********', 1, 1, 1, NULL, '2023-01-23 10:34:40', '2023-01-23 10:34:40'),
(80, NULL, 2, 7, 9, 33, 255, '080', NULL, 'কালাকুমার', 'Kalakumar', 'Phulpur Nalitabari', 'ফুলপুর নালিতাবাড়ী', '01*********', 1, 1, 1, 1, '2023-02-13 08:03:15', '2023-02-13 08:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `branch_units`
--

CREATE TABLE `branch_units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `association_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `area_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `upazila_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT '01*********',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_units`
--

INSERT INTO `branch_units` (`id`, `association_id`, `area_id`, `division_id`, `district_id`, `upazila_id`, `branch_id`, `code`, `name`, `title_bn`, `title_en`, `address_bn`, `address_en`, `contact`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 2, 3, NULL, NULL, NULL, 3, '2', NULL, 'টিনানী পাড়া ইউনিট-১', 'Tinani Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, 1, '2023-01-25 04:54:15', '2023-01-25 04:57:41'),
(3, 2, 3, NULL, NULL, NULL, 3, '3', NULL, 'টিনানী পাড়া ইউনিট-২', 'Tinani Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, 1, '2023-01-25 04:55:34', '2023-01-25 04:58:24'),
(4, 2, 3, NULL, NULL, NULL, 4, '4', NULL, 'মেশের চর-২ ইউনিট-১', 'Mesher Char-2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01943817351', 1, 1, NULL, '2023-01-25 05:01:07', '2023-01-25 05:01:07'),
(5, 2, 3, NULL, NULL, NULL, 4, '5', NULL, 'মেশের চর-২ ইউনিট-২', 'Mesher Char-2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01943817351', 1, 1, NULL, '2023-01-25 05:03:31', '2023-01-25 05:03:31'),
(6, 2, 3, NULL, NULL, NULL, 5, '6', NULL, 'টুপকার চর- পুরাতন  ইউনিট-১', 'Tupkar Char - Old  Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01967764520', 1, 1, NULL, '2023-01-25 05:06:06', '2023-01-25 05:06:06'),
(7, 2, 3, NULL, NULL, NULL, 5, '7', NULL, 'টুপকার চর - পুরানো  ইউনিট -২', 'Tupkar Char - Old Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01967764520', 1, 1, NULL, '2023-01-25 05:07:25', '2023-01-25 05:07:25'),
(8, 2, 3, NULL, NULL, NULL, 6, '8', NULL, 'টুপকার চর- নতুন ইউনিট-১', 'Tupkar Char - New Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:10:57', '2023-01-25 05:10:57'),
(9, 2, 3, NULL, NULL, NULL, 6, '9', NULL, 'টুপকার চর- নতুন ইউনিট-২', 'Tupkar Char - New Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:15:09', '2023-01-25 05:15:09'),
(10, 2, 3, NULL, NULL, NULL, 7, '10', NULL, 'জিগার টোলা ইউনিট-১', 'Ziger Tola unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:25:41', '2023-01-25 05:25:41'),
(11, 2, 3, NULL, NULL, NULL, 7, '11', NULL, 'জিগার টোলা ইউনিট-২', 'Ziger Tola Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:26:50', '2023-01-25 05:26:50'),
(12, 2, 3, NULL, NULL, NULL, 8, '12', NULL, 'শেখের চর ইউনিট-১', 'Sheker Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01934799380', 1, 1, NULL, '2023-01-25 05:28:18', '2023-01-25 05:28:18'),
(13, 2, 3, NULL, NULL, NULL, 8, '13', NULL, 'শেখের চর ইউনিট-২', 'Sheker Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01934799380', 1, 1, NULL, '2023-01-25 05:29:37', '2023-01-25 05:29:37'),
(14, 2, 3, NULL, NULL, NULL, 9, '14', NULL, 'মহল গিরি ইউনিট-১', 'Mohal Giri Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:31:20', '2023-01-25 05:31:20'),
(15, 2, 3, NULL, NULL, NULL, 9, '15', NULL, 'মহল গিরি ইউনিট-২', 'Mohal Giri Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:32:54', '2023-01-25 05:32:54'),
(16, 2, 3, NULL, NULL, NULL, 19, '16', NULL, 'ফকির পাড়া ইউনিট-১', 'Fakir Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:34:50', '2023-01-25 05:34:50'),
(17, 2, 3, NULL, NULL, NULL, 19, '17', NULL, 'ফকির পাড়া ইউনিট-২', 'Fakir Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 05:35:44', '2023-01-25 05:35:44'),
(18, 2, 3, NULL, NULL, NULL, 21, '18', NULL, 'ফকির পাড়া ইউনিট-১', 'Fakir Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '0195086930', 1, 1, NULL, '2023-01-25 05:37:24', '2023-01-25 05:37:24'),
(19, 2, 3, NULL, NULL, NULL, 21, '19', NULL, 'ফকির পাড়া ইউনিট-২', 'Fakir Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '0195086930', 1, 1, NULL, '2023-01-25 05:38:38', '2023-01-25 05:38:38'),
(20, 2, 3, NULL, NULL, NULL, 23, '20', NULL, 'কোলকিহারা- ১ ইউনিট-১', 'Kolkihara - 1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01922250150', 1, 1, NULL, '2023-01-25 05:40:59', '2023-01-25 05:40:59'),
(21, 2, 3, NULL, NULL, NULL, 23, '21', NULL, 'কলকিহারা- ১  ইউনিট-২', 'Kolkihara - 1  Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01922250150', 1, 1, NULL, '2023-01-25 05:42:57', '2023-01-25 05:42:57'),
(22, 2, 3, NULL, NULL, NULL, 24, '22', NULL, 'কলকিহারা- ২ ইউনিট-১', 'Kolkihara - 2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01932889895', 1, 1, NULL, '2023-01-25 09:11:37', '2023-01-25 09:11:37'),
(23, 2, 3, NULL, NULL, NULL, 24, '23', NULL, 'কলকিহারা- ২ ইউনিট-২', 'Kolkihara - 2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01932889895', 1, 1, NULL, '2023-01-25 09:12:57', '2023-01-25 09:12:57'),
(24, 2, 3, NULL, NULL, NULL, 26, '24', NULL, 'তিলাত পুর ইউনিট-১', 'Tilat Pur Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:14:55', '2023-01-25 09:14:55'),
(25, 2, 3, NULL, NULL, NULL, 26, '25', NULL, 'তিলাত পুর ইউনিট-২', 'Tilat Pur Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:16:17', '2023-01-25 09:16:17'),
(26, 2, 3, NULL, NULL, NULL, 28, '26', NULL, 'গোয়ালের চর ইউনিট-১', 'Gowaler Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:17:56', '2023-01-25 09:17:56'),
(27, 2, 3, NULL, NULL, NULL, 28, '27', NULL, 'গোয়ালের চর ইউনিট-২', 'Gowaler Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:19:09', '2023-01-25 09:19:09'),
(28, 2, 3, NULL, NULL, NULL, 30, '28', NULL, 'শোভার চর ইউনিট-১', 'Shovar Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01990771087', 1, 1, NULL, '2023-01-25 09:20:58', '2023-01-25 09:20:58'),
(29, 2, 3, NULL, NULL, NULL, 30, '29', NULL, 'শোভার চর ইউনিট-২', 'Shovar Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01990771087', 1, 1, NULL, '2023-01-25 09:22:11', '2023-01-25 09:22:11'),
(30, 2, 3, NULL, NULL, NULL, 32, '30', NULL, 'পুরার চর ইউনিট-১', 'Purar Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:23:53', '2023-01-25 09:23:53'),
(31, 2, 3, NULL, NULL, NULL, 32, '31', NULL, 'পুরার চর ইউনিট-২', 'Purar Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:25:04', '2023-01-25 09:25:04'),
(32, 2, 3, NULL, NULL, NULL, 35, '32', NULL, 'আগলার চর ইউনিট-১', 'Agler Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01984602606', 1, 1, NULL, '2023-01-25 09:26:27', '2023-01-25 09:26:27'),
(33, 2, 3, NULL, NULL, NULL, 35, '33', NULL, 'আগলার চর ইউনিট-২', 'Agler Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01984602606', 1, 1, NULL, '2023-01-25 09:27:23', '2023-01-25 09:27:23'),
(34, 2, 3, NULL, NULL, NULL, 37, '34', NULL, 'বুলাকি পাড়া ইউনিট-১', 'Bulaki Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01830729517', 1, 1, NULL, '2023-01-25 09:28:35', '2023-01-25 09:28:35'),
(35, 2, 3, NULL, NULL, NULL, 37, '35', NULL, 'বুলাকি পাড়া ইউনিট-২', 'Bulaki Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01830729517', 1, 1, NULL, '2023-01-25 09:29:43', '2023-01-25 09:29:43'),
(36, 2, 3, NULL, NULL, NULL, 40, '36', NULL, 'নওলামারি ইউনিট-১', 'Nowlamari Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01933734016', 1, 1, NULL, '2023-01-25 09:35:25', '2023-01-25 09:35:25'),
(37, 2, 3, NULL, NULL, NULL, 40, '37', NULL, 'নওলামারি ইউনিট-২', 'Nowlamari Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01933734016', 1, 1, NULL, '2023-01-25 09:36:34', '2023-01-25 09:36:34'),
(38, 2, 3, NULL, NULL, NULL, 42, '38', NULL, 'মেশের চর-১ ইউনিট-১', 'Mesher Char-1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:38:16', '2023-01-25 09:38:16'),
(39, 2, 3, NULL, NULL, NULL, 42, '39', NULL, 'মেশের চর-১ ইউনিট-২', 'Mesher Char-1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:39:15', '2023-01-25 09:39:15'),
(40, 2, 3, NULL, NULL, NULL, 44, '40', NULL, 'কলকিহারা-৩ ইউনিট-১', 'Kolkihara-3 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:42:25', '2023-01-25 09:42:25'),
(41, 2, 3, NULL, NULL, NULL, 44, '41', NULL, 'কলকিহারা-৩ ইউনিট-২', 'Kolkihara-3 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:43:17', '2023-01-25 09:43:17'),
(42, 2, 3, NULL, NULL, NULL, 46, '42', NULL, 'মালমারা ইউনিট-১', 'Malmara Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:44:32', '2023-01-25 09:44:32'),
(43, 2, 3, NULL, NULL, NULL, 46, '43', NULL, 'মালমারা ইউনিট-২', 'Malmara Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-25 09:45:30', '2023-01-25 09:45:30'),
(44, 2, 4, NULL, NULL, NULL, 10, '44', NULL, 'সাভার, সাটুরিয়া, মানিকগঞ্জ ইউনিট-১', 'Savar, Shaturia, Manikgonj Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01679893657', 1, 1, NULL, '2023-01-26 04:39:30', '2023-01-26 04:39:30'),
(45, 2, 4, NULL, NULL, NULL, 10, '45', NULL, 'সাভার, সাটুরিয়া, মানিকগঞ্জ ইউনিট-২', 'Savar, Shaturia, Manikgonj Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01679893657', 1, 1, NULL, '2023-01-26 04:41:08', '2023-01-26 04:41:08'),
(46, 2, 4, NULL, NULL, NULL, 11, '46', NULL, 'বোরনল ইউনিট-১', 'Boronol Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01319650260', 1, 1, NULL, '2023-01-26 04:43:11', '2023-01-26 04:43:11'),
(47, 2, 4, NULL, NULL, NULL, 11, '47', NULL, 'বোরনল ইউনিট-2', 'Boronol Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01725769496', 1, 1, NULL, '2023-01-26 04:45:57', '2023-01-26 04:45:57'),
(48, 2, 4, NULL, NULL, NULL, 12, '48', NULL, 'ভিটিপাড়া ইউনিট-১', 'Vitipara Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01624674074', 1, 1, NULL, '2023-01-26 04:49:12', '2023-01-26 04:49:12'),
(49, 2, 4, NULL, NULL, NULL, 12, '49', NULL, 'ভিটিপাড়া ইউনিট-২', 'Vitipara Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01624674074', 1, 1, NULL, '2023-01-26 04:50:09', '2023-01-26 04:50:09'),
(50, 2, 4, NULL, NULL, NULL, 13, '50', NULL, 'সুনাবোর ইউনিট-১', 'Sunabor Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01793774927', 1, 1, NULL, '2023-01-26 04:52:30', '2023-01-26 04:52:30'),
(51, 2, 4, NULL, NULL, NULL, 13, '51', NULL, 'সুনাবোর ইউনিট-২', 'Sunabor Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01793774927', 1, 1, NULL, '2023-01-26 04:54:24', '2023-01-26 04:54:24'),
(52, 2, 6, NULL, NULL, NULL, 49, '52', NULL, 'আজমিরগঞ্জ-নিজ গ্রাম-১ ইউনিট-১', 'Ajmirgonj - Nij Gram -1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 04:55:51', '2023-01-26 04:55:51'),
(53, 2, 6, NULL, NULL, NULL, 49, '53', NULL, 'আজমিরগঞ্জ-নিজ গ্রাম-১ ইউনিট-২', 'Ajmirgonj - Nij Gram -1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 04:57:08', '2023-01-26 04:57:08'),
(54, 2, 4, NULL, NULL, NULL, 14, '54', NULL, 'গোয়ারপাড় ইউনিট-১', 'Goyarpar Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01920599276', 1, 1, NULL, '2023-01-26 04:58:09', '2023-01-26 04:58:09'),
(55, 2, 6, NULL, NULL, NULL, 50, '55', NULL, 'আজমিরগঞ্জ- ভাটিয়া পাড়া-২ ইউনিট-১', 'Ajmirgonj - Vatia Para -2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 04:58:48', '2023-01-26 04:58:48'),
(56, 2, 4, NULL, NULL, NULL, 14, '56', NULL, 'গোয়ারপাড় ইউনিট-২', 'Goyarpar Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01920599276', 1, 1, NULL, '2023-01-26 04:59:02', '2023-01-26 04:59:02'),
(57, 2, 4, NULL, NULL, NULL, 15, '57', NULL, 'ভাদাইল ইউনিট-১', 'Vadail Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01939795224', 1, 1, NULL, '2023-01-26 05:00:35', '2023-01-26 05:00:35'),
(58, 2, 4, NULL, NULL, NULL, 15, '58', NULL, 'ভাদাইল ইউনিট-২', 'Vadail Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01939795224', 1, 1, NULL, '2023-01-26 05:01:38', '2023-01-26 05:01:38'),
(59, 2, 6, NULL, NULL, NULL, 50, '59', NULL, 'আজমিরগঞ্জ- ভাটিয়া পাড়া-২ ইউনিট-২', 'Ajmirgonj - Vatia Para -2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:02:42', '2023-01-26 05:02:42'),
(60, 2, 6, NULL, NULL, NULL, 51, '60', NULL, 'আজমিরগঞ্জ- গুপাল পুর-৩ ইউনিট-১', 'Ajmirgonj - Gupal Pur -3 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:04:03', '2023-01-26 05:04:03'),
(61, 2, 4, NULL, NULL, NULL, 16, '61', NULL, 'পোবনার তাক ইউনিট-১', 'Pobnar Tak Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01711488447', 1, 1, NULL, '2023-01-26 05:04:05', '2023-01-26 05:04:05'),
(62, 2, 6, NULL, NULL, NULL, 51, '62', NULL, 'আজমিরগঞ্জ- গুপাল পুর-৩ ইউনিট-২', 'Ajmirgonj - Gupal Pur -3 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:04:55', '2023-01-26 05:04:55'),
(64, 2, 4, NULL, NULL, NULL, 16, '64', NULL, 'পোবনার তাক ইউনিট-২', 'Pobnar Tak Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01711488447', 1, 1, NULL, '2023-01-26 05:06:36', '2023-01-26 05:06:36'),
(65, 2, 6, NULL, NULL, NULL, 54, '65', NULL, 'আলীর পাড়া ইউনিট-১', 'Alir Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:07:07', '2023-01-26 05:07:07'),
(66, 2, 6, NULL, NULL, NULL, 54, '66', NULL, 'আলীর পাড়া ইউনিট-২', 'Alir Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:08:21', '2023-01-26 05:08:21'),
(67, 2, 4, NULL, NULL, NULL, 17, '67', NULL, 'ডান্ডাবোর ইউনিট-১', 'Dandabor Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01749392979', 1, 1, NULL, '2023-01-26 05:11:44', '2023-01-26 05:11:44'),
(68, 2, 6, NULL, NULL, NULL, 58, '68', NULL, 'তালিয়া পাড়া- চৌখার চর ইউনিট-১', 'Talia Para - Chowkhar Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:12:05', '2023-01-26 05:12:05'),
(69, 2, 6, NULL, NULL, NULL, 58, '69', NULL, 'তালিয়া পাড়া- চৌখার চর ইউনিট-২', 'Talia Para - Chowkhar Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:12:50', '2023-01-26 05:12:50'),
(70, 2, 4, NULL, NULL, NULL, 17, '70', NULL, 'ডান্ডাবোর ইউনিট-২', 'Dandabor Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01749392979', 1, 1, NULL, '2023-01-26 05:13:04', '2023-01-26 05:13:04'),
(71, 2, 6, NULL, NULL, NULL, 60, '71', NULL, 'বাশ তলি ইউনিট-১', 'Bash Toli Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:14:16', '2023-01-26 05:14:16'),
(72, 2, 4, NULL, NULL, NULL, 18, '72', NULL, 'উত্তরা, ঢাকা ইউনিট-১', 'Uttara, Dhaka Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01819455068', 1, 1, NULL, '2023-01-26 05:14:41', '2023-01-26 05:14:41'),
(73, 2, 6, NULL, NULL, NULL, 60, '73', NULL, 'বাশ তলি ইউনিট-২', 'Bash Toli Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:15:11', '2023-01-26 05:15:11'),
(74, 2, 4, NULL, NULL, NULL, 18, '74', NULL, 'উত্তরা, ঢাকা ইউনিট-২', 'Uttara, Dhaka Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01819455068', 1, 1, NULL, '2023-01-26 05:15:33', '2023-01-26 05:15:33'),
(75, 2, 6, NULL, NULL, NULL, 63, '75', NULL, 'নয়ার চর ইউনিট-১', 'Noyar Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:16:26', '2023-01-26 05:16:26'),
(76, 2, 6, NULL, NULL, NULL, 63, '76', NULL, 'নয়ার চর ইউনিট-২', 'Noyar Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:17:07', '2023-01-26 05:17:07'),
(77, 2, 6, NULL, NULL, NULL, 65, '77', NULL, 'সুনা কুরা ইউনিট-১', 'Suna Kura Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:18:20', '2023-01-26 05:18:20'),
(78, 2, 4, NULL, NULL, NULL, 20, '78', NULL, 'নন্দী পাড়া, ঢাকা ইউনিট-১', 'Nandi Para, Dhaka Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01930018385', 1, 1, NULL, '2023-01-26 05:18:34', '2023-01-26 05:18:34'),
(79, 2, 6, NULL, NULL, NULL, 65, '79', NULL, 'সুনা কুরা ইউনিট-২', 'Suna Kura Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:19:26', '2023-01-26 05:19:26'),
(80, 2, 4, NULL, NULL, NULL, 20, '80', NULL, 'নন্দী পাড়া, ঢাকা ইউনিট-২', 'Nandi Para, Dhaka Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01930018385', 1, 1, NULL, '2023-01-26 05:19:47', '2023-01-26 05:19:47'),
(81, 2, 6, NULL, NULL, NULL, 68, '81', NULL, 'পাখি উরা ইউনিট-১', 'Pakhi Ura Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:20:30', '2023-01-26 05:20:30'),
(82, 2, 6, NULL, NULL, NULL, 68, '82', NULL, 'পাখি উরা ইউনিট-২', 'Pakhi Ura Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:21:12', '2023-01-26 05:21:12'),
(83, 2, 6, NULL, NULL, NULL, 70, '83', NULL, 'গুয়াল কান্দা ইউনিট-১', 'Gual Kanda Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:22:34', '2023-01-26 05:22:34'),
(84, 2, 6, NULL, NULL, NULL, 70, '84', NULL, 'গুয়াল কান্দা ইউনিট-২', 'Gual Kanda Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:23:22', '2023-01-26 05:23:22'),
(85, 2, 6, NULL, NULL, NULL, 73, '85', NULL, 'মোদের চর ইউনিট-১', 'Modher Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:24:34', '2023-01-26 05:24:34'),
(86, 2, 6, NULL, NULL, NULL, 73, '86', NULL, 'মোদের চর ইউনিট-২', 'Modher Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:25:39', '2023-01-26 05:25:39'),
(87, 2, 6, NULL, NULL, NULL, 75, '87', NULL, 'রাজীবপুর ইউনিট-১', 'Rajibpur Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:28:32', '2023-01-26 05:28:32'),
(88, 2, 6, NULL, NULL, NULL, 75, '88', NULL, 'রাজীবপুর ইউনিট-২', 'Rajibpur Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:29:24', '2023-01-26 05:29:24'),
(89, 2, 6, NULL, NULL, NULL, 77, '89', NULL, 'আগলার চর ইউনিট-১', 'Aglar Char Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:30:31', '2023-01-26 05:30:31'),
(90, 2, 6, NULL, NULL, NULL, 77, '90', NULL, 'আগলার চর ইউনিট-২', 'Aglar Char Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:31:23', '2023-01-26 05:31:23'),
(91, 2, 6, NULL, NULL, NULL, 78, '91', NULL, 'দিনাজপুর-১ ইউনিট-১', 'Dinajpur -1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:33:01', '2023-01-26 05:33:01'),
(92, 2, 6, NULL, NULL, NULL, 78, '92', NULL, 'দিনাজপুর-১ ইউনিট-২', 'Dinajpur -1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:34:55', '2023-01-26 05:34:55'),
(93, 2, 6, NULL, NULL, NULL, 79, '93', NULL, 'দিনাজপুর-২ ইউনিট-১', 'Dinajpur -2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:43:12', '2023-01-26 05:43:12'),
(94, 2, 6, NULL, NULL, NULL, 79, '94', NULL, 'দিনাজপুর-২ ইউনিট-২', 'Dinajpur -2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 05:44:43', '2023-01-26 05:44:43'),
(95, 2, 4, NULL, NULL, NULL, 22, '95', NULL, 'কালিয়াকোর ইউনিট-১', 'Kaliakor Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 07:51:34', '2023-01-26 07:51:34'),
(96, 2, 4, NULL, NULL, NULL, 22, '96', NULL, 'কালিয়াকোর ইউনিট-২', 'Kaliakor Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 07:52:50', '2023-01-26 07:52:50'),
(97, 2, 4, NULL, NULL, NULL, 25, '97', NULL, 'মাদার তক, ঢাকা ইউনিট-১', 'Madar Tak, Dhaka Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01963008148', 1, 1, NULL, '2023-01-26 07:55:22', '2023-01-26 07:55:22'),
(98, 2, 4, NULL, NULL, NULL, 25, '98', NULL, 'মাদার তক, ঢাকা ইউনিট-২', 'Madar Tak, Dhaka Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01963008148', 1, 1, NULL, '2023-01-26 07:57:19', '2023-01-26 07:57:19'),
(99, 2, 7, NULL, NULL, NULL, 52, '99', NULL, 'নান্দিনা টাউন- ১ ইউনিট-১', 'Nandina Town- 1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 08:30:56', '2023-01-26 08:30:56'),
(100, 2, 7, NULL, NULL, NULL, 55, '100', NULL, 'নান্দিনা টাউন- 1 ইউনিট-2', 'Nandina Town- 1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 08:31:42', '2023-01-26 08:31:42'),
(101, 2, 7, NULL, NULL, NULL, 53, '101', NULL, 'নান্দিনা টাউন- 2 ইউনিট-1', 'Nandina Town- 2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 08:33:01', '2023-01-26 08:33:01'),
(102, 2, 7, NULL, NULL, NULL, 53, '102', NULL, 'নান্দিনা টাউন- 2 ইউনিট-2', 'Nandina Town- 2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 08:33:59', '2023-01-26 08:33:59'),
(103, 2, 5, NULL, NULL, NULL, 27, '103', NULL, 'বালুর ঘাট ইউনিট-১', 'Balu Ghat Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 10:06:02', '2023-01-26 10:06:02'),
(104, 2, 5, NULL, NULL, NULL, 27, '104', NULL, 'বালুর ঘাট ইউনিট-২', 'Balu Ghat Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '019000000000', 1, 1, NULL, '2023-01-26 10:06:55', '2023-01-26 10:06:55'),
(105, 2, 5, NULL, NULL, NULL, 29, '105', NULL, 'নবি নগর ইউনিট-১', 'Nobi Nagar Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 10:08:42', '2023-01-26 10:08:42'),
(106, 2, 5, NULL, NULL, NULL, 29, '106', NULL, 'নবি নগর ইউনিট-২', 'Nobi Nagar Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-26 10:09:52', '2023-01-26 10:09:52'),
(107, 2, 5, NULL, NULL, NULL, 31, '107', NULL, 'শ্রীবর্দী- নয়াপাড়া- ১ ইউনিট-১', 'Sreebordi - Noyapara- 1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 04:16:17', '2023-01-30 04:16:17'),
(108, 2, 5, NULL, NULL, NULL, 31, '108', NULL, 'শ্রীবর্দী- নয়াপাড়া-১ ইউনিট-২', 'Sreebordi - Noyapara- 1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 04:17:35', '2023-01-30 04:17:35'),
(109, 2, 5, NULL, NULL, NULL, 33, '109', NULL, 'শ্রীবর্দী- নয়াপাড়া-২ ইউনিট-১', 'Sreebordi - Noyapara-2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 04:18:49', '2023-01-30 04:18:49'),
(110, 2, 5, NULL, NULL, NULL, 33, '110', NULL, 'শ্রীবর্দী- নয়াপাড়া-২ ইউনিট-২', 'Sreebordi - Noyapara-2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 04:39:08', '2023-01-30 04:39:08'),
(111, 2, 5, NULL, NULL, NULL, 34, '111', NULL, 'চকক কাওরিয়া ইউনিট-১', 'Chowak Kawria Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 05:51:58', '2023-01-30 05:51:58'),
(112, 2, 5, NULL, NULL, NULL, 34, '112', NULL, 'চকক কাওরিয়া ইউনিট-২', 'Chowak Kawria Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-01-30 05:52:49', '2023-01-30 05:52:49'),
(113, 2, 5, NULL, NULL, NULL, 36, '113', NULL, 'ঘাগরার চর- ১ ইউনিট-১', 'Jhagrar Char- 1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:28:00', '2023-02-01 03:28:00'),
(114, 2, 5, NULL, NULL, NULL, 36, '114', NULL, 'ঘাগড়ার চর-১ ইউনিট-২', 'Jhagrar Char- 1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:29:44', '2023-02-01 03:29:44'),
(115, 2, 5, NULL, NULL, NULL, 38, '115', NULL, 'ঘাগড়ার চর-২ ইউনিট-১', 'Jhagrar Char-2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:31:17', '2023-02-01 03:31:17'),
(116, 2, 5, NULL, NULL, NULL, 38, '116', NULL, 'ঘাগড়ার চর-২ ইউনিট-২', 'Jhagrar Char-2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:32:20', '2023-02-01 03:32:20'),
(117, 2, 5, NULL, NULL, NULL, 39, '117', NULL, 'ঘাগড়ার চর-৩ ইউনিট-১', 'Jhagrar Char-3 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:34:45', '2023-02-01 03:34:45'),
(118, 2, 5, NULL, NULL, NULL, 39, '118', NULL, 'ঘাগড়ার চর-৩ ইউনিট-২', 'Jhagrar Char-3 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:35:54', '2023-02-01 03:35:54'),
(119, 2, 5, NULL, NULL, NULL, 41, '119', NULL, 'নলিতা বাড়ী-১ ইউনিট-১', 'Nalita Bari-1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:37:33', '2023-02-01 03:37:33'),
(120, 2, 5, NULL, NULL, NULL, 41, '120', NULL, 'নলিতা বাড়ী-১ ইউনিট-২', 'Nalita Bari-1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:38:28', '2023-02-01 03:38:28'),
(121, 2, 5, NULL, NULL, NULL, 43, '121', NULL, 'নলিতা বাড়ী-২ ইউনিট-১', 'Nalita Bari-2 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:40:17', '2023-02-01 03:40:17'),
(122, 2, 5, NULL, NULL, NULL, 43, '122', NULL, 'নলিতা বাড়ী-২ ইউনিট-২', 'Nalita Bari-2 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:43:52', '2023-02-01 03:43:52'),
(123, 2, 5, NULL, NULL, NULL, 45, '123', NULL, 'চর শেরপুর- সাতানী পাড়া ইউনিট-১', 'Char Sherpur - Satani Para Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:48:15', '2023-02-01 03:48:15'),
(124, 2, 5, NULL, NULL, NULL, 45, '124', NULL, 'চর শেরপুর- সাতানী পাড়া ইউনিট-২', 'Char Sherpur - Satani Para Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:49:10', '2023-02-01 03:49:10'),
(125, 2, 5, NULL, NULL, NULL, 47, '125', NULL, 'বোরোই কুচি- কাকিলাকুড়া ইউনিট-১', 'Boroi Kuchi- Kakilakura Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:51:27', '2023-02-01 03:51:27'),
(126, 2, 5, NULL, NULL, NULL, 47, '126', NULL, 'বোরোই কুচি- কাকিলাকুড়া ইউনিট-২', 'Boroi Kuchi- Kakilakura Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:52:36', '2023-02-01 03:52:36'),
(127, 2, 5, NULL, NULL, NULL, 48, '127', NULL, 'বারোই কুচি ইউনিট-১', 'Baroi Kuchi Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:55:10', '2023-02-01 03:55:10'),
(128, 2, 5, NULL, NULL, NULL, 48, '128', NULL, 'বারোই কুচি ইউনিট-২', 'Baroi Kuchi Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 03:56:03', '2023-02-01 03:56:03'),
(129, 2, 7, NULL, NULL, NULL, 55, '129', NULL, 'নান্দিনার চর- ১ ইউনিট-১', 'Nandina Char- 1 Unit-1', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 07:11:42', '2023-02-01 07:11:42'),
(130, 2, 7, NULL, NULL, NULL, 55, '130', NULL, 'নান্দিনার চর-১ ইউনিট-২', 'Nandina Char- 1 Unit-2', 'আজমিরগঞ্জ, বকশীগঞ্জ, জামালপুর', 'Ajmirgonj, Bakshigonj, Jamalpur', '01900000000', 1, 1, NULL, '2023-02-01 07:31:31', '2023-02-01 07:31:31'),
(131, 2, 7, NULL, NULL, NULL, 80, '131', NULL, 'ইউনিট - ১', 'Unit - 1', 'ফুলপুর নালিতাবাড়ী', 'Phulpur Nalitabari', '01900000000', 1, 1, 1, '2023-02-13 08:15:06', '2023-02-13 08:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'হলুদ', 'Yellow', 1, 1, NULL, '2023-01-20 09:24:46', '2023-01-20 09:24:46'),
(2, '2', NULL, 'সাদা', 'White', 1, 1, NULL, '2023-01-20 09:24:59', '2023-01-20 09:24:59'),
(3, '3', NULL, 'সবুজ', 'Green', 1, 1, NULL, '2023-01-20 09:25:17', '2023-01-20 09:25:17'),
(4, '4', NULL, 'লাল', 'Red', 1, 1, NULL, '2023-01-20 09:25:34', '2023-01-20 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rel` tinyint(1) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `code`, `name`, `title_bn`, `title_en`, `is_rel`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'উশর মুষ্টি আদায় করে ?', 'Usor earn fist ?', 0, 1, 1, 1, '2023-01-18 11:12:42', '2023-02-13 10:45:13'),
(2, '2', NULL, '৬ই শরীফ পালন করে ?', '6th Sharif observes ?', 0, 1, 1, NULL, '2023-01-18 11:12:59', '2023-01-18 11:12:59'),
(3, '3', NULL, '১২ই শরীফ পালন করে ?', '12th Sharif observes ?', 0, 1, 1, NULL, '2023-01-18 11:13:18', '2023-01-18 11:13:18'),
(4, '4', NULL, 'সাপ্তাহিক মিলাদ পালন করে ?', 'Celebrate weekly Milad ?', 0, 1, 1, NULL, '2023-01-18 11:13:47', '2023-01-18 11:13:47'),
(5, '5', NULL, 'ছেলে মেয়ে বায়াৎ পড়েছে ?', 'Boys and girls fall out ?', 0, 1, 1, NULL, '2023-01-18 11:14:01', '2023-01-18 11:14:01'),
(6, '6', NULL, 'কোরবানীর চাঁদা আদায় করে ?', 'Sacrifice by collecting ?', 0, 1, 1, NULL, '2023-01-18 11:14:16', '2023-01-18 11:14:16'),
(7, '7', NULL, 'প্রত্যেহ অজিফা পালন করে ?', 'Every ajifa observes ?', 0, 1, 1, NULL, '2023-01-18 11:14:31', '2023-01-18 11:14:31'),
(8, '8', NULL, '১০ ভাগের ১% আদায় করেছে কিনা ?', 'Did 1% of 10 percent have been collected ?', 0, 1, 1, NULL, '2023-01-18 11:14:48', '2023-01-18 11:14:48'),
(9, '9', NULL, 'ফাউন্ডেশনের সদস্য কিনা ?', 'Whether the lover is a member of the foundation ?', 1, 1, 1, 1, '2023-01-18 11:15:08', '2023-02-13 10:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_bbs_code` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbs_code` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `title_bn`, `title_en`, `division_bbs_code`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'বরগুনা', 'Barguna', '10', '04', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(2, 1, NULL, 'বরিশাল', 'Barisal', '10', '06', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(3, 1, NULL, 'ভোলা', 'Bhola', '10', '09', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(4, 1, NULL, 'ঝালকাঠি', 'Jhalokati', '10', '42', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(5, 1, NULL, 'পটুয়াখালী ', 'Patuakhali', '10', '78', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(6, 1, NULL, 'পিরোজপুর ', 'Pirojpur', '10', '79', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(7, 2, NULL, 'বান্দরবান', 'Bandarban', '20', '03', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(8, 2, NULL, 'ব্রাহ্মণবাড়িয়া', 'Brahmanbaria', '20', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(9, 2, NULL, 'চাঁদপুর', 'Chandpur', '20', '13', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(10, 2, NULL, 'চট্টগ্রাম', 'Chittagong', '20', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(11, 2, NULL, 'কুমিল্লা', 'Comilla', '20', '19', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(12, 2, NULL, 'কক্সবাজার ', 'Coxs bazar', '20', '22', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(13, 2, NULL, 'ফেনী', 'Feni', '20', '30', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(14, 2, NULL, 'খাগড়াছড়ি', 'Khagrachhari', '20', '46', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(15, 2, NULL, 'লক্ষ্মীপুর', 'Lakshmipur', '20', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(16, 2, NULL, 'নোয়াখালী', 'Noakhali', '20', '75', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(17, 2, NULL, 'রাঙ্গামাটি', 'Rangamati', '20', '84', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(18, 3, NULL, 'ঢাকা ', 'Dhaka', '30', '26', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(19, 3, NULL, 'ফরিদপুর ', 'Faridpur', '30', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(20, 3, NULL, 'গাজীপুর ', 'Gazipur', '30', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(21, 3, NULL, 'গোপালগঞ্জ', 'Gopalganj', '30', '35', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(22, 9, NULL, 'জামালপুর ', 'Jamalpur', '45', '39', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(23, 3, NULL, 'কিশোরগঞ্জ ', 'Kishoregonj', '30', '48', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(24, 3, NULL, 'মাদারীপুর ', 'Madaripur', '30', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(25, 3, NULL, 'মানিকগঞ্জ ', 'Manikganj', '30', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(26, 3, NULL, 'মুন্সিগঞ্জ ', 'Munshiganj', '30', '59', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(27, 9, NULL, 'ময়মনসিংহ ', 'Mymensingh', '45', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(28, 3, NULL, 'নারায়ণগঞ্জ ', 'Narayanganj', '30', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(29, 3, NULL, 'নরসিংদী ', 'Narsingdi', '30', '68', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(30, 9, NULL, 'নেত্রকোণা ', 'Netrakona', '45', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(31, 3, NULL, 'রাজবাড়ী ', 'Rajbari', '30', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(32, 3, NULL, 'শরীয়তপুর  ', 'Shariatpur', '30', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(33, 9, NULL, 'শেরপুর ', 'Sherpur', '45', '89', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(34, 3, NULL, 'টাঙ্গাইল ', 'Tangail', '30', '93', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(35, 4, NULL, 'বাগেরহাট', 'Bagerhat', '40', '01', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(36, 4, NULL, 'চুয়াডাঙ্গা ', 'Chuadanga', '40', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(37, 4, NULL, 'যশোর ', 'Jashore', '40', '41', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(38, 4, NULL, 'ঝিনাইদহ ', 'Jhenaidah', '40', '44', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(39, 4, NULL, 'খুলনা ', 'Khulna', '40', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(40, 4, NULL, 'কুষ্টিয়া ', 'Kushtia', '40', '50', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(41, 4, NULL, 'মাগুরা', 'Magura', '40', '55', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(42, 4, NULL, 'মেহেরপুর ', 'Meherpur', '40', '57', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(43, 4, NULL, 'নড়াইল ', 'Narail', '40', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(44, 4, NULL, 'সাতক্ষীরা ', 'Satkhira', '40', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(45, 5, NULL, 'বগুড়া ', 'Bogra', '50', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(46, 5, NULL, 'জয়পুরহাট', 'Joypurhat', '50', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(47, 5, NULL, 'নওগাঁ ', 'Naogaon', '50', '64', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(48, 5, NULL, 'নাটোর ', 'Natore', '50', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(49, 5, NULL, 'চাঁপাই নাবাবগঞ্জ ', 'Chapai nababganj', '50', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(50, 5, NULL, 'পাবনা', 'Pabna', '50', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(51, 5, NULL, 'রাজশাহী ', 'Rajshahi', '50', '81', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(52, 5, NULL, 'সিরাজগঞ্জ', 'Sirajganj', '50', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(53, 6, NULL, 'দিনাজপুর ', 'Dinajpur', '60', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(54, 6, NULL, 'গাইবান্ধা ', 'Gaibandha', '60', '32', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(55, 6, NULL, 'কুড়িগ্রাম ', 'Kurigram', '60', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(56, 6, NULL, 'লালমনিরহাট ', 'Lalmonirhat', '60', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(57, 6, NULL, 'নীলফামারী', 'Nilphamari', '60', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(58, 6, NULL, 'পঞ্চগড় ', 'Panchagarh', '60', '77', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(59, 6, NULL, 'রংপুর ', 'Rangpur', '60', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(60, 6, NULL, 'ঠাকুরগাঁও', 'Thakurgaon', '60', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(61, 7, NULL, 'হবিগঞ্জ ', 'Habiganj', '70', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(62, 7, NULL, 'মৌলভীবাজার ', 'Maulvibazar', '70', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(63, 7, NULL, 'সুনামগঞ্জ ', 'Sunamganj', '70', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(64, 7, NULL, 'সিলেট', 'Sylhet', '70', '91', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbs_code` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `title_bn`, `title_en`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'বরিশাল', 'Barisal', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(2, NULL, 'চট্টগ্রাম', 'Chittagong', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(3, NULL, 'ঢাকা', 'Dhaka', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(4, NULL, 'খুলনা', 'Khulna', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(5, NULL, 'রাজশাহী', 'Rajshahi', '50', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(6, NULL, 'রংপুর', 'Rangpur', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(7, NULL, 'সিলেট', 'Sylhet', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(9, NULL, 'ময়মনসিংহ', 'Mymensingh', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_11_05_090150_create_admins_table', 1),
(5, '2021_11_06_153729_create_permissions_table', 1),
(6, '2021_11_06_153741_create_roles_table', 1),
(7, '2021_11_06_160419_create_roles_permissions_table', 1),
(8, '2021_11_16_082729_create_site_settings_table', 1),
(9, '2021_11_28_043603_create_office_types_table', 1),
(10, '2021_11_28_043604_create_divisions_table', 1),
(11, '2021_11_28_043605_create_associations_table', 1),
(12, '2021_11_28_043606_create_areas_table', 1),
(13, '2021_11_28_043610_create_colors_table', 1),
(14, '2021_11_28_043610_create_conditions_table', 1),
(15, '2021_11_28_043610_create_sizes_table', 1),
(16, '2021_11_28_043930_create_districts_table', 1),
(17, '2021_11_28_043931_create_thanas_table', 1),
(18, '2021_11_28_043931_create_upazilas_table', 1),
(19, '2021_11_28_043934_create_branches_table', 1),
(20, '2021_11_28_043935_create_branch_units_table', 1),
(21, '2021_11_28_043936_create_users_table', 1),
(22, '2021_11_28_044524_add_foreign_keys_to_districts_table', 1),
(23, '2022_05_09_115012_add_foreign_keys_to_roles_permissions_table', 1),
(24, '2022_06_05_035903_create_activity_log_table', 1),
(25, '2022_06_05_035904_add_event_column_to_activity_log_table', 1),
(26, '2022_06_05_035905_add_batch_uuid_column_to_activity_log_table', 1),
(27, '2022_06_06_060302_create_user_types_table', 1),
(28, '2022_06_06_071954_add_foreign_keys_to_admins_table', 1),
(29, '2022_07_18_085156_create_langs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `office_types`
--

CREATE TABLE `office_types` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `office_types`
--

INSERT INTO `office_types` (`id`, `code`, `name`, `title_bn`, `title_en`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'ব্রাঞ্চ অফিস', 'Branch office', 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(2, '2', NULL, 'এজেন্ট অফিস', 'Agent Office', 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_parent_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `title_bn`, `title_en`, `group_name`, `group_parent_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role.create', NULL, NULL, 'role', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(2, 'role.read', NULL, NULL, 'role', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(3, 'role.update', NULL, NULL, 'role', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(4, 'role.delete', NULL, NULL, 'role', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(5, 'role.permission.update', NULL, NULL, 'role', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(6, 'user_type.create', NULL, NULL, 'user_type', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(7, 'user_type.read', NULL, NULL, 'user_type', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(8, 'user_type.update', NULL, NULL, 'user_type', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(9, 'user_type.delete', NULL, NULL, 'user_type', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(10, 'site_setting.create', NULL, NULL, 'site_setting', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(11, 'site_setting.read', NULL, NULL, 'site_setting', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(12, 'site_setting.update', NULL, NULL, 'site_setting', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(13, 'site_setting.delete', NULL, NULL, 'site_setting', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(14, 'lang.create', NULL, NULL, 'lang', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(15, 'lang.read', NULL, NULL, 'lang', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(16, 'lang.update', NULL, NULL, 'lang', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(17, 'lang.delete', NULL, NULL, 'lang', 'role-permissions', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(18, 'division.create', NULL, NULL, 'division', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(19, 'division.read', NULL, NULL, 'division', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(20, 'division.update', NULL, NULL, 'division', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(21, 'division.delete', NULL, NULL, 'division', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(22, 'district.create', NULL, NULL, 'district', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(23, 'district.read', NULL, NULL, 'district', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(24, 'district.update', NULL, NULL, 'district', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(25, 'district.delete', NULL, NULL, 'district', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(26, 'upazila.create', NULL, NULL, 'upazila', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(27, 'upazila.read', NULL, NULL, 'upazila', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(28, 'upazila.update', NULL, NULL, 'upazila', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(29, 'upazila.delete', NULL, NULL, 'upazila', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(30, 'thana.create', NULL, NULL, 'thana', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(31, 'thana.read', NULL, NULL, 'thana', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(32, 'thana.update', NULL, NULL, 'thana', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(33, 'thana.delete', NULL, NULL, 'thana', 'administrative_locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(34, 'association.create', NULL, NULL, 'association', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(35, 'association.read', NULL, NULL, 'association', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(36, 'association.update', NULL, NULL, 'association', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(37, 'association.delete', NULL, NULL, 'association', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(38, 'area.create', NULL, NULL, 'area', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(39, 'area.read', NULL, NULL, 'area', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(40, 'area.update', NULL, NULL, 'area', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(41, 'area.delete', NULL, NULL, 'area', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(42, 'branch.create', NULL, NULL, 'branch', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(43, 'branch.read', NULL, NULL, 'branch', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(44, 'branch.update', NULL, NULL, 'branch', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(45, 'branch.delete', NULL, NULL, 'branch', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(46, 'branch_unit.create', NULL, NULL, 'branch_unit', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(47, 'branch_unit.read', NULL, NULL, 'branch_unit', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(48, 'branch_unit.update', NULL, NULL, 'branch_unit', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(49, 'branch_unit.delete', NULL, NULL, 'branch_unit', 'locations', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(50, 'user.create', NULL, NULL, 'user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(51, 'user.read', NULL, NULL, 'user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(52, 'user.view', NULL, NULL, 'user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(53, 'user.update', NULL, NULL, 'user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(54, 'user.delete', NULL, NULL, 'user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(55, 'admin.create', NULL, NULL, 'admin', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(56, 'admin.read', NULL, NULL, 'admin', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(57, 'admin.update', NULL, NULL, 'admin', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(58, 'admin.delete', NULL, NULL, 'admin', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(59, 'admin.change.password', NULL, NULL, 'admin', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(60, 'branch_user.create', NULL, NULL, 'branch_user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(61, 'branch_user.read', NULL, NULL, 'branch_user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(62, 'branch_user.update', NULL, NULL, 'branch_user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(63, 'branch_user.delete', NULL, NULL, 'branch_user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(64, 'branch_user.change.password', NULL, NULL, 'branch_user', 'users', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(65, 'color.create', NULL, NULL, 'color', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(66, 'color.read', NULL, NULL, 'color', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(67, 'color.update', NULL, NULL, 'color', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(68, 'color.delete', NULL, NULL, 'color', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(69, 'condition.create', NULL, NULL, 'condition', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(70, 'condition.read', NULL, NULL, 'condition', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(71, 'condition.update', NULL, NULL, 'condition', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(72, 'condition.delete', NULL, NULL, 'condition', 'master', 'admin', '2023-01-21 15:09:18', '2023-01-21 15:09:18'),
(73, 'user.print', NULL, NULL, 'user', 'users', 'admin', '2023-02-14 05:33:58', '2023-02-14 05:33:58'),
(74, 'user.search', NULL, NULL, 'user', 'users', 'admin', '2023-02-14 05:33:58', '2023-02-14 05:33:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `sort` smallint(6) DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `code`, `name`, `title_bn`, `title_en`, `guard_name`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', 'Master Admin', 'মাস্টার এডমিন', 'Master Admin', 'MasterAdmin', 1, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16'),
(2, '2', 'System Admin', 'সিস্টেম এডমিন', 'System Admin', 'SystemAdmin', 2, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16'),
(3, '3', 'Admin', 'এডমিন', 'Admin', 'Admin', 3, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16'),
(4, '4', 'Head Of Association', 'সমিতির প্রধান', 'Head Of Association', 'HeadOfAssociation', 4, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16'),
(5, '5', 'President', 'এরিয়া সভাপতি', 'Area President', 'President', 5, 1, NULL, 1, '2023-01-20 15:27:16', '2023-02-13 09:44:14'),
(6, '6', 'Vice President', 'সভাপতি', 'President', 'VicePresident', 6, 1, NULL, 1, '2023-01-20 15:27:16', '2023-02-13 09:44:26'),
(7, '7', 'Caliph', 'খলিফা', 'Caliph', 'Caliph', 7, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16'),
(8, '8', 'Operator', 'অপারেটর', 'Operator', 'Operator', 8, 1, NULL, NULL, '2023-01-20 15:27:16', '2023-01-20 15:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 51),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(1, 55),
(1, 56),
(1, 57),
(1, 58),
(1, 59),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 60),
(1, 61),
(1, 62),
(1, 63),
(1, 64),
(1, 65),
(1, 66),
(1, 67),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(1, 73),
(1, 74),
(1, 6),
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_web` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'https://www.kcs-bd.com/',
  `site_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'info@kcs.com.bd',
  `site_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '01713-228475, 01713-228419',
  `site_address_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'Head Office: Shohid Abdul Jabbar Sarak, Joleswaritola, Bogura',
  `site_address_bn` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'প্রধান কার্যালয়: শহিদ আব্দুল জব্বার সড়ক, জলেশ্বরীতলা, বগুড়া',
  `mailer` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT 'smtp',
  `host` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT 'mail.dpg.gov.bd',
  `port` smallint(6) DEFAULT 587,
  `username` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT 'noreply@dpg.gov.bd',
  `password` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT '2RoPyzaY',
  `encryption` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT 'tls',
  `layout` tinyint(4) NOT NULL DEFAULT 0,
  `vat` double(8,2) DEFAULT 0.00,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT 'Mazar Association Service',
  `title_en` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'Mazar Association Service',
  `title_bn` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT 'করতোয়া কুরিয়ার সার্ভিস',
  `footer_en` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT 'Copyright © 2020 -- 2022 Mazar Association Service,All rights reserved.',
  `footer_bn` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT 'করতোয়া কুরিয়ার সার্ভিস জন্য কপিরাইট © 2020 -- 2022 ডকুমেন্টেশন। সমস্ত অধিকার সংরক্ষিত.',
  `favicon` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` smallint(6) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_web`, `site_email`, `site_mobile`, `site_address_en`, `site_address_bn`, `mailer`, `host`, `port`, `username`, `password`, `encryption`, `layout`, `vat`, `name`, `title_en`, `title_bn`, `footer_en`, `footer_bn`, `favicon`, `logo`, `footer_logo`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://khajarbashir.org', 'info@kbf.org', '01713-228475, 01713-228419', 'Ajmirgonj, Bakshigonj, Jamalpur', 'আজমিরিগঞ্জ, বকশীগঞ্জ, জামালপুর', 'smtp', 'mail.dpg.gov.bd', 587, 'noreply@dpg.gov.bd', '2RoPyzaY', 'tls', 0, 0.00, 'Mazar Association Service', 'Hazrat Khajar Bashir (R.A.) Foundation', 'হাজরাত খাজার বাঁশির (র.এ.) ফাউন্ডেশন', 'Copyright © 2023 Hazrat Khajar Bashir (R.A.) Foundation,All rights reserved. <br /> \r\n                    <span style=\"font-weight: bold\">\r\n                      Developed By : \r\n                      <a style=\"font-weight: bold; color:orange\" href=\"https://www.orangebd.com/\">OrangeBD</a>\r\n                    </span>', 'হাজরাত খাজার বাঁশির (র.এ.) ফাউন্ডেশন জন্য কপিরাইট © 2020 -- 2022 ডকুমেন্টেশন। সমস্ত অধিকার সংরক্ষিত.', NULL, NULL, NULL, 1, 1, '2023-01-20 15:27:18', '2023-02-14 12:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_bbs_code` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bbs_code` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbs_code` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thanas`
--

INSERT INTO `thanas` (`id`, `division_id`, `district_id`, `name`, `title_bn`, `title_en`, `division_bbs_code`, `district_bbs_code`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 4, 35, NULL, 'বাগেরহাট সদর', 'Bagerhat sadar', NULL, '01', '08', 1, 0, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(2, 4, 35, NULL, 'চিতলমারী', 'Chitalmari', NULL, '01', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(3, 4, 35, NULL, 'ফকিরহাট', 'Fakirhat', NULL, '01', '34', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(4, 4, 35, NULL, 'কচুয়া', 'Kachua', NULL, '01', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(5, 4, 35, NULL, 'মোল্লাহাট', 'Mollahat', NULL, '01', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(6, 4, 35, NULL, 'মোংলা', 'Mongla', NULL, '01', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(7, 4, 35, NULL, 'মোড়লগঞ্জ', 'Morrelganj', NULL, '01', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(8, 4, 35, NULL, 'রামপাল', 'Rampal', NULL, '01', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(9, 4, 35, NULL, 'শরণখোলা', 'Sarankhola', NULL, '01', '77', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(10, 2, 7, NULL, 'আলীকদম', 'Alikadam', NULL, '03', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(11, 2, 7, NULL, 'বান্দরবান সদর', 'Bandarban sadar', NULL, '03', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(12, 2, 7, NULL, 'লামা', 'Lama', NULL, '03', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(13, 2, 7, NULL, 'নাইক্ষ্যংছড়ি', 'Naikhongchhari', NULL, '03', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(14, 2, 7, NULL, 'রোয়াংছড়ি', 'Rowangchhari', NULL, '03', '89', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(15, 2, 7, NULL, 'রুমা', 'Ruma', NULL, '03', '91', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(16, 2, 7, NULL, 'থান্‌চি', 'Thanchi', NULL, '03', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(17, 1, 1, NULL, 'আমতলী', 'Amtali', NULL, '04', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(18, 1, 1, NULL, 'বামনা', 'Bamna', NULL, '04', '19', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(19, 1, 1, NULL, 'বরগুনা সদর', 'Barguna sadar', NULL, '04', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(20, 1, 1, NULL, 'বেতাগী', 'Betagi', NULL, '04', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(21, 1, 1, NULL, 'পাথরঘাটা', 'Patharghata', NULL, '04', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(22, 1, 1, NULL, 'তালতলী', 'Taltali', NULL, '04', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(23, 1, 2, NULL, 'আগৈলঝাড়া', 'Agailjhara', NULL, '06', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(24, 1, 2, NULL, 'বাবুগঞ্জ', 'Babuganj', NULL, '06', '03', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(25, 1, 2, NULL, 'বাকেরগঞ্জ', 'Bakerganj', NULL, '06', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(26, 1, 2, NULL, 'বানারী পাড়া', 'Banari para', NULL, '06', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(27, 1, 2, NULL, 'গৌরনদী', 'Gaurnadi', NULL, '06', '32', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(28, 1, 2, NULL, 'হিজলা', 'Hizla', NULL, '06', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(29, 1, 2, NULL, 'বরিশাল সদর', 'Barisal sadar (kotwali)', NULL, '06', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(30, 1, 2, NULL, 'মেহেন্দীগঞ্জ', 'Mehendiganj', NULL, '06', '62', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(31, 1, 2, NULL, 'মুলাদী', 'Muladi', NULL, '06', '69', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(32, 1, 2, NULL, 'উজিরপুর', 'Wazirpur', NULL, '06', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(33, 1, 3, NULL, 'ভোলা সদর', 'Bhola sadar', NULL, '09', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(34, 1, 3, NULL, 'বোরহানউদ্দীন', 'Burhanuddin', NULL, '09', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(35, 1, 3, NULL, 'চরফ্যাশন', 'Char fasson', NULL, '09', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(36, 1, 3, NULL, 'দৌলত খান', 'Daulat khan', NULL, '09', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(37, 1, 3, NULL, 'লালমোহন', 'Lalmohan', NULL, '09', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(38, 1, 3, NULL, 'মনপুরা', 'Manpura', NULL, '09', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(39, 1, 3, NULL, 'তজুমুদ্দিন', 'Tazumuddin', NULL, '09', '91', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(40, 5, 45, NULL, 'আদমদিঘী', 'Adamdighi', NULL, '10', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(41, 5, 45, NULL, 'বগুড়া সদর', 'Bogra sadar', NULL, '10', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(42, 5, 45, NULL, 'ধুনট', 'Dhunat', NULL, '10', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(43, 5, 45, NULL, 'ধুপচাঁচিয়া', 'Dhupchanchia', NULL, '10', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(44, 5, 45, NULL, 'গাবতলী', 'Gabtali', NULL, '10', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(45, 5, 45, NULL, 'কাহালু', 'Kahaloo', NULL, '10', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(46, 5, 45, NULL, 'নন্দীগ্রাম', 'Nandigram', NULL, '10', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(47, 5, 45, NULL, 'সারিয়াকান্দি', 'Sariakandi', NULL, '10', '81', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(48, 5, 45, NULL, 'শাহজাহানপুর', 'Shajahanpur', NULL, '10', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(49, 5, 45, NULL, 'শেরপুর', 'Sherpur', NULL, '10', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(50, 5, 45, NULL, 'শিব্‌গঞ্জ', 'Shibganj', NULL, '10', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(51, 5, 45, NULL, 'সোনাতলা', 'Sonatola', NULL, '10', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(52, 2, 8, NULL, 'আখাউড়া', 'Akhaura', NULL, '12', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(53, 2, 8, NULL, 'বাঞ্ছারামপুর', 'Banchharampur', NULL, '12', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(54, 2, 8, NULL, 'বিজয়নগর', 'Bijoynagar', NULL, '12', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(55, 2, 8, NULL, 'ব্রাক্ষ্মণবাড়িয়া সদর', 'Brahmanbaria sadar', NULL, '12', '13', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(56, 2, 8, NULL, 'আশুগঞ্জ', 'Ashuganj', NULL, '12', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(57, 2, 8, NULL, 'কস্‌বা', 'Kasba', NULL, '12', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(58, 2, 8, NULL, 'নবীনগর', 'Nabinagar', NULL, '12', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(59, 2, 8, NULL, 'নাসিরনগর', 'Nasirnagar', NULL, '12', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(60, 2, 8, NULL, 'সরাইল', 'Sarail', NULL, '12', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(61, 2, 9, NULL, 'চাঁদপুর সদর', 'Chandpur sadar', NULL, '13', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(62, 2, 9, NULL, 'ফরিদগঞ্জ', 'Faridganj', NULL, '13', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(63, 2, 9, NULL, 'হাইমচর', 'Haim char', NULL, '13', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(64, 2, 9, NULL, 'হাজীগঞ্জ', 'Hajiganj', NULL, '13', '49', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(65, 2, 9, NULL, 'কচুয়া', 'Kachua', NULL, '13', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(66, 2, 9, NULL, 'মতলব দক্ষিণ', 'Matlab dakshin', NULL, '13', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(67, 2, 9, NULL, 'মতলব উত্তর', 'Matlab uttar', NULL, '13', '79', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(68, 2, 9, NULL, 'শাহরাস্তি', 'Shahrasti', NULL, '13', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(69, 2, 10, NULL, 'আনোয়ারা', 'Anowara', NULL, '15', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(70, 2, 10, NULL, 'বায়জিদ বোস্তামী', 'Bayejid bostami', NULL, '15', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(71, 2, 10, NULL, 'বাঁশখালী', 'Banshkhali', NULL, '15', '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(72, 2, 10, NULL, 'বাকলীয়া', 'Bakalia', NULL, '15', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(73, 2, 10, NULL, 'বোয়ালখালী', 'Boalkhali', NULL, '15', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(74, 2, 10, NULL, 'চন্দনাইশ', 'Chandanaish', NULL, '15', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(75, 2, 10, NULL, 'চাঁদগাও', 'Chandgaon', NULL, '15', '19', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(76, 2, 10, NULL, 'চট্টগ্রাম পোর্ট', 'Chittagong port', NULL, '15', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(77, 2, 10, NULL, 'ডবলমুরিং', 'Double mooring', NULL, '15', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(78, 2, 10, NULL, 'কর্ণফুলী (পুলিশ ষ্টেশন)', 'Karnafuli (police station)', NULL, '15', '39', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(79, 2, 10, NULL, 'ফটিকছড়ি', 'Fatikchhari', NULL, '15', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(80, 2, 10, NULL, 'হালিশহর', 'Halishahar', NULL, '15', '35', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(81, 2, 10, NULL, 'হাটহাজারী', 'Hathazari', NULL, '15', '37', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(82, 2, 10, NULL, 'কোতয়ালী', 'Kotwali', NULL, '15', '41', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(83, 2, 10, NULL, 'খুল্‌শী', 'Khulshi', NULL, '15', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(84, 2, 10, NULL, 'লোহাগড়া', 'Lohagara', NULL, '15', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(85, 2, 10, NULL, 'মিরশরাই', 'Mirsharai', NULL, '15', '53', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(86, 2, 10, NULL, 'পাহাড়তলী', 'Pahartali', NULL, '15', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(87, 2, 10, NULL, 'পাঁচলাইশ', 'Panchlaish', NULL, '15', '57', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(88, 2, 10, NULL, 'পটিয়া', 'Patiya', NULL, '15', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(89, 2, 10, NULL, 'পতেঙ্গা', 'Patenga', NULL, '15', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(90, 2, 10, NULL, 'রাংগুনীয়া', 'Rangunia', NULL, '15', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(91, 2, 10, NULL, 'রাউজান', 'Raozan', NULL, '15', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(92, 2, 10, NULL, 'সন্দ্বীপ', 'Sandwip', NULL, '15', '78', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(93, 2, 10, NULL, 'সাতকানিয়া', 'Satkania', NULL, '15', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(94, 2, 10, NULL, 'সীতাকুন্ড', 'Sitakunda', NULL, '15', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(95, 4, 36, NULL, 'আলমডাংগা', 'Alamdanga', NULL, '18', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(96, 4, 36, NULL, 'চুয়াডাঙ্গা সদর', 'Chuadanga sadar', NULL, '18', '23', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(97, 4, 36, NULL, 'দামুরহুদা', 'Damurhuda', NULL, '18', '31', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(98, 4, 36, NULL, 'জীবন নগর', 'Jiban nagar', NULL, '18', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(99, 2, 11, NULL, 'বরুড়া', 'Barura', NULL, '19', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(100, 2, 11, NULL, 'ব্রাক্ষ্মণ পাড়া', 'Brahman para', NULL, '19', '15', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(101, 2, 11, NULL, 'বুড়িচং', 'Burichang', NULL, '19', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(102, 2, 11, NULL, 'চন্দিনা', 'Chandina', NULL, '19', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(103, 2, 11, NULL, 'চৌদ্দগ্রাম', 'Chauddagram', NULL, '19', '31', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(104, 2, 11, NULL, 'কুমিল্লা সদর দক্ষিণ', 'Comilla sadar dakshin', NULL, '19', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(105, 2, 11, NULL, 'দাউদকান্দি', 'Daudkandi', NULL, '19', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(106, 2, 11, NULL, 'দেবিদ্বার', 'Debidwar', NULL, '19', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(107, 2, 11, NULL, 'হোমনা', 'Homna', NULL, '19', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(108, 2, 11, NULL, 'কুমিল্লা আদর্শ সদর', 'Comilla adarsha sadar', NULL, '19', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(109, 2, 11, NULL, 'লাকসাম', 'Laksam', NULL, '19', '72', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(110, 2, 11, NULL, 'মনোহরগঞ্জ', 'Manoharganj', NULL, '19', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(111, 2, 11, NULL, 'মেঘনা', 'Meghna', NULL, '19', '75', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(112, 2, 11, NULL, 'মুরাদনগর', 'Muradnagar', NULL, '19', '81', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(113, 2, 11, NULL, 'নাঙ্গলকোট', 'Nangalkot', NULL, '19', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(114, 2, 11, NULL, 'তিতাস', 'Titas', NULL, '19', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(115, 2, 12, NULL, 'চকরিয়া', 'Chakaria', NULL, '22', '16', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(116, 2, 12, NULL, 'কক্সবাজার সদর', 'Coxs bazar sadar', NULL, '22', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(117, 2, 12, NULL, 'কুতুবদিয়া', 'Kutubdia', NULL, '22', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(118, 2, 12, NULL, 'মহেশখালী', 'Maheshkhali', NULL, '22', '49', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(119, 2, 12, NULL, 'পেকুয়া', 'Pekua', NULL, '22', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(120, 2, 12, NULL, 'রামু', 'Ramu', NULL, '22', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(121, 2, 12, NULL, 'টেক্‌নাফ', 'Teknaf', NULL, '22', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(122, 2, 12, NULL, 'উখিয়া', 'Ukhia', NULL, '22', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(123, 3, 18, NULL, 'আদাবর', 'Adabor', NULL, '26', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(124, 3, 18, NULL, 'বাড্ডা', 'Badda', NULL, '26', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(125, 3, 18, NULL, 'বংশাল', 'Bangshal', NULL, '26', '05', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(126, 3, 18, NULL, 'বিমান বন্দর', 'Biman bandar', NULL, '26', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(127, 3, 18, NULL, '', 'Banani', NULL, '26', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(128, 3, 18, NULL, 'ক্যান্টনমেন্ট', 'Cantonment', NULL, '26', '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(129, 3, 18, NULL, 'চক বাজার', 'Chak bazar', NULL, '26', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(130, 3, 18, NULL, 'দক্ষিণখান', 'Dakshinkhan', NULL, '26', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(131, 3, 18, NULL, 'দারুস সালাম', 'Darus salam', NULL, '26', '11', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(132, 3, 18, NULL, 'ডেমরা', 'Demra', NULL, '26', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(133, 3, 18, NULL, 'ধানমন্ডি', 'Dhanmondi', NULL, '26', '16', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(134, 3, 18, NULL, 'হাজারীবাগ', 'Hazaribagh', NULL, '26', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(135, 3, 18, NULL, 'ধামরাই', 'Dhamrai', NULL, '26', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(136, 3, 18, NULL, 'দোহার', 'Dohar', NULL, '26', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(137, 3, 18, NULL, '', 'Bhasan tek', NULL, '26', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(138, 3, 18, NULL, '', 'Bhatara', NULL, '26', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(139, 3, 18, NULL, 'গেন্ডারিয়া', 'Gendaria', NULL, '26', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(140, 3, 18, NULL, 'গুলশান', 'Gulshan', NULL, '26', '26', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(141, 3, 18, NULL, 'যাত্রাবাড়ী', 'Jatrabari', NULL, '26', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(142, 3, 18, NULL, 'কাফরুল', 'Kafrul', NULL, '26', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(143, 3, 18, NULL, 'কদমতলী', 'Kadamtali', NULL, '26', '32', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(144, 3, 18, NULL, 'কলাবাগান', 'Kalabagan', NULL, '26', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(145, 3, 18, NULL, 'কামরাঙ্গীর চর', 'Kamrangir char', NULL, '26', '34', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(146, 3, 18, NULL, 'খিলগাও', 'Khilgaon', NULL, '26', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(147, 3, 18, NULL, 'খিলক্ষেত', 'Khilkhet', NULL, '26', '37', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(148, 3, 18, NULL, 'কেরানীগঞ্জ', 'Keraniganj', NULL, '26', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(149, 3, 18, NULL, 'কোতয়ালী', 'Kotwali', NULL, '26', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(150, 3, 18, NULL, 'লালবাগ', 'Lalbagh', NULL, '26', '42', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(151, 3, 18, NULL, 'মোহাম্মদপুর', 'Mohammadpur', NULL, '26', '50', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(152, 3, 18, NULL, 'রমনা', 'Ramna', NULL, '26', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(153, 3, 18, NULL, 'মিরপুর', 'Mirpur', NULL, '26', '48', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(154, 3, 18, NULL, 'মতিঝিল', 'Motijheel', NULL, '26', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(155, 3, 18, NULL, '', 'Mugda para', NULL, '26', '57', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(156, 3, 18, NULL, 'নবাবগঞ্জ', 'Nawabganj', NULL, '26', '62', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(157, 3, 18, NULL, 'নিউ মার্কেট', 'New market', NULL, '26', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(158, 3, 18, NULL, 'পল্লবী', 'Pallabi', NULL, '26', '64', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(159, 3, 18, NULL, 'পল্টন', 'Paltan', NULL, '26', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(160, 3, 18, NULL, 'রামপুরা', 'Rampura', NULL, '26', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(161, 3, 18, NULL, 'সবুজবাগ', 'Sabujbagh', NULL, '26', '68', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(162, 3, 18, NULL, '', 'Rupnagar', NULL, '26', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(163, 3, 18, NULL, 'সাভার', 'Savar', NULL, '26', '72', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(164, 3, 18, NULL, '', 'Shahjahanpur', NULL, '26', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(165, 3, 18, NULL, 'শাহ্‌ আলী', 'Shah ali', NULL, '26', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(166, 3, 18, NULL, 'শাহবাগ', 'Shahbagh', NULL, '26', '75', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(167, 3, 18, NULL, 'শ্যামপুর', 'Shyampur', NULL, '26', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(168, 3, 18, NULL, 'শের-ই-বাংলা নগর', 'Sher-e-bangla nagar', NULL, '26', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(169, 3, 18, NULL, 'সুত্রাপুর', 'Sutrapur', NULL, '26', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(170, 3, 18, NULL, 'তেজগাঁও', 'Tejgaon', NULL, '26', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(171, 3, 18, NULL, 'তেজগাঁও শিল্প এলাকা', 'Tejgaon ind. area', NULL, '26', '92', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(172, 3, 18, NULL, 'তুরাগ', 'Turag', NULL, '26', '93', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(173, 3, 18, NULL, 'উত্তরা', 'Uttara  paschim', NULL, '26', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(174, 3, 18, NULL, '', 'Uttara  purba', NULL, '26', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(175, 3, 18, NULL, 'উত্তর খান', 'Uttar khan', NULL, '26', '96', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(176, 3, 18, NULL, '', 'Wari', NULL, '26', '98', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(177, 6, 53, NULL, 'বিরামপুর', 'Birampur', NULL, '27', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(178, 6, 53, NULL, 'বীরগঞ্জ', 'Birganj', NULL, '27', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(179, 6, 53, NULL, 'বিরল', 'Biral', NULL, '27', '17', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(180, 6, 53, NULL, 'বোচাগঞ্জ', 'Bochaganj', NULL, '27', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(181, 6, 53, NULL, 'চিরিরবন্দর', 'Chirirbandar', NULL, '27', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(182, 6, 53, NULL, 'ফুলবাড়ী', 'Fulbari', NULL, '27', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(183, 6, 53, NULL, 'ঘোড়াঘাট', 'Ghoraghat', NULL, '27', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(184, 6, 53, NULL, 'হাকিমপুর', 'Hakimpur', NULL, '27', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(185, 6, 53, NULL, 'কাহারোল', 'Kaharole', NULL, '27', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(186, 6, 53, NULL, 'খান্‌সামা', 'Khansama', NULL, '27', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(187, 6, 53, NULL, 'দিনাজপুর সদর', 'Dinajpur sadar', NULL, '27', '64', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(188, 6, 53, NULL, 'নবাবগঞ্জ', 'Nawabganj', NULL, '27', '69', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(189, 6, 53, NULL, 'পার্বতীপুর', 'Parbatipur', NULL, '27', '77', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(190, 3, 19, NULL, 'আল্‌ফাডাঙ্গা', 'Alfadanga', NULL, '29', '03', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(191, 3, 19, NULL, 'ভাংগা', 'Bhanga', NULL, '29', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(192, 3, 19, NULL, 'বোয়ালমারী', 'Boalmari', NULL, '29', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(193, 3, 19, NULL, 'চর ভদ্রাশন', 'Char bhadrasan', NULL, '29', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(194, 3, 19, NULL, 'ফরিদপুর সদর', 'Faridpur sadar', NULL, '29', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(195, 3, 19, NULL, 'মধুখালী', 'Madhukhali', NULL, '29', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(196, 3, 19, NULL, 'নগরকান্দা', 'Nagarkanda', NULL, '29', '62', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(197, 3, 19, NULL, 'সদরপুর', 'Sadarpur', NULL, '29', '84', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(198, 3, 19, NULL, 'সালথা', 'Saltha', NULL, '29', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(199, 2, 13, NULL, 'ছাগলনাইয়া', 'Chhagalnaiya', NULL, '30', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(200, 2, 13, NULL, 'দাগনভূঁঞা', 'Daganbhuiyan', NULL, '30', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(201, 2, 13, NULL, 'ফেনী সদর', 'Feni sadar', NULL, '30', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(202, 2, 13, NULL, 'ফুলগাজী', 'Fulgazi', NULL, '30', '41', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(203, 2, 13, NULL, 'পরশুরাম', 'Parshuram', NULL, '30', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(204, 2, 13, NULL, 'সোনাগাজী', 'Sonagazi', NULL, '30', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(205, 6, 54, NULL, 'ফুলছড়ি', 'Fulchhari', NULL, '32', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(206, 6, 54, NULL, 'গাইবান্ধা সদর', 'Gaibandha sadar', NULL, '32', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(207, 6, 54, NULL, 'গোবিন্দগঞ্জ', 'Gobindaganj', NULL, '32', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(208, 6, 54, NULL, 'পলাশবাড়ী', 'Palashbari', NULL, '32', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(209, 6, 54, NULL, 'সাদুল্লাপুর', 'Sadullapur', NULL, '32', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(210, 6, 54, NULL, 'সাঘাটা', 'Saghata', NULL, '32', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(211, 6, 54, NULL, 'সুন্দরগঞ্জ', 'Sundarganj', NULL, '32', '91', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(212, 3, 20, NULL, 'গাজীপুর সদর', 'Gazipur sadar', NULL, '33', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(213, 3, 20, NULL, 'কালিয়াকৈর', 'Kaliakair', NULL, '33', '32', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(214, 3, 20, NULL, 'কালিগঞ্জ', 'Kaliganj', NULL, '33', '34', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(215, 3, 20, NULL, 'কাপাসিয়া', 'Kapasia', NULL, '33', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(216, 3, 20, NULL, 'শ্রীপুর', 'Sreepur', NULL, '33', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(217, 3, 21, NULL, 'গোপালগঞ্জ সদর', 'Gopalganj sadar', NULL, '35', '32', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(218, 3, 21, NULL, 'কাশিয়ানী', 'Kashiani', NULL, '35', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(219, 3, 21, NULL, 'কোটালিপাড়া', 'Kotalipara', NULL, '35', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(220, 3, 21, NULL, 'মুকসুদপুর', 'Muksudpur', NULL, '35', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(221, 3, 21, NULL, 'টংগীপাড়া', 'Tungipara', NULL, '35', '91', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(222, 7, 61, NULL, 'আজমিরিগঞ্জ', 'Ajmiriganj', NULL, '36', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(223, 7, 61, NULL, 'বাহুবল', 'Bahubal', NULL, '36', '05', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(224, 7, 61, NULL, 'বানিয়াচং', 'Baniachong', NULL, '36', '11', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(225, 7, 61, NULL, 'চুনারুঘাট', 'Chunarughat', NULL, '36', '26', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(226, 7, 61, NULL, 'হবিগঞ্জ সদর', 'Habiganj sadar', NULL, '36', '44', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(227, 7, 61, NULL, 'লাখাই', 'Lakhai', NULL, '36', '68', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(228, 7, 61, NULL, 'মাধবপুর', 'Madhabpur', NULL, '36', '71', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(229, 7, 61, NULL, 'নবীগঞ্জ', 'Nabiganj', NULL, '36', '77', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(230, 5, 46, NULL, 'আক্কেলপুর', 'Akkelpur', NULL, '38', '13', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(231, 5, 46, NULL, 'জয়পুরহাট সদর', 'Joypurhat sadar', NULL, '38', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(232, 5, 46, NULL, 'কালাই', 'Kalai', NULL, '38', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(233, 5, 46, NULL, 'ক্ষেতলাল', 'Khetlal', NULL, '38', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(234, 5, 46, NULL, 'পাঁচবিবি', 'Panchbibi', NULL, '38', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(235, 3, 22, NULL, 'বকশিগঞ্জ', 'Bakshiganj', NULL, '39', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(236, 3, 22, NULL, 'দেওয়ানগঞ্জ', 'Dewanganj', NULL, '39', '15', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(237, 3, 22, NULL, 'ইসলামপুর', 'Islampur', NULL, '39', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(238, 3, 22, NULL, 'জামালপুর সদর', 'Jamalpur sadar', NULL, '39', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(239, 3, 22, NULL, 'মাদারগঞ্জ', 'Madarganj', NULL, '39', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(240, 3, 22, NULL, 'মেলান্দহ', 'Melandaha', NULL, '39', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(241, 3, 22, NULL, 'সরিষাবাড়ী', 'Sarishabari upazila', NULL, '39', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(242, 4, 37, NULL, 'অভয়নগর', 'Abhaynagar', NULL, '41', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(243, 4, 37, NULL, 'বাঘারপাড়া', 'Bagher para', NULL, '41', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(244, 4, 37, NULL, 'চৌগাছা', 'Chaugachha', NULL, '41', '11', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(245, 4, 37, NULL, 'ঝিকরগাছা', 'Jhikargachha', NULL, '41', '23', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(246, 4, 37, NULL, 'কেশবপুর', 'Keshabpur', NULL, '41', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(247, 4, 37, NULL, 'যশোর সদর', 'Jessore sadar', NULL, '41', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(248, 4, 37, NULL, 'মনিরামপুর', 'Manirampur', NULL, '41', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(249, 4, 37, NULL, 'শার্শা', 'Sharsha', NULL, '41', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(250, 1, 4, NULL, 'ঝালকাঠী সদর', 'Jhalokati sadar', NULL, '42', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(251, 1, 4, NULL, 'কাঠালিয়া', 'Kanthalia', NULL, '42', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(252, 1, 4, NULL, 'নলছিটি', 'Nalchity', NULL, '42', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(253, 1, 4, NULL, 'রাজাপুর', 'Rajapur', NULL, '42', '84', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(254, 4, 38, NULL, 'হরিনাকুন্ডু', 'Harinakunda', NULL, '44', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(255, 4, 38, NULL, 'ঝিনাইদহ সদর', 'Jhenaidah sadar', NULL, '44', '19', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(256, 4, 38, NULL, 'কালীগঞ্জ', 'Kaliganj', NULL, '44', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(257, 4, 38, NULL, 'কোটচাঁদপুর', 'Kotchandpur', NULL, '44', '42', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(258, 4, 38, NULL, 'মহেশপুর', 'Maheshpur', NULL, '44', '71', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(259, 4, 38, NULL, 'শৈলকুপা', 'Shailkupa', NULL, '44', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(260, 2, 14, NULL, 'দিঘিনালা', 'Dighinala', NULL, '46', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(261, 2, 14, NULL, 'খাগরাছড়ি সদর', 'Khagrachhari sadar', NULL, '46', '49', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(262, 2, 14, NULL, 'লক্ষীছড়ি', 'Lakshmichhari', NULL, '46', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(263, 2, 14, NULL, 'মহালছড়ি', 'Mahalchhari', NULL, '46', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(264, 2, 14, NULL, 'মানিকছড়ি', 'Manikchhari', NULL, '46', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(265, 2, 14, NULL, 'মাটিরাংগা', 'Matiranga', NULL, '46', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(266, 2, 14, NULL, 'পানছড়ি', 'Panchhari', NULL, '46', '77', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(267, 2, 14, NULL, 'রামগর', 'Ramgarh', NULL, '46', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(268, 4, 39, NULL, 'বটিয়াঘাটা', 'Batiaghata', NULL, '47', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(269, 4, 39, NULL, 'দাকোপ', 'Dacope', NULL, '47', '17', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(270, 4, 39, NULL, 'দৌলতপুর', 'Daulatpur', NULL, '47', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(271, 4, 39, NULL, 'ডুমুরিয়া', 'Dumuria', NULL, '47', '30', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(272, 4, 39, NULL, 'দিঘলিয়া', 'Dighalia', NULL, '47', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(273, 4, 39, NULL, 'খালিসপুর', 'Khalishpur', NULL, '47', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(274, 4, 39, NULL, 'খান জাহান আলী', 'Khan jahan ali', NULL, '47', '48', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(275, 4, 39, NULL, 'খুলনা সদর', 'Khulna sadar', NULL, '47', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(276, 4, 39, NULL, 'কয়রা', 'Koyra', NULL, '47', '53', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(277, 4, 39, NULL, 'পাইকগাছা', 'Paikgachha', NULL, '47', '64', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(278, 4, 39, NULL, 'ফুলতলা', 'Phultala', NULL, '47', '69', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(279, 4, 39, NULL, 'রূপসা', 'Rupsa', NULL, '47', '75', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(280, 4, 39, NULL, 'সোনাডাঙ্গা', 'Sonadanga', NULL, '47', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(281, 4, 39, NULL, 'তেরখাদা', 'Terokhada', NULL, '47', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(282, 3, 23, NULL, 'অষ্টগ্রাম', 'Austagram', NULL, '48', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(283, 3, 23, NULL, 'বাজিতপুর', 'Bajitpur', NULL, '48', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(284, 3, 23, NULL, 'ভৈরব', 'Bhairab', NULL, '48', '11', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(285, 3, 23, NULL, 'হোসেনপুর', 'Hossainpur', NULL, '48', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(286, 3, 23, NULL, 'ইটনা', 'Itna', NULL, '48', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(287, 3, 23, NULL, 'করিমগঞ্জ', 'Karimganj', NULL, '48', '42', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(288, 3, 23, NULL, 'কটিয়াদী', 'Katiadi', NULL, '48', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(289, 3, 23, NULL, 'কিশোরগঞ্জ সদর', 'Kishoreganj sadar', NULL, '48', '49', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(290, 3, 23, NULL, 'কুলিয়ার চর', 'Kuliar char', NULL, '48', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(291, 3, 23, NULL, 'মিঠামইন', 'Mithamain', NULL, '48', '59', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(292, 3, 23, NULL, 'নিক্‌লী', 'Nikli', NULL, '48', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(293, 3, 23, NULL, 'পাকুন্দিয়া', 'Pakundia', NULL, '48', '79', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(294, 3, 23, NULL, 'তারাইল', 'Tarail', NULL, '48', '92', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(295, 6, 55, NULL, 'ভুরুংগামারী', 'Bhurungamari', NULL, '49', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(296, 6, 55, NULL, 'রাজিবপুর', 'Char rajibpur', NULL, '49', '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(297, 6, 55, NULL, 'চিলমারী', 'Chilmari', NULL, '49', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(298, 6, 55, NULL, 'ফুলবাড়ী', 'Phulbari', NULL, '49', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(299, 6, 55, NULL, 'কুড়িগ্রাম সদর', 'Kurigram sadar', NULL, '49', '52', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(300, 6, 55, NULL, 'নাগেশ্বরী', 'Nageshwari', NULL, '49', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(301, 6, 55, NULL, 'রাজারহাট', 'Rajarhat', NULL, '49', '77', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(302, 6, 55, NULL, 'রৌমারী', 'Raumari', NULL, '49', '79', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(303, 6, 55, NULL, 'উলিপুর', 'Ulipur', NULL, '49', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(304, 4, 40, NULL, 'ভেড়ামারা', 'Bheramara', NULL, '50', '15', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(305, 4, 40, NULL, 'দৌলতপুর', 'Daulatpur', NULL, '50', '39', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(306, 4, 40, NULL, 'খোক্‌সা', 'Khoksa', NULL, '50', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(307, 4, 40, NULL, 'কুমারখালী', 'Kumarkhali', NULL, '50', '71', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(308, 4, 40, NULL, 'কুষ্টিয়া সদর', 'Kushtia sadar', NULL, '50', '79', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(309, 4, 40, NULL, 'মিরপুর', 'Mirpur', NULL, '50', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(310, 2, 15, NULL, 'কমলনগর', 'Kamalnagar', NULL, '51', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(311, 2, 15, NULL, 'লক্ষ্ণীপুর সদর', 'Lakshmipur sadar', NULL, '51', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(312, 2, 15, NULL, 'রায়পুর', 'Roypur', NULL, '51', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(313, 2, 15, NULL, 'রামগঞ্জ', 'Ramganj', NULL, '51', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(314, 2, 15, NULL, 'রামগতী', 'Ramgati', NULL, '51', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(315, 6, 56, NULL, 'আদিতমারী', 'Aditmari', NULL, '52', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(316, 6, 56, NULL, 'হাতীবান্ধা', 'Hatibandha', NULL, '52', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(317, 6, 56, NULL, 'কালীগঞ্জ', 'Kaliganj', NULL, '52', '39', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(318, 6, 56, NULL, 'লালমনিরহাট সদর', 'Lalmonirhat sadar', NULL, '52', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(319, 6, 56, NULL, 'পাটগ্রাম', 'Patgram', NULL, '52', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(320, 3, 24, NULL, 'কালকিনী', 'Kalkini', NULL, '54', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(321, 3, 24, NULL, 'মাদারিপুর সদর', 'Madaripur sadar', NULL, '54', '54', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(322, 3, 24, NULL, 'রাজৈর', 'Rajoir', NULL, '54', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(323, 3, 24, NULL, 'শিব্‌ চর', 'Shibchar', NULL, '54', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(324, 4, 41, NULL, 'মাগুরা সদর', 'Magura sadar', NULL, '55', '57', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(325, 4, 41, NULL, 'মোহাম্মদপুর', 'Mohammadpur', NULL, '55', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(326, 4, 41, NULL, 'শালিখা', 'Shalikha', NULL, '55', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(327, 4, 41, NULL, 'শ্রীপুর', 'Sreepur', NULL, '55', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(328, 3, 25, NULL, 'দৌলতপুর', 'Daulatpur', NULL, '56', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(329, 3, 25, NULL, 'ঘিওর', 'Ghior', NULL, '56', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(330, 3, 25, NULL, 'হরিরামপুর', 'Harirampur', NULL, '56', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(331, 3, 25, NULL, 'মানিকগঞ্জ সদর', 'Manikganj sadar', NULL, '56', '46', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(332, 3, 25, NULL, 'সাটুরিয়া', 'Saturia', NULL, '56', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(333, 3, 25, NULL, 'শিবালয়', 'Shibalaya', NULL, '56', '78', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(334, 3, 25, NULL, 'শিংগাইর', 'Singair', NULL, '56', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(335, 4, 42, NULL, 'গাংনী', 'Gangni', NULL, '57', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(336, 4, 42, NULL, 'মজিব নগর', 'Mujib nagar', NULL, '57', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(337, 4, 42, NULL, 'মেহেরপুর সদর', 'Meherpur sadar', NULL, '57', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(338, 7, 62, NULL, 'বড়লেখা', 'Barlekha', NULL, '58', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(339, 7, 62, NULL, 'জুড়ী', 'Juri', NULL, '58', '35', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(340, 7, 62, NULL, 'কমলগঞ্জ', 'Kamalganj', NULL, '58', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(341, 7, 62, NULL, 'কুলাউড়া', 'Kulaura', NULL, '58', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(342, 7, 62, NULL, 'মৌলভীবাজার সদর', 'Maulvibazar sadar', NULL, '58', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(343, 7, 62, NULL, 'রাজনগর', 'Rajnagar', NULL, '58', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(344, 7, 62, NULL, 'শ্রীমঙ্গল', 'Sreemangal', NULL, '58', '83', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(345, 3, 26, NULL, 'গজারিয়া', 'Gazaria', NULL, '59', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(346, 3, 26, NULL, 'লৌহজং', 'Lohajang', NULL, '59', '44', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(347, 3, 26, NULL, 'মুন্সীগঞ্জ সদর', 'Munshiganj sadar', NULL, '59', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(348, 3, 26, NULL, 'সিরাজদিখান', 'Serajdikhan', NULL, '59', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(349, 3, 26, NULL, 'শ্রীনগর', 'Sreenagar', NULL, '59', '84', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(350, 3, 26, NULL, 'টুঙ্গিবাড়ী', 'Tongibari', NULL, '59', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(351, 3, 27, NULL, 'ভালুকা', 'Bhaluka', NULL, '61', '13', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(352, 3, 27, NULL, 'ধোবাউড়া', 'Dhobaura', NULL, '61', '16', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(353, 3, 27, NULL, 'ফুলবাড়ীয়া', 'Fulbaria', NULL, '61', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(354, 3, 27, NULL, 'গফরগাঁও', 'Gaffargaon', NULL, '61', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(355, 3, 27, NULL, 'গৌরীপুর', 'Gauripur', NULL, '61', '23', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(356, 3, 27, NULL, 'হালুয়াঘাট', 'Haluaghat', NULL, '61', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(357, 3, 27, NULL, 'ঈশ্বরগঞ্জ', 'Ishwarganj', NULL, '61', '31', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(358, 3, 27, NULL, 'ময়মনসিংহ সদর', 'Mymensingh sadar', NULL, '61', '52', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(359, 3, 27, NULL, 'মুক্তাগাছা', 'Muktagachha', NULL, '61', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(360, 3, 27, NULL, 'নান্দাইল', 'Nandail', NULL, '61', '72', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(361, 3, 27, NULL, 'ফুলপুর', 'Phulpur', NULL, '61', '81', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(362, 3, 27, NULL, 'তারাকান্দা', 'Tarakanda', NULL, '61', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(363, 3, 27, NULL, 'ত্রিশাল', 'Trishal', NULL, '61', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(364, 5, 47, NULL, 'আত্রাই', 'Atrai', NULL, '64', '03', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(365, 5, 47, NULL, 'বদলগাছী', 'Badalgachhi', NULL, '64', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(366, 5, 47, NULL, 'ধামুইরহাট', 'Dhamoirhat', NULL, '64', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(367, 5, 47, NULL, 'মান্দা', 'Manda', NULL, '64', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(368, 5, 47, NULL, 'মহাদেবপুর', 'Mahadebpur', NULL, '64', '50', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(369, 5, 47, NULL, 'নওগাঁ সদর', 'Naogaon sadar', NULL, '64', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(370, 5, 47, NULL, 'নিয়ামতপুর', 'Niamatpur', NULL, '64', '69', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(371, 5, 47, NULL, 'পত্নীতলা', 'Patnitala', NULL, '64', '75', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(372, 5, 47, NULL, 'পোরশা', 'Porsha', NULL, '64', '79', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(373, 5, 47, NULL, 'রাণীনগর', 'Raninagar', NULL, '64', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(374, 5, 47, NULL, 'সাপাহার', 'Sapahar', NULL, '64', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(375, 4, 43, NULL, 'কালিয়া', 'Kalia', NULL, '65', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(376, 4, 43, NULL, 'লোহাগড়া', 'Lohagara', NULL, '65', '52', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(377, 4, 43, NULL, 'নড়াইল সদর', 'Narail sadar', NULL, '65', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(378, 3, 28, NULL, 'আড়াইহাজার', 'Araihazar', NULL, '67', '02', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(379, 3, 28, NULL, 'সোনারগাঁও', 'Sonargaon', NULL, '67', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(380, 3, 28, NULL, 'বন্দর', 'Bandar', NULL, '67', '06', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(381, 3, 28, NULL, 'নারায়ণগঞ্জ সদর', 'Narayanganj sadar', NULL, '67', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(382, 3, 28, NULL, 'রূপগঞ্জ', 'Rupganj', NULL, '67', '68', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(383, 3, 29, NULL, 'বেলাবো', 'Belabo', NULL, '68', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(384, 3, 29, NULL, 'মনোহরদী', 'Manohardi', NULL, '68', '52', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(385, 3, 29, NULL, 'নরসিংদী সদর', 'Narsingdi sadar', NULL, '68', '60', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(386, 3, 29, NULL, 'পলাশ', 'Palash', NULL, '68', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(387, 3, 29, NULL, 'রায়পুরা', 'Roypura', NULL, '68', '64', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(388, 3, 29, NULL, 'শিবপুর', 'Shibpur', NULL, '68', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(389, 5, 48, NULL, 'বাগাতিপাড়া', 'Bagatipara', NULL, '69', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(390, 5, 48, NULL, 'বড়ইগ্রাম', 'Baraigram', NULL, '69', '15', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(391, 5, 48, NULL, 'গুরুদাসপুর', 'Gurudaspur', NULL, '69', '41', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(392, 5, 48, NULL, 'লালপুর', 'Lalpur', NULL, '69', '44', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(393, 5, 48, NULL, '', 'Naldanga', NULL, '69', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(394, 5, 48, NULL, 'নাটোর সদর', 'Natore sadar', NULL, '69', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(395, 5, 48, NULL, 'সিংড়া', 'Singra', NULL, '69', '91', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(396, 5, 49, NULL, 'ভোলাহাট', 'Bholahat', NULL, '70', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(397, 5, 49, NULL, 'গোমস্তাপুর', 'Gomastapur', NULL, '70', '37', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(398, 5, 49, NULL, 'নাচোল', 'Nachole', NULL, '70', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(399, 5, 49, NULL, 'চাঁপাই নবাবগঞ্জ সদর', 'Chapai nababganj sadar', NULL, '70', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(400, 5, 49, NULL, 'শিবগঞ্জ', 'Shibganj', NULL, '70', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(401, 3, 30, NULL, 'আটপাড়া', 'Atpara', NULL, '72', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(402, 3, 30, NULL, 'বারহাট্টা', 'Barhatta', NULL, '72', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(403, 3, 30, NULL, 'দূর্গাপুর', 'Durgapur', NULL, '72', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(404, 3, 30, NULL, 'খলিয়াজুরী', 'Khaliajuri', NULL, '72', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(405, 3, 30, NULL, 'কলমাকান্দা', 'Kalmakanda', NULL, '72', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(406, 3, 30, NULL, 'কেন্দুয়া', 'Kendua', NULL, '72', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(407, 3, 30, NULL, 'মদন ', 'Madan', NULL, '72', '56', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(408, 3, 30, NULL, 'মোহনগঞ্জ', 'Mohanganj', NULL, '72', '63', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(409, 3, 30, NULL, 'নেত্রকোনা সদর', 'Netrokona sadar', NULL, '72', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(410, 3, 30, NULL, 'পূর্বধলা', 'Purbadhala', NULL, '72', '83', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(411, 6, 57, NULL, 'ডিমলা', 'Dimla', NULL, '73', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(412, 6, 57, NULL, 'ডোমার', 'Domar upazila', NULL, '73', '15', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(413, 6, 57, NULL, 'জলঢাকা', 'Jaldhaka', NULL, '73', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(414, 6, 57, NULL, 'কিশোরগঞ্জ', 'Kishoreganj', NULL, '73', '45', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(415, 6, 57, NULL, 'নীলফামারী সদর', 'Nilphamari sadar', NULL, '73', '64', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(416, 6, 57, NULL, 'সৈয়দপুর', 'Saidpur upazila', NULL, '73', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(417, 2, 16, NULL, 'বেগমগঞ্জ', 'Begumganj', NULL, '75', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(418, 2, 16, NULL, 'চাট্‌খিল', 'Chatkhil', NULL, '75', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(419, 2, 16, NULL, 'কোম্পানীগঞ্জ', 'Companiganj', NULL, '75', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(420, 2, 16, NULL, 'হাতিয়া', 'Hatiya', NULL, '75', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(421, 2, 16, NULL, 'কবিরহাট', 'Kabirhat', NULL, '75', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(422, 2, 16, NULL, 'সেনবাগ', 'Senbagh', NULL, '75', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(423, 2, 16, NULL, 'সোনাইমুড়ি', 'Sonaimuri', NULL, '75', '83', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(424, 2, 16, NULL, 'সুবর্ণচর', 'Subarnachar', NULL, '75', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(425, 2, 16, NULL, 'নোয়াখালী সদর', 'Noakhali sadar', NULL, '75', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(426, 5, 50, NULL, 'আটঘরিয়া', 'Atgharia', NULL, '76', '05', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(427, 5, 50, NULL, 'বেড়া', 'Bera', NULL, '76', '16', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(428, 5, 50, NULL, 'ভাংগুড়া', 'Bhangura', NULL, '76', '19', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(429, 5, 50, NULL, 'চাট্‌মোহর', 'Chatmohar', NULL, '76', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48');
INSERT INTO `thanas` (`id`, `division_id`, `district_id`, `name`, `title_bn`, `title_en`, `division_bbs_code`, `district_bbs_code`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(430, 5, 50, NULL, 'ফরিদপুর', 'Faridpur', NULL, '76', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(431, 5, 50, NULL, 'ঈশ্বরদী', 'Ishwardi', NULL, '76', '39', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(432, 5, 50, NULL, 'পাবনা সদর', 'Pabna sadar', NULL, '76', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(433, 5, 50, NULL, 'সাঁথিয়া', 'Santhia', NULL, '76', '72', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(434, 5, 50, NULL, 'সুজানগর', 'Sujanagar', NULL, '76', '83', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(435, 6, 58, NULL, 'আটোয়ারী', 'Atwari', NULL, '77', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(436, 6, 58, NULL, 'বোদা', 'Boda', NULL, '77', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(437, 6, 58, NULL, 'দেবীগঞ্জ', 'Debiganj', NULL, '77', '34', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(438, 6, 58, NULL, 'পঞ্চগড় সদর', 'Panchagarh sadar', NULL, '77', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(439, 6, 58, NULL, 'তেঁতুলিয়া', 'Tentulia', NULL, '77', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(440, 1, 5, NULL, 'বাউফল', 'Bauphal', NULL, '78', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(441, 1, 5, NULL, 'দশমিনা', 'Dashmina', NULL, '78', '52', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(442, 1, 5, NULL, 'দুম্‌কী', 'Dumki', NULL, '78', '55', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(443, 1, 5, NULL, 'গলাচিপা', 'Galachipa', NULL, '78', '57', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(444, 1, 5, NULL, 'কলাপাড়া', 'Kalapara', NULL, '78', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(445, 1, 5, NULL, 'মির্জাগঞ্জ', 'Mirzaganj', NULL, '78', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(446, 1, 5, NULL, 'পটুয়াথালী সদর', 'Patuakhali sadar', NULL, '78', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(447, 1, 5, NULL, 'রাঙ্গাবালী', 'Rangabali', NULL, '78', '97', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(448, 1, 6, NULL, 'ভান্ডারিয়া', 'Bhandaria', NULL, '79', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(449, 1, 6, NULL, 'কাউখালী', 'Kawkhali', NULL, '79', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(450, 1, 6, NULL, 'মঠবাড়ীয়া', 'Mathbaria', NULL, '79', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(451, 1, 6, NULL, 'নাজিরপুর', 'Nazirpur', NULL, '79', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(452, 1, 6, NULL, 'পিরোজপুর সদর', 'Pirojpur sadar', NULL, '79', '80', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(453, 1, 6, NULL, 'নেছারাবাদ(স্বরূপকাঠী)', 'Nesarabad (swarupkati)', NULL, '79', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(454, 1, 6, NULL, 'জিয়ানগর', 'Zianagar', NULL, '79', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(455, 5, 51, NULL, 'বাঘা', 'Bagha', NULL, '81', '10', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(456, 5, 51, NULL, 'বাগমারা', 'Baghmara', NULL, '81', '12', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(457, 5, 51, NULL, 'বোয়ালিয়া', 'Boalia', NULL, '81', '22', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(458, 5, 51, NULL, 'চারঘাট', 'Charghat', NULL, '81', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(459, 5, 51, NULL, 'দূর্গাপুর', 'Durgapur', NULL, '81', '31', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(460, 5, 51, NULL, 'গোদাগাড়ী', 'Godagari', NULL, '81', '34', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(461, 5, 51, NULL, 'মতিহার', 'Matihar', NULL, '81', '40', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(462, 5, 51, NULL, 'মোহনপুর', 'Mohanpur', NULL, '81', '53', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(463, 5, 51, NULL, 'পবা', 'Paba', NULL, '81', '72', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(464, 5, 51, NULL, 'পুঠিয়া', 'Puthia', NULL, '81', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(465, 5, 51, NULL, 'রাজপাড়া', 'Rajpara', NULL, '81', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(466, 5, 51, NULL, 'শাহ্‌ মখদুম', 'Shah makhdum', NULL, '81', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(467, 5, 51, NULL, 'তানোর', 'Tanore', NULL, '81', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(468, 3, 31, NULL, 'বালিয়াকান্দি', 'Baliakandi', NULL, '82', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(469, 3, 31, NULL, 'গোয়ালন্দ', 'Goalanda', NULL, '82', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(470, 3, 31, NULL, 'কালুখালী', 'Kalukhali', NULL, '82', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(471, 3, 31, NULL, 'পাংশা', 'Pangsha', NULL, '82', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(472, 3, 31, NULL, 'রাজবাড়ী সদর', 'Rajbari sadar', NULL, '82', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(473, 2, 17, NULL, 'বাঘাইছড়ি', 'Baghaichhari', NULL, '84', '07', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(474, 2, 17, NULL, 'বরকল', 'Barkal upazila', NULL, '84', '21', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(475, 2, 17, NULL, 'কাউখালী', 'Kawkhali (betbunia)', NULL, '84', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(476, 2, 17, NULL, 'বিলাইছড়ি', 'Belai chhari  upazi', NULL, '84', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(477, 2, 17, NULL, 'কাপ্তাই', 'Kaptai  upazila', NULL, '84', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(478, 2, 17, NULL, 'জুরাইছড়ি', 'Jurai chhari upazil', NULL, '84', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(479, 2, 17, NULL, 'লংগদু', 'Langadu  upazila', NULL, '84', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(480, 2, 17, NULL, 'নানিয়ারচর', 'Naniarchar  upazila', NULL, '84', '75', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(481, 2, 17, NULL, 'রাজস্থালী', 'Rajasthali  upazila', NULL, '84', '78', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(482, 2, 17, NULL, 'রাঙ্গামাটি সদর', 'Rangamati sadar  up', NULL, '84', '87', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(483, 6, 59, NULL, 'বদরগঞ্জ', 'Badarganj', NULL, '85', '03', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(484, 6, 59, NULL, 'গংগাচড়া', 'Gangachara', NULL, '85', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(485, 6, 59, NULL, 'কাউনিয়া', 'Kaunia', NULL, '85', '42', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(486, 6, 59, NULL, 'রংপুর সদর', 'Rangpur sadar', NULL, '85', '49', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(487, 6, 59, NULL, 'মিঠাপুকুর', 'Mitha pukur', NULL, '85', '58', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(488, 6, 59, NULL, 'পীরগাছা', 'Pirgachha', NULL, '85', '73', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(489, 6, 59, NULL, 'পীরগঞ্জ', 'Pirganj', NULL, '85', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(490, 6, 59, NULL, 'তারাগঞ্জ', 'Taraganj', NULL, '85', '92', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(491, 3, 32, NULL, 'ভেদরগঞ্জ', 'Bhedarganj', NULL, '86', '14', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(492, 3, 32, NULL, 'ডামুড্যা', 'Damudya', NULL, '86', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(493, 3, 32, NULL, 'গোসাইরহাট', 'Gosairhat', NULL, '86', '36', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(494, 3, 32, NULL, 'নড়িয়া', 'Naria', NULL, '86', '65', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(495, 3, 32, NULL, 'শরিয়তপুর সদর', 'Shariatpur sadar', NULL, '86', '69', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(496, 3, 32, NULL, 'জাজিরা', 'Zanjira', NULL, '86', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(497, 4, 44, NULL, 'আশাশুনি', 'Assasuni', NULL, '87', '04', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(498, 4, 44, NULL, 'দেবহাটা', 'Debhata', NULL, '87', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(499, 4, 44, NULL, 'কলারোয়া', 'Kalaroa', NULL, '87', '43', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(500, 4, 44, NULL, 'কালিগঞ্জ', 'Kaliganj', NULL, '87', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(501, 4, 44, NULL, 'সাতক্ষিরা সদর', 'Satkhira sadar', NULL, '87', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(502, 4, 44, NULL, 'শ্যামনগর', 'Shyamnagar', NULL, '87', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(503, 4, 44, NULL, 'তালা', 'Tala', NULL, '87', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(504, 5, 52, NULL, 'বেলকুচি', 'Belkuchi', NULL, '88', '11', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(505, 5, 52, NULL, 'চৌহালী', 'Chauhali', NULL, '88', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(506, 5, 52, NULL, 'কামারখন্দ', 'Kamarkhanda', NULL, '88', '44', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(507, 5, 52, NULL, 'কাজীপুর', 'Kazipur', NULL, '88', '50', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(508, 5, 52, NULL, 'রায়গঞ্জ', 'Royganj', NULL, '88', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(509, 5, 52, NULL, 'শাহাজাদপুর', 'Shahjadpur', NULL, '88', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(510, 5, 52, NULL, 'সিরাজগঞ্জ সদর', 'Sirajganj sadar', NULL, '88', '78', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(511, 5, 52, NULL, 'তাড়াশ', 'Tarash', NULL, '88', '89', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(512, 5, 52, NULL, 'উল্লা পাড়া', 'Ullah para', NULL, '88', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(513, 3, 33, NULL, 'ঝিনাইঘাতি', 'Jhenaigati', NULL, '89', '37', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(514, 3, 33, NULL, 'নকলা', 'Nakla', NULL, '89', '67', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(515, 3, 33, NULL, 'নালিতাবাড়ী', 'Nalitabari', NULL, '89', '70', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(516, 3, 33, NULL, 'শেরপুর সদর', 'Sherpur sadar', NULL, '89', '88', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(517, 3, 33, NULL, 'শ্রীবর্দি', 'Sreebardi', NULL, '89', '90', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(518, 7, 63, NULL, 'বিশ্বম্ভরপুর', 'Bishwambarpur', NULL, '90', '18', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(519, 7, 63, NULL, 'ছাতক', 'Chhatak', NULL, '90', '23', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(520, 7, 63, NULL, 'দক্ষিন সুনামগঞ্জ', 'Dakshin sunamganj', NULL, '90', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(521, 7, 63, NULL, 'দিরাই', 'Derai', NULL, '90', '29', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(522, 7, 63, NULL, 'ধর্মপাশা', 'Dharampasha', NULL, '90', '32', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(523, 7, 63, NULL, 'দোয়ারাবাজার', 'Dowarabazar', NULL, '90', '33', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(524, 7, 63, NULL, 'জগন্নাথপুর', 'Jagannathpur', NULL, '90', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(525, 7, 63, NULL, 'জামালগঞ্জ', 'Jamalganj', NULL, '90', '50', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(526, 7, 63, NULL, 'শুল্লা', 'Sulla', NULL, '90', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(527, 7, 63, NULL, 'সুনামগঞ্জ সদর', 'Sunamganj sadar', NULL, '90', '89', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(528, 7, 63, NULL, 'তাহিরপুর', 'Tahirpur', NULL, '90', '92', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(529, 7, 64, NULL, 'বালাগঞ্জ', 'Balaganj', NULL, '91', '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(530, 7, 64, NULL, 'বিয়ানী বাজার', 'Beani bazar', NULL, '91', '17', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(531, 7, 64, NULL, 'বিশ্বনাথ', 'Bishwanath', NULL, '91', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(532, 7, 64, NULL, 'কোম্পানীগঞ্জ', 'Companiganj', NULL, '91', '27', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(533, 7, 64, NULL, 'দক্ষিণ সুরমা', 'Dakshin surma', NULL, '91', '31', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(534, 7, 64, NULL, 'ফেঞ্চুগঞ্জ', 'Fenchuganj', NULL, '91', '35', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(535, 7, 64, NULL, 'গোলাপগঞ্জ', 'Golapganj', NULL, '91', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(536, 7, 64, NULL, 'গোয়াইনঘাট', 'Gowainghat', NULL, '91', '41', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(537, 7, 64, NULL, 'জৈন্তাপুর', 'Jaintiapur', NULL, '91', '53', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(538, 7, 64, NULL, 'কানাইঘাট', 'Kanaighat', NULL, '91', '59', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(539, 7, 64, NULL, 'সিলেট সদর', 'Sylhet sadar', NULL, '91', '62', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(540, 7, 64, NULL, 'জকিগঞ্জ', 'Zakiganj', NULL, '91', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(541, 3, 34, NULL, 'বাসাইল', 'Basail', NULL, '93', '09', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(542, 3, 34, NULL, 'ভূঞাপুর', 'Bhuapur', NULL, '93', '19', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(543, 3, 34, NULL, 'দেলদুয়ার', 'Delduar', NULL, '93', '23', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(544, 3, 34, NULL, 'ধনবাড়ী', 'Dhanbari', NULL, '93', '25', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(545, 3, 34, NULL, 'ঘাটাইল', 'Ghatail', NULL, '93', '28', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(546, 3, 34, NULL, 'গোপালপুর', 'Gopalpur', NULL, '93', '38', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(547, 3, 34, NULL, 'কালিহাতি', 'Kalihati', NULL, '93', '47', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(548, 3, 34, NULL, 'মধুপুর', 'Madhupur', NULL, '93', '57', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(549, 3, 34, NULL, 'মির্জাপুর', 'Mirzapur', NULL, '93', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(550, 3, 34, NULL, 'নাগরপুর', 'Nagarpur', NULL, '93', '76', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(551, 3, 34, NULL, 'সখিপুর', 'Sakhipur', NULL, '93', '85', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(552, 3, 34, NULL, 'টাঙ্গাইল সদর', 'Tangail sadar', NULL, '93', '95', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(553, 6, 60, NULL, 'বালিয়াডাংগী', 'Baliadangi', NULL, '94', '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(554, 6, 60, NULL, 'হরিপুর', 'Haripur', NULL, '94', '51', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(555, 6, 60, NULL, 'পীরগঞ্জ', 'Pirganj', NULL, '94', '82', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(556, 6, 60, NULL, 'রানীশংকাইল', 'Ranisankail', NULL, '94', '86', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(557, 6, 60, NULL, 'ঠাকুরগাঁও সদর', 'Thakurgaon sadar', NULL, '94', '94', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(558, 5, 52, NULL, 'কাজিপুর', 'Kazipur', NULL, NULL, '2345', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(562, 3, 18, NULL, 'হাতিরঝিল', 'Hatirjheel', '30', '26', '00', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_bbs_code` char(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_bbs_code` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbs_code` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `division_id`, `district_id`, `name`, `title_bn`, `title_en`, `division_bbs_code`, `district_bbs_code`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'আমতলী ', 'Amtali', '', '', '09', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(2, 1, 1, NULL, 'বামনা ', 'Bamna', '', '', '19', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(3, 1, 1, NULL, 'বরগুনা সদর ', 'Barguna sadar', '', '', '28', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(4, 1, 1, NULL, 'বেতাগী ', 'Betagi', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(5, 1, 1, NULL, 'পাথরঘাটা ', 'Patharghata', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(6, 1, 1, NULL, 'তালতলি ', 'Taltali', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(7, 1, 2, NULL, 'আগৈলঝাড়া', 'Agailjhara', '', '', '2', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(8, 1, 2, NULL, 'বাবুগঞ্জ ', 'Babuganj', '', '', '3', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(9, 1, 2, NULL, 'বাকেরগঞ্জ', 'Bakerganj', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(10, 1, 2, NULL, 'বানারীপাড়া ', 'Banari para', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(11, 1, 2, NULL, 'গৌরনদী ', 'Gaurnadi', '', '', '32', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(12, 1, 2, NULL, 'হিজলা ', 'Hizla', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(13, 1, 2, NULL, 'বরিশাল সদর (কোতোয়ালী)', 'Barisal sadar (kotwali)', '', '', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(14, 1, 2, NULL, 'মেহেন্দিগঞ্জ ', 'Mehendiganj', '', '', '62', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(15, 1, 2, NULL, 'মুলাদী  ', 'Muladi', '', '', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(16, 1, 2, NULL, 'উজিরপুর  ', 'Wazirpur', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(17, 1, 3, NULL, 'ভোলা সদর', 'Bhola sadar', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(18, 1, 3, NULL, 'বোরহানউদ্দিন ', 'Burhanuddin', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(19, 1, 3, NULL, 'দৌলতখান', 'Daulat khan', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(20, 1, 3, NULL, 'লালমোহন ', 'Lalmohan', '', '', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(21, 1, 3, NULL, 'মনপুরা ', 'Manpura', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(22, 1, 3, NULL, 'তজুমদ্দিন ', 'Tazumuddin', '', '', '91', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(23, 1, 4, NULL, 'ঝালকাঠি সদর', 'Jhalokati sadar', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(24, 1, 4, NULL, 'নলছিটি ', 'Nalchity', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(25, 1, 4, NULL, 'কাঠালিয়া', 'Kathalia', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(26, 1, 5, NULL, 'বাউফল ', 'Bauphal', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(27, 1, 5, NULL, 'দশমিনা ', 'Dashmina', '', '', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(28, 1, 5, NULL, 'দুমকি ', 'Dumki', '', '', '55', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(29, 1, 5, NULL, 'কলাপাড়া ', 'Kalapara', '', '', '66', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(30, 1, 5, NULL, 'মির্জাগঞ্জ', 'Mirzaganj', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(31, 1, 5, NULL, 'পটুয়াখালী সদর ', 'Patuakhali sadar', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(32, 1, 5, NULL, 'রাঙ্গাবালী ', 'Rangabali', '', '', '97', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(33, 1, 6, NULL, 'ভান্ডারিয়া ', 'Bhandaria', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(34, 1, 6, NULL, 'কাউখালী ', 'Kawkhali', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(35, 1, 6, NULL, 'মঠবাড়ীয়া ', 'Mathbaria', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(36, 1, 6, NULL, 'নাজিরপুর ', 'Nazirpur', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(37, 1, 6, NULL, 'পিরোজপুর সদর ', 'Pirojpur sadar', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(38, 1, 6, NULL, 'নেছারাবা ( স্বরুপকাঠী) ', 'Nesarabad (swarupkati)', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(39, 1, 6, NULL, 'জিয়ানগর ', 'Zianagar', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(40, 2, 7, NULL, 'আলীকদম ', 'Alikadam', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(41, 2, 7, NULL, 'বান্দরবান সদর', 'Bandarban sadar', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(42, 2, 7, NULL, 'লামা', 'Lama', '', '', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(43, 2, 7, NULL, 'নাইক্ষ্যংছড়ি', 'Naikhongchhari', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(44, 2, 7, NULL, 'রোয়াংছড়ি', 'Rowangchhari', '', '', '89', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(45, 2, 7, NULL, 'রুমা ', 'Ruma', '', '', '91', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(46, 2, 7, NULL, 'থানচি', 'Thanchi', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(47, 2, 8, NULL, 'আখাউড়া', 'Akhaura', '', '', '2', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(48, 2, 8, NULL, 'বাঞ্ছারামপুর ', 'Banchharampur', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(49, 2, 8, NULL, 'বিজয়নগর', 'Bijoynagar', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(50, 2, 8, NULL, 'ব্রাহ্মণবাড়িয়া সদর', 'Brahmanbaria sadar', '', '', '13', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(51, 2, 8, NULL, 'আশুগঞ্জ', 'Ashuganj', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(52, 2, 8, NULL, 'কসবা', 'Kasba', '', '', '63', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(53, 2, 8, NULL, 'নবীনগর', 'Nabinagar', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(54, 2, 8, NULL, 'নাসিরনগর', 'Nasirnagar', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(55, 2, 8, NULL, 'সরাইল', 'Sarail', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(56, 2, 9, NULL, 'চাঁদপুর সদর', 'Chandpur sadar', '', '', '22', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(57, 2, 9, NULL, 'ফরিদগঞ্জ', 'Faridganj', '', '', '45', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(58, 2, 9, NULL, 'হাইমচর', 'Haim char', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(59, 2, 9, NULL, 'হাজীগঞ্জ', 'Hajiganj', '', '', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(60, 2, 9, NULL, 'কচুয়া', 'Kachua', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(61, 2, 9, NULL, 'মতলব দক্ষিণ', 'Matlab dakshin', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(62, 2, 9, NULL, 'মতলব উত্তর', 'Matlab uttar', '', '', '79', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(63, 2, 9, NULL, 'শাহরাস্তি', 'Shahrasti', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(64, 2, 10, NULL, 'আনোয়ারা', 'Anowara', '', '', '04', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(65, 2, 10, NULL, 'বাঁশখালী', 'Banshkhali', '', '', '08', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(66, 2, 10, NULL, 'বোয়ালখালী', 'Boalkhali', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(67, 2, 10, NULL, 'চন্দনাইশ', 'Chandanaish', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(68, 2, 10, NULL, 'ফটিকছড়ি', 'Fatikchhari', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(69, 2, 10, NULL, 'হাটহাজারী', 'Hathazari', '', '', '37', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(70, 2, 10, NULL, 'লোহাগাড়া', 'Lohagara', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(71, 2, 10, NULL, 'মীরসরাই', 'Mirsharai', '', '', '53', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(72, 2, 10, NULL, 'পটিয়া', 'Patiya', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(73, 2, 10, NULL, 'রাঙ্গুনিয়া', 'Rangunia', '', '', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(74, 2, 10, NULL, 'রাউজান', 'Raozan', '', '', '74', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(75, 2, 10, NULL, 'সন্দ্বীপ', 'Sandwip', '', '', '78', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(76, 2, 10, NULL, 'সাতকানিয়া', 'Satkania', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(77, 2, 10, NULL, 'সীতাকুণ্ড', 'Sitakunda', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(78, 2, 11, NULL, 'বরুড়া', 'Barura', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(79, 2, 11, NULL, 'ব্রাহ্মণপাড়া', 'Brahman para', '', '', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(80, 2, 11, NULL, 'বুড়িচং', 'Burichang', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(81, 2, 11, NULL, 'চান্দিনা', 'Chandina', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(82, 2, 11, NULL, 'চৌদ্দগ্রাম', 'Chauddagram', '', '', '31', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(83, 2, 11, NULL, 'কুমিল্লা সদর দক্ষিণ', 'Comilla sadar dakshin', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(84, 2, 11, NULL, 'দাউদকান্দি', 'Daudkandi', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(85, 2, 11, NULL, 'দেবিদ্বার', 'Debidwar', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(86, 2, 11, NULL, 'হোমনা ', 'Homna', '', '', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(87, 2, 11, NULL, 'কুমিল্লা সদর', 'Comilla adarsha sadar', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(88, 2, 11, NULL, 'লাকসাম', 'Laksam', '', '', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(89, 2, 11, NULL, 'মনোহরগঞ্জ', 'Manoharganj', '', '', '74', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(90, 2, 11, NULL, 'মেঘনা', 'Meghna', '', '', '75', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(91, 2, 11, NULL, 'মুরাদনগর', 'Muradnagar', '', '', '81', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(92, 2, 11, NULL, 'নাঙ্গলকোট', 'Nangalkot', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(93, 2, 11, NULL, 'তিতাস', 'Titas', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(94, 2, 12, NULL, 'চকরিয়া', 'Chakaria', '', '', '16', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(95, 2, 12, NULL, 'কক্সবাজার সদর', 'Coxs bazar sadar', '', '', '24', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(96, 2, 12, NULL, 'কুতুবদিয়া', 'Kutubdia', '', '', '45', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(97, 2, 12, NULL, 'মহেশখালী', 'Maheshkhali', '', '', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(98, 2, 12, NULL, 'পেকুয়া', 'Pekua', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(99, 2, 12, NULL, 'রামু', 'Ramu', '', '', '66', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(100, 2, 12, NULL, 'টেকনাফ', 'Teknaf', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(101, 2, 12, NULL, 'উখিয়া', 'Ukhia', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(102, 2, 13, NULL, 'ছাগলনাইয়া', 'Chhagalnaiya', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(103, 2, 13, NULL, 'দাগনভূঞা', 'Daganbhuiyan', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(104, 2, 13, NULL, 'ফেনী সদর', 'Feni sadar', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(105, 2, 13, NULL, 'ফুলগাজী', 'Fulgazi', '', '', '41', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(106, 2, 13, NULL, 'পরশুরাম', 'Parshuram', '', '', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(107, 2, 13, NULL, 'সোনাগাজী', 'Sonagazi', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(108, 2, 14, NULL, 'দিঘীনালা', 'Dighinala', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(109, 2, 14, NULL, 'মানিকছড়ি', 'Manikchhari', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(110, 2, 14, NULL, 'খাগড়াছড়ি সদর', 'Khagrachhari sadar', '', '', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(111, 2, 14, NULL, 'লক্ষীছড়ি', 'Lakshmichhari', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(112, 2, 14, NULL, 'মহালছড়ি', 'Mahalchhari', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(113, 2, 14, NULL, 'মাটিরাঙ্গা', 'Matiranga', '', '', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(114, 2, 14, NULL, 'পানছড়ি', 'Panchhari', '', '', '77', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(115, 2, 14, NULL, 'রামগড়', 'Ramgarh', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(116, 2, 15, NULL, 'কমলনগর', 'Kamalnagar', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(117, 2, 15, NULL, 'লক্ষ্মীপুর সদর', 'Lakshmipur sadar', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(118, 2, 15, NULL, 'রায়পুর', 'Roypur', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(119, 2, 15, NULL, 'রামগঞ্জ', 'Ramganj', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(120, 2, 15, NULL, 'রামগতি ', 'Ramgati', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(121, 2, 16, NULL, 'বেগমগঞ্জ', 'Begumganj', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(122, 2, 16, NULL, 'চাটখিল', 'Chatkhil', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(123, 2, 16, NULL, 'কোম্পানীগঞ্জ', 'Companiganj', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(124, 2, 16, NULL, 'হাতিয়া', 'Hatiya', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(125, 2, 16, NULL, 'সেনবাগ', 'Senbagh', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(126, 2, 16, NULL, 'সোনাইমুড়ী', 'Sonaimuri', '', '', '83', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(127, 2, 16, NULL, 'সুবর্ণচর', 'Subarnachar', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(128, 2, 16, NULL, 'নোয়াখালী ', 'Noakhali ', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(129, 2, 17, NULL, 'বাঘাইছড়ি', 'Baghaichhari', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(130, 2, 17, NULL, 'বরকল', 'Barkal ', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(131, 2, 17, NULL, 'কাউখালী', 'Kawkhali (betbunia)', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(132, 2, 17, NULL, 'কাপ্তাই ', 'Kaptai  ', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(133, 2, 17, NULL, 'জুরাছড়ি', 'Jurai chhari', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(134, 2, 17, NULL, 'লংগদু ', 'Langadu  ', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(135, 2, 17, NULL, 'নানিয়ারচর ', 'Naniarchar  ', '', '', '75', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(136, 2, 17, NULL, 'রাঙ্গামাটি সদর', 'Rangamati sadar', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(137, 2, 17, NULL, 'রাজস্থলী', 'Rajostholi ', '', '', '78', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(138, 2, 17, NULL, 'বিলাইছড়ি', 'Bilaychhari', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(139, 3, 18, NULL, 'তেজগাঁও উন্নয়ন সার্কেল', 'Tejgaon unnon circle', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(140, 3, 18, NULL, 'বাড্ডা', 'Badda', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(141, 3, 18, NULL, 'বংশাল', 'Bangshal', '', '', '5', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(142, 3, 18, NULL, 'বিমান বন্দর', 'Biman bandar', '', '', '6', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(143, 3, 18, NULL, 'বনানী', 'Banani', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(144, 3, 18, NULL, 'সেনানিবাস', 'Cantonment', '', '', '8', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(145, 3, 18, NULL, 'চকবাজার', 'Chak bazar', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(146, 3, 18, NULL, 'দক্ষিনখান', 'Dakshinkhan', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(147, 3, 18, NULL, 'দারুস সালাম', 'Darus salam', '', '', '11', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(148, 3, 18, NULL, 'ডেমরা', 'Demra', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(149, 3, 18, NULL, 'ধামরাই', 'Dhamrai', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(150, 3, 18, NULL, 'দোহার', 'Dohar', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(151, 3, 18, NULL, 'কেরাণীগঞ্জ', 'Keraniganj', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(152, 3, 18, NULL, 'নবাবগঞ্জ', 'Nawabganj', '', '', '62', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(153, 3, 18, NULL, 'সাভার', 'Savar', '', '', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(154, 3, 19, NULL, 'আলফাডাঙ্গা', 'Alfadanga', '', '', '3', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(155, 3, 19, NULL, 'ভাঙ্গা', 'Bhanga', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(156, 3, 19, NULL, 'বোয়ালমারী', 'Boalmari', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(157, 3, 19, NULL, 'চরভদ্রাসন', 'Char bhadrasan', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(158, 3, 19, NULL, 'ফরিদপুর সদর', 'Faridpur sadar', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(159, 3, 19, NULL, 'মধুখালী', 'Madhukhali', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(160, 3, 19, NULL, 'নগরকান্দা', 'Nagarkanda', '', '', '62', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(161, 3, 19, NULL, 'সদরপুর', 'Sadarpur', '', '', '84', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(162, 3, 19, NULL, 'সালথা', 'Saltha', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(163, 3, 20, NULL, 'গাজীপুর সদর', 'Gazipur sadar', '', '', '30', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(164, 3, 20, NULL, 'কালিয়াকৈর', 'Kaliakair', '', '', '32', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(165, 3, 20, NULL, 'কালীগঞ্জ', 'Kaliganj', '', '', '34', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(166, 3, 20, NULL, 'কাপাসিয়া', 'Kapasia', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(167, 3, 20, NULL, 'শ্রীপুর', 'Sreepur', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(168, 3, 21, NULL, 'গোপালগঞ্জ সদর', 'Gopalganj sadar', '', '', '32', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(169, 3, 21, NULL, 'কাশিয়ানী', 'Kashiani', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(170, 3, 21, NULL, 'কোটালীপাড়া', 'Kotalipara', '', '', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(171, 3, 21, NULL, 'মুকসুদপুর', 'Muksudpur', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(172, 3, 21, NULL, 'টুংগীপাড়া', 'Tungipara', '', '', '91', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(173, 3, 22, NULL, 'বকশীগঞ্জ', 'Bakshiganj', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(174, 3, 22, NULL, 'দেওয়ানগঞ্জ', 'Dewanganj', '', '', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(175, 3, 22, NULL, 'ইসলামপুর', 'Islampur', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(176, 3, 22, NULL, 'জামালপুর সদর', 'Jamalpur sadar', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(177, 3, 22, NULL, 'মাদারগঞ্জ', 'Madarganj', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(178, 3, 22, NULL, 'মেলান্দহ', 'Melandaha', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(179, 3, 22, NULL, 'সরিষাবাড়ী', 'Sarishabari upazila', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(180, 3, 23, NULL, 'অষ্টগ্রাম', 'Austagram', '', '', '2', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(181, 3, 23, NULL, 'বাজিতপুর', 'Bajitpur', '', '', '6', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(182, 3, 23, NULL, 'ভৈরব', 'Bhairab', '', '', '11', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(183, 3, 23, NULL, 'হোসেনপুর', 'Hossainpur', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(184, 3, 23, NULL, 'ইটনা', 'Itna', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(185, 3, 23, NULL, 'করিমগঞ্জ', 'Karimganj', '', '', '42', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(186, 3, 23, NULL, 'কটিয়াদী', 'Katiadi', '', '', '45', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(187, 3, 23, NULL, 'কিশোরগঞ্জ সদর', 'Kishoreganj sadar', '', '', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(188, 3, 23, NULL, 'কুলিয়ারচর', 'Kuliar char', '', '', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(189, 3, 23, NULL, 'মিঠামইন', 'Mithamain', '', '', '59', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(190, 3, 23, NULL, 'নিকলী', 'Nikli', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(191, 3, 23, NULL, 'পাকুন্দিয়া', 'Pakundia', '', '', '79', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(192, 3, 23, NULL, 'তাড়াইল', 'Tarail', '', '', '92', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(193, 3, 24, NULL, 'কালকিনি', 'Kalkini', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(194, 3, 24, NULL, 'মাদারীপুর সদর', 'Madaripur sadar', '', '', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(195, 3, 24, NULL, 'রাজৈর', 'Rajoir', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(196, 3, 24, NULL, 'শিবচর', 'Shibchar', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(197, 3, 25, NULL, 'দৌলতপুর', 'Daulatpur', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(198, 3, 25, NULL, 'ঘিওর', 'Ghior', '', '', '22', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(199, 3, 25, NULL, 'হরিরামপুর', 'Harirampur', '', '', '28', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(200, 3, 25, NULL, 'মানিকগঞ্জ সদর', 'Manikganj sadar', '', '', '46', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(201, 3, 25, NULL, 'সাটুরিয়া', 'Saturia', '', '', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(202, 3, 25, NULL, 'শিবালয়', 'Shibalaya', '', '', '78', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(203, 3, 25, NULL, 'সিংগাইর', 'Singair', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(204, 3, 26, NULL, 'গজারিয়া', 'Gazaria', '', '', '24', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(205, 3, 26, NULL, 'লৌহজং', 'Lohajang', '', '', '44', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(206, 3, 26, NULL, 'মুন্সিগঞ্জ সদর', 'Munshiganj sadar', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(207, 3, 26, NULL, 'সিরাজদিখান', 'Serajdikhan', '', '', '74', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(208, 3, 26, NULL, 'শ্রীনগর', 'Sreenagar', '', '', '84', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(209, 3, 26, NULL, 'টংগিবাড়ী', 'Tongibari', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(210, 3, 27, NULL, 'ভালুকা', 'Bhaluka', '', '', '13', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(211, 3, 27, NULL, 'ধোবাউড়া', 'Dhobaura', '', '', '16', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(212, 3, 27, NULL, 'ফুলবাড়ীয়া', 'Fulbaria', '', '', '20', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(213, 3, 27, NULL, 'গফরগাঁও', 'Gaffargaon', '', '', '22', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(214, 3, 27, NULL, 'গৌরীপুর', 'Gauripur', '', '', '23', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(215, 3, 27, NULL, 'হালুয়াঘাট', 'Haluaghat', '', '', '24', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(216, 3, 27, NULL, 'ঈশ্বরগঞ্জ', 'Ishwarganj', '', '', '31', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(217, 3, 27, NULL, 'ময়মনসিংহ সদর', 'Mymensingh sadar', '', '', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(218, 3, 27, NULL, 'মুক্তাগাছা', 'Muktagachha', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(219, 3, 27, NULL, 'নান্দাইল', 'Nandail', '', '', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(220, 3, 27, NULL, 'ফুলপুর', 'Phulpur', '', '', '81', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(221, 3, 27, NULL, 'তারাকান্দা', 'Tarakanda', '', '', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(222, 3, 27, NULL, 'ত্রিশাল', 'Trishal', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(223, 3, 28, NULL, 'আড়াইহাজার', 'Araihazar', '', '', '2', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(224, 3, 28, NULL, 'সোনারগাঁ', 'Sonargaon', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(225, 3, 28, NULL, 'নারায়নগঞ্জ সদর', 'Narayanganj sadar', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(226, 3, 28, NULL, 'রূপগঞ্জ', 'Rupganj', '', '', '68', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(227, 3, 29, NULL, 'বেলাবো', 'Belabo', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(228, 3, 29, NULL, 'মনোহরদী', 'Manohardi', '', '', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(229, 3, 29, NULL, 'নরসিংদী ', 'Narsingdi ', '', '', '60', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(230, 3, 29, NULL, 'পলাশ', 'Palash', '', '', '63', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(231, 3, 29, NULL, 'রায়পুরা', 'Roypura', '', '', '64', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(232, 3, 29, NULL, 'শিবপুর', 'Shibpur', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(233, 3, 30, NULL, 'আটপাড়া', 'Atpara', '', '', '04', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(234, 3, 30, NULL, 'বারহাট্টা', 'Barhatta', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(235, 3, 30, NULL, 'দুর্গাপুর', 'Durgapur', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(236, 3, 30, NULL, 'খালিয়াজুরী', 'Khaliajuri', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(237, 3, 30, NULL, 'কলমাকান্দা', 'Kalmakanda', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(238, 3, 30, NULL, 'কেন্দুয়া', 'Kendua', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(239, 3, 30, NULL, 'মদন', 'Madan', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(240, 3, 30, NULL, 'মোহনগঞ্জ', 'Mohanganj', '', '', '63', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(241, 3, 30, NULL, 'নেত্রকোণা সদর', 'Netrokona headquarters', '', '', '74', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(242, 3, 31, NULL, 'বালিয়াকান্দি', 'Baliakandi', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(243, 3, 31, NULL, 'গোয়ালন্দ', 'Goalanda', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(244, 3, 31, NULL, 'কালুখালী', 'Kalukhali', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(245, 3, 31, NULL, 'পাংশা', 'Pangsha', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(246, 3, 31, NULL, 'রাজবাড়ী সদর', 'Rajbari sadar', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(247, 3, 32, NULL, 'ভেদরগঞ্জ', 'Bhedarganj', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(248, 3, 32, NULL, 'ডামুড্যা', 'Damudya', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(249, 3, 32, NULL, 'গোসাইরহাট', 'Gosairhat', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(250, 3, 32, NULL, 'নড়িয়া', 'Naria', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(251, 3, 32, NULL, 'শরিয়তপুর সদর', 'Shariatpur sadar', '', '', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(252, 3, 32, NULL, 'জাজিরা', 'Zanjira', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(253, 3, 33, NULL, 'ঝিনাইগাতী', 'Jhenaigati', '', '', '37', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(254, 3, 33, NULL, 'নকলা', 'Nakla', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(255, 3, 33, NULL, 'নালিতাবাড়ী', 'Nalitabari', '', '', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(256, 3, 33, NULL, 'শেরপুর সদর', 'Sherpur sadar', '', '', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(257, 3, 33, NULL, 'শ্রীবরদী', 'Sreebardi', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(258, 3, 34, NULL, 'বাসাইল', 'Basail', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(259, 3, 34, NULL, 'ভুয়াপুর', 'Bhuapur', '', '', '19', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(260, 3, 34, NULL, 'দেলদুয়ার', 'Delduar', '', '', '23', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(261, 3, 34, NULL, 'ধনবাড়ী', 'Dhanbari', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(262, 3, 34, NULL, 'ঘাটাইল', 'Ghatail', '', '', '28', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(263, 3, 34, NULL, 'গোপালপুর', 'Gopalpur', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(264, 3, 34, NULL, 'কালিহাতী', 'Kalihati', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(265, 3, 34, NULL, 'মধুপুর', 'Madhupur', '', '', '57', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(266, 3, 34, NULL, 'মির্জাপুর', 'Mirzapur', '', '', '66', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(267, 3, 34, NULL, 'নাগরপুর', 'Nagarpur', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(268, 3, 34, NULL, 'সখিপুর', 'Sakhipur', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(269, 3, 34, NULL, 'টাঙ্গাইল সদর', 'Tangail sadar', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(271, 4, 35, NULL, 'চিতলমারী ', 'Chitalmari', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(272, 4, 35, NULL, 'ফকিরহাট ', 'Fakirhat', '', '', '34', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(273, 4, 35, NULL, 'কচুয়া ', 'Kachua', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(274, 4, 35, NULL, 'মোল্লাহাট ', 'Mollahat', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(275, 4, 35, NULL, 'মোংলা ', 'Mongla', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(276, 4, 35, NULL, 'মোড়েলগঞ্জ ', 'Morrelganj', '', '', '60', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(277, 4, 35, NULL, 'রামপাল ', 'Rampal', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(278, 4, 35, NULL, 'শরণখোলা', 'Sarankhola', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(279, 4, 36, NULL, 'আলমডাঙ্গা ', 'Alamdanga', '', '', '7', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(280, 4, 36, NULL, 'চুয়াডাঙ্গা সদর ', 'Chuadanga sadar', '', '', '23', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(281, 4, 36, NULL, 'দামুড়হুদা ', 'Damurhuda', '', '', '31', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(282, 4, 36, NULL, 'জীবননগর ', 'Jiban nagar', '', '', '55', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(283, 4, 37, NULL, 'অভয়নগর ', 'Abhaynagar', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(284, 4, 37, NULL, 'বাঘারপাড়া ', 'Bagher para', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(285, 4, 37, NULL, 'চৌগাছা', 'Chaugachha', '', '', '11', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(286, 4, 37, NULL, 'ঝিকরগাছা ', 'Jhikargachha', '', '', '23', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(287, 4, 37, NULL, 'কেশবপুর ', 'Keshabpur', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(288, 4, 37, NULL, 'যশোর সদর ', 'Jashore sadar', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(289, 4, 37, NULL, 'মণিরামপুর', 'Manirampur', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(290, 4, 37, NULL, 'শার্শা ', 'Sharsha', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(291, 4, 38, NULL, 'হরিণাকুন্ডু ', 'Harinakunda', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(292, 4, 38, NULL, 'ঝিনাইদহ সদর', 'Jhenaidah sadar', '', '', '19', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(293, 4, 38, NULL, 'কালীগঞ্জ ', 'Kaliganj', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(294, 4, 38, NULL, 'কোটচাঁদপুর ', 'Kotchandpur', '', '', '42', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(295, 4, 38, NULL, 'মহেশপুর ', 'Maheshpur', '', '', '71', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(296, 4, 38, NULL, 'শৈলকুপা ', 'Shailkupa', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(297, 4, 39, NULL, 'বটিয়াঘাটা ', 'Batiaghata', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(298, 4, 39, NULL, 'দাকোপ ', 'Dacope', '', '', '17', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(299, 4, 39, NULL, 'ডুমুরিয়া ', 'Dumuria', '', '', '30', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(300, 4, 39, NULL, 'কয়রা ', 'Koyra', '', '', '53', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(301, 4, 39, NULL, 'পাইকগাছা ', 'Paikgachha', '', '', '64', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(302, 4, 39, NULL, 'ফুলতলা ', 'Phultala', '', '', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(303, 4, 39, NULL, 'রূপসা ', 'Rupsa', '', '', '75', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(304, 4, 39, NULL, 'তেরখাদা ', 'Terokhada', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(305, 4, 39, NULL, 'দিঘলিয়া', 'Dhegholia', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(306, 4, 40, NULL, 'ভেড়ামারা ', 'Bheramara', '', '', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(307, 4, 40, NULL, 'দৌলতপুর ', 'Daulatpur', '', '', '39', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(308, 4, 40, NULL, 'খোকসা', 'Khoksa', '', '', '63', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(309, 4, 40, NULL, 'কুমারখালী ', 'Kumarkhali', '', '', '71', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(310, 4, 40, NULL, 'কুষ্টিয়া সদর ', 'Kushtia sadar', '', '', '79', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(311, 4, 40, NULL, 'মিরপুর ', 'Mirpur', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(312, 4, 41, NULL, 'মাগুরা সদর ', 'Magura sadar', '', '', '57', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(313, 4, 41, NULL, 'মহম্মদপুর ', 'Mohammadpur', '', '', '66', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(314, 4, 41, NULL, 'শালিখা ', 'Shalikha', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(315, 4, 41, NULL, 'শ্রীপুর ', 'Sreepur', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(316, 4, 42, NULL, 'গাংনী ', 'Gangni', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(317, 4, 42, NULL, 'মুজিবনগর ', 'Mujib nagar', '', '', '60', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(318, 4, 42, NULL, 'মেহেরপুর সদর', 'Meherpur sadar', '', '', '87', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(319, 4, 43, NULL, 'কালিয়া', 'Kalia', '', '', '28', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(320, 4, 43, NULL, 'লোহাগড়া', 'Lohagara', '', '', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(321, 4, 43, NULL, 'নড়াইল সদর ', 'Narail sadar', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(322, 4, 44, NULL, 'আশাশুনি ', 'Assasuni', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(323, 4, 44, NULL, 'দেবহাটা ', 'Debhata', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(324, 4, 44, NULL, 'কলারোয়া ', 'Kalaroa', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(325, 4, 44, NULL, 'কালিগঞ্জ ', 'Kaliganj', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(326, 4, 44, NULL, 'সাতক্ষীরা সদর', 'Satkhira sadar', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(327, 4, 44, NULL, 'শ্যামনগর ', 'Shyamnagar', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(328, 4, 44, NULL, 'তালা ', 'Tala', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(329, 5, 45, NULL, 'আদমদিঘি', 'Adamdighi', '', '', '06', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(330, 5, 45, NULL, 'বগুড়া  সদর', 'Bogra sadar', '', '', '20', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(331, 5, 45, NULL, 'ধুনট', 'Dhunat', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(332, 5, 45, NULL, 'দুপচাচিঁয়া', 'Dhupchanchia', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(333, 5, 45, NULL, 'গাবতলি', 'Gabtali', '', '', '40', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(334, 5, 45, NULL, 'কাহালু', 'Kahaloo', '', '', '54', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(335, 5, 45, NULL, 'নন্দিগ্রাম', 'Nandigram', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(336, 5, 45, NULL, 'সারিয়াকান্দি', 'Sariakandi', '', '', '81', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(337, 5, 45, NULL, 'শাজাহানপুর', 'Shajahanpur', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(338, 5, 45, NULL, 'শেরপুর', 'Sherpur', '', '', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(339, 5, 45, NULL, 'শিবগঞ্জ', 'Shibganj', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(340, 5, 45, NULL, 'সোনাতলা ', 'Sonatola', '', '', '95', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(341, 5, 46, NULL, 'আক্কেলপুর ', 'Akkelpur', '', '', '13', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(342, 5, 46, NULL, ' জয়পুরহাট সদর', 'Joypurhat sadar', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(343, 5, 46, NULL, 'কালাই', 'Kalai', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(344, 5, 47, NULL, 'আত্রাই', 'Atrai', '', '', '03', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(345, 5, 47, NULL, 'ধামইরহাট', 'Dhamoirhat', '', '', '28', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(346, 5, 47, NULL, 'মান্দা', 'Manda', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(347, 5, 47, NULL, 'মহাদেবপুর', 'Mahadebpur', '', '', '50', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(348, 5, 47, NULL, 'নওগাঁ সদর', 'Naogaon sadar', '', '', '60', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(349, 5, 47, NULL, 'নিয়ামতপুর', 'Niamatpur', '', '', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(350, 5, 47, NULL, 'পত্নীতলা', 'Patnitala', '', '', '75', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(351, 5, 47, NULL, 'রাণীনগর', 'Raninagar', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(352, 5, 47, NULL, 'সাপাহার', 'Sapahar', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(353, 5, 47, NULL, 'বদলগাছী', 'Bodolgachi', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(354, 5, 47, NULL, 'পোরশা', 'Porsha', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(355, 5, 48, NULL, 'বাগাতিপাড়া', 'Bagatipara', '', '', '09', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(356, 5, 48, NULL, 'বড়াইগ্রাম', 'Baraigram', '', '', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(357, 5, 48, NULL, 'গুরুদাসপুর', 'Gurudaspur', '', '', '41', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(358, 5, 48, NULL, 'লালপুর', 'Lalpur', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(359, 5, 48, NULL, 'নাটোর সদর', 'Natore sadar', '', '', '63', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(360, 5, 48, NULL, 'সিংড়া ', 'Singra', '', '640', '6450', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(361, 5, 49, NULL, 'ভোলাহাট', 'Bholahat', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(362, 5, 49, NULL, 'গোমস্তাপুর', 'Gomastapur', '', '', '37', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(363, 5, 49, NULL, 'নাচোল', 'Nachole', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(364, 5, 49, NULL, 'চাঁপাই নাবাবগঞ্জ সদর', 'Chapai nababganj sadar', '', '', '66', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(365, 5, 49, NULL, 'শিবগঞ্জ ', 'Shibganj', '', '', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(366, 5, 50, NULL, 'আটঘারিয়া', 'Atgharia', '', '', '05', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(367, 5, 50, NULL, 'বেড়া', 'Bera', '', '', '16', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(368, 5, 50, NULL, 'ভাঙ্গুরা', 'Bhangura', '', '', '19', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(369, 5, 50, NULL, 'চাটমোহর ', 'Chatmohar', '', '', '22', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(370, 5, 50, NULL, 'ফরিদপুর', 'Faridpur', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(371, 5, 50, NULL, 'ঈশ্বরদী ', 'Ishwardi', '', '', '39', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(372, 5, 50, NULL, 'পাবনা সদর', 'Pabna sadar', '', '', '55', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(373, 5, 50, NULL, 'সাঁথিয়া', 'Santhia', '', '', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(374, 5, 50, NULL, 'সুজানগর', 'Sujanagar', '', '', '83', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(375, 5, 51, NULL, 'বাঘা', 'Bagha', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(376, 5, 51, NULL, 'বাগমারা', 'Baghmara', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(377, 5, 51, NULL, 'চারঘাট ', 'Charghat', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(378, 5, 51, NULL, 'দুর্গাপুর ', 'Durgapur', '', '', '31', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(379, 5, 51, NULL, 'গোদাগাড়ী ', 'Godagari', '', '', '34', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(380, 5, 51, NULL, 'মোহনপুর', 'Mohanpur', '', '', '53', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(381, 5, 51, NULL, 'পবা', 'Paba', '', '', '72', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(382, 5, 51, NULL, 'পুথিয়া', 'Puthia', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(383, 5, 51, NULL, 'তানোর', 'Tanore', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(384, 5, 52, NULL, 'বেলকুচি ', 'Belkuchi', '', '', '11', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(385, 5, 52, NULL, 'চৌহালি', 'Chauhali', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(386, 5, 52, NULL, 'কামারখন্দ', 'Kamarkhanda', '', '', '44', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(387, 5, 52, NULL, 'কাজিপুর', 'Kazipur', '', '', '50', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(388, 5, 52, NULL, 'রাইগঞ্জ', 'Royganj', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(389, 5, 52, NULL, 'শাহজাদপুর', 'Shahjadpur', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(390, 5, 52, NULL, 'সিরাজগঞ্জ সদর', 'Sirajganj sadar', '', '', '78', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(391, 5, 52, NULL, 'তারাশ', 'Tarash', '', '', '89', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(392, 5, 52, NULL, 'উল্লাহ পারা', 'Ullah para', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(393, 6, 53, NULL, 'বিরামপুর ', 'Birampur', '', '', '10', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(394, 6, 53, NULL, 'বীরগঞ্জ', 'Birganj', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(395, 6, 53, NULL, 'বিরল', 'Biral', '', '', '17', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(396, 6, 53, NULL, 'বোচাগঞ্জ', 'Bochaganj', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(397, 6, 53, NULL, 'চিরিরবন্দর', 'Chirirbandar', '', '', '30', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(398, 6, 53, NULL, 'ফুলবাড়ী', 'Fulbari', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(399, 6, 53, NULL, 'ঘোড়াঘাট', 'Ghoraghat', '', '', '43', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(400, 6, 53, NULL, 'হাকিমপুর', 'Hakimpur', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(401, 6, 53, NULL, 'কাহারোল', 'Kaharole', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(402, 6, 53, NULL, 'খানসামা', 'Khansama', '', '', '60', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(403, 6, 53, NULL, 'নবাবগঞ্জ', 'Nawabganj', '', '', '69', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(404, 6, 53, NULL, 'পার্বতীপুর', 'Parbatipur', '', '', '77', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(405, 6, 53, NULL, 'দিনাজপুর সদর', 'Dinajpur sadar', '', '', '64', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(406, 6, 54, NULL, 'ফুলছড়ি', 'Fulchhari', '', '', '21', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(407, 6, 54, NULL, 'গাইবান্ধা সদর', 'Gaibandha sadar', '', '', '24', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(408, 6, 54, NULL, 'গোবিন্দগঞ্জ', 'Gobindaganj', '', '', '30', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(409, 6, 54, NULL, 'পলাশবাড়ী', 'Palashbari', '', '', '67', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(410, 6, 54, NULL, 'সাদুল্লাপুর', 'Sadullapur', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(411, 6, 54, NULL, 'সাঘাটা', 'Saghata', '', '', '88', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(412, 6, 54, NULL, 'সুন্দরগঞ্জ', 'Sundarganj', '', '', '91', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(413, 6, 55, NULL, 'ভুরুঙ্গামারী', 'Bhurungamari', '', '', '6', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(414, 6, 55, NULL, 'চর রাজিবপুর', 'Char rajibpur', '', '', '8', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(415, 6, 55, NULL, 'চিলমারী ', 'Chilmari', '', '', '9', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(416, 6, 55, NULL, 'ফুলবাড়ী', 'Phulbari', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(417, 6, 55, NULL, 'কুড়িগ্রাম সদর', 'Kurigram sadar', '', '', '52', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(418, 6, 55, NULL, 'নাগেশ্বরী', 'Nageshwari', '', '', '61', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(419, 6, 55, NULL, 'রাজারহাট', 'Rajarhat', '', '', '77', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(420, 6, 55, NULL, 'রৌমারী', 'Raumari', '', '', '79', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(421, 6, 55, NULL, 'উলিপুর', 'Ulipur', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(422, 6, 56, NULL, 'আদিতমারী', 'Aditmari', '', '', '2', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(423, 6, 56, NULL, 'হাতীবান্ধা', 'Hatibandha', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(424, 6, 56, NULL, 'কালীগঞ্জ', 'Kaliganj', '', '', '39', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(425, 6, 56, NULL, 'লালমনিরহাট সদর', 'Lalmonirhat sadar', '', '', '55', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(426, 6, 56, NULL, 'পাটগ্রাম', 'Patgram', '', '', '70', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(427, 6, 57, NULL, 'ডোমার উপজেলা', 'Domar upazila', '', '', '15', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(428, 6, 57, NULL, 'জলঢাকা', 'Jaldhaka', '', '', '36', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(429, 6, 57, NULL, 'কিশোরগঞ্জ', 'Kishoreganj', '', '', '45', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(430, 6, 57, NULL, 'নীলফামারী সদর', 'Nilphamari sadar', '', '', '64', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(431, 6, 57, NULL, 'সৈয়দপুর উপজেলা', 'Saidpur upazila', '', '', '85', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(432, 6, 57, NULL, 'ডিমলা', 'Dimla', '', '', '12', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(433, 6, 58, NULL, 'আটোয়ারী', 'Atwari', '', '', '4', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(434, 6, 58, NULL, 'বোদা', 'Boda', '', '', '25', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(435, 6, 58, NULL, 'দেবীগঞ্জ', 'Debiganj', '', '', '34', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(436, 6, 58, NULL, 'পঞ্চগড় সদর', 'Panchagarh sadar', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(437, 6, 58, NULL, 'তেতুলিয়া', 'Tentulia', '', '', '90', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(438, 6, 59, NULL, 'বদরগঞ্জ', 'Badarganj', '', '', '3', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(439, 6, 59, NULL, 'কাউনিয়া', 'Kaunia', '', '', '42', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(440, 6, 59, NULL, 'রংপুর সদর', 'Rangpur sadar', '', '', '49', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(441, 6, 59, NULL, 'মিঠাপুকুর', 'Mitha pukur', '', '', '58', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(442, 6, 59, NULL, 'পীরগাছা', 'Pirgachha', '', '', '73', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(443, 6, 59, NULL, 'পীরগঞ্জ ', 'Pirganj', '', '', '76', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(444, 6, 59, NULL, 'তারাগঞ্জ', 'Taraganj', '', '', '92', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48');
INSERT INTO `upazilas` (`id`, `division_id`, `district_id`, `name`, `title_bn`, `title_en`, `division_bbs_code`, `district_bbs_code`, `bbs_code`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(445, 6, 59, NULL, 'গঙ্গাচড়া', 'Gangahora', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(446, 6, 60, NULL, 'বালিয়াডাঙ্গী', 'Baliadangi', '', '', '8', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(447, 6, 60, NULL, 'হরিপুর', 'Haripur', '', '', '51', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(448, 6, 60, NULL, 'পীরগঞ্জ', 'Pirganj', '', '', '82', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(449, 6, 60, NULL, 'রাণীশংকৈল', 'Ranisankail', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(450, 6, 60, NULL, 'ঠাকুরগাঁও সদর', 'Thakurgaon sadar', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(451, 7, 61, NULL, 'আজমিরীগঞ্জ', 'Ajmiriganj', '', '', '44', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(452, 7, 61, NULL, 'বাহুবল ', 'Bahubal', '', '', '5', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(453, 7, 61, NULL, 'বানিয়াচং ', 'Baniachong', '', '', '11', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(454, 7, 61, NULL, 'চুনারুঘাট ', 'Chunarughat', '', '', '26', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(455, 7, 61, NULL, 'হবিগঞ্জ সদর ', 'Habiganj sadar', '', '', '44', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(456, 7, 61, NULL, 'লাখাই ', 'Lakhai', '', '', '68', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(457, 7, 61, NULL, 'মাধবপুর ', 'Madhabpur', '', '', '71', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(458, 7, 61, NULL, 'নবীগঞ্জ ', 'Nabiganj', '', '', '77', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(459, 7, 62, NULL, 'বড়লেখা ', 'Barlekha', '', '', '14', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(460, 7, 62, NULL, 'জুড়ী ', 'Juri', '', '', '35', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(461, 7, 62, NULL, 'কমলগঞ্জ ', 'Kamalganj', '', '', '56', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(462, 7, 62, NULL, 'কুলাউড়া ', 'Kulaura', '', '', '65', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(463, 7, 62, NULL, 'মৌলভীবাজার সদর ', 'Maulvibazar sadar', '', '', '74', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(464, 7, 62, NULL, 'রাজনগর ', 'Rajnagar', '', '', '80', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(465, 7, 62, NULL, 'শ্রীমঙ্গল', 'Sreemangal', '', '', '83', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(466, 7, 63, NULL, 'বিশ্বম্ভরপুর ', 'Bishwambarpur', '', '', '18', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(467, 7, 63, NULL, 'ছাতক ', 'Chhatak', '', '', '23', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(468, 7, 63, NULL, 'দিরাই ', 'Derai', '', '', '29', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(469, 7, 63, NULL, 'ধর্মপাশা ', 'Dharampasha', '', '', '32', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(470, 7, 63, NULL, 'দোয়ারাবাজার ', 'Dowarabazar', '', '', '33', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(471, 7, 63, NULL, 'জগন্নাথপুর ', 'Jagannathpur', '', '', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(472, 7, 63, NULL, 'জামালগঞ্জ ', 'Jamalganj', '', '', '50', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(473, 7, 63, NULL, 'শাল্লা ', 'Sulla', '', '', '86', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(474, 7, 63, NULL, 'সুনামগঞ্জ সদর ', 'Sunamganj sadar', '', '', '89', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(475, 7, 63, NULL, 'তাহিরপুর ', 'Tahirpur', '', '', '92', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(476, 7, 63, NULL, 'দক্ষিণ  সুনামগঞ্জ', 'Dakshin  sunamganj', '', '', '', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(477, 7, 64, NULL, 'বালাগঞ্জ ', 'Balaganj', '', '', '8', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(478, 7, 64, NULL, 'বিয়ানীবাজার ', 'Beani bazar', '', '', '17', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(479, 7, 64, NULL, 'বিশ্বনাথ ', 'Bishwanath', '', '', '20', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(480, 7, 64, NULL, 'কোম্পানীগঞ্জ ', 'Companiganj', '', '', '27', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(481, 7, 64, NULL, 'দক্ষিণ সুরমা ', 'Dakshin surma', '', '', '31', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(482, 7, 64, NULL, 'ফেঞ্চুগঞ্জ ', 'Fenchuganj', '', '', '35', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(483, 7, 64, NULL, 'গোলাপগঞ্জ ', 'Golapganj', '', '', '38', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(484, 7, 64, NULL, 'গোয়াইনঘাট ', 'Gowainghat', '', '', '41', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(485, 7, 64, NULL, 'জৈন্তাপুর ', 'Jaintiapur', '', '', '53', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(486, 7, 64, NULL, 'কানাইঘাট ', 'Kanaighat', '', '', '59', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(487, 7, 64, NULL, 'সিলেট সদর ', 'Sylhet sadar', '', '', '62', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(488, 7, 64, NULL, 'জকিগঞ্জ ', 'Zakiganj', '', '', '94', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(489, 4, 35, NULL, 'বাগেরহাট সদর', 'Bagerhat sadar', NULL, NULL, '08', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(490, 2, 14, NULL, 'গুইমারা', 'Guimara', '20', '46', '66', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(491, 1, 3, NULL, 'চরফ্যাশন', 'Charfassion', '10', '9', '24', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(492, 7, 64, NULL, 'ওসমানীনগর', 'Osmaninagar', '70', '91', '20', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(493, 5, 46, NULL, 'ক্ষেতলাল', 'Khetlal', '50', '38', '61', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(494, 5, 46, NULL, 'পাঁচবিবি', 'Panchbibi', '50', '38', '74', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(495, 5, 48, NULL, 'নলডাঙ্গা ', 'Naldanga ', '50', '69', '7350', 1, 0, 0, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(496, 2, 16, NULL, 'কবিরহাট', 'Kabirhat', '20', '75', '47', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(497, 1, 5, NULL, 'গলাচিপা', 'Galachipa', '10', '78', '57', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48'),
(498, 3, 30, NULL, 'পূর্বধলা', 'Purbadhala', '', '', '83', 1, 1, 1, '2023-01-19 08:37:48', '2023-01-19 08:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '1000001',
  `association_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `area_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `division_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `district_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `upazila_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `thana_id` mediumint(8) UNSIGNED DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED DEFAULT NULL,
  `branch_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_contact` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '$2y$10$TsRPdMW1CAjTSEP/QF.5aea4JjTbl4t1O8NMOF1sIFgU5EDcan8sK',
  `thumb` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` double(10,2) DEFAULT 0.00,
  `debit` double(10,2) DEFAULT 0.00,
  `total` double(10,2) DEFAULT 0.00,
  `father_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_detail_bn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_detail_en` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bayat_date` datetime DEFAULT NULL,
  `caliph_id` int(10) UNSIGNED DEFAULT NULL,
  `vice_president_id` int(10) UNSIGNED DEFAULT NULL,
  `president_id` int(10) UNSIGNED DEFAULT NULL,
  `conditions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `you_unit_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default` tinyint(4) NOT NULL DEFAULT 0,
  `walking` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `association_id`, `area_id`, `division_id`, `district_id`, `upazila_id`, `thana_id`, `branch_id`, `branch_unit_id`, `name`, `title_bn`, `title_en`, `contact`, `branch_contact`, `username`, `email`, `email_verified_at`, `password`, `thumb`, `nid`, `credit`, `debit`, `total`, `father_bn`, `father_en`, `address_bn`, `address_en`, `unit_detail_bn`, `unit_detail_en`, `bayat_date`, `caliph_id`, `vice_president_id`, `president_id`, `conditions`, `colors`, `user_code`, `unit_code`, `you_unit_code`, `remember_token`, `default`, `walking`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'M-004-000001', NULL, NULL, 9, 22, 173, 235, 4, 4, NULL, 'মাহমুদ এনামুল কবির', 'Mahmud Enamul Kabir', '01714008505', NULL, '01714008505', '01714008505@mas.com', '2023-02-13 10:25:36', '$2y$10$B0HNy1CUKiVp1Su8RE5YWuA/T.bMJR0JLKo/p9Bwq63AL8peeBXhO', 'user/2023/February/thumb-1-1676284067208.jpeg', '19683910783397091', 0.00, 0.00, 0.00, 'আশরাফ আলী', 'Supervise me', 'আইরমারী', 'Airmari', NULL, NULL, '2021-10-15 00:00:00', 11, 18, 14, '[\"1\",\"2\",\"3\",\"4\",\"6\",\"7\"]', '[\"2\"]', NULL, NULL, NULL, 'XWCcIqBSkI', 0, 0, 1, 1, 1, '2023-02-13 10:25:40', '2023-02-14 04:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `default_role` smallint(5) UNSIGNED DEFAULT NULL,
  `last` tinyint(1) NOT NULL DEFAULT 1,
  `sort` smallint(6) DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `code`, `name`, `title_bn`, `title_en`, `parent_id`, `default_role`, `last`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', 'Master Admin', 'মাস্টার এডমিন', 'Master Admin', NULL, 1, 1, 1, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(2, '2', 'System Admin', 'সিস্টেম এডমিন', 'System Admin', NULL, 2, 1, 2, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(3, '3', 'Admin', 'এডমিন', 'Admin', NULL, 3, 1, 3, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(4, '4', 'Head Of Association', 'সমিতির প্রধান', 'Head Of Association', NULL, 4, 1, 4, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(5, '5', 'President', 'এরিয়া সভাপতি', 'Area President', NULL, 5, 1, 5, 1, NULL, 1, '2023-01-20 15:27:18', '2023-02-13 09:45:38'),
(6, '6', 'Vice President', 'সভাপতি', 'President', NULL, 6, 1, 6, 1, NULL, 1, '2023-01-20 15:27:18', '2023-02-13 09:45:51'),
(7, '7', 'Caliph', 'খলিফা', 'Caliph', NULL, 7, 1, 7, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18'),
(8, '8', 'Operator', 'অপারেটর', 'Operator', NULL, 8, 1, 8, 1, NULL, NULL, '2023-01-20 15:27:18', '2023-01-20 15:27:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_code_unique` (`code`),
  ADD KEY `admins_fk_role_id` (`role_id`),
  ADD KEY `admins_fk_user_type_id` (`user_type_id`),
  ADD KEY `admins_fk_association_id` (`association_id`),
  ADD KEY `admins_fk_area_id` (`area_id`),
  ADD KEY `admins_fk_division_id` (`division_id`),
  ADD KEY `admins_fk_district_id` (`district_id`),
  ADD KEY `admins_fk_upazila_id` (`upazila_id`),
  ADD KEY `admins_fk_branch_id` (`branch_id`),
  ADD KEY `admins_fk_branch_unit_id` (`branch_unit_id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_code_unique` (`code`),
  ADD KEY `areas_fk_association_id` (`association_id`);

--
-- Indexes for table `associations`
--
ALTER TABLE `associations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `associations_code_unique` (`code`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_fk_office_type_id` (`office_type_id`),
  ADD KEY `branches_fk_association_id` (`association_id`),
  ADD KEY `branches_fk_area_id` (`area_id`),
  ADD KEY `branches_fk_division_id` (`division_id`),
  ADD KEY `branches_fk_district_id` (`district_id`),
  ADD KEY `branches_fk_upazila_id` (`upazila_id`);

--
-- Indexes for table `branch_units`
--
ALTER TABLE `branch_units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_units_code_unique` (`code`),
  ADD KEY `branch_units_fk_association_id` (`association_id`),
  ADD KEY `branch_units_fk_area_id` (`area_id`),
  ADD KEY `branch_units_fk_division_id` (`division_id`),
  ADD KEY `branch_units_fk_district_id` (`district_id`),
  ADD KEY `branch_units_fk_upazila_id` (`upazila_id`),
  ADD KEY `branch_units_fk_branch_id` (`branch_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_code_unique` (`code`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `conditions_code_unique` (`code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_fk_division_id` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_types`
--
ALTER TABLE `office_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `office_types_code_unique` (`code`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_code_unique` (`code`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD KEY `roles_permissions_fk_role_id` (`role_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_code_unique` (`code`);

--
-- Indexes for table `thanas`
--
ALTER TABLE `thanas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thanas_fk_division_id` (`division_id`),
  ADD KEY `thanas_fk_district_id` (`district_id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_fk_division_id` (`division_id`),
  ADD KEY `upazilas_fk_district_id` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `users_fk_association_id` (`association_id`),
  ADD KEY `users_fk_area_id` (`area_id`),
  ADD KEY `users_fk_division_id` (`division_id`),
  ADD KEY `users_fk_district_id` (`district_id`),
  ADD KEY `users_fk_upazila_id` (`upazila_id`),
  ADD KEY `users_fk_thana_id` (`thana_id`),
  ADD KEY `users_fk_branch_id` (`branch_id`),
  ADD KEY `users_fk_branch_unit_id` (`branch_unit_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_types_code_unique` (`code`),
  ADD KEY `user_types_parent_id_foreign` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `associations`
--
ALTER TABLE `associations`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `branch_units`
--
ALTER TABLE `branch_units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `office_types`
--
ALTER TABLE `office_types`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thanas`
--
ALTER TABLE `thanas`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_association_id` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_branch_unit_id` FOREIGN KEY (`branch_unit_id`) REFERENCES `branch_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_upazila_id` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admins_fk_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `areas_fk_association_id` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_fk_association_id` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_fk_office_type_id` FOREIGN KEY (`office_type_id`) REFERENCES `office_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branches_fk_upazila_id` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `branch_units`
--
ALTER TABLE `branch_units`
  ADD CONSTRAINT `branch_units_fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_units_fk_association_id` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_units_fk_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_units_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_units_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `branch_units_fk_upazila_id` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `roles_permissions_fk_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thanas`
--
ALTER TABLE `thanas`
  ADD CONSTRAINT `thanas_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thanas_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `upazilas_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk_area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_association_id` FOREIGN KEY (`association_id`) REFERENCES `associations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_branch_unit_id` FOREIGN KEY (`branch_unit_id`) REFERENCES `branch_units` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_district_id` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_division_id` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_thana_id` FOREIGN KEY (`thana_id`) REFERENCES `thanas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_fk_upazila_id` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_types`
--
ALTER TABLE `user_types`
  ADD CONSTRAINT `user_types_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
