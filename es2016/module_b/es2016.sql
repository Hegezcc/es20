-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 04:22 PM
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
-- Database: `es2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fill_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `fill_id`, `question_id`) VALUES
(1, 'ebin', 1, 6),
(2, 'ebin', 2, 6),
(3, 'asdf', 3, 4),
(4, 'asdf', 3, 5),
(5, 'Aika jees', 4, 1),
(6, 'ei', 4, 2),
(7, '13', 4, 3),
(8, 'Aika jees', 5, 1),
(9, 'ei', 5, 2),
(10, '2322', 5, 3),
(11, 'Juuh elikkäs', 6, 1),
(12, 'kyllä', 6, 2),
(13, '22', 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fills`
--

CREATE TABLE `fills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fills`
--

INSERT INTO `fills` (`id`, `created_at`, `updated_at`, `ip_address`, `survey_id`, `employee_id`) VALUES
(1, '2020-08-06 09:54:58', '2020-08-06 09:54:58', '::1', 3, NULL),
(2, '2020-08-06 09:55:10', '2020-08-06 09:55:10', '::1', 3, NULL),
(3, '2020-08-06 09:55:44', '2020-08-06 09:55:44', '::1', 2, NULL),
(4, '2020-08-06 09:56:19', '2020-08-06 09:56:19', '::1', 1, NULL),
(5, '2020-08-06 10:15:10', '2020-08-06 10:15:10', '::1', 1, NULL),
(6, '2020-08-06 10:15:17', '2020-08-06 10:15:17', '::1', 1, NULL);

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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_08_06_061959_import_db_dump', 1),
(3, '2020_08_06_062740_create_surveys_table', 1),
(4, '2020_08_06_062753_create_questions_table', 1),
(5, '2020_08_06_062806_create_fills_table', 1),
(6, '2020_08_06_062847_create_answers_table', 1),
(7, '2020_08_06_065150_create_survey_accesses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `partners_employees` (
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

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `survey_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `type`, `options`, `survey_id`) VALUES
(1, 'Hyvä kyssäri', 'text', NULL, 1),
(2, 'Jooh', 'option', 'kyllä|ei', 1),
(3, 'Montako', 'number', NULL, 1),
(4, 'Tekstikysymys', 'text', NULL, 2),
(5, 'Kyllä vai ei?', 'option', 'test|asdf', 2),
(6, 'Hyvä kyssäri sieltä', 'text', NULL, 3),
(7, 'Hyvä kyssäri', 'text', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `identification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `description`, `type`, `start_date`, `end_date`, `identification`, `password`, `file`) VALUES
(1, 'asdf', 'asdf', 'restricted', '2020-07-30', '2020-08-29', 'identti', '$2y$10$pAb9ufwNt9YeK6f7HhjlS.iUgEzz9I9sLJu5NRbdh8ApPuK.OFrZK', 'public/smxmgUlBs99yvleoi8ewjTjpr5KoHBXfM6oiCUzw.png'),
(2, 'jooh', 'asdf', 'restricted', '2020-07-30', '2020-08-28', 'asdf', '$2y$10$JoNtpOWOKACSlyEA/IwEd.L51cmKpADntF2jBsogSe9UUi1Zt2O9S', 'public/PSoyRmwAgrBhvueXMIFS7bIzh3m7MCyRdrJQlQoq.png'),
(3, 'Testi', NULL, 'public', '2020-08-02', '2020-08-28', 'asdf2', '$2y$10$d5V8jM4x9IK3qikhg1nobemdF7rofpeOGiOK3hj3uMeE3jBO.FDY6', 'public/vNhxSLX5kt6DZWCEnTUvnOJ4SqIuDH3xaH0Axthp.jpeg'),
(4, 'Testi', 'asdfjsaiodfj', 'restricted', '2020-08-05', '2020-08-25', 'testi', '$2y$10$eyWKcq3cahCP7DoD07B9e.cOiw0TQwKjnC9kMcmNFkoyMpWIuNzs6', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_accesses`
--

CREATE TABLE `survey_accesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `survey_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_accesses`
--

INSERT INTO `survey_accesses` (`id`, `survey_id`, `employee_id`) VALUES
(1, 1, 16),
(2, 1, 22),
(3, 1, 26),
(4, 2, 6),
(5, 2, 17),
(6, 4, 16),
(7, 4, 25),
(8, 4, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_fill_id_foreign` (`fill_id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fills`
--
ALTER TABLE `fills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fills_survey_id_foreign` (`survey_id`),
  ADD KEY `fills_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD KEY `employees_id` (`employees_id`),
  ADD KEY `partners_id` (`partners_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_survey_id_foreign` (`survey_id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `surveys_identification_unique` (`identification`);

--
-- Indexes for table `survey_accesses`
--
ALTER TABLE `survey_accesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_accesses_survey_id_foreign` (`survey_id`),
  ADD KEY `survey_accesses_employee_id_foreign` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fills`
--
ALTER TABLE `fills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `survey_accesses`
--
ALTER TABLE `survey_accesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_fill_id_foreign` FOREIGN KEY (`fill_id`) REFERENCES `fills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fills`
--
ALTER TABLE `fills`
  ADD CONSTRAINT `fills_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fills_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `partners_employees`
--
ALTER TABLE `partners_employees`
  ADD CONSTRAINT `partners_employees_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partners_employees_ibfk_2` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `survey_accesses`
--
ALTER TABLE `survey_accesses`
  ADD CONSTRAINT `survey_accesses_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `survey_accesses_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
