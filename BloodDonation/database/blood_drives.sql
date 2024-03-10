-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 10 mars 2024 à 15:27
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `donation`
--

-- --------------------------------------------------------

--
-- Structure de la table `blood_drives`
--

DROP TABLE IF EXISTS `blood_drives`;
CREATE TABLE IF NOT EXISTS `blood_drives` (
  `id` int NOT NULL AUTO_INCREMENT,
  `center_creator` varchar(255) NOT NULL,
  `collaborator` varchar(255) NOT NULL,
  `drive_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `blood_drives`
--

INSERT INTO `blood_drives` (`id`, `center_creator`, `collaborator`, `drive_date`, `location`, `description`) VALUES
(1, 'Default Center', 'EST Guelmim', '2024-03-09', 'EST GUELMIM', 'aaaaaaaaaa'),
(2, 'Default Center', 'EST Guelmim', '2024-03-15', 'EST GUELMIM', 'aaaaaaaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
