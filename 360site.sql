-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 12:18 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `360site`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(11) NOT NULL,
  `threadId` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `threadId`, `date`, `rating`, `content`, `userId`) VALUES
(39, 14, '2021-04-13 22:07:04', NULL, ' Tell me!', 20),
(40, 15, '2021-04-13 22:07:50', NULL, 'Im thinking volleyball...', 18),
(41, 14, '2021-04-13 22:08:11', NULL, 'The snake, they are awesome', 18),
(42, 15, '2021-04-13 22:08:36', NULL, 'Baseball all the way baby!', 17),
(43, 14, '2021-04-13 22:08:51', NULL, 'Kangaroos are op!', 17),
(44, 16, '2021-04-13 22:09:49', NULL, ' Who has more info?', 17),
(45, 16, '2021-04-13 22:10:12', NULL, 'Im waiting on more info too', 19),
(46, 15, '2021-04-13 22:10:44', NULL, 'Soccer, I pass the ball to you, you pass back. Nice.', 19),
(47, 14, '2021-04-13 22:11:08', NULL, 'IDK but chickens suck!', 19),
(48, 17, '2021-04-13 22:11:36', NULL, ' Just getting into painting...', 19),
(49, 17, '2021-04-13 22:12:38', NULL, 'Just experiment and have fun at the beginning?', 21),
(50, 16, '2021-04-13 22:13:08', NULL, 'Blockades are setup right now', 21),
(51, 15, '2021-04-13 22:13:23', NULL, 'curling, so meditative\r\n', 21),
(52, 14, '2021-04-13 22:13:41', NULL, 'MONGOOSE, i have 9 of them.', 21),
(53, 18, '2021-04-13 22:14:22', NULL, 'Looking to adventure this summer. ', 21),
(54, 18, '2021-04-13 22:14:50', NULL, 'Christy falls in the Okanagan is great.', 19),
(55, 18, '2021-04-13 22:15:18', NULL, 'Check out ryo falls near vancouver!', 17),
(56, 18, '2021-04-13 22:15:44', NULL, 'Skaha fall in penticton, great picnic spot', 20);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `threadId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `rating` int(11) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `stickied` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`threadId`, `title`, `creationDate`, `rating`, `category`, `stickied`) VALUES
(14, 'People of Rabbit, what\'s your favorite animal?', '2021-04-13 22:07:04', NULL, 'Nature', 0),
(15, 'What is the best sport?', '2021-04-13 22:07:50', NULL, 'Sports', 0),
(16, 'Scandal in the whitehouse!', '2021-04-13 22:09:49', NULL, 'News', 0),
(17, 'Advice for new painters?', '2021-04-13 22:11:36', NULL, 'Art', 0),
(18, 'Best waterfalls in BC?', '2021-04-13 22:14:22', NULL, 'Nature', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(15) NOT NULL,
  `displayName` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` blob NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `joinDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `displayName`, `email`, `avatar`, `password`, `role`, `joinDate`) VALUES
(17, 'josh', 'josh@gmail.com', '', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, '2021-04-13'),
(18, 'jack', 'jack@gmail.com', '', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, '2021-04-13'),
(19, 'sally', 'sally@gmail.com', '', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, '2021-04-13'),
(20, 'amy', 'amy@gmail.com', '', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, '2021-04-13'),
(21, 'bob', 'bob@gmail.com', '', 'ed2b1f468c5f915f3f1cf75d7068baae', 0, '2021-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `threadId` (`threadId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`threadId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `threadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`threadId`) REFERENCES `threads` (`threadId`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
