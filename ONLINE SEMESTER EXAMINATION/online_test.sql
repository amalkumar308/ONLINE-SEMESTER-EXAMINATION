-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 01:43 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `password`) VALUES
('amal', '123456'),
('amal1', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE IF NOT EXISTS `exam` (
  `exam_id` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `exam_type` varchar(20) NOT NULL,
  `marks` decimal(3,0) NOT NULL,
  `department` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `sem` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `password`, `user_id`, `exam_type`, `marks`, `department`, `branch`, `sem`) VALUES
('q', '123', 'amal754950', 'Class Quez', '20', 'CSED', 'MCA', 'III'),
('q1', '123456', 'amal754950', 'Class Quez', '20', 'CSED', 'MCA', 'III'),
('q3', '123456789', 'amal754950', 'Class Quez', '20', 'CSED', 'MCA', 'III');

-- --------------------------------------------------------

--
-- Table structure for table `exam_part`
--

CREATE TABLE IF NOT EXISTS `exam_part` (
  `exam_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `exam_part`
--

INSERT INTO `exam_part` (`exam_id`, `user_id`) VALUES
('q1', '2017CA55'),
('q', '2017CA55'),
('q1', '2017CA55'),
('q1', '2017CA55'),
('q1', '2017CA55'),
('q1', '2017CA55');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `user_id` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(40) NOT NULL,
  `designation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`user_id`, `password`, `department`, `name`, `mob`, `email`, `subject`, `designation`) VALUES
('amal754950', '123456789 ', 'CSED', 'Manoj Wariya', 8083005999, 'amalkumar308@gmail.com', 'Data Structure', 'Professor'),
('amal754951', '123456789 ', 'CSED', 'M.M.Gore', 8298329775, 'amalkumar308@gmail.com', 'C', 'Professor'),
('rupeshkumar', '123456789 ', 'CSED', 'Prof. Rupesh Kumar Diwang', 8298329775, 'amalkumar308@gmail.com', 'algo', 'Professor');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `for_who` varchar(20) NOT NULL,
  `notice` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`for_who`, `notice`) VALUES
('Students', 'examination not schedule yet');

-- --------------------------------------------------------

--
-- Table structure for table `oanswer`
--

CREATE TABLE IF NOT EXISTS `oanswer` (
  `user_id` varchar(20) NOT NULL,
  `exam_id` varchar(20) NOT NULL,
  `q_id` varchar(20) NOT NULL,
  `a` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `oanswer`
--

INSERT INTO `oanswer` (`user_id`, `exam_id`, `q_id`, `a`) VALUES
('2017CA55', 'q1', '', 'A'),
('', 'q1', '', 'A'),
('2017CA55', 'q1', '1', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `objective`
--

CREATE TABLE IF NOT EXISTS `objective` (
  `exam_id` varchar(20) NOT NULL,
  `q_id` varchar(20) NOT NULL,
  `q` varchar(2000) NOT NULL,
  `a` varchar(3) NOT NULL,
  `b` varchar(3) NOT NULL,
  `c` varchar(3) NOT NULL,
  `d` varchar(3) DEFAULT NULL,
  `e` text,
  `ans` varchar(3) NOT NULL,
  `m` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `objective`
--

INSERT INTO `objective` (`exam_id`, `q_id`, `q`, `a`, `b`, `c`, `d`, `e`, `ans`, `m`) VALUES
('q1', '1', 'asrfsedef', 'sdf', 'sdf', 'sdg', 'sdg', '', 'A', 1),
('q3', '1', 'iooertopierp9ti', 'sdf', 'asf', 'sdf', 'sdg', '', 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanswer`
--

CREATE TABLE IF NOT EXISTS `sanswer` (
  `user_id` varchar(20) NOT NULL,
  `exam_id` varchar(20) NOT NULL,
  `q_id` varchar(20) NOT NULL,
  `a` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `sanswer`
--

INSERT INTO `sanswer` (`user_id`, `exam_id`, `q_id`, `a`) VALUES
('2017CA55', 'q1', '', 'asdsadasd'),
('2017CA55', 'q1', '1', 'asdsadasd');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `reg_no` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` varchar(30) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `sem` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mob` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pointer` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`reg_no`, `password`, `department`, `branch`, `sem`, `name`, `mob`, `email`, `pointer`) VALUES
('2017CA55', '2017CA55', 'CSED', 'MCA', 'III', 'AMAL KUMAR CHOUBEY', 8298329775, 'amalkumar308@gmail.com', 9.27),
('2017CA58', '2017CA58', 'CSED', 'MCA', 'III', 'DEEPAK', 8298329775, 'amalkumar308@gmail.com', 8.65);

-- --------------------------------------------------------

--
-- Table structure for table `subjective`
--

CREATE TABLE IF NOT EXISTS `subjective` (
  `exam_id` varchar(20) NOT NULL,
  `q_id` varchar(20) NOT NULL,
  `q` varchar(2000) NOT NULL,
  `m` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `subjective`
--

INSERT INTO `subjective` (`exam_id`, `q_id`, `q`, `m`) VALUES
('q1', '1', 'safsdf', 1),
('q1', '2', 'sdrf', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`reg_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
