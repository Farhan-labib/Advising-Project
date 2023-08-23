-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 05:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `370_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(30) DEFAULT NULL,
  `Password` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Password`) VALUES
('admin1', '1234'),
('admin2', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `room_Id` char(10) NOT NULL,
  `type` char(10) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`room_Id`, `type`, `capacity`) VALUES
('UB10101', 'Theory', 40),
('UB10102', 'Theory', 40),
('UB10103', 'Theory', 40),
('UB10201', 'Theory', 40),
('UB10202', 'Theory', 40),
('UB10203', 'Theory', 40),
('UB10301', 'Theory', 40),
('UB10302', 'Theory', 40),
('UB10303', 'Theory', 40),
('UB10401', 'Theory', 40),
('UB10402', 'Theory', 40),
('UB10403', 'Theory', 40),
('UB10501', 'Theory', 40),
('UB10502', 'Theory', 40),
('UB10503', 'Theory', 40),
('UB10601', 'Theory', 40),
('UB10602', 'Theory', 40),
('UB10603', 'Theory', 40),
('UB10701', 'Theory', 40),
('UB10702', 'Theory', 40),
('UB10703', 'Theory', 40),
('UB10801', 'Theory', 40),
('UB10802', 'Theory', 40),
('UB10803', 'Theory', 40),
('UB10901', 'Theory', 40),
('UB10902', 'Theory', 40),
('UB10903', 'Theory', 40),
('UB20101', 'Theory', 40),
('UB20102', 'Theory', 40),
('UB20103', 'Theory', 40),
('UB20201', 'Theory', 40),
('UB20202', 'Theory', 40),
('UB20203', 'Theory', 40),
('UB20301', 'Theory', 40),
('UB20302', 'Theory', 40),
('UB20303', 'Theory', 40),
('UB20401', 'Theory', 40),
('UB20402', 'Theory', 40),
('UB20403', 'Theory', 40),
('UB20501', 'Theory', 40),
('UB20502', 'Theory', 40),
('UB20503', 'Theory', 40),
('UB20601', 'Theory', 40),
('UB20602', 'Theory', 40),
('UB20603', 'Theory', 40),
('UB20701', 'Theory', 40),
('UB20702', 'Theory', 40),
('UB20703', 'Theory', 40),
('UB20801', 'Theory', 40),
('UB20802', 'Theory', 40),
('UB20803', 'Theory', 40),
('UB20901', 'Theory', 40),
('UB20902', 'Theory', 40),
('UB20903', 'Theory', 40),
('UB30101', 'Theory', 40),
('UB30102', 'Theory', 40),
('UB30103', 'Theory', 40),
('UB30104', 'Theory', 40),
('UB30105', 'Theory', 40),
('UB30201', 'Theory', 40),
('UB30202', 'Theory', 40),
('UB30203', 'Theory', 40),
('UB30204', 'Theory', 40),
('UB30205', 'Theory', 40),
('UB30301', 'Theory', 40),
('UB30302', 'Theory', 40),
('UB30303', 'Theory', 40),
('UB30304', 'Theory', 40),
('UB30305', 'Theory', 40),
('UB30401', 'Theory', 40),
('UB30402', 'Theory', 40),
('UB30403', 'Theory', 40),
('UB30404', 'Theory', 40),
('UB30405', 'Theory', 40),
('UB30501', 'Theory', 40),
('UB30502', 'Theory', 40),
('UB30503', 'Theory', 40),
('UB30504', 'Theory', 40),
('UB30505', 'Theory', 40),
('UB40201', 'Theory', 40),
('UB40202', 'Theory', 40),
('UB40203', 'Theory', 40),
('UB40204', 'Theory', 40),
('UB40301', 'Theory', 40),
('UB40302', 'Theory', 40),
('UB40303', 'Theory', 40),
('UB40304', 'Theory', 40),
('UB50101', 'Lab', 200),
('UB50201', 'Lab', 200),
('UB60101', 'Lab', 200),
('UB60102', 'Lab', 200),
('UB60201', 'Lab', 200),
('UB70102', 'Theory', 40),
('UB70201', 'Theory', 40),
('UB70202', 'Theory', 40),
('UB70301', 'Theory', 40),
('UB70302', 'Theory', 40),
('UB70401', 'Theory', 40),
('UB70402', 'Theory', 40),
('UB70501', 'Theory', 40),
('UB70502', 'Theory', 40),
('UB71101', 'Lab', 200),
('UB71102', 'Lab', 200);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_name` char(10) NOT NULL,
  `section` char(4) NOT NULL,
  `dept` char(4) DEFAULT NULL,
  `pre_req` char(10) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_name`, `section`, `dept`, `pre_req`, `credit`) VALUES
('CHE-101', '1', 'COD', 'NONE', 3),
('CHE-101', '2', 'COD', 'NONE', 3),
('CHE-101', '3', 'COD', 'NONE', 3),
('CHE-101', '4', 'COD', 'NONE', 3),
('CSE-110', '1', 'CSE', 'NONE', 3),
('CSE-110', '2', 'CSE', 'NONE', 3),
('CSE-110', '3', 'CSE', 'NONE', 3),
('CSE-110', '4', 'CSE', 'NONE', 3),
('CSE-111', '1', 'CSE', 'CSE-110', 3),
('CSE-111', '2', 'CSE', 'CSE-110', 3),
('CSE-111', '3', 'CSE', 'CSE-110', 3),
('CSE-111', '4', 'CSE', 'CSE-110', 3),
('CSE-220', '1', 'CSE', 'CSE-111', 3),
('CSE-220', '2', 'CSE', 'CSE-111', 3),
('CSE-220', '3', 'CSE', 'CSE-111', 3),
('CSE-220', '4', 'CSE', 'CSE-111', 3),
('CSE-221', '1', 'CSE', 'CSE-220', 3),
('CSE-221', '2', 'CSE', 'CSE-220', 3),
('CSE-221', '3', 'CSE', 'CSE-220', 3),
('CSE-221', '4', 'CSE', 'CSE-220', 3),
('CSE-260', '1', 'CSE', 'NONE', 3),
('CSE-260', '2', 'CSE', 'NONE', 3),
('CSE-260', '3', 'CSE', 'NONE', 3),
('CSE-260', '4', 'CSE', 'NONE', 3),
('CSE-330', '1', 'CSE', 'NONE', 3),
('CSE-330', '2', 'CSE', 'NONE', 3),
('CSE-330', '3', 'CSE', 'NONE', 3),
('CSE-330', '4', 'CSE', 'NONE', 3),
('CSE-331', '1', 'CSE', 'NONE', 3),
('CSE-331', '2', 'CSE', 'NONE', 3),
('CSE-331', '3', 'CSE', 'NONE', 3),
('CSE-331', '4', 'CSE', 'NONE', 3),
('CSE-340', '1', 'CSE', 'NONE', 3),
('CSE-340', '2', 'CSE', 'NONE', 3),
('CSE-340', '3', 'CSE', 'NONE', 3),
('CSE-340', '4', 'CSE', 'NONE', 3),
('CSE-341', '1', 'CSE', 'NONE', 3),
('CSE-341', '2', 'CSE', 'NONE', 3),
('CSE-341', '3', 'CSE', 'NONE', 3),
('CSE-341', '4', 'CSE', 'NONE', 3),
('CSE-370', '1', 'CSE', 'CSE-221', 3),
('CSE-370', '2', 'CSE', 'CSE-221', 3),
('CSE-370', '3', 'CSE', 'CSE-221', 3),
('CSE-370', '4', 'CSE', 'CSE-221', 3),
('ECO-101', '1', 'COD', 'NONE', 3),
('ECO-101', '2', 'COD', 'NONE', 3),
('ECO-101', '3', 'COD', 'NONE', 3),
('ECO-101', '4', 'COD', 'NONE', 3),
('ENG-101', '1', 'BIL', 'NONE', 3),
('ENG-101', '2', 'BIL', 'NONE', 3),
('ENG-101', '3', 'BIL', 'NONE', 3),
('ENG-101', '4', 'BIL', 'NONE', 3),
('ENG-102', '1', 'BIL', 'ENG-101', 3),
('ENG-102', '2', 'BIL', 'ENG-101', 3),
('ENG-102', '3', 'BIL', 'ENG-101', 3),
('ENG-102', '4', 'BIL', 'ENG-101', 3),
('MAT-110', '1', 'MNS', 'NONE', 3),
('MAT-110', '2', 'MNS', 'NONE', 3),
('MAT-110', '3', 'MNS', 'NONE', 3),
('MAT-110', '4', 'MNS', 'NONE', 3),
('MAT-120', '1', 'MNS', 'NONE', 3),
('MAT-120', '2', 'MNS', 'NONE', 3),
('MAT-120', '3', 'MNS', 'NONE', 3),
('MAT-120', '4', 'MNS', 'NONE', 3),
('MAT-215', '1', 'MNS', 'MAT-120', 3),
('MAT-215', '2', 'MNS', 'MAT-120', 3),
('MAT-215', '3', 'MNS', 'MAT-120', 3),
('MAT-215', '4', 'MNS', 'MAT-120', 3),
('MAT-216', '1', 'MNS', 'MAT-120', 3),
('MAT-216', '2', 'MNS', 'MAT-120', 3),
('MAT-216', '3', 'MNS', 'MAT-120', 3),
('MAT-216', '4', 'MNS', 'MAT-120', 3),
('PHY-111', '1', 'MNS', 'NONE', 3),
('PHY-111', '2', 'MNS', 'NONE', 3),
('PHY-111', '3', 'MNS', 'NONE', 3),
('PHY-111', '4', 'MNS', 'NONE', 3),
('PHY-112', '1', 'MNS', 'PHY-111', 3),
('PHY-112', '2', 'MNS', 'PHY-111', 3),
('PHY-112', '3', 'MNS', 'PHY-111', 3),
('PHY-112', '4', 'MNS', 'PHY-111', 3),
('STA-201', '1', 'MNS', 'NONE', 3),
('STA-201', '2', 'MNS', 'NONE', 3),
('STA-201', '3', 'MNS', 'NONE', 3),
('STA-201', '4', 'MNS', 'NONE', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `name_initial` char(10) NOT NULL,
  `gmail` varchar(50) DEFAULT NULL,
  `password` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`name_initial`, `gmail`, `password`) VALUES
('ABJ', 'abj@g.bracu.ac.bd', 'abj1234'),
('AFZ', 'afz@g.bracu.ac.bd', 'afz1234'),
('AHL', 'ahl@g.bracu.ac.bd', 'ahl1234'),
('AHN', 'ahn@g.bracu.ac.bd', 'ahn1234'),
('AII', 'aii@g.bracu.ac.bd', 'aii1234'),
('AQD', 'aqd@g.bracu.ac.bd', 'aqd1234'),
('AYR', 'ayr@g.bracu.ac.bd', 'ayr1234'),
('FFZ', 'ffz@g.bracu.ac.bd', 'ffz1234'),
('FNK', 'fnk@g.bracu.ac.bd', 'fnk1234'),
('MASZ', 'masz@g.bracu.ac.bd', 'masz1234'),
('MLR', 'mlr@g.bracu.ac.bd', 'mlr1234'),
('MMRU', 'mmru@g.bracu.ac.bd', 'mmru1234'),
('MMSR', 'mmsr@g.bracu.ac.bd', 'mmsr1234'),
('MSH', 'msh@g.bracu.ac.bd', 'msh1234'),
('MSI', 'msi@g.bracu.ac.bd', 'msi1234'),
('MSR', 'msr@g.bracu.ac.bd', 'msr1234'),
('NNC', 'nnc@g.bracu.ac.bd', 'nnc1234'),
('NST', 'nst@g.bracu.ac.bd', 'nst1234'),
('NZN', 'nzn@g.bracu.ac.bd', 'nzn1234'),
('RAK', 'rak@g.bracu.ac.bd', 'rak1234'),
('SADI', 'sadi@g.bracu.ac.bd', 'sadi1234'),
('SHR', 'shr@g.bracu.ac.bd', 'shr1234'),
('SLM', 'slm@g.bracu.ac.bd', 'slm1234'),
('SRO', 'sro@g.bracu.ac.bd', 'sro1234'),
('SYR', 'syr@g.bracu.ac.bd', 'syr1234'),
('TAW', 'taw@g.bracu.ac.bd', 't1234'),
('TKT', 'tkt@g.bracu.ac.bd', 'tkt1234'),
('TSM', 'tsm@g.bracu.ac.bd', 'tsm1234'),
('TSS', 'tss@g.bracu.ac.bd', 'tss1234'),
('ZBZ', 'zbz@g.bracu.ac.bd', 'zbz1234');

-- --------------------------------------------------------

--
-- Table structure for table `seat_status`
--

CREATE TABLE `seat_status` (
  `course_name` char(10) NOT NULL,
  `section` char(4) NOT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `remaining_seat` int(11) DEFAULT NULL,
  `name_initial` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_status`
--

INSERT INTO `seat_status` (`course_name`, `section`, `total_seat`, `remaining_seat`, `name_initial`) VALUES
('CHE-101', '1', 35, 35, 'ZBZ'),
('CHE-101', '2', 35, 35, 'SLM'),
('CHE-101', '3', 35, 35, 'ZBZ'),
('CHE-101', '4', 35, 35, 'SLM'),
('CSE-110', '1', 35, 35, 'TAW'),
('CSE-110', '2', 35, 35, 'TAW'),
('CSE-110', '3', 35, 35, 'TAW'),
('CSE-110', '4', 35, 35, 'SHR'),
('CSE-111', '1', 35, 35, 'MSI'),
('CSE-111', '2', 35, 35, 'MSI'),
('CSE-111', '3', 35, 35, 'MSI'),
('CSE-111', '4', 35, 35, 'MSH'),
('CSE-220', '1', 35, 35, 'SRO'),
('CSE-220', '2', 35, 35, 'SRO'),
('CSE-220', '3', 35, 35, 'SRO'),
('CSE-220', '4', 35, 35, 'NST'),
('CSE-221', '1', 35, 35, 'RAK'),
('CSE-221', '2', 35, 35, 'RAK'),
('CSE-221', '3', 35, 35, 'RAK'),
('CSE-221', '4', 35, 35, 'NNC'),
('CSE-260', '1', 35, 35, 'AHN'),
('CSE-260', '2', 35, 35, 'AHN'),
('CSE-260', '3', 35, 35, 'AHN'),
('CSE-260', '4', 35, 35, 'FFZ'),
('CSE-330', '1', 35, 35, 'NZN'),
('CSE-330', '2', 35, 35, 'NZN'),
('CSE-330', '3', 35, 35, 'NZN'),
('CSE-330', '4', 35, 35, 'MSH'),
('CSE-331', '1', 35, 35, 'FFZ'),
('CSE-331', '2', 35, 35, 'FFZ'),
('CSE-331', '3', 35, 35, 'FFZ'),
('CSE-331', '4', 35, 35, 'NST'),
('CSE-340', '1', 35, 35, 'AFZ'),
('CSE-340', '2', 35, 35, 'AFZ'),
('CSE-340', '3', 35, 35, 'AFZ'),
('CSE-340', '4', 35, 35, 'SRO'),
('CSE-341', '1', 35, 35, 'FNK'),
('CSE-341', '2', 35, 35, 'FNK'),
('CSE-341', '3', 35, 35, 'FNK'),
('CSE-341', '4', 35, 35, 'TAW'),
('CSE-370', '1', 35, 35, 'NNC'),
('CSE-370', '2', 35, 35, 'NNC'),
('CSE-370', '3', 35, 35, 'NNC'),
('CSE-370', '4', 35, 35, 'SHR'),
('ECO-101', '1', 35, 35, 'TSM'),
('ECO-101', '2', 35, 35, 'AYR'),
('ECO-101', '3', 35, 35, 'TSM'),
('ECO-101', '4', 35, 35, 'AYR'),
('ENG-101', '1', 35, 35, 'SYR'),
('ENG-101', '2', 35, 35, 'TSS'),
('ENG-101', '3', 35, 35, 'TKT'),
('ENG-101', '4', 35, 35, 'TKT'),
('ENG-102', '1', 35, 35, 'TSS'),
('ENG-102', '2', 35, 35, 'SYR'),
('ENG-102', '3', 35, 35, 'TSS'),
('ENG-102', '4', 35, 35, 'MSI'),
('MAT-110', '1', 35, 35, 'AQD'),
('MAT-110', '2', 35, 35, 'AQD'),
('MAT-110', '3', 35, 35, 'AQD'),
('MAT-110', '4', 35, 35, 'AHL'),
('MAT-120', '1', 35, 35, 'MMRU'),
('MAT-120', '2', 35, 35, 'MMRU'),
('MAT-120', '3', 35, 35, 'MMRU'),
('MAT-120', '4', 35, 35, 'SADT'),
('MAT-215', '1', 35, 35, 'MASZ'),
('MAT-215', '2', 35, 35, 'MASZ'),
('MAT-215', '3', 35, 35, 'MASZ'),
('MAT-215', '4', 35, 35, 'RAK'),
('MAT-216', '1', 35, 35, 'AII'),
('MAT-216', '2', 35, 35, 'AII'),
('MAT-216', '3', 35, 35, 'AII'),
('MAT-216', '4', 35, 35, 'FNK'),
('PHY-111', '1', 35, 35, 'MLR'),
('PHY-111', '2', 35, 35, 'MLR'),
('PHY-111', '3', 35, 35, 'TKT'),
('PHY-111', '4', 35, 35, 'TKT'),
('PHY-112', '1', 35, 35, 'MMSR'),
('PHY-112', '2', 35, 35, 'MMSR'),
('PHY-112', '3', 35, 35, 'ABJ'),
('PHY-112', '4', 35, 35, 'ABJ'),
('STA-201', '1', 35, 35, 'NZN'),
('STA-201', '2', 35, 35, 'AFZ'),
('STA-201', '3', 35, 35, 'NNC'),
('STA-201', '4', 35, 35, 'NNC');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_name` varchar(30) DEFAULT NULL,
  `Id` char(20) NOT NULL,
  `dept` char(4) DEFAULT NULL,
  `credit` char(1) DEFAULT NULL,
  `gmail` varchar(10) DEFAULT NULL,
  `password` char(15) DEFAULT NULL,
  `Course1` char(10) DEFAULT NULL,
  `Course2` char(10) DEFAULT NULL,
  `Course3` char(10) DEFAULT NULL,
  `Course4` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_name`, `Id`, `dept`, `credit`, `gmail`, `password`, `Course1`, `Course2`, `Course3`, `Course4`) VALUES
('AYON', '20301104', 'CSE', '0', 'ayon@gmail', 'ayon1234', 'NA', 'NA', 'NA', 'NA'),
('SHAILY', '20301114', 'CSE', '0', 'shaily@gma', 'shaily1234', 'NA', 'NA', 'NA', 'NA'),
('UDOY', '20301174', 'CSE', '0', 'udoy@gmail', 'udoy1234', 'CSE-110__1', 'NA', 'CSE-331__1', 'NA'),
('FARHAN', '21101204', 'CSE', '0', 'farhan@gma', 'farhan1234', 'CSE-110__1', 'CSE-110__3', 'CSE-221__1', 'CSE-221__3');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `Course1` char(10) NOT NULL,
  `Course2` char(10) DEFAULT NULL,
  `Course3` char(10) DEFAULT NULL,
  `Course4` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`Course1`, `Course2`, `Course3`, `Course4`) VALUES
('CSE-111__2', NULL, NULL, NULL),
('CSE-221__1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timing`
--

CREATE TABLE `timing` (
  `course_name` char(10) NOT NULL,
  `section` char(4) NOT NULL,
  `date` char(4) DEFAULT NULL,
  `time` char(15) DEFAULT NULL,
  `building` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timing`
--

INSERT INTO `timing` (`course_name`, `section`, `date`, `time`, `building`) VALUES
('CHE-101', '1', 'MO', '08:00-09:20', 'UB10501'),
('CHE-101', '2', 'MO', '09:30-10:50', 'UB10401'),
('CHE-101', '3', 'MO', '02:00-03:20', 'UB10301'),
('CHE-101', '4', 'MO', '08:00-09:20', 'UB10201'),
('CSE-110', '1', 'SA', '08:00-09:20', 'UB30201'),
('CSE-110', '2', 'SA', '09:30-10:50', 'UB30301'),
('CSE-110', '3', 'SA', '02:00-03:20', 'UB30401'),
('CSE-110', '4', 'SA', '08:00-09:20', 'UB30501'),
('CSE-111', '1', 'SA', '08:00-09:20', 'UB30202'),
('CSE-111', '2', 'SA', '09:30-10:50', 'UB30302'),
('CSE-111', '3', 'SA', '02:00-03:20', 'UB30402'),
('CSE-111', '4', 'SA', '08:00-09:20', 'UB30502'),
('CSE-220', '1', 'SA', '08:00-09:20', 'UB30203'),
('CSE-220', '2', 'SA', '09:30-10:50', 'UB30303'),
('CSE-220', '3', 'SA', '02:00-03:20', 'UB30403'),
('CSE-220', '4', 'SA', '08:00-09:20', 'UB30503'),
('CSE-221', '1', 'SA', '08:00-09:20', 'UB30204'),
('CSE-221', '2', 'SA', '09:30-10:50', 'UB30304'),
('CSE-221', '3', 'SA', '02:00-03:20', 'UB30404'),
('CSE-221', '4', 'SA', '08:00-09:20', 'UB30504'),
('CSE-260', '1', 'MO', '08:00-09:20', 'UB80203'),
('CSE-260', '2', 'MO', '09:30-10:50', 'UB80303'),
('CSE-260', '3', 'MO', '02:00-03:20', 'UB80403'),
('CSE-260', '4', 'MO', '08:00-09:20', 'UB80503'),
('CSE-330', '1', 'SU', '08:00-09:20', 'UB40201'),
('CSE-330', '2', 'SU', '09:30-10:50', 'UB40202'),
('CSE-330', '3', 'SU', '02:00-03:20', 'UB40203'),
('CSE-330', '4', 'SU', '08:00-09:20', 'UB40204'),
('CSE-331', '1', 'SU', '08:00-09:20', 'UB40301'),
('CSE-331', '2', 'SU', '09:30-10:50', 'UB40302'),
('CSE-331', '3', 'SU', '02:00-03:20', 'UB40303'),
('CSE-331', '4', 'SU', '08:00-09:20', 'UB40304'),
('CSE-340', '1', 'SU', '08:00-09:20', 'UB70201'),
('CSE-340', '2', 'SU', '09:30-10:50', 'UB70301'),
('CSE-340', '3', 'SU', '02:00-03:20', 'UB70401'),
('CSE-340', '4', 'SU', '08:00-09:20', 'UB70501'),
('CSE-341', '1', 'SU', '08:00-09:20', 'UB70202'),
('CSE-341', '2', 'SU', '09:30-10:50', 'UB70302'),
('CSE-341', '3', 'SU', '02:00-03:20', 'UB70402'),
('CSE-341', '4', 'SU', '08:00-09:20', 'UB70502'),
('CSE-370', '1', 'SU', '08:00-09:20', 'UB30205'),
('CSE-370', '2', 'SU', '09:30-10:50', 'UB30305'),
('CSE-370', '3', 'SU', '02:00-03:20', 'UB30405'),
('CSE-370', '4', 'SU', '08:00-09:20', 'UB30505'),
('ECO-101', '1', 'MO', '08:00-09:20', 'UB10202'),
('ECO-101', '2', 'MO', '09:30-10:50', 'UB10302'),
('ECO-101', '3', 'MO', '02:00-03:20', 'UB10402'),
('ECO-101', '4', 'MO', '08:00-09:20', 'UB10502'),
('ENG-101', '1', 'MO', '08:00-09:20', 'UB10601'),
('ENG-101', '2', 'MO', '09:30-10:50', 'UB10701'),
('ENG-101', '3', 'MO', '02:00-03:20', 'UB10801'),
('ENG-101', '4', 'MO', '08:00-09:20', 'UB10901'),
('ENG-102', '1', 'MO', '08:00-09:20', 'UB10203'),
('ENG-102', '2', 'MO', '09:30-10:50', 'UB10303'),
('ENG-102', '3', 'MO', '02:00-03:20', 'UB10403'),
('ENG-102', '4', 'MO', '08:00-09:20', 'UB10503'),
('MAT-110', '1', 'MO', '08:00-09:20', 'UB20201'),
('MAT-110', '2', 'MO', '09:30-10:50', 'UB20301'),
('MAT-110', '3', 'MO', '02:00-03:20', 'UB20401'),
('MAT-110', '4', 'MO', '08:00-09:20', 'UB20501'),
('MAT-120', '1', 'MO', '08:00-09:20', 'UB20202'),
('MAT-120', '2', 'MO', '09:30-10:50', 'UB20302'),
('MAT-120', '3', 'MO', '02:00-03:20', 'UB20402'),
('MAT-120', '4', 'MO', '08:00-09:20', 'UB20502'),
('MAT-215', '1', 'MO', '08:00-09:20', 'UB20203'),
('MAT-215', '2', 'MO', '09:30-10:50', 'UB20303'),
('MAT-215', '3', 'MO', '02:00-03:20', 'UB20403'),
('MAT-215', '4', 'MO', '08:00-09:20', 'UB20503'),
('MAT-216', '1', 'MO', '08:00-09:20', 'UB20601'),
('MAT-216', '2', 'MO', '09:30-10:50', 'UB20701'),
('MAT-216', '3', 'MO', '02:00-03:20', 'UB20801'),
('MAT-216', '4', 'MO', '08:00-09:20', 'UB20901'),
('PHY-111', '1', 'MO', '08:00-09:20', 'UB20602'),
('PHY-111', '2', 'MO', '09:30-10:50', 'UB20702'),
('PHY-111', '3', 'MO', '02:00-03:20', 'UB20802'),
('PHY-111', '4', 'MO', '08:00-09:20', 'UB20902'),
('PHY-112', '1', 'MO', '08:00-09:20', 'UB10603'),
('PHY-112', '2', 'MO', '09:30-10:50', 'UB10703'),
('PHY-112', '3', 'MO', '02:00-03:20', 'UB10803'),
('PHY-112', '4', 'MO', '08:00-09:20', 'UB10903'),
('STA-201', '1', 'MO', '08:00-09:20', 'UB10602'),
('STA-201', '2', 'MO', '09:30-10:50', 'UB10702'),
('STA-201', '3', 'MO', '02:00-03:20', 'UB10802'),
('STA-201', '4', 'MO', '08:00-09:20', 'UB10902');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`room_Id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_name`,`section`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`name_initial`);

--
-- Indexes for table `seat_status`
--
ALTER TABLE `seat_status`
  ADD PRIMARY KEY (`course_name`,`section`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`Course1`);

--
-- Indexes for table `timing`
--
ALTER TABLE `timing`
  ADD PRIMARY KEY (`course_name`,`section`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `timing`
--
ALTER TABLE `timing`
  ADD CONSTRAINT `timing_ibfk_1` FOREIGN KEY (`course_name`,`section`) REFERENCES `course` (`course_name`, `section`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
