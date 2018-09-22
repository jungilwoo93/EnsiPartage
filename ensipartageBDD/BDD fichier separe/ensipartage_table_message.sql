
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
