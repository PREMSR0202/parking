-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 12:49 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------
--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `pslot` varchar(20) NOT NULL,
  `amt` int(20) NOT NULL,
  `mode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`pslot`, `amt`, `mode`) VALUES
('A4', 50, 'cash'),
('A5', 50, 'cash'),
('A3', 50, 'cash'),
('A1', 80, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `parking`
--

CREATE TABLE `parking` (
  `pslot` varchar(10) NOT NULL,
  `vnum` varchar(20) NOT NULL,
  `intime` time NOT NULL,
  `outtime` time NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parking`
--

INSERT INTO `parking` (`pslot`, `vnum`, `intime`, `outtime`, `date`) VALUES
('A4', 'TN 33 BQ 6417', '09:11:11', '01:20:34', '2019-12-15'),
('A5', 'TN 33 D 4892', '09:11:19', '01:20:45', '2019-12-15'),
('A3', 'TN 33 C 2772', '07:27:03', '01:20:58', '2019-12-16'),
('A1', 'TN 86 B 9318', '06:47:57', '09:24:24', '2019-12-18'),
('A1', 'TN 33 BQ 6417', '04:56:21', '00:00:00', '2019-12-15'),
('A2', 'TN 33 DF 4567', '04:57:36', '00:00:00', '2020-01-20'),
('A3', 'TN 86 B 9318', '04:58:16', '00:00:00', '2019-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `snum` varchar(20) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`snum`, `status`) VALUES
('A1', 1),
('A2', 1),
('A3', 1),
('A4', 0),
('A5', 0),
('G1', 0),
('G2', 0),
('G3', 0),
('G4', 0),
('G5', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vnum` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `dor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vnum`, `contact`, `dor`) VALUES
('4561', '9843044500', '2019-12-15'),
('7897', '1234567890', '2019-12-17'),
('8707', '9807654321', '2019-12-15'),
('TN 33 BQ 6417', '9843044500', '2019-12-15'),
('TN 33 C 2772', '9894170011', '2019-12-16'),
('TN 33 D 4892', '9843027779', '2019-12-15'),
('TN 33 DF 4567', '123456789', '2020-01-20'),
('TN 86 B 9318', '1234567890', '2019-12-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slot`
--
ALTER TABLE `slot`
  ADD PRIMARY KEY (`snum`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
