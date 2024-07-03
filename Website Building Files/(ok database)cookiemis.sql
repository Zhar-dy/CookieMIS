-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 06:25 PM
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
(1, 'preparing', 'Pickup', '09:35', '2024-07-03', 4),
(2, 'preparing', 'Pickup', '17:06', '2024-07-04', 5),
(3, 'preparing', 'Delivery', '05:07', '2024-07-04', 6),
(4, 'preparing', 'Pickup', '16:31', '2024-08-01', 7);

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
(1, 4, 2, 1),
(2, 5, 2, 1),
(3, 6, 2, 1),
(4, 7, 1, 1),
(5, 7, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE Orders(
    order_ID INT(20) NOT NULL ,
    order_Date VARCHAR(100),
    order_Details VARCHAR(200),
    order_Status BOOLEAN,
    total_Price int(20),
    user_ID INT(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `order_Date`, `order_Details`, `order_Status`, `user_ID`,`total_Price`) VALUES
(1, '1-1-2024', 'big cookies plsssss', 1, 1, 1),
(2, '2-1-2024', 'extra chocolate (leave it at the porch)', 1, 1, 1),
(3, '5-1-2024', 'No almond', 2, 1, 1),
(4, '02-07-2024', 'nothing', 3, 2, 1),
(5, '03-07-2024', 'good', 5, 2, 1),
(6, '03-07-2024', 'test', 1, 2, 1),
(7, '03-07-2024', '', 1, 2, 1);

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
(6, 'Out Of Stock', 'A Cookie that is out of stock!', 'Cookie', '0', 0, 1.00, 'peanut.png');

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
(1, 'a', 'MUHAMMAD ZHARFAN JUNAIDY BIN JESFFRI', 'd9b1d7db4cd6e70935368a1efb10e377', '1', '84, JALAN BAKTI 25/15', 'DUDEPOMDEV@GMAIL.COM', '103094691', 'a.png', 1),
(2, 'b', 'RAZYN HAZMAN', 'd9b1d7db4cd6e70935368a1efb10e377', '1', 'No.& Jalan BP11/5', 'rexyranger@gmail.com', '1121208397', 'b.jpg', 2);

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
  MODIFY `delivery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `detail_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
