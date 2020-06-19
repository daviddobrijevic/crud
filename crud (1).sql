-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 11:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `brendovi`
--

CREATE TABLE `brendovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brendovi`
--

INSERT INTO `brendovi` (`id`, `naziv`, `status`) VALUES
(2, 'T', 1),
(5, 'David', 0),
(6, 'Tina', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `location`) VALUES
(5, 'Tina', 'Cardak'),
(6, 'Mona', 'Kucica');

-- --------------------------------------------------------

--
-- Table structure for table `grupeproizvoda`
--

CREATE TABLE `grupeproizvoda` (
  `id` int(11) NOT NULL,
  `naziv` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grupeproizvoda`
--

INSERT INTO `grupeproizvoda` (`id`, `naziv`, `status`) VALUES
(1, 'Tina', 0),
(2, 'Dalmatinac', 0),
(22, 'Tina Fizicar', 0);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `ident` varchar(250) DEFAULT NULL,
  `idgroup` int(11) DEFAULT NULL,
  `idbrend` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `um` varchar(250) DEFAULT NULL,
  `vat` float DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `stock` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `name`, `ident`, `idgroup`, `idbrend`, `price`, `um`, `vat`, `note`, `status`, `image`, `stock`) VALUES
(60, 'd', 'd', 1, 2, 0, '1', 1, '1', 1, '', 1),
(62, '11', '11', 22, 6, 1.12, '0', 0, '0', 0, 'slikeproizvoda/11.jpg', 0),
(68, 'David', '7', 22, 6, 1, '1', 1, '1', 0, '', 1),
(69, 'Tina', '1', 1, 0, 0, '', 0, '', 0, 'slikeproizvoda/1.jpg', 0),
(70, 'David', '2', 0, 6, 0, '', 0, '', 0, '', 0),
(71, 'd', '6', 0, 0, 0, '', 0, '', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `gender` char(1) NOT NULL,
  `user_group` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `activeuser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `address`, `city`, `phone`, `gender`, `user_group`, `password`, `activeuser`) VALUES
(148, 'Kristina', 'Cvetkovic', 'kristinacvetkovic9@gmail.com', 'Svetozara Corovica 11', 'Novi Sad', '+381628550060', 'F', 'user', '40f5888b67c748df7efba008e7c2f9d2', 1),
(195, 'David', 'Dobrijevic', 'davidjdobrijevic@gmail.com', 'Radomira Rase Radujkova 20', 'Novi Sad', '+381631826146', 'M', 'user', 'c81e728d9d4c2f636f067f89cc14862c', 0),
(199, '2', '2', '2@2.com', '', '', '', '', 'user', '202cb962ac59075b964b07152d234b70', 0),
(201, '3', '3', '3@3.com', '', '', '', '', 'user', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `slug`, `name`, `status`) VALUES
(1, 'admin', 'Admin', 1),
(2, 'user', 'User', 1),
(3, 'd', 'd', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brendovi`
--
ALTER TABLE `brendovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupeproizvoda`
--
ALTER TABLE `grupeproizvoda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brendovi`
--
ALTER TABLE `brendovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grupeproizvoda`
--
ALTER TABLE `grupeproizvoda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
