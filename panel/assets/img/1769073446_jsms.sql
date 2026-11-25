-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2026 at 08:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `delete_status`) VALUES
(1, 'Gold', 1, 0),
(2, 'Diamond', 1, 0),
(3, 'Platinum', 1, 0),
(4, 'sdfv', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `return_date` date NOT NULL,
  `days` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `photo`, `address`, `phone`, `created_at`, `delete_status`) VALUES
(1, 'PNG', 'admin@gmail.com', '$2y$10$xvqndaYRBNzysrjNd2hz9OwYncqeY32dnEKcqGZkB5SG8oYoy6idi', '1766050977_logo.png', 'Pune', '9898989898', '0000-00-00', 0),
(2, 'Rani Sahane', 'rani@gmail.com', '$2y$10$b2C9olqUFbiO5AYBpRe89.aECBu4vaG9YT4JuWshDUBKHS2QFTHei', '1766050754_testimonial1.jpg', 'Pune ', '9898989898', '0000-00-00', 0),
(3, 'meera', 'meera@gmail.com', '$2y$10$/IjIDsiwYX1898QYhv5DS.tJ4bXnHK.jNwhXvJLBfDnuRpmwkZscS', '', 'nsk pune', '9898989898', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `weight` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1 = Available, 2 = Not Available',
  `finalTotal` decimal(10,2) NOT NULL,
  `stock` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cate_id`, `name`, `cost`, `description`, `weight`, `quantity`, `status`, `finalTotal`, `stock`, `created_at`, `delete_status`) VALUES
(1, 1, 'Ring', 2000.00, '<p>Goldstylish ring</p>', '1gm', 0, 1, 0.00, '20', '2025-12-19', 0),
(2, 1, 'bracelate', 0.00, '<p>stylish bracelates</p>', '', 0, 1, 0.00, '', '2025-12-19', 0),
(3, 1, 'earings', 0.00, '<p>earings</p>', '', 0, 1, 0.00, '', '2025-12-19', 0),
(4, 1, 'Ring', 0.00, '<p>Best Ring</p>', '', 0, 1, 0.00, '', '2026-01-08', 0),
(5, 2, 'bracelate', 0.00, '<p>gracefull bracelate</p>', '', 0, 1, 44000.00, '', '2026-01-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE `product_price` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `product_id`, `weight`, `stock`, `rate`, `total`, `created_at`, `delete_status`) VALUES
(1, 2, '5gm', 4, 2000.00, 10000.00, '2026-01-09', 0),
(2, 2, '10gm', 5, 2000.00, 20000.00, '2026-01-09', 0),
(4, 3, '1gm', 7, 2000.00, 2000.00, '2026-01-09', 0),
(5, 3, '2gm', 10, 2000.00, 4000.00, '2026-01-09', 0),
(7, 4, '2gm', 1, 5000.00, 10000.00, '2026-01-09', 0),
(8, 4, '3gm', 5, 6000.00, 18000.00, '2026-01-09', 0),
(13, 5, '2gm', 3, 6000.00, 12000.00, '2026-01-09', 0),
(14, 5, '4gm', 2, 8000.00, 32000.00, '2026-01-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `discount` float DEFAULT 0,
  `tax` float DEFAULT 0,
  `final_total` float DEFAULT 0,
  `paid_amount` float DEFAULT 0,
  `balance` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `name`, `phone`, `address`, `remark`, `date`, `discount`, `tax`, `final_total`, `paid_amount`, `balance`, `created_at`, `delete_status`) VALUES
(1, 'Rina Jadhav', '9898989898', 'Nashik', 'purchase', '2026-01-09', 5, 2, 3990, 3990, 0, '2026-01-09 11:45:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sale_items`
--

CREATE TABLE `sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_items`
--

INSERT INTO `sale_items` (`id`, `sale_id`, `product_id`, `type`, `qty`, `rate`, `total`) VALUES
(1, 1, 2, '5gm', 1, 2000, 2000),
(2, 1, 4, '2gm', 1, 2000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `address`, `course`, `password`, `created_at`, `delete_status`) VALUES
(1, 'Rani Sahane', 'rani@gmail.com', '9898998988', 'Pune ', 'MCA', '$2y$10$Hp/9fyFyE9FNX31896tBpOntqNW1uKmQ8RcP/bC/kBncT9.HNKSwG', '2025-12-18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `name`, `value`) VALUES
(1, 'SGST', 10.00),
(2, 'GST', 5.00),
(3, 'CGST', 5.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category` (`cate_id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_items`
--
ALTER TABLE `sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale_items`
--
ALTER TABLE `sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_price`
--
ALTER TABLE `product_price`
  ADD CONSTRAINT `product_price_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
