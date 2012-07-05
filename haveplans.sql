-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2012 at 02:22 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `location_id`, `event_from`, `event_to`, `event_title`, `event_date`) VALUES
(4, 4, '1:30am', '8:30am', 'Eating The shizz', '06/19/2012'),
(5, 5, '2:00am', '11:30am', 'blasphemy', '06/12/2012'),
(6, 6, '1:00am', '11:30am', 'germany', '06/29/2012'),
(7, 7, '9:00am', '3:30pm', 'coffee', '07/11/2012'),
(8, 7, '11', '12', 'fun times', '06/30/2012'),
(9, 8, '1:30am', '7:30am', 'fun time pt 2', '06/30/2012'),
(10, 9, '9:00am', '3:30pm', 'this time', '07/01/2012'),
(11, 10, '5:30pm', '10:30pm', 'Coffee time', '07/05/2012'),
(12, 11, '4:30am', '12:00pm', 'pleasing', '07/05/2012'),
(13, 12, '9:00am', '7:00pm', 'Friday', '07/06/2012'),
(14, 13, '12:00pm', '3:00pm', 'Saturday', '07/07/2012'),
(15, 14, '7:30am', '5:30pm', 'Eating garbage', '07/08/2012'),
(16, 15, '5:00am', '10:00am', 'anything ', '07/16/2012'),
(17, 16, '1:00am', '9:30am', 'yeah mang', '07/11/2012'),
(18, 17, '2:00am', '11:30am', 'ok mang', '07/09/2012'),
(19, 18, '1:30am', '2:00am', 'asdfas', '07/17/2012');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `friend_id` (`friend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(55, 2, 2),
(56, 2, 2),
(57, 2, 3),
(58, 2, 3),
(59, 5, 2),
(60, 5, 4),
(61, 6, 2),
(62, 6, 4),
(63, 4, 2),
(64, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`) VALUES
(4, 'ON CA K1T 1B7'),
(5, 'Anyer Serang Banten'),
(6, 'here'),
(7, '1124 Bank Street Ottawa'),
(8, 'here and there'),
(9, '711 Somerset Street West Ottawa'),
(10, 'tim hortons'),
(11, 'starbukcs'),
(12, 'Anywhere'),
(13, 'forklisft'),
(14, 'here'),
(15, 'shhop'),
(16, 'dafsdf'),
(17, 'asdfasd'),
(18, 'sadfasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'mynigga', '$2a$12$YQFu4d3GMeE11iDuheMbj.JhaaqItMEt2thiSl10IIcSS.xO.nI2W', 'sdfsdf@gmail.com'),
(2, 'steve', '$2a$12$VpvloYHLgHTtpm06D3othOdL9yYOwlTh3EGVPDs/yIiAy/ZXx/22a', 'dufr0028@gmail.com'),
(3, 'ak', 'fas;lkdhfpaow8ehflkjashd8f43', 'ak@gmail.com'),
(4, 'test', '$2a$12$MsiP3221ENQaOFnEibrXMuYG9TtS9C33WgHgy3d4Pg66X9vwYb0Vu', 'test@gmail.com'),
(5, 'that', '$2a$12$nAFUHOvzCFgSm3dhqM9anOxhRr.A3WZOxK95HMmFEajzHNQY3nTyK', 'that@gmail.com'),
(6, 'aekyung', '$2a$12$PzNGiW..SxrhIJD5jKvvC.7T1t/lvoEwYInWYC7SJlsWZGORDubpm', 'aekyung@gmail.com'),
(7, '', '$2a$12$/0cUx3tQITQaO/yUENMKUevVT/09BVEa8kc4Lk1UAf1VQYxpG8BZe', 'test@test.com'),
(8, '', '$2a$12$gIeIg1kmpHRlnhHZvLKYH.GrQjrBijErypJXVtxDuQVDW7lWBWGS2', 'test@test.com'),
(9, '', '$2a$12$Fa9hj5iqPT0TJuT4MMOkIepElyiZ.0FMx3JjmjUGSLcOF8n3tUvX.', 'test@test.com'),
(10, '', '$2a$12$Sfupngr4142QjAf6cISPpeTTFCi7cr1hLYTrNHLhrFy5HrBDy3pki', 'test@test.com'),
(11, '', '$2a$12$d0qFX6.RBBWaCrXdxCM8YuaoRgLhBZWhwQtsIbqp69PO9LlyGGnpi', 'test@test.com');

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
(2, 4, 1),
(3, 4, 0),
(2, 5, 1),
(5, 5, 1),
(2, 6, 1),
(5, 6, 1),
(6, 7, 1),
(2, 7, 1),
(2, 9, 1),
(3, 9, 0),
(5, 10, 1),
(2, 10, 1),
(2, 11, 1),
(4, 11, 1),
(2, 12, 1),
(4, 12, 1),
(2, 13, 1),
(3, 13, 0),
(2, 14, 1),
(4, 14, 1),
(2, 15, 1),
(3, 15, 0),
(2, 16, 1),
(2, 17, 1),
(2, 18, 1),
(4, 18, 1),
(4, 19, 1),
(2, 19, 1);

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
