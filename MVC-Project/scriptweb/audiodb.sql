-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 03:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audiodb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentlinking`
--

CREATE TABLE `commentlinking` (
  `commentName` varchar(1000) DEFAULT NULL,
  `idSong` int(11) NOT NULL,
  `idComment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentlinking`
--

INSERT INTO `commentlinking` (`commentName`, `idSong`, `idComment`) VALUES
('a', 1, 0),
('a', 2, 1),
('a', 2, 2),
('a', 3, 3),
('a', 4, 4),
('a', 5, 5),
('a', 6, 6),
('a', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `locationlinking`
--

CREATE TABLE `locationlinking` (
  `locationName` varchar(500) DEFAULT NULL,
  `songId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locationlinking`
--

INSERT INTO `locationlinking` (`locationName`, `songId`, `locationId`) VALUES
('a', 0, 0),
('a', 1, 0),
('a', 2, 0),
('a', 3, 0),
('a', 4, 0),
('', 5, 0),
('a', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `tagId` int(11) DEFAULT NULL,
  `commentId` int(11) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `educationLevel` varchar(100) DEFAULT NULL,
  `zoneType` varchar(100) DEFAULT NULL,
  `goodForGroups` varchar(100) DEFAULT NULL,
  `locationId` int(11) DEFAULT NULL,
  `mood` varchar(100) DEFAULT NULL,
  `habitatType` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `description`, `name`, `length`, `author`, `tagId`, `commentId`, `genre`, `date`, `age`, `educationLevel`, `zoneType`, `goodForGroups`, `locationId`, `mood`, `habitatType`) VALUES
(0, 'a', 'a', 1, 'a', 0, 0, 'Pop', '2021-06-01', '1', 'High', 'Mountain', 'yes', 0, 'Happy', 'Rural'),
(1, 'a', 'b', 1, 'a', 0, 0, 'Electronic', '2021-06-01', '1', 'High', 'Mountain', 'yes', 0, 'Happy', 'Rural'),
(2, 'a', 'Back in Black', 3, 'AC\\DC', 2, 2, 'Rock', '2012-11-07', '8', 'High', 'Seaside', 'no', 1, 'Happy', 'Urban'),
(3, 'a', 'We are The Champions', 3, 'Queen', 3, 3, 'Rock', '2011-08-01', '7', 'Low', 'Mountain', 'yes', 2, 'Happy', 'Urban'),
(4, 'a', 'Rap God', 6, 'Eminem', 4, 4, 'Rap', '2013-11-27', '9', 'Low', 'Seaside', 'no', 2, 'Angry', 'Urban'),
(5, 'a', 'c', 1, 'a', 5, 5, 'Pop', '2017-01-13', '4', 'High', 'Mountain', 'yes', 0, 'Happy', 'Rural'),
(6, 'a', 'Billie Jean', 5, 'Michael Jackson', 6, 6, 'Pop', '2009-10-03', '20', 'High', 'Mountain', 'Yes', 1, 'Happy', 'Urban'),
(7, 'a', 'A lalala long', 4, 'Bob Marley', 7, 7, 'Reggae', '2010-03-15', '30', 'Low', 'Seaside', 'yes', 0, 'Relaxed', 'Rural');

-- --------------------------------------------------------

--
-- Table structure for table `taglinking`
--

CREATE TABLE `taglinking` (
  `tagName` varchar(500) DEFAULT NULL,
  `idSong` int(11) DEFAULT NULL,
  `idTag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taglinking`
--

INSERT INTO `taglinking` (`tagName`, `idSong`, `idTag`) VALUES
('a', 0, 0),
('a', 5, 1),
('Saudio', 2, 2),
('Saudio', 3, 3),
('Saudio', 4, 4),
('Saudio', 5, 5),
('Saudio', 6, 6),
('a', 7, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentlinking`
--
ALTER TABLE `commentlinking`
  ADD PRIMARY KEY (`idSong`,`idComment`);

--
-- Indexes for table `locationlinking`
--
ALTER TABLE `locationlinking`
  ADD PRIMARY KEY (`songId`,`locationId`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taglinking`
--
ALTER TABLE `taglinking`
  ADD UNIQUE KEY `tagLinking_pk` (`idSong`,`idTag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentlinking`
--
ALTER TABLE `commentlinking`
  ADD CONSTRAINT `commentLinking_songs_id_fk` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`);

--
-- Constraints for table `locationlinking`
--
ALTER TABLE `locationlinking`
  ADD CONSTRAINT `locationLinking_songs_id_fk` FOREIGN KEY (`songId`) REFERENCES `songs` (`id`);

--
-- Constraints for table `taglinking`
--
ALTER TABLE `taglinking`
  ADD CONSTRAINT `tagLinking_songs_id_fk` FOREIGN KEY (`idSong`) REFERENCES `songs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
