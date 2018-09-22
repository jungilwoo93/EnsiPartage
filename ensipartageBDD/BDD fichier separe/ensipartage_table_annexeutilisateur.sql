
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
