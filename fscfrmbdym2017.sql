-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 19 Mai 2017 à 23:15
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fscfrmbdym2017`
--
CREATE DATABASE IF NOT EXISTS `fscfrmbdym2017` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fscfrmbdym2017`;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `NUMEROASSO` bigint(5) NOT NULL,
  `NOMA` varchar(60) DEFAULT NULL,
  `ADRESSEA` varchar(128) DEFAULT NULL,
  `CPA` char(5) DEFAULT NULL,
  `VILLEA` varchar(60) DEFAULT NULL,
  `REGIONA` varchar(60) DEFAULT NULL,
  `MAILA` varchar(128) DEFAULT NULL,
  `TELA` char(10) DEFAULT NULL,
  `NOMCORRESPONDANT` varchar(50) DEFAULT NULL,
  `PRENOMCORRESPONDANT` varchar(50) DEFAULT NULL,
  `TELCORRESPONDANT` char(10) DEFAULT NULL,
  `MAILCORRESPONDANT` varchar(128) DEFAULT NULL,
  `NBEQUIPEFA` int(11) DEFAULT '0',
  `NBGYMFA` int(11) DEFAULT '0',
  `NBEQUIPEFJ` int(11) DEFAULT '0',
  `NBGYMFJ` int(11) DEFAULT '0',
  `NBEQUIPEF1A` int(11) DEFAULT '0',
  `NBGYMF1A` int(11) DEFAULT '0',
  `NBEQUIPEF1J` int(11) DEFAULT '0',
  `NBGYMF1J` int(11) DEFAULT '0',
  `MONTANTINSCRIPTIONEQUIPE` bigint(4) DEFAULT '0',
  `ACOMPTE` smallint(6) DEFAULT '0',
  `ACOMPTERECU` smallint(6) DEFAULT '0',
  `FACTUREACOMPTE` smallint(6) DEFAULT '0',
  `MODEREGLEMENT` char(10) DEFAULT 'chq',
  `REGLEMENTSOLDE` smallint(6) DEFAULT '0',
  `OUVERTURECOMPTE` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `association`
--

INSERT INTO `association` (`NUMEROASSO`, `NOMA`, `ADRESSEA`, `CPA`, `VILLEA`, `REGIONA`, `MAILA`, `TELA`, `NOMCORRESPONDANT`, `PRENOMCORRESPONDANT`, `TELCORRESPONDANT`, `MAILCORRESPONDANT`, `NBEQUIPEFA`, `NBGYMFA`, `NBEQUIPEFJ`, `NBGYMFJ`, `NBEQUIPEF1A`, `NBGYMF1A`, `NBEQUIPEF1J`, `NBGYMF1J`, `MONTANTINSCRIPTIONEQUIPE`, `ACOMPTE`, `ACOMPTERECU`, `FACTUREACOMPTE`, `MODEREGLEMENT`, `REGLEMENTSOLDE`, `OUVERTURECOMPTE`) VALUES
(4, 'Les Angevins', '11, rue de l\'Ecureil', '49710', 'Angers', 'Pays de la Loire', 'angevins@gmail.com', '0289654565', 'Kay', 'Théo', '0689786545', 'theo.kay@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 'espece', 0, 0),
(5, 'Asso Gym Nantes', '12, le petit port', '44000', 'Nantes', 'Pays de la loire', 'asso-gym-nates@outlook.fr', '0265456545', 'Bricot', 'Judas', '0645548745', 'judas.bricot@live.fr', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 'chq', 0, 1),
(6, 'La Roche', '16, rue de l\'Italie', '85000', 'Roche sur Yon', 'Pays de la loire', 'la_roche@vendee.fr', '0265456545', 'Toulemonde', 'Pacôme', '0635654565', 'toulemonde.p@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 'espece', 0, 0),
(7, 'Les choletais', '1, rue bonne aventure', '49300', 'Cholet', 'Pays de la loire', 'choletais@mail.fr', '0265674520', 'Partout', 'Jamal', '0698585458', 'jamal.partout@gmail.com', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'virement', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `dort`
--

CREATE TABLE `dort` (
  `NUMEROJUGE` bigint(4) NOT NULL,
  `IDN` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gim_manger`
--

CREATE TABLE `gim_manger` (
  `NUMEROASSO` bigint(5) NOT NULL,
  `IDJR` bigint(4) NOT NULL,
  `NOMBRE_G` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `gim_manger`
--

INSERT INTO `gim_manger` (`NUMEROASSO`, `IDJR`, `NOMBRE_G`) VALUES
(4, 2, 10),
(4, 3, 2),
(4, 5, 4),
(4, 7, 9),
(4, 8, 12),
(4, 9, 4),
(5, 2, 8),
(5, 3, 1),
(5, 5, 7),
(5, 7, 4),
(5, 8, 8),
(5, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `hebergement`
--

CREATE TABLE `hebergement` (
  `IDHEB` bigint(4) NOT NULL,
  `TELHEB` varchar(10) DEFAULT NULL,
  `NOMHEB` varchar(60) NOT NULL,
  `NBCHAMBRE1PLACE` smallint(6) DEFAULT '0',
  `NBCHAMBRE2PLACES` smallint(6) DEFAULT '0',
  `TYPE` char(32) DEFAULT 'p',
  `ADRESSE` varchar(128) NOT NULL,
  `VILLE` varchar(40) NOT NULL,
  `CP` char(5) NOT NULL,
  `MAIL` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `hebergement`
--

INSERT INTO `hebergement` (`IDHEB`, `TELHEB`, `NOMHEB`, `NBCHAMBRE1PLACE`, `NBCHAMBRE2PLACES`, `TYPE`, `ADRESSE`, `VILLE`, `CP`, `MAIL`) VALUES
(14, '0689785845', 'Le chateau du ducs de Bretagne', 20, 45, 'h', '4 Place Marc Elder', 'Nantes', '44000', 'contact@chateau-duc-bretagne.fr'),
(15, '0254654565', 'Mr et Mme Dupont', 1, 1, 'p', '6, le caribou', 'Le Longeron', '49710', 'famille-Dupont@gmail.fr'),
(16, '0289456545', 'Le grand hotel', 25, 2, 'h', '12, le poisson rouge', 'Pornic', '44000', 'legrandhotel@gmail.com'),
(17, '0625354545', 'le cheval blanc', 10, 10, 'h', '11, le trefle', 'Cholet', '49300', 'chevalblanc@hotel.fr');

-- --------------------------------------------------------

--
-- Structure de la table `jour_repas`
--

CREATE TABLE `jour_repas` (
  `IDJR` bigint(4) NOT NULL,
  `LIBELLEJR` char(32) DEFAULT NULL,
  `JUGE` tinyint(1) DEFAULT '1',
  `GIM` tinyint(1) DEFAULT '1',
  `prix` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `jour_repas`
--

INSERT INTO `jour_repas` (`IDJR`, `LIBELLEJR`, `JUGE`, `GIM`, `prix`) VALUES
(1, 'dîner Vendredi soir', 1, 0, 2),
(2, 'petit déjeuner samedi matin', 1, 1, 2),
(3, 'déjeuner samedi midi', 0, 1, 3),
(4, 'déjeuner samedi midi', 1, 0, 1.5),
(5, 'dîner samedi soir', 0, 1, 2.5),
(6, 'dîner samedi soir (gala)', 1, 0, 1.5),
(7, 'petit déjeuner dimanche matin', 1, 1, 1),
(8, 'repas frois dimanche midi', 1, 1, 2),
(9, 'pique nique dimanche Midi', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `juge`
--

CREATE TABLE `juge` (
  `NUMEROJUGE` bigint(4) NOT NULL,
  `IDHEB` bigint(4) DEFAULT NULL,
  `NUMEROASSO` bigint(5) NOT NULL,
  `NOMJ` varchar(50) DEFAULT NULL,
  `PRENOMJ` varchar(50) DEFAULT NULL,
  `TELJ1` char(10) DEFAULT NULL,
  `TELJ2` char(10) DEFAULT NULL,
  `ADRESSEJ` varchar(100) DEFAULT NULL,
  `CPJ` char(5) DEFAULT NULL,
  `VILLEJ` varchar(60) DEFAULT NULL,
  `MAILJ` varchar(60) DEFAULT NULL,
  `REGIONJ` varchar(60) DEFAULT NULL,
  `CONJOINT` smallint(6) DEFAULT '0',
  `SEXE` tinyint(1) DEFAULT '0',
  `AGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `juge`
--

INSERT INTO `juge` (`NUMEROJUGE`, `IDHEB`, `NUMEROASSO`, `NOMJ`, `PRENOMJ`, `TELJ1`, `TELJ2`, `ADRESSEJ`, `CPJ`, `VILLEJ`, `MAILJ`, `REGIONJ`, `CONJOINT`, `SEXE`, `AGE`) VALUES
(3, 15, 4, 'Bon', 'Jean', '0258756487', '0665458754', '2, le petit renard', '49000', 'Angers', 'jean.bon@live.fr', 'pays de la loire', 0, 0, 50),
(4, 14, 6, 'Desbois', 'Robin', '0212456515', '0698758621', '2, le loup bleu', '49300', 'Cholet', 'robin.desbois@gmail.com', 'pays de la loire', 1, 1, 50),
(5, 16, 7, 'Don', 'Guy', '0212546598', '0635698025', '36, rue de Charle De Gaule', '49000', 'Angers', 'don.g@hotmail.fr', 'pays de la loire', 1, 1, 25);

-- --------------------------------------------------------

--
-- Structure de la table `juge_manger`
--

CREATE TABLE `juge_manger` (
  `NUMEROJUGE` bigint(4) NOT NULL,
  `IDJR` bigint(4) NOT NULL,
  `NOMBRE_J` int(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `juge_manger`
--

INSERT INTO `juge_manger` (`NUMEROJUGE`, `IDJR`, `NOMBRE_J`) VALUES
(3, 1, 2),
(3, 2, 2),
(3, 4, 2),
(3, 6, 0),
(3, 7, 2),
(3, 8, 2),
(3, 9, 2),
(4, 1, 1),
(4, 2, 1),
(4, 4, 0),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 2);

-- --------------------------------------------------------

--
-- Structure de la table `montant`
--

CREATE TABLE `montant` (
  `DONNEE` char(32) NOT NULL,
  `VALEUR` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `montant`
--

INSERT INTO `montant` (`DONNEE`, `VALEUR`) VALUES
('password', 'gym1234*');

-- --------------------------------------------------------

--
-- Structure de la table `nuit`
--

CREATE TABLE `nuit` (
  `IDN` int(2) NOT NULL,
  `LIBELLEN` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnel_technique`
--

CREATE TABLE `personnel_technique` (
  `NUMEROJUGE` bigint(4) NOT NULL,
  `FONCTION` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`NUMEROASSO`);

--
-- Index pour la table `dort`
--
ALTER TABLE `dort`
  ADD PRIMARY KEY (`NUMEROJUGE`,`IDN`),
  ADD KEY `I_FK_DORT_JUGE` (`NUMEROJUGE`),
  ADD KEY `I_FK_DORT_NUIT` (`IDN`);

--
-- Index pour la table `gim_manger`
--
ALTER TABLE `gim_manger`
  ADD PRIMARY KEY (`NUMEROASSO`,`IDJR`),
  ADD KEY `I_FK_GIM_MANGER_ASSOCIATION` (`NUMEROASSO`),
  ADD KEY `I_FK_GIM_MANGER_JOUR_REPAS` (`IDJR`);

--
-- Index pour la table `hebergement`
--
ALTER TABLE `hebergement`
  ADD PRIMARY KEY (`IDHEB`);

--
-- Index pour la table `jour_repas`
--
ALTER TABLE `jour_repas`
  ADD PRIMARY KEY (`IDJR`);

--
-- Index pour la table `juge`
--
ALTER TABLE `juge`
  ADD PRIMARY KEY (`NUMEROJUGE`),
  ADD KEY `I_FK_JUGE_HEBERGEMENT` (`IDHEB`),
  ADD KEY `I_FK_JUGE_ASSOCIATION` (`NUMEROASSO`);

--
-- Index pour la table `juge_manger`
--
ALTER TABLE `juge_manger`
  ADD PRIMARY KEY (`NUMEROJUGE`,`IDJR`),
  ADD KEY `I_FK_JUGE_MANGER_JUGE` (`NUMEROJUGE`),
  ADD KEY `I_FK_JUGE_MANGER_JOUR_REPAS` (`IDJR`);

--
-- Index pour la table `montant`
--
ALTER TABLE `montant`
  ADD PRIMARY KEY (`DONNEE`);

--
-- Index pour la table `nuit`
--
ALTER TABLE `nuit`
  ADD PRIMARY KEY (`IDN`);

--
-- Index pour la table `personnel_technique`
--
ALTER TABLE `personnel_technique`
  ADD PRIMARY KEY (`NUMEROJUGE`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `NUMEROASSO` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `hebergement`
--
ALTER TABLE `hebergement`
  MODIFY `IDHEB` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `jour_repas`
--
ALTER TABLE `jour_repas`
  MODIFY `IDJR` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `juge`
--
ALTER TABLE `juge`
  MODIFY `NUMEROJUGE` bigint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `nuit`
--
ALTER TABLE `nuit`
  MODIFY `IDN` int(2) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `personnel_technique`
--
ALTER TABLE `personnel_technique`
  MODIFY `NUMEROJUGE` bigint(4) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dort`
--
ALTER TABLE `dort`
  ADD CONSTRAINT `dort_ibfk_2` FOREIGN KEY (`IDN`) REFERENCES `nuit` (`IDN`),
  ADD CONSTRAINT `dort_ibfk_3` FOREIGN KEY (`NUMEROJUGE`) REFERENCES `juge` (`NUMEROJUGE`);

--
-- Contraintes pour la table `gim_manger`
--
ALTER TABLE `gim_manger`
  ADD CONSTRAINT `gim_manger_ibfk_1` FOREIGN KEY (`NUMEROASSO`) REFERENCES `association` (`NUMEROASSO`),
  ADD CONSTRAINT `gim_manger_ibfk_2` FOREIGN KEY (`IDJR`) REFERENCES `jour_repas` (`IDJR`);

--
-- Contraintes pour la table `juge`
--
ALTER TABLE `juge`
  ADD CONSTRAINT `juge_ibfk_1` FOREIGN KEY (`IDHEB`) REFERENCES `hebergement` (`IDHEB`),
  ADD CONSTRAINT `juge_ibfk_2` FOREIGN KEY (`NUMEROASSO`) REFERENCES `association` (`NUMEROASSO`);

--
-- Contraintes pour la table `juge_manger`
--
ALTER TABLE `juge_manger`
  ADD CONSTRAINT `juge_manger_ibfk_1` FOREIGN KEY (`NUMEROJUGE`) REFERENCES `juge` (`NUMEROJUGE`),
  ADD CONSTRAINT `juge_manger_ibfk_2` FOREIGN KEY (`IDJR`) REFERENCES `jour_repas` (`IDJR`);

--
-- Contraintes pour la table `personnel_technique`
--
ALTER TABLE `personnel_technique`
  ADD CONSTRAINT `personnel_technique_ibfk_1` FOREIGN KEY (`NUMEROJUGE`) REFERENCES `juge` (`NUMEROJUGE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
