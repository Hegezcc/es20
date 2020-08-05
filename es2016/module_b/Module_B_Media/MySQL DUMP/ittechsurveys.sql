-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 11:03 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `es2016`
--
CREATE DATABASE IF NOT EXISTS `es2016` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `es2016`;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `gender`, `role`) VALUES
(1, 'Billy Tucker', 'bill@ittech.com', 'M', 'CEO'),
(2, 'Jeanette White', 'white@ittech.com', 'F', 'Designer'),
(3, 'Natalie Lambert', 'lambert@ittech.com', 'F', 'Front End Develloper'),
(4, 'Yolanda Wright', 'yolanda@ittech.com', 'F', 'Back End Develloper'),
(5, 'Jennifer Moran', 'moran@ittech.com', 'F', 'Designer'),
(6, 'Taylor Wood', 'taylorwood@ittech.com', 'M', 'Programmer'),
(7, 'Loretta Bowen', 'bowen@ittech.com', 'F', 'Test Analist'),
(8, 'Allan Ellis', 'allanellis@ittech.com', 'M', 'Programmer'),
(9, 'Alan Fowler', 'fowler@ittech.com', 'M', 'PHP Develloper'),
(10, 'Martin Hopkins', 'hopkins@gmail.com', 'M', 'Intern'),
(11, 'Jonathan Barnes', 'jbarnes@ittech.com', 'M', 'Javascript Develloper'),
(12, 'Ellis Stone', 'ellis.stone@ittech.com', 'F', 'Programmer'),
(13, 'Adam Elliott Jr.', 'adamjr@ittech.com', 'M', 'System Analist'),
(14, 'Gail Fernandez', 'fernandez@ittech.com', 'F', 'Human Resources'),
(15, 'Christina Parker', 'parker@ittech.com', 'F', 'Human Resources'),
(16, 'Shelia Green', 'green@ittech.com', 'F', 'Designer'),
(17, 'Megan Davis', 'megandavis@ittech.com', 'F', 'Programmer'),
(18, 'Cary Hammond ', 'cary@ittech.com', 'F', 'Intern'),
(19, 'Stacy Wallace', 'wallace@ittech.com', 'M', 'Art Director'),
(20, 'Derek Perkins', 'perkins@ittech.com', 'M', 'Engenieer'),
(21, 'Terrance Scott Williams', 'scottwilliams@ittech.com', 'M', 'Intern'),
(22, 'Lena Adams', 'lenaadams@ittech.com', 'F', 'Develloper'),
(23, 'Sue Roberson', 'sroberson@ittech.com', 'F', 'Designer'),
(24, 'Lowell Simpson', 'simpson@ittech.com', 'F', 'Engenieer'),
(25, 'Belinda Singleton', 'singleton@ittech.com', 'F', 'Intern'),
(26, 'Owen Burke', 'burke@ittech.com', 'M', 'System Analist'),
(27, 'Santos Keller', 'santos@ittech.com', 'M', 'Programmer'),
(28, 'Marcelo Strehl', 'marcelo.strehl@al.senai.br', 'M', 'Board Director'),
(29, 'Dewey Ross', 'ross@ittech.com', 'F', 'Board Director'),
(30, 'Nina Wong', 'ninawong@ittech.com', 'F', 'Manager Acount'),
(31, 'Verna Hoffman', 'vernahoff@gmail.com', 'F', 'Intern'),
(32, 'Jeffrey Love', 'love@ittech.com', 'M', 'Programmer'),
(33, 'Emilio Johnston', 'emilio@ittech.com', 'M', 'Programmer'),
(34, 'Eula Myers', 'eula@ittech.com', 'F', 'Programmer'),
(35, 'Eleanor Craig', 'ecraig@ittech.com', 'F', 'Database analist'),
(36, 'Harvey Williams ', 'harley@ittech.com', 'M', 'Information Analist'),
(37, 'Chelsea Gill ', 'chelseagill@gmail.com', 'F', 'Board Director'),
(38, 'Emma Roberts', 'emmaroberts@ittech.com', 'F', 'Database Analist'),
(39, 'Dallas Grant', 'dallas@ittech.com', 'M', 'System Analist'),
(40, 'Marian Hicks', 'mhicks@gmail.com', 'F', 'Programmer');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `companyName`, `country`) VALUES
(1, 'Microsoft', 'USA'),
(2, 'Google', 'USA'),
(3, 'SENAI', 'Brazil'),
(4, 'Teraki', 'Japan'),
(5, 'Toyota', 'Japan'),
(6, 'Oracle', 'USA'),
(7, 'Mozilla Foundation', 'USA'),
(8, 'Ford', 'USA'),
(9, 'Spotify', 'Sweden'),
(10, 'Honda', 'Japan');

-- --------------------------------------------------------

--
-- Table structure for table `partners_employees`
--

DROP TABLE IF EXISTS `partners_employees`;
CREATE TABLE IF NOT EXISTS `partners_employees` (
  `employees_id` int(11) NOT NULL,
  `partners_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partners_employees`
--

INSERT INTO `partners_employees` (`employees_id`, `partners_id`, `start_date`, `end_date`, `role`) VALUES
(2, 4, '2010-10-26', NULL, 'Designer'),
(3, 8, '2012-03-25', NULL, 'Front End Develloper'),
(4, 6, '2011-12-26', NULL, 'Back End Develloper'),
(5, 1, '2012-04-17', NULL, 'Designer'),
(6, 1, '2011-06-03', NULL, 'Programmer'),
(7, 3, '2012-02-18', NULL, 'Test Analist'),
(8, 9, '2011-08-23', NULL, 'Programmer'),
(9, 10, '2011-01-22', NULL, 'PHP Develloper'),
(10, 3, '2010-11-04', NULL, 'Intern'),
(11, 6, '2010-11-24', NULL, 'Javascript Develloper'),
(12, 6, '2011-03-30', NULL, 'Programmer'),
(13, 6, '2010-10-20', NULL, 'System Analist'),
(14, 7, '2011-11-25', NULL, 'Human Resources'),
(15, 4, '2011-09-03', NULL, 'Human Resources'),
(16, 5, '2010-11-09', NULL, 'Designer'),
(17, 6, '2011-09-11', NULL, 'Programmer'),
(18, 4, '2010-06-29', NULL, 'Intern'),
(19, 7, '2011-09-21', NULL, 'Art Director'),
(20, 2, '2010-08-22', NULL, 'Engenieer'),
(21, 1, '2011-03-30', NULL, 'Intern'),
(22, 5, '2011-10-21', NULL, 'Develloper'),
(23, 6, '2010-08-28', NULL, 'Designer'),
(24, 2, '2010-07-19', NULL, 'Engenieer'),
(25, 8, '2012-01-09', NULL, 'Intern'),
(26, 10, '2010-05-23', NULL, 'System Analist'),
(27, 8, '2011-10-27', NULL, 'Programmer'),
(28, 4, '2012-01-30', NULL, 'Board Director'),
(29, 8, '2011-11-21', NULL, 'Board Director'),
(30, 9, '2011-12-14', NULL, 'Manager Acount'),
(31, 8, '2011-04-13', NULL, 'Intern'),
(32, 1, '2010-10-12', NULL, 'Programmer'),
(33, 4, '2011-01-30', NULL, 'Programmer'),
(34, 6, '2010-05-11', NULL, 'Programmer'),
(35, 9, '2011-11-29', NULL, 'Database analist'),
(36, 3, '2010-08-20', NULL, 'Information Analist'),
(37, 1, '2010-10-21', NULL, 'Board Director'),
(38, 1, '2011-03-31', NULL, 'Database Analist'),
(39, 1, '2010-08-28', NULL, 'System Analist'),
(40, 7, '2011-03-04', NULL, 'Programmer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners_employees`
--
ALTER TABLE `partners_employees`
  ADD KEY `employees_id` (`employees_id`), ADD KEY `partners_id` (`partners_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `partners_employees`
--
ALTER TABLE `partners_employees`
ADD CONSTRAINT `partners_employees_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `partners_employees_ibfk_2` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
