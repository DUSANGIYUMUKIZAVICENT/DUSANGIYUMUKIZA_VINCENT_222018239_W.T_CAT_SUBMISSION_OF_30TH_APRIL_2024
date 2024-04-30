-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 05:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enter_classes_tournament_mgt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `mt_id` int(11) NOT NULL,
  `playground` int(11) NOT NULL,
  `date` date NOT NULL,
  `m_date` datetime NOT NULL,
  `ref_id` int(11) NOT NULL,
  `t1_id` int(11) NOT NULL,
  `t2_id` int(11) NOT NULL,
  `action` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`mt_id`, `playground`, `date`, `m_date`, `ref_id`, `t1_id`, `t2_id`, `action`) VALUES
(1, 9, '2024-03-10', '2024-04-04 12:04:00', 1, 1, 2, 'ON'),
(2, 2, '2015-02-02', '2024-03-25 00:00:00', 1, 1, 2, 'ON'),
(10, 10, '2024-04-22', '2024-04-26 00:00:00', 1, 2, 1, 'ON'),
(11, 1, '2024-04-22', '2024-04-25 21:30:00', 1, 2, 1, 'OFF');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `p_id` int(11) NOT NULL,
  `player` text NOT NULL,
  `p_birthdate` date NOT NULL,
  `position` int(11) NOT NULL,
  `p_identification` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`p_id`, `player`, `p_birthdate`, `position`, `p_identification`) VALUES
(1, 'MESSI', '2024-04-11', 0, '32532tw'),
(2, '', '0000-00-00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `playground`
--

CREATE TABLE `playground` (
  `pg_id` int(11) NOT NULL,
  `pg_name` text NOT NULL,
  `pg_location` text NOT NULL,
  `pg_owner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playground`
--

INSERT INTO `playground` (`pg_id`, `pg_name`, `pg_location`, `pg_owner`) VALUES
(1, 'EMIRATES STADIUM', 'ENGLAND', 'REAL MADRID'),
(2, 'EMIRATES STADIUM', 'ENGLAND', 'REAL MADRID'),
(3, 'EMIRATES STADIUM', 'ENGLAND', 'REAL MADRID'),
(4, 'EMIRATES STADIUM', 'ENGLAND', 'REAL MADRID'),
(5, 'EMIRATES STADIUM', 'ENGLAND', 'REAL MADRID'),
(6, 'PERES STADIUM', 'KIGALI', 'KIGALI CITY'),
(7, 'PERES STADIUM', 'KIGALI', 'KIGALI CITY'),
(8, 'AMAHORO STADIUM', 'KIGALI', 'KIGALI CITY'),
(9, 'WQE', '42342', '4234'),
(10, 'ERWR', 'ERW', 'ERWER'),
(11, 'ERWR', 'ERW', 'ERWER'),
(12, 'ERWR', 'ERW', 'ERWER'),
(13, 'REAL MADRID ', 'LORENZO', 'KIGALI CITY'),
(14, 'REAL MADRID ', 'LORENZO', 'KIGALI CITY'),
(15, 'REAL MADRID ', 'LORENZO', 'KIGALI CITY'),
(16, 'REAL MADRID ', 'LORENZO', 'KIGALI CITY'),
(17, 'REAL MADRID ', 'LORENZO', 'KIGALI CITY'),
(18, 'wedqw', 'dqwew', 'wwqe');

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `ref_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`ref_id`, `f_name`, `l_name`, `age`, `sex`, `telephone`) VALUES
(1, 'HAKORIMANA', 'Gilbert', '2024-04-03', 'Male', '078287456345'),
(2, 'zawr', 'hfgd', '2024-04-01', 'Male', '0782824234512');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` int(11) NOT NULL,
  `t_name` text NOT NULL,
  `t_coach` text NOT NULL,
  `t_started` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_name`, `t_coach`, `t_started`) VALUES
(1, 'LION SPORTS ', 'Gates', '2024-04-19'),
(2, 'REAL MADRID ', 'hazard', '2019-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `names` text NOT NULL,
  `email` text NOT NULL,
  `phn` text NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_password` varchar(465) NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `names`, `email`, `phn`, `u_name`, `u_password`, `user_type`) VALUES
(1, 'HAKORIMANA Gilbert', 'gilbertjeeboy47@gmail.com', '0782824186', '1d0258c2440a8d19e716292b231e3190', '202cb962ac59075b964b07152d234b70', 'MNG'),
(2, 'MUNEZERO Thierry', 'munezeo@gmail.com', '0783232', '6adb3f55e2b0850aa5bc7d01d807e506', '81dc9bdb52d04dc20036dbd8313ed055', 'OFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `ref_id` (`ref_id`),
  ADD KEY `playground` (`playground`),
  ADD KEY `t1_id` (`t1_id`),
  ADD KEY `t2_id` (`t2_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `playground`
--
ALTER TABLE `playground`
  ADD PRIMARY KEY (`pg_id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `playground`
--
ALTER TABLE `playground`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `ref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`ref_id`) REFERENCES `referees` (`ref_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_4` FOREIGN KEY (`playground`) REFERENCES `playground` (`pg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_5` FOREIGN KEY (`t1_id`) REFERENCES `team` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matches_ibfk_6` FOREIGN KEY (`t2_id`) REFERENCES `team` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `matches` (`t1_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
