-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 08 2020 г., 18:10
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
(1, 'Блюдо1', 'Сomponent1, component2, component3, component4, component5', 40, 'г', 'intro3.jpg'),
(2, 'Блюдо2', 'Component1, component2, component3, component4', 10, 'шт', 'bliny.jpg'),
(7, 'Блюдо 777888', '777', 77, 'кг', 'kurinyekotlety.jpg'),
(8, 'Блюдо 8', 'Component1', 1, 'кг', 'intro2.jpg'),
(9, 'Блюдо 9', 'без состава', 3, 'кг', 'sup.jpg'),
(10, 'Блюдо 10', 'Сomponent1, component2, component3, component4, component5', 1, 'шт', 'salat.jpg'),
(11, 'Блюдо под заказ', 'без состава', 1, 'кг', 'salat2.jpg');

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
(2, 'Посетитель', 'user'),
(3, 'Менеджер торгового объекта', 'manager');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL COMMENT '№',
  `users_id` int NOT NULL COMMENT 'ФИО заказчика',
  `dishes_id` int NOT NULL COMMENT 'Заказанное\r\nблюдо',
  `count` int DEFAULT NULL COMMENT 'Количество блюд',
  `date` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата заказа',
  `status` varchar(60) NOT NULL COMMENT 'Статус заказа'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `dishes_id`, `count`, `date`, `status`) VALUES
(10, 30, 1, 5, '2020-09-03 22:27:00', 'Ожидание'),
(11, 49, 9, 10, '2020-09-06 20:32:00', 'Ожидание'),
(12, 50, 1, 15, '2020-09-02 12:43:00', 'Ожидание'),
(14, 30, 2, 3, '2020-09-03 10:03:00', 'Ожидание'),
(15, 30, 1, 3, '2020-09-03 22:31:00', 'Ожидание'),
(16, 30, 1, 10, '2020-09-03 22:32:00', 'Ожидание'),
(17, 51, 11, 3, '2020-09-04 08:10:00', 'Ожидание'),
(18, 51, 10, 2, '2020-09-06 09:14:00', 'Ожидание'),
(19, 30, 11, 2, '2020-09-02 12:43:00', 'Отменён'),
(20, 30, 1, 2, '2020-09-06 00:00:00', 'Отменён'),
(21, 30, 1, 2, '2020-09-06 10:42:54', 'Отменён'),
(23, 51, 10, 4, '2020-09-06 18:54:00', '2'),
(24, 51, 2, 2, '2020-09-06 19:19:11', 'Отменён');

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
(30, 'Босс', '1234', 'Юрий Юрьевич', '', 1),
(49, 'Объект1', '1', 'Евгений А.А.', '', 3),
(50, 'Объект2', '2', 'Артём В.В.', '', 3),
(51, 'roma', '17', 'С.Ф.', 'o@gmail.com', 2),
(54, 'Petr', '', 'K.K', 'spawn@mail.ru', 2);

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
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`dishes_id`),
  ADD KEY `fk_orders_dishes_idx` (`dishes_id`),
  ADD KEY `users_id` (`users_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=55;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_dishes` FOREIGN KEY (`dishes_id`) REFERENCES `dishes` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
