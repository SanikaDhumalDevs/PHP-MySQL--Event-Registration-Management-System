-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 07:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `email`, `message`, `submitted_at`) VALUES
(9, 'anish@gmail.com', 'problem regarding registration ', '2025-05-10 10:37:39'),
(10, 'omkar@gmail.com', 'query regarding date', '2025-05-10 10:38:07'),
(11, 'anish@gmail.com', 'event regarding problem', '2025-05-10 10:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `event` varchar(50) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text,
  `submitted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `event`, `rating`, `comments`, `submitted_at`) VALUES
(10, 'omkar salunkhe', 'omkar@gmail.com', 'Hackathon', 3, 'good', '2025-05-10 10:36:01'),
(11, 'Anish jadhav', 'anish@gmail.com', 'Quiz', 5, 'very interesting', '2025-05-10 10:36:37'),
(12, 'soham gaikwad', 'xyz@gmail.com', 'Coding', 4, 'very helpful', '2025-05-10 10:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `event` varchar(100) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `submitted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `team_size` int(11) DEFAULT '1',
  `member_2_name` varchar(100) DEFAULT NULL,
  `member_2_email` varchar(100) DEFAULT NULL,
  `member_3_name` varchar(100) DEFAULT NULL,
  `member_3_email` varchar(100) DEFAULT NULL,
  `member_4_name` varchar(100) DEFAULT NULL,
  `member_4_email` varchar(100) DEFAULT NULL,
  `team_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `event`, `role`, `submitted_at`, `location`, `amount`, `team_size`, `member_2_name`, `member_2_email`, `member_3_name`, `member_3_email`, `member_4_name`, `member_4_email`, `team_name`) VALUES
(52, 'Anish Jadhav', 'anish@gmail.com', '1234', '1234567890', 'treasure hunt', 'user', '2025-05-11 12:45:35', 'nagthane', 300, 3, 'suraj', 'suraj@gmail.com', 'omkar', 'omkar@gmail.com', '', '', 'Spark'),
(53, 'akshar', 'akshar@gmail.com', '1234', '9834567321', 'quiz', 'user', '2025-05-11 12:47:12', 'kodoli, satara', 100, 2, 'dhiraj', 'dhiraj@gmail.com', '', '', '', '', 'Ninjas'),
(54, 'Akshay', 'akshay@gmail.com', '$2y$10$C/z0oiBn8BEoHkGtFRso..eWl87m34S8VO7R2yTO6H2kqd8sdEE8a', '9823456721', 'Hackathon', 'user', '2025-05-11 15:25:15', 'kumthe', 500, 2, '0', 'neeraj@gmail.com', '', '', '', '', 'Coders'),
(55, 'vijay', 'vijay@gmail.com', '1234', '9845673311', 'hackathon', 'user', '2025-05-11 15:32:39', 'pune', 500, 4, 'sachin', 'sachin@gmail.com', 'shubham', 'shubham@gmail.com', 'swayam', 'swayam@gmail.com', 'Warriors');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
