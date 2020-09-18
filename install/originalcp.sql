-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 18 2020 г., 17:58
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
  `statusdish` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Статус блюда',
  `composition` text CHARACTER SET utf8 COLLATE utf8_general_ci COMMENT 'Состав',
  `volume` int DEFAULT NULL COMMENT 'Объём порции',
  `unit` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Ед.изм.',
  `imgdishes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Изображение блюда',
  `price` float DEFAULT NULL COMMENT 'Цена, руб.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`id`, `namedishes`, `statusdish`, `composition`, `volume`, `unit`, `imgdishes`, `price`) VALUES
(1, 'Блюдо1', 'Актуально', 'Сomponent1, component2, component3, component4, component5', 40, 'г', 'intro3.jpg', 2),
(2, 'Блюдо2', 'Актуально', 'Component1, component2, component3, component4', 10, 'шт', 'bliny.jpg', 3),
(7, 'Блюдо 7', 'Актуально', 'без состава', 7, 'кг', 'losos.jpg', 4),
(8, 'Блюдо 8', 'Актуально', 'Component1', 1, 'кг', 'intro3.jpg', 3.5),
(9, 'Блюдо 9', 'Не актуально', 'без состава', 3, 'кг', '', 3),
(10, 'Блюдо 10', 'Не актуально', 'Сomponent1, component2, component3, component4, component5', 1, 'шт', 'salat.jpg', 2.5),
(11, 'Блюдо под заказ', 'Не актуально', 'без состава', 1, 'кг', 'mjaso.jpg', 30.4),
(14, 'Блюдо 17', 'Не актуально', 'под заказ', 1500, 'г', 'losos.jpg', 1.1);

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
(10, 30, 2, 1, '2020-09-13 09:50:34', 'Изменён(Ожидание)'),
(11, 49, 9, 10, '2020-09-06 20:32:00', 'Ожидание'),
(12, 50, 1, 15, '2020-09-15 20:49:11', 'Отменён'),
(14, 30, 7, 10, '2020-09-13 09:54:44', 'Изменён(Ожидание)'),
(15, 30, 1, 3, '2020-09-03 22:31:00', 'Ожидание'),
(16, 30, 1, 10, '2020-09-03 22:32:00', 'Ожидание'),
(18, 51, 10, 2, '2020-09-06 09:14:00', 'Ожидание'),
(20, 30, 1, 2, '2020-09-06 00:00:00', 'Отменён'),
(21, 30, 1, 2, '2020-09-06 10:42:54', 'Отменён'),
(23, 51, 10, 4, '2020-09-06 18:54:00', '2'),
(24, 51, 2, 2, '2020-09-06 19:19:11', 'Отменён'),
(27, 30, 1, 300, '2020-09-03 01:01:01', 'Ожидание'),
(28, 49, 8, 1, '2020-09-10 18:07:36', 'Отменён'),
(29, 49, 2, 1, '2020-09-10 18:07:52', 'Ожидание'),
(30, 49, 14, 1, '2020-09-10 18:33:33', 'Отменён'),
(31, 49, 7, 1, '2020-09-12 09:07:14', 'Отменён'),
(32, 49, 7, 1, '2020-09-12 09:09:01', 'Ожидание'),
(33, 50, 8, 2, '2020-09-15 21:02:22', 'Отменён'),
(34, 50, 7, 1, '2020-09-15 21:03:51', 'Отменён'),
(35, 58, 1, 3, '2020-09-17 12:59:56', 'Изменён(Ожидание)'),
(36, 58, 2, 1, '2020-09-17 12:59:21', 'Готово'),
(37, 30, 2, 1, '2020-09-18 14:22:26', 'Ожидание');

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
(54, 'Petr', '', 'K.K', 'spawn@mail.ru', 2),
(55, 'Объект3', '3', 'Ж.K', '', 2),
(56, 'Егор123', '123', 'И.П', 'asd@mail.ru', 2),
(58, 'Объект4', '4', 'П.П', '', 3);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT '№', AUTO_INCREMENT=59;

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
