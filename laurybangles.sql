-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 16 jan. 2023 à 14:07
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
-- Base de données : `laurybangles`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(20) NOT NULL,
  `type_cat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_cat`, `type_cat`) VALUES
(2, 'Baya', 'Article'),
(3, 'ChevillÃ¨re', 'Article');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num_cmd` varchar(20) DEFAULT NULL,
  `date_cmd` datetime DEFAULT NULL,
  `produit` varchar(25) NOT NULL,
  `nbr_produit` int(20) NOT NULL,
  `total_cmd` int(20) NOT NULL,
  `etat_cmd` double NOT NULL,
  `livraison` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `ref_mat` varchar(20) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `categorie` varchar(10) NOT NULL,
  `img_mat` varchar(20) NOT NULL,
  `couleur` varchar(25) NOT NULL,
  `etat` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`id`, `ref_mat`, `designation`, `categorie`, `img_mat`, `couleur`, `etat`) VALUES
(1, NULL, 'Perle 1', 'Perle', 'Perle 1.jpg', 'noire', 'Indisponible'),
(3, NULL, 'corde1', 'Corde', 'corde1.jpg', 'noire', 'Disponible');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `refProduit` varchar(15) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `designation` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `prix` int(10) NOT NULL,
  `descriptions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `refProduit`, `date`, `designation`, `categorie`, `img`, `prix`, `descriptions`) VALUES
(23, NULL, NULL, 'Perle 8', 'Bracelet', '../admin/image_produit/Perle 8.jpg', 1485, 'fghj'),
(24, NULL, NULL, 'Perle 8', 'chevillÃ¨re', '../admin/image_produit/Perle 8.jpg', 1485, 'fghj'),
(21, NULL, NULL, 'Perle 2', 'Bracelet', '../admin/image_produit/Perle 2.jpg', 1236, 'mlkjhgf'),
(22, NULL, NULL, 'Perle 3', 'Bracelet', '../admin/image_produit/Perle 3.jpg', 1485, 'fghj'),
(20, NULL, NULL, 'Perle 1', 'Bracelet', '../admin/image_produit/Perle 1.jpg', 2584, 'qsfghjklm'),
(27, NULL, NULL, 'Perle 555', 'Bracelet', '../admin/image_produitPerle 555.jpg', 1478, 'qsfghjklmÃ¹\r\n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
