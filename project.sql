-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 10:54 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_type_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `place` int(11) NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `email`, `account_type_id`, `active`, `place`, `created_on`) VALUES
(1, 'test', 'subject', 'test@email.com', 1, 0, 2, '2018-04-22 20:48:56'),
(2, 'john', 'doe', 'john@email.com', 2, 0, 1, '2018-04-22 20:49:18'),
(3, 'jane', 'doe', 'jane@email.com', 3, 0, 2, '2018-04-22 20:49:32'),
(4, 'jack', 'doe', 'jack@email.com', 3, 0, 2, '2018-04-22 20:49:45'),
(5, 'jim', 'doe', 'jim@email.com', 1, 1, 3, '2018-04-22 20:49:57'),
(6, 'jamie', 'doe', 'jamie@email.com', 2, 0, 2, '2018-04-22 20:50:12'),
(7, 'jill', 'doe', 'email@email.com', 3, 0, 1, '2018-04-22 22:12:30'),
(8, 'jason', 'doe', 'jason@email.com', 2, 0, 1, '2018-04-22 22:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE `account_types` (
  `id` int(11) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `cost` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `account_type`, `description`, `cost`) VALUES
(1, 'Silver', 'Trial Account', 10),
(2, 'Gold', 'Basic Account', 15),
(3, 'Platinum', 'Premium Account', 20);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `moved_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `account_id`, `place`, `moved_on`) VALUES
(1, 1, 2, '2018-04-21 20:50:49'),
(2, 6, 2, '2018-04-15 20:51:10'),
(3, 4, 2, '2018-04-17 20:52:22'),
(4, 5, 2, '2018-04-02 20:52:26'),
(5, 5, 4, '2018-04-10 20:52:29'),
(6, 5, 3, '2018-04-21 20:52:35'),
(7, 3, 2, '2018-04-22 22:09:57'),
(8, 3, 2, '2018-04-22 22:10:46'),
(9, 3, 2, '2018-04-22 22:11:07'),
(10, 3, 2, '2018-04-22 22:11:53'),
(11, 0, 1, '2018-04-22 22:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(5) NOT NULL,
  `place` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `place`, `description`) VALUES
(1, 'Confirmation', 'Initial state'),
(2, 'Setup', 'Account is being setup'),
(3, 'Activated', 'Account is active'),
(4, 'Deactivated', 'Account is deactivated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_types`
--
ALTER TABLE `account_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account_types`
--
ALTER TABLE `account_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
