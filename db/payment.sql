-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2014 at 07:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payment`
--
CREATE DATABASE IF NOT EXISTS `payment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `payment`;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

CREATE TABLE IF NOT EXISTS `messaging` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `status` varchar(8) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `debit` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`payment_id`, `debit`, `credit`) VALUES
(1, 0, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `midname` text NOT NULL,
  `type` varchar(7) NOT NULL,
  `student_number` int(11) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `midname`, `type`, `student_number`, `course`, `year`, `created`) VALUES
(1, 'admin', '1234', 'JhanJhan', 'Gaynilo', 'Erese', 'admin', 119, 'BSIT', 3, '2014-07-15'),
(2, 'user', '123456', 'Jan Roenz', 'Gaynilo', 'Erese', 'student', 874, 'BSBA', 1, '2014-07-19'),
(3, 'test1', '1234', 'Juan', 'Dela Cruz', 'Molino', 'student', 899, 'BSCRIM', 2, '2014-07-22'),
(4, 'test2', '1234', 'Alyssa Mae', 'Caburlan', 'Faraon', 'student', 143, 'BSHRM', 4, '2014-07-22'),
(5, 'test3', '1234', 'Juan', 'Dela Paz', 'Obito', 'student', 8874, 'BSA', 2, '2014-07-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
