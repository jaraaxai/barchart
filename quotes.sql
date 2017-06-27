-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 27, 2017 at 04:30 PM
-- Server version: 5.5.42
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_mongodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL,
  `symbol` varchar(18) NOT NULL,
  `name` varchar(128) NOT NULL,
  `last_price` double DEFAULT NULL,
  `prichange` double DEFAULT NULL,
  `pctchange` double DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `tradetime` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `symbol`, `name`, `last_price`, `prichange`, `pctchange`, `volume`, `tradetime`) VALUES
(1, 'AAPL', 'Apple Inc', 145.42, -3.56, -2.39, 72219195, '2017-06-12 18:03:00'),
(2, 'AMD', 'Adv Micro Devices', 12.09, -0.19, -1.55, 125643297, '2017-06-12 18:04:00'),
(3, 'AMZN', 'Amazon.Com Inc', 964.91, -13.4, -1.37, 9438600, '2017-06-12 18:03:00'),
(4, 'CSCO', 'Cisco Systems Inc', 31.25, -0.12, -0.38, 25783400, '2017-06-12 18:02:00'),
(5, 'EA', 'Electronic Arts Inc', 108.9, -1.56, -1.41, 5822000, '2017-06-12 18:00:00'),
(6, 'F', 'Ford Motor Company', 11.28, 0.15, 1.35, 38472102, '2017-06-12 17:53:00'),
(7, 'FB', 'Facebook Inc', 148.44, -1.16, -0.78, 33152699, '2017-06-12 18:00:00'),
(8, 'GE', 'General Electric Company', 28.94, 1, 3.58, 139003297, '2017-06-12 18:04:00'),
(9, 'GM', 'General Motors Company', 34.68, 0.34, 0.99, 14304899, '2017-06-12 17:06:00'),
(10, 'GOOGL', 'Alphabet Class A', 961.81, -8.31, -0.86, 4198000, '2017-06-12 18:04:00'),
(11, 'IBM', 'International Business Machines', 155.18, 1.08, 0.7, 6464800, '2017-06-12 17:47:00'),
(12, 'NVDA', 'Nvidia Corporation', 149.97, 0.37, 0.25, 42311801, '2017-06-12 18:04:00'),
(13, 'P', 'Pandora Media Inc', 7.87, -0.65, -7.63, 31016299, '2017-06-12 17:50:00'),
(14, 'SNAP', 'Snap Inc', 18.2, 0.12, 0.66, 16160100, '2017-06-12 18:02:00'),
(15, 'T', 'AT&T Inc', 39.07, 0.28, 0.72, 22779799, '2017-06-12 17:41:00'),
(16, 'TSLA', 'Tesla Inc', 359.01, 1.69, 0.47, 10508800, '2017-06-12 18:02:00'),
(17, 'TWTR', 'Twitter Inc', 17.04, 0.14, 0.83, 20490801, '2017-06-12 18:03:00'),
(18, 'V', 'Visa Inc', 93.5, -1.06, -1.12, 15604300, '2017-06-12 17:48:00'),
(19, 'VZ', 'Verizon Communications Inc', 47.19, 0.47, 1.01, 18929000, '2017-06-12 17:59:00'),
(20, 'YHOO', 'Yahoo! Inc', 53.12, -0.9, -1.67, 57719301, '2017-06-12 17:39:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `symbol` (`symbol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
