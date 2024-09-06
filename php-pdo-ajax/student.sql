-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 03:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpapidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `firstName` varchar(300) NOT NULL DEFAULT '-',
  `lastName` varchar(300) NOT NULL DEFAULT '-',
  `dateOfBirth` varchar(11) NOT NULL DEFAULT '0000-00-00',
  `center` varchar(300) NOT NULL DEFAULT '-',
  `semester` varchar(300) NOT NULL DEFAULT '-',
  `cgpa` varchar(5) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `firstName`, `lastName`, `dateOfBirth`, `center`, `semester`, `cgpa`, `created`) VALUES
(84, 'admin@example.com', 'Nalinda', 'Dissanayake', '2022/04/25', 'cend', '-sem', '3', '2022-10-16 10:03:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
