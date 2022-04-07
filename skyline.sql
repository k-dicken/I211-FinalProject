-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2022 at 05:38 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skyline`
--

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `flightNum` int(9) NOT NULL,
  `planeNum` int(11) NOT NULL,
  `fromLocation` varchar(3) NOT NULL,
  `toLocation` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `departTime` time(4) NOT NULL,
  `arriveTime` time(4) NOT NULL,
  `gate` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `availability` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`flightNum`, `planeNum`, `fromLocation`, `toLocation`, `date`, `departTime`, `arriveTime`, `gate`, `status`, `availability`) VALUES
(1, 1, 'IND', 'DWA', '2022-04-09', '20:40:00.0000', '01:53:00.0000', '25B', 'On-Time', 200),
(2, 2, 'IND', 'FLG', '2022-04-07', '10:40:00.0000', '12:14:00.0000', '56A', 'Delayed', 50),
(3, 1, 'IND', 'ASD', '2022-04-07', '17:23:00.0000', '12:58:00.0000', '01A', 'On-Time', 75);

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE `planes` (
  `planeNum` int(11) NOT NULL,
  `airline` varchar(100) NOT NULL,
  `planeType` varchar(100) NOT NULL,
  `capacity` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `planes`
--

INSERT INTO `planes` (`planeNum`, `airline`, `planeType`, `capacity`) VALUES
(1, 'American Airlines', 'Airbus A350', '200'),
(2, 'Southwest Airlines', 'Boeing 737', '75');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userNum` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` char(100) NOT NULL,
  `lastName` char(100) NOT NULL,
  `city` char(100) NOT NULL,
  `state` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userNum`, `email`, `password`, `firstName`, `lastName`, `city`, `state`) VALUES
(1, 'admin@skyline.co', 'admin', 'Admin', 'User', 'Indianapolis', 'IN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`flightNum`);

--
-- Indexes for table `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`planeNum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `flightNum` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planes`
--
ALTER TABLE `planes`
  MODIFY `planeNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userNum` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
