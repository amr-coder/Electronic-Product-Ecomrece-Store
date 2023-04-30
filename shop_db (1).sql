-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 07:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` text NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`) VALUES
(11, 7, 'Video Game Electronic hand Remote ', 45, 'm10.jpg', 2),
(12, 7, 'Head Phone Electronic Appliance', 20, 'm7.jpg', 1),
(13, 0, 'Digital Touch Screen Watch', 345, 'digital.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(255) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `street` int(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `pin_code` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `total_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `name`, `number`, `email`, `method`, `flat`, `street`, `city`, `state`, `country`, `pin_code`, `total_products`, `total_price`) VALUES
(1, 'me', 1233456788, 'Ameeliya.amar@gmail.com', 'cash on delivery', '2ewdfdgf', 0, 'cfre', 'fgff', 'tttt', 12345, 0, 110),
(2, 'me', 1234455656, 'Ameeliya.amar@gmail.com', 'cash on delivery', '2ewdfdgf', 0, 'cfre', 'fgff', 'tttt', 12345, 0, 110),
(3, 'me', 1234455656, 'Ameeliya.amar@gmail.com', 'cash on delivery', '2ewdfdgf', 0, 'cfre', 'fgff', 'tttt', 12345, 0, 110),
(4, 'me', 104, 'Ameeliya.amar@gmail.com', 'cash on delivery', '2ewdfdgf', 0, 'cfre', 'fgff', 'tttt', 12345, 0, 800),
(5, 'me', 123546, 'amjee323@gmail.com', 'credit cart', '2ewdfdgf', 0, 'cfre', 'fgff', 'tttt', 12345, 0, 800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `price` int(255) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(8, 'Digital Photograpic Camra', 550, 'm4.jpg'),
(9, 'Latest Laptop light weight Device  ', 30, 'm1.jpg'),
(10, 'Head Phone Electronic Appliance', 20, 'm7.jpg'),
(11, 'Video Game Electronic hand Remote ', 45, 'm10.jpg'),
(12, 'cell phone & accesories', 350, 'm3.jpg'),
(14, 'Digital Touch Screen Watch', 345, 'digital.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(17, 'raniadoll', 'mc210401391abi@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(18, 'me', 'amjee323@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
