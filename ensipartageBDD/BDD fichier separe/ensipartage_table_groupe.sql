
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
