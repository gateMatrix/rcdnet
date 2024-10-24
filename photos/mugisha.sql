-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 09, 2022 at 03:35 PM
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
-- Table structure for table `bencategory`
--

CREATE TABLE `bencategory` (
  `bid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bencategory`
--

INSERT INTO `bencategory` (`bid`, `name`, `description`) VALUES
(1, 'Vocational Education ', ''),
(2, 'ICT EDUCATION ', '');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `benid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` text NOT NULL,
  `nin` varchar(15) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `gender` text NOT NULL,
  `marital` text NOT NULL,
  `disability` text NOT NULL,
  `religion` text NOT NULL,
  `occupation` text NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `village` text NOT NULL,
  `subcounty` text NOT NULL,
  `district` text NOT NULL,
  `orphan` text NOT NULL,
  `sponsored` varchar(80) NOT NULL DEFAULT 'Not Sponsored',
  `donor` int(3) DEFAULT NULL,
  `deadparent` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`benid`, `category`, `name`, `nin`, `dob`, `gender`, `marital`, `disability`, `religion`, `occupation`, `parent`, `village`, `subcounty`, `district`, `orphan`, `sponsored`, `donor`, `deadparent`, `photo`) VALUES
(1, 2, 'ARIHO TYSON ', 'CM93034103JY8D', '1993-05-28', 'Male', 'Single', '', 'BORN AGAIN ', 'Student', 1, 'SALUTI A', 'NYAMWAMBA DIVISION ', 'KASESE', 'Yes', 'Sponsored', 22, 'None', '16625380294174386223969728201408.jpg'),
(2, 1, 'THUNGU KEFASI', 'N/A', '1999-12-18', 'Female', 'Single', 'N/A', 'CATHOLIC', 'Student', 5, 'KASIKA', 'RUKOKI', 'KASESE', 'Yes', 'Sponsored', 22, 'None', 'kefasi k.jpg'),
(3, 1, 'KABUGHO MARIAM', 'CF95015106WEKF', '1995-04-21', 'Female', 'Single', 'N/A', 'ANGLICAN', 'Student', 0, 'NYAKABALE', 'KYARUMBA', 'KASESE', 'No', 'Not Sponsored', NULL, 'Father', 'mariam.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(11) NOT NULL,
  `message` text,
  `user` varchar(45) DEFAULT NULL,
  `post` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `message`, `user`, `post`, `date`) VALUES
(4, 'This is a comment ', 'CEO  NDYAKURUNGI ', 8, '2022-06-21 11:00:18'),
(5, 'Okay. It seems to work.', 'Elke Nissen', 8, '2022-06-21 19:35:29'),
(6, 'You are welcome. Small by small we shall continue.', 'Mugisha', 8, '2022-06-21 20:30:56'),
(7, 'Thank you CEO for this initiative. We are surely glad.', 'Muhindo  Annah', 8, '2022-06-22 08:24:10'),
(8, '', 'Elke Nissen', 11, '2022-07-03 18:28:45'),
(9, 'You are welcome', 'Elke Nissen', 11, '2022-07-03 18:29:23'),
(10, '', 'Muhindo  Annah', 11, '2022-07-07 11:18:33'),
(11, 'We are so thankful ', 'Muhindo  Annah', 11, '2022-07-07 11:29:53'),
(12, 'Thanks so much for the love', 'KULE ALFRED', 11, '2022-07-07 13:03:35'),
(13, 'We are so thankful to our honorable Elke Nissen', 'Thembo Gideon', 11, '2022-07-07 16:27:49'),
(14, 'I am receiving pledges and cash to support this project. 200,000 promised pledges and 100,000 Cash. We are requiring Lunch for the trainers, Transport costs, and Fuel +Costs of hiring a Generator. \r\nImmediately we meet the budget, we shall start.', 'CEO  NDYAKURUNGI ', 10, '2022-07-22 13:16:27'),
(15, 'Amounts above are in Uganda Shillings ', 'Mugisha', 12, '2022-07-22 13:33:55'),
(16, 'We are warmly waiting for him tomorrow ', 'Muhindo  Annah', 13, '2022-07-31 18:42:58'),
(17, 'Good progress ,thank you.', 'Rt.Rev Bishop Nzerebende Thembo Jackson', 13, '2022-08-31 12:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `noticeid` int(11) NOT NULL,
  `category` varchar(80) DEFAULT NULL,
  `title` varchar(80) NOT NULL,
  `message` text,
  `user` varchar(45) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`noticeid`, `category`, `title`, `message`, `user`, `date`) VALUES
(8, 'General Annoucement', 'Product  Testing ', 'We are testing our system ', 'Mugisha', '2022-06-21 08:23:30.923229'),
(9, 'Upcoming Event', 'ICT FOR DEVELOPMENT - Empowering Communities', 'We shall be Conducting Computer Training at Divine Mercy Primary School.\r\nPreparations are on to ensure that we do our best.\r\nKindly pray for us as we mobilize resources.\r\n\r\nBest regards.\r\nMugisha Ndyakurungu', '', '2022-06-23 08:59:51.426649'),
(10, 'Upcoming Event', 'ICT FOR DEVELOPMENT - Empowering Communities', 'We shall be Conducting Computer Training at Divine Mercy Primary School. The project is intended to give ICT skills to the Staff to enhance their performance. Preparations are on to ensure that we do our best. Kindly pray for us as we mobilize resources.\r\nBest regards. \r\nMugisha.', 'CEO  NDYAKURUNGI ', '2022-06-23 09:04:08.694335'),
(11, 'General Annoucement', 'Receipt of Donor funds', 'This serves to inform  all Directors that we have received €100 from sister Elke Nissen. We shall visit the bank tomorrow.\r\nLet us record this with thanks.\r\nMugisha', 'CEO  NDYAKURUNGI ', '2022-07-03 18:25:25.713056'),
(12, 'Upcoming Event', 'ICT Training for STAFF at Divine Mercy Primary  School', 'I am receiving pledges and cash to support this project. 200,000 promised pledges and 100,000 Cash so far. We are fundraising  for Lunch for the trainers, Transport costs, and Fuel +Costs of hiring a Generator. Immediately we meet the budget, we shall start.', 'Mugisha', '2022-07-22 13:22:33.225821'),
(13, 'General Annoucement', 'Welcoming Dr Klaus  ', 'Dr Klaus is Uganda  again to Visit  RCDNET.\r\n\r\nWe shall be welcoming him tomorrow in Kasese at RCDNET OFFICE.\r\n\r\nThis therefore  serves to invite you all to this Important  occasion.\r\nThank you for your usual Cooperation.\r\n\r\nNDYAKURUNGI MUGISHA \r\nExecutive Director \r\n', 'CEO  NDYAKURUNGI ', '2022-07-31 18:26:24.152376');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `oid` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`oid`, `name`, `description`) VALUES
(1, 'Student', '');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `pid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nin` varchar(14) NOT NULL,
  `dob` text NOT NULL,
  `village` text NOT NULL,
  `religion` text NOT NULL,
  `occupation` text NOT NULL,
  `gender` text NOT NULL,
  `marital` text NOT NULL,
  `subcounty` text NOT NULL,
  `disability` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`pid`, `name`, `nin`, `dob`, `village`, `religion`, `occupation`, `gender`, `marital`, `subcounty`, `disability`, `photo`) VALUES
(1, 'MUNYANEZA JOHN', 'CM770461010FCC', '1977-10-02', 'BALINTUMA', 'BORN AGAIN ', 'PASTOR ', 'Male', 'Married', 'NAKAWA', '', '1662536881653919456415278942622.jpg'),
(2, 'MBABAZI JOLY', 'CF79046101718E', '1979-12-12', 'BALINTUMA', 'BORN AGAIN ', 'PASTOR ', 'Female', 'Married', 'NAKAWA', '', '16625373548391442384003243330903.jpg'),
(3, 'MBAMBU JANE', 'CF66015109MKKG', '1966-04-22', 'MULEHE', 'ANGLICAN', 'FARMER', 'Female', 'Married', 'BUGOYE', 'N/A', 'jane.jpg'),
(4, 'BIIRA FELEZIA', 'CF61015108CU8L', '1961-01-01', 'KASIKA', 'CATHOLIC', 'PEASANT', 'Female', 'Married', 'RUKOKI', 'N/A', 'felezia.jpg'),
(5, 'BALUKU DOMINIC', 'CM530151019WVK', '1953-01-01', 'KASIKA', 'CATHOLIC', 'PEASANT', 'Male', 'Married', 'RUKOKI', 'N/A', 'DOMINIC.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Nationality` varchar(255) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `photo` varchar(200) NOT NULL DEFAULT 'avatar.jpeg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `fullname`, `email`, `phone`, `Address`, `Nationality`, `role`, `photo`) VALUES
(1, 'admin', 'admin', 'Mugisha', 'mugisha@gmail.com', '0701775745', NULL, NULL, 'admin', 'avatar.jpeg'),
(9, 'admin', 'admino', 'Godwin Mumbere', 'gkangwanzi@gmail.com', '0785407551', NULL, NULL, 'staff', 'avatar.jpeg'),
(12, 'CEO', 'welcome', 'CEO  NDYAKURUNGI ', 'itechmugisha@gmail.com', '0775923599', NULL, NULL, 'staff', 'avatar.jpeg'),
(13, 'Elke', 'welcome', 'Elke Nissen', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(14, 'Muhindo', 'welcome', 'MUHINDO  JUSTINE', '', '0786056845', NULL, NULL, 'admin', 'avatar.jpeg'),
(15, 'Thembo', 'welcome', 'Rt.Rev Bishop Nzerebende Thembo Jackson', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(16, 'Gideon', 'welcome', 'Thembo Gideon', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(17, 'amos', 'welcome', 'Thembo  Amos', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(18, 'moreen', 'welcome', 'Masika  Moreen Kabajungu', '', '', NULL, NULL, 'staff', 'avatar.jpeg'),
(19, 'banyomire', 'welcome', 'Banyomire Mbura John', '', '', NULL, NULL, 'staff', 'avatar.jpeg'),
(20, 'annah', 'welcome', 'Muhindo  Annah', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(21, 'kisole', 'welcome', 'Kisole M Nason', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(22, 'klaus', 'welcome', 'Dr Klaus Schwerdtfeger', '', '', NULL, 'Germany', 'donor', 'avatar.jpeg'),
(23, 'jeniffer', 'welcome', 'Muhindo Jeniffer', '', '', NULL, NULL, 'admin', 'avatar.jpeg'),
(24, 'M&E OFFICER', 'welcome', 'KULE ALFRED', '', '', NULL, NULL, 'staff', 'avatar.jpeg'),
(25, 'Michael ', 'Welcome', 'Mr. Michael  Biermann', '', '', NULL, NULL, 'admin', 'avatar.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bencategory`
--
ALTER TABLE `bencategory`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`benid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeid`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bencategory`
--
ALTER TABLE `bencategory`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `benid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
