-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql2.freemysqlhosting.net
-- Generation Time: Apr 07, 2018 at 12:09 PM
-- Server version: 5.5.54-0ubuntu0.12.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql2231015`
--

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`ID`, `name`, `email`) VALUES
(1, 'Administrate', 'admnstr@something.com'),
(2, 'Google', 'ggl@gmail.com'),
(3, 'Amazon', 'amazon@gmail.com'),
(4, 'AMD', 'amd@amd.com'),
(5, 'Intel', 'intel@intel.com');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `organisation` text NOT NULL,
  `organisationid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`ID`, `name`, `phone`, `organisation`, `organisationid`) VALUES
(2, 'Lamar Wolfe', '012449420', 'AMD', 4),
(3, 'Fadel Gaber', '07384376593', 'Administrate', 1),
(4, 'Brian Mcpherson', '055 3322 4467', 'Google', 2),
(5, 'Drew Conner', '0801 652 2441', 'Amazon', 3),
(6, 'Austin Dickerson', '055 4990 9805', 'Intel', 5),
(7, 'Camden Mason', '07995 803810', 'Intel', 5),
(8, 'Ivor Goff', '055 3921 9696', 'Administrate', 1),
(9, 'Gannon Jacobson', '(01953) 71229', 'Administrate', 1),
(12, 'Connor Sharpe', '123456878', 'Administrate', 1),
(16, 'Jeremy Jones', '213321321', 'Amazon', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `organisationid` (`organisationid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`organisationid`) REFERENCES `organisations` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
