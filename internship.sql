-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 07:13 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('sasich3@gmail.com', '123456789'),
('sashi@gmail.com', '123456789'),
('mark@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
('5586ee27af2c9', 'vikas', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE IF NOT EXISTS `internships` (
  `topic_id` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `period` varchar(100) NOT NULL,
  `stipend` int(100) NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`topic_id`, `topic`, `start`, `end`, `period`, `stipend`, `details`) VALUES
('58f07feb1380c', 'web tech', '2018-02-05', '2017-08-08', '', 30000, '<p><strong>welcom to web intern</strong></p>\r\n\r\n<p><em><strong>enjoy and learn</strong></em></p>\r\n'),
('58f0b49d9d042', 'Java Development', '2017-04-14', '2017-04-30', '2 monts', 6000, '<h2 style="font-style:italic;"><u><strong>Java Development</strong></u></h2>\r\n\r\n<p><strong>About Red'),
('58f0b94144db6', 'Web Development Internship in Bangalore at Sportzify', '2017-04-15', '2017-04-30', '3 months', 5000, '<p><strong>About Sportzify (</strong><a href="http://www.sportzify.com/" target="_blank"><strong>htt'),
('58f0ba3444eee', 'Front End Development Internship in Gurgoan', '2017-04-16', '2017-04-30', '3 months', 3000, '<p><strong>About Vplak.com (</strong><a href="https://www.vplak.com/" target="_blank"><strong>https:'),
('58f0be75acc70', 'Software Testing (For MapleGraph) Internship in Delhi at Akaaro', '2017-04-15', '2017-04-28', '1 month', 5000, '<p><strong>About Akaaro (</strong><a href="http://www.theakaaro.com/" target="_blank"><strong>http:/'),
('58f0c0153e13b', 'Graphic Design Internship in Mumbai with Gul Panag', '2017-04-14', '2017-04-30', '3 months', 8000, '<p><strong>About GulPanag (</strong><a href="https://en.wikipedia.org/wiki/Gul_Panag" target="_blank'),
('58f0c1d139ccd', 'Marketing Internship in Delhi with Bhaichung Bhutia', '2017-04-14', '2017-04-30', '6 months', 10000, '<p><strong>About BhaichungBhutia (</strong><a href="https://en.wikipedia.org/wiki/Bhaichung_Bhutia" '),
('58f0c82934c9f', 'Quality Assurance Internship in Delhi with Bhaichung Bhutia', '2017-04-14', '2017-04-15', '3 months', 5000, '<p>About BhaichungBhutia (<a href="https://en.wikipedia.org/wiki/Bhaichung_Bhutia" target="_blank">h');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `college` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `gender`, `college`, `email`, `mob`, `password`) VALUES
('Avantika', 'F', 'KNIT sultanpur', 'avantika420@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Mark Zukarburg', 'M', 'Stanford', 'ceo@facebook.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Harshi', 'F', 'knit', 'harshikaverma5@gmail.com', 8415674848, '690b4bac6ca9fb81814128a294470f92'),
('Komal', 'F', 'KNIT sultanpur', 'komalpd2011@gmail.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Tom Cruze', 'M', 'Hollywood', 'mi5@hollywood.com', 7785068889, 'e10adc3949ba59abbe56e057f20f883e'),
('Netcamp', 'M', 'KNIT sultanpur', 'netcamp@gmail.com', 987654321, 'e10adc3949ba59abbe56e057f20f883e'),
('Nikunj', 'M', 'XYZ', 'nik1@gmail.com', 987, '202cb962ac59075b964b07152d234b70'),
('Saumya', 'F', 'kn', 'sasich@gmail.com', 8853744190, '03c7c0ace395d80182db07ae2c30f034');

-- --------------------------------------------------------

--
-- Table structure for table `user_apply`
--

CREATE TABLE IF NOT EXISTS `user_apply` (
  `email` varchar(100) NOT NULL,
  `applied` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_apply`
--

INSERT INTO `user_apply` (`email`, `applied`) VALUES
('sa@gmail.com', 'abc'),
('sasich3@gmail.com', 'rrrr'),
('sasich3@gmail.com', '58f07feb1380c'),
('sasich3@gmail.com', '58f07feb1380c'),
('sasich@gmail.com', '58f0b94144db6'),
('sasich@gmail.com', '58f0b94144db6'),
('sasich@gmail.com', '58f0b94144db6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
