-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 27 2020 г., 07:05
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
-- База данных: `originalcp`
--
CREATE DATABASE IF NOT EXISTS `originalcp` DEFAULT CHARACTER SET utf16 COLLATE utf16_bin;
USE `originalcp`;

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `id` int NOT NULL COMMENT '№',
  `namedishes` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Название блюда',
  `composition` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Состав',
  `volume` int DEFAULT NULL COMMENT 'Объём порции',
  `unit` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Ед.изм.',
  `imgdishes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Изображение блюда'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `namedishes`, `composition`, `volume`, `unit`, `imgdishes`) VALUES
(1, 'Блюдо1', 'Сomponent1, component2, component3, component4, component5', 150, 'г', 'dishes1.jpg'),
(2, 'Блюдо2', 'Component1, component2, component3, component4', 10, 'шт', 'dishes2.jpg'),
(6, 'Блюдо 6', 'без состава', 3, 'г', 'intro4.jpg'),
(7, 'Блюдо 777', '777', 77, 'кг', 'losos.jpg'),
(8, 'Блюдо 8', 'Component1', 1, 'кг', 'intro2.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `group`
--

CREATE TABLE `group` (
  `id` int NOT NULL COMMENT '№',
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `cod` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Код'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `group`
--

INSERT INTO `group` (`id`, `name`, `cod`) VALUES
(1, 'Администратор', 'admin'),
(2, 'Пользователь', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int NOT NULL COMMENT '№',
  `text` text CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Текст',
  `phonenumber` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Телефон',
  `email` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Почта',
  `name` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Имя'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Дамп данных таблицы `guestbook`
--

INSERT INTO `guestbook` (`id`, `text`, `phonenumber`, `email`, `name`) VALUES
(1, 'aaa', 'dd', 'ff@mail.ru', 'dd');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL COMMENT '№',
  `shoppingfacility` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Торговый объект',
  `namedishes` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Название блюда',
  `totalvolume` int DEFAULT NULL COMMENT 'Итого заказанной порции',
  `unit` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'ед. изм.',
  `imgdishes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Изображение блюда',
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

-- --------------------------------------------------------

--
-- Структура таблицы `phonebook`
--

CREATE TABLE `phonebook` (
  `id` int NOT NULL COMMENT '№',
  `phone` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Телефон',
  `adress` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Адрес',
  `name` varchar(60) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL COMMENT 'Имя'
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Дамп данных таблицы `phonebook`
--

INSERT INTO `phonebook` (`id`, `phone`, `adress`, `name`) VALUES
(1, '1234567', 'number', 'Petya'),
(2, '7654321', 'number', 'Nick'),
(3, '22222', 'numb', 'Name'),
(4, '333333', 'ggggg', 'fffff'),
(5, '33333', 'street', 'Mike'),
(6, '3', 'f', 'e'),
(7, '', '', ''),
(8, '1234567', 'adress', 'name');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL COMMENT '№',
  `login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пользователь',
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль',
  `FIO` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ФИО',
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Почта',
  `group_id` int NOT NULL COMMENT 'Группа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `FIO`, `email`, `group_id`) VALUES
(30, 'Юрий', '1234', 'Юрий Юрьевич', '', 1),
(32, 'Вася', '82c183954382732cb37cb1e215581c4f', 'Иваныч', '', 2),
(41, 'Юрийq', '58501efddbd0bce632f5f88b9c6eac9e', 'Юрьевич', 'yurkesson@m', 2),
(43, 'spawn5194', '2b7c0e435a43e9c7453c8063b1ac2358', 'Валерич', '', 2),
(44, 'Евгений', 'fe73086fcc28f348eaa4c51e7cffef9a', 'Иван Иванович', 'yurysviridenko@gmail.com', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`dishes_id`),
  ADD KEY `fk_orders_dishes_idx` (`dishes_id`);

--
-- Индексы таблицы `phonebook`
--
ALTER TABLE `phonebook`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `phonebook`
--
ALTER TABLE `phonebook`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_dishes` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
