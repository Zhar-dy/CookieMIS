-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 06:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookiemis`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_ID` int(11) NOT NULL,
  `delivery_Status` text DEFAULT NULL,
  `delivery_Type` varchar(100) DEFAULT NULL,
  `delivery_Estimated_Time` varchar(200) DEFAULT NULL,
  `pickup_Date` varchar(100) DEFAULT NULL,
  `order_ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_ID`, `delivery_Status`, `delivery_Type`, `delivery_Estimated_Time`, `pickup_Date`, `order_ID`) VALUES
(5, 'preparing', 'Delivery', '11:43', '2024-07-16', 8),
(6, 'preparing', 'Delivery', '00:43', '2024-07-05', 9),
(7, 'preparing', 'Pickup', '00:49', '2024-07-09', 10),
(8, 'preparing', 'Delivery', '02:53', '2024-08-13', 11);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) NOT NULL,
  `access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `access`) VALUES
(1, 'staff'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detail_ID` int(20) NOT NULL,
  `order_ID` int(20) DEFAULT NULL,
  `product_ID` int(20) DEFAULT NULL,
  `quantity` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detail_ID`, `order_ID`, `product_ID`, `quantity`) VALUES
(6, 8, 1, 4),
(7, 8, 3, 2),
(8, 8, 5, 2),
(9, 9, 1, 6),
(10, 10, 1, 4),
(11, 10, 3, 2),
(12, 10, 5, 1),
(13, 11, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(20) NOT NULL,
  `order_Date` varchar(100) DEFAULT NULL,
  `order_Details` varchar(200) DEFAULT NULL,
  `order_Status` tinyint(1) DEFAULT NULL,
  `total_Price` int(20) DEFAULT NULL,
  `user_ID` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `order_Date`, `order_Details`, `order_Status`, `total_Price`, `user_ID`) VALUES
(8, '04-07-2024', 'Ring the house bell first. Be wary of the neighbours dog', 2, 60, 4),
(9, '04-07-2024', 'Extra rainbow flakes please', 4, 40, 4),
(10, '04-07-2024', 'Make it Freshly Baked', 5, 52, 5),
(11, '04-07-2024', 'Extra chocolate!', 1, 66, 6);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_ID` int(4) NOT NULL,
  `product_Name` varchar(20) NOT NULL,
  `product_Description` varchar(100) NOT NULL,
  `product_Highlight` varchar(100) NOT NULL,
  `product_Status` varchar(20) NOT NULL,
  `product_Stock` int(3) NOT NULL,
  `product_Price` decimal(10,2) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_ID`, `product_Name`, `product_Description`, `product_Highlight`, `product_Status`, `product_Stock`, `product_Price`, `picture`) VALUES
(1, 'Cookie of', 'Only cookie created with passion', 'Creativity', '1', 1, 5.00, 'jumbo.png'),
(2, 'Cookie of', 'Only cookie created with passion', 'Chocolate', '1', 1, 8.00, 'chewy.png'),
(3, 'Chocolate Chip', 'Sweetness that is unbeatable', 'Cookie', '1', 1, 7.00, 'choccookie.png'),
(4, 'Peanut', 'Peanut Cookie!', 'Cookie', '1', 1, 3.00, 'peanut.png'),
(5, 'Vanillas', 'Pure Vanilla from Cameron Highlands!', 'Cookies', '1', 10, 3.00, 'chip.jpg'),
(6, 'Mashed Nuts', 'Brittles in your mouth, radioactive!', 'Cookie', '1', 133, 10.00, 'peanut.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_Num` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `level_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `name`, `password`, `gender`, `address`, `email`, `phone_Num`, `picture`, `level_ID`) VALUES
(1, 'admin', 'Admin', 'd9b1d7db4cd6e70935368a1efb10e377', '1', '84, JALAN BAKTI 25/15', 'Admin@gmail.com', '103094690123490258', 'a.png', 1),
(4, 'razyn', 'Razyn Hazman Bin Rudy Eruwan', '6f8985d0fcaf287e2c94b0acd08f6fa0', '1', 'No. 7 Jalan BP 11/5, Bandar Bukit Puchong', 'razynhazman@gmail.com', '01121208397', 'razyn.png', 2),
(5, 'abu', 'Abu Bakar As siddiq', 'd9cd34ff371516a27e386d5bcff2e671', '1', 'No. 11, Jalan Tun Perak', 'abu1442@gmail.com', '0189546524', 'abu.jpg', 2),
(6, 'rexy', 'Rexy Ranger', '41e52cafc6242f600602d8a38c070c90', '1', 'No. 5, Apartment A-251, Jalan Bunga, Selangor', 'rexyranger@gmail.com', '01121208397', 'rexy.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_ID`),
  ADD KEY `order_ID` (`order_ID`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detail_ID`),
  ADD KEY `order_ID` (`order_ID`),
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `level_ID` (`level_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detail_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_ID`) REFERENCES `orders` (`order_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_ID`) REFERENCES `product` (`product_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level_ID`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
