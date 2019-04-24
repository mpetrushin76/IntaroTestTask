-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 24 2019 г., 15:01
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `заявки`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_Name` varchar(150) NOT NULL,
  `Is_Admin` tinyint(1) NOT NULL,
  `user_password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`User_id`, `User_Name`, `Is_Admin`, `user_password`) VALUES
(1, 'Admin', 1, 'admin'),
(2, 'default_user', 0, '321123'),
(4, 'newUser', 0, '554433'),
(5, 'test', 0, 'testpass'),
(6, 'Max', 0, '123123123'),
(7, 'Maxim', 0, '123123123'),
(8, 'Maxim1', 0, '123123123'),
(10, 'ThisUser', 0, '123456'),
(11, 'kkkkkkk', 0, '123456');

-- --------------------------------------------------------

--
-- Структура таблицы `user_request`
--

CREATE TABLE `user_request` (
  `User_id` int(11) NOT NULL,
  `User_request_name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `user_request_ID` int(11) NOT NULL,
  `User_request_phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_request_comment` varchar(1000) NOT NULL,
  `user_request_image` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user_request`
--

INSERT INTO `user_request` (`User_id`, `User_request_name`, `user_request_ID`, `User_request_phone`, `user_request_comment`, `user_request_image`) VALUES
(2, 'Новая заявка', 1, '89192589532', 'Случайный комментарий', NULL),
(2, 'Новая заявка', 2, '89192589532', 'Случайный комментарий', NULL),
(1, 'Новая заявка', 3, '89192589532', 'Тут какой то левый текст', ''),
(1, 'Новая заявка', 4, '89192589532', 'Случайный комментарий', ''),
(2, 'Новая заявка', 5, '89192589532', 'Просто текст', ''),
(2, 'Новая заявка', 6, '89192589532', 'Случайный комментарий', 0x4d6f4764534243784a68632e6a7067),
(2, 'Поломка', 8, '89192589532', 'Случайный комментарий', ''),
(6, 'Новая поломка', 9, '89192589532', 'Случайный комментарий', ''),
(10, 'Новая поломка', 10, '89192589532', 'ну вот такие вот дела', ''),
(10, 'Сломался Ноутбук', 11, '89193203232', 'сломался ноутбук все показано на изображении', 0x72617a6269746179615f6d617472697a61322d383030783830302e6a7067);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- Индексы таблицы `user_request`
--
ALTER TABLE `user_request`
  ADD PRIMARY KEY (`user_request_ID`),
  ADD KEY `FK_Have` (`User_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `user_request`
--
ALTER TABLE `user_request`
  MODIFY `user_request_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user_request`
--
ALTER TABLE `user_request`
  ADD CONSTRAINT `FK_Have` FOREIGN KEY (`User_id`) REFERENCES `users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
