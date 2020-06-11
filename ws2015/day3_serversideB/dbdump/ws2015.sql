-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 11:58 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ws2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `dining_experiences`
--

CREATE TABLE `dining_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dining_experiences`
--

INSERT INTO `dining_experiences` (`id`, `name`, `description`) VALUES
(1, 'Casual Dining', 'This dining is like a bistro/café.'),
(2, 'Bar Service', 'Casual service for sandwiches, cakes, cheese plates, salads, alcoholic and non-alcoholic beverages. Guests can choose from a limited menu. Competitors will prepare international cocktails and serve with light snacks.'),
(3, 'Fine Dining', 'This is formal dining with a four course set menu with alcoholic beverages. The service includes the waiter preparing all dishes at the table by flambé, carving or assembling. Appropriate for VIPs.'),
(4, 'Banquet Dining', 'This is a three course set menu with coffee and alcoholic beverages in a banquet format.');

-- --------------------------------------------------------

--
-- Table structure for table `dining_options`
--

CREATE TABLE `dining_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dining_experience_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dining_options`
--

INSERT INTO `dining_options` (`id`, `day_name`, `date`, `time`, `dining_experience_id`) VALUES
(1, 'C1', '2015-08-04', '12:45 - 15:00', 4),
(2, 'C2', '2015-08-05', '12:45 - 15:00', 4),
(3, 'C3', '2015-08-06', '12:45 - 15:00', 4),
(4, 'C4', '2015-08-07', '12:45 - 15:00', 4),
(5, 'C1', '2015-08-04', '13:15 - 14:45', 2),
(6, 'C2', '2015-08-05', '13:15 - 14:45', 2),
(7, 'C3', '2015-08-06', '13:15 - 14:45', 2),
(8, 'C4', '2015-08-07', '13:15 - 14:45', 2),
(9, 'C1', '2015-08-04', '10:50 - 12:00', 1),
(10, 'C1', '2015-08-04', '13:30 - 14:40', 1),
(11, 'C2', '2015-08-05', '10:50 - 12:00', 1),
(12, 'C2', '2015-08-05', '13:30 - 14:40', 1),
(13, 'C3', '2015-08-06', '10:50 - 12:00', 1),
(14, 'C3', '2015-08-06', '13:30 - 14:40', 1),
(15, 'C4', '2015-08-07', '10:50 - 12:00', 1),
(16, 'C4', '2015-08-07', '13:30 - 14:40', 1),
(17, 'C1', '2015-08-04', '13:00 - 15:15', 3),
(18, 'C2', '2015-08-05', '13:00 - 15:15', 3),
(19, 'C3', '2015-08-06', '13:00 - 15:15', 3),
(20, 'C4', '2015-08-07', '13:00 - 15:15', 3);

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
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `dining_option_id` bigint(20) UNSIGNED NOT NULL
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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_06_11_075728_create_dining_experiences_table', 1),
(3, '2020_06_11_075738_create_dining_options_table', 1),
(4, '2020_06_11_075743_create_reservations_table', 1),
(5, '2020_06_11_075750_create_guests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `created_at`, `updated_at`, `name`, `organization`, `email`, `phone`, `country`, `type`) VALUES
(1, '2020-06-11 06:08:29', '2020-06-11 06:08:29', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'BR', 'individual'),
(2, '2020-06-11 06:10:57', '2020-06-11 06:10:57', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'CA', 'individual'),
(3, '2020-06-11 06:18:11', '2020-06-11 06:18:11', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'CN', 'group'),
(4, '2020-06-11 06:18:27', '2020-06-11 06:18:27', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'AU', 'individual'),
(5, '2020-06-11 06:18:39', '2020-06-11 06:18:39', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'DE', 'group'),
(6, '2020-06-11 06:20:25', '2020-06-11 06:20:25', 'asdf', 'asdf', 'asdf@asdf.fi', '123', 'CN', 'individual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dining_experiences`
--
ALTER TABLE `dining_experiences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dining_experiences_name_unique` (`name`);

--
-- Indexes for table `dining_options`
--
ALTER TABLE `dining_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dining_options_dining_experience_id_foreign` (`dining_experience_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guests_reservation_id_foreign` (`reservation_id`),
  ADD KEY `guests_dining_option_id_foreign` (`dining_option_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dining_experiences`
--
ALTER TABLE `dining_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dining_options`
--
ALTER TABLE `dining_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dining_options`
--
ALTER TABLE `dining_options`
  ADD CONSTRAINT `dining_options_dining_experience_id_foreign` FOREIGN KEY (`dining_experience_id`) REFERENCES `dining_experiences` (`id`);

--
-- Constraints for table `guests`
--
ALTER TABLE `guests`
  ADD CONSTRAINT `guests_dining_option_id_foreign` FOREIGN KEY (`dining_option_id`) REFERENCES `dining_options` (`id`),
  ADD CONSTRAINT `guests_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
