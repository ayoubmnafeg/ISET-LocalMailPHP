-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 12:49 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mailminiprojet`
--

-- --------------------------------------------------------

--
-- Table structure for table `cc`
--

CREATE TABLE `cc` (
  `emailid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cc`
--

INSERT INTO `cc` (`emailid`, `email`) VALUES
(12, 'taherlad3ds@gmail.com'),
(45, 'ayoubmnafeg@gmail.com'),
(45, 'bilelzran@gmail.com'),
(47, 'ayoubmnafeg404@gmail.com'),
(47, 'taherlad3ds@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cci`
--

CREATE TABLE `cci` (
  `emailid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cci`
--

INSERT INTO `cci` (`emailid`, `email`) VALUES
(45, 'ayoubmnafeg404@gmail.com'),
(45, 'bilelzran@gmail.com'),
(47, 'ayoubmnafeg404@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `accountId` int(4) NOT NULL,
  `Pseudo` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `name` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`accountId`, `Pseudo`, `password`, `name`) VALUES
(24, 'ayoubmnafeg@gmail.com', '2yHLyMEMZz7Ao', 'ayoub'),
(26, 'farouk@gmail.com', '2yztZn48gPR1E', 'farouk'),
(27, 'ayoubmnafeg404@gmail.com', '2yf3FGLvoJBHE', 'ayoub');

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `emailid` int(5) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `object` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `timedate` datetime NOT NULL,
  `status` varchar(10) DEFAULT 'unseen',
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`emailid`, `sender`, `object`, `message`, `timedate`, `status`, `deleted`) VALUES
(3, 'ayoubmnafeg@gmail.com', 'hi', 'ayoub hdsihfi', '2022-12-04 16:14:20', 'unseen', 0),
(4, 'farouk@gmail.com', 'hello', 'farouk fihgoidjf', '2022-12-01 16:14:44', 'unseen', 1),
(5, 'taherlad3ds@gmail.com', 'ohayo', 'taher igzufbiahjf', '2022-12-04 17:07:20', 'unseen', 0),
(6, 'bilelzran@gmail.com', 'haaaaa3', 'bilel Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quidem, quas vero ea soluta voluptatibus veritatis, nemo pariatur porro ipsum sapiente reprehenderit nesciunt, iste et vel! Doloremque, iste officia sit eum in illo porro architecto vitae dignissimos dolor, quo ut, tempora quia tempore amet id mollitia deleniti blanditiis. Ullam, temporibus?', '2022-11-27 18:06:37', 'unseen', 0),
(7, 'daligwi@gmail.com', 'ahlaaaa', 'gwi  lyom 3id milad il taher', '2022-04-04 18:09:49', 'unseen', 0),
(12, 'ayoubmnafeg404@gmail.com', 'lol', 'hhhhhhhhhh', '2022-12-04 19:17:34', 'unseen', 0),
(40, 'ayoubmnafeg404@gmail.com', 'aaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-12-04 22:36:24', 'unseen', 0),
(41, 'ayoubmnafeg404@gmail.com', 'aaaa', 'aaaaaaaaaaaaaaa', '2022-12-04 22:36:49', 'unseen', 0),
(42, 'ayoubmnafeg404@gmail.com', 'files', 'aaaaaaaa', '2022-12-04 22:38:37', 'unseen', 0),
(43, 'ayoubmnafeg404@gmail.com', 'files', 'ayoub ddjsiojdo', '2022-12-05 00:48:11', 'unseen', 0),
(44, 'ayoubmnafeg404@gmail.com', 'files1542', 'pojzfpoafpoakfk', '2022-12-05 00:50:22', 'unseen', 0),
(45, 'ayoubmnafeg404@gmail.com', 'aaaa5', 'knwndq', '2022-12-05 00:55:11', 'seen', 0),
(46, 'ayoubmnafeg404@gmail.com', 'qqq', 'jebdnjwn', '2022-12-05 00:55:37', 'unseen', 0),
(47, 'ayoubmnafeg404@gmail.com', 'aajshdsjdlkskdjsd', 'isjd ksndq nd liq nsdjqnsidj bqisdbqibsd iqsbdiqbsnjkdbqs', '2022-12-05 01:29:31', 'seen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `piece joint`
--

CREATE TABLE `piece joint` (
  `emailid` int(5) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `emailid` int(5) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`emailid`, `email`) VALUES
(3, 'ayoubmnafeg404@gmail.com'),
(4, 'ayoubmnafeg404@gmail.com'),
(5, 'ayoubmnafeg404@gmail.com'),
(6, 'ayoubmnafeg404@gmail.com'),
(7, 'ayoubmnafeg404@gmail.com'),
(12, 'farouk@gmail.com'),
(43, 'farouk@gmail.com'),
(44, 'farouk@gmail.com'),
(45, 'farouk@gmail.com'),
(46, 'farouk@gmail.com'),
(47, 'ayoubmnafeg@gmail.com'),
(47, 'farouk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cc`
--
ALTER TABLE `cc`
  ADD PRIMARY KEY (`emailid`,`email`);

--
-- Indexes for table `cci`
--
ALTER TABLE `cci`
  ADD PRIMARY KEY (`emailid`,`email`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`accountId`),
  ADD UNIQUE KEY `psudo` (`Pseudo`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`emailid`);

--
-- Indexes for table `piece joint`
--
ALTER TABLE `piece joint`
  ADD PRIMARY KEY (`emailid`,`url`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`emailid`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `accountId` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `emailid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cc`
--
ALTER TABLE `cc`
  ADD CONSTRAINT `cc_ibfk_1` FOREIGN KEY (`emailid`) REFERENCES `mails` (`emailid`);

--
-- Constraints for table `cci`
--
ALTER TABLE `cci`
  ADD CONSTRAINT `cci_ibfk_1` FOREIGN KEY (`emailid`) REFERENCES `mails` (`emailid`);

--
-- Constraints for table `piece joint`
--
ALTER TABLE `piece joint`
  ADD CONSTRAINT `piece joint_ibfk_1` FOREIGN KEY (`emailid`) REFERENCES `mails` (`emailid`);

--
-- Constraints for table `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `receiver_ibfk_1` FOREIGN KEY (`emailid`) REFERENCES `mails` (`emailid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
