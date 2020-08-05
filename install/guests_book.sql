-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2020 г., 20:26
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.4.5
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- База данных: `guests_book`
--
CREATE DATABASE IF NOT EXISTS `guests_book` DEFAULT CHARACTER SET utf16 COLLATE utf16_bin;
USE `guests_book`;
-- --------------------------------------------------------
--
-- Структура таблицы `group`
--
CREATE TABLE `group` (
  `id` int(11) NOT NULL COMMENT '№',
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Имя',
  `cod` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Код'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Дамп данных таблицы `group`
--
INSERT INTO `group` (`id`, `name`, `cod`)
VALUES (1, 'Администратор', 'admin'),
  (2, 'Пользователь', 'user');
-- --------------------------------------------------------
--
-- Структура таблицы `guestbook`
--
CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL COMMENT '№',
  `text` text COLLATE utf16_bin NOT NULL COMMENT 'Текст',
  `phonenumber` varchar(50) COLLATE utf16_bin NOT NULL COMMENT 'Телефон',
  `email` varchar(50) COLLATE utf16_bin NOT NULL COMMENT 'Почта',
  `name` varchar(50) COLLATE utf16_bin NOT NULL COMMENT 'Имя'
) ENGINE = InnoDB DEFAULT CHARSET = utf16 COLLATE = utf16_bin;
--
-- Дамп данных таблицы `guestbook`
--
INSERT INTO `guestbook` (`id`, `text`, `phonenumber`, `email`, `name`)
VALUES (1, 'aaa', 'dd', 'ff@mail.ru', 'dd');
-- --------------------------------------------------------
--
-- Структура таблицы `phonebook`
--
CREATE TABLE `phonebook` (
  `id` int(11) NOT NULL COMMENT '№',
  `phone` varchar(50) COLLATE utf16_bin NOT NULL COMMENT 'Телефон',
  `adress` varchar(100) COLLATE utf16_bin NOT NULL COMMENT 'Адрес',
  `name` varchar(60) COLLATE utf16_bin NOT NULL COMMENT 'Имя'
) ENGINE = InnoDB DEFAULT CHARSET = utf16 COLLATE = utf16_bin;
--
-- Дамп данных таблицы `phonebook`
--
INSERT INTO `phonebook` (`id`, `phone`, `adress`, `name`)
VALUES (1, '1234567', 'number', 'Petya'),
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
  `id` int(11) NOT NULL COMMENT '№',
  `login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пользователь',
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Пароль',
  `group_id` int(11) NOT NULL COMMENT 'Группа',
  `FIO` varchar(150) NOT NULL COMMENT 'ФИО'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Дамп данных таблицы `users`
--
INSERT INTO `users` (`id`, `login`, `password`, `group_id`, `FIO`)
VALUES (
    2,
    'Pavel',
    '929ccc52e633a637f8bf60e98ffc4b1f',
    1,
    'БОНДАРЕНКО ПАВЕЛ ВЛАДИМИРОВИЧ'
  ),
  (
    3,
    'Vasya',
    '2836a7191f6a9e2455b763469ca4ec6d',
    2,
    'ПУПКИН ВАСИЛИЙ'
  ),
  (
    4,
    'Ivan',
    '432f45b44c432414d2f97df0e5743818',
    1,
    'Иванов Иван Иванович'
  ),
  (
    5,
    'Peter',
    '2b7c0e435a43e9c7453c8063b1ac2358',
    1,
    'Петров Петр Петрович'
  ),
  (
    6,
    'Sidorov',
    '2836a7191f6a9e2455b763469ca4ec6d',
    1,
    'Сидоров'
  );
--
-- Индексы сохранённых таблиц
--
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
-- AUTO_INCREMENT для таблицы `group`
--
ALTER TABLE `group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№',
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT для таблицы `guestbook`
--
ALTER TABLE `guestbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№',
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT для таблицы `phonebook`
--
ALTER TABLE `phonebook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№',
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '№',
  AUTO_INCREMENT = 30;
--
-- Ограничения внешнего ключа сохраненных таблиц
--
--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;