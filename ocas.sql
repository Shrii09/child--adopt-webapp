-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 03:43 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocas`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopter`
--

CREATE TABLE IF NOT EXISTS `adopter` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `residence` text NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `user_image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adopter`
--

INSERT INTO `adopter` (`id`, `first_name`, `middle_name`, `last_name`, `telephone`, `residence`, `email_address`, `nationality`, `gender`, `user_image`, `username`, `password`) VALUES
(1, 'skdlks', 'sdsd', 'sdsdsd', 'sdsdsd', 'sdsdsd', 'nnyanziian@gmail.com', 'AZE', 1, 'default.png', 'ianian', '$2y$10$VrmcShYhUGzmq95lbUymKeOkvdRJdD/ZfDXEGNRD.aU7hs7pX56KW'),
(3, 'Asiimwe', 'Calvin', 'Barugahara', '0752683332', 'Muyenga Bukasa', 'asiimwekharlveen@gmail.com', 'UGA', 1, 'default.png', 'Calvinaire', '$2y$10$3X7lCalsa1JE4etF.dSESOS4PFIgoz5cq9cqyra6NUjBFFjHwj1ga'),
(4, 'Ssengoba', 'Alex', 'John', '0718392752', 'Kawempe', 'ssengoba@outlook.com', 'UGA', 1, 'default.png', 'ssengoba', '$2y$10$dzCXzwOh50McITZqx3XRL.OSACbIzsaYO0pCBQHg0fYYaaCAgOKm2');

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE IF NOT EXISTS `adoption` (
`id` int(11) NOT NULL,
  `adopter_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `department_worker_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `marital` text NOT NULL,
  `proffession` text NOT NULL,
  `income` int(11) NOT NULL,
  `reason` text NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`id`, `adopter_id`, `child_id`, `remarks`, `department_worker_id`, `status`, `marital`, `proffession`, `income`, `reason`, `language`) VALUES
(6, 4, 3, '', 0, 0, 'Divorced', 'Developer', 5000000, 'Cool', 'Lug');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE IF NOT EXISTS `child` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_image` text NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `date_of_birth` date NOT NULL,
  `about` text NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `date_added` date NOT NULL,
  `adopted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `first_name`, `last_name`, `user_image`, `sex`, `date_of_birth`, `about`, `middle_name`, `date_added`, `adopted`) VALUES
(2, 'Nnyanzi', 'Ian', '5859a8b07f3fc90e0bce45749a78e886.jpg', 1, '1995-07-22', 'What now', 'Kajoga', '2018-04-12', 0),
(3, 'Hanesha ', 'Faith', 'default.png', 2, '2018-05-10', 'she is a humble girl ', 'Clara', '2018-05-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_worker`
--

CREATE TABLE IF NOT EXISTS `department_worker` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_worker`
--

INSERT INTO `department_worker` (`id`, `name`, `username`, `gender`, `telephone`, `email_address`, `image`, `password`) VALUES
(1, 'Nnyanzi Ponsiano', 'nnyanziian', 1, '0701964728', 'nnyanziian@krobits.com', '9512tyler-the-creator-eric-white-interview-01.jpg', '$2y$10$hGNs/Z9oMXmYVlus3X39OepW3XnZhsVCll0dR.4zudNcXs.yrgyI.'),
(3, 'dffdf', 'dfdfdf', 1, 'dfdfdff', 'fdfdff@gmd.com', 'default.png', '$2y$10$BpCm3vnpFNLIzD1uKKJjX.XcqrewSsqhk3GH3zt.fYl.sdLlHt9oK'),
(5, 'DFdjdfl', 'lsilskdsld', 1, 'dfdfdfff', 'dfdfdfdfdffdfdf@dfdf.com', 'default.png', '$2y$10$9zXVTgOgTJC3eZwDLjXhCOU1Qz27GF8QvVWR80voqM5WRw/c2sQpe'),
(6, 'Onen Julius', 'jonen', 1, '0723792388', 'jonen@gmail.com', 'default.png', '$2y$10$Kw.4Zp77Ru0MIAaLRtloMex7UO1clELjHdVKtv02YKnhl5O5pPDRa'),
(7, 'Ssengoba Pius', 'ssengoba', 1, '088883333388338', 'ssengobapius@hotmail.com', 'default.png', '$2y$10$fEvWH5h6Uo6KDZcIKcQyJeTnneNgBu2l1Q0EawuuP/fSkAlpwaENy'),
(8, 'Nalubega Kotlin', 'nalubega', 2, '07829389239', 'nalubega@kotlin.com', 'default.png', '$2y$10$xoAitVnmCRk3CKqUonB8vuESNP88KGeQpGdOdS8Xg7TjOSI2JQLY2'),
(9, 'Makumbi', 'makumbi', 1, '08723892923', 'makk@gmail.com', 'user-1.jpg', '$2y$10$B6MLV3I8MYrCEZ6qpblDHeg/1zrBWLdyG4wp.bA9bz96cO.kT5fkq');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE IF NOT EXISTS `system_admin` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_names` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`id`, `username`, `password`, `full_names`, `email`) VALUES
(1, 'nnyanziian', '$2y$10$E6Q3LOXKHzNxUibTs4flt.nlNmlGPPBvz487WoyfxfY22IZt6JXzq', 'Nnyanzi Ian Kajoga', 'nnyanziian@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopter`
--
ALTER TABLE `adopter`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_worker`
--
ALTER TABLE `department_worker`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopter`
--
ALTER TABLE `adopter`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department_worker`
--
ALTER TABLE `department_worker`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `system_admin`
--
ALTER TABLE `system_admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
