-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2017 at 07:16 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aces`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `filepath` varchar(767) NOT NULL,
  `filename` text NOT NULL,
  `sem` int(10) NOT NULL,
  `sub` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  PRIMARY KEY (`filepath`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`filepath`, `filename`, `sem`, `sub`, `type`, `author`) VALUES
('uploads/2010.pdf', '2010 SS Question paper', 5, 18, 2, 'johndoe'),
('uploads/2011.pdf', '2011 SS Question paper', 5, 18, 2, 'johndoe'),
('uploads/2012.pdf', 'CN1 2012 Question Paper', 5, 21, 2, 'snape'),
('uploads/2015.pdf', 'CN1 2015 Question Paper', 5, 21, 2, 'snape'),
('uploads/ch1.ppt', 'Software Enineering Unit 1 PPT', 5, 17, 1, 'lorem'),
('uploads/ch2.ppt', 'Software Enineering Unit 2 PPT', 5, 17, 1, 'lorem'),
('uploads/UNIT 2.docx', 'System Softwares Unit 2 Notes', 5, 18, 1, 'johndoe'),
('uploads/unit 7.pdf', 'SE V&V Notes', 5, 17, 1, 'snape');

-- --------------------------------------------------------

--
-- Table structure for table `logindetails`
--

CREATE TABLE IF NOT EXISTS `logindetails` (
  `name` varchar(100) NOT NULL,
  `realname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `faculty` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logindetails`
--

INSERT INTO `logindetails` (`name`, `realname`, `password`, `email`, `faculty`, `admin`) VALUES
('nishyou', 'Nishanth Anchan K N', 'vainglory', 'nishanthanchankn@gmail.com', 0, 1),
('personal', 'Amith Shankar P', 'qwertyuiop', 'amithshankarp@gmail.com', 0, 1),
('phenomenal1', 'Bharathraj', 'namana', 'bharathraj@gmail.com', 0, 1),
('johndoe', 'John Doe', 'johndoe', 'john@doe.com', 1, 0),
('snape', 'Severus Snape', 'snape', 'halfbloodprince@hogwarts.com', 1, 0),
('lorem', 'Lorem Ipsum', 'lorem', 'lorem@ipsum.com', 1, 0),
('student', 'Student', 's', 'student@gmail.com', 0, 0),
('111', '111', '111', '11@a.co', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sem` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `sem`) VALUES
(0, '-Select Semester-'),
(3, 'III'),
(4, 'IV'),
(5, 'V'),
(6, 'VI'),
(7, 'VII'),
(8, 'VIII');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semid` int(10) NOT NULL,
  `sub` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `semid`, `sub`) VALUES
(1, 3, 'Engineering Mathematics - III'),
(2, 3, 'Electronic Circuits'),
(3, 3, 'Logic Design'),
(4, 3, 'Discrete Mathematical Structures'),
(5, 3, 'Data Structures with C'),
(6, 3, 'Object oriented Programming with C/C++'),
(7, 3, 'DATA STRUCTURES WITH C/C++ LABORATORY'),
(8, 3, 'ELECTRONIC CIRCUITS & LOGIC DESIGN LABORATORY'),
(9, 4, 'Engineering Mathematics - IV'),
(10, 4, 'Graph Theory & Combinatorics'),
(11, 4, 'Design & Analysis of Algorithms'),
(12, 4, 'Unix & Shell Programming'),
(13, 4, 'Microprocessors'),
(14, 4, 'Computer Organization'),
(15, 4, 'DESIGN AND ANALYSIS OF ALGORITHMS LABORATORY '),
(16, 4, 'MICROPROCESSORS LABORATORY '),
(17, 5, 'Software Engineering'),
(18, 5, 'Systems Software'),
(19, 5, 'Operating Systems'),
(20, 5, 'Database Management Systems'),
(21, 5, 'Computer Networks - I'),
(22, 5, 'Formal Languages & Automata Theory'),
(23, 5, 'DATABASE APPLICATIONS LABORATORY'),
(24, 5, 'SYSTEM SOFTWARE & OPERATING SYSTEMS LABORATORY'),
(25, 6, 'Management & Entrepreneurship'),
(26, 6, 'Unix System Programming'),
(27, 6, 'Compiler Design'),
(28, 6, 'Computer Networks - II'),
(29, 6, 'Computer Graphics & Visualization'),
(30, 6, 'Operations Research'),
(31, 6, 'COMPUTER GRAPHICS AND VISUALIZATION LABORATORY'),
(32, 6, 'UNIX SYSTEMS PROGRAMMING AND COMPILER DESIGN LABORATORY');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Notes'),
(2, 'Question Paper'),
(3, 'Other');
