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



INSERT INTO `Doctors` (`Fname`, `Lname`, `DUsername`, `Pass`, `Mail`, `Street`, `Num`, `City`, `Telephone`, `Specialty`) VALUES
('Dr', 'Who', 'drwho', '1234','','police','box','london','', 'TV'),
('Dr', 'Seuss', 'drseuss', '1234','','book', 'self','lybrary','', 'TV');


-- --------------------------------------------------------



INSERT INTO `Drugs` (`Name`, `Id`, `Substance`,`Content`,`Description`,`Take`) VALUES
('Vicodin', 1,'', 200, '', ''),
('Valium', 2, '', 100, '', ''),
('Augmentin', 3,'', 200, '', '');

-- --------------------------------------------------------







INSERT INTO `Patients` (`Fname`, `Lname`, `PUsername`, `Pass`, `Mail`, `Street`, `Num`, `City`, `Telephone`, `Day`, `Month`, `Year`, `Gender`,`Treated`) VALUES
('Basia', 'Zoura', 'Basia', '1234','','','','','','','','','', 'drwho'),
('Markella', 'Nikolopoulou', 'Markella', '1234','','','','','','','','', '+306976928623','drwho'),
('Kleio', 'Oikonomou', 'kloik', '1234','','','','','','','','','','drseuss'),
('George', 'Kantasis', 'George', '1234','','','','','','','','','','drwho');
-- --------------------------------------------------------

--

INSERT INTO `Prescriptions` (`Id`, `Doctor`, `Drug`, `Patient`, `Dosage`, `LastTaken`) VALUES
(1, 'test', 0, 'test', 1, '2012-09-29 18:29:35');
