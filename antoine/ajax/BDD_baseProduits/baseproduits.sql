-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 10 Août 2013 à 16:38
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `baseproduits`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `CodeCateg` int(11) NOT NULL AUTO_INCREMENT,
  `NomCateg` varchar(30) NOT NULL,
  PRIMARY KEY (`CodeCateg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CodeCateg`, `NomCateg`) VALUES
(1, 'Boissons'),
(2, 'Condiments'),
(3, 'Desserts'),
(4, 'Produits laitiers'),
(5, 'Pâtes et Céréales'),
(6, 'Viandes'),
(7, 'Produits secs'),
(8, 'Poissons et fruits de mer');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `CodeProduit` int(11) NOT NULL AUTO_INCREMENT,
  `NomProduit` varchar(40) NOT NULL,
  `CodeCateg` int(11) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  PRIMARY KEY (`CodeProduit`),
  KEY `CodeCateg` (`CodeCateg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`CodeProduit`, `NomProduit`, `CodeCateg`, `prix`) VALUES
(1, 'Fanta', 1, '2.00'),
(2, 'Coca', 1, '150.00'),
(3, 'ail', 2, '10.50'),
(4, 'curcuma', 2, '5.20'),
(5, 'gingembre', 2, '6.20'),
(6, 'poivre blanc', 2, '2.30'),
(7, 'Amandes', 7, '10.60'),
(8, 'poivre vert', 2, '3.80'),
(9, 'Filet de Boeuf', 6, '30.50'),
(10, 'Saumon fumé', 8, '4.30'),
(11, 'Yaourt nature Bio', 4, '7.23'),
(12, 'Fromage blanc en faisselle', 4, '12.46'),
(13, 'Konbu', 8, '26.98'),
(14, 'Noisettes', 7, '3.47'),
(15, 'Curry', 2, '5.23'),
(16, 'Tiramisu', 3, '4.28'),
(17, 'Gigot Mouton', 6, '18.60'),
(18, 'Noix', 7, '15.98'),
(19, 'Crème brulée', 3, '3.60'),
(20, 'Pudding', 3, '2.50'),
(21, 'Cornes de gazelle', 3, '4.65'),
(22, 'Riz thaï', 5, '2.47'),
(23, 'Penne', 5, '3.30'),
(24, 'Perrier', 1, '10.20'),
(25, 'Nougat-Creme', 3, '2.65'),
(26, 'bras de vénus', 3, '12.60'),
(27, 'Millefeuille', 3, '2.45'),
(28, 'Noix de cajou', 7, '6.50'),
(29, 'Roti Porc', 6, '13.50'),
(30, 'Thon à l''huile', 8, '12.60'),
(31, 'Gorgonzola Telino', 4, '10.60'),
(32, 'Mascarpone Fabioli', 4, '5.60'),
(33, 'Mimolette', 4, '12.50'),
(34, 'Jus banane-fraise', 1, '26.30'),
(35, 'jus exotique', 1, '12.60'),
(36, 'Saumon Gravad lax', 8, '11.10'),
(37, 'Sardines à l''huile', 8, '10.50'),
(38, 'Jus d''orange', 1, '6.80'),
(39, 'Chartreuse verte', 1, '15.60'),
(40, 'Foie de morue', 8, '6.80'),
(41, 'Morue salée', 8, '8.90'),
(42, 'Quinoa', 5, '18.20'),
(43, 'Café noir', 1, '9.80'),
(44, 'Expresso', 2, '10.30'),
(45, 'Crabes et crevettes', 8, '11.60'),
(46, 'Moules farcies', 8, '12.40'),
(47, 'Forêt noire', 3, '13.20'),
(48, 'Fondant au chocolat', 3, '5.60'),
(49, 'Tarte au citron', 3, '14.60'),
(50, 'Tarte poires et chocolat', 3, '12.90'),
(51, 'Abricots secs', 7, '10.60');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`CodeCateg`) REFERENCES `categorie` (`CodeCateg`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
