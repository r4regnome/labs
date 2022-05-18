-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 28 2021 г., 19:58
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tours`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`ID`, `NAME`) VALUES
(5, 'Турция'),
(6, 'Швеция'),
(7, 'США'),
(8, 'Япония'),
(9, 'Индия');

-- --------------------------------------------------------

--
-- Структура таблицы `tours`
--

CREATE TABLE `tours` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `COUNTRY_ID` int(11) DEFAULT NULL,
  `DESCRIPTION` text DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `IMAGE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tours`
--

INSERT INTO `tours` (`ID`, `NAME`, `COUNTRY_ID`, `DESCRIPTION`, `PRICE`, `IMAGE`) VALUES
(6, 'Турция, Стамбул', 5, 'Турция – круглогодичное направление, которое радует туристов не только теплым морем, но и богатой культурой.\r\nИменно поэтому экскурсионные туры в Стамбул – это возможность увидеть древние постройки, а также прогуляться по колоритным районам и ощутить гостеприимство Турции.', 40000, '/assets/images/tours/Снимок экрана 2021-12-27 200003.png'),
(7, 'Швеция, Стокгольм', 6, 'Стокгольм – это самый большой город Скандинавии, родина группы ABBA и Карлсона. Город, где была учреждена Нобелевская премия и который сейчас ассоциируется с богатой культурной жизнью и современным искусством.\r\n', 24000, '/assets/images/tours/Снимок экрана 2021-12-27 200021.png'),
(8, 'США, Нью-Йорк', 7, 'Обзорная экскурсия по Нью-Йорку, подъем на смотровую площадку Top of the Rock (5 часов). Во время экскурсии вас ждет знакомство с одним из самых привлекательных городов мира, столицей финансовой и культурной жизни США – Нью-Йорком. Вы посетите центральную часть Манхеттена: Таймс-Сквер, Бродвей, 5-ую авеню, здание ООН, Рокфеллер-центр, увидите небоскребы города: легендарный Эмпайр-Стейт-Билдинг и новый небоскреб One World Trade Center - Freedom Tower, построенный на территории Всемирного Торгового Центра, разрушенного 11 сентября 2001 года. Проедете по Маленькой Италии и Китайскому кварталу и увидите Южный Морской порт. В финансовом центре города вы проедете мимо здания нью-йоркской фондовой биржи и по знаменитой улице Уолл-Стрит, а затем попадете в Бэттери парк, откуда откроется фантастический вид на Статую Свободы. Во время экскурсии вы увидите здания музея Метрополитен, Линкольн-центра и Метрополитен Опера, знаменитый Центральный парк и мемориал, посвященный трагедии 11 сентября.', 100000, '/assets/images/tours/Снимок экрана 2021-12-27 200034.png'),
(9, 'Япония, Киото', 8, 'Киото – бывшая столица Японии. За более чем тысячелетнюю историю Киото скопил огромное культурное и философское наследие. Пожалуй, мало найдется мест на Планете, где одновременно находилось бы столько достопримечательностей, как здесь. И вместе с тем Киото вовсе не застыл в музейной истории. Это современный, живой мегаполис, богатый в равной степени и на самые головокружительные развлечения.', 120000, '/assets/images/tours/Снимок экрана 2021-12-27 200047.png'),
(10, 'Индия, Дели', 9, 'Дели – четвертый по численности населения город в мире, а основан он был еще в 12 веке героями «Махабхараты» на месте семи городов. Сегодня его принято делить на Нью Дели, где сосредоточены современные и колониальные здания, торговые центры, парки, развлечения на любой вкус, театры, и  на Старый город, грязный, с узкими запутанными улочками, шумными базарами, трущобами, а также стоящими на фоне этого великолепными древними мечетями и мавзолеями.', 30000, '/assets/images/tours/Снимок экрана 2021-12-27 200102.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `countries_ID_uindex` (`ID`);

--
-- Индексы таблицы `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `tours_ID_uindex` (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `tours`
--
ALTER TABLE `tours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
