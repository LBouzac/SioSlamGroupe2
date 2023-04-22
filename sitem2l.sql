-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 avr. 2023 à 18:42
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sitem2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idQuestion` int(11) NOT NULL,
  `libelleQuestion` varchar(50) NOT NULL,
  `dateQuestion` date NOT NULL,
  `reponseApportee` varchar(50) NOT NULL,
  `dateReponse` date NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idQuestion`, `libelleQuestion`, `dateQuestion`, `reponseApportee`, `dateReponse`, `idUtilisateur`) VALUES
(1, 'essai', '2021-01-15', 'Hello', '0000-00-00', 3),
(2, 'Taille d\'un ballonlon', '2021-01-15', 'la réponse est-elle conforme aux attentes ?', '0000-00-00', 6),
(3, 'Quelle est le nombre de joueurs dans une équipe de', '2021-01-15', 'a', '0000-00-00', 7),
(4, 'Comment allez-vous ?', '0000-00-00', 'TRES TRES MAL', '0000-00-00', 1),
(5, 'J\'ajoute cette question', '0000-00-00', 'toto', '0000-00-00', 1),
(24, 'Prononciation de KARABATIC ?', '0000-00-00', 'é', '0000-00-00', 11),
(31, 'AZSERTRED', '0000-00-00', 'ZQSDFTGFVHBNJIHGFDXCFG', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE `ligue` (
  `idLigue` int(11) NOT NULL,
  `libelleLigue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`idLigue`, `libelleLigue`) VALUES
(1, 'ligue de volley'),
(2, 'Ligue de basket'),
(3, 'Ligue de football'),
(4, 'Ligue de handball');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `idType` int(11) NOT NULL,
  `libelleType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idType`, `libelleType`) VALUES
(1, 'utilisateur'),
(2, 'admin'),
(3, 'superadmin');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `idType` int(11) NOT NULL,
  `idLigue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `motDePasse`, `e_mail`, `idType`, `idLigue`) VALUES
(1, 'superadmin', 'superadmin', 'superadmin@m2l.fr', 3, NULL),
(2, 'adminfoot', 'adminfoot', 'adminfoot@m2l.fr', 2, 3),
(3, 'userfoot1', 'userfoot1', 'userfoot1@m2l.fr', 1, 3),
(4, 'userfoot2', 'userfoot2', 'userfoot2@m2l.fr', 1, 3),
(5, 'adminhand', 'adminhand', 'adminhand@m2l.fr', 2, 4),
(6, 'userhand1', 'userhand1', 'userhand1@m2l.fr', 1, 4),
(7, 'userhand2', 'userhand2', 'userhand2@m2l.fr', 1, 4),
(8, 'adminvolley', 'adminvolley', 'adminvolley@m2l.fr', 2, 1),
(9, 'test', 'test', 'email@test.com', 3, 3),
(10, 'ulype', 'ulype', 'ulype@yahoo.fr', 1, 3),
(11, 'userhand3', 'userhand3', 'userhand3@m2l.fr', 1, 4),
(12, 'userhand4', 'userhand4', 'userhand4@m2l.fr', 1, 1),
(14, 'test34', 'test34', 'test34@jaipasdemail.fr', 2, 1),
(15, 'aaa', 'aaa', 'aaa@aaaa.fr', 1, 1),
(16, 'test567', 'test567', 'test567@test567.fr', 1, 1),
(17, 'test5676', 'test5676', 'test5676@test5676.fr', 1, 1),
(18, 'test56767', 'test56767', 'test56767@test56767.fr', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `FAQ_Utilisateur_FK` (`idUtilisateur`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`idLigue`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `UC_pseudo` (`pseudo`),
  ADD UNIQUE KEY `UC_email` (`e_mail`),
  ADD KEY `Utilisateur_Type_FK` (`idType`),
  ADD KEY `Utilisateur_Ligue0_FK` (`idLigue`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `idLigue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `idType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `FAQ_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `Utilisateur_Ligue0_FK` FOREIGN KEY (`idLigue`) REFERENCES `ligue` (`idLigue`),
  ADD CONSTRAINT `Utilisateur_Type_FK` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
