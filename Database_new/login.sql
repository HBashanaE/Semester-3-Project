-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 05:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `approve` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `description`, `image`, `approve`) VALUES
(8, 'Cleaning appliences', 'day', 'clean.jpg', 'approve'),
(9, 'Electrical/Electronic', 'boy', 'watch_dogs.jpg', ''),
(15, 'Catering', 'rukmansjsbfajkdsbfkj', 'bangladesh-flag1.jpg', 'approve'),
(25, 'Vehicles', 'you can use to clean', 'Cleaning.jpg', 'approve'),
(26, 'Electrical/Electronic', 'amazing.', 'new.png', 'approve'),
(27, 'Catering', 'wawawaw', '1b7b8ff8c41df6f7ef0c70ef7255dbe6-01 (2).jpeg', ''),
(28, 'Building and construction', 'dfdgdgdg', '3d-Desktop-Backgrounds.jpg', 'approve'),
(31, 'Vehicles', 'mia', 'mia-khalifa.jpg', ''),
(32, 'Cleaning appliences', 'hau bai', '2-to-4.png', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `ad_image`
--

CREATE TABLE `ad_image` (
  `id` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ad_image`
--

INSERT INTO `ad_image` (`id`, `title`, `description`, `image`) VALUES
(3, '', '', ''),
(1, 'say', 'does', 'KuliyataActivityDiagram2.jpg'),
(2, 'sey', 'kkjk', 'i.png');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `activated`, `mail`) VALUES
('akash', '12345', 1, 'akash@gmail.com'),
('hiruna_kumara', '$2y$10$LU86FL.RclRSr.42VK/bmukuz1I9vFsT6IQT700cc92QoWaufs4/e', 1, 'vshkumara@gmail.com'),
('kashyapaniyarepola', '$2y$10$LU86FL.RclRSr.42VK/bmukuz1I9vFsT6IQT700cc92QoWaufs4/e', 1, 'kashyapaniyarepola97@gmail.com'),
('pathum', '12345678', 1, 'pathum@gmail.com'),
('primesh', 'kuliyata', 1, 'primeshs.17@cse.mrt.ac.lk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_image`
--
ALTER TABLE `ad_image`
  ADD PRIMARY KEY (`title`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`) USING BTREE,
  ADD UNIQUE KEY `image` (`image`) USING BTREE;

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
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ad_image`
--
ALTER TABLE `ad_image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
