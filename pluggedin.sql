-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 16 mars 2021 à 23:36
-- Version du serveur :  10.3.20-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id_droit` int(11) NOT NULL,
  `libellé` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `secteur_activite` varchar(20) NOT NULL,
  `nombre_stagiaire_cesi` int(11) NOT NULL,
  `confiance_pilote` int(11) NOT NULL,
  `evaluation_entreprise` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `secteur_activite`, `nombre_stagiaire_cesi`, `confiance_pilote`, `evaluation_entreprise`) VALUES
(1, 'Saint-Gobin', 'Materiaux', 3, 4, 4),
(2, 'Atos', 'Informatique', 1, 5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `Competences` varchar(20) NOT NULL,
  `localite` varchar(20) NOT NULL,
  `entreprise` varchar(20) NOT NULL,
  `type_promo_concerne` varchar(20) NOT NULL,
  `duree_stage` int(11) NOT NULL,
  `base_remuneration` int(11) NOT NULL,
  `duree_offre` int(11) NOT NULL,
  `nombre_place` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `Competences`, `localite`, `entreprise`, `type_promo_concerne`, `duree_stage`, `base_remuneration`, `duree_offre`, `nombre_place`) VALUES
(1, 'Developpement web', 'Marseille', 'Mediamoov', 'A3', 6, 600, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id_profil` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id_profil`, `libelle`) VALUES
(1, 'Etudiant'),
(2, 'Pilote'),
(3, 'Administrateur'),
(4, 'Delegue');

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id_promotion` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id_promotion`, `libelle`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  `centre` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_users`, `nom`, `prenom`, `login`, `mot_de_passe`, `centre`) VALUES
(5, 'LUCAS', 'Tom', 'Tom.Lucas', 'Tom1006', 'Orleans'),
(2, 'MONG-THE', 'Bruce', 'Bruce.Mongthe', 'Bruce4005', 'Aix en Provence'),
(3, 'PINOTEAU', 'Hadrien', 'hadrien.pinoteau', 'Hadri2001', 'Aix en Provence'),
(6, 'OLLIVIER', 'Alex', 'Alex.Ollivier', 'Alex1005', 'Aix en Provence'),
(7, 'NAPOLETANO', 'Ronin', 'Ronin.Napoletano', 'Ronin2000', 'Aix en Provence'),
(8, 'NDONG', 'Erica', 'Erica.Ndong', 'Erica2121', 'Aix en Provence'),
(9, 'OLLIVIER', 'Alexis', 'Alexis.Ollivier', 'Alexis1213', 'Nice');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id_droit`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id_offre`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
