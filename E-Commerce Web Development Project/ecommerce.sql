-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 11:23 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `category` enum('Book','Stationery','Other') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`) VALUES
(1, 'harry_potter', 'Book'),
(2, 'deception_point', 'Book'),
(3, 'drunkards_walk', 'Book'),
(4, 'the_kite_runner', 'Book'),
(5, 'animal_farms', 'Book'),
(6, 'night_lamp', 'Other'),
(7, 'pencil_box', 'Stationery'),
(8, 'fountain_pen', 'Stationery'),
(9, 'study_bed_table', 'Other'),
(10, 'personal_diary', 'Stationery');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `phone` bigint(10) NOT NULL,
  `registration_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Data regarding site users';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `last_name`, `phone`, `registration_timestamp`) VALUES
(1, 'venu@xyz.com', 'Venu', 'Sharma', 547903927, '2016-09-28 16:00:04'),
(2, 'shubham@xyz.com', 'Shubham', NULL, 538915694, '2017-08-28 09:46:50'),
(3, 'disha@xyz.com', 'Disha', 'Kaur', 557825323, '2016-09-29 18:32:14'),
(4, 'ankit@xyz.com', 'Ankit', 'Kumar', 561322116, '2016-09-30 09:35:18'),
(5, 'mrinal@xyz.com', 'Mrinal', 'Joy', 517918670, '2016-10-02 03:38:06'),
(6, 'abhilash@xyz.com', 'Abhilash', 'Jalsani', 509841902, '2016-10-01 05:00:00'),
(7, 'hardik@xyz.com', 'Hardik', 'Arora', 595452568, '2016-09-30 07:50:45'),
(8, 'yesha@xyz.com', 'Yesha', 'Krishna', 534532216, '2016-09-30 07:50:45'),
(9, 'rushit@xyz.com', 'Rushit', NULL, 534359370, '2016-09-29 06:16:37'),
(10, 'jessy@xyz.com', 'Jessy', 'Joseph', 591053100, '2016-09-28 18:32:14'),
(11, 'jasper@xyz.com', 'Jaspreet', NULL, 515078235, '2016-09-29 18:20:12'),
(12, 'prachi@xyz.com', 'Prachi', NULL, 530670640, '2016-09-29 06:42:12'),
(18, 'ojko@indon', 'odnn', 'noncon', 2267171000, '2017-08-31 15:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE `users_products` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_products`
--

INSERT INTO `users_products` (`id`, `user_id`, `product_id`, `purchase_timestamp`) VALUES
(1, 12, 3, '2016-10-10 12:40:12'),
(2, 12, 6, '2016-10-12 12:40:12'),
(3, 8, 6, '2016-10-29 06:42:12'),
(4, 4, 6, '2016-10-15 07:35:04'),
(5, 10, 9, '2016-10-09 20:45:16'),
(6, 7, 4, '2016-10-10 03:04:42'),
(7, 5, 1, '2016-10-19 11:28:54'),
(8, 4, 5, '2016-10-14 06:05:32'),
(9, 8, 5, '2016-10-23 11:15:23'),
(10, 7, 7, '2016-10-04 07:42:35'),
(11, 12, 2, '2016-10-14 06:53:41'),
(12, 12, 7, '2016-10-21 08:45:13'),
(13, 7, 2, '2016-10-05 10:38:02'),
(14, 7, 8, '2016-10-06 12:04:49'),
(15, 1, 2, '2016-10-13 10:07:51'),
(16, 11, 6, '2016-10-15 04:33:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_products`
--
ALTER TABLE `users_products`
  ADD CONSTRAINT `Foreign_key1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `Foreign_key2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
