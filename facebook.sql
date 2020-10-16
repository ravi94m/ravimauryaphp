-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 16, 2020 at 05:49 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `tFriends`
--

CREATE TABLE `tFriends` (
  `User_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `friend_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tFriends`
--

INSERT INTO `tFriends` (`User_id`, `friend_id`, `friend_name`) VALUES
(1, 1, 'ramesh'),
(2, 2, 'dinesh'),
(1, 3, 'Ankit');

-- --------------------------------------------------------

--
-- Table structure for table `tUser`
--

CREATE TABLE `tUser` (
  `User_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email_id` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` bigint(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tUser`
--

INSERT INTO `tUser` (`User_id`, `Name`, `Email_id`, `Password`, `Address`, `Phone`) VALUES
(1, 'Ravi', 'ravimaurya94m@gmail.com', 'Ravi@88670', 'vcb dfh  fggudrt hffh', 8967574578),
(2, 'Vineet', 'vineet@123gmail.com', 'Ravi@88670', 'kunda', 8967574578);

-- --------------------------------------------------------

--
-- Table structure for table `tWall`
--

CREATE TABLE `tWall` (
  `User_id` int(11) NOT NULL,
  `posting_date` datetime NOT NULL DEFAULT current_timestamp(),
  `post` varchar(200) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tWall`
--

INSERT INTO `tWall` (`User_id`, `posting_date`, `post`, `post_id`) VALUES
(1, '2020-10-07 12:41:33', 'Today, I am very busy.', 1),
(2, '2020-10-07 12:48:46', 'Hi, This is Ravi.', 2),
(2, '2020-10-07 16:53:01', 'hbjb bhugvftft hbhb huvug', 3),
(1, '2020-10-07 18:07:25', 'Hi, I am from Noida', 4),
(1, '2020-10-07 18:09:18', 'Hi, I am from Noida', 5),
(1, '2020-10-14 16:31:32', 'post', 9),
(1, '2020-10-14 16:26:20', 'Hi EveryOne', 12),
(1, '2020-10-14 16:53:59', 'Lljkhj vghfv gf', 15),
(1, '2020-10-14 16:59:53', 'xfhv cvxbnhxf', 18),
(1, '2020-10-14 16:32:46', '', 19),
(1, '2020-10-14 18:12:37', '', 21),
(1, '2020-10-14 16:28:57', '4', 42),
(1, '2020-10-14 16:37:41', 'Hello', 89),
(1, '2020-10-14 16:30:42', 'Hi', 92),
(1, '2020-10-14 16:33:59', '', 97),
(1, '2020-10-14 16:35:08', 'hi', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tFriends`
--
ALTER TABLE `tFriends`
  ADD PRIMARY KEY (`friend_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `tUser`
--
ALTER TABLE `tUser`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `tWall`
--
ALTER TABLE `tWall`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tFriends`
--
ALTER TABLE `tFriends`
  ADD CONSTRAINT `tFriends_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tFriends` (`friend_id`);

--
-- Constraints for table `tWall`
--
ALTER TABLE `tWall`
  ADD CONSTRAINT `tWall_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tWall` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
