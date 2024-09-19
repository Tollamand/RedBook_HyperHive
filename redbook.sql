-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 18 2024 г., 19:56
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `redbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `areal`
--

CREATE TABLE `areal` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `areal`
--

INSERT INTO `areal` (`id`, `name`, `description`) VALUES
(1, 'Тунгус', 'Какое-то описание');

-- --------------------------------------------------------

--
-- Структура таблицы `class_lat`
--

CREATE TABLE `class_lat` (
  `id` int NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `class_lat`
--

INSERT INTO `class_lat` (`id`, `class`) VALUES
(1, 'Magnoliopsida');

-- --------------------------------------------------------

--
-- Структура таблицы `class_ru`
--

CREATE TABLE `class_ru` (
  `id` int NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `class_ru`
--

INSERT INTO `class_ru` (`id`, `class`) VALUES
(1, 'Покрытосеменные');

-- --------------------------------------------------------

--
-- Структура таблицы `department_lat`
--

CREATE TABLE `department_lat` (
  `id` int NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `department_lat`
--

INSERT INTO `department_lat` (`id`, `department`) VALUES
(1, 'Spermatophyta');

-- --------------------------------------------------------

--
-- Структура таблицы `department_ru`
--

CREATE TABLE `department_ru` (
  `id` int NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `department_ru`
--

INSERT INTO `department_ru` (`id`, `department`) VALUES
(1, 'Семенные растения');

-- --------------------------------------------------------

--
-- Структура таблицы `entity`
--

CREATE TABLE `entity` (
  `id` int NOT NULL,
  `class_ru_id` int DEFAULT '0',
  `class_lat_id` int NOT NULL DEFAULT '0',
  `squad_ru_id` int DEFAULT NULL,
  `squad_lat_id` int DEFAULT NULL,
  `family_ru_id` int NOT NULL DEFAULT '0',
  `family_lat_id` int NOT NULL DEFAULT '0',
  `species_ru_id` int NOT NULL DEFAULT '0',
  `species_lat_id` int NOT NULL DEFAULT '0',
  `department_ru_id` int NOT NULL DEFAULT '0',
  `department_lat_id` int NOT NULL DEFAULT '0',
  `procedure_ru_id` int NOT NULL DEFAULT '0',
  `procedure_lat_id` int NOT NULL DEFAULT '0',
  `rarity_status_id` int NOT NULL,
  `park_id` int NOT NULL,
  `population` int NOT NULL,
  `habitat_features` text COLLATE utf8mb4_general_ci NOT NULL,
  `limiting_factors` text COLLATE utf8mb4_general_ci NOT NULL,
  `security_measures_taken` text COLLATE utf8mb4_general_ci NOT NULL,
  `species_state_changes` text COLLATE utf8mb4_general_ci NOT NULL,
  `species_conservation_measures` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `entity`
--

INSERT INTO `entity` (`id`, `class_ru_id`, `class_lat_id`, `squad_ru_id`, `squad_lat_id`, `family_ru_id`, `family_lat_id`, `species_ru_id`, `species_lat_id`, `department_ru_id`, `department_lat_id`, `procedure_ru_id`, `procedure_lat_id`, `rarity_status_id`, `park_id`, `population`, `habitat_features`, `limiting_factors`, `security_measures_taken`, `species_state_changes`, `species_conservation_measures`) VALUES
(3, 1, 1, NULL, NULL, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1325, 'Многолетнее травянистое короткокорневищное растение с розеткой зимнезелёных листьев. Корневище залегает на глубине до 2,5 см. Его ежегодный прирост составляет всего 4–5 мм.', 'Малая площадь и изолированность ельников и залесённых балок с рыхлой лесной подстилкой, умеренным увлажнением и относительно богатой почвой. Сбор растения.\r\nНизкая устойчивость к вытаптыванию\r\nиз-за неглубокого залегания корневища. Медленное развитие и размножение. Активное разрастание осоки волосистой на участке единственной в Москве крупной популяции печёночницы.', 'На территории Москвы вид подлежит особой охране с 1984 г., в 2001 г. занесён в Красную книгу Москвы с КР 1.', '`Состояние популяции в Лосином Острове стабильно, но на участке её нахождения происходят неблагоприятные для вида спонтанные процессы, прежде всего разрастание осоки волосистой. КР остаётся без изменений – 1.', 'Специальная охрана мест произрастания вида в Лосином Острове. Ликвидация пикниковых точек вблизи нахождения популяции, усиление контроля за соблюдением запрета разведения костров на территории НП «Лосиный остров». Создание искусственных популяций в городских лесопарках с соответствующими биотопами.');

-- --------------------------------------------------------

--
-- Структура таблицы `family_lat`
--

CREATE TABLE `family_lat` (
  `id` int NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `family_lat`
--

INSERT INTO `family_lat` (`id`, `family`) VALUES
(1, 'Ranunculaceae');

-- --------------------------------------------------------

--
-- Структура таблицы `family_ru`
--

CREATE TABLE `family_ru` (
  `id` int NOT NULL,
  `family` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `family_ru`
--

INSERT INTO `family_ru` (`id`, `family`) VALUES
(1, 'Лютиковые');

-- --------------------------------------------------------

--
-- Структура таблицы `images_moderation`
--

CREATE TABLE `images_moderation` (
  `id` int NOT NULL,
  `comment_id` int NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `location_areal`
--

CREATE TABLE `location_areal` (
  `id` int NOT NULL,
  `x` float(10,6) NOT NULL,
  `y` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `location_areal`
--

INSERT INTO `location_areal` (`id`, `x`, `y`) VALUES
(1, 55.774414, 37.445015),
(2, 55.774513, 37.445114);

-- --------------------------------------------------------

--
-- Структура таблицы `location_areal_middle`
--

CREATE TABLE `location_areal_middle` (
  `id` int NOT NULL,
  `areal_id` int NOT NULL,
  `location_areal_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `location_areal_middle`
--

INSERT INTO `location_areal_middle` (`id`, `areal_id`, `location_areal_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `location_entity`
--

CREATE TABLE `location_entity` (
  `id` int NOT NULL,
  `x` float(10,6) NOT NULL,
  `y` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `location_entity`
--

INSERT INTO `location_entity` (`id`, `x`, `y`) VALUES
(1, 55.774414, 37.445015),
(2, 55.775414, 37.446014);

-- --------------------------------------------------------

--
-- Структура таблицы `location_entity_middle`
--

CREATE TABLE `location_entity_middle` (
  `id` int NOT NULL,
  `entity_id` int NOT NULL,
  `location_entity_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `location_entity_middle`
--

INSERT INTO `location_entity_middle` (`id`, `entity_id`, `location_entity_id`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `moderation`
--

CREATE TABLE `moderation` (
  `id` int NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `park`
--

CREATE TABLE `park` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `areal_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `park`
--

INSERT INTO `park` (`id`, `name`, `location`, `areal_id`) VALUES
(1, 'ПИП «Москворецкий»', '55.774415;37.445015', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `procedures_lat`
--

CREATE TABLE `procedures_lat` (
  `id` int NOT NULL,
  `procedures` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `procedures_lat`
--

INSERT INTO `procedures_lat` (`id`, `procedures`) VALUES
(1, 'Ranunculales');

-- --------------------------------------------------------

--
-- Структура таблицы `procedures_ru`
--

CREATE TABLE `procedures_ru` (
  `id` int NOT NULL,
  `procedures` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `procedures_ru`
--

INSERT INTO `procedures_ru` (`id`, `procedures`) VALUES
(1, 'Лютикоцветные');

-- --------------------------------------------------------

--
-- Структура таблицы `rarity_status`
--

CREATE TABLE `rarity_status` (
  `id` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `rarity_status`
--

INSERT INTO `rarity_status` (`id`, `status`) VALUES
(1, 'Виды, находящиеся под угрозой исчезновения'),
(2, 'Редкие или малочисленные виды'),
(3, 'Уязвимые виды'),
(4, 'Виды неопределённого статуса'),
(5, 'Восстановившиеся виды');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 0),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `species_lat`
--

CREATE TABLE `species_lat` (
  `id` int NOT NULL,
  `species` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `species_lat`
--

INSERT INTO `species_lat` (`id`, `species`) VALUES
(1, 'Hepatica nobilis');

-- --------------------------------------------------------

--
-- Структура таблицы `species_ru`
--

CREATE TABLE `species_ru` (
  `id` int NOT NULL,
  `species` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `species_ru`
--

INSERT INTO `species_ru` (`id`, `species`) VALUES
(1, 'Печеночница благородная');

-- --------------------------------------------------------

--
-- Структура таблицы `squad_lat`
--

CREATE TABLE `squad_lat` (
  `id` int NOT NULL,
  `squad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `squad_ru`
--

CREATE TABLE `squad_ru` (
  `id` int NOT NULL,
  `squad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `areal`
--
ALTER TABLE `areal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class_lat`
--
ALTER TABLE `class_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `class_ru`
--
ALTER TABLE `class_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `department_lat`
--
ALTER TABLE `department_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `department_ru`
--
ALTER TABLE `department_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_ru_id` (`class_ru_id`,`class_lat_id`,`squad_ru_id`,`squad_lat_id`,`family_ru_id`,`family_lat_id`,`species_ru_id`,`species_lat_id`,`department_ru_id`,`department_lat_id`,`procedure_ru_id`,`procedure_lat_id`,`rarity_status_id`,`park_id`),
  ADD KEY `class_lat_id` (`class_lat_id`),
  ADD KEY `squad_ru_id` (`squad_ru_id`),
  ADD KEY `squad_lat_id` (`squad_lat_id`),
  ADD KEY `family_ru_id` (`family_ru_id`),
  ADD KEY `family_lat_id` (`family_lat_id`),
  ADD KEY `species_ru_id` (`species_ru_id`),
  ADD KEY `species_lat_id` (`species_lat_id`),
  ADD KEY `department_ru_id` (`department_ru_id`),
  ADD KEY `department_lat_id` (`department_lat_id`),
  ADD KEY `procedure_ru_id` (`procedure_ru_id`),
  ADD KEY `procedure_lat_id` (`procedure_lat_id`),
  ADD KEY `rarity_status_id` (`rarity_status_id`),
  ADD KEY `park_id` (`park_id`);

--
-- Индексы таблицы `family_lat`
--
ALTER TABLE `family_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `family_ru`
--
ALTER TABLE `family_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images_moderation`
--
ALTER TABLE `images_moderation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Индексы таблицы `location_areal`
--
ALTER TABLE `location_areal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `location_areal_middle`
--
ALTER TABLE `location_areal_middle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areal_id` (`areal_id`,`location_areal_id`),
  ADD KEY `location_areal_id` (`location_areal_id`);

--
-- Индексы таблицы `location_entity`
--
ALTER TABLE `location_entity`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `location_entity_middle`
--
ALTER TABLE `location_entity_middle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entity_id` (`entity_id`,`location_entity_id`),
  ADD KEY `location_entity_id` (`location_entity_id`);

--
-- Индексы таблицы `moderation`
--
ALTER TABLE `moderation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `park`
--
ALTER TABLE `park`
  ADD PRIMARY KEY (`id`),
  ADD KEY `areal_id` (`areal_id`);

--
-- Индексы таблицы `procedures_lat`
--
ALTER TABLE `procedures_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `procedures_ru`
--
ALTER TABLE `procedures_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rarity_status`
--
ALTER TABLE `rarity_status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `species_lat`
--
ALTER TABLE `species_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `species_ru`
--
ALTER TABLE `species_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `squad_lat`
--
ALTER TABLE `squad_lat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `squad_ru`
--
ALTER TABLE `squad_ru`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `areal`
--
ALTER TABLE `areal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `class_lat`
--
ALTER TABLE `class_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `class_ru`
--
ALTER TABLE `class_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `department_lat`
--
ALTER TABLE `department_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `department_ru`
--
ALTER TABLE `department_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `family_lat`
--
ALTER TABLE `family_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `family_ru`
--
ALTER TABLE `family_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `images_moderation`
--
ALTER TABLE `images_moderation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `location_areal`
--
ALTER TABLE `location_areal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `location_areal_middle`
--
ALTER TABLE `location_areal_middle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `location_entity`
--
ALTER TABLE `location_entity`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `location_entity_middle`
--
ALTER TABLE `location_entity_middle`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `moderation`
--
ALTER TABLE `moderation`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `park`
--
ALTER TABLE `park`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `procedures_lat`
--
ALTER TABLE `procedures_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `procedures_ru`
--
ALTER TABLE `procedures_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `rarity_status`
--
ALTER TABLE `rarity_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `species_lat`
--
ALTER TABLE `species_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `species_ru`
--
ALTER TABLE `species_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `squad_lat`
--
ALTER TABLE `squad_lat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `squad_ru`
--
ALTER TABLE `squad_ru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `entity_ibfk_1` FOREIGN KEY (`class_lat_id`) REFERENCES `class_lat` (`id`),
  ADD CONSTRAINT `entity_ibfk_10` FOREIGN KEY (`procedure_ru_id`) REFERENCES `procedures_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_11` FOREIGN KEY (`procedure_lat_id`) REFERENCES `procedures_lat` (`id`),
  ADD CONSTRAINT `entity_ibfk_12` FOREIGN KEY (`rarity_status_id`) REFERENCES `rarity_status` (`id`),
  ADD CONSTRAINT `entity_ibfk_13` FOREIGN KEY (`class_ru_id`) REFERENCES `class_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_14` FOREIGN KEY (`park_id`) REFERENCES `park` (`id`),
  ADD CONSTRAINT `entity_ibfk_2` FOREIGN KEY (`squad_ru_id`) REFERENCES `squad_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_3` FOREIGN KEY (`squad_lat_id`) REFERENCES `squad_lat` (`id`),
  ADD CONSTRAINT `entity_ibfk_4` FOREIGN KEY (`family_ru_id`) REFERENCES `family_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_5` FOREIGN KEY (`family_lat_id`) REFERENCES `family_lat` (`id`),
  ADD CONSTRAINT `entity_ibfk_6` FOREIGN KEY (`species_ru_id`) REFERENCES `species_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_7` FOREIGN KEY (`species_lat_id`) REFERENCES `species_lat` (`id`),
  ADD CONSTRAINT `entity_ibfk_8` FOREIGN KEY (`department_ru_id`) REFERENCES `department_ru` (`id`),
  ADD CONSTRAINT `entity_ibfk_9` FOREIGN KEY (`department_lat_id`) REFERENCES `department_lat` (`id`);

--
-- Ограничения внешнего ключа таблицы `images_moderation`
--
ALTER TABLE `images_moderation`
  ADD CONSTRAINT `images_moderation_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `moderation` (`id`);

--
-- Ограничения внешнего ключа таблицы `location_areal_middle`
--
ALTER TABLE `location_areal_middle`
  ADD CONSTRAINT `location_areal_middle_ibfk_1` FOREIGN KEY (`location_areal_id`) REFERENCES `location_areal` (`id`),
  ADD CONSTRAINT `location_areal_middle_ibfk_2` FOREIGN KEY (`areal_id`) REFERENCES `areal` (`id`);

--
-- Ограничения внешнего ключа таблицы `location_entity_middle`
--
ALTER TABLE `location_entity_middle`
  ADD CONSTRAINT `location_entity_middle_ibfk_1` FOREIGN KEY (`location_entity_id`) REFERENCES `location_entity` (`id`),
  ADD CONSTRAINT `location_entity_middle_ibfk_2` FOREIGN KEY (`entity_id`) REFERENCES `entity` (`id`);

--
-- Ограничения внешнего ключа таблицы `park`
--
ALTER TABLE `park`
  ADD CONSTRAINT `park_ibfk_1` FOREIGN KEY (`areal_id`) REFERENCES `areal` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
