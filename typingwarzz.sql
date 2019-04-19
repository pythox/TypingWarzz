-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 06:40 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `typingwarzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(50) NOT NULL,
  `profile_id` varchar(50) NOT NULL,
  `speed` int(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`match_id`, `profile_id`, `speed`, `rank`, `time`) VALUES
(37, 'meetu', 32, 'NOOB', '19'),
(38, 'admin', 62, 'NOOB', '10'),
(39, 'admin', 56, 'NOOB', '11'),
(40, 'admin', 56, 'NOOB', '11'),
(41, 'temp', 48, 'NOOB', '13');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profile_id` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `total_speed` int(50) NOT NULL,
  `total_races` int(50) NOT NULL,
  `total_accuracy` int(50) NOT NULL,
  `total_time` int(50) NOT NULL,
  `country` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `user_id`, `password`, `first_name`, `last_name`, `email`, `profession`, `rank`, `total_speed`, `total_races`, `total_accuracy`, `total_time`, `country`) VALUES
(11, 'meetu', 'meetu', 'Meetu', 'Patel', 'meetuspatel@gmail.com', '', 'Noob', 32, 1, 0, 19, 0),
(12, 'admin', 'admin', 'Meet', 'Dadhania', 'meet.dadhania@outlook.com', '', 'Noob', 174, 3, 0, 32, 0),
(13, 'temp', 'temp', 'temp', 'temp', 'temp@temp.com', '', 'Noob', 48, 1, 0, 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `textdata`
--

CREATE TABLE `textdata` (
  `text_id` int(11) NOT NULL,
  `text_info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `textdata`
--

INSERT INTO `textdata` (`text_id`, `text_info`) VALUES
(6, 'this is a sample paragraph for lamp project number 1'),
(7, 'this is a sample paragraph for LAMP project number 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD UNIQUE KEY `userid` (`user_id`);

--
-- Indexes for table `textdata`
--
ALTER TABLE `textdata`
  ADD PRIMARY KEY (`text_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profile_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `textdata`
--
ALTER TABLE `textdata`
  MODIFY `text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
