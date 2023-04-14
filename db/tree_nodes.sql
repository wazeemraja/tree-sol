-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 03:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tree-sol-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tree_nodes`
--

CREATE TABLE `tree_nodes` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tree_nodes`
--

INSERT INTO `tree_nodes` (`id`, `parent_id`) VALUES
(1, 0),
(2, 1),
(3, 1),
(14, 1),
(16, 1),
(4, 2),
(6, 2),
(9, 2),
(19, 2),
(20, 2),
(5, 3),
(13, 3),
(15, 3),
(12, 4),
(17, 4),
(18, 4),
(7, 6),
(8, 6),
(25, 6),
(21, 7),
(22, 7),
(23, 7),
(24, 7),
(10, 9),
(11, 9),
(26, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tree_nodes`
--
ALTER TABLE `tree_nodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tree_nodes`
--
ALTER TABLE `tree_nodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
