-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2014 at 07:23 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cyberdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `DUsername` varchar(20) NOT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Specialty` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Fname`, `Lname`, `DUsername`, `Pass`, `Specialty`) VALUES
('Dr', 'Who', 'drwho', '1234', 'GP'),
('Dr', 'Seuss', 'drseuss', '1234', 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE IF NOT EXISTS `drugs` (
  `Name` varchar(20) DEFAULT NULL,
  `Id` int(11) NOT NULL,
  `RDD` float DEFAULT '100',
  `MDD` float DEFAULT '200',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`Name`, `Id`, `RDD`, `MDD`) VALUES
('Vicodin', 1, 100, 200),
('Valium', 2, 40, 100),
('Augmentin', 3, 100, 200);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `Treated` varchar(20) DEFAULT NULL,
  `PUsername` varchar(20) NOT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Telephone` varchar(15) NOT NULL,
  PRIMARY KEY (`PUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Fname`, `Lname`, `Treated`, `PUsername`, `Pass`, `Telephone`) VALUES
('Basia', 'Zoura', 'drwho', 'Basia', '1234', ''),
('Markella', 'Nikolopoulou', 'drwho', 'Markella', '1234', '+306976928623'),
('George', 'Kantasis', 'drwho', 'George', '1234', ''),
('Kleio', 'Oikonomou', 'drseuss', 'kleio', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Doctor` varchar(20) DEFAULT NULL,
  `Drug` int(11) DEFAULT NULL,
  `Patient` varchar(20) DEFAULT NULL,
  `Dosage` int(11) DEFAULT NULL,
  `LastTaken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`Id`, `Doctor`, `Drug`, `Patient`, `Dosage`, `LastTaken`) VALUES
(1, 'test', 0, 'test', 1, '2012-09-29 15:29:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
