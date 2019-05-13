-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 07:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(750) NOT NULL,
  `category` varchar(2) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `category`, `images`) VALUES
(1, 'Lawnmower', 'lawnmover for rent', '01', ''),
(2, 'Lawn pads', 'lawnpads for rent', '01', ''),
(3, '', 'HI', '00', '0002.jpg'),
(4, '', 'HI', '00', '0002.jpg'),
(5, 'sfsdf', 'sdgd', '01', '0002.jpg'),
(6, 'ewf', 'work', '00', 'LunaLovegood_WB_F5_LunaLovegoodPromoCloseUp_Promo_'),
(7, 'test', 'test', '10', '29791901_225561061514118_1825775204366811136_n.jpg'),
(8, 'Test 2', 'Test 2', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(9, 'Test3', 'Test3', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(10, 'Test4', 'Test4', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(11, 'Test5', 'Test5', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(12, 'Test6', 'Test6', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(13, 'Test7', 'Test7', '99', ''),
(14, 'Test7', 'Test7', '99', '29791901_225561061514118_1825775204366811136_n.jpg'),
(15, 'Test7', 'Test7', '99', '29791901_225561061514118_1825775204366811136_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `confirmedads`
--

CREATE TABLE `confirmedads` (
  `id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(750) NOT NULL,
  `category` tinyint(2) NOT NULL,
  `images` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `activated`) VALUES
('hello', 'world', 1),
('sdv', 'rf', 1),
('tha', '1234', 1),
('user', '123', 1),
('user2', '456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index` (`id`);

--
-- Indexes for table `confirmedads`
--
ALTER TABLE `confirmedads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `confirmedads`
--
ALTER TABLE `confirmedads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
