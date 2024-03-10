-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2024 at 08:56 PM
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
  `appointmentDay` date DEFAULT NULL,
  `pdfContent` longblob,
  PRIMARY KEY (`appointmentID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blooddonationappointment`
--

INSERT INTO `blooddonationappointment` (`appointmentID`, `userID`, `fullName`, `email`, `phoneNumber`, `gender`, `age`, `bloodType`, `cityTown`, `bloodDonationCenter`, `previousDonations`, `lastDonationDate`, `healthConditions`, `preferredContact`, `availability`, `donationFrequency`, `additionalComments`, `submissionDate`, `appointmentDay`, `pdfContent`) VALUES
(14, 10, 'Mohamed khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'O+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'yes', '2022-12-31', 'no', 'phone', 'morning', 'once', 'i would like to donate as soon as possible', '2024-02-25 16:35:03', NULL, NULL),
(73, 10, 'Khalid esabery', 'khalid@gmail.com', '0613192572', 'male', 24, 'O-', 'fes', 'Centre Régional de Transfusion Sanguine - fes', 'no', '0000-00-00', 'no', 'email', 'Evenings', 'once', 'thanks', '2024-02-27 20:56:36', NULL, NULL),
(74, 2, 'yassine essabery', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', 'thanks for your service', '2024-03-07 18:34:59', NULL, NULL),
(75, 2, 'Khalid esabery', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-07 18:37:31', NULL, NULL),
(76, 2, 'mohame dkhacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:29:30', '2024-03-10', NULL),
(77, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:43:57', '2024-03-10', NULL),
(78, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:44:44', '2024-03-10', NULL),
(79, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:45:12', '2024-03-10', NULL),
(80, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:45:37', '2024-03-10', NULL),
(81, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:45:57', '2024-03-10', NULL),
(82, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:47:50', '2024-03-10', NULL),
(83, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:50:00', '2024-03-10', NULL),
(84, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:50:09', '2024-03-10', NULL),
(85, 2, 'mohamed kha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 29, 'O+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:50:49', '2024-03-10', NULL),
(86, 2, 'mohamedkhacha 99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:59:18', '2024-03-10', NULL),
(87, 2, 'mohamedkhacha 99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 11:59:52', '2024-03-10', NULL),
(88, 2, 'mohamedkhacha 99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:00:19', '2024-03-10', NULL),
(89, 2, 'mohamedkhacha 99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:07:30', '2024-03-10', NULL),
(90, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:14:02', '2024-03-10', NULL),
(91, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:14:16', '2024-03-10', NULL),
(92, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:19:08', '2024-03-10', NULL),
(93, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:19:42', '2024-03-10', NULL),
(94, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:20:39', '2024-03-10', NULL),
(95, 2, 'mohamedkhacha9 9@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:22:35', '2024-03-10', NULL),
(96, 2, 'mohamedkhacha9 9@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:22:53', '2024-03-10', NULL),
(97, 2, 'mohamedkhacha9 9@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:25:01', '2024-03-10', NULL),
(98, 2, 'mohamedkhacha99@gmail.s com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:28:53', '2024-03-10', NULL),
(99, 2, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:35:52', '2024-03-10', NULL),
(100, 2, 'Mohamed Khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'O+', 'Agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', 'thank you for you serveice', '2024-03-09 12:39:34', '2024-03-10', NULL),
(101, 2, 'Mohamed khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:44:02', '2024-03-10', NULL),
(102, 2, 'Mohamed khacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 12:44:38', '2024-03-10', NULL),
(103, 2, 'mohamedkhacha9 9@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 12:46:42', '2024-03-10', NULL),
(104, 2, 'mohamedkhacha99@g mail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 12:47:38', '2024-03-10', NULL),
(105, 10, 'Khalid esabery', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', '', '2024-03-09 17:35:00', '2024-03-10', NULL),
(106, 10, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 17:42:59', '2024-03-10', NULL),
(107, 10, 'mohame dkhacha', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'agadir', 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 17:50:03', '2024-03-10', NULL),
(108, 10, 'Khacha mohamed', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 23, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 17:53:58', '2024-03-10', NULL),
(109, 10, 'mohamedkha cha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 43, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 18:00:01', '2024-03-10', NULL),
(110, 10, 'mohamedkhach a99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'morning', 'once', 'yaa rebi', '2024-03-09 18:34:37', '2024-03-10', ''),
(111, 10, 'mohamedk hacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'no', 'once', '', '2024-03-09 19:14:11', '2024-03-10', ''),
(112, 10, 'mohamed khacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mor', 'once', '', '2024-03-09 19:16:38', '2024-03-10', ''),
(113, 10, 'moha medkhacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 19:18:53', '2024-03-10', ''),
(114, 10, 'mohamedkh acha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 20, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'no', 'once', '', '2024-03-09 19:20:16', '2024-03-10', ''),
(115, 10, 'mohamedkhach a99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'no', 'once', '', '2024-03-09 19:22:42', '2024-03-10', ''),
(116, 10, 'mohamedkhach a99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'no', 'once', '', '2024-03-09 19:30:03', '2024-03-10', ''),
(117, 10, 'moham edkhacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 19:31:20', '2024-03-10', ''),
(118, 10, 'moham edkhacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 19:32:41', '2024-03-10', ''),
(119, 10, 'md ohamedkhacha99@gmail. com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 54, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'gvu', 'once', '', '2024-03-09 19:42:36', '2024-03-10', ''),
(120, 10, 'mohamedkhac ha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'mo', 'once', '', '2024-03-09 19:44:47', '2024-03-10', ''),
(121, 10, 'mohamedkha cha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 23, 'A+', 'Tinghir', '', 'no', '0000-00-00', 'no', 'email', 'mj', 'once', '', '2024-03-09 19:56:43', '2024-03-10', NULL),
(122, 10, 'mohame dkhacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 23, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'no', 'email', 'dty', 'once', '', '2024-03-09 20:07:16', '2024-03-10', ''),
(123, 10, 'mohame dkhacha99@gmail.com', 'mohamedkhacha99@gmail.com', '0653206661', 'male', 34, 'A+', 'Tinghir', 'Center2A', 'no', '0000-00-00', 'u', 'email', 'hi', 'once', '', '2024-03-09 20:09:01', '2024-03-10', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
