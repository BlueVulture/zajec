-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 20. mar 2013 ob 10.25
-- Različica strežnika: 5.5.21
-- Različica PHP: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `zajec`
--

-- --------------------------------------------------------

--
-- Struktura tabele `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `date_b` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_e` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text COLLATE utf8_slovenian_ci,
  `price` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=8 ;

--
-- Odloži podatke za tabelo `ads`
--

INSERT INTO `ads` (`id`, `category_id`, `user_id`, `title`, `date_b`, `date_e`, `description`, `price`) VALUES
(2, 1, 3, 'Renault Scenic', '2013-02-22 08:16:52', '2013-03-01 09:52:47', 'Nov avtomobili ....', 17000),
(3, 2, 1, 'Apple iPad', '2013-02-01 09:53:24', '0000-00-00 00:00:00', 'Ipad 3 ....', 450),
(4, 2, 4, 'Jabolka', '2013-02-14 23:00:00', '2013-02-19 23:00:00', 'Prodajam MacBook Air!\r\n', 700),
(5, 1, 4, 'fdf', '2013-02-04 23:00:00', '2013-02-18 23:00:00', 'fhgh', 5665),
(6, 1, 4, 'Hruške', '2013-03-13 23:00:00', '2013-03-29 23:00:00', 'sdfnsldkfjsldfkj333', 5003),
(7, 1, 5, 'sggdfg', '2013-03-11 23:00:00', '2013-03-29 23:00:00', 'dhfghfgh', 456456);

-- --------------------------------------------------------

--
-- Struktura tabele `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Odloži podatke za tabelo `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Avtomobili'),
(2, 'Računalništvo'),
(4, 'Knjige');

-- --------------------------------------------------------

--
-- Struktura tabele `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=8 ;

--
-- Odloži podatke za tabelo `comments`
--

INSERT INTO `comments` (`id`, `ad_id`, `user_id`, `date_c`, `content`) VALUES
(1, 6, 4, '2013-03-20 15:23:32', 'Moj prvi oglas. Držim pesti!'),
(2, 6, 4, '2013-03-20 15:23:43', 'sdfsdfd'),
(3, 6, 4, '2013-03-20 15:23:58', '<b>A to dela</b>'),
(4, 6, 4, '2013-03-20 15:56:29', 'kjfdgh'),
(5, 6, 4, '2013-03-20 15:59:14', 'kjfdgh'',NOW()); UPDATE users SET last_name=''zzz5'' WHERE id=5; --'),
(7, 7, 4, '2013-03-20 16:48:23', 'dfgdfg');

-- --------------------------------------------------------

--
-- Struktura tabele `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=12 ;

--
-- Odloži podatke za tabelo `pictures`
--

INSERT INTO `pictures` (`id`, `ad_id`, `url`) VALUES
(2, 2, 'pictures/20130301010743-2-Winter.jpg'),
(3, 6, 'pictures/20130301014546-6-Winter.jpg'),
(4, 6, 'pictures/20130301014910-6-Winter.jpg'),
(5, 6, 'pictures/20130301014937-6-Sunset.jpg'),
(6, 6, 'pictures/20130301014947-6-Sunset.jpg'),
(9, 7, 'pictures/20130315013118-7-Winter.jpg'),
(11, 7, 'pictures/20130315013126-7-Blue hills.jpg');

-- --------------------------------------------------------

--
-- Struktura tabele `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_slovenian_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_slovenian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=7 ;

--
-- Odloži podatke za tabelo `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `pass`, `phone`) VALUES
(1, 'Islam', 'Mušić', 'islam.music@gmail.com', '0f315d32ad05a7148f0eb1aaf054599c1712198f', '031366244'),
(2, 'qq', 'qq', 'qq@qq.qq', 'qq', 'qq'),
(3, 'Gorazd', 'Žižek', 'gorazd@scv.si', 'd043e3901eab5b120e35a5614e92695ab24aeff4', '041262112'),
(4, 'Test4', 'Hallooo!!!', 'test@test.com', '63ab89682d9a027b1f5c91f6b0ed347ef7dc9ac7', '031632546'),
(5, 'ppp', 'zzz', 'ppp@pp.pp', 'b3054ff0797ff0b2bbce03ec897fe63e0b6490e0', '9999'),
(6, 'ooo', 'ooo', 'oo@oo.oo', '0343bb07c98f8a943e8eb80c0ba3d9758d372d22', '00');

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ads_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Omejitve za tabelo `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`);

--
-- Omejitve za tabelo `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
