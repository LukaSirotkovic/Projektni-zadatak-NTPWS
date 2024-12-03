-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 07:43 PM
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
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) NOT NULL,
  `tekst` text NOT NULL,
  `datum_objave` datetime DEFAULT current_timestamp(),
  `autor_id` int(11) NOT NULL,
  `arhivirano` tinyint(1) DEFAULT 0,
  `odobreno` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `naslov`, `tekst`, `datum_objave`, `autor_id`, `arhivirano`, `odobreno`) VALUES
(4, 'Pero Perić položio vozački ispit?', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lectus nunc, fringilla sed mattis nec, mollis consequat turpis. Morbi id felis pulvinar, congue felis eu, fermentum orci. Duis at justo ut leo vestibulum dapibus. In commodo eleifend facilisis. Nunc in elit aliquet, consequat velit ut, mattis sem. Vestibulum non arcu nibh. Aenean vestibulum in mauris in pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed eleifend lorem at est ultricies, non dignissim ipsum cursus. In quis dolor mattis, laoreet velit a, fringilla arcu. Proin blandit odio eget pretium placerat.', '2024-12-03 18:39:38', 14, 0, 1),
(5, 'Divlje životinje u Divljini?', 'Nulla eu magna quis urna varius euismod. Etiam a commodo ex. Phasellus tempus lectus varius urna ullamcorper, ac eleifend nisi accumsan. Mauris eget enim metus. Maecenas dignissim nunc et velit faucibus mollis vitae aliquam nulla. Proin eleifend tristique elit, eget congue tellus euismod id. Nulla eget dui rhoncus, dictum arcu a, auctor libero. Pellentesque aliquam mi a risus fermentum, non blandit quam volutpat. Donec posuere scelerisque lacinia. Fusce nec libero posuere, condimentum ante at, ullamcorper diam. Pellentesque in lectus ultricies, pellentesque massa vel, fermentum ante. Ut pulvinar sem nisi, non consequat neque consequat id. Phasellus viverra orci lectus, et laoreet velit commodo ac. Donec neque ante, bibendum ac dignissim vel, tincidunt ac sapien. Sed id turpis mattis, ornare libero porttitor, sollicitudin mauris. Cras vel tortor enim.', '2024-12-03 18:50:37', 14, 0, 0),
(6, 'Tko to kuha ručak?', 'Vestibulum id massa libero. Curabitur vitae tellus in nibh fringilla sodales sed et sapien. Donec ante nisl, vehicula vitae pretium eu, porta vitae ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec finibus in nibh id pretium. Suspendisse pulvinar, arcu vitae interdum aliquam, ante nibh viverra velit, vel porta nunc risus vehicula est. Duis semper lacus sit amet auctor pulvinar. Praesent sodales pharetra ligula, at mattis justo gravida et.', '2024-12-03 19:36:52', 14, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autor_id` (`autor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD CONSTRAINT `fk_autor_id` FOREIGN KEY (`autor_id`) REFERENCES `korisnici` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
