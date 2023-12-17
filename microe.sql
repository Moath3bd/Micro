-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 05:05 PM
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
-- Database: `microe`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `image`) VALUES
(3, 'lab', '../../uploads/images657c8eb17444b_clip-02.jpg'),
(4, 'comp', '../../uploads/images657c8ec8df141_stream-05.jpg'),
(5, 'maw', '../../uploads/images657c8edb22e38_clip-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `homeuser`
--

CREATE TABLE `homeuser` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `contry` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `streetName` varchar(255) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderu`
--

CREATE TABLE `orderu` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderu`
--

INSERT INTO `orderu` (`id`, `date`, `userId`) VALUES
(6, '2024-01-03', 8);

-- --------------------------------------------------------

--
-- Table structure for table `ourservices`
--

CREATE TABLE `ourservices` (
  `id` int(11) NOT NULL,
  `serviceTitle` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payement`
--

CREATE TABLE `payement` (
  `id` int(11) NOT NULL,
  `cardNum` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `expDate` date NOT NULL,
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payement`
--

INSERT INTO `payement` (`id`, `cardNum`, `cvv`, `expDate`, `userId`, `productId`, `amount`) VALUES
(1, 552, 535, '2030-12-13', 8, 3, 56);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`id`, `status`, `quantity`, `productId`, `orderId`) VALUES
(1, 'asd', 57, 3, 6),
(2, 'asd', 57, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` float NOT NULL,
  `subId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `description`, `quantity`, `discount`, `subId`) VALUES
(3, 'dfg', '../../uploads/images657cbf9560bc4_details-02.jpg', 41, 'cvxfdssssssssssewfes', 741, 42, 13);

-- --------------------------------------------------------

--
-- Table structure for table `sub_catagory`
--

CREATE TABLE `sub_catagory` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_catagory`
--

INSERT INTO `sub_catagory` (`id`, `image`, `catagory_id`, `name`) VALUES
(13, '../../uploads/images/657cbdc3d6a79_clip-02.jpg', 3, 'asdassad');

-- --------------------------------------------------------

--
-- Table structure for table `testimonal`
--

CREATE TABLE `testimonal` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `rule` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `age`, `phone`, `rule`) VALUES
(8, 'sdghjsdfxcv', 'sdfhgjsdfsdgfsdfdfsd', '1hjkhfgh', 16, '1hjkghfg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeuser`
--
ALTER TABLE `homeuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `orderu`
--
ALTER TABLE `orderu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `ourservices`
--
ALTER TABLE `ourservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payement`
--
ALTER TABLE `payement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subId` (`subId`);

--
-- Indexes for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catagory_id` (`catagory_id`);

--
-- Indexes for table `testimonal`
--
ALTER TABLE `testimonal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homeuser`
--
ALTER TABLE `homeuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderu`
--
ALTER TABLE `orderu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ourservices`
--
ALTER TABLE `ourservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payement`
--
ALTER TABLE `payement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonal`
--
ALTER TABLE `testimonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `orderu`
--
ALTER TABLE `orderu`
  ADD CONSTRAINT `orderu_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payement`
--
ALTER TABLE `payement`
  ADD CONSTRAINT `payement_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `payement_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orderu` (`id`),
  ADD CONSTRAINT `productorder_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subId`) REFERENCES `sub_catagory` (`id`);

--
-- Constraints for table `sub_catagory`
--
ALTER TABLE `sub_catagory`
  ADD CONSTRAINT `sub_catagory_ibfk_1` FOREIGN KEY (`catagory_id`) REFERENCES `catagory` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `testimonal`
--
ALTER TABLE `testimonal`
  ADD CONSTRAINT `testimonal_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
