-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category_realty`;
CREATE TABLE `category_realty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_realty` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `category_realty` (`id`, `category_realty`) VALUES
(1,	'Квартиры'),
(2,	'Комнаты'),
(3,	'Дома, дачи, коттеджи'),
(4,	'Земельные участки'),
(5,	'Гаражи и машиноместа'),
(6,	'Коммерческая недвижимость'),
(7,	'Недвижимость за рубежом');

DROP TABLE IF EXISTS `category_transport`;
CREATE TABLE `category_transport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_transport` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `category_transport` (`id`, `category_transport`) VALUES
(1,	'Автомобили с пробегом'),
(2,	'Новые автомобили'),
(3,	'Мотоциклы и мототехника'),
(4,	'Грузовики и спецтехника'),
(5,	'Водный транспорт');

DROP TABLE IF EXISTS `form`;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `private` int(11) NOT NULL,
  `manager` varchar(40) NOT NULL,
  `email` varchar(25) NOT NULL,
  `seller_name` varchar(20) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `location_id` varchar(20) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `allow_mails` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `form` (`id`, `private`, `manager`, `email`, `seller_name`, `phone`, `location_id`, `category_id`, `title`, `description`, `price`, `allow_mails`) VALUES
(3,	1,	'',	'',	'',	'',	'-- Выберите Ваш горо',	'-- Выберите категорию объявлен',	'1',	'',	0,	0),
(4,	1,	'',	'',	'',	'',	'-- Выберите Ваш горо',	'-- Выберите категорию объявлен',	'2',	'',	0,	0),
(5,	1,	'',	'',	'',	'',	'-- Выберите Ваш горо',	'-- Выберите категорию объявлен',	'3',	'',	0,	0);

-- 2015-08-26 06:22:45
