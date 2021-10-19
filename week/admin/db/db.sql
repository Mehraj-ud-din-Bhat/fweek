-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2021 at 07:14 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aroma`
--

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `id` int(11) NOT NULL,
  `scientistId` int(11) NOT NULL,
  `quaterId` int(11) NOT NULL,
  `filename` varchar(20) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pptname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`id`, `scientistId`, `quaterId`, `filename`, `description`, `created_at`, `updated_at`, `pptname`) VALUES
(1, 2, 2, 'file_2.jpeg', 'Hshhswyuswdbjhws', '2021-08-02 11:43:20', '2021-08-02 11:43:20', ''),
(5, 3, 3, '', 'jsjjs', '2021-08-02 11:45:04', '2021-08-02 11:45:04', ''),
(7, 1, 1, '', 'hhh', '2021-08-02 11:46:52', '2021-08-02 11:46:52', ''),
(8, 5, 2, '', 'hhh', '2021-08-02 11:47:17', '2021-08-02 11:47:17', ''),
(11, 2, 1, '', 'jjsjs', '2021-08-02 11:51:53', '2021-08-02 11:51:53', ''),
(12, 2, 4, 'file_2_4.pdf', 'hsjsjs', '2021-08-03 04:22:07', '2021-08-03 04:22:07', 'ppt_12_4.pptx'),
(13, 4, 1, 'file_4_1.jpeg', 'uwuudjwjwjhd', '2021-08-03 04:37:04', '2021-08-03 04:37:04', 'ppt_4_1.pptx');

-- --------------------------------------------------------

--
-- Table structure for table `quater`
--

CREATE TABLE `quater` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quater`
--

INSERT INTO `quater` (`id`, `name`) VALUES
(1, 'December-March'),
(2, 'April-June'),
(3, 'July-September'),
(4, 'October - December');

-- --------------------------------------------------------

--
-- Table structure for table `scientist`
--

CREATE TABLE `scientist` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scientist`
--

INSERT INTO `scientist` (`id`, `name`) VALUES
(1, 'Dr. D. Srinivasa Reddy'),
(2, 'Er. Abdul Rahim'),
(3, 'Er. Ranjesh Anand'),
(4, 'Dr. Vikas babu'),
(5, 'Er. Shaghaf Ansari'),
(6, 'Dr. Asha chaubey'),
(7, 'Dr. Dhiraj vyas'),
(8, 'Dr. Deepika singh'),
(9, 'Dr GD singh'),
(10, 'Dr. sumit gandhi'),
(11, 'Dr. shahid rasool'),
(12, 'Dr. meenu katoch'),
(13, 'Dr. Qazi parvaiz'),
(14, 'Dr. Nazia Abass'),
(15, 'Dr. Nazia abass'),
(16, 'Dr Shupla gupta'),
(17, 'Dr. kota srinawas'),
(18, 'Dr.sabha jeet'),
(19, 'Dr js Momo H anal'),
(20, 'Dr. Nasheeman Ashraf'),
(21, 'Dr. PL sangwan'),
(22, 'Dr. PN gupta'),
(23, 'Dr. padma Lay'),
(24, 'Dr. Prashant mishra'),
(25, 'Dr. parsoon kumar'),
(26, 'Dr. Rajendra Bhanwaria'),
(27, 'Dr. B Yogesh pandharinath'),
(28, 'Dr. Sheikh Tasaduq Abdullah'),
(29, 'Dr. Anil Ktare'),
(30, 'Dr. Firdous Ah Mir'),
(31, 'Dr. Syed khalid Yousuf'),
(32, 'VP Rahul');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Admin@gmail.com', '12346'),
(2, 'Admin_2', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scientistId` (`scientistId`,`quaterId`);

--
-- Indexes for table `quater`
--
ALTER TABLE `quater`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scientist`
--
ALTER TABLE `scientist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quater`
--
ALTER TABLE `quater`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scientist`
--
ALTER TABLE `scientist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
