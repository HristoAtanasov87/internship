-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 12:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `company` varchar(255) NOT NULL,
  `salary` int(10) NOT NULL,
  `logo` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `responsibilities` varchar(1000) NOT NULL,
  `createdOn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `title`, `description`, `company`, `salary`, `logo`, `location`, `type`, `responsibilities`, `createdOn`) VALUES
(6, 'Driver', 'Drive a car.', 'Testdrive', 100, 'https://www.chasingthedonkey.com/wp-content/uploads/2017/11/Car-Hire_Rent-A-car-1149997_1280.jpg', 'Varna', 'Driving', 'To drive safely a car.', '05/04/2021'),
(7, 'Cook', 'Cooking.', 'The restaurant', 1000, 'https://thumbs.dreamstime.com/b/cartoon-cook-kitchen-22282981.jpg', 'Sofia', 'staff', 'Cutting potatoes.', '05/04/2021'),
(8, 'Front End Developer', 'Our band of superheroes are looking for a self-driven, highly organised individual who will join the team in creating our most important products.', 'Company Awesome Ltd.', 1000, 'https://i.imgur.com/ZbILm3F.png', 'Varna', 'Contract staff', 'You’ll be part of a development team working on our flagship products. It’s going to be epic!', '06/04/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
