-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 05:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `username` varchar(100) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dcategory` varchar(50) NOT NULL,
  `idate` date NOT NULL,
  `dedate` date NOT NULL,
  `drdate0` date NOT NULL,
  `drdate1` date DEFAULT NULL,
  `drdate2` date DEFAULT NULL,
  `drdate3` date DEFAULT NULL,
  `drdate4` date DEFAULT NULL,
  `ddesc` varchar(500) NOT NULL,
  `dcurrent_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`username`, `dname`, `dcategory`, `idate`, `dedate`, `drdate0`, `drdate1`, `drdate2`, `drdate3`, `drdate4`, `ddesc`, `dcurrent_date`) VALUES
('ankush', 'domain', 'Office Documents', '2019-11-01', '2021-03-05', '2021-04-25', NULL, NULL, NULL, NULL, 'sendinblue domain', '2020-11-08'),
('ankush', 'driving license', 'Personal', '2020-11-04', '2040-05-15', '2040-03-09', NULL, NULL, NULL, NULL, 'renew it fast', '2020-11-24'),
('ankush', 'Work permit', 'Office Documents', '2020-09-12', '2021-06-19', '2021-02-27', NULL, NULL, NULL, NULL, 'renew it fast', '2021-01-01'),
('ankush', 'IELTS Exam Results', 'Educational', '2020-12-04', '2022-12-04', '2021-02-06', NULL, NULL, NULL, NULL, 'Empty', '2021-01-01'),
('ankush', 'income certicate', 'Personal', '2020-12-11', '2023-03-01', '2021-01-02', NULL, NULL, NULL, NULL, 'Renew it in a week', '2021-01-01'),
('ankush', 'SSL certificates', 'Custom Documents', '2020-12-05', '2023-06-09', '2022-02-01', NULL, NULL, NULL, NULL, 'renew it fast', '2021-01-01'),
('ankush', 'Passport', 'Personal', '2020-02-01', '2030-02-01', '2029-12-01', NULL, NULL, NULL, NULL, 'renew it fast', '2021-01-01'),
('ankush', 'Vehicle registration', 'Custom Documents', '2006-05-09', '2021-05-09', '2021-02-18', NULL, NULL, NULL, NULL, 'renew it fast', '2021-01-01'),
('ankush', '  GameZoneCard                                        ', 'Personal        ', '2020-03-04', '2021-03-31', '2021-03-10', '2021-03-10', '2021-03-04', '0000-00-00', '0000-00-00', '  Renew at Himalaya mall', '2021-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `username` varchar(30) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `pcategory` varchar(50) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `pdate` date NOT NULL,
  `pedate` date NOT NULL,
  `prdate0` date NOT NULL,
  `prdate1` date DEFAULT NULL,
  `prdate2` date DEFAULT NULL,
  `prdate3` date DEFAULT NULL,
  `prdate4` date DEFAULT NULL,
  `rdetails` varchar(500) NOT NULL,
  `pdesc` varchar(500) NOT NULL,
  `Current_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`username`, `pname`, `pcategory`, `Quantity`, `price`, `pdate`, `pedate`, `prdate0`, `prdate1`, `prdate2`, `prdate3`, `prdate4`, `rdetails`, `pdesc`, `Current_Date`) VALUES
('ankush', 'parle cookie                    ', 'Foods    ', '55    ', '797    ', '2020-11-25', '2021-02-25', '2021-02-20', NULL, NULL, NULL, NULL, '9462563258    ', 'sell remaining stock', '2020-11-08'),
('ankush', 'chips                    ', 'Foods    ', '88    ', '22    ', '2020-11-05', '2021-04-01', '2021-02-20', NULL, NULL, NULL, NULL, '8555563258    ', 'in desk no 22', '2020-11-24'),
('ankush', 'shampoo', 'Groceries', '88', '20', '2020-11-04', '2021-11-26', '2021-01-05', NULL, NULL, NULL, NULL, 'hands2@gmail.com', 'retailer=hands@gmail.com', '2020-11-24'),
('ankush', 'paracetamol', 'Medicines', '70', '20', '2020-04-01', '2021-12-11', '2021-04-12', NULL, NULL, NULL, NULL, 'madicines@gmail.com', 'desk no.52', '2020-11-24'),
('ankush', 'milk', 'Custom Product', '88', '61', '2021-01-01', '2021-01-15', '2021-01-05', NULL, NULL, NULL, NULL, '102 maruticomplex, vedroad, surat.', 'Empty', '2020-11-24'),
('ankush', 'cookie                                        ', 'Foods        ', '55        ', '20        ', '2020-11-10', '2021-03-12', '2021-03-06', NULL, NULL, NULL, NULL, '7562325268        ', 'Empty', '2020-11-24'),
('lakhani', 'soap', 'Groceries', '851', '20', '2020-10-26', '2021-06-27', '2021-01-02', NULL, NULL, NULL, NULL, '8643169532', 'desk no.555', '2021-01-01'),
('ankush', 'Hydrocodone', 'Medicines', '53', '79', '2020-08-14', '2021-04-08', '2021-03-02', NULL, NULL, NULL, NULL, '18006 3563 8563', 'empty', '2021-01-01'),
('ankush', 'Generic Zocor', 'Medicines', '244', '103', '2020-11-14', '2021-06-12', '2021-03-02', NULL, NULL, NULL, NULL, 'empty', 'desk no.023', '2021-01-01'),
('ankush', 'shaving cream', 'Groceries', '59', '74', '2020-12-11', '2021-04-10', '2021-02-12', NULL, NULL, NULL, NULL, 'shavingcream@sanb.com', 'sell before expiry', '2021-01-01'),
('ankush', 'cheese                    ', 'Custom Product    ', '244    ', '61    ', '2020-12-05', '2021-03-20', '2021-03-06', NULL, NULL, NULL, NULL, 'b102, jaycomplex, katargam, surat    ', 'empty', '2021-01-01'),
('ankush', 'shaving cream    ', 'Groceries    ', '591   ', '74    ', '2020-12-11', '2021-04-10', '2021-02-12', NULL, NULL, NULL, NULL, 'shavingcream@sanb.com    ', 'sell before expiry                    ', '2021-02-06'),
('ankush', 'mask', 'Medicines', '50', '10', '2021-03-30', '2021-03-25', '2021-03-05', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'nn', 'despti', '2021-03-20'),
('ankush', 'n-95', 'Medicines', '3', '40', '2021-03-18', '2021-03-30', '2021-03-25', '2021-03-26', '2021-03-27', '0000-00-00', '0000-00-00', '--', '--', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`) VALUES
(13, 'ankushlakhani3@gmail.com', 'ankush', 'ankush', '2020-11-04 17:00:12'),
(14, 'lakhaniankush@gmail.com', 'lakhani', 'lakhani', '2021-01-01 16:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
