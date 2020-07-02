-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 04:36 AM
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
-- Table structure for table `d2ssa_matchs`
--

CREATE TABLE `d2ssa_matchs` (
  `id` int(11) NOT NULL,
  `ended` tinyint(1) NOT NULL DEFAULT '0',
  `start_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2ssa_matchs`
--

INSERT INTO `d2ssa_matchs` (`id`, `ended`, `start_time`, `access_time`) VALUES
(1, 0, '2020-07-03 04:41:51', '2020-07-03 04:41:51'),
(2, 1, '2020-07-03 04:42:45', '2020-07-03 04:42:45'),
(3, 1, '2020-07-03 04:58:07', '2020-07-03 04:58:07'),
(4, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(5, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(6, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(7, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(8, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(9, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(10, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(11, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(12, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(13, 1, '2020-07-03 04:58:08', '2020-07-03 04:58:08'),
(14, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(15, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(16, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(17, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(18, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(19, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(20, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(21, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(22, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(23, 1, '2020-07-03 04:58:09', '2020-07-03 04:58:09'),
(24, 1, '2020-07-03 04:58:26', '2020-07-03 04:58:26'),
(25, 1, '2020-07-03 04:58:28', '2020-07-03 04:58:28'),
(26, 1, '2020-07-03 04:58:30', '2020-07-03 04:58:30'),
(27, 1, '2020-07-03 05:01:14', '2020-07-03 05:01:14'),
(28, 1, '2020-07-03 05:17:24', '2020-07-03 05:17:24'),
(29, 1, '2020-07-03 05:17:29', '2020-07-03 05:17:29'),
(30, 1, '2020-07-03 05:17:36', '2020-07-03 05:17:36'),
(31, 1, '2020-07-03 05:18:40', '2020-07-03 05:18:40'),
(32, 1, '2020-07-03 05:20:54', '2020-07-03 05:28:32'),
(33, 1, '2020-07-03 05:28:34', '2020-07-03 05:34:07'),
(34, 1, '2020-07-03 05:34:09', '2020-07-03 05:34:19'),
(35, 1, '2020-07-03 05:34:22', '2020-07-03 05:34:23'),
(36, 0, '2020-07-03 05:34:26', '2020-07-03 05:34:29'),
(37, 1, '2020-07-03 05:35:10', '2020-07-03 05:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `d2ssa_moves`
--

CREATE TABLE `d2ssa_moves` (
  `id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `square_id` int(11) NOT NULL,
  `is_player` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2ssa_moves`
--

INSERT INTO `d2ssa_moves` (`id`, `match_id`, `square_id`, `is_player`) VALUES
(9, 27, 1, 1),
(10, 27, 1, 1),
(11, 27, 1, 1),
(12, 27, 1, 1),
(13, 27, 1, 1),
(14, 27, 1, 1),
(15, 27, 1, 1),
(16, 27, 1, 1),
(17, 27, 8, 1),
(18, 27, 7, 1),
(19, 27, 4, 1),
(20, 27, 4, 1),
(21, 27, 7, 1),
(22, 27, 5, 1),
(23, 27, 3, 1),
(24, 27, 3, 1),
(25, 27, 3, 1),
(26, 27, 3, 1),
(27, 27, 1, 1),
(28, 27, 4, 1),
(29, 27, 5, 1),
(30, 27, 8, 1),
(31, 27, 6, 1),
(32, 27, 6, 1),
(33, 27, 6, 1),
(34, 27, 6, 1),
(35, 27, 9, 1),
(36, 27, 2, 1),
(37, 28, 5, 1),
(38, 28, 6, 1),
(39, 30, 5, 1),
(40, 30, 6, 1),
(41, 31, 5, 1),
(42, 32, 5, 1),
(43, 32, 4, 1),
(44, 32, 6, 1),
(45, 33, 1, 1),
(46, 33, 3, 1),
(47, 33, 6, 1),
(48, 33, 9, 1),
(49, 33, 5, 1),
(50, 33, 7, 0),
(51, 33, 8, 1),
(52, 33, 4, 0),
(53, 34, 5, 1),
(54, 34, 8, 0),
(55, 34, 6, 1),
(56, 34, 3, 0),
(57, 34, 4, 1),
(58, 34, 9, 0),
(59, 36, 5, 1),
(60, 36, 1, 0),
(61, 37, 5, 1),
(62, 37, 1, 0),
(63, 37, 6, 1),
(64, 37, 3, 0),
(65, 37, 2, 1),
(66, 37, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `d2ssa_scores`
--

CREATE TABLE `d2ssa_scores` (
  `id` int(11) NOT NULL,
  `nick` varchar(64) NOT NULL,
  `avatar` varchar(13) DEFAULT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `d2ssa_users`
--

CREATE TABLE `d2ssa_users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(13) DEFAULT NULL,
  `current_match_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2ssa_users`
--

INSERT INTO `d2ssa_users` (`id`, `avatar`, `current_match_id`) VALUES
(1, 'test', NULL),
(21, NULL, NULL),
(22, NULL, NULL),
(23, NULL, NULL),
(24, NULL, NULL),
(25, NULL, NULL),
(26, NULL, NULL),
(27, NULL, NULL),
(28, NULL, NULL),
(29, NULL, NULL),
(30, NULL, NULL),
(31, NULL, NULL),
(32, NULL, NULL),
(33, NULL, NULL),
(34, NULL, NULL),
(35, NULL, NULL),
(36, NULL, NULL),
(37, NULL, NULL),
(38, NULL, NULL),
(39, NULL, NULL),
(40, NULL, NULL),
(41, NULL, NULL),
(42, NULL, NULL),
(43, NULL, NULL),
(44, NULL, NULL),
(45, NULL, NULL),
(46, NULL, NULL),
(47, NULL, NULL),
(48, NULL, NULL),
(49, NULL, NULL),
(50, '5efe95404c89b', 36),
(51, '5efe995eade49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d2ssa_matchs`
--
ALTER TABLE `d2ssa_matchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d2ssa_moves`
--
ALTER TABLE `d2ssa_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `d2ssa_scores`
--
ALTER TABLE `d2ssa_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `d2ssa_users`
--
ALTER TABLE `d2ssa_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `current_match_id` (`current_match_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d2ssa_matchs`
--
ALTER TABLE `d2ssa_matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `d2ssa_moves`
--
ALTER TABLE `d2ssa_moves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `d2ssa_scores`
--
ALTER TABLE `d2ssa_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d2ssa_users`
--
ALTER TABLE `d2ssa_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d2ssa_moves`
--
ALTER TABLE `d2ssa_moves`
  ADD CONSTRAINT `d2ssa_moves_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `d2ssa_matchs` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `d2ssa_users`
--
ALTER TABLE `d2ssa_users`
  ADD CONSTRAINT `d2ssa_users_ibfk_1` FOREIGN KEY (`current_match_id`) REFERENCES `d2ssa_matchs` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
