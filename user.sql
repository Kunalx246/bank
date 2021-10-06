-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 06:03 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(3) NOT NULL,
  `Name` char(100) NOT NULL,
  `email Id` varchar(100) NOT NULL,
  `Account Number` bigint(20) NOT NULL,
  `Current Balance` double NOT NULL,
  `Date and Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `email Id`, `Account Number`, `Current Balance`, `Date and Time`) VALUES
(1, 'Anil', 'anil@gmail.com', 5443666780, 24800.19, '2021-09-10 19:37:56'),
(2, 'Rakesh', 'rakesh@yahoo.com', 1334509788, 53000, '2021-09-10 19:39:07'),
(3, 'Puja', 'puja@gmail.com', 3446568870, 1290, '2021-09-10 19:54:41'),
(4, 'Mohan', 'mohan123@gmail.com', 1243432669, 34576.89, '2021-09-10 21:32:38'),
(5, 'Kunal', 'kunal@gmail.com', 6664537890, 53470, '2021-09-10 21:33:54'),
(6, 'Rahul', 'rahul@gmail.com', 5466677789, 7860.22, '2021-10-01 21:23:49'),
(7, 'Priya', 'priya@yahoo.com', 8888995654, 65890, '2021-10-01 21:25:04'),
(8, 'Pratim', 'pratim@gmail.com', 1234567890, 6900, '2021-10-01 21:26:24'),
(9, 'John', 'john246@yahoo.com', 3142536475, 4780.54, '2021-10-01 21:28:13'),
(10, 'Vishal', 'vishal@gmail.com', 6475839201, 43800, '2021-10-01 21:31:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
