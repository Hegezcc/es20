-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 11:19 AM
-- Server version: 10.1.38-MariaDB
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
-- Table structure for table `d3_ssb_competitors`
--

CREATE TABLE `d3_ssb_competitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_competitors`
--

INSERT INTO `d3_ssb_competitors` (`id`, `count`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_days`
--

CREATE TABLE `d3_ssb_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_days`
--

INSERT INTO `d3_ssb_days` (`id`, `name`, `date`) VALUES
(1, 'C1', '2015-08-04'),
(2, 'C2', '2015-08-05'),
(3, 'C3', '2015-08-06'),
(4, 'C4', '2015-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_experiences`
--

CREATE TABLE `d3_ssb_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tables` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_experiences`
--

INSERT INTO `d3_ssb_experiences` (`id`, `name`, `description`, `tables`) VALUES
(1, 'Casual Dining', 'This dining is like a bistro/café.', '2,4'),
(2, 'Bar Service', 'Casual service for sandwiches, cakes, cheese plates, salads, alcoholic and non-alcoholic beverages. Guests can choose from a limited menu. Competitors will prepare international cocktails and serve with light snacks.', '6'),
(3, 'Fine Dining', 'This is formal dining with a four course set menu with alcoholic beverages. The service includes the waiter preparing all dishes at the table by flambé, carving or assembling. Appropriate for VIPs.', '4'),
(4, 'Banquet Dining', 'This is a three course set menu with coffee and alcoholic beverages in a banquet format.', '6');

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_failed_jobs`
--

CREATE TABLE `d3_ssb_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_guests`
--

CREATE TABLE `d3_ssb_guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'requested',
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_guests`
--

INSERT INTO `d3_ssb_guests` (`id`, `name`, `country`, `status`, `option_id`, `reservation_id`) VALUES
(1, 'asdf', 'BR', 'requested', 5, 3),
(2, 'asdf', 'BR', 'requested', 13, 3),
(3, 'asdf', 'BR', 'requested', 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_migrations`
--

CREATE TABLE `d3_ssb_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_migrations`
--

INSERT INTO `d3_ssb_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_07_03_062246_create_days_table', 1),
(3, '2020_07_03_062306_create_seatings_table', 1),
(4, '2020_07_03_062318_create_experiences_table', 1),
(5, '2020_07_03_062346_create_options_table', 1),
(6, '2020_07_03_062429_create_reservations_table', 1),
(7, '2020_07_03_062436_create_guests_table', 1),
(8, '2020_07_03_062440_create_competitors_table', 1),
(9, '2020_07_03_062446_add_foreign_keys', 1),
(10, '2020_07_03_073804_insert_default_data', 1);

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_options`
--

CREATE TABLE `d3_ssb_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seating_id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_options`
--

INSERT INTO `d3_ssb_options` (`id`, `seating_id`, `day_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_reservations`
--

CREATE TABLE `d3_ssb_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_group` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_reservations`
--

INSERT INTO `d3_ssb_reservations` (`id`, `name`, `organization`, `email`, `phone`, `country`, `is_group`) VALUES
(1, 'asdf', NULL, 'asdf@asdf.fi', NULL, 'DE', 0),
(2, 'asdf', NULL, 'asdf@asdf.fi', NULL, 'CH', 1),
(3, 'asdf', NULL, 'asdf@asdf.fi', NULL, 'BR', 0);

-- --------------------------------------------------------

--
-- Table structure for table `d3_ssb_seatings`
--

CREATE TABLE `d3_ssb_seatings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `d3_ssb_seatings`
--

INSERT INTO `d3_ssb_seatings` (`id`, `time`, `experience_id`) VALUES
(1, '10:50 – 12:00', 1),
(2, '13:30 – 14:40', 1),
(3, '13:15 – 14:45', 2),
(4, '13:00 – 15:15', 3),
(5, '12:45 – 15:00', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d3_ssb_competitors`
--
ALTER TABLE `d3_ssb_competitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_days`
--
ALTER TABLE `d3_ssb_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_experiences`
--
ALTER TABLE `d3_ssb_experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_failed_jobs`
--
ALTER TABLE `d3_ssb_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_guests`
--
ALTER TABLE `d3_ssb_guests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d3_ssb_guests_option_id_foreign` (`option_id`),
  ADD KEY `d3_ssb_guests_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `d3_ssb_migrations`
--
ALTER TABLE `d3_ssb_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_options`
--
ALTER TABLE `d3_ssb_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d3_ssb_options_seating_id_foreign` (`seating_id`),
  ADD KEY `d3_ssb_options_day_id_foreign` (`day_id`);

--
-- Indexes for table `d3_ssb_reservations`
--
ALTER TABLE `d3_ssb_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d3_ssb_seatings`
--
ALTER TABLE `d3_ssb_seatings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d3_ssb_seatings_experience_id_foreign` (`experience_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d3_ssb_competitors`
--
ALTER TABLE `d3_ssb_competitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `d3_ssb_days`
--
ALTER TABLE `d3_ssb_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `d3_ssb_experiences`
--
ALTER TABLE `d3_ssb_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `d3_ssb_failed_jobs`
--
ALTER TABLE `d3_ssb_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d3_ssb_guests`
--
ALTER TABLE `d3_ssb_guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `d3_ssb_migrations`
--
ALTER TABLE `d3_ssb_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `d3_ssb_options`
--
ALTER TABLE `d3_ssb_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `d3_ssb_reservations`
--
ALTER TABLE `d3_ssb_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `d3_ssb_seatings`
--
ALTER TABLE `d3_ssb_seatings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d3_ssb_guests`
--
ALTER TABLE `d3_ssb_guests`
  ADD CONSTRAINT `d3_ssb_guests_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `d3_ssb_options` (`id`),
  ADD CONSTRAINT `d3_ssb_guests_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `d3_ssb_reservations` (`id`);

--
-- Constraints for table `d3_ssb_options`
--
ALTER TABLE `d3_ssb_options`
  ADD CONSTRAINT `d3_ssb_options_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `d3_ssb_days` (`id`),
  ADD CONSTRAINT `d3_ssb_options_seating_id_foreign` FOREIGN KEY (`seating_id`) REFERENCES `d3_ssb_seatings` (`id`);

--
-- Constraints for table `d3_ssb_seatings`
--
ALTER TABLE `d3_ssb_seatings`
  ADD CONSTRAINT `d3_ssb_seatings_experience_id_foreign` FOREIGN KEY (`experience_id`) REFERENCES `d3_ssb_experiences` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
