-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 24 2012 г., 20:08
-- Версия сервера: 5.5.16
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ishop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=667 ;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'category 1'),
(2, 'category 2'),
(3, 'category 3'),
(5, 'category 5'),
(666, 'category 666');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`) VALUES
(1, 'test news title', 'test news text\nmulti lines', '2012-03-23'),
(2, 'test news title 1', 'test news text\nmulti lines', '2012-03-23'),
(3, 'test news title 2', 'test news text\nmulti lines', '2012-03-23'),
(4, 'test news title 3', 'test news text\nmulti lines', '2012-03-23'),
(5, 'test news title 4', 'test news text\nmulti lines', '2012-03-23'),
(6, 'test news title 5', 'test news text\nmulti lines', '2012-03-23');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image_url` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `category` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `image_url`, `price`, `category`, `description`) VALUES
(1, 'Bravo-07', 'bravo-07.png', 2700, 1, 'Название говорит само за себя - Bravo! Еще больше необычных, яких и стильных туфель на столь актуальной танкетке'),
(2, 'Dynamite-03', 'Dynamite-03.png', 3100, 1, 'Туфли на платформе. Искусственная кожа, на ремеках, в платформе сквозное отверстие в виде звезды. Высота платформы 13 см.'),
(3, 'stomp-101', 'stomp-101.png', 5600, 3, 'Сапоги на фигурной платформе. Искусственная кожа, на шнуровке, с декоративными пряжками и ремешками. Высота платформы 12 см.'),
(4, 'Product 4', 'nothing4', 123123, 2, 'Product\ndescription 4'),
(5, 'Product 5', 'nothing5', 1222, 2, 'Product\ndescription 5'),
(6, 'Product 6', 'nothing6', 999, 5, 'Product\ndescription 6'),
(7, 'Product 7', 'nothing7', 666, 666, 'Product\ndescription 7');

-- --------------------------------------------------------

--
-- Структура таблицы `products_sizes`
--

CREATE TABLE IF NOT EXISTS `products_sizes` (
  `pid` int(11) unsigned NOT NULL,
  `sid` int(11) unsigned NOT NULL,
  KEY `index` (`sid`,`pid`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products_sizes`
--

INSERT INTO `products_sizes` (`pid`, `sid`) VALUES
(1, 1),
(3, 5),
(2, 6),
(2, 7),
(4, 7),
(5, 8),
(6, 9),
(7, 9),
(7, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`id`, `value`) VALUES
(1, 36),
(5, 37),
(6, 38),
(7, 39),
(8, 40),
(9, 41),
(10, 42);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD CONSTRAINT `products_sizes_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `products_sizes_ibfk_3` FOREIGN KEY (`pid`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
