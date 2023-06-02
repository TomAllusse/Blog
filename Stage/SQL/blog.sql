-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 02 juin 2023 à 12:03
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `Id_Categories` int(11) NOT NULL,
  `Name_Categories` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `Id_Post` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Picture` varchar(50) NOT NULL,
  `Contained` text NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT '1900-01-01 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `to_have`
--

CREATE TABLE `to_have` (
  `Id_Categories` int(11) NOT NULL,
  `Id_Post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `Name_User` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Date_Of_Birth` date NOT NULL DEFAULT '0000-00-00',
  `E_mail` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Passwords` varchar(255) NOT NULL,
  `Roles` varchar(50) NOT NULL DEFAULT 'User',
  `Id_Post` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id_Categories`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Id_Post`);

--
-- Index pour la table `to_have`
--
ALTER TABLE `to_have`
  ADD PRIMARY KEY (`Id_Categories`,`Id_Post`),
  ADD KEY `FK_to_have_Post` (`Id_Post`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`),
  ADD KEY `FK_User__Post` (`Id_Post`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `Id_Categories` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `Id_Post` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `to_have`
--
ALTER TABLE `to_have`
  ADD CONSTRAINT `FK_to_have_Categories` FOREIGN KEY (`Id_Categories`) REFERENCES `categories` (`Id_Categories`),
  ADD CONSTRAINT `FK_to_have_Post` FOREIGN KEY (`Id_Post`) REFERENCES `post` (`Id_Post`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_User__Post` FOREIGN KEY (`Id_Post`) REFERENCES `post` (`Id_Post`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
