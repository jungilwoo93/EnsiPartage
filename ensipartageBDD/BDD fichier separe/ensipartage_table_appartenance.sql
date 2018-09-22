
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
