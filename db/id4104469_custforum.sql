-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2019 at 09:05 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id4104469_custforum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(3, 'News and Announcements', ''),
(4, 'General Discussions', ''),
(5, 'Cust past papers', '');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `body`, `create_date`) VALUES
(1, 3, 14, '<p>Wow nice Shaheryar :) its very nice website, can you please teach me how you created it.</p>', '2019-09-11 14:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `user_id`, `title`, `body`, `last_activity`, `create_date`) VALUES
(2, 5, 11, 'Agent Based Software Engineering Past Papers', '<p>Hello guys who ever need past papers for agent based software engineering can get from this google drive link.<a href=\"http://cs.ox.ac.uk/people/michael.wooldridge/pubs/iee-se.pdf\">Click Here</a></p>', '2019-09-11 13:48:32', '2019-09-11 13:48:32'),
(3, 4, 11, 'Hello guys i want to share my new site i made with codeIgniter a php framework', '<p><strong>Stak&rsquo;s Gamestore </strong></p><p>In this site user can online purchase video games for their specific device e.g. Games for PlayStation, Xbox, Pc, etc. on a website. This website contains the entire basic features, which an E-Commerce website should have.</p><p>Here is its URL :-&nbsp; <a href=\"http://stakgs.site11.com/\">http://stakgs.site11.com/</a></p><p>Please provide any suggest, i really appreciate it.</p>', '2019-09-11 13:53:27', '2019-09-11 13:53:27'),
(4, 3, 15, 'Students who need to register for SRE Course, Please contact!', '<p>Student who want to register for Software Requirement Engneering course please contact on this email</p><p>Humza.bhati@mail.com&nbsp;</p>', '2019-09-11 15:21:01', '2019-09-11 15:21:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(64) NOT NULL,
  `about` text NOT NULL,
  `last_activity` datetime NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `username`, `password`, `about`, `last_activity`, `join_date`) VALUES
(1, 'Shaheryar Khan', 'Shaheryar.khan090078601@gmail.com', 'background1.jpg', 'test', '098f6bcd4621d373cade4e832627b4f6', '', '2017-12-22 14:27:35', '2017-12-22 13:27:35'),
(6, 'test', 'test@test.com', 'background2.jpg', 'test', '098f6bcd4621d373cade4e832627b4f6', '', '2017-12-25 21:13:32', '2017-12-25 21:13:32'),
(7, 'test', 'test0@test0.com', 'background3.jpg', 'test0', 'f6f4061a1bddc1c04d8109b39f581270', '', '2017-12-25 21:19:15', '2017-12-25 21:19:15'),
(8, 'siddique', 'sa@sa.com', 'Sunset.jpg', 'siddique', '81dc9bdb52d04dc20036dbd8313ed055', 'abc', '2018-01-08 09:42:47', '2018-01-08 09:42:47'),
(11, 'Shaheryar Tariq Khan', 'shaheryar.tk@gmail.com', '1200px-NASA_logo.svg.png', 'STAK123', 'e10adc3949ba59abbe56e057f20f883e', 'Shaheryar is a brilent sofware engineer', '2019-09-11 13:39:06', '2019-09-11 13:39:06'),
(13, 'Usama Shafqat', 'emailforusama@gmail.com', 'usama.jpg', 'Usama', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-09-11 14:33:15', '2019-09-11 14:33:15'),
(14, 'Ahmed Abbas', 'aa@gmail.com', 'ahmed1568213175.jpg', 'AA', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-09-11 14:46:15', '2019-09-11 14:46:15'),
(15, 'Hamza bhatti', 'Hamzabhatti@mail.com', 'hamza1568215019.jpg', 'Hamza', 'e10adc3949ba59abbe56e057f20f883e', '', '2019-09-11 15:16:59', '2019-09-11 15:16:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
