-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2019 at 06:45 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pitch`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `details` text,
  `type` varchar(30) DEFAULT NULL,
  `creation_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL COMMENT 'foreign_key',
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  `question_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`answer_id`),
  KEY `category_id_fk2` (`company_id`),
  KEY `video_id_fk3` (`video_id`),
  KEY `question_id_fk3` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `details` text,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`comment_id`),
  KEY `video_id_fk4` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `company_name` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `founders` varchar(255) DEFAULT NULL,
  `legal_form` varchar(255) DEFAULT NULL,
  `headquarters` varchar(255) DEFAULT NULL,
  `capital_requirements` varchar(255) DEFAULT NULL,
  `date_of_foundation` date DEFAULT NULL,
  `logo` text,
  `title_picture` text,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign_key',
  `category_id` int(11) NOT NULL COMMENT 'foreign_key',
  `question_id` int(11) NOT NULL COMMENT 'foreign_key',
  `answer_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`company_id`),
  KEY `user_id_fk2` (`user_id`),
  KEY `category_id_fk` (`category_id`),
  KEY `question_id_fk2` (`question_id`),
  KEY `answer_id_fk3` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_category`
--

DROP TABLE IF EXISTS `company_category`;
CREATE TABLE IF NOT EXISTS `company_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `category_name` varchar(255) DEFAULT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_criteria`
--

DROP TABLE IF EXISTS `post_criteria`;
CREATE TABLE IF NOT EXISTS `post_criteria` (
  `post_criteria_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `creation_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`post_criteria_id`),
  KEY `video_id_fk5` (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

DROP TABLE IF EXISTS `post_type`;
CREATE TABLE IF NOT EXISTS `post_type` (
  `post_type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `type_name` varchar(50) DEFAULT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`post_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `details` text,
  `type` varchar(30) DEFAULT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL COMMENT 'foreign_key',
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  `answer_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`question_id`),
  KEY `company_id_fk2` (`company_id`),
  KEY `video_id_fk2` (`video_id`),
  KEY `answer_id_fk2` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `first_name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL COMMENT 'unique_key',
  `password` varchar(50) DEFAULT NULL,
  `description` text,
  `social_media` text,
  `profile_picture` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `expertise_area` text,
  `phone` varchar(50) DEFAULT NULL,
  `older_address` text,
  `personal_interest` text,
  `user_type` varchar(30) DEFAULT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `company_id` int(11) NOT NULL COMMENT 'foreign_key',
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  `user_behavior_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `company_id_fk` (`company_id`),
  KEY `video_id_fk` (`video_id`),
  KEY `user_behavior_id_fk` (`user_behavior_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_behavior`
--

DROP TABLE IF EXISTS `user_behavior`;
CREATE TABLE IF NOT EXISTS `user_behavior` (
  `user_behavior_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `stopped_time_of_watching_video` time DEFAULT NULL,
  `scrolled_time_of_watching_video` time DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign_key',
  `video_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`user_behavior_id`),
  KEY `video_id_fk6` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary_key',
  `video_title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text,
  `no_of_likes` int(11) DEFAULT NULL,
  `no_of_dislikes` int(11) DEFAULT NULL,
  `no_of_views` int(11) DEFAULT NULL,
  `no_of_shares` int(11) DEFAULT NULL,
  `length` time DEFAULT NULL,
  `age_limit` int(11) DEFAULT NULL,
  `upload_date` date DEFAULT NULL,
  `is_post_of_week` tinyint(1) DEFAULT NULL,
  `is_post_of_month` tinyint(1) DEFAULT NULL,
  `is_post_of_year` tinyint(1) DEFAULT NULL,
  `creation_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL COMMENT 'foreign_key',
  `post_type_id` int(11) NOT NULL COMMENT 'foreign_key',
  `question_id` int(11) NOT NULL COMMENT 'foreign_key',
  `answer_id` int(11) NOT NULL COMMENT 'foreign_key',
  `post_criteria_id` int(11) NOT NULL COMMENT 'foreign_key',
  `comment_id` int(11) NOT NULL COMMENT 'foreign_key',
  PRIMARY KEY (`video_id`),
  KEY `user_id_fk` (`user_id`),
  KEY `post_type_id_fk` (`post_type_id`),
  KEY `question_id_fk` (`question_id`),
  KEY `answer_id_fk` (`answer_id`),
  KEY `post_criteria_id_fk` (`post_criteria_id`),
  KEY `comment_id_fk` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `category_id_fk2` FOREIGN KEY (`company_id`) REFERENCES `answer` (`answer_id`),
  ADD CONSTRAINT `question_id_fk3` FOREIGN KEY (`question_id`) REFERENCES `answer` (`answer_id`),
  ADD CONSTRAINT `video_id_fk3` FOREIGN KEY (`video_id`) REFERENCES `answer` (`answer_id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `video_id_fk4` FOREIGN KEY (`video_id`) REFERENCES `comment` (`comment_id`);

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `answer_id_fk3` FOREIGN KEY (`answer_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `question_id_fk2` FOREIGN KEY (`question_id`) REFERENCES `company` (`company_id`),
  ADD CONSTRAINT `user_id_fk2` FOREIGN KEY (`user_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `post_criteria`
--
ALTER TABLE `post_criteria`
  ADD CONSTRAINT `video_id_fk5` FOREIGN KEY (`video_id`) REFERENCES `post_criteria` (`post_criteria_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `answer_id_fk2` FOREIGN KEY (`answer_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `company_id_fk2` FOREIGN KEY (`company_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `video_id_fk2` FOREIGN KEY (`video_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `company_id_fk` FOREIGN KEY (`company_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `user_behavior_id_fk` FOREIGN KEY (`user_behavior_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `video_id_fk` FOREIGN KEY (`video_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_behavior`
--
ALTER TABLE `user_behavior`
  ADD CONSTRAINT `user_id_fk3` FOREIGN KEY (`user_id`) REFERENCES `user_behavior` (`user_behavior_id`),
  ADD CONSTRAINT `video_id_fk6` FOREIGN KEY (`user_id`) REFERENCES `user_behavior` (`user_behavior_id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `answer_id_fk` FOREIGN KEY (`answer_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `comment_id_fk` FOREIGN KEY (`comment_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `post_criteria_id_fk` FOREIGN KEY (`post_criteria_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `post_type_id_fk` FOREIGN KEY (`post_type_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `question_id_fk` FOREIGN KEY (`question_id`) REFERENCES `video` (`video_id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `video` (`video_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
