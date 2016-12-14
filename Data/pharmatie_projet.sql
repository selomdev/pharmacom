-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
-- Arthur --- dina 2000 test
-- Client :  127.0.0.1
-- Généré le :  Ven 09 Décembre 2016 à 12:44
-- Version du serveur :  5.6.25
-- Version de PHP :  5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pharmatie projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE IF NOT EXISTS `abonnement` (
  `id_abonnement` int(11) NOT NULL,
  `dateExpire` date DEFAULT NULL,
  `id_forfaiit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `abonnement_pharmatie`
--

CREATE TABLE IF NOT EXISTS `abonnement_pharmatie` (
  `id_abonnement` int(11) NOT NULL,
  `id_pharmatie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contactlign`
--

CREATE TABLE IF NOT EXISTS `contactlign` (
  `id_ContactLign` int(11) NOT NULL,
  `nom_contactLign` varchar(150) DEFAULT NULL,
  `prenom_contLign` varchar(150) DEFAULT NULL,
  `Login` varchar(45) DEFAULT NULL,
  `passWord` varchar(255) DEFAULT NULL,
  `id_pharmatie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `forfaiit`
--

CREATE TABLE IF NOT EXISTS `forfaiit` (
  `id_forfaiit` int(11) NOT NULL,
  `nom_Forfait` varchar(255) DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `montant` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pharmatie_enligne`
--

CREATE TABLE IF NOT EXISTS `pharmatie_enligne` (
  `id` int(11) NOT NULL,
  `nom_pharmaLign` varchar(255) DEFAULT NULL,
  `tel1` varchar(45) DEFAULT NULL,
  `tel2` varchar(45) DEFAULT NULL,
  `email1` varchar(255) DEFAULT NULL,
  `email2` varchar(255) DEFAULT NULL,
  `Nom_diri` varchar(255) DEFAULT NULL,
  `tel1_dir` varchar(45) DEFAULT NULL,
  `tel2_dir` varchar(45) DEFAULT NULL,
  `email1_dir` varchar(255) DEFAULT NULL,
  `email2_dir` varchar(255) DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `DeGarde` tinyint(1) NOT NULL DEFAULT '0',
  `BoolSupp` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `pharmatie_enligne`
--

INSERT INTO `pharmatie_enligne` (`id`, `nom_pharmaLign`, `tel1`, `tel2`, `email1`, `email2`, `Nom_diri`, `tel1_dir`, `tel2_dir`, `email1_dir`, `email2_dir`, `Latitude`, `Longitude`, `DeGarde`, `BoolSupp`) VALUES
(1, 'Pharmatie 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(2, 'Pharmatie 2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 'Pharamtie 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 'Pharmatie 4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id_Stock` int(11) NOT NULL,
  `nom_prodLign` varchar(255) DEFAULT NULL,
  `descrip_prodLign` varchar(255) DEFAULT NULL,
  `famile_prodLign` varchar(150) DEFAULT NULL,
  `qte` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `id_pharmatie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abonnement`,`id_forfaiit`),
  ADD KEY `fk_Abonnement_forfaiit_idx` (`id_forfaiit`);

--
-- Index pour la table `abonnement_pharmatie`
--
ALTER TABLE `abonnement_pharmatie`
  ADD PRIMARY KEY (`id_abonnement`,`id_pharmatie`),
  ADD KEY `fk_Abonnement_has_pharmatie_enLigne_pharmatie_enLigne1_idx` (`id_pharmatie`),
  ADD KEY `fk_Abonnement_has_pharmatie_enLigne_Abonnement1_idx` (`id_abonnement`);

--
-- Index pour la table `contactlign`
--
ALTER TABLE `contactlign`
  ADD PRIMARY KEY (`id_ContactLign`,`id_pharmatie`),
  ADD UNIQUE KEY `id_ContactLign_UNIQUE` (`id_ContactLign`),
  ADD KEY `fk_ContactLign_pharmatie_enLigne1_idx` (`id_pharmatie`);

--
-- Index pour la table `forfaiit`
--
ALTER TABLE `forfaiit`
  ADD PRIMARY KEY (`id_forfaiit`),
  ADD UNIQUE KEY `id_forfaiit_UNIQUE` (`id_forfaiit`);

--
-- Index pour la table `pharmatie_enligne`
--
ALTER TABLE `pharmatie_enligne`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_Stock`,`id_pharmatie`),
  ADD UNIQUE KEY `id_Stock_UNIQUE` (`id_Stock`),
  ADD KEY `fk_Stock_pharmatie_enLigne1_idx` (`id_pharmatie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `contactlign`
--
ALTER TABLE `contactlign`
  MODIFY `id_ContactLign` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forfaiit`
--
ALTER TABLE `forfaiit`
  MODIFY `id_forfaiit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pharmatie_enligne`
--
ALTER TABLE `pharmatie_enligne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_Stock` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `fk_Abonnement_forfaiit` FOREIGN KEY (`id_forfaiit`) REFERENCES `forfaiit` (`id_forfaiit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `abonnement_pharmatie`
--
ALTER TABLE `abonnement_pharmatie`
  ADD CONSTRAINT `fk_Abonnement_has_pharmatie_enLigne_Abonnement1` FOREIGN KEY (`id_abonnement`) REFERENCES `abonnement` (`id_abonnement`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Abonnement_has_pharmatie_enLigne_pharmatie_enLigne1` FOREIGN KEY (`id_pharmatie`) REFERENCES `pharmatie_enligne` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contactlign`
--
ALTER TABLE `contactlign`
  ADD CONSTRAINT `fk_ContactLign_pharmatie_enLigne1` FOREIGN KEY (`id_pharmatie`) REFERENCES `pharmatie_enligne` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_Stock_pharmatie_enLigne1` FOREIGN KEY (`id_pharmatie`) REFERENCES `pharmatie_enligne` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
