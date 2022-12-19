-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 10:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `implementation_date` date NOT NULL,
  `status` enum('current','completed','suspended') NOT NULL DEFAULT 'current',
  `comments` mediumtext NOT NULL,
  `suggestions` mediumtext NOT NULL,
  `rating` enum('low','medium','high','excellent') NOT NULL DEFAULT 'low'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `institution`, `implementation_date`, `status`, `comments`, `suggestions`, `rating`) VALUES
(2, 'Walk', 'Karura', '2022-08-30', 'completed', '', '', 'low'),
(3, 'Tree Planting', 'Matumbato', '2022-07-31', 'suspended', '', '', 'low'),
(4, 'Prize Giving', 'Pangani Girls High School', '2022-08-13', 'current', '', '', 'low'),
(6, 'Prayer Day', 'Moi Kabarak High School', '2022-08-13', 'current', '', '', 'low'),
(9, 'School project', 'TUK', '2022-11-18', 'current', '', '', 'low');

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `status` enum('ongoing','completed','current','suspended') NOT NULL DEFAULT 'current',
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_task`
--

INSERT INTO `project_task` (`id`, `project_id`, `name`, `start_date`, `end_date`, `assigned`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 2, 'Presentation A', '2022-07-01', '2022-07-10', 0, 'completed', 1, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(4, 2, 'Backend', '2022-07-11', '2022-07-31', 0, 'completed', 1, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(13, 2, 'Check location', '2022-07-13', '2022-07-14', 2, 'suspended', 2, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(14, 2, 'Test', '2022-06-01', '2022-06-30', 1, 'suspended', 2, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(15, 9, 'Research', '2022-08-24', '2022-09-22', 5, 'current', 1, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(16, 9, 'Front End', '2022-09-20', '2022-10-11', 0, 'current', 2, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(17, 9, 'Back end', '2022-10-10', '2022-10-29', 0, 'current', 3, '2022-12-19 13:27:13', '2022-12-19 16:27:22'),
(18, 9, 'Testing', '2022-09-29', '2022-11-08', 0, 'current', 1, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(20, 9, 'Presentation B', '2022-11-30', '2022-11-30', 0, 'current', 3, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(21, 9, 'doneee', '2022-08-26', '2022-08-26', 0, 'ongoing', 3, '2022-12-19 13:27:13', '2022-12-19 13:27:13'),
(22, NULL, 'Project C', '2022-12-12', '2022-12-24', NULL, 'current', 1, '2022-12-19 16:32:09', '2022-12-19 16:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'brian', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 13:45:24', '2022-12-19 13:45:24'),
(2, 'amanda@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 13:45:24', '2022-12-19 13:45:24'),
(5, 'kaylie@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 13:45:24', '2022-12-19 13:45:24'),
(8, 'test', '81dc9bdb52d04dc20036dbd8313ed055', '2022-12-19 17:01:13', '2022-12-19 17:01:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_task`
--
ALTER TABLE `project_task`
  ADD CONSTRAINT `project_task_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
