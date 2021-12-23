-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 03:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abclitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `xbatch` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'System',
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xbatchname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `xsubject` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `xteacher` int(6) NOT NULL,
  `xcapacity` int(10) NOT NULL,
  `zactive` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`xbatch`, `ztime`, `zemail`, `zutime`, `xemail`, `bizid`, `xbatchname`, `xsubject`, `xteacher`, `xcapacity`, `zactive`) VALUES
(1, '2021-09-12 12:17:37', 'rajib@dbs.com', NULL, NULL, 100, 'sdgr', 'gr', 3, 43, 1),
(2, '2021-09-12 12:21:31', 'rajib@dbs.com', NULL, NULL, 100, 'rgr', 'rgre', 2, 54, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`xbatch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `xbatch` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
