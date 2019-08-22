-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 août 2019 à 14:24
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jcdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `jcdd_jeux`
--

CREATE TABLE `jcdd_jeux` (
  `id_jeu` int(1) NOT NULL,
  `nom_jeu` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `categorie_1` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `categorie_2` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `message` text CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_source` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_licence` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `text_cat1` text NOT NULL,
  `text_cat2` text NOT NULL,
  `score_tb` varchar(255) NOT NULL,
  `score_b` varchar(255) NOT NULL,
  `score_ab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jcdd_jeux`
--

INSERT INTO `jcdd_jeux` (`id_jeu`, `nom_jeu`, `categorie_1`, `categorie_2`, `message`, `photo`, `photo_source`, `photo_licence`, `text_cat1`, `text_cat2`, `score_tb`, `score_b`, `score_ab`) VALUES
(1, 'Matrimoine du 6e arrondissement', 'sculptrices et peintres', 'écrivaines', 'Pour approfondir, découvrez d\'autres lieux du matrimoine parisien avec <a href=\"http://matrimoinedeparis.com\"><i>Le Matrimoine de Paris</i></a> d\'Edith Vallée, <a href=\"http://laguidedevoyage.com/produit/la-guide-de-voyage-paris/\"><i>La guide de voyage : Paris</i></a> de Charlotte Soulary et Anaïs Bourdet et la carte interactive du <a href=\"https://matrimoine-parisien.home.blog\">matrimoine parisien</a>.', './img/jeux/Parcours6eArrondissement.jpg', 'https://commons.wikimedia.org/wiki/File:Paris_5e_%26_6e_arrondissement_-_Eug%C3%A8ne_Andriveau-Goujon.jpg', 'domaine public', 'Parmi les initiatives qui visent à faire connaître les <b>femmes artistes</b>, le <a href=\"https://awarewomenartists.com/artistes_femmes/\">répertoire de l\'association AWARE</a> regroupe des artistes femmes du champ des arts plastiques, nées entre 1860 et 1972. Le musée d\'Orsay a proposé en 2019 un <a href=\"https://www.musee-orsay.fr/fr/collections/femmes-art-et-pouvoir.html\">parcours <i>Femmes, art et pouvoir</i></a> dans ses collections.', 'L\'association <b>Le deuxième texte</b> vise à donner leur place aux femmes de lettres dans le canon littéraire enseigné en France. Elle propose notament une carte de France des autrices dans le domaine public, sur le site du défi #JeLaLis qui permet de choisir une autrice pour la promouvoir de la manière la plus inventive possible.', 'Bien joué digne d\'un vrai explorateur !', 'Bravo tu as tout trouvé !', 'Tu as enfin reussi a tout trouvé.'),
(2, 'Matrimoine du 1er arrondissement par Edith Vallée', 'la scène', 'le salon', 'Pour approfondir, découvrez d\'autres lieux du matrimoine parisien avec <a href=\"http://matrimoinedeparis.com\"><i>Le Matrimoine de Paris</i></a> d\'Edith Vallée, <a href=\"http://laguidedevoyage.com/produit/la-guide-de-voyage-paris/\"><i>La guide de voyage : Paris</i></a> de Charlotte Soulary et Anaïs Bourdet et la carte interactive du <a href=\"https://matrimoine-parisien.home.blog\">matrimoine parisien</a>.', './img/jeux/Parcours1erArrondissementEdithVallee.jpg', 'https://commons.wikimedia.org/wiki/File:Paris_1er_arrondissement_-_Eug%C3%A8ne_Andriveau-Goujon.jpg', 'domaine public', 'loremmm2', 'lorem4', 'Bien joué digne d\'un vrai explorateur !', 'Bravo tu as tout trouvé !', 'Tu as enfin reussi a tout trouvé.');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jcdd_jeux`
--
ALTER TABLE `jcdd_jeux`
  ADD PRIMARY KEY (`id_jeu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jcdd_jeux`
--
ALTER TABLE `jcdd_jeux`
  MODIFY `id_jeu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
