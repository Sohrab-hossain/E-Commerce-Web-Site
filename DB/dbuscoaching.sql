-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 11:19 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuscoaching`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(1, 'Dhaka', 1),
(3, 'New Delhi', 2),
(4, 'Kolkatta', 2),
(9, 'Thakurgaon', 1),
(10, 'Rangpur', 1),
(11, 'Dinajpur', 1),
(12, 'Ponchogor', 1),
(13, 'Gaibandha', 1),
(14, 'Bogra', 1),
(15, 'Shirajganj', 1),
(16, 'Sherpur', 1),
(17, 'Jamalpur', 1),
(18, 'Tangail', 1),
(20, 'Sylet', 1),
(21, 'Sunamgong', 1),
(22, 'Hobigong', 1),
(23, 'Borisal', 1),
(24, 'Noakhali', 1),
(25, 'khulna', 1),
(26, 'Rajshahi', 1),
(27, 'Kustia', 1),
(28, 'Chitagong', 1),
(29, 'Cox\'s Bazar', 1),
(30, 'Madaripur', 1),
(31, 'Chadpur', 1),
(32, 'Gopalgong', 1),
(33, 'Narayanganj', 1),
(34, 'Munshigonj', 1),
(35, 'Manikgonj', 1),
(38, 'Kathmundu', 5);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'India'),
(4, 'Bhutan'),
(5, 'Nepal'),
(6, 'United State of America'),
(8, 'Russia'),
(10, 'Japan'),
(14, 'Kenyia'),
(20, 'Libya'),
(17, 'South Sudan'),
(18, 'North Sudan');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `description` varchar(8000) DEFAULT NULL,
  `fee` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `syllabus` varchar(500) DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `description`, `fee`, `duration`, `syllabus`, `website`, `departmentId`) VALUES
(1, 'How to make money', 'NAI ba dilam', 5500, 55, 'E:\\Asp.Net.docx', 'www.money.com', 4),
(2, 'Asp.Net, MS Sql, C Sharpe', 'NAI', 30000, 120, 'Asp.Net.docx', 'www.asp.net', 1),
(3, 'Web Development With PHP', 'NA', 25000, 80, 'To.docx', 'www.php.net', 1),
(4, 'Database', 'nai', 100000000, 120, '._Asp.Net.docx', 'www.money.com', 1),
(5, 'Graphics', 'kisu nai', 12000000, 120, '._DSC_4669.jpg', 'www.asp.net', 1),
(6, 'os', 'mjai mja', 1200, 22, '._Asp.Net MVC.docx', 'www.money.com', 1),
(7, 'introduction to internet', 'faul subject', 12000000, 24, '._To.docx', 'www.php.net', 1),
(8, 'accounting', 'good sub', 1200, 120, '._Asp.Net MVC.docx', 'www.asp.net', 2),
(9, 'digital electronics', 'not bad', 1200, 120, 'Find consecutive odd number between A.docx', 'www.asp.net', 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Computer Science', 'NA'),
(2, 'BBA', 'NA'),
(3, 'Electronics', 'NA'),
(4, 'Commerce', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `regNo` varchar(12) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `cityId` int(11) DEFAULT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'U',
  `createDate` date DEFAULT NULL,
  `createIP` varchar(200) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activeDate` date NOT NULL DEFAULT '2017-10-15'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `regNo`, `tag`, `contact`, `email`, `password`, `gender`, `dateOfBirth`, `address`, `cityId`, `type`, `createDate`, `createIP`, `active`, `activeDate`) VALUES
(2, 'Mr Admin Miah', '12123', 'All Rounder', '01717420420', 'admin@mysystem.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1980-06-10', 'NA', 1, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(3, 'aafat', '1233', 'php', '0193938', 'asdf@ff.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1999-09-12', 'sdd', 1, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(4, 'mashrafee', '3454', 'asdf', '01234335367899', 'avd@yahoo.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1999-09-12', 'norail', 6, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(5, 'mushfik', '3333', 'wkeeper', '01234353678', 'wk@uttara.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1980-06-10', 'bagra', 3, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(6, 'messi', '1111', 'All Rounder', '98765432', 'messi@gg.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1980-06-10', 'argentina', 4, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(7, 'adam', '7777', 'abdullah', '0123435', 'adam@aa.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1000-05-09', 'jannah', 2, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(8, 'Musa', '2222', 'nabi', '0123435555', 'musa@hhh.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1020-05-09', 'iraq', 5, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(9, 'Daud ibrahim', '1233', 'mafia', '11223344', 'mafia@haha.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '2020-05-09', 'Pagla', 3, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(10, 'sami', '1534', 'web devlopment', '01718092699', 'samiur.rahman97@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1999-09-12', 'farmgate', 1, 'U', '2017-10-07', '::1', 0, '2017-10-15'),
(11, 'abduk', '1111', 'asdf', '0123433536789', '166@tbs.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1000-05-09', 'noakhali', 22, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(12, 'yamin', '1111', 'asdf', '0177826374', 'asuse@zenbook.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1020-05-09', 'afdsfa', 20, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(13, 'ruhul', '1233', 'ASP.Net', '01873456726', 'biplob@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 2, '1000-05-09', 'afdfsd', 8, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(14, 'rahima banu', '1534', 'mafia', '0197563425', 'foysal@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1990-06-08', 'afdsfax', 18, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(15, 'jorina khatun', '2222', 'All Rounder', '0167524367', 'sda@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1997-09-08', 'afsd', 23, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(16, 'tanvir', '1111', 'abdullah', '01976543218', 'asd@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1990-09-05', 'fdsdf', 1, 'U', '2017-10-16', '::1', 0, '2017-10-15'),
(17, 'Ms Bangladesh', '76567', 'Miss, BD, Word', '01717420421', 'ms@bd.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1980-06-10', 'NA', 24, 'U', '2017-10-18', '::1', 0, '2017-10-15'),
(18, 'ambia khatun', '7658678', 'tag tag tag', '858687687', 'ambia@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1980-06-10', 'na', 23, 'U', '2017-10-18', '::1', 0, '2017-10-15'),
(19, 'Morion Begum', '78678667', 'm m m ', '5476567567', 'morium@gmail.com', '*81769230A51C2B8D285AB33644E414C212BDC6EE', 1, '1980-06-10', 'na', 24, 'U', '2017-10-18', '::1', 1, '2017-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `studentcourse`
--

CREATE TABLE `studentcourse` (
  `studentId` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcourse`
--

INSERT INTO `studentcourse` (`studentId`, `courseId`, `date`, `remarks`) VALUES
(2, 2, '2017-10-08', 'dsd');

-- --------------------------------------------------------

--
-- Table structure for table `studentcv`
--

CREATE TABLE `studentcv` (
  `studentId` int(11) NOT NULL,
  `cv` varchar(500) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentcv`
--

INSERT INTO `studentcv` (`studentId`, `cv`, `date`) VALUES
(5, 'Find consecutive odd number between A.docx', '2017-10-09'),
(4, 'Md_Asaduzzaman_Arif(Master Trainer, DotNet).jpg', '2017-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `studentimage`
--

CREATE TABLE `studentimage` (
  `id` int(11) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentimage`
--

INSERT INTO `studentimage` (`id`, `studentId`, `image`, `date`, `title`) VALUES
(1, 5, 'Arif_2X2.jpg', '2017-10-09', 'Apatoto NAI'),
(2, 13, 'AAEAAQAAAAAAAAWHAAAAJDg4ZGUyZTliLTBiNjItNDY4OC1iZjAwLWEzMGEwMDAyNmNjMg.jpg', '2017-10-16', 'taas'),
(3, 13, 'AAEAAQAAAAAAAAWHAAAAJDg4ZGUyZTliLTBiNjItNDY4OC1iZjAwLWEzMGEwMDAyNmNjMg.jpg', '2017-10-16', 'fgfd'),
(4, 13, 'imagesTUAW0O1K.jpg', '2017-10-16', 'dfsdg'),
(5, 14, 'untitledsd.png', '2017-10-16', 'dfas'),
(6, 14, 'untitled.png', '2017-10-16', 'asdfs'),
(7, 14, 'images8D3ILETJ.jpg', '2017-10-16', 'asdfd'),
(8, 14, 'AAEAAQAAAAAAAAtIAAAAJDQ0YTdkN2IzLWZkMjMtNDZiYy1iNGM2LWM4ZWEwZTY1YTM4Nw.jpg', '2017-10-16', 'fasdfe'),
(9, 14, 'LAST_CASE_05.jpg', '2017-10-16', 'sdfsa'),
(10, 15, 'asdfasuntitled.png', '2017-10-16', 'fdd'),
(11, 15, 'imagesF5Z289M3.jpg', '2017-10-16', 'dsa'),
(12, 15, 'imagesR5FM13TG.jpg', '2017-10-16', 'gasd'),
(13, 15, 'unasdsddtitled.png', '2017-10-16', 'saewe'),
(14, 15, 'untitledsd.png', '2017-10-16', 'asdf'),
(15, 16, '337d2c3.jpg', '2017-10-16', 'asd'),
(16, 16, 'images5MLGOM3Y.jpg', '2017-10-16', 'sdfa'),
(17, 16, 'images34X7U6FP.jpg', '2017-10-16', 'df'),
(18, 16, 'imagesELCNMKU5.jpg', '2017-10-16', 'asd'),
(19, 16, 'imagesKUEPGG8O.jpg', '2017-10-16', 'asdf'),
(20, 12, 'images1ONJTW4K.jpg', '2017-10-16', 'fhsd'),
(21, 12, 'imagesLNLX3DRE.jpg', '2017-10-16', 'fasd'),
(22, 12, 'Maumoon-Abdul-Gayoom.jpg', '2017-10-16', 'asdfr'),
(23, 12, 'untitled.png', '2017-10-16', 'trtfds'),
(24, 12, 'yamin-honourable1.jpg', '2017-10-16', 'zsasd'),
(25, 11, 'hqdefault.jpg', '2017-10-16', 'baas'),
(26, 11, 'images660B6PJ7.jpg', '2017-10-16', 'gasd'),
(27, 11, 'imagesRWL8Z3LO.jpg', '2017-10-16', 'vas'),
(28, 11, 'untitled.png', '2017-10-16', 'dacs'),
(29, 11, 'images8IU2ODQC.jpg', '2017-10-16', 'badss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryId` (`countryId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `departmentId` (`departmentId`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `cityId` (`cityId`);

--
-- Indexes for table `studentcourse`
--
ALTER TABLE `studentcourse`
  ADD PRIMARY KEY (`studentId`,`courseId`),
  ADD KEY `courseId` (`courseId`);

--
-- Indexes for table `studentcv`
--
ALTER TABLE `studentcv`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `studentimage`
--
ALTER TABLE `studentimage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `studentimage`
--
ALTER TABLE `studentimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
