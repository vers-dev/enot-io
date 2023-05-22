-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2023 at 02:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enot`
--

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int NOT NULL,
  `char_code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `int_code` int DEFAULT NULL,
  `units` int DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `char_code`, `int_code`, `units`, `name`, `currency`, `updated_at`) VALUES
(1, 'AUD', 36, 1, 'Австралийский доллар', '53.0788', '2023-05-22 23:27:01'),
(2, 'AZN', 944, 1, 'Азербайджанский манат', '47.0223', '2023-05-22 23:27:01'),
(3, 'AMD', 51, 100, 'Армянских драмов', '20.6606', '2023-05-22 23:27:01'),
(4, 'BYN', 933, 1, 'Белорусский рубль', '27.3264', '2023-05-22 23:27:01'),
(5, 'BGN', 975, 1, 'Болгарский лев', '44.1743', '2023-05-22 23:27:01'),
(6, 'BRL', 986, 1, 'Бразильский реал', '16.0341', '2023-05-22 23:27:01'),
(7, 'HUF', 348, 100, 'Венгерских форинтов', '23.0170', '2023-05-22 23:27:01'),
(8, 'KRW', 410, 1000, 'Вон Республики Корея', '60.6463', '2023-05-22 23:27:01'),
(9, 'VND', 704, 10000, 'Вьетнамских донгов', '33.7519', '2023-05-22 23:27:01'),
(10, 'HKD', 344, 1, 'Гонконгский доллар', '10.2327', '2023-05-22 23:27:01'),
(11, 'GEL', 981, 1, 'Грузинский лари', '31.5461', '2023-05-22 23:27:01'),
(12, 'DKK', 208, 1, 'Датская крона', '11.6231', '2023-05-22 23:27:01'),
(13, 'AED', 784, 1, 'Дирхам ОАЭ', '21.7684', '2023-05-22 23:27:01'),
(14, 'USD', 840, 1, 'Доллар США', '79.9379', '2023-05-22 23:27:01'),
(15, 'EUR', 978, 1, 'Евро', '86.4963', '2023-05-22 23:27:01'),
(16, 'EGP', 818, 10, 'Египетских фунтов', '25.8751', '2023-05-22 23:27:01'),
(17, 'INR', 356, 100, 'Индийских рупий', '97.1487', '2023-05-22 23:27:01'),
(18, 'IDR', 360, 10000, 'Индонезийских рупий', '53.5203', '2023-05-22 23:27:01'),
(19, 'KZT', 398, 100, 'Казахстанских тенге', '17.8309', '2023-05-22 23:27:01'),
(20, 'CAD', 124, 1, 'Канадский доллар', '59.2001', '2023-05-22 23:27:01'),
(21, 'QAR', 634, 1, 'Катарский риал', '21.9610', '2023-05-22 23:27:01'),
(22, 'KGS', 417, 100, 'Киргизских сомов', '91.3367', '2023-05-22 23:27:01'),
(23, 'CNY', 156, 1, 'Китайский юань', '11.3499', '2023-05-22 23:27:01'),
(24, 'MDL', 498, 10, 'Молдавских леев', '45.1466', '2023-05-22 23:27:01'),
(25, 'NZD', 554, 1, 'Новозеландский доллар', '50.1770', '2023-05-22 23:27:01'),
(26, 'TMT', 934, 1, 'Новый туркменский манат', '22.8394', '2023-05-22 23:27:01'),
(27, 'NOK', 578, 10, 'Норвежских крон', '73.4467', '2023-05-22 23:27:01'),
(28, 'PLN', 985, 1, 'Польский злотый', '19.1624', '2023-05-22 23:27:01'),
(29, 'RON', 946, 1, 'Румынский лей', '17.3733', '2023-05-22 23:27:01'),
(30, 'XDR', 960, 1, 'СДР (специальные права заимствования)', '106.7906', '2023-05-22 23:27:01'),
(31, 'RSD', 941, 100, 'Сербских динаров', '73.7556', '2023-05-22 23:27:01'),
(32, 'SGD', 702, 1, 'Сингапурский доллар', '59.4599', '2023-05-22 23:27:01'),
(33, 'TJS', 972, 10, 'Таджикских сомони', '73.2448', '2023-05-22 23:27:01'),
(34, 'THB', 764, 10, 'Таиландских батов', '23.2521', '2023-05-22 23:27:01'),
(35, 'TRY', 949, 10, 'Турецких лир', '40.4166', '2023-05-22 23:27:01'),
(36, 'UZS', 860, 10000, 'Узбекских сумов', '69.6435', '2023-05-22 23:27:01'),
(37, 'UAH', 980, 10, 'Украинских гривен', '21.6439', '2023-05-22 23:27:01'),
(38, 'GBP', 826, 1, 'Фунт стерлингов Соединенного королевства', '99.4108', '2023-05-22 23:27:01'),
(39, 'CZK', 203, 10, 'Чешских крон', '36.3701', '2023-05-22 23:27:01'),
(40, 'SEK', 752, 10, 'Шведских крон', '75.8791', '2023-05-22 23:27:01'),
(41, 'CHF', 756, 1, 'Швейцарский франк', '89.2463', '2023-05-22 23:27:01'),
(42, 'ZAR', 710, 10, 'Южноафриканских рэндов', '41.3946', '2023-05-22 23:27:01'),
(43, 'JPY', 392, 100, 'Японских иен', '58.0733', '2023-05-22 23:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `created_at`) VALUES
(1, 'avavion', '$2y$10$fp/wJ.UeqTn8/07yfrPW1uNk2ZYDD2HuEsTyY3eHvAMHGZcpZCQkC', 0, '2023-05-22 20:40:08'),
(2, 'eyevers', '$2y$10$6tfpKFwonF3Badx4TiIEWu5L1At1i9vf0GsPbrsY0rU26/yczAiDW', 0, '2023-05-22 20:46:02'),
(4, 'butman', '$2y$10$laPXyIcYqU1WSgt8dZ8u4uH3p47E0DG1kHS/9U/agEnQXV5JYKRjO', 0, '2023-05-22 20:50:22'),
(5, 'asdasda', '$2y$10$Hku0NxNZxBEiW0xoE3zhBuMh.k9HylN7.3PQrmUHDP.YHOVNaKblK', 0, '2023-05-22 20:50:56'),
(6, 'butman', '$2y$10$3fum79l4vivlaxndTBKKA.2Ssd9GkvSSo.WdfJI88nA8UKPCiIdWW', 0, '2023-05-22 21:07:46'),
(7, 'eyevers', '$2y$10$KxWSBwgIR3kibXvfIjb5PuA5Ryb1DrQbJ1TeTgZzRIc0FTZeMs3X2', 0, '2023-05-22 22:11:22'),
(8, 'eyeverss', '$2y$10$ZXaGb7X9qPcS722/3ryPxeSsd9vQAJoBL6LkRSDIE51rV1YV3JTF.', 0, '2023-05-22 22:31:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
