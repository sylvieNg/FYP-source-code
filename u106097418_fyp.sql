
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 24, 2015 at 07:24 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u106097418_fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE IF NOT EXISTS `applied` (
  `applied_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `job_status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`applied_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`applied_id`, `user_id`, `job_id`, `date_created`, `date_updated`, `job_status`) VALUES
(1, 'sylvieng@hotmail.my', 2, '2015-08-04 06:34:10', '2015-08-04 06:34:10', 'waiting for reply'),
(2, 'sylvieng@hotmail.my', 2, '2015-08-04 06:39:02', '2015-08-04 06:39:02', 'waiting for reply'),
(3, '', 2, '2015-08-05 13:17:05', '2015-08-05 13:17:05', 'waiting for reply'),
(4, 'sylvieng@hotmail.my', 1, '2015-08-07 08:22:27', '2015-08-07 08:22:27', 'waiting for reply'),
(5, 'sylvieng@hotmail.my', 1, '2015-08-07 08:24:26', '2015-08-07 08:24:26', 'waiting for reply'),
(6, 'sylvieng@hotmail.my', 2, '2015-08-07 08:24:36', '2015-08-07 08:24:36', 'waiting for reply'),
(7, 'sylvieng@hotmail.my', 2, '2015-08-07 08:26:26', '2015-08-07 08:26:26', 'waiting for reply'),
(8, 'sylvieng@hotmail.my', 2, '2015-08-07 08:28:11', '2015-08-07 08:28:11', 'waiting for reply'),
(9, 'walaua94@hotmail.com', 1, '2015-08-24 13:20:50', '2015-08-24 13:20:50', 'waiting for reply'),
(10, 'sylvieng@hotmail.my', 1, '2015-08-24 13:24:11', '2015-08-24 13:24:11', 'waiting for reply'),
(11, 'sylvieng@hotmail.my', 3, '2015-09-06 12:08:54', '2015-09-06 12:08:54', 'waiting for reply'),
(12, 'sylvieng@hotmail.my', 5, '2015-09-07 09:02:01', '2015-09-07 09:02:01', 'waiting for reply'),
(13, 'aa', 6, '2015-09-07 09:17:26', '2015-09-07 09:17:26', 'waiting for reply'),
(14, 'aa', 7, '2015-09-07 09:46:18', '2015-09-07 09:46:18', 'waiting for reply'),
(15, 'aa', 5, '2015-09-09 01:19:20', '2015-09-09 01:19:20', 'waiting for reply'),
(16, 'aa', 1, '2015-09-09 14:05:55', '2015-09-09 14:05:55', 'waiting for reply'),
(17, 'sylvieng@hotmail.my', 7, '2015-09-11 05:26:55', '2015-09-11 05:26:55', 'waiting for reply');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `applied_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(3) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `image_size` varchar(255) NOT NULL,
  `image_ctgy` varchar(255) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(255) DEFAULT NULL,
  `job_category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `more` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `specific_area` varchar(255) DEFAULT NULL,
  `employer_email` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_ended` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `job_name`, `job_category`, `description`, `salary`, `more`, `location`, `specific_area`, `employer_email`, `date_created`, `date_updated`, `date_ended`) VALUES
(1, 'Promoter', 'Promoter', 'Age between 18-25.\r\nPrefer female worker.\r\nWorking time flexible', '100.00', 'per day', 'Johor', 'jb', 'walaua94@hotmail.com', '2015-08-03 09:53:28', '2015-08-03 09:53:28', '0000-00-00 00:00:00'),
(2, 'Waiter', 'Service Crew', 'high experience', '2000.00', 'per month', 'Penang', '', 'sylvieng81@gmail.com', '2015-08-03 09:54:51', '2015-08-03 09:54:51', '0000-00-00 00:00:00'),
(3, 'Model', 'Model', 'Age between 19-25.\r\nHeight is 165cm and above.\r\n', '150.00', 'per hour', 'Selangor', 'Puchong', 'sylvieng81@gmail.com', '2015-09-06 12:02:33', '2015-09-06 12:02:33', '0000-00-00 00:00:00'),
(4, 'Bus driver', 'Driver', 'URGENT!!\r\nNeed a bus driver to fetch about 40 students to the Pulau Penang.\r\nOne day trip.', '500.00', 'per day', 'Selangor', 'Puchong', 'sylvieng81@gmail.com', '2015-09-06 12:04:47', '2015-09-06 12:04:47', '0000-00-00 00:00:00'),
(5, 'Part time Model', 'Model', 'Time is flexible.\r\nRace: Chinese.\r\nChat time video shooting.', '150.00', 'per hour', 'Sarawak', 'Miri', 'sylvieng81@gmail.com', '2015-09-06 14:32:44', '2015-09-06 14:32:44', '0000-00-00 00:00:00'),
(6, 'Bus driver', 'Driver', '3 years experience', '150.00', 'per day', 'Johor', 'Senai', 'walaua94@hotmail.com', '2015-09-07 08:50:46', '2015-09-07 08:50:46', '0000-00-00 00:00:00'),
(7, 'Selling insurance', 'Other', 'Can speak chinese, malay, english fluently.\r\nA friendly person.', '1500.00', 'per month', 'Sarawak', '', 'bb', '2015-09-07 09:19:59', '2015-09-07 09:19:59', '0000-00-00 00:00:00'),
(8, 'Painter', 'Other', 'No experience needed.', '100.00', 'per day', 'Selangor', 'Puchong', 'bb', '2015-09-11 05:28:07', '2015-09-11 05:28:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `resume_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_size` varchar(255) NOT NULL,
  `content` blob NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `daye_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`resume_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(255) DEFAULT NULL,
  `last` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `member` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_num` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_Id`, `first`, `last`, `username`, `password`, `confirm_password`, `member`, `email`, `contact_num`, `last_login`, `date_created`, `date_modified`) VALUES
(1, 'aaa', 'aaa', 'aaa', 'e9bb2e260f7bd25f07c9ba3101a6cdb8', 'e9bb2e260f7bd25f07c9ba3101a6cdb8', 'worker', 'sylvieng@hotmail.my', '123456789', '2015-09-23 16:03:53', '2015-08-03 09:46:42', '2015-08-03 09:46:42'),
(2, 'Bido', 'Bido', 'Bido', 'b59c67bf196a4758191e42f76670ceba', 'b59c67bf196a4758191e42f76670ceba', 'employer', 'walaua94@hotmail.com', '987654321', '2015-09-23 16:05:17', '2015-08-03 09:47:39', '2015-08-03 09:47:39'),
(3, 'bbbb', 'bbbb', 'bbbb', 'b59c67bf196a4758191e42f76670ceba', 'b59c67bf196a4758191e42f76670ceba', 'employer', 'sylvieng81@gmail.com', '7156861285', '2015-09-06 12:10:17', '2015-08-03 09:53:56', '2015-08-03 09:53:56'),
(4, 'aaaaa', 'aaaaa', 'aaaaa', '594f803b380a41396ed63dca39503542', '594f803b380a41396ed63dca39503542', 'worker', 'aaaa', '6724627649862374', '2015-09-09 02:31:12', '2015-09-02 02:37:21', '2015-09-02 02:37:21'),
(5, 'bb', 'bb', 'bb', '21ad0bd836b90d08f4cf640b4c298e7c', '21ad0bd836b90d08f4cf640b4c298e7c', 'employer', 'bb', '8759694691763', '2015-09-11 05:27:25', '2015-09-02 02:37:57', '2015-09-02 02:37:57'),
(6, 'aa', 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912', '4124bc0a9335c27f086f24ba207a4912', 'worker', 'aa', '6738637629', '2015-09-09 14:05:40', '2015-09-02 02:55:12', '2015-09-02 02:55:12'),
(7, 'bbbbb', 'bbbbb', 'bbbbb', 'a21075a36eeddd084e17611a238c7101', 'a21075a36eeddd084e17611a238c7101', 'worker', 'bbbbb', '7234623873', '2015-09-09 02:31:12', '2015-09-02 02:55:41', '2015-09-02 02:55:41'),
(8, 'aa', 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912', '4124bc0a9335c27f086f24ba207a4912', 'worker', 'aa', '67864712479472347', '2015-09-09 14:05:40', '2015-09-07 09:23:41', '2015-09-07 09:23:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
