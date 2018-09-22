
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
