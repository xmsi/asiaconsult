-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 19, 2021 at 07:48 PM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asiaconsult`
--

-- --------------------------------------------------------

--
-- Table structure for table `boss_managers`
--

CREATE TABLE `boss_managers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filial_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `boss_managers`
--

INSERT INTO `boss_managers` (`id`, `user_id`, `filial_id`, `name`, `description`, `status`) VALUES
(1, 30, 1, 'awd adas w2', 'asd aw dawd awdawd wa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `currency`) VALUES
(1, 'Uzb', 'uzs'),
(2, 'asd1', 'uzs3'),
(3, 'asd', 'sadw'),
(4, 'asdasd', 'sadwawqe'),
(5, 'Russia', 'RUB'),
(6, 'Uzbekiston', 'UZS');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filials`
--

CREATE TABLE `filials` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `country` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filials`
--

INSERT INTO `filials` (`id`, `number`, `country`, `description`) VALUES
(1, 22, 'Tashkent', 'asdasdw asd awdasdaw2');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `boss_manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `description` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `boss_manager_id`, `user_id`, `name`, `phone`, `description`, `status`) VALUES
(4, 1, 38, 'wqd asdw q', 908878890, 'dwasd wad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `sms_code` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`id`, `phone`, `sms_code`, `status`) VALUES
(1, 903936449, '94070', 1),
(2, 903936447, '73450', 1),
(5, 999999999, '71195', 0),
(6, 992828282, '11437', 1),
(7, 324234235, '63522', 1),
(8, 323232323, '69439', 1),
(9, 399822, '48176', 1),
(10, 111111111, '78175', 1),
(11, 238888888, '94544', 1),
(12, 212414141, '42067', 1),
(13, 222222111, '86349', 1),
(14, 123555122, '89042', 1),
(15, 903936442, '29154', 1),
(16, 9037311, '97615', 1),
(17, 990029412, '39344', 0),
(18, 222214444, '27772', 1),
(19, 222235555, '82453', 1),
(20, 141515151, '88975', 1),
(21, 141515222, '67585', 1),
(22, 124151551, '61271', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'This is boss'),
(2, 'translator', 'Only for doc translates'),
(3, 'university', NULL),
(4, 'abiturient', 'Abiturient and student role'),
(5, 'manager', NULL),
(6, 'managers_boss', 'The boss of managers'),
(7, 'service_cheker', NULL),
(8, 'admin', 'Can add university specialities faculties');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(27, 4, 29),
(28, 6, 30),
(29, 4, 31),
(35, 4, 37),
(36, 5, 38),
(37, 4, 39),
(38, 4, 40),
(39, 4, 41),
(40, 4, 42),
(41, 7, 43),
(43, 4, 45),
(44, 4, 46),
(45, 4, 47),
(46, 4, 48),
(47, 4, 49),
(48, 4, 50),
(49, 4, 51),
(50, 4, 52),
(51, 4, 53),
(53, 4, 54),
(54, 4, 55),
(55, 8, 56),
(62, 3, 63),
(64, 3, 65);

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `contract` int(11) NOT NULL,
  `service_sum` int(11) NOT NULL,
  `service_sum_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contract_check` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `full_time` tinyint(1) NOT NULL DEFAULT 0,
  `part_time` tinyint(1) NOT NULL DEFAULT 0,
  `night_time` tinyint(1) NOT NULL DEFAULT 0,
  `weekend_time` tinyint(1) NOT NULL DEFAULT 0,
  `full_part` tinyint(1) NOT NULL DEFAULT 0,
  `night_11` tinyint(1) NOT NULL DEFAULT 0,
  `night_collage` tinyint(1) NOT NULL DEFAULT 0,
  `night_weekend_full` tinyint(1) NOT NULL DEFAULT 0,
  `night_weekend_part` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `second_name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `father_name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_where_info` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speciality_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `passport_id` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_date` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_iib` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_contract_file` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_contract_check` tinyint(1) NOT NULL DEFAULT 0,
  `service_date` date DEFAULT NULL,
  `passport` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diplom` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attestat` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zags` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_passport` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attestat_per` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zags_per` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_passport_per` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passport_per` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diplom_per` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perevod_status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university_pay` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university_pay_check` tinyint(1) NOT NULL DEFAULT 0,
  `entrance_ref` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university_contract` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` int(11) DEFAULT NULL,
  `docs_date` int(11) DEFAULT NULL,
  `perevod_date` int(11) DEFAULT NULL,
  `entrance_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `manager_id`, `phone`, `name`, `second_name`, `father_name`, `from_where_info`, `speciality_id`, `type`, `passport_id`, `passport_date`, `passport_iib`, `service_contract_file`, `service_contract_check`, `service_date`, `passport`, `diplom`, `attestat`, `zags`, `parent_passport`, `attestat_per`, `zags_per`, `parent_passport_per`, `passport_per`, `diplom_per`, `perevod_status`, `image`, `university_pay`, `university_pay_check`, `entrance_ref`, `university_contract`, `created_date`, `docs_date`, `perevod_date`, `entrance_date`) VALUES
(1, 1, NULL, 998863791, 'Bibo', 'Frik', 'asu', NULL, NULL, NULL, NULL, '12-12-2001', NULL, NULL, 0, NULL, 'PROUPGRADE.txt', 'LICENSE', NULL, NULL, NULL, NULL, NULL, NULL, '1student_passport_per_paynetlogo.png', '1student_diplom_per_payme6.png', 1, NULL, NULL, 0, '1entrance_ref_2.html', NULL, NULL, NULL, 1609516785, 1609665571),
(2, 1, NULL, 998863792, 'asw', 'KEEP', 'Calm', NULL, NULL, NULL, NULL, '12.12.2000', NULL, NULL, 0, NULL, 'wwww', 'wwww', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 29, NULL, 992828282, 'Dima', 'www', '111', 'Telegram', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1611313547, NULL, NULL, NULL),
(13, 31, NULL, 903936449, 'ss', 'awd', 'admin', 'Телевидение', NULL, 0, NULL, NULL, NULL, '19__1612796060dogovor (11).pdf', 1, '2021-02-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1611739214, NULL, NULL, NULL),
(15, 37, NULL, 323232323, 'adminwewe', 'ssewwe', 'adminwewe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1611899798, NULL, NULL, NULL),
(16, 39, 4, 399822, 'asd', 'adwdwa', 'adminww', 'Радио', NULL, 4, NULL, NULL, NULL, NULL, 0, '2021-02-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1612009282, NULL, NULL, NULL),
(17, 40, NULL, 238888888, 'qwe', 'dawd', 'qweqwew', 'Телевидение', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1612283321, NULL, NULL, NULL),
(18, 41, NULL, 212414141, 'qqqq', 'wwwwrq', 'sfsdf', 'Instagram', NULL, NULL, 'AQ2131232', '12.22.11', '34r2332r', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1612283536, NULL, NULL, NULL),
(19, 42, 4, 222222111, 'Vadim', 'Galigin', 'Baralovich', 'Радио', NULL, 2, 'AC2447871', '12.02.2000', 'France Brance Mana IIb', '19__1612796060dogovor (11).pdf', 1, '2021-02-12', '19__1612851030dogovor (6).pdf', '19__1612851030dogovor (4).pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1612598565, 1612851030, NULL, NULL),
(20, 45, NULL, 123555122, 'Barin', 'Keepa', 'Hanovich', 'Google', NULL, 2, 'AS0098879', '12.12.2001', 'France Brance Swww Mana IIb', '20__1613377684contract.jpg', 1, '2021-03-03', '20__1613377697contract.jpg', '20__1613377697dogovorlogo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '20student_passport_per_20__1613377697dogovorlogo.jpg', '20student_diplom_per_20__1613377684contract.jpg', 1, NULL, NULL, 0, '20entrance_ref_KAK_SKACHAT.txt', NULL, 1613375502, 1613377697, 1613378369, 1613378449),
(21, 46, NULL, 903936442, 'Bila', 'DWA', 'DWAf', 'Телевидение', NULL, 2, 'AQ2131232', '12.12.2001', 'France Brance Swww Mana IIb', '21__1613377870dogovorlogo.jpg', 0, '2021-02-18', '21__1613378004dogovorlogo.jpg', '21__1613378004contract.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1613377751, 1613378004, NULL, NULL),
(22, 47, NULL, 9037311, 'asdasd', 'awd', 'adw', 'Телевидение', NULL, NULL, 'AQ2131232', '12.22.11', 'sasd asdwa wad', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1613378039, NULL, NULL, NULL),
(23, 48, NULL, 17, 'adminqwe', 'wqe', 'qwe', 'Телевидение', NULL, 4, 'AQ2131232', '12.12.2001', 'France Brance Swww Mana IIb', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1613636392, NULL, NULL, NULL),
(24, 49, NULL, 222214444, '124', '155315', 'qwe', 'Телевидение', NULL, 4, 'AQ2131232', '12.12.2001', 'France Brance Mana IIb', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1613636848, NULL, NULL, NULL),
(25, 50, NULL, 222235555, 'wyr', 'wrywry', 'wrywrywry', 'Google', NULL, NULL, 'AP2828288', '12.12.2001', 'France Brance Swww Mana IIb', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1613810792, NULL, NULL, NULL),
(26, 52, NULL, 141515151, 'asd', 'www', 'qwe', 'Телевидение', NULL, NULL, 'AQ2131232', '12.12.2001', 'France Brance Swww Mana IIb', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, 1614146989, NULL, NULL, NULL),
(29, 54, NULL, 141515222, 'asd', 'www', 'qwe', 'Телевидение', NULL, 4, 'AQ2131232', '12.12.2001', 'France Brance Mana IIb', '29__1614402620icon_tessera.png', 1, '2021-02-25', '29__1614357502screen06.jpg', '29__1614357502screen04.jpg', NULL, '29__1614357502screen07.jpg', '29__1614357502screen05.jpg', '29student_attestat_per_2.jpg', '29student_zags_per_1.jpg', '29student_parent_passport_per_4.jpg', '29student_passport_per_insta.png', '29student_diplom_per_4.jpg', 1, '29__1614357502neyroset.jpg', '29__16145047769.jpg', 0, '29entrance_ref_9.jpg', '29university_contract_1.jpg', 1614147693, 1614357502, 1614400210, 1614414351),
(30, 55, NULL, 124151551, 'qwrtt', 'vwqrr', 'Keepovich', 'Google', NULL, 0, 'AQ2131232', '12.12.2001', 'France Brance Swww Mana IIb', '30__1614579094sckrip.jpeg', 1, '2021-03-01', '30__16145793139.jpg', '30__16145793131.jpg', NULL, '30__1614579313sckrip.jpeg', '30__1614579313uphoto7.png', '30student_attestat_per_4.jpg', '30student_zags_per_1.jpg', '30student_parent_passport_per_5.jpg', '30student_passport_per_insta.png', NULL, 1, '30__16145793134.jpg', '30__1614579546server.png', 0, '30entrance_ref_paynetlogo.png', '30university_contract_10.jpg', 1614577220, 1614579313, 1614579449, 1614579725);

-- --------------------------------------------------------

--
-- Table structure for table `univeristy`
--

CREATE TABLE `univeristy` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `deadline` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `univeristy`
--

INSERT INTO `univeristy` (`id`, `name`, `country_id`, `deadline`, `status`, `description`, `image`, `link`) VALUES
(14, 'qqq', 1, '1970-01-01', 1, 'qwe', NULL, NULL),
(16, '4444', 4, '1970-01-01', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `university_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `university_id`) VALUES
(1, 'admin', '$2y$10$BtQMpvg6MZk/PBTPJ7qgs.JK9v4uq4LvKxBUbQ///kF0STVGz2gK.', NULL),
(2, 'translator', '$2y$10$BtQMpvg6MZk/PBTPJ7qgs.JK9v4uq4LvKxBUbQ///kF0STVGz2gK.', NULL),
(29, '992828282', '$2y$10$prL4EVBkKM97iNoCKzkTs.XyRTB1xqtsbGyYuQO31tgSF9dkn7wjm', NULL),
(30, 'bossmanager', '$2y$10$4s7Zi1xtTBwoviyl0WuokOxoppxi8WtSE0V9y.A1V2kxhKePCuUG6', NULL),
(31, '903936449', '$2y$10$qtQ7XEdXKeF1M32TC8Xi9eW6CO8YSArEOMtHOJE2/b0oRjq/A7emK', NULL),
(37, '323232323', '$2y$10$BOZtJ5V.0D0BBj.BG8YzwOgdtnv5bDwV/L.mJSSdVNzVf.cz65uA.', NULL),
(38, 'manager', '$2y$10$GY.57fSB5hdHfDBgL.4diOZK4Je5BAWo8JRrmIKqRXcddroqvLw.C', NULL),
(39, '399822', '$2y$10$cxBgn65TTqJzqSEjtSFUaOYKrHEV2noRpReL9TOOPgUg/Nr9Njjze', NULL),
(40, '238888888', '$2y$10$.lqTRbYy.tAs9LsY0aYEjOCnGqCvyeRWPbKFaxUsKNkLacbdZkVAa', NULL),
(41, '212414141', '$2y$10$Eybm5K11fkpvuyS86VWTcu0tuL3KI1M0uP5VX/HC3RzdshKBKlxue', NULL),
(42, '222222111', '$2y$10$MTTBI0p8Cw28M49brZELJudkUNcfAP/DjphGO9WaGVOC6qKodiIyK', NULL),
(43, 'check', '$2y$10$L98XLfxuKMhOGUU9hJwNDOzcVK4iDf6IgsuyELkH721Owk0TQhaKG', NULL),
(45, '123555122', '$2y$10$g8wWa3.gbs5I3ejfVJJEy.FZ6tsptEd/RcYD0tVvf6aGXG1SbItMa', NULL),
(46, '903936442', '$2y$10$FSiXQuir8f8wf36mZUNml.wI2yuiwihbxtoi8ZG5aZtv599rflctu', NULL),
(47, '903737448', '$2y$10$eT4w3CvAQK/O7.Qfdlqu8OyvLtGTSsR2mdflegRYBoAEPbmmZDu/G', NULL),
(48, '17', '$2y$10$tYPU1azZ2uVvX3sdUrcxL.Fg2kfLXEPpMdP2jzfdR9pRBB/7q1XAW', NULL),
(49, '222214444', '$2y$10$yLjmoZhOV/jK7TrQX3QYMuabL6Xotp61sj6gQL5a3iZ14AccIAXTe', NULL),
(50, '222235555', '$2y$10$bUJ3u4cLUOeWpGzC0fuTeOMheAstODoS3GMaWxdU.xDuiDXlhSHy.', NULL),
(51, '141515151', '$2y$10$5T.o53us.LI171KCuaySvuAwT.X4WPgevvnbb8P0hQcmV.B4rQ5xO', NULL),
(52, '141515151', '$2y$10$n.WNnfc58RVEanrbPcooReqnvGiye4VfkOBuGpVnXSltu8i3Nat.2', NULL),
(53, '141515151', '$2y$10$i7em9/9nDWl8qOLKQT5MouueIVI/Nyig66WbvTxtimv5a0Q39Wwm.', NULL),
(54, '141515222', '$2y$10$98rasKcSb/cCH0vPsDEtTeQg02./Bgfof5jbfFRZA.nOk50UYGRLy', NULL),
(55, '124151551', '$2y$10$MwgCW9jE3gBQeJW2M198a.hGHibEk0bSosUFZDIAfDniaVGlot1ki', NULL),
(56, 'admin2', '$2y$10$BtQMpvg6MZk/PBTPJ7qgs.JK9v4uq4LvKxBUbQ///kF0STVGz2gK.', NULL),
(63, 'admin', '$2y$10$aF8LUctqHYpBrLOW5xdSH.bMtbCSCCL6xdGKi90fgKCBYen4N5w2y', 14),
(65, 'admin', '$2y$10$YiCYirz1i.gm/W5K3IAQ9ueLMSeAYGqUPa/oDo0frhl1YWmswJGkq', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boss_managers`
--
ALTER TABLE `boss_managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `filial_id` (`filial_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `univeristy_id` (`university_id`);

--
-- Indexes for table `filials`
--
ALTER TABLE `filials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `boss_manager_id` (`boss_manager_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `speciality_id` (`speciality_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `univeristy`
--
ALTER TABLE `univeristy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `university_id` (`university_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boss_managers`
--
ALTER TABLE `boss_managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `filials`
--
ALTER TABLE `filials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `univeristy`
--
ALTER TABLE `univeristy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boss_managers`
--
ALTER TABLE `boss_managers`
  ADD CONSTRAINT `boss_managers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `boss_managers_ibfk_2` FOREIGN KEY (`filial_id`) REFERENCES `filials` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `univeristy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`boss_manager_id`) REFERENCES `boss_managers` (`id`),
  ADD CONSTRAINT `managers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `speciality`
--
ALTER TABLE `speciality`
  ADD CONSTRAINT `speciality_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`manager_id`) REFERENCES `managers` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `univeristy`
--
ALTER TABLE `univeristy`
  ADD CONSTRAINT `univeristy_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `univeristy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
