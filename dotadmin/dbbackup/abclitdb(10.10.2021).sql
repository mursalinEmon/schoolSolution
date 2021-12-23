-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 02:44 PM
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
-- Table structure for table `abcmessage`
--

CREATE TABLE `abcmessage` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `abcmessage`
--

INSERT INTO `abcmessage` (`xsl`, `message`, `created_at`) VALUES
(1, 'Test MySQL Event 2', '2019-10-25 21:06:04'),
(2, 'Test MySQL recurring Event', '2019-10-25 21:06:25'),
(3, 'Test MySQL recurring Event', '2019-10-25 21:07:25'),
(4, 'Test MySQL recurring Event', '2019-10-25 21:08:25'),
(5, 'Test MySQL recurring Event', '2019-10-25 21:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `ablstatement`
--

CREATE TABLE `ablstatement` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `stno` int(11) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `xbatch` int(6) NOT NULL,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'System',
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbatchname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xteacher` int(6) NOT NULL,
  `xcapacity` int(10) NOT NULL,
  `zactive` tinyint(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`xbatch`, `bizid`, `ztime`, `zemail`, `zutime`, `xemail`, `xbatchname`, `xitemcode`, `xteacher`, `xcapacity`, `zactive`) VALUES
(1, 101, '2021-09-30 05:22:39', 'rajib@dbs.com', NULL, NULL, 'Batch-4', 'ITM000051', 102, 43, 1),
(2, 101, '2021-09-30 06:00:34', 'rajib@dbs.com', NULL, NULL, 'Batch-3', 'ITM000044', 103, 54, 1),
(3, 101, '2021-09-30 06:00:52', 'rajib@dbs.com', NULL, NULL, 'Batch-2', 'ITM000048', 138, 32, 1),
(4, 101, '2021-09-30 06:00:59', 'rajib@dbs.com', NULL, NULL, 'Batch-1', 'ITM000048', 115, 43, 1),
(5, 101, '2021-09-30 06:01:01', 'rajib@dbs.com', NULL, NULL, 'Junayed', 'ITM000048', 129, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classdet`
--

CREATE TABLE `classdet` (
  `xclass` bigint(20) NOT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zutime` datetime DEFAULT NULL,
  `xbatch` int(6) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xvenue` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xlesson` int(11) DEFAULT NULL,
  `xstartdate` date NOT NULL,
  `xstarttime` time NOT NULL,
  `xclasslink` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xjoinlink` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xhostid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmeetingid` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xduration` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classdet`
--

INSERT INTO `classdet` (`xclass`, `bizid`, `zemail`, `ztime`, `xemail`, `zutime`, `xbatch`, `xitemcode`, `xvenue`, `xlesson`, `xstartdate`, `xstarttime`, `xclasslink`, `xjoinlink`, `xhostid`, `xmeetingid`, `xduration`) VALUES
(9, 101, 'rajib@dbs.com', '2021-09-30 06:00:28', NULL, NULL, 2, 'ITM000044', 'Online', 130, '2021-09-14', '20:35:00', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', '34547433', '457', '30'),
(10, 101, 'rajib@dbs.com', '2021-09-30 05:59:40', NULL, NULL, 3, 'ITM000048', 'Online', 6, '2021-09-15', '06:00:00', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', '34547433', '45', '34'),
(11, 101, 'rajib@dbs.com', '2021-09-30 05:59:43', NULL, NULL, 4, 'ITM000048', 'Online', 13, '1970-01-01', '16:16:00', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', '3354464', '2323435', '44'),
(12, 101, 'rajib@dbs.com', '2021-09-30 05:59:45', NULL, NULL, 3, 'ITM000048', 'Online', 6, '2021-09-15', '15:59:00', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', 'https://us02web.zoom.us/j/81727723309?pwd=RWpWVE52MUtWUkZYZFJaM05PTFBJQT09', '34547433', '45', '34'),
(13, 101, 'rajib@dbs.com', '2021-09-30 05:59:48', NULL, NULL, 3, 'ITM000048', 'Classroom-01', 16, '2021-09-15', '11:11:00', '', '', '', '', '34');

-- --------------------------------------------------------

--
-- Table structure for table `distcashnbankpay`
--

CREATE TABLE `distcashnbankpay` (
  `xpaynum` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `stno` int(5) NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xbank` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcost` double NOT NULL DEFAULT 0,
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xotn` int(11) NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distdelscope`
--

CREATE TABLE `distdelscope` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `stno` int(10) NOT NULL DEFAULT 0,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xadd1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeladd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeltype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeldocnum` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdelorg` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xremarks` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeltime` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distpaynreq`
--

CREATE TABLE `distpaynreq` (
  `xpaynreqnum` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `stno` int(5) NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xbank` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccount` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcost` double NOT NULL DEFAULT 0,
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xotn` int(11) NOT NULL,
  `xbnkbr` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ecomsalesdet`
--

CREATE TABLE `ecomsalesdet` (
  `xecomdetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `stno` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xecomsl` int(20) NOT NULL,
  `xcus` varchar(20) CHARACTER SET utf8 NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `xwh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL,
  `xcost` double NOT NULL DEFAULT 0,
  `xrate` double NOT NULL,
  `xpaymethod` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xpoint` double NOT NULL DEFAULT 0,
  `xunitsale` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL DEFAULT 0,
  `xper` int(2) NOT NULL DEFAULT 0,
  `xstatus` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `xref` varchar(100) CHARACTER SET utf8 NOT NULL,
  `xprocstatus` tinyint(1) NOT NULL DEFAULT 1,
  `parent` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecomsalesdet`
--

INSERT INTO `ecomsalesdet` (`xecomdetsl`, `ztime`, `zemail`, `bizid`, `stno`, `xdate`, `xecomsl`, `xcus`, `xrow`, `xitemcode`, `xitembatch`, `xbatch`, `xwh`, `xbranch`, `xproj`, `xqty`, `xcost`, `xrate`, `xpaymethod`, `xtaxrate`, `xpoint`, `xunitsale`, `xtypestk`, `xexch`, `xcur`, `xdisc`, `xtaxcode`, `xtaxscope`, `xyear`, `xper`, `xstatus`, `xref`, `xprocstatus`, `parent`) VALUES
(1, '2021-08-30 12:09:55', '1', 101, 1, '2021-08-30', 49624, '46', 1, 'ITM000048', 'ITM000048', '5', 'CW', 'CW', NULL, 1, 1500, 6500, 'POD', 0, 500, '0', NULL, 1, 'BDT', 500, NULL, 'None', 2021, 8, 'Confirmed', 'rootid', 1, NULL),
(2, '2021-08-31 05:43:57', '1', 101, 1, '2021-08-31', 49625, '48', 1, 'ITM000048', 'ITM000048', '4', 'CW', 'CW', NULL, 1, 1500, 6500, 'POD', 0, 500, '0', NULL, 1, 'BDT', 500, NULL, 'None', 2021, 8, 'Confirmed', 'rootid', 1, NULL),
(3, '2021-09-02 10:20:58', '1', 101, 1, '2021-09-02', 49626, '50', 1, 'ITM000051', 'ITM000051', 'Pending', 'CW', 'CW', NULL, 1, 1000, 6500, 'POD', 0, 500, '0', NULL, 1, 'BDT', 500, NULL, 'None', 2021, 9, 'Confirmed', 'rootid', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ecomsalesmst`
--

CREATE TABLE `ecomsalesmst` (
  `xecomsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `stno` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xcus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xdelname` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdelcompany` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdelmethod` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpaymethod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xdelemail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdistrict` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xthana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgrossdisc` double NOT NULL DEFAULT 0,
  `xcur` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnotes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeladdress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecomsalesmst`
--

INSERT INTO `ecomsalesmst` (`xecomsl`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `stno`, `xdate`, `xcus`, `xdelname`, `xdelcompany`, `xdelmethod`, `xpaymethod`, `xdelemail`, `xmobile`, `xdistrict`, `xthana`, `xpostal`, `xgrossdisc`, `xcur`, `xnotes`, `xdeladdress`, `xmanager`, `xbranch`, `xwh`, `xproj`, `xstatus`, `xrecflag`, `xyear`, `xper`) VALUES
(49624, '2021-08-30 12:09:55', NULL, '1', NULL, 101, 1, '2021-08-30', '47', 'tahzd shuvo', 'ABCL', 'Free Delivery', 'SSL Pay', NULL, NULL, 'Madaripur', 'SHIBCHAR', '', 0, 'BDT', NULL, '1 no water tank road', NULL, NULL, NULL, NULL, 'Confirmed', 'Live', 2021, 8),
(49625, '2021-08-31 05:43:56', NULL, '1', NULL, 101, 2, '2021-08-31', '50', 'tahzd shuvo', 'ABCL', 'Free Delivery', 'SSL Pay', NULL, NULL, 'Madaripur', 'SHIBCHAR', '', 0, 'BDT', NULL, '1 no water tank road', NULL, NULL, NULL, NULL, 'Confirmed', 'Live', 2021, 8),
(49626, '2021-09-02 10:20:58', NULL, '1', NULL, 101, 2, '2021-09-02', '69', 'tahzd shuvo', 'ABCL', 'Free Delivery', 'SSL Pay', NULL, NULL, 'Madaripur', 'SHIBCHAR', '', 0, 'BDT', NULL, '1 no water tank road', NULL, NULL, NULL, NULL, 'Confirmed', 'Live', 2021, 9);

-- --------------------------------------------------------

--
-- Table structure for table `ecomsales_temp`
--

CREATE TABLE `ecomsales_temp` (
  `xtemsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date NOT NULL,
  `bizid` int(6) NOT NULL,
  `xstudent` int(11) NOT NULL,
  `xstudentmobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xprice` decimal(10,4) NOT NULL,
  `xqty` int(11) NOT NULL,
  `xref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xdocnum` int(11) DEFAULT NULL,
  `xtxnnum` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xoperator` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecomsales_temp`
--

INSERT INTO `ecomsales_temp` (`xtemsl`, `ztime`, `xdate`, `bizid`, `xstudent`, `xstudentmobile`, `xitemcode`, `xprice`, `xqty`, `xref`, `xstatus`, `xdocnum`, `xtxnnum`, `xoperator`) VALUES
(2, '2021-09-28 11:52:37', '2021-09-28', 101, 52, '01903330555', 'ITM000047', '5600.0000', 1, 'Junayed07', 'Created', NULL, 'T3KSF8D9HX', 'bkash');

-- --------------------------------------------------------

--
-- Table structure for table `ecomsales_temp_deleted`
--

CREATE TABLE `ecomsales_temp_deleted` (
  `xsl` int(11) NOT NULL,
  `xtemsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date NOT NULL,
  `bizid` int(6) NOT NULL,
  `xstudent` int(11) NOT NULL,
  `xstudentmobile` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xprice` decimal(10,4) NOT NULL,
  `xqty` int(11) NOT NULL,
  `xref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xdocnum` int(11) DEFAULT NULL,
  `xtxnnum` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xoperator` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ecomsales_temp_deleted`
--

INSERT INTO `ecomsales_temp_deleted` (`xsl`, `xtemsl`, `ztime`, `xdate`, `bizid`, `xstudent`, `xstudentmobile`, `xitemcode`, `xprice`, `xqty`, `xref`, `xstatus`, `xdocnum`, `xtxnnum`, `xoperator`) VALUES
(1, 1, '2021-09-28 11:52:37', '2021-09-28', 101, 47, '01948376368', 'ITM000051', '6500.0000', 1, 'Junayed07', 'Created', NULL, 'WUJ2H7EWN', 'bkash');

-- --------------------------------------------------------

--
-- Table structure for table `educat`
--

CREATE TABLE `educat` (
  `xcatsl` int(6) NOT NULL,
  `bizid` int(6) NOT NULL,
  `xcat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `educat`
--

INSERT INTO `educat` (`xcatsl`, `bizid`, `xcat`, `zactive`) VALUES
(1, 100, 'Amarbazar Regular Training', 1),
(2, 100, 'Amarbazar Special Training', 1),
(3, 100, 'Dot BD Solutions Training', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educourse`
--

CREATE TABLE `educourse` (
  `xcourse` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL DEFAULT 100,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xstartdate` date DEFAULT NULL,
  `xcoursetitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `xcoursedesc` text COLLATE utf8_unicode_ci NOT NULL,
  `xteacher` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xteacheramt` decimal(10,2) NOT NULL,
  `xteacher1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xteacheramt1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xlogisticamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xvenuamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xcat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xsubcat` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnumclass` int(11) NOT NULL,
  `xhourclass` int(11) NOT NULL,
  `xprice` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xcur` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'BDT',
  `zactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `xlastupdate` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xminrequirement` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `xlearning` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `xrelatedcuorse` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoursetype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcourseclass` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'Training',
  `xskillevel` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N/A',
  `xduration` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xlectures` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xresources` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xquizzes` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xpreviewlessons` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `xlanguage` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'English',
  `xpoint` int(6) NOT NULL DEFAULT 0,
  `xvenu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcapacity` int(5) NOT NULL DEFAULT 0,
  `xexpdate` date DEFAULT NULL,
  `xfinished` int(1) NOT NULL DEFAULT 1,
  `xtag` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpriority` int(2) NOT NULL DEFAULT 0,
  `xvat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xtxnamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xtmamt` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xpublishstatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `educourse`
--

INSERT INTO `educourse` (`xcourse`, `ztime`, `bizid`, `zemail`, `xstartdate`, `xcoursetitle`, `xcoursedesc`, `xteacher`, `xteacheramt`, `xteacher1`, `xteacheramt1`, `xlogisticamt`, `xvenuamt`, `xcat`, `xsubcat`, `xnumclass`, `xhourclass`, `xprice`, `xcur`, `zactive`, `xlastupdate`, `xminrequirement`, `xlearning`, `xrelatedcuorse`, `xcoursetype`, `xcourseclass`, `xskillevel`, `xduration`, `xlectures`, `xresources`, `xquizzes`, `xpreviewlessons`, `xlanguage`, `xpoint`, `xvenu`, `xcapacity`, `xexpdate`, `xfinished`, `xtag`, `xpriority`, `xvat`, `xtxnamt`, `xtmamt`, `xpublishstatus`) VALUES
(10, '2021-03-26 15:50:47', 100, 'rajib@dbs.com', '2021-09-23', 'Selling Skill Development Time: 10:00 AM', '<p>About ABL, E-commerce, Marketing and Pay<br />\r\nPlan &amp;amp; Action<br />\r\nSailing Skill Development &amp;amp; Invite Follow up</p>\r\n', 'Md. Ashraful Amin', '0.00', 'Saifullah Al Mamun', '0.00', '0.00', '0.00', 'Amarbazar Regular Training', NULL, 21, 5, '500.00', 'BDT', 1, NULL, 'N/A', '', NULL, 'Amarbazar Course', 'Training', '', '5', '0', '0', '0', '1', 'English', 25, 'Amarbazar Ltd. Head Office Hall Room', 0, NULL, 1, NULL, 1, '0.00', '0.00', '0.00', 'Created');

-- --------------------------------------------------------

--
-- Table structure for table `edusalesdet`
--

CREATE TABLE `edusalesdet` (
  `xsalesdetsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xsalesnum` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `xstudent` int(11) NOT NULL,
  `xcourse` int(6) NOT NULL,
  `xprice` decimal(10,2) NOT NULL,
  `xqty` int(6) NOT NULL,
  `xpoint` int(6) NOT NULL,
  `xstartdate` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdelqty` int(6) NOT NULL,
  `xcustype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xpaymethod` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcoupon` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edusalesdet`
--

INSERT INTO `edusalesdet` (`xsalesdetsl`, `ztime`, `xsalesnum`, `xdate`, `xstudent`, `xcourse`, `xprice`, `xqty`, `xpoint`, `xstartdate`, `xdelqty`, `xcustype`, `xpaymethod`, `xcoupon`) VALUES
(39, '2021-03-04 12:21:55', 43, '2021-03-04', 93, 8, '500.00', 1, 25, '', 0, 'Amarbazar', 'Nagad', '6040D0E386AEA'),
(40, '2021-04-02 07:23:25', 44, '2021-04-02', 67, 10, '500.00', 1, 25, '', 0, 'Amarbazar', 'Nagad', '6066C66D85E26');

-- --------------------------------------------------------

--
-- Table structure for table `edusalesmst`
--

CREATE TABLE `edusalesmst` (
  `xsalenum` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xstudent` int(11) NOT NULL DEFAULT 0,
  `xdate` date NOT NULL,
  `xfullname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xaddress` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `xmobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xtemptxn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcustype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xpaymethod` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edusalesmst`
--

INSERT INTO `edusalesmst` (`xsalenum`, `ztime`, `xstudent`, `xdate`, `xfullname`, `xaddress`, `xmobile`, `xstatus`, `xtemptxn`, `xcustype`, `xpaymethod`) VALUES
(43, '2021-03-04 12:21:55', 93, '2021-03-04', 'Masud', 'Head office', '01611479212', 'Confirmed', '6040d0b46240a', 'Amarbazar', 'Nagad'),
(44, '2021-04-02 07:23:25', 67, '2021-04-02', 'Md asHRAFUL aMIN', '27 Court house Street dhaka-1100', '01621177777', 'Confirmed', '6066c644a108d', 'Amarbazar', 'Nagad');

-- --------------------------------------------------------

--
-- Table structure for table `edustudent`
--

CREATE TABLE `edustudent` (
  `xstudent` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) DEFAULT 100,
  `xstuname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xdob` date DEFAULT NULL,
  `xstuemail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xmobile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xguardian` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgurdianmobile` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xsex` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xagreed` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `xpassword` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `xotptime` datetime DEFAULT NULL,
  `xotp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xotpsend` int(2) NOT NULL DEFAULT 0,
  `xverified` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `zactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `xcustype` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'DOTADEMY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edustudent`
--

INSERT INTO `edustudent` (`xstudent`, `ztime`, `zutime`, `bizid`, `xstuname`, `xdob`, `xstuemail`, `xmobile`, `xaddress`, `xguardian`, `xgurdianmobile`, `xcountry`, `xcity`, `xsex`, `xagreed`, `xpassword`, `xotptime`, `xotp`, `xotpsend`, `xverified`, `zactive`, `xcustype`) VALUES
(46, '2021-02-28 10:08:39', NULL, 101, 'MD EASIN BAPPY', '2002-04-22', 'yasinbappymy@gmail.com', '01980903926', 'SAIDPUR NILPHAMAMRI RANGPUR', 'MST SUMMY', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, 'c5c08ef653efe115cca589912e9bdda4853562afeea0d35d8a0fd61a6f70a2b0', '2021-02-28 16:08:39', '328314', 0, 1, 1, 'DOTADEMY'),
(47, '2021-02-28 10:18:25', NULL, 101, 'Salim', '2005-09-09', 'Sreza7024@gmail.com', '01948376368', 'Uttar plash bari champatoli chirirbandar dibajpur', 'Mst.selina begum', NULL, 'Bangladesh', 'DINAJPUR', 'Male', 1, 'fa216056f4954bd380babd3b688bca8dd154d081a478e138854a4d08214f377e', '2021-02-28 16:18:25', '154795', 0, 1, 1, 'DOTADEMY'),
(48, '2021-02-28 10:20:25', NULL, 101, 'MD. ARIFUL ISLAM ', '2002-06-12', 'mdarifulislam240909@gmail.com', '01773668331 ', 'Ranirbandor CHIRIRBANDAR DINAJPUR ', 'MST. NILUFA BANU', NULL, 'Bangladesh', 'DINAJPUR', 'Male', 1, '40666115555b71b9b893fb42ddaa276aaee415d0e2ae1f71b5c6d7b4c3055c17', '2021-02-28 16:20:25', '424608', 0, 1, 1, 'DOTADEMY'),
(49, '2021-02-28 11:56:53', NULL, 101, 'Md Sowrov Hossain ', '2003-00-00', 'mdsowrov689@gmail.com', '01647400763', 'Joypurhat', 'Md Raton', NULL, 'Bangladesh', 'JOYPURHAT', 'Male', 1, '775a55dd81e0e683eba0c61f90974ac9a1878158210bfa0770617f5d11835f95', '2021-02-28 17:56:53', '668927', 0, 1, 1, 'DOTADEMY'),
(50, '2021-02-28 12:07:56', NULL, 101, 'Md. Nurul Absar', '1987-01-03', 'forhadnoor@gmail.com', '01903330555', 'Jorarganj, Chattogram', 'Bibi Sakina', NULL, 'Bangladesh', 'CHATTOGRAM', 'Male', 1, 'a63366bb231063e04bc48714723ed6eeae89990d5756c1ddef94aaf2ee6650b0', '2021-02-28 18:07:56', '868461', 0, 1, 1, 'DOTADEMY'),
(51, '2021-02-28 12:23:34', NULL, 101, 'Md Rajibul Islam', NULL, 'mdrajibdbs@gmail.com', '01841923270', 'Dhaka', NULL, NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', NULL, NULL, 0, 1, 1, 'Amarbazar'),
(52, '2021-02-28 12:47:12', NULL, 101, 'Shihab Sardar', '2000-12-17', 'shihab7425@gmail.com', '01636915327', 'Belaichandi sardarpara', 'Saiful Islam sardar', NULL, 'Bangladesh', 'DINAJPUR', 'Male', 1, '52ed2136fe76d4d042fa66f1d05057b36dd9af8fef6886f59eb37849371c8b26', '2021-02-28 18:47:12', '359141', 0, 1, 1, 'DOTADEMY'),
(53, '2021-02-28 13:58:14', NULL, 101, 'Nahiyan abrar Nahid', '2003-07-25', 'ablnahidislam@gmail.com', '01821736266', 'Saidpur rangpur', '', NULL, 'Bangladesh', 'DINAJPUR', 'Male', 1, '8922f8e33ec08180a14271441a896e4c37474a8a187cc20a33f89150e1446555', '2021-02-28 19:58:14', '650632', 0, 1, 1, 'DOTADEMY'),
(54, '2021-02-28 17:22:28', NULL, 101, 'Jobayer mahamud', '1999-09-08', 'jankorban78@gmail.com', '01883325733', 'Madhabdi narshingdi', 'Ainal hoque', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '5938bc123490179a02fde784d0f2a2864a9e82de55ab999915c5c1c91a451673', '2021-02-28 23:22:28', '557180', 0, 1, 1, 'DOTADEMY'),
(55, '2021-02-28 17:39:58', NULL, 101, 'Sany Ray', '1998-11-28', 'sarkersony439@gmail.com', '01756545210', 'Polash.Narahind', 'Rony Sarker', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '6e4b01800b58310b2e8e20dc54505c47cb00cc9d4f295e7d874341d184a34701', '2021-02-28 23:39:58', '421962', 0, 1, 1, 'DOTADEMY'),
(56, '2021-02-28 17:59:46', NULL, 101, 'Rajib Ahmed', '2000-09-14', 'rajibkhan6200@gmail.com', '01624262200', 'Narsingdi', 'Feroz mia', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'e0247c57e0e796043726c400b1f57abe23abb8db7b05a2fbb7895c924e88761e', '2021-02-28 23:59:46', '219834', 0, 1, 1, 'DOTADEMY'),
(57, '2021-02-28 19:25:21', NULL, 101, 'Rajash Dey', NULL, 'rajashdey@gmail.com', '01673221190', 'Novo colony, mohajon ghata', NULL, NULL, 'Bangladesh', 'CHATTOGRAM', 'Male', 1, 'c81cfeb6db09c92de250ea53d9fb685a753aff7c2b5ea7bbc1a9000bd23936f0', NULL, NULL, 0, 1, 1, 'Amarbazar'),
(58, '2021-03-01 00:15:27', NULL, 101, 'Md.Goljar Hossain ', '1996-09-04', 'goljarkhan2020@gmail.com', '01634714814', 'Rangpur ', 'Mahabubul Barak', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, 'fb322ccf1eeedf1a742901322c6e3011fe7f9d210f9c5163e150414d83d40151', '2021-03-01 06:15:27', '112416', 0, 1, 1, 'DOTADEMY'),
(59, '2021-03-01 01:27:34', NULL, 101, 'Alhasib Islam Fahim', '0000-00-00', 'fahimafrin00001@gmail.com', '01859999753', 'Nilphamari', '', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '126c2320627c6a87784be2a18479c0766f95065af2aea6d3350c9247fb13cb99', '2021-03-01 07:27:34', '444065', 0, 1, 1, 'DOTADEMY'),
(60, '2021-03-01 02:38:18', NULL, 101, 'SM SHAMIM ISLAM', '2002-06-03', 'smshamimislam1234@gmail.com', '01822422206', 'MITHAPUKUR RANGPUR', 'SM MANNAN', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, 'ebfb75ab3ffc5871fa51b379921c5cef051defe8cfab18dff314894b9f55beb1', '2021-03-01 08:38:18', '611379', 0, 1, 1, 'DOTADEMY'),
(61, '2021-03-01 04:27:12', NULL, 101, 'MISHU KANTI DEB', '1984-10-02', 'mishukd1984@gmail.com', '01816158884', 'Patengha. Ctg', 'MRIDUL KANTI DEB', NULL, 'Bangladesh', 'CHATTOGRAM', 'Male', 1, 'f4cdb4227008788caec0beaa48b69822ab595d1ce6c19523cae1236947fbb02f', '2021-03-01 10:27:12', '165035', 0, 1, 1, 'DOTADEMY'),
(62, '2021-03-01 05:44:11', NULL, 101, 'Md Shanto Mia', '2000-01-02', '01840324560ma@gmail.com', '01999322759', 'Madhobdi Narsingdi ', 'Md Satter Mia', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '1326d91dd225b5727942a82e30a70ebd00972d4b8a53a682c4d6056b888bc7fc', '2021-03-01 11:44:11', '132258', 0, 1, 1, 'DOTADEMY'),
(63, '2021-03-01 07:57:10', NULL, 101, 'Saibe Molla', '2003-11-06', 'Saibe2molla@gmail.com', '01790453558', 'Madhobdi', 'Sajid Molla', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'd9d9180f10ecec84dc0bd0bfce3e16ade659a02b874157f9f4e6b21e0cfdc2cd', '2021-03-01 13:57:10', '729123', 0, 1, 1, 'DOTADEMY'),
(64, '2021-03-01 08:45:15', NULL, 101, 'Nur Mohammad Robin ', '2001-06-16', 'nmrobin.nmr@gmail.com', '01635270204', '27/5, Basail, Narsingdi Sadar, Narsingdi', 'Anwar Pathan', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '1d132efb157f4a3f722cdf501c7aee414494ce55808f3ae196350bab0d9cf8e6', '2021-03-01 14:45:15', '468697', 0, 1, 1, 'DOTADEMY'),
(65, '2021-03-01 09:48:33', NULL, 101, 'MD', '1997-05-01', 'amarbazarltd2017nco@gmail.com', '01319918267', 'madhabdi, narsingdi', 'Yeakub ', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '9f06b17bce1f9d3c952a9d2c7af0459193b22f7e0bf0e05fecde2d4eff769085', '2021-03-01 15:48:33', '464284', 0, 0, 1, 'DOTADEMY'),
(66, '2021-03-01 10:45:37', NULL, 101, 'Zahangir ', '0000-00-00', 'monimahmud60@gmail.com', '01723535260', 'Dutch-Bangla Bank Ltd', '', NULL, 'Bangladesh', 'GAIBANDHA', 'Male', 1, '73c8e93f5b809f37d198e309e858277e14dd88ed735e070246d11cbb2e992149', '2021-03-01 16:45:37', '438089', 0, 1, 1, 'DOTADEMY'),
(67, '2021-03-01 11:33:29', NULL, 101, 'Md asHRAFUL aMIN', NULL, 'ashrafulaminpdl@gmail.com', '01621177777', '27 Court house Street dhaka-1100', NULL, NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', NULL, NULL, 0, 1, 1, 'Amarbazar'),
(68, '2021-03-01 11:41:26', NULL, 101, 'Md Nazrul Islam ', '1983-06-16', 'nislam807@gmail.com', '01716332063', 'Bondartila Chittagong ', 'Ibrahim khalil', NULL, 'Bangladesh', 'CHATTOGRAM', 'Male', 1, 'd5ebb478ddeea286b73f71ee688cdfa8479031c72872d6a88655adcb96a9148f', '2021-03-01 17:41:26', '859703', 0, 1, 1, 'DOTADEMY'),
(69, '2021-03-01 13:14:19', NULL, 101, 'Minhaj uddin Raj', '1998-01-16', 'mhraj145@gmail.com', '01623758434', 'baniyasal,narsingdi', 'Shirina Akter', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'ca86f75a1c22a558fd2cb6d2e35b54e61757aa6164b574c870b8bb5efac04e98', '2021-03-01 19:14:19', '971777', 0, 1, 1, 'DOTADEMY'),
(70, '2021-03-01 14:17:25', NULL, 101, 'RABI ISLAM RIB', '1991-05-25', 'rabiislam240@gmail.com', '01737831959', 'DOMAR', 'MD AFIZAR RAHANAN', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '43072d012726a2b5a7572862f0000ede00642d8367db6cfecef0cca46a534288', '2021-03-01 20:17:25', '714243', 0, 1, 1, 'DOTADEMY'),
(71, '2021-03-01 14:46:24', NULL, 101, 'RABI ISLAM RIB', '1991-05-25', 'rabiislam240@gmail.com', '01918912370', 'DOMAR', 'MD RABIUL ISLAM RABi', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '43072d012726a2b5a7572862f0000ede00642d8367db6cfecef0cca46a534288', '2021-03-01 20:46:24', '193200', 0, 1, 1, 'DOTADEMY'),
(72, '2021-03-01 15:06:47', NULL, 101, 'MD NANNU ISLAM', '0000-00-00', 'rabiislam240@gmail.com', '01785416511', 'DOMAR', '', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '32b27ab6893663c6f52efd610864a73ebb8fee06b7f04c3af62986f0311a3d00', '2021-03-01 21:06:47', '154113', 0, 1, 1, 'DOTADEMY'),
(73, '2021-03-01 15:21:32', NULL, 101, 'Hafizz Jobayer Amin Miajee ', '0000-00-00', 'jobayeramin22@yahoo.com', '01770674140', 'Sholopara, Daspara,Daudkandi,Cumilla', '', NULL, 'Bangladesh', 'COMILLA', 'Male', 1, 'ddb624d129ac01acd4651af35aa1b193458e8fde7ca726b3ccb9f7dfb571b02c', '2021-03-01 21:21:32', '478985', 0, 1, 1, 'DOTADEMY'),
(74, '2021-03-01 15:47:23', NULL, 101, 'ASHRAFUL ', '1979-07-23', 'ashrafultqi28@gmail.com', '01713722688', 'DADON,KANDIR HAT,PIRGACHHA,RANGPUR', 'MD. MOFIZUL ISLAM', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '0d03d7fb1719cea9c09d7ec0564e991c361450382b0cf5ecfd78ac9fdf6fa7fc', '2021-03-01 21:47:23', '341439', 0, 1, 1, 'DOTADEMY'),
(75, '2021-03-01 15:52:34', NULL, 101, 'Tapan kumar patowari', '1990-09-12', 'tapan.rupai@gmail.com', '01723939094', 'Chachia Mirgonj, tarapur, Sundarganj, gaibandha', 'Rabindra Nath Barman', NULL, 'Bangladesh', 'GAIBANDHA', 'Male', 1, 'ef99cc7ef6a72f408c9f6886279494549400f45018e085656219e86a9352da94', '2021-03-01 21:52:34', '831986', 0, 1, 1, 'DOTADEMY'),
(76, '2021-03-01 15:54:41', NULL, 101, 'Shajahan', '1984-10-10', 'shajahanmiah1984@gmail.com', '01765907046', 'Falgachha, Sundargonj, Gaibandha', 'Md. Joynal Abedin', NULL, 'Bangladesh', 'GAIBANDHA', 'Male', 1, 'e7bde75f56fc524ab5504fd06e4796436e6cba56fa6c6e38c2004736308b992d', '2021-03-01 21:54:41', '648913', 0, 1, 1, 'DOTADEMY'),
(77, '2021-03-01 16:08:58', NULL, 101, 'Ashraful Alam', '1979-07-23', 'ashrafultqi28@gmail.com', '01922988585', 'DADON,KANDIR HAT,PIRGACHHA,RANGPUR', 'MD. MOFIZUL ISLAM', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '1a1e10661e27a6c1e7c7a414a10e0ecda5d900a4e4038a14f8181c699648e838', '2021-03-01 22:08:58', '392230', 0, 0, 1, 'DOTADEMY'),
(78, '2021-03-01 16:09:10', NULL, 101, 'MD. MOSARAF HOSSAIN', '1980-11-12', 'hossainmosaraf814@gmail.com', '01719516137', 'Chandra, Sonaray, Sundarganj, Gaibandha', 'Md. Taslim Uddin Bapary', NULL, 'Bangladesh', 'GAIBANDHA', 'Male', 1, '368252c7e7178f55420923c647cc0c55477821c7465e9856ba46ced9e75bf91a', '2021-03-01 22:09:10', '659414', 0, 1, 1, 'DOTADEMY'),
(79, '2021-03-01 16:18:22', NULL, 101, 'Showrob', '2001-03-01', 'showrobmia51@gmail.com', '01739120250', 'Narsingdi', 'Easmin Begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '0febffd0c32be4fa34f9d264206f7264e60e420bce1e265de0f88edf6e396c09', '2021-03-01 22:18:22', '306927', 0, 1, 1, 'DOTADEMY'),
(80, '2021-03-01 16:34:19', NULL, 101, 'Jafizur', '1990-01-01', 'smhafizur11@gmail.com', '01729122244', 'Dadon, Kandirhat, Pirgachha, Rangpur.', 'Md. Abul Kashem', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '07f9f92a81fa7ec3ce9b95bbb0c9b61dcaef18fae15399400b183431d514fc26', '2021-03-01 22:34:19', '297167', 0, 1, 1, 'DOTADEMY'),
(81, '2021-03-01 16:42:28', NULL, 101, 'Hafizur', '1990-01-01', 'Hafi9996@gmail.com', '01765959645', 'Pirgachha, Rangpur', 'Abul Kashem', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '07f9f92a81fa7ec3ce9b95bbb0c9b61dcaef18fae15399400b183431d514fc26', '2021-03-01 22:42:28', '907422', 0, 1, 1, 'DOTADEMY'),
(82, '2021-03-01 16:43:55', NULL, 101, 'MD.SHAK AZEM SARDAR', '1980-11-10', 'mdshakazem@gamail.com', '01723607048', 'SUNDARGANJ, SUNDARGANJ-5720,GAIBANDHA', 'MD.Azijar rahaman', NULL, 'Bangladesh', 'GAIBANDHA', 'Male', 1, '74d40693920a7a90859127f888a1872131b4dd7ce0d1b554d15ca317e94af833', '2021-03-01 22:43:55', '151645', 0, 1, 1, 'DOTADEMY'),
(83, '2021-03-01 17:48:04', NULL, 101, 'Zahangir Alam', '1989-03-21', 'monimahmud60@gmail.com', '01715402478', 'Hatibandha, Lalmonirhat', 'Most Husneara Mitu', NULL, 'Bangladesh', 'LALMONIRHAT', 'Male', 1, '1d1271f5cc625ac27cebc3ddef99bcf1e2a1fc02863819df36e2202e3bff585c', '2021-03-01 23:48:04', '286853', 0, 1, 1, 'DOTADEMY'),
(84, '2021-03-01 19:10:24', NULL, 101, 'MOHAIMAN', '1999-10-07', 'mohaiman78@gmail.com', '01781999479', 'Naogaon office', 'MD.ARIF HOSSAIN', NULL, 'Bangladesh', 'NAOGAON', 'Male', 1, '320801b88bd21caa11825cd571dd6c8120100970e413f66d0fb094fba071cea9', '2021-03-02 01:10:24', '651752', 0, 1, 1, 'DOTADEMY'),
(85, '2021-03-02 00:18:29', NULL, 101, 'Md.Sattar Mahamud', '1995-01-01', 'mdsattar629@gmail.com', '01827646285', 'South Middle Halishahar, Bandor,CEPZ.', '', NULL, 'Bangladesh', 'LAKSHMIPUR', 'Male', 1, 'f5ccb3210fe1ea8188b97b96e07190526c9d15ca76d2ed293ebb159473985592', '2021-03-02 06:18:29', '483608', 0, 1, 1, 'DOTADEMY'),
(86, '2021-03-02 02:14:04', NULL, 101, 'Joy Das Konoy ', '2000-01-02', 'jkjoy01861812302@gmail.com', '01861812302', 'Madhabdi,Narsingdi', 'Joy', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '7c8e07e22a360d8e9367eed7a0290a2ef7c671b51ac7ee336755480629d870e6', '2021-03-02 08:14:04', '980037', 0, 1, 1, 'DOTADEMY'),
(87, '2021-03-02 04:51:08', NULL, 101, 'MD: Rasel', '2002-08-07', 'mr226946@gmail.com', '01735254267', 'boalia naogaon', 'MD: Aslam ali', NULL, 'Bangladesh', 'NAOGAON', 'Male', 1, '7a7e8b65c714a35a922836f2e368078a3285339378bd7ac978b69d504e43f3f7', '2021-03-02 10:51:08', '132421', 0, 1, 1, 'DOTADEMY'),
(88, '2021-03-02 06:39:19', NULL, 101, 'Didarul Hasan Nasim ', '2004-10-10', 'didarulhasan490@gmail.com', ' 01883239319', 'Village :Radhakanai,Post:Furkanabad,Upazila :Fulbaria,Dis:Mymensingh ', 'Abdullahil Kafi', NULL, 'Bangladesh', 'MYMENSINGH', 'Male', 1, '4171f4932ba1813dc43d289f530a5987fd91c4a647389a755651fb0fe7e10c29', '2021-03-02 12:39:19', '778333', 0, 1, 1, 'DOTADEMY'),
(89, '2021-03-02 14:18:09', NULL, 101, 'Siyam khan ', '1989-09-24', 'stsiyamkhan0099@gmail.com', '01829876157', 'Narsingdi ,sadar', 'Sirajul Islam siraj', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'fc82251a564b8258d599cae40a4bf845d1617f9d7399de574956d4c139fe7081', '2021-03-02 20:18:09', '898404', 0, 1, 1, 'DOTADEMY'),
(90, '2021-03-02 16:26:18', NULL, 101, 'BARAK', '1967-01-05', 'mdbarak564555@gmail.com', '01712564555', 'RANGPUR ', 'ARAF MAYESHA', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '2021-03-02 22:26:18', '948583', 0, 1, 1, 'DOTADEMY'),
(91, '2021-03-02 16:44:25', NULL, 101, 'Jihad Sheikh', '0000-03-04', 'Jihadsheikh020@gmail.com', '01956795596', 'Shibpur ', '', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'ac76f20ebdb4c3f0a2b3193cddd060f3ac18c77a17469960e6efb05fbc49de0b', '2021-03-02 22:44:25', '433526', 0, 1, 1, 'DOTADEMY'),
(92, '2021-03-04 11:32:42', NULL, 101, 'Al Shahriar ', '2003-03-06', 'alshahriar01308@gmail.com', '01846994338', 'Zilla Porishod, Narayanganj, Dhaka', 'Md Alamgir Hossain ', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, 'a5ec98a238e401c23dbff5058d2f67d201b84727917d6d43632b2338be98f694', '2021-03-04 17:32:42', '667172', 0, 1, 1, 'DOTADEMY'),
(93, '2021-03-04 12:21:55', NULL, 101, 'Masud', NULL, 'masud9210@gmail.com', '01611479212', 'Head office', NULL, NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', NULL, NULL, 0, 1, 1, 'Amarbazar'),
(94, '2021-03-04 16:37:15', NULL, 101, 'Salim Hasan', '1981-05-08', 'salimhd2k@gmail.com', '01611353570', 'Pahartoli Chittagong', 'Md.Abdul Hai Gazi', NULL, 'Bangladesh', 'CHATTOGRAM', 'Male', 1, '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '2021-03-04 22:37:15', '720715', 0, 1, 1, 'DOTADEMY'),
(95, '2021-03-05 04:19:01', NULL, 101, 'Md Belal Hossain', '1979-03-15', 'd2kbelal7788@gmail.com', '01811233755 ', 'Rampur, Bijoykara 583', 'Hoshen', NULL, 'Bangladesh', 'COMILLA', 'Male', 1, '924da5a21cb5d66cfdbc281b6e17c11e32a24b37a547c48d87cc3c453b9a722a', '2021-03-05 10:19:01', '244211', 0, 1, 1, 'DOTADEMY'),
(96, '2021-03-05 06:58:25', NULL, 101, 'Dr.Shebendra karmakar', '1966-08-13', 'shebendrak@yahoo.com', '01712393053', '60,Shantibag, Dhaka.', 'Ety Chatrejee', NULL, 'Bangladesh', 'Select District', 'Male', 1, 'd1cea71c15693247f67a0e55b6a64503c30092bbad6d5dc9779491cf319a9398', '2021-03-05 12:58:25', '815358', 0, 0, 1, 'DOTADEMY'),
(97, '2021-03-05 07:59:59', NULL, 101, 'Eousuf Ahmed', '2000-03-01', 'eousufahmed45@gmail.com', '01609219704', 'Narsingdi Sadar', 'Jamal Uddin', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '580d8780ab242fd98cb8f4fa11d2af4832714f4e07f14e888c1ce66b36abf54c', '2021-03-05 13:59:59', '412295', 0, 1, 1, 'DOTADEMY'),
(98, '2021-03-06 08:09:18', NULL, 101, 'Rudra', '2002-02-01', 'Soykot687@gmail.com', '01835321375', 'Narsingdi', 'Saamir ', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '1ea7f55f0131859a5c5c71d75d709017877c63fedd1181091437db32f589f786', '2021-03-06 14:09:18', '606578', 0, 1, 1, 'DOTADEMY'),
(99, '2021-03-07 07:44:31', NULL, 101, 'MD: Rana Mia', '1998-09-22', 'munjurulislam9988@gmail.com', '01865856131', 'Purinda', 'Mono mia', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, 'fe3baa937249572f2794741ed6c07d8df3aaf7853795036705643814ac60411a', '2021-03-07 13:44:31', '695340', 0, 1, 1, 'DOTADEMY'),
(100, '2021-03-07 07:52:54', NULL, 101, 'md alimul islam', '0000-02-03', 'malimulislam@gmail.com', '01866535809', 'kashipur', 'sajedul', NULL, 'Bangladesh', 'KURIGRAM', 'Male', 1, '790eb4a878d4a23bdfbe3a0c109b346a7e0ab261b828b2ea6d0034d54789e75c', '2021-03-07 13:52:54', '801820', 0, 1, 1, 'DOTADEMY'),
(101, '2021-03-07 10:30:12', NULL, 101, ' MD. SHAHINUR ALAM SHAHIN', '1978-02-07', 'mdshahinur1978rng@gmail.com', '01796977280', 'DOKKHIN BINNATARI 11NO WARD RANGPUR ', 'MOST. MONOWARA BEGUM', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, 'ff8bfd3b27021ad06dde24bbb9e8c58134c044d478952be72d5a0214f5da79e2', '2021-03-07 16:30:12', '736939', 0, 1, 1, 'DOTADEMY'),
(102, '2021-03-08 14:01:54', NULL, 101, 'Sajed Islam', '2002-10-20', 'junaidsajed780@gmail.com', '01869672007', 'Shanti Pharmacy,  West Rasulpur, Kamrangir Char,  Dhaka-1211', 'Mahfuz Ibn Nurislam', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '1fbe2a6afab8287090796c4c727c9867bcf9cb27ad4440dac7fb8f4ef8eeed74', '2021-03-08 20:01:54', '612431', 0, 1, 1, 'DOTADEMY'),
(103, '2021-03-10 16:40:21', NULL, 101, 'Md Nurul Afsar Saiful   ', '0000-00-00', 'nurulafsarnirob@gmail.com', '01719444712', 'Sreemongal Moulvibazar  ', '', NULL, 'Bangladesh', 'MOULVIBAZAR', 'Male', 1, 'dcaf49490bb4e1cf64a29f34d9b27987c21cd4919fcfd61e91fb81772ba2a232', '2021-03-10 22:40:21', '276696', 0, 1, 1, 'DOTADEMY'),
(104, '2021-03-11 18:15:50', NULL, 101, 'Ahsan Habib ', '1992-01-01', 'ahsanh128@gmail.com', '01928082948', 'Saniakhra', 'Shaifa ', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'cbac1570830b6bd5a460627dbda104d864d7bedcef47fec90484b4172e14bc6f', '2021-03-12 00:15:50', '723616', 0, 1, 1, 'DOTADEMY'),
(105, '2021-03-11 18:36:13', NULL, 101, 'Rased islam', '2002-08-05', 'Rased78600@gmail.com', '01849470864', 'Donia,,dhaka-1236', 'Roksana begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'f41285cb7181e5774c8f92aabb0c9b0a4e0d503fda00be75a19d707c4e6f4ad3', '2021-03-12 00:36:13', '678392', 0, 0, 1, 'DOTADEMY'),
(106, '2021-03-11 18:38:56', NULL, 101, 'Md Ibrahim ', '2000-10-15', 'Ibubhaiya04@gmail.com', '01881560238', 'Shanir akhra, Dhaka', 'Ahsan Habib', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '0cc50dca967be9d0905de86cdbf3f8eeacad00689f9148b9af1988d0782da40e', '2021-03-12 00:38:56', '960441', 0, 1, 1, 'DOTADEMY'),
(107, '2021-03-11 18:46:25', NULL, 101, 'Md Shanto ', '0000-03-03', 'mdshanto1732005@gmail.com', '01307186216', 'Nurpur,Dhaka-1236', 'Md Jebul hoque', NULL, 'Bangladesh', 'BHOLA', 'Male', 1, '43dcfe30cf9e119d271d405933875bf89d1e103ddda9d1bc6cdd4489667383c4', '2021-03-12 00:46:25', '585062', 0, 0, 1, 'DOTADEMY'),
(108, '2021-03-11 18:49:47', NULL, 101, 'Abdul Ahad', '2001-07-21', 'shoabahad1@gmail.com', '01824331112', 'Merajnogor, Dhaka', 'Shahanaj Akter', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '90d9ef3d16e597fc2e4ae95c802aaf11f03f0710c9b15af1e27caf90415f4d10', '2021-03-12 00:49:47', '103004', 0, 1, 1, 'DOTADEMY'),
(109, '2021-03-11 18:50:46', NULL, 101, 'Ashraf Uzzaman', '2004-08-04', 'anwarul.karimmsl@gmail.com', '01749931891', 'Janatabug,kodomtoli,dania-dhaka-1236', 'Bithi Anwar', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '4403e0106ab8af381dccc966ac4466c6b6433908f77408d3471b109aba33dbcf', '2021-03-12 00:50:46', '308164', 0, 1, 1, 'DOTADEMY'),
(110, '2021-03-11 18:54:49', NULL, 101, 'Md: Miraj', '2003-10-18', 'jesinjesinmaraj@gmail.com', '01989897497', 'Sostapur,  futullah, Narayanganj ', 'Md : Akter Hossan', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, '332385a4f95bc1f02389b5d05fd6afdb34dc25d08831a246e872db665f6558c7', '2021-03-12 00:54:49', '110474', 0, 1, 1, 'DOTADEMY'),
(111, '2021-03-11 18:56:26', NULL, 101, 'Rased islam', '2002-08-05', 'Rased78600@gmail.com', '01990303446', 'Donia,,dhaka-1236', 'Roksana begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'f41285cb7181e5774c8f92aabb0c9b0a4e0d503fda00be75a19d707c4e6f4ad3', '2021-03-12 00:56:26', '370443', 0, 0, 1, 'DOTADEMY'),
(112, '2021-03-11 19:00:19', NULL, 101, 'Ahmed Fahim', '2002-01-11', 'fa345059@gmail.com', '01316212320', 'Kazla. Dhaka', 'Aysha begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '0e3bed0698845c01f3ec6bbf1df54bd658db0df1f8dfa787d48d379f10bfbf59', '2021-03-12 01:00:19', '578312', 0, 1, 1, 'DOTADEMY'),
(113, '2021-03-11 19:03:06', NULL, 101, 'Ratim Hasan', '2002-11-30', 'ratimhasan7777@gmail.com', '01886677162', 'Dhonia dhaka', 'Salim uddin', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'fedbca308e08ccede4c455b44ec49883e8c5914de94442f32d083162f4f33627', '2021-03-12 01:03:06', '909865', 0, 1, 1, 'DOTADEMY'),
(114, '2021-03-11 19:30:06', NULL, 101, 'Md Abdullah Al Mufid  ', '2005-04-06', 'abdullahalmufid459@gmail.com', '01945152307', '15/7gas road, kadamtali,Dhaka ', 'S M FaridUddin   ', NULL, 'Bangladesh', 'Select District', 'Male', 1, '19b66536d156ce43805c5a8e842bb67cb6aa858c72195bb919d50a9f066b80d1', '2021-03-12 01:30:06', '612230', 0, 1, 1, 'DOTADEMY'),
(115, '2021-03-11 19:50:06', NULL, 101, 'Husain Muhammad Aqib Prioum', '2003-06-21', 'hmaprioum@gmail.com', '01966454176', '90,Rasulpur Shahi Masjid Rd,Rasulpur,Dania,Jatrabari,Dhaka-1236', 'Silvia Nasrin', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'd9ae3c462c5926f5a96e0902197abba9b76a6a60f750b4c4ae93bbec6910037f', '2021-03-12 01:50:06', '130932', 0, 1, 1, 'DOTADEMY'),
(116, '2021-03-11 21:03:04', NULL, 101, 'Mohammod Rasel ', '0000-10-00', 'Raselhasan146198182@gmail.com', '01778881109', 'Dania dhaka', '', NULL, 'Bangladesh', 'Select District', 'Male', 1, 'f405a0c413db93494534bd1becbbd3fa5e3d80aa106ab56ef3a8dd03e4c29a4e', '2021-03-12 03:03:04', '623348', 0, 1, 1, 'DOTADEMY'),
(117, '2021-03-12 03:38:02', NULL, 101, 'Farabi Hasnain', '2000-01-06', 'hossanhasnain@gmail.com', '01644899030', '৯/২,গ্যাস রোড,ঢাকা-১২৩৬', 'Shahinur Begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'a726fd4978d8d0634533a1f997a6d826b2d7779d6677d0f46e7678bce10f0a72', '2021-03-12 09:38:02', '407374', 0, 1, 1, 'DOTADEMY'),
(118, '2021-03-12 04:12:33', NULL, 101, 'MD Emtieas Ahmed al-amin', '2005-05-05', 'mdemtieassjissan@gmail.com', '01782120243', 'Rayerbag, jatrabari, Dhaka।', 'MD mujibor Ahmed', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'a220b03ecc4558040bc459b683565edcc30e2bdb216f1aed8c4504dd079365b0', '2021-03-12 10:12:33', '896887', 0, 1, 1, 'DOTADEMY'),
(119, '2021-03-12 04:31:01', NULL, 101, 'Rayhan islam', '2002-09-07', 'rayhanislam@gmail', '01313506547', 'nurpur2, donia', 'Bibi Kulsum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '312cef25c6f955855e510134cfeea2ab326acd58c3e66e86c35f31500852155a', '2021-03-12 10:31:01', '514266', 0, 1, 1, 'DOTADEMY'),
(120, '2021-03-12 05:41:26', NULL, 101, 'Md Shamim ', '2002-12-07', 'Mdsohahg9999@gmail.com', '01856234956', 'Sostapur futullah,Narayanganj ', 'Taslima Begum', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, 'd5a84ac80f9eedf1981c6be6c7b21ffc9c429a7aff2deaf27c61443b51f96e39', '2021-03-12 11:41:26', '620397', 0, 1, 1, 'DOTADEMY'),
(121, '2021-03-12 06:16:37', NULL, 101, 'Rased islam', '2002-08-05', 'Rased78600@gmail.com', '01927991184', 'Donia,,dhaka-1236', 'Roksana begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'f41285cb7181e5774c8f92aabb0c9b0a4e0d503fda00be75a19d707c4e6f4ad3', '2021-03-12 12:16:37', '556161', 0, 1, 1, 'DOTADEMY'),
(122, '2021-03-12 06:44:00', NULL, 101, 'Tahmina Akter Mukta', '2000-04-08', 'orshamoni4@gmail.com', '01874253895', 'Sonir akhra, dhaka 1236', 'Md Ibrahim', NULL, 'Bangladesh', 'DHAKA', 'Female', 1, '0d7f21b6f430c39394b74784f842907d04766335b8f0258de692038393584a5c', '2021-03-12 12:44:00', '117856', 0, 1, 1, 'DOTADEMY'),
(123, '2021-03-12 10:32:11', NULL, 101, 'Aseer hamim', '2003-04-16', 'Smmaksudulhaque15@gmail.com', '01822874558', 'Dania,Dhaka', 'Md.Mamunur Rashid ', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '48f0d4b9f7729d04fd89a235977ee74ec1905c0ab2a018c4d99894f08a6387f9', '2021-03-12 16:32:11', '450802', 0, 1, 1, 'DOTADEMY'),
(124, '2021-03-12 10:48:18', NULL, 101, 'Md Tuhin', '2005-02-15', 'tuhinahmed0966@gmail.com', '01766135970', 'Narayanganj ', 'Tahominah', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, '66686c0e20ba4714a018f19305a007d9b1d5f73517cc19e1c4432ff8a51469f4', '2021-03-12 16:48:18', '960104', 0, 1, 1, 'DOTADEMY'),
(125, '2021-03-12 11:47:48', NULL, 101, 'Arifuzzanam_Shayed', '2002-09-04', 'mdajshayed2002v2016@gmail.com', '01751009410', 'Dhaka', 'Father', NULL, 'Bangladesh', 'BARISHAL', 'Male', 1, '4fd62ab3fb1c21c35cfc0ecc1fa562d58edb8cd86c35f0b4b61d3aa434d281c7', '2021-03-12 17:47:48', '779317', 0, 1, 1, 'DOTADEMY'),
(126, '2021-03-12 12:42:51', NULL, 101, 'Md sohel Hossain ', '2000-01-01', 'afranahmmadsohel@gmail.com', '01645246517', 'Jatrabari, Dhaka ', 'Md.salim mia', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'c0bd0844bcd4ab3d04aa5d46eb27945a80a604d5bf649ebb43675c29be7ea89f', '2021-03-12 18:42:51', '230117', 0, 1, 1, 'DOTADEMY'),
(127, '2021-03-12 15:20:50', NULL, 101, 'Bodrul Alam Shaif', '0000-00-00', 'shaifalam201@gmail.com', '01969310375', '67, south kutubkhali ,dhonia, dhaka -1236', 'Beauti', NULL, 'Bangladesh', 'Select District', 'Male', 1, 'aab9428675c3972135621bee9d03e2d7ba64956cfc89271d9093643df6cc994f', '2021-03-12 21:20:50', '734379', 0, 1, 1, 'DOTADEMY'),
(128, '2021-03-12 15:26:57', NULL, 101, 'Jobaer Omer Khan', '2000-04-10', 'jok25942@gmail.com', '01640673428', 'Dania, Dhaka - 1236', '', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'd8b31a18ce90426203e302da1793b04b8f8fa62c862287d2a024c6f56d71ef07', '2021-03-12 21:26:57', '644937', 0, 1, 1, 'DOTADEMY'),
(129, '2021-03-12 20:52:52', NULL, 101, 'Sakib Mir', '2004-05-18', 'mdmahirsakib345@gmail.com', '01407798241', 'Donia,Dhaka-1236', 'Kulsum Begum', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '664c718d4bd9b16d6fbe2368837cec7df1604f2df4c6ec3414b3cf20bb957009', '2021-03-13 02:52:52', '660916', 0, 1, 1, 'DOTADEMY'),
(130, '2021-03-13 12:03:15', NULL, 101, 'Atikuzzaman', '2005-01-11', 'nayem555999@gmail.com', '01734911513', 'Donia ,nurpur  ', 'Selina akther', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '3bc406b9072535a5407deec7079faea8b9d60c44ff4baeb44009c1cfabcc509c', '2021-03-13 18:03:15', '834952', 0, 0, 1, 'DOTADEMY'),
(131, '2021-03-13 13:33:37', NULL, 101, 'Akib Hossain ', '2003-08-15', 'abusufianakib@gmail.com', '01404860508', 'South Kajla,Dhaka-1236', 'Md.Ahsan Habib ', NULL, 'Bangladesh', 'NARAYANGONJ', 'Male', 1, 'f9156838c83694036e71612a39bc0c158be0837856da1d6497e9b13420823264', '2021-03-13 19:33:37', '827600', 0, 1, 1, 'DOTADEMY'),
(132, '2021-03-13 14:48:24', NULL, 101, 'Atikuzzaman', '2005-01-11', 'nayem555999@gmail.com', '01892799215', 'Donia ,nurpur  ', 'Selina akther', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '33b0362b797dd8941f585b51c6d67b2d23c7d859462d9fecd9199f11cf072c50', '2021-03-13 20:48:24', '969495', 0, 1, 1, 'DOTADEMY'),
(133, '2021-03-14 06:53:00', NULL, 101, 'yeasin', '0000-01-01', 'yeasinhossin@gimal.com', '01887248094', 'Lakshmipur', '', NULL, 'Bangladesh', 'LAKSHMIPUR', 'Male', 1, 'd20f55c59616daf71e0e05c60cf0920c8f9ee143ca7befad5e1a661a7faab33a', '2021-03-14 12:53:00', '689271', 0, 1, 1, 'DOTADEMY'),
(134, '2021-03-15 03:01:13', NULL, 101, 'MD Yeakub Hasan ', '1996-05-01', 'mdyeakubhasan96@gmail.com', '01608096294', 'madhabdi,narsingdi', 'Haji Nurul Amin', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'ce584619ef445670bbc33de9f45ac4da0fee3621cdd616a1eb0beb218152e60d', '2021-03-15 09:01:13', '902019', 0, 1, 1, 'DOTADEMY'),
(135, '2021-03-15 05:59:38', NULL, 101, 'Sumaiya Siddika Borsha', '2004-12-05', 'sumaiyaborsha6@gmail.com', '01409436701', 'Donia,Dhaka-1236', 'Shimly Begum', NULL, 'Bangladesh', 'DHAKA', 'Female', 1, 'f73ecf3a05ae8732d457a3443c5c447ae947a9ec13cddeadc53e00b3ae4bad78', '2021-03-15 11:59:38', '470623', 0, 1, 1, 'DOTADEMY'),
(136, '2021-03-15 06:47:27', NULL, 101, 'Shoeb Ahmed Munna', '2003-04-03', 'southkorea1938@gmail.com', '01890941368', 'Donia,Dhaka-1236', 'Poli', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'd2a49ad029a99b5b7bfb320f942e2cd6db63445f23bb20361b36182d625283e8', '2021-03-15 12:47:27', '813455', 0, 1, 1, 'DOTADEMY'),
(137, '2021-03-16 15:15:12', NULL, 101, 'LAKI', '2004-03-04', 'bssiddik@gmail.com', '01318985958', 'Nilphamari', 'Siddik', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '8da84e95d541b053312a62055113db950bd2259e983ddaabaf1d258541d71354', '2021-03-16 21:15:12', '287148', 0, 1, 1, 'DOTADEMY'),
(138, '2021-03-17 08:36:59', NULL, 101, 'Md Mehbub Al hasan fahim', '1998-07-05', 'hasanfahim9696@gmail.com', '01644996044', 'Bangladesh', 'Mahmuda begom', NULL, 'Bangladesh', 'GAZIPUR', 'Male', 1, '3d583048269c19c31e85aa76d344fb8917756920881aa71072dce6761609482a', '2021-03-17 14:36:59', '231602', 0, 1, 1, 'DOTADEMY'),
(139, '2021-03-23 11:58:59', NULL, 101, 'Juwel', '1985-03-15', 'hafizurmhg@gmail.com', '01780239597', 'satkhira to debhatay', 'md .Hafizur rahman', NULL, 'Bangladesh', 'SATKHIRA', 'Male', 1, 'b0a4eab25e70e3259a571f045d5aad11465f6d1a5f090466e3c5a7f2b5da58b3', '2021-03-23 17:58:59', '436275', 0, 1, 1, 'DOTADEMY'),
(140, '2021-03-24 15:27:01', NULL, 101, 'Md.Hafizur rahman juwel', '1985-03-15', 'hafizurmhg@gmail.com', '01935160561', 'satkhira to debhatay', 'Md. Hafizur rahman', NULL, 'Bangladesh', 'Select District', 'Male', 1, 'b0a4eab25e70e3259a571f045d5aad11465f6d1a5f090466e3c5a7f2b5da58b3', '2021-03-24 21:27:01', '698676', 0, 1, 1, 'DOTADEMY'),
(141, '2021-03-27 06:42:58', NULL, 101, 'Sagor Sorkar', '2003-08-25', 'sagorsarker563@gmail.com', '01690273059', 'Narsingdi', 'Jayeda Akter', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'c999220d6b89662f719bb94329ebd05b41a95d5ef5fe8bce5caf02ba1ca85feb', '2021-03-27 12:42:58', '760378', 0, 0, 1, 'DOTADEMY'),
(142, '2021-03-27 06:47:58', NULL, 101, 'Sagor Sorkar', '2003-08-25', 'sagorsarker563@gmail.com', '01690273056', 'Narsingdi', 'Jayeda Akter', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'f1e4b4f1ab5fcbd19bc7ada102e490e7629a1f32a224df01b0de6b648b36c894', '2021-03-27 12:47:58', '108184', 0, 0, 1, 'DOTADEMY'),
(143, '2021-03-27 06:49:29', NULL, 101, 'Shahadat Hossain ', '2000-06-22', 'mahmudshakib296@gmail.com', '01642371259', 'Narsingdi', 'Rabeya', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'a463dcd7829db4fd189f9df9c8a70f884869a161e122d836c037d0e649060028', '2021-03-27 12:49:29', '830731', 0, 1, 1, 'DOTADEMY'),
(144, '2021-03-27 06:55:06', NULL, 101, 'Mahabub', '1999-10-01', 'mahabob485@gmail.Com', '01779014901', 'Baniachol,Narsingdi ', 'Masum', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, 'cdc6ddf0a9310e7917d9297742b3d8564c6cfc2b823c2324467846149f931bdd', '2021-03-27 12:55:06', '721703', 0, 1, 1, 'DOTADEMY'),
(145, '2021-03-27 09:59:46', NULL, 101, 'ALmahmud', '2001-12-18', 'almahmud1020304050@gmailcom', '01904101901', 'Madhobdi, narsingdi', 'md:nazrul Islam ', NULL, 'Bangladesh', 'NARSINGDI', 'Female', 1, '78cc3471c4be60c4ec1bbad9c4b202a418047809e0b1e22a85d66824a5835964', '2021-03-27 15:59:46', '425721', 0, 0, 1, 'DOTADEMY'),
(146, '2021-03-27 11:00:44', NULL, 101, 'Md. Golam Rabbani', '1996-12-11', 'golamrabbaniramim1@gmail.com', '01743719335', 'Nilphamari', 'Md. Abdul Kader', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '2036ba40d02f86359cefab3670101b22bf35ec5ef33f528eb517fd2b004a098f', '2021-03-27 17:00:44', '396216', 0, 1, 1, 'DOTADEMY'),
(147, '2021-03-27 17:33:27', NULL, 101, 'Lutfor', '1973-12-07', 'lutforrahmanbd103@gmail.com', '01716718548', 'Chaitannypur Chaktaib Dhamoirhat  Naogaon', 'Mst Beauty Begum', NULL, 'Bangladesh', 'NAOGAON', 'Male', 1, 'a48dae0509c42716b6a36bc113c25ad615f60ac211d94aa0df8ecb82a5ef4c8c', '2021-03-27 23:33:27', '791991', 0, 1, 1, 'DOTADEMY'),
(148, '2021-03-27 17:51:36', NULL, 101, 'MD. Abu Musha', '1999-04-04', 'md.abumusha830@gmail.com', '01819915234', 'Korddo Botlagari', 'Md. Abdul Lotif', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, '39dd1dbc8dcc1f8dd054af2415d005a169f55c99af88cf7eb2f3bec0a98f46a4', '2021-03-27 23:51:36', '202215', 0, 1, 1, 'DOTADEMY'),
(149, '2021-03-28 03:46:27', NULL, 101, 'Sagar Chandra Roy', '1997-04-08', 'sreesagarroykrishna@gmail.com', '01717394285', 'Moddho Botlagari MazaPara, Syedpur,Nilphamari', 'Late Geren Chandra Roy', NULL, 'Bangladesh', 'NILPHAMARI', 'Male', 1, 'ccede67ac416e7dbf586f0c3556a54907921a01573df13455c1bc5d53fe3aebe', '2021-03-28 09:46:27', '847071', 0, 1, 1, 'DOTADEMY'),
(150, '2021-03-28 17:01:48', NULL, 101, 'Nazmul Hasan Shakil', '2000-03-05', 'nazmulhasanshakil715@gmail.com', '+8801842961713', 'Dattapara(Islampur)tongi-gazipur', 'Mizanur Rahman ', NULL, 'Bangladesh', 'GAZIPUR', 'Male', 1, '7e6a0ef7e4790a88a14fb174e843ab801824c2e9432bd3ec02e682aea1237e91', '2021-03-28 23:01:48', '698636', 0, 0, 1, 'DOTADEMY'),
(151, '2021-03-28 17:04:38', NULL, 101, 'Nazmul Hasan Shakil', '2000-03-05', 'nazmulhasanshakil715@gmail.com', '01638063026', 'Dattapara(Islampur)tongi-gazipur', 'Mizanur Rahman ', NULL, 'Bangladesh', 'GAZIPUR', 'Male', 1, '61e1561b51df7cbe57bcf9654676e31814c3d0686051f08da7b9df74d9ee70f4', '2021-03-28 23:04:38', '855470', 0, 1, 1, 'DOTADEMY'),
(152, '2021-03-28 17:33:23', NULL, 101, 'Nazmul Hasan Shakil', '2000-03-05', 'nazmulhasanrishan@gmail.com', '01838051752', 'Dattapara(Islampur)tongi-gazipur', 'Mizanur Rahman ', NULL, 'Bangladesh', 'GAZIPUR', 'Male', 1, '61e1561b51df7cbe57bcf9654676e31814c3d0686051f08da7b9df74d9ee70f4', '2021-03-28 23:33:23', '578269', 0, 1, 1, 'DOTADEMY'),
(153, '2021-03-29 02:17:16', NULL, 101, 'Mohammad Imran Hossain Raiaan', '1992-05-01', 'imranhossainraiaan@gmail.com', '01718427779', 'Dakshin Parulia, Palash, Narsingdi', 'Mohammad Saidur Rahman Bakiullah', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '101d59b47e05ee8590855ca183a6652b5b9b81b3dfa9722f991d186edc4e99ba', '2021-03-29 08:17:16', '465838', 0, 1, 1, 'DOTADEMY'),
(154, '2021-03-29 11:52:50', NULL, 101, 'Rotikanto', '2002-02-03', 'rotikantokumar46330@gmail.com', '01999299085', 'Gabura', 'Anel Munda', NULL, 'Bangladesh', 'SATKHIRA', 'Male', 1, 'c62f9a4664f61e93b0e6b18dc16901a0d47b547df3a13cb1fec1d94bae9dc2f8', '2021-03-29 17:52:50', '564075', 0, 1, 1, 'DOTADEMY'),
(155, '2021-03-30 10:39:06', NULL, 101, 'Rakib Hossain Rabbi', '0000-00-00', 'rakibhassans516@gmail.com', '01688425410', '268/D,South Jatrabari,Dhaka-1204', '', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '0ad347b57d79a46841a1b848062cd073ffef11fca768371294e3e28a23312d2c', '2021-03-30 16:39:06', '610815', 0, 1, 1, 'DOTADEMY'),
(156, '2021-04-02 04:42:18', NULL, 101, 'Abu Raihan (Rajve)', '2001-09-15', 'rajveaburaihan@gmail.com', '01775192109', 'Luxmipur ', 'Nur nobe islam', NULL, 'Bangladesh', 'LAKSHMIPUR', 'Male', 1, 'e5858b86e58c56bab869bc2fd0caef5b157cf9d71111cafe299116b65e4a86fa', '2021-04-02 10:42:18', '860870', 0, 1, 1, 'DOTADEMY'),
(157, '2021-04-02 09:45:36', NULL, 101, 'Md Mahabub Hasan', '2002-10-23', 'hasanmahabub778@gmail.com', '01722055292', 'Beltoli kachari para, khoksabari nilphamari sodor', 'Md Hamidul islam', NULL, 'Bangladesh', 'RANGPUR', 'Male', 1, '97168ee38d4cd30ddc6f303bf3ccdac55c6fe9eb908416362dfe203c6ee8771e', '2021-04-02 15:45:36', '785076', 0, 1, 1, 'DOTADEMY'),
(158, '2021-04-04 08:25:54', NULL, 101, 'Taslima Akter ', '2003-03-24', 'Saibe2molla@gmail.com', '01779505964', 'Narsingdi ', '', NULL, 'Bangladesh', 'NARSINGDI', 'Female', 1, '96d4f810c6b6c5458312bca47d7c6cd7e304abe9f2b355b8dae34ea671b87f51', '2021-04-04 14:25:54', '473908', 0, 1, 1, 'DOTADEMY'),
(159, '2021-04-05 13:45:23', NULL, 101, 'kalam', '2004-03-07', 'kalamkalam0601@gmail.com', '01872010639', 'Mohimagonj', 'Md.azher ali', NULL, 'Bangladesh', 'গাইবান্ধা', 'Male', 1, 'ac97c7a54692e13a7330237bc5735ef8a884fc942bda4a86f4d3002635ffe919', '2021-04-05 19:45:23', '670286', 0, 1, 1, 'DOTADEMY'),
(160, '2021-04-07 19:38:37', NULL, 101, 'Sakin Majumder', '2003-12-02', 'sakinmajumder797979@gmail.com', '01771322266', 'Sonirakhra', 'Salma Akhter', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, 'ba406b6d3ba65eb507b56b7796f922fe72e0005fc40a71b1e5b27412fb7c68f4', '2021-04-08 01:38:37', '713011', 0, 1, 1, 'DOTADEMY'),
(161, '2021-04-08 05:05:06', NULL, 101, 'Md Sakhawat Masud', '1987-01-15', 'shmrana@gmail.com', '01734300007', 'Munshi Bari, South Ratanpur, Word No 09,  Bepary Bazar, Bhola Sadar, Bhola 8300', 'Md Mostafa', NULL, 'Bangladesh', 'BHOLA', 'Male', 1, '8166c3e894ec07c7751085a0aa6a09b8b069d20cb6a41e430933ac63b249aaa8', '2021-04-08 11:05:06', '690073', 0, 1, 1, 'DOTADEMY'),
(162, '2021-05-16 05:59:28', NULL, 101, 'Md. Raihan Kabir', '1998-01-02', 'ablsapahar19@gmail.com', '+8801743130840', 'Shams Super Market, 2nd Floor, Sapahar , Naogaon - 01743130840', 'Md. Ashraf Ali', NULL, 'Bangladesh', 'NAOGAON', 'Male', 1, '6ee159e11ea6ab1a88ee098e5a7c32ec044c50cbe21c11866ec2a762e512b53a', '2021-05-16 11:59:28', '528865', 0, 0, 1, 'DOTADEMY'),
(163, '2021-06-07 00:43:36', NULL, 101, 'Badhan Roy', '2002-03-21', 'broy02515@gmail.com', '01756221470', 'Keraniganj', 'Shipra Halder', NULL, 'Bangladesh', 'DHAKA', 'Male', 1, '727e84f7362fc127c61f822889092d40ae73aab8a326261c33d70fc48caa8673', '2021-06-07 06:43:36', '236566', 0, 1, 1, 'DOTADEMY'),
(164, '2021-06-18 01:37:09', NULL, 101, 'SS Shoriful Islam', '1998-06-19', 'mdshoriful443@gmail.com', '01911058732', 'Darogar Vita Shanti Nagar', 'SS Shoriful Islam', NULL, 'Bangladesh', 'KHULNA', 'Male', 1, '3df0410a6d3a8376db04b909c544a65cd397ca7c18395a9b970ea06d48adeb8c', '2021-06-18 07:37:09', '788383', 0, 1, 1, 'DOTADEMY'),
(165, '2021-06-23 12:40:13', NULL, 101, 'Masudor Rahman ', '2000-01-05', 'Masudor78@gmail.com', '01858867303 ', 'Panchdona, Narsingdi. ', 'Abdol kaiwom', NULL, 'Bangladesh', 'NARSINGDI', 'Male', 1, '245b3011e5f614aa2d9d0dc0e1e1e0ddd0bb9b0c5b3fee0c4fef93f4128156c9', '2021-06-23 18:40:13', '283017', 0, 1, 1, 'DOTADEMY'),
(166, '2021-06-30 04:40:38', NULL, 101, 'MK ASHIKUL ISLAM ASHIK', '2000-01-01', 'mkashik.pro.bd@gmail.com', '01911945514', 'Kishoreganj Kuliyarchar Faridpur Ananda Bazar', '01781216206', NULL, 'Bangladesh', 'কিশোরগঞ্জ', 'Male', 1, '4a721815d1b6561c349cc49b2f6e5b78df4e1edb39e0e008a16102329c8b8ecc', '2021-06-30 10:40:38', '480326', 0, 1, 1, 'DOTADEMY');

-- --------------------------------------------------------

--
-- Table structure for table `eduteacher`
--

CREATE TABLE `eduteacher` (
  `xteacher` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'System',
  `bizid` int(11) NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xteachername` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xpassword` varchar(260) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67',
  `xaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xeducation` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xemailaddr` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xexpartarea` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweb` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xowndesc` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexperience` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `category` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsortindex` int(5) NOT NULL DEFAULT 100,
  `xverified` int(100) NOT NULL DEFAULT 0,
  `xotp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xotptime` datetime DEFAULT NULL,
  `xstatus` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Applied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eduteacher`
--

INSERT INTO `eduteacher` (`xteacher`, `ztime`, `zemail`, `bizid`, `zutime`, `xteachername`, `xpassword`, `xaddress`, `xeducation`, `xmobile`, `xemailaddr`, `xexpartarea`, `xweb`, `xowndesc`, `xexperience`, `zactive`, `category`, `xsortindex`, `xverified`, `xotp`, `xotptime`, `xstatus`) VALUES
(102, '2021-02-28 09:43:18', 'ashraf', 101, NULL, 'Md. Ashraful Amin', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '27 Court house Street dhaka-1100', 'BA', '01621177777', 'ashrafulaminpdl2@gmail.com', '', NULL, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2 style=\"font-style:italic\"><strong>Trainer, Influencer,Business Facilitator.</strong></h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '18 Years of Experience', 1, 'Popular', 100, 0, NULL, NULL, 'Approved'),
(103, '2021-02-28 10:18:29', 'ashraf', 101, NULL, 'Shohidul Hoque', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', '  ', '01883671517', 'bdnewvision@gmail.com', '<p>Marketing, Team Marketing, Public Speaking</p>\r\n', NULL, '<p>Trainer, Facilatator</p>\r\n', '10', 1, 'None', 6, 0, NULL, NULL, 'Approved'),
(104, '2021-03-01 11:04:02', 'ashraf', 101, NULL, 'Md Masudur Rahman', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '35/C kasfia Flaza, Nayapalton Dhaka-1000', 'Mcom', '01611479212', 'masud0210@gamil.com', '<h2 style=\"font-style:italic;\"><strong>Marketing, Amarbazar Business System</strong></h2>\r\n', NULL, '<h2 style=\"font-style:italic;\"><em><strong>Public Speaker, Motivational Trainer</strong></em></h2>\r\n', '10', 1, NULL, 2, 0, NULL, NULL, 'Approved'),
(105, '2021-03-01 11:05:11', 'rajib@dbs.com', 101, NULL, 'Md Rahadul Islam', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '704/1, Baro Moghbazar, Dhaka', 'MBA, Business Faculty, Dhaka University BBA, Major In Marketing, Dhaka University', '8801712615116', 'rahadul.islam@kai-wt.com', '<p>Logistics Management,International Logistics,Export &amp; Import,Leadership &amp;Team MGT, Warehousing,Freight Forwarding Process analyst, Operations Management,SCM,Procurement &amp;RFQ,Transportation,Strategic Planning,3PL/4PL, Contract Management, Service Delivery-KPI,New Business Development</p>\r\n', NULL, '<p>After Completing MBA from University of Dhaka in 2002, Mr.Md. Rahadul Islam started his career with a MNC called PANALPINA an international Logistics company. Before becoming an entrepreneur he also worked for MGH Group &amp; Prome Agro. Mr. Islam Also attended various training session on Leadership, Negotiation other than on Job Training on Logistics, Freight Forwarding ,C&amp;F, Indenting, Import &amp; Export.<br />\r\nBecoming an entrepreneur Mr. Md. Rahadul Islam Started his own business on 2017 in Logistics sector Kai World Transport Ltd.(KWT), He was in In-house trainer at MGH Group and Prome Agro and trained more than 1,000 employee during his service tenure.<br />\r\nHe has travelled to different parts of EU-France, Italy, India, KSA for CST.&nbsp;</p>\r\n\r\n<p>He has been maintaining strong relations with all stake holders in this industry with a &#39;Can Do&#39; attitude to face challenges and to achieve the desired goals.&nbsp;</p>\r\n', '10', 1, NULL, 10, 0, NULL, NULL, 'Approved'),
(106, '2021-03-01 11:07:16', 'ashraf', 101, NULL, 'Tazul Islam', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '35/C Nayapalton , Kasfia Plaza, 5th floor, Dhaka-1000', 'Msc', '01840279243', 'ashrafulaminpdl3@gmail.com', '', NULL, '<h2 style=\"font-style:italic;\"><em><strong>Public Speaker, Motivational Trainer.</strong></em></h2>\r\n', '10', 1, NULL, 9, 0, NULL, NULL, 'Approved'),
(107, '2021-03-01 11:10:58', 'ashraf', 101, NULL, 'Abdul Hannan Babul', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '35/C Nayapalton , Kasfia Plaza, 5th floor, Dhaka-1000', 'MA', '01711909697', 'ashrafulaminpdl4@gmail.com', '', NULL, '', '10', 1, NULL, 8, 0, NULL, NULL, 'Approved'),
(108, '2021-03-01 11:13:06', 'ashraf', 101, NULL, 'GM Rabbani Sumon', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '35/C Nayapalton , Kasfia Plaza, 5th floor, Dhaka-1000', 'MA', '01711010699', 'mdc.2001@yahoo.com', '', NULL, '', '10', 1, NULL, 8, 0, NULL, NULL, 'Approved'),
(109, '2021-03-01 11:54:33', 'ashraf', 101, NULL, 'Sultan Ahmed', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '35/C Nayapalton , Kasfia Plaza, 5th floor, Dhaka-1000', 'Mcom', '01711979505', 'd2k.poltu@gmail.com', '<p>Marketing ,Amarbazar Business System</p>\r\n', NULL, '<h2 style=\"font-style:italic\"><em><strong>Public Speaker, Motivational Trainer.</strong></em></h2>\r\n', '10', 1, NULL, 11, 0, NULL, NULL, 'Approved'),
(110, '2021-03-01 12:07:35', 'ashraf', 101, NULL, 'Md Khaled Ibrahim', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '256/1 South Goran Khilgoan Dhaka-1219', 'MBA', '01712464880', 'imonkhaled@gmail.com', '<p>Marketing , ABL Business System&nbsp;</p>\r\n', NULL, '<p><em><strong>Public Speaker, Motivational Trainer.</strong></em></p>\r\n', '10', 1, NULL, 7, 0, NULL, NULL, 'Approved'),
(111, '2021-03-02 10:01:28', 'ashraf', 101, NULL, 'Abdul Matin ', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '60/A 1st floor, Omar Ali Lan, West Rampura, Dhaka-1219', 'EMBA', '01818486807', 'muko.matin@gmail.com', '', NULL, '', '10', 1, '', 4, 0, NULL, NULL, 'Approved'),
(112, '2021-03-04 10:11:17', 'ashraf', 101, NULL, 'Dr. Shebendra Karmakar', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', '15th Queens Guarden Point (5th Floor), New Eskaton Road, Boro Moghbazar, Dhaka.', 'Honorary Doctor of Philosophy PhD, IUM USA,', '01712393053', 'shebendrak@yahoo.com', '<p>Consultant Stem Cell Nutraition</p>\r\n\r\n<p>&nbsp;</p>\r\n', NULL, '<p>PhD in Natural Medicine<br />\r\nPhD Herbal Food USA<br />\r\nUniversity Representative IUM USA</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '10', 1, 'Popular', 3, 0, NULL, NULL, 'Approved'),
(113, '2021-03-09 08:16:33', 'System', 101, NULL, 'Md Rajibul Islam', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Dhaka', 'Ms In MIS', '01712923270', 'rajib@dotademy.com', '<p>N/A</p>\r\n', NULL, '<p>N/A</p>\r\n', '16 Years Of experience', 1, NULL, 100, 1, '714328', '2021-03-09 14:16:33', 'Approved'),
(114, '2021-03-09 11:30:00', 'System', 101, NULL, 'MD Yeakub Hasan', '9f06b17bce1f9d3c952a9d2c7af0459193b22f7e0bf0e05fecde2d4eff769085', 'madhabdi,narsingdi', NULL, '01319918267', 'mdyeakubhasan96@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '141072', '2021-03-09 17:30:00', 'Applied'),
(115, '2021-03-10 15:57:31', 'System', 101, NULL, 'Sajed Islam', '1fbe2a6afab8287090796c4c727c9867bcf9cb27ad4440dac7fb8f4ef8eeed74', 'Kamrangir Char,  Dhaka', NULL, '01869672007', 'junaidsajed780@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '972268', '2021-03-10 21:57:31', 'Applied'),
(117, '2021-03-11 10:56:52', 'System', 101, NULL, 'S.M.M Ibrahim Mahmud', '5dd44ce823c1c79c5da04c72b5a5a8c23e7b6f541b2299feefa9f8187ae43c69', 'House:13,Road:5,Sector:13,Uttara,Dhaka', 'MBA', '01712674086', 'mehedimktdu@yahoo.com', '                            <ul>\r\n	<li>Sales Management</li>\r\n	<li>Distribution Management</li>\r\n	<li>Strategic Business Planning & Execution</li>\r\n	<li>Process analyst</li>\r\n	<li>Managerial Effectiveness</li>\r\n	<li>Market Development and Successful Selling</li>\r\n	<li>Leadership &Team MGT</li>\r\n	<li>Sales Operations Management</li>\r\n	<li>Sales Coaching</li>\r\n	<li>KPI Management</li>\r\n	<li>New Business Development</li>\r\n	<li>Customer Relationship Management</li>\r\n	<li>Route to Market</li>\r\n	<li>Trade Marketing Communication</li>\r\n	<li>Sales Foundation</li>\r\n	<li>Distribution Foundation</li>\r\n</ul>\r\n                            ', NULL, '<p>Mr.S.M.M Ibrahim Mahmud is a proven Sales leader with a track record of developing successful growth strategies for industry leaders. He has experience in managing and leading from different role with a number of Multinational Companies like Reckitt Benckiser Bangladesh Ltd. And Marico Bangladesh Ltd. also large Local Conglomerate Companies like Square Food and Beverage Ltd. and Meghna Group of Industries, FMCG Division in Bangladesh.</p>\r\n\r\n<p>He started his career in 2006 and bring almost 16 years of macro and micro level of experience in Sales &amp; Distribution Excellence, Trade Marketing, Route to Market Strategy, Strategic Business Planning and Execution in FMCG sector.</p>\r\n\r\n<p>He was in In-house trainer at Marico Bangladesh Ltd. Square Food and Beverage Ltd. MGI, FMCG Division and ACI Foods Ltd. and trained more than 3,000 employee during his service tenure. He has been maintaining strong relations with all stake holders in this industry with a &#39;Can Do&#39; attitude to face challenges and to achieve the desired goals.</p>\r\n\r\n<p>As a professional Coach, Ibrahim now works with you to train you, guiding you to achieve your professional and personal goals and add more value to your entire professional life by</p>\r\n\r\n<ul>\r\n	<li>Aligning you with your goals, Values as well as your companies Vision, Mission, Goals and Objectives</li>\r\n	<li>Overcoming fears and gaining confidence</li>\r\n	<li>Achieving your sales targets, Managing your team effectively and efficiently and promoting yourself for next level</li>\r\n	<li>Discovering yourself as a strategic planner and well executor as a leader in the VUCA world</li>\r\n</ul>\r\n', '#Experience in Sales & Distributor Management: Almost 15 years #Experience in Channel Management: Almost 15 years #Experience in Sales & Marketing: Almost 7 years #Experience in Business Development: Almost 7 years #Experience in Rural Sales: Almost 15 years', 1, 'Popular', 5, 1, '613266', '2021-03-11 16:56:52', 'Approved'),
(118, '2021-03-11 18:37:01', 'System', 101, NULL, 'Abdul Ahad', '90d9ef3d16e597fc2e4ae95c802aaf11f03f0710c9b15af1e27caf90415f4d10', 'Merajnogor, Dhaka', NULL, '01824331112', 'shoabahad1@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '715588', '2021-03-12 00:37:01', 'Applied'),
(119, '2021-03-11 18:42:21', 'System', 101, NULL, 'Rased islam', 'f41285cb7181e5774c8f92aabb0c9b0a4e0d503fda00be75a19d707c4e6f4ad3', 'Donia,,dhaka-1236', NULL, '01849470864', 'Rased78600@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '262868', '2021-03-12 00:42:21', 'Applied'),
(120, '2021-03-11 18:50:03', 'System', 101, NULL, 'Sakib mir', '664c718d4bd9b16d6fbe2368837cec7df1604f2df4c6ec3414b3cf20bb957009', 'Donia,dhaka- 1236', NULL, '01407798241', 'mdmahirsakib345@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '430694', '2021-03-12 00:50:03', 'Applied'),
(121, '2021-03-11 18:56:27', 'System', 101, NULL, 'Ratim Hasan', 'fedbca308e08ccede4c455b44ec49883e8c5914de94442f32d083162f4f33627', 'Dhonia dhaka', NULL, '01886677162', 'ratimhasan7777@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '708122', '2021-03-12 00:56:27', 'Applied'),
(122, '2021-03-11 19:24:00', 'System', 101, NULL, 'Prioum', 'd9ae3c462c5926f5a96e0902197abba9b76a6a60f750b4c4ae93bbec6910037f', '90,Rasulpur Shahi Masjid Road,Rasulpur,Dania,Jatrabari,Dhaka-1236', NULL, '01966454176', 'hmaprioum@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '360985', '2021-03-12 01:24:00', 'Applied'),
(123, '2021-03-12 04:12:19', 'System', 101, NULL, 'Jobaer Omer Khan', 'd8b31a18ce90426203e302da1793b04b8f8fa62c862287d2a024c6f56d71ef07', 'Dania, Dhaka - 1236', NULL, '01640673428', 'jok25942@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '346313', '2021-03-12 10:12:19', 'Applied'),
(124, '2021-03-12 11:44:29', 'System', 101, NULL, 'ARIFUZZANAM_SHAYED', '4fd62ab3fb1c21c35cfc0ecc1fa562d58edb8cd86c35f0b4b61d3aa434d281c7', 'Dhaka', NULL, '01751009410', 'mdajshayed2002v2016@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '405281', '2021-03-12 17:44:29', 'Applied'),
(125, '2021-03-13 04:26:47', 'System', 101, NULL, 'MD. ARIFUL ISLAM ', '40666115555b71b9b893fb42ddaa276aaee415d0e2ae1f71b5c6d7b4c3055c17', 'Ranirbandor CHIRIRBANDAR DINAJPUR ', NULL, '01773668331 ', 'mdarifulislam240909@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '355054', '2021-03-13 10:26:47', 'Applied'),
(126, '2021-03-13 14:43:59', 'System', 101, NULL, 'Saifullah Al Mamun', '12f17e8dbce4a2fb94a2cf3b6b7a8d191824f1d440fa650be4937cae7838903a', 'Soniakhra, Dhaka', NULL, '01303671233', 'saifullahalmamun22@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '127012', '2021-03-13 20:43:59', 'Applied'),
(127, '2021-03-15 03:27:01', 'System', 101, NULL, 'Palash Biswas', 'c9ff337c1ecee21c08ab203fdfdacca404e22d58ab8eb5ce9799ef6c24597720', 'H#1, L#5, Benaroshipolli', NULL, '01912124636', 'whitehatseo15@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '275599', '2021-03-15 09:27:01', 'Applied'),
(128, '2021-03-21 21:18:45', 'System', 101, NULL, 'yeasin hossin', 'd20f55c59616daf71e0e05c60cf0920c8f9ee143ca7befad5e1a661a7faab33a', 'Lakshmipur', NULL, '01887248094', 'yeasinhossin@gimal.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '172521', '2021-03-22 03:18:45', 'Applied'),
(129, '2021-03-22 08:24:58', 'System', 101, NULL, 'Md Showrob Mia', 'e17c1541c3a53426ef247b0ca859f3cb4c10682a26fdb837c4afdb91238ae376', 'Narsingdi', NULL, '01739120250', 'showrobmia51@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 1, '955952', '2021-03-22 14:24:58', 'Applied'),
(130, '2021-03-28 17:08:38', 'System', 101, NULL, 'Nazmul Hasan Shakil', '61e1561b51df7cbe57bcf9654676e31814c3d0686051f08da7b9df74d9ee70f4', 'Dattapara(Islampur)tongi-gazipur', NULL, '01638063026', 'nazmulhasanshakil715@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '954567', '2021-03-28 23:08:38', 'Applied'),
(133, '2021-04-07 07:28:45', 'System', 101, NULL, 'Jalal Uddin Rumi', 'a3f669a9d43d016932e43e3926c996542bbdb80800f32cbf11a5525f32844e8b', 'Narayanganj', NULL, '01990577651', 'sdemon651@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '332393', '2021-04-07 13:28:45', 'Applied'),
(134, '2021-04-07 19:41:55', 'System', 101, NULL, 'Sakin Majumder', '44df0551bbab837de98b44b68072f882cae7aa7f5ce77954328a85345a87bb5d', 'Sonirakhra', NULL, '01771322266', 'sakinmajumder797979@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '359276', '2021-04-08 01:41:55', 'Applied'),
(135, '2021-04-25 17:09:50', 'rajib@dbs.com', 101, NULL, 'A.T.M Mofizul Islam', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'House# 23/1, Road# 1, Kamar Para, Rangpur', 'Master Of Education', '01740942946', 'Mofizul@dotademy.com', '', NULL, '<p>Worked as an Lecturer Of Philosophy GANGACHARA MOHILA COLLEGE&nbsp;RANGPUR</p>\r\n', '17 Years of experience', 1, '', 9, 0, NULL, NULL, 'Approved'),
(136, '2021-07-14 13:31:52', 'System', 101, NULL, 'Willard Sporer', 'd421e667f6eb9ec40f9f85026772e2e8140fc65db85f0bafbf12827e66435f93', '9914 Denesik Ports', NULL, 'compressing', 'nevson17@aol.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '319412', '2021-07-14 19:31:52', 'Applied'),
(137, '2021-07-20 07:13:06', 'System', 101, NULL, 'Muriel Windler', '2cdbe4439e840a65b127bccd2f31f4464ab9709ac6c3a5c6dd8fbb8ddc954b7c', '37552 Treutel Parkways', NULL, 'Buckinghamshire', 'william.h.gaunt@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '290284', '2021-07-20 13:13:06', 'Applied'),
(138, '2021-08-27 07:56:12', 'System', 101, NULL, 'MD SHAHABUDDIN', '92f3a9a36b693d368f715538703179e090a4a396e7e32e2afce06c719860a605', 'RAOZAN CHITTAGONG', NULL, '01890834201', 'mdsha8044@gmail.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '792561', '2021-08-27 13:56:12', 'Applied'),
(139, '2021-08-29 23:48:48', 'System', 101, NULL, 'Kendra Fay', '3331d0a04b1d4b764028519877da91101ca9c5cc01122ce627b1d2d476a73f89', '80083 Jake Hill', NULL, 'Intelligent', 'Cordelia_Wehner@yahoo.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '923597', '2021-08-30 05:48:48', 'Applied'),
(140, '2021-09-09 05:49:40', 'System', 101, NULL, 'Kamrul Islam', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Dhaka', NULL, '01679822086', 'a@a.com', NULL, NULL, NULL, NULL, 1, NULL, 100, 0, '202557', '2021-09-09 11:49:40', 'Applied'),
(141, '2021-09-12 09:21:41', 'rajib@dbs.com', 101, NULL, 'test', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'rfwef', 'dsvfs', '01671112324', 'kamrulfci2014@gmail.com', '', NULL, '', '10', 1, 'None', 100, 0, NULL, NULL, 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `eduvenu`
--

CREATE TABLE `eduvenu` (
  `xvenusl` int(3) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL DEFAULT 100,
  `zemail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xvenu` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xdistrict` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xthana` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xcapacity` int(5) NOT NULL,
  `xaddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eduvenu`
--

INSERT INTO `eduvenu` (`xvenusl`, `ztime`, `bizid`, `zemail`, `xvenu`, `xdistrict`, `xthana`, `xcapacity`, `xaddress`, `zactive`) VALUES
(2, '2021-02-17 09:13:54', 100, 'rajib@dbs.com', 'Amarbazar Head Office', 'DHAKA', 'PALTAN', 240, 'Kasfia Plaza (4th and 5th Floor), 35/C Naya Paltan, Dhaka.', 1),
(3, '2021-02-28 09:51:44', 100, 'ashraf', 'Amarbazar Ltd. Head Office Hall Room', 'DHAKA', 'PALTAN', 230, '35/C Nayapalton , Kasfia Plaza, 5th floor, Dhaka-1000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_movement`
--

CREATE TABLE `emp_movement` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xln` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_movement_temp`
--

CREATE TABLE `emp_movement_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xln` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_movement_temp`
--

INSERT INTO `emp_movement_temp` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xln`, `xlt`) VALUES
(55749, 100, '2018-08-08 06:06:27', '2018-08-08 12:06:26', 'Rajib', 'T008', '90.3934768', '23.7842826');

-- --------------------------------------------------------

--
-- Table structure for table `emp_touch_customer`
--

CREATE TABLE `emp_touch_customer` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_touch_customer`
--

INSERT INTO `emp_touch_customer` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xcus`, `xstatus`) VALUES
(0, 100, '2018-07-29 04:05:47', '2018-07-29 10:05:45', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-07-29 15:41:52', '2018-07-29 21:41:49', 'Demo', 'T005', '100000016', 'true'),
(0, 100, '2018-07-29 15:41:55', '2018-07-29 21:41:51', 'Demo', 'T005', '100000016', 'true'),
(0, 100, '2018-07-29 15:43:35', '2018-07-29 21:43:29', 'Demo', 'T005', '100000017', 'true'),
(0, 100, '2018-07-29 15:43:36', '2018-07-29 21:43:31', 'Demo', 'T005', '100000017', 'true'),
(0, 100, '2018-07-30 10:04:16', '2018-07-30 16:04:13', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-08-05 07:29:14', '2018-08-05 13:29:11', 'Rajib', 'T008', '100000021', 'true'),
(0, 100, '2018-08-05 07:45:18', '2018-08-05 13:45:15', 'Rajib', 'T008', '100000022', 'true'),
(0, 100, '2018-08-07 10:00:13', '2018-08-07 16:00:08', 'Rajib', 'T008', '100000023', 'true'),
(0, 100, '2018-08-07 11:14:38', '2018-08-07 17:14:37', 'Rajib', 'T008', '100000023', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `emp_touch_customer_temp`
--

CREATE TABLE `emp_touch_customer_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` datetime NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_touch_customer_temp`
--

INSERT INTO `emp_touch_customer_temp` (`xsl`, `bizid`, `ztime`, `xdate`, `username`, `xterminal`, `xcus`, `xstatus`) VALUES
(0, 100, '2018-07-30 10:04:16', '2018-07-30 16:04:13', 'Demo', 'T005', '100000015', 'true'),
(0, 100, '2018-07-28 18:06:44', '2018-07-29 00:06:43', 'Tajimul', 'T004', '100000009', 'true'),
(0, 100, '2018-06-11 18:21:01', '2018-06-12 00:21:00', 'user1', 'T001', '100000013', 'true'),
(0, 100, '2018-08-07 11:14:38', '2018-08-07 17:14:37', 'Rajib', 'T008', '100000023', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `glchart`
--

CREATE TABLE `glchart` (
  `glsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacctype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccusage` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsource` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel3` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel4` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xacclevel5` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcode` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodealt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glchart`
--

INSERT INTO `glchart` (`glsl`, `ztime`, `zutime`, `bizid`, `xacc`, `xdesc`, `xacctype`, `xaccusage`, `xaccsource`, `xacclevel1`, `xacclevel2`, `xacclevel3`, `xacclevel4`, `xacclevel5`, `xtaxcode`, `xtaxcodealt`, `xemail`, `xrecflag`, `zemail`) VALUES
(6, '2020-01-10 17:17:20', '2020-01-10 17:22:03', 100, '1001', 'DBBL', 'Asset', 'Bank', 'None', 'Asset', 'Current Asset', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(7, '2020-01-10 17:18:12', '2020-01-10 17:22:16', 100, '1002', 'BRAC BANK', 'Asset', 'Bank', 'None', 'Asset', 'Current Asset', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(10, '2020-01-10 17:21:48', NULL, 100, '1009', 'CASH', 'Asset', 'Cash', 'None', 'Asset', 'Current Asset', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(8, '2020-01-10 17:18:38', '2020-01-16 08:09:00', 100, '1010', 'Trade Receivable', 'Asset', 'AR', 'Customer', 'Asset', 'Current Asset', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(11, '2020-01-10 17:23:01', '2020-02-21 10:38:43', 100, '2001', 'Trade Payable', 'Liability', 'AP', 'Supplier', 'Liability', 'Current Liability', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(28, '2020-01-13 06:28:27', '2020-02-21 10:38:53', 100, '2002', 'Promotional Payable', 'Liability', 'AP', 'Sub Account', 'Liability', 'Current Liability', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(43, '2020-02-20 14:25:13', '2020-02-21 10:42:03', 100, '2003', 'Salary due', 'Liability', 'AP', 'Sub Account', 'Liability', 'Current Liability', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(41, '2020-02-05 15:10:18', NULL, 100, '2024', 'Ac bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(9, '2020-01-10 17:20:00', NULL, 100, '2035', 'Profit And Loss Appropriation Account', 'Liability', 'Ledger', 'None', 'Liability', '', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(12, '2020-01-12 03:25:34', NULL, 100, '3001', 'Domain Purchase', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Non Operating Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(13, '2020-01-12 03:26:16', '2020-01-12 03:26:59', 100, '3002', 'Server Or Hosting Purchase', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Non Operating Expenses', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(14, '2020-01-12 03:32:28', NULL, 100, '3003', 'House Rent', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(15, '2020-01-12 03:32:44', NULL, 100, '3004', 'Internet Bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(16, '2020-01-12 03:33:04', NULL, 100, '3005', 'Cleaning Bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(17, '2020-01-12 03:33:24', NULL, 100, '3006', 'Community Charge', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(18, '2020-01-12 03:34:02', NULL, 100, '3007', 'Elctricity Bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(19, '2020-01-12 03:34:12', NULL, 100, '3008', 'Water Bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(20, '2020-01-12 03:34:46', NULL, 100, '3009', 'Travel Bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(21, '2020-01-12 03:37:22', NULL, 100, '3010', 'Salary Paid', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(22, '2020-01-12 03:38:20', NULL, 100, '3011', 'Entertainment', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Operational Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(27, '2020-01-13 06:27:12', '2020-01-13 06:30:24', 100, '3012', 'Promotional Activity', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(29, '2020-01-13 06:39:28', NULL, 100, '3013', 'Trade License Renewal Fee', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(30, '2020-01-13 06:40:02', NULL, 100, '3014', 'Tax Paid', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(31, '2020-01-13 06:40:59', NULL, 100, '3015', 'Online Theme Purchase', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(32, '2020-01-14 04:50:15', NULL, 100, '3016', 'CTO', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', 'Profit & Loss Accounts', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(33, '2020-01-14 06:24:45', NULL, 100, '3017', 'Office stationary', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(34, '2020-01-16 09:05:53', NULL, 100, '3018', 'SMS Buy', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Selling & Distribution Expenses', 'Profit & Loss Accounts', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(36, '2020-01-26 05:50:19', '2020-01-26 05:52:09', 100, '3019', 'Basis expense', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(37, '2020-01-26 09:08:49', NULL, 100, '3020', 'Internet bill', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(38, '2020-01-27 09:34:27', NULL, 100, '3021', 'Water filter', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(39, '2020-01-27 09:39:23', '2020-01-27 09:40:06', 100, '3022', 'Bank Charge', 'Expenditure', 'Ledger', 'Sub Account', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(40, '2020-02-02 11:21:28', NULL, 100, '3023', 'Computer purchase', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(42, '2020-02-06 07:41:24', NULL, 100, '3024', 'Office Expense', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Direct Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(44, '2020-02-29 16:09:45', NULL, 100, '3025', 'Fixed Asset', 'Asset', 'Ledger', 'Sub Account', '', '', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(45, '2020-03-08 15:04:47', NULL, 100, '3026', 'Office Advance', 'Expenditure', 'Ledger', 'None', 'Expenditure', 'Non Operating Expenses', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(26, '2020-01-12 03:44:03', NULL, 100, '4000', 'Sales', 'Income', 'Ledger', 'None', 'Income', 'Operating Income', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(23, '2020-01-12 03:39:56', '2020-01-13 06:37:18', 100, '4001', 'Revenew From Domain Sale', 'Income', 'Ledger', 'None', 'Income', 'Non-Operating Income', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(24, '2020-01-12 03:40:17', '2020-01-13 06:36:43', 100, '4002', 'Revenew From Server Or Hosting Sale', 'Income', 'Ledger', 'None', 'Income', 'Non-Operating Income', '', NULL, NULL, NULL, NULL, 'rajib@dbs.com', 'Live', 'rajib@dbs.com'),
(25, '2020-01-12 03:43:40', NULL, 100, '4003', 'Monthly Service Revenew', 'Income', 'Ledger', 'None', 'Income', 'Operating Income', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(35, '2020-01-16 09:08:49', NULL, 100, '4004', 'Revenew From SMS', 'Income', 'Ledger', 'None', 'Income', 'Operating Income', 'Profit & Loss Accounts', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com'),
(46, '2020-03-09 09:17:35', NULL, 100, '4005', 'Office Rent Collection', 'Income', 'Ledger', 'None', 'Income', 'Non-Operating Income', '', NULL, NULL, NULL, NULL, NULL, 'Live', 'rajib@dbs.com');

-- --------------------------------------------------------

--
-- Table structure for table `glchartsub`
--

CREATE TABLE `glchartsub` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) NOT NULL,
  `xrecflag` varchar(20) NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glchartsub`
--

INSERT INTO `glchartsub` (`sl`, `ztime`, `zutime`, `bizid`, `xacc`, `xaccsub`, `xdesc`, `xrecflag`, `zemail`, `xemail`) VALUES
(5, '2020-01-13 06:31:09', NULL, 100, '2002', '2002-1', 'Mr Naim', 'Live', 'rajib@dbs.com', NULL),
(6, '2020-01-22 07:33:51', NULL, 100, '2002', '2002-2', 'Mr. Rupon', 'Live', 'rajib@dbs.com', NULL),
(9, '2020-02-21 10:43:39', NULL, 100, '2003', '2003-2', 'Kamrul', 'Live', 'rajib@dbs.com', NULL),
(8, '2020-02-20 14:25:13', NULL, 100, '2003', '2003Ã·1', 'Sujon', 'Live', 'rajib@dbs.com', NULL),
(7, '2020-01-27 09:41:08', NULL, 100, '3022', '3022-1', 'Brac Bank', 'Live', 'rajib@dbs.com', NULL),
(10, '2020-02-29 16:09:45', NULL, 100, '3025', '3025-1', 'Wall Mount Fan', 'Live', 'rajib@dbs.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `glchartsub1`
--

CREATE TABLE `glchartsub1` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `xrecflag` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glchartsuba`
--

CREATE TABLE `glchartsuba` (
  `sl` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xacc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsuba` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `xrecflag` varchar(20) CHARACTER SET utf8 NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glchequereg`
--

CREATE TABLE `glchequereg` (
  `xsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `bizid` int(5) NOT NULL,
  `xnarration` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xacccr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrusage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacccrsource` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsubcr` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsubdesccr` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xoptype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xchequeno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xchequedate` date DEFAULT NULL,
  `xcleardate` date DEFAULT NULL,
  `xrefno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacctype` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccusage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsource` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xaccsub1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsubcr1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsubdesc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xprime` double NOT NULL,
  `xsite` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcur` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gldetail`
--

CREATE TABLE `gldetail` (
  `sl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xvoucher` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(3) NOT NULL,
  `xacc` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xacctype` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccusage` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsource` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsub` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaccsuba` varchar(250) DEFAULT NULL,
  `xdiv` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsec` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcur` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbase` double DEFAULT 0,
  `xexch` double NOT NULL DEFAULT 0,
  `xprime` double NOT NULL DEFAULT 0,
  `xcheque` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xchequedate` date DEFAULT NULL,
  `xinvnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesparson` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xflag` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gldetail`
--

INSERT INTO `gldetail` (`sl`, `ztime`, `zutime`, `bizid`, `xvoucher`, `xrow`, `xacc`, `xacctype`, `xaccusage`, `xaccsource`, `xaccsub`, `xaccsuba`, `xdiv`, `xsec`, `xproj`, `xcur`, `xbase`, `xexch`, `xprime`, `xcheque`, `xchequedate`, `xinvnum`, `xsalesparson`, `xflag`) VALUES
(84, '2020-01-13 05:14:41', NULL, 100, 'JV--635000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000003', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(85, '2020-01-13 05:14:41', NULL, 100, 'JV--635000001', 2, '4002', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(90, '2020-01-13 06:33:28', NULL, 100, 'JV--635000002', 1, '2002', 'Liability', 'AP', 'Sub Account', '2002-1', '', NULL, NULL, NULL, 'BDT', 112000, 1, 112000, NULL, NULL, NULL, NULL, 'Debit'),
(91, '2020-01-13 06:33:28', NULL, 100, 'JV--635000002', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -112000, 1, -112000, NULL, NULL, NULL, NULL, 'Credit'),
(108, '2020-01-14 06:15:32', NULL, 100, 'JV--635000003', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 50000, 1, 50000, NULL, NULL, NULL, NULL, 'Debit'),
(109, '2020-01-14 06:15:32', NULL, 100, 'JV--635000003', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(110, '2020-01-14 06:16:21', NULL, 100, 'JV--635000004', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 35000, 1, 35000, NULL, NULL, NULL, NULL, 'Debit'),
(111, '2020-01-14 06:16:21', NULL, 100, 'JV--635000004', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -35000, 1, -35000, NULL, NULL, NULL, NULL, 'Credit'),
(116, '2020-01-16 08:58:14', NULL, 100, 'JV--635000005', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 14000, 1, 14000, NULL, NULL, NULL, NULL, 'Debit'),
(117, '2020-01-16 08:58:14', NULL, 100, 'JV--635000005', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -14000, 1, -14000, NULL, NULL, NULL, NULL, 'Credit'),
(120, '2020-01-18 06:38:35', NULL, 100, 'JV--635000006', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000003', '', NULL, NULL, NULL, 'BDT', 300000, 1, 300000, NULL, NULL, NULL, NULL, 'Debit'),
(121, '2020-01-18 06:38:35', NULL, 100, 'JV--635000006', 2, '4000', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -300000, 1, -300000, NULL, NULL, NULL, NULL, 'Credit'),
(124, '2020-01-18 06:42:36', NULL, 100, 'JV--635000007', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 25000, 1, 25000, NULL, NULL, NULL, NULL, 'Debit'),
(125, '2020-01-18 06:42:36', NULL, 100, 'JV--635000007', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -25000, 1, -25000, NULL, NULL, NULL, NULL, 'Credit'),
(126, '2020-01-19 09:43:18', NULL, 100, 'JV--635000008', 1, '3013', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 15380, 1, 15380, NULL, NULL, NULL, NULL, 'Debit'),
(127, '2020-01-19 09:43:18', NULL, 100, 'JV--635000008', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -15380, 1, -15380, NULL, NULL, NULL, NULL, 'Credit'),
(132, '2020-01-22 07:43:17', NULL, 100, 'JV--635000009', 1, '2002', 'Liability', 'AP', 'Sub Account', '2002-2', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(133, '2020-01-22 07:43:17', NULL, 100, 'JV--635000009', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(138, '2020-01-22 10:26:58', NULL, 100, 'JV--635000010', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 1750, 1, 1750, NULL, NULL, NULL, NULL, 'Debit'),
(139, '2020-01-22 10:26:58', NULL, 100, 'JV--635000010', 2, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -1750, 1, -1750, NULL, NULL, NULL, NULL, 'Credit'),
(140, '2020-01-22 10:29:08', NULL, 100, 'JV--635000011', 1, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 55000, 1, 55000, NULL, NULL, NULL, NULL, 'Debit'),
(141, '2020-01-22 10:29:08', NULL, 100, 'JV--635000011', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -55000, 1, -55000, NULL, NULL, NULL, NULL, 'Credit'),
(144, '2020-01-23 13:12:58', NULL, 100, 'JV--635000012', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 23000, 1, 23000, NULL, NULL, NULL, NULL, 'Debit'),
(145, '2020-01-23 13:12:58', NULL, 100, 'JV--635000012', 2, '4002', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -23000, 1, -23000, NULL, NULL, NULL, NULL, 'Credit'),
(146, '2020-01-23 13:14:05', NULL, 100, 'JV--635000013', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(147, '2020-01-23 13:14:05', NULL, 100, 'JV--635000013', 2, '4004', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(148, '2020-01-23 13:15:25', NULL, 100, 'JV--635000014', 1, '3018', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 3000, 1, 3000, NULL, NULL, NULL, NULL, 'Debit'),
(149, '2020-01-23 13:15:25', NULL, 100, 'JV--635000014', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -3000, 1, -3000, NULL, NULL, NULL, NULL, 'Credit'),
(150, '2020-01-23 13:17:54', NULL, 100, 'JV--635000015', 1, '3002', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 25000, 1, 25000, NULL, NULL, NULL, NULL, 'Debit'),
(151, '2020-01-23 13:17:54', NULL, 100, 'JV--635000015', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -25000, 1, -25000, NULL, NULL, NULL, NULL, 'Credit'),
(152, '2020-01-26 05:51:23', NULL, 100, 'JV--635000016', 1, '3019', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5173, 1, 5173, NULL, NULL, NULL, NULL, 'Debit'),
(153, '2020-01-26 05:51:23', NULL, 100, 'JV--635000016', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5173, 1, -5173, NULL, NULL, NULL, NULL, 'Credit'),
(158, '2020-01-27 09:33:42', NULL, 100, 'JV--635000017', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 9030, 1, 9030, NULL, NULL, NULL, NULL, 'Debit'),
(159, '2020-01-27 09:33:42', NULL, 100, 'JV--635000017', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -9030, 1, -9030, NULL, NULL, NULL, NULL, 'Credit'),
(160, '2020-01-27 09:35:11', NULL, 100, 'JV--635000018', 1, '3021', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 700, 1, 700, NULL, NULL, NULL, NULL, 'Debit'),
(161, '2020-01-27 09:35:11', NULL, 100, 'JV--635000018', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -700, 1, -700, NULL, NULL, NULL, NULL, 'Credit'),
(162, '2020-01-27 09:42:53', NULL, 100, 'JV--635000019', 1, '3022', 'Expenditure', 'Ledger', 'Sub Account', '3022-1', '', NULL, NULL, NULL, 'BDT', 104.09, 1, 104.09, NULL, NULL, NULL, NULL, 'Debit'),
(163, '2020-01-27 09:42:53', NULL, 100, 'JV--635000019', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -104.09, 1, -104.09, NULL, NULL, NULL, NULL, 'Credit'),
(164, '2020-01-29 17:13:03', NULL, 100, 'JV--635000020', 1, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(165, '2020-01-29 17:13:03', NULL, 100, 'JV--635000020', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000007', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(166, '2020-01-29 17:15:50', NULL, 100, 'JV--635000021', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000008', '', NULL, NULL, NULL, 'BDT', 25000, 1, 25000, NULL, NULL, NULL, NULL, 'Debit'),
(167, '2020-01-29 17:15:50', NULL, 100, 'JV--635000021', 2, '4000', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -25000, 1, -25000, NULL, NULL, NULL, NULL, 'Credit'),
(168, '2020-01-29 17:17:45', NULL, 100, 'JV--635000022', 1, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 25000, 1, 25000, NULL, NULL, NULL, NULL, 'Debit'),
(169, '2020-01-29 17:17:45', NULL, 100, 'JV--635000022', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000008', '', NULL, NULL, NULL, 'BDT', -25000, 1, -25000, NULL, NULL, NULL, NULL, 'Credit'),
(172, '2020-02-01 13:01:04', NULL, 100, 'JV--635000023', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(173, '2020-02-01 13:01:04', NULL, 100, 'JV--635000023', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(174, '2020-02-02 11:22:56', NULL, 100, 'JV--635000024', 1, '3023', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 50000, 1, 50000, NULL, NULL, NULL, NULL, 'Debit'),
(175, '2020-02-02 11:22:56', NULL, 100, 'JV--635000024', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(176, '2020-02-02 11:24:46', NULL, 100, 'JV--635000025', 1, '3023', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(177, '2020-02-02 11:24:46', NULL, 100, 'JV--635000025', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(178, '2020-02-02 14:38:01', NULL, 100, 'JV--635000026', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 7463, 1, 7463, NULL, NULL, NULL, NULL, 'Debit'),
(179, '2020-02-02 14:38:01', NULL, 100, 'JV--635000026', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -7463, 1, -7463, NULL, NULL, NULL, NULL, 'Credit'),
(180, '2020-02-05 14:57:31', NULL, 100, 'JV--635000027', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 6000, 1, 6000, NULL, NULL, NULL, NULL, 'Debit'),
(181, '2020-02-05 14:57:31', NULL, 100, 'JV--635000027', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -6000, 1, -6000, NULL, NULL, NULL, NULL, 'Credit'),
(184, '2020-02-05 15:09:21', NULL, 100, 'JV--635000028', 1, '3005', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 3000, 1, 3000, NULL, NULL, NULL, NULL, 'Debit'),
(185, '2020-02-05 15:09:21', NULL, 100, 'JV--635000028', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -3000, 1, -3000, NULL, NULL, NULL, NULL, 'Credit'),
(186, '2020-02-05 15:13:17', NULL, 100, 'JV--635000029', 1, '3011', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1000, 1, 1000, NULL, NULL, NULL, NULL, 'Debit'),
(187, '2020-02-05 15:13:17', NULL, 100, 'JV--635000029', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -1000, 1, -1000, NULL, NULL, NULL, NULL, 'Credit'),
(188, '2020-02-05 15:14:02', NULL, 100, 'JV--635000030', 1, '2024', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 4000, 1, 4000, NULL, NULL, NULL, NULL, 'Debit'),
(189, '2020-02-05 15:14:02', NULL, 100, 'JV--635000030', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -4000, 1, -4000, NULL, NULL, NULL, NULL, 'Credit'),
(190, '2020-02-06 07:40:02', NULL, 100, 'JV--635000031', 1, '4002', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(191, '2020-02-06 07:40:02', NULL, 100, 'JV--635000031', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(192, '2020-02-06 07:42:34', NULL, 100, 'JV--635000032', 1, '3024', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1000, 1, 1000, NULL, NULL, NULL, NULL, 'Debit'),
(193, '2020-02-06 07:42:34', NULL, 100, 'JV--635000032', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -1000, 1, -1000, NULL, NULL, NULL, NULL, 'Credit'),
(194, '2020-02-06 09:00:48', NULL, 100, 'JV--635000033', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', '', NULL, NULL, NULL, 'BDT', 28000, 1, 28000, NULL, NULL, NULL, NULL, 'Debit'),
(195, '2020-02-06 09:00:48', NULL, 100, 'JV--635000033', 2, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -28000, 1, -28000, NULL, NULL, NULL, NULL, 'Credit'),
(196, '2020-02-06 09:02:06', NULL, 100, 'JV--635000034', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000004', '', NULL, NULL, NULL, 'BDT', 33000, 1, 33000, NULL, NULL, NULL, NULL, 'Debit'),
(197, '2020-02-06 09:02:06', NULL, 100, 'JV--635000034', 2, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -33000, 1, -33000, NULL, NULL, NULL, NULL, 'Credit'),
(198, '2020-02-06 09:05:36', NULL, 100, 'JV--635000035', 1, '3012', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(199, '2020-02-06 09:05:36', NULL, 100, 'JV--635000035', 2, '2002', 'Liability', 'AP', 'Sub Account', '2002-2', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(200, '2020-02-06 09:07:53', NULL, 100, 'JV--635000036', 1, '3012', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 21500, 1, 21500, NULL, NULL, NULL, NULL, 'Debit'),
(201, '2020-02-06 09:07:53', NULL, 100, 'JV--635000036', 2, '2002', 'Liability', 'AP', 'Sub Account', '2002-1', '', NULL, NULL, NULL, 'BDT', -21500, 1, -21500, NULL, NULL, NULL, NULL, 'Credit'),
(204, '2020-02-07 14:29:14', NULL, 100, 'JV--635000037', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 30000, 1, 30000, NULL, NULL, NULL, NULL, 'Debit'),
(205, '2020-02-07 14:29:14', NULL, 100, 'JV--635000037', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -30000, 1, -30000, NULL, NULL, NULL, NULL, 'Credit'),
(206, '2020-02-09 05:40:47', NULL, 100, 'JV--635000038', 1, '3010', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 62000, 1, 62000, NULL, NULL, NULL, NULL, 'Debit'),
(207, '2020-02-09 05:40:47', NULL, 100, 'JV--635000038', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(216, '2020-02-09 05:56:11', NULL, 100, 'JV--635000038', 3, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -12000, 1, -12000, NULL, NULL, NULL, NULL, 'Credit'),
(208, '2020-02-09 05:41:32', NULL, 100, 'JV--635000039', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 8000, 1, 8000, NULL, NULL, NULL, NULL, 'Debit'),
(209, '2020-02-09 05:41:32', NULL, 100, 'JV--635000039', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -8000, 1, -8000, NULL, NULL, NULL, NULL, 'Credit'),
(210, '2020-02-09 05:51:32', NULL, 100, 'JV--635000040', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000006', '', NULL, NULL, NULL, 'BDT', 7500, 1, 7500, NULL, NULL, NULL, NULL, 'Debit'),
(211, '2020-02-09 05:51:32', NULL, 100, 'JV--635000040', 2, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -7500, 1, -7500, NULL, NULL, NULL, NULL, 'Credit'),
(212, '2020-02-09 05:52:29', NULL, 100, 'JV--635000041', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 7500, 1, 7500, NULL, NULL, NULL, NULL, 'Debit'),
(213, '2020-02-09 05:52:29', NULL, 100, 'JV--635000041', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000006', '', NULL, NULL, NULL, 'BDT', -7500, 1, -7500, NULL, NULL, NULL, NULL, 'Credit'),
(214, '2020-02-09 05:53:17', NULL, 100, 'JV--635000042', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 7500, 1, 7500, NULL, NULL, NULL, NULL, 'Debit'),
(215, '2020-02-09 05:53:17', NULL, 100, 'JV--635000042', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -7500, 1, -7500, NULL, NULL, NULL, NULL, 'Credit'),
(217, '2020-02-09 17:11:07', NULL, 100, 'JV--635000043', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(218, '2020-02-09 17:11:07', NULL, 100, 'JV--635000043', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(219, '2020-02-20 14:21:09', NULL, 100, 'JV--635000044', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 2000, 1, 2000, NULL, NULL, NULL, NULL, 'Debit'),
(220, '2020-02-20 14:21:09', NULL, 100, 'JV--635000044', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -2000, 1, -2000, NULL, NULL, NULL, NULL, 'Credit'),
(221, '2020-02-20 14:22:27', NULL, 100, 'JV--635000045', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 4000, 1, 4000, NULL, NULL, NULL, NULL, 'Debit'),
(222, '2020-02-20 14:22:27', NULL, 100, 'JV--635000045', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -4000, 1, -4000, NULL, NULL, NULL, NULL, 'Credit'),
(225, '2020-02-20 14:29:35', NULL, 100, 'JV--635000046', 1, '2003', 'Liability', 'AP', 'Sub Account', '2003-1', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(226, '2020-02-20 14:29:35', NULL, 100, 'JV--635000046', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(227, '2020-02-20 14:50:20', NULL, 100, 'JV--635000047', 1, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 23000, 1, 23000, NULL, NULL, NULL, NULL, 'Debit'),
(228, '2020-02-20 14:50:20', NULL, 100, 'JV--635000047', 2, '4002', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -23000, 1, -23000, NULL, NULL, NULL, NULL, 'Credit'),
(229, '2020-02-21 03:19:23', NULL, 100, 'JV--635000048', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(230, '2020-02-21 03:19:23', NULL, 100, 'JV--635000048', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(233, '2020-02-22 04:31:12', NULL, 100, 'JV--635000049', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 3128, 1, 3128, NULL, NULL, NULL, NULL, 'Debit'),
(234, '2020-02-22 04:31:12', NULL, 100, 'JV--635000049', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -3128, 1, -3128, NULL, NULL, NULL, NULL, 'Credit'),
(235, '2020-02-24 11:57:05', NULL, 100, 'JV--635000050', 1, '4004', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(236, '2020-02-24 11:57:05', NULL, 100, 'JV--635000050', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(237, '2020-02-24 11:58:16', NULL, 100, 'JV--635000051', 1, '3018', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 4000, 1, 4000, NULL, NULL, NULL, NULL, 'Debit'),
(238, '2020-02-24 11:58:16', NULL, 100, 'JV--635000051', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -4000, 1, -4000, NULL, NULL, NULL, NULL, 'Credit'),
(239, '2020-02-24 11:59:08', NULL, 100, 'JV--635000052', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 6000, 1, 6000, NULL, NULL, NULL, NULL, 'Debit'),
(240, '2020-02-24 11:59:08', NULL, 100, 'JV--635000052', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -6000, 1, -6000, NULL, NULL, NULL, NULL, 'Credit'),
(241, '2020-02-27 05:27:27', NULL, 100, 'JV--635000053', 1, '3002', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 25000, 1, 25000, NULL, NULL, NULL, NULL, 'Debit'),
(242, '2020-02-27 05:27:27', NULL, 100, 'JV--635000053', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -25000, 1, -25000, NULL, NULL, NULL, NULL, 'Credit'),
(243, '2020-02-29 16:11:07', NULL, 100, 'JV--635000054', 1, '3025', 'Asset', 'Ledger', 'Sub Account', '3025-1', '', NULL, NULL, NULL, 'BDT', 3530, 1, 3530, NULL, NULL, NULL, NULL, 'Debit'),
(244, '2020-02-29 16:11:07', NULL, 100, 'JV--635000054', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -3530, 1, -3530, NULL, NULL, NULL, NULL, 'Credit'),
(245, '2020-02-29 16:11:45', NULL, 100, 'JV--635000055', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(246, '2020-02-29 16:11:45', NULL, 100, 'JV--635000055', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(247, '2020-03-02 09:43:50', NULL, 100, 'JV--635000056', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 34000, 1, 34000, NULL, NULL, NULL, NULL, 'Debit'),
(248, '2020-03-02 09:43:50', NULL, 100, 'JV--635000056', 2, '4000', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -34000, 1, -34000, NULL, NULL, NULL, NULL, 'Credit'),
(249, '2020-03-02 09:45:38', NULL, 100, 'JV--635000057', 1, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 28000, 1, 28000, NULL, NULL, NULL, NULL, 'Debit'),
(250, '2020-03-02 09:45:38', NULL, 100, 'JV--635000057', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', '', NULL, NULL, NULL, 'BDT', -28000, 1, -28000, NULL, NULL, NULL, NULL, 'Credit'),
(251, '2020-03-02 09:48:14', NULL, 100, 'JV--635000058', 1, '2024', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1500, 1, 1500, NULL, NULL, NULL, NULL, 'Debit'),
(252, '2020-03-02 09:48:14', NULL, 100, 'JV--635000058', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1500, 1, -1500, NULL, NULL, NULL, NULL, 'Credit'),
(253, '2020-03-02 09:48:49', NULL, 100, 'JV--635000059', 1, '3024', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1500, 1, 1500, NULL, NULL, NULL, NULL, 'Debit'),
(254, '2020-03-02 09:48:49', NULL, 100, 'JV--635000059', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1500, 1, -1500, NULL, NULL, NULL, NULL, 'Credit'),
(255, '2020-03-02 09:49:50', NULL, 100, 'JV--635000060', 1, '3020', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1550, 1, 1550, NULL, NULL, NULL, NULL, 'Debit'),
(256, '2020-03-02 09:49:50', NULL, 100, 'JV--635000060', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1550, 1, -1550, NULL, NULL, NULL, NULL, 'Credit'),
(257, '2020-03-02 09:50:31', NULL, 100, 'JV--635000061', 1, '3024', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1950, 1, 1950, NULL, NULL, NULL, NULL, 'Debit'),
(258, '2020-03-02 09:50:31', NULL, 100, 'JV--635000061', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1950, 1, -1950, NULL, NULL, NULL, NULL, 'Credit'),
(259, '2020-03-02 09:52:06', NULL, 100, 'JV--635000062', 1, '4001', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1500, 1, 1500, NULL, NULL, NULL, NULL, 'Debit'),
(260, '2020-03-02 09:52:06', NULL, 100, 'JV--635000062', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -1500, 1, -1500, NULL, NULL, NULL, NULL, 'Credit'),
(261, '2020-03-02 09:57:30', NULL, 100, 'JV--635000063', 1, '3001', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 2400, 1, 2400, NULL, NULL, NULL, NULL, 'Debit'),
(262, '2020-03-02 09:57:38', NULL, 100, 'JV--635000063', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -2400, 1, -2400, NULL, NULL, NULL, NULL, 'Credit'),
(263, '2020-03-03 15:00:19', NULL, 100, 'JV--635000064', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 100000, 1, 100000, NULL, NULL, NULL, NULL, 'Debit'),
(264, '2020-03-03 15:00:19', NULL, 100, 'JV--635000064', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', '', NULL, NULL, NULL, 'BDT', -100000, 1, -100000, NULL, NULL, NULL, NULL, 'Credit'),
(265, '2020-03-03 15:01:05', NULL, 100, 'JV--635000065', 1, '3010', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 65000, 1, 65000, NULL, NULL, NULL, NULL, 'Debit'),
(266, '2020-03-03 15:01:05', NULL, 100, 'JV--635000065', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -65000, 1, -65000, NULL, NULL, NULL, NULL, 'Credit'),
(267, '2020-03-03 15:01:48', NULL, 100, 'JV--635000066', 1, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(268, '2020-03-03 15:01:48', NULL, 100, 'JV--635000066', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(269, '2020-03-03 15:03:42', NULL, 100, 'JV--635000067', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 40400, 1, 40400, NULL, NULL, NULL, NULL, 'Debit'),
(270, '2020-03-03 15:03:42', NULL, 100, 'JV--635000067', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -40400, 1, -40400, NULL, NULL, NULL, NULL, 'Credit'),
(271, '2020-03-03 15:14:23', NULL, 100, 'JV--635000068', 1, '2002', 'Liability', 'AP', 'Sub Account', '2002-2', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(272, '2020-03-03 15:14:23', NULL, 100, 'JV--635000068', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(273, '2020-03-05 09:20:25', NULL, 100, 'JV--635000069', 1, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 33000, 1, 33000, NULL, NULL, NULL, NULL, 'Debit'),
(274, '2020-03-05 09:20:25', NULL, 100, 'JV--635000069', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000004', '', NULL, NULL, NULL, 'BDT', -33000, 1, -33000, NULL, NULL, NULL, NULL, 'Credit'),
(275, '2020-03-05 09:45:15', NULL, 100, 'JV--635000070', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', '', NULL, NULL, NULL, 'BDT', 28000, 1, 28000, NULL, NULL, NULL, NULL, 'Debit'),
(276, '2020-03-05 09:45:15', NULL, 100, 'JV--635000070', 2, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -28000, 1, -28000, NULL, NULL, NULL, NULL, 'Credit'),
(277, '2020-03-05 09:46:08', NULL, 100, 'JV--635000071', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000004', '', NULL, NULL, NULL, 'BDT', 33000, 1, 33000, NULL, NULL, NULL, NULL, 'Debit'),
(278, '2020-03-05 09:46:08', NULL, 100, 'JV--635000071', 2, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -33000, 1, -33000, NULL, NULL, NULL, NULL, 'Credit'),
(279, '2020-03-05 09:50:55', NULL, 100, 'JV--635000072', 1, '3012', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 21500, 1, 21500, NULL, NULL, NULL, NULL, 'Debit'),
(280, '2020-03-05 09:50:55', NULL, 100, 'JV--635000072', 2, '2002', 'Liability', 'AP', 'Sub Account', '2002-1', '', NULL, NULL, NULL, 'BDT', -21500, 1, -21500, NULL, NULL, NULL, NULL, 'Credit'),
(281, '2020-03-05 09:51:51', NULL, 100, 'JV--635000073', 1, '3012', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 12000, 1, 12000, NULL, NULL, NULL, NULL, 'Debit'),
(282, '2020-03-05 09:51:51', NULL, 100, 'JV--635000073', 2, '2002', 'Liability', 'AP', 'Sub Account', '2002-2', '', NULL, NULL, NULL, 'BDT', -12000, 1, -12000, NULL, NULL, NULL, NULL, 'Credit'),
(283, '2020-03-05 09:53:51', NULL, 100, 'JV--635000074', 1, '4003', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 3000, 1, 3000, NULL, NULL, NULL, NULL, 'Debit'),
(284, '2020-03-05 09:53:51', NULL, 100, 'JV--635000074', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000006', '', NULL, NULL, NULL, 'BDT', -3000, 1, -3000, NULL, NULL, NULL, NULL, 'Credit'),
(285, '2020-03-05 13:40:31', NULL, 100, 'JV--635000075', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(286, '2020-03-05 13:40:31', NULL, 100, 'JV--635000075', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(287, '2020-03-08 15:05:59', NULL, 100, 'JV--635000076', 1, '3026', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 44000, 1, 44000, NULL, NULL, NULL, NULL, 'Debit'),
(288, '2020-03-08 15:05:59', NULL, 100, 'JV--635000076', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -44000, 1, -44000, NULL, NULL, NULL, NULL, 'Credit'),
(289, '2020-03-09 09:18:17', NULL, 100, 'JV--635000077', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(290, '2020-03-09 09:18:32', NULL, 100, 'JV--635000077', 2, '4005', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(291, '2020-03-09 09:19:54', NULL, 100, 'JV--635000078', 1, '3001', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 2545, 1, 2545, NULL, NULL, NULL, NULL, 'Debit'),
(292, '2020-03-09 09:19:54', NULL, 100, 'JV--635000078', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -2545, 1, -2545, NULL, NULL, NULL, NULL, 'Credit'),
(293, '2020-03-09 11:56:30', NULL, 100, 'JV--635000079', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1600, 1, 1600, NULL, NULL, NULL, NULL, 'Debit'),
(294, '2020-03-09 11:56:30', NULL, 100, 'JV--635000079', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1600, 1, -1600, NULL, NULL, NULL, NULL, 'Credit'),
(295, '2020-03-10 12:09:39', NULL, 100, 'JV--635000080', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(296, '2020-03-10 12:09:39', NULL, 100, 'JV--635000080', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(297, '2020-03-12 13:18:39', NULL, 100, 'JV--635000081', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 6903, 1, 6903, NULL, NULL, NULL, NULL, 'Debit'),
(298, '2020-03-12 13:18:39', NULL, 100, 'JV--635000081', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -6903, 1, -6903, NULL, NULL, NULL, NULL, 'Credit'),
(299, '2020-03-12 13:19:13', NULL, 100, 'JV--635000082', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1975, 1, 1975, NULL, NULL, NULL, NULL, 'Debit'),
(300, '2020-03-12 13:19:13', NULL, 100, 'JV--635000082', 2, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -1975, 1, -1975, NULL, NULL, NULL, NULL, 'Credit'),
(301, '2020-03-15 08:22:28', NULL, 100, 'JV--635000083', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5044, 1, 5044, NULL, NULL, NULL, NULL, 'Debit'),
(302, '2020-03-15 08:22:28', NULL, 100, 'JV--635000083', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5044, 1, -5044, NULL, NULL, NULL, NULL, 'Credit'),
(303, '2020-03-15 08:27:52', NULL, 100, 'JV--635000084', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 5000, 1, 5000, NULL, NULL, NULL, NULL, 'Debit'),
(304, '2020-03-15 08:27:52', NULL, 100, 'JV--635000084', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -5000, 1, -5000, NULL, NULL, NULL, NULL, 'Credit'),
(305, '2020-03-17 07:17:05', NULL, 100, 'JV--635000085', 1, '1002', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 100000, 1, 100000, NULL, NULL, NULL, NULL, 'Debit'),
(306, '2020-03-17 07:17:05', NULL, 100, 'JV--635000085', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', '', NULL, NULL, NULL, 'BDT', -100000, 1, -100000, NULL, NULL, NULL, NULL, 'Credit'),
(307, '2020-03-17 14:44:05', NULL, 100, 'JV--635000086', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1000, 1, 1000, NULL, NULL, NULL, NULL, 'Debit'),
(308, '2020-03-17 14:44:05', NULL, 100, 'JV--635000086', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1000, 1, -1000, NULL, NULL, NULL, NULL, 'Credit'),
(309, '2020-03-19 03:42:18', NULL, 100, 'JV--635000087', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(310, '2020-03-19 03:42:18', NULL, 100, 'JV--635000087', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(311, '2020-03-19 03:44:53', NULL, 100, 'JV--635000088', 1, '4002', 'Income', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(312, '2020-03-19 03:44:53', NULL, 100, 'JV--635000088', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(313, '2020-03-19 03:58:32', NULL, 100, 'JV--635000089', 1, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', 8000, 1, 8000, NULL, NULL, NULL, NULL, 'Debit'),
(314, '2020-03-19 03:58:32', NULL, 100, 'JV--635000089', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000010', '', NULL, NULL, NULL, 'BDT', -8000, 1, -8000, NULL, NULL, NULL, NULL, 'Credit'),
(315, '2020-03-19 03:59:39', NULL, 100, 'JV--635000090', 1, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(316, '2020-03-19 03:59:39', NULL, 100, 'JV--635000090', 2, '1010', 'Asset', 'AR', 'Customer', 'CUS0000010', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(317, '2020-03-23 09:20:26', NULL, 100, 'JV--635000091', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(318, '2020-03-23 09:20:26', NULL, 100, 'JV--635000091', 2, '1001', 'Asset', 'Bank', 'None', '', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(72, '2020-01-10 17:24:37', NULL, 100, 'OB--000001', 1, '1001', 'Asset', 'Bank', 'None', 'None', '', NULL, NULL, NULL, 'BDT', 130587, 1, 130587, NULL, NULL, NULL, NULL, 'Debit'),
(73, '2020-01-10 17:24:37', NULL, 100, 'OB--000001', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -130587, 1, -130587, NULL, NULL, NULL, NULL, 'Credit'),
(74, '2020-01-10 17:25:31', NULL, 100, 'OB--000002', 1, '1002', 'Asset', 'Bank', 'None', 'None', '', NULL, NULL, NULL, 'BDT', 284791, 1, 284791, NULL, NULL, NULL, NULL, 'Debit'),
(75, '2020-01-10 17:25:31', NULL, 100, 'OB--000002', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -284791, 1, -284791, NULL, NULL, NULL, NULL, 'Credit'),
(76, '2020-01-10 17:26:15', NULL, 100, 'OB--000003', 1, '1009', 'Asset', 'Cash', 'None', 'None', '', NULL, NULL, NULL, 'BDT', 113000, 1, 113000, NULL, NULL, NULL, NULL, 'Debit'),
(77, '2020-01-10 17:26:15', NULL, 100, 'OB--000003', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -113000, 1, -113000, NULL, NULL, NULL, NULL, 'Credit'),
(78, '2020-01-12 04:04:00', NULL, 100, 'OB--635000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', '', NULL, NULL, NULL, 'BDT', 850000, 1, 850000, NULL, NULL, NULL, NULL, 'Debit'),
(79, '2020-01-12 04:04:00', NULL, 100, 'OB--635000001', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -850000, 1, -850000, NULL, NULL, NULL, NULL, 'Credit'),
(80, '2020-01-12 04:04:47', NULL, 100, 'OB--635000002', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', '', NULL, NULL, NULL, 'BDT', 900000, 1, 900000, NULL, NULL, NULL, NULL, 'Debit'),
(81, '2020-01-12 04:04:47', NULL, 100, 'OB--635000002', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -900000, 1, -900000, NULL, NULL, NULL, NULL, 'Credit'),
(82, '2020-01-12 04:05:33', NULL, 100, 'OB--635000003', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000007', '', NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(83, '2020-01-12 04:05:33', NULL, 100, 'OB--635000003', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(88, '2020-01-13 06:32:05', NULL, 100, 'OB--635000004', 1, '2002', 'Liability', 'AP', 'Sub Account', '2002-1', '', NULL, NULL, NULL, 'BDT', -225000, 1, -225000, NULL, NULL, NULL, NULL, 'Credit'),
(89, '2020-01-13 06:32:05', NULL, 100, 'OB--635000004', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 225000, 1, 225000, NULL, NULL, NULL, NULL, 'Debit'),
(94, '2020-01-13 06:51:31', NULL, 100, 'OB--635000005', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', '', NULL, NULL, NULL, 'BDT', 28000, 1, 28000, NULL, NULL, NULL, NULL, 'Debit'),
(95, '2020-01-13 06:51:31', NULL, 100, 'OB--635000005', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -28000, 1, -28000, NULL, NULL, NULL, NULL, 'Credit'),
(96, '2020-01-13 06:52:09', NULL, 100, 'OB--635000006', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000007', '', NULL, NULL, NULL, 'BDT', 0, 1, 0, NULL, NULL, NULL, NULL, 'Debit'),
(97, '2020-01-13 06:52:09', NULL, 100, 'OB--635000006', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 0, 1, 0, NULL, NULL, NULL, NULL, 'Debit'),
(98, '2020-01-13 07:03:32', NULL, 100, 'OB--635000007', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000010', '', NULL, NULL, NULL, 'BDT', 70000, 1, 70000, NULL, NULL, NULL, NULL, 'Debit'),
(99, '2020-01-13 07:03:32', NULL, 100, 'OB--635000007', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -70000, 1, -70000, NULL, NULL, NULL, NULL, 'Credit'),
(100, '2020-01-13 07:04:16', NULL, 100, 'OB--635000008', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', '', NULL, NULL, NULL, 'BDT', 60000, 1, 60000, NULL, NULL, NULL, NULL, 'Debit'),
(101, '2020-01-13 07:04:16', NULL, 100, 'OB--635000008', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -60000, 1, -60000, NULL, NULL, NULL, NULL, 'Credit'),
(102, '2020-01-13 09:30:22', NULL, 100, 'OB--635000009', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000011', '', NULL, NULL, NULL, 'BDT', 14000, 1, 14000, NULL, NULL, NULL, NULL, 'Debit'),
(103, '2020-01-13 09:30:22', NULL, 100, 'OB--635000009', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -14000, 1, -14000, NULL, NULL, NULL, NULL, 'Credit'),
(130, '2020-01-22 07:42:19', NULL, 100, 'OB--635000010', 1, '2002', 'Liability', 'AP', 'Sub Account', '2002-2', '', NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(131, '2020-01-22 07:42:19', NULL, 100, 'OB--635000010', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(134, '2020-01-22 07:47:34', NULL, 100, 'OB--635000011', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000012', '', NULL, NULL, NULL, 'BDT', 23000, 1, 23000, NULL, NULL, NULL, NULL, 'Debit'),
(135, '2020-01-22 07:47:34', NULL, 100, 'OB--635000011', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', -23000, 1, -23000, NULL, NULL, NULL, NULL, 'Credit'),
(223, '2020-02-20 14:27:44', NULL, 100, 'OB--635000012', 1, '2003', 'Liability', 'AP', 'Sub Account', '2003-1', '', NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(224, '2020-02-20 14:27:44', NULL, 100, 'OB--635000012', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(231, '2020-02-21 10:44:28', NULL, 100, 'OB--635000013', 1, '2003', 'Liability', 'AP', 'Sub Account', '2003-2', '', NULL, NULL, NULL, 'BDT', -15000, 1, -15000, NULL, NULL, NULL, NULL, 'Credit'),
(232, '2020-02-21 10:44:28', NULL, 100, 'OB--635000013', 2, '2035', 'Liability', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 15000, 1, 15000, NULL, NULL, NULL, NULL, 'Debit'),
(92, '2020-01-13 06:34:19', NULL, 100, 'PAY-635000001', 1, '3009', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1000, 1, 1000, NULL, NULL, NULL, NULL, 'Debit'),
(93, '2020-01-13 06:34:19', NULL, 100, 'PAY-635000001', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1000, 1, -1000, NULL, NULL, NULL, NULL, 'Credit'),
(106, '2020-01-14 04:51:35', NULL, 100, 'PAY-635000002', 1, '3016', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 9500, 1, 9500, NULL, NULL, NULL, NULL, 'Debit'),
(107, '2020-01-14 04:51:35', NULL, 100, 'PAY-635000002', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -9500, 1, -9500, NULL, NULL, NULL, NULL, 'Credit'),
(112, '2020-01-14 06:17:31', NULL, 100, 'PAY-635000003', 1, '3010', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 72000, 1, 72000, NULL, NULL, NULL, NULL, 'Debit'),
(113, '2020-01-14 06:17:31', NULL, 100, 'PAY-635000003', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -72000, 1, -72000, NULL, NULL, NULL, NULL, 'Credit'),
(118, '2020-01-16 09:07:19', NULL, 100, 'PAY-635000004', 1, '3018', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 3000, 1, 3000, NULL, NULL, NULL, NULL, 'Debit'),
(119, '2020-01-16 09:07:19', NULL, 100, 'PAY-635000004', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -3000, 1, -3000, NULL, NULL, NULL, NULL, 'Credit'),
(128, '2020-01-20 06:41:23', NULL, 100, 'PAY-635000005', 1, '3001', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 1840, 1, 1840, NULL, NULL, NULL, NULL, 'Debit'),
(129, '2020-01-20 06:41:23', NULL, 100, 'PAY-635000005', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -1840, 1, -1840, NULL, NULL, NULL, NULL, 'Credit'),
(154, '2020-01-26 09:10:06', NULL, 100, 'PAY-635000006', 1, '3020', 'Expenditure', 'Ledger', 'None', '', '', NULL, NULL, NULL, 'BDT', 2000, 1, 2000, NULL, NULL, NULL, NULL, 'Debit'),
(155, '2020-01-26 09:10:06', NULL, 100, 'PAY-635000006', 2, '1009', 'Asset', 'Cash', 'None', '', '', NULL, NULL, NULL, 'BDT', -2000, 1, -2000, NULL, NULL, NULL, NULL, 'Credit'),
(86, '2020-01-13 05:17:20', NULL, 100, 'TRCV635000001', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000003', NULL, NULL, NULL, NULL, 'BDT', -22000, 1, -22000, NULL, NULL, NULL, NULL, 'Credit'),
(87, '2020-01-13 05:17:20', NULL, 100, 'TRCV635000001', 2, '1001', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 22000, 1, 22000, NULL, NULL, NULL, NULL, 'Debit'),
(104, '2020-01-13 11:10:33', NULL, 100, 'TRCV635000002', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000010', NULL, NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(105, '2020-01-13 11:10:33', NULL, 100, 'TRCV635000002', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(114, '2020-01-16 08:57:15', NULL, 100, 'TRCV635000003', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000011', NULL, NULL, NULL, NULL, 'BDT', -14000, 1, -14000, NULL, NULL, NULL, NULL, 'Credit'),
(115, '2020-01-16 08:57:15', NULL, 100, 'TRCV635000003', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 14000, 1, 14000, NULL, NULL, NULL, NULL, 'Debit'),
(122, '2020-01-18 06:40:56', NULL, 100, 'TRCV635000004', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000003', NULL, NULL, NULL, NULL, 'BDT', -75000, 1, -75000, NULL, NULL, NULL, NULL, 'Credit'),
(123, '2020-01-18 06:40:56', NULL, 100, 'TRCV635000004', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 75000, 1, 75000, NULL, NULL, NULL, NULL, 'Debit'),
(136, '2020-01-22 07:50:05', NULL, 100, 'TRCV635000005', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000012', NULL, NULL, NULL, NULL, 'BDT', -10000, 1, -10000, NULL, NULL, NULL, NULL, 'Credit'),
(137, '2020-01-22 07:50:05', NULL, 100, 'TRCV635000005', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 10000, 1, 10000, NULL, NULL, NULL, NULL, 'Debit'),
(142, '2020-01-23 11:42:24', NULL, 100, 'TRCV635000006', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', NULL, NULL, NULL, NULL, 'BDT', -12000, 1, -12000, NULL, NULL, NULL, NULL, 'Credit'),
(143, '2020-01-23 11:42:24', NULL, 100, 'TRCV635000006', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 12000, 1, 12000, NULL, NULL, NULL, NULL, 'Debit'),
(156, '2020-01-27 09:30:01', NULL, 100, 'TRCV635000007', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000002', NULL, NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(157, '2020-01-27 09:30:01', NULL, 100, 'TRCV635000007', 2, '1002', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 50000, 1, 50000, NULL, NULL, NULL, NULL, 'Debit'),
(170, '2020-01-29 17:29:19', NULL, 100, 'TRCV635000008', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000009', NULL, NULL, NULL, NULL, 'BDT', -20000, 1, -20000, NULL, NULL, NULL, NULL, 'Credit'),
(171, '2020-01-29 17:29:19', NULL, 100, 'TRCV635000008', 2, '1002', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 20000, 1, 20000, NULL, NULL, NULL, NULL, 'Debit'),
(182, '2020-02-05 15:07:07', NULL, 100, 'TRCV635000009', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000005', NULL, NULL, NULL, NULL, 'BDT', -28000, 1, -28000, NULL, NULL, NULL, NULL, 'Credit'),
(183, '2020-02-05 15:07:07', NULL, 100, 'TRCV635000009', 2, '1002', 'Asset', 'Bank', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 28000, 1, 28000, NULL, NULL, NULL, NULL, 'Debit'),
(202, '2020-02-07 14:27:57', NULL, 100, 'TRCV635000010', 1, '1010', 'Asset', 'AR', 'Customer', 'CUS0000001', NULL, NULL, NULL, NULL, 'BDT', -50000, 1, -50000, NULL, NULL, NULL, NULL, 'Credit'),
(203, '2020-02-07 14:27:57', NULL, 100, 'TRCV635000010', 2, '1009', 'Asset', 'Cash', 'None', '', NULL, NULL, NULL, NULL, 'BDT', 50000, 1, 50000, NULL, NULL, NULL, NULL, 'Debit');

-- --------------------------------------------------------

--
-- Stand-in structure for view `gldetailview`
-- (See below for the actual view)
--
CREATE TABLE `gldetailview` (
`ztime` timestamp
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xrow` int(3)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xdoctype` varchar(30)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(1000)
,`xmanager` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xaccsub` varchar(20)
,`xaccsuba` varchar(250)
,`xaccsubdesc` varchar(250)
,`xproj` varchar(100)
,`xsec` varchar(100)
,`xdiv` varchar(100)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xcheque` varchar(50)
,`xchequedate` date
,`xflag` varchar(20)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(100)
,`xrecflag` varchar(15)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
,`xsite` varchar(50)
,`xlong` varchar(250)
,`xapprvstatus` varchar(20)
,`xstatus` varchar(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `glheader`
--

CREATE TABLE `glheader` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xvoucher` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xnarration` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xref` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlong` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xchequeno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xstatusjv` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xapprvstatus` varchar(20) DEFAULT 'Created',
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsite` varchar(50) DEFAULT NULL,
  `xdoctype` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdocnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xapprovedby` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Created',
  `xrecflag` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `glheader`
--

INSERT INTO `glheader` (`xsl`, `ztime`, `zutime`, `bizid`, `xvoucher`, `xdate`, `xnarration`, `xref`, `xlong`, `xchequeno`, `xyear`, `xper`, `xstatusjv`, `xapprvstatus`, `zemail`, `xemail`, `xbranch`, `xsite`, `xdoctype`, `xdocnum`, `xapprovedby`, `xmanager`, `xrecflag`) VALUES
(38, '2020-01-13 05:14:41', NULL, 100, 'JV--635000001', '2020-01-13', 'Server sale to ABL', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000001', NULL, 'Created', 'Live'),
(41, '2020-01-13 06:33:28', NULL, 100, 'JV--635000002', '2020-01-13', 'Paid to Mr Naim  As promotional activity', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000002', NULL, 'Created', 'Live'),
(50, '2020-01-14 06:15:32', NULL, 100, 'JV--635000003', '2020-01-14', 'Bank To Cash', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000003', NULL, 'Created', 'Live'),
(51, '2020-01-14 06:16:21', NULL, 100, 'JV--635000004', '2020-01-14', 'Bank To Cash', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000004', NULL, 'Created', 'Live'),
(54, '2020-01-16 08:58:14', NULL, 100, 'JV--635000005', '2020-01-16', 'CTO Payment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000005', NULL, 'Created', 'Live'),
(56, '2020-01-18 06:38:35', NULL, 100, 'JV--635000006', '2020-01-18', 'Vendor App Sales to ABL', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000006', NULL, 'Created', 'Live'),
(58, '2020-01-18 06:42:36', NULL, 100, 'JV--635000007', '2020-01-18', 'CTO Payment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000007', NULL, 'Created', 'Live'),
(59, '2020-01-19 09:43:18', NULL, 100, 'JV--635000008', '2020-01-19', 'Trade License renewal for 2020', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000008', NULL, 'Created', 'Live'),
(62, '2020-01-22 07:43:17', NULL, 100, 'JV--635000009', '2020-01-22', 'Paid to mr rupon', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000009', NULL, 'Created', 'Live'),
(65, '2020-01-22 10:26:58', NULL, 100, 'JV--635000010', '2020-01-22', 'CTO to cash', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000010', NULL, 'Created', 'Live'),
(66, '2020-01-22 10:29:08', NULL, 100, 'JV--635000011', '2020-01-22', 'Cash to Dbbl', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000011', NULL, 'Created', 'Live'),
(68, '2020-01-23 13:12:58', NULL, 100, 'JV--635000012', '2020-01-23', 'Server bill received annex', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000012', NULL, 'Created', 'Live'),
(69, '2020-01-23 13:14:05', NULL, 100, 'JV--635000013', '2020-01-23', 'SMS bill receive annex', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000013', NULL, 'Created', 'Live'),
(70, '2020-01-23 13:15:25', NULL, 100, 'JV--635000014', '2020-01-23', 'Buy sms from ayub vai', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000014', NULL, 'Created', 'Live'),
(71, '2020-01-23 13:17:54', NULL, 100, 'JV--635000015', '2020-01-23', 'Server but from qd ,month february', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000015', NULL, 'Created', 'Live'),
(72, '2020-01-26 05:51:22', NULL, 100, 'JV--635000016', '2020-01-26', 'Basis membership renewal', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000016', NULL, 'Created', 'Live'),
(75, '2020-01-27 09:33:42', NULL, 100, 'JV--635000017', '2020-01-27', 'CTO Payment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000017', NULL, 'Created', 'Live'),
(76, '2020-01-27 09:35:11', NULL, 100, 'JV--635000018', '2020-01-27', 'Water filter purchase PURE IT', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000018', NULL, 'Created', 'Live'),
(77, '2020-01-27 09:42:53', NULL, 100, 'JV--635000019', '2020-01-27', 'Bank Charge adjustment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000019', NULL, 'Created', 'Live'),
(78, '2020-01-29 17:13:03', NULL, 100, 'JV--635000020', '2020-01-29', 'Receive from nnsel modification last installment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000020', NULL, 'Created', 'Live'),
(79, '2020-01-29 17:15:50', NULL, 100, 'JV--635000021', '2020-01-29', 'Sales to  ashiq impex ltd', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000021', NULL, 'Created', 'Live'),
(80, '2020-01-29 17:17:45', NULL, 100, 'JV--635000022', '2020-01-30', 'Sales collection from ashiq impex ltd', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000022', NULL, 'Created', 'Live'),
(82, '2020-02-01 13:01:04', NULL, 100, 'JV--635000023', '2020-02-01', 'CTO payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000023', NULL, 'Created', 'Live'),
(83, '2020-02-02 11:22:56', NULL, 100, 'JV--635000024', '2020-02-02', 'Mac book air purchase', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000024', NULL, 'Created', 'Live'),
(84, '2020-02-02 11:24:46', NULL, 100, 'JV--635000025', '2020-02-02', 'Mac book air purchase', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000025', NULL, 'Created', 'Live'),
(85, '2020-02-02 14:38:01', NULL, 100, 'JV--635000026', '2020-02-02', 'CTO PAYMENT', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000026', NULL, 'Created', 'Live'),
(86, '2020-02-05 14:57:31', NULL, 100, 'JV--635000027', '2020-02-05', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000027', NULL, 'Created', 'Live'),
(88, '2020-02-05 15:09:21', NULL, 100, 'JV--635000028', '2020-02-05', 'Office cleaning bill january 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000028', NULL, 'Created', 'Live'),
(89, '2020-02-05 15:13:17', '2020-02-05 15:18:32', 100, 'JV--635000029', '2020-02-05', 'Entertainment bill', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000029', NULL, 'Created', 'Live'),
(90, '2020-02-05 15:14:02', NULL, 100, 'JV--635000030', '2020-02-05', 'Ac bill and setup cost  january 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000030', NULL, 'Created', 'Live'),
(91, '2020-02-06 07:40:02', '2020-02-06 07:48:00', 100, 'JV--635000031', '2020-02-05', 'Amarbazar Ltd Month of February', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000031', NULL, 'Created', 'Live'),
(92, '2020-02-06 07:42:34', NULL, 100, 'JV--635000032', '2020-02-06', 'Office Movement cost', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000032', NULL, 'Created', 'Live'),
(93, '2020-02-06 09:00:48', NULL, 100, 'JV--635000033', '2020-02-06', 'For The month Of January, 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000033', NULL, 'Created', 'Live'),
(94, '2020-02-06 09:02:06', NULL, 100, 'JV--635000034', '2020-02-06', 'For The month Of January, 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000034', NULL, 'Created', 'Live'),
(95, '2020-02-06 09:05:36', NULL, 100, 'JV--635000035', '2020-02-06', 'For Rupon Month January, 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000035', NULL, 'Created', 'Live'),
(96, '2020-02-06 09:07:53', NULL, 100, 'JV--635000036', '2020-02-06', 'For Naim Month January, 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000036', NULL, 'Created', 'Live'),
(98, '2020-02-07 14:29:14', NULL, 100, 'JV--635000037', '2020-02-07', 'CTO PAYMENT', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000037', NULL, 'Created', 'Live'),
(99, '2020-02-09 05:40:47', '2020-02-09 05:55:41', 100, 'JV--635000038', '2020-02-09', 'Salary paid for the month of January 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000038', NULL, 'Created', 'Live'),
(100, '2020-02-09 05:41:32', '2020-02-09 05:56:55', 100, 'JV--635000039', '2020-02-09', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000039', NULL, 'Created', 'Live'),
(101, '2020-02-09 05:51:32', NULL, 100, 'JV--635000040', '2020-02-09', 'Sales Kamirkandi Builders Oct, Nov, Dec 2019, Jan 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000040', NULL, 'Created', 'Live'),
(102, '2020-02-09 05:52:29', NULL, 100, 'JV--635000041', '2020-02-09', 'Collection of Sales Kamirkandi Builders Oct, Nov, Dec 2019, Jan 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000041', NULL, 'Created', 'Live'),
(103, '2020-02-09 05:53:17', NULL, 100, 'JV--635000042', '2020-02-09', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000042', NULL, 'Created', 'Live'),
(104, '2020-02-09 17:11:07', NULL, 100, 'JV--635000043', '2020-02-09', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000043', NULL, 'Created', 'Live'),
(105, '2020-02-20 14:21:09', NULL, 100, 'JV--635000044', '2020-02-16', 'CTO payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000044', NULL, 'Created', 'Live'),
(106, '2020-02-20 14:22:27', NULL, 100, 'JV--635000045', '2020-02-20', 'CTO payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000045', NULL, 'Created', 'Live'),
(108, '2020-02-20 14:29:35', NULL, 100, 'JV--635000046', '2020-02-20', 'Partial due paid to suzom', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000046', NULL, 'Created', 'Live'),
(109, '2020-02-20 14:50:20', NULL, 100, 'JV--635000047', '2020-02-20', 'Revenue from annex month of march', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000047', NULL, 'Created', 'Live'),
(110, '2020-02-21 03:19:23', NULL, 100, 'JV--635000048', '2020-02-21', 'CTO payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000048', NULL, 'Created', 'Live'),
(112, '2020-02-22 04:31:12', '2020-02-22 04:32:06', 100, 'JV--635000049', '2020-02-21', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000049', NULL, 'Created', 'Live'),
(113, '2020-02-24 11:57:05', '2020-03-03 15:11:19', 100, 'JV--635000050', '2020-02-24', 'Annex sms', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000050', NULL, 'Created', 'Live'),
(114, '2020-02-24 11:58:16', NULL, 100, 'JV--635000051', '2020-02-24', 'SMS buy', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000051', NULL, 'Created', 'Live'),
(115, '2020-02-24 11:59:08', NULL, 100, 'JV--635000052', '2020-02-24', 'CTO payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000052', NULL, 'Created', 'Live'),
(116, '2020-02-27 05:27:27', NULL, 100, 'JV--635000053', '2020-02-27', 'Paid to quantic dynamics month february 2020', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000053', NULL, 'Created', 'Live'),
(117, '2020-02-29 16:11:07', NULL, 100, 'JV--635000054', '2020-02-29', 'Wall mount Fan Purchase for office', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000054', NULL, 'Created', 'Live'),
(118, '2020-02-29 16:11:45', NULL, 100, 'JV--635000055', '2020-02-29', 'CTO Payment', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000055', NULL, 'Created', 'Live'),
(119, '2020-03-02 09:43:50', NULL, 100, 'JV--635000056', '2020-03-02', 'Revenew from software Explore Publications', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000056', NULL, 'Created', 'Live'),
(120, '2020-03-02 09:45:38', '2020-03-02 09:46:21', 100, 'JV--635000057', '2020-03-01', 'received Bill of January, 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000057', NULL, 'Created', 'Live'),
(121, '2020-03-02 09:48:14', NULL, 100, 'JV--635000058', '2020-03-02', 'Ac  Bill, February, 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000058', NULL, 'Created', 'Live'),
(122, '2020-03-02 09:48:49', NULL, 100, 'JV--635000059', '2020-03-02', 'Bua  Bill, February, 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000059', NULL, 'Created', 'Live'),
(123, '2020-03-02 09:49:50', NULL, 100, 'JV--635000060', '2020-03-02', 'Internet Bill, March 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000060', NULL, 'Created', 'Live'),
(124, '2020-03-02 09:50:31', NULL, 100, 'JV--635000061', '2020-03-02', 'Office Expenses', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000061', NULL, 'Created', 'Live'),
(125, '2020-03-02 09:52:06', '2020-03-02 09:54:27', 100, 'JV--635000062', '2020-03-01', 'Olympia domain fees year 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000062', NULL, 'Created', 'Live'),
(126, '2020-03-02 09:57:30', '2020-03-02 10:00:01', 100, 'JV--635000063', '2020-03-02', 'Domain Renewal, Olympia, Pairles', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Voucher', 'JV--635000063', NULL, 'Created', 'Live'),
(127, '2020-03-03 15:00:19', NULL, 100, 'JV--635000064', '2020-03-03', 'Collection from annex', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000064', NULL, 'Created', 'Live'),
(128, '2020-03-03 15:01:05', NULL, 100, 'JV--635000065', '2020-03-03', 'Salary paid month February, 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000065', NULL, 'Created', 'Live'),
(129, '2020-03-03 15:01:48', NULL, 100, 'JV--635000066', '2020-03-03', 'Cash To Bank', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000066', NULL, 'Created', 'Live'),
(130, '2020-03-03 15:03:42', NULL, 100, 'JV--635000067', '2020-03-03', 'CTO Payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000067', NULL, 'Created', 'Live'),
(131, '2020-03-03 15:14:23', NULL, 100, 'JV--635000068', '2020-03-03', 'Paid to Rupon month, January 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000068', NULL, 'Created', 'Live'),
(132, '2020-03-05 09:20:25', '2020-03-05 09:20:44', 100, 'JV--635000069', '2020-03-04', 'Collection from Olympia Bakery, January 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000069', NULL, 'Created', 'Live'),
(133, '2020-03-05 09:45:15', NULL, 100, 'JV--635000070', '2020-03-05', 'Bill February, 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000070', NULL, 'Created', 'Live'),
(134, '2020-03-05 09:46:08', NULL, 100, 'JV--635000071', '2020-03-05', 'Bill February 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000071', NULL, 'Created', 'Live'),
(135, '2020-03-05 09:50:55', NULL, 100, 'JV--635000072', '2020-03-05', 'Payble to Naim Vai', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000072', NULL, 'Created', 'Live'),
(136, '2020-03-05 09:51:51', NULL, 100, 'JV--635000073', '2020-03-05', 'Payble to Naim Vai', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000073', NULL, 'Created', 'Live'),
(137, '2020-03-05 09:53:51', '2020-03-05 09:55:06', 100, 'JV--635000074', '2020-03-05', 'Monthly Receivable February 2020', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000074', NULL, 'Created', 'Live'),
(138, '2020-03-05 13:40:31', NULL, 100, 'JV--635000075', '2020-03-05', 'CTO payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000075', NULL, 'Created', 'Live'),
(139, '2020-03-08 15:05:59', NULL, 100, 'JV--635000076', '2020-03-08', 'Office advance', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000076', NULL, 'Created', 'Live'),
(140, '2020-03-09 09:18:17', '2020-03-09 09:18:44', 100, 'JV--635000077', '2020-03-08', 'Office Advance Collection', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Voucher', 'JV--635000077', NULL, 'Created', 'Live'),
(141, '2020-03-09 09:19:54', NULL, 100, 'JV--635000078', '2020-03-09', 'Domain Renewed Dor Kaiwt and Amarbazarltd', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000078', NULL, 'Created', 'Live'),
(142, '2020-03-09 11:56:30', NULL, 100, 'JV--635000079', '2020-03-09', 'CTO Payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000079', NULL, 'Created', 'Live'),
(143, '2020-03-10 12:09:39', NULL, 100, 'JV--635000080', '2020-03-10', 'CTO Payment for zakat porpose', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000080', NULL, 'Created', 'Live'),
(144, '2020-03-12 13:18:39', NULL, 100, 'JV--635000081', '2020-03-12', 'CTO payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000081', NULL, 'Created', 'Live'),
(145, '2020-03-12 13:19:13', NULL, 100, 'JV--635000082', '2020-03-12', 'CTO payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000082', NULL, 'Created', 'Live'),
(146, '2020-03-15 08:22:28', '2020-03-15 08:29:08', 100, 'JV--635000083', '2020-03-14', 'CTO Payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'GL Single Entry', 'JV--635000083', NULL, 'Created', 'Live'),
(147, '2020-03-15 08:27:52', NULL, 100, 'JV--635000084', '2020-03-13', 'CTO Payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000084', NULL, 'Created', 'Live'),
(148, '2020-03-17 07:17:05', NULL, 100, 'JV--635000085', '2020-03-17', 'Received from annex', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000085', NULL, 'Created', 'Live'),
(149, '2020-03-17 14:44:05', NULL, 100, 'JV--635000086', '2020-03-17', 'CTO pay', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000086', NULL, 'Created', 'Live'),
(150, '2020-03-19 03:42:18', NULL, 100, 'JV--635000087', '2020-03-19', 'Cto', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000087', NULL, 'Created', 'Live'),
(151, '2020-03-19 03:44:53', NULL, 100, 'JV--635000088', '2020-03-15', 'From AMAR BAZR', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000088', NULL, 'Created', 'Live'),
(152, '2020-03-19 03:58:32', NULL, 100, 'JV--635000089', '2020-03-16', 'Received from swapnojatra', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000089', NULL, 'Created', 'Live'),
(153, '2020-03-19 03:59:39', NULL, 100, 'JV--635000090', '2020-03-16', 'From swapnojatra', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000090', NULL, 'Created', 'Live'),
(154, '2020-03-23 09:20:26', NULL, 100, 'JV--635000091', '2020-03-23', 'CTO payment', NULL, NULL, NULL, 2019, 9, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'GL Single Entry', 'JV--635000091', NULL, 'Created', 'Live'),
(32, '2020-01-10 17:24:37', NULL, 100, 'OB--000001', '2020-01-10', 'Opening Balance for : 1001-DBBL', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--000001', NULL, 'Created', 'Live'),
(33, '2020-01-10 17:25:31', NULL, 100, 'OB--000002', '2020-01-10', 'Opening Balance for : 1002-BRAC BANK', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--000002', NULL, 'Created', 'Live'),
(34, '2020-01-10 17:26:15', NULL, 100, 'OB--000003', '2020-01-10', 'Opening Balance for : 1009-CASH', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--000003', NULL, 'Created', 'Live'),
(35, '2020-01-12 04:04:00', NULL, 100, 'OB--635000001', '2020-01-12', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000001', NULL, 'Created', 'Live'),
(36, '2020-01-12 04:04:47', NULL, 100, 'OB--635000002', '2020-01-12', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000002', NULL, 'Created', 'Live'),
(37, '2020-01-12 04:05:33', NULL, 100, 'OB--635000003', '2020-01-12', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000003', NULL, 'Created', 'Live'),
(40, '2020-01-13 06:32:05', NULL, 100, 'OB--635000004', '2020-01-13', 'Opening Balance for : 2002-Promotional Payable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000004', NULL, 'Created', 'Live'),
(43, '2020-01-13 06:51:31', NULL, 100, 'OB--635000005', '2020-01-13', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000005', NULL, 'Created', 'Live'),
(44, '2020-01-13 06:52:09', '2020-01-29 17:27:17', 100, 'OB--635000006', '2020-01-13', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'Opening Balance', 'OB--635000006', NULL, 'Created', 'Live'),
(45, '2020-01-13 07:03:32', NULL, 100, 'OB--635000007', '2020-01-13', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000007', NULL, 'Created', 'Live'),
(46, '2020-01-13 07:04:16', NULL, 100, 'OB--635000008', '2020-01-13', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000008', NULL, 'Created', 'Live'),
(47, '2020-01-13 09:30:22', '2020-01-16 08:55:57', 100, 'OB--635000009', '2020-01-13', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'Opening Balance', 'OB--635000009', NULL, 'Created', 'Live'),
(61, '2020-01-22 07:42:19', NULL, 100, 'OB--635000010', '2020-01-22', 'Opening Balance for : 2002-Promotional Payable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000010', NULL, 'Created', 'Live'),
(63, '2020-01-22 07:47:34', NULL, 100, 'OB--635000011', '2020-01-22', 'Opening Balance for : 1010-Trade Receivable', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000011', NULL, 'Created', 'Live'),
(107, '2020-02-20 14:27:44', NULL, 100, 'OB--635000012', '2020-02-20', 'Opening Balance for : 2003-Salary due', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Opening Balance', 'OB--635000012', NULL, 'Created', 'Live'),
(111, '2020-02-21 10:44:28', '2020-02-21 10:47:34', 100, 'OB--635000013', '2020-02-21', 'Opening Balance for : 2003-Salary due due for Kamrul, previous year', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', 'rajib@dbs.com', 'Head Office', '', 'Opening Balance', 'OB--635000013', NULL, 'Created', 'Live'),
(42, '2020-01-13 06:34:19', NULL, 100, 'PAY-635000001', '2020-01-13', 'Travel bill for CTO', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000001', NULL, 'Created', 'Live'),
(49, '2020-01-14 04:51:35', NULL, 100, 'PAY-635000002', '2020-01-14', 'CTO Payment', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000002', NULL, 'Created', 'Live'),
(52, '2020-01-14 06:17:31', NULL, 100, 'PAY-635000003', '2020-01-14', 'December salary paid', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000003', NULL, 'Created', 'Live'),
(55, '2020-01-16 09:07:19', NULL, 100, 'PAY-635000004', '2020-01-16', 'SMS Buy for Annex', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000004', NULL, 'Created', 'Live'),
(60, '2020-01-20 06:41:23', NULL, 100, 'PAY-635000005', '2020-01-20', 'Vendor.com.bd domain purchase', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000005', NULL, 'Created', 'Live'),
(73, '2020-01-26 09:10:06', NULL, 100, 'PAY-635000006', '2020-01-26', 'Internet bill january, 2020', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Payment Voucher', 'PAY-635000006', NULL, 'Created', 'Live'),
(39, '2020-01-13 05:17:20', NULL, 100, 'TRCV635000001', '2020-01-12', 'Received from customer: CUS0000003-Amar Bazar Limited Received server bill for the month of january', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000001', NULL, 'Created', 'Live'),
(48, '2020-01-13 11:10:33', NULL, 100, 'TRCV635000002', '2020-01-13', 'Received from customer: CUS0000010-SWAPNOJATRA INTERNATIONAL LIMITED ', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000002', NULL, 'Created', 'Live'),
(53, '2020-01-16 08:57:15', NULL, 100, 'TRCV635000003', '2020-01-16', 'Received from customer: CUS0000011- NIMTOLA HOUSING LTD. From Nimtoli Housing 2 month charege with development fees. up to December', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000003', NULL, 'Created', 'Live'),
(57, '2020-01-18 06:40:56', NULL, 100, 'TRCV635000004', '2020-01-18', 'Received from customer: CUS0000003-Amar Bazar Limited Cash received from Ashraf vai 16-01-2020', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000004', NULL, 'Created', 'Live'),
(64, '2020-01-22 07:50:05', NULL, 100, 'TRCV635000005', '2020-01-22', 'Received from customer: CUS0000012-Reliance Private Company Ltd. Received partially', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000005', NULL, 'Created', 'Live'),
(67, '2020-01-23 11:42:24', NULL, 100, 'TRCV635000006', '2020-01-23', 'Received from customer: CUS0000002-Annex World Wide Limited Receive from annex', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000006', NULL, 'Created', 'Live'),
(74, '2020-01-27 09:30:01', NULL, 100, 'TRCV635000007', '2020-01-27', 'Received from customer: CUS0000002-Annex World Wide Limited receive from annex', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000007', NULL, 'Created', 'Live'),
(81, '2020-01-29 17:29:19', NULL, 100, 'TRCV635000008', '2020-01-29', 'Received from customer: CUS0000009-Savar Refractories Ltd Collection from savar refactories ltd.', NULL, NULL, NULL, 2019, 7, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000008', NULL, 'Created', 'Live'),
(87, '2020-02-05 15:07:07', NULL, 100, 'TRCV635000009', '2020-02-05', 'Received from customer: CUS0000005-Olympia Bread Limited Olympia bill for the month of December 2019', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000009', NULL, 'Created', 'Live'),
(97, '2020-02-07 14:27:57', NULL, 100, 'TRCV635000010', '2020-02-06', 'Received from customer: CUS0000001-Infinity Marketing Limited Partial collection from infinity', NULL, NULL, NULL, 2019, 8, 'Created', 'Created', 'rajib@dbs.com', NULL, 'Head Office', '', 'Trade Receipt', 'TRCV635000010', NULL, 'Created', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `glinterface`
--

CREATE TABLE `glinterface` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `xtypeinterface` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xformula` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xaction` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gltype`
--

CREATE TABLE `gltype` (
  `xtype` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gltype`
--

INSERT INTO `gltype` (`xtype`) VALUES
('Debit'),
('Credit');

-- --------------------------------------------------------

--
-- Table structure for table `homework_questions`
--

CREATE TABLE `homework_questions` (
  `xquesid` bigint(20) NOT NULL,
  `bizid` int(11) NOT NULL DEFAULT 100,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatch` int(6) NOT NULL,
  `xdescription` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xduedate` date NOT NULL,
  `xmarks` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homework_questions`
--

INSERT INTO `homework_questions` (`xquesid`, `bizid`, `ztime`, `zemail`, `zutime`, `xemail`, `xitemcode`, `xbatch`, `xdescription`, `xdate`, `xduedate`, `xmarks`) VALUES
(7, 100, '2021-09-22 12:26:55', 'rajib@dbs.com', NULL, '', 'ITM000048', 5, 'fhdh rwh\r\n', '2021-09-23', '2021-09-24', 50),
(8, 100, '2021-09-23 10:23:52', 'rajib@dbs.com', NULL, '', 'ITM000048', 4, 'The Mathematics Placement Exam (MPE)&nbsp;is a 90-minute, 60-item multiple choice exam that tests skills and understandings from precalculus mathematics.&nbsp;It is designed to measure readiness for college courses in calculus and precalculus. Online, you may view an individual report that includes placement level and a list of topics that should be reviewed before the class begins.\r\n\r\nThe test scores are entered in the student registration system to allow you to register for a math class throughWebReg. Test results are valid for one calendar year. After waiting at least one month you may repeat the test after studying the topics listed on your placement results. The last placement level will replace previous test results.\r\n\r\nIf your enrollment in a math course hinges on your test score, take the test as early as possible. This allows you time to review the suggested topics and even retake the test after studying, if you wish.\r\n', '2021-09-23', '2021-09-26', 80);

-- --------------------------------------------------------

--
-- Table structure for table `homework_submit`
--

CREATE TABLE `homework_submit` (
  `xsl` bigint(20) NOT NULL,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xquesid` bigint(20) NOT NULL,
  `xdate` date DEFAULT NULL,
  `xstudent` int(11) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatch` int(6) NOT NULL,
  `xdescription` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `xmarks` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `homework_submit`
--

INSERT INTO `homework_submit` (`xsl`, `bizid`, `ztime`, `zemail`, `zutime`, `xemail`, `xquesid`, `xdate`, `xstudent`, `xitemcode`, `xbatch`, `xdescription`, `xmarks`) VALUES
(3, 101, '2021-09-27 12:00:48', 'rajib@dbs.com', NULL, NULL, 7, '2021-09-27', 46, 'ITM000048', 5, 'ljnoin', 0),
(1, 101, '2021-09-27 12:00:16', 'rajib@dbs.com', '2021-10-06 13:43:18', '102', 8, '2021-09-27', 48, 'ITM000048', 4, 'fdbd', 46);

-- --------------------------------------------------------

--
-- Table structure for table `imchkq`
--

CREATE TABLE `imchkq` (
  `imchkqsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchkqnum` varchar(20) NOT NULL,
  `ximchksenum` varchar(20) DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) DEFAULT NULL,
  `xnote` varchar(500) DEFAULT NULL,
  `xdocnum` varchar(100) DEFAULT NULL,
  `xstr` varchar(100) DEFAULT NULL,
  `xflagimchkq` varchar(10) NOT NULL DEFAULT 'Created',
  `xrecflag` varchar(10) NOT NULL DEFAULT 'Live',
  `xbranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imchkq`
--

INSERT INTO `imchkq` (`imchkqsl`, `ztime`, `zutime`, `bizid`, `zemail`, `xemail`, `ximchkqnum`, `ximchksenum`, `xdate`, `xsup`, `xnote`, `xdocnum`, `xstr`, `xflagimchkq`, `xrecflag`, `xbranch`) VALUES
(1, '2016-11-07 04:49:46', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000001', NULL, '2016-11-07', 'SUP0000005', '', '35253', NULL, 'Created', 'Live', NULL),
(2, '2016-11-07 04:53:54', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000002', NULL, '2016-11-07', 'SUP0000004', '', '11111', NULL, 'Created', 'Live', NULL),
(3, '2016-11-07 05:03:10', NULL, 100, 'rajib@pureapp.com', NULL, 'QCHK000003', NULL, '2016-11-07', 'SUP0000002', '', '99999', NULL, 'Created', 'Live', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imchkqdt`
--

CREATE TABLE `imchkqdt` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchkqnum` varchar(20) NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) NOT NULL,
  `xqtychecked` double(18,6) NOT NULL,
  `xqtypassed` double(18,6) NOT NULL,
  `xunit` varchar(50) DEFAULT NULL,
  `xnote` varchar(160) DEFAULT NULL,
  `xstr1` int(11) DEFAULT NULL,
  `xstr2` int(11) DEFAULT NULL,
  `xstr3` int(11) DEFAULT NULL,
  `xnum1` int(11) DEFAULT NULL,
  `xnum2` int(11) DEFAULT NULL,
  `xnum3` int(11) DEFAULT NULL,
  `xdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imchkqdt`
--

INSERT INTO `imchkqdt` (`ztime`, `zutime`, `bizid`, `zemail`, `xemail`, `ximchkqnum`, `xrow`, `xitemcode`, `xqtychecked`, `xqtypassed`, `xunit`, `xnote`, `xstr1`, `xstr2`, `xstr3`, `xnum1`, `xnum2`, `xnum3`, `xdate`) VALUES
('2016-11-07 05:02:27', NULL, 100, '', NULL, 'QCHK000001', 1, '1006', 11.000000, 11.000000, 'KG', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('2016-11-07 05:03:29', NULL, 100, '', NULL, 'QCHK000003', 1, '1007', 70.000000, 70.000000, 'DOZEN', 'passed', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imchkse`
--

CREATE TABLE `imchkse` (
  `imchksl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchksenum` varchar(20) NOT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) DEFAULT NULL,
  `xnote` varchar(500) DEFAULT NULL,
  `xdocnum` varchar(100) DEFAULT NULL,
  `xstr` varchar(100) DEFAULT NULL,
  `xflagimchk` varchar(10) NOT NULL DEFAULT 'Created',
  `xrecflag` varchar(10) NOT NULL DEFAULT 'Live',
  `xbranch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imchksedt`
--

CREATE TABLE `imchksedt` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(100) NOT NULL,
  `xemail` varchar(100) DEFAULT NULL,
  `ximchksenum` varchar(20) NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) NOT NULL,
  `xqtychecked` double(18,6) NOT NULL,
  `xqtypassed` double(18,6) NOT NULL,
  `xunit` varchar(50) DEFAULT NULL,
  `xnote` varchar(160) DEFAULT NULL,
  `xstr1` int(11) DEFAULT NULL,
  `xstr2` int(11) DEFAULT NULL,
  `xstr3` int(11) DEFAULT NULL,
  `xnum1` int(11) DEFAULT NULL,
  `xnum2` int(11) DEFAULT NULL,
  `xnum3` int(11) DEFAULT NULL,
  `xdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imdoreturn`
--

CREATE TABLE `imdoreturn` (
  `xreturnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoreturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xdodate` date NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imdoreturndet`
--

CREATE TABLE `imdoreturndet` (
  `xreturndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoreturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xrowtrn` int(11) NOT NULL DEFAULT 0,
  `xrow` int(5) NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT 0,
  `xrate` double NOT NULL DEFAULT 0,
  `xratepur` double NOT NULL DEFAULT 0,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreq`
--

CREATE TABLE `imreq` (
  `imreqsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `ximreqnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreqdeldet`
--

CREATE TABLE `imreqdeldet` (
  `xreqdeldetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrowtrn` int(11) NOT NULL DEFAULT 0,
  `xrow` int(5) NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT 0,
  `xrate` double NOT NULL DEFAULT 0,
  `xratepur` double NOT NULL DEFAULT 0,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreqdelmst`
--

CREATE TABLE `imreqdelmst` (
  `ximdelsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xreqdelnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsalesdate` date NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgrossdisc` double NOT NULL DEFAULT 0,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imreqdet`
--

CREATE TABLE `imreqdet` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `ximreqnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xqty` double NOT NULL,
  `xrate` double NOT NULL DEFAULT 0,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xdate` date NOT NULL,
  `stno` int(8) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imsetxn`
--

CREATE TABLE `imsetxn` (
  `xprefix` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ximsesl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `stno` int(8) NOT NULL,
  `ximsenum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(11) NOT NULL,
  `xdocnum` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrdin` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xitemcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcat` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbrand` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcolor` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsize` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbarcode` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsl` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupdt` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusdt` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xtorwh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xtorbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xterminal` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xstdprice` double NOT NULL DEFAULT 0,
  `xqty` double NOT NULL DEFAULT 0,
  `xupdcost` double NOT NULL DEFAULT 0,
  `xupdprice` double NOT NULL DEFAULT 0,
  `xupdqty` double NOT NULL DEFAULT 0,
  `xupdsalesprice` double NOT NULL DEFAULT 0,
  `xupdstdcost` double NOT NULL DEFAULT 0,
  `xupdstdprice` double NOT NULL DEFAULT 0,
  `xsalesprice` double NOT NULL DEFAULT 0,
  `xuom` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdisc` double NOT NULL DEFAULT 0,
  `xvatpct` double NOT NULL DEFAULT 0,
  `xvatamt` double NOT NULL DEFAULT 0,
  `xtxntype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdocument` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdocumentrow` int(5) NOT NULL DEFAULT 0,
  `xcashamt` double NOT NULL DEFAULT 0,
  `xcardamt` double NOT NULL DEFAULT 0,
  `xbank` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xreturnamt` double NOT NULL DEFAULT 0,
  `xreturnimsenum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xstatus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL,
  `xdate` date NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xspotcom` double NOT NULL DEFAULT 0,
  `xpoint` double NOT NULL DEFAULT 0,
  `xsrctaxpct` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imtransfer`
--

CREATE TABLE `imtransfer` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `ximptnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xtxnwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xstatusrcv` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Open',
  `xnote` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xdoctype` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Inventory Transfer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imtransferdet`
--

CREATE TABLE `imtransferdet` (
  `xtransl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `ximptnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xqty` double NOT NULL,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstdcost` double NOT NULL,
  `xdate` date NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xtxnwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xdoctype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `xlesson` int(11) NOT NULL,
  `bizid` int(6) NOT NULL,
  `xitemcode` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`xlesson`, `bizid`, `xitemcode`, `xdesc`, `ztime`) VALUES
(1, 101, 'ITM000045', 'Introducing with Digital Marketing', '2021-08-29 05:49:50'),
(2, 101, 'ITM000045', 'Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 05:49:50'),
(3, 101, 'ITM000045', 'Canva Design All Details', '2021-08-29 05:49:50'),
(4, 101, 'ITM000045', ' Advance Facebook Marketing', '2021-08-29 05:49:50'),
(5, 101, 'ITM000045', ' Advance Facebook Marketing', '2021-08-29 05:49:50'),
(6, 101, 'ITM000045', ' Advance Instagram Organic and Paid Marketing', '2021-08-29 05:49:50'),
(7, 101, 'ITM000045', ' LinkedIn Marketing, Snapchat and Quora', '2021-08-29 05:49:50'),
(8, 101, 'ITM000045', 'Fiverr Market Place (Part 01)', '2021-08-29 05:49:50'),
(9, 101, 'ITM000045', ' Fiverr Market Place (Part 02)', '2021-08-29 05:49:50'),
(10, 101, 'ITM000045', 'Twitter Marketing', '2021-08-29 05:49:50'),
(11, 101, 'ITM000045', 'Pinterest Introduction', '2021-08-29 05:49:50'),
(12, 101, 'ITM000045', ' Pinterest Campaign & Scheduling', '2021-08-29 05:49:50'),
(13, 101, 'ITM000045', ' Keyword Research and Analysis', '2021-08-29 05:49:50'),
(14, 101, 'ITM000045', ' Search Engine Optimization (SEO)', '2021-08-29 05:49:50'),
(15, 101, 'ITM000045', ' Off Page SEO Optimization', '2021-08-29 05:49:50'),
(16, 101, 'ITM000045', ' YouTube Marketing (Channel Optimization)', '2021-08-29 05:49:51'),
(17, 101, 'ITM000045', ' YouTube Marketing (Video Optimization)', '2021-08-29 05:49:51'),
(18, 101, 'ITM000045', ' UpWork & Other?s Market Place Overall in details', '2021-08-29 05:49:51'),
(78, 101, 'ITM000046', 'Session of CONFIDENCE', '2021-08-29 06:13:01'),
(79, 101, 'ITM000046', 'Session of ORNAMENTS', '2021-08-29 06:13:01'),
(80, 101, 'ITM000046', ' Session of QUESTIONING', '2021-08-29 06:13:01'),
(81, 101, 'ITM000046', 'Session of QUESTIONING', '2021-08-29 06:13:01'),
(82, 101, 'ITM000046', 'Session of SOLVE class Mini test', '2021-08-29 06:13:01'),
(83, 101, 'ITM000046', 'Word choice Expressions of REQUEST', '2021-08-29 06:13:01'),
(84, 101, 'ITM000046', 'Session of FORMAL SPEECHES \'s/es\' solution', '2021-08-29 06:13:01'),
(85, 101, 'ITM000046', 'Session of PASSIVE Sentences', '2021-08-29 06:13:01'),
(86, 101, 'ITM000046', 'Session of LISTENING comprehension Listening tips', '2021-08-29 06:13:02'),
(87, 101, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 06:13:02'),
(88, 101, 'ITM000046', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 06:13:02'),
(89, 101, 'ITM000046', 'Session of TECHNOLOGIES hardly/ whether have to/ and', '2021-08-29 06:13:02'),
(90, 101, 'ITM000046', 'Session of and unreal sentences', '2021-08-29 06:13:02'),
(91, 101, 'ITM000046', 'Session of Causative Verbs', '2021-08-29 06:13:02'),
(92, 101, 'ITM000046', ' Use of \'AS\' group', '2021-08-29 06:13:02'),
(93, 101, 'ITM000046', 'Use of NEED Group and Used to', '2021-08-29 06:13:02'),
(94, 101, 'ITM000046', 'Use of It�s time can�t HELP/ almost', '2021-08-29 06:13:02'),
(95, 101, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 06:13:02'),
(96, 101, 'ITM000046', ' Usage of \'SEE\' Group and  \'�ever\' group', '2021-08-29 06:13:02'),
(97, 101, 'ITM000046', 'Usage of Though instead of/ still/ yet became of', '2021-08-29 06:13:02'),
(98, 101, 'ITM000046', 'Usage of Questioning', '2021-08-29 06:13:02'),
(99, 101, 'ITM000046', 'Use of want too�to might as well', '2021-08-29 06:13:02'),
(100, 101, 'ITM000046', 'Session of Presentation/ Formal Speech', '2021-08-29 06:13:02'),
(101, 101, 'ITM000046', 'Watching speech of OBAMA and Do it yourself', '2021-08-29 06:13:02'),
(102, 101, 'ITM000046', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 06:13:02'),
(103, 101, 'ITM000043', ' 1: Orientation- Career Support for your life that below, Discuss About Software / Applications', '2021-08-29 06:16:02'),
(104, 101, 'ITM000043', ' 2: Introducing with Photoshop, Document Setup & Related tools ', '2021-08-29 06:16:03'),
(105, 101, 'ITM000043', ' 3: Selection Details, Image Resize', '2021-08-29 06:16:03'),
(106, 101, 'ITM000043', ' 4: Brush Tools', '2021-08-29 06:16:03'),
(107, 101, 'ITM000043', ' 5:  Retouch Image', '2021-08-29 06:16:03'),
(108, 101, 'ITM000043', ' 6: Pen Tool, Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 06:16:03'),
(109, 101, 'ITM000043', ' 7: History Brush Tool, Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 06:16:03'),
(110, 101, 'ITM000043', ' 8: Type Tools, Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 06:16:03'),
(111, 101, 'ITM000043', ' 9: Layer Palate, Layer Lock- Project- Image Manipulation', '2021-08-29 06:16:03'),
(112, 101, 'ITM000043', ' 10: Layer Palate, Blend Option with Related Tools- ', '2021-08-29 06:16:03'),
(113, 101, 'ITM000043', 'Project- Login Page and Icon Design', '2021-08-29 06:16:03'),
(114, 101, 'ITM000043', ' 11: Chanel, Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 06:16:03'),
(115, 101, 'ITM000043', ' 12: Animation, Save for Web- Project- Animated Web Ad', '2021-08-29 06:16:03'),
(116, 101, 'ITM000043', ' 13: Image Manu, Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 06:16:03'),
(117, 101, 'ITM000043', ' 14: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 06:16:03'),
(118, 101, 'ITM000043', ' 15: About Basic Color Theory, What?s the meaning of colors? & How to matching color in design', '2021-08-29 06:16:04'),
(119, 101, 'ITM000043', ' 16: Discuss About Adobe XD, How to Use adobe xd?', '2021-08-29 06:16:04'),
(120, 101, 'ITM000043', ' 17: About Basic Typography, What?s the difference between, typeface & font? & What?s the difference between serif &', '2021-08-29 06:16:04'),
(121, 101, 'ITM000043', ' 18: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 06:16:04'),
(122, 101, 'ITM000043', ' 20: Discuss About Adobe Illustrator, What?s different between Photoshop & illustrator?', '2021-08-29 06:16:04'),
(123, 101, 'ITM000043', ' 21: Part One: Logo Design & Business Card, Part Two: Banner Design & Resume Design', '2021-08-29 06:16:04'),
(124, 101, 'ITM000043', ' 23: Discuss About Marketplace', '2021-08-29 06:16:04'),
(125, 101, 'ITM000043', ' 24: How to submit your projects.', '2021-08-29 06:16:04'),
(129, 101, 'ITM000044', '01:  Introduction & Smart Phone management', '2021-08-29 06:20:38'),
(130, 101, 'ITM000044', '02: Basic uses of Computers  & MS Office Introduction & Usage', '2021-08-29 06:20:38'),
(131, 101, 'ITM000044', '03: Typing practice with Typing Master with Tools usage', '2021-08-29 06:20:38'),
(132, 101, 'ITM000044', '04: Create Table & Design Table & Related Tools', '2021-08-29 06:20:38'),
(133, 101, 'ITM000044', '05: Page Margins & Orientation & Page Size& Columns & Break with Related Tools ', '2021-08-29 06:20:38'),
(134, 101, 'ITM000044', '06: Bengali Typing & Related Tools', '2021-08-29 06:20:38'),
(135, 101, 'ITM000044', ' 07:Making modern Resume using MS word Step by step', '2021-08-29 06:20:38'),
(136, 101, 'ITM000044', '08: Practical Exam in Lab', '2021-08-29 06:20:38'),
(137, 101, 'ITM000044', '09: Ms Excel introduction & Usage', '2021-08-29 06:20:38'),
(138, 101, 'ITM000044', '10: Salary Sheet Result Sheet & Excel Exam', '2021-08-29 06:20:38'),
(139, 101, 'ITM000044', '11: MS PowerPoint introduction & Usage', '2021-08-29 06:20:38'),
(140, 101, 'ITM000044', '12:  Create Presentation with animation', '2021-08-29 06:20:38'),
(141, 101, 'ITM000044', '13: Presentation Day', '2021-08-29 06:20:38'),
(142, 101, 'ITM000044', '14: Photography Basic', '2021-08-29 06:20:38'),
(143, 101, 'ITM000044', '15: Photoshop introduction', '2021-08-29 06:20:39'),
(144, 101, 'ITM000044', '16: Photo Contest on best capture& edit and presentation', '2021-08-29 06:20:39'),
(145, 101, 'ITM000044', '17: Problem-analysis and progress measurement 18: Basic Internet information- Social Media and website', '2021-08-29 06:20:39'),
(146, 101, 'ITM000044', '19: Final Exam for certification', '2021-08-29 06:20:39'),
(147, 101, 'ITM000044', '20: Get-together and Cyber security and awareness', '2021-08-29 06:20:39'),
(198, 101, 'ITM000047', 'Session of CONFIDENCE', '2021-08-29 06:34:23'),
(199, 101, 'ITM000047', 'Session of ORNAMENTS', '2021-08-29 06:34:23'),
(200, 101, 'ITM000047', ' Session of QUESTIONING', '2021-08-29 06:34:23'),
(201, 101, 'ITM000047', 'Session of QUESTIONING', '2021-08-29 06:34:23'),
(202, 101, 'ITM000047', 'Session of SOLVE class Mini test', '2021-08-29 06:34:24'),
(203, 101, 'ITM000047', 'Word choice Expressions of REQUEST', '2021-08-29 06:34:24'),
(204, 101, 'ITM000047', 'Session of FORMAL SPEECHES `s/es solution', '2021-08-29 06:34:24'),
(205, 101, 'ITM000047', 'Session of PASSIVE Sentences', '2021-08-29 06:34:24'),
(206, 101, 'ITM000047', 'Session of LISTENING comprehension Listening tips', '2021-08-29 06:34:24'),
(207, 101, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 06:34:24'),
(208, 101, 'ITM000047', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 06:34:24'),
(209, 101, 'ITM000047', 'Session of TECHNOLOGIES hardly& whether have to& and', '2021-08-29 06:34:24'),
(210, 101, 'ITM000047', 'Session of and unreal sentences', '2021-08-29 06:34:24'),
(211, 101, 'ITM000047', 'Session of Causative Verbs', '2021-08-29 06:34:24'),
(212, 101, 'ITM000047', ' Use of ``AS` group', '2021-08-29 06:34:24'),
(213, 101, 'ITM000047', 'Use of NEED Group and Used to', '2021-08-29 06:34:24'),
(214, 101, 'ITM000047', 'Use of It`s time can`t HELP& almost', '2021-08-29 06:34:24'),
(215, 101, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 06:34:24'),
(216, 101, 'ITM000047', ' Usage of `SEE` Group and  ``ever` group', '2021-08-29 06:34:24'),
(217, 101, 'ITM000047', 'Usage of Though instead of& still& yet became of', '2021-08-29 06:34:24'),
(218, 101, 'ITM000047', 'Usage of Questioning', '2021-08-29 06:34:24'),
(219, 101, 'ITM000047', 'Use of want too`to might as well', '2021-08-29 06:34:24'),
(220, 101, 'ITM000047', 'Session of Presentation/ Formal Speech', '2021-08-29 06:34:24'),
(221, 101, 'ITM000047', 'Watching speech of OBAMA and Do it yourself.', '2021-08-29 06:34:24'),
(222, 101, 'ITM000047', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 06:34:24'),
(223, 101, 'ITM000048', '01: Introducing with Digital Marketing', '2021-08-29 06:40:17'),
(224, 101, 'ITM000048', '02: Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 06:40:17'),
(225, 101, 'ITM000048', '03: Canva Design All Details', '2021-08-29 06:40:17'),
(226, 101, 'ITM000048', '04: Advance Facebook Marketing', '2021-08-29 06:40:17'),
(227, 101, 'ITM000048', '05: Advance Facebook Marketing', '2021-08-29 06:40:18'),
(228, 101, 'ITM000048', '06: Advance Instagram Organic and Paid Marketing', '2021-08-29 06:40:18'),
(229, 101, 'ITM000048', '07: LinkedIn Marketing & Snapchat and Quora', '2021-08-29 06:40:18'),
(230, 101, 'ITM000048', '08: Fiverr Market Place (Part 01)', '2021-08-29 06:40:18'),
(231, 101, 'ITM000048', '09: Fiverr Market Place (Part 02)', '2021-08-29 06:40:18'),
(232, 101, 'ITM000048', '10: Twitter Marketing', '2021-08-29 06:40:18'),
(233, 101, 'ITM000048', '11: Pinterest Introduction', '2021-08-29 06:40:18'),
(234, 101, 'ITM000048', '12: Pinterest Campaign & Scheduling', '2021-08-29 06:40:18'),
(235, 101, 'ITM000048', '13: Keyword Research and Analysis', '2021-08-29 06:40:18'),
(236, 101, 'ITM000048', '14: Search Engine Optimization (SEO)', '2021-08-29 06:40:18'),
(237, 101, 'ITM000048', '15: Off Page SEO Optimization', '2021-08-29 06:40:18'),
(238, 101, 'ITM000048', '16: YouTube Marketing (Channel Optimization)', '2021-08-29 06:40:18'),
(239, 101, 'ITM000048', '17: YouTube Marketing (Video Optimization)', '2021-08-29 06:40:18'),
(240, 101, 'ITM000048', '18: UpWork & Other�s Market Place Overall in details', '2021-08-29 06:40:18'),
(261, 101, 'ITM000051', ' 1: Orientation- Career Support for your life that below& Discuss About Software / Applications', '2021-08-29 06:49:18'),
(262, 101, 'ITM000051', ' 2: Introducing with Photoshop& Document Setup & Related tools ', '2021-08-29 06:49:18'),
(263, 101, 'ITM000051', ' 3: Selection Details& Image Resize', '2021-08-29 06:49:18'),
(264, 101, 'ITM000051', ' 4: Brush Tools', '2021-08-29 06:49:18'),
(265, 101, 'ITM000051', ' 5:  Retouch Image', '2021-08-29 06:49:18'),
(266, 101, 'ITM000051', ' 6: Pen Tool& Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 06:49:18'),
(267, 101, 'ITM000051', ' 7: History Brush Tool& Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 06:49:18'),
(268, 101, 'ITM000051', ' 8: Type Tools& Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 06:49:18'),
(269, 101, 'ITM000051', ' 9: Layer Palate& Layer Lock- Project- Image Manipulation', '2021-08-29 06:49:18'),
(270, 101, 'ITM000051', ' 10: Layer Palate& Blend Option with Related Tools- ', '2021-08-29 06:49:18'),
(271, 101, 'ITM000051', ' 11:Project- Login Page and Icon Design', '2021-08-29 06:49:18'),
(272, 101, 'ITM000051', ' 12: Chanel& Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 06:49:18'),
(273, 101, 'ITM000051', ' 13: Animation& Save for Web- Project- Animated Web Ad', '2021-08-29 06:49:19'),
(274, 101, 'ITM000051', ' 14: Image Manu& Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 06:49:19'),
(275, 101, 'ITM000051', ' 15: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 06:49:19'),
(276, 101, 'ITM000051', ' 16: About Basic Color Theory& What�s the meaning of colors? & How to matching color in design', '2021-08-29 06:49:19'),
(277, 101, 'ITM000051', ' 17: Discuss About Adobe XD& How to Use adobe xd?', '2021-08-29 06:49:19'),
(278, 101, 'ITM000051', ' 18: About Basic Typography& What�s the difference between& typeface & font? & What�s the difference between serif &', '2021-08-29 06:49:19'),
(279, 101, 'ITM000051', ' 19: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 06:49:19'),
(280, 101, 'ITM000051', ' 20: Discuss About Adobe Illustrator& What�s different between Photoshop & illustrator?', '2021-08-29 06:49:19'),
(281, 101, 'ITM000051', ' 21: Part One: Logo Design & Business Card& Part Two: Banner Design & Resume Design', '2021-08-29 06:49:19'),
(282, 101, 'ITM000051', ' 23: Discuss About Marketplace', '2021-08-29 06:49:19'),
(283, 101, 'ITM000051', ' 24: How to submit your projects.', '2021-08-29 06:49:19'),
(284, 102, 'ITM000045', 'Introducing with Digital Marketing', '2021-08-28 23:49:50'),
(285, 102, 'ITM000045', 'Digital and E-commerce Marketing with Necessary Tools', '2021-08-28 23:49:50'),
(286, 102, 'ITM000045', 'Canva Design All Details', '2021-08-28 23:49:50'),
(287, 102, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(288, 102, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(289, 102, 'ITM000045', ' Advance Instagram Organic and Paid Marketing', '2021-08-28 23:49:50'),
(290, 102, 'ITM000045', ' LinkedIn Marketing, Snapchat and Quora', '2021-08-28 23:49:50'),
(291, 102, 'ITM000045', 'Fiverr Market Place (Part 01)', '2021-08-28 23:49:50'),
(292, 102, 'ITM000045', ' Fiverr Market Place (Part 02)', '2021-08-28 23:49:50'),
(293, 102, 'ITM000045', 'Twitter Marketing', '2021-08-28 23:49:50'),
(294, 102, 'ITM000045', 'Pinterest Introduction', '2021-08-28 23:49:50'),
(295, 102, 'ITM000045', ' Pinterest Campaign & Scheduling', '2021-08-28 23:49:50'),
(296, 102, 'ITM000045', ' Keyword Research and Analysis', '2021-08-28 23:49:50'),
(297, 102, 'ITM000045', ' Search Engine Optimization (SEO)', '2021-08-28 23:49:50'),
(298, 102, 'ITM000045', ' Off Page SEO Optimization', '2021-08-28 23:49:50'),
(299, 102, 'ITM000045', ' YouTube Marketing (Channel Optimization)', '2021-08-28 23:49:51'),
(300, 102, 'ITM000045', ' YouTube Marketing (Video Optimization)', '2021-08-28 23:49:51'),
(301, 102, 'ITM000045', ' UpWork & Other?s Market Place Overall in details', '2021-08-28 23:49:51'),
(302, 102, 'ITM000046', 'Session of CONFIDENCE', '2021-08-29 00:13:01'),
(303, 102, 'ITM000046', 'Session of ORNAMENTS', '2021-08-29 00:13:01'),
(304, 102, 'ITM000046', ' Session of QUESTIONING', '2021-08-29 00:13:01'),
(305, 102, 'ITM000046', 'Session of QUESTIONING', '2021-08-29 00:13:01'),
(306, 102, 'ITM000046', 'Session of SOLVE class Mini test', '2021-08-29 00:13:01'),
(307, 102, 'ITM000046', 'Word choice Expressions of REQUEST', '2021-08-29 00:13:01'),
(308, 102, 'ITM000046', 'Session of FORMAL SPEECHES \'s/es\' solution', '2021-08-29 00:13:01'),
(309, 102, 'ITM000046', 'Session of PASSIVE Sentences', '2021-08-29 00:13:01'),
(310, 102, 'ITM000046', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:13:02'),
(311, 102, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(312, 102, 'ITM000046', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:13:02'),
(313, 102, 'ITM000046', 'Session of TECHNOLOGIES hardly/ whether have to/ and', '2021-08-29 00:13:02'),
(314, 102, 'ITM000046', 'Session of and unreal sentences', '2021-08-29 00:13:02'),
(315, 102, 'ITM000046', 'Session of Causative Verbs', '2021-08-29 00:13:02'),
(316, 102, 'ITM000046', ' Use of \'AS\' group', '2021-08-29 00:13:02'),
(317, 102, 'ITM000046', 'Use of NEED Group and Used to', '2021-08-29 00:13:02'),
(318, 102, 'ITM000046', 'Use of It�s time can�t HELP/ almost', '2021-08-29 00:13:02'),
(319, 102, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(320, 102, 'ITM000046', ' Usage of \'SEE\' Group and  \'�ever\' group', '2021-08-29 00:13:02'),
(321, 102, 'ITM000046', 'Usage of Though instead of/ still/ yet became of', '2021-08-29 00:13:02'),
(322, 102, 'ITM000046', 'Usage of Questioning', '2021-08-29 00:13:02'),
(323, 102, 'ITM000046', 'Use of want too�to might as well', '2021-08-29 00:13:02'),
(324, 102, 'ITM000046', 'Session of Presentation/ Formal Speech', '2021-08-29 00:13:02'),
(325, 102, 'ITM000046', 'Watching speech of OBAMA and Do it yourself', '2021-08-29 00:13:02'),
(326, 102, 'ITM000046', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:13:02'),
(327, 102, 'ITM000043', ' 1: Orientation- Career Support for your life that below, Discuss About Software / Applications', '2021-08-29 00:16:02'),
(328, 102, 'ITM000043', ' 2: Introducing with Photoshop, Document Setup & Related tools ', '2021-08-29 00:16:03'),
(329, 102, 'ITM000043', ' 3: Selection Details, Image Resize', '2021-08-29 00:16:03'),
(330, 102, 'ITM000043', ' 4: Brush Tools', '2021-08-29 00:16:03'),
(331, 102, 'ITM000043', ' 5:  Retouch Image', '2021-08-29 00:16:03'),
(332, 102, 'ITM000043', ' 6: Pen Tool, Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:16:03'),
(333, 102, 'ITM000043', ' 7: History Brush Tool, Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:16:03'),
(334, 102, 'ITM000043', ' 8: Type Tools, Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:16:03'),
(335, 102, 'ITM000043', ' 9: Layer Palate, Layer Lock- Project- Image Manipulation', '2021-08-29 00:16:03'),
(336, 102, 'ITM000043', ' 10: Layer Palate, Blend Option with Related Tools- ', '2021-08-29 00:16:03'),
(337, 102, 'ITM000043', 'Project- Login Page and Icon Design', '2021-08-29 00:16:03'),
(338, 102, 'ITM000043', ' 11: Chanel, Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:16:03'),
(339, 102, 'ITM000043', ' 12: Animation, Save for Web- Project- Animated Web Ad', '2021-08-29 00:16:03'),
(340, 102, 'ITM000043', ' 13: Image Manu, Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:16:03'),
(341, 102, 'ITM000043', ' 14: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:16:03'),
(342, 102, 'ITM000043', ' 15: About Basic Color Theory, What?s the meaning of colors? & How to matching color in design', '2021-08-29 00:16:04'),
(343, 102, 'ITM000043', ' 16: Discuss About Adobe XD, How to Use adobe xd?', '2021-08-29 00:16:04'),
(344, 102, 'ITM000043', ' 17: About Basic Typography, What?s the difference between, typeface & font? & What?s the difference between serif &', '2021-08-29 00:16:04'),
(345, 102, 'ITM000043', ' 18: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:16:04'),
(346, 102, 'ITM000043', ' 20: Discuss About Adobe Illustrator, What?s different between Photoshop & illustrator?', '2021-08-29 00:16:04'),
(347, 102, 'ITM000043', ' 21: Part One: Logo Design & Business Card, Part Two: Banner Design & Resume Design', '2021-08-29 00:16:04'),
(348, 102, 'ITM000043', ' 23: Discuss About Marketplace', '2021-08-29 00:16:04'),
(349, 102, 'ITM000043', ' 24: How to submit your projects.', '2021-08-29 00:16:04'),
(350, 102, 'ITM000044', '01:  Introduction & Smart Phone management', '2021-08-29 00:20:38'),
(351, 102, 'ITM000044', '02: Basic uses of Computers  & MS Office Introduction & Usage', '2021-08-29 00:20:38'),
(352, 102, 'ITM000044', '03: Typing practice with Typing Master with Tools usage', '2021-08-29 00:20:38'),
(353, 102, 'ITM000044', '04: Create Table & Design Table & Related Tools', '2021-08-29 00:20:38'),
(354, 102, 'ITM000044', '05: Page Margins & Orientation & Page Size& Columns & Break with Related Tools ', '2021-08-29 00:20:38'),
(355, 102, 'ITM000044', '06: Bengali Typing & Related Tools', '2021-08-29 00:20:38'),
(356, 102, 'ITM000044', ' 07:Making modern Resume using MS word Step by step', '2021-08-29 00:20:38'),
(357, 102, 'ITM000044', '08: Practical Exam in Lab', '2021-08-29 00:20:38'),
(358, 102, 'ITM000044', '09: Ms Excel introduction & Usage', '2021-08-29 00:20:38'),
(359, 102, 'ITM000044', '10: Salary Sheet Result Sheet & Excel Exam', '2021-08-29 00:20:38'),
(360, 102, 'ITM000044', '11: MS PowerPoint introduction & Usage', '2021-08-29 00:20:38'),
(361, 102, 'ITM000044', '12:  Create Presentation with animation', '2021-08-29 00:20:38'),
(362, 102, 'ITM000044', '13: Presentation Day', '2021-08-29 00:20:38'),
(363, 102, 'ITM000044', '14: Photography Basic', '2021-08-29 00:20:38'),
(364, 102, 'ITM000044', '15: Photoshop introduction', '2021-08-29 00:20:39'),
(365, 102, 'ITM000044', '16: Photo Contest on best capture& edit and presentation', '2021-08-29 00:20:39'),
(366, 102, 'ITM000044', '17: Problem-analysis and progress measurement 18: Basic Internet information- Social Media and website', '2021-08-29 00:20:39'),
(367, 102, 'ITM000044', '19: Final Exam for certification', '2021-08-29 00:20:39'),
(368, 102, 'ITM000044', '20: Get-together and Cyber security and awareness', '2021-08-29 00:20:39'),
(369, 102, 'ITM000047', 'Session of CONFIDENCE', '2021-08-29 00:34:23'),
(370, 102, 'ITM000047', 'Session of ORNAMENTS', '2021-08-29 00:34:23'),
(371, 102, 'ITM000047', ' Session of QUESTIONING', '2021-08-29 00:34:23'),
(372, 102, 'ITM000047', 'Session of QUESTIONING', '2021-08-29 00:34:23'),
(373, 102, 'ITM000047', 'Session of SOLVE class Mini test', '2021-08-29 00:34:24'),
(374, 102, 'ITM000047', 'Word choice Expressions of REQUEST', '2021-08-29 00:34:24'),
(375, 102, 'ITM000047', 'Session of FORMAL SPEECHES `s/es solution', '2021-08-29 00:34:24'),
(376, 102, 'ITM000047', 'Session of PASSIVE Sentences', '2021-08-29 00:34:24'),
(377, 102, 'ITM000047', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:34:24'),
(378, 102, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(379, 102, 'ITM000047', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:34:24'),
(380, 102, 'ITM000047', 'Session of TECHNOLOGIES hardly& whether have to& and', '2021-08-29 00:34:24'),
(381, 102, 'ITM000047', 'Session of and unreal sentences', '2021-08-29 00:34:24'),
(382, 102, 'ITM000047', 'Session of Causative Verbs', '2021-08-29 00:34:24'),
(383, 102, 'ITM000047', ' Use of ``AS` group', '2021-08-29 00:34:24'),
(384, 102, 'ITM000047', 'Use of NEED Group and Used to', '2021-08-29 00:34:24'),
(385, 102, 'ITM000047', 'Use of It`s time can`t HELP& almost', '2021-08-29 00:34:24'),
(386, 102, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(387, 102, 'ITM000047', ' Usage of `SEE` Group and  ``ever` group', '2021-08-29 00:34:24'),
(388, 102, 'ITM000047', 'Usage of Though instead of& still& yet became of', '2021-08-29 00:34:24'),
(389, 102, 'ITM000047', 'Usage of Questioning', '2021-08-29 00:34:24'),
(390, 102, 'ITM000047', 'Use of want too`to might as well', '2021-08-29 00:34:24'),
(391, 102, 'ITM000047', 'Session of Presentation/ Formal Speech', '2021-08-29 00:34:24'),
(392, 102, 'ITM000047', 'Watching speech of OBAMA and Do it yourself.', '2021-08-29 00:34:24'),
(393, 102, 'ITM000047', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:34:24'),
(394, 102, 'ITM000048', '01: Introducing with Digital Marketing', '2021-08-29 00:40:17'),
(395, 102, 'ITM000048', '02: Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 00:40:17'),
(396, 102, 'ITM000048', '03: Canva Design All Details', '2021-08-29 00:40:17'),
(397, 102, 'ITM000048', '04: Advance Facebook Marketing', '2021-08-29 00:40:17'),
(398, 102, 'ITM000048', '05: Advance Facebook Marketing', '2021-08-29 00:40:18'),
(399, 102, 'ITM000048', '06: Advance Instagram Organic and Paid Marketing', '2021-08-29 00:40:18'),
(400, 102, 'ITM000048', '07: LinkedIn Marketing & Snapchat and Quora', '2021-08-29 00:40:18'),
(401, 102, 'ITM000048', '08: Fiverr Market Place (Part 01)', '2021-08-29 00:40:18'),
(402, 102, 'ITM000048', '09: Fiverr Market Place (Part 02)', '2021-08-29 00:40:18'),
(403, 102, 'ITM000048', '10: Twitter Marketing', '2021-08-29 00:40:18'),
(404, 102, 'ITM000048', '11: Pinterest Introduction', '2021-08-29 00:40:18'),
(405, 102, 'ITM000048', '12: Pinterest Campaign & Scheduling', '2021-08-29 00:40:18'),
(406, 102, 'ITM000048', '13: Keyword Research and Analysis', '2021-08-29 00:40:18'),
(407, 102, 'ITM000048', '14: Search Engine Optimization (SEO)', '2021-08-29 00:40:18'),
(408, 102, 'ITM000048', '15: Off Page SEO Optimization', '2021-08-29 00:40:18'),
(409, 102, 'ITM000048', '16: YouTube Marketing (Channel Optimization)', '2021-08-29 00:40:18'),
(410, 102, 'ITM000048', '17: YouTube Marketing (Video Optimization)', '2021-08-29 00:40:18'),
(411, 102, 'ITM000048', '18: UpWork & Other�s Market Place Overall in details', '2021-08-29 00:40:18'),
(412, 102, 'ITM000051', ' 1: Orientation- Career Support for your life that below& Discuss About Software / Applications', '2021-08-29 00:49:18'),
(413, 102, 'ITM000051', ' 2: Introducing with Photoshop& Document Setup & Related tools ', '2021-08-29 00:49:18'),
(414, 102, 'ITM000051', ' 3: Selection Details& Image Resize', '2021-08-29 00:49:18'),
(415, 102, 'ITM000051', ' 4: Brush Tools', '2021-08-29 00:49:18'),
(416, 102, 'ITM000051', ' 5:  Retouch Image', '2021-08-29 00:49:18'),
(417, 102, 'ITM000051', ' 6: Pen Tool& Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:49:18'),
(418, 102, 'ITM000051', ' 7: History Brush Tool& Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:49:18'),
(419, 102, 'ITM000051', ' 8: Type Tools& Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:49:18'),
(420, 102, 'ITM000051', ' 9: Layer Palate& Layer Lock- Project- Image Manipulation', '2021-08-29 00:49:18'),
(421, 102, 'ITM000051', ' 10: Layer Palate& Blend Option with Related Tools- ', '2021-08-29 00:49:18'),
(422, 102, 'ITM000051', ' 11:Project- Login Page and Icon Design', '2021-08-29 00:49:18'),
(423, 102, 'ITM000051', ' 12: Chanel& Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:49:18'),
(424, 102, 'ITM000051', ' 13: Animation& Save for Web- Project- Animated Web Ad', '2021-08-29 00:49:19'),
(425, 102, 'ITM000051', ' 14: Image Manu& Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:49:19'),
(426, 102, 'ITM000051', ' 15: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:49:19'),
(427, 102, 'ITM000051', ' 16: About Basic Color Theory& What�s the meaning of colors? & How to matching color in design', '2021-08-29 00:49:19'),
(428, 102, 'ITM000051', ' 17: Discuss About Adobe XD& How to Use adobe xd?', '2021-08-29 00:49:19'),
(429, 102, 'ITM000051', ' 18: About Basic Typography& What�s the difference between& typeface & font? & What�s the difference between serif &', '2021-08-29 00:49:19'),
(430, 102, 'ITM000051', ' 19: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:49:19'),
(431, 102, 'ITM000051', ' 20: Discuss About Adobe Illustrator& What�s different between Photoshop & illustrator?', '2021-08-29 00:49:19'),
(432, 102, 'ITM000051', ' 21: Part One: Logo Design & Business Card& Part Two: Banner Design & Resume Design', '2021-08-29 00:49:19'),
(433, 102, 'ITM000051', ' 23: Discuss About Marketplace', '2021-08-29 00:49:19'),
(434, 102, 'ITM000051', ' 24: How to submit your projects.', '2021-08-29 00:49:19'),
(435, 103, 'ITM000045', 'Introducing with Digital Marketing', '2021-08-28 23:49:50'),
(436, 103, 'ITM000045', 'Digital and E-commerce Marketing with Necessary Tools', '2021-08-28 23:49:50'),
(437, 103, 'ITM000045', 'Canva Design All Details', '2021-08-28 23:49:50'),
(438, 103, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(439, 103, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(440, 103, 'ITM000045', ' Advance Instagram Organic and Paid Marketing', '2021-08-28 23:49:50'),
(441, 103, 'ITM000045', ' LinkedIn Marketing, Snapchat and Quora', '2021-08-28 23:49:50'),
(442, 103, 'ITM000045', 'Fiverr Market Place (Part 01)', '2021-08-28 23:49:50'),
(443, 103, 'ITM000045', ' Fiverr Market Place (Part 02)', '2021-08-28 23:49:50'),
(444, 103, 'ITM000045', 'Twitter Marketing', '2021-08-28 23:49:50'),
(445, 103, 'ITM000045', 'Pinterest Introduction', '2021-08-28 23:49:50'),
(446, 103, 'ITM000045', ' Pinterest Campaign & Scheduling', '2021-08-28 23:49:50'),
(447, 103, 'ITM000045', ' Keyword Research and Analysis', '2021-08-28 23:49:50'),
(448, 103, 'ITM000045', ' Search Engine Optimization (SEO)', '2021-08-28 23:49:50'),
(449, 103, 'ITM000045', ' Off Page SEO Optimization', '2021-08-28 23:49:50'),
(450, 103, 'ITM000045', ' YouTube Marketing (Channel Optimization)', '2021-08-28 23:49:51'),
(451, 103, 'ITM000045', ' YouTube Marketing (Video Optimization)', '2021-08-28 23:49:51'),
(452, 103, 'ITM000045', ' UpWork & Other?s Market Place Overall in details', '2021-08-28 23:49:51'),
(453, 103, 'ITM000046', 'Session of CONFIDENCE', '2021-08-29 00:13:01'),
(454, 103, 'ITM000046', 'Session of ORNAMENTS', '2021-08-29 00:13:01'),
(455, 103, 'ITM000046', ' Session of QUESTIONING', '2021-08-29 00:13:01'),
(456, 103, 'ITM000046', 'Session of QUESTIONING', '2021-08-29 00:13:01'),
(457, 103, 'ITM000046', 'Session of SOLVE class Mini test', '2021-08-29 00:13:01'),
(458, 103, 'ITM000046', 'Word choice Expressions of REQUEST', '2021-08-29 00:13:01'),
(459, 103, 'ITM000046', 'Session of FORMAL SPEECHES \'s/es\' solution', '2021-08-29 00:13:01'),
(460, 103, 'ITM000046', 'Session of PASSIVE Sentences', '2021-08-29 00:13:01'),
(461, 103, 'ITM000046', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:13:02'),
(462, 103, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(463, 103, 'ITM000046', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:13:02'),
(464, 103, 'ITM000046', 'Session of TECHNOLOGIES hardly/ whether have to/ and', '2021-08-29 00:13:02'),
(465, 103, 'ITM000046', 'Session of and unreal sentences', '2021-08-29 00:13:02'),
(466, 103, 'ITM000046', 'Session of Causative Verbs', '2021-08-29 00:13:02'),
(467, 103, 'ITM000046', ' Use of \'AS\' group', '2021-08-29 00:13:02'),
(468, 103, 'ITM000046', 'Use of NEED Group and Used to', '2021-08-29 00:13:02'),
(469, 103, 'ITM000046', 'Use of It�s time can�t HELP/ almost', '2021-08-29 00:13:02'),
(470, 103, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(471, 103, 'ITM000046', ' Usage of \'SEE\' Group and  \'�ever\' group', '2021-08-29 00:13:02'),
(472, 103, 'ITM000046', 'Usage of Though instead of/ still/ yet became of', '2021-08-29 00:13:02'),
(473, 103, 'ITM000046', 'Usage of Questioning', '2021-08-29 00:13:02'),
(474, 103, 'ITM000046', 'Use of want too�to might as well', '2021-08-29 00:13:02'),
(475, 103, 'ITM000046', 'Session of Presentation/ Formal Speech', '2021-08-29 00:13:02'),
(476, 103, 'ITM000046', 'Watching speech of OBAMA and Do it yourself', '2021-08-29 00:13:02'),
(477, 103, 'ITM000046', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:13:02'),
(478, 103, 'ITM000043', ' 1: Orientation- Career Support for your life that below, Discuss About Software / Applications', '2021-08-29 00:16:02'),
(479, 103, 'ITM000043', ' 2: Introducing with Photoshop, Document Setup & Related tools ', '2021-08-29 00:16:03'),
(480, 103, 'ITM000043', ' 3: Selection Details, Image Resize', '2021-08-29 00:16:03'),
(481, 103, 'ITM000043', ' 4: Brush Tools', '2021-08-29 00:16:03'),
(482, 103, 'ITM000043', ' 5:  Retouch Image', '2021-08-29 00:16:03'),
(483, 103, 'ITM000043', ' 6: Pen Tool, Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:16:03'),
(484, 103, 'ITM000043', ' 7: History Brush Tool, Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:16:03'),
(485, 103, 'ITM000043', ' 8: Type Tools, Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:16:03'),
(486, 103, 'ITM000043', ' 9: Layer Palate, Layer Lock- Project- Image Manipulation', '2021-08-29 00:16:03'),
(487, 103, 'ITM000043', ' 10: Layer Palate, Blend Option with Related Tools- ', '2021-08-29 00:16:03'),
(488, 103, 'ITM000043', 'Project- Login Page and Icon Design', '2021-08-29 00:16:03'),
(489, 103, 'ITM000043', ' 11: Chanel, Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:16:03'),
(490, 103, 'ITM000043', ' 12: Animation, Save for Web- Project- Animated Web Ad', '2021-08-29 00:16:03'),
(491, 103, 'ITM000043', ' 13: Image Manu, Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:16:03'),
(492, 103, 'ITM000043', ' 14: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:16:03'),
(493, 103, 'ITM000043', ' 15: About Basic Color Theory, What?s the meaning of colors? & How to matching color in design', '2021-08-29 00:16:04'),
(494, 103, 'ITM000043', ' 16: Discuss About Adobe XD, How to Use adobe xd?', '2021-08-29 00:16:04'),
(495, 103, 'ITM000043', ' 17: About Basic Typography, What?s the difference between, typeface & font? & What?s the difference between serif &', '2021-08-29 00:16:04'),
(496, 103, 'ITM000043', ' 18: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:16:04'),
(497, 103, 'ITM000043', ' 20: Discuss About Adobe Illustrator, What?s different between Photoshop & illustrator?', '2021-08-29 00:16:04'),
(498, 103, 'ITM000043', ' 21: Part One: Logo Design & Business Card, Part Two: Banner Design & Resume Design', '2021-08-29 00:16:04'),
(499, 103, 'ITM000043', ' 23: Discuss About Marketplace', '2021-08-29 00:16:04'),
(500, 103, 'ITM000043', ' 24: How to submit your projects.', '2021-08-29 00:16:04'),
(501, 103, 'ITM000044', '01:  Introduction & Smart Phone management', '2021-08-29 00:20:38'),
(502, 103, 'ITM000044', '02: Basic uses of Computers  & MS Office Introduction & Usage', '2021-08-29 00:20:38'),
(503, 103, 'ITM000044', '03: Typing practice with Typing Master with Tools usage', '2021-08-29 00:20:38'),
(504, 103, 'ITM000044', '04: Create Table & Design Table & Related Tools', '2021-08-29 00:20:38'),
(505, 103, 'ITM000044', '05: Page Margins & Orientation & Page Size& Columns & Break with Related Tools ', '2021-08-29 00:20:38'),
(506, 103, 'ITM000044', '06: Bengali Typing & Related Tools', '2021-08-29 00:20:38'),
(507, 103, 'ITM000044', ' 07:Making modern Resume using MS word Step by step', '2021-08-29 00:20:38'),
(508, 103, 'ITM000044', '08: Practical Exam in Lab', '2021-08-29 00:20:38'),
(509, 103, 'ITM000044', '09: Ms Excel introduction & Usage', '2021-08-29 00:20:38'),
(510, 103, 'ITM000044', '10: Salary Sheet Result Sheet & Excel Exam', '2021-08-29 00:20:38'),
(511, 103, 'ITM000044', '11: MS PowerPoint introduction & Usage', '2021-08-29 00:20:38'),
(512, 103, 'ITM000044', '12:  Create Presentation with animation', '2021-08-29 00:20:38'),
(513, 103, 'ITM000044', '13: Presentation Day', '2021-08-29 00:20:38'),
(514, 103, 'ITM000044', '14: Photography Basic', '2021-08-29 00:20:38'),
(515, 103, 'ITM000044', '15: Photoshop introduction', '2021-08-29 00:20:39'),
(516, 103, 'ITM000044', '16: Photo Contest on best capture& edit and presentation', '2021-08-29 00:20:39'),
(517, 103, 'ITM000044', '17: Problem-analysis and progress measurement 18: Basic Internet information- Social Media and website', '2021-08-29 00:20:39'),
(518, 103, 'ITM000044', '19: Final Exam for certification', '2021-08-29 00:20:39'),
(519, 103, 'ITM000044', '20: Get-together and Cyber security and awareness', '2021-08-29 00:20:39'),
(520, 103, 'ITM000047', 'Session of CONFIDENCE', '2021-08-29 00:34:23'),
(521, 103, 'ITM000047', 'Session of ORNAMENTS', '2021-08-29 00:34:23'),
(522, 103, 'ITM000047', ' Session of QUESTIONING', '2021-08-29 00:34:23'),
(523, 103, 'ITM000047', 'Session of QUESTIONING', '2021-08-29 00:34:23'),
(524, 103, 'ITM000047', 'Session of SOLVE class Mini test', '2021-08-29 00:34:24'),
(525, 103, 'ITM000047', 'Word choice Expressions of REQUEST', '2021-08-29 00:34:24'),
(526, 103, 'ITM000047', 'Session of FORMAL SPEECHES `s/es solution', '2021-08-29 00:34:24'),
(527, 103, 'ITM000047', 'Session of PASSIVE Sentences', '2021-08-29 00:34:24'),
(528, 103, 'ITM000047', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:34:24'),
(529, 103, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(530, 103, 'ITM000047', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:34:24'),
(531, 103, 'ITM000047', 'Session of TECHNOLOGIES hardly& whether have to& and', '2021-08-29 00:34:24'),
(532, 103, 'ITM000047', 'Session of and unreal sentences', '2021-08-29 00:34:24'),
(533, 103, 'ITM000047', 'Session of Causative Verbs', '2021-08-29 00:34:24'),
(534, 103, 'ITM000047', ' Use of ``AS` group', '2021-08-29 00:34:24'),
(535, 103, 'ITM000047', 'Use of NEED Group and Used to', '2021-08-29 00:34:24'),
(536, 103, 'ITM000047', 'Use of It`s time can`t HELP& almost', '2021-08-29 00:34:24'),
(537, 103, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(538, 103, 'ITM000047', ' Usage of `SEE` Group and  ``ever` group', '2021-08-29 00:34:24'),
(539, 103, 'ITM000047', 'Usage of Though instead of& still& yet became of', '2021-08-29 00:34:24'),
(540, 103, 'ITM000047', 'Usage of Questioning', '2021-08-29 00:34:24'),
(541, 103, 'ITM000047', 'Use of want too`to might as well', '2021-08-29 00:34:24'),
(542, 103, 'ITM000047', 'Session of Presentation/ Formal Speech', '2021-08-29 00:34:24'),
(543, 103, 'ITM000047', 'Watching speech of OBAMA and Do it yourself.', '2021-08-29 00:34:24'),
(544, 103, 'ITM000047', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:34:24'),
(545, 103, 'ITM000048', '01: Introducing with Digital Marketing', '2021-08-29 00:40:17'),
(546, 103, 'ITM000048', '02: Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 00:40:17'),
(547, 103, 'ITM000048', '03: Canva Design All Details', '2021-08-29 00:40:17'),
(548, 103, 'ITM000048', '04: Advance Facebook Marketing', '2021-08-29 00:40:17'),
(549, 103, 'ITM000048', '05: Advance Facebook Marketing', '2021-08-29 00:40:18'),
(550, 103, 'ITM000048', '06: Advance Instagram Organic and Paid Marketing', '2021-08-29 00:40:18'),
(551, 103, 'ITM000048', '07: LinkedIn Marketing & Snapchat and Quora', '2021-08-29 00:40:18'),
(552, 103, 'ITM000048', '08: Fiverr Market Place (Part 01)', '2021-08-29 00:40:18'),
(553, 103, 'ITM000048', '09: Fiverr Market Place (Part 02)', '2021-08-29 00:40:18'),
(554, 103, 'ITM000048', '10: Twitter Marketing', '2021-08-29 00:40:18'),
(555, 103, 'ITM000048', '11: Pinterest Introduction', '2021-08-29 00:40:18'),
(556, 103, 'ITM000048', '12: Pinterest Campaign & Scheduling', '2021-08-29 00:40:18'),
(557, 103, 'ITM000048', '13: Keyword Research and Analysis', '2021-08-29 00:40:18'),
(558, 103, 'ITM000048', '14: Search Engine Optimization (SEO)', '2021-08-29 00:40:18'),
(559, 103, 'ITM000048', '15: Off Page SEO Optimization', '2021-08-29 00:40:18'),
(560, 103, 'ITM000048', '16: YouTube Marketing (Channel Optimization)', '2021-08-29 00:40:18'),
(561, 103, 'ITM000048', '17: YouTube Marketing (Video Optimization)', '2021-08-29 00:40:18'),
(562, 103, 'ITM000048', '18: UpWork & Other�s Market Place Overall in details', '2021-08-29 00:40:18'),
(563, 103, 'ITM000051', ' 1: Orientation- Career Support for your life that below& Discuss About Software / Applications', '2021-08-29 00:49:18'),
(564, 103, 'ITM000051', ' 2: Introducing with Photoshop& Document Setup & Related tools ', '2021-08-29 00:49:18'),
(565, 103, 'ITM000051', ' 3: Selection Details& Image Resize', '2021-08-29 00:49:18'),
(566, 103, 'ITM000051', ' 4: Brush Tools', '2021-08-29 00:49:18'),
(567, 103, 'ITM000051', ' 5:  Retouch Image', '2021-08-29 00:49:18'),
(568, 103, 'ITM000051', ' 6: Pen Tool& Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:49:18'),
(569, 103, 'ITM000051', ' 7: History Brush Tool& Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:49:18'),
(570, 103, 'ITM000051', ' 8: Type Tools& Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:49:18'),
(571, 103, 'ITM000051', ' 9: Layer Palate& Layer Lock- Project- Image Manipulation', '2021-08-29 00:49:18'),
(572, 103, 'ITM000051', ' 10: Layer Palate& Blend Option with Related Tools- ', '2021-08-29 00:49:18'),
(573, 103, 'ITM000051', ' 11:Project- Login Page and Icon Design', '2021-08-29 00:49:18'),
(574, 103, 'ITM000051', ' 12: Chanel& Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:49:18'),
(575, 103, 'ITM000051', ' 13: Animation& Save for Web- Project- Animated Web Ad', '2021-08-29 00:49:19'),
(576, 103, 'ITM000051', ' 14: Image Manu& Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:49:19'),
(577, 103, 'ITM000051', ' 15: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:49:19'),
(578, 103, 'ITM000051', ' 16: About Basic Color Theory& What�s the meaning of colors? & How to matching color in design', '2021-08-29 00:49:19'),
(579, 103, 'ITM000051', ' 17: Discuss About Adobe XD& How to Use adobe xd?', '2021-08-29 00:49:19'),
(580, 103, 'ITM000051', ' 18: About Basic Typography& What�s the difference between& typeface & font? & What�s the difference between serif &', '2021-08-29 00:49:19'),
(581, 103, 'ITM000051', ' 19: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:49:19'),
(582, 103, 'ITM000051', ' 20: Discuss About Adobe Illustrator& What�s different between Photoshop & illustrator?', '2021-08-29 00:49:19'),
(583, 103, 'ITM000051', ' 21: Part One: Logo Design & Business Card& Part Two: Banner Design & Resume Design', '2021-08-29 00:49:19'),
(584, 103, 'ITM000051', ' 23: Discuss About Marketplace', '2021-08-29 00:49:19'),
(585, 103, 'ITM000051', ' 24: How to submit your projects.', '2021-08-29 00:49:19'),
(586, 104, 'ITM000045', 'Introducing with Digital Marketing', '2021-08-28 23:49:50'),
(587, 104, 'ITM000045', 'Digital and E-commerce Marketing with Necessary Tools', '2021-08-28 23:49:50'),
(588, 104, 'ITM000045', 'Canva Design All Details', '2021-08-28 23:49:50'),
(589, 104, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(590, 104, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(591, 104, 'ITM000045', ' Advance Instagram Organic and Paid Marketing', '2021-08-28 23:49:50'),
(592, 104, 'ITM000045', ' LinkedIn Marketing, Snapchat and Quora', '2021-08-28 23:49:50'),
(593, 104, 'ITM000045', 'Fiverr Market Place (Part 01)', '2021-08-28 23:49:50'),
(594, 104, 'ITM000045', ' Fiverr Market Place (Part 02)', '2021-08-28 23:49:50'),
(595, 104, 'ITM000045', 'Twitter Marketing', '2021-08-28 23:49:50'),
(596, 104, 'ITM000045', 'Pinterest Introduction', '2021-08-28 23:49:50'),
(597, 104, 'ITM000045', ' Pinterest Campaign & Scheduling', '2021-08-28 23:49:50'),
(598, 104, 'ITM000045', ' Keyword Research and Analysis', '2021-08-28 23:49:50'),
(599, 104, 'ITM000045', ' Search Engine Optimization (SEO)', '2021-08-28 23:49:50'),
(600, 104, 'ITM000045', ' Off Page SEO Optimization', '2021-08-28 23:49:50'),
(601, 104, 'ITM000045', ' YouTube Marketing (Channel Optimization)', '2021-08-28 23:49:51'),
(602, 104, 'ITM000045', ' YouTube Marketing (Video Optimization)', '2021-08-28 23:49:51'),
(603, 104, 'ITM000045', ' UpWork & Other?s Market Place Overall in details', '2021-08-28 23:49:51'),
(604, 104, 'ITM000046', 'Session of CONFIDENCE', '2021-08-29 00:13:01'),
(605, 104, 'ITM000046', 'Session of ORNAMENTS', '2021-08-29 00:13:01'),
(606, 104, 'ITM000046', ' Session of QUESTIONING', '2021-08-29 00:13:01'),
(607, 104, 'ITM000046', 'Session of QUESTIONING', '2021-08-29 00:13:01'),
(608, 104, 'ITM000046', 'Session of SOLVE class Mini test', '2021-08-29 00:13:01'),
(609, 104, 'ITM000046', 'Word choice Expressions of REQUEST', '2021-08-29 00:13:01'),
(610, 104, 'ITM000046', 'Session of FORMAL SPEECHES \'s/es\' solution', '2021-08-29 00:13:01'),
(611, 104, 'ITM000046', 'Session of PASSIVE Sentences', '2021-08-29 00:13:01'),
(612, 104, 'ITM000046', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:13:02'),
(613, 104, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(614, 104, 'ITM000046', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:13:02'),
(615, 104, 'ITM000046', 'Session of TECHNOLOGIES hardly/ whether have to/ and', '2021-08-29 00:13:02'),
(616, 104, 'ITM000046', 'Session of and unreal sentences', '2021-08-29 00:13:02'),
(617, 104, 'ITM000046', 'Session of Causative Verbs', '2021-08-29 00:13:02'),
(618, 104, 'ITM000046', ' Use of \'AS\' group', '2021-08-29 00:13:02'),
(619, 104, 'ITM000046', 'Use of NEED Group and Used to', '2021-08-29 00:13:02'),
(620, 104, 'ITM000046', 'Use of It�s time can�t HELP/ almost', '2021-08-29 00:13:02'),
(621, 104, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(622, 104, 'ITM000046', ' Usage of \'SEE\' Group and  \'�ever\' group', '2021-08-29 00:13:02'),
(623, 104, 'ITM000046', 'Usage of Though instead of/ still/ yet became of', '2021-08-29 00:13:02'),
(624, 104, 'ITM000046', 'Usage of Questioning', '2021-08-29 00:13:02'),
(625, 104, 'ITM000046', 'Use of want too�to might as well', '2021-08-29 00:13:02'),
(626, 104, 'ITM000046', 'Session of Presentation/ Formal Speech', '2021-08-29 00:13:02'),
(627, 104, 'ITM000046', 'Watching speech of OBAMA and Do it yourself', '2021-08-29 00:13:02'),
(628, 104, 'ITM000046', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:13:02'),
(629, 104, 'ITM000043', ' 1: Orientation- Career Support for your life that below, Discuss About Software / Applications', '2021-08-29 00:16:02'),
(630, 104, 'ITM000043', ' 2: Introducing with Photoshop, Document Setup & Related tools ', '2021-08-29 00:16:03'),
(631, 104, 'ITM000043', ' 3: Selection Details, Image Resize', '2021-08-29 00:16:03'),
(632, 104, 'ITM000043', ' 4: Brush Tools', '2021-08-29 00:16:03'),
(633, 104, 'ITM000043', ' 5:  Retouch Image', '2021-08-29 00:16:03'),
(634, 104, 'ITM000043', ' 6: Pen Tool, Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:16:03'),
(635, 104, 'ITM000043', ' 7: History Brush Tool, Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:16:03'),
(636, 104, 'ITM000043', ' 8: Type Tools, Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:16:03'),
(637, 104, 'ITM000043', ' 9: Layer Palate, Layer Lock- Project- Image Manipulation', '2021-08-29 00:16:03'),
(638, 104, 'ITM000043', ' 10: Layer Palate, Blend Option with Related Tools- ', '2021-08-29 00:16:03'),
(639, 104, 'ITM000043', 'Project- Login Page and Icon Design', '2021-08-29 00:16:03'),
(640, 104, 'ITM000043', ' 11: Chanel, Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:16:03'),
(641, 104, 'ITM000043', ' 12: Animation, Save for Web- Project- Animated Web Ad', '2021-08-29 00:16:03'),
(642, 104, 'ITM000043', ' 13: Image Manu, Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:16:03'),
(643, 104, 'ITM000043', ' 14: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:16:03'),
(644, 104, 'ITM000043', ' 15: About Basic Color Theory, What?s the meaning of colors? & How to matching color in design', '2021-08-29 00:16:04'),
(645, 104, 'ITM000043', ' 16: Discuss About Adobe XD, How to Use adobe xd?', '2021-08-29 00:16:04'),
(646, 104, 'ITM000043', ' 17: About Basic Typography, What?s the difference between, typeface & font? & What?s the difference between serif &', '2021-08-29 00:16:04'),
(647, 104, 'ITM000043', ' 18: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:16:04'),
(648, 104, 'ITM000043', ' 20: Discuss About Adobe Illustrator, What?s different between Photoshop & illustrator?', '2021-08-29 00:16:04'),
(649, 104, 'ITM000043', ' 21: Part One: Logo Design & Business Card, Part Two: Banner Design & Resume Design', '2021-08-29 00:16:04'),
(650, 104, 'ITM000043', ' 23: Discuss About Marketplace', '2021-08-29 00:16:04'),
(651, 104, 'ITM000043', ' 24: How to submit your projects.', '2021-08-29 00:16:04'),
(652, 104, 'ITM000044', '01:  Introduction & Smart Phone management', '2021-08-29 00:20:38'),
(653, 104, 'ITM000044', '02: Basic uses of Computers  & MS Office Introduction & Usage', '2021-08-29 00:20:38'),
(654, 104, 'ITM000044', '03: Typing practice with Typing Master with Tools usage', '2021-08-29 00:20:38'),
(655, 104, 'ITM000044', '04: Create Table & Design Table & Related Tools', '2021-08-29 00:20:38'),
(656, 104, 'ITM000044', '05: Page Margins & Orientation & Page Size& Columns & Break with Related Tools ', '2021-08-29 00:20:38'),
(657, 104, 'ITM000044', '06: Bengali Typing & Related Tools', '2021-08-29 00:20:38'),
(658, 104, 'ITM000044', ' 07:Making modern Resume using MS word Step by step', '2021-08-29 00:20:38'),
(659, 104, 'ITM000044', '08: Practical Exam in Lab', '2021-08-29 00:20:38');
INSERT INTO `lesson` (`xlesson`, `bizid`, `xitemcode`, `xdesc`, `ztime`) VALUES
(660, 104, 'ITM000044', '09: Ms Excel introduction & Usage', '2021-08-29 00:20:38'),
(661, 104, 'ITM000044', '10: Salary Sheet Result Sheet & Excel Exam', '2021-08-29 00:20:38'),
(662, 104, 'ITM000044', '11: MS PowerPoint introduction & Usage', '2021-08-29 00:20:38'),
(663, 104, 'ITM000044', '12:  Create Presentation with animation', '2021-08-29 00:20:38'),
(664, 104, 'ITM000044', '13: Presentation Day', '2021-08-29 00:20:38'),
(665, 104, 'ITM000044', '14: Photography Basic', '2021-08-29 00:20:38'),
(666, 104, 'ITM000044', '15: Photoshop introduction', '2021-08-29 00:20:39'),
(667, 104, 'ITM000044', '16: Photo Contest on best capture& edit and presentation', '2021-08-29 00:20:39'),
(668, 104, 'ITM000044', '17: Problem-analysis and progress measurement 18: Basic Internet information- Social Media and website', '2021-08-29 00:20:39'),
(669, 104, 'ITM000044', '19: Final Exam for certification', '2021-08-29 00:20:39'),
(670, 104, 'ITM000044', '20: Get-together and Cyber security and awareness', '2021-08-29 00:20:39'),
(671, 104, 'ITM000047', 'Session of CONFIDENCE', '2021-08-29 00:34:23'),
(672, 104, 'ITM000047', 'Session of ORNAMENTS', '2021-08-29 00:34:23'),
(673, 104, 'ITM000047', ' Session of QUESTIONING', '2021-08-29 00:34:23'),
(674, 104, 'ITM000047', 'Session of QUESTIONING', '2021-08-29 00:34:23'),
(675, 104, 'ITM000047', 'Session of SOLVE class Mini test', '2021-08-29 00:34:24'),
(676, 104, 'ITM000047', 'Word choice Expressions of REQUEST', '2021-08-29 00:34:24'),
(677, 104, 'ITM000047', 'Session of FORMAL SPEECHES `s/es solution', '2021-08-29 00:34:24'),
(678, 104, 'ITM000047', 'Session of PASSIVE Sentences', '2021-08-29 00:34:24'),
(679, 104, 'ITM000047', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:34:24'),
(680, 104, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(681, 104, 'ITM000047', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:34:24'),
(682, 104, 'ITM000047', 'Session of TECHNOLOGIES hardly& whether have to& and', '2021-08-29 00:34:24'),
(683, 104, 'ITM000047', 'Session of and unreal sentences', '2021-08-29 00:34:24'),
(684, 104, 'ITM000047', 'Session of Causative Verbs', '2021-08-29 00:34:24'),
(685, 104, 'ITM000047', ' Use of ``AS` group', '2021-08-29 00:34:24'),
(686, 104, 'ITM000047', 'Use of NEED Group and Used to', '2021-08-29 00:34:24'),
(687, 104, 'ITM000047', 'Use of It`s time can`t HELP& almost', '2021-08-29 00:34:24'),
(688, 104, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(689, 104, 'ITM000047', ' Usage of `SEE` Group and  ``ever` group', '2021-08-29 00:34:24'),
(690, 104, 'ITM000047', 'Usage of Though instead of& still& yet became of', '2021-08-29 00:34:24'),
(691, 104, 'ITM000047', 'Usage of Questioning', '2021-08-29 00:34:24'),
(692, 104, 'ITM000047', 'Use of want too`to might as well', '2021-08-29 00:34:24'),
(693, 104, 'ITM000047', 'Session of Presentation/ Formal Speech', '2021-08-29 00:34:24'),
(694, 104, 'ITM000047', 'Watching speech of OBAMA and Do it yourself.', '2021-08-29 00:34:24'),
(695, 104, 'ITM000047', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:34:24'),
(696, 104, 'ITM000048', '01: Introducing with Digital Marketing', '2021-08-29 00:40:17'),
(697, 104, 'ITM000048', '02: Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 00:40:17'),
(698, 104, 'ITM000048', '03: Canva Design All Details', '2021-08-29 00:40:17'),
(699, 104, 'ITM000048', '04: Advance Facebook Marketing', '2021-08-29 00:40:17'),
(700, 104, 'ITM000048', '05: Advance Facebook Marketing', '2021-08-29 00:40:18'),
(701, 104, 'ITM000048', '06: Advance Instagram Organic and Paid Marketing', '2021-08-29 00:40:18'),
(702, 104, 'ITM000048', '07: LinkedIn Marketing & Snapchat and Quora', '2021-08-29 00:40:18'),
(703, 104, 'ITM000048', '08: Fiverr Market Place (Part 01)', '2021-08-29 00:40:18'),
(704, 104, 'ITM000048', '09: Fiverr Market Place (Part 02)', '2021-08-29 00:40:18'),
(705, 104, 'ITM000048', '10: Twitter Marketing', '2021-08-29 00:40:18'),
(706, 104, 'ITM000048', '11: Pinterest Introduction', '2021-08-29 00:40:18'),
(707, 104, 'ITM000048', '12: Pinterest Campaign & Scheduling', '2021-08-29 00:40:18'),
(708, 104, 'ITM000048', '13: Keyword Research and Analysis', '2021-08-29 00:40:18'),
(709, 104, 'ITM000048', '14: Search Engine Optimization (SEO)', '2021-08-29 00:40:18'),
(710, 104, 'ITM000048', '15: Off Page SEO Optimization', '2021-08-29 00:40:18'),
(711, 104, 'ITM000048', '16: YouTube Marketing (Channel Optimization)', '2021-08-29 00:40:18'),
(712, 104, 'ITM000048', '17: YouTube Marketing (Video Optimization)', '2021-08-29 00:40:18'),
(713, 104, 'ITM000048', '18: UpWork & Other�s Market Place Overall in details', '2021-08-29 00:40:18'),
(714, 104, 'ITM000051', ' 1: Orientation- Career Support for your life that below& Discuss About Software / Applications', '2021-08-29 00:49:18'),
(715, 104, 'ITM000051', ' 2: Introducing with Photoshop& Document Setup & Related tools ', '2021-08-29 00:49:18'),
(716, 104, 'ITM000051', ' 3: Selection Details& Image Resize', '2021-08-29 00:49:18'),
(717, 104, 'ITM000051', ' 4: Brush Tools', '2021-08-29 00:49:18'),
(718, 104, 'ITM000051', ' 5:  Retouch Image', '2021-08-29 00:49:18'),
(719, 104, 'ITM000051', ' 6: Pen Tool& Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:49:18'),
(720, 104, 'ITM000051', ' 7: History Brush Tool& Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:49:18'),
(721, 104, 'ITM000051', ' 8: Type Tools& Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:49:18'),
(722, 104, 'ITM000051', ' 9: Layer Palate& Layer Lock- Project- Image Manipulation', '2021-08-29 00:49:18'),
(723, 104, 'ITM000051', ' 10: Layer Palate& Blend Option with Related Tools- ', '2021-08-29 00:49:18'),
(724, 104, 'ITM000051', ' 11:Project- Login Page and Icon Design', '2021-08-29 00:49:18'),
(725, 104, 'ITM000051', ' 12: Chanel& Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:49:18'),
(726, 104, 'ITM000051', ' 13: Animation& Save for Web- Project- Animated Web Ad', '2021-08-29 00:49:19'),
(727, 104, 'ITM000051', ' 14: Image Manu& Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:49:19'),
(728, 104, 'ITM000051', ' 15: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:49:19'),
(729, 104, 'ITM000051', ' 16: About Basic Color Theory& What�s the meaning of colors? & How to matching color in design', '2021-08-29 00:49:19'),
(730, 104, 'ITM000051', ' 17: Discuss About Adobe XD& How to Use adobe xd?', '2021-08-29 00:49:19'),
(731, 104, 'ITM000051', ' 18: About Basic Typography& What�s the difference between& typeface & font? & What�s the difference between serif &', '2021-08-29 00:49:19'),
(732, 104, 'ITM000051', ' 19: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:49:19'),
(733, 104, 'ITM000051', ' 20: Discuss About Adobe Illustrator& What�s different between Photoshop & illustrator?', '2021-08-29 00:49:19'),
(734, 104, 'ITM000051', ' 21: Part One: Logo Design & Business Card& Part Two: Banner Design & Resume Design', '2021-08-29 00:49:19'),
(735, 104, 'ITM000051', ' 23: Discuss About Marketplace', '2021-08-29 00:49:19'),
(736, 104, 'ITM000051', ' 24: How to submit your projects.', '2021-08-29 00:49:19'),
(737, 105, 'ITM000045', 'Introducing with Digital Marketing', '2021-08-28 23:49:50'),
(738, 105, 'ITM000045', 'Digital and E-commerce Marketing with Necessary Tools', '2021-08-28 23:49:50'),
(739, 105, 'ITM000045', 'Canva Design All Details', '2021-08-28 23:49:50'),
(740, 105, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(741, 105, 'ITM000045', ' Advance Facebook Marketing', '2021-08-28 23:49:50'),
(742, 105, 'ITM000045', ' Advance Instagram Organic and Paid Marketing', '2021-08-28 23:49:50'),
(743, 105, 'ITM000045', ' LinkedIn Marketing, Snapchat and Quora', '2021-08-28 23:49:50'),
(744, 105, 'ITM000045', 'Fiverr Market Place (Part 01)', '2021-08-28 23:49:50'),
(745, 105, 'ITM000045', ' Fiverr Market Place (Part 02)', '2021-08-28 23:49:50'),
(746, 105, 'ITM000045', 'Twitter Marketing', '2021-08-28 23:49:50'),
(747, 105, 'ITM000045', 'Pinterest Introduction', '2021-08-28 23:49:50'),
(748, 105, 'ITM000045', ' Pinterest Campaign & Scheduling', '2021-08-28 23:49:50'),
(749, 105, 'ITM000045', ' Keyword Research and Analysis', '2021-08-28 23:49:50'),
(750, 105, 'ITM000045', ' Search Engine Optimization (SEO)', '2021-08-28 23:49:50'),
(751, 105, 'ITM000045', ' Off Page SEO Optimization', '2021-08-28 23:49:50'),
(752, 105, 'ITM000045', ' YouTube Marketing (Channel Optimization)', '2021-08-28 23:49:51'),
(753, 105, 'ITM000045', ' YouTube Marketing (Video Optimization)', '2021-08-28 23:49:51'),
(754, 105, 'ITM000045', ' UpWork & Other?s Market Place Overall in details', '2021-08-28 23:49:51'),
(755, 105, 'ITM000046', 'Session of CONFIDENCE', '2021-08-29 00:13:01'),
(756, 105, 'ITM000046', 'Session of ORNAMENTS', '2021-08-29 00:13:01'),
(757, 105, 'ITM000046', ' Session of QUESTIONING', '2021-08-29 00:13:01'),
(758, 105, 'ITM000046', 'Session of QUESTIONING', '2021-08-29 00:13:01'),
(759, 105, 'ITM000046', 'Session of SOLVE class Mini test', '2021-08-29 00:13:01'),
(760, 105, 'ITM000046', 'Word choice Expressions of REQUEST', '2021-08-29 00:13:01'),
(761, 105, 'ITM000046', 'Session of FORMAL SPEECHES \'s/es\' solution', '2021-08-29 00:13:01'),
(762, 105, 'ITM000046', 'Session of PASSIVE Sentences', '2021-08-29 00:13:01'),
(763, 105, 'ITM000046', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:13:02'),
(764, 105, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(765, 105, 'ITM000046', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:13:02'),
(766, 105, 'ITM000046', 'Session of TECHNOLOGIES hardly/ whether have to/ and', '2021-08-29 00:13:02'),
(767, 105, 'ITM000046', 'Session of and unreal sentences', '2021-08-29 00:13:02'),
(768, 105, 'ITM000046', 'Session of Causative Verbs', '2021-08-29 00:13:02'),
(769, 105, 'ITM000046', ' Use of \'AS\' group', '2021-08-29 00:13:02'),
(770, 105, 'ITM000046', 'Use of NEED Group and Used to', '2021-08-29 00:13:02'),
(771, 105, 'ITM000046', 'Use of It�s time can�t HELP/ almost', '2021-08-29 00:13:02'),
(772, 105, 'ITM000046', 'Session of SOLVE class and Mini test', '2021-08-29 00:13:02'),
(773, 105, 'ITM000046', ' Usage of \'SEE\' Group and  \'�ever\' group', '2021-08-29 00:13:02'),
(774, 105, 'ITM000046', 'Usage of Though instead of/ still/ yet became of', '2021-08-29 00:13:02'),
(775, 105, 'ITM000046', 'Usage of Questioning', '2021-08-29 00:13:02'),
(776, 105, 'ITM000046', 'Use of want too�to might as well', '2021-08-29 00:13:02'),
(777, 105, 'ITM000046', 'Session of Presentation/ Formal Speech', '2021-08-29 00:13:02'),
(778, 105, 'ITM000046', 'Watching speech of OBAMA and Do it yourself', '2021-08-29 00:13:02'),
(779, 105, 'ITM000046', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:13:02'),
(780, 105, 'ITM000043', ' 1: Orientation- Career Support for your life that below, Discuss About Software / Applications', '2021-08-29 00:16:02'),
(781, 105, 'ITM000043', ' 2: Introducing with Photoshop, Document Setup & Related tools ', '2021-08-29 00:16:03'),
(782, 105, 'ITM000043', ' 3: Selection Details, Image Resize', '2021-08-29 00:16:03'),
(783, 105, 'ITM000043', ' 4: Brush Tools', '2021-08-29 00:16:03'),
(784, 105, 'ITM000043', ' 5:  Retouch Image', '2021-08-29 00:16:03'),
(785, 105, 'ITM000043', ' 6: Pen Tool, Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:16:03'),
(786, 105, 'ITM000043', ' 7: History Brush Tool, Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:16:03'),
(787, 105, 'ITM000043', ' 8: Type Tools, Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:16:03'),
(788, 105, 'ITM000043', ' 9: Layer Palate, Layer Lock- Project- Image Manipulation', '2021-08-29 00:16:03'),
(789, 105, 'ITM000043', ' 10: Layer Palate, Blend Option with Related Tools- ', '2021-08-29 00:16:03'),
(790, 105, 'ITM000043', 'Project- Login Page and Icon Design', '2021-08-29 00:16:03'),
(791, 105, 'ITM000043', ' 11: Chanel, Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:16:03'),
(792, 105, 'ITM000043', ' 12: Animation, Save for Web- Project- Animated Web Ad', '2021-08-29 00:16:03'),
(793, 105, 'ITM000043', ' 13: Image Manu, Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:16:03'),
(794, 105, 'ITM000043', ' 14: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:16:03'),
(795, 105, 'ITM000043', ' 15: About Basic Color Theory, What?s the meaning of colors? & How to matching color in design', '2021-08-29 00:16:04'),
(796, 105, 'ITM000043', ' 16: Discuss About Adobe XD, How to Use adobe xd?', '2021-08-29 00:16:04'),
(797, 105, 'ITM000043', ' 17: About Basic Typography, What?s the difference between, typeface & font? & What?s the difference between serif &', '2021-08-29 00:16:04'),
(798, 105, 'ITM000043', ' 18: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:16:04'),
(799, 105, 'ITM000043', ' 20: Discuss About Adobe Illustrator, What?s different between Photoshop & illustrator?', '2021-08-29 00:16:04'),
(800, 105, 'ITM000043', ' 21: Part One: Logo Design & Business Card, Part Two: Banner Design & Resume Design', '2021-08-29 00:16:04'),
(801, 105, 'ITM000043', ' 23: Discuss About Marketplace', '2021-08-29 00:16:04'),
(802, 105, 'ITM000043', ' 24: How to submit your projects.', '2021-08-29 00:16:04'),
(803, 105, 'ITM000044', '01:  Introduction & Smart Phone management', '2021-08-29 00:20:38'),
(804, 105, 'ITM000044', '02: Basic uses of Computers  & MS Office Introduction & Usage', '2021-08-29 00:20:38'),
(805, 105, 'ITM000044', '03: Typing practice with Typing Master with Tools usage', '2021-08-29 00:20:38'),
(806, 105, 'ITM000044', '04: Create Table & Design Table & Related Tools', '2021-08-29 00:20:38'),
(807, 105, 'ITM000044', '05: Page Margins & Orientation & Page Size& Columns & Break with Related Tools ', '2021-08-29 00:20:38'),
(808, 105, 'ITM000044', '06: Bengali Typing & Related Tools', '2021-08-29 00:20:38'),
(809, 105, 'ITM000044', ' 07:Making modern Resume using MS word Step by step', '2021-08-29 00:20:38'),
(810, 105, 'ITM000044', '08: Practical Exam in Lab', '2021-08-29 00:20:38'),
(811, 105, 'ITM000044', '09: Ms Excel introduction & Usage', '2021-08-29 00:20:38'),
(812, 105, 'ITM000044', '10: Salary Sheet Result Sheet & Excel Exam', '2021-08-29 00:20:38'),
(813, 105, 'ITM000044', '11: MS PowerPoint introduction & Usage', '2021-08-29 00:20:38'),
(814, 105, 'ITM000044', '12:  Create Presentation with animation', '2021-08-29 00:20:38'),
(815, 105, 'ITM000044', '13: Presentation Day', '2021-08-29 00:20:38'),
(816, 105, 'ITM000044', '14: Photography Basic', '2021-08-29 00:20:38'),
(817, 105, 'ITM000044', '15: Photoshop introduction', '2021-08-29 00:20:39'),
(818, 105, 'ITM000044', '16: Photo Contest on best capture& edit and presentation', '2021-08-29 00:20:39'),
(819, 105, 'ITM000044', '17: Problem-analysis and progress measurement 18: Basic Internet information- Social Media and website', '2021-08-29 00:20:39'),
(820, 105, 'ITM000044', '19: Final Exam for certification', '2021-08-29 00:20:39'),
(821, 105, 'ITM000044', '20: Get-together and Cyber security and awareness', '2021-08-29 00:20:39'),
(822, 105, 'ITM000047', 'Session of CONFIDENCE', '2021-08-29 00:34:23'),
(823, 105, 'ITM000047', 'Session of ORNAMENTS', '2021-08-29 00:34:23'),
(824, 105, 'ITM000047', ' Session of QUESTIONING', '2021-08-29 00:34:23'),
(825, 105, 'ITM000047', 'Session of QUESTIONING', '2021-08-29 00:34:23'),
(826, 105, 'ITM000047', 'Session of SOLVE class Mini test', '2021-08-29 00:34:24'),
(827, 105, 'ITM000047', 'Word choice Expressions of REQUEST', '2021-08-29 00:34:24'),
(828, 105, 'ITM000047', 'Session of FORMAL SPEECHES `s/es solution', '2021-08-29 00:34:24'),
(829, 105, 'ITM000047', 'Session of PASSIVE Sentences', '2021-08-29 00:34:24'),
(830, 105, 'ITM000047', 'Session of LISTENING comprehension Listening tips', '2021-08-29 00:34:24'),
(831, 105, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(832, 105, 'ITM000047', 'Session of TECHNOLOGIES Sentence Making S Y S T E M', '2021-08-29 00:34:24'),
(833, 105, 'ITM000047', 'Session of TECHNOLOGIES hardly& whether have to& and', '2021-08-29 00:34:24'),
(834, 105, 'ITM000047', 'Session of and unreal sentences', '2021-08-29 00:34:24'),
(835, 105, 'ITM000047', 'Session of Causative Verbs', '2021-08-29 00:34:24'),
(836, 105, 'ITM000047', ' Use of ``AS` group', '2021-08-29 00:34:24'),
(837, 105, 'ITM000047', 'Use of NEED Group and Used to', '2021-08-29 00:34:24'),
(838, 105, 'ITM000047', 'Use of It`s time can`t HELP& almost', '2021-08-29 00:34:24'),
(839, 105, 'ITM000047', 'Session of SOLVE class and Mini test', '2021-08-29 00:34:24'),
(840, 105, 'ITM000047', ' Usage of `SEE` Group and  ``ever` group', '2021-08-29 00:34:24'),
(841, 105, 'ITM000047', 'Usage of Though instead of& still& yet became of', '2021-08-29 00:34:24'),
(842, 105, 'ITM000047', 'Usage of Questioning', '2021-08-29 00:34:24'),
(843, 105, 'ITM000047', 'Use of want too`to might as well', '2021-08-29 00:34:24'),
(844, 105, 'ITM000047', 'Session of Presentation/ Formal Speech', '2021-08-29 00:34:24'),
(845, 105, 'ITM000047', 'Watching speech of OBAMA and Do it yourself.', '2021-08-29 00:34:24'),
(846, 105, 'ITM000047', 'TEST & Certificate Ceremony Along with Grand Feast', '2021-08-29 00:34:24'),
(847, 105, 'ITM000048', '01: Introducing with Digital Marketing', '2021-08-29 00:40:17'),
(848, 105, 'ITM000048', '02: Digital and E-commerce Marketing with Necessary Tools', '2021-08-29 00:40:17'),
(849, 105, 'ITM000048', '03: Canva Design All Details', '2021-08-29 00:40:17'),
(850, 105, 'ITM000048', '04: Advance Facebook Marketing', '2021-08-29 00:40:17'),
(851, 105, 'ITM000048', '05: Advance Facebook Marketing', '2021-08-29 00:40:18'),
(852, 105, 'ITM000048', '06: Advance Instagram Organic and Paid Marketing', '2021-08-29 00:40:18'),
(853, 105, 'ITM000048', '07: LinkedIn Marketing & Snapchat and Quora', '2021-08-29 00:40:18'),
(854, 105, 'ITM000048', '08: Fiverr Market Place (Part 01)', '2021-08-29 00:40:18'),
(855, 105, 'ITM000048', '09: Fiverr Market Place (Part 02)', '2021-08-29 00:40:18'),
(856, 105, 'ITM000048', '10: Twitter Marketing', '2021-08-29 00:40:18'),
(857, 105, 'ITM000048', '11: Pinterest Introduction', '2021-08-29 00:40:18'),
(858, 105, 'ITM000048', '12: Pinterest Campaign & Scheduling', '2021-08-29 00:40:18'),
(859, 105, 'ITM000048', '13: Keyword Research and Analysis', '2021-08-29 00:40:18'),
(860, 105, 'ITM000048', '14: Search Engine Optimization (SEO)', '2021-08-29 00:40:18'),
(861, 105, 'ITM000048', '15: Off Page SEO Optimization', '2021-08-29 00:40:18'),
(862, 105, 'ITM000048', '16: YouTube Marketing (Channel Optimization)', '2021-08-29 00:40:18'),
(863, 105, 'ITM000048', '17: YouTube Marketing (Video Optimization)', '2021-08-29 00:40:18'),
(864, 105, 'ITM000048', '18: UpWork & Other�s Market Place Overall in details', '2021-08-29 00:40:18'),
(865, 105, 'ITM000051', ' 1: Orientation- Career Support for your life that below& Discuss About Software / Applications', '2021-08-29 00:49:18'),
(866, 105, 'ITM000051', ' 2: Introducing with Photoshop& Document Setup & Related tools ', '2021-08-29 00:49:18'),
(867, 105, 'ITM000051', ' 3: Selection Details& Image Resize', '2021-08-29 00:49:18'),
(868, 105, 'ITM000051', ' 4: Brush Tools', '2021-08-29 00:49:18'),
(869, 105, 'ITM000051', ' 5:  Retouch Image', '2021-08-29 00:49:18'),
(870, 105, 'ITM000051', ' 6: Pen Tool& Path Mode with Related tools- Project- Clipping (a to z) all alphabet', '2021-08-29 00:49:18'),
(871, 105, 'ITM000051', ' 7: History Brush Tool& Art History Brush Tool with Related Tools- Project- 10 Image Adjustment', '2021-08-29 00:49:18'),
(872, 105, 'ITM000051', ' 8: Type Tools& Character Palate & Eraser Tools- Project- Create 5 Paper Ad Design', '2021-08-29 00:49:18'),
(873, 105, 'ITM000051', ' 9: Layer Palate& Layer Lock- Project- Image Manipulation', '2021-08-29 00:49:18'),
(874, 105, 'ITM000051', ' 10: Layer Palate& Blend Option with Related Tools- ', '2021-08-29 00:49:18'),
(875, 105, 'ITM000051', ' 11:Project- Login Page and Icon Design', '2021-08-29 00:49:18'),
(876, 105, 'ITM000051', ' 12: Chanel& Alpha Channel- Project- Hair Masking with Using Alpha Channel', '2021-08-29 00:49:18'),
(877, 105, 'ITM000051', ' 13: Animation& Save for Web- Project- Animated Web Ad', '2021-08-29 00:49:19'),
(878, 105, 'ITM000051', ' 14: Image Manu& Layer Manu- Project- Text Effects and Image Effects', '2021-08-29 00:49:19'),
(879, 105, 'ITM000051', ' 15: Part One: Discuss About Logo Design- Part Two: Contest of Marketplace', '2021-08-29 00:49:19'),
(880, 105, 'ITM000051', ' 16: About Basic Color Theory& What�s the meaning of colors? & How to matching color in design', '2021-08-29 00:49:19'),
(881, 105, 'ITM000051', ' 17: Discuss About Adobe XD& How to Use adobe xd?', '2021-08-29 00:49:19'),
(882, 105, 'ITM000051', ' 18: About Basic Typography& What�s the difference between& typeface & font? & What�s the difference between serif &', '2021-08-29 00:49:19'),
(883, 105, 'ITM000051', ' 19: Discuss About Bootstrap Grid Professional Web Layout Design', '2021-08-29 00:49:19'),
(884, 105, 'ITM000051', ' 20: Discuss About Adobe Illustrator& What�s different between Photoshop & illustrator?', '2021-08-29 00:49:19'),
(885, 105, 'ITM000051', ' 21: Part One: Logo Design & Business Card& Part Two: Banner Design & Resume Design', '2021-08-29 00:49:19'),
(886, 105, 'ITM000051', ' 23: Discuss About Marketplace', '2021-08-29 00:49:19'),
(887, 105, 'ITM000051', ' 24: How to submit your projects.', '2021-08-29 00:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `mlminfo`
--

CREATE TABLE `mlminfo` (
  `distrisl` bigint(20) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xpassword` varchar(264) COLLATE utf8_unicode_ci NOT NULL,
  `xshort` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdob` date DEFAULT NULL,
  `xadd1` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillingadd` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeliveryadd` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtitle` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xtaxno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgcus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpricegroup` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcustype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xindustryseg` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscountpct` double(18,6) DEFAULT NULL,
  `xagent` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcommisionpct` double(18,6) DEFAULT NULL,
  `xcreditlimit` double(18,6) DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zrole` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsquestion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `membertype` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Member Customer',
  `cbin` int(11) NOT NULL,
  `xbank` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xacc` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlmpool`
--

CREATE TABLE `mlmpool` (
  `xsl` int(11) NOT NULL,
  `poolsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `distrisl` int(11) NOT NULL,
  `up_distrisl` int(11) NOT NULL DEFAULT 0,
  `p_distrisl` int(11) NOT NULL DEFAULT 0,
  `d_distrisl1` int(11) NOT NULL DEFAULT 0,
  `d_distrisl2` int(11) NOT NULL DEFAULT 0,
  `d_distrisl3` int(11) NOT NULL DEFAULT 0,
  `pool_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pool` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pool_date` date NOT NULL,
  `xrem` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xper` int(2) NOT NULL,
  `xyear` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtotrep`
--

CREATE TABLE `mlmtotrep` (
  `xcomsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `xdate` date NOT NULL,
  `stno` int(4) NOT NULL,
  `distrisl` int(11) NOT NULL,
  `xrdin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `refbin` int(11) NOT NULL DEFAULT 0,
  `left_point` double NOT NULL DEFAULT 0,
  `right_point` double NOT NULL DEFAULT 0,
  `flush_point` double NOT NULL DEFAULT 0,
  `executivetype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcom` double NOT NULL,
  `xsrctaxpct` double NOT NULL DEFAULT 0,
  `xservicechg` double NOT NULL DEFAULT 0,
  `xotherchg` double NOT NULL DEFAULT 0,
  `xcomtype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xuserstatus` int(1) NOT NULL DEFAULT 1,
  `xsign` int(1) NOT NULL DEFAULT 1,
  `xpaidstatus` int(1) NOT NULL DEFAULT 1,
  `xwithdrawaltype` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpaidby` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpaiddate` datetime DEFAULT NULL,
  `xacc` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbank` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbankbr` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xotn` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtree`
--

CREATE TABLE `mlmtree` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `bin` int(11) NOT NULL,
  `distrisl` bigint(20) NOT NULL,
  `upbin` int(11) NOT NULL DEFAULT 0,
  `updistrisl` bigint(20) NOT NULL DEFAULT 0,
  `upbc` int(4) NOT NULL DEFAULT 0,
  `leftbin` int(11) NOT NULL DEFAULT 0,
  `leftdistrisl` bigint(20) NOT NULL DEFAULT 0,
  `rightbin` int(11) NOT NULL DEFAULT 0,
  `rightdistrisl` bigint(20) NOT NULL DEFAULT 0,
  `refbin` int(11) NOT NULL DEFAULT 0,
  `refdistrisl` bigint(20) NOT NULL DEFAULT 0,
  `side` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `bc` int(4) NOT NULL,
  `treeposition` int(11) NOT NULL DEFAULT 0,
  `binpoint` int(6) NOT NULL DEFAULT 0,
  `centerpoint` int(6) NOT NULL DEFAULT 0,
  `leftcurpoint` bigint(20) NOT NULL DEFAULT 0,
  `rightcurpoint` bigint(20) NOT NULL DEFAULT 0,
  `lefthitpoint` bigint(20) NOT NULL DEFAULT 0,
  `righthitpoint` bigint(20) NOT NULL DEFAULT 0,
  `lefttotalpoint` bigint(20) NOT NULL DEFAULT 0,
  `righttotalpoint` bigint(20) NOT NULL DEFAULT 0,
  `leftflushpoint` bigint(20) NOT NULL DEFAULT 0,
  `rightflushpoint` bigint(20) NOT NULL DEFAULT 0,
  `leftcstpoint` bigint(20) DEFAULT 0,
  `rightcstpoint` bigint(20) NOT NULL DEFAULT 0,
  `basiccom` int(11) NOT NULL DEFAULT 0,
  `mlevel` int(2) NOT NULL DEFAULT 0,
  `fm` int(8) NOT NULL DEFAULT 0,
  `refcom` int(6) NOT NULL DEFAULT 0,
  `stno` int(8) NOT NULL DEFAULT 1,
  `xyear` int(4) NOT NULL DEFAULT 2017,
  `xper` int(2) NOT NULL DEFAULT 2,
  `bpointval` double NOT NULL DEFAULT 0,
  `sppointval` double NOT NULL DEFAULT 0,
  `executivetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Primary Distributor',
  `xuser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `binstatus` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Regular',
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xpoint` int(6) NOT NULL,
  `newentry` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Triggers `mlmtree`
--
DELIMITER $$
CREATE TRIGGER `treegen` AFTER INSERT ON `mlmtree` FOR EACH ROW BEGIN

   DECLARE done INT DEFAULT 0;	
   DECLARE vBin int(11);
   DECLARE cur_treegen cursor for select upbin from mlmtreegen where bin=NEW.upbin;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;
   
   insert into mlmtreegen (bizid, bin, upbin) values(NEW.bizid, NEW.bin, NEW.upbin);
   OPEN cur_treegen;
   
   cursor_loop: LOOP
   
	fetch cur_treegen into vBin;
	
		IF done = 1 THEN
            LEAVE cursor_loop;
        END IF;
	
	insert into mlmtreegen (bizid, bin, upbin) values(NEW.bizid, NEW.bin, vBin);
   
   END LOOP;
   
   CLOSE cur_treegen;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mlmtreegen1`
--

CREATE TABLE `mlmtreegen1` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `gensl` bigint(20) UNSIGNED NOT NULL,
  `bin` int(11) NOT NULL,
  `upbin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci
PARTITION BY RANGE COLUMNS(`upbin`)
(
PARTITION p777 VALUES LESS THAN (778) ENGINE=InnoDB,
PARTITION p780 VALUES LESS THAN (780) ENGINE=InnoDB,
PARTITION p785 VALUES LESS THAN (785) ENGINE=InnoDB,
PARTITION p790 VALUES LESS THAN (790) ENGINE=InnoDB,
PARTITION p1000 VALUES LESS THAN (1000) ENGINE=InnoDB,
PARTITION p1500 VALUES LESS THAN (1500) ENGINE=InnoDB,
PARTITION p2500 VALUES LESS THAN (2500) ENGINE=InnoDB,
PARTITION p25000 VALUES LESS THAN (25000) ENGINE=InnoDB,
PARTITION p50000 VALUES LESS THAN (50000) ENGINE=InnoDB,
PARTITION p100000 VALUES LESS THAN (100000) ENGINE=InnoDB,
PARTITION p500000 VALUES LESS THAN (500000) ENGINE=InnoDB,
PARTITION p1000000 VALUES LESS THAN (1000000) ENGINE=InnoDB,
PARTITION p1500000 VALUES LESS THAN (1500000) ENGINE=InnoDB,
PARTITION p2000000 VALUES LESS THAN (2000000) ENGINE=InnoDB,
PARTITION p2500000 VALUES LESS THAN (2500000) ENGINE=InnoDB,
PARTITION p3000000 VALUES LESS THAN (3000000) ENGINE=InnoDB
);

-- --------------------------------------------------------

--
-- Table structure for table `mlmtreeref`
--

CREATE TABLE `mlmtreeref` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `refsl` bigint(20) UNSIGNED NOT NULL,
  `bin` int(11) NOT NULL,
  `refbin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `xsl` bigint(20) NOT NULL,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `xtime` time NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatch` int(6) NOT NULL,
  `xtitle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `xdescription` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`xsl`, `bizid`, `ztime`, `zemail`, `zutime`, `xemail`, `xdate`, `xtime`, `xitemcode`, `xbatch`, `xtitle`, `xdescription`, `zactive`) VALUES
(10, 100, '2021-09-26 06:33:32', 'rajib@dbs.com', NULL, NULL, '2021-09-16', '15:47:33', '4', 4, 'Dot BD Solutions Website Development', 'Thank you, Vismita.&nbsp;Yes, this indeed is one of the most popular questions.&nbsp;There are three categories of testing, if&nbsp;I would want to simplify them. The first one is to identify whether&nbsp;the actual COVID virus&nbsp;genetic material exists, and that&#39;s called a&nbsp;NAAT test, N-A-A-T. And it&#39;s the PCR testing where&nbsp;you would have a nasal pharyngeal swab&nbsp;or a pharyngeal swab&nbsp;taken. And then they look for the genetic material of the virus itself.The second type of testing is when&nbsp;they try to identify one of the outer proteins of the viral shell or envelope, if you will. And that&#39;s called antigen testing. So,&nbsp;they try to detect the outer protein of the virus. And the third type is to detect within the human body, whether&nbsp;they&rsquo;ve developed antibodies. So, it looks for antibodies that are specific to the outer portion of the virus itself. So, it shows whether the individual has mounted an immune response or developed immunity towards that specific virus or to COVID. So, those are the three big categories of testing that exist.\r\n', 1),
(11, 100, '2021-09-22 11:50:37', 'rajib@dbs.com', NULL, NULL, '2021-09-22', '17:50:37', '4', 3, 'Softvivid Website Development', 'fDFEFB AVW\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoiceno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoicesl` int(11) DEFAULT NULL,
  `zid` int(6) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopadd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `xstatusord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xordernum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xroword` int(5) DEFAULT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `salestype` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillrun` int(5) DEFAULT NULL,
  `xsign` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction_temp`
--

CREATE TABLE `order_transaction_temp` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `invoiceno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invoicesl` int(11) DEFAULT NULL,
  `zid` int(6) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopadd` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `prdname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `xstatusord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xordernum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xroword` int(5) DEFAULT NULL,
  `xterminal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `salestype` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbillrun` int(5) DEFAULT NULL,
  `xsign` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_transaction_temp`
--

INSERT INTO `order_transaction_temp` (`xsl`, `ztime`, `invoiceno`, `invoicesl`, `zid`, `username`, `shopid`, `shopname`, `shopadd`, `prdid`, `prdname`, `qty`, `price`, `xstatusord`, `xordernum`, `xroword`, `xterminal`, `xdate`, `salestype`, `xbillrun`, `xsign`) VALUES
(36, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-005', 'Amarbazar Startup Training Course', 5, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL),
(35, '2018-06-07 08:57:33', 'T0024', 4, 100, 'rajib', 'DIN0000001', 'MS MAA STORE', '', 'ABL-STC-004', 'Amarbazar Startup Training Course', 2, 1200, 'New', '', 0, 'T002', '2018-06-07', 'MRP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `osptxn`
--

CREATE TABLE `osptxn` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `stno` int(8) NOT NULL,
  `xdate` date NOT NULL,
  `xrdin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xtxntype` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xsign` int(2) NOT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xdocno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoctype` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pabuziness`
--

CREATE TABLE `pabuziness` (
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `xdate` date NOT NULL,
  `bizshort` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bizlong` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bizadd1` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bizadd2` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizdistrict` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizthana` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizemail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizfax` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizphone1` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizphone2` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizmobile` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizcur` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `bizvatpct` double NOT NULL DEFAULT 0,
  `biztaxnum` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizchkinv` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NO',
  `bizdecimals` int(1) NOT NULL DEFAULT 2,
  `bizitemauto` enum('YES','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'YES',
  `bizcusauto` enum('YES','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'YES',
  `bizsupauto` enum('YES','NO') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'YES',
  `bizdateformat` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'dd-MM-yyyy',
  `bizyearoffset` int(2) NOT NULL DEFAULT 6,
  `xbin` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbinimage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtin` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtinimage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtradelic` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtradelicexpdate` date DEFAULT NULL,
  `xtradelicimage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrjsc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrjscimage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xassocno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xassocexpdate` date DEFAULT NULL,
  `xassocimage` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pabuziness`
--

INSERT INTO `pabuziness` (`bizid`, `ztime`, `zutime`, `xdate`, `bizshort`, `bizlong`, `bizadd1`, `bizadd2`, `bizdistrict`, `bizthana`, `bizemail`, `bizfax`, `bizphone1`, `bizphone2`, `bizmobile`, `bizcur`, `bizvatpct`, `biztaxnum`, `bizchkinv`, `bizdecimals`, `bizitemauto`, `bizcusauto`, `bizsupauto`, `bizdateformat`, `bizyearoffset`, `xbin`, `xbinimage`, `xtin`, `xtinimage`, `xtradelic`, `xtradelicexpdate`, `xtradelicimage`, `xrjsc`, `xrjscimage`, `xassocno`, `xassocexpdate`, `xassocimage`, `zactive`) VALUES
(100, '2016-09-18 05:34:10', NULL, '2016-09-18', 'NX', 'ANNEX', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1),
(101, '2016-09-18 05:34:10', NULL, '2016-09-18', 'ABC', 'ABCL IT', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1),
(102, '2016-09-18 05:34:10', NULL, '2016-09-18', 'NG', 'NEXTGEN IT', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1),
(103, '2016-09-18 05:34:10', NULL, '2016-09-18', 'FU', 'FUTURE IT', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1),
(104, '2016-09-18 05:34:10', NULL, '2016-09-18', 'SC', 'SCHOLAR IT', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1),
(105, '2016-09-18 05:34:10', NULL, '2016-09-18', 'HB', 'HARBOUR IT', 'House# 42, Road# 2, Block# B, Niketon, Gulshan-1, Dhaka', NULL, NULL, NULL, 'contact@dotademy.com', NULL, '8801841923270', NULL, '8801841923270', 'BDT', 0, NULL, 'YES', 2, 'NO', 'YES', 'YES', 'dd-MM-yyyy', 6, NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pamenus`
--

CREATE TABLE `pamenus` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `zrole` varchar(100) NOT NULL,
  `xmenuindex` int(5) NOT NULL DEFAULT 0,
  `xsubmenuindex` int(5) NOT NULL DEFAULT 0,
  `xmenu` varchar(250) NOT NULL,
  `xsubmenu` varchar(250) NOT NULL,
  `xurl` varchar(500) NOT NULL,
  `xmenuserial` bigint(20) UNSIGNED NOT NULL,
  `xmenutype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pamenus`
--

INSERT INTO `pamenus` (`ztime`, `bizid`, `zrole`, `xmenuindex`, `xsubmenuindex`, `xmenu`, `xsubmenu`, `xurl`, `xmenuserial`, `xmenutype`) VALUES
('2019-09-29 04:19:45', 100, 'ADMIN', 11, 1, 'Approval', 'Approval List', 'approvallist', 5275, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 2, 'Attendance', 'Attendance Update', 'stuattupdate', 5220, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 7, 'Attendance', 'Daily Absent Report', 'dailyabsentreport', 5226, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 3, 'Attendance', 'Daily Attendance Report', 'viewatt', 5221, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 5, 'Attendance', 'Daily Late Report', 'dailylatereport', 5224, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 6, 'Attendance', 'Daily Present Report', 'dailypresentreport', 5225, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 1, 'Attendance', 'Employee Attendance', 'stuatt', 5219, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 8, 'Attendance', 'Employee Late Report', 'emplatereport', 5227, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 4, 'Attendance', 'Employee Leave Report', 'empsummary', 5222, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 9, 'Attendance', 'Employee Present Report', 'singlepresentreport', 5228, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 4, 'Attendance', 'Monthly Attendance Report', 'employeedeviceatt', 5223, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 6, 'Core Settings', 'Approval Setup', 'approvalsetup', 5235, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 5, 'Core Settings', 'Business Page', 'bizdef', 5234, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 2, 'Core Settings', 'Customer Database', 'customers', 5231, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 1, 'Core Settings', 'Item Database', 'items', 5229, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 2, 'Core Settings', 'School wise Item Mapping', 'itemscmap', 5230, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 3, 'Core Settings', 'Supplier Database', 'suppliers', 5232, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 2, 4, 'Core Settings', 'Tax Setup', 'taxcode', 5233, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 13, 'General Settings', 'Bank', 'code/index/Bank', 5188, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 5, 'General Settings', 'BOM Cost Head', 'code/index/BOM Cost Head', 5178, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 20, 'General Settings', 'Branch', 'code/index/Branch', 5195, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 11, 'General Settings', 'Class', 'code/index/Class', 5184, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 4, 'General Settings', 'Color', 'code/index/Color', 5177, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 6, 'General Settings', 'Currency', 'code/index/Currency', 5179, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 21, 'General Settings', 'Customer Group', 'code/index/Customer Group', 5196, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 11, 'General Settings', 'Customer Prefix', 'code/index/Customer Prefix', 5186, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 23, 'General Settings', 'Designation', 'code/index/Designation', 5198, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 27, 'General Settings', 'Employee Group', 'code/index/Employee Group', 5202, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 3, 'General Settings', 'GL Prefix', 'code/index/GL Prefix', 5176, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 15, 'General Settings', 'IM Receive Prefix', 'code/index/IM Receive Prefix', 5190, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 16, 'General Settings', 'IM Transfer Prefix', 'code/index/IM Transfer Prefix', 5191, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 12, 'General Settings', 'Item Brand', 'code/index/Item Brand', 5187, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 1, 'General Settings', 'Item Category', 'code/index/Item Category', 5174, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 9, 'General Settings', 'Item Prefix', 'code/index/Item Prefix', 5182, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 8, 'General Settings', 'Item Size', 'code/index/Item Size', 5181, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 24, 'General Settings', 'Nationality', 'code/index/Nationality', 5199, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 22, 'General Settings', 'Occupation', 'code/index/Occupation', 5197, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 7, 'General Settings', 'PO Cost Head', 'code/index/PO Cost Head', 5180, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 2, 'General Settings', 'Project', 'code/index/Project', 5175, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 17, 'General Settings', 'Purchase Prefix', 'code/index/Purchase Prefix', 5192, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 25, 'General Settings', 'Religion', 'code/index/Religion', 5200, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 18, 'General Settings', 'Sales Prefix', 'code/index/Sales Prefix', 5193, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 10, 'General Settings', 'School', 'code/index/School', 5183, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 28, 'General Settings', 'Shift', 'code/index/Shift', 5203, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 10, 'General Settings', 'Supplier Prefix', 'code/index/Supplier Prefix', 5185, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 14, 'General Settings', 'UOM', 'code/index/UOM', 5189, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 26, 'General Settings', 'Upload Data', 'uploaddata', 5201, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 1, 19, 'General Settings', 'Warehouse', 'code/index/Warehouse', 5194, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 7, 4, 'GL Interface', 'DO Return Interface', 'glinterface/index/DO Return Interface', 5261, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 7, 3, 'GL Interface', 'GL DO Interface', 'glinterface/index/GL DO Interface', 5260, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 7, 2, 'GL Interface', 'GL GRN Interface', 'glinterface/index/GL GRN Interface', 5259, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 7, 1, 'GL Interface', 'GL Sales Interface', 'glinterface/index/GL Sales Interface', 5258, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 7, 5, 'GL Interface', 'PO Return Interface', 'glinterface/index/PO Return Interface', 5262, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 6, 1, 'GL Settings', 'Acc Level1', 'code/index/Acc Level1', 5253, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 6, 2, 'GL Settings', 'Acc Level2', 'code/index/Acc Level2', 5254, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 6, 3, 'GL Settings', 'Acc Level3', 'code/index/Acc Level3', 5255, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 6, 4, 'GL Settings', 'Chart Of Accounts', 'glchart', 5256, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 6, 5, 'GL Settings', 'Sub Account', 'glchartsub', 5257, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 8, 'Gneneral Ledger', 'Cheque Register', 'glchequeregister', 5270, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 9, 'Gneneral Ledger', 'GL Reports', 'glrpt', 5272, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 8, 'Gneneral Ledger', 'Inter Business JV', 'glinterbusiness', 5271, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 2, 'Gneneral Ledger', 'Journal Voucher', 'gljvvou', 5264, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 3, 'Gneneral Ledger', 'JV Single Entry', 'gljvsingle', 5265, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 1, 'Gneneral Ledger', 'Opening Balance', 'glopening', 5263, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 3, 'Gneneral Ledger', 'Payment Voucher', 'glpayvou', 5266, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 4, 'Gneneral Ledger', 'Receipt Voucher', 'glrcptvou', 5267, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 6, 'Gneneral Ledger', 'Trade Payment', 'glrpayvoutrade', 5268, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 8, 7, 'Gneneral Ledger', 'Trade Receipt', 'glrcptvoutrade', 5269, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 22, 2, 'HRM Settings', 'Apply For Leave', 'leaveapply', 5205, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 4, 'HRM Settings', 'Create Leave Policy', 'empleavepolicy', 5207, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 3, 'HRM Settings', 'Employee Duty Time', 'empdutytime', 5212, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 1, 'HRM Settings', 'Employee Prefix', 'code/index/Employee Prefix', 5210, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 3, 'HRM Settings', 'Holiday Setup', 'holiday', 5209, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 3, 'HRM Settings', 'Leave Policy Name', 'code/index/Leave Policy Name', 5206, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 1, 'HRM Settings', 'Leave Type', 'code/index/Leave Type', 5204, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 2, 'HRM Settings', 'Off Day', 'code/index/Off Day', 5208, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 3, 'HRM Settings', 'Salary Head', 'fasalaryhead', 5215, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 2, 'HRM Settings', 'Salary Package Name', 'code/index/Salary Package Name', 5214, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 4, 'HRM Settings', 'Salary Package Setup', 'fasalarypackage', 5216, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 20, 1, 'HRM Settings', 'Salary Type', 'code/index/Salary Type', 5213, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 21, 1, 'Human Resource', 'Add Employee', 'stuemployee', 5211, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 21, 3, 'Human Resource', 'Salary Pay Voucher', 'salarypay', 5218, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 21, 2, 'Human Resource', 'Salary Process', 'fasalaryprocess', 5217, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 5, 5, 'Inventory', 'Inventory Reports', 'imrpt', 5252, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 5, 4, 'Inventory', 'Stock Status', 'imstock', 5251, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 5, 3, 'Inventory', 'Stock Transfer', 'diststocktransfer', 5250, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 4, 'Purchase', 'Additional Purchase Cost', 'purchasecost', 5239, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 5, 'Purchase', 'Goods Receipt Note', 'purchasegrn', 5240, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 3, 'Purchase', 'International Purchase', 'purchaseint', 5238, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 2, 'Purchase', 'Local Purchase', 'purchase', 5237, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 7, 'Purchase', 'Purchase Reports', 'porpt', 5242, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 1, 'Purchase', 'Purchase Requisition', 'distreq', 5236, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 3, 6, 'Purchase', 'Purchase Return', 'purchasereturn', 5241, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 3, 'Sales', 'Delivery Order', 'imreqdo', 5245, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 4, 'Sales', 'Delivery Return', 'imreturn', 5246, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 5, 'Sales', 'Employee Movement Map', 'movementmap', 5247, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 2, 'Sales', 'Sales Order', 'sales', 5244, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 1, 'Sales', 'Sales Quotation', 'salesquot', 5243, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 6, 'Sales', 'Sales Reports', 'sorpt', 5248, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 4, 7, 'Sales', 'School Sales', 'schoolsales', 5249, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 10, 2, 'User Roles', 'Role Management', 'role', 5274, 'Main Menu'),
('2019-09-29 04:19:45', 100, 'ADMIN', 10, 1, 'User Roles', 'User Management', 'user', 5273, 'Main Menu');

-- --------------------------------------------------------

--
-- Table structure for table `paroles`
--

CREATE TABLE `paroles` (
  `xroleid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` timestamp NULL DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `zrole` varchar(100) CHARACTER SET latin1 NOT NULL,
  `xkeymenu` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `xsubmenu` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(100) COLLATE utf8_unicode_ci DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paroles`
--

INSERT INTO `paroles` (`xroleid`, `ztime`, `zutime`, `zemail`, `xemail`, `bizid`, `zrole`, `xkeymenu`, `xsubmenu`, `xrecflag`) VALUES
(110, '2020-04-25 11:28:43', NULL, NULL, NULL, 100, 'ADMIN', 'a:3:{i:0;a:3:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";s:15:\"User Management\";s:3:\"url\";s:10:\"manageuser\";s:2:\"id\";s:10:\"manageuser\";}i:1;a:5:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";s:15:\"Role Management\";s:3:\"url\";s:10:\"managerole\";s:2:\"id\";s:10:\"managerole\";}}}i:1;a:3:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";s:11:\"Sales Order\";s:3:\"url\";s:10:\"salesorder\";s:2:\"id\";s:10:\"salesorder\";}i:1;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";s:12:\"Sales Return\";s:3:\"url\";s:11:\"salesreturn\";s:2:\"id\";s:11:\"salesreturn\";}}}i:2;a:3:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";s:17:\"Daily Sales Order\";s:3:\"url\";s:11:\"dsalesorder\";s:2:\"id\";s:11:\"dsalesorder\";}i:1;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";s:18:\"Daily Sales Return\";s:3:\"url\";s:12:\"dsalesreturn\";s:2:\"id\";s:12:\"dsalesreturn\";}}}}', NULL, 'Live'),
(117, '2020-04-28 12:20:34', NULL, NULL, NULL, 100, 'ADMIN_ROLE', 'a:3:{i:0;a:3:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";s:15:\"User Management\";s:3:\"url\";s:10:\"manageuser\";s:2:\"id\";s:10:\"manageuser\";}i:1;a:5:{s:6:\"module\";s:11:\"User & Role\";s:9:\"submodule\";s:22:\"User & Role Management\";s:4:\"menu\";s:15:\"Role Management\";s:3:\"url\";s:10:\"managerole\";s:2:\"id\";s:10:\"managerole\";}}}i:1;a:3:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";s:11:\"Sales Order\";s:3:\"url\";s:10:\"salesorder\";s:2:\"id\";s:10:\"salesorder\";}i:1;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:16:\"Sales Management\";s:4:\"menu\";s:12:\"Sales Return\";s:3:\"url\";s:11:\"salesreturn\";s:2:\"id\";s:11:\"salesreturn\";}}}i:2;a:3:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";a:2:{i:0;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";s:17:\"Daily Sales Order\";s:3:\"url\";s:11:\"dsalesorder\";s:2:\"id\";s:11:\"dsalesorder\";}i:1;a:5:{s:6:\"module\";s:5:\"Sales\";s:9:\"submodule\";s:12:\"Sales Report\";s:4:\"menu\";s:18:\"Daily Sales Return\";s:3:\"url\";s:12:\"dsalesreturn\";s:2:\"id\";s:12:\"dsalesreturn\";}}}}', NULL, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `pausers`
--

CREATE TABLE `pausers` (
  `xusersl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` timestamp NULL DEFAULT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xuserrow` int(5) NOT NULL DEFAULT 0,
  `zemail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zpassword` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zrole` varchar(100) NOT NULL DEFAULT '',
  `xbranch` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(1) NOT NULL DEFAULT 1,
  `zuserfullname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zusermobile` varchar(17) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zuseradd` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zaltemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `zcomments` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'Live',
  `token` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pausers`
--

INSERT INTO `pausers` (`xusersl`, `ztime`, `zutime`, `xemail`, `bizid`, `xuserrow`, `zemail`, `zpassword`, `zrole`, `xbranch`, `zactive`, `zuserfullname`, `zusermobile`, `zuseradd`, `zaltemail`, `zcomments`, `xrecflag`, `token`) VALUES
(747, '2021-02-27 11:50:46', NULL, NULL, 100, 592, 'ashraf', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'Admin', 'Amarbazar Head Office', 1, 'Md Ashraful Amin', '016211777777', '', 'a@a.com', NULL, 'Live', '123456'),
(635, '2017-07-18 05:53:01', NULL, NULL, 100, 593, 'rajib@dbs.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ADMIN', 'Head Office', 1, 'Md Rajibul Islam', '0', '', '', '', 'Live', '123456'),
(751, '2017-07-18 05:53:01', NULL, NULL, 101, 593, 'rajib@dbs.com', '1fa960236a09c331615f60afabd0e7e7ffa3f7d508e520d06ea566490c418c67', 'ADMIN', 'Head Office', 1, 'Md Rajibul Islam', '0', '', '', '', 'Live', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `pmbomdet`
--

CREATE TABLE `pmbomdet` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `xbomdetsl` bigint(20) UNSIGNED NOT NULL,
  `xbomcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrawitem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrow` int(3) NOT NULL,
  `xqty` double NOT NULL,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xconversion` double NOT NULL,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` bit(1) NOT NULL DEFAULT b'1',
  `xitemtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pmbomdet`
--

INSERT INTO `pmbomdet` (`ztime`, `bizid`, `xbomdetsl`, `xbomcode`, `xrawitem`, `xitembatch`, `xrow`, `xqty`, `xstdcost`, `xconversion`, `xunit`, `zactive`, `xitemtype`) VALUES
('2018-04-05 11:34:07', 100, 20, '76865', 'Electricity And Utility Bill', '', 2, 1, 500, 1, 'PCS', b'1', 'Production Cost'),
('2018-04-05 11:30:11', 100, 19, '76865', 'ULB-LSBT-100', '', 1, 8, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:08:51', 100, 16, 'BOM-000001', 'Electricity And Utility Bill', '', 4, 1, 1.34, 1, 'Container', b'1', 'Production Cost'),
('2018-03-03 07:07:32', 100, 15, 'BOM-000001', 'SCL-RCRP-100', '', 3, 2.5, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:07:19', 100, 14, 'BOM-000001', 'ULB-LSBT-100', '', 2, 2, 0, 1, '', b'1', 'Raw Material'),
('2018-03-03 07:07:11', 100, 13, 'BOM-000001', 'ULB-WLB-130', '', 1, 3, 0, 1, '', b'1', 'Raw Material'),
('2018-04-02 10:55:10', 100, 17, 'BOM-000002', 'ULB-WLB-130', '', 1, 3, 0, 1, '', b'1', 'Raw Material'),
('2018-04-02 10:58:23', 100, 18, 'BOM-000003', 'STL-CBS-130', '', 1, 1, 0, 1, '', b'1', 'Raw Material');

-- --------------------------------------------------------

--
-- Table structure for table `pmbommst`
--

CREATE TABLE `pmbommst` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `xbomsl` bigint(20) UNSIGNED NOT NULL,
  `xbomcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmodel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` bit(1) NOT NULL DEFAULT b'1',
  `xstatus` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pmbommst`
--

INSERT INTO `pmbommst` (`ztime`, `bizid`, `xbomsl`, `xbomcode`, `xitemcode`, `xmodel`, `zactive`, `xstatus`, `zemail`) VALUES
('2018-04-05 11:30:11', 100, 13, '76865', 'WI-60DK', NULL, b'1', 'Created', 'admin@demo.com'),
('2018-03-03 07:07:11', 100, 10, 'BOM-000001', 'WI-80DK', NULL, b'1', 'Created', 'rajib@pureapp.com'),
('2018-04-02 10:55:09', 100, 11, 'BOM-000002', 'WI-70DK', NULL, b'1', 'Created', 'rajib@dotbdsolutions.com'),
('2018-04-02 10:58:23', 100, 12, 'BOM-000003', 'WI-60DK', NULL, b'1', 'Created', 'rajib@dotbdsolutions.com');

-- --------------------------------------------------------

--
-- Table structure for table `pmfgrdet`
--

CREATE TABLE `pmfgrdet` (
  `xfgrdetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xfgrnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xrawitem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL DEFAULT 0,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xunit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xitemtype` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmfgrmst`
--

CREATE TABLE `pmfgrmst` (
  `xfgrsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xfgrnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatchno` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexpdate` date NOT NULL,
  `xqty` double NOT NULL,
  `xstdcost` double NOT NULL,
  `xstdprice` double NOT NULL DEFAULT 0,
  `xdate` date NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xrawwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pocost`
--

CREATE TABLE `pocost` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(7) NOT NULL,
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcosthead` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xamount` double NOT NULL,
  `xstr` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `podet`
--

CREATE TABLE `podet` (
  `xpodetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xreqqty` double NOT NULL DEFAULT 0,
  `xqty` double NOT NULL,
  `xratepur` double NOT NULL,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xconversion` double NOT NULL DEFAULT 1,
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pogrndet`
--

CREATE TABLE `pogrndet` (
  `xgrndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrowtrn` int(5) NOT NULL DEFAULT 0,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqtypur` double NOT NULL DEFAULT 0,
  `xextqty` double NOT NULL DEFAULT 0,
  `xratepur` double NOT NULL DEFAULT 0,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xconversion` double NOT NULL DEFAULT 1,
  `xqty` double NOT NULL DEFAULT 0,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pogrnmst`
--

CREATE TABLE `pogrnmst` (
  `xgrnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pomst`
--

CREATE TABLE `pomst` (
  `xposl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xponum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xnote` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcdate` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xghodate` date DEFAULT NULL,
  `xdeldate` date DEFAULT NULL,
  `xetd` date DEFAULT NULL,
  `xeta` date DEFAULT NULL,
  `xpino` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpidate` date DEFAULT NULL,
  `xshipterm` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xshipvia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcorto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoradd` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcorphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcorfax` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcoremail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xexch` double DEFAULT 1,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xyear` int(4) NOT NULL DEFAULT 0,
  `xper` int(2) NOT NULL DEFAULT 0,
  `xpotype` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Local Purchase',
  `xprefix` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poreturn`
--

CREATE TABLE `poreturn` (
  `xporeturnsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xporeturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xsupdoc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xlcno` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfinyear` int(4) NOT NULL,
  `xfinper` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poreturndet`
--

CREATE TABLE `poreturndet` (
  `xporeturndetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xporeturnnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xgrnnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrow` int(5) NOT NULL,
  `xrowtrn` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xextqty` double NOT NULL DEFAULT 0,
  `xratepur` double NOT NULL DEFAULT 0,
  `xstdcost` double NOT NULL DEFAULT 0,
  `xtaxrate` double NOT NULL DEFAULT 0,
  `xunitpur` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xunitstk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xconversion` double NOT NULL DEFAULT 1,
  `xqty` double NOT NULL DEFAULT 0,
  `xexch` double NOT NULL DEFAULT 1,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'BDT',
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `power_generation`
--

CREATE TABLE `power_generation` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xdate` date NOT NULL,
  `xhourending` tinyint(3) UNSIGNED NOT NULL,
  `xtime` time NOT NULL,
  `xplant1` decimal(10,4) NOT NULL,
  `xplant2` decimal(10,4) NOT NULL,
  `xcompany` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `power_generation`
--

INSERT INTO `power_generation` (`xsl`, `xdate`, `xhourending`, `xtime`, `xplant1`, `xplant2`, `xcompany`) VALUES
(69121, '2020-01-01', 1, '00:00:00', '149.0000', '199.0000', 'Company 2'),
(69122, '2020-01-01', 1, '00:01:00', '149.0000', '145.0000', 'Company 2'),
(69123, '2020-01-01', 1, '00:02:00', '149.0000', '192.0000', 'Company 2'),
(69124, '2020-01-01', 1, '00:03:00', '149.0000', '336.0000', 'Company 2'),
(69125, '2020-01-01', 1, '00:04:00', '149.0000', '159.0000', 'Company 2'),
(69126, '2020-01-01', 1, '00:05:00', '149.0000', '176.0000', 'Company 2'),
(69127, '2020-01-01', 1, '00:06:00', '149.0000', '246.0000', 'Company 2'),
(69128, '2020-01-01', 1, '00:07:00', '149.0000', '308.0000', 'Company 2'),
(69129, '2020-01-01', 1, '00:08:00', '149.0000', '333.0000', 'Company 2'),
(69130, '2020-01-01', 1, '00:09:00', '149.0000', '316.0000', 'Company 2'),
(69131, '2020-01-01', 1, '00:10:00', '149.0000', '262.0000', 'Company 2'),
(69132, '2020-01-01', 1, '00:11:00', '149.0000', '205.0000', 'Company 2'),
(69133, '2020-01-01', 1, '00:12:00', '149.0000', '246.0000', 'Company 2'),
(69134, '2020-01-01', 1, '00:13:00', '149.0000', '330.0000', 'Company 2'),
(69135, '2020-01-01', 1, '00:14:00', '149.0000', '169.0000', 'Company 2'),
(69136, '2020-01-01', 1, '00:15:00', '149.0000', '300.0000', 'Company 2'),
(69137, '2020-01-01', 1, '00:16:00', '149.0000', '375.0000', 'Company 2'),
(69138, '2020-01-01', 1, '00:17:00', '149.0000', '292.0000', 'Company 2'),
(69139, '2020-01-01', 1, '00:18:00', '149.0000', '204.0000', 'Company 2'),
(69140, '2020-01-01', 1, '00:19:00', '149.0000', '380.0000', 'Company 2'),
(69141, '2020-01-01', 1, '00:20:00', '149.0000', '364.0000', 'Company 2'),
(69142, '2020-01-01', 1, '00:21:00', '149.0000', '249.0000', 'Company 2'),
(69143, '2020-01-01', 1, '00:22:00', '149.0000', '325.0000', 'Company 2'),
(69144, '2020-01-01', 1, '00:23:00', '149.0000', '241.0000', 'Company 2'),
(69145, '2020-01-01', 1, '00:24:00', '149.0000', '169.0000', 'Company 2'),
(69146, '2020-01-01', 1, '00:25:00', '149.0000', '142.0000', 'Company 2'),
(69147, '2020-01-01', 1, '00:26:00', '149.0000', '204.0000', 'Company 2'),
(69148, '2020-01-01', 1, '00:27:00', '149.0000', '375.0000', 'Company 2'),
(69149, '2020-01-01', 1, '00:28:00', '149.0000', '182.0000', 'Company 2'),
(69150, '2020-01-01', 1, '00:29:00', '149.0000', '280.0000', 'Company 2'),
(69151, '2020-01-01', 1, '00:30:00', '149.0000', '272.0000', 'Company 2'),
(69152, '2020-01-01', 1, '00:31:00', '149.0000', '210.0000', 'Company 2'),
(69153, '2020-01-01', 1, '00:32:00', '149.0000', '196.0000', 'Company 2'),
(69154, '2020-01-01', 1, '00:33:00', '149.0000', '155.0000', 'Company 2'),
(69155, '2020-01-01', 1, '00:34:00', '149.0000', '308.0000', 'Company 2'),
(69156, '2020-01-01', 1, '00:35:00', '149.0000', '287.0000', 'Company 2'),
(69157, '2020-01-01', 1, '00:36:00', '149.0000', '355.0000', 'Company 2'),
(69158, '2020-01-01', 1, '00:37:00', '149.0000', '300.0000', 'Company 2'),
(69159, '2020-01-01', 1, '00:38:00', '149.0000', '140.0000', 'Company 2'),
(69160, '2020-01-01', 1, '00:39:00', '149.0000', '185.0000', 'Company 2'),
(69161, '2020-01-01', 1, '00:40:00', '149.0000', '337.0000', 'Company 2'),
(69162, '2020-01-01', 1, '00:41:00', '149.0000', '204.0000', 'Company 2'),
(69163, '2020-01-01', 1, '00:42:00', '149.0000', '301.0000', 'Company 2'),
(69164, '2020-01-01', 1, '00:43:00', '149.0000', '345.0000', 'Company 2'),
(69165, '2020-01-01', 1, '00:44:00', '149.0000', '142.0000', 'Company 2'),
(69166, '2020-01-01', 1, '00:45:00', '149.0000', '334.0000', 'Company 2'),
(69167, '2020-01-01', 1, '00:46:00', '149.0000', '233.0000', 'Company 2'),
(69168, '2020-01-01', 1, '00:47:00', '149.0000', '270.0000', 'Company 2'),
(69169, '2020-01-01', 1, '00:48:00', '149.0000', '319.0000', 'Company 2'),
(69170, '2020-01-01', 1, '00:49:00', '149.0000', '244.0000', 'Company 2'),
(69171, '2020-01-01', 1, '00:50:00', '149.0000', '389.0000', 'Company 2'),
(69172, '2020-01-01', 1, '00:51:00', '149.0000', '311.0000', 'Company 2'),
(69173, '2020-01-01', 1, '00:52:00', '149.0000', '193.0000', 'Company 2'),
(69174, '2020-01-01', 1, '00:53:00', '149.0000', '278.0000', 'Company 2'),
(69175, '2020-01-01', 1, '00:54:00', '149.0000', '324.0000', 'Company 2'),
(69176, '2020-01-01', 1, '00:55:00', '149.0000', '388.0000', 'Company 2'),
(69177, '2020-01-01', 1, '00:56:00', '149.0000', '368.0000', 'Company 2'),
(69178, '2020-01-01', 1, '00:57:00', '149.0000', '205.0000', 'Company 2'),
(69179, '2020-01-01', 1, '00:58:00', '149.0000', '336.0000', 'Company 2'),
(69180, '2020-01-01', 1, '00:59:00', '149.0000', '308.0000', 'Company 2'),
(69181, '2020-01-01', 2, '01:00:00', '149.0000', '264.0000', 'Company 2'),
(69182, '2020-01-01', 2, '01:01:00', '149.0000', '215.0000', 'Company 2'),
(69183, '2020-01-01', 2, '01:02:00', '149.0000', '156.0000', 'Company 2'),
(69184, '2020-01-01', 2, '01:03:00', '149.0000', '236.0000', 'Company 2'),
(69185, '2020-01-01', 2, '01:04:00', '149.0000', '197.0000', 'Company 2'),
(69186, '2020-01-01', 2, '01:05:00', '149.0000', '268.0000', 'Company 2'),
(69187, '2020-01-01', 2, '01:06:00', '149.0000', '352.0000', 'Company 2'),
(69188, '2020-01-01', 2, '01:07:00', '149.0000', '179.0000', 'Company 2'),
(69189, '2020-01-01', 2, '01:08:00', '149.0000', '243.0000', 'Company 2'),
(69190, '2020-01-01', 2, '01:09:00', '149.0000', '322.0000', 'Company 2'),
(69191, '2020-01-01', 2, '01:10:00', '149.0000', '230.0000', 'Company 2'),
(69192, '2020-01-01', 2, '01:11:00', '149.0000', '264.0000', 'Company 2'),
(69193, '2020-01-01', 2, '01:12:00', '149.0000', '385.0000', 'Company 2'),
(69194, '2020-01-01', 2, '01:13:00', '149.0000', '377.0000', 'Company 2'),
(69195, '2020-01-01', 2, '01:14:00', '149.0000', '241.0000', 'Company 2'),
(69196, '2020-01-01', 2, '01:15:00', '149.0000', '233.0000', 'Company 2'),
(69197, '2020-01-01', 2, '01:16:00', '149.0000', '306.0000', 'Company 2'),
(69198, '2020-01-01', 2, '01:17:00', '149.0000', '341.0000', 'Company 2'),
(69199, '2020-01-01', 2, '01:18:00', '149.0000', '203.0000', 'Company 2'),
(69200, '2020-01-01', 2, '01:19:00', '149.0000', '293.0000', 'Company 2'),
(69201, '2020-01-01', 2, '01:20:00', '149.0000', '322.0000', 'Company 2'),
(69202, '2020-01-01', 2, '01:21:00', '149.0000', '367.0000', 'Company 2'),
(69203, '2020-01-01', 2, '01:22:00', '149.0000', '231.0000', 'Company 2'),
(69204, '2020-01-01', 2, '01:23:00', '149.0000', '278.0000', 'Company 2'),
(69205, '2020-01-01', 2, '01:24:00', '149.0000', '220.0000', 'Company 2'),
(69206, '2020-01-01', 2, '01:25:00', '149.0000', '291.0000', 'Company 2'),
(69207, '2020-01-01', 2, '01:26:00', '149.0000', '301.0000', 'Company 2'),
(69208, '2020-01-01', 2, '01:27:00', '149.0000', '330.0000', 'Company 2'),
(69209, '2020-01-01', 2, '01:28:00', '149.0000', '193.0000', 'Company 2'),
(69210, '2020-01-01', 2, '01:29:00', '149.0000', '249.0000', 'Company 2'),
(69211, '2020-01-01', 2, '01:30:00', '149.0000', '300.0000', 'Company 2'),
(69212, '2020-01-01', 2, '01:31:00', '149.0000', '345.0000', 'Company 2'),
(69213, '2020-01-01', 2, '01:32:00', '149.0000', '233.0000', 'Company 2'),
(69214, '2020-01-01', 2, '01:33:00', '149.0000', '204.0000', 'Company 2'),
(69215, '2020-01-01', 2, '01:34:00', '149.0000', '248.0000', 'Company 2'),
(69216, '2020-01-01', 2, '01:35:00', '149.0000', '220.0000', 'Company 2'),
(69217, '2020-01-01', 2, '01:36:00', '149.0000', '159.0000', 'Company 2'),
(69218, '2020-01-01', 2, '01:37:00', '149.0000', '266.0000', 'Company 2'),
(69219, '2020-01-01', 2, '01:38:00', '149.0000', '216.0000', 'Company 2'),
(69220, '2020-01-01', 2, '01:39:00', '149.0000', '182.0000', 'Company 2'),
(69221, '2020-01-01', 2, '01:40:00', '149.0000', '279.0000', 'Company 2'),
(69222, '2020-01-01', 2, '01:41:00', '149.0000', '274.0000', 'Company 2'),
(69223, '2020-01-01', 2, '01:42:00', '149.0000', '338.0000', 'Company 2'),
(69224, '2020-01-01', 2, '01:43:00', '149.0000', '284.0000', 'Company 2'),
(69225, '2020-01-01', 2, '01:44:00', '149.0000', '354.0000', 'Company 2'),
(69226, '2020-01-01', 2, '01:45:00', '149.0000', '323.0000', 'Company 2'),
(69227, '2020-01-01', 2, '01:46:00', '149.0000', '180.0000', 'Company 2'),
(69228, '2020-01-01', 2, '01:47:00', '149.0000', '172.0000', 'Company 2'),
(69229, '2020-01-01', 2, '01:48:00', '149.0000', '307.0000', 'Company 2'),
(69230, '2020-01-01', 2, '01:49:00', '149.0000', '255.0000', 'Company 2'),
(69231, '2020-01-01', 2, '01:50:00', '149.0000', '232.0000', 'Company 2'),
(69232, '2020-01-01', 2, '01:51:00', '149.0000', '205.0000', 'Company 2'),
(69233, '2020-01-01', 2, '01:52:00', '149.0000', '235.0000', 'Company 2'),
(69234, '2020-01-01', 2, '01:53:00', '149.0000', '217.0000', 'Company 2'),
(69235, '2020-01-01', 2, '01:54:00', '149.0000', '258.0000', 'Company 2'),
(69236, '2020-01-01', 2, '01:55:00', '149.0000', '187.0000', 'Company 2'),
(69237, '2020-01-01', 2, '01:56:00', '149.0000', '161.0000', 'Company 2'),
(69238, '2020-01-01', 2, '01:57:00', '149.0000', '229.0000', 'Company 2'),
(69239, '2020-01-01', 2, '01:58:00', '149.0000', '212.0000', 'Company 2'),
(69240, '2020-01-01', 2, '01:59:00', '149.0000', '148.0000', 'Company 2'),
(69241, '2020-01-01', 3, '02:00:00', '149.0000', '266.0000', 'Company 2'),
(69242, '2020-01-01', 3, '02:01:00', '149.0000', '257.0000', 'Company 2'),
(69243, '2020-01-01', 3, '02:02:00', '149.0000', '172.0000', 'Company 2'),
(69244, '2020-01-01', 3, '02:03:00', '149.0000', '315.0000', 'Company 2'),
(69245, '2020-01-01', 3, '02:04:00', '149.0000', '185.0000', 'Company 2'),
(69246, '2020-01-01', 3, '02:05:00', '149.0000', '235.0000', 'Company 2'),
(69247, '2020-01-01', 3, '02:06:00', '149.0000', '312.0000', 'Company 2'),
(69248, '2020-01-01', 3, '02:07:00', '149.0000', '271.0000', 'Company 2'),
(69249, '2020-01-01', 3, '02:08:00', '149.0000', '293.0000', 'Company 2'),
(69250, '2020-01-01', 3, '02:09:00', '149.0000', '328.0000', 'Company 2'),
(69251, '2020-01-01', 3, '02:10:00', '149.0000', '224.0000', 'Company 2'),
(69252, '2020-01-01', 3, '02:11:00', '149.0000', '173.0000', 'Company 2'),
(69253, '2020-01-01', 3, '02:12:00', '149.0000', '360.0000', 'Company 2'),
(69254, '2020-01-01', 3, '02:13:00', '149.0000', '352.0000', 'Company 2'),
(69255, '2020-01-01', 3, '02:14:00', '149.0000', '372.0000', 'Company 2'),
(69256, '2020-01-01', 3, '02:15:00', '149.0000', '150.0000', 'Company 2'),
(69257, '2020-01-01', 3, '02:16:00', '149.0000', '368.0000', 'Company 2'),
(69258, '2020-01-01', 3, '02:17:00', '149.0000', '346.0000', 'Company 2'),
(69259, '2020-01-01', 3, '02:18:00', '149.0000', '144.0000', 'Company 2'),
(69260, '2020-01-01', 3, '02:19:00', '149.0000', '280.0000', 'Company 2'),
(69261, '2020-01-01', 3, '02:20:00', '149.0000', '353.0000', 'Company 2'),
(69262, '2020-01-01', 3, '02:21:00', '149.0000', '244.0000', 'Company 2'),
(69263, '2020-01-01', 3, '02:22:00', '149.0000', '309.0000', 'Company 2'),
(69264, '2020-01-01', 3, '02:23:00', '149.0000', '203.0000', 'Company 2'),
(69265, '2020-01-01', 3, '02:24:00', '149.0000', '353.0000', 'Company 2'),
(69266, '2020-01-01', 3, '02:25:00', '149.0000', '314.0000', 'Company 2'),
(69267, '2020-01-01', 3, '02:26:00', '149.0000', '175.0000', 'Company 2'),
(69268, '2020-01-01', 3, '02:27:00', '149.0000', '328.0000', 'Company 2'),
(69269, '2020-01-01', 3, '02:28:00', '149.0000', '329.0000', 'Company 2'),
(69270, '2020-01-01', 3, '02:29:00', '149.0000', '292.0000', 'Company 2'),
(69271, '2020-01-01', 3, '02:30:00', '149.0000', '218.0000', 'Company 2'),
(69272, '2020-01-01', 3, '02:31:00', '149.0000', '266.0000', 'Company 2'),
(69273, '2020-01-01', 3, '02:32:00', '149.0000', '328.0000', 'Company 2'),
(69274, '2020-01-01', 3, '02:33:00', '149.0000', '356.0000', 'Company 2'),
(69275, '2020-01-01', 3, '02:34:00', '149.0000', '280.0000', 'Company 2'),
(69276, '2020-01-01', 3, '02:35:00', '149.0000', '293.0000', 'Company 2'),
(69277, '2020-01-01', 3, '02:36:00', '149.0000', '330.0000', 'Company 2'),
(69278, '2020-01-01', 3, '02:37:00', '149.0000', '233.0000', 'Company 2'),
(69279, '2020-01-01', 3, '02:38:00', '149.0000', '240.0000', 'Company 2'),
(69280, '2020-01-01', 3, '02:39:00', '149.0000', '188.0000', 'Company 2'),
(69281, '2020-01-01', 3, '02:40:00', '149.0000', '143.0000', 'Company 2'),
(69282, '2020-01-01', 3, '02:41:00', '149.0000', '329.0000', 'Company 2'),
(69283, '2020-01-01', 3, '02:42:00', '149.0000', '309.0000', 'Company 2'),
(69284, '2020-01-01', 3, '02:43:00', '149.0000', '312.0000', 'Company 2'),
(69285, '2020-01-01', 3, '02:44:00', '149.0000', '195.0000', 'Company 2'),
(69286, '2020-01-01', 3, '02:45:00', '149.0000', '246.0000', 'Company 2'),
(69287, '2020-01-01', 3, '02:46:00', '149.0000', '145.0000', 'Company 2'),
(69288, '2020-01-01', 3, '02:47:00', '149.0000', '272.0000', 'Company 2'),
(69289, '2020-01-01', 3, '02:48:00', '149.0000', '155.0000', 'Company 2'),
(69290, '2020-01-01', 3, '02:49:00', '149.0000', '150.0000', 'Company 2'),
(69291, '2020-01-01', 3, '02:50:00', '149.0000', '331.0000', 'Company 2'),
(69292, '2020-01-01', 3, '02:51:00', '149.0000', '327.0000', 'Company 2'),
(69293, '2020-01-01', 3, '02:52:00', '149.0000', '221.0000', 'Company 2'),
(69294, '2020-01-01', 3, '02:53:00', '149.0000', '212.0000', 'Company 2'),
(69295, '2020-01-01', 3, '02:54:00', '149.0000', '222.0000', 'Company 2'),
(69296, '2020-01-01', 3, '02:55:00', '149.0000', '162.0000', 'Company 2'),
(69297, '2020-01-01', 3, '02:56:00', '149.0000', '193.0000', 'Company 2'),
(69298, '2020-01-01', 3, '02:57:00', '149.0000', '213.0000', 'Company 2'),
(69299, '2020-01-01', 3, '02:58:00', '149.0000', '284.0000', 'Company 2'),
(69300, '2020-01-01', 3, '02:59:00', '149.0000', '363.0000', 'Company 2'),
(69301, '2020-01-01', 4, '03:00:00', '149.0000', '343.0000', 'Company 2'),
(69302, '2020-01-01', 4, '03:01:00', '149.0000', '253.0000', 'Company 2'),
(69303, '2020-01-01', 4, '03:02:00', '149.0000', '205.0000', 'Company 2'),
(69304, '2020-01-01', 4, '03:03:00', '149.0000', '312.0000', 'Company 2'),
(69305, '2020-01-01', 4, '03:04:00', '149.0000', '338.0000', 'Company 2'),
(69306, '2020-01-01', 4, '03:05:00', '149.0000', '231.0000', 'Company 2'),
(69307, '2020-01-01', 4, '03:06:00', '149.0000', '378.0000', 'Company 2'),
(69308, '2020-01-01', 4, '03:07:00', '149.0000', '358.0000', 'Company 2'),
(69309, '2020-01-01', 4, '03:08:00', '149.0000', '300.0000', 'Company 2'),
(69310, '2020-01-01', 4, '03:09:00', '149.0000', '245.0000', 'Company 2'),
(69311, '2020-01-01', 4, '03:10:00', '149.0000', '318.0000', 'Company 2'),
(69312, '2020-01-01', 4, '03:11:00', '149.0000', '314.0000', 'Company 2'),
(69313, '2020-01-01', 4, '03:12:00', '149.0000', '191.0000', 'Company 2'),
(69314, '2020-01-01', 4, '03:13:00', '149.0000', '160.0000', 'Company 2'),
(69315, '2020-01-01', 4, '03:14:00', '149.0000', '364.0000', 'Company 2'),
(69316, '2020-01-01', 4, '03:15:00', '149.0000', '228.0000', 'Company 2'),
(69317, '2020-01-01', 4, '03:16:00', '149.0000', '168.0000', 'Company 2'),
(69318, '2020-01-01', 4, '03:17:00', '149.0000', '287.0000', 'Company 2'),
(69319, '2020-01-01', 4, '03:18:00', '149.0000', '228.0000', 'Company 2'),
(69320, '2020-01-01', 4, '03:19:00', '149.0000', '369.0000', 'Company 2'),
(69321, '2020-01-01', 4, '03:20:00', '149.0000', '335.0000', 'Company 2'),
(69322, '2020-01-01', 4, '03:21:00', '149.0000', '308.0000', 'Company 2'),
(69323, '2020-01-01', 4, '03:22:00', '149.0000', '360.0000', 'Company 2'),
(69324, '2020-01-01', 4, '03:23:00', '190.0000', '218.0000', 'Company 2'),
(69325, '2020-01-01', 4, '03:24:00', '190.0000', '374.0000', 'Company 2'),
(69326, '2020-01-01', 4, '03:25:00', '190.0000', '267.0000', 'Company 2'),
(69327, '2020-01-01', 4, '03:26:00', '190.0000', '228.0000', 'Company 2'),
(69328, '2020-01-01', 4, '03:27:00', '190.0000', '140.0000', 'Company 2'),
(69329, '2020-01-01', 4, '03:28:00', '190.0000', '184.0000', 'Company 2'),
(69330, '2020-01-01', 4, '03:29:00', '190.0000', '279.0000', 'Company 2'),
(69331, '2020-01-01', 4, '03:30:00', '190.0000', '238.0000', 'Company 2'),
(69332, '2020-01-01', 4, '03:31:00', '190.0000', '148.0000', 'Company 2'),
(69333, '2020-01-01', 4, '03:32:00', '190.0000', '382.0000', 'Company 2'),
(69334, '2020-01-01', 4, '03:33:00', '190.0000', '154.0000', 'Company 2'),
(69335, '2020-01-01', 4, '03:34:00', '190.0000', '170.0000', 'Company 2'),
(69336, '2020-01-01', 4, '03:35:00', '190.0000', '192.0000', 'Company 2'),
(69337, '2020-01-01', 4, '03:36:00', '190.0000', '217.0000', 'Company 2'),
(69338, '2020-01-01', 4, '03:37:00', '190.0000', '281.0000', 'Company 2'),
(69339, '2020-01-01', 4, '03:38:00', '190.0000', '346.0000', 'Company 2'),
(69340, '2020-01-01', 4, '03:39:00', '190.0000', '310.0000', 'Company 2'),
(69341, '2020-01-01', 4, '03:40:00', '190.0000', '389.0000', 'Company 2'),
(69342, '2020-01-01', 4, '03:41:00', '190.0000', '373.0000', 'Company 2'),
(69343, '2020-01-01', 4, '03:42:00', '190.0000', '275.0000', 'Company 2'),
(69344, '2020-01-01', 4, '03:43:00', '190.0000', '231.0000', 'Company 2'),
(69345, '2020-01-01', 4, '03:44:00', '190.0000', '174.0000', 'Company 2'),
(69346, '2020-01-01', 4, '03:45:00', '190.0000', '195.0000', 'Company 2'),
(69347, '2020-01-01', 4, '03:46:00', '190.0000', '372.0000', 'Company 2'),
(69348, '2020-01-01', 4, '03:47:00', '190.0000', '329.0000', 'Company 2'),
(69349, '2020-01-01', 4, '03:48:00', '190.0000', '148.0000', 'Company 2'),
(69350, '2020-01-01', 4, '03:49:00', '190.0000', '162.0000', 'Company 2'),
(69351, '2020-01-01', 4, '03:50:00', '190.0000', '354.0000', 'Company 2'),
(69352, '2020-01-01', 4, '03:51:00', '190.0000', '180.0000', 'Company 2'),
(69353, '2020-01-01', 4, '03:52:00', '190.0000', '317.0000', 'Company 2'),
(69354, '2020-01-01', 4, '03:53:00', '190.0000', '302.0000', 'Company 2'),
(69355, '2020-01-01', 4, '03:54:00', '190.0000', '323.0000', 'Company 2'),
(69356, '2020-01-01', 4, '03:55:00', '190.0000', '313.0000', 'Company 2'),
(69357, '2020-01-01', 4, '03:56:00', '190.0000', '377.0000', 'Company 2'),
(69358, '2020-01-01', 4, '03:57:00', '190.0000', '182.0000', 'Company 2'),
(69359, '2020-01-01', 4, '03:58:00', '190.0000', '344.0000', 'Company 2'),
(69360, '2020-01-01', 4, '03:59:00', '190.0000', '282.0000', 'Company 2'),
(69361, '2020-01-01', 5, '04:00:00', '190.0000', '257.0000', 'Company 2'),
(69362, '2020-01-01', 5, '04:01:00', '190.0000', '331.0000', 'Company 2'),
(69363, '2020-01-01', 5, '04:02:00', '190.0000', '344.0000', 'Company 2'),
(69364, '2020-01-01', 5, '04:03:00', '190.0000', '172.0000', 'Company 2'),
(69365, '2020-01-01', 5, '04:04:00', '190.0000', '258.0000', 'Company 2'),
(69366, '2020-01-01', 5, '04:05:00', '190.0000', '299.0000', 'Company 2'),
(69367, '2020-01-01', 5, '04:06:00', '190.0000', '345.0000', 'Company 2'),
(69368, '2020-01-01', 5, '04:07:00', '190.0000', '259.0000', 'Company 2'),
(69369, '2020-01-01', 5, '04:08:00', '190.0000', '335.0000', 'Company 2'),
(69370, '2020-01-01', 5, '04:09:00', '190.0000', '289.0000', 'Company 2'),
(69371, '2020-01-01', 5, '04:10:00', '190.0000', '247.0000', 'Company 2'),
(69372, '2020-01-01', 5, '04:11:00', '190.0000', '252.0000', 'Company 2'),
(69373, '2020-01-01', 5, '04:12:00', '190.0000', '169.0000', 'Company 2'),
(69374, '2020-01-01', 5, '04:13:00', '190.0000', '388.0000', 'Company 2'),
(69375, '2020-01-01', 5, '04:14:00', '190.0000', '341.0000', 'Company 2'),
(69376, '2020-01-01', 5, '04:15:00', '190.0000', '304.0000', 'Company 2'),
(69377, '2020-01-01', 5, '04:16:00', '190.0000', '206.0000', 'Company 2'),
(69378, '2020-01-01', 5, '04:17:00', '190.0000', '368.0000', 'Company 2'),
(69379, '2020-01-01', 5, '04:18:00', '190.0000', '168.0000', 'Company 2'),
(69380, '2020-01-01', 5, '04:19:00', '190.0000', '267.0000', 'Company 2'),
(69381, '2020-01-01', 5, '04:20:00', '190.0000', '215.0000', 'Company 2'),
(69382, '2020-01-01', 5, '04:21:00', '190.0000', '161.0000', 'Company 2'),
(69383, '2020-01-01', 5, '04:22:00', '190.0000', '213.0000', 'Company 2'),
(69384, '2020-01-01', 5, '04:23:00', '190.0000', '362.0000', 'Company 2'),
(69385, '2020-01-01', 5, '04:24:00', '190.0000', '213.0000', 'Company 2'),
(69386, '2020-01-01', 5, '04:25:00', '190.0000', '283.0000', 'Company 2'),
(69387, '2020-01-01', 5, '04:26:00', '190.0000', '266.0000', 'Company 2'),
(69388, '2020-01-01', 5, '04:27:00', '190.0000', '223.0000', 'Company 2'),
(69389, '2020-01-01', 5, '04:28:00', '190.0000', '223.0000', 'Company 2'),
(69390, '2020-01-01', 5, '04:29:00', '190.0000', '224.0000', 'Company 2'),
(69391, '2020-01-01', 5, '04:30:00', '190.0000', '248.0000', 'Company 2'),
(69392, '2020-01-01', 5, '04:31:00', '190.0000', '193.0000', 'Company 2'),
(69393, '2020-01-01', 5, '04:32:00', '190.0000', '233.0000', 'Company 2'),
(69394, '2020-01-01', 5, '04:33:00', '190.0000', '202.0000', 'Company 2'),
(69395, '2020-01-01', 5, '04:34:00', '190.0000', '290.0000', 'Company 2'),
(69396, '2020-01-01', 5, '04:35:00', '190.0000', '168.0000', 'Company 2'),
(69397, '2020-01-01', 5, '04:36:00', '190.0000', '357.0000', 'Company 2'),
(69398, '2020-01-01', 5, '04:37:00', '190.0000', '211.0000', 'Company 2'),
(69399, '2020-01-01', 5, '04:38:00', '190.0000', '208.0000', 'Company 2'),
(69400, '2020-01-01', 5, '04:39:00', '190.0000', '366.0000', 'Company 2'),
(69401, '2020-01-01', 5, '04:40:00', '190.0000', '213.0000', 'Company 2'),
(69402, '2020-01-01', 5, '04:41:00', '190.0000', '179.0000', 'Company 2'),
(69403, '2020-01-01', 5, '04:42:00', '190.0000', '314.0000', 'Company 2'),
(69404, '2020-01-01', 5, '04:43:00', '190.0000', '225.0000', 'Company 2'),
(69405, '2020-01-01', 5, '04:44:00', '190.0000', '155.0000', 'Company 2'),
(69406, '2020-01-01', 5, '04:45:00', '190.0000', '381.0000', 'Company 2'),
(69407, '2020-01-01', 5, '04:46:00', '190.0000', '313.0000', 'Company 2'),
(69408, '2020-01-01', 5, '04:47:00', '190.0000', '150.0000', 'Company 2'),
(69409, '2020-01-01', 5, '04:48:00', '190.0000', '308.0000', 'Company 2'),
(69410, '2020-01-01', 5, '04:49:00', '190.0000', '167.0000', 'Company 2'),
(69411, '2020-01-01', 5, '04:50:00', '190.0000', '175.0000', 'Company 2'),
(69412, '2020-01-01', 5, '04:51:00', '190.0000', '202.0000', 'Company 2'),
(69413, '2020-01-01', 5, '04:52:00', '190.0000', '145.0000', 'Company 2'),
(69414, '2020-01-01', 5, '04:53:00', '190.0000', '165.0000', 'Company 2'),
(69415, '2020-01-01', 5, '04:54:00', '190.0000', '192.0000', 'Company 2'),
(69416, '2020-01-01', 5, '04:55:00', '190.0000', '338.0000', 'Company 2'),
(69417, '2020-01-01', 5, '04:56:00', '190.0000', '161.0000', 'Company 2'),
(69418, '2020-01-01', 5, '04:57:00', '190.0000', '259.0000', 'Company 2'),
(69419, '2020-01-01', 5, '04:58:00', '190.0000', '192.0000', 'Company 2'),
(69420, '2020-01-01', 5, '04:59:00', '190.0000', '377.0000', 'Company 2'),
(69421, '2020-01-01', 6, '05:00:00', '190.0000', '204.0000', 'Company 2'),
(69422, '2020-01-01', 6, '05:01:00', '190.0000', '372.0000', 'Company 2'),
(69423, '2020-01-01', 6, '05:02:00', '190.0000', '160.0000', 'Company 2'),
(69424, '2020-01-01', 6, '05:03:00', '190.0000', '354.0000', 'Company 2'),
(69425, '2020-01-01', 6, '05:04:00', '190.0000', '333.0000', 'Company 2'),
(69426, '2020-01-01', 6, '05:05:00', '190.0000', '253.0000', 'Company 2'),
(69427, '2020-01-01', 6, '05:06:00', '190.0000', '335.0000', 'Company 2'),
(69428, '2020-01-01', 6, '05:07:00', '190.0000', '192.0000', 'Company 2'),
(69429, '2020-01-01', 6, '05:08:00', '190.0000', '219.0000', 'Company 2'),
(69430, '2020-01-01', 6, '05:09:00', '190.0000', '218.0000', 'Company 2'),
(69431, '2020-01-01', 6, '05:10:00', '190.0000', '282.0000', 'Company 2'),
(69432, '2020-01-01', 6, '05:11:00', '190.0000', '188.0000', 'Company 2'),
(69433, '2020-01-01', 6, '05:12:00', '190.0000', '142.0000', 'Company 2'),
(69434, '2020-01-01', 6, '05:13:00', '190.0000', '349.0000', 'Company 2'),
(69435, '2020-01-01', 6, '05:14:00', '190.0000', '272.0000', 'Company 2'),
(69436, '2020-01-01', 6, '05:15:00', '190.0000', '176.0000', 'Company 2'),
(69437, '2020-01-01', 6, '05:16:00', '190.0000', '210.0000', 'Company 2'),
(69438, '2020-01-01', 6, '05:17:00', '190.0000', '282.0000', 'Company 2'),
(69439, '2020-01-01', 6, '05:18:00', '190.0000', '162.0000', 'Company 2'),
(69440, '2020-01-01', 6, '05:19:00', '190.0000', '195.0000', 'Company 2'),
(69441, '2020-01-01', 6, '05:20:00', '190.0000', '206.0000', 'Company 2'),
(69442, '2020-01-01', 6, '05:21:00', '190.0000', '260.0000', 'Company 2'),
(69443, '2020-01-01', 6, '05:22:00', '190.0000', '160.0000', 'Company 2'),
(69444, '2020-01-01', 6, '05:23:00', '190.0000', '320.0000', 'Company 2'),
(69445, '2020-01-01', 6, '05:24:00', '190.0000', '271.0000', 'Company 2'),
(69446, '2020-01-01', 6, '05:25:00', '190.0000', '341.0000', 'Company 2'),
(69447, '2020-01-01', 6, '05:26:00', '190.0000', '201.0000', 'Company 2'),
(69448, '2020-01-01', 6, '05:27:00', '190.0000', '235.0000', 'Company 2'),
(69449, '2020-01-01', 6, '05:28:00', '190.0000', '373.0000', 'Company 2'),
(69450, '2020-01-01', 6, '05:29:00', '190.0000', '182.0000', 'Company 2'),
(69451, '2020-01-01', 6, '05:30:00', '190.0000', '277.0000', 'Company 2'),
(69452, '2020-01-01', 6, '05:31:00', '190.0000', '322.0000', 'Company 2'),
(69453, '2020-01-01', 6, '05:32:00', '190.0000', '215.0000', 'Company 2'),
(69454, '2020-01-01', 6, '05:33:00', '190.0000', '340.0000', 'Company 2'),
(69455, '2020-01-01', 6, '05:34:00', '190.0000', '269.0000', 'Company 2'),
(69456, '2020-01-01', 6, '05:35:00', '190.0000', '180.0000', 'Company 2'),
(69457, '2020-01-01', 6, '05:36:00', '190.0000', '174.0000', 'Company 2'),
(69458, '2020-01-01', 6, '05:37:00', '190.0000', '249.0000', 'Company 2'),
(69459, '2020-01-01', 6, '05:38:00', '190.0000', '207.0000', 'Company 2'),
(69460, '2020-01-01', 6, '05:39:00', '190.0000', '208.0000', 'Company 2'),
(69461, '2020-01-01', 6, '05:40:00', '190.0000', '152.0000', 'Company 2'),
(69462, '2020-01-01', 6, '05:41:00', '190.0000', '164.0000', 'Company 2'),
(69463, '2020-01-01', 6, '05:42:00', '190.0000', '371.0000', 'Company 2'),
(69464, '2020-01-01', 6, '05:43:00', '190.0000', '171.0000', 'Company 2'),
(69465, '2020-01-01', 6, '05:44:00', '190.0000', '300.0000', 'Company 2'),
(69466, '2020-01-01', 6, '05:45:00', '190.0000', '256.0000', 'Company 2'),
(69467, '2020-01-01', 6, '05:46:00', '190.0000', '264.0000', 'Company 2'),
(69468, '2020-01-01', 6, '05:47:00', '190.0000', '191.0000', 'Company 2'),
(69469, '2020-01-01', 6, '05:48:00', '190.0000', '166.0000', 'Company 2'),
(69470, '2020-01-01', 6, '05:49:00', '190.0000', '196.0000', 'Company 2'),
(69471, '2020-01-01', 6, '05:50:00', '190.0000', '160.0000', 'Company 2'),
(69472, '2020-01-01', 6, '05:51:00', '190.0000', '251.0000', 'Company 2'),
(69473, '2020-01-01', 6, '05:52:00', '190.0000', '171.0000', 'Company 2'),
(69474, '2020-01-01', 6, '05:53:00', '190.0000', '263.0000', 'Company 2'),
(69475, '2020-01-01', 6, '05:54:00', '190.0000', '359.0000', 'Company 2'),
(69476, '2020-01-01', 6, '05:55:00', '190.0000', '312.0000', 'Company 2'),
(69477, '2020-01-01', 6, '05:56:00', '190.0000', '230.0000', 'Company 2'),
(69478, '2020-01-01', 6, '05:57:00', '190.0000', '315.0000', 'Company 2'),
(69479, '2020-01-01', 6, '05:58:00', '190.0000', '372.0000', 'Company 2'),
(69480, '2020-01-01', 6, '05:59:00', '190.0000', '257.0000', 'Company 2'),
(69481, '2020-01-01', 7, '06:00:00', '190.0000', '341.0000', 'Company 2'),
(69482, '2020-01-01', 7, '06:01:00', '190.0000', '288.0000', 'Company 2'),
(69483, '2020-01-01', 7, '06:02:00', '190.0000', '229.0000', 'Company 2'),
(69484, '2020-01-01', 7, '06:03:00', '190.0000', '353.0000', 'Company 2'),
(69485, '2020-01-01', 7, '06:04:00', '190.0000', '234.0000', 'Company 2'),
(69486, '2020-01-01', 7, '06:05:00', '190.0000', '250.0000', 'Company 2'),
(69487, '2020-01-01', 7, '06:06:00', '190.0000', '363.0000', 'Company 2'),
(69488, '2020-01-01', 7, '06:07:00', '190.0000', '189.0000', 'Company 2'),
(69489, '2020-01-01', 7, '06:08:00', '190.0000', '321.0000', 'Company 2'),
(69490, '2020-01-01', 7, '06:09:00', '190.0000', '314.0000', 'Company 2'),
(69491, '2020-01-01', 7, '06:10:00', '190.0000', '282.0000', 'Company 2'),
(69492, '2020-01-01', 7, '06:11:00', '190.0000', '334.0000', 'Company 2'),
(69493, '2020-01-01', 7, '06:12:00', '190.0000', '309.0000', 'Company 2'),
(69494, '2020-01-01', 7, '06:13:00', '190.0000', '223.0000', 'Company 2'),
(69495, '2020-01-01', 7, '06:14:00', '190.0000', '357.0000', 'Company 2'),
(69496, '2020-01-01', 7, '06:15:00', '190.0000', '232.0000', 'Company 2'),
(69497, '2020-01-01', 7, '06:16:00', '190.0000', '145.0000', 'Company 2'),
(69498, '2020-01-01', 7, '06:17:00', '190.0000', '366.0000', 'Company 2'),
(69499, '2020-01-01', 7, '06:18:00', '190.0000', '306.0000', 'Company 2'),
(69500, '2020-01-01', 7, '06:19:00', '190.0000', '168.0000', 'Company 2'),
(69501, '2020-01-01', 7, '06:20:00', '190.0000', '302.0000', 'Company 2'),
(69502, '2020-01-01', 7, '06:21:00', '190.0000', '245.0000', 'Company 2'),
(69503, '2020-01-01', 7, '06:22:00', '190.0000', '155.0000', 'Company 2'),
(69504, '2020-01-01', 7, '06:23:00', '190.0000', '317.0000', 'Company 2'),
(69505, '2020-01-01', 7, '06:24:00', '190.0000', '302.0000', 'Company 2'),
(69506, '2020-01-01', 7, '06:25:00', '190.0000', '383.0000', 'Company 2'),
(69507, '2020-01-01', 7, '06:26:00', '190.0000', '182.0000', 'Company 2'),
(69508, '2020-01-01', 7, '06:27:00', '190.0000', '266.0000', 'Company 2'),
(69509, '2020-01-01', 7, '06:28:00', '190.0000', '289.0000', 'Company 2'),
(69510, '2020-01-01', 7, '06:29:00', '190.0000', '383.0000', 'Company 2'),
(69511, '2020-01-01', 7, '06:30:00', '190.0000', '368.0000', 'Company 2'),
(69512, '2020-01-01', 7, '06:31:00', '190.0000', '155.0000', 'Company 2'),
(69513, '2020-01-01', 7, '06:32:00', '190.0000', '389.0000', 'Company 2'),
(69514, '2020-01-01', 7, '06:33:00', '190.0000', '267.0000', 'Company 2'),
(69515, '2020-01-01', 7, '06:34:00', '190.0000', '257.0000', 'Company 2'),
(69516, '2020-01-01', 7, '06:35:00', '190.0000', '252.0000', 'Company 2'),
(69517, '2020-01-01', 7, '06:36:00', '190.0000', '152.0000', 'Company 2'),
(69518, '2020-01-01', 7, '06:37:00', '190.0000', '261.0000', 'Company 2'),
(69519, '2020-01-01', 7, '06:38:00', '190.0000', '292.0000', 'Company 2'),
(69520, '2020-01-01', 7, '06:39:00', '190.0000', '287.0000', 'Company 2'),
(69521, '2020-01-01', 7, '06:40:00', '190.0000', '385.0000', 'Company 2'),
(69522, '2020-01-01', 7, '06:41:00', '190.0000', '384.0000', 'Company 2'),
(69523, '2020-01-01', 7, '06:42:00', '190.0000', '337.0000', 'Company 2'),
(69524, '2020-01-01', 7, '06:43:00', '190.0000', '309.0000', 'Company 2'),
(69525, '2020-01-01', 7, '06:44:00', '190.0000', '260.0000', 'Company 2'),
(69526, '2020-01-01', 7, '06:45:00', '190.0000', '367.0000', 'Company 2'),
(69527, '2020-01-01', 7, '06:46:00', '190.0000', '299.0000', 'Company 2'),
(69528, '2020-01-01', 7, '06:47:00', '190.0000', '184.0000', 'Company 2'),
(69529, '2020-01-01', 7, '06:48:00', '190.0000', '344.0000', 'Company 2'),
(69530, '2020-01-01', 7, '06:49:00', '190.0000', '364.0000', 'Company 2'),
(69531, '2020-01-01', 7, '06:50:00', '190.0000', '196.0000', 'Company 2'),
(69532, '2020-01-01', 7, '06:51:00', '190.0000', '312.0000', 'Company 2'),
(69533, '2020-01-01', 7, '06:52:00', '190.0000', '280.0000', 'Company 2'),
(69534, '2020-01-01', 7, '06:53:00', '190.0000', '337.0000', 'Company 2'),
(69535, '2020-01-01', 7, '06:54:00', '190.0000', '367.0000', 'Company 2'),
(69536, '2020-01-01', 7, '06:55:00', '190.0000', '268.0000', 'Company 2'),
(69537, '2020-01-01', 7, '06:56:00', '190.0000', '295.0000', 'Company 2'),
(69538, '2020-01-01', 7, '06:57:00', '190.0000', '338.0000', 'Company 2'),
(69539, '2020-01-01', 7, '06:58:00', '190.0000', '346.0000', 'Company 2'),
(69540, '2020-01-01', 7, '06:59:00', '190.0000', '187.0000', 'Company 2'),
(69541, '2020-01-01', 8, '07:00:00', '190.0000', '377.0000', 'Company 2'),
(69542, '2020-01-01', 8, '07:01:00', '190.0000', '194.0000', 'Company 2'),
(69543, '2020-01-01', 8, '07:02:00', '190.0000', '286.0000', 'Company 2'),
(69544, '2020-01-01', 8, '07:03:00', '190.0000', '250.0000', 'Company 2'),
(69545, '2020-01-01', 8, '07:04:00', '190.0000', '254.0000', 'Company 2'),
(69546, '2020-01-01', 8, '07:05:00', '190.0000', '313.0000', 'Company 2'),
(69547, '2020-01-01', 8, '07:06:00', '190.0000', '190.0000', 'Company 2'),
(69548, '2020-01-01', 8, '07:07:00', '190.0000', '171.0000', 'Company 2'),
(69549, '2020-01-01', 8, '07:08:00', '190.0000', '151.0000', 'Company 2'),
(69550, '2020-01-01', 8, '07:09:00', '190.0000', '239.0000', 'Company 2'),
(69551, '2020-01-01', 8, '07:10:00', '190.0000', '217.0000', 'Company 2'),
(69552, '2020-01-01', 8, '07:11:00', '190.0000', '248.0000', 'Company 2'),
(69553, '2020-01-01', 8, '07:12:00', '190.0000', '288.0000', 'Company 2'),
(69554, '2020-01-01', 8, '07:13:00', '190.0000', '162.0000', 'Company 2'),
(69555, '2020-01-01', 8, '07:14:00', '190.0000', '147.0000', 'Company 2'),
(69556, '2020-01-01', 8, '07:15:00', '190.0000', '360.0000', 'Company 2'),
(69557, '2020-01-01', 8, '07:16:00', '190.0000', '270.0000', 'Company 2'),
(69558, '2020-01-01', 8, '07:17:00', '190.0000', '301.0000', 'Company 2'),
(69559, '2020-01-01', 8, '07:18:00', '190.0000', '226.0000', 'Company 2'),
(69560, '2020-01-01', 8, '07:19:00', '190.0000', '266.0000', 'Company 2'),
(69561, '2020-01-01', 8, '07:20:00', '190.0000', '168.0000', 'Company 2'),
(69562, '2020-01-01', 8, '07:21:00', '190.0000', '276.0000', 'Company 2'),
(69563, '2020-01-01', 8, '07:22:00', '190.0000', '150.0000', 'Company 2'),
(69564, '2020-01-01', 8, '07:23:00', '190.0000', '323.0000', 'Company 2'),
(69565, '2020-01-01', 8, '07:24:00', '190.0000', '369.0000', 'Company 2'),
(69566, '2020-01-01', 8, '07:25:00', '190.0000', '194.0000', 'Company 2'),
(69567, '2020-01-01', 8, '07:26:00', '190.0000', '353.0000', 'Company 2'),
(69568, '2020-01-01', 8, '07:27:00', '190.0000', '385.0000', 'Company 2'),
(69569, '2020-01-01', 8, '07:28:00', '190.0000', '359.0000', 'Company 2'),
(69570, '2020-01-01', 8, '07:29:00', '190.0000', '270.0000', 'Company 2'),
(69571, '2020-01-01', 8, '07:30:00', '190.0000', '390.0000', 'Company 2'),
(69572, '2020-01-01', 8, '07:31:00', '190.0000', '175.0000', 'Company 2'),
(69573, '2020-01-01', 8, '07:32:00', '190.0000', '227.0000', 'Company 2'),
(69574, '2020-01-01', 8, '07:33:00', '190.0000', '213.0000', 'Company 2'),
(69575, '2020-01-01', 8, '07:34:00', '190.0000', '210.0000', 'Company 2'),
(69576, '2020-01-01', 8, '07:35:00', '190.0000', '324.0000', 'Company 2'),
(69577, '2020-01-01', 8, '07:36:00', '190.0000', '195.0000', 'Company 2'),
(69578, '2020-01-01', 8, '07:37:00', '190.0000', '278.0000', 'Company 2'),
(69579, '2020-01-01', 8, '07:38:00', '190.0000', '208.0000', 'Company 2'),
(69580, '2020-01-01', 8, '07:39:00', '190.0000', '328.0000', 'Company 2'),
(69581, '2020-01-01', 8, '07:40:00', '190.0000', '175.0000', 'Company 2'),
(69582, '2020-01-01', 8, '07:41:00', '190.0000', '360.0000', 'Company 2'),
(69583, '2020-01-01', 8, '07:42:00', '190.0000', '303.0000', 'Company 2'),
(69584, '2020-01-01', 8, '07:43:00', '190.0000', '218.0000', 'Company 2'),
(69585, '2020-01-01', 8, '07:44:00', '190.0000', '144.0000', 'Company 2'),
(69586, '2020-01-01', 8, '07:45:00', '190.0000', '365.0000', 'Company 2'),
(69587, '2020-01-01', 8, '07:46:00', '190.0000', '195.0000', 'Company 2'),
(69588, '2020-01-01', 8, '07:47:00', '190.0000', '300.0000', 'Company 2'),
(69589, '2020-01-01', 8, '07:48:00', '190.0000', '218.0000', 'Company 2'),
(69590, '2020-01-01', 8, '07:49:00', '190.0000', '164.0000', 'Company 2'),
(69591, '2020-01-01', 8, '07:50:00', '190.0000', '250.0000', 'Company 2'),
(69592, '2020-01-01', 8, '07:51:00', '190.0000', '349.0000', 'Company 2'),
(69593, '2020-01-01', 8, '07:52:00', '190.0000', '235.0000', 'Company 2'),
(69594, '2020-01-01', 8, '07:53:00', '190.0000', '182.0000', 'Company 2'),
(69595, '2020-01-01', 8, '07:54:00', '190.0000', '245.0000', 'Company 2'),
(69596, '2020-01-01', 8, '07:55:00', '190.0000', '319.0000', 'Company 2'),
(69597, '2020-01-01', 8, '07:56:00', '190.0000', '294.0000', 'Company 2'),
(69598, '2020-01-01', 8, '07:57:00', '190.0000', '300.0000', 'Company 2'),
(69599, '2020-01-01', 8, '07:58:00', '190.0000', '260.0000', 'Company 2'),
(69600, '2020-01-01', 8, '07:59:00', '190.0000', '284.0000', 'Company 2'),
(69601, '2020-01-01', 9, '08:00:00', '190.0000', '288.0000', 'Company 2'),
(69602, '2020-01-01', 9, '08:01:00', '190.0000', '301.0000', 'Company 2'),
(69603, '2020-01-01', 9, '08:02:00', '190.0000', '280.0000', 'Company 2'),
(69604, '2020-01-01', 9, '08:03:00', '190.0000', '148.0000', 'Company 2'),
(69605, '2020-01-01', 9, '08:04:00', '190.0000', '164.0000', 'Company 2'),
(69606, '2020-01-01', 9, '08:05:00', '190.0000', '245.0000', 'Company 2'),
(69607, '2020-01-01', 9, '08:06:00', '190.0000', '211.0000', 'Company 2'),
(69608, '2020-01-01', 9, '08:07:00', '190.0000', '200.0000', 'Company 2'),
(69609, '2020-01-01', 9, '08:08:00', '190.0000', '183.0000', 'Company 2'),
(69610, '2020-01-01', 9, '08:09:00', '190.0000', '274.0000', 'Company 2'),
(69611, '2020-01-01', 9, '08:10:00', '190.0000', '202.0000', 'Company 2'),
(69612, '2020-01-01', 9, '08:11:00', '190.0000', '288.0000', 'Company 2'),
(69613, '2020-01-01', 9, '08:12:00', '190.0000', '361.0000', 'Company 2'),
(69614, '2020-01-01', 9, '08:13:00', '190.0000', '308.0000', 'Company 2'),
(69615, '2020-01-01', 9, '08:14:00', '190.0000', '161.0000', 'Company 2'),
(69616, '2020-01-01', 9, '08:15:00', '190.0000', '182.0000', 'Company 2'),
(69617, '2020-01-01', 9, '08:16:00', '190.0000', '384.0000', 'Company 2'),
(69618, '2020-01-01', 9, '08:17:00', '190.0000', '383.0000', 'Company 2'),
(69619, '2020-01-01', 9, '08:18:00', '190.0000', '186.0000', 'Company 2'),
(69620, '2020-01-01', 9, '08:19:00', '190.0000', '356.0000', 'Company 2'),
(69621, '2020-01-01', 9, '08:20:00', '190.0000', '337.0000', 'Company 2'),
(69622, '2020-01-01', 9, '08:21:00', '190.0000', '210.0000', 'Company 2'),
(69623, '2020-01-01', 9, '08:22:00', '190.0000', '152.0000', 'Company 2'),
(69624, '2020-01-01', 9, '08:23:00', '190.0000', '359.0000', 'Company 2'),
(69625, '2020-01-01', 9, '08:24:00', '190.0000', '259.0000', 'Company 2'),
(69626, '2020-01-01', 9, '08:25:00', '190.0000', '335.0000', 'Company 2'),
(69627, '2020-01-01', 9, '08:26:00', '190.0000', '317.0000', 'Company 2'),
(69628, '2020-01-01', 9, '08:27:00', '190.0000', '268.0000', 'Company 2'),
(69629, '2020-01-01', 9, '08:28:00', '190.0000', '352.0000', 'Company 2'),
(69630, '2020-01-01', 9, '08:29:00', '190.0000', '190.0000', 'Company 2'),
(69631, '2020-01-01', 9, '08:30:00', '190.0000', '251.0000', 'Company 2'),
(69632, '2020-01-01', 9, '08:31:00', '190.0000', '293.0000', 'Company 2'),
(69633, '2020-01-01', 9, '08:32:00', '190.0000', '363.0000', 'Company 2'),
(69634, '2020-01-01', 9, '08:33:00', '190.0000', '162.0000', 'Company 2'),
(69635, '2020-01-01', 9, '08:34:00', '190.0000', '274.0000', 'Company 2'),
(69636, '2020-01-01', 9, '08:35:00', '190.0000', '297.0000', 'Company 2'),
(69637, '2020-01-01', 9, '08:36:00', '190.0000', '241.0000', 'Company 2'),
(69638, '2020-01-01', 9, '08:37:00', '190.0000', '266.0000', 'Company 2'),
(69639, '2020-01-01', 9, '08:38:00', '190.0000', '374.0000', 'Company 2'),
(69640, '2020-01-01', 9, '08:39:00', '190.0000', '327.0000', 'Company 2'),
(69641, '2020-01-01', 9, '08:40:00', '190.0000', '290.0000', 'Company 2'),
(69642, '2020-01-01', 9, '08:41:00', '190.0000', '346.0000', 'Company 2'),
(69643, '2020-01-01', 9, '08:42:00', '190.0000', '159.0000', 'Company 2'),
(69644, '2020-01-01', 9, '08:43:00', '190.0000', '284.0000', 'Company 2'),
(69645, '2020-01-01', 9, '08:44:00', '190.0000', '335.0000', 'Company 2'),
(69646, '2020-01-01', 9, '08:45:00', '190.0000', '248.0000', 'Company 2'),
(69647, '2020-01-01', 9, '08:46:00', '190.0000', '332.0000', 'Company 2'),
(69648, '2020-01-01', 9, '08:47:00', '190.0000', '291.0000', 'Company 2'),
(69649, '2020-01-01', 9, '08:48:00', '190.0000', '334.0000', 'Company 2'),
(69650, '2020-01-01', 9, '08:49:00', '190.0000', '204.0000', 'Company 2'),
(69651, '2020-01-01', 9, '08:50:00', '190.0000', '230.0000', 'Company 2'),
(69652, '2020-01-01', 9, '08:51:00', '190.0000', '373.0000', 'Company 2'),
(69653, '2020-01-01', 9, '08:52:00', '190.0000', '209.0000', 'Company 2'),
(69654, '2020-01-01', 9, '08:53:00', '190.0000', '215.0000', 'Company 2'),
(69655, '2020-01-01', 9, '08:54:00', '190.0000', '180.0000', 'Company 2'),
(69656, '2020-01-01', 9, '08:55:00', '190.0000', '259.0000', 'Company 2'),
(69657, '2020-01-01', 9, '08:56:00', '190.0000', '376.0000', 'Company 2'),
(69658, '2020-01-01', 9, '08:57:00', '190.0000', '361.0000', 'Company 2'),
(69659, '2020-01-01', 9, '08:58:00', '190.0000', '229.0000', 'Company 2'),
(69660, '2020-01-01', 9, '08:59:00', '190.0000', '370.0000', 'Company 2'),
(69661, '2020-01-01', 10, '09:00:00', '190.0000', '285.0000', 'Company 2'),
(69662, '2020-01-01', 10, '09:01:00', '190.0000', '225.0000', 'Company 2'),
(69663, '2020-01-01', 10, '09:02:00', '190.0000', '212.0000', 'Company 2'),
(69664, '2020-01-01', 10, '09:03:00', '190.0000', '365.0000', 'Company 2'),
(69665, '2020-01-01', 10, '09:04:00', '190.0000', '332.0000', 'Company 2'),
(69666, '2020-01-01', 10, '09:05:00', '190.0000', '311.0000', 'Company 2'),
(69667, '2020-01-01', 10, '09:06:00', '190.0000', '200.0000', 'Company 2'),
(69668, '2020-01-01', 10, '09:07:00', '190.0000', '159.0000', 'Company 2'),
(69669, '2020-01-01', 10, '09:08:00', '190.0000', '380.0000', 'Company 2'),
(69670, '2020-01-01', 10, '09:09:00', '190.0000', '221.0000', 'Company 2'),
(69671, '2020-01-01', 10, '09:10:00', '190.0000', '259.0000', 'Company 2'),
(69672, '2020-01-01', 10, '09:11:00', '190.0000', '184.0000', 'Company 2'),
(69673, '2020-01-01', 10, '09:12:00', '190.0000', '369.0000', 'Company 2'),
(69674, '2020-01-01', 10, '09:13:00', '190.0000', '143.0000', 'Company 2'),
(69675, '2020-01-01', 10, '09:14:00', '190.0000', '224.0000', 'Company 2'),
(69676, '2020-01-01', 10, '09:15:00', '190.0000', '205.0000', 'Company 2'),
(69677, '2020-01-01', 10, '09:16:00', '190.0000', '203.0000', 'Company 2'),
(69678, '2020-01-01', 10, '09:17:00', '190.0000', '278.0000', 'Company 2'),
(69679, '2020-01-01', 10, '09:18:00', '190.0000', '283.0000', 'Company 2'),
(69680, '2020-01-01', 10, '09:19:00', '190.0000', '202.0000', 'Company 2'),
(69681, '2020-01-01', 10, '09:20:00', '190.0000', '149.0000', 'Company 2'),
(69682, '2020-01-01', 10, '09:21:00', '190.0000', '282.0000', 'Company 2'),
(69683, '2020-01-01', 10, '09:22:00', '190.0000', '367.0000', 'Company 2'),
(69684, '2020-01-01', 10, '09:23:00', '190.0000', '178.0000', 'Company 2'),
(69685, '2020-01-01', 10, '09:24:00', '190.0000', '308.0000', 'Company 2'),
(69686, '2020-01-01', 10, '09:25:00', '190.0000', '297.0000', 'Company 2'),
(69687, '2020-01-01', 10, '09:26:00', '190.0000', '259.0000', 'Company 2'),
(69688, '2020-01-01', 10, '09:27:00', '190.0000', '389.0000', 'Company 2'),
(69689, '2020-01-01', 10, '09:28:00', '190.0000', '366.0000', 'Company 2'),
(69690, '2020-01-01', 10, '09:29:00', '190.0000', '166.0000', 'Company 2'),
(69691, '2020-01-01', 10, '09:30:00', '190.0000', '161.0000', 'Company 2'),
(69692, '2020-01-01', 10, '09:31:00', '190.0000', '166.0000', 'Company 2'),
(69693, '2020-01-01', 10, '09:32:00', '190.0000', '220.0000', 'Company 2'),
(69694, '2020-01-01', 10, '09:33:00', '190.0000', '335.0000', 'Company 2'),
(69695, '2020-01-01', 10, '09:34:00', '190.0000', '210.0000', 'Company 2'),
(69696, '2020-01-01', 10, '09:35:00', '190.0000', '190.0000', 'Company 2'),
(69697, '2020-01-01', 10, '09:36:00', '190.0000', '333.0000', 'Company 2'),
(69698, '2020-01-01', 10, '09:37:00', '190.0000', '223.0000', 'Company 2'),
(69699, '2020-01-01', 10, '09:38:00', '190.0000', '193.0000', 'Company 2'),
(69700, '2020-01-01', 10, '09:39:00', '190.0000', '197.0000', 'Company 2'),
(69701, '2020-01-01', 10, '09:40:00', '190.0000', '256.0000', 'Company 2'),
(69702, '2020-01-01', 10, '09:41:00', '190.0000', '203.0000', 'Company 2'),
(69703, '2020-01-01', 10, '09:42:00', '190.0000', '165.0000', 'Company 2'),
(69704, '2020-01-01', 10, '09:43:00', '190.0000', '148.0000', 'Company 2'),
(69705, '2020-01-01', 10, '09:44:00', '190.0000', '315.0000', 'Company 2'),
(69706, '2020-01-01', 10, '09:45:00', '190.0000', '147.0000', 'Company 2'),
(69707, '2020-01-01', 10, '09:46:00', '190.0000', '335.0000', 'Company 2'),
(69708, '2020-01-01', 10, '09:47:00', '190.0000', '203.0000', 'Company 2'),
(69709, '2020-01-01', 10, '09:48:00', '190.0000', '177.0000', 'Company 2'),
(69710, '2020-01-01', 10, '09:49:00', '190.0000', '250.0000', 'Company 2'),
(69711, '2020-01-01', 10, '09:50:00', '190.0000', '249.0000', 'Company 2'),
(69712, '2020-01-01', 10, '09:51:00', '190.0000', '250.0000', 'Company 2'),
(69713, '2020-01-01', 10, '09:52:00', '190.0000', '178.0000', 'Company 2'),
(69714, '2020-01-01', 10, '09:53:00', '190.0000', '220.0000', 'Company 2'),
(69715, '2020-01-01', 10, '09:54:00', '190.0000', '270.0000', 'Company 2'),
(69716, '2020-01-01', 10, '09:55:00', '190.0000', '233.0000', 'Company 2'),
(69717, '2020-01-01', 10, '09:56:00', '190.0000', '252.0000', 'Company 2'),
(69718, '2020-01-01', 10, '09:57:00', '190.0000', '229.0000', 'Company 2'),
(69719, '2020-01-01', 10, '09:58:00', '190.0000', '274.0000', 'Company 2'),
(69720, '2020-01-01', 10, '09:59:00', '190.0000', '219.0000', 'Company 2'),
(69721, '2020-01-01', 11, '10:00:00', '190.0000', '225.0000', 'Company 2'),
(69722, '2020-01-01', 11, '10:01:00', '190.0000', '202.0000', 'Company 2'),
(69723, '2020-01-01', 11, '10:02:00', '190.0000', '192.0000', 'Company 2'),
(69724, '2020-01-01', 11, '10:03:00', '250.0000', '171.0000', 'Company 2'),
(69725, '2020-01-01', 11, '10:04:00', '250.0000', '208.0000', 'Company 2'),
(69726, '2020-01-01', 11, '10:05:00', '250.0000', '196.0000', 'Company 2'),
(69727, '2020-01-01', 11, '10:06:00', '250.0000', '229.0000', 'Company 2'),
(69728, '2020-01-01', 11, '10:07:00', '250.0000', '172.0000', 'Company 2'),
(69729, '2020-01-01', 11, '10:08:00', '250.0000', '310.0000', 'Company 2'),
(69730, '2020-01-01', 11, '10:09:00', '250.0000', '173.0000', 'Company 2'),
(69731, '2020-01-01', 11, '10:10:00', '250.0000', '375.0000', 'Company 2'),
(69732, '2020-01-01', 11, '10:11:00', '250.0000', '157.0000', 'Company 2'),
(69733, '2020-01-01', 11, '10:12:00', '250.0000', '251.0000', 'Company 2'),
(69734, '2020-01-01', 11, '10:13:00', '250.0000', '180.0000', 'Company 2'),
(69735, '2020-01-01', 11, '10:14:00', '250.0000', '219.0000', 'Company 2'),
(69736, '2020-01-01', 11, '10:15:00', '250.0000', '216.0000', 'Company 2'),
(69737, '2020-01-01', 11, '10:16:00', '250.0000', '192.0000', 'Company 2'),
(69738, '2020-01-01', 11, '10:17:00', '250.0000', '223.0000', 'Company 2'),
(69739, '2020-01-01', 11, '10:18:00', '250.0000', '369.0000', 'Company 2'),
(69740, '2020-01-01', 11, '10:19:00', '250.0000', '288.0000', 'Company 2'),
(69741, '2020-01-01', 11, '10:20:00', '250.0000', '156.0000', 'Company 2'),
(69742, '2020-01-01', 11, '10:21:00', '250.0000', '386.0000', 'Company 2'),
(69743, '2020-01-01', 11, '10:22:00', '250.0000', '272.0000', 'Company 2'),
(69744, '2020-01-01', 11, '10:23:00', '250.0000', '269.0000', 'Company 2'),
(69745, '2020-01-01', 11, '10:24:00', '250.0000', '203.0000', 'Company 2'),
(69746, '2020-01-01', 11, '10:25:00', '250.0000', '262.0000', 'Company 2'),
(69747, '2020-01-01', 11, '10:26:00', '250.0000', '319.0000', 'Company 2'),
(69748, '2020-01-01', 11, '10:27:00', '250.0000', '387.0000', 'Company 2'),
(69749, '2020-01-01', 11, '10:28:00', '250.0000', '276.0000', 'Company 2'),
(69750, '2020-01-01', 11, '10:29:00', '250.0000', '265.0000', 'Company 2'),
(69751, '2020-01-01', 11, '10:30:00', '250.0000', '258.0000', 'Company 2'),
(69752, '2020-01-01', 11, '10:31:00', '250.0000', '198.0000', 'Company 2'),
(69753, '2020-01-01', 11, '10:32:00', '250.0000', '284.0000', 'Company 2'),
(69754, '2020-01-01', 11, '10:33:00', '250.0000', '243.0000', 'Company 2'),
(69755, '2020-01-01', 11, '10:34:00', '250.0000', '155.0000', 'Company 2'),
(69756, '2020-01-01', 11, '10:35:00', '250.0000', '359.0000', 'Company 2'),
(69757, '2020-01-01', 11, '10:36:00', '250.0000', '346.0000', 'Company 2'),
(69758, '2020-01-01', 11, '10:37:00', '250.0000', '304.0000', 'Company 2'),
(69759, '2020-01-01', 11, '10:38:00', '250.0000', '305.0000', 'Company 2'),
(69760, '2020-01-01', 11, '10:39:00', '250.0000', '278.0000', 'Company 2'),
(69761, '2020-01-01', 11, '10:40:00', '250.0000', '198.0000', 'Company 2'),
(69762, '2020-01-01', 11, '10:41:00', '250.0000', '269.0000', 'Company 2'),
(69763, '2020-01-01', 11, '10:42:00', '250.0000', '205.0000', 'Company 2'),
(69764, '2020-01-01', 11, '10:43:00', '250.0000', '386.0000', 'Company 2'),
(69765, '2020-01-01', 11, '10:44:00', '250.0000', '370.0000', 'Company 2'),
(69766, '2020-01-01', 11, '10:45:00', '250.0000', '358.0000', 'Company 2'),
(69767, '2020-01-01', 11, '10:46:00', '250.0000', '266.0000', 'Company 2'),
(69768, '2020-01-01', 11, '10:47:00', '250.0000', '214.0000', 'Company 2'),
(69769, '2020-01-01', 11, '10:48:00', '250.0000', '226.0000', 'Company 2'),
(69770, '2020-01-01', 11, '10:49:00', '250.0000', '144.0000', 'Company 2'),
(69771, '2020-01-01', 11, '10:50:00', '250.0000', '148.0000', 'Company 2'),
(69772, '2020-01-01', 11, '10:51:00', '250.0000', '205.0000', 'Company 2'),
(69773, '2020-01-01', 11, '10:52:00', '250.0000', '192.0000', 'Company 2'),
(69774, '2020-01-01', 11, '10:53:00', '250.0000', '210.0000', 'Company 2'),
(69775, '2020-01-01', 11, '10:54:00', '250.0000', '181.0000', 'Company 2'),
(69776, '2020-01-01', 11, '10:55:00', '250.0000', '267.0000', 'Company 2'),
(69777, '2020-01-01', 11, '10:56:00', '250.0000', '167.0000', 'Company 2'),
(69778, '2020-01-01', 11, '10:57:00', '250.0000', '231.0000', 'Company 2'),
(69779, '2020-01-01', 11, '10:58:00', '250.0000', '369.0000', 'Company 2'),
(69780, '2020-01-01', 11, '10:59:00', '250.0000', '165.0000', 'Company 2'),
(69781, '2020-01-01', 12, '11:00:00', '250.0000', '271.0000', 'Company 2'),
(69782, '2020-01-01', 12, '11:01:00', '250.0000', '221.0000', 'Company 2'),
(69783, '2020-01-01', 12, '11:02:00', '250.0000', '154.0000', 'Company 2'),
(69784, '2020-01-01', 12, '11:03:00', '250.0000', '356.0000', 'Company 2'),
(69785, '2020-01-01', 12, '11:04:00', '250.0000', '352.0000', 'Company 2'),
(69786, '2020-01-01', 12, '11:05:00', '250.0000', '162.0000', 'Company 2'),
(69787, '2020-01-01', 12, '11:06:00', '250.0000', '275.0000', 'Company 2'),
(69788, '2020-01-01', 12, '11:07:00', '250.0000', '261.0000', 'Company 2'),
(69789, '2020-01-01', 12, '11:08:00', '250.0000', '297.0000', 'Company 2'),
(69790, '2020-01-01', 12, '11:09:00', '250.0000', '274.0000', 'Company 2'),
(69791, '2020-01-01', 12, '11:10:00', '250.0000', '258.0000', 'Company 2'),
(69792, '2020-01-01', 12, '11:11:00', '250.0000', '367.0000', 'Company 2'),
(69793, '2020-01-01', 12, '11:12:00', '250.0000', '338.0000', 'Company 2'),
(69794, '2020-01-01', 12, '11:13:00', '250.0000', '261.0000', 'Company 2'),
(69795, '2020-01-01', 12, '11:14:00', '250.0000', '269.0000', 'Company 2'),
(69796, '2020-01-01', 12, '11:15:00', '250.0000', '181.0000', 'Company 2'),
(69797, '2020-01-01', 12, '11:16:00', '250.0000', '363.0000', 'Company 2'),
(69798, '2020-01-01', 12, '11:17:00', '250.0000', '232.0000', 'Company 2'),
(69799, '2020-01-01', 12, '11:18:00', '250.0000', '305.0000', 'Company 2'),
(69800, '2020-01-01', 12, '11:19:00', '250.0000', '382.0000', 'Company 2'),
(69801, '2020-01-01', 12, '11:20:00', '250.0000', '302.0000', 'Company 2');
INSERT INTO `power_generation` (`xsl`, `xdate`, `xhourending`, `xtime`, `xplant1`, `xplant2`, `xcompany`) VALUES
(69802, '2020-01-01', 12, '11:21:00', '250.0000', '147.0000', 'Company 2'),
(69803, '2020-01-01', 12, '11:22:00', '250.0000', '238.0000', 'Company 2'),
(69804, '2020-01-01', 12, '11:23:00', '250.0000', '173.0000', 'Company 2'),
(69805, '2020-01-01', 12, '11:24:00', '250.0000', '333.0000', 'Company 2'),
(69806, '2020-01-01', 12, '11:25:00', '250.0000', '267.0000', 'Company 2'),
(69807, '2020-01-01', 12, '11:26:00', '250.0000', '166.0000', 'Company 2'),
(69808, '2020-01-01', 12, '11:27:00', '250.0000', '241.0000', 'Company 2'),
(69809, '2020-01-01', 12, '11:28:00', '250.0000', '258.0000', 'Company 2'),
(69810, '2020-01-01', 12, '11:29:00', '250.0000', '275.0000', 'Company 2'),
(69811, '2020-01-01', 12, '11:30:00', '250.0000', '368.0000', 'Company 2'),
(69812, '2020-01-01', 12, '11:31:00', '250.0000', '225.0000', 'Company 2'),
(69813, '2020-01-01', 12, '11:32:00', '250.0000', '179.0000', 'Company 2'),
(69814, '2020-01-01', 12, '11:33:00', '250.0000', '325.0000', 'Company 2'),
(69815, '2020-01-01', 12, '11:34:00', '250.0000', '324.0000', 'Company 2'),
(69816, '2020-01-01', 12, '11:35:00', '250.0000', '344.0000', 'Company 2'),
(69817, '2020-01-01', 12, '11:36:00', '250.0000', '195.0000', 'Company 2'),
(69818, '2020-01-01', 12, '11:37:00', '250.0000', '382.0000', 'Company 2'),
(69819, '2020-01-01', 12, '11:38:00', '250.0000', '386.0000', 'Company 2'),
(69820, '2020-01-01', 12, '11:39:00', '250.0000', '191.0000', 'Company 2'),
(69821, '2020-01-01', 12, '11:40:00', '250.0000', '209.0000', 'Company 2'),
(69822, '2020-01-01', 12, '11:41:00', '250.0000', '335.0000', 'Company 2'),
(69823, '2020-01-01', 12, '11:42:00', '250.0000', '204.0000', 'Company 2'),
(69824, '2020-01-01', 12, '11:43:00', '250.0000', '324.0000', 'Company 2'),
(69825, '2020-01-01', 12, '11:44:00', '250.0000', '263.0000', 'Company 2'),
(69826, '2020-01-01', 12, '11:45:00', '250.0000', '299.0000', 'Company 2'),
(69827, '2020-01-01', 12, '11:46:00', '250.0000', '181.0000', 'Company 2'),
(69828, '2020-01-01', 12, '11:47:00', '250.0000', '311.0000', 'Company 2'),
(69829, '2020-01-01', 12, '11:48:00', '250.0000', '251.0000', 'Company 2'),
(69830, '2020-01-01', 12, '11:49:00', '250.0000', '311.0000', 'Company 2'),
(69831, '2020-01-01', 12, '11:50:00', '250.0000', '219.0000', 'Company 2'),
(69832, '2020-01-01', 12, '11:51:00', '250.0000', '171.0000', 'Company 2'),
(69833, '2020-01-01', 12, '11:52:00', '250.0000', '253.0000', 'Company 2'),
(69834, '2020-01-01', 12, '11:53:00', '250.0000', '383.0000', 'Company 2'),
(69835, '2020-01-01', 12, '11:54:00', '250.0000', '373.0000', 'Company 2'),
(69836, '2020-01-01', 12, '11:55:00', '250.0000', '326.0000', 'Company 2'),
(69837, '2020-01-01', 12, '11:56:00', '250.0000', '282.0000', 'Company 2'),
(69838, '2020-01-01', 12, '11:57:00', '250.0000', '257.0000', 'Company 2'),
(69839, '2020-01-01', 12, '11:58:00', '250.0000', '216.0000', 'Company 2'),
(69840, '2020-01-01', 12, '11:59:00', '250.0000', '143.0000', 'Company 2'),
(69841, '2020-01-01', 13, '12:00:00', '250.0000', '295.0000', 'Company 2'),
(69842, '2020-01-01', 13, '12:01:00', '250.0000', '340.0000', 'Company 2'),
(69843, '2020-01-01', 13, '12:02:00', '250.0000', '352.0000', 'Company 2'),
(69844, '2020-01-01', 13, '12:03:00', '250.0000', '251.0000', 'Company 2'),
(69845, '2020-01-01', 13, '12:04:00', '250.0000', '349.0000', 'Company 2'),
(69846, '2020-01-01', 13, '12:05:00', '250.0000', '330.0000', 'Company 2'),
(69847, '2020-01-01', 13, '12:06:00', '250.0000', '321.0000', 'Company 2'),
(69848, '2020-01-01', 13, '12:07:00', '250.0000', '374.0000', 'Company 2'),
(69849, '2020-01-01', 13, '12:08:00', '250.0000', '361.0000', 'Company 2'),
(69850, '2020-01-01', 13, '12:09:00', '250.0000', '301.0000', 'Company 2'),
(69851, '2020-01-01', 13, '12:10:00', '250.0000', '236.0000', 'Company 2'),
(69852, '2020-01-01', 13, '12:11:00', '250.0000', '362.0000', 'Company 2'),
(69853, '2020-01-01', 13, '12:12:00', '250.0000', '145.0000', 'Company 2'),
(69854, '2020-01-01', 13, '12:13:00', '250.0000', '264.0000', 'Company 2'),
(69855, '2020-01-01', 13, '12:14:00', '250.0000', '266.0000', 'Company 2'),
(69856, '2020-01-01', 13, '12:15:00', '250.0000', '171.0000', 'Company 2'),
(69857, '2020-01-01', 13, '12:16:00', '250.0000', '311.0000', 'Company 2'),
(69858, '2020-01-01', 13, '12:17:00', '250.0000', '186.0000', 'Company 2'),
(69859, '2020-01-01', 13, '12:18:00', '250.0000', '252.0000', 'Company 2'),
(69860, '2020-01-01', 13, '12:19:00', '250.0000', '328.0000', 'Company 2'),
(69861, '2020-01-01', 13, '12:20:00', '250.0000', '150.0000', 'Company 2'),
(69862, '2020-01-01', 13, '12:21:00', '250.0000', '284.0000', 'Company 2'),
(69863, '2020-01-01', 13, '12:22:00', '250.0000', '248.0000', 'Company 2'),
(69864, '2020-01-01', 13, '12:23:00', '250.0000', '372.0000', 'Company 2'),
(69865, '2020-01-01', 13, '12:24:00', '250.0000', '193.0000', 'Company 2'),
(69866, '2020-01-01', 13, '12:25:00', '250.0000', '375.0000', 'Company 2'),
(69867, '2020-01-01', 13, '12:26:00', '250.0000', '300.0000', 'Company 2'),
(69868, '2020-01-01', 13, '12:27:00', '250.0000', '201.0000', 'Company 2'),
(69869, '2020-01-01', 13, '12:28:00', '250.0000', '238.0000', 'Company 2'),
(69870, '2020-01-01', 13, '12:29:00', '250.0000', '339.0000', 'Company 2'),
(69871, '2020-01-01', 13, '12:30:00', '250.0000', '251.0000', 'Company 2'),
(69872, '2020-01-01', 13, '12:31:00', '250.0000', '354.0000', 'Company 2'),
(69873, '2020-01-01', 13, '12:32:00', '250.0000', '299.0000', 'Company 2'),
(69874, '2020-01-01', 13, '12:33:00', '250.0000', '271.0000', 'Company 2'),
(69875, '2020-01-01', 13, '12:34:00', '250.0000', '234.0000', 'Company 2'),
(69876, '2020-01-01', 13, '12:35:00', '250.0000', '294.0000', 'Company 2'),
(69877, '2020-01-01', 13, '12:36:00', '250.0000', '185.0000', 'Company 2'),
(69878, '2020-01-01', 13, '12:37:00', '250.0000', '164.0000', 'Company 2'),
(69879, '2020-01-01', 13, '12:38:00', '250.0000', '192.0000', 'Company 2'),
(69880, '2020-01-01', 13, '12:39:00', '250.0000', '212.0000', 'Company 2'),
(69881, '2020-01-01', 13, '12:40:00', '250.0000', '188.0000', 'Company 2'),
(69882, '2020-01-01', 13, '12:41:00', '250.0000', '237.0000', 'Company 2'),
(69883, '2020-01-01', 13, '12:42:00', '250.0000', '338.0000', 'Company 2'),
(69884, '2020-01-01', 13, '12:43:00', '250.0000', '145.0000', 'Company 2'),
(69885, '2020-01-01', 13, '12:44:00', '250.0000', '310.0000', 'Company 2'),
(69886, '2020-01-01', 13, '12:45:00', '250.0000', '339.0000', 'Company 2'),
(69887, '2020-01-01', 13, '12:46:00', '250.0000', '352.0000', 'Company 2'),
(69888, '2020-01-01', 13, '12:47:00', '250.0000', '378.0000', 'Company 2'),
(69889, '2020-01-01', 13, '12:48:00', '250.0000', '239.0000', 'Company 2'),
(69890, '2020-01-01', 13, '12:49:00', '250.0000', '384.0000', 'Company 2'),
(69891, '2020-01-01', 13, '12:50:00', '250.0000', '352.0000', 'Company 2'),
(69892, '2020-01-01', 13, '12:51:00', '250.0000', '348.0000', 'Company 2'),
(69893, '2020-01-01', 13, '12:52:00', '250.0000', '354.0000', 'Company 2'),
(69894, '2020-01-01', 13, '12:53:00', '250.0000', '167.0000', 'Company 2'),
(69895, '2020-01-01', 13, '12:54:00', '250.0000', '202.0000', 'Company 2'),
(69896, '2020-01-01', 13, '12:55:00', '250.0000', '383.0000', 'Company 2'),
(69897, '2020-01-01', 13, '12:56:00', '250.0000', '321.0000', 'Company 2'),
(69898, '2020-01-01', 13, '12:57:00', '250.0000', '332.0000', 'Company 2'),
(69899, '2020-01-01', 13, '12:58:00', '250.0000', '306.0000', 'Company 2'),
(69900, '2020-01-01', 13, '12:59:00', '250.0000', '170.0000', 'Company 2'),
(69901, '2020-01-01', 14, '13:00:00', '250.0000', '329.0000', 'Company 2'),
(69902, '2020-01-01', 14, '13:01:00', '250.0000', '192.0000', 'Company 2'),
(69903, '2020-01-01', 14, '13:02:00', '250.0000', '249.0000', 'Company 2'),
(69904, '2020-01-01', 14, '13:03:00', '250.0000', '268.0000', 'Company 2'),
(69905, '2020-01-01', 14, '13:04:00', '250.0000', '173.0000', 'Company 2'),
(69906, '2020-01-01', 14, '13:05:00', '250.0000', '351.0000', 'Company 2'),
(69907, '2020-01-01', 14, '13:06:00', '250.0000', '166.0000', 'Company 2'),
(69908, '2020-01-01', 14, '13:07:00', '250.0000', '372.0000', 'Company 2'),
(69909, '2020-01-01', 14, '13:08:00', '250.0000', '343.0000', 'Company 2'),
(69910, '2020-01-01', 14, '13:09:00', '250.0000', '288.0000', 'Company 2'),
(69911, '2020-01-01', 14, '13:10:00', '250.0000', '168.0000', 'Company 2'),
(69912, '2020-01-01', 14, '13:11:00', '250.0000', '339.0000', 'Company 2'),
(69913, '2020-01-01', 14, '13:12:00', '250.0000', '248.0000', 'Company 2'),
(69914, '2020-01-01', 14, '13:13:00', '250.0000', '191.0000', 'Company 2'),
(69915, '2020-01-01', 14, '13:14:00', '250.0000', '150.0000', 'Company 2'),
(69916, '2020-01-01', 14, '13:15:00', '250.0000', '304.0000', 'Company 2'),
(69917, '2020-01-01', 14, '13:16:00', '250.0000', '276.0000', 'Company 2'),
(69918, '2020-01-01', 14, '13:17:00', '250.0000', '377.0000', 'Company 2'),
(69919, '2020-01-01', 14, '13:18:00', '250.0000', '312.0000', 'Company 2'),
(69920, '2020-01-01', 14, '13:19:00', '250.0000', '247.0000', 'Company 2'),
(69921, '2020-01-01', 14, '13:20:00', '250.0000', '380.0000', 'Company 2'),
(69922, '2020-01-01', 14, '13:21:00', '250.0000', '328.0000', 'Company 2'),
(69923, '2020-01-01', 14, '13:22:00', '250.0000', '162.0000', 'Company 2'),
(69924, '2020-01-01', 14, '13:23:00', '250.0000', '274.0000', 'Company 2'),
(69925, '2020-01-01', 14, '13:24:00', '250.0000', '352.0000', 'Company 2'),
(69926, '2020-01-01', 14, '13:25:00', '250.0000', '273.0000', 'Company 2'),
(69927, '2020-01-01', 14, '13:26:00', '250.0000', '211.0000', 'Company 2'),
(69928, '2020-01-01', 14, '13:27:00', '250.0000', '378.0000', 'Company 2'),
(69929, '2020-01-01', 14, '13:28:00', '250.0000', '355.0000', 'Company 2'),
(69930, '2020-01-01', 14, '13:29:00', '250.0000', '365.0000', 'Company 2'),
(69931, '2020-01-01', 14, '13:30:00', '250.0000', '209.0000', 'Company 2'),
(69932, '2020-01-01', 14, '13:31:00', '250.0000', '264.0000', 'Company 2'),
(69933, '2020-01-01', 14, '13:32:00', '250.0000', '251.0000', 'Company 2'),
(69934, '2020-01-01', 14, '13:33:00', '250.0000', '387.0000', 'Company 2'),
(69935, '2020-01-01', 14, '13:34:00', '250.0000', '164.0000', 'Company 2'),
(69936, '2020-01-01', 14, '13:35:00', '250.0000', '214.0000', 'Company 2'),
(69937, '2020-01-01', 14, '13:36:00', '250.0000', '358.0000', 'Company 2'),
(69938, '2020-01-01', 14, '13:37:00', '250.0000', '168.0000', 'Company 2'),
(69939, '2020-01-01', 14, '13:38:00', '250.0000', '248.0000', 'Company 2'),
(69940, '2020-01-01', 14, '13:39:00', '250.0000', '321.0000', 'Company 2'),
(69941, '2020-01-01', 14, '13:40:00', '250.0000', '156.0000', 'Company 2'),
(69942, '2020-01-01', 14, '13:41:00', '250.0000', '261.0000', 'Company 2'),
(69943, '2020-01-01', 14, '13:42:00', '250.0000', '267.0000', 'Company 2'),
(69944, '2020-01-01', 14, '13:43:00', '250.0000', '216.0000', 'Company 2'),
(69945, '2020-01-01', 14, '13:44:00', '250.0000', '197.0000', 'Company 2'),
(69946, '2020-01-01', 14, '13:45:00', '250.0000', '207.0000', 'Company 2'),
(69947, '2020-01-01', 14, '13:46:00', '250.0000', '241.0000', 'Company 2'),
(69948, '2020-01-01', 14, '13:47:00', '250.0000', '179.0000', 'Company 2'),
(69949, '2020-01-01', 14, '13:48:00', '250.0000', '284.0000', 'Company 2'),
(69950, '2020-01-01', 14, '13:49:00', '250.0000', '168.0000', 'Company 2'),
(69951, '2020-01-01', 14, '13:50:00', '250.0000', '313.0000', 'Company 2'),
(69952, '2020-01-01', 14, '13:51:00', '250.0000', '153.0000', 'Company 2'),
(69953, '2020-01-01', 14, '13:52:00', '250.0000', '144.0000', 'Company 2'),
(69954, '2020-01-01', 14, '13:53:00', '250.0000', '204.0000', 'Company 2'),
(69955, '2020-01-01', 14, '13:54:00', '250.0000', '302.0000', 'Company 2'),
(69956, '2020-01-01', 14, '13:55:00', '250.0000', '373.0000', 'Company 2'),
(69957, '2020-01-01', 14, '13:56:00', '250.0000', '369.0000', 'Company 2'),
(69958, '2020-01-01', 14, '13:57:00', '250.0000', '356.0000', 'Company 2'),
(69959, '2020-01-01', 14, '13:58:00', '250.0000', '239.0000', 'Company 2'),
(69960, '2020-01-01', 14, '13:59:00', '250.0000', '140.0000', 'Company 2'),
(69961, '2020-01-01', 15, '14:00:00', '250.0000', '262.0000', 'Company 2'),
(69962, '2020-01-01', 15, '14:01:00', '250.0000', '386.0000', 'Company 2'),
(69963, '2020-01-01', 15, '14:02:00', '250.0000', '225.0000', 'Company 2'),
(69964, '2020-01-01', 15, '14:03:00', '250.0000', '314.0000', 'Company 2'),
(69965, '2020-01-01', 15, '14:04:00', '250.0000', '203.0000', 'Company 2'),
(69966, '2020-01-01', 15, '14:05:00', '250.0000', '213.0000', 'Company 2'),
(69967, '2020-01-01', 15, '14:06:00', '250.0000', '324.0000', 'Company 2'),
(69968, '2020-01-01', 15, '14:07:00', '250.0000', '257.0000', 'Company 2'),
(69969, '2020-01-01', 15, '14:08:00', '250.0000', '155.0000', 'Company 2'),
(69970, '2020-01-01', 15, '14:09:00', '250.0000', '198.0000', 'Company 2'),
(69971, '2020-01-01', 15, '14:10:00', '250.0000', '164.0000', 'Company 2'),
(69972, '2020-01-01', 15, '14:11:00', '250.0000', '244.0000', 'Company 2'),
(69973, '2020-01-01', 15, '14:12:00', '250.0000', '181.0000', 'Company 2'),
(69974, '2020-01-01', 15, '14:13:00', '250.0000', '341.0000', 'Company 2'),
(69975, '2020-01-01', 15, '14:14:00', '250.0000', '151.0000', 'Company 2'),
(69976, '2020-01-01', 15, '14:15:00', '250.0000', '211.0000', 'Company 2'),
(69977, '2020-01-01', 15, '14:16:00', '250.0000', '380.0000', 'Company 2'),
(69978, '2020-01-01', 15, '14:17:00', '250.0000', '241.0000', 'Company 2'),
(69979, '2020-01-01', 15, '14:18:00', '250.0000', '198.0000', 'Company 2'),
(69980, '2020-01-01', 15, '14:19:00', '250.0000', '387.0000', 'Company 2'),
(69981, '2020-01-01', 15, '14:20:00', '250.0000', '196.0000', 'Company 2'),
(69982, '2020-01-01', 15, '14:21:00', '250.0000', '290.0000', 'Company 2'),
(69983, '2020-01-01', 15, '14:22:00', '250.0000', '346.0000', 'Company 2'),
(69984, '2020-01-01', 15, '14:23:00', '250.0000', '159.0000', 'Company 2'),
(69985, '2020-01-01', 15, '14:24:00', '250.0000', '185.0000', 'Company 2'),
(69986, '2020-01-01', 15, '14:25:00', '250.0000', '143.0000', 'Company 2'),
(69987, '2020-01-01', 15, '14:26:00', '250.0000', '358.0000', 'Company 2'),
(69988, '2020-01-01', 15, '14:27:00', '250.0000', '272.0000', 'Company 2'),
(69989, '2020-01-01', 15, '14:28:00', '250.0000', '339.0000', 'Company 2'),
(69990, '2020-01-01', 15, '14:29:00', '250.0000', '367.0000', 'Company 2'),
(69991, '2020-01-01', 15, '14:30:00', '250.0000', '322.0000', 'Company 2'),
(69992, '2020-01-01', 15, '14:31:00', '250.0000', '353.0000', 'Company 2'),
(69993, '2020-01-01', 15, '14:32:00', '250.0000', '273.0000', 'Company 2'),
(69994, '2020-01-01', 15, '14:33:00', '250.0000', '180.0000', 'Company 2'),
(69995, '2020-01-01', 15, '14:34:00', '250.0000', '368.0000', 'Company 2'),
(69996, '2020-01-01', 15, '14:35:00', '250.0000', '261.0000', 'Company 2'),
(69997, '2020-01-01', 15, '14:36:00', '250.0000', '141.0000', 'Company 2'),
(69998, '2020-01-01', 15, '14:37:00', '250.0000', '293.0000', 'Company 2'),
(69999, '2020-01-01', 15, '14:38:00', '250.0000', '269.0000', 'Company 2'),
(70000, '2020-01-01', 15, '14:39:00', '250.0000', '354.0000', 'Company 2'),
(70001, '2020-01-01', 15, '14:40:00', '250.0000', '140.0000', 'Company 2'),
(70002, '2020-01-01', 15, '14:41:00', '250.0000', '329.0000', 'Company 2'),
(70003, '2020-01-01', 15, '14:42:00', '250.0000', '383.0000', 'Company 2'),
(70004, '2020-01-01', 15, '14:43:00', '250.0000', '306.0000', 'Company 2'),
(70005, '2020-01-01', 15, '14:44:00', '250.0000', '190.0000', 'Company 2'),
(70006, '2020-01-01', 15, '14:45:00', '250.0000', '321.0000', 'Company 2'),
(70007, '2020-01-01', 15, '14:46:00', '250.0000', '222.0000', 'Company 2'),
(70008, '2020-01-01', 15, '14:47:00', '250.0000', '382.0000', 'Company 2'),
(70009, '2020-01-01', 15, '14:48:00', '250.0000', '222.0000', 'Company 2'),
(70010, '2020-01-01', 15, '14:49:00', '250.0000', '318.0000', 'Company 2'),
(70011, '2020-01-01', 15, '14:50:00', '250.0000', '238.0000', 'Company 2'),
(70012, '2020-01-01', 15, '14:51:00', '250.0000', '302.0000', 'Company 2'),
(70013, '2020-01-01', 15, '14:52:00', '250.0000', '204.0000', 'Company 2'),
(70014, '2020-01-01', 15, '14:53:00', '250.0000', '238.0000', 'Company 2'),
(70015, '2020-01-01', 15, '14:54:00', '250.0000', '169.0000', 'Company 2'),
(70016, '2020-01-01', 15, '14:55:00', '250.0000', '342.0000', 'Company 2'),
(70017, '2020-01-01', 15, '14:56:00', '250.0000', '252.0000', 'Company 2'),
(70018, '2020-01-01', 15, '14:57:00', '250.0000', '185.0000', 'Company 2'),
(70019, '2020-01-01', 15, '14:58:00', '250.0000', '215.0000', 'Company 2'),
(70020, '2020-01-01', 15, '14:59:00', '250.0000', '181.0000', 'Company 2'),
(70021, '2020-01-01', 16, '15:00:00', '250.0000', '273.0000', 'Company 2'),
(70022, '2020-01-01', 16, '15:01:00', '250.0000', '143.0000', 'Company 2'),
(70023, '2020-01-01', 16, '15:02:00', '250.0000', '365.0000', 'Company 2'),
(70024, '2020-01-01', 16, '15:03:00', '250.0000', '309.0000', 'Company 2'),
(70025, '2020-01-01', 16, '15:04:00', '250.0000', '333.0000', 'Company 2'),
(70026, '2020-01-01', 16, '15:05:00', '250.0000', '145.0000', 'Company 2'),
(70027, '2020-01-01', 16, '15:06:00', '250.0000', '377.0000', 'Company 2'),
(70028, '2020-01-01', 16, '15:07:00', '250.0000', '200.0000', 'Company 2'),
(70029, '2020-01-01', 16, '15:08:00', '250.0000', '271.0000', 'Company 2'),
(70030, '2020-01-01', 16, '15:09:00', '250.0000', '346.0000', 'Company 2'),
(70031, '2020-01-01', 16, '15:10:00', '250.0000', '235.0000', 'Company 2'),
(70032, '2020-01-01', 16, '15:11:00', '250.0000', '348.0000', 'Company 2'),
(70033, '2020-01-01', 16, '15:12:00', '250.0000', '265.0000', 'Company 2'),
(70034, '2020-01-01', 16, '15:13:00', '250.0000', '322.0000', 'Company 2'),
(70035, '2020-01-01', 16, '15:14:00', '250.0000', '304.0000', 'Company 2'),
(70036, '2020-01-01', 16, '15:15:00', '250.0000', '265.0000', 'Company 2'),
(70037, '2020-01-01', 16, '15:16:00', '250.0000', '160.0000', 'Company 2'),
(70038, '2020-01-01', 16, '15:17:00', '250.0000', '174.0000', 'Company 2'),
(70039, '2020-01-01', 16, '15:18:00', '250.0000', '351.0000', 'Company 2'),
(70040, '2020-01-01', 16, '15:19:00', '250.0000', '222.0000', 'Company 2'),
(70041, '2020-01-01', 16, '15:20:00', '250.0000', '293.0000', 'Company 2'),
(70042, '2020-01-01', 16, '15:21:00', '250.0000', '344.0000', 'Company 2'),
(70043, '2020-01-01', 16, '15:22:00', '250.0000', '376.0000', 'Company 2'),
(70044, '2020-01-01', 16, '15:23:00', '250.0000', '339.0000', 'Company 2'),
(70045, '2020-01-01', 16, '15:24:00', '250.0000', '351.0000', 'Company 2'),
(70046, '2020-01-01', 16, '15:25:00', '250.0000', '369.0000', 'Company 2'),
(70047, '2020-01-01', 16, '15:26:00', '250.0000', '352.0000', 'Company 2'),
(70048, '2020-01-01', 16, '15:27:00', '250.0000', '142.0000', 'Company 2'),
(70049, '2020-01-01', 16, '15:28:00', '250.0000', '303.0000', 'Company 2'),
(70050, '2020-01-01', 16, '15:29:00', '250.0000', '361.0000', 'Company 2'),
(70051, '2020-01-01', 16, '15:30:00', '250.0000', '370.0000', 'Company 2'),
(70052, '2020-01-01', 16, '15:31:00', '250.0000', '365.0000', 'Company 2'),
(70053, '2020-01-01', 16, '15:32:00', '250.0000', '284.0000', 'Company 2'),
(70054, '2020-01-01', 16, '15:33:00', '250.0000', '289.0000', 'Company 2'),
(70055, '2020-01-01', 16, '15:34:00', '250.0000', '173.0000', 'Company 2'),
(70056, '2020-01-01', 16, '15:35:00', '250.0000', '152.0000', 'Company 2'),
(70057, '2020-01-01', 16, '15:36:00', '250.0000', '358.0000', 'Company 2'),
(70058, '2020-01-01', 16, '15:37:00', '250.0000', '153.0000', 'Company 2'),
(70059, '2020-01-01', 16, '15:38:00', '250.0000', '383.0000', 'Company 2'),
(70060, '2020-01-01', 16, '15:39:00', '250.0000', '266.0000', 'Company 2'),
(70061, '2020-01-01', 16, '15:40:00', '250.0000', '196.0000', 'Company 2'),
(70062, '2020-01-01', 16, '15:41:00', '250.0000', '304.0000', 'Company 2'),
(70063, '2020-01-01', 16, '15:42:00', '250.0000', '156.0000', 'Company 2'),
(70064, '2020-01-01', 16, '15:43:00', '250.0000', '286.0000', 'Company 2'),
(70065, '2020-01-01', 16, '15:44:00', '250.0000', '376.0000', 'Company 2'),
(70066, '2020-01-01', 16, '15:45:00', '250.0000', '244.0000', 'Company 2'),
(70067, '2020-01-01', 16, '15:46:00', '250.0000', '312.0000', 'Company 2'),
(70068, '2020-01-01', 16, '15:47:00', '250.0000', '291.0000', 'Company 2'),
(70069, '2020-01-01', 16, '15:48:00', '250.0000', '250.0000', 'Company 2'),
(70070, '2020-01-01', 16, '15:49:00', '250.0000', '235.0000', 'Company 2'),
(70071, '2020-01-01', 16, '15:50:00', '250.0000', '381.0000', 'Company 2'),
(70072, '2020-01-01', 16, '15:51:00', '250.0000', '321.0000', 'Company 2'),
(70073, '2020-01-01', 16, '15:52:00', '250.0000', '361.0000', 'Company 2'),
(70074, '2020-01-01', 16, '15:53:00', '250.0000', '282.0000', 'Company 2'),
(70075, '2020-01-01', 16, '15:54:00', '250.0000', '262.0000', 'Company 2'),
(70076, '2020-01-01', 16, '15:55:00', '250.0000', '378.0000', 'Company 2'),
(70077, '2020-01-01', 16, '15:56:00', '250.0000', '282.0000', 'Company 2'),
(70078, '2020-01-01', 16, '15:57:00', '250.0000', '331.0000', 'Company 2'),
(70079, '2020-01-01', 16, '15:58:00', '250.0000', '202.0000', 'Company 2'),
(70080, '2020-01-01', 16, '15:59:00', '250.0000', '383.0000', 'Company 2'),
(70081, '2020-01-01', 17, '16:00:00', '250.0000', '308.0000', 'Company 2'),
(70082, '2020-01-01', 17, '16:01:00', '250.0000', '300.0000', 'Company 2'),
(70083, '2020-01-01', 17, '16:02:00', '250.0000', '330.0000', 'Company 2'),
(70084, '2020-01-01', 17, '16:03:00', '250.0000', '375.0000', 'Company 2'),
(70085, '2020-01-01', 17, '16:04:00', '250.0000', '195.0000', 'Company 2'),
(70086, '2020-01-01', 17, '16:05:00', '250.0000', '188.0000', 'Company 2'),
(70087, '2020-01-01', 17, '16:06:00', '250.0000', '363.0000', 'Company 2'),
(70088, '2020-01-01', 17, '16:07:00', '250.0000', '302.0000', 'Company 2'),
(70089, '2020-01-01', 17, '16:08:00', '250.0000', '234.0000', 'Company 2'),
(70090, '2020-01-01', 17, '16:09:00', '250.0000', '356.0000', 'Company 2'),
(70091, '2020-01-01', 17, '16:10:00', '250.0000', '259.0000', 'Company 2'),
(70092, '2020-01-01', 17, '16:11:00', '250.0000', '187.0000', 'Company 2'),
(70093, '2020-01-01', 17, '16:12:00', '250.0000', '158.0000', 'Company 2'),
(70094, '2020-01-01', 17, '16:13:00', '250.0000', '302.0000', 'Company 2'),
(70095, '2020-01-01', 17, '16:14:00', '250.0000', '269.0000', 'Company 2'),
(70096, '2020-01-01', 17, '16:15:00', '250.0000', '258.0000', 'Company 2'),
(70097, '2020-01-01', 17, '16:16:00', '250.0000', '254.0000', 'Company 2'),
(70098, '2020-01-01', 17, '16:17:00', '250.0000', '247.0000', 'Company 2'),
(70099, '2020-01-01', 17, '16:18:00', '250.0000', '319.0000', 'Company 2'),
(70100, '2020-01-01', 17, '16:19:00', '250.0000', '296.0000', 'Company 2'),
(70101, '2020-01-01', 17, '16:20:00', '250.0000', '224.0000', 'Company 2'),
(70102, '2020-01-01', 17, '16:21:00', '250.0000', '384.0000', 'Company 2'),
(70103, '2020-01-01', 17, '16:22:00', '250.0000', '232.0000', 'Company 2'),
(70104, '2020-01-01', 17, '16:23:00', '250.0000', '162.0000', 'Company 2'),
(70105, '2020-01-01', 17, '16:24:00', '250.0000', '306.0000', 'Company 2'),
(70106, '2020-01-01', 17, '16:25:00', '250.0000', '390.0000', 'Company 2'),
(70107, '2020-01-01', 17, '16:26:00', '250.0000', '272.0000', 'Company 2'),
(70108, '2020-01-01', 17, '16:27:00', '250.0000', '191.0000', 'Company 2'),
(70109, '2020-01-01', 17, '16:28:00', '250.0000', '172.0000', 'Company 2'),
(70110, '2020-01-01', 17, '16:29:00', '250.0000', '145.0000', 'Company 2'),
(70111, '2020-01-01', 17, '16:30:00', '250.0000', '252.0000', 'Company 2'),
(70112, '2020-01-01', 17, '16:31:00', '250.0000', '255.0000', 'Company 2'),
(70113, '2020-01-01', 17, '16:32:00', '250.0000', '154.0000', 'Company 2'),
(70114, '2020-01-01', 17, '16:33:00', '250.0000', '307.0000', 'Company 2'),
(70115, '2020-01-01', 17, '16:34:00', '250.0000', '211.0000', 'Company 2'),
(70116, '2020-01-01', 17, '16:35:00', '250.0000', '359.0000', 'Company 2'),
(70117, '2020-01-01', 17, '16:36:00', '250.0000', '292.0000', 'Company 2'),
(70118, '2020-01-01', 17, '16:37:00', '250.0000', '235.0000', 'Company 2'),
(70119, '2020-01-01', 17, '16:38:00', '250.0000', '353.0000', 'Company 2'),
(70120, '2020-01-01', 17, '16:39:00', '250.0000', '314.0000', 'Company 2'),
(70121, '2020-01-01', 17, '16:40:00', '250.0000', '333.0000', 'Company 2'),
(70122, '2020-01-01', 17, '16:41:00', '250.0000', '304.0000', 'Company 2'),
(70123, '2020-01-01', 17, '16:42:00', '250.0000', '344.0000', 'Company 2'),
(70124, '2020-01-01', 17, '16:43:00', '250.0000', '289.0000', 'Company 2'),
(70125, '2020-01-01', 17, '16:44:00', '250.0000', '192.0000', 'Company 2'),
(70126, '2020-01-01', 17, '16:45:00', '250.0000', '236.0000', 'Company 2'),
(70127, '2020-01-01', 17, '16:46:00', '250.0000', '158.0000', 'Company 2'),
(70128, '2020-01-01', 17, '16:47:00', '250.0000', '323.0000', 'Company 2'),
(70129, '2020-01-01', 17, '16:48:00', '250.0000', '294.0000', 'Company 2'),
(70130, '2020-01-01', 17, '16:49:00', '250.0000', '340.0000', 'Company 2'),
(70131, '2020-01-01', 17, '16:50:00', '250.0000', '349.0000', 'Company 2'),
(70132, '2020-01-01', 17, '16:51:00', '250.0000', '158.0000', 'Company 2'),
(70133, '2020-01-01', 17, '16:52:00', '250.0000', '249.0000', 'Company 2'),
(70134, '2020-01-01', 17, '16:53:00', '250.0000', '228.0000', 'Company 2'),
(70135, '2020-01-01', 17, '16:54:00', '250.0000', '370.0000', 'Company 2'),
(70136, '2020-01-01', 17, '16:55:00', '250.0000', '217.0000', 'Company 2'),
(70137, '2020-01-01', 17, '16:56:00', '250.0000', '274.0000', 'Company 2'),
(70138, '2020-01-01', 17, '16:57:00', '250.0000', '306.0000', 'Company 2'),
(70139, '2020-01-01', 17, '16:58:00', '250.0000', '372.0000', 'Company 2'),
(70140, '2020-01-01', 17, '16:59:00', '250.0000', '200.0000', 'Company 2'),
(70141, '2020-01-01', 18, '17:00:00', '250.0000', '245.0000', 'Company 2'),
(70142, '2020-01-01', 18, '17:01:00', '250.0000', '290.0000', 'Company 2'),
(70143, '2020-01-01', 18, '17:02:00', '250.0000', '245.0000', 'Company 2'),
(70144, '2020-01-01', 18, '17:03:00', '250.0000', '205.0000', 'Company 2'),
(70145, '2020-01-01', 18, '17:04:00', '250.0000', '323.0000', 'Company 2'),
(70146, '2020-01-01', 18, '17:05:00', '250.0000', '260.0000', 'Company 2'),
(70147, '2020-01-01', 18, '17:06:00', '250.0000', '270.0000', 'Company 2'),
(70148, '2020-01-01', 18, '17:07:00', '250.0000', '341.0000', 'Company 2'),
(70149, '2020-01-01', 18, '17:08:00', '250.0000', '233.0000', 'Company 2'),
(70150, '2020-01-01', 18, '17:09:00', '250.0000', '218.0000', 'Company 2'),
(70151, '2020-01-01', 18, '17:10:00', '250.0000', '204.0000', 'Company 2'),
(70152, '2020-01-01', 18, '17:11:00', '250.0000', '168.0000', 'Company 2'),
(70153, '2020-01-01', 18, '17:12:00', '250.0000', '167.0000', 'Company 2'),
(70154, '2020-01-01', 18, '17:13:00', '250.0000', '238.0000', 'Company 2'),
(70155, '2020-01-01', 18, '17:14:00', '250.0000', '292.0000', 'Company 2'),
(70156, '2020-01-01', 18, '17:15:00', '250.0000', '263.0000', 'Company 2'),
(70157, '2020-01-01', 18, '17:16:00', '250.0000', '187.0000', 'Company 2'),
(70158, '2020-01-01', 18, '17:17:00', '250.0000', '389.0000', 'Company 2'),
(70159, '2020-01-01', 18, '17:18:00', '250.0000', '343.0000', 'Company 2'),
(70160, '2020-01-01', 18, '17:19:00', '250.0000', '378.0000', 'Company 2'),
(70161, '2020-01-01', 18, '17:20:00', '250.0000', '333.0000', 'Company 2'),
(70162, '2020-01-01', 18, '17:21:00', '250.0000', '213.0000', 'Company 2'),
(70163, '2020-01-01', 18, '17:22:00', '250.0000', '185.0000', 'Company 2'),
(70164, '2020-01-01', 18, '17:23:00', '250.0000', '272.0000', 'Company 2'),
(70165, '2020-01-01', 18, '17:24:00', '250.0000', '162.0000', 'Company 2'),
(70166, '2020-01-01', 18, '17:25:00', '250.0000', '260.0000', 'Company 2'),
(70167, '2020-01-01', 18, '17:26:00', '250.0000', '359.0000', 'Company 2'),
(70168, '2020-01-01', 18, '17:27:00', '250.0000', '310.0000', 'Company 2'),
(70169, '2020-01-01', 18, '17:28:00', '250.0000', '389.0000', 'Company 2'),
(70170, '2020-01-01', 18, '17:29:00', '250.0000', '214.0000', 'Company 2'),
(70171, '2020-01-01', 18, '17:30:00', '250.0000', '160.0000', 'Company 2'),
(70172, '2020-01-01', 18, '17:31:00', '250.0000', '232.0000', 'Company 2'),
(70173, '2020-01-01', 18, '17:32:00', '250.0000', '144.0000', 'Company 2'),
(70174, '2020-01-01', 18, '17:33:00', '250.0000', '143.0000', 'Company 2'),
(70175, '2020-01-01', 18, '17:34:00', '250.0000', '319.0000', 'Company 2'),
(70176, '2020-01-01', 18, '17:35:00', '250.0000', '259.0000', 'Company 2'),
(70177, '2020-01-01', 18, '17:36:00', '250.0000', '265.0000', 'Company 2'),
(70178, '2020-01-01', 18, '17:37:00', '250.0000', '233.0000', 'Company 2'),
(70179, '2020-01-01', 18, '17:38:00', '250.0000', '151.0000', 'Company 2'),
(70180, '2020-01-01', 18, '17:39:00', '250.0000', '152.0000', 'Company 2'),
(70181, '2020-01-01', 18, '17:40:00', '250.0000', '340.0000', 'Company 2'),
(70182, '2020-01-01', 18, '17:41:00', '250.0000', '220.0000', 'Company 2'),
(70183, '2020-01-01', 18, '17:42:00', '250.0000', '171.0000', 'Company 2'),
(70184, '2020-01-01', 18, '17:43:00', '250.0000', '196.0000', 'Company 2'),
(70185, '2020-01-01', 18, '17:44:00', '250.0000', '194.0000', 'Company 2'),
(70186, '2020-01-01', 18, '17:45:00', '250.0000', '261.0000', 'Company 2'),
(70187, '2020-01-01', 18, '17:46:00', '250.0000', '158.0000', 'Company 2'),
(70188, '2020-01-01', 18, '17:47:00', '250.0000', '250.0000', 'Company 2'),
(70189, '2020-01-01', 18, '17:48:00', '250.0000', '382.0000', 'Company 2'),
(70190, '2020-01-01', 18, '17:49:00', '250.0000', '254.0000', 'Company 2'),
(70191, '2020-01-01', 18, '17:50:00', '250.0000', '169.0000', 'Company 2'),
(70192, '2020-01-01', 18, '17:51:00', '250.0000', '324.0000', 'Company 2'),
(70193, '2020-01-01', 18, '17:52:00', '250.0000', '241.0000', 'Company 2'),
(70194, '2020-01-01', 18, '17:53:00', '250.0000', '161.0000', 'Company 2'),
(70195, '2020-01-01', 18, '17:54:00', '250.0000', '310.0000', 'Company 2'),
(70196, '2020-01-01', 18, '17:55:00', '250.0000', '324.0000', 'Company 2'),
(70197, '2020-01-01', 18, '17:56:00', '250.0000', '206.0000', 'Company 2'),
(70198, '2020-01-01', 18, '17:57:00', '250.0000', '217.0000', 'Company 2'),
(70199, '2020-01-01', 18, '17:58:00', '250.0000', '302.0000', 'Company 2'),
(70200, '2020-01-01', 18, '17:59:00', '250.0000', '210.0000', 'Company 2'),
(70201, '2020-01-01', 19, '18:00:00', '250.0000', '166.0000', 'Company 2'),
(70202, '2020-01-01', 19, '18:01:00', '250.0000', '284.0000', 'Company 2'),
(70203, '2020-01-01', 19, '18:02:00', '250.0000', '339.0000', 'Company 2'),
(70204, '2020-01-01', 19, '18:03:00', '250.0000', '258.0000', 'Company 2'),
(70205, '2020-01-01', 19, '18:04:00', '250.0000', '260.0000', 'Company 2'),
(70206, '2020-01-01', 19, '18:05:00', '250.0000', '329.0000', 'Company 2'),
(70207, '2020-01-01', 19, '18:06:00', '250.0000', '337.0000', 'Company 2'),
(70208, '2020-01-01', 19, '18:07:00', '250.0000', '334.0000', 'Company 2'),
(70209, '2020-01-01', 19, '18:08:00', '250.0000', '199.0000', 'Company 2'),
(70210, '2020-01-01', 19, '18:09:00', '250.0000', '229.0000', 'Company 2'),
(70211, '2020-01-01', 19, '18:10:00', '250.0000', '183.0000', 'Company 2'),
(70212, '2020-01-01', 19, '18:11:00', '250.0000', '328.0000', 'Company 2'),
(70213, '2020-01-01', 19, '18:12:00', '250.0000', '212.0000', 'Company 2'),
(70214, '2020-01-01', 19, '18:13:00', '250.0000', '167.0000', 'Company 2'),
(70215, '2020-01-01', 19, '18:14:00', '250.0000', '308.0000', 'Company 2'),
(70216, '2020-01-01', 19, '18:15:00', '250.0000', '272.0000', 'Company 2'),
(70217, '2020-01-01', 19, '18:16:00', '250.0000', '197.0000', 'Company 2'),
(70218, '2020-01-01', 19, '18:17:00', '250.0000', '269.0000', 'Company 2'),
(70219, '2020-01-01', 19, '18:18:00', '250.0000', '358.0000', 'Company 2'),
(70220, '2020-01-01', 19, '18:19:00', '250.0000', '171.0000', 'Company 2'),
(70221, '2020-01-01', 19, '18:20:00', '250.0000', '346.0000', 'Company 2'),
(70222, '2020-01-01', 19, '18:21:00', '250.0000', '280.0000', 'Company 2'),
(70223, '2020-01-01', 19, '18:22:00', '250.0000', '260.0000', 'Company 2'),
(70224, '2020-01-01', 19, '18:23:00', '250.0000', '351.0000', 'Company 2'),
(70225, '2020-01-01', 19, '18:24:00', '250.0000', '285.0000', 'Company 2'),
(70226, '2020-01-01', 19, '18:25:00', '250.0000', '278.0000', 'Company 2'),
(70227, '2020-01-01', 19, '18:26:00', '250.0000', '380.0000', 'Company 2'),
(70228, '2020-01-01', 19, '18:27:00', '250.0000', '353.0000', 'Company 2'),
(70229, '2020-01-01', 19, '18:28:00', '250.0000', '338.0000', 'Company 2'),
(70230, '2020-01-01', 19, '18:29:00', '250.0000', '169.0000', 'Company 2'),
(70231, '2020-01-01', 19, '18:30:00', '250.0000', '262.0000', 'Company 2'),
(70232, '2020-01-01', 19, '18:31:00', '250.0000', '245.0000', 'Company 2'),
(70233, '2020-01-01', 19, '18:32:00', '250.0000', '351.0000', 'Company 2'),
(70234, '2020-01-01', 19, '18:33:00', '250.0000', '305.0000', 'Company 2'),
(70235, '2020-01-01', 19, '18:34:00', '250.0000', '223.0000', 'Company 2'),
(70236, '2020-01-01', 19, '18:35:00', '250.0000', '355.0000', 'Company 2'),
(70237, '2020-01-01', 19, '18:36:00', '250.0000', '268.0000', 'Company 2'),
(70238, '2020-01-01', 19, '18:37:00', '250.0000', '174.0000', 'Company 2'),
(70239, '2020-01-01', 19, '18:38:00', '250.0000', '374.0000', 'Company 2'),
(70240, '2020-01-01', 19, '18:39:00', '350.0000', '194.0000', 'Company 2'),
(70241, '2020-01-01', 19, '18:40:00', '350.0000', '149.0000', 'Company 2'),
(70242, '2020-01-01', 19, '18:41:00', '350.0000', '190.0000', 'Company 2'),
(70243, '2020-01-01', 19, '18:42:00', '350.0000', '389.0000', 'Company 2'),
(70244, '2020-01-01', 19, '18:43:00', '350.0000', '346.0000', 'Company 2'),
(70245, '2020-01-01', 19, '18:44:00', '350.0000', '381.0000', 'Company 2'),
(70246, '2020-01-01', 19, '18:45:00', '350.0000', '155.0000', 'Company 2'),
(70247, '2020-01-01', 19, '18:46:00', '350.0000', '299.0000', 'Company 2'),
(70248, '2020-01-01', 19, '18:47:00', '350.0000', '301.0000', 'Company 2'),
(70249, '2020-01-01', 19, '18:48:00', '350.0000', '314.0000', 'Company 2'),
(70250, '2020-01-01', 19, '18:49:00', '350.0000', '269.0000', 'Company 2'),
(70251, '2020-01-01', 19, '18:50:00', '350.0000', '301.0000', 'Company 2'),
(70252, '2020-01-01', 19, '18:51:00', '350.0000', '307.0000', 'Company 2'),
(70253, '2020-01-01', 19, '18:52:00', '350.0000', '235.0000', 'Company 2'),
(70254, '2020-01-01', 19, '18:53:00', '350.0000', '315.0000', 'Company 2'),
(70255, '2020-01-01', 19, '18:54:00', '350.0000', '146.0000', 'Company 2'),
(70256, '2020-01-01', 19, '18:55:00', '350.0000', '323.0000', 'Company 2'),
(70257, '2020-01-01', 19, '18:56:00', '350.0000', '285.0000', 'Company 2'),
(70258, '2020-01-01', 19, '18:57:00', '350.0000', '376.0000', 'Company 2'),
(70259, '2020-01-01', 19, '18:58:00', '350.0000', '337.0000', 'Company 2'),
(70260, '2020-01-01', 19, '18:59:00', '350.0000', '346.0000', 'Company 2'),
(70261, '2020-01-01', 20, '19:00:00', '350.0000', '352.0000', 'Company 2'),
(70262, '2020-01-01', 20, '19:01:00', '350.0000', '375.0000', 'Company 2'),
(70263, '2020-01-01', 20, '19:02:00', '350.0000', '358.0000', 'Company 2'),
(70264, '2020-01-01', 20, '19:03:00', '350.0000', '344.0000', 'Company 2'),
(70265, '2020-01-01', 20, '19:04:00', '350.0000', '379.0000', 'Company 2'),
(70266, '2020-01-01', 20, '19:05:00', '350.0000', '216.0000', 'Company 2'),
(70267, '2020-01-01', 20, '19:06:00', '350.0000', '319.0000', 'Company 2'),
(70268, '2020-01-01', 20, '19:07:00', '350.0000', '282.0000', 'Company 2'),
(70269, '2020-01-01', 20, '19:08:00', '350.0000', '151.0000', 'Company 2'),
(70270, '2020-01-01', 20, '19:09:00', '350.0000', '276.0000', 'Company 2'),
(70271, '2020-01-01', 20, '19:10:00', '350.0000', '152.0000', 'Company 2'),
(70272, '2020-01-01', 20, '19:11:00', '350.0000', '285.0000', 'Company 2'),
(70273, '2020-01-01', 20, '19:12:00', '350.0000', '250.0000', 'Company 2'),
(70274, '2020-01-01', 20, '19:13:00', '350.0000', '346.0000', 'Company 2'),
(70275, '2020-01-01', 20, '19:14:00', '350.0000', '276.0000', 'Company 2'),
(70276, '2020-01-01', 20, '19:15:00', '350.0000', '190.0000', 'Company 2'),
(70277, '2020-01-01', 20, '19:16:00', '350.0000', '295.0000', 'Company 2'),
(70278, '2020-01-01', 20, '19:17:00', '350.0000', '309.0000', 'Company 2'),
(70279, '2020-01-01', 20, '19:18:00', '350.0000', '293.0000', 'Company 2'),
(70280, '2020-01-01', 20, '19:19:00', '350.0000', '256.0000', 'Company 2'),
(70281, '2020-01-01', 20, '19:20:00', '350.0000', '364.0000', 'Company 2'),
(70282, '2020-01-01', 20, '19:21:00', '350.0000', '182.0000', 'Company 2'),
(70283, '2020-01-01', 20, '19:22:00', '350.0000', '266.0000', 'Company 2'),
(70284, '2020-01-01', 20, '19:23:00', '350.0000', '272.0000', 'Company 2'),
(70285, '2020-01-01', 20, '19:24:00', '350.0000', '256.0000', 'Company 2'),
(70286, '2020-01-01', 20, '19:25:00', '350.0000', '148.0000', 'Company 2'),
(70287, '2020-01-01', 20, '19:26:00', '350.0000', '328.0000', 'Company 2'),
(70288, '2020-01-01', 20, '19:27:00', '350.0000', '304.0000', 'Company 2'),
(70289, '2020-01-01', 20, '19:28:00', '350.0000', '288.0000', 'Company 2'),
(70290, '2020-01-01', 20, '19:29:00', '350.0000', '234.0000', 'Company 2'),
(70291, '2020-01-01', 20, '19:30:00', '350.0000', '232.0000', 'Company 2'),
(70292, '2020-01-01', 20, '19:31:00', '350.0000', '333.0000', 'Company 2'),
(70293, '2020-01-01', 20, '19:32:00', '350.0000', '323.0000', 'Company 2'),
(70294, '2020-01-01', 20, '19:33:00', '350.0000', '362.0000', 'Company 2'),
(70295, '2020-01-01', 20, '19:34:00', '350.0000', '225.0000', 'Company 2'),
(70296, '2020-01-01', 20, '19:35:00', '350.0000', '352.0000', 'Company 2'),
(70297, '2020-01-01', 20, '19:36:00', '350.0000', '294.0000', 'Company 2'),
(70298, '2020-01-01', 20, '19:37:00', '350.0000', '334.0000', 'Company 2'),
(70299, '2020-01-01', 20, '19:38:00', '350.0000', '310.0000', 'Company 2'),
(70300, '2020-01-01', 20, '19:39:00', '350.0000', '282.0000', 'Company 2'),
(70301, '2020-01-01', 20, '19:40:00', '350.0000', '177.0000', 'Company 2'),
(70302, '2020-01-01', 20, '19:41:00', '350.0000', '212.0000', 'Company 2'),
(70303, '2020-01-01', 20, '19:42:00', '350.0000', '305.0000', 'Company 2'),
(70304, '2020-01-01', 20, '19:43:00', '350.0000', '197.0000', 'Company 2'),
(70305, '2020-01-01', 20, '19:44:00', '350.0000', '252.0000', 'Company 2'),
(70306, '2020-01-01', 20, '19:45:00', '350.0000', '300.0000', 'Company 2'),
(70307, '2020-01-01', 20, '19:46:00', '350.0000', '269.0000', 'Company 2'),
(70308, '2020-01-01', 20, '19:47:00', '350.0000', '234.0000', 'Company 2'),
(70309, '2020-01-01', 20, '19:48:00', '350.0000', '256.0000', 'Company 2'),
(70310, '2020-01-01', 20, '19:49:00', '160.0000', '354.0000', 'Company 2'),
(70311, '2020-01-01', 20, '19:50:00', '160.0000', '374.0000', 'Company 2'),
(70312, '2020-01-01', 20, '19:51:00', '160.0000', '277.0000', 'Company 2'),
(70313, '2020-01-01', 20, '19:52:00', '160.0000', '232.0000', 'Company 2'),
(70314, '2020-01-01', 20, '19:53:00', '160.0000', '200.0000', 'Company 2'),
(70315, '2020-01-01', 20, '19:54:00', '160.0000', '195.0000', 'Company 2'),
(70316, '2020-01-01', 20, '19:55:00', '160.0000', '379.0000', 'Company 2'),
(70317, '2020-01-01', 20, '19:56:00', '160.0000', '179.0000', 'Company 2'),
(70318, '2020-01-01', 20, '19:57:00', '160.0000', '381.0000', 'Company 2'),
(70319, '2020-01-01', 20, '19:58:00', '160.0000', '341.0000', 'Company 2'),
(70320, '2020-01-01', 20, '19:59:00', '160.0000', '275.0000', 'Company 2'),
(70321, '2020-01-01', 21, '20:00:00', '160.0000', '206.0000', 'Company 2'),
(70322, '2020-01-01', 21, '20:01:00', '160.0000', '274.0000', 'Company 2'),
(70323, '2020-01-01', 21, '20:02:00', '160.0000', '364.0000', 'Company 2'),
(70324, '2020-01-01', 21, '20:03:00', '160.0000', '148.0000', 'Company 2'),
(70325, '2020-01-01', 21, '20:04:00', '160.0000', '191.0000', 'Company 2'),
(70326, '2020-01-01', 21, '20:05:00', '160.0000', '221.0000', 'Company 2'),
(70327, '2020-01-01', 21, '20:06:00', '160.0000', '282.0000', 'Company 2'),
(70328, '2020-01-01', 21, '20:07:00', '160.0000', '327.0000', 'Company 2'),
(70329, '2020-01-01', 21, '20:08:00', '160.0000', '235.0000', 'Company 2'),
(70330, '2020-01-01', 21, '20:09:00', '160.0000', '163.0000', 'Company 2'),
(70331, '2020-01-01', 21, '20:10:00', '160.0000', '215.0000', 'Company 2'),
(70332, '2020-01-01', 21, '20:11:00', '160.0000', '295.0000', 'Company 2'),
(70333, '2020-01-01', 21, '20:12:00', '160.0000', '149.0000', 'Company 2'),
(70334, '2020-01-01', 21, '20:13:00', '160.0000', '257.0000', 'Company 2'),
(70335, '2020-01-01', 21, '20:14:00', '160.0000', '371.0000', 'Company 2'),
(70336, '2020-01-01', 21, '20:15:00', '160.0000', '306.0000', 'Company 2'),
(70337, '2020-01-01', 21, '20:16:00', '160.0000', '368.0000', 'Company 2'),
(70338, '2020-01-01', 21, '20:17:00', '160.0000', '204.0000', 'Company 2'),
(70339, '2020-01-01', 21, '20:18:00', '160.0000', '329.0000', 'Company 2'),
(70340, '2020-01-01', 21, '20:19:00', '160.0000', '351.0000', 'Company 2'),
(70341, '2020-01-01', 21, '20:20:00', '160.0000', '346.0000', 'Company 2'),
(70342, '2020-01-01', 21, '20:21:00', '160.0000', '211.0000', 'Company 2'),
(70343, '2020-01-01', 21, '20:22:00', '160.0000', '152.0000', 'Company 2'),
(70344, '2020-01-01', 21, '20:23:00', '160.0000', '312.0000', 'Company 2'),
(70345, '2020-01-01', 21, '20:24:00', '160.0000', '201.0000', 'Company 2'),
(70346, '2020-01-01', 21, '20:25:00', '160.0000', '203.0000', 'Company 2'),
(70347, '2020-01-01', 21, '20:26:00', '160.0000', '343.0000', 'Company 2'),
(70348, '2020-01-01', 21, '20:27:00', '160.0000', '330.0000', 'Company 2'),
(70349, '2020-01-01', 21, '20:28:00', '160.0000', '168.0000', 'Company 2'),
(70350, '2020-01-01', 21, '20:29:00', '160.0000', '340.0000', 'Company 2'),
(70351, '2020-01-01', 21, '20:30:00', '160.0000', '320.0000', 'Company 2'),
(70352, '2020-01-01', 21, '20:31:00', '160.0000', '181.0000', 'Company 2'),
(70353, '2020-01-01', 21, '20:32:00', '160.0000', '223.0000', 'Company 2'),
(70354, '2020-01-01', 21, '20:33:00', '160.0000', '381.0000', 'Company 2'),
(70355, '2020-01-01', 21, '20:34:00', '160.0000', '145.0000', 'Company 2'),
(70356, '2020-01-01', 21, '20:35:00', '160.0000', '302.0000', 'Company 2'),
(70357, '2020-01-01', 21, '20:36:00', '160.0000', '219.0000', 'Company 2'),
(70358, '2020-01-01', 21, '20:37:00', '160.0000', '225.0000', 'Company 2'),
(70359, '2020-01-01', 21, '20:38:00', '160.0000', '298.0000', 'Company 2'),
(70360, '2020-01-01', 21, '20:39:00', '160.0000', '323.0000', 'Company 2'),
(70361, '2020-01-01', 21, '20:40:00', '160.0000', '209.0000', 'Company 2'),
(70362, '2020-01-01', 21, '20:41:00', '160.0000', '162.0000', 'Company 2'),
(70363, '2020-01-01', 21, '20:42:00', '160.0000', '215.0000', 'Company 2'),
(70364, '2020-01-01', 21, '20:43:00', '160.0000', '367.0000', 'Company 2'),
(70365, '2020-01-01', 21, '20:44:00', '160.0000', '359.0000', 'Company 2'),
(70366, '2020-01-01', 21, '20:45:00', '160.0000', '277.0000', 'Company 2'),
(70367, '2020-01-01', 21, '20:46:00', '160.0000', '285.0000', 'Company 2'),
(70368, '2020-01-01', 21, '20:47:00', '160.0000', '241.0000', 'Company 2'),
(70369, '2020-01-01', 21, '20:48:00', '160.0000', '267.0000', 'Company 2'),
(70370, '2020-01-01', 21, '20:49:00', '160.0000', '247.0000', 'Company 2'),
(70371, '2020-01-01', 21, '20:50:00', '160.0000', '201.0000', 'Company 2'),
(70372, '2020-01-01', 21, '20:51:00', '160.0000', '256.0000', 'Company 2'),
(70373, '2020-01-01', 21, '20:52:00', '160.0000', '214.0000', 'Company 2'),
(70374, '2020-01-01', 21, '20:53:00', '160.0000', '250.0000', 'Company 2'),
(70375, '2020-01-01', 21, '20:54:00', '160.0000', '312.0000', 'Company 2'),
(70376, '2020-01-01', 21, '20:55:00', '160.0000', '364.0000', 'Company 2'),
(70377, '2020-01-01', 21, '20:56:00', '160.0000', '201.0000', 'Company 2'),
(70378, '2020-01-01', 21, '20:57:00', '160.0000', '363.0000', 'Company 2'),
(70379, '2020-01-01', 21, '20:58:00', '160.0000', '304.0000', 'Company 2'),
(70380, '2020-01-01', 21, '20:59:00', '160.0000', '311.0000', 'Company 2'),
(70381, '2020-01-01', 22, '21:00:00', '160.0000', '224.0000', 'Company 2'),
(70382, '2020-01-01', 22, '21:01:00', '160.0000', '238.0000', 'Company 2'),
(70383, '2020-01-01', 22, '21:02:00', '160.0000', '221.0000', 'Company 2'),
(70384, '2020-01-01', 22, '21:03:00', '160.0000', '202.0000', 'Company 2'),
(70385, '2020-01-01', 22, '21:04:00', '160.0000', '243.0000', 'Company 2'),
(70386, '2020-01-01', 22, '21:05:00', '160.0000', '250.0000', 'Company 2'),
(70387, '2020-01-01', 22, '21:06:00', '160.0000', '325.0000', 'Company 2'),
(70388, '2020-01-01', 22, '21:07:00', '160.0000', '313.0000', 'Company 2'),
(70389, '2020-01-01', 22, '21:08:00', '160.0000', '324.0000', 'Company 2'),
(70390, '2020-01-01', 22, '21:09:00', '160.0000', '376.0000', 'Company 2'),
(70391, '2020-01-01', 22, '21:10:00', '160.0000', '389.0000', 'Company 2'),
(70392, '2020-01-01', 22, '21:11:00', '160.0000', '171.0000', 'Company 2'),
(70393, '2020-01-01', 22, '21:12:00', '160.0000', '178.0000', 'Company 2'),
(70394, '2020-01-01', 22, '21:13:00', '160.0000', '266.0000', 'Company 2'),
(70395, '2020-01-01', 22, '21:14:00', '160.0000', '152.0000', 'Company 2'),
(70396, '2020-01-01', 22, '21:15:00', '160.0000', '157.0000', 'Company 2'),
(70397, '2020-01-01', 22, '21:16:00', '160.0000', '246.0000', 'Company 2'),
(70398, '2020-01-01', 22, '21:17:00', '160.0000', '154.0000', 'Company 2'),
(70399, '2020-01-01', 22, '21:18:00', '160.0000', '351.0000', 'Company 2'),
(70400, '2020-01-01', 22, '21:19:00', '160.0000', '283.0000', 'Company 2'),
(70401, '2020-01-01', 22, '21:20:00', '160.0000', '140.0000', 'Company 2'),
(70402, '2020-01-01', 22, '21:21:00', '160.0000', '256.0000', 'Company 2'),
(70403, '2020-01-01', 22, '21:22:00', '160.0000', '274.0000', 'Company 2'),
(70404, '2020-01-01', 22, '21:23:00', '160.0000', '148.0000', 'Company 2'),
(70405, '2020-01-01', 22, '21:24:00', '160.0000', '380.0000', 'Company 2'),
(70406, '2020-01-01', 22, '21:25:00', '160.0000', '257.0000', 'Company 2'),
(70407, '2020-01-01', 22, '21:26:00', '160.0000', '316.0000', 'Company 2'),
(70408, '2020-01-01', 22, '21:27:00', '160.0000', '152.0000', 'Company 2'),
(70409, '2020-01-01', 22, '21:28:00', '160.0000', '250.0000', 'Company 2'),
(70410, '2020-01-01', 22, '21:29:00', '160.0000', '326.0000', 'Company 2'),
(70411, '2020-01-01', 22, '21:30:00', '160.0000', '350.0000', 'Company 2'),
(70412, '2020-01-01', 22, '21:31:00', '160.0000', '176.0000', 'Company 2'),
(70413, '2020-01-01', 22, '21:32:00', '160.0000', '321.0000', 'Company 2'),
(70414, '2020-01-01', 22, '21:33:00', '160.0000', '150.0000', 'Company 2'),
(70415, '2020-01-01', 22, '21:34:00', '160.0000', '251.0000', 'Company 2'),
(70416, '2020-01-01', 22, '21:35:00', '160.0000', '308.0000', 'Company 2'),
(70417, '2020-01-01', 22, '21:36:00', '160.0000', '293.0000', 'Company 2'),
(70418, '2020-01-01', 22, '21:37:00', '160.0000', '143.0000', 'Company 2'),
(70419, '2020-01-01', 22, '21:38:00', '160.0000', '331.0000', 'Company 2'),
(70420, '2020-01-01', 22, '21:39:00', '160.0000', '352.0000', 'Company 2'),
(70421, '2020-01-01', 22, '21:40:00', '160.0000', '192.0000', 'Company 2'),
(70422, '2020-01-01', 22, '21:41:00', '160.0000', '233.0000', 'Company 2'),
(70423, '2020-01-01', 22, '21:42:00', '160.0000', '247.0000', 'Company 2'),
(70424, '2020-01-01', 22, '21:43:00', '160.0000', '280.0000', 'Company 2'),
(70425, '2020-01-01', 22, '21:44:00', '160.0000', '360.0000', 'Company 2'),
(70426, '2020-01-01', 22, '21:45:00', '160.0000', '188.0000', 'Company 2'),
(70427, '2020-01-01', 22, '21:46:00', '160.0000', '275.0000', 'Company 2'),
(70428, '2020-01-01', 22, '21:47:00', '160.0000', '287.0000', 'Company 2'),
(70429, '2020-01-01', 22, '21:48:00', '160.0000', '308.0000', 'Company 2'),
(70430, '2020-01-01', 22, '21:49:00', '160.0000', '152.0000', 'Company 2'),
(70431, '2020-01-01', 22, '21:50:00', '160.0000', '224.0000', 'Company 2'),
(70432, '2020-01-01', 22, '21:51:00', '160.0000', '228.0000', 'Company 2'),
(70433, '2020-01-01', 22, '21:52:00', '160.0000', '278.0000', 'Company 2'),
(70434, '2020-01-01', 22, '21:53:00', '160.0000', '143.0000', 'Company 2'),
(70435, '2020-01-01', 22, '21:54:00', '160.0000', '308.0000', 'Company 2'),
(70436, '2020-01-01', 22, '21:55:00', '160.0000', '247.0000', 'Company 2'),
(70437, '2020-01-01', 22, '21:56:00', '160.0000', '243.0000', 'Company 2'),
(70438, '2020-01-01', 22, '21:57:00', '160.0000', '153.0000', 'Company 2'),
(70439, '2020-01-01', 22, '21:58:00', '145.0000', '322.0000', 'Company 2'),
(70440, '2020-01-01', 22, '21:59:00', '145.0000', '277.0000', 'Company 2'),
(70441, '2020-01-01', 23, '22:00:00', '145.0000', '378.0000', 'Company 2'),
(70442, '2020-01-01', 23, '22:01:00', '145.0000', '331.0000', 'Company 2'),
(70443, '2020-01-01', 23, '22:02:00', '145.0000', '382.0000', 'Company 2'),
(70444, '2020-01-01', 23, '22:03:00', '145.0000', '220.0000', 'Company 2'),
(70445, '2020-01-01', 23, '22:04:00', '145.0000', '187.0000', 'Company 2'),
(70446, '2020-01-01', 23, '22:05:00', '145.0000', '201.0000', 'Company 2'),
(70447, '2020-01-01', 23, '22:06:00', '145.0000', '336.0000', 'Company 2'),
(70448, '2020-01-01', 23, '22:07:00', '145.0000', '245.0000', 'Company 2'),
(70449, '2020-01-01', 23, '22:08:00', '145.0000', '347.0000', 'Company 2'),
(70450, '2020-01-01', 23, '22:09:00', '145.0000', '201.0000', 'Company 2'),
(70451, '2020-01-01', 23, '22:10:00', '145.0000', '360.0000', 'Company 2'),
(70452, '2020-01-01', 23, '22:11:00', '145.0000', '176.0000', 'Company 2'),
(70453, '2020-01-01', 23, '22:12:00', '145.0000', '253.0000', 'Company 2'),
(70454, '2020-01-01', 23, '22:13:00', '145.0000', '166.0000', 'Company 2'),
(70455, '2020-01-01', 23, '22:14:00', '145.0000', '325.0000', 'Company 2'),
(70456, '2020-01-01', 23, '22:15:00', '145.0000', '342.0000', 'Company 2'),
(70457, '2020-01-01', 23, '22:16:00', '145.0000', '315.0000', 'Company 2'),
(70458, '2020-01-01', 23, '22:17:00', '145.0000', '277.0000', 'Company 2'),
(70459, '2020-01-01', 23, '22:18:00', '145.0000', '355.0000', 'Company 2'),
(70460, '2020-01-01', 23, '22:19:00', '145.0000', '287.0000', 'Company 2'),
(70461, '2020-01-01', 23, '22:20:00', '145.0000', '241.0000', 'Company 2'),
(70462, '2020-01-01', 23, '22:21:00', '145.0000', '321.0000', 'Company 2'),
(70463, '2020-01-01', 23, '22:22:00', '145.0000', '151.0000', 'Company 2'),
(70464, '2020-01-01', 23, '22:23:00', '145.0000', '140.0000', 'Company 2'),
(70465, '2020-01-01', 23, '22:24:00', '145.0000', '168.0000', 'Company 2'),
(70466, '2020-01-01', 23, '22:25:00', '145.0000', '369.0000', 'Company 2'),
(70467, '2020-01-01', 23, '22:26:00', '145.0000', '362.0000', 'Company 2'),
(70468, '2020-01-01', 23, '22:27:00', '145.0000', '322.0000', 'Company 2'),
(70469, '2020-01-01', 23, '22:28:00', '145.0000', '348.0000', 'Company 2'),
(70470, '2020-01-01', 23, '22:29:00', '145.0000', '246.0000', 'Company 2'),
(70471, '2020-01-01', 23, '22:30:00', '145.0000', '361.0000', 'Company 2'),
(70472, '2020-01-01', 23, '22:31:00', '145.0000', '154.0000', 'Company 2'),
(70473, '2020-01-01', 23, '22:32:00', '145.0000', '264.0000', 'Company 2'),
(70474, '2020-01-01', 23, '22:33:00', '145.0000', '178.0000', 'Company 2'),
(70475, '2020-01-01', 23, '22:34:00', '145.0000', '384.0000', 'Company 2');
INSERT INTO `power_generation` (`xsl`, `xdate`, `xhourending`, `xtime`, `xplant1`, `xplant2`, `xcompany`) VALUES
(70476, '2020-01-01', 23, '22:35:00', '145.0000', '334.0000', 'Company 2'),
(70477, '2020-01-01', 23, '22:36:00', '145.0000', '299.0000', 'Company 2'),
(70478, '2020-01-01', 23, '22:37:00', '145.0000', '155.0000', 'Company 2'),
(70479, '2020-01-01', 23, '22:38:00', '145.0000', '189.0000', 'Company 2'),
(70480, '2020-01-01', 23, '22:39:00', '145.0000', '331.0000', 'Company 2'),
(70481, '2020-01-01', 23, '22:40:00', '145.0000', '218.0000', 'Company 2'),
(70482, '2020-01-01', 23, '22:41:00', '145.0000', '293.0000', 'Company 2'),
(70483, '2020-01-01', 23, '22:42:00', '145.0000', '295.0000', 'Company 2'),
(70484, '2020-01-01', 23, '22:43:00', '145.0000', '168.0000', 'Company 2'),
(70485, '2020-01-01', 23, '22:44:00', '145.0000', '329.0000', 'Company 2'),
(70486, '2020-01-01', 23, '22:45:00', '145.0000', '158.0000', 'Company 2'),
(70487, '2020-01-01', 23, '22:46:00', '145.0000', '262.0000', 'Company 2'),
(70488, '2020-01-01', 23, '22:47:00', '145.0000', '277.0000', 'Company 2'),
(70489, '2020-01-01', 23, '22:48:00', '145.0000', '229.0000', 'Company 2'),
(70490, '2020-01-01', 23, '22:49:00', '145.0000', '217.0000', 'Company 2'),
(70491, '2020-01-01', 23, '22:50:00', '145.0000', '362.0000', 'Company 2'),
(70492, '2020-01-01', 23, '22:51:00', '145.0000', '241.0000', 'Company 2'),
(70493, '2020-01-01', 23, '22:52:00', '145.0000', '234.0000', 'Company 2'),
(70494, '2020-01-01', 23, '22:53:00', '145.0000', '221.0000', 'Company 2'),
(70495, '2020-01-01', 23, '22:54:00', '145.0000', '190.0000', 'Company 2'),
(70496, '2020-01-01', 23, '22:55:00', '145.0000', '198.0000', 'Company 2'),
(70497, '2020-01-01', 23, '22:56:00', '145.0000', '231.0000', 'Company 2'),
(70498, '2020-01-01', 23, '22:57:00', '145.0000', '325.0000', 'Company 2'),
(70499, '2020-01-01', 23, '22:58:00', '145.0000', '386.0000', 'Company 2'),
(70500, '2020-01-01', 23, '22:59:00', '145.0000', '258.0000', 'Company 2'),
(70501, '2020-01-01', 24, '23:00:00', '145.0000', '260.0000', 'Company 2'),
(70502, '2020-01-01', 24, '23:01:00', '145.0000', '204.0000', 'Company 2'),
(70503, '2020-01-01', 24, '23:02:00', '145.0000', '310.0000', 'Company 2'),
(70504, '2020-01-01', 24, '23:03:00', '145.0000', '283.0000', 'Company 2'),
(70505, '2020-01-01', 24, '23:04:00', '145.0000', '356.0000', 'Company 2'),
(70506, '2020-01-01', 24, '23:05:00', '145.0000', '309.0000', 'Company 2'),
(70507, '2020-01-01', 24, '23:06:00', '145.0000', '148.0000', 'Company 2'),
(70508, '2020-01-01', 24, '23:07:00', '145.0000', '317.0000', 'Company 2'),
(70509, '2020-01-01', 24, '23:08:00', '145.0000', '157.0000', 'Company 2'),
(70510, '2020-01-01', 24, '23:09:00', '145.0000', '321.0000', 'Company 2'),
(70511, '2020-01-01', 24, '23:10:00', '145.0000', '174.0000', 'Company 2'),
(70512, '2020-01-01', 24, '23:11:00', '145.0000', '168.0000', 'Company 2'),
(70513, '2020-01-01', 24, '23:12:00', '145.0000', '327.0000', 'Company 2'),
(70514, '2020-01-01', 24, '23:13:00', '145.0000', '341.0000', 'Company 2'),
(70515, '2020-01-01', 24, '23:14:00', '145.0000', '286.0000', 'Company 2'),
(70516, '2020-01-01', 24, '23:15:00', '145.0000', '283.0000', 'Company 2'),
(70517, '2020-01-01', 24, '23:16:00', '145.0000', '225.0000', 'Company 2'),
(70518, '2020-01-01', 24, '23:17:00', '145.0000', '290.0000', 'Company 2'),
(70519, '2020-01-01', 24, '23:18:00', '145.0000', '237.0000', 'Company 2'),
(70520, '2020-01-01', 24, '23:19:00', '145.0000', '377.0000', 'Company 2'),
(70521, '2020-01-01', 24, '23:20:00', '145.0000', '243.0000', 'Company 2'),
(70522, '2020-01-01', 24, '23:21:00', '145.0000', '168.0000', 'Company 2'),
(70523, '2020-01-01', 24, '23:22:00', '145.0000', '169.0000', 'Company 2'),
(70524, '2020-01-01', 24, '23:23:00', '145.0000', '286.0000', 'Company 2'),
(70525, '2020-01-01', 24, '23:24:00', '145.0000', '241.0000', 'Company 2'),
(70526, '2020-01-01', 24, '23:25:00', '145.0000', '341.0000', 'Company 2'),
(70527, '2020-01-01', 24, '23:26:00', '145.0000', '222.0000', 'Company 2'),
(70528, '2020-01-01', 24, '23:27:00', '145.0000', '324.0000', 'Company 2'),
(70529, '2020-01-01', 24, '23:28:00', '145.0000', '219.0000', 'Company 2'),
(70530, '2020-01-01', 24, '23:29:00', '145.0000', '226.0000', 'Company 2'),
(70531, '2020-01-01', 24, '23:30:00', '145.0000', '284.0000', 'Company 2'),
(70532, '2020-01-01', 24, '23:31:00', '145.0000', '386.0000', 'Company 2'),
(70533, '2020-01-01', 24, '23:32:00', '145.0000', '210.0000', 'Company 2'),
(70534, '2020-01-01', 24, '23:33:00', '145.0000', '241.0000', 'Company 2'),
(70535, '2020-01-01', 24, '23:34:00', '145.0000', '208.0000', 'Company 2'),
(70536, '2020-01-01', 24, '23:35:00', '145.0000', '242.0000', 'Company 2'),
(70537, '2020-01-01', 24, '23:36:00', '145.0000', '267.0000', 'Company 2'),
(70538, '2020-01-01', 24, '23:37:00', '145.0000', '244.0000', 'Company 2'),
(70539, '2020-01-01', 24, '23:38:00', '145.0000', '283.0000', 'Company 2'),
(70540, '2020-01-01', 24, '23:39:00', '145.0000', '187.0000', 'Company 2'),
(70541, '2020-01-01', 24, '23:40:00', '145.0000', '256.0000', 'Company 2'),
(70542, '2020-01-01', 24, '23:41:00', '145.0000', '386.0000', 'Company 2'),
(70543, '2020-01-01', 24, '23:42:00', '145.0000', '361.0000', 'Company 2'),
(70544, '2020-01-01', 24, '23:43:00', '145.0000', '253.0000', 'Company 2'),
(70545, '2020-01-01', 24, '23:44:00', '145.0000', '370.0000', 'Company 2'),
(70546, '2020-01-01', 24, '23:45:00', '145.0000', '303.0000', 'Company 2'),
(70547, '2020-01-01', 24, '23:46:00', '145.0000', '363.0000', 'Company 2'),
(70548, '2020-01-01', 24, '23:47:00', '145.0000', '245.0000', 'Company 2'),
(70549, '2020-01-01', 24, '23:48:00', '145.0000', '380.0000', 'Company 2'),
(70550, '2020-01-01', 24, '23:49:00', '145.0000', '324.0000', 'Company 2'),
(70551, '2020-01-01', 24, '23:50:00', '145.0000', '362.0000', 'Company 2'),
(70552, '2020-01-01', 24, '23:51:00', '145.0000', '211.0000', 'Company 2'),
(70553, '2020-01-01', 24, '23:52:00', '145.0000', '207.0000', 'Company 2'),
(70554, '2020-01-01', 24, '23:53:00', '145.0000', '226.0000', 'Company 2'),
(70555, '2020-01-01', 24, '23:54:00', '145.0000', '354.0000', 'Company 2'),
(70556, '2020-01-01', 24, '23:55:00', '145.0000', '145.0000', 'Company 2'),
(70557, '2020-01-01', 24, '23:56:00', '145.0000', '195.0000', 'Company 2'),
(70558, '2020-01-01', 24, '23:57:00', '145.0000', '169.0000', 'Company 2'),
(70559, '2020-01-01', 24, '23:58:00', '145.0000', '211.0000', 'Company 2'),
(70560, '2020-01-01', 24, '23:59:00', '145.0000', '375.0000', 'Company 2'),
(70561, '2020-01-01', 1, '00:00:00', '149.0000', '199.0000', 'Company 1'),
(70562, '2020-01-01', 1, '00:01:00', '149.0000', '145.0000', 'Company 1'),
(70563, '2020-01-01', 1, '00:02:00', '149.0000', '192.0000', 'Company 1'),
(70564, '2020-01-01', 1, '00:03:00', '149.0000', '336.0000', 'Company 1'),
(70565, '2020-01-01', 1, '00:04:00', '149.0000', '159.0000', 'Company 1'),
(70566, '2020-01-01', 1, '00:05:00', '149.0000', '176.0000', 'Company 1'),
(70567, '2020-01-01', 1, '00:06:00', '149.0000', '246.0000', 'Company 1'),
(70568, '2020-01-01', 1, '00:07:00', '149.0000', '308.0000', 'Company 1'),
(70569, '2020-01-01', 1, '00:08:00', '149.0000', '333.0000', 'Company 1'),
(70570, '2020-01-01', 1, '00:09:00', '149.0000', '316.0000', 'Company 1'),
(70571, '2020-01-01', 1, '00:10:00', '149.0000', '262.0000', 'Company 1'),
(70572, '2020-01-01', 1, '00:11:00', '149.0000', '205.0000', 'Company 1'),
(70573, '2020-01-01', 1, '00:12:00', '149.0000', '246.0000', 'Company 1'),
(70574, '2020-01-01', 1, '00:13:00', '149.0000', '330.0000', 'Company 1'),
(70575, '2020-01-01', 1, '00:14:00', '149.0000', '169.0000', 'Company 1'),
(70576, '2020-01-01', 1, '00:15:00', '149.0000', '300.0000', 'Company 1'),
(70577, '2020-01-01', 1, '00:16:00', '149.0000', '375.0000', 'Company 1'),
(70578, '2020-01-01', 1, '00:17:00', '149.0000', '292.0000', 'Company 1'),
(70579, '2020-01-01', 1, '00:18:00', '149.0000', '204.0000', 'Company 1'),
(70580, '2020-01-01', 1, '00:19:00', '149.0000', '380.0000', 'Company 1'),
(70581, '2020-01-01', 1, '00:20:00', '149.0000', '364.0000', 'Company 1'),
(70582, '2020-01-01', 1, '00:21:00', '149.0000', '249.0000', 'Company 1'),
(70583, '2020-01-01', 1, '00:22:00', '149.0000', '325.0000', 'Company 1'),
(70584, '2020-01-01', 1, '00:23:00', '149.0000', '241.0000', 'Company 1'),
(70585, '2020-01-01', 1, '00:24:00', '149.0000', '169.0000', 'Company 1'),
(70586, '2020-01-01', 1, '00:25:00', '149.0000', '142.0000', 'Company 1'),
(70587, '2020-01-01', 1, '00:26:00', '149.0000', '204.0000', 'Company 1'),
(70588, '2020-01-01', 1, '00:27:00', '149.0000', '375.0000', 'Company 1'),
(70589, '2020-01-01', 1, '00:28:00', '149.0000', '182.0000', 'Company 1'),
(70590, '2020-01-01', 1, '00:29:00', '149.0000', '280.0000', 'Company 1'),
(70591, '2020-01-01', 1, '00:30:00', '149.0000', '272.0000', 'Company 1'),
(70592, '2020-01-01', 1, '00:31:00', '149.0000', '210.0000', 'Company 1'),
(70593, '2020-01-01', 1, '00:32:00', '149.0000', '196.0000', 'Company 1'),
(70594, '2020-01-01', 1, '00:33:00', '149.0000', '155.0000', 'Company 1'),
(70595, '2020-01-01', 1, '00:34:00', '149.0000', '308.0000', 'Company 1'),
(70596, '2020-01-01', 1, '00:35:00', '149.0000', '287.0000', 'Company 1'),
(70597, '2020-01-01', 1, '00:36:00', '149.0000', '355.0000', 'Company 1'),
(70598, '2020-01-01', 1, '00:37:00', '149.0000', '300.0000', 'Company 1'),
(70599, '2020-01-01', 1, '00:38:00', '149.0000', '140.0000', 'Company 1'),
(70600, '2020-01-01', 1, '00:39:00', '149.0000', '185.0000', 'Company 1'),
(70601, '2020-01-01', 1, '00:40:00', '149.0000', '337.0000', 'Company 1'),
(70602, '2020-01-01', 1, '00:41:00', '149.0000', '204.0000', 'Company 1'),
(70603, '2020-01-01', 1, '00:42:00', '149.0000', '301.0000', 'Company 1'),
(70604, '2020-01-01', 1, '00:43:00', '149.0000', '345.0000', 'Company 1'),
(70605, '2020-01-01', 1, '00:44:00', '149.0000', '142.0000', 'Company 1'),
(70606, '2020-01-01', 1, '00:45:00', '149.0000', '334.0000', 'Company 1'),
(70607, '2020-01-01', 1, '00:46:00', '149.0000', '233.0000', 'Company 1'),
(70608, '2020-01-01', 1, '00:47:00', '149.0000', '270.0000', 'Company 1'),
(70609, '2020-01-01', 1, '00:48:00', '149.0000', '319.0000', 'Company 1'),
(70610, '2020-01-01', 1, '00:49:00', '149.0000', '244.0000', 'Company 1'),
(70611, '2020-01-01', 1, '00:50:00', '149.0000', '389.0000', 'Company 1'),
(70612, '2020-01-01', 1, '00:51:00', '149.0000', '311.0000', 'Company 1'),
(70613, '2020-01-01', 1, '00:52:00', '149.0000', '193.0000', 'Company 1'),
(70614, '2020-01-01', 1, '00:53:00', '149.0000', '278.0000', 'Company 1'),
(70615, '2020-01-01', 1, '00:54:00', '149.0000', '324.0000', 'Company 1'),
(70616, '2020-01-01', 1, '00:55:00', '149.0000', '388.0000', 'Company 1'),
(70617, '2020-01-01', 1, '00:56:00', '149.0000', '368.0000', 'Company 1'),
(70618, '2020-01-01', 1, '00:57:00', '149.0000', '205.0000', 'Company 1'),
(70619, '2020-01-01', 1, '00:58:00', '149.0000', '336.0000', 'Company 1'),
(70620, '2020-01-01', 1, '00:59:00', '149.0000', '308.0000', 'Company 1'),
(70621, '2020-01-01', 2, '01:00:00', '149.0000', '264.0000', 'Company 1'),
(70622, '2020-01-01', 2, '01:01:00', '149.0000', '215.0000', 'Company 1'),
(70623, '2020-01-01', 2, '01:02:00', '149.0000', '156.0000', 'Company 1'),
(70624, '2020-01-01', 2, '01:03:00', '149.0000', '236.0000', 'Company 1'),
(70625, '2020-01-01', 2, '01:04:00', '149.0000', '197.0000', 'Company 1'),
(70626, '2020-01-01', 2, '01:05:00', '149.0000', '268.0000', 'Company 1'),
(70627, '2020-01-01', 2, '01:06:00', '149.0000', '352.0000', 'Company 1'),
(70628, '2020-01-01', 2, '01:07:00', '149.0000', '179.0000', 'Company 1'),
(70629, '2020-01-01', 2, '01:08:00', '149.0000', '243.0000', 'Company 1'),
(70630, '2020-01-01', 2, '01:09:00', '149.0000', '322.0000', 'Company 1'),
(70631, '2020-01-01', 2, '01:10:00', '149.0000', '230.0000', 'Company 1'),
(70632, '2020-01-01', 2, '01:11:00', '149.0000', '264.0000', 'Company 1'),
(70633, '2020-01-01', 2, '01:12:00', '149.0000', '385.0000', 'Company 1'),
(70634, '2020-01-01', 2, '01:13:00', '149.0000', '377.0000', 'Company 1'),
(70635, '2020-01-01', 2, '01:14:00', '149.0000', '241.0000', 'Company 1'),
(70636, '2020-01-01', 2, '01:15:00', '149.0000', '233.0000', 'Company 1'),
(70637, '2020-01-01', 2, '01:16:00', '149.0000', '306.0000', 'Company 1'),
(70638, '2020-01-01', 2, '01:17:00', '149.0000', '341.0000', 'Company 1'),
(70639, '2020-01-01', 2, '01:18:00', '149.0000', '203.0000', 'Company 1'),
(70640, '2020-01-01', 2, '01:19:00', '149.0000', '293.0000', 'Company 1'),
(70641, '2020-01-01', 2, '01:20:00', '149.0000', '322.0000', 'Company 1'),
(70642, '2020-01-01', 2, '01:21:00', '149.0000', '367.0000', 'Company 1'),
(70643, '2020-01-01', 2, '01:22:00', '149.0000', '231.0000', 'Company 1'),
(70644, '2020-01-01', 2, '01:23:00', '149.0000', '278.0000', 'Company 1'),
(70645, '2020-01-01', 2, '01:24:00', '149.0000', '220.0000', 'Company 1'),
(70646, '2020-01-01', 2, '01:25:00', '149.0000', '291.0000', 'Company 1'),
(70647, '2020-01-01', 2, '01:26:00', '149.0000', '301.0000', 'Company 1'),
(70648, '2020-01-01', 2, '01:27:00', '149.0000', '330.0000', 'Company 1'),
(70649, '2020-01-01', 2, '01:28:00', '149.0000', '193.0000', 'Company 1'),
(70650, '2020-01-01', 2, '01:29:00', '149.0000', '249.0000', 'Company 1'),
(70651, '2020-01-01', 2, '01:30:00', '149.0000', '300.0000', 'Company 1'),
(70652, '2020-01-01', 2, '01:31:00', '149.0000', '345.0000', 'Company 1'),
(70653, '2020-01-01', 2, '01:32:00', '149.0000', '233.0000', 'Company 1'),
(70654, '2020-01-01', 2, '01:33:00', '149.0000', '204.0000', 'Company 1'),
(70655, '2020-01-01', 2, '01:34:00', '149.0000', '248.0000', 'Company 1'),
(70656, '2020-01-01', 2, '01:35:00', '149.0000', '220.0000', 'Company 1'),
(70657, '2020-01-01', 2, '01:36:00', '149.0000', '159.0000', 'Company 1'),
(70658, '2020-01-01', 2, '01:37:00', '149.0000', '266.0000', 'Company 1'),
(70659, '2020-01-01', 2, '01:38:00', '149.0000', '216.0000', 'Company 1'),
(70660, '2020-01-01', 2, '01:39:00', '149.0000', '182.0000', 'Company 1'),
(70661, '2020-01-01', 2, '01:40:00', '149.0000', '279.0000', 'Company 1'),
(70662, '2020-01-01', 2, '01:41:00', '149.0000', '274.0000', 'Company 1'),
(70663, '2020-01-01', 2, '01:42:00', '149.0000', '338.0000', 'Company 1'),
(70664, '2020-01-01', 2, '01:43:00', '149.0000', '284.0000', 'Company 1'),
(70665, '2020-01-01', 2, '01:44:00', '149.0000', '354.0000', 'Company 1'),
(70666, '2020-01-01', 2, '01:45:00', '149.0000', '323.0000', 'Company 1'),
(70667, '2020-01-01', 2, '01:46:00', '149.0000', '180.0000', 'Company 1'),
(70668, '2020-01-01', 2, '01:47:00', '149.0000', '172.0000', 'Company 1'),
(70669, '2020-01-01', 2, '01:48:00', '149.0000', '307.0000', 'Company 1'),
(70670, '2020-01-01', 2, '01:49:00', '149.0000', '255.0000', 'Company 1'),
(70671, '2020-01-01', 2, '01:50:00', '149.0000', '232.0000', 'Company 1'),
(70672, '2020-01-01', 2, '01:51:00', '149.0000', '205.0000', 'Company 1'),
(70673, '2020-01-01', 2, '01:52:00', '149.0000', '235.0000', 'Company 1'),
(70674, '2020-01-01', 2, '01:53:00', '149.0000', '217.0000', 'Company 1'),
(70675, '2020-01-01', 2, '01:54:00', '149.0000', '258.0000', 'Company 1'),
(70676, '2020-01-01', 2, '01:55:00', '149.0000', '187.0000', 'Company 1'),
(70677, '2020-01-01', 2, '01:56:00', '149.0000', '161.0000', 'Company 1'),
(70678, '2020-01-01', 2, '01:57:00', '149.0000', '229.0000', 'Company 1'),
(70679, '2020-01-01', 2, '01:58:00', '149.0000', '212.0000', 'Company 1'),
(70680, '2020-01-01', 2, '01:59:00', '149.0000', '148.0000', 'Company 1'),
(70681, '2020-01-01', 3, '02:00:00', '149.0000', '266.0000', 'Company 1'),
(70682, '2020-01-01', 3, '02:01:00', '149.0000', '257.0000', 'Company 1'),
(70683, '2020-01-01', 3, '02:02:00', '149.0000', '172.0000', 'Company 1'),
(70684, '2020-01-01', 3, '02:03:00', '149.0000', '315.0000', 'Company 1'),
(70685, '2020-01-01', 3, '02:04:00', '149.0000', '185.0000', 'Company 1'),
(70686, '2020-01-01', 3, '02:05:00', '149.0000', '235.0000', 'Company 1'),
(70687, '2020-01-01', 3, '02:06:00', '149.0000', '312.0000', 'Company 1'),
(70688, '2020-01-01', 3, '02:07:00', '149.0000', '271.0000', 'Company 1'),
(70689, '2020-01-01', 3, '02:08:00', '149.0000', '293.0000', 'Company 1'),
(70690, '2020-01-01', 3, '02:09:00', '149.0000', '328.0000', 'Company 1'),
(70691, '2020-01-01', 3, '02:10:00', '149.0000', '224.0000', 'Company 1'),
(70692, '2020-01-01', 3, '02:11:00', '149.0000', '173.0000', 'Company 1'),
(70693, '2020-01-01', 3, '02:12:00', '149.0000', '360.0000', 'Company 1'),
(70694, '2020-01-01', 3, '02:13:00', '149.0000', '352.0000', 'Company 1'),
(70695, '2020-01-01', 3, '02:14:00', '149.0000', '372.0000', 'Company 1'),
(70696, '2020-01-01', 3, '02:15:00', '149.0000', '150.0000', 'Company 1'),
(70697, '2020-01-01', 3, '02:16:00', '149.0000', '368.0000', 'Company 1'),
(70698, '2020-01-01', 3, '02:17:00', '149.0000', '346.0000', 'Company 1'),
(70699, '2020-01-01', 3, '02:18:00', '149.0000', '144.0000', 'Company 1'),
(70700, '2020-01-01', 3, '02:19:00', '149.0000', '280.0000', 'Company 1'),
(70701, '2020-01-01', 3, '02:20:00', '149.0000', '353.0000', 'Company 1'),
(70702, '2020-01-01', 3, '02:21:00', '149.0000', '244.0000', 'Company 1'),
(70703, '2020-01-01', 3, '02:22:00', '149.0000', '309.0000', 'Company 1'),
(70704, '2020-01-01', 3, '02:23:00', '149.0000', '203.0000', 'Company 1'),
(70705, '2020-01-01', 3, '02:24:00', '149.0000', '353.0000', 'Company 1'),
(70706, '2020-01-01', 3, '02:25:00', '149.0000', '314.0000', 'Company 1'),
(70707, '2020-01-01', 3, '02:26:00', '149.0000', '175.0000', 'Company 1'),
(70708, '2020-01-01', 3, '02:27:00', '149.0000', '328.0000', 'Company 1'),
(70709, '2020-01-01', 3, '02:28:00', '149.0000', '329.0000', 'Company 1'),
(70710, '2020-01-01', 3, '02:29:00', '149.0000', '292.0000', 'Company 1'),
(70711, '2020-01-01', 3, '02:30:00', '149.0000', '218.0000', 'Company 1'),
(70712, '2020-01-01', 3, '02:31:00', '149.0000', '266.0000', 'Company 1'),
(70713, '2020-01-01', 3, '02:32:00', '149.0000', '328.0000', 'Company 1'),
(70714, '2020-01-01', 3, '02:33:00', '149.0000', '356.0000', 'Company 1'),
(70715, '2020-01-01', 3, '02:34:00', '149.0000', '280.0000', 'Company 1'),
(70716, '2020-01-01', 3, '02:35:00', '149.0000', '293.0000', 'Company 1'),
(70717, '2020-01-01', 3, '02:36:00', '149.0000', '330.0000', 'Company 1'),
(70718, '2020-01-01', 3, '02:37:00', '149.0000', '233.0000', 'Company 1'),
(70719, '2020-01-01', 3, '02:38:00', '149.0000', '240.0000', 'Company 1'),
(70720, '2020-01-01', 3, '02:39:00', '149.0000', '188.0000', 'Company 1'),
(70721, '2020-01-01', 3, '02:40:00', '149.0000', '143.0000', 'Company 1'),
(70722, '2020-01-01', 3, '02:41:00', '149.0000', '329.0000', 'Company 1'),
(70723, '2020-01-01', 3, '02:42:00', '149.0000', '309.0000', 'Company 1'),
(70724, '2020-01-01', 3, '02:43:00', '149.0000', '312.0000', 'Company 1'),
(70725, '2020-01-01', 3, '02:44:00', '149.0000', '195.0000', 'Company 1'),
(70726, '2020-01-01', 3, '02:45:00', '149.0000', '246.0000', 'Company 1'),
(70727, '2020-01-01', 3, '02:46:00', '149.0000', '145.0000', 'Company 1'),
(70728, '2020-01-01', 3, '02:47:00', '149.0000', '272.0000', 'Company 1'),
(70729, '2020-01-01', 3, '02:48:00', '149.0000', '155.0000', 'Company 1'),
(70730, '2020-01-01', 3, '02:49:00', '149.0000', '150.0000', 'Company 1'),
(70731, '2020-01-01', 3, '02:50:00', '149.0000', '331.0000', 'Company 1'),
(70732, '2020-01-01', 3, '02:51:00', '149.0000', '327.0000', 'Company 1'),
(70733, '2020-01-01', 3, '02:52:00', '149.0000', '221.0000', 'Company 1'),
(70734, '2020-01-01', 3, '02:53:00', '149.0000', '212.0000', 'Company 1'),
(70735, '2020-01-01', 3, '02:54:00', '149.0000', '222.0000', 'Company 1'),
(70736, '2020-01-01', 3, '02:55:00', '149.0000', '162.0000', 'Company 1'),
(70737, '2020-01-01', 3, '02:56:00', '149.0000', '193.0000', 'Company 1'),
(70738, '2020-01-01', 3, '02:57:00', '149.0000', '213.0000', 'Company 1'),
(70739, '2020-01-01', 3, '02:58:00', '149.0000', '284.0000', 'Company 1'),
(70740, '2020-01-01', 3, '02:59:00', '149.0000', '363.0000', 'Company 1'),
(70741, '2020-01-01', 4, '03:00:00', '149.0000', '343.0000', 'Company 1'),
(70742, '2020-01-01', 4, '03:01:00', '149.0000', '253.0000', 'Company 1'),
(70743, '2020-01-01', 4, '03:02:00', '149.0000', '205.0000', 'Company 1'),
(70744, '2020-01-01', 4, '03:03:00', '149.0000', '312.0000', 'Company 1'),
(70745, '2020-01-01', 4, '03:04:00', '149.0000', '338.0000', 'Company 1'),
(70746, '2020-01-01', 4, '03:05:00', '149.0000', '231.0000', 'Company 1'),
(70747, '2020-01-01', 4, '03:06:00', '149.0000', '378.0000', 'Company 1'),
(70748, '2020-01-01', 4, '03:07:00', '149.0000', '358.0000', 'Company 1'),
(70749, '2020-01-01', 4, '03:08:00', '149.0000', '300.0000', 'Company 1'),
(70750, '2020-01-01', 4, '03:09:00', '149.0000', '245.0000', 'Company 1'),
(70751, '2020-01-01', 4, '03:10:00', '149.0000', '318.0000', 'Company 1'),
(70752, '2020-01-01', 4, '03:11:00', '149.0000', '314.0000', 'Company 1'),
(70753, '2020-01-01', 4, '03:12:00', '149.0000', '191.0000', 'Company 1'),
(70754, '2020-01-01', 4, '03:13:00', '149.0000', '160.0000', 'Company 1'),
(70755, '2020-01-01', 4, '03:14:00', '149.0000', '364.0000', 'Company 1'),
(70756, '2020-01-01', 4, '03:15:00', '149.0000', '228.0000', 'Company 1'),
(70757, '2020-01-01', 4, '03:16:00', '149.0000', '168.0000', 'Company 1'),
(70758, '2020-01-01', 4, '03:17:00', '149.0000', '287.0000', 'Company 1'),
(70759, '2020-01-01', 4, '03:18:00', '149.0000', '228.0000', 'Company 1'),
(70760, '2020-01-01', 4, '03:19:00', '149.0000', '369.0000', 'Company 1'),
(70761, '2020-01-01', 4, '03:20:00', '149.0000', '335.0000', 'Company 1'),
(70762, '2020-01-01', 4, '03:21:00', '149.0000', '308.0000', 'Company 1'),
(70763, '2020-01-01', 4, '03:22:00', '149.0000', '360.0000', 'Company 1'),
(70764, '2020-01-01', 4, '03:23:00', '190.0000', '218.0000', 'Company 1'),
(70765, '2020-01-01', 4, '03:24:00', '190.0000', '374.0000', 'Company 1'),
(70766, '2020-01-01', 4, '03:25:00', '190.0000', '267.0000', 'Company 1'),
(70767, '2020-01-01', 4, '03:26:00', '190.0000', '228.0000', 'Company 1'),
(70768, '2020-01-01', 4, '03:27:00', '190.0000', '140.0000', 'Company 1'),
(70769, '2020-01-01', 4, '03:28:00', '190.0000', '184.0000', 'Company 1'),
(70770, '2020-01-01', 4, '03:29:00', '190.0000', '279.0000', 'Company 1'),
(70771, '2020-01-01', 4, '03:30:00', '190.0000', '238.0000', 'Company 1'),
(70772, '2020-01-01', 4, '03:31:00', '190.0000', '148.0000', 'Company 1'),
(70773, '2020-01-01', 4, '03:32:00', '190.0000', '382.0000', 'Company 1'),
(70774, '2020-01-01', 4, '03:33:00', '190.0000', '154.0000', 'Company 1'),
(70775, '2020-01-01', 4, '03:34:00', '190.0000', '170.0000', 'Company 1'),
(70776, '2020-01-01', 4, '03:35:00', '190.0000', '192.0000', 'Company 1'),
(70777, '2020-01-01', 4, '03:36:00', '190.0000', '217.0000', 'Company 1'),
(70778, '2020-01-01', 4, '03:37:00', '190.0000', '281.0000', 'Company 1'),
(70779, '2020-01-01', 4, '03:38:00', '190.0000', '346.0000', 'Company 1'),
(70780, '2020-01-01', 4, '03:39:00', '190.0000', '310.0000', 'Company 1'),
(70781, '2020-01-01', 4, '03:40:00', '190.0000', '389.0000', 'Company 1'),
(70782, '2020-01-01', 4, '03:41:00', '190.0000', '373.0000', 'Company 1'),
(70783, '2020-01-01', 4, '03:42:00', '190.0000', '275.0000', 'Company 1'),
(70784, '2020-01-01', 4, '03:43:00', '190.0000', '231.0000', 'Company 1'),
(70785, '2020-01-01', 4, '03:44:00', '190.0000', '174.0000', 'Company 1'),
(70786, '2020-01-01', 4, '03:45:00', '190.0000', '195.0000', 'Company 1'),
(70787, '2020-01-01', 4, '03:46:00', '190.0000', '372.0000', 'Company 1'),
(70788, '2020-01-01', 4, '03:47:00', '190.0000', '329.0000', 'Company 1'),
(70789, '2020-01-01', 4, '03:48:00', '190.0000', '148.0000', 'Company 1'),
(70790, '2020-01-01', 4, '03:49:00', '190.0000', '162.0000', 'Company 1'),
(70791, '2020-01-01', 4, '03:50:00', '190.0000', '354.0000', 'Company 1'),
(70792, '2020-01-01', 4, '03:51:00', '190.0000', '180.0000', 'Company 1'),
(70793, '2020-01-01', 4, '03:52:00', '190.0000', '317.0000', 'Company 1'),
(70794, '2020-01-01', 4, '03:53:00', '190.0000', '302.0000', 'Company 1'),
(70795, '2020-01-01', 4, '03:54:00', '190.0000', '323.0000', 'Company 1'),
(70796, '2020-01-01', 4, '03:55:00', '190.0000', '313.0000', 'Company 1'),
(70797, '2020-01-01', 4, '03:56:00', '190.0000', '377.0000', 'Company 1'),
(70798, '2020-01-01', 4, '03:57:00', '190.0000', '182.0000', 'Company 1'),
(70799, '2020-01-01', 4, '03:58:00', '190.0000', '344.0000', 'Company 1'),
(70800, '2020-01-01', 4, '03:59:00', '190.0000', '282.0000', 'Company 1'),
(70801, '2020-01-01', 5, '04:00:00', '190.0000', '257.0000', 'Company 1'),
(70802, '2020-01-01', 5, '04:01:00', '190.0000', '331.0000', 'Company 1'),
(70803, '2020-01-01', 5, '04:02:00', '190.0000', '344.0000', 'Company 1'),
(70804, '2020-01-01', 5, '04:03:00', '190.0000', '172.0000', 'Company 1'),
(70805, '2020-01-01', 5, '04:04:00', '190.0000', '258.0000', 'Company 1'),
(70806, '2020-01-01', 5, '04:05:00', '190.0000', '299.0000', 'Company 1'),
(70807, '2020-01-01', 5, '04:06:00', '190.0000', '345.0000', 'Company 1'),
(70808, '2020-01-01', 5, '04:07:00', '190.0000', '259.0000', 'Company 1'),
(70809, '2020-01-01', 5, '04:08:00', '190.0000', '335.0000', 'Company 1'),
(70810, '2020-01-01', 5, '04:09:00', '190.0000', '289.0000', 'Company 1'),
(70811, '2020-01-01', 5, '04:10:00', '190.0000', '247.0000', 'Company 1'),
(70812, '2020-01-01', 5, '04:11:00', '190.0000', '252.0000', 'Company 1'),
(70813, '2020-01-01', 5, '04:12:00', '190.0000', '169.0000', 'Company 1'),
(70814, '2020-01-01', 5, '04:13:00', '190.0000', '388.0000', 'Company 1'),
(70815, '2020-01-01', 5, '04:14:00', '190.0000', '341.0000', 'Company 1'),
(70816, '2020-01-01', 5, '04:15:00', '190.0000', '304.0000', 'Company 1'),
(70817, '2020-01-01', 5, '04:16:00', '190.0000', '206.0000', 'Company 1'),
(70818, '2020-01-01', 5, '04:17:00', '190.0000', '368.0000', 'Company 1'),
(70819, '2020-01-01', 5, '04:18:00', '190.0000', '168.0000', 'Company 1'),
(70820, '2020-01-01', 5, '04:19:00', '190.0000', '267.0000', 'Company 1'),
(70821, '2020-01-01', 5, '04:20:00', '190.0000', '215.0000', 'Company 1'),
(70822, '2020-01-01', 5, '04:21:00', '190.0000', '161.0000', 'Company 1'),
(70823, '2020-01-01', 5, '04:22:00', '190.0000', '213.0000', 'Company 1'),
(70824, '2020-01-01', 5, '04:23:00', '190.0000', '362.0000', 'Company 1'),
(70825, '2020-01-01', 5, '04:24:00', '190.0000', '213.0000', 'Company 1'),
(70826, '2020-01-01', 5, '04:25:00', '190.0000', '283.0000', 'Company 1'),
(70827, '2020-01-01', 5, '04:26:00', '190.0000', '266.0000', 'Company 1'),
(70828, '2020-01-01', 5, '04:27:00', '190.0000', '223.0000', 'Company 1'),
(70829, '2020-01-01', 5, '04:28:00', '190.0000', '223.0000', 'Company 1'),
(70830, '2020-01-01', 5, '04:29:00', '190.0000', '224.0000', 'Company 1'),
(70831, '2020-01-01', 5, '04:30:00', '190.0000', '248.0000', 'Company 1'),
(70832, '2020-01-01', 5, '04:31:00', '190.0000', '193.0000', 'Company 1'),
(70833, '2020-01-01', 5, '04:32:00', '190.0000', '233.0000', 'Company 1'),
(70834, '2020-01-01', 5, '04:33:00', '190.0000', '202.0000', 'Company 1'),
(70835, '2020-01-01', 5, '04:34:00', '190.0000', '290.0000', 'Company 1'),
(70836, '2020-01-01', 5, '04:35:00', '190.0000', '168.0000', 'Company 1'),
(70837, '2020-01-01', 5, '04:36:00', '190.0000', '357.0000', 'Company 1'),
(70838, '2020-01-01', 5, '04:37:00', '190.0000', '211.0000', 'Company 1'),
(70839, '2020-01-01', 5, '04:38:00', '190.0000', '208.0000', 'Company 1'),
(70840, '2020-01-01', 5, '04:39:00', '190.0000', '366.0000', 'Company 1'),
(70841, '2020-01-01', 5, '04:40:00', '190.0000', '213.0000', 'Company 1'),
(70842, '2020-01-01', 5, '04:41:00', '190.0000', '179.0000', 'Company 1'),
(70843, '2020-01-01', 5, '04:42:00', '190.0000', '314.0000', 'Company 1'),
(70844, '2020-01-01', 5, '04:43:00', '190.0000', '225.0000', 'Company 1'),
(70845, '2020-01-01', 5, '04:44:00', '190.0000', '155.0000', 'Company 1'),
(70846, '2020-01-01', 5, '04:45:00', '190.0000', '381.0000', 'Company 1'),
(70847, '2020-01-01', 5, '04:46:00', '190.0000', '313.0000', 'Company 1'),
(70848, '2020-01-01', 5, '04:47:00', '190.0000', '150.0000', 'Company 1'),
(70849, '2020-01-01', 5, '04:48:00', '190.0000', '308.0000', 'Company 1'),
(70850, '2020-01-01', 5, '04:49:00', '190.0000', '167.0000', 'Company 1'),
(70851, '2020-01-01', 5, '04:50:00', '190.0000', '175.0000', 'Company 1'),
(70852, '2020-01-01', 5, '04:51:00', '190.0000', '202.0000', 'Company 1'),
(70853, '2020-01-01', 5, '04:52:00', '190.0000', '145.0000', 'Company 1'),
(70854, '2020-01-01', 5, '04:53:00', '190.0000', '165.0000', 'Company 1'),
(70855, '2020-01-01', 5, '04:54:00', '190.0000', '192.0000', 'Company 1'),
(70856, '2020-01-01', 5, '04:55:00', '190.0000', '338.0000', 'Company 1'),
(70857, '2020-01-01', 5, '04:56:00', '190.0000', '161.0000', 'Company 1'),
(70858, '2020-01-01', 5, '04:57:00', '190.0000', '259.0000', 'Company 1'),
(70859, '2020-01-01', 5, '04:58:00', '190.0000', '192.0000', 'Company 1'),
(70860, '2020-01-01', 5, '04:59:00', '190.0000', '377.0000', 'Company 1'),
(70861, '2020-01-01', 6, '05:00:00', '190.0000', '204.0000', 'Company 1'),
(70862, '2020-01-01', 6, '05:01:00', '190.0000', '372.0000', 'Company 1'),
(70863, '2020-01-01', 6, '05:02:00', '190.0000', '160.0000', 'Company 1'),
(70864, '2020-01-01', 6, '05:03:00', '190.0000', '354.0000', 'Company 1'),
(70865, '2020-01-01', 6, '05:04:00', '190.0000', '333.0000', 'Company 1'),
(70866, '2020-01-01', 6, '05:05:00', '190.0000', '253.0000', 'Company 1'),
(70867, '2020-01-01', 6, '05:06:00', '190.0000', '335.0000', 'Company 1'),
(70868, '2020-01-01', 6, '05:07:00', '190.0000', '192.0000', 'Company 1'),
(70869, '2020-01-01', 6, '05:08:00', '190.0000', '219.0000', 'Company 1'),
(70870, '2020-01-01', 6, '05:09:00', '190.0000', '218.0000', 'Company 1'),
(70871, '2020-01-01', 6, '05:10:00', '190.0000', '282.0000', 'Company 1'),
(70872, '2020-01-01', 6, '05:11:00', '190.0000', '188.0000', 'Company 1'),
(70873, '2020-01-01', 6, '05:12:00', '190.0000', '142.0000', 'Company 1'),
(70874, '2020-01-01', 6, '05:13:00', '190.0000', '349.0000', 'Company 1'),
(70875, '2020-01-01', 6, '05:14:00', '190.0000', '272.0000', 'Company 1'),
(70876, '2020-01-01', 6, '05:15:00', '190.0000', '176.0000', 'Company 1'),
(70877, '2020-01-01', 6, '05:16:00', '190.0000', '210.0000', 'Company 1'),
(70878, '2020-01-01', 6, '05:17:00', '190.0000', '282.0000', 'Company 1'),
(70879, '2020-01-01', 6, '05:18:00', '190.0000', '162.0000', 'Company 1'),
(70880, '2020-01-01', 6, '05:19:00', '190.0000', '195.0000', 'Company 1'),
(70881, '2020-01-01', 6, '05:20:00', '190.0000', '206.0000', 'Company 1'),
(70882, '2020-01-01', 6, '05:21:00', '190.0000', '260.0000', 'Company 1'),
(70883, '2020-01-01', 6, '05:22:00', '190.0000', '160.0000', 'Company 1'),
(70884, '2020-01-01', 6, '05:23:00', '190.0000', '320.0000', 'Company 1'),
(70885, '2020-01-01', 6, '05:24:00', '190.0000', '271.0000', 'Company 1'),
(70886, '2020-01-01', 6, '05:25:00', '190.0000', '341.0000', 'Company 1'),
(70887, '2020-01-01', 6, '05:26:00', '190.0000', '201.0000', 'Company 1'),
(70888, '2020-01-01', 6, '05:27:00', '190.0000', '235.0000', 'Company 1'),
(70889, '2020-01-01', 6, '05:28:00', '190.0000', '373.0000', 'Company 1'),
(70890, '2020-01-01', 6, '05:29:00', '190.0000', '182.0000', 'Company 1'),
(70891, '2020-01-01', 6, '05:30:00', '190.0000', '277.0000', 'Company 1'),
(70892, '2020-01-01', 6, '05:31:00', '190.0000', '322.0000', 'Company 1'),
(70893, '2020-01-01', 6, '05:32:00', '190.0000', '215.0000', 'Company 1'),
(70894, '2020-01-01', 6, '05:33:00', '190.0000', '340.0000', 'Company 1'),
(70895, '2020-01-01', 6, '05:34:00', '190.0000', '269.0000', 'Company 1'),
(70896, '2020-01-01', 6, '05:35:00', '190.0000', '180.0000', 'Company 1'),
(70897, '2020-01-01', 6, '05:36:00', '190.0000', '174.0000', 'Company 1'),
(70898, '2020-01-01', 6, '05:37:00', '190.0000', '249.0000', 'Company 1'),
(70899, '2020-01-01', 6, '05:38:00', '190.0000', '207.0000', 'Company 1'),
(70900, '2020-01-01', 6, '05:39:00', '190.0000', '208.0000', 'Company 1'),
(70901, '2020-01-01', 6, '05:40:00', '190.0000', '152.0000', 'Company 1'),
(70902, '2020-01-01', 6, '05:41:00', '190.0000', '164.0000', 'Company 1'),
(70903, '2020-01-01', 6, '05:42:00', '190.0000', '371.0000', 'Company 1'),
(70904, '2020-01-01', 6, '05:43:00', '190.0000', '171.0000', 'Company 1'),
(70905, '2020-01-01', 6, '05:44:00', '190.0000', '300.0000', 'Company 1'),
(70906, '2020-01-01', 6, '05:45:00', '190.0000', '256.0000', 'Company 1'),
(70907, '2020-01-01', 6, '05:46:00', '190.0000', '264.0000', 'Company 1'),
(70908, '2020-01-01', 6, '05:47:00', '190.0000', '191.0000', 'Company 1'),
(70909, '2020-01-01', 6, '05:48:00', '190.0000', '166.0000', 'Company 1'),
(70910, '2020-01-01', 6, '05:49:00', '190.0000', '196.0000', 'Company 1'),
(70911, '2020-01-01', 6, '05:50:00', '190.0000', '160.0000', 'Company 1'),
(70912, '2020-01-01', 6, '05:51:00', '190.0000', '251.0000', 'Company 1'),
(70913, '2020-01-01', 6, '05:52:00', '190.0000', '171.0000', 'Company 1'),
(70914, '2020-01-01', 6, '05:53:00', '190.0000', '263.0000', 'Company 1'),
(70915, '2020-01-01', 6, '05:54:00', '190.0000', '359.0000', 'Company 1'),
(70916, '2020-01-01', 6, '05:55:00', '190.0000', '312.0000', 'Company 1'),
(70917, '2020-01-01', 6, '05:56:00', '190.0000', '230.0000', 'Company 1'),
(70918, '2020-01-01', 6, '05:57:00', '190.0000', '315.0000', 'Company 1'),
(70919, '2020-01-01', 6, '05:58:00', '190.0000', '372.0000', 'Company 1'),
(70920, '2020-01-01', 6, '05:59:00', '190.0000', '257.0000', 'Company 1'),
(70921, '2020-01-01', 7, '06:00:00', '190.0000', '341.0000', 'Company 1'),
(70922, '2020-01-01', 7, '06:01:00', '190.0000', '288.0000', 'Company 1'),
(70923, '2020-01-01', 7, '06:02:00', '190.0000', '229.0000', 'Company 1'),
(70924, '2020-01-01', 7, '06:03:00', '190.0000', '353.0000', 'Company 1'),
(70925, '2020-01-01', 7, '06:04:00', '190.0000', '234.0000', 'Company 1'),
(70926, '2020-01-01', 7, '06:05:00', '190.0000', '250.0000', 'Company 1'),
(70927, '2020-01-01', 7, '06:06:00', '190.0000', '363.0000', 'Company 1'),
(70928, '2020-01-01', 7, '06:07:00', '190.0000', '189.0000', 'Company 1'),
(70929, '2020-01-01', 7, '06:08:00', '190.0000', '321.0000', 'Company 1'),
(70930, '2020-01-01', 7, '06:09:00', '190.0000', '314.0000', 'Company 1'),
(70931, '2020-01-01', 7, '06:10:00', '190.0000', '282.0000', 'Company 1'),
(70932, '2020-01-01', 7, '06:11:00', '190.0000', '334.0000', 'Company 1'),
(70933, '2020-01-01', 7, '06:12:00', '190.0000', '309.0000', 'Company 1'),
(70934, '2020-01-01', 7, '06:13:00', '190.0000', '223.0000', 'Company 1'),
(70935, '2020-01-01', 7, '06:14:00', '190.0000', '357.0000', 'Company 1'),
(70936, '2020-01-01', 7, '06:15:00', '190.0000', '232.0000', 'Company 1'),
(70937, '2020-01-01', 7, '06:16:00', '190.0000', '145.0000', 'Company 1'),
(70938, '2020-01-01', 7, '06:17:00', '190.0000', '366.0000', 'Company 1'),
(70939, '2020-01-01', 7, '06:18:00', '190.0000', '306.0000', 'Company 1'),
(70940, '2020-01-01', 7, '06:19:00', '190.0000', '168.0000', 'Company 1'),
(70941, '2020-01-01', 7, '06:20:00', '190.0000', '302.0000', 'Company 1'),
(70942, '2020-01-01', 7, '06:21:00', '190.0000', '245.0000', 'Company 1'),
(70943, '2020-01-01', 7, '06:22:00', '190.0000', '155.0000', 'Company 1'),
(70944, '2020-01-01', 7, '06:23:00', '190.0000', '317.0000', 'Company 1'),
(70945, '2020-01-01', 7, '06:24:00', '190.0000', '302.0000', 'Company 1'),
(70946, '2020-01-01', 7, '06:25:00', '190.0000', '383.0000', 'Company 1'),
(70947, '2020-01-01', 7, '06:26:00', '190.0000', '182.0000', 'Company 1'),
(70948, '2020-01-01', 7, '06:27:00', '190.0000', '266.0000', 'Company 1'),
(70949, '2020-01-01', 7, '06:28:00', '190.0000', '289.0000', 'Company 1'),
(70950, '2020-01-01', 7, '06:29:00', '190.0000', '383.0000', 'Company 1'),
(70951, '2020-01-01', 7, '06:30:00', '190.0000', '368.0000', 'Company 1'),
(70952, '2020-01-01', 7, '06:31:00', '190.0000', '155.0000', 'Company 1'),
(70953, '2020-01-01', 7, '06:32:00', '190.0000', '389.0000', 'Company 1'),
(70954, '2020-01-01', 7, '06:33:00', '190.0000', '267.0000', 'Company 1'),
(70955, '2020-01-01', 7, '06:34:00', '190.0000', '257.0000', 'Company 1'),
(70956, '2020-01-01', 7, '06:35:00', '190.0000', '252.0000', 'Company 1'),
(70957, '2020-01-01', 7, '06:36:00', '190.0000', '152.0000', 'Company 1'),
(70958, '2020-01-01', 7, '06:37:00', '190.0000', '261.0000', 'Company 1'),
(70959, '2020-01-01', 7, '06:38:00', '190.0000', '292.0000', 'Company 1'),
(70960, '2020-01-01', 7, '06:39:00', '190.0000', '287.0000', 'Company 1'),
(70961, '2020-01-01', 7, '06:40:00', '190.0000', '385.0000', 'Company 1'),
(70962, '2020-01-01', 7, '06:41:00', '190.0000', '384.0000', 'Company 1'),
(70963, '2020-01-01', 7, '06:42:00', '190.0000', '337.0000', 'Company 1'),
(70964, '2020-01-01', 7, '06:43:00', '190.0000', '309.0000', 'Company 1'),
(70965, '2020-01-01', 7, '06:44:00', '190.0000', '260.0000', 'Company 1'),
(70966, '2020-01-01', 7, '06:45:00', '190.0000', '367.0000', 'Company 1'),
(70967, '2020-01-01', 7, '06:46:00', '190.0000', '299.0000', 'Company 1'),
(70968, '2020-01-01', 7, '06:47:00', '190.0000', '184.0000', 'Company 1'),
(70969, '2020-01-01', 7, '06:48:00', '190.0000', '344.0000', 'Company 1'),
(70970, '2020-01-01', 7, '06:49:00', '190.0000', '364.0000', 'Company 1'),
(70971, '2020-01-01', 7, '06:50:00', '190.0000', '196.0000', 'Company 1'),
(70972, '2020-01-01', 7, '06:51:00', '190.0000', '312.0000', 'Company 1'),
(70973, '2020-01-01', 7, '06:52:00', '190.0000', '280.0000', 'Company 1'),
(70974, '2020-01-01', 7, '06:53:00', '190.0000', '337.0000', 'Company 1'),
(70975, '2020-01-01', 7, '06:54:00', '190.0000', '367.0000', 'Company 1'),
(70976, '2020-01-01', 7, '06:55:00', '190.0000', '268.0000', 'Company 1'),
(70977, '2020-01-01', 7, '06:56:00', '190.0000', '295.0000', 'Company 1'),
(70978, '2020-01-01', 7, '06:57:00', '190.0000', '338.0000', 'Company 1'),
(70979, '2020-01-01', 7, '06:58:00', '190.0000', '346.0000', 'Company 1'),
(70980, '2020-01-01', 7, '06:59:00', '190.0000', '187.0000', 'Company 1'),
(70981, '2020-01-01', 8, '07:00:00', '190.0000', '377.0000', 'Company 1'),
(70982, '2020-01-01', 8, '07:01:00', '190.0000', '194.0000', 'Company 1'),
(70983, '2020-01-01', 8, '07:02:00', '190.0000', '286.0000', 'Company 1'),
(70984, '2020-01-01', 8, '07:03:00', '190.0000', '250.0000', 'Company 1'),
(70985, '2020-01-01', 8, '07:04:00', '190.0000', '254.0000', 'Company 1'),
(70986, '2020-01-01', 8, '07:05:00', '190.0000', '313.0000', 'Company 1'),
(70987, '2020-01-01', 8, '07:06:00', '190.0000', '190.0000', 'Company 1'),
(70988, '2020-01-01', 8, '07:07:00', '190.0000', '171.0000', 'Company 1'),
(70989, '2020-01-01', 8, '07:08:00', '190.0000', '151.0000', 'Company 1'),
(70990, '2020-01-01', 8, '07:09:00', '190.0000', '239.0000', 'Company 1'),
(70991, '2020-01-01', 8, '07:10:00', '190.0000', '217.0000', 'Company 1'),
(70992, '2020-01-01', 8, '07:11:00', '190.0000', '248.0000', 'Company 1'),
(70993, '2020-01-01', 8, '07:12:00', '190.0000', '288.0000', 'Company 1'),
(70994, '2020-01-01', 8, '07:13:00', '190.0000', '162.0000', 'Company 1'),
(70995, '2020-01-01', 8, '07:14:00', '190.0000', '147.0000', 'Company 1'),
(70996, '2020-01-01', 8, '07:15:00', '190.0000', '360.0000', 'Company 1'),
(70997, '2020-01-01', 8, '07:16:00', '190.0000', '270.0000', 'Company 1'),
(70998, '2020-01-01', 8, '07:17:00', '190.0000', '301.0000', 'Company 1'),
(70999, '2020-01-01', 8, '07:18:00', '190.0000', '226.0000', 'Company 1'),
(71000, '2020-01-01', 8, '07:19:00', '190.0000', '266.0000', 'Company 1'),
(71001, '2020-01-01', 8, '07:20:00', '190.0000', '168.0000', 'Company 1'),
(71002, '2020-01-01', 8, '07:21:00', '190.0000', '276.0000', 'Company 1'),
(71003, '2020-01-01', 8, '07:22:00', '190.0000', '150.0000', 'Company 1'),
(71004, '2020-01-01', 8, '07:23:00', '190.0000', '323.0000', 'Company 1'),
(71005, '2020-01-01', 8, '07:24:00', '190.0000', '369.0000', 'Company 1'),
(71006, '2020-01-01', 8, '07:25:00', '190.0000', '194.0000', 'Company 1'),
(71007, '2020-01-01', 8, '07:26:00', '190.0000', '353.0000', 'Company 1'),
(71008, '2020-01-01', 8, '07:27:00', '190.0000', '385.0000', 'Company 1'),
(71009, '2020-01-01', 8, '07:28:00', '190.0000', '359.0000', 'Company 1'),
(71010, '2020-01-01', 8, '07:29:00', '190.0000', '270.0000', 'Company 1'),
(71011, '2020-01-01', 8, '07:30:00', '190.0000', '390.0000', 'Company 1'),
(71012, '2020-01-01', 8, '07:31:00', '190.0000', '175.0000', 'Company 1'),
(71013, '2020-01-01', 8, '07:32:00', '190.0000', '227.0000', 'Company 1'),
(71014, '2020-01-01', 8, '07:33:00', '190.0000', '213.0000', 'Company 1'),
(71015, '2020-01-01', 8, '07:34:00', '190.0000', '210.0000', 'Company 1'),
(71016, '2020-01-01', 8, '07:35:00', '190.0000', '324.0000', 'Company 1'),
(71017, '2020-01-01', 8, '07:36:00', '190.0000', '195.0000', 'Company 1'),
(71018, '2020-01-01', 8, '07:37:00', '190.0000', '278.0000', 'Company 1'),
(71019, '2020-01-01', 8, '07:38:00', '190.0000', '208.0000', 'Company 1'),
(71020, '2020-01-01', 8, '07:39:00', '190.0000', '328.0000', 'Company 1'),
(71021, '2020-01-01', 8, '07:40:00', '190.0000', '175.0000', 'Company 1'),
(71022, '2020-01-01', 8, '07:41:00', '190.0000', '360.0000', 'Company 1'),
(71023, '2020-01-01', 8, '07:42:00', '190.0000', '303.0000', 'Company 1'),
(71024, '2020-01-01', 8, '07:43:00', '190.0000', '218.0000', 'Company 1'),
(71025, '2020-01-01', 8, '07:44:00', '190.0000', '144.0000', 'Company 1'),
(71026, '2020-01-01', 8, '07:45:00', '190.0000', '365.0000', 'Company 1'),
(71027, '2020-01-01', 8, '07:46:00', '190.0000', '195.0000', 'Company 1'),
(71028, '2020-01-01', 8, '07:47:00', '190.0000', '300.0000', 'Company 1'),
(71029, '2020-01-01', 8, '07:48:00', '190.0000', '218.0000', 'Company 1'),
(71030, '2020-01-01', 8, '07:49:00', '190.0000', '164.0000', 'Company 1'),
(71031, '2020-01-01', 8, '07:50:00', '190.0000', '250.0000', 'Company 1'),
(71032, '2020-01-01', 8, '07:51:00', '190.0000', '349.0000', 'Company 1'),
(71033, '2020-01-01', 8, '07:52:00', '190.0000', '235.0000', 'Company 1'),
(71034, '2020-01-01', 8, '07:53:00', '190.0000', '182.0000', 'Company 1'),
(71035, '2020-01-01', 8, '07:54:00', '190.0000', '245.0000', 'Company 1'),
(71036, '2020-01-01', 8, '07:55:00', '190.0000', '319.0000', 'Company 1'),
(71037, '2020-01-01', 8, '07:56:00', '190.0000', '294.0000', 'Company 1'),
(71038, '2020-01-01', 8, '07:57:00', '190.0000', '300.0000', 'Company 1'),
(71039, '2020-01-01', 8, '07:58:00', '190.0000', '260.0000', 'Company 1'),
(71040, '2020-01-01', 8, '07:59:00', '190.0000', '284.0000', 'Company 1'),
(71041, '2020-01-01', 9, '08:00:00', '190.0000', '288.0000', 'Company 1'),
(71042, '2020-01-01', 9, '08:01:00', '190.0000', '301.0000', 'Company 1'),
(71043, '2020-01-01', 9, '08:02:00', '190.0000', '280.0000', 'Company 1'),
(71044, '2020-01-01', 9, '08:03:00', '190.0000', '148.0000', 'Company 1'),
(71045, '2020-01-01', 9, '08:04:00', '190.0000', '164.0000', 'Company 1'),
(71046, '2020-01-01', 9, '08:05:00', '190.0000', '245.0000', 'Company 1'),
(71047, '2020-01-01', 9, '08:06:00', '190.0000', '211.0000', 'Company 1'),
(71048, '2020-01-01', 9, '08:07:00', '190.0000', '200.0000', 'Company 1'),
(71049, '2020-01-01', 9, '08:08:00', '190.0000', '183.0000', 'Company 1'),
(71050, '2020-01-01', 9, '08:09:00', '190.0000', '274.0000', 'Company 1'),
(71051, '2020-01-01', 9, '08:10:00', '190.0000', '202.0000', 'Company 1'),
(71052, '2020-01-01', 9, '08:11:00', '190.0000', '288.0000', 'Company 1'),
(71053, '2020-01-01', 9, '08:12:00', '190.0000', '361.0000', 'Company 1'),
(71054, '2020-01-01', 9, '08:13:00', '190.0000', '308.0000', 'Company 1'),
(71055, '2020-01-01', 9, '08:14:00', '190.0000', '161.0000', 'Company 1'),
(71056, '2020-01-01', 9, '08:15:00', '190.0000', '182.0000', 'Company 1'),
(71057, '2020-01-01', 9, '08:16:00', '190.0000', '384.0000', 'Company 1'),
(71058, '2020-01-01', 9, '08:17:00', '190.0000', '383.0000', 'Company 1'),
(71059, '2020-01-01', 9, '08:18:00', '190.0000', '186.0000', 'Company 1'),
(71060, '2020-01-01', 9, '08:19:00', '190.0000', '356.0000', 'Company 1'),
(71061, '2020-01-01', 9, '08:20:00', '190.0000', '337.0000', 'Company 1'),
(71062, '2020-01-01', 9, '08:21:00', '190.0000', '210.0000', 'Company 1'),
(71063, '2020-01-01', 9, '08:22:00', '190.0000', '152.0000', 'Company 1'),
(71064, '2020-01-01', 9, '08:23:00', '190.0000', '359.0000', 'Company 1'),
(71065, '2020-01-01', 9, '08:24:00', '190.0000', '259.0000', 'Company 1'),
(71066, '2020-01-01', 9, '08:25:00', '190.0000', '335.0000', 'Company 1'),
(71067, '2020-01-01', 9, '08:26:00', '190.0000', '317.0000', 'Company 1'),
(71068, '2020-01-01', 9, '08:27:00', '190.0000', '268.0000', 'Company 1'),
(71069, '2020-01-01', 9, '08:28:00', '190.0000', '352.0000', 'Company 1'),
(71070, '2020-01-01', 9, '08:29:00', '190.0000', '190.0000', 'Company 1'),
(71071, '2020-01-01', 9, '08:30:00', '190.0000', '251.0000', 'Company 1'),
(71072, '2020-01-01', 9, '08:31:00', '190.0000', '293.0000', 'Company 1'),
(71073, '2020-01-01', 9, '08:32:00', '190.0000', '363.0000', 'Company 1'),
(71074, '2020-01-01', 9, '08:33:00', '190.0000', '162.0000', 'Company 1'),
(71075, '2020-01-01', 9, '08:34:00', '190.0000', '274.0000', 'Company 1'),
(71076, '2020-01-01', 9, '08:35:00', '190.0000', '297.0000', 'Company 1'),
(71077, '2020-01-01', 9, '08:36:00', '190.0000', '241.0000', 'Company 1'),
(71078, '2020-01-01', 9, '08:37:00', '190.0000', '266.0000', 'Company 1'),
(71079, '2020-01-01', 9, '08:38:00', '190.0000', '374.0000', 'Company 1'),
(71080, '2020-01-01', 9, '08:39:00', '190.0000', '327.0000', 'Company 1'),
(71081, '2020-01-01', 9, '08:40:00', '190.0000', '290.0000', 'Company 1'),
(71082, '2020-01-01', 9, '08:41:00', '190.0000', '346.0000', 'Company 1'),
(71083, '2020-01-01', 9, '08:42:00', '190.0000', '159.0000', 'Company 1'),
(71084, '2020-01-01', 9, '08:43:00', '190.0000', '284.0000', 'Company 1'),
(71085, '2020-01-01', 9, '08:44:00', '190.0000', '335.0000', 'Company 1'),
(71086, '2020-01-01', 9, '08:45:00', '190.0000', '248.0000', 'Company 1'),
(71087, '2020-01-01', 9, '08:46:00', '190.0000', '332.0000', 'Company 1'),
(71088, '2020-01-01', 9, '08:47:00', '190.0000', '291.0000', 'Company 1'),
(71089, '2020-01-01', 9, '08:48:00', '190.0000', '334.0000', 'Company 1'),
(71090, '2020-01-01', 9, '08:49:00', '190.0000', '204.0000', 'Company 1'),
(71091, '2020-01-01', 9, '08:50:00', '190.0000', '230.0000', 'Company 1'),
(71092, '2020-01-01', 9, '08:51:00', '190.0000', '373.0000', 'Company 1'),
(71093, '2020-01-01', 9, '08:52:00', '190.0000', '209.0000', 'Company 1'),
(71094, '2020-01-01', 9, '08:53:00', '190.0000', '215.0000', 'Company 1'),
(71095, '2020-01-01', 9, '08:54:00', '190.0000', '180.0000', 'Company 1'),
(71096, '2020-01-01', 9, '08:55:00', '190.0000', '259.0000', 'Company 1'),
(71097, '2020-01-01', 9, '08:56:00', '190.0000', '376.0000', 'Company 1'),
(71098, '2020-01-01', 9, '08:57:00', '190.0000', '361.0000', 'Company 1'),
(71099, '2020-01-01', 9, '08:58:00', '190.0000', '229.0000', 'Company 1'),
(71100, '2020-01-01', 9, '08:59:00', '190.0000', '370.0000', 'Company 1'),
(71101, '2020-01-01', 10, '09:00:00', '190.0000', '285.0000', 'Company 1'),
(71102, '2020-01-01', 10, '09:01:00', '190.0000', '225.0000', 'Company 1'),
(71103, '2020-01-01', 10, '09:02:00', '190.0000', '212.0000', 'Company 1'),
(71104, '2020-01-01', 10, '09:03:00', '190.0000', '365.0000', 'Company 1'),
(71105, '2020-01-01', 10, '09:04:00', '190.0000', '332.0000', 'Company 1'),
(71106, '2020-01-01', 10, '09:05:00', '190.0000', '311.0000', 'Company 1'),
(71107, '2020-01-01', 10, '09:06:00', '190.0000', '200.0000', 'Company 1'),
(71108, '2020-01-01', 10, '09:07:00', '190.0000', '159.0000', 'Company 1'),
(71109, '2020-01-01', 10, '09:08:00', '190.0000', '380.0000', 'Company 1'),
(71110, '2020-01-01', 10, '09:09:00', '190.0000', '221.0000', 'Company 1'),
(71111, '2020-01-01', 10, '09:10:00', '190.0000', '259.0000', 'Company 1'),
(71112, '2020-01-01', 10, '09:11:00', '190.0000', '184.0000', 'Company 1'),
(71113, '2020-01-01', 10, '09:12:00', '190.0000', '369.0000', 'Company 1'),
(71114, '2020-01-01', 10, '09:13:00', '190.0000', '143.0000', 'Company 1'),
(71115, '2020-01-01', 10, '09:14:00', '190.0000', '224.0000', 'Company 1'),
(71116, '2020-01-01', 10, '09:15:00', '190.0000', '205.0000', 'Company 1'),
(71117, '2020-01-01', 10, '09:16:00', '190.0000', '203.0000', 'Company 1'),
(71118, '2020-01-01', 10, '09:17:00', '190.0000', '278.0000', 'Company 1'),
(71119, '2020-01-01', 10, '09:18:00', '190.0000', '283.0000', 'Company 1'),
(71120, '2020-01-01', 10, '09:19:00', '190.0000', '202.0000', 'Company 1'),
(71121, '2020-01-01', 10, '09:20:00', '190.0000', '149.0000', 'Company 1'),
(71122, '2020-01-01', 10, '09:21:00', '190.0000', '282.0000', 'Company 1'),
(71123, '2020-01-01', 10, '09:22:00', '190.0000', '367.0000', 'Company 1'),
(71124, '2020-01-01', 10, '09:23:00', '190.0000', '178.0000', 'Company 1'),
(71125, '2020-01-01', 10, '09:24:00', '190.0000', '308.0000', 'Company 1'),
(71126, '2020-01-01', 10, '09:25:00', '190.0000', '297.0000', 'Company 1'),
(71127, '2020-01-01', 10, '09:26:00', '190.0000', '259.0000', 'Company 1'),
(71128, '2020-01-01', 10, '09:27:00', '190.0000', '389.0000', 'Company 1'),
(71129, '2020-01-01', 10, '09:28:00', '190.0000', '366.0000', 'Company 1'),
(71130, '2020-01-01', 10, '09:29:00', '190.0000', '166.0000', 'Company 1'),
(71131, '2020-01-01', 10, '09:30:00', '190.0000', '161.0000', 'Company 1'),
(71132, '2020-01-01', 10, '09:31:00', '190.0000', '166.0000', 'Company 1'),
(71133, '2020-01-01', 10, '09:32:00', '190.0000', '220.0000', 'Company 1'),
(71134, '2020-01-01', 10, '09:33:00', '190.0000', '335.0000', 'Company 1'),
(71135, '2020-01-01', 10, '09:34:00', '190.0000', '210.0000', 'Company 1'),
(71136, '2020-01-01', 10, '09:35:00', '190.0000', '190.0000', 'Company 1'),
(71137, '2020-01-01', 10, '09:36:00', '190.0000', '333.0000', 'Company 1'),
(71138, '2020-01-01', 10, '09:37:00', '190.0000', '223.0000', 'Company 1'),
(71139, '2020-01-01', 10, '09:38:00', '190.0000', '193.0000', 'Company 1'),
(71140, '2020-01-01', 10, '09:39:00', '190.0000', '197.0000', 'Company 1'),
(71141, '2020-01-01', 10, '09:40:00', '190.0000', '256.0000', 'Company 1'),
(71142, '2020-01-01', 10, '09:41:00', '190.0000', '203.0000', 'Company 1'),
(71143, '2020-01-01', 10, '09:42:00', '190.0000', '165.0000', 'Company 1'),
(71144, '2020-01-01', 10, '09:43:00', '190.0000', '148.0000', 'Company 1'),
(71145, '2020-01-01', 10, '09:44:00', '190.0000', '315.0000', 'Company 1'),
(71146, '2020-01-01', 10, '09:45:00', '190.0000', '147.0000', 'Company 1'),
(71147, '2020-01-01', 10, '09:46:00', '190.0000', '335.0000', 'Company 1'),
(71148, '2020-01-01', 10, '09:47:00', '190.0000', '203.0000', 'Company 1'),
(71149, '2020-01-01', 10, '09:48:00', '190.0000', '177.0000', 'Company 1'),
(71150, '2020-01-01', 10, '09:49:00', '190.0000', '250.0000', 'Company 1'),
(71151, '2020-01-01', 10, '09:50:00', '190.0000', '249.0000', 'Company 1'),
(71152, '2020-01-01', 10, '09:51:00', '190.0000', '250.0000', 'Company 1'),
(71153, '2020-01-01', 10, '09:52:00', '190.0000', '178.0000', 'Company 1'),
(71154, '2020-01-01', 10, '09:53:00', '190.0000', '220.0000', 'Company 1'),
(71155, '2020-01-01', 10, '09:54:00', '190.0000', '270.0000', 'Company 1'),
(71156, '2020-01-01', 10, '09:55:00', '190.0000', '233.0000', 'Company 1');
INSERT INTO `power_generation` (`xsl`, `xdate`, `xhourending`, `xtime`, `xplant1`, `xplant2`, `xcompany`) VALUES
(71157, '2020-01-01', 10, '09:56:00', '190.0000', '252.0000', 'Company 1'),
(71158, '2020-01-01', 10, '09:57:00', '190.0000', '229.0000', 'Company 1'),
(71159, '2020-01-01', 10, '09:58:00', '190.0000', '274.0000', 'Company 1'),
(71160, '2020-01-01', 10, '09:59:00', '190.0000', '219.0000', 'Company 1'),
(71161, '2020-01-01', 11, '10:00:00', '190.0000', '225.0000', 'Company 1'),
(71162, '2020-01-01', 11, '10:01:00', '190.0000', '202.0000', 'Company 1'),
(71163, '2020-01-01', 11, '10:02:00', '190.0000', '192.0000', 'Company 1'),
(71164, '2020-01-01', 11, '10:03:00', '250.0000', '171.0000', 'Company 1'),
(71165, '2020-01-01', 11, '10:04:00', '250.0000', '208.0000', 'Company 1'),
(71166, '2020-01-01', 11, '10:05:00', '250.0000', '196.0000', 'Company 1'),
(71167, '2020-01-01', 11, '10:06:00', '250.0000', '229.0000', 'Company 1'),
(71168, '2020-01-01', 11, '10:07:00', '250.0000', '172.0000', 'Company 1'),
(71169, '2020-01-01', 11, '10:08:00', '250.0000', '310.0000', 'Company 1'),
(71170, '2020-01-01', 11, '10:09:00', '250.0000', '173.0000', 'Company 1'),
(71171, '2020-01-01', 11, '10:10:00', '250.0000', '375.0000', 'Company 1'),
(71172, '2020-01-01', 11, '10:11:00', '250.0000', '157.0000', 'Company 1'),
(71173, '2020-01-01', 11, '10:12:00', '250.0000', '251.0000', 'Company 1'),
(71174, '2020-01-01', 11, '10:13:00', '250.0000', '180.0000', 'Company 1'),
(71175, '2020-01-01', 11, '10:14:00', '250.0000', '219.0000', 'Company 1'),
(71176, '2020-01-01', 11, '10:15:00', '250.0000', '216.0000', 'Company 1'),
(71177, '2020-01-01', 11, '10:16:00', '250.0000', '192.0000', 'Company 1'),
(71178, '2020-01-01', 11, '10:17:00', '250.0000', '223.0000', 'Company 1'),
(71179, '2020-01-01', 11, '10:18:00', '250.0000', '369.0000', 'Company 1'),
(71180, '2020-01-01', 11, '10:19:00', '250.0000', '288.0000', 'Company 1'),
(71181, '2020-01-01', 11, '10:20:00', '250.0000', '156.0000', 'Company 1'),
(71182, '2020-01-01', 11, '10:21:00', '250.0000', '386.0000', 'Company 1'),
(71183, '2020-01-01', 11, '10:22:00', '250.0000', '272.0000', 'Company 1'),
(71184, '2020-01-01', 11, '10:23:00', '250.0000', '269.0000', 'Company 1'),
(71185, '2020-01-01', 11, '10:24:00', '250.0000', '203.0000', 'Company 1'),
(71186, '2020-01-01', 11, '10:25:00', '250.0000', '262.0000', 'Company 1'),
(71187, '2020-01-01', 11, '10:26:00', '250.0000', '319.0000', 'Company 1'),
(71188, '2020-01-01', 11, '10:27:00', '250.0000', '387.0000', 'Company 1'),
(71189, '2020-01-01', 11, '10:28:00', '250.0000', '276.0000', 'Company 1'),
(71190, '2020-01-01', 11, '10:29:00', '250.0000', '265.0000', 'Company 1'),
(71191, '2020-01-01', 11, '10:30:00', '250.0000', '258.0000', 'Company 1'),
(71192, '2020-01-01', 11, '10:31:00', '250.0000', '198.0000', 'Company 1'),
(71193, '2020-01-01', 11, '10:32:00', '250.0000', '284.0000', 'Company 1'),
(71194, '2020-01-01', 11, '10:33:00', '250.0000', '243.0000', 'Company 1'),
(71195, '2020-01-01', 11, '10:34:00', '250.0000', '155.0000', 'Company 1'),
(71196, '2020-01-01', 11, '10:35:00', '250.0000', '359.0000', 'Company 1'),
(71197, '2020-01-01', 11, '10:36:00', '250.0000', '346.0000', 'Company 1'),
(71198, '2020-01-01', 11, '10:37:00', '250.0000', '304.0000', 'Company 1'),
(71199, '2020-01-01', 11, '10:38:00', '250.0000', '305.0000', 'Company 1'),
(71200, '2020-01-01', 11, '10:39:00', '250.0000', '278.0000', 'Company 1'),
(71201, '2020-01-01', 11, '10:40:00', '250.0000', '198.0000', 'Company 1'),
(71202, '2020-01-01', 11, '10:41:00', '250.0000', '269.0000', 'Company 1'),
(71203, '2020-01-01', 11, '10:42:00', '250.0000', '205.0000', 'Company 1'),
(71204, '2020-01-01', 11, '10:43:00', '250.0000', '386.0000', 'Company 1'),
(71205, '2020-01-01', 11, '10:44:00', '250.0000', '370.0000', 'Company 1'),
(71206, '2020-01-01', 11, '10:45:00', '250.0000', '358.0000', 'Company 1'),
(71207, '2020-01-01', 11, '10:46:00', '250.0000', '266.0000', 'Company 1'),
(71208, '2020-01-01', 11, '10:47:00', '250.0000', '214.0000', 'Company 1'),
(71209, '2020-01-01', 11, '10:48:00', '250.0000', '226.0000', 'Company 1'),
(71210, '2020-01-01', 11, '10:49:00', '250.0000', '144.0000', 'Company 1'),
(71211, '2020-01-01', 11, '10:50:00', '250.0000', '148.0000', 'Company 1'),
(71212, '2020-01-01', 11, '10:51:00', '250.0000', '205.0000', 'Company 1'),
(71213, '2020-01-01', 11, '10:52:00', '250.0000', '192.0000', 'Company 1'),
(71214, '2020-01-01', 11, '10:53:00', '250.0000', '210.0000', 'Company 1'),
(71215, '2020-01-01', 11, '10:54:00', '250.0000', '181.0000', 'Company 1'),
(71216, '2020-01-01', 11, '10:55:00', '250.0000', '267.0000', 'Company 1'),
(71217, '2020-01-01', 11, '10:56:00', '250.0000', '167.0000', 'Company 1'),
(71218, '2020-01-01', 11, '10:57:00', '250.0000', '231.0000', 'Company 1'),
(71219, '2020-01-01', 11, '10:58:00', '250.0000', '369.0000', 'Company 1'),
(71220, '2020-01-01', 11, '10:59:00', '250.0000', '165.0000', 'Company 1'),
(71221, '2020-01-01', 12, '11:00:00', '250.0000', '271.0000', 'Company 1'),
(71222, '2020-01-01', 12, '11:01:00', '250.0000', '221.0000', 'Company 1'),
(71223, '2020-01-01', 12, '11:02:00', '250.0000', '154.0000', 'Company 1'),
(71224, '2020-01-01', 12, '11:03:00', '250.0000', '356.0000', 'Company 1'),
(71225, '2020-01-01', 12, '11:04:00', '250.0000', '352.0000', 'Company 1'),
(71226, '2020-01-01', 12, '11:05:00', '250.0000', '162.0000', 'Company 1'),
(71227, '2020-01-01', 12, '11:06:00', '250.0000', '275.0000', 'Company 1'),
(71228, '2020-01-01', 12, '11:07:00', '250.0000', '261.0000', 'Company 1'),
(71229, '2020-01-01', 12, '11:08:00', '250.0000', '297.0000', 'Company 1'),
(71230, '2020-01-01', 12, '11:09:00', '250.0000', '274.0000', 'Company 1'),
(71231, '2020-01-01', 12, '11:10:00', '250.0000', '258.0000', 'Company 1'),
(71232, '2020-01-01', 12, '11:11:00', '250.0000', '367.0000', 'Company 1'),
(71233, '2020-01-01', 12, '11:12:00', '250.0000', '338.0000', 'Company 1'),
(71234, '2020-01-01', 12, '11:13:00', '250.0000', '261.0000', 'Company 1'),
(71235, '2020-01-01', 12, '11:14:00', '250.0000', '269.0000', 'Company 1'),
(71236, '2020-01-01', 12, '11:15:00', '250.0000', '181.0000', 'Company 1'),
(71237, '2020-01-01', 12, '11:16:00', '250.0000', '363.0000', 'Company 1'),
(71238, '2020-01-01', 12, '11:17:00', '250.0000', '232.0000', 'Company 1'),
(71239, '2020-01-01', 12, '11:18:00', '250.0000', '305.0000', 'Company 1'),
(71240, '2020-01-01', 12, '11:19:00', '250.0000', '382.0000', 'Company 1'),
(71241, '2020-01-01', 12, '11:20:00', '250.0000', '302.0000', 'Company 1'),
(71242, '2020-01-01', 12, '11:21:00', '250.0000', '147.0000', 'Company 1'),
(71243, '2020-01-01', 12, '11:22:00', '250.0000', '238.0000', 'Company 1'),
(71244, '2020-01-01', 12, '11:23:00', '250.0000', '173.0000', 'Company 1'),
(71245, '2020-01-01', 12, '11:24:00', '250.0000', '333.0000', 'Company 1'),
(71246, '2020-01-01', 12, '11:25:00', '250.0000', '267.0000', 'Company 1'),
(71247, '2020-01-01', 12, '11:26:00', '250.0000', '166.0000', 'Company 1'),
(71248, '2020-01-01', 12, '11:27:00', '250.0000', '241.0000', 'Company 1'),
(71249, '2020-01-01', 12, '11:28:00', '250.0000', '258.0000', 'Company 1'),
(71250, '2020-01-01', 12, '11:29:00', '250.0000', '275.0000', 'Company 1'),
(71251, '2020-01-01', 12, '11:30:00', '250.0000', '368.0000', 'Company 1'),
(71252, '2020-01-01', 12, '11:31:00', '250.0000', '225.0000', 'Company 1'),
(71253, '2020-01-01', 12, '11:32:00', '250.0000', '179.0000', 'Company 1'),
(71254, '2020-01-01', 12, '11:33:00', '250.0000', '325.0000', 'Company 1'),
(71255, '2020-01-01', 12, '11:34:00', '250.0000', '324.0000', 'Company 1'),
(71256, '2020-01-01', 12, '11:35:00', '250.0000', '344.0000', 'Company 1'),
(71257, '2020-01-01', 12, '11:36:00', '250.0000', '195.0000', 'Company 1'),
(71258, '2020-01-01', 12, '11:37:00', '250.0000', '382.0000', 'Company 1'),
(71259, '2020-01-01', 12, '11:38:00', '250.0000', '386.0000', 'Company 1'),
(71260, '2020-01-01', 12, '11:39:00', '250.0000', '191.0000', 'Company 1'),
(71261, '2020-01-01', 12, '11:40:00', '250.0000', '209.0000', 'Company 1'),
(71262, '2020-01-01', 12, '11:41:00', '250.0000', '335.0000', 'Company 1'),
(71263, '2020-01-01', 12, '11:42:00', '250.0000', '204.0000', 'Company 1'),
(71264, '2020-01-01', 12, '11:43:00', '250.0000', '324.0000', 'Company 1'),
(71265, '2020-01-01', 12, '11:44:00', '250.0000', '263.0000', 'Company 1'),
(71266, '2020-01-01', 12, '11:45:00', '250.0000', '299.0000', 'Company 1'),
(71267, '2020-01-01', 12, '11:46:00', '250.0000', '181.0000', 'Company 1'),
(71268, '2020-01-01', 12, '11:47:00', '250.0000', '311.0000', 'Company 1'),
(71269, '2020-01-01', 12, '11:48:00', '250.0000', '251.0000', 'Company 1'),
(71270, '2020-01-01', 12, '11:49:00', '250.0000', '311.0000', 'Company 1'),
(71271, '2020-01-01', 12, '11:50:00', '250.0000', '219.0000', 'Company 1'),
(71272, '2020-01-01', 12, '11:51:00', '250.0000', '171.0000', 'Company 1'),
(71273, '2020-01-01', 12, '11:52:00', '250.0000', '253.0000', 'Company 1'),
(71274, '2020-01-01', 12, '11:53:00', '250.0000', '383.0000', 'Company 1'),
(71275, '2020-01-01', 12, '11:54:00', '250.0000', '373.0000', 'Company 1'),
(71276, '2020-01-01', 12, '11:55:00', '250.0000', '326.0000', 'Company 1'),
(71277, '2020-01-01', 12, '11:56:00', '250.0000', '282.0000', 'Company 1'),
(71278, '2020-01-01', 12, '11:57:00', '250.0000', '257.0000', 'Company 1'),
(71279, '2020-01-01', 12, '11:58:00', '250.0000', '216.0000', 'Company 1'),
(71280, '2020-01-01', 12, '11:59:00', '250.0000', '143.0000', 'Company 1'),
(71281, '2020-01-01', 13, '12:00:00', '250.0000', '295.0000', 'Company 1'),
(71282, '2020-01-01', 13, '12:01:00', '250.0000', '340.0000', 'Company 1'),
(71283, '2020-01-01', 13, '12:02:00', '250.0000', '352.0000', 'Company 1'),
(71284, '2020-01-01', 13, '12:03:00', '250.0000', '251.0000', 'Company 1'),
(71285, '2020-01-01', 13, '12:04:00', '250.0000', '349.0000', 'Company 1'),
(71286, '2020-01-01', 13, '12:05:00', '250.0000', '330.0000', 'Company 1'),
(71287, '2020-01-01', 13, '12:06:00', '250.0000', '321.0000', 'Company 1'),
(71288, '2020-01-01', 13, '12:07:00', '250.0000', '374.0000', 'Company 1'),
(71289, '2020-01-01', 13, '12:08:00', '250.0000', '361.0000', 'Company 1'),
(71290, '2020-01-01', 13, '12:09:00', '250.0000', '301.0000', 'Company 1'),
(71291, '2020-01-01', 13, '12:10:00', '250.0000', '236.0000', 'Company 1'),
(71292, '2020-01-01', 13, '12:11:00', '250.0000', '362.0000', 'Company 1'),
(71293, '2020-01-01', 13, '12:12:00', '250.0000', '145.0000', 'Company 1'),
(71294, '2020-01-01', 13, '12:13:00', '250.0000', '264.0000', 'Company 1'),
(71295, '2020-01-01', 13, '12:14:00', '250.0000', '266.0000', 'Company 1'),
(71296, '2020-01-01', 13, '12:15:00', '250.0000', '171.0000', 'Company 1'),
(71297, '2020-01-01', 13, '12:16:00', '250.0000', '311.0000', 'Company 1'),
(71298, '2020-01-01', 13, '12:17:00', '250.0000', '186.0000', 'Company 1'),
(71299, '2020-01-01', 13, '12:18:00', '250.0000', '252.0000', 'Company 1'),
(71300, '2020-01-01', 13, '12:19:00', '250.0000', '328.0000', 'Company 1'),
(71301, '2020-01-01', 13, '12:20:00', '250.0000', '150.0000', 'Company 1'),
(71302, '2020-01-01', 13, '12:21:00', '250.0000', '284.0000', 'Company 1'),
(71303, '2020-01-01', 13, '12:22:00', '250.0000', '248.0000', 'Company 1'),
(71304, '2020-01-01', 13, '12:23:00', '250.0000', '372.0000', 'Company 1'),
(71305, '2020-01-01', 13, '12:24:00', '250.0000', '193.0000', 'Company 1'),
(71306, '2020-01-01', 13, '12:25:00', '250.0000', '375.0000', 'Company 1'),
(71307, '2020-01-01', 13, '12:26:00', '250.0000', '300.0000', 'Company 1'),
(71308, '2020-01-01', 13, '12:27:00', '250.0000', '201.0000', 'Company 1'),
(71309, '2020-01-01', 13, '12:28:00', '250.0000', '238.0000', 'Company 1'),
(71310, '2020-01-01', 13, '12:29:00', '250.0000', '339.0000', 'Company 1'),
(71311, '2020-01-01', 13, '12:30:00', '250.0000', '251.0000', 'Company 1'),
(71312, '2020-01-01', 13, '12:31:00', '250.0000', '354.0000', 'Company 1'),
(71313, '2020-01-01', 13, '12:32:00', '250.0000', '299.0000', 'Company 1'),
(71314, '2020-01-01', 13, '12:33:00', '250.0000', '271.0000', 'Company 1'),
(71315, '2020-01-01', 13, '12:34:00', '250.0000', '234.0000', 'Company 1'),
(71316, '2020-01-01', 13, '12:35:00', '250.0000', '294.0000', 'Company 1'),
(71317, '2020-01-01', 13, '12:36:00', '250.0000', '185.0000', 'Company 1'),
(71318, '2020-01-01', 13, '12:37:00', '250.0000', '164.0000', 'Company 1'),
(71319, '2020-01-01', 13, '12:38:00', '250.0000', '192.0000', 'Company 1'),
(71320, '2020-01-01', 13, '12:39:00', '250.0000', '212.0000', 'Company 1'),
(71321, '2020-01-01', 13, '12:40:00', '250.0000', '188.0000', 'Company 1'),
(71322, '2020-01-01', 13, '12:41:00', '250.0000', '237.0000', 'Company 1'),
(71323, '2020-01-01', 13, '12:42:00', '250.0000', '338.0000', 'Company 1'),
(71324, '2020-01-01', 13, '12:43:00', '250.0000', '145.0000', 'Company 1'),
(71325, '2020-01-01', 13, '12:44:00', '250.0000', '310.0000', 'Company 1'),
(71326, '2020-01-01', 13, '12:45:00', '250.0000', '339.0000', 'Company 1'),
(71327, '2020-01-01', 13, '12:46:00', '250.0000', '352.0000', 'Company 1'),
(71328, '2020-01-01', 13, '12:47:00', '250.0000', '378.0000', 'Company 1'),
(71329, '2020-01-01', 13, '12:48:00', '250.0000', '239.0000', 'Company 1'),
(71330, '2020-01-01', 13, '12:49:00', '250.0000', '384.0000', 'Company 1'),
(71331, '2020-01-01', 13, '12:50:00', '250.0000', '352.0000', 'Company 1'),
(71332, '2020-01-01', 13, '12:51:00', '250.0000', '348.0000', 'Company 1'),
(71333, '2020-01-01', 13, '12:52:00', '250.0000', '354.0000', 'Company 1'),
(71334, '2020-01-01', 13, '12:53:00', '250.0000', '167.0000', 'Company 1'),
(71335, '2020-01-01', 13, '12:54:00', '250.0000', '202.0000', 'Company 1'),
(71336, '2020-01-01', 13, '12:55:00', '250.0000', '383.0000', 'Company 1'),
(71337, '2020-01-01', 13, '12:56:00', '250.0000', '321.0000', 'Company 1'),
(71338, '2020-01-01', 13, '12:57:00', '250.0000', '332.0000', 'Company 1'),
(71339, '2020-01-01', 13, '12:58:00', '250.0000', '306.0000', 'Company 1'),
(71340, '2020-01-01', 13, '12:59:00', '250.0000', '170.0000', 'Company 1'),
(71341, '2020-01-01', 14, '13:00:00', '250.0000', '329.0000', 'Company 1'),
(71342, '2020-01-01', 14, '13:01:00', '250.0000', '192.0000', 'Company 1'),
(71343, '2020-01-01', 14, '13:02:00', '250.0000', '249.0000', 'Company 1'),
(71344, '2020-01-01', 14, '13:03:00', '250.0000', '268.0000', 'Company 1'),
(71345, '2020-01-01', 14, '13:04:00', '250.0000', '173.0000', 'Company 1'),
(71346, '2020-01-01', 14, '13:05:00', '250.0000', '351.0000', 'Company 1'),
(71347, '2020-01-01', 14, '13:06:00', '250.0000', '166.0000', 'Company 1'),
(71348, '2020-01-01', 14, '13:07:00', '250.0000', '372.0000', 'Company 1'),
(71349, '2020-01-01', 14, '13:08:00', '250.0000', '343.0000', 'Company 1'),
(71350, '2020-01-01', 14, '13:09:00', '250.0000', '288.0000', 'Company 1'),
(71351, '2020-01-01', 14, '13:10:00', '250.0000', '168.0000', 'Company 1'),
(71352, '2020-01-01', 14, '13:11:00', '250.0000', '339.0000', 'Company 1'),
(71353, '2020-01-01', 14, '13:12:00', '250.0000', '248.0000', 'Company 1'),
(71354, '2020-01-01', 14, '13:13:00', '250.0000', '191.0000', 'Company 1'),
(71355, '2020-01-01', 14, '13:14:00', '250.0000', '150.0000', 'Company 1'),
(71356, '2020-01-01', 14, '13:15:00', '250.0000', '304.0000', 'Company 1'),
(71357, '2020-01-01', 14, '13:16:00', '250.0000', '276.0000', 'Company 1'),
(71358, '2020-01-01', 14, '13:17:00', '250.0000', '377.0000', 'Company 1'),
(71359, '2020-01-01', 14, '13:18:00', '250.0000', '312.0000', 'Company 1'),
(71360, '2020-01-01', 14, '13:19:00', '250.0000', '247.0000', 'Company 1'),
(71361, '2020-01-01', 14, '13:20:00', '250.0000', '380.0000', 'Company 1'),
(71362, '2020-01-01', 14, '13:21:00', '250.0000', '328.0000', 'Company 1'),
(71363, '2020-01-01', 14, '13:22:00', '250.0000', '162.0000', 'Company 1'),
(71364, '2020-01-01', 14, '13:23:00', '250.0000', '274.0000', 'Company 1'),
(71365, '2020-01-01', 14, '13:24:00', '250.0000', '352.0000', 'Company 1'),
(71366, '2020-01-01', 14, '13:25:00', '250.0000', '273.0000', 'Company 1'),
(71367, '2020-01-01', 14, '13:26:00', '250.0000', '211.0000', 'Company 1'),
(71368, '2020-01-01', 14, '13:27:00', '250.0000', '378.0000', 'Company 1'),
(71369, '2020-01-01', 14, '13:28:00', '250.0000', '355.0000', 'Company 1'),
(71370, '2020-01-01', 14, '13:29:00', '250.0000', '365.0000', 'Company 1'),
(71371, '2020-01-01', 14, '13:30:00', '250.0000', '209.0000', 'Company 1'),
(71372, '2020-01-01', 14, '13:31:00', '250.0000', '264.0000', 'Company 1'),
(71373, '2020-01-01', 14, '13:32:00', '250.0000', '251.0000', 'Company 1'),
(71374, '2020-01-01', 14, '13:33:00', '250.0000', '387.0000', 'Company 1'),
(71375, '2020-01-01', 14, '13:34:00', '250.0000', '164.0000', 'Company 1'),
(71376, '2020-01-01', 14, '13:35:00', '250.0000', '214.0000', 'Company 1'),
(71377, '2020-01-01', 14, '13:36:00', '250.0000', '358.0000', 'Company 1'),
(71378, '2020-01-01', 14, '13:37:00', '250.0000', '168.0000', 'Company 1'),
(71379, '2020-01-01', 14, '13:38:00', '250.0000', '248.0000', 'Company 1'),
(71380, '2020-01-01', 14, '13:39:00', '250.0000', '321.0000', 'Company 1'),
(71381, '2020-01-01', 14, '13:40:00', '250.0000', '156.0000', 'Company 1'),
(71382, '2020-01-01', 14, '13:41:00', '250.0000', '261.0000', 'Company 1'),
(71383, '2020-01-01', 14, '13:42:00', '250.0000', '267.0000', 'Company 1'),
(71384, '2020-01-01', 14, '13:43:00', '250.0000', '216.0000', 'Company 1'),
(71385, '2020-01-01', 14, '13:44:00', '250.0000', '197.0000', 'Company 1'),
(71386, '2020-01-01', 14, '13:45:00', '250.0000', '207.0000', 'Company 1'),
(71387, '2020-01-01', 14, '13:46:00', '250.0000', '241.0000', 'Company 1'),
(71388, '2020-01-01', 14, '13:47:00', '250.0000', '179.0000', 'Company 1'),
(71389, '2020-01-01', 14, '13:48:00', '250.0000', '284.0000', 'Company 1'),
(71390, '2020-01-01', 14, '13:49:00', '250.0000', '168.0000', 'Company 1'),
(71391, '2020-01-01', 14, '13:50:00', '250.0000', '313.0000', 'Company 1'),
(71392, '2020-01-01', 14, '13:51:00', '250.0000', '153.0000', 'Company 1'),
(71393, '2020-01-01', 14, '13:52:00', '250.0000', '144.0000', 'Company 1'),
(71394, '2020-01-01', 14, '13:53:00', '250.0000', '204.0000', 'Company 1'),
(71395, '2020-01-01', 14, '13:54:00', '250.0000', '302.0000', 'Company 1'),
(71396, '2020-01-01', 14, '13:55:00', '250.0000', '373.0000', 'Company 1'),
(71397, '2020-01-01', 14, '13:56:00', '250.0000', '369.0000', 'Company 1'),
(71398, '2020-01-01', 14, '13:57:00', '250.0000', '356.0000', 'Company 1'),
(71399, '2020-01-01', 14, '13:58:00', '250.0000', '239.0000', 'Company 1'),
(71400, '2020-01-01', 14, '13:59:00', '250.0000', '140.0000', 'Company 1'),
(71401, '2020-01-01', 15, '14:00:00', '250.0000', '262.0000', 'Company 1'),
(71402, '2020-01-01', 15, '14:01:00', '250.0000', '386.0000', 'Company 1'),
(71403, '2020-01-01', 15, '14:02:00', '250.0000', '225.0000', 'Company 1'),
(71404, '2020-01-01', 15, '14:03:00', '250.0000', '314.0000', 'Company 1'),
(71405, '2020-01-01', 15, '14:04:00', '250.0000', '203.0000', 'Company 1'),
(71406, '2020-01-01', 15, '14:05:00', '250.0000', '213.0000', 'Company 1'),
(71407, '2020-01-01', 15, '14:06:00', '250.0000', '324.0000', 'Company 1'),
(71408, '2020-01-01', 15, '14:07:00', '250.0000', '257.0000', 'Company 1'),
(71409, '2020-01-01', 15, '14:08:00', '250.0000', '155.0000', 'Company 1'),
(71410, '2020-01-01', 15, '14:09:00', '250.0000', '198.0000', 'Company 1'),
(71411, '2020-01-01', 15, '14:10:00', '250.0000', '164.0000', 'Company 1'),
(71412, '2020-01-01', 15, '14:11:00', '250.0000', '244.0000', 'Company 1'),
(71413, '2020-01-01', 15, '14:12:00', '250.0000', '181.0000', 'Company 1'),
(71414, '2020-01-01', 15, '14:13:00', '250.0000', '341.0000', 'Company 1'),
(71415, '2020-01-01', 15, '14:14:00', '250.0000', '151.0000', 'Company 1'),
(71416, '2020-01-01', 15, '14:15:00', '250.0000', '211.0000', 'Company 1'),
(71417, '2020-01-01', 15, '14:16:00', '250.0000', '380.0000', 'Company 1'),
(71418, '2020-01-01', 15, '14:17:00', '250.0000', '241.0000', 'Company 1'),
(71419, '2020-01-01', 15, '14:18:00', '250.0000', '198.0000', 'Company 1'),
(71420, '2020-01-01', 15, '14:19:00', '250.0000', '387.0000', 'Company 1'),
(71421, '2020-01-01', 15, '14:20:00', '250.0000', '196.0000', 'Company 1'),
(71422, '2020-01-01', 15, '14:21:00', '250.0000', '290.0000', 'Company 1'),
(71423, '2020-01-01', 15, '14:22:00', '250.0000', '346.0000', 'Company 1'),
(71424, '2020-01-01', 15, '14:23:00', '250.0000', '159.0000', 'Company 1'),
(71425, '2020-01-01', 15, '14:24:00', '250.0000', '185.0000', 'Company 1'),
(71426, '2020-01-01', 15, '14:25:00', '250.0000', '143.0000', 'Company 1'),
(71427, '2020-01-01', 15, '14:26:00', '250.0000', '358.0000', 'Company 1'),
(71428, '2020-01-01', 15, '14:27:00', '250.0000', '272.0000', 'Company 1'),
(71429, '2020-01-01', 15, '14:28:00', '250.0000', '339.0000', 'Company 1'),
(71430, '2020-01-01', 15, '14:29:00', '250.0000', '367.0000', 'Company 1'),
(71431, '2020-01-01', 15, '14:30:00', '250.0000', '322.0000', 'Company 1'),
(71432, '2020-01-01', 15, '14:31:00', '250.0000', '353.0000', 'Company 1'),
(71433, '2020-01-01', 15, '14:32:00', '250.0000', '273.0000', 'Company 1'),
(71434, '2020-01-01', 15, '14:33:00', '250.0000', '180.0000', 'Company 1'),
(71435, '2020-01-01', 15, '14:34:00', '250.0000', '368.0000', 'Company 1'),
(71436, '2020-01-01', 15, '14:35:00', '250.0000', '261.0000', 'Company 1'),
(71437, '2020-01-01', 15, '14:36:00', '250.0000', '141.0000', 'Company 1'),
(71438, '2020-01-01', 15, '14:37:00', '250.0000', '293.0000', 'Company 1'),
(71439, '2020-01-01', 15, '14:38:00', '250.0000', '269.0000', 'Company 1'),
(71440, '2020-01-01', 15, '14:39:00', '250.0000', '354.0000', 'Company 1'),
(71441, '2020-01-01', 15, '14:40:00', '250.0000', '140.0000', 'Company 1'),
(71442, '2020-01-01', 15, '14:41:00', '250.0000', '329.0000', 'Company 1'),
(71443, '2020-01-01', 15, '14:42:00', '250.0000', '383.0000', 'Company 1'),
(71444, '2020-01-01', 15, '14:43:00', '250.0000', '306.0000', 'Company 1'),
(71445, '2020-01-01', 15, '14:44:00', '250.0000', '190.0000', 'Company 1'),
(71446, '2020-01-01', 15, '14:45:00', '250.0000', '321.0000', 'Company 1'),
(71447, '2020-01-01', 15, '14:46:00', '250.0000', '222.0000', 'Company 1'),
(71448, '2020-01-01', 15, '14:47:00', '250.0000', '382.0000', 'Company 1'),
(71449, '2020-01-01', 15, '14:48:00', '250.0000', '222.0000', 'Company 1'),
(71450, '2020-01-01', 15, '14:49:00', '250.0000', '318.0000', 'Company 1'),
(71451, '2020-01-01', 15, '14:50:00', '250.0000', '238.0000', 'Company 1'),
(71452, '2020-01-01', 15, '14:51:00', '250.0000', '302.0000', 'Company 1'),
(71453, '2020-01-01', 15, '14:52:00', '250.0000', '204.0000', 'Company 1'),
(71454, '2020-01-01', 15, '14:53:00', '250.0000', '238.0000', 'Company 1'),
(71455, '2020-01-01', 15, '14:54:00', '250.0000', '169.0000', 'Company 1'),
(71456, '2020-01-01', 15, '14:55:00', '250.0000', '342.0000', 'Company 1'),
(71457, '2020-01-01', 15, '14:56:00', '250.0000', '252.0000', 'Company 1'),
(71458, '2020-01-01', 15, '14:57:00', '250.0000', '185.0000', 'Company 1'),
(71459, '2020-01-01', 15, '14:58:00', '250.0000', '215.0000', 'Company 1'),
(71460, '2020-01-01', 15, '14:59:00', '250.0000', '181.0000', 'Company 1'),
(71461, '2020-01-01', 16, '15:00:00', '250.0000', '273.0000', 'Company 1'),
(71462, '2020-01-01', 16, '15:01:00', '250.0000', '143.0000', 'Company 1'),
(71463, '2020-01-01', 16, '15:02:00', '250.0000', '365.0000', 'Company 1'),
(71464, '2020-01-01', 16, '15:03:00', '250.0000', '309.0000', 'Company 1'),
(71465, '2020-01-01', 16, '15:04:00', '250.0000', '333.0000', 'Company 1'),
(71466, '2020-01-01', 16, '15:05:00', '250.0000', '145.0000', 'Company 1'),
(71467, '2020-01-01', 16, '15:06:00', '250.0000', '377.0000', 'Company 1'),
(71468, '2020-01-01', 16, '15:07:00', '250.0000', '200.0000', 'Company 1'),
(71469, '2020-01-01', 16, '15:08:00', '250.0000', '271.0000', 'Company 1'),
(71470, '2020-01-01', 16, '15:09:00', '250.0000', '346.0000', 'Company 1'),
(71471, '2020-01-01', 16, '15:10:00', '250.0000', '235.0000', 'Company 1'),
(71472, '2020-01-01', 16, '15:11:00', '250.0000', '348.0000', 'Company 1'),
(71473, '2020-01-01', 16, '15:12:00', '250.0000', '265.0000', 'Company 1'),
(71474, '2020-01-01', 16, '15:13:00', '250.0000', '322.0000', 'Company 1'),
(71475, '2020-01-01', 16, '15:14:00', '250.0000', '304.0000', 'Company 1'),
(71476, '2020-01-01', 16, '15:15:00', '250.0000', '265.0000', 'Company 1'),
(71477, '2020-01-01', 16, '15:16:00', '250.0000', '160.0000', 'Company 1'),
(71478, '2020-01-01', 16, '15:17:00', '250.0000', '174.0000', 'Company 1'),
(71479, '2020-01-01', 16, '15:18:00', '250.0000', '351.0000', 'Company 1'),
(71480, '2020-01-01', 16, '15:19:00', '250.0000', '222.0000', 'Company 1'),
(71481, '2020-01-01', 16, '15:20:00', '250.0000', '293.0000', 'Company 1'),
(71482, '2020-01-01', 16, '15:21:00', '250.0000', '344.0000', 'Company 1'),
(71483, '2020-01-01', 16, '15:22:00', '250.0000', '376.0000', 'Company 1'),
(71484, '2020-01-01', 16, '15:23:00', '250.0000', '339.0000', 'Company 1'),
(71485, '2020-01-01', 16, '15:24:00', '250.0000', '351.0000', 'Company 1'),
(71486, '2020-01-01', 16, '15:25:00', '250.0000', '369.0000', 'Company 1'),
(71487, '2020-01-01', 16, '15:26:00', '250.0000', '352.0000', 'Company 1'),
(71488, '2020-01-01', 16, '15:27:00', '250.0000', '142.0000', 'Company 1'),
(71489, '2020-01-01', 16, '15:28:00', '250.0000', '303.0000', 'Company 1'),
(71490, '2020-01-01', 16, '15:29:00', '250.0000', '361.0000', 'Company 1'),
(71491, '2020-01-01', 16, '15:30:00', '250.0000', '370.0000', 'Company 1'),
(71492, '2020-01-01', 16, '15:31:00', '250.0000', '365.0000', 'Company 1'),
(71493, '2020-01-01', 16, '15:32:00', '250.0000', '284.0000', 'Company 1'),
(71494, '2020-01-01', 16, '15:33:00', '250.0000', '289.0000', 'Company 1'),
(71495, '2020-01-01', 16, '15:34:00', '250.0000', '173.0000', 'Company 1'),
(71496, '2020-01-01', 16, '15:35:00', '250.0000', '152.0000', 'Company 1'),
(71497, '2020-01-01', 16, '15:36:00', '250.0000', '358.0000', 'Company 1'),
(71498, '2020-01-01', 16, '15:37:00', '250.0000', '153.0000', 'Company 1'),
(71499, '2020-01-01', 16, '15:38:00', '250.0000', '383.0000', 'Company 1'),
(71500, '2020-01-01', 16, '15:39:00', '250.0000', '266.0000', 'Company 1'),
(71501, '2020-01-01', 16, '15:40:00', '250.0000', '196.0000', 'Company 1'),
(71502, '2020-01-01', 16, '15:41:00', '250.0000', '304.0000', 'Company 1'),
(71503, '2020-01-01', 16, '15:42:00', '250.0000', '156.0000', 'Company 1'),
(71504, '2020-01-01', 16, '15:43:00', '250.0000', '286.0000', 'Company 1'),
(71505, '2020-01-01', 16, '15:44:00', '250.0000', '376.0000', 'Company 1'),
(71506, '2020-01-01', 16, '15:45:00', '250.0000', '244.0000', 'Company 1'),
(71507, '2020-01-01', 16, '15:46:00', '250.0000', '312.0000', 'Company 1'),
(71508, '2020-01-01', 16, '15:47:00', '250.0000', '291.0000', 'Company 1'),
(71509, '2020-01-01', 16, '15:48:00', '250.0000', '250.0000', 'Company 1'),
(71510, '2020-01-01', 16, '15:49:00', '250.0000', '235.0000', 'Company 1'),
(71511, '2020-01-01', 16, '15:50:00', '250.0000', '381.0000', 'Company 1'),
(71512, '2020-01-01', 16, '15:51:00', '250.0000', '321.0000', 'Company 1'),
(71513, '2020-01-01', 16, '15:52:00', '250.0000', '361.0000', 'Company 1'),
(71514, '2020-01-01', 16, '15:53:00', '250.0000', '282.0000', 'Company 1'),
(71515, '2020-01-01', 16, '15:54:00', '250.0000', '262.0000', 'Company 1'),
(71516, '2020-01-01', 16, '15:55:00', '250.0000', '378.0000', 'Company 1'),
(71517, '2020-01-01', 16, '15:56:00', '250.0000', '282.0000', 'Company 1'),
(71518, '2020-01-01', 16, '15:57:00', '250.0000', '331.0000', 'Company 1'),
(71519, '2020-01-01', 16, '15:58:00', '250.0000', '202.0000', 'Company 1'),
(71520, '2020-01-01', 16, '15:59:00', '250.0000', '383.0000', 'Company 1'),
(71521, '2020-01-01', 17, '16:00:00', '250.0000', '308.0000', 'Company 1'),
(71522, '2020-01-01', 17, '16:01:00', '250.0000', '300.0000', 'Company 1'),
(71523, '2020-01-01', 17, '16:02:00', '250.0000', '330.0000', 'Company 1'),
(71524, '2020-01-01', 17, '16:03:00', '250.0000', '375.0000', 'Company 1'),
(71525, '2020-01-01', 17, '16:04:00', '250.0000', '195.0000', 'Company 1'),
(71526, '2020-01-01', 17, '16:05:00', '250.0000', '188.0000', 'Company 1'),
(71527, '2020-01-01', 17, '16:06:00', '250.0000', '363.0000', 'Company 1'),
(71528, '2020-01-01', 17, '16:07:00', '250.0000', '302.0000', 'Company 1'),
(71529, '2020-01-01', 17, '16:08:00', '250.0000', '234.0000', 'Company 1'),
(71530, '2020-01-01', 17, '16:09:00', '250.0000', '356.0000', 'Company 1'),
(71531, '2020-01-01', 17, '16:10:00', '250.0000', '259.0000', 'Company 1'),
(71532, '2020-01-01', 17, '16:11:00', '250.0000', '187.0000', 'Company 1'),
(71533, '2020-01-01', 17, '16:12:00', '250.0000', '158.0000', 'Company 1'),
(71534, '2020-01-01', 17, '16:13:00', '250.0000', '302.0000', 'Company 1'),
(71535, '2020-01-01', 17, '16:14:00', '250.0000', '269.0000', 'Company 1'),
(71536, '2020-01-01', 17, '16:15:00', '250.0000', '258.0000', 'Company 1'),
(71537, '2020-01-01', 17, '16:16:00', '250.0000', '254.0000', 'Company 1'),
(71538, '2020-01-01', 17, '16:17:00', '250.0000', '247.0000', 'Company 1'),
(71539, '2020-01-01', 17, '16:18:00', '250.0000', '319.0000', 'Company 1'),
(71540, '2020-01-01', 17, '16:19:00', '250.0000', '296.0000', 'Company 1'),
(71541, '2020-01-01', 17, '16:20:00', '250.0000', '224.0000', 'Company 1'),
(71542, '2020-01-01', 17, '16:21:00', '250.0000', '384.0000', 'Company 1'),
(71543, '2020-01-01', 17, '16:22:00', '250.0000', '232.0000', 'Company 1'),
(71544, '2020-01-01', 17, '16:23:00', '250.0000', '162.0000', 'Company 1'),
(71545, '2020-01-01', 17, '16:24:00', '250.0000', '306.0000', 'Company 1'),
(71546, '2020-01-01', 17, '16:25:00', '250.0000', '390.0000', 'Company 1'),
(71547, '2020-01-01', 17, '16:26:00', '250.0000', '272.0000', 'Company 1'),
(71548, '2020-01-01', 17, '16:27:00', '250.0000', '191.0000', 'Company 1'),
(71549, '2020-01-01', 17, '16:28:00', '250.0000', '172.0000', 'Company 1'),
(71550, '2020-01-01', 17, '16:29:00', '250.0000', '145.0000', 'Company 1'),
(71551, '2020-01-01', 17, '16:30:00', '250.0000', '252.0000', 'Company 1'),
(71552, '2020-01-01', 17, '16:31:00', '250.0000', '255.0000', 'Company 1'),
(71553, '2020-01-01', 17, '16:32:00', '250.0000', '154.0000', 'Company 1'),
(71554, '2020-01-01', 17, '16:33:00', '250.0000', '307.0000', 'Company 1'),
(71555, '2020-01-01', 17, '16:34:00', '250.0000', '211.0000', 'Company 1'),
(71556, '2020-01-01', 17, '16:35:00', '250.0000', '359.0000', 'Company 1'),
(71557, '2020-01-01', 17, '16:36:00', '250.0000', '292.0000', 'Company 1'),
(71558, '2020-01-01', 17, '16:37:00', '250.0000', '235.0000', 'Company 1'),
(71559, '2020-01-01', 17, '16:38:00', '250.0000', '353.0000', 'Company 1'),
(71560, '2020-01-01', 17, '16:39:00', '250.0000', '314.0000', 'Company 1'),
(71561, '2020-01-01', 17, '16:40:00', '250.0000', '333.0000', 'Company 1'),
(71562, '2020-01-01', 17, '16:41:00', '250.0000', '304.0000', 'Company 1'),
(71563, '2020-01-01', 17, '16:42:00', '250.0000', '344.0000', 'Company 1'),
(71564, '2020-01-01', 17, '16:43:00', '250.0000', '289.0000', 'Company 1'),
(71565, '2020-01-01', 17, '16:44:00', '250.0000', '192.0000', 'Company 1'),
(71566, '2020-01-01', 17, '16:45:00', '250.0000', '236.0000', 'Company 1'),
(71567, '2020-01-01', 17, '16:46:00', '250.0000', '158.0000', 'Company 1'),
(71568, '2020-01-01', 17, '16:47:00', '250.0000', '323.0000', 'Company 1'),
(71569, '2020-01-01', 17, '16:48:00', '250.0000', '294.0000', 'Company 1'),
(71570, '2020-01-01', 17, '16:49:00', '250.0000', '340.0000', 'Company 1'),
(71571, '2020-01-01', 17, '16:50:00', '250.0000', '349.0000', 'Company 1'),
(71572, '2020-01-01', 17, '16:51:00', '250.0000', '158.0000', 'Company 1'),
(71573, '2020-01-01', 17, '16:52:00', '250.0000', '249.0000', 'Company 1'),
(71574, '2020-01-01', 17, '16:53:00', '250.0000', '228.0000', 'Company 1'),
(71575, '2020-01-01', 17, '16:54:00', '250.0000', '370.0000', 'Company 1'),
(71576, '2020-01-01', 17, '16:55:00', '250.0000', '217.0000', 'Company 1'),
(71577, '2020-01-01', 17, '16:56:00', '250.0000', '274.0000', 'Company 1'),
(71578, '2020-01-01', 17, '16:57:00', '250.0000', '306.0000', 'Company 1'),
(71579, '2020-01-01', 17, '16:58:00', '250.0000', '372.0000', 'Company 1'),
(71580, '2020-01-01', 17, '16:59:00', '250.0000', '200.0000', 'Company 1'),
(71581, '2020-01-01', 18, '17:00:00', '250.0000', '245.0000', 'Company 1'),
(71582, '2020-01-01', 18, '17:01:00', '250.0000', '290.0000', 'Company 1'),
(71583, '2020-01-01', 18, '17:02:00', '250.0000', '245.0000', 'Company 1'),
(71584, '2020-01-01', 18, '17:03:00', '250.0000', '205.0000', 'Company 1'),
(71585, '2020-01-01', 18, '17:04:00', '250.0000', '323.0000', 'Company 1'),
(71586, '2020-01-01', 18, '17:05:00', '250.0000', '260.0000', 'Company 1'),
(71587, '2020-01-01', 18, '17:06:00', '250.0000', '270.0000', 'Company 1'),
(71588, '2020-01-01', 18, '17:07:00', '250.0000', '341.0000', 'Company 1'),
(71589, '2020-01-01', 18, '17:08:00', '250.0000', '233.0000', 'Company 1'),
(71590, '2020-01-01', 18, '17:09:00', '250.0000', '218.0000', 'Company 1'),
(71591, '2020-01-01', 18, '17:10:00', '250.0000', '204.0000', 'Company 1'),
(71592, '2020-01-01', 18, '17:11:00', '250.0000', '168.0000', 'Company 1'),
(71593, '2020-01-01', 18, '17:12:00', '250.0000', '167.0000', 'Company 1'),
(71594, '2020-01-01', 18, '17:13:00', '250.0000', '238.0000', 'Company 1'),
(71595, '2020-01-01', 18, '17:14:00', '250.0000', '292.0000', 'Company 1'),
(71596, '2020-01-01', 18, '17:15:00', '250.0000', '263.0000', 'Company 1'),
(71597, '2020-01-01', 18, '17:16:00', '250.0000', '187.0000', 'Company 1'),
(71598, '2020-01-01', 18, '17:17:00', '250.0000', '389.0000', 'Company 1'),
(71599, '2020-01-01', 18, '17:18:00', '250.0000', '343.0000', 'Company 1'),
(71600, '2020-01-01', 18, '17:19:00', '250.0000', '378.0000', 'Company 1'),
(71601, '2020-01-01', 18, '17:20:00', '250.0000', '333.0000', 'Company 1'),
(71602, '2020-01-01', 18, '17:21:00', '250.0000', '213.0000', 'Company 1'),
(71603, '2020-01-01', 18, '17:22:00', '250.0000', '185.0000', 'Company 1'),
(71604, '2020-01-01', 18, '17:23:00', '250.0000', '272.0000', 'Company 1'),
(71605, '2020-01-01', 18, '17:24:00', '250.0000', '162.0000', 'Company 1'),
(71606, '2020-01-01', 18, '17:25:00', '250.0000', '260.0000', 'Company 1'),
(71607, '2020-01-01', 18, '17:26:00', '250.0000', '359.0000', 'Company 1'),
(71608, '2020-01-01', 18, '17:27:00', '250.0000', '310.0000', 'Company 1'),
(71609, '2020-01-01', 18, '17:28:00', '250.0000', '389.0000', 'Company 1'),
(71610, '2020-01-01', 18, '17:29:00', '250.0000', '214.0000', 'Company 1'),
(71611, '2020-01-01', 18, '17:30:00', '250.0000', '160.0000', 'Company 1'),
(71612, '2020-01-01', 18, '17:31:00', '250.0000', '232.0000', 'Company 1'),
(71613, '2020-01-01', 18, '17:32:00', '250.0000', '144.0000', 'Company 1'),
(71614, '2020-01-01', 18, '17:33:00', '250.0000', '143.0000', 'Company 1'),
(71615, '2020-01-01', 18, '17:34:00', '250.0000', '319.0000', 'Company 1'),
(71616, '2020-01-01', 18, '17:35:00', '250.0000', '259.0000', 'Company 1'),
(71617, '2020-01-01', 18, '17:36:00', '250.0000', '265.0000', 'Company 1'),
(71618, '2020-01-01', 18, '17:37:00', '250.0000', '233.0000', 'Company 1'),
(71619, '2020-01-01', 18, '17:38:00', '250.0000', '151.0000', 'Company 1'),
(71620, '2020-01-01', 18, '17:39:00', '250.0000', '152.0000', 'Company 1'),
(71621, '2020-01-01', 18, '17:40:00', '250.0000', '340.0000', 'Company 1'),
(71622, '2020-01-01', 18, '17:41:00', '250.0000', '220.0000', 'Company 1'),
(71623, '2020-01-01', 18, '17:42:00', '250.0000', '171.0000', 'Company 1'),
(71624, '2020-01-01', 18, '17:43:00', '250.0000', '196.0000', 'Company 1'),
(71625, '2020-01-01', 18, '17:44:00', '250.0000', '194.0000', 'Company 1'),
(71626, '2020-01-01', 18, '17:45:00', '250.0000', '261.0000', 'Company 1'),
(71627, '2020-01-01', 18, '17:46:00', '250.0000', '158.0000', 'Company 1'),
(71628, '2020-01-01', 18, '17:47:00', '250.0000', '250.0000', 'Company 1'),
(71629, '2020-01-01', 18, '17:48:00', '250.0000', '382.0000', 'Company 1'),
(71630, '2020-01-01', 18, '17:49:00', '250.0000', '254.0000', 'Company 1'),
(71631, '2020-01-01', 18, '17:50:00', '250.0000', '169.0000', 'Company 1'),
(71632, '2020-01-01', 18, '17:51:00', '250.0000', '324.0000', 'Company 1'),
(71633, '2020-01-01', 18, '17:52:00', '250.0000', '241.0000', 'Company 1'),
(71634, '2020-01-01', 18, '17:53:00', '250.0000', '161.0000', 'Company 1'),
(71635, '2020-01-01', 18, '17:54:00', '250.0000', '310.0000', 'Company 1'),
(71636, '2020-01-01', 18, '17:55:00', '250.0000', '324.0000', 'Company 1'),
(71637, '2020-01-01', 18, '17:56:00', '250.0000', '206.0000', 'Company 1'),
(71638, '2020-01-01', 18, '17:57:00', '250.0000', '217.0000', 'Company 1'),
(71639, '2020-01-01', 18, '17:58:00', '250.0000', '302.0000', 'Company 1'),
(71640, '2020-01-01', 18, '17:59:00', '250.0000', '210.0000', 'Company 1'),
(71641, '2020-01-01', 19, '18:00:00', '250.0000', '166.0000', 'Company 1'),
(71642, '2020-01-01', 19, '18:01:00', '250.0000', '284.0000', 'Company 1'),
(71643, '2020-01-01', 19, '18:02:00', '250.0000', '339.0000', 'Company 1'),
(71644, '2020-01-01', 19, '18:03:00', '250.0000', '258.0000', 'Company 1'),
(71645, '2020-01-01', 19, '18:04:00', '250.0000', '260.0000', 'Company 1'),
(71646, '2020-01-01', 19, '18:05:00', '250.0000', '329.0000', 'Company 1'),
(71647, '2020-01-01', 19, '18:06:00', '250.0000', '337.0000', 'Company 1'),
(71648, '2020-01-01', 19, '18:07:00', '250.0000', '334.0000', 'Company 1'),
(71649, '2020-01-01', 19, '18:08:00', '250.0000', '199.0000', 'Company 1'),
(71650, '2020-01-01', 19, '18:09:00', '250.0000', '229.0000', 'Company 1'),
(71651, '2020-01-01', 19, '18:10:00', '250.0000', '183.0000', 'Company 1'),
(71652, '2020-01-01', 19, '18:11:00', '250.0000', '328.0000', 'Company 1'),
(71653, '2020-01-01', 19, '18:12:00', '250.0000', '212.0000', 'Company 1'),
(71654, '2020-01-01', 19, '18:13:00', '250.0000', '167.0000', 'Company 1'),
(71655, '2020-01-01', 19, '18:14:00', '250.0000', '308.0000', 'Company 1'),
(71656, '2020-01-01', 19, '18:15:00', '250.0000', '272.0000', 'Company 1'),
(71657, '2020-01-01', 19, '18:16:00', '250.0000', '197.0000', 'Company 1'),
(71658, '2020-01-01', 19, '18:17:00', '250.0000', '269.0000', 'Company 1'),
(71659, '2020-01-01', 19, '18:18:00', '250.0000', '358.0000', 'Company 1'),
(71660, '2020-01-01', 19, '18:19:00', '250.0000', '171.0000', 'Company 1'),
(71661, '2020-01-01', 19, '18:20:00', '250.0000', '346.0000', 'Company 1'),
(71662, '2020-01-01', 19, '18:21:00', '250.0000', '280.0000', 'Company 1'),
(71663, '2020-01-01', 19, '18:22:00', '250.0000', '260.0000', 'Company 1'),
(71664, '2020-01-01', 19, '18:23:00', '250.0000', '351.0000', 'Company 1'),
(71665, '2020-01-01', 19, '18:24:00', '250.0000', '285.0000', 'Company 1'),
(71666, '2020-01-01', 19, '18:25:00', '250.0000', '278.0000', 'Company 1'),
(71667, '2020-01-01', 19, '18:26:00', '250.0000', '380.0000', 'Company 1'),
(71668, '2020-01-01', 19, '18:27:00', '250.0000', '353.0000', 'Company 1'),
(71669, '2020-01-01', 19, '18:28:00', '250.0000', '338.0000', 'Company 1'),
(71670, '2020-01-01', 19, '18:29:00', '250.0000', '169.0000', 'Company 1'),
(71671, '2020-01-01', 19, '18:30:00', '250.0000', '262.0000', 'Company 1'),
(71672, '2020-01-01', 19, '18:31:00', '250.0000', '245.0000', 'Company 1'),
(71673, '2020-01-01', 19, '18:32:00', '250.0000', '351.0000', 'Company 1'),
(71674, '2020-01-01', 19, '18:33:00', '250.0000', '305.0000', 'Company 1'),
(71675, '2020-01-01', 19, '18:34:00', '250.0000', '223.0000', 'Company 1'),
(71676, '2020-01-01', 19, '18:35:00', '250.0000', '355.0000', 'Company 1'),
(71677, '2020-01-01', 19, '18:36:00', '250.0000', '268.0000', 'Company 1'),
(71678, '2020-01-01', 19, '18:37:00', '250.0000', '174.0000', 'Company 1'),
(71679, '2020-01-01', 19, '18:38:00', '250.0000', '374.0000', 'Company 1'),
(71680, '2020-01-01', 19, '18:39:00', '350.0000', '194.0000', 'Company 1'),
(71681, '2020-01-01', 19, '18:40:00', '350.0000', '149.0000', 'Company 1'),
(71682, '2020-01-01', 19, '18:41:00', '350.0000', '190.0000', 'Company 1'),
(71683, '2020-01-01', 19, '18:42:00', '350.0000', '389.0000', 'Company 1'),
(71684, '2020-01-01', 19, '18:43:00', '350.0000', '346.0000', 'Company 1'),
(71685, '2020-01-01', 19, '18:44:00', '350.0000', '381.0000', 'Company 1'),
(71686, '2020-01-01', 19, '18:45:00', '350.0000', '155.0000', 'Company 1'),
(71687, '2020-01-01', 19, '18:46:00', '350.0000', '299.0000', 'Company 1'),
(71688, '2020-01-01', 19, '18:47:00', '350.0000', '301.0000', 'Company 1'),
(71689, '2020-01-01', 19, '18:48:00', '350.0000', '314.0000', 'Company 1'),
(71690, '2020-01-01', 19, '18:49:00', '350.0000', '269.0000', 'Company 1'),
(71691, '2020-01-01', 19, '18:50:00', '350.0000', '301.0000', 'Company 1'),
(71692, '2020-01-01', 19, '18:51:00', '350.0000', '307.0000', 'Company 1'),
(71693, '2020-01-01', 19, '18:52:00', '350.0000', '235.0000', 'Company 1'),
(71694, '2020-01-01', 19, '18:53:00', '350.0000', '315.0000', 'Company 1'),
(71695, '2020-01-01', 19, '18:54:00', '350.0000', '146.0000', 'Company 1'),
(71696, '2020-01-01', 19, '18:55:00', '350.0000', '323.0000', 'Company 1'),
(71697, '2020-01-01', 19, '18:56:00', '350.0000', '285.0000', 'Company 1'),
(71698, '2020-01-01', 19, '18:57:00', '350.0000', '376.0000', 'Company 1'),
(71699, '2020-01-01', 19, '18:58:00', '350.0000', '337.0000', 'Company 1'),
(71700, '2020-01-01', 19, '18:59:00', '350.0000', '346.0000', 'Company 1'),
(71701, '2020-01-01', 20, '19:00:00', '350.0000', '352.0000', 'Company 1'),
(71702, '2020-01-01', 20, '19:01:00', '350.0000', '375.0000', 'Company 1'),
(71703, '2020-01-01', 20, '19:02:00', '350.0000', '358.0000', 'Company 1'),
(71704, '2020-01-01', 20, '19:03:00', '350.0000', '344.0000', 'Company 1'),
(71705, '2020-01-01', 20, '19:04:00', '350.0000', '379.0000', 'Company 1'),
(71706, '2020-01-01', 20, '19:05:00', '350.0000', '216.0000', 'Company 1'),
(71707, '2020-01-01', 20, '19:06:00', '350.0000', '319.0000', 'Company 1'),
(71708, '2020-01-01', 20, '19:07:00', '350.0000', '282.0000', 'Company 1'),
(71709, '2020-01-01', 20, '19:08:00', '350.0000', '151.0000', 'Company 1'),
(71710, '2020-01-01', 20, '19:09:00', '350.0000', '276.0000', 'Company 1'),
(71711, '2020-01-01', 20, '19:10:00', '350.0000', '152.0000', 'Company 1'),
(71712, '2020-01-01', 20, '19:11:00', '350.0000', '285.0000', 'Company 1'),
(71713, '2020-01-01', 20, '19:12:00', '350.0000', '250.0000', 'Company 1'),
(71714, '2020-01-01', 20, '19:13:00', '350.0000', '346.0000', 'Company 1'),
(71715, '2020-01-01', 20, '19:14:00', '350.0000', '276.0000', 'Company 1'),
(71716, '2020-01-01', 20, '19:15:00', '350.0000', '190.0000', 'Company 1'),
(71717, '2020-01-01', 20, '19:16:00', '350.0000', '295.0000', 'Company 1'),
(71718, '2020-01-01', 20, '19:17:00', '350.0000', '309.0000', 'Company 1'),
(71719, '2020-01-01', 20, '19:18:00', '350.0000', '293.0000', 'Company 1'),
(71720, '2020-01-01', 20, '19:19:00', '350.0000', '256.0000', 'Company 1'),
(71721, '2020-01-01', 20, '19:20:00', '350.0000', '364.0000', 'Company 1'),
(71722, '2020-01-01', 20, '19:21:00', '350.0000', '182.0000', 'Company 1'),
(71723, '2020-01-01', 20, '19:22:00', '350.0000', '266.0000', 'Company 1'),
(71724, '2020-01-01', 20, '19:23:00', '350.0000', '272.0000', 'Company 1'),
(71725, '2020-01-01', 20, '19:24:00', '350.0000', '256.0000', 'Company 1'),
(71726, '2020-01-01', 20, '19:25:00', '350.0000', '148.0000', 'Company 1'),
(71727, '2020-01-01', 20, '19:26:00', '350.0000', '328.0000', 'Company 1'),
(71728, '2020-01-01', 20, '19:27:00', '350.0000', '304.0000', 'Company 1'),
(71729, '2020-01-01', 20, '19:28:00', '350.0000', '288.0000', 'Company 1'),
(71730, '2020-01-01', 20, '19:29:00', '350.0000', '234.0000', 'Company 1'),
(71731, '2020-01-01', 20, '19:30:00', '350.0000', '232.0000', 'Company 1'),
(71732, '2020-01-01', 20, '19:31:00', '350.0000', '333.0000', 'Company 1'),
(71733, '2020-01-01', 20, '19:32:00', '350.0000', '323.0000', 'Company 1'),
(71734, '2020-01-01', 20, '19:33:00', '350.0000', '362.0000', 'Company 1'),
(71735, '2020-01-01', 20, '19:34:00', '350.0000', '225.0000', 'Company 1'),
(71736, '2020-01-01', 20, '19:35:00', '350.0000', '352.0000', 'Company 1'),
(71737, '2020-01-01', 20, '19:36:00', '350.0000', '294.0000', 'Company 1'),
(71738, '2020-01-01', 20, '19:37:00', '350.0000', '334.0000', 'Company 1'),
(71739, '2020-01-01', 20, '19:38:00', '350.0000', '310.0000', 'Company 1'),
(71740, '2020-01-01', 20, '19:39:00', '350.0000', '282.0000', 'Company 1'),
(71741, '2020-01-01', 20, '19:40:00', '350.0000', '177.0000', 'Company 1'),
(71742, '2020-01-01', 20, '19:41:00', '350.0000', '212.0000', 'Company 1'),
(71743, '2020-01-01', 20, '19:42:00', '350.0000', '305.0000', 'Company 1'),
(71744, '2020-01-01', 20, '19:43:00', '350.0000', '197.0000', 'Company 1'),
(71745, '2020-01-01', 20, '19:44:00', '350.0000', '252.0000', 'Company 1'),
(71746, '2020-01-01', 20, '19:45:00', '350.0000', '300.0000', 'Company 1'),
(71747, '2020-01-01', 20, '19:46:00', '350.0000', '269.0000', 'Company 1'),
(71748, '2020-01-01', 20, '19:47:00', '350.0000', '234.0000', 'Company 1'),
(71749, '2020-01-01', 20, '19:48:00', '350.0000', '256.0000', 'Company 1'),
(71750, '2020-01-01', 20, '19:49:00', '160.0000', '354.0000', 'Company 1'),
(71751, '2020-01-01', 20, '19:50:00', '160.0000', '374.0000', 'Company 1'),
(71752, '2020-01-01', 20, '19:51:00', '160.0000', '277.0000', 'Company 1'),
(71753, '2020-01-01', 20, '19:52:00', '160.0000', '232.0000', 'Company 1'),
(71754, '2020-01-01', 20, '19:53:00', '160.0000', '200.0000', 'Company 1'),
(71755, '2020-01-01', 20, '19:54:00', '160.0000', '195.0000', 'Company 1'),
(71756, '2020-01-01', 20, '19:55:00', '160.0000', '379.0000', 'Company 1'),
(71757, '2020-01-01', 20, '19:56:00', '160.0000', '179.0000', 'Company 1'),
(71758, '2020-01-01', 20, '19:57:00', '160.0000', '381.0000', 'Company 1'),
(71759, '2020-01-01', 20, '19:58:00', '160.0000', '341.0000', 'Company 1'),
(71760, '2020-01-01', 20, '19:59:00', '160.0000', '275.0000', 'Company 1'),
(71761, '2020-01-01', 21, '20:00:00', '160.0000', '206.0000', 'Company 1'),
(71762, '2020-01-01', 21, '20:01:00', '160.0000', '274.0000', 'Company 1'),
(71763, '2020-01-01', 21, '20:02:00', '160.0000', '364.0000', 'Company 1'),
(71764, '2020-01-01', 21, '20:03:00', '160.0000', '148.0000', 'Company 1'),
(71765, '2020-01-01', 21, '20:04:00', '160.0000', '191.0000', 'Company 1'),
(71766, '2020-01-01', 21, '20:05:00', '160.0000', '221.0000', 'Company 1'),
(71767, '2020-01-01', 21, '20:06:00', '160.0000', '282.0000', 'Company 1'),
(71768, '2020-01-01', 21, '20:07:00', '160.0000', '327.0000', 'Company 1'),
(71769, '2020-01-01', 21, '20:08:00', '160.0000', '235.0000', 'Company 1'),
(71770, '2020-01-01', 21, '20:09:00', '160.0000', '163.0000', 'Company 1'),
(71771, '2020-01-01', 21, '20:10:00', '160.0000', '215.0000', 'Company 1'),
(71772, '2020-01-01', 21, '20:11:00', '160.0000', '295.0000', 'Company 1'),
(71773, '2020-01-01', 21, '20:12:00', '160.0000', '149.0000', 'Company 1'),
(71774, '2020-01-01', 21, '20:13:00', '160.0000', '257.0000', 'Company 1'),
(71775, '2020-01-01', 21, '20:14:00', '160.0000', '371.0000', 'Company 1'),
(71776, '2020-01-01', 21, '20:15:00', '160.0000', '306.0000', 'Company 1'),
(71777, '2020-01-01', 21, '20:16:00', '160.0000', '368.0000', 'Company 1'),
(71778, '2020-01-01', 21, '20:17:00', '160.0000', '204.0000', 'Company 1'),
(71779, '2020-01-01', 21, '20:18:00', '160.0000', '329.0000', 'Company 1'),
(71780, '2020-01-01', 21, '20:19:00', '160.0000', '351.0000', 'Company 1'),
(71781, '2020-01-01', 21, '20:20:00', '160.0000', '346.0000', 'Company 1'),
(71782, '2020-01-01', 21, '20:21:00', '160.0000', '211.0000', 'Company 1'),
(71783, '2020-01-01', 21, '20:22:00', '160.0000', '152.0000', 'Company 1'),
(71784, '2020-01-01', 21, '20:23:00', '160.0000', '312.0000', 'Company 1'),
(71785, '2020-01-01', 21, '20:24:00', '160.0000', '201.0000', 'Company 1'),
(71786, '2020-01-01', 21, '20:25:00', '160.0000', '203.0000', 'Company 1'),
(71787, '2020-01-01', 21, '20:26:00', '160.0000', '343.0000', 'Company 1'),
(71788, '2020-01-01', 21, '20:27:00', '160.0000', '330.0000', 'Company 1'),
(71789, '2020-01-01', 21, '20:28:00', '160.0000', '168.0000', 'Company 1'),
(71790, '2020-01-01', 21, '20:29:00', '160.0000', '340.0000', 'Company 1'),
(71791, '2020-01-01', 21, '20:30:00', '160.0000', '320.0000', 'Company 1'),
(71792, '2020-01-01', 21, '20:31:00', '160.0000', '181.0000', 'Company 1'),
(71793, '2020-01-01', 21, '20:32:00', '160.0000', '223.0000', 'Company 1'),
(71794, '2020-01-01', 21, '20:33:00', '160.0000', '381.0000', 'Company 1'),
(71795, '2020-01-01', 21, '20:34:00', '160.0000', '145.0000', 'Company 1'),
(71796, '2020-01-01', 21, '20:35:00', '160.0000', '302.0000', 'Company 1'),
(71797, '2020-01-01', 21, '20:36:00', '160.0000', '219.0000', 'Company 1'),
(71798, '2020-01-01', 21, '20:37:00', '160.0000', '225.0000', 'Company 1'),
(71799, '2020-01-01', 21, '20:38:00', '160.0000', '298.0000', 'Company 1'),
(71800, '2020-01-01', 21, '20:39:00', '160.0000', '323.0000', 'Company 1'),
(71801, '2020-01-01', 21, '20:40:00', '160.0000', '209.0000', 'Company 1'),
(71802, '2020-01-01', 21, '20:41:00', '160.0000', '162.0000', 'Company 1'),
(71803, '2020-01-01', 21, '20:42:00', '160.0000', '215.0000', 'Company 1'),
(71804, '2020-01-01', 21, '20:43:00', '160.0000', '367.0000', 'Company 1'),
(71805, '2020-01-01', 21, '20:44:00', '160.0000', '359.0000', 'Company 1'),
(71806, '2020-01-01', 21, '20:45:00', '160.0000', '277.0000', 'Company 1'),
(71807, '2020-01-01', 21, '20:46:00', '160.0000', '285.0000', 'Company 1'),
(71808, '2020-01-01', 21, '20:47:00', '160.0000', '241.0000', 'Company 1'),
(71809, '2020-01-01', 21, '20:48:00', '160.0000', '267.0000', 'Company 1'),
(71810, '2020-01-01', 21, '20:49:00', '160.0000', '247.0000', 'Company 1'),
(71811, '2020-01-01', 21, '20:50:00', '160.0000', '201.0000', 'Company 1'),
(71812, '2020-01-01', 21, '20:51:00', '160.0000', '256.0000', 'Company 1'),
(71813, '2020-01-01', 21, '20:52:00', '160.0000', '214.0000', 'Company 1'),
(71814, '2020-01-01', 21, '20:53:00', '160.0000', '250.0000', 'Company 1'),
(71815, '2020-01-01', 21, '20:54:00', '160.0000', '312.0000', 'Company 1'),
(71816, '2020-01-01', 21, '20:55:00', '160.0000', '364.0000', 'Company 1'),
(71817, '2020-01-01', 21, '20:56:00', '160.0000', '201.0000', 'Company 1'),
(71818, '2020-01-01', 21, '20:57:00', '160.0000', '363.0000', 'Company 1'),
(71819, '2020-01-01', 21, '20:58:00', '160.0000', '304.0000', 'Company 1'),
(71820, '2020-01-01', 21, '20:59:00', '160.0000', '311.0000', 'Company 1'),
(71821, '2020-01-01', 22, '21:00:00', '160.0000', '224.0000', 'Company 1'),
(71822, '2020-01-01', 22, '21:01:00', '160.0000', '238.0000', 'Company 1'),
(71823, '2020-01-01', 22, '21:02:00', '160.0000', '221.0000', 'Company 1'),
(71824, '2020-01-01', 22, '21:03:00', '160.0000', '202.0000', 'Company 1'),
(71825, '2020-01-01', 22, '21:04:00', '160.0000', '243.0000', 'Company 1'),
(71826, '2020-01-01', 22, '21:05:00', '160.0000', '250.0000', 'Company 1'),
(71827, '2020-01-01', 22, '21:06:00', '160.0000', '325.0000', 'Company 1'),
(71828, '2020-01-01', 22, '21:07:00', '160.0000', '313.0000', 'Company 1'),
(71829, '2020-01-01', 22, '21:08:00', '160.0000', '324.0000', 'Company 1'),
(71830, '2020-01-01', 22, '21:09:00', '160.0000', '376.0000', 'Company 1');
INSERT INTO `power_generation` (`xsl`, `xdate`, `xhourending`, `xtime`, `xplant1`, `xplant2`, `xcompany`) VALUES
(71831, '2020-01-01', 22, '21:10:00', '160.0000', '389.0000', 'Company 1'),
(71832, '2020-01-01', 22, '21:11:00', '160.0000', '171.0000', 'Company 1'),
(71833, '2020-01-01', 22, '21:12:00', '160.0000', '178.0000', 'Company 1'),
(71834, '2020-01-01', 22, '21:13:00', '160.0000', '266.0000', 'Company 1'),
(71835, '2020-01-01', 22, '21:14:00', '160.0000', '152.0000', 'Company 1'),
(71836, '2020-01-01', 22, '21:15:00', '160.0000', '157.0000', 'Company 1'),
(71837, '2020-01-01', 22, '21:16:00', '160.0000', '246.0000', 'Company 1'),
(71838, '2020-01-01', 22, '21:17:00', '160.0000', '154.0000', 'Company 1'),
(71839, '2020-01-01', 22, '21:18:00', '160.0000', '351.0000', 'Company 1'),
(71840, '2020-01-01', 22, '21:19:00', '160.0000', '283.0000', 'Company 1'),
(71841, '2020-01-01', 22, '21:20:00', '160.0000', '140.0000', 'Company 1'),
(71842, '2020-01-01', 22, '21:21:00', '160.0000', '256.0000', 'Company 1'),
(71843, '2020-01-01', 22, '21:22:00', '160.0000', '274.0000', 'Company 1'),
(71844, '2020-01-01', 22, '21:23:00', '160.0000', '148.0000', 'Company 1'),
(71845, '2020-01-01', 22, '21:24:00', '160.0000', '380.0000', 'Company 1'),
(71846, '2020-01-01', 22, '21:25:00', '160.0000', '257.0000', 'Company 1'),
(71847, '2020-01-01', 22, '21:26:00', '160.0000', '316.0000', 'Company 1'),
(71848, '2020-01-01', 22, '21:27:00', '160.0000', '152.0000', 'Company 1'),
(71849, '2020-01-01', 22, '21:28:00', '160.0000', '250.0000', 'Company 1'),
(71850, '2020-01-01', 22, '21:29:00', '160.0000', '326.0000', 'Company 1'),
(71851, '2020-01-01', 22, '21:30:00', '160.0000', '350.0000', 'Company 1'),
(71852, '2020-01-01', 22, '21:31:00', '160.0000', '176.0000', 'Company 1'),
(71853, '2020-01-01', 22, '21:32:00', '160.0000', '321.0000', 'Company 1'),
(71854, '2020-01-01', 22, '21:33:00', '160.0000', '150.0000', 'Company 1'),
(71855, '2020-01-01', 22, '21:34:00', '160.0000', '251.0000', 'Company 1'),
(71856, '2020-01-01', 22, '21:35:00', '160.0000', '308.0000', 'Company 1'),
(71857, '2020-01-01', 22, '21:36:00', '160.0000', '293.0000', 'Company 1'),
(71858, '2020-01-01', 22, '21:37:00', '160.0000', '143.0000', 'Company 1'),
(71859, '2020-01-01', 22, '21:38:00', '160.0000', '331.0000', 'Company 1'),
(71860, '2020-01-01', 22, '21:39:00', '160.0000', '352.0000', 'Company 1'),
(71861, '2020-01-01', 22, '21:40:00', '160.0000', '192.0000', 'Company 1'),
(71862, '2020-01-01', 22, '21:41:00', '160.0000', '233.0000', 'Company 1'),
(71863, '2020-01-01', 22, '21:42:00', '160.0000', '247.0000', 'Company 1'),
(71864, '2020-01-01', 22, '21:43:00', '160.0000', '280.0000', 'Company 1'),
(71865, '2020-01-01', 22, '21:44:00', '160.0000', '360.0000', 'Company 1'),
(71866, '2020-01-01', 22, '21:45:00', '160.0000', '188.0000', 'Company 1'),
(71867, '2020-01-01', 22, '21:46:00', '160.0000', '275.0000', 'Company 1'),
(71868, '2020-01-01', 22, '21:47:00', '160.0000', '287.0000', 'Company 1'),
(71869, '2020-01-01', 22, '21:48:00', '160.0000', '308.0000', 'Company 1'),
(71870, '2020-01-01', 22, '21:49:00', '160.0000', '152.0000', 'Company 1'),
(71871, '2020-01-01', 22, '21:50:00', '160.0000', '224.0000', 'Company 1'),
(71872, '2020-01-01', 22, '21:51:00', '160.0000', '228.0000', 'Company 1'),
(71873, '2020-01-01', 22, '21:52:00', '160.0000', '278.0000', 'Company 1'),
(71874, '2020-01-01', 22, '21:53:00', '160.0000', '143.0000', 'Company 1'),
(71875, '2020-01-01', 22, '21:54:00', '160.0000', '308.0000', 'Company 1'),
(71876, '2020-01-01', 22, '21:55:00', '160.0000', '247.0000', 'Company 1'),
(71877, '2020-01-01', 22, '21:56:00', '160.0000', '243.0000', 'Company 1'),
(71878, '2020-01-01', 22, '21:57:00', '160.0000', '153.0000', 'Company 1'),
(71879, '2020-01-01', 22, '21:58:00', '145.0000', '322.0000', 'Company 1'),
(71880, '2020-01-01', 22, '21:59:00', '145.0000', '277.0000', 'Company 1'),
(71881, '2020-01-01', 23, '22:00:00', '145.0000', '378.0000', 'Company 1'),
(71882, '2020-01-01', 23, '22:01:00', '145.0000', '331.0000', 'Company 1'),
(71883, '2020-01-01', 23, '22:02:00', '145.0000', '382.0000', 'Company 1'),
(71884, '2020-01-01', 23, '22:03:00', '145.0000', '220.0000', 'Company 1'),
(71885, '2020-01-01', 23, '22:04:00', '145.0000', '187.0000', 'Company 1'),
(71886, '2020-01-01', 23, '22:05:00', '145.0000', '201.0000', 'Company 1'),
(71887, '2020-01-01', 23, '22:06:00', '145.0000', '336.0000', 'Company 1'),
(71888, '2020-01-01', 23, '22:07:00', '145.0000', '245.0000', 'Company 1'),
(71889, '2020-01-01', 23, '22:08:00', '145.0000', '347.0000', 'Company 1'),
(71890, '2020-01-01', 23, '22:09:00', '145.0000', '201.0000', 'Company 1'),
(71891, '2020-01-01', 23, '22:10:00', '145.0000', '360.0000', 'Company 1'),
(71892, '2020-01-01', 23, '22:11:00', '145.0000', '176.0000', 'Company 1'),
(71893, '2020-01-01', 23, '22:12:00', '145.0000', '253.0000', 'Company 1'),
(71894, '2020-01-01', 23, '22:13:00', '145.0000', '166.0000', 'Company 1'),
(71895, '2020-01-01', 23, '22:14:00', '145.0000', '325.0000', 'Company 1'),
(71896, '2020-01-01', 23, '22:15:00', '145.0000', '342.0000', 'Company 1'),
(71897, '2020-01-01', 23, '22:16:00', '145.0000', '315.0000', 'Company 1'),
(71898, '2020-01-01', 23, '22:17:00', '145.0000', '277.0000', 'Company 1'),
(71899, '2020-01-01', 23, '22:18:00', '145.0000', '355.0000', 'Company 1'),
(71900, '2020-01-01', 23, '22:19:00', '145.0000', '287.0000', 'Company 1'),
(71901, '2020-01-01', 23, '22:20:00', '145.0000', '241.0000', 'Company 1'),
(71902, '2020-01-01', 23, '22:21:00', '145.0000', '321.0000', 'Company 1'),
(71903, '2020-01-01', 23, '22:22:00', '145.0000', '151.0000', 'Company 1'),
(71904, '2020-01-01', 23, '22:23:00', '145.0000', '140.0000', 'Company 1'),
(71905, '2020-01-01', 23, '22:24:00', '145.0000', '168.0000', 'Company 1'),
(71906, '2020-01-01', 23, '22:25:00', '145.0000', '369.0000', 'Company 1'),
(71907, '2020-01-01', 23, '22:26:00', '145.0000', '362.0000', 'Company 1'),
(71908, '2020-01-01', 23, '22:27:00', '145.0000', '322.0000', 'Company 1'),
(71909, '2020-01-01', 23, '22:28:00', '145.0000', '348.0000', 'Company 1'),
(71910, '2020-01-01', 23, '22:29:00', '145.0000', '246.0000', 'Company 1'),
(71911, '2020-01-01', 23, '22:30:00', '145.0000', '361.0000', 'Company 1'),
(71912, '2020-01-01', 23, '22:31:00', '145.0000', '154.0000', 'Company 1'),
(71913, '2020-01-01', 23, '22:32:00', '145.0000', '264.0000', 'Company 1'),
(71914, '2020-01-01', 23, '22:33:00', '145.0000', '178.0000', 'Company 1'),
(71915, '2020-01-01', 23, '22:34:00', '145.0000', '384.0000', 'Company 1'),
(71916, '2020-01-01', 23, '22:35:00', '145.0000', '334.0000', 'Company 1'),
(71917, '2020-01-01', 23, '22:36:00', '145.0000', '299.0000', 'Company 1'),
(71918, '2020-01-01', 23, '22:37:00', '145.0000', '155.0000', 'Company 1'),
(71919, '2020-01-01', 23, '22:38:00', '145.0000', '189.0000', 'Company 1'),
(71920, '2020-01-01', 23, '22:39:00', '145.0000', '331.0000', 'Company 1'),
(71921, '2020-01-01', 23, '22:40:00', '145.0000', '218.0000', 'Company 1'),
(71922, '2020-01-01', 23, '22:41:00', '145.0000', '293.0000', 'Company 1'),
(71923, '2020-01-01', 23, '22:42:00', '145.0000', '295.0000', 'Company 1'),
(71924, '2020-01-01', 23, '22:43:00', '145.0000', '168.0000', 'Company 1'),
(71925, '2020-01-01', 23, '22:44:00', '145.0000', '329.0000', 'Company 1'),
(71926, '2020-01-01', 23, '22:45:00', '145.0000', '158.0000', 'Company 1'),
(71927, '2020-01-01', 23, '22:46:00', '145.0000', '262.0000', 'Company 1'),
(71928, '2020-01-01', 23, '22:47:00', '145.0000', '277.0000', 'Company 1'),
(71929, '2020-01-01', 23, '22:48:00', '145.0000', '229.0000', 'Company 1'),
(71930, '2020-01-01', 23, '22:49:00', '145.0000', '217.0000', 'Company 1'),
(71931, '2020-01-01', 23, '22:50:00', '145.0000', '362.0000', 'Company 1'),
(71932, '2020-01-01', 23, '22:51:00', '145.0000', '241.0000', 'Company 1'),
(71933, '2020-01-01', 23, '22:52:00', '145.0000', '234.0000', 'Company 1'),
(71934, '2020-01-01', 23, '22:53:00', '145.0000', '221.0000', 'Company 1'),
(71935, '2020-01-01', 23, '22:54:00', '145.0000', '190.0000', 'Company 1'),
(71936, '2020-01-01', 23, '22:55:00', '145.0000', '198.0000', 'Company 1'),
(71937, '2020-01-01', 23, '22:56:00', '145.0000', '231.0000', 'Company 1'),
(71938, '2020-01-01', 23, '22:57:00', '145.0000', '325.0000', 'Company 1'),
(71939, '2020-01-01', 23, '22:58:00', '145.0000', '386.0000', 'Company 1'),
(71940, '2020-01-01', 23, '22:59:00', '145.0000', '258.0000', 'Company 1'),
(71941, '2020-01-01', 24, '23:00:00', '145.0000', '260.0000', 'Company 1'),
(71942, '2020-01-01', 24, '23:01:00', '145.0000', '204.0000', 'Company 1'),
(71943, '2020-01-01', 24, '23:02:00', '145.0000', '310.0000', 'Company 1'),
(71944, '2020-01-01', 24, '23:03:00', '145.0000', '283.0000', 'Company 1'),
(71945, '2020-01-01', 24, '23:04:00', '145.0000', '356.0000', 'Company 1'),
(71946, '2020-01-01', 24, '23:05:00', '145.0000', '309.0000', 'Company 1'),
(71947, '2020-01-01', 24, '23:06:00', '145.0000', '148.0000', 'Company 1'),
(71948, '2020-01-01', 24, '23:07:00', '145.0000', '317.0000', 'Company 1'),
(71949, '2020-01-01', 24, '23:08:00', '145.0000', '157.0000', 'Company 1'),
(71950, '2020-01-01', 24, '23:09:00', '145.0000', '321.0000', 'Company 1'),
(71951, '2020-01-01', 24, '23:10:00', '145.0000', '174.0000', 'Company 1'),
(71952, '2020-01-01', 24, '23:11:00', '145.0000', '168.0000', 'Company 1'),
(71953, '2020-01-01', 24, '23:12:00', '145.0000', '327.0000', 'Company 1'),
(71954, '2020-01-01', 24, '23:13:00', '145.0000', '341.0000', 'Company 1'),
(71955, '2020-01-01', 24, '23:14:00', '145.0000', '286.0000', 'Company 1'),
(71956, '2020-01-01', 24, '23:15:00', '145.0000', '283.0000', 'Company 1'),
(71957, '2020-01-01', 24, '23:16:00', '145.0000', '225.0000', 'Company 1'),
(71958, '2020-01-01', 24, '23:17:00', '145.0000', '290.0000', 'Company 1'),
(71959, '2020-01-01', 24, '23:18:00', '145.0000', '237.0000', 'Company 1'),
(71960, '2020-01-01', 24, '23:19:00', '145.0000', '377.0000', 'Company 1'),
(71961, '2020-01-01', 24, '23:20:00', '145.0000', '243.0000', 'Company 1'),
(71962, '2020-01-01', 24, '23:21:00', '145.0000', '168.0000', 'Company 1'),
(71963, '2020-01-01', 24, '23:22:00', '145.0000', '169.0000', 'Company 1'),
(71964, '2020-01-01', 24, '23:23:00', '145.0000', '286.0000', 'Company 1'),
(71965, '2020-01-01', 24, '23:24:00', '145.0000', '241.0000', 'Company 1'),
(71966, '2020-01-01', 24, '23:25:00', '145.0000', '341.0000', 'Company 1'),
(71967, '2020-01-01', 24, '23:26:00', '145.0000', '222.0000', 'Company 1'),
(71968, '2020-01-01', 24, '23:27:00', '145.0000', '324.0000', 'Company 1'),
(71969, '2020-01-01', 24, '23:28:00', '145.0000', '219.0000', 'Company 1'),
(71970, '2020-01-01', 24, '23:29:00', '145.0000', '226.0000', 'Company 1'),
(71971, '2020-01-01', 24, '23:30:00', '145.0000', '284.0000', 'Company 1'),
(71972, '2020-01-01', 24, '23:31:00', '145.0000', '386.0000', 'Company 1'),
(71973, '2020-01-01', 24, '23:32:00', '145.0000', '210.0000', 'Company 1'),
(71974, '2020-01-01', 24, '23:33:00', '145.0000', '241.0000', 'Company 1'),
(71975, '2020-01-01', 24, '23:34:00', '145.0000', '208.0000', 'Company 1'),
(71976, '2020-01-01', 24, '23:35:00', '145.0000', '242.0000', 'Company 1'),
(71977, '2020-01-01', 24, '23:36:00', '145.0000', '267.0000', 'Company 1'),
(71978, '2020-01-01', 24, '23:37:00', '145.0000', '244.0000', 'Company 1'),
(71979, '2020-01-01', 24, '23:38:00', '145.0000', '283.0000', 'Company 1'),
(71980, '2020-01-01', 24, '23:39:00', '145.0000', '187.0000', 'Company 1'),
(71981, '2020-01-01', 24, '23:40:00', '145.0000', '256.0000', 'Company 1'),
(71982, '2020-01-01', 24, '23:41:00', '145.0000', '386.0000', 'Company 1'),
(71983, '2020-01-01', 24, '23:42:00', '145.0000', '361.0000', 'Company 1'),
(71984, '2020-01-01', 24, '23:43:00', '145.0000', '253.0000', 'Company 1'),
(71985, '2020-01-01', 24, '23:44:00', '145.0000', '370.0000', 'Company 1'),
(71986, '2020-01-01', 24, '23:45:00', '145.0000', '303.0000', 'Company 1'),
(71987, '2020-01-01', 24, '23:46:00', '145.0000', '363.0000', 'Company 1'),
(71988, '2020-01-01', 24, '23:47:00', '145.0000', '245.0000', 'Company 1'),
(71989, '2020-01-01', 24, '23:48:00', '145.0000', '380.0000', 'Company 1'),
(71990, '2020-01-01', 24, '23:49:00', '145.0000', '324.0000', 'Company 1'),
(71991, '2020-01-01', 24, '23:50:00', '145.0000', '362.0000', 'Company 1'),
(71992, '2020-01-01', 24, '23:51:00', '145.0000', '211.0000', 'Company 1'),
(71993, '2020-01-01', 24, '23:52:00', '145.0000', '207.0000', 'Company 1'),
(71994, '2020-01-01', 24, '23:53:00', '145.0000', '226.0000', 'Company 1'),
(71995, '2020-01-01', 24, '23:54:00', '145.0000', '354.0000', 'Company 1'),
(71996, '2020-01-01', 24, '23:55:00', '145.0000', '145.0000', 'Company 1'),
(71997, '2020-01-01', 24, '23:56:00', '145.0000', '195.0000', 'Company 1'),
(71998, '2020-01-01', 24, '23:57:00', '145.0000', '169.0000', 'Company 1'),
(71999, '2020-01-01', 24, '23:58:00', '145.0000', '211.0000', 'Company 1'),
(72000, '2020-01-01', 24, '23:59:00', '145.0000', '375.0000', 'Company 1');

-- --------------------------------------------------------

--
-- Table structure for table `power_offer`
--

CREATE TABLE `power_offer` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xdate` date NOT NULL,
  `xhourending` tinyint(3) UNSIGNED NOT NULL,
  `xpriceb0` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb0` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb1` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb1` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb2` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb2` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb3` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb3` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb4` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb4` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb5` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb5` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xpriceb6` decimal(5,2) NOT NULL DEFAULT 0.00,
  `xvolumeb6` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `xcompany` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `power_offer`
--

INSERT INTO `power_offer` (`xsl`, `xdate`, `xhourending`, `xpriceb0`, `xvolumeb0`, `xpriceb1`, `xvolumeb1`, `xpriceb2`, `xvolumeb2`, `xpriceb3`, `xvolumeb3`, `xpriceb4`, `xvolumeb4`, `xpriceb5`, `xvolumeb5`, `xpriceb6`, `xvolumeb6`, `xcompany`) VALUES
(1, '2020-01-01', 1, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(2, '2020-01-01', 2, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(3, '2020-01-01', 3, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(4, '2020-01-01', 4, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(5, '2020-01-01', 5, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(6, '2020-01-01', 6, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(7, '2020-01-01', 7, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(8, '2020-01-01', 8, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(9, '2020-01-01', 9, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(10, '2020-01-01', 10, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(11, '2020-01-01', 11, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(12, '2020-01-01', 12, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(13, '2020-01-01', 13, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(14, '2020-01-01', 14, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(15, '2020-01-01', 15, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(16, '2020-01-01', 16, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(17, '2020-01-01', 17, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(18, '2020-01-01', 18, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(19, '2020-01-01', 19, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(20, '2020-01-01', 20, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(21, '2020-01-01', 21, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(22, '2020-01-01', 22, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(23, '2020-01-01', 23, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(24, '2020-01-01', 24, '0.00', 80, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, '0.00', 0, 'Company 1'),
(25, '2020-01-01', 1, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(26, '2020-01-01', 2, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(27, '2020-01-01', 3, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(28, '2020-01-01', 4, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(29, '2020-01-01', 5, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(30, '2020-01-01', 6, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(31, '2020-01-01', 7, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(32, '2020-01-01', 8, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(33, '2020-01-01', 9, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(34, '2020-01-01', 10, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(35, '2020-01-01', 11, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(36, '2020-01-01', 12, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(37, '2020-01-01', 13, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(38, '2020-01-01', 14, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(39, '2020-01-01', 15, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(40, '2020-01-01', 16, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(41, '2020-01-01', 17, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(42, '2020-01-01', 18, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(43, '2020-01-01', 19, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(44, '2020-01-01', 20, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(45, '2020-01-01', 21, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(46, '2020-01-01', 22, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(47, '2020-01-01', 23, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2'),
(48, '2020-01-01', 24, '0.00', 80, '0.00', 0, '10.23', 140, '0.00', 0, '30.33', 180, '0.00', 0, '50.33', 220, 'Company 2');

-- --------------------------------------------------------

--
-- Table structure for table `seapproval`
--

CREATE TABLE `seapproval` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NULL DEFAULT current_timestamp(),
  `bizid` int(11) NOT NULL,
  `zemail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xmodule` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xlevel` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xuser` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xapprvstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xuserfullname` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcolor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zactive` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seapproval`
--

INSERT INTO `seapproval` (`xsl`, `ztime`, `bizid`, `zemail`, `xmodule`, `xlevel`, `xuser`, `xapprvstatus`, `xuserfullname`, `xcolor`, `zactive`) VALUES
(2, '2019-09-28 04:51:27', 100, 'rajib@qd.com', 'General Ledger', 'Level1', 'rajib@qd.com', 'Approved', 'Md Rajibul Islam', 'Green', 1);

-- --------------------------------------------------------

--
-- Table structure for table `secodes`
--

CREATE TABLE `secodes` (
  `codeid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xcodetype` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `xcoderem` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zactive` int(1) NOT NULL DEFAULT 1,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `secodes`
--

INSERT INTO `secodes` (`codeid`, `ztime`, `zutime`, `bizid`, `xcodetype`, `xcode`, `xdesc`, `xcoderem`, `zactive`, `zemail`, `xemail`, `xrecflag`) VALUES
(194, '2017-02-18 23:20:18', NULL, 100, 'Acc Level1', 'Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(222, '2017-06-10 07:31:23', NULL, 100, 'Acc Level1', 'Expenditure', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(221, '2017-06-10 07:30:35', NULL, 100, 'Acc Level1', 'Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(200, '2017-02-18 23:22:28', NULL, 100, 'Acc Level1', 'Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(199, '2017-02-18 23:21:57', NULL, 100, 'Acc Level2', 'Administrative Expense', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(195, '2017-02-18 23:20:44', NULL, 100, 'Acc Level2', 'Current Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(197, '2017-02-18 23:21:19', NULL, 100, 'Acc Level2', 'Current Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(229, '2017-06-13 06:22:19', NULL, 100, 'Acc Level2', 'Direct Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(232, '2017-06-13 06:25:20', NULL, 100, 'Acc Level2', 'Non Operating Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(196, '2017-02-18 23:21:02', NULL, 100, 'Acc Level2', 'Non-Current Asset', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(198, '2017-02-18 23:21:30', NULL, 100, 'Acc Level2', 'Non-Current Liability', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(234, '2017-06-13 06:26:04', NULL, 100, 'Acc Level2', 'Non-Operating Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(233, '2017-06-13 06:25:52', NULL, 100, 'Acc Level2', 'Operating Income', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(230, '2017-06-13 06:22:56', NULL, 100, 'Acc Level2', 'Operational Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(231, '2017-06-13 06:24:39', NULL, 100, 'Acc Level2', 'Selling & Distribution Expenses', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(224, '2017-06-11 07:49:38', NULL, 100, 'Acc Level3', 'Inter Current Accounts', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(223, '2017-06-11 07:48:29', NULL, 100, 'Acc Level3', 'long Term Liabilities', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(227, '2017-06-11 09:12:32', NULL, 100, 'Acc Level3', 'Member Subscription', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(228, '2017-06-11 09:37:11', NULL, 100, 'Acc Level3', 'Profit & Loss Accounts', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(226, '2017-06-11 08:29:14', NULL, 100, 'Acc Level3', 'Reserve & Surplus', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(225, '2017-06-11 07:50:54', NULL, 100, 'Acc Level3', 'Shareholders Equity', '', NULL, 1, 'resulbaki@gmail.com', NULL, 'Live'),
(392, '2019-09-26 18:00:00', NULL, 100, 'Approval Module', 'General Ledger', '', NULL, 1, 'rajib', NULL, 'Live'),
(396, '2019-09-27 04:01:43', NULL, 100, 'Approval Status', 'Approved', '', NULL, 1, 'rajib', NULL, 'Live'),
(397, '2019-09-27 04:01:43', NULL, 100, 'Approval Status', 'Posted', '', NULL, 1, 'rajib', NULL, 'Live'),
(203, '2017-03-07 11:26:17', NULL, 100, 'Bank', 'BBL', 'Brac Bank Ltd.', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(219, '2017-06-05 09:05:05', NULL, 100, 'Bank', 'Bkash', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(148, '2016-11-28 13:13:21', '2017-02-25 21:29:48', 100, 'Bank', 'BRAC', '', NULL, 1, 'rajib@pureapp.com', 'rajib@pureapp.com', 'Deleted'),
(147, '2016-11-28 13:13:00', NULL, 100, 'Bank', 'CBL', 'City Bank Limited', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(146, '2016-11-28 13:12:41', NULL, 100, 'Bank', 'DBBL', 'Dutch Bangla Bank Limited ', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(352, '2018-08-03 14:49:47', NULL, 100, 'Bank', 'DHAKA BANK', '', NULL, 1, 'rajib@dotbdsolutions.com', NULL, 'Live'),
(220, '2017-06-05 09:05:11', NULL, 100, 'Bank', 'Rocket', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(150, '2016-12-13 15:47:10', NULL, 100, 'Bank', 'SBL', 'Social Islami Bank Ltd', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(149, '2016-12-11 17:25:56', '2017-02-25 21:31:13', 100, 'Bank', 'SCBL', '', NULL, 1, 'rajib@pureapp.com', 'rajib@pureapp.com', 'Deleted'),
(338, '2018-02-28 13:08:17', NULL, 100, 'BOM Cost Head', 'Electricity And Utility Bill', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(339, '2018-02-28 13:08:40', NULL, 100, 'BOM Cost Head', 'Worker Salary', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(169, '2017-02-18 01:16:01', NULL, 100, 'Branch', 'Barisal', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(239, '2017-07-27 05:29:57', NULL, 100, 'Branch', 'Capai Nwabgong', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(140, '2016-11-11 12:51:23', NULL, 100, 'Branch', 'Chittagong', '', '', 1, '', NULL, 'Live'),
(167, '2017-02-18 01:15:39', NULL, 100, 'Branch', 'Comilla', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(166, '2017-02-18 01:15:31', NULL, 100, 'Branch', 'Dhaka', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(168, '2017-02-18 01:15:53', NULL, 100, 'Branch', 'Faridpur', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(238, '2017-07-27 05:28:54', NULL, 100, 'Branch', 'Gazipour', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(139, '2016-11-11 12:51:08', NULL, 100, 'Branch', 'Head Office', '', '', 1, '', NULL, 'Live'),
(241, '2017-07-27 05:30:48', NULL, 100, 'Branch', 'Hobigonj', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(236, '2017-07-27 05:28:26', NULL, 100, 'Branch', 'Jamalpur', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(141, '2016-11-11 12:52:10', NULL, 100, 'Branch', 'Jessore', '', '', 1, '', NULL, 'Live'),
(164, '2017-02-18 01:15:01', NULL, 100, 'Branch', 'Khulna', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(237, '2017-07-27 05:28:39', NULL, 100, 'Branch', 'Nawgoan', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(240, '2017-07-27 05:30:18', NULL, 100, 'Branch', 'Pabna', '', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(163, '2017-02-18 01:14:55', NULL, 100, 'Branch', 'Rajshahi', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(165, '2017-02-18 01:15:16', NULL, 100, 'Branch', 'Rangpur', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(170, '2017-02-18 01:16:37', NULL, 100, 'Branch', 'Sylhet', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(134, '2016-11-11 12:46:21', NULL, 100, 'Color', 'Black', '', '', 1, '', NULL, 'Live'),
(133, '2016-11-11 12:46:13', NULL, 100, 'Color', 'Green', '', '', 1, '', NULL, 'Live'),
(132, '2016-11-11 12:46:08', NULL, 100, 'Color', 'Red', '', '', 1, '', NULL, 'Live'),
(201, '2017-02-20 18:15:47', NULL, 100, 'Color', 'White', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(101, '2016-09-28 10:14:33', NULL, 100, 'Country', 'Bangladesh', '', '', 1, '', NULL, 'Live'),
(102, '2016-09-28 10:14:39', NULL, 100, 'Country', 'China', '', '', 1, '', NULL, 'Live'),
(106, '2016-09-28 10:15:03', NULL, 100, 'Country', 'Germany', '', '', 1, '', NULL, 'Live'),
(103, '2016-09-28 10:14:43', NULL, 100, 'Country', 'India', '', '', 1, '', NULL, 'Live'),
(105, '2016-09-28 10:14:55', NULL, 100, 'Country', 'Malaysia', '', '', 1, '', NULL, 'Live'),
(104, '2016-09-28 10:14:48', NULL, 100, 'Country', 'Taiwan', '', '', 1, '', NULL, 'Live'),
(411, '2021-03-04 10:40:19', NULL, 100, 'Course Class', 'Course', 'Course', NULL, 1, 'rajib', NULL, 'Live'),
(410, '2021-03-04 10:40:19', NULL, 100, 'Course Class', 'Training', 'Training', NULL, 1, 'rajib', NULL, 'Live'),
(406, '2021-03-04 10:37:16', NULL, 100, 'Course Type', 'Amarbazar Course', 'Amarbazar Course', NULL, 1, 'rajib', NULL, 'Live'),
(407, '2021-03-04 10:38:56', '2021-03-04 16:37:16', 100, 'Course Type', 'Doatademy Course', 'Doatademy Course', NULL, 1, 'rajib', NULL, 'Live'),
(204, '2017-03-12 07:00:41', NULL, 100, 'Currency', 'BDT', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(209, '2017-03-21 09:57:15', NULL, 100, 'Currency', 'GBP', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(208, '2017-03-21 09:56:47', NULL, 100, 'Currency', 'INR', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(383, '2019-03-04 08:37:46', NULL, 100, 'Currency', 'KWD', '22', NULL, 1, 'rajib', NULL, 'Live'),
(205, '2017-03-21 09:55:27', NULL, 100, 'Currency', 'RM', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(207, '2017-03-21 09:56:36', NULL, 100, 'Currency', 'SGD', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(206, '2017-03-21 09:56:15', NULL, 100, 'Currency', 'USD', '1', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(127, '2016-10-19 13:24:01', NULL, 100, 'Customer Prefix', 'CUS0', '', '', 1, '', NULL, 'Live'),
(377, '2019-02-24 05:26:35', NULL, 100, 'Customer Prefix', 'CUS1', '', NULL, 1, '', NULL, 'Live'),
(399, '2020-10-25 18:00:00', NULL, 100, 'Development', 'Development', 'IT & Software', NULL, 1, 'rajib', NULL, 'Live'),
(119, '2016-09-28 10:17:33', NULL, 100, 'District', 'BARISAL', '', '', 1, '', NULL, 'Live'),
(115, '2016-09-28 10:17:13', NULL, 100, 'District', 'CHITTAGONG', '', '', 1, '', NULL, 'Live'),
(114, '2016-09-28 10:17:07', NULL, 100, 'District', 'DHAKA', '', '', 1, '', NULL, 'Live'),
(118, '2016-09-28 10:17:27', NULL, 100, 'District', 'KHULNA', '', '', 1, '', NULL, 'Live'),
(117, '2016-09-28 10:17:23', NULL, 100, 'District', 'RAJSHAHI', '', '', 1, '', NULL, 'Live'),
(120, '2016-09-28 10:17:39', NULL, 100, 'District', 'RANGPUR', '', '', 1, '', NULL, 'Live'),
(116, '2016-09-28 10:17:18', NULL, 100, 'District', 'SYLHET', '', '', 1, '', NULL, 'Live'),
(409, '2021-03-04 10:39:00', NULL, 100, 'Featured Course', '0', '0', NULL, 1, 'rajib', NULL, 'Live'),
(408, '2021-03-04 10:39:00', NULL, 100, 'Featured Course', '1', '1', NULL, 1, 'rajib', NULL, 'Live'),
(331, '2017-11-21 07:09:53', NULL, 100, 'GL Prefix', 'JV--', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(335, '2017-11-23 09:16:14', NULL, 100, 'GL Prefix', 'OB--', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(332, '2017-11-21 07:10:01', NULL, 100, 'GL Prefix', 'PAY-', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(333, '2017-11-21 07:10:13', NULL, 100, 'GL Prefix', 'RCPT', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(334, '2017-11-21 07:10:19', NULL, 100, 'GL Prefix', 'TRCV', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(135, '2016-11-11 12:46:32', NULL, 100, 'IM Receive Prefix', 'IRCV', '', '', 1, '', NULL, 'Live'),
(136, '2016-11-11 12:47:15', NULL, 100, 'IM Receive Prefix', 'SEM', '', '', 1, '', NULL, 'Live'),
(145, '2016-11-12 12:54:28', NULL, 100, 'IM Transfer Prefix', 'ITOR', '', '', 1, '', NULL, 'Live'),
(398, '2020-10-25 18:00:00', NULL, 100, 'IT & Software', 'IT & Software', 'IT & Software', NULL, 1, 'rajib', NULL, 'Live'),
(248, '2017-10-09 07:51:09', NULL, 100, 'Item Brand', 'ACI', 'ACI', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(318, '2017-10-14 09:40:21', NULL, 100, 'Item Brand', 'Arometic', 'Arometic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(280, '2017-10-14 09:34:57', NULL, 100, 'Item Brand', 'Axe', 'Axe', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(244, '2017-10-09 07:50:22', '2017-10-14 10:35:38', 100, 'Item Brand', 'Best Electronics', 'Electronics Iteam', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(294, '2017-10-14 09:37:06', NULL, 100, 'Item Brand', 'Chaka', 'Chaka', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(303, '2017-10-14 09:38:27', NULL, 100, 'Item Brand', 'Chamak', 'Chamak', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(315, '2017-10-14 09:40:02', NULL, 100, 'Item Brand', 'Chashi', 'Chashi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(314, '2017-10-14 09:39:56', NULL, 100, 'Item Brand', 'Chopstick', 'Chopstick', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(290, '2017-10-14 09:36:38', NULL, 100, 'Item Brand', 'Closeup', 'Closeup', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(278, '2017-10-14 09:34:46', NULL, 100, 'Item Brand', 'Dove', 'Dove', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(211, '2017-06-03 07:28:19', NULL, 100, 'Item Brand', 'EVERCO', 'RO Machine', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(317, '2017-10-14 09:40:14', NULL, 100, 'Item Brand', 'Fun', 'Fun', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(277, '2017-10-14 09:34:37', NULL, 100, 'Item Brand', 'General', 'General', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(266, '2017-10-14 09:32:10', NULL, 100, 'Item Brand', 'Hitachi', 'Hitachi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(249, '2017-10-09 07:51:17', NULL, 100, 'Item Brand', 'IFAD', 'IFAD', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(293, '2017-10-14 09:37:00', NULL, 100, 'Item Brand', 'Jui', 'Jui', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(279, '2017-10-14 09:34:51', NULL, 100, 'Item Brand', 'Knorr', 'Knorr', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(212, '2017-06-03 07:28:59', '2017-10-14 10:39:19', 100, 'Item Brand', 'KOKOMO', 'Biscuit', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(304, '2017-10-14 09:38:46', NULL, 100, 'Item Brand', 'Kool', 'Kool', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(273, '2017-10-14 09:34:12', NULL, 100, 'Item Brand', 'Lenovo', 'Lenovo', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(282, '2017-10-14 09:35:30', NULL, 100, 'Item Brand', 'Lifebuoy', 'Lifebuoy', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(283, '2017-10-14 09:35:37', NULL, 100, 'Item Brand', 'Lipton', 'Lipton', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(306, '2017-10-14 09:39:00', NULL, 100, 'Item Brand', 'magic', 'magic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(286, '2017-10-14 09:36:01', NULL, 100, 'Item Brand', 'Magnum', 'Magnum', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(311, '2017-10-14 09:39:34', NULL, 100, 'Item Brand', 'Max Clean', 'Max Clean', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(302, '2017-10-14 09:38:21', NULL, 100, 'Item Brand', 'Meril Baby', 'Meril Baby', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(309, '2017-10-14 09:39:21', NULL, 100, 'Item Brand', 'Meril Milk Soap Bar', 'Meril Milk Soap Bar', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(298, '2017-10-14 09:37:56', NULL, 100, 'Item Brand', 'Meril Protective', 'Meril Protective', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(272, '2017-10-14 09:34:07', NULL, 100, 'Item Brand', 'Micromax', 'Micromax', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(274, '2017-10-14 09:34:19', NULL, 100, 'Item Brand', 'Midea', 'Midea', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(214, '2017-06-03 07:30:16', '2017-10-14 10:35:55', 100, 'Item Brand', 'PACIFAC LEATHER', 'Leather Item', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(269, '2017-10-14 09:33:49', NULL, 100, 'Item Brand', 'Panasonic', 'Panasonic', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(289, '2017-10-14 09:36:18', NULL, 100, 'Item Brand', 'Pepsudent', 'Pepsudent', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(288, '2017-10-14 09:36:11', NULL, 100, 'Item Brand', 'Persil', 'Persil', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(270, '2017-10-14 09:33:53', NULL, 100, 'Item Brand', 'Philips', 'Philips', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(100, '2016-09-28 06:19:39', '2017-05-30 12:06:27', 100, 'Item Brand', 'PMDL', 'Peoples Marketing & Distribution Ltd.', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(316, '2017-10-14 09:40:10', NULL, 100, 'Item Brand', 'Pure', 'Pure', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(312, '2017-10-14 09:39:42', NULL, 100, 'Item Brand', 'Radhuni', 'Radhuni', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(296, '2017-10-14 09:37:46', NULL, 100, 'Item Brand', 'Revive', 'Revive', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(281, '2017-10-14 09:35:10', NULL, 100, 'Item Brand', 'Rexona', 'Rexona', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(183, '2017-02-18 01:26:36', '2017-05-30 12:06:33', 100, 'Item Brand', 'RMDL', 'Revolution Marketing and Distribution Ltd.', NULL, 1, 'rajib@pureapp.com', 'ABL-777-0007@abl.com', 'Deleted'),
(313, '2017-10-14 09:39:51', NULL, 100, 'Item Brand', 'Ruchi', 'Ruchi', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(271, '2017-10-14 09:34:00', NULL, 100, 'Item Brand', 'Samsung', 'Samsung', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(301, '2017-10-14 09:38:15', NULL, 100, 'Item Brand', 'Select Plus', 'Select Plus', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(295, '2017-10-14 09:37:33', NULL, 100, 'Item Brand', 'Senora', 'Senora', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(297, '2017-10-14 09:37:50', NULL, 100, 'Item Brand', 'Sepnil', 'Sepnil', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(308, '2017-10-14 09:39:16', NULL, 100, 'Item Brand', 'Shakti', 'Shakti', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(267, '2017-10-14 09:32:20', NULL, 100, 'Item Brand', 'Sharp', 'Sharp', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(213, '2017-06-03 07:29:30', NULL, 100, 'Item Brand', 'SKIN FOOD', 'Skin care', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(265, '2017-10-14 08:40:10', NULL, 100, 'Item Brand', 'Sony', 'Electronics', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(299, '2017-10-14 09:38:03', NULL, 100, 'Item Brand', 'Spring', 'Spring', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(247, '2017-10-09 07:51:01', NULL, 100, 'Item Brand', 'Square Food & Beverage', 'Square Food & Beverage', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(246, '2017-10-09 07:50:53', '2017-10-14 10:36:59', 100, 'Item Brand', 'Squire Tolatories', 'Squire Tolatories', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(284, '2017-10-14 09:35:45', NULL, 100, 'Item Brand', 'Sunsilk', 'Sunsilk', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(300, '2017-10-14 09:38:09', NULL, 100, 'Item Brand', 'Supermom', 'Supermom', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(285, '2017-10-14 09:35:51', NULL, 100, 'Item Brand', 'Surf-excel', 'Surf-excel', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(292, '2017-10-14 09:36:51', NULL, 100, 'Item Brand', 'Taja', 'Taja', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(245, '2017-10-09 07:50:43', '2017-10-14 10:36:49', 100, 'Item Brand', 'Uniliver Bangladesh', 'Uniliver Bangladesh', NULL, 1, 'sahinodesk@gmail.com', 'ABL-777-0007@abl.com', 'Deleted'),
(275, '2017-10-14 09:34:24', NULL, 100, 'Item Brand', 'V-Guard', 'V-Guard', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(287, '2017-10-14 09:36:05', NULL, 100, 'Item Brand', 'Vaseline', 'Vaseline', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(291, '2017-10-14 09:36:46', NULL, 100, 'Item Brand', 'Vim', 'Vim', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(243, '2017-10-09 07:49:33', NULL, 100, 'Item Brand', 'Western', 'Western Electronics', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(268, '2017-10-14 09:33:42', NULL, 100, 'Item Brand', 'Whirlpool', 'Whirlpool', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(310, '2017-10-14 09:39:29', NULL, 100, 'Item Brand', 'White Plus', 'White Plus', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(307, '2017-10-14 09:39:07', NULL, 100, 'Item Brand', 'Xpel', 'Xpel', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(305, '2017-10-14 09:38:54', NULL, 100, 'Item Brand', 'Zerocal', 'Zerocal', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(371, '2019-02-12 11:37:27', NULL, 100, 'Item Category', 'Beauty Care', '1111', NULL, 1, '', NULL, 'Live'),
(98, '2016-09-23 15:03:18', NULL, 100, 'Item Category', 'Beverage', 'Juice', '', 1, '', NULL, 'Live'),
(256, '2017-10-09 08:04:03', NULL, 100, 'Item Category', 'Books', 'Books', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(378, '2019-02-24 05:27:01', NULL, 100, 'Item Category', 'Cate1', '', NULL, 1, '', NULL, 'Live'),
(97, '2016-09-23 15:03:02', '2017-10-14 10:32:07', 100, 'Item Category', 'Clothing', 'Test All types of clothing items', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(126, '2016-10-16 06:10:48', NULL, 100, 'Item Category', 'Computer', 'Computer Items', '', 1, '', NULL, 'Live'),
(253, '2017-10-09 08:02:02', NULL, 100, 'Item Category', 'Consumer', 'Consumer', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(255, '2017-10-09 08:03:53', NULL, 100, 'Item Category', 'Crockeries', 'Crockeries', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(257, '2017-10-09 08:04:22', NULL, 100, 'Item Category', 'Decoration', 'Decoration', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(258, '2017-10-09 08:04:40', NULL, 100, 'Item Category', 'Education & Training', 'Education & Training', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(96, '2016-09-23 15:02:46', NULL, 100, 'Item Category', 'Electronics', 'Electronics Items', '', 1, '', NULL, 'Live'),
(160, '2017-02-18 01:09:21', NULL, 100, 'Item Category', 'Food', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(99, '2016-09-23 15:16:59', '2017-10-14 10:32:37', 100, 'Item Category', 'Fresh', 'Fish', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(264, '2017-10-09 08:09:27', NULL, 100, 'Item Category', 'Gifts Iteam', 'Gifts Iteam', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(161, '2017-02-18 01:11:12', NULL, 100, 'Item Category', 'Grocery', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(252, '2017-10-09 08:01:34', NULL, 100, 'Item Category', 'Health & Beauty', 'Health & Beauty', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(261, '2017-10-09 08:05:28', NULL, 100, 'Item Category', 'Health & Wealth', 'Health & Wealth', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(251, '2017-10-09 08:01:18', NULL, 100, 'Item Category', 'Home & Cleaning', 'Home & Cleaning', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(250, '2017-10-09 08:00:43', NULL, 100, 'Item Category', 'Home Appliances', 'Home Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(259, '2017-10-09 08:04:54', NULL, 100, 'Item Category', 'Kitchen Appliances', 'Kitchen Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(124, '2016-10-11 17:22:26', NULL, 100, 'item Category', 'Mobile', 'mobile items', '', 1, '', NULL, 'Live'),
(260, '2017-10-09 08:05:13', NULL, 100, 'Item Category', 'Office Appliances', 'Office Appliances', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(262, '2017-10-09 08:06:01', NULL, 100, 'Item Category', 'Sports', 'Sports', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(254, '2017-10-09 08:03:33', NULL, 100, 'Item Category', 'Toiletries', 'Toiletries', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(263, '2017-10-09 08:06:15', NULL, 100, 'Item Category', 'Toys', 'Toys', NULL, 1, 'sahinodesk@gmail.com', NULL, 'Live'),
(123, '2016-09-29 09:54:58', NULL, 100, 'Item Class', 'Local', '', '', 1, '', NULL, 'Live'),
(337, '2018-02-27 06:09:52', NULL, 100, 'Item Group', 'Finished Goods', '', NULL, 1, '', 'rajib', 'Live'),
(122, '2016-09-29 09:54:40', NULL, 100, 'Item Group', 'Raw Material', '', '', 1, '', NULL, 'Live'),
(336, '2018-02-27 06:09:52', NULL, 100, 'Item Group', 'Stationary', '', NULL, 1, '', 'rajib', 'Live'),
(360, '2019-02-12 09:43:22', NULL, 100, 'Item Prefix', 'ITM', '', NULL, 1, '', NULL, 'Live'),
(157, '2017-02-18 01:08:47', NULL, 100, 'Item Size', '01', '250ml', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(158, '2017-02-18 01:08:51', NULL, 100, 'Item Size', '02', '500ml', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(159, '2017-02-18 01:08:55', NULL, 100, 'Item Size', '03', '1ltr', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(320, '2017-11-01 11:17:57', NULL, 100, 'Item Size', '04', '1KG', NULL, 1, 'amarbazarltd@gmail.com', NULL, 'Live'),
(202, '2017-02-20 18:16:04', '2017-06-03 07:09:39', 100, 'Item Size', '05', '', NULL, 1, 'rajib@pureapp.com', 'ABL-777-0007@abl.com', 'Deleted'),
(327, '2017-11-06 06:01:08', NULL, 100, 'Item Size', '06', '100gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(328, '2017-11-06 06:01:18', NULL, 100, 'Item Size', '07', '130gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(329, '2017-11-06 06:01:37', NULL, 100, 'Item Size', '08', '150gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(330, '2017-11-06 06:02:02', NULL, 100, 'Item Size', '09', '160gm', NULL, 1, 'pdir@abl.com', NULL, 'Live'),
(137, '2016-11-11 12:47:24', '2017-06-03 07:09:47', 100, 'Item Size', '12', '5KG', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(138, '2016-11-11 12:47:28', '2017-06-03 07:09:55', 100, 'Item Size', '14', '10KG', '', 1, '', 'ABL-777-0007@abl.com', 'Deleted'),
(324, '2017-11-02 08:07:43', '2017-11-02 09:09:44', 100, 'Item Size', '18', '500gm', NULL, 1, 'dgmproduct@abl.com', 'dgmproduct@abl.com', 'Deleted'),
(319, '2017-11-01 11:17:37', '2017-11-01 12:18:13', 100, 'Item Size', '1KG', '', NULL, 1, 'amarbazarltd@gmail.com', 'amarbazarltd@gmail.com', 'Deleted'),
(341, '2018-04-05 05:43:22', NULL, 100, 'Item Size', '50x50 fit', '', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(342, '2018-04-05 05:44:44', NULL, 100, 'Item Size', '5kg', '10', NULL, 1, 'admin@demo.com', NULL, 'Live'),
(344, '2018-04-11 09:58:22', NULL, 100, 'PO Cost Head', 'Bank Charge', '', NULL, 1, 'rajib', NULL, 'Live'),
(345, '2018-04-11 09:58:22', NULL, 100, 'PO Cost Head', 'CNF Cost', '', NULL, 1, 'rajib', NULL, 'Live'),
(346, '2018-04-11 09:59:03', NULL, 100, 'PO Cost Head', 'Custom Duty', '', NULL, 1, 'rajib', NULL, 'Live'),
(343, '2018-04-11 09:56:41', NULL, 100, 'PO Cost Head', 'LC Payment', '', NULL, 1, 'rajib', NULL, 'Live'),
(350, '2018-04-11 10:00:22', NULL, 100, 'PO Cost Head', 'Miscellaneous', '', NULL, 1, 'rajib', NULL, 'Live'),
(349, '2018-04-11 10:00:04', NULL, 100, 'PO Cost Head', 'Port Charge', '', NULL, 1, 'rajib', NULL, 'Live'),
(348, '2018-04-11 10:00:04', NULL, 100, 'PO Cost Head', 'Transport', '', NULL, 1, 'rajib', NULL, 'Live'),
(347, '2018-04-11 09:59:03', NULL, 100, 'Port Charge', 'CNF Cost', '', NULL, 1, 'rajib', NULL, 'Live'),
(180, '2017-02-18 01:23:19', NULL, 100, 'Product Source', 'ABL', 'ABL Prodicts', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(182, '2017-02-18 01:26:14', NULL, 100, 'Product Source', 'Corporate', 'Corporate Products', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(181, '2017-02-18 01:25:45', NULL, 100, 'Product Source', 'OSP', 'OSP Products', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(340, '2018-03-25 05:49:39', NULL, 100, 'Purchase Prefix', 'PORD', '', NULL, 1, 'rajib@dotbdsolutions.com', NULL, 'Live'),
(131, '2016-11-07 04:49:23', NULL, 100, 'Quality Check Prefix', 'QCHK', '', '', 1, '', NULL, 'Live'),
(130, '2016-10-22 12:32:47', NULL, 100, 'Security Check Prefix', 'ICHK', '', '', 1, '', NULL, 'Live'),
(387, '2019-03-04 08:43:38', NULL, 100, 'Ship Term', 'CIF', '', NULL, 1, 'rajib', NULL, 'Live'),
(386, '2019-03-04 08:43:38', NULL, 100, 'Ship Term', 'FOB', '', NULL, 1, 'rajib', NULL, 'Live'),
(385, '2019-03-04 08:42:25', NULL, 100, 'Ship Via', 'Air', '', NULL, 1, 'rajib', NULL, 'Live'),
(384, '2019-03-04 08:42:25', NULL, 100, 'SHip Via', 'Sea', '', NULL, 1, 'rajib', NULL, 'Live'),
(215, '2017-06-03 07:52:50', '2017-10-14 10:34:03', 100, 'Supplier', 'GREEN TOUCH ECOMMERS SYSTEM', 'Freelancing Course,', NULL, 1, 'ABL-777-0007@abl.com', 'ABL-777-0007@abl.com', 'Deleted'),
(210, '2017-06-03 05:13:06', NULL, 100, 'Supplier', 'Nexus Trade Home', 'RO Machine Supplier', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(216, '2017-06-03 07:53:46', NULL, 100, 'Supplier', 'PACIFAC LEATHER', 'Leather Item', NULL, 1, 'ABL-777-0007@abl.com', NULL, 'Live'),
(129, '2016-10-20 02:33:39', NULL, 100, 'Supplier Prefix', 'SUP0', '', '', 1, '', NULL, 'Live'),
(112, '2016-09-28 10:16:50', NULL, 100, 'Tax Code Purchase', 'TAX', '', '', 1, '', NULL, 'Live'),
(113, '2016-09-28 10:16:54', NULL, 100, 'Tax Code Purchase', 'VAT', '', '', 1, '', NULL, 'Live'),
(121, '2016-09-28 11:46:55', NULL, 100, 'Tax Code Sales', 'VAT', '', '', 1, '', NULL, 'Live'),
(128, '2016-10-19 13:38:02', NULL, 100, 'Tax Scope', 'None', '', '', 1, '', NULL, 'Live'),
(413, '2021-03-04 11:36:27', NULL, 100, 'Trainer Category', 'None', 'None', NULL, 1, 'rajib', NULL, 'Live'),
(412, '2021-03-04 11:36:27', NULL, 100, 'Trainer Category', 'Popular', 'Popular', NULL, 1, 'rajib', NULL, 'Live'),
(365, '2019-02-12 09:45:21', NULL, 100, 'Unit Of Measure', 'KG', '', NULL, 1, '', NULL, 'Live'),
(192, '2017-02-18 21:07:50', NULL, 100, 'UOM', 'Barrel', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(388, '2019-07-20 11:51:23', NULL, 100, 'UOM', 'Cartoon', '', NULL, 1, 'rajib@qd.com', NULL, 'Live'),
(193, '2017-02-18 21:08:09', NULL, 100, 'UOM', 'Container', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(109, '2016-09-28 10:16:09', NULL, 100, 'UOM', 'DOZEN', '', '', 1, '', NULL, 'Live'),
(187, '2017-02-18 21:03:25', NULL, 100, 'UOM', 'ft', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(188, '2017-02-18 21:03:42', NULL, 100, 'UOM', 'inch', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(110, '2016-09-28 10:16:28', NULL, 100, 'UOM', 'KG', '', '', 1, '', NULL, 'Live'),
(111, '2016-09-28 10:16:32', NULL, 100, 'UOM', 'LITRE', '', '', 1, '', NULL, 'Live'),
(185, '2017-02-18 21:03:06', NULL, 100, 'UOM', 'ml', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(186, '2017-02-18 21:03:19', NULL, 100, 'UOM', 'mm', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(218, '2017-06-03 14:03:32', NULL, 100, 'UOM', 'Package', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(389, '2019-07-20 11:51:33', NULL, 100, 'UOM', 'Packet', '', NULL, 1, 'rajib@qd.com', NULL, 'Live'),
(107, '2016-09-28 10:15:36', NULL, 100, 'UOM', 'PCS', '', '', 1, '', NULL, 'Live'),
(108, '2016-09-28 10:15:43', NULL, 100, 'UOM', 'SET', '', '', 1, '', NULL, 'Live'),
(189, '2017-02-18 21:04:21', NULL, 100, 'UOM', 'yards', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(403, '2021-02-17 18:00:00', NULL, 100, 'User Role', 'Admin', 'admin', NULL, 1, 'admin', NULL, 'Live'),
(404, '2021-02-28 08:19:24', NULL, 100, 'User Role', 'User', 'User', NULL, 1, 'rajib', NULL, 'Live'),
(405, '2021-02-28 08:21:31', NULL, 100, 'Venu', 'All', 'All', NULL, 1, 'rajib', NULL, 'Live'),
(151, '2017-02-17 23:27:16', NULL, 100, 'Warehouse', 'BULK WH', '', NULL, 1, 'rajib@pureapp.com', NULL, 'Live'),
(391, '2019-07-23 09:44:31', NULL, 100, 'Warehouse', 'PACKAGE WH', '', NULL, 1, 'rajib@qd.com', NULL, 'Live'),
(390, '2019-07-23 09:44:18', NULL, 100, 'Warehouse', 'RESIZE WH', '', NULL, 1, 'rajib@qd.com', NULL, 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `secus`
--

CREATE TABLE `secus` (
  `xcussl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcus` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xshort` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd1` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(500) DEFAULT NULL,
  `xbillingadd` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdeliveryadd` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontactphone` varchar(20) DEFAULT NULL,
  `xcontactmob` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgender` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpassword` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgcus` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpricegroup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcustype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xindustryseg` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscountpct` double DEFAULT 0,
  `xbank` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbankbr` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbankacc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcascard` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpoint` double NOT NULL DEFAULT 0,
  `xagent` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcommisionpct` double DEFAULT NULL,
  `xcreditlimit` double DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `zemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xlt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xln` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusprefix` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secus`
--

INSERT INTO `secus` (`xcussl`, `ztime`, `zutime`, `bizid`, `xemail`, `xcus`, `xshort`, `xorg`, `xadd1`, `xadd2`, `xbillingadd`, `xdeliveryadd`, `xcity`, `xprovince`, `xpostal`, `xcountry`, `xcontact`, `xcontactphone`, `xcontactmob`, `xgender`, `xphone`, `xcusemail`, `xmobile`, `xpassword`, `xweburl`, `xnid`, `xtaxno`, `xtaxscope`, `xgcus`, `xpricegroup`, `xcustype`, `xindustryseg`, `xdiscountpct`, `xbank`, `xbankbr`, `xbankacc`, `xcascard`, `xpoint`, `xagent`, `xcommisionpct`, `xcreditlimit`, `xcreditterms`, `zactive`, `xrecflag`, `zemail`, `xlt`, `xln`, `xcusprefix`) VALUES
(83, '2020-07-04 11:03:58', NULL, 100, NULL, '1111', NULL, 'Md Rajib', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 'as@as', NULL, '12343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '1111', NULL, NULL, NULL),
(84, '2020-07-04 14:05:30', NULL, 100, NULL, '1111111', NULL, 'ABC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 'qw@344', NULL, 'adasa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '1111111', NULL, NULL, NULL),
(86, '2020-07-04 14:35:05', NULL, 100, NULL, '11111414', NULL, 'asas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 'as@as', NULL, '2323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '11111414', NULL, NULL, NULL),
(87, '2020-07-04 15:00:38', NULL, 100, NULL, '1111434', NULL, 'dsds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, 'as@as', NULL, '24343', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '1111434', NULL, NULL, NULL),
(77, '2020-06-09 14:25:28', NULL, 100, NULL, '12', NULL, 'as', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option1', NULL, 'a@s', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '12', NULL, NULL, NULL),
(72, '2020-06-09 12:31:09', NULL, 100, NULL, '13', NULL, 'Sattar Vai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option2', NULL, 'a@s', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '13', NULL, NULL, NULL),
(85, '2020-07-04 14:20:48', NULL, 100, NULL, '1313', NULL, '131', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', NULL, '13@EW', NULL, '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '1313', NULL, NULL, NULL),
(73, '2020-06-09 12:31:32', NULL, 100, NULL, '14', NULL, 'Sattar Vai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option2', NULL, 'a@s', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '14', NULL, NULL, NULL),
(74, '2020-06-09 12:32:12', NULL, 100, NULL, '15', NULL, 'Sattar Vai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option2', NULL, 'a@s', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '15', NULL, NULL, NULL),
(75, '2020-06-09 12:33:00', NULL, 100, NULL, '16', NULL, 'Sattar Vai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option2', NULL, 'a@s', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '16', NULL, NULL, NULL),
(81, '2020-06-09 14:30:12', NULL, 100, NULL, '22', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option2', NULL, 'a@s', NULL, '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '22', NULL, NULL, NULL),
(82, '2020-06-09 14:43:33', NULL, 100, NULL, '23', NULL, 'Rajib', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'option1', NULL, 'a@S', NULL, '12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Live', '23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seitem`
--

CREATE TABLE `seitem` (
  `xitemid` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` timestamp NULL DEFAULT NULL,
  `bizid` int(11) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitemcodealt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsource` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdesc` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `xlongdesc` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmaincatid` int(6) NOT NULL DEFAULT 0,
  `xmaincat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcatid` int(6) NOT NULL DEFAULT 0,
  `xtag` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpoint` double NOT NULL DEFAULT 0,
  `xcat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbrand` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgitem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcitem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodepo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxcodesales` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountryoforig` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xunitpur` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  `xunitsale` varchar(10) COLLATE utf8_unicode_ci DEFAULT '0',
  `xunitstk` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xconversion` double NOT NULL DEFAULT 1,
  `xmandatorybatch` enum('Yes','No') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `xserialconf` enum('None','Mandatory') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `xtypestk` enum('Stocking','Non Stoking') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Stocking',
  `xreorder` double DEFAULT 1,
  `xpricepur` double DEFAULT 0,
  `xstdcost` double DEFAULT 0,
  `xmrp` double DEFAULT 0,
  `xcp` double DEFAULT 0,
  `xdp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstdprice` double NOT NULL DEFAULT 0,
  `xdisc` double NOT NULL DEFAULT 0,
  `xtaxpct` double NOT NULL DEFAULT 0,
  `zactive` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `xcolor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsize` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweight` double NOT NULL DEFAULT 0,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xprefix` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ratingscount` int(7) NOT NULL DEFAULT 0,
  `ratingsvalue` double NOT NULL DEFAULT 0,
  `cartcount` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seitem`
--

INSERT INTO `seitem` (`xitemid`, `ztime`, `zutime`, `bizid`, `xitemcode`, `xitemcodealt`, `xsource`, `xdesc`, `xlongdesc`, `xmaincatid`, `xmaincat`, `xcatid`, `xtag`, `xpoint`, `xcat`, `xbrand`, `xgitem`, `xcitem`, `xtaxcodepo`, `xtaxcodesales`, `xcountryoforig`, `xsup`, `xunitpur`, `xunitsale`, `xunitstk`, `xconversion`, `xmandatorybatch`, `xserialconf`, `xtypestk`, `xreorder`, `xpricepur`, `xstdcost`, `xmrp`, `xcp`, `xdp`, `xstdprice`, `xdisc`, `xtaxpct`, `zactive`, `xcolor`, `xsize`, `xweight`, `zemail`, `xemail`, `xrecflag`, `xprefix`, `ratingscount`, `ratingsvalue`, `cartcount`) VALUES
(2477, '2019-10-14 00:24:46', '2020-07-03 22:04:20', 101, 'ITM000043', '', '', 'Creative Graphics Design Course (Physical)\r\n', 'Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>\" >\" >Batch: B-2<br>Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 4500, 0, 15000, 0, NULL, 9000, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2587, '2019-10-14 00:24:46', '2021-03-15 22:26:35', 101, 'ITM000044', '', '', 'Advance Fundamental Computer Course (Physical)\r\n', '\r\nFind & Replace.</p>\r\n\r\n<h3><b>Class 04:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Table\r\n(columns, rows, heading)</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nDesign Table.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPicture tools</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nShape tools</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSmart Art, Charts\r\n& screenshot.</p>\r\n\r\n<p>vi)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nHeader, Footer,\r\nPage numbering, Date & Time</p>\r\n\r\n<p>vii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nText box, Word Art,\r\nDrop cap, Equation & Symbol.</p>\r\n\r\n<h3><b>Class 05:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Margins,\r\nOrientation. </p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Size, Columns\r\n& Break.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Watermark,\r\nColors & Borders.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPosition, Wrap,\r\nArrange.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nAlign, Group &\r\nRotation.</p>\r\n\r\n<h3><b>Class\r\n06:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBengali Typing</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSpelling &\r\nGrammar</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nWord count</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPages zoom in &\r\nout.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nRuler, View option</p>\r\n\r\n<h3><b>Class 07:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMaking modern\r\nResume using MS word Step by step.</p>\r\n\r\n<h3><b>Class 08:</b> ï¿½</h3><p><b>Practical\r\nExam in Lab</b></p>\r\n\r\n<p>ï¿½</p>\r\n\r\n<h3><b>Class 09:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMs Excel\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBasic function (+,\r\n-, *, /)</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nFixed Deposit</p>\r\n\r\n<h3><b>Class 10:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSalary Sheet</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nResult Sheet</p>\r\n\r\n<h3><b>Class 11:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nMS PowerPoint\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all options</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nAuto playing slides\r\nwith animations</p>\r\n\r\n<h3><b>Class 12:ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½  </b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Presentation\r\nwith animation</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nInsert video on\r\nPresentation.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nUse animation on\r\ntext.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSliding animation\r\nusing loop.</p>\r\n\r\n<h3><b>Class 13:</b>ï¿½ <b>Presentation Day</b><b></b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation on\r\nThyself [with selective topic]<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nArt of Presentation<b></b></p>\r\n\r\n<h3><b>Class 14:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation using\r\nSmartphone<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPhoto editing in\r\nSmartphone<b></b></p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMS Office picture\r\nmanager </p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  Assignment on photography</p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  <b>Photo\r\nContest on best capture, edit and presentation</b></p>\r\n\r\n<h3><b>Class 15:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nPhotoshop\r\nintroduction.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all tools\r\n& options.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nï¿½Create a sample drawing.</p>\r\n\r\n<h3><b>Class 16:</b>', 1, 'Package Products', 23, 'Education Prodcuts', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1100, 0, 7500, 0, NULL, 5600, 0, 0, '1', '[]', '[]', 0, '', 'anex.mgm@gmail.com', 'Live', NULL, 0, 0, 0),
(1508, '2019-10-14 00:24:46', '2020-07-03 22:00:29', 101, 'ITM000045', '', '', 'Professional Digital Marketing (Physical)\r\n', '<b>Annex\r\nDigital Marketing Course Details are given below:</b><br><br>\r\n<p><b>Class-01\r\nDigital Marketing Basics Introduction</b></p><b>Class-02:\r\nUsing Necessary Tools</b><p><b>Class-03\r\n: Digital & ecommerce marketing</b></p>\r\n<p><b>Class-04:\r\nSearch Engine Optimization</b></p>\r\n<p> </p><b>Class-05:\r\nGoogle Algorithm Updates</b><p><b>Class-06:\r\nKeyword Research and Analysis</b></p>\r\n<p><b>Class-07:\r\nKeyword Competition & Finalization of Keywords</b></p><b>Class-08:\r\nOn-site optimizations</b>\r\n\r\n\r\n\r\n<p><b>Class-09:\r\nContent Development & Optimization</b></p><b>Class-10:\r\nGoogle Webmaster Tools & Analytics</b><p><b>Class-11:\r\nOff-Page Optimizations</b></p>\r\n<p><b>Class-12\r\n: Social Media Marketing</b></p><p><b>Class-13:\r\nSocial  Media Marketing <br></b></p><p><b>Class - 14 : YouTube Marketing</b></p><p><b>Class\r\n- 15: YouTube Marketing</b></p>\r\n\r\n\r\n\r\n<p>\r\n\r\n</p><br><p>\r\n<br>\r\n\r\n</p>\r\n\r\n<br><br><br>', 1, 'Package Products', 23, 'Digital Marketing', 500, 'Training Courses', '', NULL, '', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1500, 0, 12000, 0, NULL, 6500, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2380, '2019-10-14 00:24:46', '2020-09-28 00:56:35', 101, 'ITM000046', '', '', 'Spoken English Course  (Physical)\r\n', '', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, 'featured', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5800, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2852, '2020-03-24 06:45:58', '2020-07-03 21:55:39', 101, 'ITM000047', '', '', 'Easy Spoken English- Online\r\n', 'Easy Spoken English- Online', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5600, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2853, '2020-04-08 09:26:18', '2020-09-28 00:40:33', 101, 'ITM000048', '', '', 'Professional Digital Marketing (Online)\r\n', 'Digital Marketing (Online)', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 9500, 0, NULL, 6000, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2856, '2020-07-12 01:49:19', '2020-07-11 19:59:56', 101, 'ITM000051', '', '', 'Graphics Design- Online\r\n', '', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 12000, 0, NULL, 6500, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2882, '2019-10-13 12:24:46', '2020-07-03 10:04:20', 102, 'ITM000043', '', '', 'Creative Graphics Design Course (Physical)\r\n', 'Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>\" >\" >Batch: B-2<br>Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 4500, 0, 15000, 0, NULL, 9000, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2883, '2019-10-13 12:24:46', '2021-03-15 10:26:35', 102, 'ITM000044', '', '', 'Advance Fundamental Computer Course (Physical)\r\n', '\r\nFind & Replace.</p>\r\n\r\n<h3><b>Class 04:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Table\r\n(columns, rows, heading)</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nDesign Table.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPicture tools</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nShape tools</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSmart Art, Charts\r\n& screenshot.</p>\r\n\r\n<p>vi)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nHeader, Footer,\r\nPage numbering, Date & Time</p>\r\n\r\n<p>vii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nText box, Word Art,\r\nDrop cap, Equation & Symbol.</p>\r\n\r\n<h3><b>Class 05:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Margins,\r\nOrientation. </p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Size, Columns\r\n& Break.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Watermark,\r\nColors & Borders.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPosition, Wrap,\r\nArrange.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nAlign, Group &\r\nRotation.</p>\r\n\r\n<h3><b>Class\r\n06:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBengali Typing</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSpelling &\r\nGrammar</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nWord count</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPages zoom in &\r\nout.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nRuler, View option</p>\r\n\r\n<h3><b>Class 07:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMaking modern\r\nResume using MS word Step by step.</p>\r\n\r\n<h3><b>Class 08:</b> ï¿½</h3><p><b>Practical\r\nExam in Lab</b></p>\r\n\r\n<p>ï¿½</p>\r\n\r\n<h3><b>Class 09:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMs Excel\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBasic function (+,\r\n-, *, /)</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nFixed Deposit</p>\r\n\r\n<h3><b>Class 10:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSalary Sheet</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nResult Sheet</p>\r\n\r\n<h3><b>Class 11:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nMS PowerPoint\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all options</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nAuto playing slides\r\nwith animations</p>\r\n\r\n<h3><b>Class 12:ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½  </b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Presentation\r\nwith animation</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nInsert video on\r\nPresentation.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nUse animation on\r\ntext.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSliding animation\r\nusing loop.</p>\r\n\r\n<h3><b>Class 13:</b>ï¿½ <b>Presentation Day</b><b></b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation on\r\nThyself [with selective topic]<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nArt of Presentation<b></b></p>\r\n\r\n<h3><b>Class 14:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation using\r\nSmartphone<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPhoto editing in\r\nSmartphone<b></b></p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMS Office picture\r\nmanager </p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  Assignment on photography</p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  <b>Photo\r\nContest on best capture, edit and presentation</b></p>\r\n\r\n<h3><b>Class 15:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nPhotoshop\r\nintroduction.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all tools\r\n& options.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nï¿½Create a sample drawing.</p>\r\n\r\n<h3><b>Class 16:</b>', 1, 'Package Products', 23, 'Education Prodcuts', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1100, 0, 7500, 0, NULL, 5600, 0, 0, '1', '[]', '[]', 0, '', 'anex.mgm@gmail.com', 'Live', NULL, 0, 0, 0),
(2884, '2019-10-13 12:24:46', '2020-07-03 10:00:29', 102, 'ITM000045', '', '', 'Professional Digital Marketing (Physical)\r\n', '<b>Annex\r\nDigital Marketing Course Details are given below:</b><br><br>\r\n<p><b>Class-01\r\nDigital Marketing Basics Introduction</b></p><b>Class-02:\r\nUsing Necessary Tools</b><p><b>Class-03\r\n: Digital & ecommerce marketing</b></p>\r\n<p><b>Class-04:\r\nSearch Engine Optimization</b></p>\r\n<p> </p><b>Class-05:\r\nGoogle Algorithm Updates</b><p><b>Class-06:\r\nKeyword Research and Analysis</b></p>\r\n<p><b>Class-07:\r\nKeyword Competition & Finalization of Keywords</b></p><b>Class-08:\r\nOn-site optimizations</b>\r\n\r\n\r\n\r\n<p><b>Class-09:\r\nContent Development & Optimization</b></p><b>Class-10:\r\nGoogle Webmaster Tools & Analytics</b><p><b>Class-11:\r\nOff-Page Optimizations</b></p>\r\n<p><b>Class-12\r\n: Social Media Marketing</b></p><p><b>Class-13:\r\nSocial  Media Marketing <br></b></p><p><b>Class - 14 : YouTube Marketing</b></p><p><b>Class\r\n- 15: YouTube Marketing</b></p>\r\n\r\n\r\n\r\n<p>\r\n\r\n</p><br><p>\r\n<br>\r\n\r\n</p>\r\n\r\n<br><br><br>', 1, 'Package Products', 23, 'Digital Marketing', 500, 'Training Courses', '', NULL, '', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1500, 0, 12000, 0, NULL, 6500, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2885, '2019-10-13 12:24:46', '2020-09-27 12:56:35', 102, 'ITM000046', '', '', 'Spoken English Course  (Physical)\r\n', '', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, 'featured', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5800, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2886, '2020-03-23 18:45:58', '2020-07-03 09:55:39', 102, 'ITM000047', '', '', 'Easy Spoken English- Online\r\n', 'Easy Spoken English- Online', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5600, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2887, '2020-04-07 21:26:18', '2020-09-27 12:40:33', 102, 'ITM000048', '', '', 'Professional Digital Marketing (Online)\r\n', 'Digital Marketing (Online)', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 9500, 0, NULL, 6000, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2888, '2020-07-11 13:49:19', '2020-07-11 07:59:56', 102, 'ITM000051', '', '', 'Graphics Design- Online\r\n', '', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 12000, 0, NULL, 6500, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2889, '2019-10-13 12:24:46', '2020-07-03 10:04:20', 103, 'ITM000043', '', '', 'Creative Graphics Design Course (Physical)\r\n', 'Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>\" >\" >Batch: B-2<br>Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 4500, 0, 15000, 0, NULL, 9000, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2890, '2019-10-13 12:24:46', '2021-03-15 10:26:35', 103, 'ITM000044', '', '', 'Advance Fundamental Computer Course (Physical)\r\n', '\r\nFind & Replace.</p>\r\n\r\n<h3><b>Class 04:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Table\r\n(columns, rows, heading)</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nDesign Table.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPicture tools</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nShape tools</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSmart Art, Charts\r\n& screenshot.</p>\r\n\r\n<p>vi)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nHeader, Footer,\r\nPage numbering, Date & Time</p>\r\n\r\n<p>vii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nText box, Word Art,\r\nDrop cap, Equation & Symbol.</p>\r\n\r\n<h3><b>Class 05:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Margins,\r\nOrientation. </p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Size, Columns\r\n& Break.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Watermark,\r\nColors & Borders.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPosition, Wrap,\r\nArrange.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nAlign, Group &\r\nRotation.</p>\r\n\r\n<h3><b>Class\r\n06:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBengali Typing</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSpelling &\r\nGrammar</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nWord count</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPages zoom in &\r\nout.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nRuler, View option</p>\r\n\r\n<h3><b>Class 07:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMaking modern\r\nResume using MS word Step by step.</p>\r\n\r\n<h3><b>Class 08:</b> ï¿½</h3><p><b>Practical\r\nExam in Lab</b></p>\r\n\r\n<p>ï¿½</p>\r\n\r\n<h3><b>Class 09:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMs Excel\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBasic function (+,\r\n-, *, /)</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nFixed Deposit</p>\r\n\r\n<h3><b>Class 10:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSalary Sheet</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nResult Sheet</p>\r\n\r\n<h3><b>Class 11:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nMS PowerPoint\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all options</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nAuto playing slides\r\nwith animations</p>\r\n\r\n<h3><b>Class 12:ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½  </b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Presentation\r\nwith animation</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nInsert video on\r\nPresentation.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nUse animation on\r\ntext.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSliding animation\r\nusing loop.</p>\r\n\r\n<h3><b>Class 13:</b>ï¿½ <b>Presentation Day</b><b></b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation on\r\nThyself [with selective topic]<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nArt of Presentation<b></b></p>\r\n\r\n<h3><b>Class 14:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation using\r\nSmartphone<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPhoto editing in\r\nSmartphone<b></b></p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMS Office picture\r\nmanager </p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  Assignment on photography</p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  <b>Photo\r\nContest on best capture, edit and presentation</b></p>\r\n\r\n<h3><b>Class 15:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nPhotoshop\r\nintroduction.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all tools\r\n& options.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nï¿½Create a sample drawing.</p>\r\n\r\n<h3><b>Class 16:</b>', 1, 'Package Products', 23, 'Education Prodcuts', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1100, 0, 7500, 0, NULL, 5600, 0, 0, '1', '[]', '[]', 0, '', 'anex.mgm@gmail.com', 'Live', NULL, 0, 0, 0),
(2891, '2019-10-13 12:24:46', '2020-07-03 10:00:29', 103, 'ITM000045', '', '', 'Professional Digital Marketing (Physical)\r\n', '<b>Annex\r\nDigital Marketing Course Details are given below:</b><br><br>\r\n<p><b>Class-01\r\nDigital Marketing Basics Introduction</b></p><b>Class-02:\r\nUsing Necessary Tools</b><p><b>Class-03\r\n: Digital & ecommerce marketing</b></p>\r\n<p><b>Class-04:\r\nSearch Engine Optimization</b></p>\r\n<p> </p><b>Class-05:\r\nGoogle Algorithm Updates</b><p><b>Class-06:\r\nKeyword Research and Analysis</b></p>\r\n<p><b>Class-07:\r\nKeyword Competition & Finalization of Keywords</b></p><b>Class-08:\r\nOn-site optimizations</b>\r\n\r\n\r\n\r\n<p><b>Class-09:\r\nContent Development & Optimization</b></p><b>Class-10:\r\nGoogle Webmaster Tools & Analytics</b><p><b>Class-11:\r\nOff-Page Optimizations</b></p>\r\n<p><b>Class-12\r\n: Social Media Marketing</b></p><p><b>Class-13:\r\nSocial  Media Marketing <br></b></p><p><b>Class - 14 : YouTube Marketing</b></p><p><b>Class\r\n- 15: YouTube Marketing</b></p>\r\n\r\n\r\n\r\n<p>\r\n\r\n</p><br><p>\r\n<br>\r\n\r\n</p>\r\n\r\n<br><br><br>', 1, 'Package Products', 23, 'Digital Marketing', 500, 'Training Courses', '', NULL, '', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1500, 0, 12000, 0, NULL, 6500, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2892, '2019-10-13 12:24:46', '2020-09-27 12:56:35', 103, 'ITM000046', '', '', 'Spoken English Course  (Physical)\r\n', '', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, 'featured', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5800, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2893, '2020-03-23 18:45:58', '2020-07-03 09:55:39', 103, 'ITM000047', '', '', 'Easy Spoken English- Online\r\n', 'Easy Spoken English- Online', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5600, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2894, '2020-04-07 21:26:18', '2020-09-27 12:40:33', 103, 'ITM000048', '', '', 'Professional Digital Marketing (Online)\r\n', 'Digital Marketing (Online)', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 9500, 0, NULL, 6000, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2895, '2020-07-11 13:49:19', '2020-07-11 07:59:56', 103, 'ITM000051', '', '', 'Graphics Design- Online\r\n', '', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 12000, 0, NULL, 6500, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2896, '2019-10-13 12:24:46', '2020-07-03 10:04:20', 104, 'ITM000043', '', '', 'Creative Graphics Design Course (Physical)\r\n', 'Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>\" >\" >Batch: B-2<br>Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 4500, 0, 15000, 0, NULL, 9000, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2897, '2019-10-13 12:24:46', '2021-03-15 10:26:35', 104, 'ITM000044', '', '', 'Advance Fundamental Computer Course (Physical)\r\n', '\r\nFind & Replace.</p>\r\n\r\n<h3><b>Class 04:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Table\r\n(columns, rows, heading)</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nDesign Table.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPicture tools</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nShape tools</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSmart Art, Charts\r\n& screenshot.</p>\r\n\r\n<p>vi)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nHeader, Footer,\r\nPage numbering, Date & Time</p>\r\n\r\n<p>vii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nText box, Word Art,\r\nDrop cap, Equation & Symbol.</p>\r\n\r\n<h3><b>Class 05:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Margins,\r\nOrientation. </p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Size, Columns\r\n& Break.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Watermark,\r\nColors & Borders.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPosition, Wrap,\r\nArrange.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nAlign, Group &\r\nRotation.</p>\r\n\r\n<h3><b>Class\r\n06:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBengali Typing</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSpelling &\r\nGrammar</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nWord count</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPages zoom in &\r\nout.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nRuler, View option</p>\r\n\r\n<h3><b>Class 07:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMaking modern\r\nResume using MS word Step by step.</p>\r\n\r\n<h3><b>Class 08:</b> ï¿½</h3><p><b>Practical\r\nExam in Lab</b></p>\r\n\r\n<p>ï¿½</p>\r\n\r\n<h3><b>Class 09:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMs Excel\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBasic function (+,\r\n-, *, /)</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nFixed Deposit</p>\r\n\r\n<h3><b>Class 10:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSalary Sheet</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nResult Sheet</p>\r\n\r\n<h3><b>Class 11:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nMS PowerPoint\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all options</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nAuto playing slides\r\nwith animations</p>\r\n\r\n<h3><b>Class 12:ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½  </b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Presentation\r\nwith animation</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nInsert video on\r\nPresentation.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nUse animation on\r\ntext.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSliding animation\r\nusing loop.</p>\r\n\r\n<h3><b>Class 13:</b>ï¿½ <b>Presentation Day</b><b></b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation on\r\nThyself [with selective topic]<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nArt of Presentation<b></b></p>\r\n\r\n<h3><b>Class 14:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation using\r\nSmartphone<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPhoto editing in\r\nSmartphone<b></b></p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMS Office picture\r\nmanager </p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  Assignment on photography</p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  <b>Photo\r\nContest on best capture, edit and presentation</b></p>\r\n\r\n<h3><b>Class 15:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nPhotoshop\r\nintroduction.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all tools\r\n& options.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nï¿½Create a sample drawing.</p>\r\n\r\n<h3><b>Class 16:</b>', 1, 'Package Products', 23, 'Education Prodcuts', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1100, 0, 7500, 0, NULL, 5600, 0, 0, '1', '[]', '[]', 0, '', 'anex.mgm@gmail.com', 'Live', NULL, 0, 0, 0),
(2898, '2019-10-13 12:24:46', '2020-07-03 10:00:29', 104, 'ITM000045', '', '', 'Professional Digital Marketing (Physical)\r\n', '<b>Annex\r\nDigital Marketing Course Details are given below:</b><br><br>\r\n<p><b>Class-01\r\nDigital Marketing Basics Introduction</b></p><b>Class-02:\r\nUsing Necessary Tools</b><p><b>Class-03\r\n: Digital & ecommerce marketing</b></p>\r\n<p><b>Class-04:\r\nSearch Engine Optimization</b></p>\r\n<p> </p><b>Class-05:\r\nGoogle Algorithm Updates</b><p><b>Class-06:\r\nKeyword Research and Analysis</b></p>\r\n<p><b>Class-07:\r\nKeyword Competition & Finalization of Keywords</b></p><b>Class-08:\r\nOn-site optimizations</b>\r\n\r\n\r\n\r\n<p><b>Class-09:\r\nContent Development & Optimization</b></p><b>Class-10:\r\nGoogle Webmaster Tools & Analytics</b><p><b>Class-11:\r\nOff-Page Optimizations</b></p>\r\n<p><b>Class-12\r\n: Social Media Marketing</b></p><p><b>Class-13:\r\nSocial  Media Marketing <br></b></p><p><b>Class - 14 : YouTube Marketing</b></p><p><b>Class\r\n- 15: YouTube Marketing</b></p>\r\n\r\n\r\n\r\n<p>\r\n\r\n</p><br><p>\r\n<br>\r\n\r\n</p>\r\n\r\n<br><br><br>', 1, 'Package Products', 23, 'Digital Marketing', 500, 'Training Courses', '', NULL, '', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1500, 0, 12000, 0, NULL, 6500, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2899, '2019-10-13 12:24:46', '2020-09-27 12:56:35', 104, 'ITM000046', '', '', 'Spoken English Course  (Physical)\r\n', '', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, 'featured', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5800, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2900, '2020-03-23 18:45:58', '2020-07-03 09:55:39', 104, 'ITM000047', '', '', 'Easy Spoken English- Online\r\n', 'Easy Spoken English- Online', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5600, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2901, '2020-04-07 21:26:18', '2020-09-27 12:40:33', 104, 'ITM000048', '', '', 'Professional Digital Marketing (Online)\r\n', 'Digital Marketing (Online)', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 9500, 0, NULL, 6000, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2902, '2020-07-11 13:49:19', '2020-07-11 07:59:56', 104, 'ITM000051', '', '', 'Graphics Design- Online\r\n', '', 1, 'Package Products', 23, NULL, 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1000, 0, 12000, 0, NULL, 6500, 0, 0, '1', NULL, NULL, 0, 'junayed@eannex.com', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2903, '2019-10-13 12:24:46', '2020-07-03 10:04:20', 105, 'ITM000043', '', '', 'Creative Graphics Design Course (Physical)\r\n', 'Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>\" >\" >Batch: B-2<br>Course Duration: 24 Classes ( 2 hours )<br>Course Start Date: 30-12-2018<br>Day: Sunday- Wednesday<br>Time: 6.15pm - 8.15pm<br>Venue: Computer Lab ( Dhaka Office )<br><br><br>', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 4500, 0, 15000, 0, NULL, 9000, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2904, '2019-10-13 12:24:46', '2021-03-15 10:26:35', 105, 'ITM000044', '', '', 'Advance Fundamental Computer Course (Physical)\r\n', '\r\nFind & Replace.</p>\r\n\r\n<h3><b>Class 04:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Table\r\n(columns, rows, heading)</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nDesign Table.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPicture tools</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nShape tools</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSmart Art, Charts\r\n& screenshot.</p>\r\n\r\n<p>vi)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nHeader, Footer,\r\nPage numbering, Date & Time</p>\r\n\r\n<p>vii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nText box, Word Art,\r\nDrop cap, Equation & Symbol.</p>\r\n\r\n<h3><b>Class 05:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Margins,\r\nOrientation. </p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Size, Columns\r\n& Break.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPage Watermark,\r\nColors & Borders.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPosition, Wrap,\r\nArrange.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nAlign, Group &\r\nRotation.</p>\r\n\r\n<h3><b>Class\r\n06:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBengali Typing</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSpelling &\r\nGrammar</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nWord count</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPages zoom in &\r\nout.</p>\r\n\r\n<p>v)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nRuler, View option</p>\r\n\r\n<h3><b>Class 07:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMaking modern\r\nResume using MS word Step by step.</p>\r\n\r\n<h3><b>Class 08:</b> ï¿½</h3><p><b>Practical\r\nExam in Lab</b></p>\r\n\r\n<p>ï¿½</p>\r\n\r\n<h3><b>Class 09:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMs Excel\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nBasic function (+,\r\n-, *, /)</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nFixed Deposit</p>\r\n\r\n<h3><b>Class 10:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSalary Sheet</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nResult Sheet</p>\r\n\r\n<h3><b>Class 11:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nMS PowerPoint\r\nintroduction & Usage.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all options</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nAuto playing slides\r\nwith animations</p>\r\n\r\n<h3><b>Class 12:ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½  </b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nCreate Presentation\r\nwith animation</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nInsert video on\r\nPresentation.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nUse animation on\r\ntext.</p>\r\n\r\n<p>iv)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nSliding animation\r\nusing loop.</p>\r\n\r\n<h3><b>Class 13:</b>ï¿½ <b>Presentation Day</b><b></b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation on\r\nThyself [with selective topic]<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nArt of Presentation<b></b></p>\r\n\r\n<h3><b>Class 14:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPresentation using\r\nSmartphone<b></b></p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nPhoto editing in\r\nSmartphone<b></b></p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½\r\nMS Office picture\r\nmanager </p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  Assignment on photography</p>\r\n\r\n<p><img width=\"19\" alt=\"\" height=\"19\">ï¿½  <b>Photo\r\nContest on best capture, edit and presentation</b></p>\r\n\r\n<h3><b>Class 15:</b></h3>\r\n\r\n<p>i)ï¿½ ï¿½ ï¿½ ï¿½ ï¿½ \r\nPhotoshop\r\nintroduction.</p>\r\n\r\n<p>ii)ï¿½ ï¿½ ï¿½ ï¿½ \r\nUsage of all tools\r\n& options.</p>\r\n\r\n<p>iii)ï¿½ ï¿½ ï¿½ \r\nï¿½Create a sample drawing.</p>\r\n\r\n<h3><b>Class 16:</b>', 1, 'Package Products', 23, 'Education Prodcuts', 500, 'Training Courses', '', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1100, 0, 7500, 0, NULL, 5600, 0, 0, '1', '[]', '[]', 0, '', 'anex.mgm@gmail.com', 'Live', NULL, 0, 0, 0),
(2905, '2019-10-13 12:24:46', '2020-07-03 10:00:29', 105, 'ITM000045', '', '', 'Professional Digital Marketing (Physical)\r\n', '<b>Annex\r\nDigital Marketing Course Details are given below:</b><br><br>\r\n<p><b>Class-01\r\nDigital Marketing Basics Introduction</b></p><b>Class-02:\r\nUsing Necessary Tools</b><p><b>Class-03\r\n: Digital & ecommerce marketing</b></p>\r\n<p><b>Class-04:\r\nSearch Engine Optimization</b></p>\r\n<p> </p><b>Class-05:\r\nGoogle Algorithm Updates</b><p><b>Class-06:\r\nKeyword Research and Analysis</b></p>\r\n<p><b>Class-07:\r\nKeyword Competition & Finalization of Keywords</b></p><b>Class-08:\r\nOn-site optimizations</b>\r\n\r\n\r\n\r\n<p><b>Class-09:\r\nContent Development & Optimization</b></p><b>Class-10:\r\nGoogle Webmaster Tools & Analytics</b><p><b>Class-11:\r\nOff-Page Optimizations</b></p>\r\n<p><b>Class-12\r\n: Social Media Marketing</b></p><p><b>Class-13:\r\nSocial  Media Marketing <br></b></p><p><b>Class - 14 : YouTube Marketing</b></p><p><b>Class\r\n- 15: YouTube Marketing</b></p>\r\n\r\n\r\n\r\n<p>\r\n\r\n</p><br><p>\r\n<br>\r\n\r\n</p>\r\n\r\n<br><br><br>', 1, 'Package Products', 23, 'Digital Marketing', 500, 'Training Courses', '', NULL, '', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1500, 0, 12000, 0, NULL, 6500, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0),
(2906, '2019-10-13 12:24:46', '2020-09-27 12:56:35', 105, 'ITM000046', '', '', 'Spoken English Course  (Physical)\r\n', '', 1, 'Package Products', 23, 'Education Product', 500, 'Training Courses', '', NULL, 'featured', NULL, NULL, NULL, NULL, '0', '0', NULL, 1, 'No', 'None', 'Stocking', 1, 1300, 0, 7500, 0, NULL, 5800, 0, 0, '1', '[]', '[]', 0, '', 'junayed@eannex.com', 'Live', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sesup`
--

CREATE TABLE `sesup` (
  `xsupsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime NOT NULL,
  `bizid` int(11) NOT NULL,
  `xemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zemail` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsup` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `xshort` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xorg` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd1` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xadd2` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcity` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xprovince` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xpostal` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcountry` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontact` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontactphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcontactmob` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtitle` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsupemail` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(14) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xfax` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xweburl` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xnid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxno` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbank` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbankbr` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbankacc` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `xgsup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xpricegroup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xsuptype` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `xdiscountpct` double DEFAULT NULL,
  `xcreditlimit` double DEFAULT NULL,
  `xcreditterms` int(3) DEFAULT NULL,
  `zactive` int(1) DEFAULT NULL,
  `xrecflag` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xsupprefix` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesup`
--

INSERT INTO `sesup` (`xsupsl`, `ztime`, `zutime`, `bizid`, `xemail`, `zemail`, `xsup`, `xshort`, `xorg`, `xadd1`, `xadd2`, `xcity`, `xprovince`, `xpostal`, `xcountry`, `xcontact`, `xcontactphone`, `xcontactmob`, `xtitle`, `xphone`, `xsupemail`, `xmobile`, `xfax`, `xweburl`, `xnid`, `xtaxno`, `xtaxscope`, `xbank`, `xbankbr`, `xbankacc`, `xgsup`, `xpricegroup`, `xsuptype`, `xdiscountpct`, `xcreditlimit`, `xcreditterms`, `zactive`, `xrecflag`, `xsupprefix`) VALUES
(71, '2019-07-20 11:58:58', '0000-00-00 00:00:00', 100, '', '', 'SUP0000001', 'DS', 'Default Supplier', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, '', '', '', 0, 0, 0, 1, 'Live', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sesupoutlet`
--

CREATE TABLE `sesupoutlet` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `bizid` int(6) NOT NULL,
  `xoutletsl` bigint(20) UNSIGNED NOT NULL,
  `xoutlet` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdesc` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsup` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xadd1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdistrict` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xthana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xsuffix` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xphone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setax`
--

CREATE TABLE `setax` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `xtaxcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xtaxcodealt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxpct` double NOT NULL,
  `bizid` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setax`
--

INSERT INTO `setax` (`xsl`, `xtaxcode`, `xtaxcodealt`, `xtaxpct`, `bizid`, `ztime`, `zutime`, `xemail`, `zemail`, `xrecflag`) VALUES
(3, 'TAX', '', 10, 100, '2018-03-16 09:47:58', NULL, NULL, 'rajib@dotbdsolutions.com', 'Live'),
(2, 'VAT', 'VATA', 4.5, 100, '2018-03-16 09:17:37', '2018-03-16 11:17:37', 'rajib@dotbdsolutions.com', 'rajib@dotbdsolutions.com', 'Live');

-- --------------------------------------------------------

--
-- Table structure for table `seuserlic`
--

CREATE TABLE `seuserlic` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `bizid` int(11) NOT NULL,
  `xlicnum` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xterminal` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xterminaluser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xusername` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemino` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `zactive` int(1) NOT NULL DEFAULT 0,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sodet`
--

CREATE TABLE `sodet` (
  `sodetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrowquot` int(5) NOT NULL DEFAULT 0,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL,
  `xcost` double NOT NULL,
  `xrate` double NOT NULL,
  `xtaxrate` double NOT NULL,
  `xunitsale` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `somst`
--

CREATE TABLE `somst` (
  `sosl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xsonum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdate` date NOT NULL,
  `xcus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xgrossdisc` double NOT NULL DEFAULT 0,
  `xnotes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusdoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live',
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL,
  `xvoucher` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xsalesacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ximaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ximacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvataccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xvatacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscaccdr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdiscacccr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soquot`
--

CREATE TABLE `soquot` (
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zutime` datetime DEFAULT NULL,
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bizid` int(6) NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xlastquot` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrefquot` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xdate` date NOT NULL,
  `xcus` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xgrossdisc` double NOT NULL DEFAULT 0,
  `xnotes` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `xcusdoc` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmanager` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrecflag` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Live'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soquotdet`
--

CREATE TABLE `soquotdet` (
  `quotdetsl` bigint(20) UNSIGNED NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bizid` int(6) NOT NULL,
  `xdate` date NOT NULL,
  `xquotnum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xcus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrow` int(5) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xitembatch` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xwh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xbranch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xproj` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xqty` double NOT NULL,
  `xrate` double NOT NULL,
  `xtaxrate` double NOT NULL,
  `xunitsale` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xtypestk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xexch` double NOT NULL,
  `xcur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` double NOT NULL,
  `xtaxcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtaxscope` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xyear` int(4) NOT NULL,
  `xper` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, '2021-09-27 05:57:20', 100, NULL, NULL, 'ITM000051', 1, 4, 'Theory: Introduction to Design and its various fields', '2021-09-30', 'https://www.youtube.com/watch?v=l5LIE5T128E&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo&index=4'),
(6, '2021-10-10 08:55:37', 101, 'rajib@dbs.com', NULL, 'ITM000048', 3, 225, '03: Canva Design All Details', '2021-10-10', 'https://www.youtube.com/watch?v=l5LIE5T128E&list=PLdWcYbFFqZr2vNb2XC4LmsbbjneZnbSwo&index=4');

-- --------------------------------------------------------

--
-- Table structure for table `support_answer`
--

CREATE TABLE `support_answer` (
  `xsl` bigint(20) NOT NULL,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `zutime` datetime DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xquesid` bigint(20) NOT NULL,
  `xdate` date NOT NULL,
  `xreplyid` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xanswer` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xrating` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support_answer`
--

INSERT INTO `support_answer` (`xsl`, `bizid`, `ztime`, `zemail`, `zutime`, `xemail`, `xquesid`, `xdate`, `xreplyid`, `xanswer`, `xrating`, `xstatus`) VALUES
(1, 101, '2021-10-10 12:43:02', '102', NULL, NULL, 3, '2021-10-10', '102', 'test answer e', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support_question`
--

CREATE TABLE `support_question` (
  `xquesid` bigint(20) NOT NULL,
  `bizid` int(6) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `zemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zutime` datetime DEFAULT NULL,
  `xdate` date DEFAULT NULL,
  `xemail` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xtime` time NOT NULL,
  `xstudent` int(11) NOT NULL,
  `xitemcode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xbatch` int(6) NOT NULL,
  `xtitle` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdescription` varchar(3000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unsolved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support_question`
--

INSERT INTO `support_question` (`xquesid`, `bizid`, `ztime`, `zemail`, `zutime`, `xdate`, `xemail`, `xtime`, `xstudent`, `xitemcode`, `xbatch`, `xtitle`, `xdescription`, `xstatus`) VALUES
(3, 101, '2021-09-30 17:56:11', '1', NULL, '2021-09-30', NULL, '11:56:11', 48, 'ITM000048', 4, 'About illustrator', 'How to install illustrator?', 'unsolved'),
(4, 101, '2021-10-07 06:43:23', '1', NULL, '2021-10-07', NULL, '12:43:23', 46, 'ITM000048', 5, 'Fgfd', 'Fgvvx', 'unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `temp_sales`
--

CREATE TABLE `temp_sales` (
  `xsl` int(11) NOT NULL,
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xdate` date NOT NULL,
  `xcustomertype` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `xcourse` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xrate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xqty` int(6) NOT NULL DEFAULT 0,
  `xpoint` decimal(10,2) NOT NULL DEFAULT 0.00,
  `xcountry` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xmobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `xpassword` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `xemail` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xaddress` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `xcupon` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdoctype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `xdisc` decimal(8,2) NOT NULL DEFAULT 0.00,
  `xpaymethod` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `xtemptxn` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `xstatus` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `xpayref` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xdistrict` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `xthana` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `temp_sales`
--

INSERT INTO `temp_sales` (`xsl`, `ztime`, `xdate`, `xcustomertype`, `xcourse`, `xrate`, `xqty`, `xpoint`, `xcountry`, `xmobile`, `xpassword`, `xname`, `xemail`, `xaddress`, `xcupon`, `xdoctype`, `xdisc`, `xpaymethod`, `xtemptxn`, `xstatus`, `xpayref`, `xdistrict`, `xthana`) VALUES
(1, '2021-02-11 17:51:52', '2021-02-11', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Åland Islands', '01841923270', NULL, 'Md Rajibul Islam', 'abc@abc.com', 'Dhakak', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60256eb8c44fa', 'Created', NULL, 'Dhaka', 'Dhaka'),
(2, '2021-02-12 04:55:51', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Åland Islands', '01841923270', NULL, 'Md Rajibul Islam', 'abc@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260a5743a99', 'Created', NULL, 'Dhaka', 'Dhaka'),
(3, '2021-02-12 04:59:14', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01841923270', NULL, 'Md Rajibul ISlam', 'abc@abc.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260b2272e44', 'Created', NULL, 'Dhaka', 'Dhaka'),
(4, '2021-02-12 05:06:07', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260cbfc5c4a', 'Created', NULL, 'DHAKA', 'DHAKA'),
(5, '2021-02-12 05:07:39', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260d1bb2c2e', 'Created', NULL, 'DHAKA', 'DHAKA'),
(6, '2021-02-12 05:10:02', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260daa81df9', 'Created', NULL, 'DHAKA', 'DHAKA'),
(7, '2021-02-12 05:12:50', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260e527f230', 'Created', NULL, 'DHAKA', 'DHAKA'),
(8, '2021-02-12 05:14:35', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260ebbaf963', 'Created', NULL, 'DHAKA', 'DHAKA'),
(9, '2021-02-12 05:17:24', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60260f64488eb', 'Created', NULL, 'DHAKA', 'DHAKA'),
(10, '2021-02-12 05:20:06', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602610062fb8c', 'Created', NULL, 'DHAKA', 'DHAKA'),
(11, '2021-02-12 05:23:29', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602610d1572a3', 'Created', NULL, 'DHAKA', 'DHAKA'),
(12, '2021-02-12 05:41:18', '2021-02-12', 'Amarbazar', '1', '12000.00', 7, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602614fe6bc4e', 'Created', NULL, 'DHAKA', 'DHAKA'),
(13, '2021-02-12 06:05:40', '2021-02-12', 'Amarbazar', '1', '12000.00', 7, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60261ab4bb6a3', 'Created', NULL, 'DHAKA', 'DHAKA'),
(14, '2021-02-12 06:09:41', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60261ba5bf516', 'Created', NULL, 'DHAKA', 'DHAKA'),
(15, '2021-02-12 06:13:52', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60261ca08a076', 'Created', NULL, '', ''),
(16, '2021-02-12 06:14:49', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60261cd902788', 'Created', NULL, 'DHAKA', 'DHAKA'),
(17, '2021-02-12 08:32:45', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263d2d3890c', 'Created', NULL, 'DHAKA', 'DHAKA'),
(18, '2021-02-12 08:33:17', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263d4d4255b', 'Created', NULL, 'DHAKA', 'DHAKA'),
(19, '2021-02-12 08:33:30', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263d5aa4413', 'Created', NULL, 'DHAKA', 'DHAKA'),
(20, '2021-02-12 08:35:57', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263ded2d92d', 'Created', NULL, '', ''),
(21, '2021-02-12 08:36:20', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e0428bd2', 'Created', NULL, '', ''),
(22, '2021-02-12 08:36:24', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e08ee253', 'Created', NULL, '', ''),
(23, '2021-02-12 08:36:29', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e0df1a08', 'Created', NULL, '', ''),
(24, '2021-02-12 08:37:21', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e41d4b87', 'Created', NULL, '', ''),
(25, '2021-02-12 08:38:20', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e7c1dbb0', 'Created', NULL, '', ''),
(26, '2021-02-12 08:38:25', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263e81242e5', 'Created', NULL, '', ''),
(27, '2021-02-12 08:38:58', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263ea2701f3', 'Created', NULL, '', ''),
(28, '2021-02-12 08:39:07', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263eab31f3f', 'Created', NULL, '', ''),
(29, '2021-02-12 08:40:22', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263ef6a0177', 'Created', NULL, '', ''),
(30, '2021-02-12 08:41:48', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263f4c574ed', 'Created', NULL, '', ''),
(31, '2021-02-12 08:42:20', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263f6cbf256', 'Created', NULL, '', ''),
(32, '2021-02-12 08:43:28', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60263fb09a12c', 'Created', NULL, '', ''),
(33, '2021-02-12 09:12:26', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6026467adf7ed', 'Created', NULL, '', ''),
(34, '2021-02-12 09:18:25', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602647e10a46c', 'Created', NULL, '', ''),
(35, '2021-02-12 09:18:35', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Select Country', '', NULL, '', '', '', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602647eb1f97b', 'Created', NULL, '', ''),
(36, '2021-02-12 09:29:48', '2021-02-12', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60264a8c6a0c9', 'Created', NULL, 'DHAKA', 'DHAKA'),
(37, '2021-02-13 06:38:17', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602773d9bbccc', 'Created', NULL, 'DHAKA', 'DHAKA'),
(38, '2021-02-13 06:40:21', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027745575589', 'Created', NULL, 'DHAKA', 'DHAKA'),
(39, '2021-02-13 06:43:59', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027752fce061', 'Created', NULL, 'DHAKA', 'DHAKA'),
(40, '2021-02-13 06:46:11', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602775b3986cc', 'Created', NULL, 'DHAKA', 'DHAKA'),
(41, '2021-02-13 06:50:43', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602776c35c4ae', 'Created', NULL, 'DHAKA', 'DHAKA'),
(42, '2021-02-13 06:56:13', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027780da406e', 'Created', NULL, 'DHAKA', 'DHAKA'),
(43, '2021-02-13 06:57:57', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60277875ba9a2', 'Created', NULL, 'DHAKA', 'DHAKA'),
(44, '2021-02-13 06:58:21', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027788db2596', 'Created', NULL, 'DHAKA', 'DHAKA'),
(45, '2021-02-13 07:01:50', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027795e0dd27', 'Created', NULL, 'DHAKA', 'DHAKA'),
(46, '2021-02-13 07:02:30', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027798665e3f', 'Created', NULL, 'DHAKA', 'DHAKA'),
(47, '2021-02-13 07:04:26', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01715122507', NULL, 'Md Rajibul ISlam', 'ut_pol@yahoo.com', '19/1 RING ROAD', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602779fa91506', 'Created', NULL, 'DHAKA', 'DHAKA'),
(48, '2021-02-13 07:32:43', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01621177777', NULL, 'Mr abc', 'abc@abc.com', 'dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027809baae63', 'Created', NULL, 'no city', 'no city'),
(49, '2021-02-13 07:39:02', '2021-02-13', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01621177777', NULL, 'Mr abc', 'abc@abc.com', 'dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6027821615bd2', 'Created', NULL, 'no city', 'no city'),
(50, '2021-02-17 03:16:27', '2021-02-17', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '00000000000', NULL, 'Md', 'a@s', 'dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602c8a8b31557', 'Created', NULL, '', ''),
(51, '2021-02-17 03:18:27', '2021-02-17', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '00000000000', NULL, 'md', 'a@a', 'dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602c8b03e7ad1', 'Created', NULL, 'BARISHAL', 'BARISHAL'),
(52, '2021-02-17 03:40:41', '2021-02-17', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01712923270', '123456', 'Rajib', 'a@s.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602c903902a6c', 'Created', NULL, 'DHAKA', 'DHAKA'),
(53, '2021-02-17 03:52:31', '2021-02-17', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '01712923270', '', 'Rajib', 'a@s.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL602c92ff983d6', 'Created', NULL, 'no city', 'no city'),
(54, '2021-02-25 06:53:33', '2021-02-25', 'Amarbazar', '1', '12000.00', 1, '0.00', 'Bangladesh', '00000000000', '123456', 'aaaa', 'a@a.com', 'ddd', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL6037496d7b1ed', 'Created', NULL, 'BARISHAL', 'BARISHAL'),
(55, '2021-02-25 06:56:46', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '123456', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60374a2e569ba', 'Created', NULL, 'DHAKA', 'DHAKA'),
(56, '2021-02-25 07:07:43', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01712615116', 'polurpt', 'Md. Rahadul Islam', 'rahadul.islam@kai-wt.com', '42, niketon', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60374cbf8b345', 'Created', NULL, 'DHAKA', 'DHAKA'),
(57, '2021-02-25 07:15:07', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01712615116', 'polurpt', 'Md. Rahadul Islam', 'rahadul.islam@kai-wt.com', '42, niketon', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60374e7b1f246', 'Created', NULL, 'DHAKA', 'DHAKA'),
(58, '2021-02-25 07:25:21', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01712615116', 'polurpt', 'Md. Rahadul Islam', 'rahadul.islam@kai-wt.com', '42, niketon', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL603750e124c6e', 'Created', NULL, 'DHAKA', 'DHAKA'),
(59, '2021-02-25 08:24:31', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60375ebf84184', 'Created', NULL, 'no city', 'no city'),
(60, '2021-02-25 08:25:26', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60375ef60a2d2', 'Created', NULL, 'no city', 'no city'),
(61, '2021-02-25 10:07:17', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603776d533955', 'Created', NULL, 'no city', 'no city'),
(62, '2021-02-25 10:07:46', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603776f22afce', 'Created', NULL, 'no city', 'no city'),
(63, '2021-02-25 10:07:48', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603776f4d3666', 'Created', NULL, 'no city', 'no city'),
(64, '2021-02-25 10:08:07', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL603777071b5f0', 'Created', NULL, 'no city', 'no city'),
(65, '2021-02-25 10:43:21', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60377f49600cd', 'Created', NULL, 'no city', 'no city'),
(66, '2021-02-25 10:48:16', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL603780702ddfb', 'Created', NULL, 'no city', 'no city'),
(67, '2021-02-25 11:26:25', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6037896146819', 'Created', NULL, 'no city', 'no city'),
(68, '2021-02-25 11:28:01', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603789c1e9c0d', 'Created', NULL, 'no city', 'no city'),
(69, '2021-02-25 11:30:01', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60378a397f2ce', 'Created', NULL, 'no city', 'no city'),
(70, '2021-02-25 11:32:51', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60378ae3b84da', 'Created', NULL, 'no city', 'no city'),
(71, '2021-02-25 11:33:42', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60378b16372b8', 'Created', NULL, 'no city', 'no city'),
(72, '2021-02-25 11:43:15', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60378d53766ff', 'Created', NULL, 'no city', 'no city'),
(73, '2021-02-25 13:47:37', '2021-02-25', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6037aa7984477', 'Created', NULL, 'no city', 'no city'),
(74, '2021-02-26 14:56:36', '2021-02-26', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60390c245bed4', 'Created', NULL, 'no city', 'no city'),
(75, '2021-02-26 17:27:58', '2021-02-26', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'a@a.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '60392f9e241b6', 'Created', NULL, 'no city', 'no city'),
(76, '2021-02-28 07:19:23', '2021-02-28', 'Amarbazar', '1', '12.00', 1, '0.00', 'Bangladesh', '01621177777', '123456', 'Md Ashraful Amin', 'a@a.com', 'dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603b43fb0f415', 'Created', NULL, 'DHAKA', 'DHAKA'),
(77, '2021-02-28 10:32:46', '2021-02-28', 'Amarbazar', '7', '600.00', 1, '25.00', 'Bangladesh', '01883671517', '123456', 'AKM Shohidul Hoque', 'bdnewvision@gmail.com', 'Amarbazar Chittagong', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603b714e37983', 'Created', NULL, 'CHATTOGRAM', 'CHATTOGRAM'),
(78, '2021-02-28 12:22:06', '2021-02-28', 'Amarbazar', '7', '10.00', 1, '0.00', 'Bangladesh', '01841923270', '123456', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603b8aee8ea23', 'Created', NULL, 'DHAKA', 'DHAKA'),
(79, '2021-02-28 12:25:15', '2021-02-28', 'Amarbazar', '7', '10.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603b8babb4a83', 'Created', NULL, 'no city', 'no city'),
(80, '2021-02-28 19:24:12', '2021-03-01', 'Amarbazar', '7', '10.00', 1, '0.00', 'Bangladesh', '01673221190', 'dimbhaji.54', 'Rajash Dey', 'rajashdey@gmail.com', 'Novo colony, mohajon ghata', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603beddca0f2b', 'Created', NULL, 'CHATTOGRAM', 'CHATTOGRAM'),
(81, '2021-03-01 06:32:30', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603c8a7e090e9', 'Created', NULL, 'no city', 'no city'),
(82, '2021-03-01 06:34:11', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603c8ae3b807c', 'Created', NULL, 'no city', 'no city'),
(83, '2021-03-01 06:37:59', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603c8bc7e7712', 'Created', NULL, 'no city', 'no city'),
(84, '2021-03-01 07:15:37', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603c94993f369', 'Created', NULL, 'no city', 'no city'),
(85, '2021-03-01 07:19:54', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603c959a7ab7c', 'Created', NULL, 'no city', 'no city'),
(86, '2021-03-01 08:18:39', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603ca35fb2fa5', 'Created', NULL, 'no city', 'no city'),
(87, '2021-03-01 08:41:52', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '0.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603ca8d077b67', 'Created', NULL, 'no city', 'no city'),
(88, '2021-03-01 08:45:21', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603ca9a1ef641', 'Created', NULL, 'no city', 'no city'),
(89, '2021-03-01 08:53:00', '2021-03-01', 'Amarbazar', '7', '600.00', 1, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL603cab6c0d217', 'Created', NULL, 'no city', 'no city'),
(90, '2021-03-01 11:32:50', '2021-03-01', 'Amarbazar', '8', '500.00', 1, '25.00', 'Bangladesh', '01621177777', '123456', 'Md asHRAFUL aMIN', 'ASHRAFULAMINPDL@GMAIL.COM', '35/C KASFIA FLAZA', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603cd0e237b28', 'Created', NULL, 'DHAKA', 'DHAKA'),
(91, '2021-03-02 10:01:09', '2021-03-02', 'Amarbazar', '8', '500.00', 3, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '603e0ce58187b', 'Created', NULL, 'no city', 'no city'),
(92, '2021-03-04 10:49:30', '2021-03-04', 'Amarbazar', '9', '4000.00', 1, '250.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6040bb3a41fbf', 'Created', NULL, 'no city', 'no city'),
(93, '2021-03-04 10:50:52', '2021-03-04', 'Amarbazar', '9', '4000.00', 1, '250.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6040bb8cf28a4', 'Created', NULL, 'no city', 'no city'),
(94, '2021-03-04 12:21:08', '2021-03-04', 'Amarbazar', '8', '500.00', 1, '25.00', 'Bangladesh', '01611479212', '123456', 'Masud', 'masud9210@gmail.com', 'Head office', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6040d0b46240a', 'Created', NULL, 'DHAKA', 'DHAKA'),
(95, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '8', '500.00', 1, '25.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(96, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 248, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(97, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 247, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(98, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 246, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(99, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 245, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(100, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 244, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(101, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 243, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(102, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 242, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(103, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 241, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(104, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 240, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(105, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 239, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(106, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 238, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(107, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 237, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(108, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 236, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(109, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 235, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(110, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 234, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(111, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 233, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(112, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 232, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(113, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 231, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(114, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 230, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(115, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 229, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(116, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 228, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(117, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 227, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(118, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 226, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(119, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 225, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(120, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 224, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(121, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 223, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(122, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 222, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(123, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 221, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(124, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 220, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(125, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 219, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(126, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 218, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(127, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 217, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(128, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 216, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(129, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 215, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(130, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 214, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(131, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 213, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(132, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 212, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(133, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 211, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(134, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 210, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(135, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 209, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(136, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 208, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(137, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 207, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(138, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 206, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(139, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 205, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(140, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 204, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(141, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 203, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(142, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 202, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(143, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 201, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(144, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 200, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(145, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 199, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(146, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 198, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(147, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 197, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(148, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 196, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(149, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 195, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(150, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 194, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(151, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 193, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(152, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 192, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(153, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 191, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(154, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 190, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(155, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 189, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(156, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 188, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(157, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 187, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(158, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 186, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(159, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 185, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(160, '2021-03-09 05:42:38', '2021-03-09', 'Amarbazar', '9', '4000.00', 184, '250.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60470ace86c33', 'Created', NULL, 'no city', 'no city'),
(161, '2021-03-16 10:59:46', '2021-03-16', 'Amarbazar', '8', '500.00', 1, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL60508fa2ad467', 'Created', NULL, 'no city', 'no city'),
(162, '2021-04-02 07:22:44', '2021-04-02', 'Amarbazar', '10', '500.00', 1, '25.00', 'Bangladesh', '01621177777', '', 'Md asHRAFUL aMIN', 'ashrafulaminpdl@gmail.com', '27 Court house Street dhaka-1100', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6066c644a108d', 'Created', NULL, 'no city', 'no city'),
(163, '2021-09-08 09:32:03', '2021-09-08', 'Amarbazar', '10', '500.00', 1, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'SSLCOMMERZE', 'SSL613883135778c', 'Created', NULL, 'no city', 'no city'),
(164, '2021-09-09 06:33:27', '2021-09-09', 'Amarbazar', '10', '500.00', 2, '25.00', 'Bangladesh', '01841923270', '', 'Md Rajibul Islam', 'mdrajibdbs@gmail.com', 'Dhaka', 'No Coupon', 'Online Sales', '0.00', 'Nagad', '6139aab7689c2', 'Created', NULL, 'no city', 'no city');

-- --------------------------------------------------------

--
-- Table structure for table `userbase`
--

CREATE TABLE `userbase` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `login_name` varchar(255) DEFAULT NULL,
  `login_pass` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_father` varchar(255) DEFAULT NULL,
  `user_mother` varchar(255) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `user_parent` int(11) DEFAULT NULL,
  `user_package` int(11) DEFAULT NULL,
  `user_sponsor` varchar(255) DEFAULT NULL,
  `user_placement` varchar(255) DEFAULT NULL,
  `up_id` int(11) NOT NULL,
  `position` varchar(45) DEFAULT NULL,
  `left_id` int(11) DEFAULT NULL,
  `right_id` int(11) DEFAULT NULL,
  `user_cell_no` varchar(128) DEFAULT NULL,
  `nid` varchar(128) DEFAULT NULL,
  `balance` decimal(15,3) NOT NULL DEFAULT 0.000,
  `income_balance` decimal(15,3) NOT NULL DEFAULT 0.000,
  `point` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_type` tinyint(4) DEFAULT NULL,
  `lft` varchar(128) DEFAULT NULL,
  `rgt` varchar(128) DEFAULT NULL,
  `join_pin` varchar(128) DEFAULT NULL,
  `admin_id` tinyint(4) DEFAULT 0,
  `country_id` tinyint(4) DEFAULT 0,
  `state_id` tinyint(4) DEFAULT 0,
  `district_id` tinyint(4) DEFAULT 0,
  `zip_code` varchar(128) DEFAULT NULL,
  `branch` varchar(128) DEFAULT NULL,
  `branch_code` varchar(128) DEFAULT NULL,
  `user_created_date` varchar(255) DEFAULT NULL,
  `user_incentive` varchar(255) DEFAULT NULL,
  `user_incentive_recieved` int(11) DEFAULT NULL,
  `user_last_ip` varchar(255) DEFAULT NULL,
  `user_last_login` varchar(255) DEFAULT NULL,
  `user_login_count` mediumint(9) DEFAULT NULL,
  `user_is_active` tinyint(3) UNSIGNED DEFAULT 0,
  `user_level` varchar(255) DEFAULT NULL,
  `level_code` varchar(128) DEFAULT NULL,
  `level_type` varchar(128) DEFAULT NULL,
  `user_created_unix` date DEFAULT NULL,
  `user_pin` varchar(255) DEFAULT NULL,
  `pass_decrypt` varchar(255) DEFAULT NULL,
  `upgrade_date` date DEFAULT NULL,
  `user_active_ssid` varchar(255) DEFAULT NULL,
  `enbale_otp` int(11) DEFAULT NULL,
  `otp_choice` int(1) DEFAULT NULL,
  `gotp_key` varchar(255) DEFAULT NULL,
  `otp_category_id` int(11) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `is_banned` int(1) NOT NULL DEFAULT 0,
  `zemail` varchar(250) DEFAULT NULL,
  `user_agreed` tinyint(1) NOT NULL DEFAULT 0,
  `district` varchar(250) DEFAULT NULL,
  `upazilla` varchar(250) DEFAULT NULL,
  `xcus` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userbase`
--

INSERT INTO `userbase` (`user_id`, `login_name`, `login_pass`, `user_name`, `user_email`, `user_father`, `user_mother`, `user_address`, `user_parent`, `user_package`, `user_sponsor`, `user_placement`, `up_id`, `position`, `left_id`, `right_id`, `user_cell_no`, `nid`, `balance`, `income_balance`, `point`, `user_type`, `lft`, `rgt`, `join_pin`, `admin_id`, `country_id`, `state_id`, `district_id`, `zip_code`, `branch`, `branch_code`, `user_created_date`, `user_incentive`, `user_incentive_recieved`, `user_last_ip`, `user_last_login`, `user_login_count`, `user_is_active`, `user_level`, `level_code`, `level_type`, `user_created_unix`, `user_pin`, `pass_decrypt`, `upgrade_date`, `user_active_ssid`, `enbale_otp`, `otp_choice`, `gotp_key`, `otp_category_id`, `otp`, `is_banned`, `zemail`, `user_agreed`, `district`, `upazilla`, `xcus`) VALUES
(94380, 'Junayed07', '9dbcc1f3aef12b8e0231add6fcaae55bb8ea16d03d0982515bdf298c780c344d', 'Md Junayed Hasan', 'junayed.annex@gmail.com', '', '', '', 154, 9, 'Bringit01', 'Abubakar008', 94372, 'R', 104483, 104486, '01918200626', '5515209533', '1236.310', '1.375', '0.40', 2, NULL, NULL, 'EU4J9X1GWFR0D ', 0, 1, 1, 8, '1212', '2', 'HQDHK', '2017-09-01 16:18:33', '', 0, '182.160.117.83', '2019-10-28 19:09:04', 171, 1, 'Freelance Marketer', 'FM', NULL, '2017-09-01', '6615', NULL, '2017-09-23', NULL, 0, 0, NULL, 0, '0', 0, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vcustomerbal`
-- (See below for the actual view)
--
CREATE TABLE `vcustomerbal` (
`bizid` int(6)
,`xaccsub` varchar(20)
,`xbal` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vdoreturndt`
-- (See below for the actual view)
--
CREATE TABLE `vdoreturndt` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xsonum` varchar(20)
,`xcus` varchar(20)
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xreqdeldetsl` bigint(20) unsigned
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xreturnqty` double
,`xrate` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xdisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgldetailinterface`
-- (See below for the actual view)
--
CREATE TABLE `vgldetailinterface` (
`ztime` timestamp
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xrow` int(3)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xdoctype` varchar(30)
,`xstatus` varchar(11)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(1000)
,`xmanager` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xaccsub` varchar(20)
,`xproj` varchar(100)
,`xsec` varchar(100)
,`xdiv` varchar(100)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xcheque` varchar(50)
,`xchequedate` date
,`xflag` varchar(20)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(100)
,`xrecflag` varchar(15)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglheader`
-- (See below for the actual view)
--
CREATE TABLE `vglheader` (
`xsl` bigint(20) unsigned
,`ztime` timestamp
,`zutime` datetime
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xdate` date
,`xnarration` varchar(250)
,`xref` varchar(100)
,`xlong` varchar(250)
,`xchequeno` varchar(50)
,`xyear` int(4)
,`xper` int(2)
,`xstatusjv` varchar(20)
,`zemail` varchar(100)
,`xemail` varchar(100)
,`xbranch` varchar(50)
,`xsite` varchar(50)
,`xdoctype` varchar(30)
,`xdocnum` varchar(20)
,`xapprovedby` varchar(1000)
,`xmanager` varchar(20)
,`xapprvstatus` varchar(20)
,`xrecflag` varchar(15)
,`xdramt` double
,`xcramt` double
,`xstatus` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsales`
-- (See below for the actual view)
--
CREATE TABLE `vglsales` (
`bizid` int(6)
,`xvoucher` varchar(20)
,`xsonum` varchar(20)
,`ztime` timestamp
,`xcus` varchar(50)
,`xdate` date
,`xyear` int(4)
,`xper` int(2)
,`xmanager` varchar(50)
,`xproj` varchar(50)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xcosttotal` double
,`xsubtotal` double
,`xtaxtotal` double
,`xdisctotal` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsalesdetail`
-- (See below for the actual view)
--
CREATE TABLE `vglsalesdetail` (
`bizid` int(6)
,`ztime` timestamp
,`xvoucher` varchar(20)
,`xdocnum` varchar(20)
,`xinvnum` varchar(20)
,`xrecflag` varchar(4)
,`xsalesparson` varchar(50)
,`xproj` varchar(50)
,`xdoctype` varchar(11)
,`xaccsub` varchar(50)
,`xdate` date
,`xyear` int(4)
,`xper` int(2)
,`xrow` int(1)
,`xacc` varchar(20)
,`xprime` double
,`xflag` varchar(5)
,`xstatus` varchar(8)
,`xnarration` varchar(58)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vglsalesinterface`
-- (See below for the actual view)
--
CREATE TABLE `vglsalesinterface` (
`ztime` timestamp
,`bizid` int(6)
,`xvoucher` varchar(20)
,`xrow` int(1)
,`xdate` date
,`xnarration` varchar(58)
,`xref` char(0)
,`xchequeno` char(0)
,`xyear` int(4)
,`xper` int(2)
,`zemail` char(0)
,`xemail` char(0)
,`xbranch` varchar(50)
,`xdoctype` varchar(11)
,`xstatus` varchar(8)
,`xdocnum` varchar(20)
,`xapprovedby` char(0)
,`xmanager` char(0)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xacctype` varchar(50)
,`xaccusage` varchar(50)
,`xaccsource` varchar(100)
,`xaccsub` varchar(50)
,`xproj` varchar(50)
,`xsec` char(0)
,`xdiv` char(0)
,`xcur` varchar(3)
,`xbase` int(1)
,`xprime` double
,`xcheque` char(0)
,`xchequedate` char(0)
,`xflag` varchar(5)
,`xinvnum` varchar(20)
,`xsalesparson` varchar(50)
,`xrecflag` varchar(4)
,`xacclevel1` varchar(100)
,`xacclevel2` varchar(100)
,`xacclevel3` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgrndet`
-- (See below for the actual view)
--
CREATE TABLE `vgrndet` (
`bizid` int(6)
,`xgrnsl` bigint(20) unsigned
,`ztime` timestamp
,`xgrnnum` varchar(20)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqtypur` double
,`xextqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xtypestk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vgrnreturndet`
-- (See below for the actual view)
--
CREATE TABLE `vgrnreturndet` (
`bizid` int(6)
,`xgrnsl` bigint(20) unsigned
,`ztime` timestamp
,`xgrnnum` varchar(20)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xgrndetsl` bigint(20) unsigned
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqtypur` double
,`xextqty` double
,`xreturnqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreqdeldet`
-- (See below for the actual view)
--
CREATE TABLE `vimreqdeldet` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xsonum` varchar(20)
,`xcus` varchar(20)
,`xgrossdisc` double
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xrate` double
,`xstdcost` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xtaxamt` double
,`xdisc` double
,`xdiscamt` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreqdet`
-- (See below for the actual view)
--
CREATE TABLE `vimreqdet` (
`ztime` timestamp
,`bizid` int(6)
,`zemail` varchar(100)
,`ximreqnum` varchar(20)
,`xdate` date
,`xrdin` varchar(20)
,`xreqby` varchar(50)
,`xmobile` varchar(14)
,`xsup` varchar(20)
,`xitemdesc` varchar(500)
,`xstdcost` double
,`xunitstk` varchar(10)
,`xdeladd` varchar(250)
,`xstatus` varchar(20)
,`xbranch` varchar(100)
,`xrow` int(5)
,`stno` int(8)
,`xitemcode` varchar(20)
,`xqty` double
,`xrate` double
,`xyear` int(4)
,`xper` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimreturndet`
-- (See below for the actual view)
--
CREATE TABLE `vimreturndet` (
`bizid` int(6)
,`ztime` timestamp
,`xreqdelnum` varchar(20)
,`xdoreturnnum` varchar(20)
,`xcus` varchar(20)
,`xreturndetsl` bigint(20) unsigned
,`xsup` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xrate` double
,`xratepur` double
,`xunit` varchar(20)
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xdisc` double
,`xstdcost` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimstock`
-- (See below for the actual view)
--
CREATE TABLE `vimstock` (
`bizid` int(6)
,`xwh` varchar(50)
,`xitemcode` varchar(20)
,`xqtypo` double
,`xqty` decimal(42,0)
,`xqtyso` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimtransferdet`
-- (See below for the actual view)
--
CREATE TABLE `vimtransferdet` (
`ztime` timestamp
,`bizid` int(6)
,`zemail` varchar(100)
,`xdate` date
,`ximptnum` varchar(20)
,`xdoctype` varchar(50)
,`xstatus` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xsup` varchar(20)
,`xrow` int(5)
,`xwh` varchar(50)
,`xtxnwh` varchar(50)
,`xbranch` varchar(100)
,`xproj` varchar(50)
,`xitemcode` varchar(20)
,`xitembatch` varchar(30)
,`xitemdesc` varchar(500)
,`xqty` double
,`xunit` varchar(20)
,`xstdcost` double
,`xsign` int(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vimtrn`
-- (See below for the actual view)
--
CREATE TABLE `vimtrn` (
`ztime` timestamp
,`bizid` int(6)
,`xdate` date
,`xtxnnum` varchar(20)
,`xsup` varchar(20)
,`xrow` int(5)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xitemcode` varchar(20)
,`xitembatch` varchar(20)
,`xitemdesc` varchar(500)
,`xqtypo` double
,`xunitpur` varchar(20)
,`xqty` int(1)
,`xextqty` int(1)
,`xunitstk` char(0)
,`xqtyso` int(1)
,`xratepur` double
,`xconversion` double
,`xstdcost` int(1)
,`xstdprice` int(1)
,`xdisc` double
,`xdoctype` varchar(14)
,`zemail` varchar(100)
,`xsignpo` int(1)
,`xsign` int(1)
,`xsignso` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vitemcost`
-- (See below for the actual view)
--
CREATE TABLE `vitemcost` (
`bizid` int(6)
,`xitemcode` varchar(20)
,`totalqty` decimal(42,0)
,`avgcost` decimal(56,4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vitemcostdt`
-- (See below for the actual view)
--
CREATE TABLE `vitemcostdt` (
`bizid` int(6)
,`xitemcode` varchar(20)
,`totalqty` decimal(42,0)
,`totalpurchasecost` decimal(52,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpmfgrdet`
-- (See below for the actual view)
--
CREATE TABLE `vpmfgrdet` (
`xfgrsl` bigint(20) unsigned
,`zemail` varchar(100)
,`ztime` timestamp
,`bizid` int(6)
,`xfgrnum` varchar(20)
,`xitemcode` varchar(20)
,`xbatchno` varchar(20)
,`xexpdate` date
,`xdate` date
,`xqty` double
,`xstdcost` double
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xfgrdetsl` bigint(20) unsigned
,`xrow` int(5)
,`xrawitem` varchar(50)
,`xrawwh` varchar(50)
,`xrawqty` double
,`xrawcost` double
,`xunit` varchar(20)
,`xitemtype` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpoavgcost`
-- (See below for the actual view)
--
CREATE TABLE `vpoavgcost` (
`bizid` int(6)
,`xitemcode` varchar(20)
,`xavgcost` varchar(421)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpocostdt`
-- (See below for the actual view)
--
CREATE TABLE `vpocostdt` (
`zemail` varchar(100)
,`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xexch` double
,`xunitstk` varchar(20)
,`xtypestk` varchar(20)
,`xwh` varchar(50)
,`xconversion` double
,`xcur` varchar(10)
,`xpotype` varchar(30)
,`xitembatch` varchar(20)
,`xqty` double
,`xratepur` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xdisc` double
,`xtotalpoamt` double
,`xtotalcost` double
,`xpocost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpodet`
-- (See below for the actual view)
--
CREATE TABLE `vpodet` (
`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xshipterm` varchar(20)
,`xshipvia` varchar(50)
,`xlcno` varchar(100)
,`xlcdate` varchar(30)
,`xghodate` date
,`xdeldate` date
,`xetd` date
,`xeta` date
,`xcorto` varchar(50)
,`xcoradd` varchar(250)
,`xcorphone` varchar(20)
,`xcoremail` varchar(100)
,`xpino` varchar(30)
,`xpidate` date
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xnote` varchar(1000)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xcur` varchar(10)
,`xexch` double
,`xpotype` varchar(30)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xratepur` double
,`xtypestk` varchar(20)
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`xbasetotal` double
,`xbasetotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpogrndet`
-- (See below for the actual view)
--
CREATE TABLE `vpogrndet` (
`bizid` int(6)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xpotype` varchar(30)
,`xexch` double
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xgrnqty` double
,`xratepur` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xtypestk` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpoheader`
-- (See below for the actual view)
--
CREATE TABLE `vpoheader` (
`bizid` int(6)
,`xpotype` varchar(30)
,`xposl` bigint(20) unsigned
,`ztime` timestamp
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xshipterm` varchar(20)
,`xshipvia` varchar(50)
,`xlcno` varchar(100)
,`xlcdate` varchar(30)
,`xghodate` date
,`xdeldate` date
,`xetd` date
,`xeta` date
,`xcorto` varchar(50)
,`xcoradd` varchar(250)
,`xcorphone` varchar(20)
,`xcoremail` varchar(100)
,`xpino` varchar(30)
,`xpidate` date
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xnote` varchar(1000)
,`xstatus` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xcur` varchar(10)
,`xexch` double
,`xtotalpoamt` double
,`xtotalcost` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpomilestone`
-- (See below for the actual view)
--
CREATE TABLE `vpomilestone` (
`bizid` int(6)
,`xponum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xmilestone` varchar(23)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vporeturndet`
-- (See below for the actual view)
--
CREATE TABLE `vporeturndet` (
`bizid` int(6)
,`xporeturnsl` bigint(20) unsigned
,`ztime` timestamp
,`xporeturnnum` varchar(20)
,`xgrnnum` varchar(20)
,`xsup` varchar(20)
,`xorg` varchar(50)
,`xsupadd` varchar(160)
,`xsupphone` varchar(20)
,`xsupdoc` varchar(100)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xdate` date
,`xporeturndetsl` bigint(20) unsigned
,`xrow` int(5)
,`xitemcode` varchar(20)
,`xitemdesc` varchar(500)
,`xitembatch` varchar(20)
,`xqty` double
,`xextqty` double
,`xratepur` double
,`xstdcost` double
,`xtaxrate` double
,`xunitpur` varchar(20)
,`xtypestk` varchar(20)
,`xconversion` double
,`xunitstk` varchar(20)
,`xdisc` double
,`xtotal` double
,`xtotaltax` double
,`xtotaldisc` double
,`zemail` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vquotmilestone`
-- (See below for the actual view)
--
CREATE TABLE `vquotmilestone` (
`xsl` bigint(20) unsigned
,`ztime` timestamp
,`zutime` datetime
,`zemail` varchar(100)
,`xemail` varchar(100)
,`bizid` int(6)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xgrossdisc` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xmanager` varchar(50)
,`xbranch` varchar(50)
,`xwh` varchar(50)
,`xproj` varchar(50)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xsonum` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrecnpay`
-- (See below for the actual view)
--
CREATE TABLE `vrecnpay` (
`bizid` int(6)
,`xdate` date
,`xvoucher` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xaccusage` varchar(30)
,`xaccsub` varchar(20)
,`xacctype` varchar(100)
,`xaccsource` varchar(30)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xsite` varchar(50)
,`xtype` varchar(15)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrecnpaycb`
-- (See below for the actual view)
--
CREATE TABLE `vrecnpaycb` (
`bizid` int(6)
,`xdate` date
,`xvoucher` varchar(20)
,`xacc` varchar(20)
,`xaccdesc` varchar(100)
,`xaccsub` varchar(20)
,`xacctype` varchar(100)
,`xaccusage` varchar(30)
,`xaccsource` varchar(30)
,`xcur` varchar(20)
,`xbase` double
,`xprime` double
,`xsite` varchar(50)
,`xtype` varchar(11)
,`xflag` varchar(20)
,`xdoctype` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vrecnpayvou`
-- (See below for the actual view)
--
CREATE TABLE `vrecnpayvou` (
`bizid` int(6)
,`xvoucher` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsalesdodt`
-- (See below for the actual view)
--
CREATE TABLE `vsalesdodt` (
`bizid` int(6)
,`sosl` bigint(20) unsigned
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xgrossdisc` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xvoucher` varchar(20)
,`xmanager` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xrow` int(5)
,`xrowquot` int(5)
,`xitemcode` varchar(20)
,`xitembatch` varchar(20)
,`xqty` double
,`xdoqty` double
,`xcost` double
,`xrate` double
,`xcosttotal` double
,`xsubtotal` double
,`xtaxrate` double
,`xtaxtotal` double
,`xunitsale` varchar(20)
,`xtypestk` varchar(20)
,`xexch` double
,`xcur` varchar(10)
,`xdisc` double
,`xdisctotal` double
,`xtaxcode` varchar(20)
,`xtaxscope` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsalesdt`
-- (See below for the actual view)
--
CREATE TABLE `vsalesdt` (
`bizid` int(6)
,`sosl` bigint(20) unsigned
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xgrossdisc` double
,`xnotes` text
,`xcusdoc` varchar(30)
,`xstatus` varchar(20)
,`xrecflag` varchar(20)
,`xyear` int(4)
,`xper` int(2)
,`xvoucher` varchar(20)
,`xmanager` varchar(50)
,`xsalesaccdr` varchar(20)
,`xsalesacccr` varchar(20)
,`ximaccdr` varchar(20)
,`ximacccr` varchar(20)
,`xvataccdr` varchar(20)
,`xvatacccr` varchar(20)
,`xdiscaccdr` varchar(20)
,`xdiscacccr` varchar(20)
,`xwh` varchar(50)
,`xbranch` varchar(50)
,`xproj` varchar(50)
,`xrow` int(5)
,`xrowquot` int(5)
,`xitemcode` varchar(20)
,`xitembatch` varchar(20)
,`xqty` double
,`xcost` double
,`xrate` double
,`xcosttotal` double
,`xsubtotal` double
,`xtaxrate` double
,`xtaxtotal` double
,`xunitsale` varchar(20)
,`xtypestk` varchar(20)
,`xexch` double
,`xcur` varchar(10)
,`xdisc` double
,`xdisctotal` double
,`xtaxcode` varchar(20)
,`xtaxscope` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsecodes`
-- (See below for the actual view)
--
CREATE TABLE `vsecodes` (
`bizid` int(11)
,`codeid` bigint(20) unsigned
,`xcodetype` varchar(50)
,`xcode` varchar(50)
,`xdesc` varchar(150)
,`xcoderem` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsomilestone`
-- (See below for the actual view)
--
CREATE TABLE `vsomilestone` (
`bizid` int(6)
,`ztime` timestamp
,`zemail` varchar(100)
,`xsonum` varchar(20)
,`xquotnum` varchar(20)
,`xdate` date
,`xcus` varchar(50)
,`xdelcount` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vsupplierbal`
-- (See below for the actual view)
--
CREATE TABLE `vsupplierbal` (
`bizid` int(6)
,`xaccsub` varchar(20)
,`xbal` double
);

-- --------------------------------------------------------

--
-- Table structure for table `zlog`
--

CREATE TABLE `zlog` (
  `ztime` timestamp NOT NULL DEFAULT current_timestamp(),
  `xsl` bigint(20) UNSIGNED NOT NULL,
  `bizid` int(11) NOT NULL,
  `zemail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ztoken` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `zrole` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zinfo` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zexpiretime` datetime DEFAULT NULL,
  `zexpire` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zlog`
--

INSERT INTO `zlog` (`ztime`, `xsl`, `bizid`, `zemail`, `ztoken`, `zrole`, `zinfo`, `zexpiretime`, `zexpire`) VALUES
('2019-02-05 09:47:56', 1, 0, 'admin@demo.com', '231073d3a40161c74da92e7bf85ecfc2befe7d720ff43ec421e4fb8f38d4b8f8', '', NULL, '2019-02-05 03:48:35', 0),
('2019-02-05 09:50:12', 2, 0, 'admin@demo.com', '990ae0fb43dfce17775dacd8c1e12563f1af63ff7b64cd0aa2775b5f9cedf695', '', NULL, '2019-02-05 03:52:32', 0),
('2019-02-05 09:54:55', 3, 0, 'admin@demo.com', 'e318a14f53d66ae80c84c3486f7fcf4e5e9cd04d63f3df5c601b45e885fbe69e', '', NULL, '2019-02-05 04:22:24', 0),
('2019-02-05 10:22:36', 4, 0, 'admin@demo.com', '7a3a8d20c88d5b71902e7b8bf73898169ff0c54ddcd8061c2d6b14a836c1681d', '', NULL, '2019-02-05 04:29:11', 0),
('2019-02-05 10:29:11', 5, 0, 'admin@demo.com', '9edf01638398981c45a6449f426b382b60010db7247f1c1dd115b6ad7a569d81', '', NULL, '2019-02-05 04:32:34', 0),
('2019-02-05 10:35:52', 6, 0, 'admin@demo.com', '00408e142702152476e2e22c38309cbeb1667621db40ab706138820eb17e3c29', '', NULL, '2019-02-05 04:37:14', 0),
('2019-02-05 10:37:14', 7, 0, 'admin@demo.com', '136b87b5f487d17ba4683f96a68db69c45a854b61332263754bf7c496534c4a6', '', NULL, '2019-02-05 04:37:47', 0),
('2019-02-05 11:01:21', 8, 0, 'admin@demo.com', '6bb2f74fc5d7a073466daf339229de16f1cb5ef3c6c49940259634ae2714e46b', '', NULL, '2019-02-05 05:01:27', 0),
('2019-02-05 11:01:28', 9, 0, 'admin@demo.com', '4785886da201172ef7a491cb3f2df91a4fdf923aca0c33a52c17217fd8400916', '', NULL, '2019-02-05 05:01:33', 0),
('2019-02-05 11:01:33', 10, 0, 'admin@demo.com', 'efb6ccbeff46ddefc223579c540b4a11c71e5ddf98e88730c6bc05c427dc3c89', '', NULL, '2019-02-05 05:11:09', 0),
('2019-02-05 11:11:09', 11, 0, 'admin@demo.com', '28f91ae4325f8b34f3f93705fc21e6383aae41c78d3529eb08299f7bf8652247', '', NULL, '2019-02-05 05:11:13', 0),
('2019-02-05 11:11:13', 12, 0, 'admin@demo.com', '3c6115fc19df0aab9d627d0bd6dcfff2d35774f862077cd1a3d2a9d7a7dfc3b1', '', NULL, '2019-02-05 05:11:55', 0),
('2019-02-05 11:11:55', 13, 0, 'admin@demo.com', '711fcd3c93093ac033793b41bc77595af606993ec4f7d8ba59faf71c2dad4b54', '', NULL, '2019-02-05 05:48:44', 0),
('2019-02-05 11:48:44', 14, 0, 'admin@demo.com', '03dea2a1a51982146d988947223a93b1780c71f382d1be4f06a54cf05c3291d3', '', NULL, '2019-02-05 05:49:11', 0),
('2019-02-05 11:49:23', 15, 0, 'admin@demo.com', 'b4743134ec21f19a2d3c1299d00f0dd975318b8ec98dad3e332c387c186b40af', '', NULL, '2019-02-05 05:49:30', 0),
('2019-02-05 11:49:30', 16, 0, 'admin@demo.com', '7b73b193f686235746e2d1af3e98fe1b1dbee7a4b2d0579bc85eb41c58ad1d5a', '', NULL, '2019-02-05 05:50:22', 0),
('2019-02-05 11:51:25', 17, 0, 'admin@demo.com', '4fe3906cab6933166e58c095688949e02c06925356a7631f6a7387aacc46f631', '', NULL, '2019-02-05 05:51:57', 0),
('2019-02-05 11:52:10', 18, 0, 'admin@demo.com', '19b355f149f77e32d853e167e04a8648731ec2f2a87c0eb03b37bbc274fd594a', '', NULL, '2019-02-05 06:15:59', 0),
('2019-02-05 12:19:07', 19, 0, 'admin@demo.com', 'd1416522217ec4613c55f02cff8a7fe5c9176e1701aee0bfd99b6abc7c87d378', '', NULL, '2019-02-05 06:20:27', 0),
('2019-02-05 12:20:30', 20, 0, 'admin@demo.com', 'ef7de528aaa115e99fa1012b7d30a9ec2cafeadaf453fb58db6f94511bcb56e1', '', NULL, '2019-02-05 06:27:42', 0),
('2019-02-05 12:27:42', 21, 0, 'admin@demo.com', '691489cdee41a68ae2b5ea90dd6b4567513d13e7278fa073ce2ba7be9f6ff393', '', NULL, '2019-02-05 06:27:46', 0),
('2019-02-05 12:27:46', 22, 0, 'admin@demo.com', '0297ab818373f894fd0a8f5d2e00128f7d16dea82c3f71b37ceb9c924085f3c5', '', NULL, '2019-02-05 06:48:32', 0),
('2019-02-05 12:48:32', 23, 0, 'admin@demo.com', 'c8d26bd866775811685807336a271ff5f169ffbd5ab64d021e189db0b1c54516', '', NULL, '2019-02-05 06:50:07', 0),
('2019-02-05 12:50:07', 24, 0, 'admin@demo.com', '5f7fb78ca34eb421553dd4e62553a511ed193cf7ae1cc6939fc33a45cf8425dc', '', NULL, '2019-02-05 06:50:54', 0),
('2019-02-05 12:50:58', 25, 0, 'admin@demo.com', 'dd84f25cfe8ea384cbd5c479c2285aeaf5e64e3c427a6031128dabd549ab9aea', '', NULL, '2019-02-06 10:06:38', 0),
('2019-02-06 04:06:40', 26, 0, 'admin@demo.com', '42d18eb8d0680919e0adbfdfb3e4aeadd9f871c631a32cf7448f70789c4e9656', '', NULL, '2019-02-06 10:30:42', 0),
('2019-02-06 04:30:42', 27, 0, 'admin@demo.com', 'e124d85c683448ba9f8926974e9d897b603a80bb2aa245ec7b1008753b3c6b02', '', NULL, '2019-02-06 10:38:05', 0),
('2019-02-06 04:38:05', 28, 0, 'admin@demo.com', '1f102814f9384b7bb942c7fbac08a74ca65584e482c84dc4dea487539fef1dd3', '', NULL, '2019-02-06 10:48:26', 0),
('2019-02-06 04:48:27', 29, 0, 'admin@demo.com', 'c3a406a9f808012864cfa3f3f646107d6c04fcca1cb908da6276d39b436d22d1', '', NULL, '2019-02-06 01:04:14', 0),
('2019-02-06 07:04:14', 30, 0, 'admin@demo.com', '970c9aa5094f4c0691c235a0eebe3a4e1ed8b964a4b1511b6d6b2394ec5e42c5', 'ADMIN', NULL, '2019-02-06 01:58:03', 0),
('2019-02-06 07:58:03', 31, 0, 'admin@demo.com', '106ba42e5124e3722341fdcc188b7567c50999fa68aa92395e2e49dbcf5d1890', 'ADMIN', NULL, '2019-02-06 01:59:12', 0),
('2019-02-06 07:59:12', 32, 0, 'admin@demo.com', '5950a2adfdd54cfb7ab4e69f51c37788c5f055af1d6809e71c932bca1a5bd9df', 'ADMIN', NULL, '2019-02-06 02:02:24', 0),
('2019-02-06 08:02:24', 33, 100, 'admin@demo.com', '8e2aeeebc016aee94ec21da7d789df90ac3a1c0a626f688275593f42e05af227', 'ADMIN', NULL, NULL, 0),
('2019-02-06 09:08:22', 34, 100, 'admin@demo.com', '7666c078ad89dd8098e9e2c30d75ad50862f2ebe021f8232a69b59bd21624b97', 'ADMIN', NULL, '2019-02-07 11:13:51', 0),
('2019-02-07 05:13:51', 35, 100, 'admin@demo.com', '5ff8b725c937008bf048f7296bbfc25b37ff9c5cb140370ad6c7dec7e04743b4', 'ADMIN', NULL, '2019-02-07 12:30:38', 0),
('2019-02-07 06:30:38', 36, 100, 'admin@demo.com', '9792b650996ec5cf331f6c330901f72d6b4b77fc057cd157cd056e7374821967', 'ADMIN', NULL, '2019-02-10 11:47:22', 0),
('2019-02-10 05:47:22', 37, 100, 'admin@demo.com', 'b27922fdb0e7ca8b49e23b4228f67b490a829033c63bcc830a174dcaf34dfdcf', 'ADMIN', NULL, '2019-02-11 03:21:51', 0),
('2019-02-11 09:21:51', 38, 100, 'admin@demo.com', 'e0734c3c8dbfc7923a896432aa43b04455aaa8edf60cc896d23a2f51f613a3d8', 'ADMIN', NULL, '2019-02-12 11:08:49', 0),
('2019-02-12 05:08:49', 39, 100, 'admin@demo.com', '43be0e6d5f844bf59c94b9c73c568236f4cb904183741899420f34ccafb43c92', 'ADMIN', NULL, '2019-02-12 11:09:02', 0),
('2019-02-12 05:13:18', 40, 100, 'admin@demo.com', '5a2d02e25bc2c79fdc5081d23fd1b9dc4e9108fc5e09f294b5d637a7b6f1dd9d', 'ADMIN', NULL, '2019-02-12 11:14:13', 0),
('2019-02-12 05:14:13', 41, 100, 'admin@demo.com', '9b19e3ecafcf583ec464669b22668891177d9ccdd5d1af9ce797d10e95e03df0', 'ADMIN', NULL, '2019-02-12 11:14:28', 0),
('2019-02-12 05:14:28', 42, 100, 'admin@demo.com', 'aebfd416f4bf6966357f1bf26e070873965050227005766ffaf3519527328509', 'ADMIN', NULL, '2019-02-12 11:14:38', 0),
('2019-02-12 05:25:14', 43, 100, 'admin@demo.com', '327cd389ab58fbcbb0b9fe15eb7f660ba2cc54551bcf5b6755375fc72cfb4a81', 'ADMIN', NULL, '2019-02-12 11:25:48', 0),
('2019-02-12 05:26:38', 44, 100, 'admin@demo.com', '344f4b291973f6c72b4c1e6ed161ba0bd72473c4480201bfcbf6215a0a99781a', 'ADMIN', NULL, '2019-02-12 11:27:16', 0),
('2019-02-12 05:27:32', 45, 100, 'admin@demo.com', 'cf3ff9ad0c692484e9b0e8c4cfcef1d6a5d0e2424272cf52bcf6296eb78fea21', 'ADMIN', NULL, '2019-02-12 11:36:12', 0),
('2019-02-12 05:36:16', 46, 100, 'admin@demo.com', 'c80cddaf78fd9457d1de960e2e765216df6b535f0c5596085755b881f5648756', 'ADMIN', NULL, '2019-02-12 06:39:02', 0),
('2019-02-12 12:39:18', 47, 100, 'admin@demo.com', 'd7e8c0131e4f47cccf0382fa30b7f566f0fb6ca65e0293bcfed103cb0def2664', 'ADMIN', NULL, '2019-02-13 10:45:56', 0),
('2019-02-13 04:45:56', 48, 100, 'admin@demo.com', '82ae10060ac5cc69c4f1b76968f983b9ce37d68a311abcaf72e4bed5ecb2bf7d', 'ADMIN', NULL, '2019-02-13 11:12:59', 0),
('2019-02-13 05:12:59', 49, 100, 'admin@demo.com', '9ce763832763e8f6b0552c7c3e7abc1fc075586285054e0b8ca436abfd03d695', 'ADMIN', NULL, '2019-02-13 11:14:48', 0),
('2019-02-13 05:14:49', 50, 100, 'admin@demo.com', 'af8f4bcf9e3df05bc49eb1390aff4288202cea365f0f3a9b984ad11a37bfede6', 'ADMIN', NULL, '2019-02-13 11:20:24', 0),
('2019-02-13 05:20:24', 51, 100, 'admin@demo.com', '9c64769bbca3350cdc1f66b3b8b5d8e7af68e6e4914a23e225b37eaaddef479d', 'ADMIN', NULL, '2019-02-13 11:20:49', 0),
('2019-02-13 05:20:49', 52, 100, 'admin@demo.com', '94648afec30d5d5fb88f701b62f221acbde3cd1ca9fc06546c9b003dd1a4402c', 'ADMIN', NULL, '2019-02-13 11:57:11', 0),
('2019-02-13 05:57:11', 53, 100, 'admin@demo.com', 'f2a2d84e769caf835debfa76d6ac7abc5d04fd64dc10c09a48f82eaf81d8b569', 'ADMIN', NULL, '2019-02-13 03:08:50', 0),
('2019-02-13 09:08:50', 54, 100, 'admin@demo.com', '8dd3eaa4848906385782095214bbdc23559dc8941de8905f961b055702af7828', 'ADMIN', NULL, '2019-03-05 05:47:55', 0),
('2019-02-13 11:49:43', 55, 100, 'mdrajibd2k@gmail.com', '4501be926dcc0c03ccb83696d493b6a2a4d3d1fdb534c98d57bbe677a2071387', 'ADMIN', NULL, '2019-02-17 05:53:41', 0),
('2019-02-17 11:53:41', 56, 100, 'mdrajibd2k@gmail.com', '23dccdb60c0894faf8e1df52c4dbbd9d0abebf9b7c206d8617485737094a893a', 'ADMIN', NULL, '2019-02-17 05:53:58', 0),
('2019-02-17 11:53:58', 57, 100, 'mdrajibd2k@gmail.com', '3394825044bdaf830cf2c27779f505fba478d14b54cd957a5f3344cb02f3b105', 'ADMIN', NULL, '2019-02-17 05:54:24', 0),
('2019-02-17 11:54:24', 58, 100, 'mdrajibd2k@gmail.com', '87d67c4b1549403fe5cc0301ae1155807b91067ebb227ed4674203e98d1921b3', 'ADMIN', NULL, '2019-02-18 11:11:47', 0),
('2019-02-18 05:11:48', 59, 100, 'mdrajibd2k@gmail.com', 'fa200fabd5a0bf716ef6a64dc9fd579039f0717179bfba25d87cd8c2f15d1bbc', 'ADMIN', NULL, '2019-02-18 11:12:19', 0),
('2019-02-18 05:12:19', 60, 100, 'mdrajibd2k@gmail.com', '33401d804f64562439241c8bb31aa943787429969354a827b32b731f037bc888', 'ADMIN', NULL, '2019-02-18 03:09:42', 0),
('2019-02-18 09:09:43', 61, 100, 'mdrajibd2k@gmail.com', '7bb8d7ed4af79f6382e6f30a5c7077e18071c2dae330cf5247a6d6fb11f478c4', 'ADMIN', NULL, '2019-02-18 03:36:43', 0),
('2019-02-18 09:36:43', 62, 100, 'mdrajibd2k@gmail.com', '7d999aa0c2a99e80353d91ebe7ed2fc0cd92aa8dc40cb4ee97e5acae131e92f6', 'ADMIN', NULL, '2019-02-20 12:04:03', 0),
('2019-02-20 06:04:03', 63, 100, 'mdrajibd2k@gmail.com', 'e7a806df27f3fbed70af48cfcf9d50685b2088caf1eaab452d6e7c23e6e42e41', 'ADMIN', NULL, '2019-02-20 12:57:50', 0),
('2019-02-20 06:57:50', 64, 100, 'mdrajibd2k@gmail.com', 'dbc8e1046cdd59736d1cc366bdea662481af757cdae6779b3b6993dbe125c45e', 'ADMIN', NULL, '2019-02-24 11:17:10', 0),
('2019-02-24 05:17:10', 65, 100, 'mdrajibd2k@gmail.com', '15d9dbd3d362832739a1aa68b5b6b4ab39c8153540c0741c83b4687786e9e665', 'ADMIN', NULL, '2019-02-24 11:26:23', 0),
('2019-02-24 05:26:23', 66, 100, 'mdrajibd2k@gmail.com', 'ccab45e79d9a609631fd339e84119f836685ff7959d79ed29a0d2fc8d9a8ad28', 'ADMIN', NULL, '2019-02-24 03:28:45', 0),
('2019-02-24 09:28:45', 67, 100, 'mdrajibd2k@gmail.com', '793676415effd115137a6c384c3d218610e0e19670a6ab521c4a655fb1be4a5c', 'ADMIN', NULL, '2019-02-24 03:35:46', 0),
('2019-02-24 09:35:46', 68, 100, 'mdrajibd2k@gmail.com', 'f16dacbb0f5089424a58b4ea84e9350be86460efd0fe8f98d9bf1e5f8cfbdcb0', 'ADMIN', NULL, '2019-02-24 03:37:33', 0),
('2019-02-24 09:37:33', 69, 100, 'mdrajibd2k@gmail.com', '51b184e10bae45ffbcfc3f0cd8b7f0ed5ce21b364aef58d480d0083abb4df8e6', 'ADMIN', NULL, '2019-02-24 03:58:51', 0),
('2019-02-24 09:58:51', 70, 100, 'mdrajibd2k@gmail.com', '8ebf5dd7a6c2d3e8a45524720293bd151c44af5b72593003b9be698cb6d611fc', 'ADMIN', NULL, '2019-02-24 04:03:36', 0),
('2019-02-24 10:03:37', 71, 100, 'mdrajibd2k@gmail.com', '81147a271b6f9f1d4fad6e5c69f2e2ce29e6ef3365bff734b6bd67f8ca9096f3', 'ADMIN', NULL, '2019-02-24 04:15:01', 0),
('2019-02-24 10:15:02', 72, 100, 'mdrajibd2k@gmail.com', '5b07630021db13e5c5b1a6d6b2cdd7d643d3ea9a2f2a99a48789a09b891f63b6', 'ADMIN', NULL, '2019-02-24 04:16:34', 0),
('2019-02-24 10:16:34', 73, 100, 'mdrajibd2k@gmail.com', 'dd0da08bc52486d71cd9adb7ee149753e69e64e893459929572e092c8ddc599b', 'ADMIN', NULL, '2019-02-25 10:58:51', 0),
('2019-02-25 04:58:51', 74, 100, 'mdrajibd2k@gmail.com', '0352e7614fc196aa945a28c855bd3b0a5df980a28e085ba0ee565f08394e316b', 'ADMIN', NULL, '2019-02-25 02:33:19', 0),
('2019-02-25 08:33:20', 75, 100, 'mdrajibd2k@gmail.com', 'b4b3b72dbf6a9883f78657c281993e84ad4e7162c452f747da2e6382b9fa6a26', 'ADMIN', NULL, '2019-02-26 05:10:39', 0),
('2019-02-26 11:10:39', 76, 100, 'mdrajibd2k@gmail.com', 'af1142834b2f1d179d5ac314dc8aa2a85d75eab46440b5191d9a1df8bf06e468', 'ADMIN', NULL, '2019-02-27 11:41:35', 0),
('2019-02-27 05:41:35', 77, 100, 'mdrajibd2k@gmail.com', '34d6af19e5ad126e9a41837237ed6780f8f5b8cc93de0175da84ba3dd138c1d6', 'ADMIN', NULL, '2019-02-27 02:44:32', 0),
('2019-02-27 08:44:32', 78, 100, 'mdrajibd2k@gmail.com', 'b273f4760586349856873015d527e006cd7cd08b1522ff6eef8e47c6346bd740', 'ADMIN', NULL, '2019-03-03 11:20:32', 0),
('2019-03-03 05:20:32', 79, 100, 'mdrajibd2k@gmail.com', '5c020cedcc1d739641a1b74188a04dbc93137b038a4b909aad5b707c4045b8f3', 'ADMIN', NULL, '2019-03-03 11:21:04', 0),
('2019-03-03 05:21:04', 80, 100, 'mdrajibd2k@gmail.com', 'e32b841c0092bebdc0e3c88c7f7fe9489db3b26a8d55925d6feafdaffbc4ad65', 'ADMIN', NULL, '2019-03-03 11:30:00', 0),
('2019-03-03 05:30:00', 81, 100, 'mdrajibd2k@gmail.com', '4e96f42f0e25f17003d216cfa0a61ec2986851b86c7adf419fa32964566802a3', 'ADMIN', NULL, '2019-03-03 06:31:19', 0),
('2019-03-03 12:31:19', 82, 100, 'mdrajibd2k@gmail.com', 'b7299d75b597bddaf3d889d44dad7e7aba6287bb777cf8c6cb8b2442d9be6616', 'ADMIN', NULL, '2019-03-04 01:14:38', 0),
('2019-03-04 07:14:38', 83, 100, 'mdrajibd2k@gmail.com', '601187db8c80ab945a1db3fff4d031fba7247750a91881045d631632606de31a', 'ADMIN', NULL, '2019-03-04 01:15:22', 0),
('2019-03-04 07:15:22', 84, 100, 'mdrajibd2k@gmail.com', 'a22f611fd66bc952bb5b03d2ab381469915cf522687593ef2e1fdff086a5faff', 'ADMIN', NULL, '2019-03-04 04:13:04', 0),
('2019-03-04 10:13:04', 85, 100, 'mdrajibd2k@gmail.com', 'c9c656787ce3cbc563ab6838c836636bfda3aa0c0d83b1d80bc462edcc8a7ce1', 'ADMIN', NULL, '2019-03-05 12:26:12', 0),
('2019-03-05 06:26:12', 86, 100, 'mdrajibd2k@gmail.com', 'd989ee6a9655557e68423db1af93aa2b74d549b34a10aa770a9a29325cb3a22f', 'ADMIN', NULL, '2019-03-07 03:21:40', 0),
('2019-03-05 11:47:55', 87, 100, 'admin@demo.com', 'b9b75518fd0007fa9bf3dfa984e2b327b16a443c0d9f4eb36099b24aceffa222', 'ADMIN', NULL, '2019-03-05 05:54:43', 0),
('2019-03-05 11:54:43', 88, 100, 'admin@demo.com', 'aa673a77be16c10b1d5b8289fbd9100da64aae80d837b5c24a333435cc26f84c', 'ADMIN', NULL, NULL, 1),
('2019-03-07 09:21:41', 89, 100, 'mdrajibd2k@gmail.com', '040fcf8f9aeac02e9e0ef4f8e5066f3c61c07752629381e5e4063bf3c3d3dbb3', 'ADMIN', NULL, '2019-03-08 06:10:14', 0),
('2019-03-08 12:10:14', 90, 100, 'mdrajibd2k@gmail.com', 'fca4a184168d24cf760a165fb47e3e3b3e5efa3bfceaeabda24df2dd4d35c53e', 'ADMIN', NULL, '2019-03-09 05:34:16', 0),
('2019-03-09 11:34:16', 91, 100, 'mdrajibd2k@gmail.com', '8e20666c2d43bb313d577416020bed2526f08aa5eb31f6c006322d15bfce9271', 'ADMIN', NULL, '2019-03-10 09:13:26', 0),
('2019-03-10 03:13:26', 92, 100, 'mdrajibd2k@gmail.com', '28c24ec01c084f097b7bb4d1c21723def4a7ecfc453f308252092a0cc7d771b0', 'ADMIN', NULL, '2019-03-17 10:04:58', 0),
('2019-03-17 04:04:58', 93, 100, 'mdrajibd2k@gmail.com', '42757ed7fb5ba5d47cb1e55e1e37d153c0cd8799579d8c8dc995104870a87657', 'ADMIN', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure for view `gldetailview`
--
DROP TABLE IF EXISTS `gldetailview`;

CREATE VIEW `gldetailview`  AS SELECT `h`.`ztime` AS `ztime`, `h`.`bizid` AS `bizid`, `h`.`xvoucher` AS `xvoucher`, `d`.`xrow` AS `xrow`, `h`.`xdate` AS `xdate`, `h`.`xnarration` AS `xnarration`, `h`.`xref` AS `xref`, `h`.`xchequeno` AS `xchequeno`, `h`.`xyear` AS `xyear`, `h`.`xper` AS `xper`, `h`.`zemail` AS `zemail`, `h`.`xemail` AS `xemail`, `h`.`xbranch` AS `xbranch`, `h`.`xdoctype` AS `xdoctype`, `h`.`xdocnum` AS `xdocnum`, `h`.`xapprovedby` AS `xapprovedby`, `h`.`xmanager` AS `xmanager`, `d`.`xacc` AS `xacc`, (select `g`.`xdesc` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xaccdesc`, `d`.`xacctype` AS `xacctype`, `d`.`xaccusage` AS `xaccusage`, `d`.`xaccsource` AS `xaccsource`, `d`.`xaccsub` AS `xaccsub`, `d`.`xaccsuba` AS `xaccsuba`, CASE WHEN `d`.`xaccsource` = 'Sub Account' THEN (select `s`.`xdesc` from `glchartsub` `s` where `d`.`bizid` = `s`.`bizid` and `d`.`xacc` = `s`.`xacc` and `d`.`xaccsub` = `s`.`xaccsub`) WHEN `d`.`xaccsource` = 'Customer' THEN (select `c`.`xorg` from `secus` `c` where `d`.`bizid` = `c`.`bizid` and `d`.`xaccsub` = `c`.`xcus`) WHEN `d`.`xaccsource` = 'Supplier' THEN (select `s`.`xorg` from `sesup` `s` where `d`.`bizid` = `s`.`bizid` and `d`.`xaccsub` = `s`.`xsup`) ELSE '' END AS `xaccsubdesc`, `d`.`xproj` AS `xproj`, `d`.`xsec` AS `xsec`, `d`.`xdiv` AS `xdiv`, `d`.`xcur` AS `xcur`, `d`.`xbase` AS `xbase`, `d`.`xbase`* `d`.`xexch` AS `xprime`, `d`.`xcheque` AS `xcheque`, `d`.`xchequedate` AS `xchequedate`, `d`.`xflag` AS `xflag`, `d`.`xinvnum` AS `xinvnum`, `d`.`xsalesparson` AS `xsalesparson`, `h`.`xrecflag` AS `xrecflag`, (select `g`.`xacclevel1` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel1`, (select `g`.`xacclevel2` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel2`, (select `g`.`xacclevel3` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel3`, `h`.`xsite` AS `xsite`, `h`.`xlong` AS `xlong`, `h`.`xapprvstatus` AS `xapprvstatus`, `h`.`xstatus` AS `xstatus` FROM (`vglheader` `h` join `gldetail` `d`) WHERE `h`.`bizid` = `d`.`bizid` AND `h`.`xvoucher` = `d`.`xvoucher` ;

-- --------------------------------------------------------

--
-- Structure for view `vcustomerbal`
--
DROP TABLE IF EXISTS `vcustomerbal`;

CREATE VIEW `vcustomerbal`  AS SELECT `gldetail`.`bizid` AS `bizid`, `gldetail`.`xaccsub` AS `xaccsub`, sum(`gldetail`.`xprime`) AS `xbal` FROM `gldetail` WHERE `gldetail`.`xaccsource` = 'Customer' GROUP BY `gldetail`.`bizid`, `gldetail`.`xaccsub` ;

-- --------------------------------------------------------

--
-- Structure for view `vdoreturndt`
--
DROP TABLE IF EXISTS `vdoreturndt`;

CREATE VIEW `vdoreturndt`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`ztime` AS `ztime`, `m`.`xreqdelnum` AS `xreqdelnum`, `m`.`xsonum` AS `xsonum`, `m`.`xcus` AS `xcus`, (select `seitem`.`xsup` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xsup`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xreqdeldetsl` AS `xreqdeldetsl`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, coalesce((select sum(`imdoreturndet`.`xqty`) from `imdoreturndet` where `c`.`bizid` = `imdoreturndet`.`bizid` and `c`.`xreqdelnum` = `imdoreturndet`.`xreqdelnum` and `c`.`xreqdeldetsl` = `imdoreturndet`.`xrowtrn` and `c`.`xitemcode` = `imdoreturndet`.`xitemcode`),0) AS `xreturnqty`, `c`.`xrate` AS `xrate`, `c`.`xratepur` AS `xratepur`, `c`.`xunit` AS `xunit`, `c`.`xtypestk` AS `xtypestk`, `c`.`xdisc` AS `xdisc`, `c`.`zemail` AS `zemail` FROM (`imreqdelmst` `m` join `imreqdeldet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xreqdelnum` = `c`.`xreqdelnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vgldetailinterface`
--
DROP TABLE IF EXISTS `vgldetailinterface`;

CREATE VIEW `vgldetailinterface`  AS SELECT `h`.`ztime` AS `ztime`, `h`.`bizid` AS `bizid`, `h`.`xvoucher` AS `xvoucher`, `d`.`xrow` AS `xrow`, `h`.`xdate` AS `xdate`, `h`.`xnarration` AS `xnarration`, `h`.`xref` AS `xref`, `h`.`xchequeno` AS `xchequeno`, `h`.`xyear` AS `xyear`, `h`.`xper` AS `xper`, `h`.`zemail` AS `zemail`, `h`.`xemail` AS `xemail`, `h`.`xbranch` AS `xbranch`, `h`.`xdoctype` AS `xdoctype`, `h`.`xstatus` AS `xstatus`, `h`.`xdocnum` AS `xdocnum`, `h`.`xapprovedby` AS `xapprovedby`, `h`.`xmanager` AS `xmanager`, `d`.`xacc` AS `xacc`, (select `g`.`xdesc` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xaccdesc`, `d`.`xacctype` AS `xacctype`, `d`.`xaccusage` AS `xaccusage`, `d`.`xaccsource` AS `xaccsource`, `d`.`xaccsub` AS `xaccsub`, `d`.`xproj` AS `xproj`, `d`.`xsec` AS `xsec`, `d`.`xdiv` AS `xdiv`, `d`.`xcur` AS `xcur`, `d`.`xbase` AS `xbase`, `d`.`xbase`* `d`.`xexch` AS `xprime`, `d`.`xcheque` AS `xcheque`, `d`.`xchequedate` AS `xchequedate`, `d`.`xflag` AS `xflag`, `d`.`xinvnum` AS `xinvnum`, `d`.`xsalesparson` AS `xsalesparson`, `h`.`xrecflag` AS `xrecflag`, (select `g`.`xacclevel1` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel1`, (select `g`.`xacclevel2` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel2`, (select `g`.`xacclevel3` from `glchart` `g` where `d`.`bizid` = `g`.`bizid` and `d`.`xacc` = `g`.`xacc`) AS `xacclevel3` FROM (`vglheader` `h` join `gldetail` `d`) WHERE `h`.`bizid` = `d`.`bizid` AND `h`.`xvoucher` = `d`.`xvoucher` ;

-- --------------------------------------------------------

--
-- Structure for view `vglheader`
--
DROP TABLE IF EXISTS `vglheader`;

CREATE VIEW `vglheader`  AS SELECT `glheader`.`xsl` AS `xsl`, `glheader`.`ztime` AS `ztime`, `glheader`.`zutime` AS `zutime`, `glheader`.`bizid` AS `bizid`, `glheader`.`xvoucher` AS `xvoucher`, `glheader`.`xdate` AS `xdate`, `glheader`.`xnarration` AS `xnarration`, `glheader`.`xref` AS `xref`, `glheader`.`xlong` AS `xlong`, `glheader`.`xchequeno` AS `xchequeno`, `glheader`.`xyear` AS `xyear`, `glheader`.`xper` AS `xper`, `glheader`.`xstatusjv` AS `xstatusjv`, `glheader`.`zemail` AS `zemail`, `glheader`.`xemail` AS `xemail`, `glheader`.`xbranch` AS `xbranch`, `glheader`.`xsite` AS `xsite`, `glheader`.`xdoctype` AS `xdoctype`, `glheader`.`xdocnum` AS `xdocnum`, `glheader`.`xapprovedby` AS `xapprovedby`, `glheader`.`xmanager` AS `xmanager`, `glheader`.`xapprvstatus` AS `xapprvstatus`, `glheader`.`xrecflag` AS `xrecflag`, (select coalesce(sum(`gldetail`.`xprime`),0) from `gldetail` where `gldetail`.`xvoucher` = `glheader`.`xvoucher` and `gldetail`.`bizid` = `glheader`.`bizid` and `gldetail`.`xprime` >= 0) AS `xdramt`, (select coalesce(sum(`gldetail`.`xprime`),0) from `gldetail` where `gldetail`.`xvoucher` = `glheader`.`xvoucher` and `gldetail`.`bizid` = `glheader`.`bizid` and `gldetail`.`xprime` < 0) AS `xcramt`, if((select sum(`gldetail`.`xprime`) from `gldetail` where `gldetail`.`xvoucher` = `glheader`.`xvoucher` and `gldetail`.`bizid` = `glheader`.`bizid`) <> 0,'Un Balanced','Balanced') AS `xstatus` FROM `glheader` ;

-- --------------------------------------------------------

--
-- Structure for view `vglsales`
--
DROP TABLE IF EXISTS `vglsales`;

CREATE VIEW `vglsales`  AS SELECT `vsalesdt`.`bizid` AS `bizid`, `vsalesdt`.`xvoucher` AS `xvoucher`, `vsalesdt`.`xsonum` AS `xsonum`, `vsalesdt`.`ztime` AS `ztime`, `vsalesdt`.`xcus` AS `xcus`, `vsalesdt`.`xdate` AS `xdate`, `vsalesdt`.`xyear` AS `xyear`, `vsalesdt`.`xper` AS `xper`, `vsalesdt`.`xmanager` AS `xmanager`, `vsalesdt`.`xproj` AS `xproj`, `vsalesdt`.`xwh` AS `xwh`, `vsalesdt`.`xbranch` AS `xbranch`, `vsalesdt`.`xsalesaccdr` AS `xsalesaccdr`, `vsalesdt`.`xsalesacccr` AS `xsalesacccr`, `vsalesdt`.`ximaccdr` AS `ximaccdr`, `vsalesdt`.`ximacccr` AS `ximacccr`, `vsalesdt`.`xvataccdr` AS `xvataccdr`, `vsalesdt`.`xvatacccr` AS `xvatacccr`, `vsalesdt`.`xdiscaccdr` AS `xdiscaccdr`, `vsalesdt`.`xdiscacccr` AS `xdiscacccr`, sum(`vsalesdt`.`xcosttotal`) AS `xcosttotal`, sum(`vsalesdt`.`xsubtotal`) AS `xsubtotal`, sum(`vsalesdt`.`xtaxtotal`) AS `xtaxtotal`, sum(`vsalesdt`.`xdisctotal`) AS `xdisctotal` FROM `vsalesdt` WHERE `vsalesdt`.`xstatus` = 'Confirmed' AND `vsalesdt`.`xrecflag` = 'Live' GROUP BY `vsalesdt`.`bizid`, `vsalesdt`.`xvoucher`, `vsalesdt`.`xsonum`, `vsalesdt`.`ztime`, `vsalesdt`.`xcus`, `vsalesdt`.`xdate`, `vsalesdt`.`xyear`, `vsalesdt`.`xper`, `vsalesdt`.`xmanager`, `vsalesdt`.`xproj`, `vsalesdt`.`xwh`, `vsalesdt`.`xbranch`, `vsalesdt`.`xsalesaccdr`, `vsalesdt`.`xsalesacccr`, `vsalesdt`.`ximaccdr`, `vsalesdt`.`ximacccr`, `vsalesdt`.`xvataccdr`, `vsalesdt`.`xvatacccr`, `vsalesdt`.`xdiscaccdr`, `vsalesdt`.`xdiscacccr` ;

-- --------------------------------------------------------

--
-- Structure for view `vglsalesdetail`
--
DROP TABLE IF EXISTS `vglsalesdetail`;

CREATE VIEW `vglsalesdetail`  AS SELECT `vglsales`.`bizid` AS `bizid`, `vglsales`.`ztime` AS `ztime`, `vglsales`.`xvoucher` AS `xvoucher`, `vglsales`.`xsonum` AS `xdocnum`, `vglsales`.`xsonum` AS `xinvnum`, 'Live' AS `xrecflag`, `vglsales`.`xmanager` AS `xsalesparson`, `vglsales`.`xproj` AS `xproj`, 'Sales Order' AS `xdoctype`, `vglsales`.`xcus` AS `xaccsub`, `vglsales`.`xdate` AS `xdate`, `vglsales`.`xyear` AS `xyear`, `vglsales`.`xper` AS `xper`, 1 AS `xrow`, `vglsales`.`xsalesaccdr` AS `xacc`, `vglsales`.`xsubtotal` AS `xprime`, 'Debit' AS `xflag`, 'Balanced' AS `xstatus`, concat('Created By System Against Sales Order ',`vglsales`.`xsonum`) AS `xnarration` FROM `vglsales` WHERE `vglsales`.`xsubtotal` > 0 AND `vglsales`.`xsalesaccdr` is not null ;

-- --------------------------------------------------------

--
-- Structure for view `vglsalesinterface`
--
DROP TABLE IF EXISTS `vglsalesinterface`;

CREATE VIEW `vglsalesinterface`  AS SELECT `h`.`ztime` AS `ztime`, `h`.`bizid` AS `bizid`, `h`.`xvoucher` AS `xvoucher`, `h`.`xrow` AS `xrow`, `h`.`xdate` AS `xdate`, `h`.`xnarration` AS `xnarration`, '' AS `xref`, '' AS `xchequeno`, `h`.`xyear` AS `xyear`, `h`.`xper` AS `xper`, '' AS `zemail`, '' AS `xemail`, `h`.`xproj` AS `xbranch`, `h`.`xdoctype` AS `xdoctype`, `h`.`xstatus` AS `xstatus`, `h`.`xdocnum` AS `xdocnum`, '' AS `xapprovedby`, '' AS `xmanager`, `h`.`xacc` AS `xacc`, `d`.`xdesc` AS `xaccdesc`, `d`.`xacctype` AS `xacctype`, `d`.`xaccusage` AS `xaccusage`, `d`.`xaccsource` AS `xaccsource`, `h`.`xaccsub` AS `xaccsub`, `h`.`xproj` AS `xproj`, '' AS `xsec`, '' AS `xdiv`, 'BDT' AS `xcur`, 0 AS `xbase`, `h`.`xprime` AS `xprime`, '' AS `xcheque`, '' AS `xchequedate`, `h`.`xflag` AS `xflag`, `h`.`xinvnum` AS `xinvnum`, `h`.`xsalesparson` AS `xsalesparson`, 'Live' AS `xrecflag`, `d`.`xacclevel1` AS `xacclevel1`, `d`.`xacclevel2` AS `xacclevel2`, `d`.`xacclevel3` AS `xacclevel3` FROM (`vglsalesdetail` `h` join `glchart` `d`) WHERE `h`.`bizid` = `d`.`bizid` AND `h`.`xacc` = `d`.`xacc` ORDER BY `h`.`xvoucher` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vgrndet`
--
DROP TABLE IF EXISTS `vgrndet`;

CREATE VIEW `vgrndet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xgrnsl` AS `xgrnsl`, `m`.`ztime` AS `ztime`, `m`.`xgrnnum` AS `xgrnnum`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqtypur` AS `xqtypur`, `c`.`xextqty` AS `xextqty`, `c`.`xratepur` AS `xratepur`, `c`.`xstdcost` AS `xstdcost`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xconversion` AS `xconversion`, `c`.`xunitstk` AS `xunitstk`, `c`.`xtypestk` AS `xtypestk`, `c`.`xdisc` AS `xdisc`, `c`.`xqtypur`* `c`.`xratepur` AS `xtotal`, `c`.`xqtypur`* (`c`.`xtaxrate` * `c`.`xratepur` / 100) AS `xtotaltax`, `c`.`xdisc`* `c`.`xqtypur` AS `xtotaldisc`, `c`.`zemail` AS `zemail` FROM (`pogrnmst` `m` join `pogrndet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xgrnnum` = `c`.`xgrnnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vgrnreturndet`
--
DROP TABLE IF EXISTS `vgrnreturndet`;

CREATE VIEW `vgrnreturndet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xgrnsl` AS `xgrnsl`, `m`.`ztime` AS `ztime`, `m`.`xgrnnum` AS `xgrnnum`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `c`.`xwh` AS `xwh`, `c`.`xgrndetsl` AS `xgrndetsl`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqtypur` AS `xqtypur`, `c`.`xextqty` AS `xextqty`, coalesce((select sum(`poreturndet`.`xqty`) from `poreturndet` where `c`.`bizid` = `poreturndet`.`bizid` and `c`.`xgrnnum` = `poreturndet`.`xgrnnum` and `c`.`xgrndetsl` = `poreturndet`.`xrowtrn` and `c`.`xitemcode` = `poreturndet`.`xitemcode`),0) AS `xreturnqty`, `c`.`xratepur` AS `xratepur`, `c`.`xqtypur`* `c`.`xratepur` / (`c`.`xqtypur` + `c`.`xextqty`) AS `xstdcost`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xconversion` AS `xconversion`, `c`.`xunitstk` AS `xunitstk`, `c`.`xdisc` AS `xdisc`, `c`.`xqtypur`* `c`.`xratepur` AS `xtotal`, `c`.`xqtypur`* (`c`.`xtaxrate` * `c`.`xratepur` / 100) AS `xtotaltax`, `c`.`xdisc`* `c`.`xqtypur` AS `xtotaldisc`, `c`.`zemail` AS `zemail` FROM (`pogrnmst` `m` join `pogrndet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xgrnnum` = `c`.`xgrnnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vimreqdeldet`
--
DROP TABLE IF EXISTS `vimreqdeldet`;

CREATE VIEW `vimreqdeldet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`ztime` AS `ztime`, `m`.`xreqdelnum` AS `xreqdelnum`, `m`.`xsonum` AS `xsonum`, `m`.`xcus` AS `xcus`, `m`.`xgrossdisc` AS `xgrossdisc`, (select `seitem`.`xsup` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xsup`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xrate` AS `xrate`, `c`.`xstdcost` AS `xstdcost`, `c`.`xratepur` AS `xratepur`, `c`.`xunit` AS `xunit`, `c`.`xtypestk` AS `xtypestk`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xtaxrate`* `c`.`xrate` / 100 * `c`.`xqty` AS `xtaxamt`, `c`.`xdisc` AS `xdisc`, `c`.`xdisc`* `c`.`xqty` AS `xdiscamt`, `c`.`zemail` AS `zemail` FROM (`imreqdelmst` `m` join `imreqdeldet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xreqdelnum` = `c`.`xreqdelnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vimreqdet`
--
DROP TABLE IF EXISTS `vimreqdet`;

CREATE VIEW `vimreqdet`  AS SELECT `m`.`ztime` AS `ztime`, `m`.`bizid` AS `bizid`, `m`.`zemail` AS `zemail`, `m`.`ximreqnum` AS `ximreqnum`, `m`.`xdate` AS `xdate`, `m`.`xrdin` AS `xrdin`, (select `mlminfo`.`xorg` from `mlminfo` where `m`.`bizid` = `mlminfo`.`bizid` and `m`.`xrdin` = `mlminfo`.`xrdin`) AS `xreqby`, (select `mlminfo`.`xmobile` from `mlminfo` where `m`.`bizid` = `mlminfo`.`bizid` and `m`.`xrdin` = `mlminfo`.`xrdin`) AS `xmobile`, (select `seitem`.`xsup` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xsup`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, (select `seitem`.`xpricepur` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xstdcost`, (select `seitem`.`xunitstk` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xunitstk`, `m`.`xnote` AS `xdeladd`, `m`.`xstatus` AS `xstatus`, `m`.`xbranch` AS `xbranch`, `c`.`xrow` AS `xrow`, `c`.`stno` AS `stno`, `c`.`xitemcode` AS `xitemcode`, `c`.`xqty` AS `xqty`, `c`.`xrate` AS `xrate`, `c`.`xyear` AS `xyear`, `c`.`xper` AS `xper` FROM (`imreq` `m` join `imreqdet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`ximreqnum` = `c`.`ximreqnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vimreturndet`
--
DROP TABLE IF EXISTS `vimreturndet`;

CREATE VIEW `vimreturndet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`ztime` AS `ztime`, `m`.`xreqdelnum` AS `xreqdelnum`, `m`.`xdoreturnnum` AS `xdoreturnnum`, `m`.`xcus` AS `xcus`, `c`.`xreturndetsl` AS `xreturndetsl`, (select `seitem`.`xsup` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xsup`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xrate` AS `xrate`, `c`.`xratepur` AS `xratepur`, `c`.`xunit` AS `xunit`, `c`.`xtypestk` AS `xtypestk`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xdisc` AS `xdisc`, `c`.`xstdcost` AS `xstdcost`, `c`.`zemail` AS `zemail` FROM (`imdoreturn` `m` join `imdoreturndet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xdoreturnnum` = `c`.`xdoreturnnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vimstock`
--
DROP TABLE IF EXISTS `vimstock`;

CREATE VIEW `vimstock`  AS SELECT `vimtrn`.`bizid` AS `bizid`, `vimtrn`.`xwh` AS `xwh`, `vimtrn`.`xitemcode` AS `xitemcode`, sum(`vimtrn`.`xqtypo` * `vimtrn`.`xsignpo`) AS `xqtypo`, sum(`vimtrn`.`xqty` * `vimtrn`.`xsign`) AS `xqty`, sum(`vimtrn`.`xqtyso` * `vimtrn`.`xsignso`) AS `xqtyso` FROM `vimtrn` GROUP BY `vimtrn`.`bizid`, `vimtrn`.`xwh`, `vimtrn`.`xitemcode` ;

-- --------------------------------------------------------

--
-- Structure for view `vimtransferdet`
--
DROP TABLE IF EXISTS `vimtransferdet`;

CREATE VIEW `vimtransferdet`  AS SELECT `m`.`ztime` AS `ztime`, `m`.`bizid` AS `bizid`, `m`.`zemail` AS `zemail`, `m`.`xdate` AS `xdate`, `m`.`ximptnum` AS `ximptnum`, `c`.`xdoctype` AS `xdoctype`, `m`.`xstatus` AS `xstatus`, `m`.`xyear` AS `xyear`, `m`.`xper` AS `xper`, `m`.`xsup` AS `xsup`, `c`.`xrow` AS `xrow`, `c`.`xwh` AS `xwh`, `c`.`xtxnwh` AS `xtxnwh`, `m`.`xbranch` AS `xbranch`, `m`.`xproj` AS `xproj`, `c`.`xitemcode` AS `xitemcode`, `c`.`xitembatch` AS `xitembatch`, (select `seitem`.`xdesc` from `seitem` where `seitem`.`xitemcode` = `c`.`xitemcode` and `seitem`.`bizid` = `c`.`bizid`) AS `xitemdesc`, `c`.`xqty` AS `xqty`, `c`.`xunit` AS `xunit`, `c`.`xstdcost` AS `xstdcost`, `c`.`xsign` AS `xsign` FROM (`imtransfer` `m` join `imtransferdet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`ximptnum` = `c`.`ximptnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vimtrn`
--
DROP TABLE IF EXISTS `vimtrn`;

CREATE VIEW `vimtrn`  AS SELECT `vpogrndet`.`ztime` AS `ztime`, `vpogrndet`.`bizid` AS `bizid`, `vpogrndet`.`xdate` AS `xdate`, `vpogrndet`.`xponum` AS `xtxnnum`, `vpogrndet`.`xsup` AS `xsup`, `vpogrndet`.`xrow` AS `xrow`, `vpogrndet`.`xwh` AS `xwh`, `vpogrndet`.`xbranch` AS `xbranch`, `vpogrndet`.`xproj` AS `xproj`, `vpogrndet`.`xitemcode` AS `xitemcode`, `vpogrndet`.`xitembatch` AS `xitembatch`, `vpogrndet`.`xitemdesc` AS `xitemdesc`, `vpogrndet`.`xqty`- `vpogrndet`.`xgrnqty` AS `xqtypo`, `vpogrndet`.`xunitpur` AS `xunitpur`, 0 AS `xqty`, 0 AS `xextqty`, '' AS `xunitstk`, 0 AS `xqtyso`, `vpogrndet`.`xratepur` AS `xratepur`, `vpogrndet`.`xconversion` AS `xconversion`, 0 AS `xstdcost`, 0 AS `xstdprice`, `vpogrndet`.`xdisc` AS `xdisc`, 'Purchase Order' AS `xdoctype`, `vpogrndet`.`zemail` AS `zemail`, 1 AS `xsignpo`, 0 AS `xsign`, 0 AS `xsignso` FROM `vpogrndet` WHERE `vpogrndet`.`xstatus` = 'Confirmed' AND `vpogrndet`.`xtypestk` = 'Stocking' ;

-- --------------------------------------------------------

--
-- Structure for view `vitemcost`
--
DROP TABLE IF EXISTS `vitemcost`;

CREATE VIEW `vitemcost`  AS SELECT `vitemcostdt`.`bizid` AS `bizid`, `vitemcostdt`.`xitemcode` AS `xitemcode`, `vitemcostdt`.`totalqty` AS `totalqty`, `vitemcostdt`.`totalpurchasecost`/ `vitemcostdt`.`totalqty` AS `avgcost` FROM `vitemcostdt` ;

-- --------------------------------------------------------

--
-- Structure for view `vitemcostdt`
--
DROP TABLE IF EXISTS `vitemcostdt`;

CREATE VIEW `vitemcostdt`  AS SELECT `vimtrn`.`bizid` AS `bizid`, `vimtrn`.`xitemcode` AS `xitemcode`, sum(`vimtrn`.`xqty` * `vimtrn`.`xsign`) AS `totalqty`, sum(`vimtrn`.`xqty` * `vimtrn`.`xstdcost` * `vimtrn`.`xsign`) AS `totalpurchasecost` FROM `vimtrn` WHERE `vimtrn`.`xqty` <> 0 GROUP BY `vimtrn`.`bizid`, `vimtrn`.`xitemcode` ORDER BY `vimtrn`.`xitemcode` ASC ;

-- --------------------------------------------------------

--
-- Structure for view `vpmfgrdet`
--
DROP TABLE IF EXISTS `vpmfgrdet`;

CREATE VIEW `vpmfgrdet`  AS SELECT `m`.`xfgrsl` AS `xfgrsl`, `m`.`zemail` AS `zemail`, `m`.`ztime` AS `ztime`, `m`.`bizid` AS `bizid`, `m`.`xfgrnum` AS `xfgrnum`, `m`.`xitemcode` AS `xitemcode`, `m`.`xbatchno` AS `xbatchno`, `m`.`xexpdate` AS `xexpdate`, `m`.`xdate` AS `xdate`, `m`.`xqty` AS `xqty`, `m`.`xstdcost` AS `xstdcost`, `m`.`xwh` AS `xwh`, `m`.`xbranch` AS `xbranch`, `m`.`xproj` AS `xproj`, `c`.`xfgrdetsl` AS `xfgrdetsl`, `c`.`xrow` AS `xrow`, `c`.`xrawitem` AS `xrawitem`, `c`.`xwh` AS `xrawwh`, `c`.`xqty`* `m`.`xqty` AS `xrawqty`, `c`.`xstdcost` AS `xrawcost`, `c`.`xunit` AS `xunit`, `c`.`xitemtype` AS `xitemtype` FROM (`pmfgrmst` `m` join `pmfgrdet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xfgrnum` = `c`.`xfgrnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vpoavgcost`
--
DROP TABLE IF EXISTS `vpoavgcost`;

CREATE VIEW `vpoavgcost`  AS SELECT `podet`.`bizid` AS `bizid`, `podet`.`xitemcode` AS `xitemcode`, format(avg(`podet`.`xratepur`),6) AS `xavgcost` FROM `podet` GROUP BY `podet`.`bizid`, `podet`.`xitemcode` ;

-- --------------------------------------------------------

--
-- Structure for view `vpocostdt`
--
DROP TABLE IF EXISTS `vpocostdt`;

CREATE VIEW `vpocostdt`  AS SELECT `c`.`zemail` AS `zemail`, `m`.`bizid` AS `bizid`, `m`.`xposl` AS `xposl`, `m`.`ztime` AS `ztime`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, `c`.`xexch` AS `xexch`, `c`.`xunitstk` AS `xunitstk`, `c`.`xtypestk` AS `xtypestk`, `c`.`xwh` AS `xwh`, `c`.`xconversion` AS `xconversion`, `c`.`xcur` AS `xcur`, `m`.`xpotype` AS `xpotype`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xratepur` AS `xratepur`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xdisc` AS `xdisc`, `m`.`xtotalpoamt` AS `xtotalpoamt`, `m`.`xtotalcost` AS `xtotalcost`, (`m`.`xtotalpoamt` + `m`.`xtotalcost`) / `m`.`xtotalpoamt` * (`c`.`xtotal` - `c`.`xtotaldisc`) / `c`.`xqty` AS `xpocost` FROM (`vpoheader` `m` join `vpodet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xponum` = `c`.`xponum` ;

-- --------------------------------------------------------

--
-- Structure for view `vpodet`
--
DROP TABLE IF EXISTS `vpodet`;

CREATE VIEW `vpodet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xposl` AS `xposl`, `m`.`ztime` AS `ztime`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, `m`.`xshipterm` AS `xshipterm`, `m`.`xshipvia` AS `xshipvia`, `m`.`xlcno` AS `xlcno`, `m`.`xlcdate` AS `xlcdate`, `m`.`xghodate` AS `xghodate`, `m`.`xdeldate` AS `xdeldate`, `m`.`xetd` AS `xetd`, `m`.`xeta` AS `xeta`, `m`.`xcorto` AS `xcorto`, `m`.`xcoradd` AS `xcoradd`, `m`.`xcorphone` AS `xcorphone`, `m`.`xcoremail` AS `xcoremail`, `m`.`xpino` AS `xpino`, `m`.`xpidate` AS `xpidate`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `c`.`xwh` AS `xwh`, `m`.`xnote` AS `xnote`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, year(`m`.`xdate`) AS `xyear`, month(`m`.`xdate`) AS `xper`, `m`.`xcur` AS `xcur`, `m`.`xexch` AS `xexch`, `m`.`xpotype` AS `xpotype`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xratepur` AS `xratepur`, `c`.`xtypestk` AS `xtypestk`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xconversion` AS `xconversion`, `c`.`xunitstk` AS `xunitstk`, `c`.`xdisc` AS `xdisc`, `c`.`xqty`* (`c`.`xratepur` * `m`.`xexch`) AS `xtotal`, `c`.`xqty`* (`c`.`xtaxrate` * (`c`.`xratepur` * `m`.`xexch`) / 100) AS `xtotaltax`, `c`.`xdisc`* `m`.`xexch` * `c`.`xqty` AS `xtotaldisc`, `c`.`xqty`* `c`.`xratepur` AS `xbasetotal`, `c`.`xdisc`* `c`.`xqty` AS `xbasetotaldisc`, `c`.`zemail` AS `zemail` FROM (`pomst` `m` join `podet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xponum` = `c`.`xponum` ;

-- --------------------------------------------------------

--
-- Structure for view `vpogrndet`
--
DROP TABLE IF EXISTS `vpogrndet`;

CREATE VIEW `vpogrndet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xposl` AS `xposl`, `m`.`ztime` AS `ztime`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `m`.`xpotype` AS `xpotype`, `m`.`xexch` AS `xexch`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, coalesce((select sum(`pogrndet`.`xqtypur`) from `pogrndet` where `c`.`bizid` = `pogrndet`.`bizid` and `c`.`xponum` = `pogrndet`.`xponum` and `c`.`xitemcode` = `pogrndet`.`xitemcode`),0) AS `xgrnqty`, `c`.`xratepur` AS `xratepur`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xtypestk` AS `xtypestk`, `c`.`xconversion` AS `xconversion`, `c`.`xunitstk` AS `xunitstk`, `c`.`xdisc` AS `xdisc`, `c`.`xqty`* `c`.`xratepur` AS `xtotal`, `c`.`xqty`* (`c`.`xtaxrate` * `c`.`xratepur` / 100) AS `xtotaltax`, `c`.`xdisc`* `c`.`xqty` AS `xtotaldisc`, `c`.`zemail` AS `zemail` FROM (`pomst` `m` join `podet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xponum` = `c`.`xponum` ;

-- --------------------------------------------------------

--
-- Structure for view `vpoheader`
--
DROP TABLE IF EXISTS `vpoheader`;

CREATE VIEW `vpoheader`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xpotype` AS `xpotype`, `m`.`xposl` AS `xposl`, `m`.`ztime` AS `ztime`, `m`.`xponum` AS `xponum`, `m`.`xsup` AS `xsup`, `m`.`xshipterm` AS `xshipterm`, `m`.`xshipvia` AS `xshipvia`, `m`.`xlcno` AS `xlcno`, `m`.`xlcdate` AS `xlcdate`, `m`.`xghodate` AS `xghodate`, `m`.`xdeldate` AS `xdeldate`, `m`.`xetd` AS `xetd`, `m`.`xeta` AS `xeta`, `m`.`xcorto` AS `xcorto`, `m`.`xcoradd` AS `xcoradd`, `m`.`xcorphone` AS `xcorphone`, `m`.`xcoremail` AS `xcoremail`, `m`.`xpino` AS `xpino`, `m`.`xpidate` AS `xpidate`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `m`.`xnote` AS `xnote`, `m`.`xstatus` AS `xstatus`, year(`m`.`xdate`) AS `xyear`, month(`m`.`xdate`) AS `xper`, `m`.`xcur` AS `xcur`, `m`.`xexch` AS `xexch`, coalesce((select sum(`c`.`xqty` * (`c`.`xratepur` * `c`.`xexch`)) from `podet` `c` where `m`.`bizid` = `c`.`bizid` and `m`.`xponum` = `c`.`xponum`),0) AS `xtotalpoamt`, coalesce((select sum(`d`.`xamount`) from `pocost` `d` where `m`.`bizid` = `d`.`bizid` and `m`.`xponum` = `d`.`xponum`),0) AS `xtotalcost` FROM `pomst` AS `m` ;

-- --------------------------------------------------------

--
-- Structure for view `vpomilestone`
--
DROP TABLE IF EXISTS `vpomilestone`;

CREATE VIEW `vpomilestone`  AS SELECT `vpogrndet`.`bizid` AS `bizid`, `vpogrndet`.`xponum` AS `xponum`, `vpogrndet`.`xsup` AS `xsup`, `vpogrndet`.`xorg` AS `xorg`, if(sum(`vpogrndet`.`xqty`) - sum(`vpogrndet`.`xgrnqty`) > 0,'Milestone Not Completed','Milestone Completed') AS `xmilestone` FROM `vpogrndet` GROUP BY `vpogrndet`.`bizid`, `vpogrndet`.`xponum`, `vpogrndet`.`xsup`, `vpogrndet`.`xorg` ;

-- --------------------------------------------------------

--
-- Structure for view `vporeturndet`
--
DROP TABLE IF EXISTS `vporeturndet`;

CREATE VIEW `vporeturndet`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`xporeturnsl` AS `xporeturnsl`, `m`.`ztime` AS `ztime`, `m`.`xporeturnnum` AS `xporeturnnum`, `m`.`xgrnnum` AS `xgrnnum`, `m`.`xsup` AS `xsup`, (select `sesup`.`xorg` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xorg`, (select `sesup`.`xadd1` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupadd`, (select `sesup`.`xphone` from `sesup` where `m`.`bizid` = `sesup`.`bizid` and `m`.`xsup` = `sesup`.`xsup`) AS `xsupphone`, `m`.`xsupdoc` AS `xsupdoc`, `c`.`xwh` AS `xwh`, `c`.`xbranch` AS `xbranch`, `c`.`xproj` AS `xproj`, `m`.`xstatus` AS `xstatus`, `c`.`xdate` AS `xdate`, `c`.`xporeturndetsl` AS `xporeturndetsl`, `c`.`xrow` AS `xrow`, `c`.`xitemcode` AS `xitemcode`, (select `seitem`.`xdesc` from `seitem` where `c`.`bizid` = `seitem`.`bizid` and `c`.`xitemcode` = `seitem`.`xitemcode`) AS `xitemdesc`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xextqty` AS `xextqty`, `c`.`xratepur` AS `xratepur`, `c`.`xqty`* `c`.`xratepur` / (`c`.`xqty` + `c`.`xextqty`) AS `xstdcost`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xunitpur` AS `xunitpur`, `c`.`xtypestk` AS `xtypestk`, `c`.`xconversion` AS `xconversion`, `c`.`xunitstk` AS `xunitstk`, `c`.`xdisc` AS `xdisc`, `c`.`xqty`* `c`.`xratepur` AS `xtotal`, `c`.`xqty`* (`c`.`xtaxrate` * `c`.`xratepur` / 100) AS `xtotaltax`, `c`.`xdisc`* `c`.`xqty` AS `xtotaldisc`, `c`.`zemail` AS `zemail` FROM (`poreturn` `m` join `poreturndet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xporeturnnum` = `c`.`xporeturnnum` ;

-- --------------------------------------------------------

--
-- Structure for view `vquotmilestone`
--
DROP TABLE IF EXISTS `vquotmilestone`;

CREATE VIEW `vquotmilestone`  AS SELECT `soquot`.`xsl` AS `xsl`, `soquot`.`ztime` AS `ztime`, `soquot`.`zutime` AS `zutime`, `soquot`.`zemail` AS `zemail`, `soquot`.`xemail` AS `xemail`, `soquot`.`bizid` AS `bizid`, `soquot`.`xquotnum` AS `xquotnum`, `soquot`.`xdate` AS `xdate`, `soquot`.`xcus` AS `xcus`, `soquot`.`xgrossdisc` AS `xgrossdisc`, `soquot`.`xnotes` AS `xnotes`, `soquot`.`xcusdoc` AS `xcusdoc`, `soquot`.`xmanager` AS `xmanager`, `soquot`.`xbranch` AS `xbranch`, `soquot`.`xwh` AS `xwh`, `soquot`.`xproj` AS `xproj`, `soquot`.`xstatus` AS `xstatus`, `soquot`.`xrecflag` AS `xrecflag`, (select `somst`.`xsonum` from `somst` where `soquot`.`xquotnum` = `somst`.`xquotnum` and `soquot`.`bizid` = `somst`.`bizid`) AS `xsonum` FROM `soquot` ;

-- --------------------------------------------------------

--
-- Structure for view `vrecnpay`
--
DROP TABLE IF EXISTS `vrecnpay`;

CREATE VIEW `vrecnpay`  AS SELECT `g`.`bizid` AS `bizid`, `g`.`xdate` AS `xdate`, `g`.`xvoucher` AS `xvoucher`, `g`.`xacc` AS `xacc`, `g`.`xaccdesc` AS `xaccdesc`, `g`.`xaccusage` AS `xaccusage`, `g`.`xaccsub` AS `xaccsub`, `g`.`xacctype` AS `xacctype`, `g`.`xaccsource` AS `xaccsource`, `g`.`xcur` AS `xcur`, `g`.`xbase` AS `xbase`, `g`.`xprime` AS `xprime`, `g`.`xsite` AS `xsite`, 'Receipt Payment' AS `xtype` FROM (`gldetailview` `g` join `vrecnpayvou` `v`) WHERE `v`.`bizid` = `g`.`bizid` AND `v`.`xvoucher` = `g`.`xvoucher` AND `g`.`xaccusage` not in ('Bank','Cash') ;

-- --------------------------------------------------------

--
-- Structure for view `vrecnpaycb`
--
DROP TABLE IF EXISTS `vrecnpaycb`;

CREATE VIEW `vrecnpaycb`  AS SELECT `gldetailview`.`bizid` AS `bizid`, `gldetailview`.`xdate` AS `xdate`, `gldetailview`.`xvoucher` AS `xvoucher`, `gldetailview`.`xacc` AS `xacc`, `gldetailview`.`xaccdesc` AS `xaccdesc`, `gldetailview`.`xaccsub` AS `xaccsub`, `gldetailview`.`xacctype` AS `xacctype`, `gldetailview`.`xaccusage` AS `xaccusage`, `gldetailview`.`xaccsource` AS `xaccsource`, `gldetailview`.`xcur` AS `xcur`, `gldetailview`.`xbase` AS `xbase`, `gldetailview`.`xprime` AS `xprime`, `gldetailview`.`xsite` AS `xsite`, 'Cash & Bank' AS `xtype`, `gldetailview`.`xflag` AS `xflag`, `gldetailview`.`xdoctype` AS `xdoctype` FROM `gldetailview` WHERE `gldetailview`.`xaccusage` in ('Bank','Cash') ;

-- --------------------------------------------------------

--
-- Structure for view `vrecnpayvou`
--
DROP TABLE IF EXISTS `vrecnpayvou`;

CREATE VIEW `vrecnpayvou`  AS SELECT DISTINCT `gldetailview`.`bizid` AS `bizid`, `gldetailview`.`xvoucher` AS `xvoucher` FROM `gldetailview` WHERE `gldetailview`.`xaccusage` in ('Bank','Cash') ;

-- --------------------------------------------------------

--
-- Structure for view `vsalesdodt`
--
DROP TABLE IF EXISTS `vsalesdodt`;

CREATE VIEW `vsalesdodt`  AS SELECT `m`.`bizid` AS `bizid`, `c`.`sodetsl` AS `sosl`, `m`.`ztime` AS `ztime`, `m`.`zemail` AS `zemail`, `m`.`xsonum` AS `xsonum`, `m`.`xquotnum` AS `xquotnum`, `m`.`xdate` AS `xdate`, `m`.`xcus` AS `xcus`, `m`.`xgrossdisc` AS `xgrossdisc`, `m`.`xnotes` AS `xnotes`, `m`.`xcusdoc` AS `xcusdoc`, `m`.`xstatus` AS `xstatus`, `m`.`xrecflag` AS `xrecflag`, `m`.`xyear` AS `xyear`, `m`.`xper` AS `xper`, `m`.`xvoucher` AS `xvoucher`, `m`.`xmanager` AS `xmanager`, `m`.`xsalesaccdr` AS `xsalesaccdr`, `m`.`xsalesacccr` AS `xsalesacccr`, `m`.`ximaccdr` AS `ximaccdr`, `m`.`ximacccr` AS `ximacccr`, `m`.`xvataccdr` AS `xvataccdr`, `m`.`xvatacccr` AS `xvatacccr`, `m`.`xdiscaccdr` AS `xdiscaccdr`, `m`.`xdiscacccr` AS `xdiscacccr`, `m`.`xwh` AS `xwh`, `m`.`xbranch` AS `xbranch`, `m`.`xproj` AS `xproj`, `c`.`xrow` AS `xrow`, `c`.`xrowquot` AS `xrowquot`, `c`.`xitemcode` AS `xitemcode`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, coalesce((select sum(`imreqdeldet`.`xqty`) from `imreqdeldet` where `c`.`bizid` = `imreqdeldet`.`bizid` and `c`.`xsonum` = `imreqdeldet`.`xsonum` and `c`.`xrow` = `imreqdeldet`.`xrowtrn` and `c`.`xitemcode` = `imreqdeldet`.`xitemcode`),0) AS `xdoqty`, `c`.`xcost` AS `xcost`, `c`.`xrate` AS `xrate`, `c`.`xqty`* `c`.`xcost` AS `xcosttotal`, `c`.`xqty`* `c`.`xexch` * `c`.`xrate` AS `xsubtotal`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xqty`* `c`.`xexch` * `c`.`xrate` * `c`.`xtaxrate` / 100 AS `xtaxtotal`, `c`.`xunitsale` AS `xunitsale`, `c`.`xtypestk` AS `xtypestk`, `c`.`xexch` AS `xexch`, `c`.`xcur` AS `xcur`, `c`.`xdisc` AS `xdisc`, `c`.`xqty`* `c`.`xexch` * `c`.`xdisc` AS `xdisctotal`, `c`.`xtaxcode` AS `xtaxcode`, `c`.`xtaxscope` AS `xtaxscope` FROM (`somst` `m` join `sodet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xsonum` = `c`.`xsonum` ;

-- --------------------------------------------------------

--
-- Structure for view `vsalesdt`
--
DROP TABLE IF EXISTS `vsalesdt`;

CREATE VIEW `vsalesdt`  AS SELECT `m`.`bizid` AS `bizid`, `c`.`sodetsl` AS `sosl`, `m`.`ztime` AS `ztime`, `m`.`zemail` AS `zemail`, `m`.`xsonum` AS `xsonum`, `m`.`xquotnum` AS `xquotnum`, `m`.`xdate` AS `xdate`, `m`.`xcus` AS `xcus`, `m`.`xgrossdisc` AS `xgrossdisc`, `m`.`xnotes` AS `xnotes`, `m`.`xcusdoc` AS `xcusdoc`, `m`.`xstatus` AS `xstatus`, `m`.`xrecflag` AS `xrecflag`, year(`m`.`xdate`) AS `xyear`, month(`m`.`xdate`) AS `xper`, `m`.`xvoucher` AS `xvoucher`, `m`.`xmanager` AS `xmanager`, `m`.`xsalesaccdr` AS `xsalesaccdr`, `m`.`xsalesacccr` AS `xsalesacccr`, `m`.`ximaccdr` AS `ximaccdr`, `m`.`ximacccr` AS `ximacccr`, `m`.`xvataccdr` AS `xvataccdr`, `m`.`xvatacccr` AS `xvatacccr`, `m`.`xdiscaccdr` AS `xdiscaccdr`, `m`.`xdiscacccr` AS `xdiscacccr`, `m`.`xwh` AS `xwh`, `m`.`xbranch` AS `xbranch`, `m`.`xproj` AS `xproj`, `c`.`xrow` AS `xrow`, `c`.`xrowquot` AS `xrowquot`, `c`.`xitemcode` AS `xitemcode`, `c`.`xitembatch` AS `xitembatch`, `c`.`xqty` AS `xqty`, `c`.`xcost` AS `xcost`, `c`.`xrate` AS `xrate`, `c`.`xqty`* `c`.`xcost` AS `xcosttotal`, `c`.`xqty`* `c`.`xexch` * `c`.`xrate` AS `xsubtotal`, `c`.`xtaxrate` AS `xtaxrate`, `c`.`xqty`* `c`.`xexch` * `c`.`xrate` * `c`.`xtaxrate` / 100 AS `xtaxtotal`, `c`.`xunitsale` AS `xunitsale`, `c`.`xtypestk` AS `xtypestk`, `c`.`xexch` AS `xexch`, `c`.`xcur` AS `xcur`, `c`.`xdisc` AS `xdisc`, `c`.`xqty`* `c`.`xexch` * `c`.`xdisc` AS `xdisctotal`, `c`.`xtaxcode` AS `xtaxcode`, `c`.`xtaxscope` AS `xtaxscope` FROM (`somst` `m` join `sodet` `c`) WHERE `m`.`bizid` = `c`.`bizid` AND `m`.`xsonum` = `c`.`xsonum` ;

-- --------------------------------------------------------

--
-- Structure for view `vsecodes`
--
DROP TABLE IF EXISTS `vsecodes`;

CREATE VIEW `vsecodes`  AS SELECT `secodes`.`bizid` AS `bizid`, `secodes`.`codeid` AS `codeid`, `secodes`.`xcodetype` AS `xcodetype`, `secodes`.`xcode` AS `xcode`, `secodes`.`xdesc` AS `xdesc`, `secodes`.`xcoderem` AS `xcoderem` FROM `secodes` ;

-- --------------------------------------------------------

--
-- Structure for view `vsomilestone`
--
DROP TABLE IF EXISTS `vsomilestone`;

CREATE VIEW `vsomilestone`  AS SELECT `m`.`bizid` AS `bizid`, `m`.`ztime` AS `ztime`, `m`.`zemail` AS `zemail`, `m`.`xsonum` AS `xsonum`, `m`.`xquotnum` AS `xquotnum`, `m`.`xdate` AS `xdate`, `m`.`xcus` AS `xcus`, (select coalesce(count(0),0) from `imreqdelmst` `c` where `m`.`xsonum` = `c`.`xsonum` and `m`.`bizid` = `c`.`bizid`) AS `xdelcount` FROM `somst` AS `m` ;

-- --------------------------------------------------------

--
-- Structure for view `vsupplierbal`
--
DROP TABLE IF EXISTS `vsupplierbal`;

CREATE VIEW `vsupplierbal`  AS SELECT `gldetail`.`bizid` AS `bizid`, `gldetail`.`xaccsub` AS `xaccsub`, sum(`gldetail`.`xprime`) AS `xbal` FROM `gldetail` WHERE `gldetail`.`xaccsource` = 'Supplier' GROUP BY `gldetail`.`bizid`, `gldetail`.`xaccsub` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abcmessage`
--
ALTER TABLE `abcmessage`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `ablstatement`
--
ALTER TABLE `ablstatement`
  ADD PRIMARY KEY (`bizid`,`stno`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`xbatch`);

--
-- Indexes for table `classdet`
--
ALTER TABLE `classdet`
  ADD PRIMARY KEY (`xclass`);

--
-- Indexes for table `distcashnbankpay`
--
ALTER TABLE `distcashnbankpay`
  ADD PRIMARY KEY (`xpaynum`),
  ADD UNIQUE KEY `xpaynum` (`xpaynum`),
  ADD KEY `stno` (`stno`,`xrdin`),
  ADD KEY `zemail` (`zemail`,`xtype`,`xamount`,`xbank`);

--
-- Indexes for table `distdelscope`
--
ALTER TABLE `distdelscope`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD UNIQUE KEY `xreqdelnum` (`xreqdelnum`),
  ADD KEY `xrdin` (`xrdin`,`xphone`,`xdeltype`,`xdeldocnum`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `fk_reqdelnum_delscope` (`bizid`,`xreqdelnum`);

--
-- Indexes for table `distpaynreq`
--
ALTER TABLE `distpaynreq`
  ADD PRIMARY KEY (`xpaynreqnum`,`xrdin`,`xotn`),
  ADD UNIQUE KEY `xpaynreqnum` (`xpaynreqnum`),
  ADD UNIQUE KEY `xpaynreqnum_2` (`xpaynreqnum`),
  ADD UNIQUE KEY `xpaynreqnum_3` (`xpaynreqnum`),
  ADD KEY `xrdin` (`xrdin`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `xotn` (`xotn`),
  ADD KEY `xdoctype` (`xdoctype`),
  ADD KEY `xrdin_2` (`xrdin`,`xotn`);

--
-- Indexes for table `ecomsalesdet`
--
ALTER TABLE `ecomsalesdet`
  ADD PRIMARY KEY (`xecomdetsl`),
  ADD UNIQUE KEY `xecomdetsl` (`xecomdetsl`),
  ADD KEY `xitemcode` (`xitemcode`,`xwh`,`xyear`,`xper`),
  ADD KEY `xcus` (`xcus`),
  ADD KEY `xecomsl` (`xecomsl`),
  ADD KEY `xitemcode_2` (`xitemcode`),
  ADD KEY `xdate` (`xdate`),
  ADD KEY `xref` (`xref`);

--
-- Indexes for table `ecomsalesmst`
--
ALTER TABLE `ecomsalesmst`
  ADD PRIMARY KEY (`xecomsl`),
  ADD UNIQUE KEY `xecomsl` (`xecomsl`);

--
-- Indexes for table `ecomsales_temp`
--
ALTER TABLE `ecomsales_temp`
  ADD PRIMARY KEY (`xtemsl`),
  ADD UNIQUE KEY `xtxnnum` (`xtxnnum`),
  ADD KEY `xstudentmobile` (`xstudentmobile`);

--
-- Indexes for table `ecomsales_temp_deleted`
--
ALTER TABLE `ecomsales_temp_deleted`
  ADD UNIQUE KEY `xtxnnum` (`xtxnnum`),
  ADD UNIQUE KEY `xtemsl` (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xstudentmobile` (`xstudentmobile`);

--
-- Indexes for table `educat`
--
ALTER TABLE `educat`
  ADD PRIMARY KEY (`xcatsl`),
  ADD KEY `xcat` (`xcat`);

--
-- Indexes for table `educourse`
--
ALTER TABLE `educourse`
  ADD PRIMARY KEY (`xcourse`),
  ADD KEY `xcat` (`xcat`),
  ADD KEY `xfinished` (`xfinished`);

--
-- Indexes for table `edusalesdet`
--
ALTER TABLE `edusalesdet`
  ADD PRIMARY KEY (`xsalesdetsl`),
  ADD KEY `xstudent` (`xstudent`),
  ADD KEY `xcourse` (`xcourse`),
  ADD KEY `xdate` (`xdate`);

--
-- Indexes for table `edusalesmst`
--
ALTER TABLE `edusalesmst`
  ADD PRIMARY KEY (`xsalenum`),
  ADD KEY `xstudent` (`xstudent`),
  ADD KEY `xmobile` (`xmobile`);

--
-- Indexes for table `edustudent`
--
ALTER TABLE `edustudent`
  ADD PRIMARY KEY (`xstudent`),
  ADD UNIQUE KEY `xmobile` (`xmobile`);

--
-- Indexes for table `eduteacher`
--
ALTER TABLE `eduteacher`
  ADD PRIMARY KEY (`xteacher`),
  ADD UNIQUE KEY `xmobile` (`xmobile`),
  ADD UNIQUE KEY `xemailaddr` (`xemailaddr`),
  ADD KEY `xstatus` (`xstatus`);

--
-- Indexes for table `eduvenu`
--
ALTER TABLE `eduvenu`
  ADD PRIMARY KEY (`xvenusl`),
  ADD UNIQUE KEY `xvenu_2` (`xvenu`),
  ADD KEY `xvenu` (`xvenu`),
  ADD KEY `xdistrict` (`xdistrict`);

--
-- Indexes for table `emp_movement`
--
ALTER TABLE `emp_movement`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `xsl` (`xsl`,`ztime`,`xdate`,`username`,`xterminal`,`xln`,`xlt`);

--
-- Indexes for table `emp_movement_temp`
--
ALTER TABLE `emp_movement_temp`
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `glchart`
--
ALTER TABLE `glchart`
  ADD PRIMARY KEY (`bizid`,`xacc`),
  ADD UNIQUE KEY `glsl` (`glsl`);

--
-- Indexes for table `glchartsub`
--
ALTER TABLE `glchartsub`
  ADD PRIMARY KEY (`bizid`,`xacc`,`xaccsub`),
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `glchartsub1`
--
ALTER TABLE `glchartsub1`
  ADD PRIMARY KEY (`bizid`,`xacc`,`xaccsub`,`xaccsub1`),
  ADD UNIQUE KEY `sl` (`sl`);

--
-- Indexes for table `glchequereg`
--
ALTER TABLE `glchequereg`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `xacc` (`xchequeno`,`xchequedate`),
  ADD KEY `bizid` (`bizid`,`xacccr`,`xacc`),
  ADD KEY `fk_acc_chqreg` (`bizid`,`xacc`);

--
-- Indexes for table `gldetail`
--
ALTER TABLE `gldetail`
  ADD PRIMARY KEY (`bizid`,`xvoucher`,`xrow`),
  ADD UNIQUE KEY `sl` (`sl`),
  ADD KEY `xacc` (`xacc`),
  ADD KEY `fk_zid_xacc` (`bizid`,`xacc`);

--
-- Indexes for table `glheader`
--
ALTER TABLE `glheader`
  ADD PRIMARY KEY (`bizid`,`xvoucher`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xyear` (`xyear`),
  ADD KEY `xper` (`xper`);

--
-- Indexes for table `glinterface`
--
ALTER TABLE `glinterface`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xacc` (`xacc`),
  ADD KEY `bizid` (`bizid`),
  ADD KEY `fk_glinterface_acc` (`bizid`,`xacc`);

--
-- Indexes for table `homework_questions`
--
ALTER TABLE `homework_questions`
  ADD UNIQUE KEY `xquesid` (`xquesid`);

--
-- Indexes for table `homework_submit`
--
ALTER TABLE `homework_submit`
  ADD PRIMARY KEY (`bizid`,`xquesid`,`xstudent`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `bizid` (`bizid`,`xstudent`,`xitemcode`,`xbatch`);

--
-- Indexes for table `imchkq`
--
ALTER TABLE `imchkq`
  ADD PRIMARY KEY (`bizid`,`ximchkqnum`),
  ADD UNIQUE KEY `imchkqsl` (`imchkqsl`);

--
-- Indexes for table `imchkqdt`
--
ALTER TABLE `imchkqdt`
  ADD PRIMARY KEY (`bizid`,`ximchkqnum`,`xrow`),
  ADD KEY `index_imchkqdt_xitemcode` (`xitemcode`),
  ADD KEY `FK_imchkq_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imchkse`
--
ALTER TABLE `imchkse`
  ADD PRIMARY KEY (`bizid`,`ximchksenum`),
  ADD UNIQUE KEY `imchksl` (`imchksl`);

--
-- Indexes for table `imchksedt`
--
ALTER TABLE `imchksedt`
  ADD PRIMARY KEY (`bizid`,`ximchksenum`,`xrow`),
  ADD KEY `index_imchksedt_xitemcode` (`xitemcode`),
  ADD KEY `FK_imchkse_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imdoreturn`
--
ALTER TABLE `imdoreturn`
  ADD PRIMARY KEY (`bizid`,`xdoreturnnum`),
  ADD UNIQUE KEY `xreturnsl` (`xreturnsl`);

--
-- Indexes for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  ADD PRIMARY KEY (`bizid`,`xdoreturnnum`,`xrow`),
  ADD UNIQUE KEY `xreturndetsl` (`xreturndetsl`),
  ADD KEY `fk_doreturn_itemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `imreq`
--
ALTER TABLE `imreq`
  ADD PRIMARY KEY (`bizid`,`ximreqnum`),
  ADD UNIQUE KEY `imreqsl` (`imreqsl`),
  ADD KEY `xrdin` (`xrdin`);

--
-- Indexes for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  ADD PRIMARY KEY (`bizid`,`xreqdelnum`,`xsonum`,`xrow`),
  ADD UNIQUE KEY `xreqdeldetsl` (`xreqdeldetsl`),
  ADD KEY `xitemcode` (`xitemcode`,`xwh`),
  ADD KEY `fk_reqdeldet_item` (`bizid`,`xitemcode`);

--
-- Indexes for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  ADD PRIMARY KEY (`bizid`,`xreqdelnum`),
  ADD UNIQUE KEY `ximdelsl` (`ximdelsl`),
  ADD KEY `xcus` (`xcus`,`xwh`);

--
-- Indexes for table `imreqdet`
--
ALTER TABLE `imreqdet`
  ADD PRIMARY KEY (`bizid`,`ximreqnum`,`xrow`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `fk_item_itemreqdt` (`bizid`,`xitemcode`);

--
-- Indexes for table `imsetxn`
--
ALTER TABLE `imsetxn`
  ADD PRIMARY KEY (`bizid`,`ximsenum`,`xrow`),
  ADD UNIQUE KEY `ximsesl` (`ximsesl`),
  ADD KEY `bizid` (`bizid`,`xitemcode`),
  ADD KEY `bizid_2` (`bizid`,`xcat`),
  ADD KEY `bizid_3` (`bizid`,`xsl`),
  ADD KEY `bizid_4` (`bizid`,`xsup`),
  ADD KEY `bizid_5` (`bizid`,`xwh`),
  ADD KEY `bizid_6` (`bizid`,`xbranch`),
  ADD KEY `bizid_7` (`bizid`,`xdate`),
  ADD KEY `bizid_8` (`bizid`,`xtxntype`),
  ADD KEY `bizid_9` (`bizid`,`ximsenum`),
  ADD KEY `bizid_10` (`bizid`,`xcolor`,`xsize`),
  ADD KEY `bizid_11` (`bizid`,`xstatus`),
  ADD KEY `bizid_12` (`bizid`,`xyear`,`xper`),
  ADD KEY `bizid_13` (`bizid`,`xitemcode`,`xdesc`,`xsl`,`xsup`,`xwh`,`xbranch`,`xstdcost`,`xqty`),
  ADD KEY `fk_cus_imsetxn` (`bizid`,`xcus`);

--
-- Indexes for table `imtransfer`
--
ALTER TABLE `imtransfer`
  ADD PRIMARY KEY (`bizid`,`ximptnum`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  ADD PRIMARY KEY (`bizid`,`ximptnum`,`xrow`),
  ADD UNIQUE KEY `xtransl` (`xtransl`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`xlesson`);

--
-- Indexes for table `mlminfo`
--
ALTER TABLE `mlminfo`
  ADD PRIMARY KEY (`distrisl`),
  ADD UNIQUE KEY `xrdin` (`xrdin`),
  ADD KEY `xrdin_2` (`xrdin`);

--
-- Indexes for table `mlmpool`
--
ALTER TABLE `mlmpool`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `distrisl` (`distrisl`,`up_distrisl`,`p_distrisl`);

--
-- Indexes for table `mlmtotrep`
--
ALTER TABLE `mlmtotrep`
  ADD PRIMARY KEY (`xcomsl`),
  ADD UNIQUE KEY `xcomsl` (`xcomsl`),
  ADD KEY `bin` (`refbin`),
  ADD KEY `distrisl` (`distrisl`,`xrdin`,`xcomtype`,`xbank`),
  ADD KEY `xcomsl_2` (`xcomsl`),
  ADD KEY `stno` (`stno`),
  ADD KEY `xpaidstatus` (`xpaidstatus`);

--
-- Indexes for table `mlmtree`
--
ALTER TABLE `mlmtree`
  ADD PRIMARY KEY (`bin`),
  ADD KEY `distrisl` (`distrisl`),
  ADD KEY `upbin` (`upbin`,`updistrisl`),
  ADD KEY `xuser` (`xuser`),
  ADD KEY `xyear` (`xyear`,`xper`),
  ADD KEY `stno` (`stno`),
  ADD KEY `mlevel` (`mlevel`,`fm`),
  ADD KEY `bin` (`bin`,`bc`),
  ADD KEY `updistrisl` (`updistrisl`,`upbc`),
  ADD KEY `distrisl_2` (`distrisl`,`bc`),
  ADD KEY `refbin` (`refbin`),
  ADD KEY `xcus` (`xcus`),
  ADD KEY `binpoint` (`binpoint`);

--
-- Indexes for table `mlmtreegen1`
--
ALTER TABLE `mlmtreegen1`
  ADD PRIMARY KEY (`gensl`,`bin`,`upbin`),
  ADD KEY `upbin` (`upbin`),
  ADD KEY `bin` (`bin`),
  ADD KEY `bizid` (`bizid`,`bin`),
  ADD KEY `bizid_2` (`bizid`,`bin`,`upbin`),
  ADD KEY `upbin_2` (`upbin`);

--
-- Indexes for table `mlmtreeref`
--
ALTER TABLE `mlmtreeref`
  ADD PRIMARY KEY (`refsl`),
  ADD UNIQUE KEY `refsl` (`refsl`),
  ADD KEY `refbin` (`refbin`),
  ADD KEY `bin` (`bin`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`xsl`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `order_transaction_temp`
--
ALTER TABLE `order_transaction_temp`
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `osptxn`
--
ALTER TABLE `osptxn`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD UNIQUE KEY `xsl_2` (`xsl`),
  ADD KEY `xrdin` (`xrdin`),
  ADD KEY `xyear` (`xyear`,`xper`),
  ADD KEY `xtxntype` (`xtxntype`),
  ADD KEY `bizid` (`bizid`,`xrdin`,`xtxntype`),
  ADD KEY `bizid_2` (`bizid`,`xrdin`,`xdoctype`);

--
-- Indexes for table `pabuziness`
--
ALTER TABLE `pabuziness`
  ADD PRIMARY KEY (`bizid`);

--
-- Indexes for table `pamenus`
--
ALTER TABLE `pamenus`
  ADD PRIMARY KEY (`bizid`,`zrole`,`xmenu`,`xsubmenu`),
  ADD UNIQUE KEY `xmenuserial` (`xmenuserial`),
  ADD KEY `zrole` (`zrole`);

--
-- Indexes for table `paroles`
--
ALTER TABLE `paroles`
  ADD PRIMARY KEY (`bizid`,`zrole`),
  ADD UNIQUE KEY `xroleid` (`xroleid`),
  ADD KEY `index_paroles_zrole` (`zrole`);

--
-- Indexes for table `pausers`
--
ALTER TABLE `pausers`
  ADD PRIMARY KEY (`bizid`,`zemail`),
  ADD UNIQUE KEY `xusersl` (`xusersl`),
  ADD KEY `index_pausers_zrole` (`zrole`);

--
-- Indexes for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  ADD PRIMARY KEY (`xbomcode`,`xrawitem`),
  ADD UNIQUE KEY `xbomdetsl` (`xbomdetsl`);

--
-- Indexes for table `pmbommst`
--
ALTER TABLE `pmbommst`
  ADD PRIMARY KEY (`xbomcode`),
  ADD UNIQUE KEY `xbomsl` (`xbomsl`),
  ADD UNIQUE KEY `xbomcode` (`xbomcode`,`xitemcode`);

--
-- Indexes for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  ADD PRIMARY KEY (`bizid`,`xfgrnum`,`xrow`,`xrawitem`),
  ADD UNIQUE KEY `xfgrdetsl` (`xfgrdetsl`);

--
-- Indexes for table `pmfgrmst`
--
ALTER TABLE `pmfgrmst`
  ADD PRIMARY KEY (`bizid`,`xfgrnum`),
  ADD UNIQUE KEY `xfgrsl` (`xfgrsl`);

--
-- Indexes for table `pocost`
--
ALTER TABLE `pocost`
  ADD PRIMARY KEY (`bizid`,`xponum`,`xcosthead`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `podet`
--
ALTER TABLE `podet`
  ADD PRIMARY KEY (`bizid`,`xponum`,`xrow`),
  ADD UNIQUE KEY `xpodetsl` (`xpodetsl`),
  ADD UNIQUE KEY `bizid` (`bizid`,`xponum`,`xitemcode`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xbranch` (`xbranch`),
  ADD KEY `fk_item_podet` (`bizid`,`xitemcode`);

--
-- Indexes for table `pogrndet`
--
ALTER TABLE `pogrndet`
  ADD PRIMARY KEY (`bizid`,`xgrnnum`,`xrow`),
  ADD UNIQUE KEY `xgrndetsl` (`xgrndetsl`),
  ADD KEY `xponum` (`xponum`,`xitemcode`,`xwh`),
  ADD KEY `fk_grndt_xitemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  ADD PRIMARY KEY (`bizid`,`xgrnnum`),
  ADD UNIQUE KEY `xgrnsl` (`xgrnsl`),
  ADD KEY `xponum` (`xponum`),
  ADD KEY `xsup` (`xsup`),
  ADD KEY `fk_grnmst_sup` (`bizid`,`xsup`);

--
-- Indexes for table `pomst`
--
ALTER TABLE `pomst`
  ADD PRIMARY KEY (`bizid`,`xponum`),
  ADD UNIQUE KEY `xposl` (`xposl`),
  ADD KEY `fk_sup_pomst` (`bizid`,`xsup`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xrecflag` (`xrecflag`);

--
-- Indexes for table `poreturn`
--
ALTER TABLE `poreturn`
  ADD PRIMARY KEY (`bizid`,`xporeturnnum`),
  ADD UNIQUE KEY `xporeturnsl` (`xporeturnsl`);

--
-- Indexes for table `poreturndet`
--
ALTER TABLE `poreturndet`
  ADD PRIMARY KEY (`bizid`,`xporeturnnum`,`xrow`),
  ADD UNIQUE KEY `xporeturndetsl` (`xporeturndetsl`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `fk_poreturn_itemcode` (`bizid`,`xitemcode`);

--
-- Indexes for table `power_generation`
--
ALTER TABLE `power_generation`
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xdate` (`xdate`);

--
-- Indexes for table `power_offer`
--
ALTER TABLE `power_offer`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xdate` (`xdate`,`xcompany`),
  ADD KEY `xdate_2` (`xdate`,`xhourending`,`xcompany`);

--
-- Indexes for table `seapproval`
--
ALTER TABLE `seapproval`
  ADD PRIMARY KEY (`bizid`,`xmodule`,`xuser`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `secodes`
--
ALTER TABLE `secodes`
  ADD PRIMARY KEY (`bizid`,`xcodetype`,`xcode`),
  ADD UNIQUE KEY `unique_secodes` (`bizid`,`xcodetype`,`xcode`),
  ADD UNIQUE KEY `codeid` (`codeid`),
  ADD KEY `bizid` (`bizid`);

--
-- Indexes for table `secus`
--
ALTER TABLE `secus`
  ADD PRIMARY KEY (`bizid`,`xcus`),
  ADD UNIQUE KEY `xcussl` (`xcussl`),
  ADD KEY `xagent` (`xagent`);

--
-- Indexes for table `seitem`
--
ALTER TABLE `seitem`
  ADD PRIMARY KEY (`bizid`,`xitemcode`),
  ADD UNIQUE KEY `xitemid` (`xitemid`),
  ADD KEY `bizid` (`bizid`);

--
-- Indexes for table `sesup`
--
ALTER TABLE `sesup`
  ADD PRIMARY KEY (`bizid`,`xsup`),
  ADD UNIQUE KEY `xsupsl` (`xsupsl`);

--
-- Indexes for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  ADD PRIMARY KEY (`bizid`,`xoutlet`,`xsup`),
  ADD UNIQUE KEY `xoutletsl` (`xoutletsl`),
  ADD KEY `fk_xsup_outlet` (`bizid`,`xsup`);

--
-- Indexes for table `setax`
--
ALTER TABLE `setax`
  ADD PRIMARY KEY (`xtaxcode`,`bizid`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `seuserlic`
--
ALTER TABLE `seuserlic`
  ADD PRIMARY KEY (`xterminaluser`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD UNIQUE KEY `xlicnum` (`xlicnum`),
  ADD KEY `xterminaluser` (`xterminaluser`);

--
-- Indexes for table `sodet`
--
ALTER TABLE `sodet`
  ADD PRIMARY KEY (`bizid`,`xsonum`,`xrow`),
  ADD UNIQUE KEY `sodetsl` (`sodetsl`),
  ADD KEY `xitemcode` (`xitemcode`),
  ADD KEY `xitembatch` (`xitembatch`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xbranch` (`xbranch`),
  ADD KEY `fk_item_sodet` (`bizid`,`xitemcode`);

--
-- Indexes for table `somst`
--
ALTER TABLE `somst`
  ADD PRIMARY KEY (`bizid`,`xsonum`),
  ADD UNIQUE KEY `sosl` (`sosl`),
  ADD KEY `xcus` (`xcus`),
  ADD KEY `xwh` (`xwh`),
  ADD KEY `xsalesaccdr` (`xsalesaccdr`,`xsalesacccr`,`ximaccdr`,`ximacccr`,`xvataccdr`,`xvatacccr`,`xdiscaccdr`,`xdiscacccr`),
  ADD KEY `xyear` (`xyear`),
  ADD KEY `xper` (`xper`),
  ADD KEY `xdate` (`xdate`);

--
-- Indexes for table `soquot`
--
ALTER TABLE `soquot`
  ADD PRIMARY KEY (`bizid`,`xquotnum`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `xrefquot` (`xrefquot`);

--
-- Indexes for table `soquotdet`
--
ALTER TABLE `soquotdet`
  ADD PRIMARY KEY (`bizid`,`xquotnum`,`xrow`),
  ADD UNIQUE KEY `quotdetsl` (`quotdetsl`);

--
-- Indexes for table `studymaterial`
--
ALTER TABLE `studymaterial`
  ADD PRIMARY KEY (`xsl`);

--
-- Indexes for table `support_answer`
--
ALTER TABLE `support_answer`
  ADD PRIMARY KEY (`bizid`,`xquesid`),
  ADD UNIQUE KEY `xsl` (`xsl`);

--
-- Indexes for table `support_question`
--
ALTER TABLE `support_question`
  ADD PRIMARY KEY (`xquesid`);

--
-- Indexes for table `temp_sales`
--
ALTER TABLE `temp_sales`
  ADD PRIMARY KEY (`xsl`),
  ADD KEY `xtemptxn` (`xtemptxn`),
  ADD KEY `xstatus` (`xstatus`);

--
-- Indexes for table `userbase`
--
ALTER TABLE `userbase`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `unq_loginname` (`login_name`),
  ADD KEY `login_name` (`login_name`),
  ADD KEY `user_sponsor` (`user_sponsor`),
  ADD KEY `user_placement` (`user_placement`),
  ADD KEY `left_id` (`left_id`),
  ADD KEY `right_id` (`right_id`),
  ADD KEY `user_cell_no` (`user_cell_no`),
  ADD KEY `nid` (`nid`),
  ADD KEY `branchcode_index` (`branch_code`),
  ADD KEY `user_type` (`user_type`);

--
-- Indexes for table `zlog`
--
ALTER TABLE `zlog`
  ADD PRIMARY KEY (`xsl`),
  ADD UNIQUE KEY `xsl` (`xsl`),
  ADD KEY `zemail` (`zemail`),
  ADD KEY `ztoken` (`ztoken`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abcmessage`
--
ALTER TABLE `abcmessage`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ablstatement`
--
ALTER TABLE `ablstatement`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `xbatch` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classdet`
--
ALTER TABLE `classdet`
  MODIFY `xclass` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `distcashnbankpay`
--
ALTER TABLE `distcashnbankpay`
  MODIFY `xpaynum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `distdelscope`
--
ALTER TABLE `distdelscope`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distpaynreq`
--
ALTER TABLE `distpaynreq`
  MODIFY `xpaynreqnum` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ecomsalesdet`
--
ALTER TABLE `ecomsalesdet`
  MODIFY `xecomdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ecomsalesmst`
--
ALTER TABLE `ecomsalesmst`
  MODIFY `xecomsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49635;

--
-- AUTO_INCREMENT for table `ecomsales_temp`
--
ALTER TABLE `ecomsales_temp`
  MODIFY `xtemsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ecomsales_temp_deleted`
--
ALTER TABLE `ecomsales_temp_deleted`
  MODIFY `xsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `educat`
--
ALTER TABLE `educat`
  MODIFY `xcatsl` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `educourse`
--
ALTER TABLE `educourse`
  MODIFY `xcourse` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `edusalesdet`
--
ALTER TABLE `edusalesdet`
  MODIFY `xsalesdetsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `edusalesmst`
--
ALTER TABLE `edusalesmst`
  MODIFY `xsalenum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `edustudent`
--
ALTER TABLE `edustudent`
  MODIFY `xstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `eduteacher`
--
ALTER TABLE `eduteacher`
  MODIFY `xteacher` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `eduvenu`
--
ALTER TABLE `eduvenu`
  MODIFY `xvenusl` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `emp_movement_temp`
--
ALTER TABLE `emp_movement_temp`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55750;

--
-- AUTO_INCREMENT for table `glchart`
--
ALTER TABLE `glchart`
  MODIFY `glsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `glchartsub`
--
ALTER TABLE `glchartsub`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `glchartsub1`
--
ALTER TABLE `glchartsub1`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `glchequereg`
--
ALTER TABLE `glchequereg`
  MODIFY `xsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gldetail`
--
ALTER TABLE `gldetail`
  MODIFY `sl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `glheader`
--
ALTER TABLE `glheader`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `glinterface`
--
ALTER TABLE `glinterface`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework_questions`
--
ALTER TABLE `homework_questions`
  MODIFY `xquesid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `xsl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `imchkq`
--
ALTER TABLE `imchkq`
  MODIFY `imchkqsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `imchkse`
--
ALTER TABLE `imchkse`
  MODIFY `imchksl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imdoreturn`
--
ALTER TABLE `imdoreturn`
  MODIFY `xreturnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  MODIFY `xreturndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreq`
--
ALTER TABLE `imreq`
  MODIFY `imreqsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  MODIFY `xreqdeldetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  MODIFY `ximdelsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imreqdet`
--
ALTER TABLE `imreqdet`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imsetxn`
--
ALTER TABLE `imsetxn`
  MODIFY `ximsesl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imtransfer`
--
ALTER TABLE `imtransfer`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  MODIFY `xtransl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `xlesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=888;

--
-- AUTO_INCREMENT for table `mlminfo`
--
ALTER TABLE `mlminfo`
  MODIFY `distrisl` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmpool`
--
ALTER TABLE `mlmpool`
  MODIFY `xsl` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtotrep`
--
ALTER TABLE `mlmtotrep`
  MODIFY `xcomsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mlmtree`
--
ALTER TABLE `mlmtree`
  MODIFY `bin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtreegen1`
--
ALTER TABLE `mlmtreegen1`
  MODIFY `gensl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mlmtreeref`
--
ALTER TABLE `mlmtreeref`
  MODIFY `refsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `xsl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_transaction_temp`
--
ALTER TABLE `order_transaction_temp`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `osptxn`
--
ALTER TABLE `osptxn`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pabuziness`
--
ALTER TABLE `pabuziness`
  MODIFY `bizid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `pamenus`
--
ALTER TABLE `pamenus`
  MODIFY `xmenuserial` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5277;

--
-- AUTO_INCREMENT for table `paroles`
--
ALTER TABLE `paroles`
  MODIFY `xroleid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `pausers`
--
ALTER TABLE `pausers`
  MODIFY `xusersl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;

--
-- AUTO_INCREMENT for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  MODIFY `xbomdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pmbommst`
--
ALTER TABLE `pmbommst`
  MODIFY `xbomsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  MODIFY `xfgrdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmfgrmst`
--
ALTER TABLE `pmfgrmst`
  MODIFY `xfgrsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pocost`
--
ALTER TABLE `pocost`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `podet`
--
ALTER TABLE `podet`
  MODIFY `xpodetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pogrndet`
--
ALTER TABLE `pogrndet`
  MODIFY `xgrndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  MODIFY `xgrnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pomst`
--
ALTER TABLE `pomst`
  MODIFY `xposl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poreturn`
--
ALTER TABLE `poreturn`
  MODIFY `xporeturnsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `poreturndet`
--
ALTER TABLE `poreturndet`
  MODIFY `xporeturndetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `power_generation`
--
ALTER TABLE `power_generation`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72001;

--
-- AUTO_INCREMENT for table `power_offer`
--
ALTER TABLE `power_offer`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `seapproval`
--
ALTER TABLE `seapproval`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `secodes`
--
ALTER TABLE `secodes`
  MODIFY `codeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `secus`
--
ALTER TABLE `secus`
  MODIFY `xcussl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `seitem`
--
ALTER TABLE `seitem`
  MODIFY `xitemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2907;

--
-- AUTO_INCREMENT for table `sesup`
--
ALTER TABLE `sesup`
  MODIFY `xsupsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  MODIFY `xoutletsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setax`
--
ALTER TABLE `setax`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seuserlic`
--
ALTER TABLE `seuserlic`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sodet`
--
ALTER TABLE `sodet`
  MODIFY `sodetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `somst`
--
ALTER TABLE `somst`
  MODIFY `sosl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soquot`
--
ALTER TABLE `soquot`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soquotdet`
--
ALTER TABLE `soquotdet`
  MODIFY `quotdetsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studymaterial`
--
ALTER TABLE `studymaterial`
  MODIFY `xsl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support_answer`
--
ALTER TABLE `support_answer`
  MODIFY `xsl` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_question`
--
ALTER TABLE `support_question`
  MODIFY `xquesid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_sales`
--
ALTER TABLE `temp_sales`
  MODIFY `xsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `userbase`
--
ALTER TABLE `userbase`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346823;

--
-- AUTO_INCREMENT for table `zlog`
--
ALTER TABLE `zlog`
  MODIFY `xsl` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distdelscope`
--
ALTER TABLE `distdelscope`
  ADD CONSTRAINT `fk_reqdelnum_delscope` FOREIGN KEY (`bizid`,`xreqdelnum`) REFERENCES `imreqdelmst` (`bizid`, `xreqdelnum`);

--
-- Constraints for table `glchart`
--
ALTER TABLE `glchart`
  ADD CONSTRAINT `fk_biz_glchart` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_bizid_glchart` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `glchartsub`
--
ALTER TABLE `glchartsub`
  ADD CONSTRAINT `fk_zid_xaccsub` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `glchequereg`
--
ALTER TABLE `glchequereg`
  ADD CONSTRAINT `fk_acc_chqreg` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`),
  ADD CONSTRAINT `fk_acccr_chqreg` FOREIGN KEY (`bizid`,`xacccr`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `gldetail`
--
ALTER TABLE `gldetail`
  ADD CONSTRAINT `fk_xacc_gldetail` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`),
  ADD CONSTRAINT `fk_zid_xacc` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `glheader`
--
ALTER TABLE `glheader`
  ADD CONSTRAINT `fk_bizid_glheader` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `glinterface`
--
ALTER TABLE `glinterface`
  ADD CONSTRAINT `fk_glinterface_acc` FOREIGN KEY (`bizid`,`xacc`) REFERENCES `glchart` (`bizid`, `xacc`);

--
-- Constraints for table `imchkq`
--
ALTER TABLE `imchkq`
  ADD CONSTRAINT `fk_imchq_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imchkqdt`
--
ALTER TABLE `imchkqdt`
  ADD CONSTRAINT `FK_imchkq_dt` FOREIGN KEY (`bizid`,`ximchkqnum`) REFERENCES `imchkq` (`bizid`, `ximchkqnum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imchkse`
--
ALTER TABLE `imchkse`
  ADD CONSTRAINT `fk_imchkse_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imchksedt`
--
ALTER TABLE `imchksedt`
  ADD CONSTRAINT `FK_imchkse_dt` FOREIGN KEY (`bizid`,`ximchksenum`) REFERENCES `imchkse` (`bizid`, `ximchksenum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imdoreturndet`
--
ALTER TABLE `imdoreturndet`
  ADD CONSTRAINT `fk_doreturn` FOREIGN KEY (`bizid`,`xdoreturnnum`) REFERENCES `imdoreturn` (`bizid`, `xdoreturnnum`),
  ADD CONSTRAINT `fk_doreturn_itemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imreq`
--
ALTER TABLE `imreq`
  ADD CONSTRAINT `fk_imreq_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_imreq_xrdin` FOREIGN KEY (`xrdin`) REFERENCES `mlminfo` (`xrdin`);

--
-- Constraints for table `imreqdeldet`
--
ALTER TABLE `imreqdeldet`
  ADD CONSTRAINT `fk_reqdeldet_item` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`),
  ADD CONSTRAINT `fk_reqdeldet_pk` FOREIGN KEY (`bizid`,`xreqdelnum`) REFERENCES `imreqdelmst` (`bizid`, `xreqdelnum`);

--
-- Constraints for table `imreqdelmst`
--
ALTER TABLE `imreqdelmst`
  ADD CONSTRAINT `fk_reqdelmst_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `imreqdet`
--
ALTER TABLE `imreqdet`
  ADD CONSTRAINT `fk_imreq` FOREIGN KEY (`bizid`,`ximreqnum`) REFERENCES `imreq` (`bizid`, `ximreqnum`),
  ADD CONSTRAINT `fk_item_itemreqdt` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imsetxn`
--
ALTER TABLE `imsetxn`
  ADD CONSTRAINT `fk_cus_imsetxn` FOREIGN KEY (`bizid`,`xcus`) REFERENCES `secus` (`bizid`, `xcus`),
  ADD CONSTRAINT `fk_item_imsetxn` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `imtransferdet`
--
ALTER TABLE `imtransferdet`
  ADD CONSTRAINT `fk_imtransfer` FOREIGN KEY (`bizid`,`ximptnum`) REFERENCES `imtransfer` (`bizid`, `ximptnum`);

--
-- Constraints for table `mlmtree`
--
ALTER TABLE `mlmtree`
  ADD CONSTRAINT `fk_mlmtee` FOREIGN KEY (`distrisl`) REFERENCES `mlminfo` (`distrisl`);

--
-- Constraints for table `pamenus`
--
ALTER TABLE `pamenus`
  ADD CONSTRAINT `fp_pamenus_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `paroles`
--
ALTER TABLE `paroles`
  ADD CONSTRAINT `fk_paroles_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `pausers`
--
ALTER TABLE `pausers`
  ADD CONSTRAINT `fk_pausers` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `pmbomdet`
--
ALTER TABLE `pmbomdet`
  ADD CONSTRAINT `fk_bom` FOREIGN KEY (`xbomcode`) REFERENCES `pmbommst` (`xbomcode`);

--
-- Constraints for table `pmfgrdet`
--
ALTER TABLE `pmfgrdet`
  ADD CONSTRAINT `fk_fgr` FOREIGN KEY (`bizid`,`xfgrnum`) REFERENCES `pmfgrmst` (`bizid`, `xfgrnum`);

--
-- Constraints for table `pocost`
--
ALTER TABLE `pocost`
  ADD CONSTRAINT `fk_pomst_pocost` FOREIGN KEY (`bizid`,`xponum`) REFERENCES `pomst` (`bizid`, `xponum`);

--
-- Constraints for table `podet`
--
ALTER TABLE `podet`
  ADD CONSTRAINT `fk_item_podet` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`),
  ADD CONSTRAINT `fk_pomst_podet` FOREIGN KEY (`bizid`,`xponum`) REFERENCES `pomst` (`bizid`, `xponum`);

--
-- Constraints for table `pogrndet`
--
ALTER TABLE `pogrndet`
  ADD CONSTRAINT `fk_grndt_grnmst` FOREIGN KEY (`bizid`,`xgrnnum`) REFERENCES `pogrnmst` (`bizid`, `xgrnnum`),
  ADD CONSTRAINT `fk_grndt_xitemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `pogrnmst`
--
ALTER TABLE `pogrnmst`
  ADD CONSTRAINT `fk_grnmst_sup` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`),
  ADD CONSTRAINT `fk_pogrnmst_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `pomst`
--
ALTER TABLE `pomst`
  ADD CONSTRAINT `fk_biz_pomst` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`),
  ADD CONSTRAINT `fk_sup_pomst` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`);

--
-- Constraints for table `poreturndet`
--
ALTER TABLE `poreturndet`
  ADD CONSTRAINT `fk_poreturn_itemcode` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `secodes`
--
ALTER TABLE `secodes`
  ADD CONSTRAINT `fk_secodes_pabuziness` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `secus`
--
ALTER TABLE `secus`
  ADD CONSTRAINT `pk_secus_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `seitem`
--
ALTER TABLE `seitem`
  ADD CONSTRAINT `fk_seitem_biz` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `sesup`
--
ALTER TABLE `sesup`
  ADD CONSTRAINT `pk_xsup_bizid` FOREIGN KEY (`bizid`) REFERENCES `pabuziness` (`bizid`);

--
-- Constraints for table `sesupoutlet`
--
ALTER TABLE `sesupoutlet`
  ADD CONSTRAINT `fk_xsup_outlet` FOREIGN KEY (`bizid`,`xsup`) REFERENCES `sesup` (`bizid`, `xsup`);

--
-- Constraints for table `sodet`
--
ALTER TABLE `sodet`
  ADD CONSTRAINT `fk_sodet` FOREIGN KEY (`bizid`,`xsonum`) REFERENCES `somst` (`bizid`, `xsonum`),
  ADD CONSTRAINT `fk_sodet_item` FOREIGN KEY (`bizid`,`xitemcode`) REFERENCES `seitem` (`bizid`, `xitemcode`);

--
-- Constraints for table `soquotdet`
--
ALTER TABLE `soquotdet`
  ADD CONSTRAINT `fk_soquot_det` FOREIGN KEY (`bizid`,`xquotnum`) REFERENCES `soquot` (`bizid`, `xquotnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
