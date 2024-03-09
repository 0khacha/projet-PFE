-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 mars 2024 à 20:43
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
-- Structure de la table `blood_center`
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
  PRIMARY KEY (`center_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `blood_center`
--

INSERT INTO `blood_center` (`center_id`, `center_name`, `address`, `city`, `zip_code`, `phone_number`, `email`, `registration_date`) VALUES
(1, 'Guelmim', 'Quartier ELmowahidine block B, Rue24, N 7', 'Guelmim', 'JA199978', '0697513739', 'mohakhanou@gmail.com', '2024-03-08 16:28:08'),
(2, 'Guelmim', 'Quartier ELmowahidine block B, Rue24, N 7', 'Guelmim', 'JA199978', '0697513739', 'mohakhanou@gmail.com', '2024-03-08 16:33:29'),
(3, 'Guelmim', 'Quartier ELmowahidine block B, Rue24, N 7', 'Guelmim', 'JA199978', '0697513739', 'mohakhanou@gmail.com', '2024-03-08 16:44:39'),
(4, 'Centre Régional de Transfusion Sanguine - Agadir Dakhla', 'Guelmim', 'Guelmim', '81000', '0697513739', 'mohamedkhanoubastudent@gmail.com', '2024-03-08 18:38:29'),
(5, 'Guelmim', 'Quartier ELmowahidine block B, Rue24, N 7', 'Guelmim', 'JA199978', '0697513739', 'mohakhanou@gmail.com', '2024-03-08 20:14:16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
