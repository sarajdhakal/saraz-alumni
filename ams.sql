-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 05:59 PM
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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `email_organizer` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `date_and_time` datetime NOT NULL,
  `description` text NOT NULL,
  `banner_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `due_date` date NOT NULL,
  `description` text NOT NULL,
  `banner_image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `organization`, `alumni_name`, `alumni_email`, `type`, `due_date`, `description`, `banner_image`) VALUES
(2, 'Software Engineer', 'ABC Company', 'John Doe', 'sarajdhakal@gmail.com', 'Full-time', '2023-07-31', 'Description of the job', NULL),
(3, 'Civil Engineer', 'ABC Company', 'John Doe', 'soviyat@gmail.com', 'Full-time', '2023-07-31', 'Description of the job', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonials_id` int(11) NOT NULL,
  `testimonials_name` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `testimonials_image` blob DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonials_id`, `testimonials_name`, `post`, `testimonials_image`, `description`) VALUES
(1, 'Saraj Dhakal', 'CEO', NULL, 'The AMS made organizing our alumni reunion a breeze! The event management features allowed us to effortlessly coordinate logistics and reach out to all attendees, resulting in a successful and unforgettable gathering.'),
(2, 'Soviyat Lamsal', 'Founder', NULL, 'Thanks to the Alumni Management System, I was able to reconnect with old classmates and expand my professional network,leading to exciting job opportunities I would not have found elsewhere.'),
(3, 'Nisha Rai', 'Founder', NULL, ' I highly recommend the Alumni Management System to fellow graduates.Through the platform, I received valuable mentorship and career guidance, which played a crucial role in my professional development and succes.');

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
  `enrollment_year` year(4) NOT NULL,
  `passout_year` year(4) DEFAULT NULL,
  `adddress` varchar(250) DEFAULT NULL,
  `college` varchar(250) DEFAULT NULL,
  `university` varchar(250) DEFAULT NULL,
  `faculty` varchar(250) DEFAULT NULL,
  `work` varchar(250) DEFAULT NULL,
  `user_image` blob DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `scmedia1` varchar(500) DEFAULT NULL,
  `scmedia2` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `phone_number`, `password`, `role`, `gender`, `enrollment_year`, `passout_year`, `adddress`, `college`, `university`, `faculty`, `work`, `user_image`, `date_created`, `scmedia1`, `scmedia2`) VALUES
(4, 'saraj', 'dhakal', 'sarajdhakal@gmail.com', '9866115177', '$2y$10$eABBrjuxUIoCdSvsWnKzf.SKSPNBMryuyk9XPj.b3M3aAS.AXfIkK', 'Student', 'Male', '1999', '0000', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15', NULL, NULL),
(5, 'soviyat', 'lamsal', 'soviyat@gmail.com', '9866115177', '$2y$10$nGcRplS8BhRd/aAHChehre7Wnhg85MERBdaIZzM5G0e72O3uLucqW', 'Student', 'Male', '2000', '0000', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_events_users` (`email_organizer`);

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
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events_users` FOREIGN KEY (`email_organizer`) REFERENCES `users` (`email`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobs_users` FOREIGN KEY (`alumni_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
