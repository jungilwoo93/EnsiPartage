
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
