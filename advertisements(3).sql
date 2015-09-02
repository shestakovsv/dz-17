-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `subcategory` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `category` (`id`, `subcategory`, `category`) VALUES
(1,	'Недвижимость',	'Квартиры'),
(2,	'Недвижимость',	'Комнаты'),
(3,	'Недвижимость',	'Дома, дачи, коттеджи'),
(4,	'Недвижимость',	'Земельные участки'),
(5,	'Недвижимость',	'Гаражи и машиноместа'),
(6,	'Недвижимость',	'Коммерческая недвижимость'),
(7,	'Недвижимость',	'Недвижимость за рубежом'),
(8,	'Транспорт',	'Автомобили с пробегом'),
(9,	'Транспорт',	'Новые автомобили'),
(10,	'Транспорт',	'Мотоциклы и мототехника'),
(11,	'Транспорт',	'Грузовики и спецтехника'),
(12,	'Транспорт',	'Водный транспорт');

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
(6,	1,	'Антон',	'почта антона',	'Имя',	'',	'Новосибирск',	'1',	'Продам жираф',	'Живой жираф',	800,	0),
(7,	0,	'Света',	'почта светы',	'Петровна',	'+78964123',	'Искитим',	'8',	'Куплю машинку',	'беленькая',	112,	1),
(8,	1,	'Аноним',	'нет',	'Светлый',	'+987456321',	'Колывань',	'4',	'Аренда поля',	'пустое поле',	10,	1);

DROP TABLE IF EXISTS `sity`;
CREATE TABLE `sity` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `location` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `sity` (`id`, `location`) VALUES
(1,	'Новосибирск'),
(2,	'Барабинск'),
(3,	'Бердск'),
(4,	'Искитим'),
(5,	'Колывань');

-- 2015-09-02 06:12:54
