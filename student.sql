-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 03:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `sub_date` date DEFAULT current_timestamp(),
  `marks` int(11) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `title`, `student_id`, `teacher_id`, `file_name`, `sub_date`, `marks`, `review`) VALUES
(48, 'Module2&3', 123456789, 12345, 'APURVA KUMAR ASSIGNMENT 2-3.pdf', '2020-11-17', 10, 'Nice Work'),
(49, 'Module2&3', 111222333, 12345, 'Ankur Tikoo Assignment -2,3.pdf', '2020-11-17', 8, 'Ok'),
(50, 'Module1', 111222333, 12345, 'Ankur Tikoo Assignment -1.pdf', '2020-11-17', 9, 'Nice'),
(51, 'Module2&3', 123456789, 12345, 'Resume.pdf', '2020-11-19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `post_title` varchar(30) NOT NULL,
  `poster_designation` varchar(20) NOT NULL,
  `post_content` text DEFAULT NULL,
  `Likes` int(11) DEFAULT 0,
  `assign_flag` tinyint(1) NOT NULL DEFAULT 0,
  `due_date` date DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `poster_id`, `post_title`, `poster_designation`, `post_content`, `Likes`, `assign_flag`, `due_date`, `file_name`) VALUES
(139, 12345, 'Module1', 'teacher', 'This is the assignment of Module-1   ', 0, 1, '2020-10-20', 'Assignment 1 - Module 1.pdf'),
(140, 12345, 'Module2&3', 'teacher', 'This is assignment on Module 2 and 3.       ', 0, 1, '2020-11-10', 'Assignment 2&3.pdf'),
(141, 12345, 'Submission of DC Assignments', 'teacher', 'Please submit both the assignment of DC before or on the due date.', 0, 0, NULL, NULL),
(142, 123456789, 'Regarding extension of due dat', 'student', 'Sir can you please extend the due date of both the assignments.', 0, 0, NULL, NULL),
(143, 12345, 'asdd', 'teacher', ' fdfsg      ', 0, 1, '2020-10-01', 'Syllabus 1-2 sem.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `about_you` text DEFAULT NULL,
  `profile_pic` varchar(50) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `password`, `first_name`, `last_name`, `about_you`, `profile_pic`) VALUES
('111222333', 'asdfgh', 'Ankur', 'Tikoo', 'Student  ', 'default.png'),
('123456789', 'gwalior', 'Apurva ', 'Kumar', 'Student  ', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `about_you` text DEFAULT NULL,
  `profile_pic` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `password`, `first_name`, `last_name`, `about_you`, `profile_pic`) VALUES
(12345, 'qwerty', 'Sanju', 'Samson', 'Teacher', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster_id` (`poster_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
