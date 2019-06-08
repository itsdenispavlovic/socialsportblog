-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 06:47 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialsportblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `REMOVED` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `postid`, `content`, `date`, `REMOVED`) VALUES
(1, 2, 2, 'iuahsdisahdisahdiadhsaidau', '2018-07-07 03:02:12', 0),
(2, 2, 3, 'teest', '2018-07-07 03:11:14', 0),
(3, 2, 2, 'teest', '2018-07-07 03:11:14', 0),
(4, 2, 1, 'teest', '2018-07-07 03:11:14', 0),
(5, 2, 3, 'test2', '2018-07-07 03:12:12', 0),
(6, 2, 2, 'test2', '2018-07-07 03:12:12', 0),
(7, 2, 1, 'test2', '2018-07-07 03:12:12', 0),
(8, 2, 1, 'asdaodjoidjdaoidjdoasdji', '2018-07-07 14:53:26', 0),
(9, 2, 1, 'asdaodjoidjdaoidjdoasdji', '2018-07-07 14:53:31', 0),
(10, 2, 1, 'asdaodjoidjdaoidjdoasdji', '2018-07-07 14:53:33', 0),
(11, 2, 3, 'test', '2018-07-07 14:59:15', 0),
(12, 2, 3, 'test', '2018-07-07 15:15:52', 0),
(13, 2, 3, 'test2', '2018-07-07 15:39:15', 0),
(14, 2, 1, 'test', '2018-07-07 15:39:22', 0),
(15, 2, 3, 'Test3', '2018-07-07 16:23:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_edited_post`
--

CREATE TABLE `history_edited_post` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_edited_post`
--

INSERT INTO `history_edited_post` (`id`, `uid`, `postid`, `date`) VALUES
(1, 2, 6, '2018-07-07 18:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `postid`, `userid`) VALUES
(215, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `ms_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ms_content` varchar(500) NOT NULL,
  `ms_read` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `open` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `uid`, `content`, `date`) VALUES
(1, 2, 'asdsadaddasdsada', '2018-07-06 23:13:04'),
(2, 2, 'Test 2', '2018-07-06 23:21:55'),
(3, 2, 'dhajdhasksdhkahd', '2018-07-07 01:50:56'),
(4, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at aliquet erat. Aliquam et ultricies justo, sollicitudin eleifend justo. In quis dui a turpis bibendum tempus quis a sem. Maecenas posuere volutpat quam sed feugiat. Donec ac arcu congue, pulvinar turpis at, cursus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet libero sed massa eleifend imperdiet nec ut libero. Mauris nunc elit, bibendum a quam ornare, laoreet pretium diam. Nunc bibendum lectus du', '2018-07-07 16:55:05'),
(5, 2, 'orem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at aliquet erat. Aliquam et ultricies justo, sollicitudin eleifend justo. In quis dui a turpis bibendum tempus quis a sem. Maecenas posuere volutpat quam sed feugiat. Donec ac arcu congue, pulvinar turpis at, cursus lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet libero sed massa eleifend imperdiet nec ut libero. Mauris nunc elit, bibendum a quam ornare, laoreet pretium diam. Nunc bibendum lectus dui, vitae blandit odio pulvinar accumsan. Donec in tincidunt ante. Quisque quis odio metus. Proin eget lacus diam. Aenean venenatis quam ut velit aliquet, a blandit nunc fringilla. Mauris ipsum lacus, finibus sed dapibus non, ullamcorper a sapien. Etiam vitae sapien tristique, scelerisque quam sed, auctor ligula. Nullam mollis nunc elit, sed aliquam eros tempor eu.\r\n\r\nMauris vulputate convallis ex, non dapibus lacus placerat ut. Pellentesque vel ex ac turpis lobortis fermentum. Praesent in congue ex. Ut a volutpat mauris, id facilisis odio. Vivamus sed finibus ipsum, et sagittis sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec elementum nulla a aliquet egestas. Sed lobortis viverra velit, sed ultricies mi rutrum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ut quam sed metus convallis tincidunt et in velit. Nam tristique feugiat consectetur. Quisque at nulla tempus, rutrum augue eget, posuere odio. Phasellus condimentum ex ac risus pellentesque, ac mollis justo imperdiet. Donec tincidunt commodo nibh.', '2018-07-07 16:55:53'),
(6, 2, 'r accumsan. Donec in tincidunt ante. Quisque quis odio metus. Proin eget lacus diam. Aenean venenatis quam ut velit aliquet, a blandit nunc fringilla. Mauris ipsum lacus, finibus sed dapibus non, ullamcorper a sapien. Etiam vitae sapien tristique, scelerisque quam sed, auctor ligula. Nullam mollis nunc elit, sed aliquam eros tempor.\r\n\r\nMauris vulputate convallis ex, non dapibus lacus placerat ut. Pellentesque vel ex ac turpis lobortis fermentum. Praesent in congue ex. Ut a volutpat mauris, id facilisis odio. Vivamus sed finibus ipsum, et sagittis sapien. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec elementum nulla a aliquet egestas. Sed lobortis viverra velit, sed ultricies mi rutrum quis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam ut quam sed metus convallis tincidunt et in velit. Nam tristique feugiat consectetur. Quisque at nulla tempus, rutrum augue eget, posuere odio. Phasellus condimentum ex ac risus pellentesque, ac mollis justo imperdiet. Donec tincidunt commodo nibh.', '2018-07-07 16:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `SUBJECT` varchar(255) NOT NULL,
  `CONTENT` varchar(255) NOT NULL,
  `DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RESOLVED` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userimages`
--

CREATE TABLE `userimages` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userimages`
--

INSERT INTO `userimages` (`id`, `uid`, `url`, `date`) VALUES
(1, 2, '35089246_1980165128672010_1444855701640839168_n.jpg', '2018-07-07 19:37:13'),
(2, 2, 'users/stefandespot/images/profilepics/', '2018-07-07 19:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` bigint(20) NOT NULL,
  `FIRSTNAME` varchar(255) NOT NULL,
  `LASTNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `IP` varchar(255) NOT NULL,
  `ADMIN` tinyint(4) NOT NULL DEFAULT '0',
  `ISONLINE` int(11) NOT NULL DEFAULT '0',
  `ACTIVATED` tinyint(4) NOT NULL DEFAULT '0',
  `BLOCKED` tinyint(4) NOT NULL DEFAULT '0',
  `LOGGEDIN` tinyint(4) NOT NULL DEFAULT '0',
  `profilepic` varchar(300) NOT NULL DEFAULT 'users/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FIRSTNAME`, `LASTNAME`, `EMAIL`, `USERNAME`, `PASSWORD`, `BIRTHDAY`, `IP`, `ADMIN`, `ISONLINE`, `ACTIVATED`, `BLOCKED`, `LOGGEDIN`, `profilepic`) VALUES
(1, 'Denis', 'Pavlovic', 'itsdenispavlovic@icloud.com', 'denistheboss', '$2y$10$fZYi5519hOpckU4OhTHy.uSUf3SP9wpr1SwiqfiW.M/43kH6DHtmy', '1998-03-15', '::1', 1, 0, 1, 0, 0, 'users/default.jpg'),
(2, 'Stefan', 'Despot', 'stefandespot@gmail.com', 'stefandespot', '$2y$10$x0ZQoVxpTQapXqsR5qTzgOC5D/brGd7WwxYD0O.YbdCaJTa9qDNga', '1998-04-08', '::1', 0, 0, 1, 1, 1, 'users/stefandespot/images/profilepics/35089246_1980165128672010_1444855701640839168_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_edited_post`
--
ALTER TABLE `history_edited_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userimages`
--
ALTER TABLE `userimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `history_edited_post`
--
ALTER TABLE `history_edited_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userimages`
--
ALTER TABLE `userimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
