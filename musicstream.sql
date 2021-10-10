-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 07:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicstream`
--

-- --------------------------------------------------------

--
-- Table structure for table `musiclibrary`
--

CREATE TABLE `musiclibrary` (
  `id` int(255) NOT NULL,
  `songname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `artist` varchar(255) NOT NULL,
  `gener` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `musicurl` varchar(255) NOT NULL,
  `artwork` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musiclibrary`
--

INSERT INTO `musiclibrary` (`id`, `songname`, `author`, `artist`, `gener`, `language`, `duration`, `musicurl`, `artwork`, `timestamp`) VALUES
(1, 'Shayad', 'zeemusic.co', 'Arijit singh, pritam', 'bollywood', 'hindi', '4:08', 'musiclibrary/Shayad - Love Aaj Kal.mp3', 'artwork/Shayad.jpg', '2021-10-08 17:48:00'),
(2, 'ColdHeart', 'ENA REMIX', 'Elton John, Dua Lipa', 'pop', 'english', '4:14', 'musiclibrary/ColdHeart.mp3', 'artwork/ColdHeart.jpg', '2021-10-08 17:48:12'),
(3, 'Feels', ' Funk Wav Bounces Vol. 1', ' Katy Perry, Pharrell Williams, Big Sean', 'Dance/Electronic', 'english', '3:42', 'musiclibrary/Feels.mp3', 'artwork/Feels.jpg', '2021-10-08 18:40:03'),
(4, 'Deep End', 'time machine', 'Fousheé', 'R&B/Soul', 'english', '2:21', 'musiclibrary/DeepEnd.mp3', 'artwork/DeepEnd.jpg', '2021-10-09 08:49:04'),
(5, 'Levitating', 'Future Nostalgia', 'Dua Lipa, DaBaby', 'pop', 'english', '3:40', 'musiclibrary/Levitating.mp3', 'artwork/Levitating.jpg', '2021-10-09 19:33:38'),
(6, 'Roses', 'Collection One', 'SAINt JHN', 'Hip-Hop/Rap', 'english', '2:54', 'musiclibrary/Roses.mp3', 'artwork/Roses.jpg', '2021-10-09 19:38:19'),
(7, 'Lemonade', 'Internet money', 'Don Toliver, Gunna', 'pop', 'english', '3:15', 'musiclibrary/Lemonade.mp3', 'artwork/Lemonade.jpg', '2021-10-10 17:48:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musiclibrary`
--
ALTER TABLE `musiclibrary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musiclibrary`
--
ALTER TABLE `musiclibrary`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
