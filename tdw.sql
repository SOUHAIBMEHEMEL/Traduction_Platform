-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 04 fév. 2020 à 17:11
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdw`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', '$2y$10$JBmFsAS2N5qZlI/raUp2iefAYwe0yHJl6TJB44mfeS6GC8xbOo.U6');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `wilaya` varchar(50) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `bloque` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`user_id`, `user_name`, `user_email`, `user_pass`, `fname`, `lname`, `phone`, `fax`, `adresse`, `wilaya`, `commune`, `bloque`) VALUES
(4, 'SOUHAIB MEHEMEL', 'fs_mehemel@esi.dz', '$2y$10$TKL7tv7AT5YGpKWEltKPX.3tuEFdG5LBNh7l6m/WylqhimVOp5nKy', 'SOUHAIB', 'MEHEMEL', '0667230448', '035123421', 'fatmi secteur', 'BBA', 'BBA', '0'),
(5, 'merzak Benouadah', 'Benouadah@gmail.com', '$2y$10$IIhro2wepJ5NBpgdcTaWY.fC/JqEImMbUC7mWmhAtXAu07DGuaSly', 'merzak', 'Benouadah', '021 56 25 70', '021 56 30 50 / 56 51 54', '05 Rue des martyrs', 'Tizi-ouzou', 'Es-Senia', '0'),
(6, 'Leila Brahimi', 'Brahimi@gmail.com', '$2y$10$BjAMP4PrxX4I6uW2WbOMSeYmA9l3RoaXGAYKZgu.bRI2fmwMjOAGG', 'Leila', 'Brahimi', '021 56 25 70', '021 56 30 50 / 56 51 54', '50 Rue de la libertÃ©', 'Setif', 'El-Eulma', '0'),
(7, 'fatiha bendaoud', 'bendaoud@gmail.com', '$2y$10$H0X1TkOH/IJmfacEBTr1TuI9gjyPTD0eu0vErWUl.Raqi2mGClW5e', 'fatiha', 'bendaoud', '021 56 25 70', '021 56 30 50 / 56 51 54', '50 Rue des oliviers', 'Bechar', 'Saoura', '0'),
(8, 'Said Aider', 'aider@gmail.com', '$2y$10$VCah942jVd4M0IwR2fAMr.y1O4mxZMm02p6.WMGPMLU2XAYnZFM0G', 'Said', 'Aider', '021 56 25 70', '021 56 30 50 / 56 51 54', '50 Rue des dunes', 'Blida', 'Soumaa', '0'),
(9, 'Samir Boumaaza', 'Boumaaza@gmail.com', '$2y$10$j3WL81/QmWwv0J9SALOotehQr10OiMTlrVI/8oTFNWlcSApftaE4C', 'Samir', 'Boumaaza', '021 56 25 70', '021 56 30 50 / 56 51 54', '50 Rue des dunes', 'Alger', 'Rouiba', '0');

-- --------------------------------------------------------

--
-- Structure de la table `demandedevi`
--

CREATE TABLE `demandedevi` (
  `id` int(11) NOT NULL,
  `devi_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `demandedevi`
--

INSERT INTO `demandedevi` (`id`, `devi_id`, `traducteur_id`) VALUES
(41, 26, 13),
(42, 26, 8),
(43, 26, 13);

-- --------------------------------------------------------

--
-- Structure de la table `devi`
--

CREATE TABLE `devi` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `wilaya` varchar(50) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `lang_orig` varchar(30) NOT NULL,
  `lang_src` varchar(30) NOT NULL,
  `typetraduction` varchar(50) NOT NULL,
  `comments` varchar(300) NOT NULL,
  `specification` varchar(300) NOT NULL,
  `assermente` varchar(30) NOT NULL,
  `id_fichier` varchar(200) NOT NULL,
  `dateCreation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devi`
--

INSERT INTO `devi` (`id`, `user_id`, `nom`, `prenom`, `mail`, `phone`, `adresse`, `wilaya`, `commune`, `lang_orig`, `lang_src`, `typetraduction`, `comments`, `specification`, `assermente`, `id_fichier`, `dateCreation`) VALUES
(26, '8', 'said', 'aider', 'said@gmail.com', '0667230448', 'boumerdes', 'Boumerdes', 'BBA', 'anglais', 'francais', 'scientifique', 'non', 'non', 'oui', 'doc1.pdf', '2020-02-04 04:27:55');

-- --------------------------------------------------------

--
-- Structure de la table `docatraduire`
--

CREATE TABLE `docatraduire` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `docatraduire`
--

INSERT INTO `docatraduire` (`id`, `name`, `doc`, `id_client`, `date`) VALUES
(28, 'doc1.pdf', '../documents/demandeDevi/doc1.pdf', 8, '2020-02-04 04:27:55');

-- --------------------------------------------------------

--
-- Structure de la table `reponsedevi`
--

CREATE TABLE `reponsedevi` (
  `id` int(11) NOT NULL,
  `devi_id` int(11) NOT NULL,
  `traducteur_id` int(11) NOT NULL,
  `dateReponse` datetime NOT NULL,
  `fichierReponse` varchar(200) NOT NULL,
  `accepte` varchar(10) NOT NULL,
  `valide` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reponsedevi`
--

INSERT INTO `reponsedevi` (`id`, `devi_id`, `traducteur_id`, `dateReponse`, `fichierReponse`, `accepte`, `valide`) VALUES
(28, 26, 8, '2020-02-04 04:28:50', 'doc2.pdf', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `traducteur`
--

CREATE TABLE `traducteur` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `wilaya` varchar(50) NOT NULL,
  `commune` varchar(50) NOT NULL,
  `langues` varchar(150) NOT NULL,
  `assermente` varchar(1) NOT NULL,
  `bloque` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `traducteur`
--

INSERT INTO `traducteur` (`user_id`, `user_name`, `user_email`, `user_pass`, `fname`, `lname`, `phone`, `fax`, `adresse`, `wilaya`, `commune`, `langues`, `assermente`, `bloque`) VALUES
(8, 'Said Belhadj', 'Belhadj@gmail.com', '$2y$10$SAXuR53nq4TYekS6aGRbGOKeWuVNZY.t0pxa.ctBVguSb0f6MuDyi', 'Said', 'Belhadj', '031 56 25 70', '031 56 30 50', '50 Rue des martyrs', 'Oran', 'Es-Senia', 'Arabe- FranÃ§ais-Anglais', 'o', '0'),
(9, 'Karim Helali', 'Helali@gmail.com', '$2y$10$s1Ehdy.8i./XuoxqKXs.V.X8tBVTXSjCETwCd70dwAEbTNa5ZOJfm', 'Karim', 'Helali', '035 56 25 70', '031 56 30 50', '3500 Rue de la libertÃ©', 'Boumerdes', 'Boumerdes-centre', 'Arabe â€“ Turque', 'o', '0'),
(10, 'Taous Bouroubi', 'Bouroubi@gmail.com', '$2y$10$wFRnZ81a2GP6gYohQLhjheNUq/T6l4VePwuTGS8zy4ZfkHEbdd1F2', 'Taous', 'Bouroubi', '023 56 25 70', '023 56 30 50', '68 rue de la gare.', 'Alger', 'Oued Smar', 'Arabe-Anglais-Espagnol', 'o', '0'),
(11, 'Djamila Sebaa', 'Sebaa@gmail.com', '$2y$10$Jmwb2gTRggJXnceg0U8jg.VS8rnurEX1YpCIBt4xoXYUg4RM2TJUi', 'Djamila', 'Sebaa', '026 56 25 70', '026 56 30 50', '30 Rue des dunes', 'El-Oued', 'Djamaa', 'Arabe-FranÃ§ais', 'o', '0'),
(12, 'Farouk Hazi', 'Hazi@gmail.com', '$2y$10$ih/7zjcoE6ueRRAql810POWGJx1wgI02QcAOeq5fwnYghJKx10RJe', 'Farouk', 'Hazi', '025 56 25 70', '025 56 30 50', '10 Rue des oliviers', 'Tizi-ouzou', 'Freha', 'Arabe-Chinois-Anglais', 'o', '0'),
(13, 'MEHEMEL SOUHAIB', 'souhaibmehemel@gmail.com', '$2y$10$lBwtjkIKMGVXFX4rtmq4YeZEsPViqF5BLXvmg53EQDXqGUFgvE6dO', 'MEHEMEL', 'SOUHAIB', '0667230448', '035123421', 'fatmi secteur', 'BBA', 'BBA', 'Arabe- FranÃ§ais-Anglais', 'o', '0');

-- --------------------------------------------------------

--
-- Structure de la table `traduction`
--

CREATE TABLE `traduction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fichier` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `demandedevi`
--
ALTER TABLE `demandedevi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devi`
--
ALTER TABLE `devi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `docatraduire`
--
ALTER TABLE `docatraduire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reponsedevi`
--
ALTER TABLE `reponsedevi`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `traducteur`
--
ALTER TABLE `traducteur`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `traduction`
--
ALTER TABLE `traduction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `demandedevi`
--
ALTER TABLE `demandedevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `devi`
--
ALTER TABLE `devi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `docatraduire`
--
ALTER TABLE `docatraduire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `reponsedevi`
--
ALTER TABLE `reponsedevi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `traducteur`
--
ALTER TABLE `traducteur`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `traduction`
--
ALTER TABLE `traduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
