-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Dec 2014 la 10:34
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myforum`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Salvarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'PHP', 'discutions about php'),
(2, 'WAMP', 'problems with wamp'),
(3, 'Web programing', 'The most popular (i.e., the most visited) websites have in common that they are dynamic websites. Their development typically involves server side coding, client side coding and database technology. The programming languages applied to deliver similar dynamic web content however vary vastly between sites.'),
(4, 'Web desigin', 'Web design encompasses many different skills and disciplines in the production and maintenance of websites. The different areas of web design include web graphic design; interface design; authoring, including standardised code and proprietary software; user experience design; and search engine optimization.');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Salvarea datelor din tabel `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `body`, `create_date`) VALUES
(1, 2, 3, 'During a really long flight,it was pretty boring and I said to myself, why not learn HTML & CSS, and here I am', '2014-12-16 19:17:07'),
(2, 1, 1, 'PHP because it was the first :)', '2014-12-16 19:17:07'),
(3, 4, 7, '<p>Ye, I think is overated, overused, better results with garlic</p>', '2014-12-18 06:56:12'),
(4, 5, 6, '<p>testing</p>', '2014-12-18 06:56:38'),
(5, 4, 4, '<p>No, of course it&#39;s not overrated.</p>', '2014-12-18 07:34:22');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Salvarea datelor din tabel `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
(1, 3, 1, 'Favorite server side language', 'What is your favorite server side language', '0000-00-00 00:00:00', '2014-12-15 10:46:22'),
(2, 4, 1, 'How did you learn HTML and CSS', 'How did you learn HTML and CSS', '0000-00-00 00:00:00', '2014-12-15 10:46:22'),
(3, 1, 3, 'Testing php is hard', 'Testing', '0000-00-00 00:00:00', '2014-12-15 19:42:04'),
(4, 1, 2, 'Is silver overrated ?', 'Do you think that silver is for old man ?', '0000-00-00 00:00:00', '2014-12-16 19:25:06'),
(5, 2, 7, 'I love/hate WAMP', '<p>Why do you hate or love the WAMP.</p>', '2014-12-17 23:55:48', '2014-12-17 22:55:48'),
(6, 2, 6, 'Testing you', '<p>Testing</p>', '2014-12-18 07:57:09', '2014-12-18 06:57:09');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `username`, `password`, `about`, `last_activity`, `join_date`) VALUES
(1, 'Alex Tenche', 'alex.tenche@gmail.com', 'alexTenche.jpg', 'alextenche', 'a46501298d50abdaab072f2635b6f66b', 'web dev in devenire :)', '0000-00-00 00:00:00', '2014-12-15 10:36:48'),
(2, 'Blade', 'blade@gmail.com', 'blade.jpg', 'blade', 'a46501298d50abdaab072f2635b6f66b', 'He is the Daywalker', '0000-00-00 00:00:00', '2014-12-15 19:41:21'),
(3, 'IronMan', 'iron.man@gmail.com', 'ironman.jpg\r\n', 'ironMan', 'a46501298d50abdaab072f2635b6f66b', 'He''s the Ironman', '0000-00-00 00:00:00', '2014-12-16 19:16:18'),
(4, 'Winter Soldier', 'dawdwad@dwadwad', 'winterSoldier.jpg', 'wSoldier', 'a46501298d50abdaab072f2635b6f66b', 'The Winter Soldier', '2014-12-17 11:35:22', '2014-12-17 10:35:22'),
(5, 'test', 'test@gmail.com', 'poza1.png', 'test', 'a46501298d50abdaab072f2635b6f66b', 'adaddawd', '2014-12-17 19:54:30', '2014-12-17 18:54:30'),
(6, 'Joker', 'joker@gmail.com', 'joker.jpg', 'joker', 'a46501298d50abdaab072f2635b6f66b', 'joker', '2014-12-17 20:32:21', '2014-12-17 19:32:21'),
(7, 'Loki', 'loki@gmail.com', 'loki.jpg', 'loki', 'a46501298d50abdaab072f2635b6f66b', 'loki', '2014-12-17 20:38:23', '2014-12-17 19:38:23'),
(8, 'Poison Ivy', 'poison.ivy@gmail.com', 'poisonIvy.jpg', 'poisonIvy', 'a46501298d50abdaab072f2635b6f66b', 'One of the world''s most prominent eco-terrorists.', '2014-12-18 08:22:35', '2014-12-18 07:22:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
