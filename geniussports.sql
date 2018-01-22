-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2018 at 08:26 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geniussports`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `album_name_index` (`name`) USING BTREE,
  KEY `artist_id` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `artist_id`, `name`) VALUES
(1, 1, 'Let it bleed'),
(2, 1, 'Aftermath'),
(4, 2, 'Bring it on'),
(5, 2, '5'),
(6, 2, 'Lenny'),
(7, 3, 'All Hope Is Gone'),
(9, 2, 'Black Velveteen'),
(13, 2, 'Revolution'),
(16, 4, 'Up All Night'),
(17, 4, 'Resurrection'),
(18, 3, 'Heretic Song'),
(19, 3, 'Before I forget'),
(20, 3, 'Day Of The Gusano'),
(21, 3, 'Welcome To Out Neighborhood'),
(22, 3, 'The Gray Chapter'),
(23, 7, 'Awake'),
(25, 7, 'Faceless'),
(28, 9, 'I told you'),
(29, 15, 'Crunk Juice'),
(30, 11, 'Follow the leader\r\n'),
(31, 11, 'Did my time');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `artist_name_index` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(10, 'Diddy'),
(4, 'East 17'),
(7, 'Godsmack'),
(11, 'Korn'),
(2, 'Lenny Kravitz'),
(15, 'Lil Jon'),
(13, 'Rico Richie'),
(8, 'Sean Paul'),
(3, 'Slipknot'),
(5, 'Steve Vai'),
(1, 'The Rolling Stones'),
(9, 'Tory Lanez');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
