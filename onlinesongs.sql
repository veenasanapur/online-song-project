-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 02:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinesongs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(45) DEFAULT NULL,
  `artist_biography` text DEFAULT NULL,
  `artist_details` varchar(45) DEFAULT NULL,
  `artist_photo` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_biography`, `artist_details`, `artist_photo`, `user_id`) VALUES
(13, 'fasdf', 'sadfads', NULL, '1619696955_54121815041431_Folder.jpg', 1),
(23, 'veena', 'lkajdlkajs', NULL, '1688380709_62016462259924_ganpati.jpg', 7),
(26, 'sanjith hegde', 'Born in Bangalore, karnataka, india\r\nGenres - Hindustani Classical, Pop, R&B and Rock\r\nOccupation - Singer and Songwriter', NULL, '1688662673_37064555531075_5.jpg', 9),
(27, 'Arjith Sing', 'orn:25 April 1987 (age 36)\r\nJiaganj, Murshidabad, West Bengal, India\r\n\r\nAlma mater:Sripat Singh College.\r\n\r\nOccupations:Singercomposermusic producer.\r\n\r\nYears active:2005–present.\r\n\r\nSpouse:Koel Roy Singh ​(m. 2014)​.\r\n\r\nAwards:List of awards.\r\n\r\nMusical career\r\nGenres:FilmiSufiQawwaliWestern classical musicRabindra SangeetPopFolkIndian Classical MusicEDM GhazalsIndian classical.\r\n\r\nLabels:Oriyon MusicZee Music CompanyT-SeriesSony Music IndiaMuslux StudioYRF MusicEros MusicTips.', NULL, '1688804319_42479376871684_2.jpg', 7),
(28, 'Darshan raval', 'Darshan Raval is an Indian singer, composer, and songwriter. He is known for his work in different languages including Hindi, Gujarati, Punjabi and Bengali. In 2014, he participated in the StarPlus music reality show, India\'s Raw Star, finishing as the first runner-up.', NULL, '1691162669_68067374122727_dershan.jpg', 7),
(29, 'vijay prakash', 'Vijay Prakash performing at Karnatak college Dharwad\r\nBorn	21 February 1976 (age 47)\r\nMysuru, Mysuru district, Karnataka, India\r\nAlma mater	Sri Jayachamarajendra College of Engineering, Mysore, Karnataka, India\r\nOccupation	Singer\r\nYears active	1997–present', NULL, '1691163906_58811097843401_v.jpg', 9),
(32, 'suraj', 'Suraj was a student in svs college ilkal', NULL, '1693800665_86515463410457_On_a_Journey11311_rectangle_20221030_102424_657_77.jpg', 17);

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `download_time` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`download_id`, `user_id`, `song_id`, `download_time`) VALUES
(17, 7, 40, '1688663055'),
(18, 7, 40, '1688720849'),
(19, 7, 40, '1688720889'),
(20, 7, 40, '1688721034'),
(21, 7, 40, '1688721364'),
(22, 7, 40, '1688721398'),
(23, 7, 40, '1688723905'),
(24, 9, 58, '1691164323'),
(25, 9, 58, '1691164390'),
(26, 9, 58, '1691164391'),
(27, 9, 58, '1691164411'),
(28, 9, 58, '1691164434'),
(29, 9, 58, '1691164475'),
(30, 9, 58, '1691164531'),
(31, 9, 58, '1691164531'),
(32, 9, 58, '1691164532'),
(33, 9, 58, '1691164532'),
(34, 9, 58, '1691164572'),
(35, 9, 58, '1691164590'),
(36, 9, 58, '1691164711'),
(37, 9, 58, '1691164729'),
(38, 9, 58, '1691164740'),
(39, 9, 58, '1691164752'),
(40, 9, 58, '1691164789'),
(41, 9, 58, '1691164832'),
(42, 9, 58, '1691164853'),
(43, 9, 58, '1691164915'),
(44, 9, 58, '1691164945'),
(45, 9, 58, '1691164946'),
(46, 9, 58, '1691165045'),
(47, 9, 58, '1691165076'),
(48, 9, 58, '1691165197'),
(49, 7, 60, '1691165607'),
(50, 15, 56, '1691166626'),
(51, 15, 56, '1691166642'),
(52, 15, 40, '1691166872'),
(53, 15, 40, '1691166974'),
(54, 15, 40, '1691166992'),
(55, 15, 56, '1691167037'),
(56, 15, 56, '1691167091'),
(57, 15, 56, '1691167091'),
(58, 15, 56, '1691167091'),
(59, 15, 40, '1691167103'),
(60, 15, 56, '1691167143'),
(61, 15, 56, '1691167144'),
(62, 15, 56, '1691167144'),
(63, 15, 56, '1691167144'),
(64, 15, 56, '1691167144'),
(65, 15, 40, '1691167153'),
(66, 9, 60, '1691315477'),
(67, 9, 55, '1691852101');

-- --------------------------------------------------------

--
-- Table structure for table `karoke`
--

CREATE TABLE `karoke` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `music` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `songs_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `songs_id`, `user_id`) VALUES
(3, 36, 7);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_mp3` varchar(1000) DEFAULT NULL,
  `song_photo` text DEFAULT NULL,
  `song_date` text DEFAULT NULL,
  `aritst_id` int(11) DEFAULT NULL,
  `song_name` varchar(225) NOT NULL,
  `verify` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` varchar(30) NOT NULL,
  `subtitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `song_mp3`, `song_photo`, `song_date`, `aritst_id`, `song_name`, `verify`, `user_id`, `type_id`, `subtitle`) VALUES
(36, '1691162848_3071425639164_15.mp3', '1691162848_7050614707978_11.png', NULL, 28, 'Mujhe Khone Ke Baad', 1, 7, 'pop', ''),
(40, '1688662939_1903025143442_6.mp3', '1688662939_6591268575509_6.jpg', NULL, 26, 'Amar_marethuhoyithe', 1, 9, 'movies', ''),
(55, '1691162941_1032575645383_01_-_Salamat_-_DownloadMing.SE.mp3', '1691162941_22661154408222_5.png', NULL, 27, ' Salamat ', 1, 7, 'movies', ''),
(56, '1691163538_62002472201901_02_-_Main_Dhoondne_Ko_Zamaane_Mein_-_DownloadMing.SE.mp3', '1691163538_79837308853713_heartless-2014-hindi-review.jpg', NULL, 27, 'Heartless-Main Dhoondne Ko Zamaane Mein', 1, 7, 'movies', ''),
(57, '1691164084_29360739474090_singar.mp3', '1691164084_94107968234670_k.jpg', NULL, 29, 'Singara siriye', 1, 9, 'movies', ''),
(58, '1691164219_89785382162433_san.mp3', '1691164219_46732313641786_s.jpg', NULL, 29, 'Sanchariyagu Nee', 1, 9, 'movies', ''),
(59, '1691167313_8622471454288_1688638818_16481668386788_4.mp3', '1691167313_4986284690257_1688638818_46845347700178_3.png', NULL, 26, 'Belakina kavithe', 1, 9, 'movies', ''),
(60, '1691165700_2010015220408_Shayad.mp3', '1691165551_14713267011918_Shayad-Film-Version-From-Love-Aaj-Kal--Hindi-2021-20210325204139-500x500.jpg', NULL, 27, 'Shayad', 1, 7, 'movies', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `reg_date` varchar(45) DEFAULT NULL,
  `last_seen` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `verify` int(11) NOT NULL,
  `code` varchar(40) NOT NULL,
  `block_status` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phonenumber` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `reg_date`, `last_seen`, `email`, `verify`, `code`, `block_status`, `gender`, `phonenumber`) VALUES
(1, 'mahi.manthu10@gmail.com', '$2a$04$QCaFtVy9Ng65WReucvAjD.4B3VAIjV4y4QoK6n4z8kdYMXVyzSROK', 'MAHANTESH', NULL, '2021-03-24', '2021-05-12', '', 0, '', 0, '', 0),
(2, 'jobs.manthu10@gmail.com', '$2a$04$QCaFtVy9Ng65WReucvAjD.4B3VAIjV4y4QoK6n4z8kdYMXVyzSROK', 'MAHANTESH', NULL, '2021-03-24', '2021-04-26', '', 0, '', 0, '', 0),
(3, 'vj@gmail.com', '$2y$10$RQem.J2oPmwsPO19ZMwIUuvXucPPuMJ//PTYxPrKR09fxs.LcqO0G', 'vj', NULL, '2021-03-24', '2021-03-24', '', 0, '', 0, '', 0),
(7, 'veena_sanapur', '$2a$04$4mZrqYT/lfDNCpyqCb4zPuGdvC85Ru7emFNw6pDxceizUuwtEP8ka', 'veena', 'sanapur', '2023-06-28', '2023-09-07', 'veenasanapur@gmail.com', 0, '', 0, 'female', 1234567890),
(9, 'rahul_diddi', '$2a$04$JHqgW00RQOl22NCfIJwp2OnuXL/vwE91tDSkk2DobNvB41T8pI.hO', '', 'diddi', '2023-07-06', '2023-09-09', 'rahuldiddi5532@gmail.com', 0, '', 0, 'male', 1234567890),
(11, 'vishwa_sanga', '$2a$04$M8T0SrilwUBt3P9QYY5Us.2UPRTAZi4IpCISfJv/Wk5iBW60ydcGq', 'vishwa', 'sanga', '2023-07-07', '2023-07-07', '', 0, '', 0, 'male', 0),
(12, 'basu_sajjan', '$2a$04$xuj8BhoqOYHLsd6YE6izT.XIA0Sb3n3F7vIm5GmvJJ7DklpFv02Xe', 'basu', 'sajjan', '2023-07-08', '2023-07-08', '', 0, '', 0, 'male', 0),
(13, 'mari_swami', '$2y$10$vAs.QV4l9kh0acFYJ85tY.NyLOIdGPRciyBWTvKoDj3ODfTm2RP1q', 'mari', 'swami', '2023-08-04', '2023-08-13', 'mariswami@gmail.com', 0, '', 0, 'male', 1234567890),
(15, 'nayan_diddi', '$2y$10$Cs6aJS.0Rdixfl2qAStgzuctOCs.uZHVSQ5N/Y/ZgvevT7nmvWIie', 'nayan', 'diddi', '2023-08-04', '2023-08-04', 'nayandiddi@gmail.com', 0, '', 0, 'male', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `view_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `song_id` int(11) DEFAULT NULL,
  `view_time` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`view_id`, `user_id`, `song_id`, `view_time`) VALUES
(10, 9, 40, '1688662943'),
(11, 11, 40, '1688729598'),
(13, 7, 55, '1691162971'),
(14, 15, 56, '1691166623'),
(15, 13, 40, '1691932340');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`download_id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `karoke`
--
ALTER TABLE `karoke`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_id` (`songs_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `aritst_id` (`aritst_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`view_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `song_id` (`song_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `download_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `karoke`
--
ALTER TABLE `karoke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `ss_id` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`),
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `karoke`
--
ALTER TABLE `karoke`
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `song_id` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`song_id`),
  ADD CONSTRAINT `user_idd` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `artist` FOREIGN KEY (`aritst_id`) REFERENCES `artist` (`artist_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `s_id` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
