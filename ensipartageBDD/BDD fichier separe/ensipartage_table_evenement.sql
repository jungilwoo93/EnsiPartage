
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
