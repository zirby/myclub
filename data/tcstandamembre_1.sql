-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Jeu 19 Novembre 2015 à 17:39
-- Version du serveur :  5.5.38
-- Version de PHP :  5.6.2

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

CREATE TABLE `categories` (
`id` int(11) NOT NULL,
  `label` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `maximum` int(11) NOT NULL DEFAULT '0',
  `minimum` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `classements` (
  `classement` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `points` int(11) NOT NULL
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
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
`id` int(11) NOT NULL,
  `equipe` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `serie` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL,
  `capitaine` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `gsm` varchar(50) COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Contenu de la table `equipes`
--

INSERT INTO `equipes` (`id`, `equipe`, `serie`, `capitaine`, `gsm`) VALUES
(1, 'JF-12', NULL, 'Florence Salmon', '0494/93.15.97'),
(2, 'JF-14', NULL, 'Romane Mottet', '0486/25.58.45');

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
`id` int(11) NOT NULL,
  `inscription` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `montant_a` int(11) NOT NULL,
  `montant_b` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

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

CREATE TABLE `membres` (
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
  `cotisation` varchar(200) COLLATE utf8_bin NOT NULL,
  `inscription_at` date DEFAULT NULL,
  `interclub` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `firstname`, `lastname`, `address`, `code`, `localite`, `birthday`, `telephone`, `email`, `classement`, `affiliation`, `password`, `reset_token`, `reset_at`, `cotisation`, `inscription_at`, `interclub`) VALUES
(1, 'zed', 'Christian', 'ZIRBES', 'rue Solvay, 83', '4100', 'Boncelles', '1954-07-11', '0486854579', 'zirby.zirby@gmail.com', 'C30.5', '4031731', '$2y$10$VG3Co/HDp4o.TDuiHvW0FOrUgrfGyDATBtkcBv542D8sk0SsiKOt.', NULL, NULL, 'Adulte', NULL, NULL),
(2, 'toto', 'Jules', 'TOTO', 'rue de l''Ã©glise, 25', '4100', 'Boncelles', '1954-07-11', '0412587', 'toto@toto.be', 'N.C.', '', '$2y$10$dqSikbo2neqSAfwjjgF2QeT/FA5F9VyuEe2XPCI0p4XCxRDi6Xkc6', NULL, NULL, 'Adulte', '2015-11-19', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classements`
--
ALTER TABLE `classements`
 ADD PRIMARY KEY (`classement`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
