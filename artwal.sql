-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2015 at 04:33 PM
-- Server version: 5.6.23
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `About`
--

CREATE TABLE IF NOT EXISTS `About` (
  `user_id` int(11) NOT NULL COMMENT 'link to users table',
  `description` longtext NOT NULL COMMENT 'about me description',
  `date_of_birth` date NOT NULL COMMENT 'user birthdate',
  `province_id` int(11) NOT NULL COMMENT 'link to province table',
  `country_id` int(11) NOT NULL COMMENT 'link to country table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='user home page';

-- --------------------------------------------------------

--
-- Table structure for table `Countries`
--

CREATE TABLE IF NOT EXISTS `Countries` (
  `country_id` int(11) NOT NULL COMMENT 'country id',
  `country_name` varchar(250) NOT NULL COMMENT 'name of country'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Farts`
--

CREATE TABLE IF NOT EXISTS `Farts` (
  `fart_id` int(11) NOT NULL COMMENT 'hate id',
  `post_id` int(11) NOT NULL COMMENT 'link to posts table',
  `farter_id` int(11) NOT NULL COMMENT 'link to which user hated',
  `fart_date_time` datetime NOT NULL COMMENT 'date and time of hate'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='hates table';

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `friend_a_id` int(11) NOT NULL COMMENT 'link to user a id in user table',
  `friend_b_id` int(11) NOT NULL COMMENT 'link to user b id in user table',
  `date_time_of_fartship` datetime NOT NULL COMMENT 'date and time of friendship'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='friends link table between registered users';

-- --------------------------------------------------------

--
-- Table structure for table `Images`
--

CREATE TABLE IF NOT EXISTS `Images` (
  `image_id` int(11) NOT NULL COMMENT 'image id',
  `post_id` int(11) NOT NULL COMMENT 'link to posts table',
  `image_url` varchar(250) NOT NULL COMMENT 'location of image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE IF NOT EXISTS `Likes` (
  `like_id` int(11) NOT NULL COMMENT 'like id',
  `post_id` int(11) NOT NULL COMMENT 'link to posts table',
  `liker_id` int(11) NOT NULL COMMENT 'link to user who liked',
  `like_date_time` datetime NOT NULL COMMENT 'date and time of like'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='table for likes';

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
  `post_id` int(11) NOT NULL COMMENT 'post id',
  `session_id` int(11) NOT NULL COMMENT 'link from session table',
  `post_message` longtext NOT NULL COMMENT 'message on post',
  `post_image_id` int(11) NOT NULL COMMENT 'link to images table',
  `post_date_time` datetime NOT NULL COMMENT 'date and time of post'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='posts on artwall';

-- --------------------------------------------------------

--
-- Table structure for table `Province`
--

CREATE TABLE IF NOT EXISTS `Province` (
  `province_id` int(11) NOT NULL COMMENT 'province id',
  `province_name` varchar(250) NOT NULL COMMENT 'name of province',
  `country_id` int(11) NOT NULL COMMENT 'link to countries table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Sessions`
--

CREATE TABLE IF NOT EXISTS `Sessions` (
  `session_id` int(11) NOT NULL COMMENT 'session id',
  `user_id` int(11) NOT NULL COMMENT 'link to user table',
  `login_date_time` datetime NOT NULL COMMENT 'when user logged in',
  `logout_date_time` datetime NOT NULL COMMENT 'when user logged out'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(11) NOT NULL COMMENT 'user id number',
  `screenname` varchar(50) NOT NULL COMMENT 'login screen name',
  `password` varchar(50) NOT NULL COMMENT 'login password',
  `first_name` varchar(50) NOT NULL COMMENT 'user first name',
  `last_name` varchar(50) NOT NULL COMMENT 'user last name',
  `email` varchar(50) NOT NULL COMMENT 'contact email'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='user registration table';

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `screenname`, `password`, `first_name`, `last_name`, `email`) VALUES
(1, 'spuds', 'spice', 'spuds', 'spice', 'spuds@spice.com'),
(2, 'bobbottoms', 'bottoms', '', '', 'bob@bottoms.com'),
(3, 'bobbottoms', 'bob', '', '', 'bob@bottoms.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Countries`
--
ALTER TABLE `Countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `Farts`
--
ALTER TABLE `Farts`
  ADD PRIMARY KEY (`fart_id`);

--
-- Indexes for table `Images`
--
ALTER TABLE `Images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `Province`
--
ALTER TABLE `Province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `Sessions`
--
ALTER TABLE `Sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Countries`
--
ALTER TABLE `Countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'country id';
--
-- AUTO_INCREMENT for table `Farts`
--
ALTER TABLE `Farts`
  MODIFY `fart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'hate id';
--
-- AUTO_INCREMENT for table `Images`
--
ALTER TABLE `Images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'image id';
--
-- AUTO_INCREMENT for table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'like id';
--
-- AUTO_INCREMENT for table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'post id';
--
-- AUTO_INCREMENT for table `Province`
--
ALTER TABLE `Province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'province id';
--
-- AUTO_INCREMENT for table `Sessions`
--
ALTER TABLE `Sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'session id';
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user id number',AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
