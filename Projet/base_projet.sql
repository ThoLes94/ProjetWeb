-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 13 mars 2021 à 15:24
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `base_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` varchar(64) NOT NULL,
  `title` varchar(128) NOT NULL,
  `categorie` varchar(64) DEFAULT NULL,
  `start` timestamp NULL DEFAULT current_timestamp(),
  `end` timestamp NULL DEFAULT NULL,
  `lieu` varchar(128) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `title`, `categorie`, `start`, `end`, `lieu`, `description`) VALUES
('a6a18c2d6104780c3ab098f2', 'Cours de couture', 'bonjour', '2021-03-13 12:30:00', '2021-03-13 16:00:00', 'Salle titus', 'Donné par madame fil'),
('f0ba4eaffbb69d77a060cb99', 'qsxs', 'bonjour', '2021-03-14 09:30:00', '2021-03-14 12:00:00', 'zd', 'QS'),
('f48681db2af8341646a322ff', 'COurs de couture', 'bonjour', '2021-03-14 14:30:00', '2021-03-14 18:00:00', 'Salle titus', 'Donné par madame fil');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id_eleve` varchar(64) NOT NULL,
  `id_event` varchar(64) NOT NULL,
  `niveau` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`id_eleve`, `id_event`, `niveau`) VALUES
('alice', 'f48681db2af8341646a322ff', 3),
('bob', 'a6a18c2d6104780c3ab098f2', 1),
('bob', 'f48681db2af8341646a322ff', 2),
('user1', 'a6a18c2d6104780c3ab098f2', 1),
('user2', 'a6a18c2d6104780c3ab098f2', 2),
('user3', 'a6a18c2d6104780c3ab098f2', 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `login` varchar(64) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `promotion` int(11) DEFAULT NULL,
  `naissance` date NOT NULL,
  `email` varchar(128) NOT NULL,
  `feuille` varchar(64) NOT NULL,
  `isAdmin` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`, `isAdmin`) VALUES
('alice', '663194f2b9123a38cd9e2e2811f8d2fd387b765e', 'Merveille', 'Alice', NULL, '1865-11-26', 'alice.merveille@aventure.uk', 'wonder', 1),
('bob', '9cc140dd813383e134e7e365b203780da9376438', 'Ar', 'bob', 2019, '0111-01-01', 'thomas.lespargot@gmail.com', '', NULL),
('thomas', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Lespargot', 'Thomas', 2019, '1999-10-11', 'thomas.lespargot@gmail.com', '', NULL),
('user1', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Dupont', 'Paul', NULL, '0001-01-01', 'thomas.lespargot@gmail.com', '', NULL),
('user2', '12dea96fec20593566ab75692c9949596833adc9', 'Legrand', 'Jacques', NULL, '2020-05-10', 'j.legrand@poly.fr', '', NULL),
('user3', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Lepetit', 'André', NULL, '0001-01-01', 'a.lepetit@poly.fr', '', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id_eleve`,`id_event`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
