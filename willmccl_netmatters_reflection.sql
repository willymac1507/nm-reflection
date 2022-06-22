-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 03:12 PM
-- Server version: 8.0.28
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `willmccl_netmatters_reflection`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `marketing` tinyint(1) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `company`, `email`, `telephone`, `subject`, `message`, `marketing`, `date_posted`) VALUES
(16, 'Will', '', 'will@email.com', '1234', 'Help', 'Help', 0, '2022-06-21 14:02:08'),
(17, 'sfsdzgsdfg', 'asdfasdfsdf', 'sdfsdfsdfsfsfs@jbidfb.com', 'sfsdfssdfssdf', 'sdffsdfsfsdf', 'sfsdfsdfsd', 1, '2022-06-22 08:53:30'),
(18, 'asdsdfsadsda', 'adasdasdas', 'dasdasdasdasdasd@sbbfsbfskfbhsdbf.com', 'asdasdadada', 'dasdasdasdasd', 'adasdasdasdasdas', 1, '2022-06-22 08:53:50'),
(19, 'Will', '', 'will@email.com', '(07808)550651', 'Help', 'Me', 0, '2022-06-22 11:43:42'),
(20, 'vee', 'PHPTest', 'wardcmedia@gmail.com', '07547823343', 'TEST', 'TEST', 1, '2022-06-22 12:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `latest_cards`
--

CREATE TABLE `latest_cards` (
  `id` int NOT NULL,
  `department` text NOT NULL,
  `title_name` varchar(100) DEFAULT NULL,
  `title_img` varchar(500) DEFAULT NULL,
  `headline` varchar(50) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `posted_img` varchar(500) DEFAULT NULL,
  `posted_date` date DEFAULT NULL,
  `posted_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `latest_cards`
--

INSERT INTO `latest_cards` (`id`, `department`, `title_name`, `title_img`, `headline`, `content`, `posted_img`, `posted_date`, `posted_by`) VALUES
(1, 'web', 'SCS Graduates May 2022', 'images/scs-graduates-may-Tfsc.jpg', 'SCS Graduates May 2022', 'Our unique SCS trainee scheme enables individuals of all experiences to develop their technical skil...', 'images/netmatters-ltd-VXAv.webp', '2022-06-07', 'Netmatters'),
(2, 'web', 'How Netmatters positively impacts the Environment', 'images/how-netmatters-positively-hvCd.jpg', 'How Netmatters Positively Impacts The Environ...', '#OnlyOneEarth “In the universe are billions of galaxies, In our galaxy are billions of planets, But...', 'images/netmatters-ltd-VXAv.webp', '2022-06-05', 'Netmatters'),
(3, 'marketing', 'What Are The Benefits of Google Analytics 4 Over Universal Analytics', 'images/what-are-the-5IGn.webp', 'What Are The Benefits of Google Analytics 4 O...', 'The deadline for switching to GA4 is closing in, with Universal Analytics no longer processing new d...', 'images/netmatters-ltd-VXAv.webp', '2022-06-01', 'Netmatters'),
(4, 'web', 'May 2022 Notables', 'images/may-notables-2022-eAop.jpg', 'May Notables 2022', 'Each month, every department recognises those who have gone above and beyond to deliver excellence w...', 'images/netmatters-ltd-VXAv.webp', '2022-06-08', 'Netmatters');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `addr1` varchar(500) NOT NULL,
  `addr2` varchar(50) NOT NULL,
  `addr3` varchar(50) NOT NULL,
  `addr4` varchar(50) NOT NULL,
  `postcode` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(100) NOT NULL,
  `map-src` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `name`, `addr1`, `addr2`, `addr3`, `addr4`, `postcode`, `phone`, `image`, `map-src`) VALUES
(1, 'Cambridge Office', 'Unit 1.28,', 'St John\'s Innovation Centre,', 'Cowley Road, Milton,', 'Cambridge,', 'CB4 0WS', '01223 37 57 72', 'images/cambridge.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.4465645445207!2d0.15166901635797414!3d52.23527197976131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8711469d7de59%3A0x4ad66f1b36a452da!2sNetmatters%20Cambridge!5e0!3m2!1sen!2suk!4v1654784516175!5m2!1sen!2suk'),
(2, 'Wymondham Office', 'Unit 15,', 'Penfold Drive,', 'Gateway 11 Business Park,', 'Wymondham, Norfolk,', 'NR18 0WZ', '01603 70 40 20', 'images/wymondham.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2424.6443793184762!2d1.1343817163663088!3d52.57604207982485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d9ddac8dba0b4b%3A0x9c77ffbfe7911dab!2sNetmatters!5e0!3m2!1sen!2suk!4v1654781787206!5m2!1sen!2suk'),
(3, 'Great Yarmouth Office', 'Suite F23,', 'Beacon Innovation Centre,', 'Beacon Park, Gorleston,', 'Great Yarmouth, Norfolk,', 'NR31 7RA', '01493 60 32 04', 'images/yarmouth-2.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2425.757984477359!2d1.7108708163658282!3d52.555902479820894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47da0593b311cec3%3A0x1cb3c1d4c0b340f6!2sNetmatters%20Great%20Yarmouth!5e0!3m2!1sen!2suk!4v1654781925879!5m2!1sen!2suk');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `marketing` tinyint(1) NOT NULL,
  `date_posted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `marketing`, `date_posted`) VALUES
(1, 'Will', 'will@email.com', 0, '2022-06-21 14:54:51'),
(2, 'Jenson', 'button@sky.com', 1, '2022-06-21 14:57:16'),
(3, 'Will', 'Will@email.com', 0, '2022-06-22 15:10:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_cards`
--
ALTER TABLE `latest_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `latest_cards`
--
ALTER TABLE `latest_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
