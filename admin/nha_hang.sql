-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2021 at 07:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nha_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `fullName` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avatarAdmin` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `email`, `password`, `fullName`, `avatarAdmin`, `role`) VALUES
(1, 'nguyenthevu2602@gmail.com', '123456', 'Nguyễn Thế Vũ', 'uploads/37110701057192.jpg', 1),
(9, 'luongchithanh@gmail.com', '123456', 'Lương Chí Thành', 'uploads/577034154850740_442526457004368_7038728531', 1),
(10, 'vunguyen2602@gmail.com', '123456', 'nguyễn thế vũ', 'uploads/incognito.png', 0),
(12, 'admin@gmail.com', '$2y$10$7C1u41Mas0GSDYWPfwHXP.qGaok6U.U3kdrxerU4XCClPNEXUZKaq', 'Thành Lương', 'uploads/5593961200px-mark_of_the_united_states_arm', 0),
(13, 'satthumaulanh2001@gmail.com', '$2y$10$hsDHem3rQgchmVBcOGNYtuYVLIjU7yGqSQEfwOTZrMNDpF2U.218q', 'Thành Lương', 'uploads/4493131200px-mark_of_the_united_states_arm', 0),
(14, 'satthgumaulanh2001@gmail.com', '$2y$10$IQKOad9x.m4e7wIWEJCST.0kh1rD.Dq.i5MPGZS.ouUcY4Afmd7ey', 'Thành Lương', 'uploads/79808310-doanh-nhân.png', 0),
(15, 'gagas@gmail.com', '$2y$10$ef9qqsUGI5edVvWdemoP/uYO9LJnAfIItKR4N/uZO0sD32R7FvmJ6', 'Thành Lương', 'uploads/916421184804345_1776294859225078_373712943', 0),
(16, 'ga@gmail.com', '$2y$10$mDmP8R3q3ZiVWc4GfDAqFuZqBGG3IkSsbkoGRjuSVoGMmwZSYfjCa', 'ga', 'uploads/589624canh-sat-chinh-ta-xuat-hien-giua-nen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`) VALUES
(1, 'sự kiện'),
(2, 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comtId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `comtData` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `catId` int(11) DEFAULT NULL,
  `productName` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `productImg` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `catId`, `productName`, `productImg`, `price`, `status`, `content`, `star`) VALUES
(1, 1, 'Khách sạn Novotel Hà Nội Thái Hà', NULL, 999000, 1, 'khách sạn vip proMax', 5),
(3, 2, 'Khách sạn Novotel Hà Nội ', NULL, 999000, 1, 'khách sạn vip proMax', 5);

-- --------------------------------------------------------

--
-- Table structure for table `producttaken`
--

CREATE TABLE `producttaken` (
  `proTakenId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `dateStart` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateEnd` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `producttaken`
--

INSERT INTO `producttaken` (`proTakenId`, `userId`, `productId`, `dateStart`, `dateEnd`) VALUES
(1, 1, 1, '2021-10-24 13:42:15', '2021-10-27 15:41:04'),
(3, 1, 1, '2021-10-24 13:42:15', '2021-10-27 15:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceId` int(11) NOT NULL,
  `catId` int(11) DEFAULT NULL,
  `serviceName` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `serviceImg` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `price` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `comment` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `passWord` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `fullName` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `avatarUser` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `timeRegister` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `email`, `passWord`, `fullName`, `avatarUser`, `status`, `timeRegister`) VALUES
(1, 'thevu2468@gmail.com', '123456', 'Nguyễn Thế Vũ', NULL, 1, '2021-10-23 13:19:11'),
(4, 'luongchithanh@gmail.com', '123456', 'Lương Chí Thành', 'uploads/incognito.png', 1, '2021-10-27 08:53:37'),
(11, 'satthumaulanh2001@gmail.com', '$2y$10$qWrsHRml9o73ff7nWYGwXu0GribEW9SCUStXTPyYbjzB3zezgPXy2', 'Thành Lương', NULL, 0, '2021-10-29 04:48:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comtId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `producttaken`
--
ALTER TABLE `producttaken`
  ADD PRIMARY KEY (`proTakenId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`),
  ADD KEY `catId` (`catId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comtId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `producttaken`
--
ALTER TABLE `producttaken`
  MODIFY `proTakenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `categories` (`catId`);

--
-- Constraints for table `producttaken`
--
ALTER TABLE `producttaken`
  ADD CONSTRAINT `producttaken_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `producttaken_ibfk_2` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `categories` (`catId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
