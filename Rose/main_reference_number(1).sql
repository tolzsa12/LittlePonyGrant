-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 10:15 AM
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
-- Table structure for table `main_reference_number`
--

CREATE TABLE `main_reference_number` (
  `ReferenceNumber` int(12) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `BookingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `PriceTotalPayment` double NOT NULL,
  `PaymentMethod_ID` varchar(5) NOT NULL,
  `CardNumber` varchar(16) DEFAULT NULL,
  `TaxandFee` double NOT NULL,
  `GuestName` varchar(30) DEFAULT NULL,
  `Phone_Guest` varchar(15) DEFAULT NULL,
  `Message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_reference_number`
--
ALTER TABLE `main_reference_number`
  ADD PRIMARY KEY (`ReferenceNumber`),
  ADD KEY `Main_Reference_Number_ibfk_1` (`customer_id`),
  ADD KEY `Main_Reference_Number_ibfk_2` (`PaymentMethod_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_reference_number`
--
ALTER TABLE `main_reference_number`
  MODIFY `ReferenceNumber` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_reference_number`
--
ALTER TABLE `main_reference_number`
  ADD CONSTRAINT `Main_Reference_Number_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Main_Reference_Number_ibfk_2` FOREIGN KEY (`PaymentMethod_ID`) REFERENCES `payment_method` (`PaymentMethod_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
