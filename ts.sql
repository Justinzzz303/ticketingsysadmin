-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 06:43 AM
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
-- Database: `ts`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `bstatus` varchar(10) NOT NULL,
  `bqty` int(10) NOT NULL,
  `btotalprice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `userID`, `eventID`, `bstatus`, `bqty`, `btotalprice`) VALUES
(1, 2, 1, 'completed', 10, 1000),
(2, 1, 2, 'completed', 5, 1000),
(3, 3, 3, 'completed', 3, 384),
(4, 5, 3, 'completed', 8, 1024),
(5, 2, 4, 'completed', 4, 520),
(6, 2, 6, 'completed', 1, 220),
(7, 2, 3, 'completed', 1, 128),
(8, 2, 4, 'completed', 1, 130),
(9, 2, 2, 'completed', 6, 1200);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eid` int(11) NOT NULL,
  `ename` varchar(30) NOT NULL,
  `eprice` double NOT NULL,
  `edescription` varchar(1000) NOT NULL,
  `edate` varchar(10) NOT NULL,
  `eqty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eid`, `ename`, `eprice`, `edescription`, `edate`, `eqty`) VALUES
(1, 'Dive into History', 100, 'Plunge beneath the waves to explore sunken artifacts\r\nScuba dive at historic shipwreck sites and learn about marine archeology from experts\r\n', '12/2/2025', 90),
(2, 'Hike & Learn', 200, 'Take on the trails and expand your knowledge of the local flora and fauna\r\nA guided hike where every step is a lesson in the natural world', '30/02/2024', 89),
(3, 'Summit Seekers', 128, 'Scale new heights both physically and mentally A mountain climbing expedition paired with workshops on peak performance strategies', '05/04/2024', 88),
(4, 'Cycle & Savor', 130, 'Combine the joy of cycling with the delight of culinary discoveries\r\n\r\nBike through scenic routes and stop to enjoy local cuisines', '12/02/2024', 95),
(5, 'Explore the Nature', 250, 'Take on the trails and expand your knowledge of the local flora and fauna\r\n\r\nA guided hike where every step is a lesson in the natural world', '12/05/2024', 100),
(6, 'Paddle & Preserve', 220, 'Paddle through pristine waters and participate in conservation efforts\r\n\r\nKayak tours that involve clean-up activities and wildlife protection education', '12/10/2024', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `email`, `phone`, `password`, `gender`, `role`) VALUES
(1, 'justin', 'justin@gmail.com', '0187696307', 'justin12345678', 'Male', 'admin'),
(2, 'leo', 'leo@gmail.com', '01162479191', 'leo12345678', 'Male', 'admin'),
(3, 'dawei', 'dawei@gmail.com', '0128271289', 'dawei12345678', 'Male', 'member'),
(4, 'TZM', 'tzm@gmail.com', '0195197208', 'TZM12345678', 'Male', 'member'),
(5, 'LCC', 'lcc@gamil.com', '01165087543', 'LCC12345678', 'Male', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
