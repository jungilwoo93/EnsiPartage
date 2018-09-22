
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
