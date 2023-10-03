-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 08:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2web`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfood`
--

CREATE TABLE `addfood` (
  `serial #` int(11) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `image` varchar(45) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addfood`
--

INSERT INTO `addfood` (`serial #`, `foodname`, `type`, `image`, `price`, `rating`) VALUES
(4, 'milk', 'Dairy', 'milk.jpg', '190', 5),
(6, 'burger', 'FastFood', 'burger.jpg', '457', 5),
(8, 'Strawberry', 'organicfood', 'headerimg2.jpg', '510', 4),
(10, 'Butter Pro max', 'Dairy', 'butter.jpg', '1000', 5),
(12, 'carrots', 'organicfood', 'carrot.jpg', '510', 4);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ADMIN', 1234),
('HUSNAIN', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL,
  `foodname` varchar(20) NOT NULL,
  `foodImg` varchar(20) NOT NULL,
  `total_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `password`, `telephone`) VALUES
('admin', 'admin@gmail.com', 1234, '6876'),
('customer', 'customer@gmail.com', 1234, '1231');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addfood`
--
ALTER TABLE `addfood`
  ADD PRIMARY KEY (`serial #`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `userEmail` (`userEmail`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addfood`
--
ALTER TABLE `addfood`
  MODIFY `serial #` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userEmail`) REFERENCES `customer` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
