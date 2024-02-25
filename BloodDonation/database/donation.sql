-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2024 at 05:54 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `blooddonationappointment`
--

DROP TABLE IF EXISTS `blooddonationappointment`;
CREATE TABLE IF NOT EXISTS `blooddonationappointment` (
  `appointmentID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `bloodType` varchar(5) DEFAULT NULL,
  `cityTown` varchar(255) NOT NULL,
  `bloodDonationCenter` varchar(255) NOT NULL,
  `previousDonations` varchar(3) NOT NULL,
  `lastDonationDate` date NOT NULL,
  `healthConditions` text,
  `preferredContact` varchar(10) NOT NULL,
  `availability` varchar(255) DEFAULT NULL,
  `donationFrequency` varchar(10) NOT NULL,
  `additionalComments` text,
  `submissionDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`appointmentID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blooddonationappointment`
--

INSERT INTO `blooddonationappointment` (`appointmentID`, `userID`, `fullName`, `email`, `phoneNumber`, `gender`, `age`, `bloodType`, `cityTown`, `bloodDonationCenter`, `previousDonations`, `lastDonationDate`, `healthConditions`, `preferredContact`, `availability`, `donationFrequency`, `additionalComments`, `submissionDate`) VALUES
(14, 10, 'Mohamed khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'O+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'yes', '2022-12-31', 'no', 'phone', 'morning', 'once', 'i would like to donate as soon as possible', '2024-02-25 16:35:03'),
(15, 10, 'Mohamed Khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'adagir', 'Center2A', 'no', '0000-00-00', '', 'email', '', 'once', '', '2024-02-25 16:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `registration_date`, `usertype`) VALUES
(1, 'mohamed', 'Donate@maroc.com', '$2y$10$svBA9ujxmJcw17TGeHRpwe4fY4qYmJ.iwn.IM0eJZEQ0zfUGHqBr.', '2024-02-24 19:52:19', 'admin'),
(2, 'root', 'root@donate.com', '$2y$10$7QchDA/ZqSZ2dYMsfpjVIuUMFPLgP0rmiNOnp3XGYDMpFnuyUpAKC', '2024-02-22 17:29:45', 'admin'),
(10, 'med', 'yasin@gamil.com', '$2y$10$Yd2pECIywbIilDSF0o4SJe4xK2u1dryNmi1YD.aBrr9/byJ/y18fK', '2024-02-24 20:13:16', 'user'),
(11, 'khalid', 'khalid@gmail.com', '$2y$10$1W0lcsO3yziZtD0J00XmUeCJAZ9lcZzbY4gSZ.UWrEh0DoYK84nuS', '2024-02-22 19:30:31', 'user'),
(12, 'lahcen', 'lahcen@email.com', '$2y$10$vja/Hkr5C1q/cYHxGQyZwu2rmSCwGcWdcevF1CmS4nldJNy1a7kve', '2024-02-22 19:48:01', 'user'),
(13, 'user', 'user@donate.com', '$2y$10$ZQCDcFvgfVrU6EnqP1PFTO6zUrAjREmcAbPwxeBlW./FFKLDqOgqe', '2024-02-22 20:15:30', 'user'),
(14, 'meed', 'med@gamil.com', '$2y$10$tdO0KPa.85sZKshU0ziFlOV5/MKpwIm/Lyq3kNQki.WRwUa58WmMi', '2024-02-23 10:24:58', 'user'),
(15, 'khacha', 'mohamed@gmail.com', '$2y$10$B0nykxb.25OCKJxOyCczpORcOL8uupC5I.DccAQBFzThewWunzIi.', '2024-02-23 10:27:02', 'user'),
(16, 'medd', 'mohamed@exemple.com', '$2y$10$KaZgEX87jCUxKuXG8.99oOpJvlu7NbjPdskquz0HMhzaDc6l1r5CW', '2024-02-23 10:41:46', 'user'),
(17, 'josef', 'josef@hotmail.com', '$2y$10$CA6Lv/o2cyTG.J1X3g0Egu41.veudJBRMcngYDQ4f9fImPJchvaMO', '2024-02-23 10:44:24', 'user'),
(18, 'centre', 'centre@donate.com', '$2y$10$wglCwus0vzk3J9e34d/EBuautwTCVOx6..B4OfJm7kKSUvfyRC2Q.', '2024-02-23 10:48:57', 'user'),
(20, 'fatima', 'fatima@gmail.com', '$2y$10$B9MDJ/SjVNyjhw9gRWpPIeCRUW5fbqh7YR0HRwrrPtqlJI9veldoG', '2024-02-23 10:55:10', 'user'),
(21, 'mohamede', 'mohamedkhacha99@gmail.com', '$2y$10$KfNfIzhgWVAlV8dNkWs8wOet7GKso8JHtF0XXRhlr8KyKeSrNw5xi', '2024-02-23 11:03:37', 'user'),
(32, 'frank', 'frank@email.com', '$2y$10$12YXDyyPOyBRCTLUNZF4JetP0Fazdr7tAvnjfBsDM.wASitHpGF3y', '2024-02-24 20:11:37', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
