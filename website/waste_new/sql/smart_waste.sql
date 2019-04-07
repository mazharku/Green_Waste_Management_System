-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 09:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_waste`
--

-- --------------------------------------------------------

--
-- Table structure for table `addbin`
--

CREATE TABLE `addbin` (
  `dustbinid` int(11) NOT NULL,
  `size` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addbin`
--

INSERT INTO `addbin` (`dustbinid`, `size`) VALUES
(1106, 500),
(1105, 500),
(1103, 500),
(1102, 500),
(1237, 500),
(1234, 500),
(1104, 500),
(1107, 500),
(1101, 500),
(1201, 500),
(1202, 500),
(1203, 500),
(1206, 500);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('109', '109');

-- --------------------------------------------------------

--
-- Table structure for table `get_location`
--

CREATE TABLE `get_location` (
  `dustbinid` int(11) NOT NULL,
  `longitude` double NOT NULL,
  `lattitude` double NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_location`
--

INSERT INTO `get_location` (`dustbinid`, `longitude`, `lattitude`, `address`) VALUES
(1104, 89.535428, 22.799789, 'Mejbanbari, Gollamri, Khulna'),
(1101, 89.536264, 22.799789, 'Kewra, Gollamari, Khulna'),
(1234, 89.534376, 22.801916, 'Cafeteria Khulna University, Khulna'),
(1237, 89.533196, 22.802984, 'Tapan\'s Khulna University, Khulna'),
(1102, 89.537734, 22.802509, 'Khan bahadur Ahsanullah Hall, Khulna University, Khulna'),
(1103, 89.539171, 22.801372, 'Linear Park, Gollamari, Khulna'),
(1105, 89.537745, 22.804784, 'Liton\'s, Khulna University, Khulna'),
(1106, 89.535223, 22.802786, 'Academic Building 1, Khulna University, Khulna'),
(1107, 89.536704, 22.80508, 'Khan Jahan Ali Hall, Khulna University, Khulna'),
(1206, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `get_value`
--

CREATE TABLE `get_value` (
  `dustbinid` int(11) NOT NULL,
  `value` double NOT NULL,
  `temperature` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `get_value`
--

INSERT INTO `get_value` (`dustbinid`, `value`, `temperature`) VALUES
(1101, 1, 0),
(1104, 33.34, 34.44),
(1234, 78, 22.8),
(1237, 82, 0),
(1102, 2, 0),
(1103, 3, 0),
(1105, 5, 0),
(1106, 6, 0),
(1107, 10, 0),
(1206, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `dustbinid` int(11) NOT NULL,
  `empty_date` timestamp NULL DEFAULT NULL,
  `full_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addbin`
--
ALTER TABLE `addbin`
  ADD PRIMARY KEY (`dustbinid`);

--
-- Indexes for table `get_location`
--
ALTER TABLE `get_location`
  ADD PRIMARY KEY (`dustbinid`);

--
-- Indexes for table `get_value`
--
ALTER TABLE `get_value`
  ADD PRIMARY KEY (`dustbinid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
