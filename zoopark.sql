-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2020 г., 17:19
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zoopark`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `animals_id` bigint(20) NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender_id` bigint(20) NOT NULL,
  `habiat_id` bigint(20) DEFAULT NULL,
  `racion_animals_id` bigint(20) DEFAULT NULL,
  `id_vet` bigint(20) DEFAULT NULL,
  `id_smotr` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `bird`
--

CREATE TABLE `bird` (
  `animals_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `bird`
--

INSERT INTO `bird` (`animals_id`, `name`, `origin`) VALUES
(1, 'Петух', 'Улица');

-- --------------------------------------------------------

--
-- Структура таблицы `gender`
--

CREATE TABLE `gender` (
  `gender_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `gender`
--

INSERT INTO `gender` (`gender_id`, `name`) VALUES
(1, 'Мужской'),
(2, 'Женский');

-- --------------------------------------------------------

--
-- Структура таблицы `mammals`
--

CREATE TABLE `mammals` (
  `animals_id` bigint(20) NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `mammals`
--

INSERT INTO `mammals` (`animals_id`, `origin`, `name`) VALUES
(2, 'Джунгли', 'Горилла');

-- --------------------------------------------------------

--
-- Структура таблицы `obitanya`
--

CREATE TABLE `obitanya` (
  `habiat_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `obitanya`
--

INSERT INTO `obitanya` (`habiat_id`, `name`, `info`) VALUES
(1, 'Африка', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'),
(2, '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `user_id` bigint(20) NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_birth` date NOT NULL,
  `gender_id` bigint(20) NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `animals_id` bigint(20) DEFAULT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `married_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal`
--

INSERT INTO `personal` (`user_id`, `lastname`, `firstname`, `patronymic`, `date_birth`, `gender_id`, `phone_number`, `animals_id`, `login`, `pass`, `role_id`, `married_id`) VALUES
(5, 'Моисеенко', 'Дмитрий', 'Юрьевич', '2001-03-15', 1, 77784259976, NULL, 'admin', '$2y$10$mFlJsQgNvDQ27XfADrMh8O9OQA47f2gLmqYdwGeg8SpsvdoRUX95S', 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `racion_animals`
--

CREATE TABLE `racion_animals` (
  `racion_animals_id` bigint(20) NOT NULL,
  `animals_id` bigint(20) DEFAULT NULL,
  `list_product` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `racion_type_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `racion_animals`
--

INSERT INTO `racion_animals` (`racion_animals_id`, `animals_id`, `list_product`, `racion_type_id`, `name`) VALUES
(2, 1, 'Корм диетический,Корм гипоаллергенный,', 2, 'Детический-гипоаллергенный');

-- --------------------------------------------------------

--
-- Структура таблицы `racion_type`
--

CREATE TABLE `racion_type` (
  `racion_type_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `racion_type`
--

INSERT INTO `racion_type` (`racion_type_id`, `name`) VALUES
(1, 'Детский'),
(2, 'Диетический'),
(3, 'Усиленный');

-- --------------------------------------------------------

--
-- Структура таблицы `reptail`
--

CREATE TABLE `reptail` (
  `animals_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reptail`
--

INSERT INTO `reptail` (`animals_id`, `name`, `origin`) VALUES
(3, 'Хомяк', 'Из магазина');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `sys_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`role_id`, `sys_name`, `name`) VALUES
(1, 'admin', 'Администратор'),
(2, 'veterinar', 'Ветеринар'),
(3, 'smotryachie', 'Смотрящий'),
(4, 'animals', 'Животные');

-- --------------------------------------------------------

--
-- Структура таблицы `smotr`
--

CREATE TABLE `smotr` (
  `id_smotr` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `smotr`
--

INSERT INTO `smotr` (`id_smotr`, `user_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `veterinar`
--

CREATE TABLE `veterinar` (
  `id_vet` bigint(20) NOT NULL,
  `user_i` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `veterinar`
--

INSERT INTO `veterinar` (`id_vet`, `user_i`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `winter`
--

CREATE TABLE `winter` (
  `animals_id` bigint(20) NOT NULL,
  `contry` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `temperatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `winter`
--

INSERT INTO `winter` (`animals_id`, `contry`, `date_start`, `date_end`, `temperatura`) VALUES
(1, 'Казахстан', '2020-06-06', '2021-09-01', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `winter_r`
--

CREATE TABLE `winter_r` (
  `animals_id` bigint(20) NOT NULL,
  `nortmal_t` int(11) NOT NULL,
  `date_winter` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `winter_r`
--

INSERT INTO `winter_r` (`animals_id`, `nortmal_t`, `date_winter`) VALUES
(3, 15, '2020-06-02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animals_id`),
  ADD KEY `FK_animals_zona_obitanya_habiat_id` (`habiat_id`),
  ADD KEY `FK_animals_racion_animals_racion_animals_id` (`racion_animals_id`),
  ADD KEY `FK_animals_gender_gender_id` (`gender_id`),
  ADD KEY `FK_animals_smotr_id_smotr` (`id_smotr`),
  ADD KEY `FK_animals_veterinar_id_vet` (`id_vet`);

--
-- Индексы таблицы `bird`
--
ALTER TABLE `bird`
  ADD PRIMARY KEY (`animals_id`);

--
-- Индексы таблицы `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Индексы таблицы `mammals`
--
ALTER TABLE `mammals`
  ADD PRIMARY KEY (`animals_id`);

--
-- Индексы таблицы `obitanya`
--
ALTER TABLE `obitanya`
  ADD PRIMARY KEY (`habiat_id`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_personal_personal_user_id` (`married_id`),
  ADD KEY `FK_personal_gender_gender_id` (`gender_id`),
  ADD KEY `FK_personal_role_role_id` (`role_id`),
  ADD KEY `FK_personal_animals_animals_id` (`animals_id`);

--
-- Индексы таблицы `racion_animals`
--
ALTER TABLE `racion_animals`
  ADD PRIMARY KEY (`racion_animals_id`),
  ADD KEY `FK_racion_animals_animals_animals_id` (`animals_id`),
  ADD KEY `FK_racion_animals_racion_type_racion_type_id` (`racion_type_id`);

--
-- Индексы таблицы `racion_type`
--
ALTER TABLE `racion_type`
  ADD PRIMARY KEY (`racion_type_id`);

--
-- Индексы таблицы `reptail`
--
ALTER TABLE `reptail`
  ADD PRIMARY KEY (`animals_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `smotr`
--
ALTER TABLE `smotr`
  ADD PRIMARY KEY (`id_smotr`),
  ADD KEY `FK_smotr_personal_user_id` (`user_id`);

--
-- Индексы таблицы `veterinar`
--
ALTER TABLE `veterinar`
  ADD PRIMARY KEY (`id_vet`),
  ADD KEY `FK_veterinar_personal_user_id` (`user_i`);

--
-- Индексы таблицы `winter`
--
ALTER TABLE `winter`
  ADD PRIMARY KEY (`animals_id`);

--
-- Индексы таблицы `winter_r`
--
ALTER TABLE `winter_r`
  ADD PRIMARY KEY (`animals_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `bird`
--
ALTER TABLE `bird`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `mammals`
--
ALTER TABLE `mammals`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `obitanya`
--
ALTER TABLE `obitanya`
  MODIFY `habiat_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `personal`
--
ALTER TABLE `personal`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `racion_animals`
--
ALTER TABLE `racion_animals`
  MODIFY `racion_animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `racion_type`
--
ALTER TABLE `racion_type`
  MODIFY `racion_type_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `reptail`
--
ALTER TABLE `reptail`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `smotr`
--
ALTER TABLE `smotr`
  MODIFY `id_smotr` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `veterinar`
--
ALTER TABLE `veterinar`
  MODIFY `id_vet` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `winter`
--
ALTER TABLE `winter`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `winter_r`
--
ALTER TABLE `winter_r`
  MODIFY `animals_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `FK_animals_gender_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_animals_personal_user_id` FOREIGN KEY (`id_vet`) REFERENCES `personal` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_animals_racion_animals_racion_animals_id` FOREIGN KEY (`racion_animals_id`) REFERENCES `racion_animals` (`racion_animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_animals_zona_obitanya_habiat_id` FOREIGN KEY (`habiat_id`) REFERENCES `obitanya` (`habiat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_personal_smotr` FOREIGN KEY (`id_smotr`) REFERENCES `personal` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `bird`
--
ALTER TABLE `bird`
  ADD CONSTRAINT `FK_bird_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `mammals`
--
ALTER TABLE `mammals`
  ADD CONSTRAINT `FK_mammals_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `FK_personal_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_personal_gender_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_personal_role_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `racion_animals`
--
ALTER TABLE `racion_animals`
  ADD CONSTRAINT `FK_racion_animals_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_racion_animals_racion_type_racion_type_id` FOREIGN KEY (`racion_type_id`) REFERENCES `racion_type` (`racion_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `reptail`
--
ALTER TABLE `reptail`
  ADD CONSTRAINT `FK_reptail_animals_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `smotr`
--
ALTER TABLE `smotr`
  ADD CONSTRAINT `FK_smotr_personal_user_id` FOREIGN KEY (`user_id`) REFERENCES `personal` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `winter`
--
ALTER TABLE `winter`
  ADD CONSTRAINT `FK_winter_bird_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `bird` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `winter_r`
--
ALTER TABLE `winter_r`
  ADD CONSTRAINT `FK_winter_r_reptail_animals_id` FOREIGN KEY (`animals_id`) REFERENCES `reptail` (`animals_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
