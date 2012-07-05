-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2012 at 06:15 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `location_id`, `event_from`, `event_to`, `event_title`, `event_date`) VALUES
(33, 36, '2:00am', '11:30am', 'steve', '06/12/2012'),
(34, 37, '2:00am', '11:30am', 'steve', '06/12/2012'),
(35, 38, '1:00am', '2:00am', 'This is okay', '06/19/2012'),
(36, 39, '1:30am', '1:30am', 'hello', '06/12/2012'),
(37, 40, '1:00am', '1:30am', 'dafasdfs', '06/12/2012'),
(38, 41, '1:00am', '1:30am', 'dafasdfs', '06/12/2012'),
(39, 42, '1:30am', '2:00am', 'this and that', '06/20/2012'),
(40, 43, '1:30am', '1:30am', 'thia', '06/12/2012'),
(41, 44, '2:00am', '2:00am', 'sdafas', '06/11/2012'),
(42, 45, '1:00am', '12:30am', 'asdfasd', '06/12/2012'),
(43, 46, '1:30am', '1:30am', 'asdfadsf', '06/11/2012'),
(44, 47, '2:00am', '10:00am', 'This time', '06/11/2012'),
(45, 48, '2:00am', '2:00am', 'asdfasd', '06/18/2012'),
(46, 49, '2:00am', '1:30ama', 'sdafas', '06/12/2012'),
(47, 50, '2:00am', '1:30am', 'dafsdf', '06/11/2012'),
(48, 51, '1:30am', '2:00am', 'coffe', '06/05/2012');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=81 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`) VALUES
(77, 5, 2),
(78, 5, 3),
(79, 6, 2),
(80, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `address`) VALUES
(36, 'dirty'),
(37, 'dirty'),
(38, 'here my mang'),
(39, 'okay '),
(40, 'shoot'),
(41, 'shoot'),
(42, 'yessir'),
(43, 'anyone'),
(44, 'asdfasdf'),
(45, 'asdfasd'),
(46, 'asdfasdf'),
(47, 'asdfasd'),
(48, 'asdfasd'),
(49, 'asdfasdf'),
(50, 'dsafsdf'),
(51, '1124 Bank Street Ottawa');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'mynigga', '$2a$12$YQFu4d3GMeE11iDuheMbj.JhaaqItMEt2thiSl10IIcSS.xO.nI2W', 'sdfsdf@gmail.com'),
(2, 'steve', '$2a$12$VpvloYHLgHTtpm06D3othOdL9yYOwlTh3EGVPDs/yIiAy/ZXx/22a', 'dufr0028@gmail.com'),
(3, 'ak', 'fas;lkdhfpaow8ehflkjashd8f43', 'ak@gmail.com'),
(4, 'test', '$2a$12$MsiP3221ENQaOFnEibrXMuYG9TtS9C33WgHgy3d4Pg66X9vwYb0Vu', 'test@gmail.com'),
(5, 'this', '$2a$12$bA9CBCtfncDs9NBk6iDFA.4rkmRV.twsJs9AqMKVfN/SEN1endEFu', 'this@gmail.com'),
(6, 'bash', '$2a$12$f9cBcHBvwSBNX5ThcVtD3eP.oGz2ohyN4hOLDxsqdJvYvrcHcqlNu', 'bash@gmail.com');

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
(5, 34, 1),
(5, 35, 1),
(2, 35, 0),
(5, 36, 1),
(5, 37, 1),
(5, 38, 1),
(5, 39, 1),
(5, 40, 1),
(5, 41, 1),
(5, 42, 1),
(5, 43, 1),
(5, 35, 0),
(5, 44, 1),
(2, 44, 0),
(5, 1, 0),
(2, 45, 1),
(2, 46, 1),
(2, 47, 1),
(6, 48, 1),
(2, 48, 0);

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
