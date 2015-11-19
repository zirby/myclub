-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Novembre 2015 à 11:18
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tcstandamembre`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `maximum` int(11) NOT NULL DEFAULT '0',
  `minimum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=45 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `label`, `maximum`, `minimum`) VALUES
(1, 'Messieurs 6 joueurs I', 520, 445),
(2, 'Messieurs 6 joueurs II', 440, 365),
(3, 'Messieurs 6 joueurs III', 360, 285),
(4, 'Messieurs 6 joueurs IV', 280, 205),
(5, 'Messieurs 6 joueurs V', 200, 145),
(6, 'Messieurs 6 joueurs VI', 140, 95),
(7, 'Messieurs 6 joueurs VII', 90, 45),
(8, 'Messieurs 6 joueurs VIII', 40, 30),
(9, 'Dames I', 340, 275),
(10, 'Dames II', 270, 205),
(11, 'Dames III', 200, 145),
(12, 'Dames IV', 140, 100),
(13, 'Dames V', 95, 65),
(14, 'Dames VI', 60, 30),
(15, 'Dames VII', 25, 20),
(16, 'Messieurs 35 I', 285, 215),
(17, 'Messieurs 35 II', 210, 145),
(18, 'Messieurs 35 III', 140, 80),
(19, 'Messieurs 35 VI', 75, 40),
(20, 'Messieurs 35 V', 35, 20),
(21, 'Dames 25 I', 220, 145),
(22, 'Dames 25 II', 140, 80),
(23, 'Dames 25 III', 75, 40),
(24, 'Dames 25 IV', 35, 20),
(25, 'Messieurs 45 I', 220, 145),
(26, 'Messieurs 45 II', 140, 80),
(27, 'Messieurs 45 III', 75, 40),
(28, 'Messieurs 45 IV', 35, 20),
(29, 'Dames 35 I', 140, 80),
(30, 'Dames 35 II', 75, 40),
(31, 'Dames 35 III', 35, 20),
(32, 'Messieurs 55 I', 140, 80),
(33, 'Messieurs 55 II', 75, 40),
(34, 'Messieurs 55 III', 35, 20),
(35, 'Dames 45 I', 70, 45),
(36, 'Dames 45 II', 40, 20),
(37, 'Dames 55 I', 70, 45),
(38, 'Dames 55 II', 40, 20),
(39, 'Messieurs 60 I', 70, 45),
(40, 'Messieurs 60 II', 40, 20),
(41, 'Messieurs 65 I', 70, 45),
(42, 'Messieurs 65 II', 40, 20),
(43, 'Messieurs 70 I', 70, 45),
(44, 'Messieurs 70 II', 40, 20);

-- --------------------------------------------------------

--
-- Structure de la table `classements`
--

CREATE TABLE IF NOT EXISTS `classements` (
  `classement` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`classement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `classements`
--

INSERT INTO `classements` (`classement`, `points`) VALUES
('B+2/6', 70),
('B+4/6', 65),
('B-15', 90),
('B-15.1', 95),
('B-15.2', 100),
('B-15.4', 105),
('B-2/6', 80),
('B-4/6', 85),
('B0', 75),
('C15', 60),
('C15.1', 55),
('C15.2', 50),
('C15.3', 45),
('C15.4', 40),
('C15.5', 35),
('C30', 30),
('C30.1', 25),
('C30.2', 20),
('C30.3', 15),
('C30.4', 10),
('C30.5', 5),
('N.C.', 5),
('S Int', 115),
('S Nat', 110);

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inscription` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `montant_a` int(11) NOT NULL,
  `montant_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin AUTO_INCREMENT=9 ;

--
-- Contenu de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `inscription`, `montant_a`, `montant_b`) VALUES
(1, 'Adulte', 135, 125),
(2, 'Deux adultes sous le même toit', 245, 235),
(3, 'Etudiant (né entre 1992 et 1998)', 110, 100),
(4, 'Jeune de 10 à 16 ans (né entre 2000 et 2005)', 60, 50),
(5, 'Jeune de moins de 10 ans (né en 2007 et après)', 35, 25),
(6, 'Cotisation familiale', 290, 280),
(7, 'Membre travaillant sur le site du BSJ', 80, 70),
(8, 'Membre sympathisant', 50, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(100) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `code` varchar(25) COLLATE utf8_bin NOT NULL,
  `localite` varchar(250) COLLATE utf8_bin NOT NULL,
  `birthday` date NOT NULL,
  `telephone` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `classement` varchar(25) COLLATE utf8_bin NOT NULL,
  `affiliation` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `reset_token` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `cotisation` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `firstname`, `lastname`, `address`, `code`, `localite`, `birthday`, `telephone`, `email`, `classement`, `affiliation`, `password`, `reset_token`, `reset_at`, `cotisation`) VALUES
(0, 'zed', 'Christian', 'ZIRBES', 'rue Solvay, 83', '4100', 'Boncelles', '1954-07-11', '0486854579', 'zirby.zirby@gmail.com', 'C30.5', '4031731', '$2y$10$VG3Co/HDp4o.TDuiHvW0FOrUgrfGyDATBtkcBv542D8sk0SsiKOt.', NULL, NULL, 'Adulte');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
