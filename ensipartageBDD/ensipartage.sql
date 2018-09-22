-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Juin 2017 à 19:26
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ensipartage`
--

-- --------------------------------------------------------

--
-- Structure de la table `annexeutilisateur`
--

CREATE TABLE `annexeutilisateur` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `compteactive` tinyint(1) NOT NULL DEFAULT '0',
  `background` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/sakura.jpg',
  `prefAffichBackground` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `annexeutilisateur`
--

INSERT INTO `annexeutilisateur` (`id`, `userid`, `cle`, `compteactive`, `background`, `prefAffichBackground`) VALUES
(3, 55, '5582f980fab998c2f9807dcde1ceecfe', 1, '/image/sakura.jpg', 1),
(5, 57, '123c91de72450389f17c0cd2feaf1547', 1, 'userBackground/Background.57', 0),
(7, 59, 'a8b6ef4ce73488ed3869be13ae257afe', 1, 'userBackground/Background.59', 1),
(8, 60, '5809c3a79aa904411f3e49a3cb4fd725', 1, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `appartenance`
--

CREATE TABLE `appartenance` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `appartenance`
--

INSERT INTO `appartenance` (`id`, `userId`, `groupId`) VALUES
(82, 55, 0),
(81, 55, 1),
(94, 57, 0),
(93, 57, 1),
(111, 57, 2),
(104, 57, 6),
(99, 57, 7),
(103, 57, 49),
(102, 57, 51),
(105, 57, 52),
(101, 57, 54),
(106, 57, 57),
(107, 57, 58),
(100, 57, 59),
(108, 57, 60),
(98, 59, 0),
(97, 59, 1),
(110, 60, 0),
(109, 60, 2);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `objet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

CREATE TABLE `discussion` (
  `ID` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `messageId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `discussion`
--

INSERT INTO `discussion` (`ID`, `groupId`, `messageId`) VALUES
(46, 0, 100),
(47, 2, 101);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dateDebut` date NOT NULL,
  `timeDebut` time NOT NULL,
  `dateFin` date NOT NULL,
  `timeFin` time NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `lieu`, `dateDebut`, `timeDebut`, `dateFin`, `timeFin`, `description`) VALUES
(3, 'Soutenance de projet', 'Grand amphi', '2017-06-16', '08:00:00', '2017-06-16', '18:00:00', 'Presentation du projet'),
(4, 'Présentation Projet 1A', 'ENSISA Lumière', '2017-06-16', '08:00:00', '2017-06-16', '20:00:00', 'Présentation des projet 1A IR 2017');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT '0',
  `droitGroupe` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `parent`, `droitGroupe`) VALUES
(0, 'Utilisateur', 0, '0.0.0'),
(1, 'Etudiant', 0, '1.1.0'),
(2, 'Professeur', 0, '1.2.0'),
(3, 'Personnel', 0, '1.3.0'),
(4, 'Ancien', 0, '1.4.0'),
(5, 'Externe', 0, '1.5.0'),
(6, 'Moderateur', 0, '10.0.0'),
(7, 'Administrateur', 0, '20.0.0'),
(49, 'groupe TP2', 0, '0.0.0'),
(51, 'groupe TD2', 0, '0.0.0'),
(52, '1A IR', 0, '0.0.0'),
(53, 'IR', 0, '0.0.0'),
(54, 'XID', 0, '0.0.0'),
(55, 'soiree de fin d\\\'année', 0, '0.0.0'),
(57, 'derniere soiree', 0, '0.0.0'),
(58, 'reunion de projet', 0, '0.0.0'),
(59, 'Kfet', 0, '0.0.0'),
(60, 'Anniversaire de Thomas', 0, '0.0.0');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `usernom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `usernom`, `date`, `contenu`) VALUES
(100, 'Chabalier', '2017-06-13', 'Bienvenu. Ce groupe réunis les utilisateur du site. Vous pouvez bien sur, créer ou rejoindre plusieur groupes depuis le panel de gestion des groupes.'),
(101, 'Chabalier', '2017-06-13', 'Bienvenu sur le groupe des enseignants.');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `evtid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `participe`
--

INSERT INTO `participe` (`id`, `userid`, `evtid`) VALUES
(2, 57, 3),
(3, 60, 4);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `droitStatut` varchar(10) COLLATE utf8_unicode_ci DEFAULT '1.0.0',
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prefAffichAdresse` tinyint(1) NOT NULL DEFAULT '1',
  `prefAffichDateNaissance` tinyint(1) NOT NULL DEFAULT '1',
  `adresse` text COLLATE utf8_unicode_ci NOT NULL,
  `DateNaissance` date NOT NULL,
  `Genre` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT '/image/profilIcon.png',
  `etatConnexion` tinyint(1) NOT NULL DEFAULT '0',
  `derniereActivite` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `nom`, `prenom`, `statut`, `droitStatut`, `mdp`, `mail`, `prefAffichAdresse`, `prefAffichDateNaissance`, `adresse`, `DateNaissance`, `Genre`, `Avatar`, `etatConnexion`, `derniereActivite`) VALUES
(55, 'Snow', 'Andy', 'externe', '1.0.0', '$2y$12$BofszloOmMmaoQVWQqJCsuDVWyUAh5icc1W6ExOLjiLs1wNtn.Q.u', 'snowandy5@gmail.com', 1, 1, 'Impasse du clos Chabalier 30190 Aubussargues', '1996-04-19', 'M', '/image/profilIcon.png', 0, NULL),
(57, 'Chabalier', 'Andy', 'etudiant', '1.0.0', '$2y$12$dxDUUhaNJoB0tAxBLydcoOmtBUOdCbzd0r8ZwOFrcb.fuNj5Ae0yK', 'andy@chabalier.com', 1, 0, '1 rue de froeninguen, 68200 mulhouse', '1996-04-19', 'M', 'userAvatar/avatar.57', 0, NULL),
(59, 'Lucas', 'Gauziede', 'etudiant', '1.0.0', '$2y$12$SWuIM/DT4YJKnneX0y.ndOYDnAdxWuJEurK5bJawqlThMYC/dtmZO', 'lucas.gauziede@hotmail.fr', 1, 0, '820 route de Grenade 40500 Montsoué', '1996-04-10', 'M', '/image/profilIcon.png', 0, NULL),
(60, 'Weber', 'Jonathan', 'enseignant', '1.0.0', '$2y$12$TY8oAwsX15ynNjeP5hZOHeIKuameD0xAOqCHnWC7zFo2KYHg7.NB2', 'jonathan.weber@uha.fr', 1, 0, '12 rue des frères lumières', '1996-04-19', 'M', 'userAvatar/avatar.60', 0, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annexeutilisateur`
--
ALTER TABLE `annexeutilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `liaisonUserid` (`userid`);

--
-- Index pour la table `appartenance`
--
ALTER TABLE `appartenance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniciteGroupeUser` (`userId`,`groupId`),
  ADD KEY `liaison2` (`groupId`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `liaisongroupe` (`groupId`),
  ADD KEY `liaisonmessage` (`messageId`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomunique` (`nom`),
  ADD KEY `parente` (`parent`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniciteEventUser` (`id`,`userid`),
  ADD KEY `liaisonUserparticipe` (`userid`),
  ADD KEY `lisaisonEvtParticipe` (`evtid`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `mailunique` (`mail`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annexeutilisateur`
--
ALTER TABLE `annexeutilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `appartenance`
--
ALTER TABLE `appartenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `participe`
--
ALTER TABLE `participe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annexeutilisateur`
--
ALTER TABLE `annexeutilisateur`
  ADD CONSTRAINT `liaisonUserid` FOREIGN KEY (`userid`) REFERENCES `utilisateur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `appartenance`
--
ALTER TABLE `appartenance`
  ADD CONSTRAINT `liaison1` FOREIGN KEY (`userId`) REFERENCES `utilisateur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaison2` FOREIGN KEY (`groupId`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `liaisongroupe` FOREIGN KEY (`groupId`) REFERENCES `groupe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liaisonmessage` FOREIGN KEY (`messageId`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `liaisonUserparticipe` FOREIGN KEY (`userid`) REFERENCES `utilisateur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lisaisonEvtParticipe` FOREIGN KEY (`evtid`) REFERENCES `evenement` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
