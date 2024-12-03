-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 07:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registracija`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `drzava` varchar(50) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `ulica` varchar(100) NOT NULL,
  `datum_rodenja` date NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `uloga` enum('administrator','editor','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `email`, `drzava`, `grad`, `ulica`, `datum_rodenja`, `lozinka`, `korisnicko_ime`, `uloga`) VALUES
(14, 'Luka', 'Sirotkovic', 'lukasirotkovic5@gmail.com', 'Slovenija', 'Samobor', 'M.Korvina 44', '2222-02-22', '$2y$10$H8fBJAi8/ZrVD4TwkS7kXOUfjqQWHs2uMfH8x4bwnuGhayPzJluX2', 'lsirotkovic', 'user'),
(15, 'admin', 'admin', 'admin@example.com', 'Slovenija', 'Zagreb', 'Adminova 1', '2002-02-21', '$2y$10$DGJzhqmUYtpmRuZqPmiEt.Xkj/Nggwscdl10xODCQq6gWAJtruaO6', 'aadmin', 'administrator'),
(16, 'editor', 'editor', 'editor@example.com', 'Njemačka', 'Samobor', 'Editorova 2', '2001-08-07', '$2y$10$JJDbYtPbInUK3D2WIQR2TuVDktJhrXNBT3Zn8psYkf678wK2XSDhO', 'eeditor', 'editor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
