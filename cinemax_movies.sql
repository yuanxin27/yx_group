-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 06:55 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemax movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(10) NOT NULL,
  `Contact_No` int(25) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Contact_No`, `Password`, `Address`, `Email`) VALUES
('botnet', 97861324, '$2y$11$imHts2spL7SMF7toeRzhb.wcNdYNzZBzHooOTtvpaGGZimR/b2Mrm', 'blk133 hougang road', 'botnet@gmail.com'),
('YuanXin', 97431111, '$2y$11$dr1hBuB6ShgNInFeVR3wl.vRkOu4Ph7Hx3rHRSTBcknek58G3oYrq', 'Blk22 Boon Keng Road', 'chuayx27@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `auditor`
--

CREATE TABLE `auditor` (
  `auditor_id` int(10) NOT NULL,
  `auditor_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10000) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditor`
--

INSERT INTO `auditor` (`auditor_id`, `auditor_name`, `username`, `password`, `address`, `email`, `contact`) VALUES
(12, '', 'firoz', '$2y$11$SYRnOE5pr40gQGp6d/nk5emje/g6qQDKa96gkdhHKJxS2hkKf.uZW', '', '', 0),
(13, '', 'iman', '$2y$11$U8FZP1YI09WrmevauN2s2eJVs0aBCieHHqwzZukeknfeOAIj3WPsm', '', '', 0),
(14, '', 'yuanxin', '$2y$11$DzaVKCVd21APxbCwSYByLOkK2fNzJWCuQZn4GW7Ck/VHRane5kjn6', '', '', 0),
(15, '', 'gayathri', '$2y$11$ZXZYXlZmxLKNvy6ZD5PvouJqDRIFPbDl1uU7gSyaBPTjXD6zPykaa', '', '', 0),
(16, '', 'zarif', '$2y$11$4.CgjMyAqvZnNiUT5T6X3.vPP8i0blhOHNrukTTVJApPNET8ePOLC', '', '', 0),
(17, '', 'alford', '$2y$11$gLPMbiQkTWeW1YUBcGtox.Pq5mABmvVdQ6C5O/NHL.asvKEQwuTWG', '', '', 0),
(18, '', 'joshua', '$2y$11$ns8LK8jdtIp1VW4cyQIQmeLDvcTs68L0f0VSgBFBxICPpSqfUEa1.', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(10) NOT NULL,
  `Customer_Username` varchar(20) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Customer_Contact_No` int(8) NOT NULL,
  `Customer_Password` varchar(4000) NOT NULL,
  `Customer_Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disabled_auditor`
--

CREATE TABLE `disabled_auditor` (
  `Username` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disabled_it`
--

CREATE TABLE `disabled_it` (
  `Username` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it personal`
--

CREATE TABLE `it personal` (
  `it_id` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` int(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `it personal`
--

INSERT INTO `it personal` (`it_id`, `Name`, `Address`, `Contact`, `Email`, `Username`, `Password`) VALUES
(4, '', '', 0, '', 'zarif', '$2y$11$XaOdvEp23Im01zBCSQDj6utEeAJGrwtCrSKvZWRTCMEPaH7TWCEWe'),
(5, '', '', 0, '', 'iman', '$2y$11$NJNdYO/O.4jbgs2jumpZBek.URkfRY//gSX3B1iDA0IzQkIWm/85O'),
(6, '', '', 0, '', 'firoz', '$2y$11$t0o80KNv2D4owa5Yzu8b5uUb1kjy2Ym9BEEhLCn3N3eUw55oxm8q2');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  `target_user` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `event_id`, `date`, `username`, `target_user`) VALUES
(571, 22, '2018-02-11 05:26:12', 'YuanXin', 'weifeng'),
(572, 20, '2018-02-11 05:28:37', 'YuanXin', 'weifeng'),
(573, 13, '2018-02-11 05:28:59', 'YuanXin', ''),
(574, 24, '2018-02-11 05:31:59', 'YuanXin', ''),
(575, 24, '2018-02-11 05:32:25', 'YuanXin', ''),
(576, 24, '2018-02-10 17:33:03', 'YuanXin', ''),
(577, 10, '2018-02-10 17:33:58', 'zarif', ''),
(578, 26, '2018-02-10 17:34:11', 'zarif', ''),
(579, 26, '2018-02-10 17:34:51', 'zarif', ''),
(580, 10, '2018-02-10 17:35:34', 'zarif', ''),
(581, 27, '2018-02-10 17:37:47', 'zarif', 'zarif'),
(582, 10, '2018-02-10 17:39:09', 'firoz', ''),
(583, 27, '2018-02-10 17:41:47', 'firoz', 'firoz');

-- --------------------------------------------------------

--
-- Table structure for table `log_event`
--

CREATE TABLE `log_event` (
  `event_id` int(10) NOT NULL,
  `event_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_event`
--

INSERT INTO `log_event` (`event_id`, `event_details`) VALUES
(1, 'Auditor Login'),
(2, 'Auditor Logout'),
(3, 'New Remark Created'),
(4, 'Remark Edited'),
(5, 'Remark Deleted'),
(6, 'Audit Logs Viewed'),
(7, 'Remarks Viewed'),
(8, 'IT Personnel Login'),
(9, 'IT Personnel Logout'),
(10, 'Customer Login'),
(11, 'Customer Logout'),
(12, 'Administrator Login'),
(13, 'Administrator Logout'),
(14, 'IT Personnel Account Enabled'),
(15, 'IT Personnel Account Disabled'),
(16, 'Auditor Account Disabled'),
(17, 'Auditor Account Enabled'),
(18, 'IT Personnel Account Created'),
(19, 'Auditor Account Created'),
(20, 'IT Personnel Account Deleted'),
(21, 'Auditor Account Deleted'),
(22, 'IT Personnel Account Particulars Updated'),
(23, 'Auditor Account Particulars Updated'),
(24, 'Failed Administrator Login'),
(25, 'Customer Register'),
(26, 'Customer Particulars Updated'),
(27, 'Customer Account Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `log_remarks`
--

CREATE TABLE `log_remarks` (
  `log_id` int(10) NOT NULL,
  `auditor_id` int(10) NOT NULL,
  `remark_details` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remark_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `auditor`
--
ALTER TABLE `auditor`
  ADD PRIMARY KEY (`auditor_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD UNIQUE KEY `Customer_ID` (`Customer_ID`),
  ADD UNIQUE KEY `Customer_Username` (`Customer_Username`);

--
-- Indexes for table `it personal`
--
ALTER TABLE `it personal`
  ADD PRIMARY KEY (`it_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `log_event`
--
ALTER TABLE `log_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `log_remarks`
--
ALTER TABLE `log_remarks`
  ADD PRIMARY KEY (`remark_id`),
  ADD KEY `auditor_id` (`auditor_id`),
  ADD KEY `log_id` (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auditor`
--
ALTER TABLE `auditor`
  MODIFY `auditor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `it personal`
--
ALTER TABLE `it personal`
  MODIFY `it_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;

--
-- AUTO_INCREMENT for table `log_remarks`
--
ALTER TABLE `log_remarks`
  MODIFY `remark_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `log_event` (`event_id`);

--
-- Constraints for table `log_remarks`
--
ALTER TABLE `log_remarks`
  ADD CONSTRAINT `auditor_id` FOREIGN KEY (`auditor_id`) REFERENCES `auditor` (`auditor_id`),
  ADD CONSTRAINT `log_id` FOREIGN KEY (`log_id`) REFERENCES `log` (`log_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
