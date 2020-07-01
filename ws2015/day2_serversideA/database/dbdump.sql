-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 08:04 PM
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
CREATE DATABASE IF NOT EXISTS `ws2015` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ws2015`;

-- --------------------------------------------------------

--
-- Table structure for table `d2_ssa_matches`
--

CREATE TABLE `d2_ssa_matches` (
  `id` int(10) UNSIGNED NOT NULL,
  `started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_move` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ended` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2_ssa_matches`
--

INSERT INTO `d2_ssa_matches` (`id`, `started`, `last_move`, `ended`, `user_id`) VALUES
(1, '2020-06-30 11:56:15', '2020-06-30 13:34:52', 1, 1),
(2, '2020-06-30 13:03:44', '2020-06-30 13:36:33', 1, 1),
(3, '2020-06-30 13:36:42', '2020-06-30 13:36:48', 1, 1),
(4, '2020-06-30 13:36:53', '2020-06-30 14:54:33', 1, 1),
(5, '2020-06-30 14:54:43', '2020-06-30 15:10:01', 1, 1),
(6, '2020-06-30 15:10:03', '2020-06-30 15:17:11', 1, 1),
(7, '2020-06-30 15:17:13', '2020-06-30 15:19:44', 1, 1),
(8, '2020-06-30 15:19:45', '2020-06-30 15:29:43', 1, 1),
(9, '2020-06-30 15:29:45', '2020-06-30 15:33:48', 1, 1),
(10, '2020-06-30 15:33:51', '2020-06-30 15:35:40', 1, 1),
(11, '2020-06-30 15:53:42', '2020-06-30 15:53:54', 1, 1),
(12, '2020-06-30 15:55:30', '2020-06-30 15:55:46', 1, 1),
(13, '2020-06-30 15:55:54', '2020-06-30 15:56:03', 1, 1),
(14, '2020-06-30 15:59:18', '2020-06-30 15:59:56', 1, 1),
(15, '2020-06-30 16:29:22', '2020-06-30 16:29:34', 1, 1),
(16, '2020-06-30 16:41:23', '2020-06-30 16:41:31', 1, 1),
(17, '2020-06-30 16:43:02', '2020-06-30 16:43:13', 1, 1),
(18, '2020-06-30 16:43:18', '2020-06-30 16:43:24', 1, 1),
(19, '2020-06-30 16:43:37', '2020-06-30 16:43:44', 1, 1),
(20, '2020-06-30 17:18:46', '2020-06-30 17:53:36', 1, 1),
(21, '2020-06-30 17:41:49', '2020-06-30 17:42:15', 1, 4),
(22, '2020-06-30 17:50:35', '2020-06-30 17:50:54', 1, 4),
(23, '2020-06-30 17:51:02', '2020-06-30 17:51:14', 1, 4),
(24, '2020-06-30 17:51:53', '2020-06-30 17:52:16', 1, 4),
(25, '2020-06-30 17:52:34', '2020-06-30 17:53:04', 1, 4),
(26, '2020-06-30 18:02:12', '2020-06-30 18:02:21', 1, 5),
(27, '2020-06-30 18:02:47', '2020-06-30 18:02:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d2_ssa_moves`
--

CREATE TABLE `d2_ssa_moves` (
  `id` int(10) UNSIGNED NOT NULL,
  `square` int(10) UNSIGNED NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `is_player` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2_ssa_moves`
--

INSERT INTO `d2_ssa_moves` (`id`, `square`, `match_id`, `is_player`) VALUES
(51, 8, 6, 1),
(52, 2, 6, 0),
(53, 9, 6, 1),
(54, 3, 6, 0),
(55, 1, 6, 1),
(56, 4, 6, 0),
(57, 7, 6, 1),
(58, 5, 7, 1),
(59, 6, 7, 0),
(60, 9, 7, 1),
(61, 3, 7, 0),
(62, 2, 7, 1),
(63, 1, 7, 0),
(64, 7, 7, 1),
(65, 8, 7, 0),
(66, 4, 7, 1),
(67, 6, 8, 1),
(68, 2, 8, 0),
(69, 9, 8, 1),
(70, 1, 8, 0),
(71, 5, 8, 1),
(72, 4, 8, 0),
(73, 7, 8, 1),
(74, 8, 8, 0),
(75, 5, 9, 1),
(76, 2, 9, 0),
(77, 9, 9, 1),
(78, 8, 9, 0),
(79, 6, 9, 1),
(80, 1, 9, 0),
(81, 3, 9, 1),
(82, 4, 9, 1),
(83, 7, 10, 1),
(84, 4, 10, 0),
(85, 8, 10, 1),
(86, 6, 10, 0),
(87, 1, 10, 1),
(88, 3, 10, 0),
(89, 2, 10, 1),
(90, 9, 10, 0),
(91, 5, 11, 1),
(92, 1, 11, 0),
(93, 2, 11, 1),
(94, 7, 11, 0),
(95, 4, 11, 1),
(96, 9, 11, 0),
(97, 8, 11, 1),
(98, 5, 12, 1),
(99, 7, 12, 0),
(100, 4, 12, 1),
(101, 1, 12, 0),
(102, 2, 12, 1),
(103, 9, 12, 0),
(104, 3, 12, 1),
(105, 8, 12, 0),
(106, 6, 13, 1),
(107, 4, 13, 0),
(108, 9, 13, 1),
(109, 5, 13, 0),
(110, 3, 13, 1),
(111, 6, 14, 1),
(112, 5, 14, 0),
(113, 9, 14, 1),
(114, 2, 14, 0),
(115, 4, 14, 1),
(116, 7, 14, 0),
(117, 1, 14, 1),
(118, 3, 14, 0),
(119, 1, 15, 1),
(120, 4, 15, 0),
(121, 5, 15, 1),
(122, 7, 15, 0),
(123, 9, 15, 1),
(124, 1, 16, 1),
(125, 6, 16, 0),
(126, 2, 16, 1),
(127, 4, 16, 0),
(128, 3, 16, 1),
(129, 1, 17, 1),
(130, 3, 17, 0),
(131, 2, 17, 1),
(132, 5, 17, 0),
(133, 7, 17, 1),
(134, 4, 17, 0),
(135, 8, 17, 1),
(136, 6, 17, 0),
(137, 4, 18, 1),
(138, 3, 18, 0),
(139, 5, 18, 1),
(140, 9, 18, 0),
(141, 6, 18, 1),
(142, 1, 19, 1),
(143, 7, 19, 0),
(144, 2, 19, 1),
(145, 9, 19, 0),
(146, 3, 19, 1),
(147, 5, 21, 1),
(148, 3, 21, 0),
(149, 6, 21, 1),
(150, 2, 21, 0),
(151, 1, 21, 1),
(152, 7, 21, 0),
(153, 8, 21, 1),
(154, 9, 21, 0),
(155, 4, 21, 1),
(156, 4, 22, 1),
(157, 5, 22, 0),
(158, 9, 22, 1),
(159, 1, 22, 0),
(160, 8, 22, 1),
(161, 3, 22, 0),
(162, 7, 22, 1),
(163, 1, 23, 1),
(164, 2, 23, 0),
(165, 3, 23, 1),
(166, 7, 23, 0),
(167, 6, 23, 1),
(168, 5, 23, 0),
(169, 9, 23, 1),
(170, 4, 24, 1),
(171, 5, 24, 0),
(172, 7, 24, 1),
(173, 8, 24, 0),
(174, 2, 24, 1),
(175, 1, 24, 0),
(176, 9, 24, 1),
(177, 3, 24, 0),
(178, 6, 24, 1),
(179, 5, 25, 1),
(180, 1, 25, 0),
(181, 4, 25, 1),
(182, 8, 25, 0),
(183, 3, 25, 1),
(184, 6, 25, 0),
(185, 7, 25, 1),
(186, 5, 20, 1),
(187, 7, 20, 0),
(188, 8, 20, 1),
(189, 9, 20, 0),
(190, 2, 20, 1),
(191, 5, 26, 1),
(192, 3, 26, 0),
(193, 6, 26, 1),
(194, 9, 26, 0),
(195, 4, 26, 1),
(196, 5, 27, 1),
(197, 8, 27, 0),
(198, 9, 27, 1),
(199, 1, 27, 0),
(200, 6, 27, 1),
(201, 7, 27, 0),
(202, 4, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d2_ssa_scores`
--

CREATE TABLE `d2_ssa_scores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `game_clock` int(10) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `match_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2_ssa_scores`
--

INSERT INTO `d2_ssa_scores` (`id`, `nickname`, `game_clock`, `score`, `date`, `match_id`, `user_id`) VALUES
(1, 'Hege', 12, 3, '2020-06-30', 15, 1),
(2, 'Hege', 12, 3, '2020-06-30', 15, 1),
(3, 'Hege', 8, 3, '2020-06-30', 16, 1),
(4, 'Hegez', 6, 3, '2020-06-30', 18, 1),
(5, 'Ebin', 7, 3, '2020-06-30', 19, 1),
(6, 'Nick', 26, 5, '2020-06-30', 21, 4),
(7, 'Nick', 19, 4, '2020-06-30', 22, 4),
(8, 'Nick', 12, 4, '2020-06-30', 23, 4),
(9, 'Nick', 30, 4, '2020-06-30', 25, 4),
(10, 'Hege', 2090, 3, '2020-06-30', 20, 1),
(11, 'Apu', 9, 3, '2020-06-30', 26, 5),
(12, 'Hege', 12, 4, '2020-06-30', 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `d2_ssa_users`
--

CREATE TABLE `d2_ssa_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uniqid` varchar(23) NOT NULL,
  `avatar_set` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d2_ssa_users`
--

INSERT INTO `d2_ssa_users` (`id`, `uniqid`, `avatar_set`) VALUES
(1, '5efaf2361cc1d', 1),
(2, '5efb6b3f0aa3c', 0),
(3, '5efb6b3f56d71', 0),
(4, '5efb788bba348', 1),
(5, '5efb7d99e3077', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d2_ssa_matches`
--
ALTER TABLE `d2_ssa_matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `d2_ssa_moves`
--
ALTER TABLE `d2_ssa_moves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`);

--
-- Indexes for table `d2_ssa_scores`
--
ALTER TABLE `d2_ssa_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `match_id` (`match_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `d2_ssa_users`
--
ALTER TABLE `d2_ssa_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d2_ssa_matches`
--
ALTER TABLE `d2_ssa_matches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `d2_ssa_moves`
--
ALTER TABLE `d2_ssa_moves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `d2_ssa_scores`
--
ALTER TABLE `d2_ssa_scores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `d2_ssa_users`
--
ALTER TABLE `d2_ssa_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d2_ssa_matches`
--
ALTER TABLE `d2_ssa_matches`
  ADD CONSTRAINT `d2_ssa_matches_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `d2_ssa_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `d2_ssa_moves`
--
ALTER TABLE `d2_ssa_moves`
  ADD CONSTRAINT `d2_ssa_moves_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `d2_ssa_matches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `d2_ssa_scores`
--
ALTER TABLE `d2_ssa_scores`
  ADD CONSTRAINT `d2_ssa_scores_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `d2_ssa_matches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `d2_ssa_scores_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `d2_ssa_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
