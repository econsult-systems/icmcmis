-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2012 at 05:49 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icmcmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `encounter`
--

CREATE TABLE IF NOT EXISTS `encounter` (
  `encounter_id` int(10) NOT NULL AUTO_INCREMENT,
  `patient_id` int(10) DEFAULT NULL,
  `date_of_encounter` timestamp NULL DEFAULT NULL,
  `received_by` int(10) DEFAULT NULL,
  `specifics_id` int(10) DEFAULT NULL,
  `encounter_type` int(10) DEFAULT NULL,
  PRIMARY KEY (`encounter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `encounter`
--

INSERT INTO `encounter` (`encounter_id`, `patient_id`, `date_of_encounter`, `received_by`, `specifics_id`, `encounter_type`) VALUES
(1, 1, '2012-01-14 21:00:00', 1, 1, 1),
(2, 6, '2012-02-15 15:35:14', 10, NULL, 4),
(3, 1, '2012-02-15 15:32:29', 20, NULL, 0),
(4, 6, '2012-02-15 15:34:24', 20, NULL, 1),
(5, 6, '2012-02-15 15:35:14', 30, NULL, 2),
(6, 6, '2012-02-15 15:40:29', 10, NULL, 5),
(7, 1, '2012-02-15 15:44:06', 10, NULL, 3),
(8, 1, '2012-02-15 15:48:52', 20, NULL, 6),
(9, 1, '2012-02-15 15:51:51', 2, NULL, 4),
(11, 6, '2012-02-15 16:30:16', 10, NULL, 4),
(12, 7, '2012-02-15 16:45:25', 12, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `encounter_type`
--

CREATE TABLE IF NOT EXISTS `encounter_type` (
  `encounter_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `encounter_type_name` varchar(50) DEFAULT NULL,
  `encounter_type_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`encounter_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `person_id`) VALUES
(1, 1),
(6, 4),
(7, 8),
(9, 10),
(10, 11),
(11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(15) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `alt_phone_number` varchar(15) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `birthdate_estimate` int(10) DEFAULT NULL,
  `alive` smallint(5) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `first_name`, `surname`, `given_name`, `gender`, `address`, `phone_number`, `alt_phone_number`, `birthdate`, `birthdate_estimate`, `alive`, `date_created`, `created_by`) VALUES
(1, 'Harry', 'Kimani', 'Kim', 'male', '65645-06, Nyeri', '0734546422', '020775893', '1990-02-21', 21, 1, '2012-02-05 15:42:48', 10),
(4, 'Nancy', 'Baraza', 'Nose Pincher', 'female', '45365, Nairobi', '0733776994', '020877499', '1962-01-21', 50, 1, '2012-02-05 15:42:48', 10),
(6, NULL, NULL, NULL, 'male', NULL, NULL, NULL, '1989-09-23', 0, 1, '2012-02-15 00:49:48', 3),
(7, NULL, NULL, NULL, 'male', NULL, NULL, NULL, '1990-08-12', 0, 1, '2012-02-15 12:37:48', 3),
(8, 'Angy', 'Ness', '', 'female', '87564, Nyeri', '0723554776', '', '1990-08-12', 21, 1, '2012-02-15 12:42:40', 12),
(9, NULL, NULL, NULL, 'female', NULL, NULL, NULL, '1982-08-12', 29, 1, '2012-02-15 12:53:16', 11);

-- --------------------------------------------------------

--
-- Table structure for table `person_contact`
--

CREATE TABLE IF NOT EXISTS `person_contact` (
  `person_id` int(10) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `alt_phone_number` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `person_name`
--

CREATE TABLE IF NOT EXISTS `person_name` (
  `person_id` int(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `given_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `privilege_id` int(10) NOT NULL AUTO_INCREMENT,
  `privilege` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege_id`, `privilege`, `description`) VALUES
(1, 'add patient', 'Add patient record'),
(2, 'edit patient', 'Edit patient records'),
(4, 'archive patient', 'Archive patient records');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`, `description`) VALUES
(1, 'admin', 'All user privileges'),
(2, 'guest', 'Limited user priviliges'),
(3, 'manager', 'All administrative tasks'),
(5, 'supervisor', 'View all staff records');

-- --------------------------------------------------------

--
-- Table structure for table `role_privilege`
--

CREATE TABLE IF NOT EXISTS `role_privilege` (
  `role_privilege_id` int(10) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) DEFAULT NULL,
  `privilege_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`role_privilege_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specifics`
--

CREATE TABLE IF NOT EXISTS `specifics` (
  `specifics_id` int(10) NOT NULL,
  `diagnosis` varchar(4096) DEFAULT NULL,
  `treatment` varchar(4096) DEFAULT NULL,
  PRIMARY KEY (`specifics_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(10) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `salt` varchar(50) DEFAULT NULL,
  `secret_question` varchar(255) DEFAULT NULL,
  `secret_answer` varchar(255) DEFAULT NULL,
  `creator_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `person_id`, `username`, `user_password`, `salt`, `secret_question`, `secret_answer`, `creator_id`) VALUES
(1, 1, 'admin', 'abcd123123', '123123abcd', 'Hey', 'Hey There', 12),
(3, 4, 'guest', NULL, NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_id` int(10) NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
