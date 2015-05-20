-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2015 at 12:02 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--
CREATE DATABASE IF NOT EXISTS `thesis` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `thesis`;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--
-- Creation: Feb 22, 2015 at 08:02 PM
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `Username` int(11) NOT NULL,
  `time` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Truncate table before insert `login_attempts`
--

TRUNCATE TABLE `login_attempts`;
-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--
-- Creation: Sep 25, 2014 at 07:45 PM
-- Last update: Sep 25, 2014 at 06:46 PM
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
`Id` int(11) NOT NULL,
  `Doctor` varchar(20) DEFAULT NULL,
  `Drug` varchar(20) DEFAULT NULL,
  `Patient` varchar(20) DEFAULT NULL,
  `Dosage` int(11) DEFAULT NULL,
  `LastTaken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `prescriptions`
--

TRUNCATE TABLE `prescriptions`;
--
-- Dumping data for table `prescriptions`
--

INSERT DELAYED IGNORE INTO `prescriptions` (`Id`, `Doctor`, `Drug`, `Patient`, `Dosage`, `LastTaken`) VALUES
(2, 'Hwo', 'aspirin', 'markella', 1, '2014-09-25 19:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `therapies`
--
-- Creation: Sep 25, 2014 at 01:52 PM
-- Last update: Sep 25, 2014 at 06:30 PM
--

DROP TABLE IF EXISTS `therapies`;
CREATE TABLE IF NOT EXISTS `therapies` (
  `Name` varchar(20) NOT NULL DEFAULT '',
`Id` int(11) NOT NULL,
  `ActiveSubstance` varchar(20) DEFAULT NULL,
  `TakeEvery` varchar(20) DEFAULT NULL,
  `AutoAdminister` tinyint(1) DEFAULT NULL,
  `TakeBefore` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `therapies`
--

TRUNCATE TABLE `therapies`;
--
-- Dumping data for table `therapies`
--

INSERT DELAYED IGNORE INTO `therapies` (`Name`, `Id`, `ActiveSubstance`, `TakeEvery`, `AutoAdminister`, `TakeBefore`) VALUES
('aspirin', 1, 'acetilosalicil', '', 1, 1),
('valium', 1, NULL, NULL, 0, 0),
('depon', 1, 'painkillers', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 22, 2015 at 08:25 PM
-- Last update: Feb 22, 2015 at 08:25 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(20) DEFAULT NULL,
  `salt` char(128) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Lastname` varchar(20) DEFAULT NULL,
  `Mail` varchar(20) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `Num` int(11) DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `Spesialty` varchar(30) DEFAULT NULL,
  `Capacity` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT DELAYED IGNORE INTO `users` (`Username`, `Password`, `salt`, `Name`, `Lastname`, `Mail`, `Street`, `Num`, `Telefone`, `Spesialty`, `Capacity`) VALUES
('markella', '123', '', 'markella', 'nik-them', NULL, '', NULL, NULL, NULL, '0'),
('danai', '123', '', 'danai', 'nik-them', NULL, '', NULL, NULL, NULL, '0'),
('drSews', '123', '', 'Dr', 'Sews', NULL, '', NULL, NULL, NULL, '1'),
('drHwo', '123', '', 'Dr', 'Hwo', NULL, '', NULL, NULL, NULL, '1'),
('fai', '123', '', 'fai', 'them', NULL, NULL, NULL, NULL, NULL, '2'),
('asdf', '123', '', 'asdf', 'asdf', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `therapies`
--
ALTER TABLE `therapies`
 ADD PRIMARY KEY (`Name`,`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `therapies`
--
ALTER TABLE `therapies`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
