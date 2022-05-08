-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 10:16 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a4_grant`
--

-- --------------------------------------------------------

--
-- Table structure for table `partial_reference_number`
--

CREATE TABLE `partial_reference_number` (
  `Reference_PartialNumber` int(12) NOT NULL,
  `ReferenceNumber` int(12) NOT NULL,
  `Booking_ID` int(6) NOT NULL,
  `MemberGuest` int(11) NOT NULL,
  `CheckInDateTime` date NOT NULL,
  `CheckOutDateTime` date NOT NULL,
  `Staff_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `partial_reference_number`
--
ALTER TABLE `partial_reference_number`
  ADD PRIMARY KEY (`Reference_PartialNumber`),
  ADD KEY `Partial_Reference_Number_ibfk_1` (`ReferenceNumber`),
  ADD KEY `Partial_Reference_Number_ibfk_2` (`Staff_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `partial_reference_number`
--
ALTER TABLE `partial_reference_number`
  MODIFY `Reference_PartialNumber` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `partial_reference_number`
--
ALTER TABLE `partial_reference_number`
  ADD CONSTRAINT `Partial_Reference_Number_ibfk_1` FOREIGN KEY (`ReferenceNumber`) REFERENCES `main_reference_number` (`ReferenceNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Partial_Reference_Number_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `staff_information` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
