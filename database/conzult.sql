-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2019 at 04:59 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `conzult`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('lrrn', 'lrrn');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(255) NOT NULL,
  `companyname` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `companyname`, `email`, `password`, `phone`) VALUES
(1, 'UTC', 'utc@gmail.com', '52d33cb937bbdab234ab1729a0f8225b', 781223345),
(2, 'KCT', 'kct@gmail.com', 'b3a62bf700481ecc4700e5913d2e4361', 786655441),
(3, 'MKU', 'mku@gmail.com', '8b1753bd5706fff3c62c790e4707f441', 788664132);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `ID` int(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `consultantname` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`ID`, `companyname`, `consultantname`, `department`, `duration`) VALUES
(1, 'KCT', 'Sam', 'Financial Advisory consultant', '3 months'),
(2, 'UTC', 'Mike', 'IT consultant', '5 months');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(255) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Phone` decimal(13,0) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Event_name` varchar(255) NOT NULL,
  `Event_place` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Event_date` date NOT NULL,
  `Event_duration` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `Names`, `Phone`, `Email`, `Event_name`, `Event_place`, `Price`, `Event_date`, `Event_duration`, `Status`) VALUES
(1, 'usanase lorraine', '78754346', 'lorrusanase96@gmail.com', 'conference', 'Bar', 'Bar', '2019-05-23', '03pm-08pm', 'Accepted'),
(2, 'uwase divine', '788908796', 'uwasedivine@gmail.com', 'party', 'Hall', 'Hall=150000', '2019-07-04', '08pm-10pm', 'Not Accepted'),
(3, 'nkinzingabo yannick', '789654320', 'nkinzingabo@gmail.com', 'birthday party', 'Bar', 'Bar=50000', '2019-05-05', '01pm-04pm', 'Accepted'),
(4, 'kwizera  samuel', '784563728', 'kwizeralsamuel@gmail.com', 'conference', 'Hall', 'Hall=150000', '2019-04-30', '11am-01pm', 'WAIT'),
(5, 'ayinkamiye solange', '788908796', 'solange_ayinkamiye@gmail.com', 'weeding', 'Garden', 'Garden=350000', '2019-08-11', '05pm-23pm', 'Not Accepted'),
(6, 'bahati  patrick', '786543210', 'snowdevin@gmail.com', 'birthday party', 'Bar', 'Bar=50000', '2019-09-29', '06pm-09pm', 'WAIT');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(255) NOT NULL,
  `Names` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `Names`, `Email`, `Message`) VALUES
(1, 'lorraine', 'lorrusanase96@gmail.com', 'thank you for your kindness and for how you takecare of client'),
(2, 'uwase divine', 'uwasedivine@gmail.com', 'thank you for your service it perfectly better'),
(3, 'nkinzingabo', 'nkinzingabo@gmail.com', 'i appreciate all your services '),
(4, 'patrick', 'snowdevin@gmail.com', 'the party that i was there it was incredible and perfect with the service you offer it become amazing.');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(255) NOT NULL,
  `rates` int(255) NOT NULL,
  `dislike` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ID`, `rates`, `dislike`) VALUES
(1, 7, 0),
(2, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `consultantname` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `companyname`, `consultantname`, `duration`, `request`) VALUES
(5, 'KCT', 'Sam', '3 months', 'we would like to hire this consultant.\r\nThanks.'),
(6, 'UTC', 'Mike', '5 months', 'we would like to hire this consultant.'),
(7, 'isco', 'cyber ', '2 months', '*****?\''),
(8, 'KCT', 'Patrick', '1 week', 'we would like to work with this consultant.'),
(9, 'MKU', 'ESpe', '2 months', 'we would like to hire this consultant'),
(10, 'KCT', 'Sam', '5 months', 'hire');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `email`, `pass`, `status`) VALUES
(1, 'nms@nm.nnm', 'ms,a', ''),
(2, 'grace@gmail.com', 'grace=ced', ''),
(3, 'new@gmail.com', 'new', 'available'),
(4, 'new@gmail.com', 'new', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `firstname`, `lastname`, `username`, `availability`, `Department`, `email`, `phone`, `password`, `description`, `message`) VALUES
(2, 'admin', 'admin', 'admin', '', '', 'admin@gmail.com', '0789990001', '21232f297a57a5a743894a0e4a801fc3', '', ''),
(3, 'Kwizera', 'Sam', 'Samuel', 'Available', 'Strategy consultant', 'kwizera@gamail.com', '0788994433', 'd8ae5776067290c4712fa454006c8ec6', 'I am a strategy consultant and i work for MM consultancy agency.', ''),
(4, 'Usanase', 'Loraine', 'Loraine', 'Available', 'Financial Advisory consultant', 'lor@gmail.com', '07866554433', '4164401440132400f6e460db2b56509f', 'I am a Financial Advisory Consultant and i am self employed.', ''),
(5, 'Abatoni', 'Bella', 'Angel', 'Available', 'Management consultant', 'angelb@gmail.com', '0785556662', 'f4f068e71e0d87bf0ad51e6214ab84e9', 'i am a management consultant and i am self employed', ''),
(6, 'Mutoni', 'Esperance', 'Espe', 'Available', 'Management consultant', 'mespe@gmail.com', '0786655446', 'cbd95cdb45061d76fafc021f5915841e', 'I am a management consultant and i  am self employed', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `confirm`
--
ALTER TABLE `confirm`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
