-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 11:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('admin', 'admin'),
('Ahmed', 'Bashaar');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time NOT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `doctorID`, `patientID`, `appointment_date`, `appointment_time`, `state`) VALUES
(12, 1, 4, '2023-06-12', '09:34:00', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `department_name` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `department_name`, `description`) VALUES
(1, 'HR', 'Manages human relations');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctorID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `contact_number` varchar(14) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctorID`, `first_name`, `last_name`, `specialization`, `contact_number`, `email`) VALUES
(1, 'John', 'Doe', 'General Physician', '0505950267', 'johndoe@gmail.com'),
(2, 'Jane', 'Doe', 'Cardiologist', '21345678980', 'janedoe@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `EmployeeID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `position` varchar(10) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`EmployeeID`, `first_name`, `last_name`, `position`, `departmentID`) VALUES
(1, 'Susan', 'Warren', 'HR Manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_records`
--

CREATE TABLE `medical_records` (
  `recordID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `diagnosis` varchar(100) NOT NULL,
  `medication` varchar(200) DEFAULT NULL,
  `notes` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_records`
--

INSERT INTO `medical_records` (`recordID`, `patientID`, `doctorID`, `date`, `diagnosis`, `medication`, `notes`) VALUES
(1, 4, 1, '2023-06-12', 'Headache', 'Panadol, Anti allergies', 'Patient had minor allergy');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patientID` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dateofbirth` date DEFAULT NULL,
  `contact_number` int(14) NOT NULL,
  `address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patientID`, `first_name`, `last_name`, `gender`, `dateofbirth`, `contact_number`, `address`) VALUES
(1, 'Umer', 'Afridi', 'male', '1995-10-24', 2147483647, 'hfrjdkjbrfhjnksxjdcfjkc'),
(4, 'Ahmed', 'Bashaar', 'male', '2003-04-14', 2147483647, 'gulshan');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentID`, `patientID`, `amount`, `payment_date`, `payment_method`) VALUES
(1, 4, 20000, '2023-06-13', 'Visa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `doctorID` (`doctorID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`),
  ADD UNIQUE KEY `departmentID` (`departmentID`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctorID`),
  ADD UNIQUE KEY `doctorID` (`doctorID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `doctorID` (`doctorID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patientID`),
  ADD UNIQUE KEY `patientID` (`patientID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `patientID` (`patientID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Constraints for table `medical_records`
--
ALTER TABLE `medical_records`
  ADD CONSTRAINT `medical_records_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`) ON DELETE CASCADE,
  ADD CONSTRAINT `medical_records_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `doctors` (`doctorID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patients` (`patientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
