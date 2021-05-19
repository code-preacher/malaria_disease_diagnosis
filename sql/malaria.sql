-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 08:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `malaria`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(30) NOT NULL,
  `hd` int(1) NOT NULL,
  `ht` int(1) NOT NULL,
  `vm` int(1) NOT NULL,
  `bs` int(1) NOT NULL,
  `cd` int(1) NOT NULL,
  `ap` int(1) NOT NULL,
  `st` int(1) NOT NULL,
  `rs` int(1) NOT NULL,
  `result` text NOT NULL,
  `advice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `hd`, `ht`, `vm`, `bs`, `cd`, `ap`, `st`, `rs`, `result`, `advice`, `date`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-17 16:30:01'),
(2, 1, 1, 1, 0, 1, 1, 1, 1, 'hello', 'hi', '2021-02-17 23:38:08'),
(4, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '2021-02-18 00:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'oche', 'a@a.com', '123456', 1, '2021-01-30 14:57:12'),
(14, 'Oche Peter', 's@s.com', '123456', 3, '2021-02-17 23:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `hd` int(1) NOT NULL,
  `ht` int(1) NOT NULL,
  `vm` int(1) NOT NULL,
  `bs` int(1) NOT NULL,
  `cd` int(1) NOT NULL,
  `ap` int(1) NOT NULL,
  `st` int(1) NOT NULL,
  `rs` int(1) NOT NULL,
  `result` text NOT NULL,
  `advice` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `hd`, `ht`, `vm`, `bs`, `cd`, `ap`, `st`, `rs`, `result`, `advice`, `date`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-17 16:30:01'),
(2, 0, 1, 0, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:02:02'),
(3, 0, 1, 1, 1, 1, 0, 1, 0, 1, '', '', '2021-02-18 08:04:43'),
(4, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:30:26'),
(5, 0, 1, 1, 1, 0, 1, 1, 1, 1, '', '', '2021-02-18 08:35:36'),
(6, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:36:05'),
(7, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:37:19'),
(8, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:46:30'),
(9, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:47:56'),
(10, 0, 1, 1, 1, 1, 1, 1, 1, 1, '', '', '2021-02-18 08:48:02'),
(11, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 08:57:28'),
(12, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:00:27'),
(13, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:00:38'),
(14, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:01:27'),
(15, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:01:39'),
(16, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:02:54'),
(17, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:02:56'),
(18, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:03:33'),
(19, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:03:42'),
(20, 0, 1, 1, 1, 1, 1, 1, 1, 1, 'very high', 'Sleep well', '2021-02-18 09:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom '),
(4, 'Anambra '),
(5, 'Bauchi'),
(6, 'Bayelsa '),
(7, 'Benue '),
(8, 'Borno '),
(9, 'Cross River '),
(10, 'Delta '),
(11, 'Ebonyi '),
(12, 'Edo '),
(13, 'Ekiti '),
(14, 'Enugu '),
(15, 'FCT'),
(16, 'Gombe '),
(17, 'Imo '),
(18, 'Jigawa '),
(19, 'Kaduna '),
(20, 'Kano '),
(21, 'Katsina '),
(22, 'Kebbi '),
(23, 'Kogi '),
(24, 'Kwara '),
(25, 'Lagos '),
(26, 'Nasarawa '),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau '),
(33, 'Rivers '),
(34, 'Sokoto '),
(35, 'Taraba '),
(36, 'Yobe '),
(37, 'Zamfara ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `gender`, `date`) VALUES
(1, 'Oche Peter', 's@s.com', '08136473738', 'London', '123456', 'MALE', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
