-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 mai 2021 à 23:55
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

-- --------------------------------------------------------

--
-- Structure de la table `achats`
--

CREATE TABLE `achats` (
  `idAchat` int(11) NOT NULL,
  `idCmd` int(11) NOT NULL,
  `prixtot` float NOT NULL,
  `idUsr` int(11) NOT NULL,
  `lieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nomUt` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `etoiles` int(11) NOT NULL,
  `imgUsr` varchar(200) NOT NULL,
  `dateAv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `avisproduits`
--

INSERT INTO `avisproduits` (`idAvis`, `idUsr`, `idProd`, `nomUt`, `email`, `message`, `etoiles`, `imgUsr`, `dateAv`) VALUES
(29, 5, 4, 'Hamza Ghariani', 'hamza.ghariani@esprit.tn', 'Merci pour la service , mais la qualite est moyenne.', 3, 'https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg', '2021/05/21'),
(30, 5, 4, 'Hamza Ghariani', 'hamza.ghariani@esprit.tn', 'je suis satisfait , merci.', 4, 'https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg', '2021/05/21'),
(31, 5, 4, 'Hamza Ghariani', 'hamza.ghariani@esprit.tn', 'super service , un grand merci.', 5, 'https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg', '2021/05/21'),
(32, 5, 4, 'Hamza Ghariani', 'hamza.ghariani@esprit.tn', 'Merci Pour vous !', 5, 'https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg', '2021/05/21'),
(33, 5, 4, 'Hamza Ghariani', 'hamza.ghariani@esprit.tn', 'Merci pour vous vraiment.', 5, 'https://34yigttpdc638c2g11fbif92-wpengine.netdna-ssl.com/wp-content/uploads/2016/09/default-user-img.jpg', '2021/05/21');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `idCmd` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `prixtot` float NOT NULL,
  `idLiv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`idCmd`, `idUsr`, `prixtot`, `idLiv`) VALUES
(10, 5, 176, 11);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livraison`
--

INSERT INTO `livraison` (`id`, `date`, `lieu`, `id_client`) VALUES
(11, '2021-05-21', 'Tunisia , Ben Arous,Ezzahra,BN,2035', 5);

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE `paniers` (
  `idPanier` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idProp` int(11) NOT NULL,
  `titreProd` varchar(50) NOT NULL,
  `descProd` varchar(500) NOT NULL,
  `prixProd` float NOT NULL,
  `quantProd` int(10) NOT NULL,
  `typeProd` varchar(10) NOT NULL,
  `img1` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produitsart`
--

CREATE TABLE `produitsart` (
  `idProd` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `titreProd` varchar(50) NOT NULL,
  `descProd` varchar(500) NOT NULL,
  `prixProd` float NOT NULL,
  `quantProd` int(11) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produitsart`
--

INSERT INTO `produitsart` (`idProd`, `idUsr`, `titreProd`, `descProd`, `prixProd`, `quantProd`, `img1`, `img2`, `img3`) VALUES
(1, 5, 'Service 1', 'Description 1', 290, 1, 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg'),
(2, 5, 'Service 2', 'Short Desc', 133, 1, 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg'),
(3, 5, 'Service 3', 'Short Desc', 199, 1, 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg'),
(4, 5, 'Service 4', 'Short Desc', 99, 1, 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg', 'https://tinkerlab.com/wp-content/uploads/2018/06/pulled-string-art-color.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `produitscult`
--

CREATE TABLE `produitscult` (
  `idProd` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `titreProd` varchar(50) NOT NULL,
  `descProd` varchar(500) NOT NULL,
  `prixProd` float NOT NULL,
  `quantProd` int(11) NOT NULL,
  `img1` varchar(200) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produitscult`
--

INSERT INTO `produitscult` (`idProd`, `idUsr`, `titreProd`, `descProd`, `prixProd`, `quantProd`, `img1`, `img2`, `img3`) VALUES
(1, 7, 'Service 1', 'Short Desc', 60, 1, 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg'),
(2, 7, 'Service 2', 'Short Desc', 65, 1, 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg'),
(3, 7, 'Service 3', 'Short Desc', 111, 1, 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg'),
(4, 7, 'Service 4', 'Short Desc', 70, 1, 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg', 'https://www.humanresourcing.co.uk/wp-content/uploads/2020/06/What-does-a-culture-of-equality-really-look-like.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `codePromo` varchar(5) NOT NULL,
  `pourcentage` int(11) NOT NULL,
  `typeProd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `id_produit`, `codePromo`, `pourcentage`, `typeProd`) VALUES
(1, 4, 'HAMZA', 10, 'art'),
(2, 4, 'HAMZA', 20, 'cult');

-- --------------------------------------------------------

--
-- Structure de la table `reclamations`
--

CREATE TABLE `reclamations` (
  `codeRec` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `titreRec` varchar(30) NOT NULL,
  `descRec` varchar(100) NOT NULL,
  `dateRec` varchar(10) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 'hamza', '123', 'hamza.ghariani@esprit.tn', 'Hamza Ghariani', 'Tunis', 'Tunisia', '29000002', 'f', 0),
(7, 'test', 'test', 'hamza.ghariani@esprit.tn', 'test', 'test', 'Ezzahra', '1234', 'f', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

CREATE TABLE `ventes` (
  `id` int(11) NOT NULL,
  `idCmd` int(11) NOT NULL,
  `prixtot` float NOT NULL,
  `email_client` varchar(50) NOT NULL,
  `titreProd` varchar(50) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id`, `idCmd`, `prixtot`, `email_client`, `titreProd`, `idUsr`, `idProd`) VALUES
(13, 10, 176, 'hamza.ghariani@esprit.tn', 'Service 2', 7, 2),
(14, 10, 176, 'hamza.ghariani@esprit.tn', 'Service 3', 7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `wishlist`
--

CREATE TABLE `wishlist` (
  `idWish` int(11) NOT NULL,
  `idUsr` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `typeProd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`idAb`);

--
-- Index pour la table `achats`
--
ALTER TABLE `achats`
  ADD PRIMARY KEY (`idAchat`),
  ADD KEY `idCmd` (`idCmd`),
  ADD KEY `idUsr` (`idUsr`);

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`idAd`);

--
-- Index pour la table `avisproduits`
--
ALTER TABLE `avisproduits`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `idUsr` (`idUsr`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`idCmd`),
  ADD KEY `c1` (`idUsr`),
  ADD KEY `x` (`idLiv`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c` (`id_client`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idUsr` (`idUsr`);

--
-- Index pour la table `produitsart`
--
ALTER TABLE `produitsart`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idUsr` (`idUsr`);

--
-- Index pour la table `produitscult`
--
ALTER TABLE `produitscult`
  ADD PRIMARY KEY (`idProd`),
  ADD KEY `idUsr` (`idUsr`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `ventes`
--
ALTER TABLE `ventes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`idWish`),
  ADD KEY `idUsr` (`idUsr`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `idAb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `achats`
--
ALTER TABLE `achats`
  MODIFY `idAchat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `idAd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `avisproduits`
--
ALTER TABLE `avisproduits`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `idCmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `produitsart`
--
ALTER TABLE `produitsart`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `produitscult`
--
ALTER TABLE `produitscult`
  MODIFY `idProd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `reclamations`
--
ALTER TABLE `reclamations`
  MODIFY `codeRec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ventes`
--
ALTER TABLE `ventes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `idWish` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `achats`
--
ALTER TABLE `achats`
  ADD CONSTRAINT `achats_ibfk_1` FOREIGN KEY (`idCmd`) REFERENCES `commandes` (`idCmd`),
  ADD CONSTRAINT `achats_ibfk_2` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `avisproduits`
--
ALTER TABLE `avisproduits`
  ADD CONSTRAINT `avisproduits_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `c1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `x` FOREIGN KEY (`idLiv`) REFERENCES `livraison` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `c` FOREIGN KEY (`id_client`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD CONSTRAINT `paniers_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produitsart`
--
ALTER TABLE `produitsart`
  ADD CONSTRAINT `produitsart_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `produitscult`
--
ALTER TABLE `produitscult`
  ADD CONSTRAINT `produitscult_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `reclamations`
--
ALTER TABLE `reclamations`
  ADD CONSTRAINT `userec` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`idUsr`) REFERENCES `utilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
