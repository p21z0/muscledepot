-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 09:44 PM
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
  `subscription_name` varchar(65) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_type` varchar(256) NOT NULL,
  `amount` int(11) NOT NULL,
  `subscription_start` text NOT NULL,
  `subscription_end` text NOT NULL,
  `subscription_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`subscription_id`, `subscription_name`, `user_id`, `subscription_type`, `amount`, `subscription_start`, `subscription_end`, `subscription_status`) VALUES
(1, '20240218-ABC123', 1, '', 0, '2024-02-18 09:38:02', '2024-03-18 09:38:02', 'Active'),
(2, 'Somethingg', 4, '', 999, '2024-03-11', '2024-03-11', 'Expired'),
(3, 'Ij referral', 4, '', 2000, '2024-03-11', '2024-03-15', 'Active'),
(6, 'Gym PR of the month', 4, '', 800, '2024-03-31', '2024-04-30', 'Early bird'),
(7, 'First 50 - 1 month', 4, '', 1000, '2024-03-09', '2024-04-09', 'Active'),
(8, 'First 50 - 1 month', 4, 'Custom', 1000, '2024-03-09', '2024-04-09', 'Active'),
(9, 'First 50 - 1 month', 4, 'Custom', 1000, '2024-03-09', '2024-04-09', 'Active'),
(10, 'First 50 (1)', 4, 'Custom', 1000, '2024-04-09', '2024-05-09', 'Early bird'),
(11, 'F&F', 3, 'Custom', 1000, '2024-03-09', '2024-05-09', 'Active'),
(12, 'Walk in', 4, 'Custom', 100, '2024-03-10', '2024-03-10', 'Expired');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timelogs`
--

CREATE TABLE `tbl_timelogs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subscription_id` varchar(256) NOT NULL,
  `timelog_type` text NOT NULL,
  `time_day` text NOT NULL,
  `time_hour` text NOT NULL,
  `reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_timelogs`
--

INSERT INTO `tbl_timelogs` (`log_id`, `user_id`, `subscription_id`, `timelog_type`, `time_day`, `time_hour`, `reference`) VALUES
(1, 1, '20240218-ABC123', '', '2024-02-18 09:41:19', '2024-02-18 16:41:19', ''),
(2, 2, '20240218-DEF456', '', '2024-02-20 09:41:19', '2024-02-20 12:41:19', ''),
(3, 3, '20240218-HIJ789', '', '2024-02-18 09:41:19', '2024-02-18 10:41:19', ''),
(4, 0, '', '', '2024-02-27 20:55:39', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(5, 4, '', '', '2024-02-27 21:01:37', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(6, 4, '', '', '2024-02-28 13:38:32', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(7, 4, '', '', '2024-02-28 20:38:32', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(8, 4, '', '', '2024-02-28 20:38:34', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(9, 4, '', '', '2024-02-28 21:46:05', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(10, 4, '', '', '2024-02-28 21:46:19', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(11, 4, '', '', '2024-02-28 21:46:28', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(12, 4, '', '', '2024-02-28 21:46:43', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(13, 4, '', '', '2024-02-28 21:46:51', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(14, 4, '', '', '2024-02-29 20:48:03', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(15, 4, '', '', '2024-02-29 20:48:50', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(16, 4, '', '', '2024-02-29 20:49:06', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(17, 4, '', '', '2024-02-29 20:52:36', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(18, 4, '', '', '2024-02-29 20:53:44', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(19, 4, '', '', '2024-02-29 20:54:21', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(20, 4, '', '', '2024-02-29 21:03:43', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(21, 4, '', '', '2024-02-29 21:05:17', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(22, 4, '', '', '2024-02-29 21:07:57', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(23, 4, '', '', '2024-02-29 21:08:02', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(24, 4, '', '', '2024-02-29 21:08:07', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(25, 4, '', '', '2024-02-29 21:09:57', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(26, 4, '', '', '2024-03-01 23:58:48', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(27, 4, '', '', '2024-03-02 00:08:33', '0000-00-00 00:00:00', '20240224-CE64103E8B'),
(28, 4, '', '', '2024-03-04 00:00:00', '2002-10-08 00:00:00', '20240224-CE64103E8B'),
(29, 4, '', '', '2024-03-04', '02:12:25', '20240224-CE64103E8B'),
(30, 4, '', 'time in', '2024-03-04', '02:38:38', '20240224-CE64103E8B'),
(31, 4, '', 'time in', '2024-03-04', '02:38:43', '20240224-CE64103E8B'),
(32, 4, '', 'time in', '2024-03-04', '02:42:32', '20240224-CE64103E8B'),
(33, 4, '', 'time out', '2024-03-04', '02:51:05', '20240224-CE64103E8B'),
(34, 4, '', 'time out', '2024-03-04', '02:51:55', '20240224-CE64103E8B'),
(35, 4, '', 'time in', '2024-03-09', '09:27:47', '20240224-CE64103E8B'),
(36, 4, '', 'time in', '2024-03-09', '12:55:27', '20240224-CE64103E8B'),
(37, 4, '', 'time in', '2024-03-09', '12:56:18', '20240224-CE64103E8B'),
(38, 4, '', 'time in', '2024-03-09', '12:56:37', '20240224-CE64103E8B'),
(39, 4, '', 'time in', '2024-03-10', '22:08:13', '20240224-CE64103E8B'),
(40, 4, '', 'time in', '2024-03-10', '22:09:19', '20240224-CE64103E8B'),
(41, 4, '', 'time in', '2024-03-12', '05:06:16', '20240224-CE64103E8B'),
(42, 4, '', 'time in', '2024-03-12', '05:07:54', '20240224-CE64103E8B'),
(43, 4, '', 'time in', '2024-03-12', '05:14:08', '20240224-CE64103E8B'),
(44, 4, '', 'time in', '2024-03-12', '05:15:12', '20240224-CE64103E8B'),
(45, 4, '', 'time in', '2024-03-12', '18:29:14', '20240224-CE64103E8B'),
(46, 4, '', 'time in', '2024-03-12', '18:29:47', '20240224-CE64103E8B'),
(47, 4, '', 'time in', '2024-03-14', '23:08:06', '20240224-CE64103E8B');

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
  `email_address` text NOT NULL,
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

INSERT INTO `tbl_users` (`user_id`, `user_qr`, `user_pic`, `username`, `password`, `email_address`, `contact_no`, `firstname`, `lastname`, `birthdate`, `gender`, `user_type`, `user_status`) VALUES
(1, '', '', 'oramirez', 'oramirez', '', 0, 'Oliver', 'Ramirez', '2024-02-29', 'm', '1', '1'),
(2, '', '', 'msullivan', 'msullivan', '', 0, 'Mia', 'Sullivan', '1996-12-19', 'f', '0', '0'),
(3, '', '', 'jfoster', 'jfoster', '', 0, 'Jackson', 'Foster', '2003-04-20', 'm', '1', '1'),
(4, '20240224-CE64103E8B', '', 'MCRuz21', '', '', 992348855, 'Maria', 'Cruz', '2002-02-18', 'f', '1', '1'),
(5, '20240224-9A1C63BC1F', '', 'JDelaCruz_88', '', '', 2147483647, 'Juan Pogi', 'Dela Cruz', '1988-02-09', 'm', '0', '0');

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
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_timelogs`
--
ALTER TABLE `tbl_timelogs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
