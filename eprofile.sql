-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 07:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eprofile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `name`, `phone`, `username`, `password`) VALUES
(001, 'ALLYA MARISSA', '0187437854', 'allya', '2222');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `matric_no` int(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `campus` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `current_semester` int(10) NOT NULL,
  `cgpa` double NOT NULL,
  `advisor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `name`, `matric_no`, `dob`, `gender`, `phone`, `email`, `address`, `avatar`, `username`, `password`, `campus`, `course`, `current_semester`, `cgpa`, `advisor`) VALUES
(002, 'NUR ALIA BINTI YAHAYA', 2024554289, '2003-02-21', 'Female', '01483773632', 'aliayahaya59@gmail.com', 'KG. LUBUK PERIOK, 21800 AJIL, HULU TERENGGANU', 'uploads/avatar/profile pic.jpg', 'alia', '12345', 'MACHANG', 'CDIM', 3, 3.5, 'SIR ZAFIAN'),
(003, 'NUR HANIS AFIQAH', 2024667933, '2003-04-12', 'Female', '01483773632', 'hanis59@gmail.com', 'MARA University of Technology Kelantan, Bukit Ilmu, 18500 Machang, Kelantan', 'uploads/avatar/WhatsApp Image 2024-01-10 at 01.46.17_b3b7f13c.jpg', 'hanis', '1111', 'MACHANG', 'CDIM262', 3, 3.5, 'SIR ZAFIAN'),
(006, 'NURUL NAJWA', 2024879303, '2003-05-30', 'Female', '01784737434', 'najwa09@gmail.com', 'MARA University of Technology Kelantan, Bukit Ilmu, 18500 Machang, Kelantan', 'uploads/avatar/WhatsApp Image 2024-01-10 at 01.58.02_129391d9.jpg', 'najwa', '3333', 'MACHANG', 'CDIM262', 4, 3.5, 'SIR FAIZAL'),
(007, 'NURUL SYAZATUL AIN', 2024957510, '2003-11-12', 'Female', '01987656789', 'ain345@gmail.com', 'MARA University of Technology Kelantan, Bukit Ilmu, 18500 Machang, Kelantan', 'uploads/avatar/image.png', 'ain', '4444', 'MACHANG', 'CDIM262', 5, 3.6, 'SIR FAIZ'),
(008, 'AINA AMILA', 2024769403, '2004-05-15', 'Female', '01874378543', 'aina57@gmail.com', 'MARA University of Technology Kelantan, Bukit Ilmu, 18500 Machang, Kelantan', 'uploads/avatar/photo_2024-01-10_02-00-57.jpg', 'aina', '5555', 'MACHANG', 'CDIM262', 3, 3.7, 'MADAM NORMASHIDAYU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
