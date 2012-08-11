-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2012 at 12:40 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `haveplans`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_id` int(11) NOT NULL,
  `event_from` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `event_to` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `event_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `event_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `location_id`, `event_from`, `event_to`, `event_title`, `event_date`) VALUES
(43, 12, '10:30am', '12:30pm', 'coffee', '07/15/2012');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `confirmed_friends` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`friend_id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id`, `friend_id`, `confirmed_friends`) VALUES
(47, 48, 1),
(47, 50, 1),
(48, 47, 1),
(48, 50, 1),
(50, 47, 1),
(50, 48, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`) VALUES
(12, '330 Queen Street Ottawa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `photo`) VALUES
(47, 'steve', '$2a$12$S/VQ8DcTp7G3RYlwyFhA4.NLDksJbchhWJ.aRwxMyrM/QDpA1KlN2', 'steve@gmail.com', 'anna.jpg'),
(48, 'toms', '$2a$12$SxOy6kEX7/1DCTW0lovCLOxHnoM3tnqffk9Tw1jE8PgqA316Bgfr.', 'toms@gmail.com', 'anna.jpg'),
(49, 'eric', '$2a$12$oPkPn.fd.GPZePGpCXXivOCW5gZXDSvKs7dFgmY3hmpCWv/FjZxXS', 'eric@test.com', 'anna.jpg'),
(50, 'pete', '$2a$12$/TEziaHEn8G1o6B/b294M.0F7vcUW5ZOKROMHLOUT7pYm1UrRjicC', 'pete@gmail.com', 'anna.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_events`
--

CREATE TABLE IF NOT EXISTS `user_events` (
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_events`
--

INSERT INTO `user_events` (`user_id`, `event_id`, `confirmed`) VALUES
(47, 43, 1),
(48, 43, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_events`
--
ALTER TABLE `user_events`
  ADD CONSTRAINT `user_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
