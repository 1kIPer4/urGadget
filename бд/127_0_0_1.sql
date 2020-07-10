-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 22 2020 г., 11:35
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `urgadget`
--
CREATE DATABASE IF NOT EXISTS `urgadget` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `urgadget`;

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `img`, `category_id`) VALUES
(1, 'Xiaomi Redmi 7 Note 332GB', 1),
(2, '7 note(2)', 1),
(3, '7 note(3)', 1),
(4, '7 note(4)', 1),
(5, '7 note(5)', 1),
(6, 'Xiaomi Mi A2 Lite 364GB', 2),
(7, 'redmi a2(2)', 2),
(8, 'redmi a2(3)', 2),
(9, 'redmi a2(4)', 2),
(10, 'redmi a2(5)', 2),
(11, 'Asus Zenfone Max M2464', 3),
(12, 'max m2(2)', 3),
(13, 'max m2(3)', 3),
(14, 'max m2(4)', 3),
(15, 'max m2(5)', 3),
(16, 'Samsung galaxy s8 464GB', 4),
(17, 'SamxungGalaxyS8(2)', 4),
(18, 'SamxungGalaxyS8(3)', 4),
(19, 'SamxungGalaxyS8(4)', 4),
(20, 'SamxungGalaxyS8(5)', 4),
(21, 'Xiaomi Redmi 6A 216GB', 5),
(22, '6a(2)', 5),
(23, '6a(3)', 5),
(24, '6a(4)', 5),
(25, '6a(5)', 5),
(26, 'Samsung Galaxy A70 6128GB', 6),
(27, 'galaxy70(2)', 6),
(28, 'galaxy70(3)', 6),
(29, 'galaxy70(4)', 6),
(30, 'galaxy70(5)', 6),
(31, 'iPhone Xr 364GB', 7),
(32, 'xr(2)', 7),
(33, 'xr(3)', 7),
(34, 'xr(4)', 7),
(35, 'xr(5)', 7),
(36, 'Xiaomi Redmi Note 8 Pro 664GB', 8),
(37, 'note8pro(2)', 8),
(38, 'note8pro(3)', 8),
(39, 'note8pro(4)', 8),
(40, 'note8pro(5)', 8),
(41, 'Asus Zenfone Max Pro M2 464GB', 9),
(42, 'max pro m2(2)', 9),
(43, 'max pro m2(3)', 9),
(44, 'max pro m2(4)', 9),
(45, 'max pro m2(5)', 9),
(46, 'Iphone 11 Pro 6128GB', 10),
(47, 'iphone 11(2)', 10),
(48, 'iphone 11(3)', 10),
(49, 'iphone 11(4)', 10),
(50, 'iphone 11(5)', 10),
(51, 'Samsung galaxy s10e 6128GB', 11),
(52, 's10e(2)', 11),
(53, 's10e(3)', 11),
(54, 's10e(4)', 11),
(55, 's10e(5)', 11),
(56, 'Asus Zenfone 5 6128GB', 12),
(57, 'asus zenfone 5(2)', 12),
(58, 'asus zenfone 5(3)', 12),
(59, 'asus zenfone 5(4)', 12),
(60, 'asus zenfone 5(5)', 12);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) UNSIGNED DEFAULT NULL,
  `discount` int(11) UNSIGNED DEFAULT NULL,
  `firm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagonal` double DEFAULT NULL,
  `ram` int(11) UNSIGNED DEFAULT NULL,
  `screen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` int(11) UNSIGNED DEFAULT NULL,
  `count` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `discount`, `firm`, `diagonal`, `ram`, `screen`, `cpu`, `count`) VALUES
(1, 'Xiaomi Redmi 7 Note 3/32GB', 'Xiaomi Redmi 7 Note 332GB', 15990, 50, 'Xiaomi', 5.8, 2, '1280x720', 8, 130),
(2, 'Xiaomi Mi A2 Lite 3/64GB', 'Xiaomi Mi A2 Lite 364GB', 11990, 40, 'Xiaomi', 5.8, 2, '1440x900', 8, 210),
(3, 'Asus Zenfone Max M24/64', 'Asus Zenfone Max M2464', 12990, 40, 'Asus', 6.1, 4, '1440x900', 4, 260),
(4, 'Samsung galaxy s8 4/64GB', 'Samsung galaxy s8 464GB', 39990, 60, 'Samsung', 5.5, 4, '1920x1080', 8, 120),
(5, 'Xiaomi Redmi 6A 2/16GB', 'Xiaomi Redmi 6A 216GB', 9990, 30, 'Xiaomi', 6.1, 2, '1280x720', 2, 280),
(6, 'Samsung Galaxy A70 6/128GB', 'Samsung Galaxy A70 6128GB', 36990, 30, 'Samsung', 6.1, 6, '1920x1080', 4, 150),
(7, 'iPhone Xr 3/64GB', 'iPhone Xr 364GB', 49990, 20, 'Apple', 6.3, 2, '1920x1080', 8, 70),
(8, 'Xiaomi Redmi Note 8 Pro 6/64GB', 'Xiaomi Redmi Note 8 Pro 664GB', 24990, 30, 'Xiaomi', 6.1, 4, '1440x900', 4, 310),
(9, 'Asus Zenfone Max Pro M2 4/64GB', 'Asus Zenfone Max Pro M2 464GB', 15990, 20, 'Asus', 6.3, 4, '1440X900', 8, 140),
(10, 'Iphone 11 Pro 6/128GB', 'Iphone 11 Pro 6128GB', 94990, 30, 'Apple', 6.1, 6, '2560x1080', 16, 30),
(11, 'Samsung galaxy s10e 6/128GB', 'Samsung galaxy s10e 6128GB', 46990, 30, 'Samsung', 6.1, 6, '1920x1080', 8, 145),
(12, 'Asus Zenfone 5 6/128GB', 'Asus Zenfone 5 6128GB', 24990, 30, 'Asus', 6.3, 4, '2560x1080', 16, 120);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'urGadget@gmail.com', '$2y$10$aKP5k455WKBcO3PhyiN9weUhU6tCBvIAesAMTkH0THyMgU0FZtBY6');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
