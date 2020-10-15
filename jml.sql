-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 12 juil. 2020 à 18:47
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jml`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `identifiant` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `identifiant`, `motdepasse`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `id` int(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `idadmin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`id`, `titre`, `contenu`, `date`, `idadmin`) VALUES
(61, 'odanou', 'odano', '2020-07-12 14:52:08', 1);

-- --------------------------------------------------------

--
-- Structure de la table `notifiation`
--

CREATE TABLE `notifiation` (
  `id` int(20) NOT NULL,
  `tel` int(10) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `date_message` datetime NOT NULL,
  `idadmin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `notifiation`
--

INSERT INTO `notifiation` (`id`, `tel`, `nom`, `email`, `message`, `date_message`, `idadmin`) VALUES
(8, 93240584, 'odanou', 'massahoudoudanou@gmail.com', 'j aimerai prendre rendez-vous ', '2020-07-12 14:47:13', 1),
(9, 93240584, 'odanou', 'massahoudoudanou@gmail.com', 'j aimerai prendre rendez-vous ', '2020-07-12 16:35:50', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gk` (`idadmin`);

--
-- Index pour la table `notifiation`
--
ALTER TABLE `notifiation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kg` (`idadmin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `notifiation`
--
ALTER TABLE `notifiation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `gk` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `notifiation`
--
ALTER TABLE `notifiation`
  ADD CONSTRAINT `kg` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
