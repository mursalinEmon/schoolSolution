-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 119.81.42.149:3306
-- Generation Time: Oct 10, 2021 at 04:58 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xeannexdbnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `studymaterial`
--

CREATE TABLE `studymaterial` (
  `xsl` bigint(20) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatch` int(6) NOT NULL,
  `xlessonno` int(11) NOT NULL,
  `xlessonname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xurl` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studymaterial`
--

INSERT INTO `studymaterial` (`xsl`, `ztime`, `bizid`, `zemail`, `xemail`, `xitemcode`, `xbatch`, `xlessonno`, `xlessonname`, `xdate`, `xurl`) VALUES
(1, '2021-09-27 05:57:20', 100, NULL, NULL, 'ITM000051', 1, 1, 'Theory: My Introduction and how I started Graphic Designing (Introduction to the Instructor)', '2021-09-27', 'https://www.youtube.com/watch?v=hpp3WA5l_FY&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo'),
(2, '2021-09-27 05:57:20', 100, NULL, NULL, 'ITM000051', 1, 2, 'Theory: Course Content (What and How you will learn in this Course?)', '2021-09-28', 'https://www.youtube.com/watch?v=BaTlgsF1Weg&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo&index=2'),
(3, '2021-09-27 05:57:20', 100, NULL, NULL, 'ITM000051', 1, 3, 'Theory: Importance of Passion, Patience and Practice for becoming a good Graphic Designer', '2021-09-29', 'https://www.youtube.com/watch?v=Etpayqd2rzE&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo&index=3'),
(4, '2021-09-27 05:57:20', 100, NULL, NULL, 'ITM000051', 1, 4, 'Theory: Introduction to Design and its various fields', '2021-09-30', 'https://www.youtube.com/watch?v=l5LIE5T128E&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo&index=4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studymaterial`
--
ALTER TABLE `studymaterial`
  ADD PRIMARY KEY (`xsl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studymaterial`
--
ALTER TABLE `studymaterial`
  MODIFY `xsl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
