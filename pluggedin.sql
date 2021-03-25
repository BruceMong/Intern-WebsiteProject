-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 mars 2021 à 10:46
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pluggedin`
--

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE `droit` (
  `id_droit` int(11) NOT NULL,
  `authentifier` tinyint(1) NOT NULL,
  `rechercher_entreprise` tinyint(1) NOT NULL,
  `creer_entreprise` tinyint(1) NOT NULL,
  `modifier_entreprise` tinyint(1) NOT NULL,
  `evaluer_entreprise` tinyint(1) NOT NULL,
  `supprimer_entreprise` tinyint(1) NOT NULL,
  `consulter_stats_entreprises` tinyint(1) NOT NULL,
  `rechercher_offre` tinyint(1) NOT NULL,
  `creer_offre` tinyint(1) NOT NULL,
  `modifier_offre` tinyint(1) NOT NULL,
  `supprimer_offre` tinyint(1) NOT NULL,
  `consulter_stats_offres` tinyint(1) NOT NULL,
  `rechercher_compte_pilote` tinyint(1) NOT NULL,
  `creer_compte_pilote` tinyint(1) NOT NULL,
  `modifier_compte_pilote` tinyint(1) NOT NULL,
  `supprimer_compte_pilote` tinyint(1) NOT NULL,
  `rechercher_compte_delegue` tinyint(1) NOT NULL,
  `creer_compte_delegue` tinyint(1) NOT NULL,
  `modifier_compte_delegue` tinyint(1) NOT NULL,
  `supprimer_compte_delegue` tinyint(1) NOT NULL,
  `assigner_droits_delegue` tinyint(1) NOT NULL,
  `rechercher_compte_etudiant` tinyint(1) NOT NULL,
  `creer_compte_etudiant` tinyint(1) NOT NULL,
  `modifier_compte_etudiant` tinyint(1) NOT NULL,
  `supprimer_compte_etudiant` tinyint(1) NOT NULL,
  `consulter_stats_etudiants` tinyint(1) NOT NULL,
  `ajouter_offre_wish_list` tinyint(1) NOT NULL,
  `retirer_offre_wish_list` tinyint(1) NOT NULL,
  `postuler_offre` tinyint(1) NOT NULL,
  `info_sys_avance_candi1` tinyint(1) NOT NULL,
  `info_sys_avance_candi2` tinyint(1) NOT NULL,
  `info_sys_avance_candi3` tinyint(1) NOT NULL,
  `info_sys_avance_candi4` tinyint(1) NOT NULL,
  `info_sys_avance_candi5` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `droit`
--

INSERT INTO `droit` (`id_droit`, `authentifier`, `rechercher_entreprise`, `creer_entreprise`, `modifier_entreprise`, `evaluer_entreprise`, `supprimer_entreprise`, `consulter_stats_entreprises`, `rechercher_offre`, `creer_offre`, `modifier_offre`, `supprimer_offre`, `consulter_stats_offres`, `rechercher_compte_pilote`, `creer_compte_pilote`, `modifier_compte_pilote`, `supprimer_compte_pilote`, `rechercher_compte_delegue`, `creer_compte_delegue`, `modifier_compte_delegue`, `supprimer_compte_delegue`, `assigner_droits_delegue`, `rechercher_compte_etudiant`, `creer_compte_etudiant`, `modifier_compte_etudiant`, `supprimer_compte_etudiant`, `consulter_stats_etudiants`, `ajouter_offre_wish_list`, `retirer_offre_wish_list`, `postuler_offre`, `info_sys_avance_candi1`, `info_sys_avance_candi2`, `info_sys_avance_candi3`, `info_sys_avance_candi4`, `info_sys_avance_candi5`) VALUES
(2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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
  `evaluation_entreprise` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `localite` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom`, `secteur_activite`, `nombre_stagiaire_cesi`, `confiance_pilote`, `evaluation_entreprise`, `image`, `localite`) VALUES
(1, 'Saint-Gobin', 'Materiaux', 3, 4, 4, 'https://forcomm.fr/wp-content/uploads/2020/05/communication-unifiee-schema-500x500.jpg', 'Marseille'),
(2, 'Atos', 'Informatique', 1, 5, 4, 'https://forcomm.fr/wp-content/uploads/2020/05/communication-unifiee-schema-500x500.jpg', 'Paris'),
(3, 'Mediamoov', 'Informatique', 4, 2, 4, 'https://ipfs.koreus.com/ipfs/QmP7sL9Z8i7X1JQqbTevZPfpnXJntKdGrPXceNBDzDhrNv', 'Strasbourg');

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id_offre` int(11) NOT NULL,
  `competences` varchar(20) NOT NULL,
  `entreprise` varchar(20) NOT NULL,
  `type_promo_concerne` varchar(20) NOT NULL,
  `duree_stage` int(11) NOT NULL,
  `base_remuneration` int(11) NOT NULL,
  `duree_offre` int(11) NOT NULL,
  `nombre_place` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id_offre`, `competences`, `entreprise`, `type_promo_concerne`, `duree_stage`, `base_remuneration`, `duree_offre`, `nombre_place`, `date`) VALUES
(1, 'Developpement web', 'Mediamoov', 'A3', 6, 600, 2, 3, '2021-10-13');

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`id_profil`, `libelle`) VALUES
(1, 'Etudiant'),
(2, 'Pilote'),
(3, 'Administrateur'),
(4, 'Delegue');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `libelle`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_users` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `mot_de_passe` varchar(20) NOT NULL,
  `centre` varchar(20) NOT NULL,
  `id_promotion` int(11) NOT NULL,
  `id_profil` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_users`, `nom`, `prenom`, `login`, `mot_de_passe`, `centre`, `id_promotion`, `id_profil`) VALUES
(5, 'LUCAS', 'Tom', 'Tom.Lucas', 'Tom1006', 'Orleans', 1, 1),
(2, 'MONG-THE', 'Bruce', 'Bruce.Mongthe', 'Bruce4005', 'Aix en Provence', 1, 1),
(3, 'PINOTEAU', 'Hadrien', 'hadrien.pinoteau', 'Hadri2001', 'Aix en Provence', 1, 1),
(6, 'OLLIVIER', 'Alex', 'Alex.Ollivier', 'Alex1005', 'Aix en Provence', 1, 1),
(7, 'NAPOLETANO', 'Ronin', 'Ronin.Napoletano', 'Ronin2000', 'Aix en Provence', 1, 1),
(8, 'NDONG', 'Erica', 'Erica.Ndong', 'Erica2121', 'Aix en Provence', 1, 1),
(9, 'OLLIVIER', 'Alexis', 'Alexis.Ollivier', 'Alexis1213', 'Nice', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `droit`
--
ALTER TABLE `droit`
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
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `droit`
--
ALTER TABLE `droit`
  MODIFY `id_droit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id_offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
