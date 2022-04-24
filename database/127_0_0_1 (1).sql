-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 01:51 PM
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
-- Database: `hewad`
--
CREATE DATABASE IF NOT EXISTS `hewad` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `hewad`;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `className` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `semester` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `facultyid`, `departmentid`, `className`, `semester`) VALUES
(31, 7, 11, 'Computer 1', 1),
(34, 10, 20, 'L1', 1),
(35, 10, 21, 'l2', 5),
(36, 7, 14, 'c1', 1),
(37, 12, 18, 'e1', 1),
(38, 12, 19, 'e2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `facultyid`, `departmentName`, `regdate`) VALUES
(11, 7, 'SE', '2021-02-21'),
(14, 7, 'DE', '2021-03-08'),
(18, 12, 'Natial Economy', '2021-05-11'),
(19, 12, 'Accounting', '2021-05-11'),
(20, 10, 'Qaza-o-saranwale', '2021-05-11'),
(21, 10, 'QAza-o-qader', '2021-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `examaq`
--

CREATE TABLE `examaq` (
  `id` int(11) NOT NULL,
  `onlineExamid` int(11) NOT NULL,
  `Question` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `Answer1` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Answer2` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Answer3` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Answer4` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `RightAnswer` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `Score` int(3) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `examaq`
--

INSERT INTO `examaq` (`id`, `onlineExamid`, `Question`, `Answer1`, `Answer2`, `Answer3`, `Answer4`, `RightAnswer`, `Score`) VALUES
(5, 3, 'What is Economy?', 'PHP Framework', 'Android Framework', 'Java Framework', 'Java Script Framework', 'PHP Framework', 10);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `facultyName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `facultydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `facultyName`, `facultydate`) VALUES
(7, 'Computer Science', '2021-02-21'),
(10, 'Law', '2021-03-08'),
(12, 'Economy', '2021-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `getexam`
--

CREATE TABLE `getexam` (
  `id` int(11) NOT NULL,
  `examAQid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `Scores` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `getexam`
--

INSERT INTO `getexam` (`id`, `examAQid`, `studentid`, `SubjectID`, `Scores`) VALUES
(112, 5, 28, 28, 10),
(113, 5, 28, 28, 10),
(118, 5, 28, 28, 10),
(124, 5, 28, 28, 10);

-- --------------------------------------------------------

--
-- Table structure for table `graduation`
--

CREATE TABLE `graduation` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `graddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `Homework` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `UploadHomework` varchar(200) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`id`, `facultyid`, `departmentid`, `classid`, `subjectid`, `Homework`, `UploadHomework`) VALUES
(6, 7, 11, 31, 24, '1619807152learn-laravel-5.pdf', '1621145014');

-- --------------------------------------------------------

--
-- Table structure for table `onlineexam`
--

CREATE TABLE `onlineexam` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `examlevel` tinyint(1) NOT NULL,
  `examChanse` int(2) NOT NULL,
  `examyDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `onlineexam`
--

INSERT INTO `onlineexam` (`id`, `facultyid`, `departmentid`, `classid`, `subjectid`, `teacherid`, `examlevel`, `examChanse`, `examyDate`) VALUES
(3, 12, 18, 37, 28, 13, 1, 2, '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reed1` tinyint(2) NOT NULL DEFAULT 16,
  `create1` tinyint(2) NOT NULL DEFAULT 16,
  `edit1` tinyint(2) NOT NULL DEFAULT 16,
  `delete1` tinyint(2) NOT NULL DEFAULT 16
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `userid`, `reed1`, `create1`, `edit1`, `delete1`) VALUES
(1, 1, 1, 3, 4, 8),
(88, 89, 1, 0, 0, 0),
(89, 90, 1, 3, 0, 0),
(90, 91, 1, 3, 0, 0),
(91, 92, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `admin` tinyint(2) NOT NULL DEFAULT 16,
  `finance` tinyint(2) NOT NULL DEFAULT 16,
  `hr` tinyint(2) NOT NULL DEFAULT 16,
  `logistic` tinyint(2) NOT NULL DEFAULT 16
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `userid`, `admin`, `finance`, `hr`, `logistic`) VALUES
(1, 1, 8, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `year` year(4) NOT NULL,
  `mounth` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `pcity` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `ccity` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `nic` int(20) NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `position` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'default.png',
  `regdate` date NOT NULL,
  `manager` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `userid`, `facultyid`, `firstName`, `lastName`, `year`, `mounth`, `day`, `gender`, `pcity`, `ccity`, `nic`, `phone`, `position`, `image`, `regdate`, `manager`) VALUES
(36, 1, 7, 'Munir Ahmad', 'Sarwari', 1995, 7, 4, 0, 'Kabul Afghanistan', 'Kabul Afghanistan', 62940835, '0531 472 2001', 'Engineer', '1648483483IMG_3912.JPG', '2021-02-21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staffattendance`
--

CREATE TABLE `staffattendance` (
  `id` int(11) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `attYear` year(4) NOT NULL,
  `attMonth` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `attday` int(2) NOT NULL,
  `attr` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `staffattendance`
--

INSERT INTO `staffattendance` (`id`, `staffid`, `attYear`, `attMonth`, `attday`, `attr`) VALUES
(24, 36, 2021, 'January', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staffsalary`
--

CREATE TABLE `staffsalary` (
  `id` int(11) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `amount` int(3) NOT NULL,
  `salaryDate` date NOT NULL,
  `bonus` int(3) NOT NULL DEFAULT 0,
  `Absences` tinyint(2) NOT NULL DEFAULT 0,
  `pay` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `staffsalary`
--

INSERT INTO `staffsalary` (`id`, `staffid`, `amount`, `salaryDate`, `bonus`, `Absences`, `pay`) VALUES
(17, 36, 1000, '2021-03-08', 100, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `SfirstName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `SfatherName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `SlastName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `year` year(4) NOT NULL,
  `mounth` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `ccity` varchar(86) COLLATE utf8_persian_ci NOT NULL,
  `pcity` varchar(86) COLLATE utf8_persian_ci NOT NULL,
  `nic` int(20) NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'default.png',
  `school` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `graduationYear` year(4) NOT NULL,
  `KankorNo` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `userid`, `departmentid`, `facultyid`, `classid`, `SfirstName`, `SfatherName`, `SlastName`, `year`, `mounth`, `day`, `gender`, `ccity`, `pcity`, `nic`, `phone`, `image`, `school`, `graduationYear`, `KankorNo`, `regdate`) VALUES
(27, 89, 11, 7, 31, 'Student1', 'Fazel Ahmad1', 'Students1', 1994, 1, 1, 0, 'Sakarya', 'Kabul', 2323, '0531 472 2002', 'default.png', 'dasdasd', 2000, '23456', '2021-04-30'),
(28, 92, 19, 12, 38, 'jawad', 'tawab', 'khanzada', 1991, 1, 1, 0, 'Ú©Ø§Ø¨Ù„', 'Ú©Ø§Ø¨Ù„', 238178378, '328428947892', 'default.png', 'Ø§Ø³ØªÙ‚Ù„Ø§Ù„', 2001, '200', '2021-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `studentatt`
--

CREATE TABLE `studentatt` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `attYear` year(4) NOT NULL,
  `attMonth` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `attday` int(2) NOT NULL,
  `attr` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `studentatt`
--

INSERT INTO `studentatt` (`id`, `studentid`, `attYear`, `attMonth`, `attday`, `attr`) VALUES
(19, 27, 2021, 'May', 30, 1),
(20, 28, 2021, 'May', 30, 0),
(21, 27, 2021, 'May', 30, 1),
(22, 28, 2021, 'May', 30, 1),
(23, 27, 2021, 'May', 30, 1),
(24, 27, 2021, 'May', 30, 1),
(25, 27, 2021, 'May', 30, 1),
(26, 28, 2021, 'May', 30, 0),
(27, 27, 2021, 'May', 30, 1),
(28, 28, 2021, 'May', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `amount` int(10) NOT NULL,
  `mounth` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `paydate` date NOT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentschedule`
--

CREATE TABLE `studentschedule` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `day` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `starttime` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `endtime` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `studentschedule`
--

INSERT INTO `studentschedule` (`id`, `studentid`, `facultyid`, `departmentid`, `classid`, `subjectid`, `day`, `starttime`, `endtime`) VALUES
(11, 27, 7, 11, 31, 24, 'Saturday', '8:00', '8:40'),
(12, 27, 7, 11, 31, 25, 'Saturday', '8:40', '9:20'),
(13, 28, 12, 18, 38, 28, 'Saturday', '8:00', '8:40');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subname` varchar(47) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subname`) VALUES
(24, 'Laravel'),
(25, 'Php'),
(28, 'banking');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `firstName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `fatherName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(47) COLLATE utf8_persian_ci NOT NULL,
  `year` year(4) NOT NULL,
  `mounth` int(2) NOT NULL,
  `day` int(2) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `ccity` varchar(86) COLLATE utf8_persian_ci NOT NULL,
  `pcity` varchar(86) COLLATE utf8_persian_ci NOT NULL,
  `nic` int(20) NOT NULL,
  `phone` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'default.png',
  `regdate` date NOT NULL,
  `degree` varchar(20) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `userid`, `departmentid`, `facultyid`, `firstName`, `fatherName`, `lastName`, `year`, `mounth`, `day`, `gender`, `ccity`, `pcity`, `nic`, `phone`, `image`, `regdate`, `degree`) VALUES
(13, 90, 18, 12, 'laila', 'ahmad', 'ahmadi', 1995, 1, 1, 1, 'kabul', 'laghman', 0, '3984873274872389', 'default.png', '2021-05-18', 'maser');

-- --------------------------------------------------------

--
-- Table structure for table `teacherattr`
--

CREATE TABLE `teacherattr` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `attYear` year(4) NOT NULL,
  `attMonth` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `attday` int(2) NOT NULL,
  `attr` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `teacherattr`
--

INSERT INTO `teacherattr` (`id`, `teacherid`, `attYear`, `attMonth`, `attday`, `attr`) VALUES
(60, 13, 2021, 'May', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachersalary`
--

CREATE TABLE `teachersalary` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) DEFAULT NULL,
  `amount` int(3) NOT NULL,
  `salaryDate` date NOT NULL,
  `bonus` int(3) NOT NULL DEFAULT 0,
  `Absences` tinyint(2) NOT NULL DEFAULT 0,
  `pay` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacherschedule`
--

CREATE TABLE `teacherschedule` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `day` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `starttime` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `endtime` varchar(10) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `teacherschedule`
--

INSERT INTO `teacherschedule` (`id`, `teacherid`, `facultyid`, `departmentid`, `classid`, `subjectid`, `day`, `starttime`, `endtime`) VALUES
(12, 13, 12, 19, 38, 28, 'Saturday', '12:00', '12:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `level` tinyint(1) NOT NULL,
  `photo` varchar(50) COLLATE utf8_persian_ci NOT NULL DEFAULT 'default.png',
  `statue` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `level`, `photo`, `statue`) VALUES
(1, 'Munir Ahmad', 'Sarwari', 'Example@example.com', '62940835', 0, '1648483629IMG_3912.JPG', 1),
(89, 'Student1', 'Students1', 'Student1@gmail.com', '12345', 3, 'default.png', 1),
(90, 'laila', 'ahmadi', 'teacher3@hewad.edu.af', '123', 2, 'default.png', 1),
(91, 'naweed', 'alizai', 'teacher4@hewad.edu.af', '123', 2, 'default.png', 0),
(92, 'jawad', 'khanzada', 'student2@hewad.edu.af', '123', 3, 'default.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`facultyid`);

--
-- Indexes for table `examaq`
--
ALTER TABLE `examaq`
  ADD PRIMARY KEY (`id`),
  ADD KEY `onlineExamid` (`onlineExamid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `getexam`
--
ALTER TABLE `getexam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examAQid` (`examAQid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `graduation`
--
ALTER TABLE `graduation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentid` (`studentid`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `onlineexam`
--
ALTER TABLE `onlineexam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `subjectid` (`subjectid`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `facultyid` (`facultyid`);

--
-- Indexes for table `staffattendance`
--
ALTER TABLE `staffattendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `staffsalary`
--
ALTER TABLE `staffsalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffid` (`staffid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `userid` (`userid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `classid` (`classid`);

--
-- Indexes for table `studentatt`
--
ALTER TABLE `studentatt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `studentschedule`
--
ALTER TABLE `studentschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studentid` (`studentid`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `userid` (`userid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `facultyid` (`facultyid`);

--
-- Indexes for table `teacherattr`
--
ALTER TABLE `teacherattr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `teachersalary`
--
ALTER TABLE `teachersalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`);

--
-- Indexes for table `teacherschedule`
--
ALTER TABLE `teacherschedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`),
  ADD KEY `facultyid` (`facultyid`),
  ADD KEY `departmentid` (`departmentid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `examaq`
--
ALTER TABLE `examaq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `getexam`
--
ALTER TABLE `getexam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `graduation`
--
ALTER TABLE `graduation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `onlineexam`
--
ALTER TABLE `onlineexam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `staffattendance`
--
ALTER TABLE `staffattendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staffsalary`
--
ALTER TABLE `staffsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `studentatt`
--
ALTER TABLE `studentatt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentschedule`
--
ALTER TABLE `studentschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacherattr`
--
ALTER TABLE `teacherattr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `teachersalary`
--
ALTER TABLE `teachersalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherschedule`
--
ALTER TABLE `teacherschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examaq`
--
ALTER TABLE `examaq`
  ADD CONSTRAINT `examaq_ibfk_1` FOREIGN KEY (`onlineExamid`) REFERENCES `onlineexam` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `getexam`
--
ALTER TABLE `getexam`
  ADD CONSTRAINT `getexam_ibfk_1` FOREIGN KEY (`examAQid`) REFERENCES `examaq` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `getexam_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `graduation`
--
ALTER TABLE `graduation`
  ADD CONSTRAINT `graduation_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `graduation_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `graduation_ibfk_3` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `homework`
--
ALTER TABLE `homework`
  ADD CONSTRAINT `homework_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homework_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homework_ibfk_3` FOREIGN KEY (`classid`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `homework_ibfk_4` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `onlineexam`
--
ALTER TABLE `onlineexam`
  ADD CONSTRAINT `onlineexam_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineexam_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineexam_ibfk_3` FOREIGN KEY (`classid`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineexam_ibfk_4` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineexam_ibfk_5` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffattendance`
--
ALTER TABLE `staffattendance`
  ADD CONSTRAINT `staffattendance_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staffsalary`
--
ALTER TABLE `staffsalary`
  ADD CONSTRAINT `staffsalary_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_4` FOREIGN KEY (`classid`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentatt`
--
ALTER TABLE `studentatt`
  ADD CONSTRAINT `studentatt_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD CONSTRAINT `studentfees_ibfk_1` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentfees_ibfk_2` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentschedule`
--
ALTER TABLE `studentschedule`
  ADD CONSTRAINT `studentschedule_ibfk_1` FOREIGN KEY (`studentid`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentschedule_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentschedule_ibfk_3` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentschedule_ibfk_4` FOREIGN KEY (`classid`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentschedule_ibfk_5` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_3` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacherattr`
--
ALTER TABLE `teacherattr`
  ADD CONSTRAINT `teacherattr_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachersalary`
--
ALTER TABLE `teachersalary`
  ADD CONSTRAINT `teachersalary_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacherschedule`
--
ALTER TABLE `teacherschedule`
  ADD CONSTRAINT `teacherschedule_ibfk_1` FOREIGN KEY (`teacherid`) REFERENCES `teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherschedule_ibfk_2` FOREIGN KEY (`facultyid`) REFERENCES `faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherschedule_ibfk_3` FOREIGN KEY (`departmentid`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherschedule_ibfk_4` FOREIGN KEY (`classid`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacherschedule_ibfk_5` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
