-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 11:47 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `normalized_database`
--
CREATE DATABASE IF NOT EXISTS `normalized_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `normalized_database`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `addressName` varchar(30) NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `state_id`, `addressName`) VALUES
(8, 1, 'E-7 Satyawati Colony'),
(9, 4, 'E-7 Satyawati Colony'),
(10, 2, 'E-7 Satyawati Colony'),
(11, 1, 'a.g');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(20) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `countryName`) VALUES
(1, 'India'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `friend_userName` varchar(20) NOT NULL,
  PRIMARY KEY (`friend_id`),
  KEY `userName` (`userName`,`friend_userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `userName`, `friend_userName`) VALUES
(7, 'a.g', 'chetan268'),
(4, 'akshay.arora', 'chetan268'),
(6, 'akshay.arora', 'chetan268'),
(2, 'aman.aggarwal', 'chetan268'),
(8, 'chetan268', 'a.g'),
(3, 'chetan268', 'akshay.arora'),
(5, 'chetan268', 'akshay.arora'),
(1, 'chetan268', 'aman.aggarwal');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `userName` varchar(20) NOT NULL,
  `interest` varchar(20) NOT NULL,
  KEY `userName` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`userName`, `interest`) VALUES
('chetan268', 'cricket'),
('chetan268', ''),
('chetan268', 'reading'),
('aman.aggarwal', 'gaming'),
('a.g', 'gaming'),
('akahay.arora', 'cricket'),
('chetan268', 'gaming');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `friend_userName` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `userName` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `userName`, `friend_userName`, `content`) VALUES
(11, 'chetan268', 'aman.aggarwal', 'chetan :: chetan to aman\r\n         '),
(12, 'aman.aggarwal', 'chetan268', 'chetan :: chetan to aman\r\n         ');

-- --------------------------------------------------------

--
-- Table structure for table `sharepost`
--

CREATE TABLE IF NOT EXISTS `sharepost` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `userName` (`userName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sharepost`
--

INSERT INTO `sharepost` (`post_id`, `userName`, `content`) VALUES
(2, 'chetan268', 'chetan :: i amn at my dorm\r\n            '),
(3, 'chetan268', 'chetan :: my 2nd post\r\n            '),
(4, 'aman.aggarwal', 'aman :: my 1st post\r\n            ');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `stateName` varchar(20) NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `stateName`) VALUES
(1, 1, 'Delhi'),
(2, 1, 'UP'),
(3, 1, 'Mumbai'),
(4, 1, 'Banglore'),
(5, 1, 'MP'),
(6, 2, 'California'),
(7, 2, 'New York'),
(8, 2, 'Las Vegas'),
(9, 2, 'Texas'),
(10, 1, 'Pune');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `location_id` int(11) NOT NULL,
  `about` varchar(100) NOT NULL,
  PRIMARY KEY (`userName`),
  UNIQUE KEY `userName` (`userName`),
  KEY `location_id` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`, `password`, `email`, `firstName`, `lastName`, `location_id`, `about`) VALUES
('a.g', 'a.g', 'a.g', 'ankur', 'garg', 11, 'a.g'),
('akshay.arora', 'ar', 'akshay.arora@gmail.com', 'akshay', 'arora', 10, 'i am akshay arora'),
('aman.aggarwal', 'aa', 'aman.aggarwal@gmail.com', 'aman', 'bansal', 9, 'i am aman aggarwal'),
('chetan268', 'cb', 'chetan268@gmail.com', 'chetan', 'bansal', 8, 'i am CEO');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`);

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

--
-- Constraints for table `sharepost`
--
ALTER TABLE `sharepost`
  ADD CONSTRAINT `sharepost_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `users` (`userName`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `address` (`address_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
