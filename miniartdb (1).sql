-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 mai 2021 à 01:32
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `miniartdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `idAb` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`idAb`, `email`) VALUES
(1, 'bou7e7mid@gmail.com'),
(2, 'hamzaziw5@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `idAd` int(11) NOT NULL,
  `nomAd` varchar(30) NOT NULL,
  `nomutAd` varchar(30) NOT NULL,
  `passAd` varchar(50) NOT NULL,
  `emailAd` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`idAd`, `nomAd`, `nomutAd`, `passAd`, `emailAd`) VALUES
(1, 'Hamza', 'hamza', '123', 'hamza@miniart.tn');

-- --------------------------------------------------------

--
-- Structure de la table `avisproduits`
--

CREATE TABLE `avisproduits` (
  `idAvis` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `etoiles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avisproduits`
--

INSERT INTO `avisproduits` (`idAvis`, `idUsr`, `idProd`, `message`, `etoiles`) VALUES
(4, 5, 1, 'Hamza Test', 1),
(5, 1, 4, 'Test', 5),
(6, 1, 4, 'Hamza Test', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produitsart`
--

CREATE TABLE `produitsart` (
  `idProd` int(11) NOT NULL,
  `titreProd` varchar(50) NOT NULL,
  `descProd` varchar(500) NOT NULL,
  `prixProd` varchar(10) NOT NULL,
  `quantProd` int(11) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produitsart`
--

INSERT INTO `produitsart` (`idProd`, `titreProd`, `descProd`, `prixProd`, `quantProd`, `img1`, `img2`, `img3`) VALUES
(1, 'Design abstract or watercolor ', 'CHAT ME BEFORE ORDER!\r\nThis Is Only Design\r\nLooking for an amazing Abstract or Watercolor Canvas Designs? Then you are at right place!\r\nAre you looking to start your own canvas wall art business? Are you looking for a unique Wall Art Design piece for your Room/Office?\r\n(Digital Abstract, Pop Art, Watercolor, animal,motivational quotes art,figure)\r\nI\'ll help you to make it happen AS SOON AS POSSIBLE. \r\nOriginal Concept\r\nDetails you want included\r\nHIGH QUALITY ', '300 DT', 1, 'images/services/1art/1.webp', 'images/services/1art/2.jpg', 'images/services/1art/3.webp'),
(2, 'I will create exclusive abstra', 'Hello!\r\nPlease read this before buying :)\r\nthis conceptual art service focuses on the creation of conceptual art for character design\r\n-The figures can be: humanoids, robots, demons, monsters or whatever.\r\n-Basic: quick idea B / W, which includes all the elements necessary to illustrate a concept.\r\n-Standard: color concept. They are like basic but with more specific colors and details, textures, etc.\r\n-Premium: Detailed character, with color, effects and textures. can include clothing proposal', '133,9 DT', 1, 'images/services/2art/1.jpg', 'images/services/2art/2.webp', 'images/services/2art/3.webp');

-- --------------------------------------------------------

--
-- Structure de la table `produitscult`
--

CREATE TABLE `produitscult` (
  `idProd` int(11) NOT NULL,
  `titreProd` varchar(30) NOT NULL,
  `descProd` varchar(50) NOT NULL,
  `prixProd` float NOT NULL,
  `quantProd` int(11) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `codeRec` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `titreRec` varchar(30) NOT NULL,
  `descRec` varchar(100) NOT NULL,
  `dateRec` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamations`
--

INSERT INTO `reclamations` (`codeRec`, `idUsr`, `titreRec`, `descRec`, `dateRec`) VALUES
(22, 5, 'Reclamation SiteWeb', 'Jawek Bhey\r\n', '19/04/2021');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nomUt` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomPrenom` varchar(30) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(8) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `verifier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Table utilisateurs de miniartdb';

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nomUt`, `pass`, `email`, `nomPrenom`, `pays`, `adresse`, `tel`, `sexe`, `verifier`) VALUES
(5, 'hamza', '123', 'hamza@fifa.com', 'Hamza Ghariani', 'Tunisia', 'Tunis', '29000000', 'f', 0),
(7, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'f', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`idAb`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`idAd`);

--
-- Index pour la table `avisproduits`
--
ALTER TABLE `avisproduits`
  ADD PRIMARY KEY (`idAvis`);

--
-- Index pour la table `produitsart`
--
ALTER TABLE `produitsart`
  ADD PRIMARY KEY (`idProd`);

--
-- Index pour la table `produitscult`
--
ALTER TABLE `produitscult`
  ADD PRIMARY KEY (`idProd`);

--
-- Index pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD PRIMARY KEY (`codeRec`),
  ADD KEY `userec` (`idUsr`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `idAb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `idAd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avisproduits`
--
ALTER TABLE `avisproduits`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `produitsart`
--
ALTER TABLE `produitsart`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produitscult`
--
ALTER TABLE `produitscult`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `codeRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `userec` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
