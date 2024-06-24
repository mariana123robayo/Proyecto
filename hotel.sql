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
  `ttot` double(12,0) DEFAULT NULL,
  `fintot` double(12,0) DEFAULT NULL,
  `mepr` double(12,0) DEFAULT NULL,
  `meal` varchar(30) DEFAULT NULL,
  `btot` double(12,0) DEFAULT NULL,
  `noofdays` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `title`, `fname`, `lname`, `troom`, `tbed`, `nroom`, `cin`, `cout`, `ttot`, `fintot`, `mepr`, `meal`, `btot`, `noofdays`) VALUES
(52, '', 'Mariana', 'Robayo', 'Superior Room', 'Double', 0, '2024-06-23', '2024-06-24', 0.00, 6.40, 0.00, 'Room only', 6.40, 1),
(53, '', 'Gabriela', 'Robayo', 'Superior Room', 'Triple', 0, '2024-06-23', '2024-06-24', 0.00, 48.00, 38.40, 'Full Board', 9.60, 1),
(54, '', 'Natalia', 'Robayo', 'Superior Room', 'Double', 0, '2024-06-25', '2024-06-27', 0.00, 38.40, 25.60, 'Breakfast', 12.80, 2),
(55, '', 'Mario', 'Robayo', 'Deluxe Room', 'Single', 0, '2024-06-23', '2024-06-24', 0.00, 2.20, 0.00, 'Room only', 2.20, 1),
(56, '', 'POLO', 'PEREZ', 'Superior Room', 'Triple', 0, '2024-06-24', '2024-06-25', 0.00, 28.80, 19.20, 'Breakfast', 9.60, 1),
(57, '', 'ARMANDO', 'MENDOZA', 'Superior Room', 'Triple', 0, '2024-06-23', '2024-06-24', 0.00, 9.60, 0.00, 'Dinner', 9.60, 1),
(58, '', 'dfghjkdlas', 'qwdwqdghjka', 'Superior Room', 'Single', 0, '2024-06-23', '2024-06-24', 0.00, 3.20, 0.00, 'Dinner', 3.20, 1),
(59, '', 'Marcela', 'Valencia', 'Single Room', 'Double', 0, '2024-06-24', '2024-06-26', 0.00, 30.00, 24.00, 'Full Board', 6.00, 2),
(60, '', 'Fabian', 'Perez', 'Superior Room', 'Double', 0, '2024-06-25', '2024-06-27', 0.00, 12.80, 0.00, 'Lunch', 12.80, 2),
(61, '', 'Dario', 'Lopez', 'Guest House', 'Single', 0, '2024-06-24', '2024-06-26', 999999.99, 999999.99, 80000.00, 'Dinner', 20000.00, 2),
(62, '', 'Paula', 'Gomez', 'Single Room', 'Triple', 0, '2024-06-24', '2024-06-28', 780000.00, 920400.00, 117000.00, 'Full Board', 23400.00, 4);

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
(19, 'Superior Room', 'Triple', 'Free', 0, 250000),
(20, 'Superior Room', 'Quad', 'Free', 0, 250000),
(21, 'Guest House', 'Single', 'Free', 0, 1000000),
(22, 'Guest House', 'Double', 'Free', NULL, 1000000),
(23, 'Guest House', 'Triple', 'Free', NULL, 1000000),
(24, 'Guest House', 'Quad', 'Free', NULL, 1000000),
(25, 'Deluxe Room', 'Single', 'Free', 0, 600000),
(26, 'Deluxe Room', 'Double', 'Free', 0, 600000),
(27, 'Deluxe Room', 'Triple', 'Free', NULL, 600000),
(28, 'Deluxe Room', 'Quad', 'Free', NULL, 600000),
(29, 'Single Room', 'Single', 'Free', 0, 195000),
(30, 'Single Room', 'Double', 'Free', 0, 195000),
(31, 'Single Room', 'Triple', 'Free', 0, 195000),
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
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `newsletterlog`
--
ALTER TABLE `newsletterlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roombook`
--
ALTER TABLE `roombook`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `newsletterlog`
--
ALTER TABLE `newsletterlog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `roombook`
--
ALTER TABLE `roombook`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
