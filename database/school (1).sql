-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 01:29 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `standard` int(10) NOT NULL,
  `ClassRoom` varchar(5) NOT NULL,
  `teacher` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `standard`, `ClassRoom`, `teacher`) VALUES
(1, 9, 'A', 'akshya kanzariya'),
(2, 10, 'A', 'jaydip chavda'),
(6, 12, 'A', 'sandip songra'),
(8, 11, 'A', 'bhavesh kanzariya');

-- --------------------------------------------------------

--
-- Table structure for table `class_timetable`
--

CREATE TABLE `class_timetable` (
  `id` int(10) NOT NULL,
  `starttime` varchar(500) NOT NULL,
  `endtime` varchar(500) NOT NULL,
  `monsubject` varchar(500) NOT NULL,
  `monteacher` varchar(500) NOT NULL,
  `tuesubject` varchar(500) NOT NULL,
  `tueteacher` varchar(500) NOT NULL,
  `wedsubject` varchar(500) NOT NULL,
  `wedteacher` varchar(500) NOT NULL,
  `thusubject` varchar(500) NOT NULL,
  `thuteacher` varchar(500) NOT NULL,
  `frisubject` varchar(500) NOT NULL,
  `friteacher` varchar(500) NOT NULL,
  `satsubject` varchar(500) NOT NULL,
  `satteacher` varchar(500) NOT NULL,
  `standard` int(50) NOT NULL,
  `classroom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_timetable`
--

INSERT INTO `class_timetable` (`id`, `starttime`, `endtime`, `monsubject`, `monteacher`, `tuesubject`, `tueteacher`, `wedsubject`, `wedteacher`, `thusubject`, `thuteacher`, `frisubject`, `friteacher`, `satsubject`, `satteacher`, `standard`, `classroom`) VALUES
(2, '19:30,20:15,21:30,22:00,22:45', '20:15,21:30,22:00,22:45,23:30', 'Math,Science,Recess,SocialScience,Hindi', 'sandip songra,jaydip chavda,Recess,sandip songra,jaydip chavda', 'Math,Science,Recess,SocialScience,Hindi', 'sandip songra,jaydip chavda,Recess,sandip songra,jaydip chavda', 'Math,Science,Recess,SocialScience,Hindi', 'sandip songra,jaydip chavda,Recess,sandip songra,jaydip chavda', 'Math,Science,Recess,SocialScience,Hindi', 'sandip songra,sandip songra,Recess,sandip songra,jaydip chavda', 'Math,Science,Recess,SocialScience,Hindi', 'sandip songra,jaydip chavda,Recess,sandip songra,jaydip chavda', 'Math,Science,Recess,SocialScience,Gujarati', 'sandip songra,jaydip chavda,Recess,jaydip chavda,sandip songra', 9, 'A'),
(3, '07:30,08:15', '08:15,09:00', 'Math,Science', 'sandip songra,jaydip chavda', 'Math,Science', 'sandip songra,jaydip chavda', 'Math,Science', 'sandip songra,jaydip chavda', 'Math,Science', 'sandip songra,jaydip chavda', 'Math,Science', 'sandip songra,jaydip chavda', 'Math,Science', 'sandip songra,jaydip chavda', 10, 'A'),
(4, '07:30,08:15,09:00,09:45,10:15,11:45,00:30', '08:15,09:00,09:45,10:15,11:00,00:30,01:15', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,akshya kanzariya', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,sandip songra', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,akshya kanzariya', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,akshya kanzariya', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,akshya kanzariya', 'Account,Gujarati,Economics,Recess,stat,English,SP', 'sandip songra,akshya kanzariya,sandip songra,Recess,akshya kanzariya,sandip songra,akshya kanzariya', 12, 'A'),
(5, '07:30,08:15,09:00,09:45,10:15,11:00,11:45,00:30,02:00', '08:15,09:00,09:45,10:15,11:00,11:45,00:30,02:00,02:45', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,bhavesh kanzariya,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,jaydip chavda,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,bhavesh kanzariya,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,bhavesh kanzariya,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,bhavesh kanzariya,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 'Account,Gujarati,Economics,Recess,stat,English,SP,Recess,BA', 'jaydip chavda,bhavesh kanzariya,jaydip chavda,Recess,bhavesh kanzariya,jaydip chavda,bhavesh kanzariya,Recess,jaydip chavda', 11, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `create_exam`
--

CREATE TABLE `create_exam` (
  `id` int(5) NOT NULL,
  `examName` varchar(100) NOT NULL,
  `stander` varchar(10) NOT NULL,
  `totalMarks` int(5) NOT NULL,
  `passingMarks` int(5) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_exam`
--

INSERT INTO `create_exam` (`id`, `examName`, `stander`, `totalMarks`, `passingMarks`, `startDate`, `endDate`) VALUES
(4, 'main', '9', 100, 33, '2024-12-31', '2024-12-31'),
(6, 'january', '11', 100, 33, '2024-01-24', '2024-01-18'),
(8, 'main', '10', 100, 33, '2024-02-02', '2024-12-31'),
(10, 'bhavesh', '9', 20, 7, '2024-02-24', '2024-02-28'),
(11, 'october menstrual text', '12', 50, 18, '2024-12-31', '2024-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `fee_form`
--

CREATE TABLE `fee_form` (
  `id` int(10) NOT NULL,
  `Standard` int(10) NOT NULL,
  `fee` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fee_form`
--

INSERT INTO `fee_form` (`id`, `Standard`, `fee`) VALUES
(3, 10, 50000),
(4, 9, 30000),
(5, 11, 55000),
(6, 12, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(10) NOT NULL,
  `subjectmarks` varchar(500) NOT NULL,
  `stander` int(10) NOT NULL,
  `classroom` varchar(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `parentname` varchar(100) NOT NULL,
  `totlemarks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `subjectmarks`, `stander`, `classroom`, `fullname`, `parentname`, `totlemarks`) VALUES
(28, 'standard:11,class:B,id:5,fullname:meet kanzariya,parentname:meet kanzariya,totalMarks:100,Account:100,Gujarati:100,Economics:100,stat:100,English:100,SP:100,BA:100', 11, 'B', 'meet kanzariya', 'meet kanzariya', 100),
(29, 'standard:9,class:B,id:7,fullname:sandip songra,parentname:sandip songra,totalMarks:100,Math:35,Science:35,English:35,SocialScience:35,Hindi:35,ComputerScience:33,Gujarati:35,sanskut:35', 9, 'B', 'sandip songra', 'sandip songra', 100),
(30, 'standard:9,class:A,id:4,fullname:kjiji jiji,parentname:kjiji jiji,totalMarks:100,Math:50,Science:75,English:15,SocialScience:35,Hindi:66,ComputerScience:55,Gujarati:58,sanskut:90', 9, 'A', 'kjiji jiji', 'kjiji jiji', 100),
(36, 'standard:10,class:A,id:8,fullname:bhavesh kanzariya,parentname:bhavesh kanzariya,totalMarks:100,Math:50,Science:50,English:50,SocialScience:50,Gujarati:50,sanskut:50', 10, 'A', 'bhavesh kanzariya', 'bhavesh kanzariya', 100),
(37, 'standard:10,class:A,id:8,fullname:sandip songra,parentname:sandip songra,totalMarks:100,Math:40,Science:40,English:40,SocialScience:40,Gujarati:40,sanskut:40', 10, 'A', 'sandip songra', 'sandip songra', 100),
(38, 'standard:10,class:B,id:8,fullname:jaydip chavda,parentname:jaydip chavda,totalMarks:100,Math:40,Science:40,English:40,SocialScience:40,Gujarati:40,sanskut:40', 10, 'B', 'jaydip chavda', 'jaydip chavda', 100),
(40, 'standard:9,class:A,id:10,fullname:kjiji jiji,parentname:kjiji jiji,totalMarks:20,Math:15,Science:15,English:15,SocialScience:15,Hindi:15,ComputerScience:15,Gujarati:15,sanskut:15', 9, 'A', 'kjiji jiji', 'kjiji jiji', 20),
(41, 'standard:11,class:A,id:6,fullname:ertyui rtyirtu,parentname:ertyui rtyirtu,totalMarks:100,Account:50,Gujarati:50,Economics:50,stat:56,English:65,SP:55,BA:55', 11, 'A', 'ertyui rtyirtu', 'ertyui rtyirtu', 100);

-- --------------------------------------------------------

--
-- Table structure for table `present`
--

CREATE TABLE `present` (
  `id` int(10) NOT NULL,
  `data` varchar(100) NOT NULL,
  `standard` int(50) NOT NULL,
  `classroom` varchar(10) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `parentname` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `statusarray` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobilnumber` varchar(13) NOT NULL,
  `password` varchar(200) NOT NULL,
  `otp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `mobilnumber`, `password`, `otp`) VALUES
(2, 'sandip songra', 'sandip@gmail.com', '6352049554', 'd3eb9a9233e52948740d7eb8c3062d14', '184957'),
(3, 'bhavesh kanzariya', 'kanzariyabhavesh1128@gmail.com', '6354068379', '25f9e794323b453885f5181f1b624d0b', '938894'),
(5, 'sandip songra', 'sandip@gmail.com', '564649114', '827ccb0eea8a706c4c34a16891f84e7b', '184957'),
(6, 'jaydip chavda', 'jaydip@gamil.com', '5649447444', 'c5fe25896e49ddfe996db7508cf00534', '842992');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee_value`
--

CREATE TABLE `student_fee_value` (
  `id` int(10) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `parentname` varchar(100) NOT NULL,
  `standard` int(5) NOT NULL,
  `classroom` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` varchar(13) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `address` varchar(200) NOT NULL,
  `cerditfee` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_fee_value`
--

INSERT INTO `student_fee_value` (`id`, `fullname`, `parentname`, `standard`, `classroom`, `dob`, `email`, `phonenumber`, `gender`, `address`, `cerditfee`) VALUES
(1, 'sandip songra', 'sandip songra', 9, 'B', '2024-12-31', 'sandip@gmail.com', '0', 'Male', 'halvad', 25000),
(3, 'bhavesh kanzariya', 'bhavesh kanzariya', 10, 'A', '2024-01-26', 'kanzariyabhavesh1128@gmail.com', '0', 'Male', 'lilapar', 20000),
(4, 'meet kanzariya', 'meet kanzariya', 11, 'B', '2024-12-31', 'meet@gmail.com', '0', 'Femal', 'rajkot', 30000),
(5, 'kjiji jiji', 'kjiji jiji', 9, 'A', '2024-12-31', 'bhavesh123@gmil.com', '0', 'Male', 'hhuhugu', 30000),
(6, 'bhavesh kanzariya', 'hasmukhbhai', 12, 'A', '2024-12-31', 'kanzariyabhavesh1128@gmail.com', '0', 'Male', 'chandragadh', 35000),
(7, 'ertyui rtyirtu', 'ertyui rtyirtu', 11, 'A', '2024-12-31', 'kanzariyabhavesh1128@gmail.com', '4554', 'Femal', 'lilapar', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `student_form_value`
--

CREATE TABLE `student_form_value` (
  `id` int(5) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `parentname` varchar(100) NOT NULL,
  `standard` int(5) NOT NULL,
  `classroom` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phonenumber` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_form_value`
--

INSERT INTO `student_form_value` (`id`, `fullname`, `parentname`, `standard`, `classroom`, `dob`, `email`, `gender`, `address`, `phonenumber`) VALUES
(8, 'bhavesh kanzariya', 'hasmukhbhai', 12, 'A', '2024-12-31', 'kanzariyabhavesh1128@gmail.com', 'Male', 'chandragadh', '6354068379'),
(9, 'sandip songra', 'sandip songra', 9, 'B', '2024-12-31', 'sandip@gmail.com', 'Male', 'halvad', '155151488'),
(10, 'meet kanzariya', 'meet kanzariya', 11, 'B', '2024-12-31', 'meet@gmail.com', 'Female', 'rajkot', '4544544154'),
(12, 'bhavesh kanzariya', 'bhavesh kanzariya', 10, 'A', '2024-01-26', 'kanzariyabhavesh1128@gmail.com', 'Male', 'lilapar', '51411454'),
(13, 'kjiji jiji', 'kjiji jiji', 9, 'A', '2024-12-31', 'bhavesh123@gmil.com', 'Male', 'hhuhugu', '1518451154'),
(14, 'sandip songra', 'sandip songra', 12, 'C', '2024-02-06', 'sandip@gmail.com', 'Male', 'halvad', '635158841'),
(15, 'jaydip chavda', 'jaydip chavda', 10, 'B', '2024-12-31', 'jaydip@gamil.com', 'Male', 'morbi', '6354565515'),
(16, 'sandip songra', 'sandip songra', 10, 'A', '2024-02-15', 'sandip@gmail.com', 'Male', 'halvad', '6354068379'),
(17, 'ertyui rtyirtu', 'ertyui rtyirtu', 11, 'A', '2024-12-31', 'kanzariyabhavesh1128@gmail.com', 'Female', 'lilapar', '4554'),
(21, 'bhavesh kanzariya', 'hasmukhbhai', 12, 'A', '2024-12-31', 'kanzariyabhavesh1128@gmail.com', 'Male', 'chandragadh', '6354068379'),
(22, 'bhavesh kanzariya', 'bhavesh kanzariya', 9, 'A', '1212-12-12', 'kanzariyabhavesh1128@gmail.com', 'Male', 'lilapar', '123456789'),
(23, 'meet kanzariya', 'meet kanzariya', 10, 'A', '2024-03-13', 'meet@gmail.com', 'Male', 'rajkot', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(5) NOT NULL,
  `standard` int(5) NOT NULL,
  `subject` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `standard`, `subject`) VALUES
(9, 9, '9,Math,Science,English,SocialScience,Hindi,ComputerScience,Gujarati,sanskut'),
(10, 10, '10,Math,Science,English,SocialScience,Gujarati,sanskut'),
(11, 11, '11 Commerce,Account,Gujarati,Economics,stat,English,SP,BA'),
(12, 12, '12 Commerce,Account,Gujarati,Economics,stat,English,SP,BA');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_form`
--

CREATE TABLE `teacher_form` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phonenumber` int(13) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` int(10) NOT NULL,
  `joiningdata` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `standard` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_form`
--

INSERT INTO `teacher_form` (`id`, `name`, `email`, `phonenumber`, `gender`, `salary`, `joiningdata`, `address`, `standard`, `subject`) VALUES
(2, 'sandip songra', 'sandip@gmail.com', 2147483647, 'Male', 646, '2024-02-13', 'halvad', '9,12', 'math,ba'),
(3, 'jaydip chavda', 'jaydip@gamil.com', 333166, 'Male', 6464, '2024-12-31', 'morbi', '9,11', 'Science,Account'),
(4, 'akshya kanzariya', 'ak@gmil.com', 2147483647, 'Male', 65965496, '2024-02-28', 'halvad', '10,12', 'math,ba'),
(5, 'bhavesh kanzariya', 'kanzariyabhavesh1128@gmail.com', 2147483647, 'Male', 50000, '2024-02-01', 'lilapar', '11,10', 'Account,Math');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

CREATE TABLE `time_table` (
  `id` int(5) NOT NULL,
  `date` varchar(500) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `stander` int(10) NOT NULL,
  `examname` varchar(100) NOT NULL,
  `time` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `date`, `subject`, `stander`, `examname`, `time`) VALUES
(13, '2023-11-16,2023-11-17,2023-11-18,2023-11-19,2023-11-20,2023-11-21,2023-11-22', 'Account,BA,State,Economics,SP,English,Gujrati', 12, 'october menstrual text', '8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM'),
(16, '2023-11-16,2023-11-17,2023-11-18,2023-11-19,2023-11-20,2023-11-21', 'Math,Science,English,SocialScience,sanskut,Gujrati', 10, 'main', '8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM,8:00 AM - 11:00 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_timetable`
--
ALTER TABLE `class_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_exam`
--
ALTER TABLE `create_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_form`
--
ALTER TABLE `fee_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `present`
--
ALTER TABLE `present`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_fee_value`
--
ALTER TABLE `student_fee_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_form_value`
--
ALTER TABLE `student_form_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_form`
--
ALTER TABLE `teacher_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_table`
--
ALTER TABLE `time_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class_timetable`
--
ALTER TABLE `class_timetable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `create_exam`
--
ALTER TABLE `create_exam`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fee_form`
--
ALTER TABLE `fee_form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `present`
--
ALTER TABLE `present`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_fee_value`
--
ALTER TABLE `student_fee_value`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_form_value`
--
ALTER TABLE `student_form_value`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teacher_form`
--
ALTER TABLE `teacher_form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_table`
--
ALTER TABLE `time_table`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
