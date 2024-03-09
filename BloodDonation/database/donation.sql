-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2024 at 09:28 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blooddonationappointment`
--

INSERT INTO `blooddonationappointment` (`appointmentID`, `userID`, `fullName`, `email`, `phoneNumber`, `gender`, `age`, `bloodType`, `cityTown`, `bloodDonationCenter`, `previousDonations`, `lastDonationDate`, `healthConditions`, `preferredContact`, `availability`, `donationFrequency`, `additionalComments`, `submissionDate`) VALUES
(14, 10, 'Mohamed khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'O+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'yes', '2022-12-31', 'no', 'phone', 'morning', 'once', 'i would like to donate as soon as possible', '2024-02-25 16:35:03'),
(73, 10, 'Khalid esabery', 'khalid@gmail.com', '0613192572', 'male', 24, 'O-', 'fes', 'Centre Régional de Transfusion Sanguine - fes', 'no', '0000-00-00', 'no', 'email', 'Evenings', 'once', 'thanks', '2024-02-27 20:56:36'),
(74, 2, 'yassine essabery', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', 'thanks for your service', '2024-03-07 18:34:59'),
(75, 2, 'Khalid esabery', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-07 18:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `blooddrive`
--

DROP TABLE IF EXISTS `blooddrive`;
CREATE TABLE IF NOT EXISTS `blooddrive` (
  `DriveID` int NOT NULL,
  `DriveDate` date DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Organizer` varchar(100) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `ContactEmail` varchar(100) DEFAULT NULL,
  `ContactPhone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DriveID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_center`
--

DROP TABLE IF EXISTS `blood_center`;
CREATE TABLE IF NOT EXISTS `blood_center` (
  `center_id` int NOT NULL AUTO_INCREMENT,
  `center_name` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`center_id`),
  KEY `fk_user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blood_center`
--

INSERT INTO `blood_center` (`center_id`, `center_name`, `address`, `city`, `zip_code`, `phone_number`, `email`, `registration_date`, `user_id`) VALUES
(11, 'mohamed', 'imider/tinghir', 'imider', '45800', '0653206661', 'mohamedkhacha99@gmail.com', '2024-03-08 22:53:09', 11),
(16, 'CenterAbc', 'Center a agadir', 'agadir', '45800', '0653206661', 'mohamedkhacha99@gmail.com', '2024-03-09 09:14:46', 38);

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

DROP TABLE IF EXISTS `blood_requests`;
CREATE TABLE IF NOT EXISTS `blood_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `blood_type` varchar(5) NOT NULL,
  `urgency` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `contact` varchar(255) NOT NULL,
  `submission_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `patient_name`, `blood_type`, `urgency`, `city`, `hospital`, `contact`, `submission_time`) VALUES
(1, 'Mohamed Khacha', 'none', 'High', 'Agadir', '', 'mohamedkhacha@gmail.com', '2024-02-29 13:30:02'),
(2, 'Mohamed ', 'none', 'High', 'Agadir', '', 'mohamedkhacha@gmail.com', '2024-02-29 13:31:13'),
(3, 'Mohamed ', 'none', 'High', 'Agadir', '', 'mohamedkhacha@gmail.com', '2024-02-29 13:34:43'),
(4, 'med ben omar', 'none', 'High', 'agadir', '', '0653206661', '2024-02-29 13:44:25'),
(5, 'Mohamed ', 'none', 'High', 'tinghir', '', '0653206661', '2024-02-29 13:45:03'),
(6, 'Mohamed Khacha', 'O+', 'High', 'agadir', '', 'mohamedkhacha@gmail.com', '2024-02-29 13:52:42'),
(7, 'Mohamed Khacha', 'O+', 'High', 'Agadir', '', '0653206661', '2024-03-07 18:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `submission_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `phone`, `email`, `comment`, `submission_time`) VALUES
(1, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey admin', '2024-03-06 09:54:59'),
(2, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey admin', '2024-03-06 09:55:06'),
(3, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey admin', '2024-03-06 10:00:16'),
(4, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey', '2024-03-06 10:00:42'),
(5, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey', '2024-03-06 10:31:36'),
(6, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'hey', '2024-03-06 10:34:50'),
(7, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'd', '2024-03-06 10:38:39'),
(8, 'mohamed khacha', '0653206661', 'mohamedkhacha99@gmail.com', 'heey', '2024-03-06 17:19:53');

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
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `registration_date`, `usertype`) VALUES
(1, 'mohamed', 'Donate@maroc.com', '$2y$10$svBA9ujxmJcw17TGeHRpwe4fY4qYmJ.iwn.IM0eJZEQ0zfUGHqBr.', '2024-03-01 11:08:48', 'admin'),
(2, 'root', 'root@donate.com', '$2y$10$7QchDA/ZqSZ2dYMsfpjVIuUMFPLgP0rmiNOnp3XGYDMpFnuyUpAKC', '2024-02-25 18:47:53', 'admin'),
(10, '0khacha', 'yasin@gamil.com', '$2y$10$ksLBOLxxMvgiZXPhJR7LgOCI4pe68K8S1DuyFw.cQmqKIgLH8YIv.', '2024-03-08 22:56:08', 'user'),
(11, 'khalid', 'khalid@gmail.com', '$2y$10$1W0lcsO3yziZtD0J00XmUeCJAZ9lcZzbY4gSZ.UWrEh0DoYK84nuS', '2024-03-08 22:56:14', 'user'),
(12, 'lahcen', 'lahcen@email.com', '$2y$10$vja/Hkr5C1q/cYHxGQyZwu2rmSCwGcWdcevF1CmS4nldJNy1a7kve', '2024-02-22 19:48:01', 'user'),
(13, 'user', 'user@donate.com', '$2y$10$ZQCDcFvgfVrU6EnqP1PFTO6zUrAjREmcAbPwxeBlW./FFKLDqOgqe', '2024-03-08 21:04:44', 'center'),
(14, 'meed', 'med@gamil.com', '$2y$10$tdO0KPa.85sZKshU0ziFlOV5/MKpwIm/Lyq3kNQki.WRwUa58WmMi', '2024-02-23 10:24:58', 'user'),
(15, 'khacha', 'mohamed@gmail.com', '$2y$10$B0nykxb.25OCKJxOyCczpORcOL8uupC5I.DccAQBFzThewWunzIi.', '2024-02-23 10:27:02', 'user'),
(16, 'medd', 'mohamed@exemple.com', '$2y$10$KaZgEX87jCUxKuXG8.99oOpJvlu7NbjPdskquz0HMhzaDc6l1r5CW', '2024-02-23 10:41:46', 'user'),
(17, 'josef', 'josef@hotmail.com', '$2y$10$CA6Lv/o2cyTG.J1X3g0Egu41.veudJBRMcngYDQ4f9fImPJchvaMO', '2024-02-23 10:44:24', 'user'),
(18, 'centre', 'centre@donate.com', '$2y$10$wglCwus0vzk3J9e34d/EBuautwTCVOx6..B4OfJm7kKSUvfyRC2Q.', '2024-02-23 10:48:57', 'user'),
(20, 'fatima', 'fatima@gmail.com', '$2y$10$B9MDJ/SjVNyjhw9gRWpPIeCRUW5fbqh7YR0HRwrrPtqlJI9veldoG', '2024-02-23 10:55:10', 'user'),
(21, 'mohamede', 'mohamedkhacha99@gmail.com', '$2y$10$KfNfIzhgWVAlV8dNkWs8wOet7GKso8JHtF0XXRhlr8KyKeSrNw5xi', '2024-02-23 11:03:37', 'user'),
(32, 'frank', 'frank@email.com', '$2y$10$12YXDyyPOyBRCTLUNZF4JetP0Fazdr7tAvnjfBsDM.wASitHpGF3y', '2024-02-24 20:11:37', 'user'),
(34, 'medkhacha', 'med@gmail.com', '$2y$10$XxEKKFq.tVsyTmhd5b31we.WAgIkRmaANnncOB.aO5T6ES0C8b9sy', '2024-03-08 12:28:42', 'user'),
(38, 'center', 'centre@donate.ma', '$2y$10$rjY3KmQlS7K7BQoUSRVZrerTtBsIPv0n6NRqI8u70yo9ezM6tlQDO', '2024-03-08 22:56:27', 'center');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
