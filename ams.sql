-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 04:20 PM
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
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `role` varchar(50) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `admin_image` varchar(255) DEFAULT '2.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `password`, `admin_email`, `phone_number`, `role`, `gender`, `admin_image`) VALUES
(1, 'Saraj', 'Dhakal', '$2y$10$vFQKZyzDJimlH1SqXxQNvuZz8mlRJIBCT2Td71ZpRPvuEXSiZpvyq', 'sarajdhakal@gmail.com', '9866115177', 'Super Admin', 'Male', 'testimonials-1.jpg'),
(2, 'aaaaa', 'aaaaaaa', '$2y$10$phCI8XP/ivl.olVdj9DCL.wvyjwqTG1vEZLLPWdwuxoUwJXITHK62', 'dhakalsaraj@gmail.com', '9866115177', 'Admin', 'Others', '2.png'),
(3, 'Samar', 'Bhattarai', '$2y$10$hMCaXy69SX5laIFftItp7.danP4w6NvctpbPOpK69nJtpge3o5d0q', 'samarbhattarai@gmail.com', '9827199966', 'Admin', 'Male', 'testimonials-4.jpg'),
(5, 'aaaaa', 'aaaaa', '$2y$10$LFa9UjZaJ/7BKf/UmDiiNOmDgUok8LFbnk1lO0IVJFZdV8KjQb.Ve', 'admin@gmail.com', '26665656565', 'Admin', 'Male', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `alumni_email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `post` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `project1_name` varchar(255) DEFAULT NULL,
  `project1_description` text DEFAULT NULL,
  `project2_name` varchar(255) NOT NULL,
  `project2_description` text NOT NULL,
  `alumni_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `first_name`, `middle_name`, `last_name`, `gender`, `alumni_email`, `phone`, `batch`, `university`, `college`, `faculty`, `address`, `role`, `post`, `company`, `project1_name`, `project1_description`, `project2_name`, `project2_description`, `alumni_image`) VALUES
(1, 'Abishek', '', 'Neupane', 'Male', 'neupaneabhisek@gmail.com', '', 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'Bharatpur', 'Alumni', '', '', '', 'Project Description', '', '', '2.png'),
(2, 'Anamol', NULL, 'Bhujel', 'Male', 'bhujel55@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(3, 'Avinash', 'Kumar', 'Mahato', 'Male', 'avinash23@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(4, 'Biggreat', NULL, 'Lama', 'Male', 'thebiglama@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(5, 'Dipak', 'Chand', 'Chaudhary', 'Male', 'chanddipak23@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(6, 'Aayush', NULL, 'Kafle', 'Male', 'aayushkafle1998@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(7, 'Ajay', NULL, 'Tharu', 'Male', 'tharuajay10@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(8, 'Anil', NULL, 'Ranabhat', 'Male', 'ranabhatanil@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(9, 'Avishek', NULL, 'Dhakal', 'Male', 'dhakalavi45@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(10, 'Bibek', NULL, 'Shrestha', 'Male', 'bibek777@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(11, 'Aashima', NULL, 'Pokahrel', 'Female', 'ashu23@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(12, 'Aashish', NULL, 'Kandel', 'Male', 'kandelaashish@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(13, 'Aashish', NULL, 'Rimal', 'Male', 'rimalash@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(14, 'Abhinash', NULL, 'Kayastha', 'Male', 'leoabhi10@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(15, 'Ajay', NULL, 'Yogi', 'Male', 'yogiraj@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(16, 'Hari', NULL, 'Thapa', 'Male', 'hari.thapa@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(17, 'Hem', 'Kumar', 'Sah', 'Male', 'hem.sah@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(18, 'Hira Lal', 'Kumar', 'Mandal', 'Male', 'hira.mandal@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(19, 'Kritigya', NULL, 'Sapkota', 'Female', 'kritigya.sapkota@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(20, 'Madhu', NULL, 'Adhikari', 'Female', 'madhu.adhikari@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(21, 'Pashupati', NULL, 'Kunwar', 'Male', 'pashupati.kunwar@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Electrical and Electronics', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(22, 'Bikram', 'Babu', 'Subedi', 'Male', 'bikram.subedi@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(23, 'Birat', NULL, 'Khadkha', 'Male', 'birat.khadkha@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(24, 'Bishal', NULL, 'Subedi', 'Male', 'bishal.subedi@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(25, 'Diwas', NULL, 'Shrestha', 'Male', 'diwas.shrestha@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', 'diwas_shrestha.jpg'),
(26, 'Jyoti', NULL, 'Gautam', 'Female', 'jyoti.gautam@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(27, 'Kaushila', NULL, 'Pokahrel', 'Female', 'kaushila.pokahrel@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(28, 'Keshav', NULL, 'Ghalan', 'Male', 'keshav.ghalan@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(29, 'Aakash', 'Kumar', 'Dev', 'Male', 'aakash.dev@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(30, 'Alish', NULL, 'Dahal', 'Male', 'alish.dahal@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(31, 'Amit', NULL, 'Upadhayaya', 'Male', 'amit.upadhayaya@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(32, 'Amul', 'Jung', 'Ghimire', 'Male', 'amul.ghimire@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(33, 'Savin', NULL, 'Thakur', 'Male', 'savin.thakur@gmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(34, 'Anisha', NULL, 'Adhikari', 'Female', 'anisha.adhikari@hotmail.com', NULL, 2074, 'Pokhara', 'United Technical College', 'BE Civil', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(35, 'Sangam', NULL, 'Acharya', 'Female', 'sangam.acharya@gmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(36, 'Shrijana', NULL, 'Wagle', 'Female', 'shrijana.wagle@hotmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(37, 'Rupesh', NULL, 'Aryal', 'Male', 'rupesh.aryal@gmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', 'rupesh.jpg'),
(38, 'Ganesh', NULL, 'Baral', 'Male', 'ganesh.baral@hotmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(39, 'Emez', NULL, 'Acharya', 'Male', 'emez.acharya@gmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png'),
(40, 'Amit', NULL, 'Upadhayaya', 'Male', 'amit.upadhayaya2@hotmail.com', NULL, 2075, 'Pokhara', 'United Technical College', 'BE Computer', 'XXX', 'Alumni', NULL, NULL, NULL, NULL, '', '', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `organizer_email` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `date_and_time` date NOT NULL,
  `description` text NOT NULL,
  `join_event` text NOT NULL,
  `banner_image` varchar(255) NOT NULL DEFAULT '2.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_title`, `organizer`, `organizer_email`, `type`, `venue`, `date_and_time`, `description`, `join_event`, `banner_image`) VALUES
(1, 'Hackathon', 'United Tech Club', 'unitedtechclub@gmail.com', 'Workshop', 'United Technical College', '2023-09-29', 'A hackathon, also known as a codefest, is a social coding event that brings computer programmers and other interested people together to improve upon or build a new software program. The word hackathon is a portmanteau of the words hacker, which means clever programmer, and marathon, an event marked by endurance.', 'JOin in united techinal college.', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `alumni_name` varchar(255) NOT NULL,
  `alumni_email` varchar(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `vacant_seats` int(100) NOT NULL,
  `due_date` date NOT NULL,
  `description` text NOT NULL,
  `qualification` text NOT NULL,
  `banner_image` varchar(255) DEFAULT '2.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `organization`, `alumni_name`, `alumni_email`, `type`, `vacant_seats`, `due_date`, `description`, `qualification`, `banner_image`) VALUES
(2, 'Software Engineer', 'ABC Company', 'Saraj Dhakal', 'sarajdhakal@gmail.com', 'Full-time', 5, '2023-09-22', 'Description of the job', 'Qualification for job', '2.png'),
(3, 'Civil Engineer', 'ABC Company', 'Soviyat Lamsal', 'soviyat@gmail.com', 'Full-time', 6, '2023-09-30', 'Description of job', 'Qualification for job', '2.png');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonials_id` int(11) NOT NULL,
  `testimonials_name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `testimonials_image` varchar(255) DEFAULT '2.png',
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `testimonials_name`, `post`, `testimonials_image`, `description`) VALUES
(1, 'Saraj Dhakal', 'CEO', 'testimonials-1.jpg', 'The AMS made organizing our alumni reunion a breeze! The event management features allowed us to effortlessly coordinate logistics and reach out to all attendees, resulting in a successful and unforgettable gathering.'),
(2, 'Soviyat Lamsal', 'Founder', 'testimonials-2.jpg', 'Thanks to the Alumni Management System, I was able to reconnect with old classmates and expand my professional network, \r\nleading to exciting job opportunities I wouldn\'t have found elsewhere.\r\n                    '),
(3, 'Nishani Kumari Rai', 'Founderdd', 'testimonials-3.jpg', 'I highly recommend the Alumni Management System to fellow graduates.Through the platform, I received valuable mentorship and career guidance, which played a crucial role in my professional development and succes.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `enrollment_year` year(4) DEFAULT NULL,
  `passout_year` year(4) DEFAULT NULL,
  `adddress` varchar(250) DEFAULT NULL,
  `college` varchar(250) DEFAULT NULL,
  `university` varchar(250) DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `work` varchar(250) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT '2.png',
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `scmedia1` varchar(500) DEFAULT NULL,
  `scmedia2` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `phone_number`, `password`, `role`, `gender`, `enrollment_year`, `passout_year`, `adddress`, `college`, `university`, `faculty`, `work`, `user_image`, `date_created`, `scmedia1`, `scmedia2`) VALUES
(4, 'saraj', 'dhakal', 'sarajdhakal@gmail.com', '9866115177', '$2y$10$eABBrjuxUIoCdSvsWnKzf.SKSPNBMryuyk9XPj.b3M3aAS.AXfIkK', 'Alumni', 'Male', '1999', '2023', 'Bharatpur-15,Chitwan', 'Utech', 'Pokhara', '', '', 'testimonials-1.jpg', '2023-07-15', '', ''),
(5, 'soviyat', 'lamsal', 'soviyat@gmail.com', '9866115177', '$2y$10$nGcRplS8BhRd/aAHChehre7Wnhg85MERBdaIZzM5G0e72O3uLucqW', 'Student', 'Male', '2001', '0000', '', 'Utech', '', '', '', 'testimonials-2.jpg', '2023-07-15', '', ''),
(17, 'bikal', 'baral', 'bikal@g.com', '9845529834', '$2y$10$F8CTYkxe2479pJW9KkvU4.NJS.Zc00r54qjUgvm51j8cHAxCQjFsG', 'Alumni', 'Male', '2012', '2016', '', '', '', '', '', 'testimonials-5.jpg', '2023-09-20', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`admin_email`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`),
  ADD UNIQUE KEY `alumni_email` (`alumni_email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fk_jobs_users` (`alumni_email`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonials_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobs_users` FOREIGN KEY (`alumni_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
