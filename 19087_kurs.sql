-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Дек 09 2022 г., 03:22
-- Версия сервера: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- Версия PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `19087_kurs`
--

-- --------------------------------------------------------

--
-- Структура таблицы `kurs`
--

CREATE TABLE `kurs` (
  `id_kurs` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `cost` varchar(500) DEFAULT NULL,
  `opisanije` varchar(500) DEFAULT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `kurs`
--

INSERT INTO `kurs` (`id_kurs`, `name`, `cost`, `opisanije`, `id_teacher`) VALUES
(10, 'Английский язык: теория', '3000', 'Выучите теорию английского на уровень С1', 14),
(11, 'Английский: лексика', '1000', 'Выучите лексику до уровня С1', 14),
(12, 'Английский язык для нчинающий', '1100', 'Легко и просто начни изучать английский', 14),
(13, 'Английский уровень В1', '3000', 'Выучите английский на уровень В1', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id_material` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `way` varchar(500) DEFAULT NULL,
  `id_kurs` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fio` varchar(500) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `pass` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `number`, `email`, `pass`, `type`) VALUES
(12, 'Власов Антон Андреевич', '39204857937', 'admin@admin.admin', '$2y$10$uKKqyQubUMkWjxZ2VNhkPuSDiA0p99TYt6D5NeB8ePiGZ6Cwcu56u', 'admin'),
(14, 'Ивенков Иван Иванович', '39204857937', 'teacher@gmail.com', '$2y$10$8z4xwY6PC4EsZTKzpgHDLuEz0YoJZzzbb.d6S4Xxy/b8216LKPdKG', 'teacher'),
(15, 'Растиславов Растислав Растиславович', '36475896092', 'r@gmail.com', '$2y$10$EgQte7RShBYUJ4rWn9j.deShK.Ei8XeL/yPfu7iqdonWS7vSJwSda', 'user'),
(16, 'Анасова Анастасия Сергеевна', '846374937283', 'a@mail.com', '$2y$10$nusTdDF4WQZMxRPI9oytL.3Pq3Ub/XYUvwUO4.Phso9b/IGKBzFWu', 'teacher'),
(17, 'Протова Мария Владиславна', '73849506837', 'p@mail.ru', '$2y$10$QYLbHoszjw8M6cZkQRzSauQ6lQd0At9hisFvO6xCwN9u/fkzL/aX6', 'user'),
(18, 'Растиславов Растислав Растиславович', '84637493728', 'mail@mail.com', '$2y$10$P1jq0QqBWyKFo9W1UM7/ae45I8C69G0NpmlEXizKRRYjAD294Qq4S', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `zayavka`
--

CREATE TABLE `zayavka` (
  `id_zayavka` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kurs` int(11) NOT NULL,
  `dostup` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `zayavka`
--

INSERT INTO `zayavka` (`id_zayavka`, `id_user`, `id_kurs`, `dostup`) VALUES
(164, 18, 10, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kurs`),
  ADD KEY `id_teacher` (`id_teacher`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `materials_ibfk_1` (`id_kurs`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD PRIMARY KEY (`id_zayavka`),
  ADD KEY `id_kurs` (`id_kurs`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kurs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `zayavka`
--
ALTER TABLE `zayavka`
  MODIFY `id_zayavka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `kurs_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_ibfk_1` FOREIGN KEY (`id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `zayavka`
--
ALTER TABLE `zayavka`
  ADD CONSTRAINT `zayavka_ibfk_1` FOREIGN KEY (`id_kurs`) REFERENCES `kurs` (`id_kurs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zayavka_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
