CREATE DATABASE `secure_login`;

CREATE USER 'sec_user'@'localhost' IDENTIFIED BY '1q2w3e4r5t';
GRANT SELECT, INSERT, UPDATE ON `secure_login`.* TO 'sec_user'@'localhost';

-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 04:37 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `secure_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE IF NOT EXISTS `drugs` (
  `Name` varchar(20) NOT NULL DEFAULT '',
`Id` int(11) NOT NULL,
  `Substance` varchar(20) DEFAULT '100',
  `Content` float DEFAULT '200',
  `Description` varchar(20) DEFAULT NULL,
  `Take` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`Name`, `Id`, `Substance`, `Content`, `Description`, `Take`) VALUES
('aspirin', 1, '100', 200, NULL, NULL),
('depon', 2, '100', 200, NULL, NULL),
('valium', 3, '100', 200, NULL, NULL),
('ponstan', 4, '100', 200, NULL, NULL),
('buscopan', 5, '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1, '1424803629'),
(1, '1424803649'),
(2, '1424809489'),
(2, '1426173583'),
(5, '1426179372'),
(2, '1426459710'),
(2, '1426459720'),
(5, '1426785238'),
(2, '1427117981');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `capacity`, `password`, `salt`) VALUES
(1, 'test_user', 'test@example.com', 'patient', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef'),
(2, 'markella', 'asdf@asdf.asd', 'patient', 'b6887e8a6ff70470827f448810a846111cc5ac6c1c422f5383dd9c8dcf78233dee04c55cde7b85aaf04ff91fe17c14c18bfa1110570ce986e4a0de52566d646c', 'f38084c35ffb1d4ee3313a10a62110f5c5a75cb5e31571f81284ed60c2b699c4b167dc391a12a7b1dbb72e28846e88399ad26a3c26bebc52ca06d7ac9f77150c'),
(3, 'user', 'user@user.usr', 'patient', '51a843a5b02a12dd20243d3752cf68a0c0e13f8a31b7bab03df83992a088827ab7833cde1d56f11246dd6419bccad41e3683ad770b96a35a2f078fafdbd75e06', '9c7ba559fe5d92c8c9a066afe0f4df1da5e1ce1a04605243399cb7897a740a56b8110784e02ecbf8eb6a3e6ca978a3c42fbef0f37fa523dbfa840ca986e5713e'),
(4, 'drseuss', 'drseuss@user.usr', 'doctor', '01cb38c87345ba7b789b69db0959d33761e4a4777f90815eb9a24062d611fb81498e10cd48c2768fb48370b62918094696ab14ae61bda39b597460fb04883190', '376a9180db6f098db3d63a94c68a0f4013dc5ec984b6f1908cf2356fabff081dafe95b542f1a44e9eed7d14e24d5300819b18952498db820a361a89488dd548d'),
(5, 'drWho1', 'doctor@chanel.asd', 'doctor', '8db379f820a3e46837de2a97e8b48ddc6e2365d0e7dbfa71f51a0f372aa0c974e413e96e73ac3d066ac93f1e0c206014c5b1c095bd790cab65d8a9c349fef662', '95d047e53f07e11a6436983ba747b04a5b0c7b269ba1f16cd5c4cff1bb9b0083d19a4907e61aa4d7bca1f4e49ef9549581f2411ef85fc0610f02dd7699ddee4b'),
(8, 'drWho2', 'doctor2@chanel.asd', 'doctor', 'cb8dceb5316ab84d107fa28f4034400078aebfc1e86ed3390ac70e95067e31e0789be0e39d35a04e71d701d1e15da0024c6cc167f1757baeb0efb56c50f344cc', '5fa02a7ae4d8e9271c47bd8d30df69df99da705fad5f8a5700fe3823fbc29472a0bff95b145703061622e24327069222d7ab068ed4c6c9a6f77a8cd2f69e3d6c'),
(9, 'drWho3', 'doctor3@chanel.asd', 'doctor', 'ee6065128fd598cf3093600390236425940b263f71e4fc7936adb3311b1689cd30af01e03d1d2caa4eacd7cb3f045d5439cb71c353d7eb605ff3d73c7302343d', '9caf538d1e3e216884e92296b00f131c47f9117376b9c66934721420563098863a377295bb6f6104267b4057db2f4b171aa22eb5e2c96eea23626a84e79757d0'),
(13, 'drWho4', 'doctor4@chanel.asd', 'doctor', '80c33b53e4a0ce6db9c0ca5901883ddbff6e9b7f3ed603e30310c91006b3e40f8906407bed2ebc765b7d43712aa6a181e21d66f5ad6593701cabfab9260c02c0', '296d9691aed5e94d9153761142b8e7b6448e0e860b1ea0be81f2ad65e11c033481ae7d21d88a81255f89058647742493e285ba1d73141c33fc985395d9874807'),
(14, 'sheldon', 'drSheldonCooper@cbs.tv', 'patient', 'f9b5695b7cdaf114e8fc6a60567218f74726337bea8887289a77ecee913d69a799d4f9e55b5417262e8c4a9a395bcf0511d4c4333583431faa8eae0470e08ed1', '8acce05a4d5278e7fa8e1b6216b76f7d1a57aa643b177b4891595cd8b6593e14f3b5fd0568efd8ceb98cb00951ba32c89cc7dbef6b18ef4ff0a78d6882e5c176');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE IF NOT EXISTS `prescriptions` (
`Id` int(11) NOT NULL,
  `Doctor` varchar(20) DEFAULT NULL,
  `Drug` int(11) DEFAULT NULL,
  `Patient` varchar(20) DEFAULT NULL,
  `Dosage` int(11) DEFAULT NULL,
  `LastTaken` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`Id`, `Doctor`, `Drug`, `Patient`, `Dosage`, `LastTaken`) VALUES
(1, 'drWho1', 1, 'markella', 1, '2015-03-21 17:01:37'),
(2, 'drWho2', 2, 'sheldon', 2, '2015-03-21 17:01:37'),
(4, 'drWho2', 1, 'markella', 1, '2015-03-21 18:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `treated`
--

CREATE TABLE IF NOT EXISTS `treated` (
  `PUsername` varchar(20) NOT NULL,
  `DUsername` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treated`
--

INSERT INTO `treated` (`PUsername`, `DUsername`) VALUES
('markella', 'drWho1'),
('sheldon', 'drWho2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
 ADD PRIMARY KEY (`Id`,`Name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`), ADD FULLTEXT KEY `capacity` (`capacity`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `treated`
--
ALTER TABLE `treated`
 ADD PRIMARY KEY (`PUsername`,`DUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
