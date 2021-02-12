-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 fév. 2021 à 23:22
-- Version du serveur :  10.4.16-MariaDB
-- Version de PHP : 7.4.12

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
  `id` int(11) NOT NULL,
  `nom` varchar(128) NOT NULL,
  `categorie` varchar(64) DEFAULT NULL,
  `dateDebut` varchar(64) NOT NULL,
  `dateFin` varchar(64) DEFAULT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `lieu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `categorie`, `dateDebut`, `dateFin`, `allDay`, `lieu`) VALUES
(1, 'Cours de couture', 'Cours', 'ee', NULL, 0, 'titus');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `numero` int(11) NOT NULL,
  `id_eleve` varchar(64) NOT NULL,
  `id_event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`numero`, `id_eleve`, `id_event`) VALUES
(0, 'aa', 1);

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
  `isAdmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`, `isAdmin`) VALUES
('aa', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'aa', 'aa', NULL, '1111-01-01', 'aa@aa', '', NULL),
('abelforth.dumbledore', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dumbledore', 'Abelforth', 1998, '1986-12-10', 'abelforth.dumbledore@yahoo.fr', 'classe.css', NULL),
('alastor.maugrey', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Maugrey', 'Alastor', 2000, '1980-04-10', 'alastor.maugrey@yahoo.fr', 'classe.css', NULL),
('albus.dumbledore', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dumbledore', 'Albus', NULL, '1980-06-10', 'albus.dumbledore@hotmail.fr', 'hype.css', NULL),
('anthony.stark', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Stark', 'Anthony', 2000, '1973-04-02', 'anthony.stark@hotmail.fr', 'hype.css', NULL),
('arthur.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Arthur', 2000, '1979-06-02', 'arthur.weasley@gmail.com', 'classe.css', NULL),
('barry.allen', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Allen', 'Barry', NULL, '1986-12-10', 'barry.allen@gmail.com', 'hype.css', NULL),
('bartemius.croupton', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Croupton', 'Bartemius', 1990, '1979-12-13', 'bartemius.croupton@gmail.com', 'hype.css', NULL),
('bellatrix.lestrange', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lestrange', 'Bellatrix', NULL, '1962-12-10', 'bellatrix.lestrange@hotmail.fr', 'hype.css', NULL),
('bill.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Bill', NULL, '1979-05-13', 'bill.weasley@gmail.com', 'hype.css', NULL),
('charlie.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Charlie', 1998, '1979-02-13', 'charlie.weasley@gmail.com', 'hype.css', NULL),
('clark.kent', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Kent', 'Clark', NULL, '1962-05-02', 'clark.kent@hotmail.fr', 'classe.css', NULL),
('dick.grayson', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Grayson', 'Dick', 2000, '1979-03-02', 'dick.grayson@hotmail.fr', 'classe.css', NULL),
('dobby.dobby', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dobby', 'Dobby', 1998, '1986-12-02', 'dobby.dobby@hotmail.fr', 'classe.css', NULL),
('dolores.ombrage', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Ombrage', 'Dolores', 2000, '1973-04-10', 'dolores.ombrage@yahoo.fr', 'classe.css', NULL),
('dominique.dropsy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Dropsy', 'Dominique', 1998, '1986-12-02', 'dominique.dropsy@hotmail.fr', 'hype.css', NULL),
('dominique.farrugia', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Farrugia', 'Dominique', 1998, '1980-03-10', 'dominique.farrugia@yahoo.fr', 'hype.css', NULL),
('dominique.potter', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Potter', 'Dominique', 1990, '1962-04-13', 'dominique.potter@hotmail.fr', 'hype.css', NULL),
('dominique.rocheteau', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rocheteau', 'Dominique', 1998, '1986-05-02', 'dominique.rocheteau@yahoo.fr', 'hype.css', NULL),
('drago.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Drago', 1998, '1980-05-13', 'drago.malefoy@gmail.com', 'classe.css', NULL),
('DRossin', '663194f2b9123a38cd9e2e2811f8d2fd387b765e', 'Rossin', 'Dominique', 1997, '1973-04-01', 'Dominique.Rossin@liafa.jussieu.fr', 'studieux.css', NULL),
('fred.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Fred', 1990, '1962-06-13', 'fred.weasley@yahoo.fr', 'classe.css', NULL),
('george.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'George', 1998, '1973-06-02', 'george.weasley@gmail.com', 'classe.css', NULL),
('ginny.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Ginny', NULL, '1973-06-13', 'ginny.weasley@gmail.com', 'classe.css', NULL),
('GMonge', 'a8e112d98fc1edf3f69075b13b75659f8debe25c', 'Monge', 'Gaspard', 0, '1746-05-10', 'GM@m4x.org', 'fiesta.css', NULL),
('hal.jordan', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Jordan', 'Hal', 1990, '1962-02-02', 'hal.jordan@hotmail.fr', 'classe.css', NULL),
('harry.potter', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Potter', 'Harry', 1995, '1973-05-02', 'harry.potter@gmail.com', 'classe.css', NULL),
('henry.mac-coy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Mac-Coy', 'Henry', 2000, '1979-05-13', 'henry.mac-coy@hotmail.fr', 'classe.css', NULL),
('hermione.granger', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Granger', 'Hermione', 1995, '1986-04-13', 'hermione.granger@hotmail.fr', 'classe.css', NULL),
('jean.grey', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Grey', 'Jean', NULL, '1986-12-13', 'jean.grey@hotmail.fr', 'classe.css', NULL),
('john.jones', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Jones', 'John', 2000, '1986-12-10', 'john.jones@hotmail.fr', 'hype.css', NULL),
('kurt.wagner', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Wagner', 'Kurt', NULL, '1973-04-02', 'kurt.wagner@gmail.com', 'classe.css', NULL),
('lucius.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Lucius', NULL, '1973-12-13', 'lucius.malefoy@yahoo.fr', 'hype.css', NULL),
('luna.lovegood', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lovegood', 'Luna', 2000, '1962-05-10', 'luna.lovegood@gmail.com', 'hype.css', NULL),
('mar.mar-vell', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Mar-Vell', 'Mar', 2000, '1980-02-02', 'mar.mar-vell@yahoo.fr', 'classe.css', NULL),
('matt.murdock', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Murdock', 'Matt', 1995, '1962-02-02', 'matt.murdock@hotmail.fr', 'classe.css', NULL),
('minerva.mcgonagall', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'McGonagall', 'Minerva', 1998, '1980-03-13', 'minerva.mcgonagall@hotmail.fr', 'hype.css', NULL),
('molly.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Molly', 1990, '1980-02-02', 'molly.weasley@yahoo.fr', 'classe.css', NULL),
('narcissa.malefoy', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Malefoy', 'Narcissa', NULL, '1986-12-13', 'narcissa.malefoy@gmail.com', 'classe.css', NULL),
('neville.londubat', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Londubat', 'Neville', 1995, '1973-06-10', 'neville.londubat@hotmail.fr', 'classe.css', NULL),
('nymphadora.tonks', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Tonks', 'Nymphadora', 1995, '1986-06-13', 'nymphadora.tonks@gmail.com', 'hype.css', NULL),
('oliver.queen', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Queen', 'Oliver', NULL, '1973-05-10', 'oliver.queen@yahoo.fr', 'classe.css', NULL),
('percy.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Percy', NULL, '1962-02-10', 'percy.weasley@yahoo.fr', 'hype.css', NULL),
('peter.parker', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Parker', 'Peter', 1998, '1980-03-13', 'peter.parker@yahoo.fr', 'hype.css', NULL),
('peter.pettigrow', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Pettigrow', 'Peter', 2000, '1973-04-02', 'peter.pettigrow@yahoo.fr', 'classe.css', NULL),
('remus.lupin', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Lupin', 'Remus', 1990, '1986-05-02', 'remus.lupin@gmail.com', 'hype.css', NULL),
('robert.drake', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Drake', 'Robert', NULL, '1979-04-13', 'robert.drake@yahoo.fr', 'classe.css', NULL),
('robert.reynolds', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Reynolds', 'Robert', 1990, '1979-03-13', 'robert.reynolds@gmail.com', 'hype.css', NULL),
('ron.weasley', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Weasley', 'Ron', 1995, '1973-04-02', 'ron.weasley@hotmail.fr', 'hype.css', NULL),
('rubeus.hagrid', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Hagrid', 'Rubeus', 1990, '1979-12-02', 'rubeus.hagrid@yahoo.fr', 'hype.css', NULL),
('scott.summers', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Summers', 'Scott', 1990, '1979-02-10', 'scott.summers@yahoo.fr', 'classe.css', NULL),
('severus.rogue', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rogue', 'Severus', NULL, '1962-06-02', 'severus.rogue@gmail.com', 'hype.css', NULL),
('sirius.black', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Black', 'Sirius', 1998, '1973-05-13', 'sirius.black@yahoo.fr', 'hype.css', NULL),
('stanley.ipkiss', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Ipkiss', 'Stanley', 1990, '1979-06-10', 'stanley.ipkiss@hotmail.fr', 'hype.css', NULL),
('steve.rogers', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Rogers', 'Steve', 1998, '1973-03-02', 'steve.rogers@gmail.com', 'hype.css', NULL),
('tim.drake', 'e5e9fa1ba31ecd1ae84f75caaa474f3a663f05f4', 'Drake', 'Tim', 1995, '1979-06-13', 'tim.drake@hotmail.fr', 'hype.css', NULL),
('Titi', 'b28b7af69320201d1cf206ebf28373980add1451', 'Henry', 'Thierry', 0, '1977-08-17', 'Titi@arsenal.uk', 'fiesta.css', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`numero`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
