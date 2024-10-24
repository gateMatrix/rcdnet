-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 07, 2022 at 03:27 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mugisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `reportdoc`
--

CREATE TABLE `reportdoc` (
  `docID` int(11) NOT NULL,
  `name` varchar(800) NOT NULL,
  `category` varchar(400) NOT NULL,
  `doc` varchar(200) NOT NULL,
  `date` varchar(14) NOT NULL,
  `type` varchar(80) NOT NULL,
  `month` varchar(80) NOT NULL,
  `year` varchar(12) NOT NULL,
  `status` varchar(12) DEFAULT 'NotApproved',
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reportdoc`
--
ALTER TABLE `reportdoc`
  ADD PRIMARY KEY (`docID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reportdoc`
--
ALTER TABLE `reportdoc`
  MODIFY `docID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
