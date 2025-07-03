-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 09:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `actDate` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`actId`, `actName`, `actDate`, `date_added`) VALUES
(2, 'Activity 5', '2022-12-23', ''),
(3, 'Activity 3', '2022-12-10', '2022-12-11'),
(4, 'Activity 2', '2022-12-11', '2022-12-11'),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, ipsum delectus voluptatum? Molestias aut inventore eaque, maxime numquam dignissimos asperiores, voluptatibus consectetur distinctio excepturi odit architecto, saepe enim sunt, molestiae.', '2022-12-11', '2022-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `customization`
--

CREATE TABLE `customization` (
  `customID` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Inactive',
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customization`
--

INSERT INTO `customization` (`customID`, `picture`, `status`, `date_added`) VALUES
(7, '6207ad7e34af5.gif', 'Active', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_Id` int(11) NOT NULL,
  `doc_type` varchar(100) NOT NULL,
  `doc_residenceId` int(11) NOT NULL,
  `NonResident` varchar(255) NOT NULL,
  `NonResident__Address` text NOT NULL,
  `doc_purpose` text NOT NULL,
  `tradeName` varchar(255) NOT NULL,
  `businessNature` varchar(255) NOT NULL,
  `controlNumber` varchar(255) NOT NULL,
  `brgyIDnumber` varchar(50) NOT NULL,
  `ORNumber` varchar(255) NOT NULL,
  `doc_paidAmount` varchar(50) NOT NULL,
  `date_acquired` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_Id`, `doc_type`, `doc_residenceId`, `NonResident`, `NonResident__Address`, `doc_purpose`, `tradeName`, `businessNature`, `controlNumber`, `brgyIDnumber`, `ORNumber`, `doc_paidAmount`, `date_acquired`) VALUES
(120, 'Barangay ID Card', 66, '', '', 'Get Brgy. ID Card', '', '', '', '11', '', '11', '2023-01-25'),
(121, 'Barangay Ownership', 67, '', '', 'Get Brgy. Ownership Certificate', '', '', '', '', '', '22', '2023-01-25'),
(122, 'Barangay Permit', 67, '', '', 'Get Brgy. Business Clearance Permit', 'fds', 'fdsf', 'dsfsd', '', 'rrfs', '343', '2023-01-25'),
(123, 'Barangay Indigency', 67, '', '', 'fds', '', '', '', '', '', '43', '2023-01-25'),
(124, 'Barangay Residency', 84, '', '', 'test', '', '', '', '', '', '100', '2025-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `incomeId` int(11) NOT NULL,
  `paid_by` varchar(255) NOT NULL,
  `paymentFor` varchar(255) NOT NULL,
  `paymentDesc` text NOT NULL,
  `paymentAmount` varchar(255) NOT NULL,
  `date_paid` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`incomeId`, `paid_by`, `paymentFor`, `paymentDesc`, `paymentAmount`, `date_paid`, `added_by`, `date_added`, `updated_by`, `date_updated`) VALUES
(111, 'dddsdds d d ', 'Barangay ID Card', 'Get Brgy. ID Card', '11', '2023-01-25', '40', '2023-01-25', '', ''),
(112, 'dsd d d ', 'Barangay Ownership', 'Get Brgy. Ownership Certificate', '22', '2023-01-25', '40', '2023-01-25', '', ''),
(113, 'dsd d d ', 'Barangay Permit', 'Get Brgy. Business Clearance Permit', '343', '2023-01-25', '40', '2023-01-25', '', ''),
(114, 'dsd d d ', 'Barangay Indigency', 'fds', '43', '2023-01-25', '40', '2023-01-25', '', ''),
(115, '', 'erewr', '22', '343', '2023-01-25', '40', '2023-01-25', '', ''),
(116, 'Jesson E Mondejar ', 'Barangay Residency', 'test', '100', '2025-06-12', '42', '2025-06-12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `officialID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`officialID`, `firstname`, `middlename`, `lastname`, `suffix`, `position`, `description`, `digital_signature`, `date_registered`) VALUES
(1, 'Erwin', 'Cabag', 'Son', '', 'Barangay Captain', 'Barangay Captain Sample Description', 'minimalism-1644666519306-6515.jpg', '2022-11-26'),
(2, 'Danilo', 'Cabag', 'Nicolas Jr.', '', 'Barangay Secretary', 'Barangay Secretary Description Sample', 'a.jpg', '2022-11-26'),
(3, 'Jose', '', 'Rizal', '', 'Barangay Councilor', 'Barangay Councilor Sample Description', '1.jpg', '2022-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `residence`
--

CREATE TABLE `residence` (
  `residenceId` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `ageClassification` varchar(25) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `familyIndicator` varchar(20) NOT NULL,
  `headName` varchar(50) NOT NULL,
  `familyRole` varchar(50) NOT NULL,
  `sector` varchar(100) NOT NULL,
  `resident_status` varchar(100) NOT NULL,
  `voter_status` varchar(100) NOT NULL,
  `ID_status` varchar(100) NOT NULL,
  `QR_status` varchar(100) NOT NULL,
  `months_of_stay` varchar(50) NOT NULL,
  `years_of_stay` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `digital_signature` varchar(255) NOT NULL,
  `personalDocuments` varchar(255) NOT NULL,
  `qrCode` varchar(255) NOT NULL,
  `residentCode` varchar(100) NOT NULL,
  `residentPIN` varchar(10) NOT NULL,
  `added_By` varchar(150) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `residence`
--

INSERT INTO `residence` (`residenceId`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `ageClassification`, `birthplace`, `gender`, `civilstatus`, `citizenship`, `occupation`, `religion`, `contact`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `familyIndicator`, `headName`, `familyRole`, `sector`, `resident_status`, `voter_status`, `ID_status`, `QR_status`, `months_of_stay`, `years_of_stay`, `image`, `digital_signature`, `personalDocuments`, `qrCode`, `residentCode`, `residentPIN`, `added_By`, `date_registered`) VALUES
(66, 'dddsdds', 'd', 'd', '', '1993-06-16', '29 years old', 'Adult', 'df', 'Female', 'Single', 'By Birth', 'fsd', 'Roman Catholic', '', 'fds', 'fds', 'fds', 'fds', 'fds', 'fds', 'fdsfsd', 'fdsf', 'Head', 'test123', 'test421', 'PWD', 'Perma/Owned', 'Active', 'Active', 'None', '', '43', '2.jpg', '3.jpg', '', '', '', '', 'Juan Dela Cruz', '2022-11-25'),
(67, 'dsd', 'd', 'd', '', '2016-03-09', '6 years old', 'Child', 'dsa', 'Male', 'Married', 'By Family', 'fdsf', 'Iglesia Ni Cristo', '', 'fdsf', 'dsf', 'fdsf', 'fdsf', 'dsfsd', 'fdsf', 'fsdfsd', 'fds', '', '', '', 'Senior Citizen', 'Perma/Owned', 'Active', 'Active', 'Active', '', '43', 'Screenshot (185).png', 'Screenshot (186).png', '', '', '', '', 'Erwin Cabag Son', '2022-11-25'),
(69, 'Juan', 'Panday', 'Dela Cruz', '', '1997-10-15', '25 years old', 'Adult', 'bvcbcb', 'Female', 'Separated', 'Naturalization', 'bvcbc', 'Ang Dating Daan', '', 'bvc', 'bcvbcb', 'vcbcb', 'vcbcv', 'bcvbc', 'bcvbcvbcv', 'bvc', 'bvcbc', '', '', '', 'Solo Parents', 'Tempo/Rented', 'Active', 'None', 'Active', '', '343', 'Screenshot (193).png', 'Screenshot (188).png', '', '../images-qr-codes/63a70b9feddb2.png', '', '', 'Erwin Cabag Son', '2022-11-25'),
(70, 'fsfsd', 'fsdfsf', 'sdfs', '', '1952-07-09', '70 years old', 'Senior', 'fsfs', 'Non-Binary', 'Widow/ER', 'By Marriage', 'gfdgd', 'Islam', '', 'gfd', 'gdf', 'gfd', 'gfdg', 'fdgdf', 'gfdg', 'fdg', 'gfd', '', '', '', 'PWD', 'Tempo/Rented', 'None', 'None', 'None', '', '2', 'Screenshot (184).png', 'Screenshot (186).png', '', '', '', '', 'Jose Rizal', '2022-11-25'),
(71, 'fdgfdgdg', 'gwq', 'wq', 'w', '2022-11-10', '2 weeks old', 'Toddler', 'wq', 'Female', 'Widow/ER', 'By Family', 'wq', 'Protestants', '', 'wq', 'w', 'qwq', 'w', 'w', 'w', 'qwq', 'w', '', '', '', 'Solo Parents', 'Tempo/Rented', 'Active', 'Active', 'None', '', '3', '1fLSnJV.jpg', '1fLSnJV.jpg', '', '', '', '', 'Juan Dela Cruz', '2022-11-27'),
(72, 'DADADAD', 'DADADAD', 'DADADAD', '', '2022-12-13', '6 days old', 'Toddler', 'DADADAD', 'Female', 'Married', 'By Marriage', 'DADADAD', 'Seventh-day Adventism', '', 'DADADAD', 'DADADAD', 'DADADAD', 'DADADAD', 'DADADAD', 'DADADAD', 'DADADAD', 'DADADAD', '', '', '', 'Senior Citizen', 'Tempo/Rented', 'Active', 'None', 'Active', '', '2', '315423302_2170759329772205_8153808227283622299_n.jpg', '315423302_2170759329772205_8153808227283622299_n.jpg', '', '../images-qr-codes/63a071bf9f8fa.png', '', '', 'Jose Rizal', '2022-12-19'),
(73, 'bvc', 'bvcb', 'bvc', '', '2022-12-15', '1 week old', 'Toddler', 'bvcb', 'Female', 'Separated', 'By Birth', 'bvc', 'Aglipayan', '', 'bvb', 'vcb', 'bvbv', 'bv', 'bvb', 'vbv', 'bvb', 'bv', '', '', '', 'Senior Citizen', 'Tempo/Rented', 'Inactive', 'Active', 'None', '', '343', '2.jpg', '3.jpg', '', '../images-qr-codes/63a3e7ab3bbcf.png', '', '', 'Erwin Cabag Son', '2022-12-22'),
(74, 'dadaadadd', 'dadaadadd', 'dadaadadd', '', '2022-12-09', '1 week old', 'Toddler', 'dadaadadd', 'Male', 'Widow/ER', 'By Birth', 'dadaadadd', 'Bible Baptist Church', '', 'dadaadadd', 'dadaadadd', 'dadaadadd', 'dadaadadd', 'dadaadadd', 'dadaadadd', 'dadaadadd', 'dadaadadd', '', '', '', 'PWD', 'Tempo/Rented', 'None', 'Active', 'None', '', '23', '2.jpg', '4.jpg', '', '../images-qr-codes/63a3e807201e2.png', '', '', 'Jose Rizal', '2022-12-22'),
(75, 'Cong TV', 'Cong TV', 'Cong TV', '', '2022-12-15', '1 week old', 'Toddler', 'Cong TV', 'Male', 'Single', 'By Birth', 'Cong TV', 'United Church of Christ in the Philippines', '', 'Cong TV', 'Cong TV', 'Cong TV', 'Cong TV', 'Cong TV', 'Cong TV', 'Cong TV', 'Cong TV', '', '', '', 'Senior Citizen', 'Perma/Owned', 'Active', 'Active', 'Active', '', '2', '2.jpg', '3.jpg', '', '../images-qr-codes/63a3e9146f38c.png', 'BMS-63a3e9146f385', '123321', 'Juan Dela Cruz', '2022-12-22'),
(78, 'addedby', 'addedby', 'addedby', '', '2023-01-11', '1 week old', 'Toddler', 'addedby', 'Male', 'Single', 'By Family', 'addedby', 'Methodist', '', 'addedbyaddedby', 'addedby', 'addedby', 'addedby', 'addedby', 'addedby', 'addedby', 'addedby', 'Member', 'addedby', 'addedby', 'PWD', 'Tempo/Rented', 'Inactive', 'Active', 'Active', '', '2', '2.jpg', '1.jpg', '', '../images-qr-codes/63c91f6f46c54.png', 'BMS-63c91f6f46c49', '', 'Juan Dela Cruz', '2023-01-19'),
(79, 'Certsa', 'Certsa', 'Certsa', '', '2023-01-13', '1 week old', 'Toddler', 'Certsa', 'Male', 'Single', 'By Family', 'Certsa', 'Iglesia Ni Cristo', '', 'Certsa', 'Certsa', 'Certsa', 'Certsa', 'Certsa', 'Certsa', 'Certsa', 'Certsa', 'Member', 'Certsa', 'Certsa', 'Senior Citizen', 'Tempo/Rented', 'Inactive', 'Active', 'Active', '', '13', '6207ad7e34af5.jpg', 'rUPmy8.jpg', 'wp4813161-simple-minimalist-wallpapers.jpg', '../images-qr-codes/63cbb4ea53611.png', 'BMS-63cbb4ea5360b', '', 'Juan  Dela Cruz ', '2023-01-21'),
(80, 'certificate', 'certificate', 'certificate', '', '2023-01-11', '1 week old', 'Toddler', 'certificate', 'Male', 'Single', 'By Birth', 'certificate', 'Iglesia Ni Cristo', '', 'certificate', 'certificate', 'certificate', 'certificate', 'certificate', 'certificate', 'certificate', 'certificate', 'Head', 'certificate', 'certificate', 'Senior Citizen', 'Tempo/Rented', 'Active', 'Active', 'None', '', '2', 'ba.jpg', 'harvest.png', 'rUPmy8.jpg', '../images-qr-codes/63cbb58ade5fc.png', 'BMS-63cbb58ade5f7', '', 'Juan  Dela Cruz ', '2023-01-21'),
(81, 'csmapl', 'csmapl', 'csmapl', '', '2023-01-10', '2 weeks old', 'Toddler', 'csmapl', 'Female', 'Married', 'By Birth', 'csmapl', 'Hindu', '9123456789', 'csmapl', 'csmapl', 'csmapl', 'csmapl', 'csmapl', 'csmapl', 'csmapl', 'csmapl', 'Head', 'csmapl', 'csmapl', 'Senior Citizen', 'Tempo/Rented', 'Active', 'None', 'Active', '', '23', '1.jpg', '2.jpg', '', '../images-qr-codes/63d272ebc4670.png', 'BMS-63d272ebc466a', '', 'Juan  Dela Cruz ', '2023-01-26'),
(82, 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', '', '2023-01-10', '2 weeks old', 'Toddler', 'csmaplcsmapl', 'Male', 'Married', 'By Family', 'csmaplcsmapl', 'Hindu', '9123456789', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'csmaplcsmapl', 'Head', 'csmaplcsmapl', 'csmaplcsmapl', 'PWD', 'Tempo/Rented', 'Inactive', 'Active', 'Active', '', '23', '3.jpg', '13.jpg', '18.jpg', '../images-qr-codes/63d27318b6164.png', 'BMS-63d27318b615e', '', 'Juan  Dela Cruz ', '2023-01-26'),
(83, 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', '', '2023-01-11', '2 weeks old', 'Toddler', 'Erwin Kini', 'Male', 'Married', 'By Birth', 'Erwin Kini', 'Iglesia Ni Cristo', '9123456789', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Erwin Kini', 'Head', 'Erwin Kini', 'Erwin Kini', 'Senior Citizen', 'Perma/Owned', 'Inactive', 'None', 'Active', '', '23', '3.jpg', '14.jpg', '', '../images-qr-codes/63d273bccc34a.png', 'BMS-63d273bccc342', '', 'Juan  Dela Cruz ', '2023-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'Resident',
  `verification_code` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `username`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `contact`, `password`, `image`, `user_type`, `verification_code`, `date_registered`) VALUES
(40, 'Admin', 'Juan', 'E', 'Carlos', '', 'admin@gmail.com', '9359428961', '0192023a7bbd73250516f069df18b500', 'user.png', 'Admin', '374025', '2024-09-10'),
(42, 'staff', 'karl', 'Cabag', 'neymar', '', 'tproject832@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '20.jpg', 'Staff', '195454', '2024-10-22'),
(43, 'staff', 'ronaldo', '', 'son', '', 'staff1@gmail.com', '9359428963', '0192023a7bbd73250516f069df18b500', '', 'Staff', '286564', '2024-12-28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `customization`
--
ALTER TABLE `customization`
  ADD PRIMARY KEY (`customID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_Id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`incomeId`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`officialID`);

--
-- Indexes for table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`residenceId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customization`
--
ALTER TABLE `customization`
  MODIFY `customID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `incomeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `officialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `residence`
--
ALTER TABLE `residence`
  MODIFY `residenceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
