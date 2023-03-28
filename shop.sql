-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2023 at 07:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `doctor` varchar(50) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `reasonID` int(11) NOT NULL,
  `reason_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`reasonID`, `reason_name`) VALUES
(1, 'Specific Health Concern Or Symptom'),
(2, 'Routine Check-up'),
(3, 'Ongoing Health Condition Management'),
(4, 'Specialist Referral'),
(5, 'Follow-up Appointment After A Previous Visit'),
(6, 'Immunizations Or Vaccinations'),
(7, 'Prescription Refills Or Medication Management'),
(8, 'Lab Or Diagnostic Tests'),
(9, 'Second Opinion'),
(10, 'Health Advice Or Counseling');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `history` text DEFAULT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `registered` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `password`, `first_name`, `last_name`, `mobile`, `dob`, `city`, `postcode`, `address`, `history`, `role`, `registered`) VALUES
(1, 'sammo', 'ayman.sammo75@gmail.com', '$2y$10$qQ9x1153P5pJTFisHFbe9ebQoTSOFTz9mT8.xmvJG4p1kHAtHIN56', 'ayman', 'sammo', '07810022505', '2000-04-10', 'sheffield', 'S14 1GE', '31 gaunt road', '', 'doctor', 'true'),
(2, 'admin', 'admin@gmail.com', '$2y$10$Ef5RDHqxm3/KoQaYv3HsreZJCGtzfojrK.PaqDXXCVPfRIQUxi5yi', 'john', 'doe', '7123123', '1999-08-23', 'london', 'L4 2LD', 'somewhere in london', NULL, 'admin', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`);

--
-- Indexes for table `reason`
--
ALTER TABLE `reason`
  ADD PRIMARY KEY (`reasonID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reason`
--
ALTER TABLE `reason`
  MODIFY `reasonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
