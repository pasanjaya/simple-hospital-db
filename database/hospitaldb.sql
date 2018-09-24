-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 06:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmission`
--

CREATE TABLE `addmission` (
  `addmissionNO` int(4) NOT NULL,
  `admitDate` date DEFAULT NULL,
  `relationName` varchar(128) DEFAULT NULL,
  `relationcontactNO` varchar(10) DEFAULT NULL,
  `dischargeDate` date DEFAULT NULL,
  `reason` varchar(11) DEFAULT NULL,
  `wardNO` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addmission`
--

INSERT INTO `addmission` (`addmissionNO`, `admitDate`, `relationName`, `relationcontactNO`, `dischargeDate`, `reason`, `wardNO`) VALUES
(1, '2017-05-27', 'Samadi', '0719234526', '2017-06-02', 'Cure', 1),
(2, '2017-06-01', 'Aruna', '0718293823', '0000-00-00', '', 3),
(3, '2017-05-31', 'Nimal', '0712839283', '0000-00-00', '', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `admittedlist`
-- (See below for the actual view)
--
CREATE TABLE `admittedlist` (
`confirmedBY` int(4)
,`fname` varchar(128)
,`lname` varchar(128)
,`addmissionNO` int(4)
,`admitDate` date
,`relationName` varchar(128)
,`relationcontactNO` varchar(10)
,`dischargeDate` date
,`reason` varchar(11)
,`wardNO` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `confirmedpaitent`
--

CREATE TABLE `confirmedpaitent` (
  `confirmedBY` int(4) NOT NULL,
  `pID` int(4) NOT NULL,
  `addmissionNO` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmedpaitent`
--

INSERT INTO `confirmedpaitent` (`confirmedBY`, `pID`, `addmissionNO`) VALUES
(1, 5, 3),
(2, 2, 2),
(6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `consultID` int(4) NOT NULL,
  `field` varchar(128) DEFAULT NULL,
  `grade` varchar(128) DEFAULT NULL,
  `specialistFlag` varchar(10) DEFAULT NULL,
  `leadConsultFlag` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`consultID`, `field`, `grade`, `specialistFlag`, `leadConsultFlag`) VALUES
(1, 'Dental', 'A1', 'yes', ''),
(2, 'Surgeon', 'A2', 'yes', ''),
(3, 'Physician', 'A1', 'yes', 'yes'),
(4, 'General Surgery', 'B1', '', 'yes'),
(5, 'Skin Care and Cosmetic', 'A2', 'yes', 'yes'),
(6, 'Eye Surgeon', 'B2', '', 'yes'),
(7, 'Eye Surgeon', 'A1', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `paitent`
--

CREATE TABLE `paitent` (
  `pID` int(4) NOT NULL,
  `nic` varchar(10) DEFAULT NULL,
  `fname` varchar(128) DEFAULT NULL,
  `lname` varchar(128) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `contactNO` varchar(10) DEFAULT NULL,
  `refID` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paitent`
--

INSERT INTO `paitent` (`pID`, `nic`, `fname`, `lname`, `gender`, `dob`, `address`, `contactNO`, `refID`) VALUES
(1, '645634126v', 'Nuwan', 'Akalanka', 'Male', '1964-05-01', 'No 34,Mahawela Road, Tangalle', '0773452719', 1),
(2, '762345197v', 'Samadi', 'Ranawera', 'Female', '1976-02-06', 'No 89,Galgamuwa,Kurunegala.', '0714263920', 5),
(3, '912438652v', 'Kamal', 'bandara', 'Male', '1991-05-02', 'No 87 ,Sumana Road,Colombo 04.', '0712398054', 4),
(4, '934598764v', 'Nirmali', 'Madusha', 'Female', '1993-11-03', 'No 45,Gunawardana Road,Horana', '0723619472', 6),
(5, '923451678v', 'Ganga', 'Samanali', 'Female', '1992-12-04', 'No 12,Samadi Road,Colombo 05.', '0776542819', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `paitentdetails`
-- (See below for the actual view)
--
CREATE TABLE `paitentdetails` (
`fname` varchar(128)
,`lname` varchar(128)
,`dob` date
,`admitDate` date
,`dischargeDate` date
,`reason` varchar(11)
,`wardName` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `phydetails`
-- (See below for the actual view)
--
CREATE TABLE `phydetails` (
`fname` varchar(128)
,`lname` varchar(128)
,`gender` varchar(6)
,`contactNO` varchar(10)
,`field` varchar(128)
);

-- --------------------------------------------------------

--
-- Table structure for table `physician`
--

CREATE TABLE `physician` (
  `phyID` int(4) NOT NULL,
  `regNO` varchar(20) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(128) NOT NULL,
  `contactNO` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physician`
--

INSERT INTO `physician` (`phyID`, `regNO`, `fname`, `lname`, `gender`, `address`, `contactNO`) VALUES
(1, 'MBBS 45/5', 'Saman', 'Kumara', 'Male', '54, colombo7', '0112365681'),
(2, 'MBBS 35/3', 'Priyankara', 'Senanayaka', 'Male', 'No 98,Highlevel road,Colombo 06', '0712222334'),
(3, 'MBBS 67/8', 'Saman ', 'Perera', 'Male', 'No 56,Delkanda, Nugegoda', '0713425679'),
(4, 'MBBS 95/2', 'Upul ', 'Kumara', 'Male', 'No 78,Nawinna,Nugegoda', '0778956341'),
(5, 'MBBS 43/8', 'Nilupuli', 'Dissanayake', 'Female', 'No 90,Mirihana,Nugegoda.', '0723456713'),
(6, 'MBBS 41/9', 'Thusith', 'Aravinda', 'Male', 'No 32,Highlevel Road,Pannipitiya ', '0712346734'),
(7, 'MBBS 42/3', 'Daya', 'Silva', 'Male', '18 St. Anthonys Mawatha, Colombo 3', '0775122102');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `testID` int(4) NOT NULL,
  `testName` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`testID`, `testName`, `description`) VALUES
(1, 'ECG', 'Electrocardiogram Test'),
(2, 'HIV Test', 'Human Immunodeficiency Virus'),
(3, 'CBC', 'Complete Blood Count'),
(4, 'UFR', 'Urine Full Report'),
(5, 'FBC', 'Full Blood Check'),
(6, 'Lipid Profile', 'Check the Lipid such as cholestorl'),
(7, 'X - RAY', 'Bone Density Study'),
(8, 'FBS', 'Fasting Blood Suger'),
(9, 'MRI', 'Magnetic Resonance Imaging'),
(10, 'Colonoscopy', 'A test to look into the rectum and colon');

-- --------------------------------------------------------

--
-- Table structure for table `testregister`
--

CREATE TABLE `testregister` (
  `pID` int(4) NOT NULL,
  `testID` int(4) NOT NULL,
  `result` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testregister`
--

INSERT INTO `testregister` (`pID`, `testID`, `result`) VALUES
(1, 1, 'Normal'),
(1, 6, '190 mg/dL'),
(2, 6, '245 mg/dL'),
(5, 2, 'Positive');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `ID` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `loginType` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`ID`, `username`, `password`, `loginType`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'user2', '1234', 'doctor'),
(3, 'user3', '1234', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `wardNO` int(4) NOT NULL,
  `wardName` varchar(255) DEFAULT NULL,
  `NoOfPaitents` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`wardNO`, `wardName`, `NoOfPaitents`) VALUES
(1, 'Eye Ward', 40),
(2, 'SurgicalWard', 3),
(3, 'Intensive Care Unit', 2),
(4, 'Medical Ward', 12),
(5, 'Dental ward', 5);

-- --------------------------------------------------------

--
-- Structure for view `admittedlist`
--
DROP TABLE IF EXISTS `admittedlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admittedlist`  AS  select `cp`.`confirmedBY` AS `confirmedBY`,`p`.`fname` AS `fname`,`p`.`lname` AS `lname`,`a`.`addmissionNO` AS `addmissionNO`,`a`.`admitDate` AS `admitDate`,`a`.`relationName` AS `relationName`,`a`.`relationcontactNO` AS `relationcontactNO`,`a`.`dischargeDate` AS `dischargeDate`,`a`.`reason` AS `reason`,`a`.`wardNO` AS `wardNO` from ((`addmission` `a` join `confirmedpaitent` `cp`) join `paitent` `p`) where ((`a`.`addmissionNO` = `cp`.`addmissionNO`) and (`cp`.`pID` = `p`.`pID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `paitentdetails`
--
DROP TABLE IF EXISTS `paitentdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `paitentdetails`  AS  select `p`.`fname` AS `fname`,`p`.`lname` AS `lname`,`p`.`dob` AS `dob`,`ad`.`admitDate` AS `admitDate`,`ad`.`dischargeDate` AS `dischargeDate`,`ad`.`reason` AS `reason`,`w`.`wardName` AS `wardName` from (((`paitent` `p` join `confirmedpaitent` `cp`) join `addmission` `ad`) join `ward` `w`) where ((`p`.`pID` = `cp`.`pID`) and (`cp`.`addmissionNO` = `ad`.`addmissionNO`) and (`ad`.`wardNO` = `w`.`wardNO`)) ;

-- --------------------------------------------------------

--
-- Structure for view `phydetails`
--
DROP TABLE IF EXISTS `phydetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `phydetails`  AS  select `phy`.`fname` AS `fname`,`phy`.`lname` AS `lname`,`phy`.`gender` AS `gender`,`phy`.`contactNO` AS `contactNO`,`c`.`field` AS `field` from (`physician` `phy` join `consultant` `c`) where (`phy`.`phyID` = `c`.`consultID`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmission`
--
ALTER TABLE `addmission`
  ADD PRIMARY KEY (`addmissionNO`),
  ADD KEY `FK_wardNO` (`wardNO`);

--
-- Indexes for table `confirmedpaitent`
--
ALTER TABLE `confirmedpaitent`
  ADD PRIMARY KEY (`confirmedBY`,`pID`,`addmissionNO`),
  ADD KEY `FK_pID` (`pID`),
  ADD KEY `FK_addmissionNO` (`addmissionNO`);

--
-- Indexes for table `consultant`
--
ALTER TABLE `consultant`
  ADD PRIMARY KEY (`consultID`);

--
-- Indexes for table `paitent`
--
ALTER TABLE `paitent`
  ADD PRIMARY KEY (`pID`),
  ADD KEY `FK_ref` (`refID`);

--
-- Indexes for table `physician`
--
ALTER TABLE `physician`
  ADD PRIMARY KEY (`phyID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `testregister`
--
ALTER TABLE `testregister`
  ADD PRIMARY KEY (`pID`,`testID`),
  ADD KEY `FK_testID` (`testID`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`wardNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `testID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ward`
--
ALTER TABLE `ward`
  MODIFY `wardNO` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `addmission`
--
ALTER TABLE `addmission`
  ADD CONSTRAINT `FK_wardNO` FOREIGN KEY (`wardNO`) REFERENCES `ward` (`wardNO`);

--
-- Constraints for table `confirmedpaitent`
--
ALTER TABLE `confirmedpaitent`
  ADD CONSTRAINT `FK_addmissionNO` FOREIGN KEY (`addmissionNO`) REFERENCES `addmission` (`addmissionNO`),
  ADD CONSTRAINT `FK_confirmedBY` FOREIGN KEY (`confirmedBY`) REFERENCES `consultant` (`consultID`),
  ADD CONSTRAINT `FK_pID` FOREIGN KEY (`pID`) REFERENCES `paitent` (`pID`);

--
-- Constraints for table `consultant`
--
ALTER TABLE `consultant`
  ADD CONSTRAINT `consultant_ibfk_1` FOREIGN KEY (`consultID`) REFERENCES `physician` (`phyID`);

--
-- Constraints for table `paitent`
--
ALTER TABLE `paitent`
  ADD CONSTRAINT `FK_ref` FOREIGN KEY (`refID`) REFERENCES `consultant` (`consultID`);

--
-- Constraints for table `testregister`
--
ALTER TABLE `testregister`
  ADD CONSTRAINT `FK_testID` FOREIGN KEY (`testID`) REFERENCES `test` (`testID`),
  ADD CONSTRAINT `FK_trpID` FOREIGN KEY (`pID`) REFERENCES `paitent` (`pID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
