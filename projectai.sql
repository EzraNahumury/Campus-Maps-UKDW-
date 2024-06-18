-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 12:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectai`
--

-- --------------------------------------------------------

--
-- Table structure for table `connections_bidirectional`
--

CREATE TABLE `connections_bidirectional` (
  `node1` varchar(255) DEFAULT NULL,
  `node2` varchar(255) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connections_bidirectional`
--

INSERT INTO `connections_bidirectional` (`node1`, `node2`, `weight`) VALUES
('Agape', 'Filia', 2),
('Filia', 'Agape', 2),
('Filia', 'Euodia', 8),
('Euodia', 'Filia', 8),
('Agape', 'Biblos', 7),
('Biblos', 'Agape', 7),
('Biblos', 'Chara', 9),
('Chara', 'Biblos', 9),
('Chara', 'Didaktos', 9),
('Didaktos', 'Chara', 9),
('Euodia', 'Logos', 7),
('Logos', 'Euodia', 7),
('Euodia', 'Didaktos', 8),
('Didaktos', 'Euodia', 8),
('Euodia', 'Hagios', 10),
('Hagios', 'Euodia', 10),
('Didaktos', 'Gnosis', 9),
('Gnosis', 'Didaktos', 9),
('Gnosis', 'Hagios', 8),
('Hagios', 'Gnosis', 8),
('Logos', 'Hagios', 6),
('Hagios', 'Logos', 6),
('Hagios', 'Makarios', 7),
('Makarios', 'Hagios', 7),
('Makarios', 'Iama', 6),
('Iama', 'Makarios', 6),
('Logos', 'Iama', 6),
('Iama', 'Logos', 6),
('Iama', 'Koinonia', 8),
('Koinonia', 'Iama', 8),
('Logos', 'Koinonia', 8),
('Koinonia', 'Logos', 8),
('Logos', 'Ze', 9),
('Ze', 'Logos', 9),
('Ze', 'Koinonia', 10),
('Koinonia', 'Ze', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
