-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 fév. 2021 à 13:13
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ratrapage`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_date` datetime NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210216092409', '2021-02-16 09:24:27', 200);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `picture`, `description`, `promo`, `created`) VALUES
(21, 'nom du produit n\'0', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'0', 1, '2021-02-16 11:38:53'),
(22, 'nom du produit n\'1', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'1', 1, '2021-02-16 11:38:53'),
(23, 'nom du produit n\'2', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'2', 1, '2021-02-16 11:38:53'),
(24, 'nom du produit n\'3', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'3', 1, '2021-02-16 11:38:53'),
(25, 'nom du produit n\'4', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'4', 1, '2021-02-16 11:38:53'),
(26, 'nom du produit n\'5', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'5', 0, '2021-02-16 11:38:53'),
(27, 'nom du produit n\'6', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'6', 0, '2021-02-16 11:38:53'),
(28, 'nom du produit n\'7', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'7', 0, '2021-02-16 11:38:53'),
(29, 'nom du produit n\'8', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'8', 0, '2021-02-16 11:38:53'),
(30, 'nom du produit n\'9', 'https://source.unsplash.com/random/350x150', 'Description du produit n\'9', 0, '2021-02-16 11:38:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
