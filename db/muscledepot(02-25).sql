-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 10:41 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muscledepot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `subscription_id` int(11) NOT NULL,
  `subscription_ref` varchar(65) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_type` varchar(256) NOT NULL,
  `subscription_start` datetime NOT NULL,
  `subscription_end` datetime NOT NULL,
  `subscription_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`subscription_id`, `subscription_ref`, `user_id`, `subscription_type`, `subscription_start`, `subscription_end`, `subscription_status`) VALUES
(1, '20240218-ABC123', 1, '', '2024-02-18 09:38:02', '2024-03-18 09:38:02', '1'),
(2, '20240218-DEF456', 2, '', '2024-02-18 09:38:02', '2025-02-18 09:38:02', '1'),
(3, '20240218-HIJ789', 3, '', '2024-02-18 09:39:46', '2024-02-29 09:39:46', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timelogs`
--

CREATE TABLE `tbl_timelogs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_id` varchar(256) NOT NULL,
  `time_in` datetime NOT NULL,
  `time_out` datetime NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_timelogs`
--

INSERT INTO `tbl_timelogs` (`log_id`, `user_id`, `subscription_id`, `time_in`, `time_out`, `description`) VALUES
(1, 1, '20240218-ABC123', '2024-02-18 09:41:19', '2024-02-18 16:41:19', ''),
(2, 2, '20240218-DEF456', '2024-02-20 09:41:19', '2024-02-20 12:41:19', ''),
(3, 3, '20240218-HIJ789', '2024-02-18 09:41:19', '2024-02-18 10:41:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tracker`
--

CREATE TABLE `tbl_tracker` (
  `tracker_id` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tracker`
--

INSERT INTO `tbl_tracker` (`tracker_id`, `user_id`, `height`, `weight`) VALUES
(1, '1', 136, 58),
(2, '2', 234, 88),
(3, '3', 109, 44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_qr` text NOT NULL,
  `user_pic` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type` varchar(256) NOT NULL,
  `user_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_qr`, `user_pic`, `username`, `password`, `contact_no`, `firstname`, `lastname`, `birthdate`, `gender`, `user_type`, `user_status`) VALUES
(1, '', '', 'oramirez', 'oramirez', 0, 'Oliver', 'Ramirez', '2024-02-29', 'm', '1', '1'),
(2, '', '', 'msullivan', 'msullivan', 0, 'Mia', 'Sullivan', '1996-12-19', 'f', '0', '1'),
(3, '', '', 'jfoster', 'jfoster', 0, 'Jackson', 'Foster', '2003-04-20', 'm', '1', '1'),
(4, '20240224-CE64103E8B', '', 'MCRuz21', '', 992348855, 'Maria', 'Cruz', '2002-02-18', 'f', '1', '1'),
(5, '20240224-9A1C63BC1F', '', 'JDelaCruz_88', '', 2147483647, 'Juan Pogi', 'Dela Cruz', '1988-02-09', 'm', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  ADD PRIMARY KEY (`tracker_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tracker`
--
ALTER TABLE `tbl_tracker`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
