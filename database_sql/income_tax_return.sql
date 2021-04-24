-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 09:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `income_tax_return`
--

-- --------------------------------------------------------

--
-- Table structure for table `income_details`
--

CREATE TABLE `income_details` (
  `user_id` varchar(10) NOT NULL,
  `gross_total` float NOT NULL,
  `total_deduction` float NOT NULL,
  `total_income` float NOT NULL,
  `net_tax` float NOT NULL,
  `tax_paid` float NOT NULL,
  `tax_payable` float NOT NULL,
  `refund_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_details`
--

INSERT INTO `income_details` (`user_id`, `gross_total`, `total_deduction`, `total_income`, `net_tax`, `tax_paid`, `tax_payable`, `refund_amount`) VALUES
('ABCDE1999X', 408000, 100000, 308000, 15400, 10000, 5400, 0),
('ACEBD1999Y', 550000, 200000, 350000, 17500, 14000, 3500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `user_id` varchar(10) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`user_id`, `password`) VALUES
('ABCDE1999X', '$2y$10$vboyJ0ZmjkuuqqsJatHqguj2LdiKaGxBBWzBBHL2VS3LOyTuiDHxG'),
('ACEBD1999Y', '$2y$10$A7pC.r54.k4FoeQOo5VLn.jSdnaZ0rDj4ZVlQSc1cKcpZPPDeTlsm');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `country` varchar(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `email`, `mobile_no`, `country`, `state`, `address`) VALUES
('ABCDE1999X', 'Sreejit', '', 'Dey', '1999-08-08', 'sdsreejitdey1999@gmail.com', '7980969031', 'India', 'West Bengal', '128, Jyotsna Apartment, Road Number 4, H.B.Town, Sodepur, Kolkata, 700110'),
('ACEBD1999Y', 'Samarpita', '', 'Das', '1999-04-10', 'samarpitadas1999@gmail.com', '9073562428', 'India', 'West Bengal', 'Paragon Apartment, Thana Road, Khardah, Kolkata, 700116');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `income_details`
--
ALTER TABLE `income_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `income_details`
--
ALTER TABLE `income_details`
  ADD CONSTRAINT `uid2` FOREIGN KEY (`user_id`) REFERENCES `login_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `uid` FOREIGN KEY (`user_id`) REFERENCES `login_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
