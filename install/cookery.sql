-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 18 2020 г., 14:46
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cookery`
--
CREATE DATABASE IF NOT EXISTS `cookery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cookery`;

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int NOT NULL,
  `namedishes` varchar(60) DEFAULT NULL,
  `composition` text,
  `volume` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `imgdishes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `namedishes`, `composition`, `volume`, `unit`, `imgdishes`) VALUES
(1, 'Блюдо1', 'Сomponent1, component2, component3, component4, component5', 150, 'г', 'dishes1.jpg'),
(2, 'Блюдо2', 'Component1, component2, component3', 10, 'шт', 'dishes2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `shoppingfacility` varchar(200) DEFAULT NULL,
  `namedishes` varchar(60) DEFAULT NULL,
  `totalvolume` int DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `imgdishes` varchar(100) DEFAULT NULL,
  `dishes_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `shoppingfacility`, `namedishes`, `totalvolume`, `unit`, `imgdishes`, `dishes_id`) VALUES
(1, 'Объект 1', 'Блюдо1', 150, 'г', 'dishes1.jpg', 1),
(2, 'Объект 2', 'Блюдо1', 150, 'г', 'dishes1.jpg', 1),
(3, 'Объект 3', 'Блюдо1', 300, 'г', 'dishes1.jpg', 1),
(4, 'Объект 4', 'Блюдо2', 40, 'шт', 'dishes2.jpg', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`dishes_id`),
  ADD KEY `fk_orders_dishes_idx` (`dishes_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_dishes` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
