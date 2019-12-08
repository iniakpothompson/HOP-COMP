-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 09:42 AM
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
-- Table structure for table `hotels_hotel_location_details`
--

CREATE TABLE `hotels_hotel_location_details` (
  `hotels_id` int(11) NOT NULL,
  `hotel_location_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels_hotel_location_details`
--
ALTER TABLE `hotels_hotel_location_details`
  ADD PRIMARY KEY (`hotels_id`,`hotel_location_details_id`),
  ADD KEY `IDX_A6CC67E9F42F66C8` (`hotels_id`),
  ADD KEY `IDX_A6CC67E9DF38E2CC` (`hotel_location_details_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels_hotel_location_details`
--
ALTER TABLE `hotels_hotel_location_details`
  ADD CONSTRAINT `FK_A6CC67E9DF38E2CC` FOREIGN KEY (`hotel_location_details_id`) REFERENCES `hotel_location_details` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A6CC67E9F42F66C8` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
