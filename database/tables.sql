-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2012 at 06:51 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

USE CyberDoc;
--
-- Database: `alz`
--

-- --------------------------------------------------------

--
-- Table structure for table `Doctors`
--
DROP TABLE IF EXISTS `Doctors`;
CREATE TABLE IF NOT EXISTS `Doctors` (
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `DUsername` varchar(20) NOT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Mail` varchar(20) DEFAULT NULL,
  `Street` varchar(20) DEFAULT NULL,
  `Num` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Specialty` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DUsername`, `Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `Drugs`
--
DROP TABLE IF EXISTS `Drugs`;
CREATE TABLE IF NOT EXISTS `Drugs` (
  `Name` varchar(20) DEFAULT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Substance` varchar(20) DEFAULT '100',
  `Content` float DEFAULT '200',
  `Description` varchar(20) DEFAULT NULL,
  `Take` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`, `Name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `Patients`
--
DROP TABLE IF EXISTS `Patients`;
CREATE TABLE IF NOT EXISTS `Patients` (
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `PUsername` varchar(20) NOT NULL,
  `Pass` varchar(20) DEFAULT NULL,
  `Mail` varchar(20) DEFAULT NULL,
  `Street` varchar(20) DEFAULT NULL,
  `Num` varchar(20) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Telephone` varchar(20) DEFAULT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `Month` varchar(20) DEFAULT NULL,
  `Year` varchar(20) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Treated` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PUsername`, `Mail`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `Prescriptions`
--
DROP TABLE IF EXISTS `Prescriptions`;
CREATE TABLE IF NOT EXISTS `Prescriptions` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Doctor` varchar(20) DEFAULT NULL,
  `Drug` int(11) DEFAULT NULL,
  `Patient` varchar(20) DEFAULT NULL,
  `Dosage` int(11) DEFAULT NULL,
  `LastTaken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- -----------------------------------------------------


--
-- Table structure for table `Treated`
--
DROP TABLE IF EXISTS `Treated`;
CREATE TABLE IF NOT EXISTS `Treated` (
  `PUsername` varchar(20) NOT NULL,
  `DUsername` varchar(20) NOT NULL,
  PRIMARY KEY (`PUsername`, `DUsername`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
