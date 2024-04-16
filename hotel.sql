-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 04:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `phoneno` int(10) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `cdate` date DEFAULT NULL,
  `approval` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `phoneno`, `email`, `cdate`, `approval`) VALUES
(1, 'Mariana Robayo Nieto', 2147483647, 'robayo13.mm@gmail.com', '2023-12-06', 'Not Allowed'),
(2, 'Lizeth Ropero', 2147483647, 'natikaro1@hotmail.com', '2023-12-06', 'Not Allowed');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usname` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`) VALUES
(4, 'pedro', 'picapiedra');

-- --------------------------------------------------------

--
-- Table structure for table `newsletterlog`
--

CREATE TABLE `newsletterlog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(52) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `news` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `troom` varchar(30) DEFAULT NULL,
  `tbed` varchar(30) DEFAULT NULL,
  `nroom` int(11) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `ttot` double(8,2) DEFAULT NULL,
  `fintot` double(8,2) DEFAULT NULL,
  `mepr` double(8,2) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(8,2) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `fintot`, `mepr`, `meal`, `btot`, `noofdays`) VALUES
(2, 'Dr.', 'Richard ', 'Baily', 'Superior Room', 'Double', 1, '2018-01-05', '2018-01-26', 6720.00, 7123.20, 268.80, 'Breakfast', 134.40, 21),
(3, 'Mr.', 'Carmen', 'Tajada', 'Deluxe Room', 'Double', 1, '2018-02-01', '2018-02-15', 3080.00, 3264.80, 123.20, 'Breakfast', 61.60, 14),
(4, 'Dr.', 'Reyner', 'Baily', 'Guest House', 'Single', 1, '2018-01-16', '2018-01-25', 1620.00, 1701.00, 64.80, 'Full Board', 16.20, 9),
(5, 'Dr.', 'Guillermo', 'Daza', 'Deluxe Room', 'Double', 2, '2023-12-05', '2023-12-30', 11000.00, 11440.00, 330.00, 'Half Board', 110.00, 25),
(6, 'Dr.', 'Juan jose', 'Ardila', 'Deluxe Room', 'Single', 4, '2023-12-05', '2023-12-29', 21120.00, 21278.40, 105.60, 'Breakfast', 52.80, 24),
(7, 'Dr.', 'LIZETH', 'ROPERO', 'Single Room', 'Double', 2, '2023-12-06', '2024-02-14', 21000.00, 22050.00, 840.00, 'Full Board', 210.00, 70),
(8, 'Dr.', 'LIZETH', 'ROPERO', 'Superior Room', 'Single', 1, '2023-12-06', '2023-12-28', 7040.00, 7392.00, 281.60, 'Full Board', 70.40, 22),
(9, 'Miss.', 'Lizeth Fernanda', 'Ropero Cardenas', 'Superior Room', 'Double', 1, '2023-12-06', '2023-12-13', 2240.00, 2464.00, 179.20, 'Full Board', 44.80, 7),
(10, 'Miss.', 'Mariana', 'Robayo ', 'Deluxe Room', 'Double', 7, '2023-12-06', '2023-12-07', 1540.00, 1553.20, 8.80, 'Breakfast', 4.40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(15) DEFAULT NULL,
  `bedding` varchar(10) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `cusid` int(11) DEFAULT NULL,
  `precio` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `type`, `bedding`, `place`, `cusid`, `precio`) VALUES
(17, 'Superior Room', 'Single', 'Free', 0, 250000),
(18, 'Superior Room', 'Double', 'Free', 0, 250000),
(19, 'Superior Room', 'Triple', 'Free', NULL, 250000),
(20, 'Superior Room', 'Quad', 'Free', NULL, 250000),
(21, 'Extra Room', 'Quad', 'Free', NULL, 345000),
(22, 'Guest House', 'Single', 'Free', NULL, 150000),
(23, 'Guest House', 'Double', 'Free', NULL, 150000),
(24, 'Guest House', 'Triple', 'Free', NULL, 150000),
(25, 'Deluxe Room', 'Single', 'Free', NULL, 600000),
(26, 'Deluxe Room', 'Double', 'Free', 0, 600000),
(27, 'Deluxe Room', 'Triple', 'Free', NULL, 600000),
(28, 'Prueba Room', 'Quad', 'Free', NULL, 460000),
(29, 'Single Room', 'Single', 'Free', NULL, 195000),
(30, 'Single Room', 'Double', 'Free', NULL, 195000),
(31, 'Single Room', 'Triple', 'Free', NULL, 195000),
(32, 'Single Room', 'Quad', 'Free', NULL, 195000);

-- --------------------------------------------------------

--
-- Table structure for table `roombook`
--

CREATE TABLE `roombook` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(5) DEFAULT NULL,
  `FName` text DEFAULT NULL,
  `LName` text DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `National` varchar(30) DEFAULT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Phone` text DEFAULT NULL,
  `TRoom` varchar(20) DEFAULT NULL,
  `Bed` varchar(10) DEFAULT NULL,
  `NRoom` varchar(2) DEFAULT NULL,
  `Meal` varchar(15) DEFAULT NULL,
  `cin` date DEFAULT NULL,
  `cout` date DEFAULT NULL,
  `stat` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roombook`
--

INSERT INTO `roombook` (`id`, `Title`, `FName`, `LName`, `Email`, `National`, `Country`, `Phone`, `TRoom`, `Bed`, `NRoom`, `Meal`, `cin`, `cout`, `stat`, `nodays`) VALUES
(11, 'Miss.', 'Mariana', 'Robayo ', 'robayo13.mrn@gmail.com', 'Sri Lankan', 'Colombia', '3209923144', 'Superior Room', 'Double', '3', 'Breakfast', '2024-02-24', '2024-02-25', 'Not Conform', 1),
(12, 'Miss.', 'Esteban David Florez', 'tolosa', 'estebandafloto@gmail.com', 'Sri Lankan', 'Colombia', '+573156850416', 'Superior Room', 'Single', '5', 'Room only', '2024-04-01', '2024-04-25', 'Not Conform', 24);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
