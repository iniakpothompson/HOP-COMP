-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 09:40 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_photo`
--

CREATE TABLE `blog_photo` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_photo`
--

INSERT INTO `blog_photo` (`id`, `blog_id`, `file_path`) VALUES
(1, NULL, '5de8bb0fc2ed2738488689.jpg'),
(2, NULL, '5de8bc8d70527102320828.jpg'),
(3, NULL, '5de8bceed15f2582517420.jpg'),
(4, NULL, '5de8bd75907b0415931883.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_photo`
--
ALTER TABLE `blog_photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E458C7D0DAE07E97` (`blog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_photo`
--
ALTER TABLE `blog_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_photo`
--
ALTER TABLE `blog_photo`
  ADD CONSTRAINT `FK_E458C7D0DAE07E97` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
