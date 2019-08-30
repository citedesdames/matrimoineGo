-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 30 août 2019 à 16:18
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
-- Structure de la table `jcdd_contenu`
--

CREATE TABLE `jcdd_contenu` (
  `id` int(11) NOT NULL,
  `jeu` int(11) NOT NULL,
  `femme` varchar(100) NOT NULL,
  `categorie` varchar(1) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `indice_lieu` text NOT NULL,
  `indice_femme` text NOT NULL,
  `photo_lieu` varchar(255) NOT NULL,
  `photo_lieu_source` varchar(255) NOT NULL,
  `photo_lieu_licence` varchar(255) NOT NULL,
  `source_texte` varchar(255) NOT NULL,
  `photo_femme` varchar(255) NOT NULL,
  `photo_femme_source` varchar(255) NOT NULL,
  `photo_femme_licence` varchar(255) NOT NULL,
  `date_naissance` varchar(6) NOT NULL,
  `date_mort` varchar(6) NOT NULL,
  `question_quizz` text NOT NULL,
  `reponse1` text NOT NULL,
  `ok_reponse1` tinyint(1) NOT NULL,
  `reponse2` text NOT NULL,
  `ok_reponse2` tinyint(1) NOT NULL,
  `reponse3` text NOT NULL,
  `ok_reponse3` tinyint(1) NOT NULL,
  `biographie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jcdd_contenu`
--

INSERT INTO `jcdd_contenu` (`id`, `jeu`, `femme`, `categorie`, `adresse`, `latitude`, `longitude`, `indice_lieu`, `indice_femme`, `photo_lieu`, `photo_lieu_source`, `photo_lieu_licence`, `source_texte`, `photo_femme`, `photo_femme_source`, `photo_femme_licence`, `date_naissance`, `date_mort`, `question_quizz`, `reponse1`, `ok_reponse1`, `reponse2`, `ok_reponse2`, `reponse3`, `ok_reponse3`, `biographie`) VALUES
(1, 1, 'Rosa Bonheur', '1', '32 rue d\'Assas, Paris', '48.8478364', '2.3290141', 'Elle avait auparavant son atelier dans une autre portion de la rue qui s\'appelait rue de l\'Ouest.', 'En 1854, la peintre Rosa Bonheur déménage de son précédent atelier <a href=\"http://vergue.com/post/643/Rue-Assas\">rue de l\'Ouest</a> pour un atelier <a href=\"https://archive.org/details/rosabonheursavie00rogeuoft/page/60\">rue d\'Assas</a>. Elle quitte cet atelier en 1860.', 'https://s3.eu-west-3.amazonaws.com/pop-phototeque/joconde/50130000063/96-020316.jpg', 'https://www.pop.culture.gouv.fr/notice/joconde/50130000063', 'domaine public', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/RosaBonheur.jpg', 'https://commons.wikimedia.org/wiki/File:Andr%C3%A9_Adolphe-Eug%C3%A8ne_Disd%C3%A9ri_(French_-_(Rosa_Bonheur)_-_Google_Art_Project.jpg', 'domaine public - Eugène Disdéri', '1822', '1899', 'Elle était spécialisée dans la représentation :', 'des animaux', 1, 'des figures mythologiques', 0, 'de la noblesse de la Renaissance', 0, 'Marie-Rosalie est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. '),
(2, 1, 'Hélène Bertaux', '1', 'Jardin du Luxembourg, Paris', '48.8481491', '2.3365903', 'Elle a réalisé une autre version de cette sculpture de marbre, en bronze, conservée au Petit Palais.', 'Cette sculpture d\'Hélène Bertaux, intitulée \"Psyché sous l\'emprise du mystère\", a été acquise en 1889 par l\'Etat et déposée en 1923 au sénat.', 'https://upload.wikimedia.org/wikipedia/commons/1/14/Psyche_sous_l%27emprise_du_mystere_statue.jpg', 'https://commons.wikimedia.org/wiki/File:Psyche_sous_l%27emprise_du_mystere_statue.jpg', 'CC-BY-SA 4.0 - Wikimédia Commons (Eutouring)', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/HeleneBertaux.jpg', 'https://commons.wikimedia.org/wiki/File:H%C3%A9l%C3%A8ne_Bertaux_1864_par_%C3%89tienne_Carjat_BNF_Gallica.jpg', 'domaine public - Étienne Carjat (1864, Bibliothèque nationale de France)', '1825', '1909', 'Elle obtient une médaille d\'or :', 'à l\'Exposition universelle de Paris de 1889', 1, 'au Salon de 1872', 0, 'aux Jeux olympiques de 1912', 0, 'Hélène Bertaux, est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. '),
(3, 1, 'Camille Claudel', '1', '117 rue Notre-Dame-des-Champs, Paris', '48.8408324', '2.3344715', 'Elle habitait au 110 de cette rue, à quelques numéros de son atelier, et étudiait non loin de là.', 'La sculptrice Camille Claudel louait un atelier avec notamment la sculptrice anglaise Jessie Lipscomb, rencontrée à l\'Académie Colarossi.', 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Camille_Claudel_atelier.jpg', 'https://fr.wikipedia.org/wiki/Fichier:Camille_Claudel_atelier.jpg', 'domaine public - Photographie de William Elborne (1887)', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/CamilleClaudel.jpg', 'https://commons.wikimedia.org/wiki/File:Camille_Claudel.jpg', 'domaine public - Auteur inconnu', '1864', '1943', 'Une autre artiste a partagé son atelier', 'Jessie Lipscomb', 1, 'Berthe Morisot', 0, 'Sonia Delaunay', 0, 'Camille Claudel,  est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. '),
(4, 1, 'Marguerite de Navarre', '2', 'Jardin du Luxembourg, Paris', '48.846242', '2.3365033', 'Elle est devenue reine en 1527 et une statue qui la représente se trouve au Jardin du Luxembourg.', 'Cette statue commandée en 1845 à Joseph Stanislas Lescorne et réalisée en 1848 représente Marguerite de Navarre, qui en plus de son rôle de reine, protectrice de nombreux artistes de la Renaissance, a aussi écrit elle-même, par exemple L\'Heptaméron, un recueil de nouvelles.', 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Marguerite_d%27Angouleme.JPG', 'https://commons.wikimedia.org/wiki/File:Marguerite_d%27Angouleme.JPG', 'CC-BY-SA 3.0 - Wikimedia Commons (LPLT)', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/MargueriteDeNavarre.jpg', 'https://commons.wikimedia.org/wiki/File:Portrait_de_Marguerite_de_Navarre,_attribu%C3%A9_%C3%A0_Fran%C3%A7ois_Clouet,_mus%C3%A9e_Cond%C3%A9_(cropped).jpg', 'domaine public - Musée Condé', '1492', '1549', 'Combien de nouvelles dans le recueil qu\'elle a écrit ?', '72', 1, '42', 0, '18', 0, 'Margerite de navarre est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. '),
(5, 1, 'George Sand', '2', 'Jardin du Luxembourg, Paris', '48.8465393', '2.3397631', 'Sa statue, qui mesure 1,8m de haut, a été inaugurée en juillet 1904.', 'François-Léon Sicard s\'est inspiré d\'un tableau de George Sand par Auguste Charpentier pour le monument dédié à cette autrice, qui a écrit plus de 70 et 50 volumes d\'œuvres diverses.', 'https://upload.wikimedia.org/wikipedia/commons/7/7b/Fran%C3%A7ois-L%C3%A9on_Sicard_-_George_Sand.JPG', 'https://commons.wikimedia.org/wiki/File:Fran%C3%A7ois-L%C3%A9on_Sicard_-_George_Sand.JPG', 'domaine public - Wikimédia Commons - Daderot', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/GeorgeSand.jpg', 'https://commons.wikimedia.org/wiki/File:George_Sand.PNG', 'domaine public - Auguste Charpentier (1838, Musée de la Vie romantique)', '1804', '1876', 'Son premier prénom était :', 'Amantine', 1, 'Marine', 0, 'Rosaline', 0, 'George Sand est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. '),
(6, 1, 'Maria Deraismes', '0', 'Square des Épinettes, Paris', '48.8938386', '2.3264057', '', 'Sa statue visibile à Paris a été inaugurée en 1898, fondue en 1943 puis reproduite et réinstallée en 1983. ', 'https://upload.wikimedia.org/wikipedia/commons/2/28/Barrias_Maria_Deraismes_Epinettes_Paris_17e.jpg', 'https://commons.wikimedia.org/wiki/File:Barrias_Maria_Deraismes_Epinettes_Paris_17e.jpg', 'CC-BY-SA 3.0 - Wikimedia Commons (Siren-Com)', 'CC-BY-SA 4.0 - Philippe Gambette', './img/femmes/MariaDeraismes.jpg', 'https://commons.wikimedia.org/wiki/File:Maria-Deraismes-freemason.jpg', 'domaine public - Fuzzypeg (Wikimedia Commons)', '1828', '1894', 'Elle a créé une organisation féministe :', 'la Société pour l\'amélioration du sort de la femme', 1, 'le Mouvement de libération des femmes', 0, 'le Club des femmes', 0, 'Maria Deraismes est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les années 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte. ');

-- --------------------------------------------------------

--
-- Structure de la table `jcdd_jeu`
--

CREATE TABLE `jcdd_jeu` (
  `id_jeu` int(1) NOT NULL,
  `nom_jeu` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `categorie_1` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `categorie_2` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `message` text CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_source` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_licence` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `texte_fin` text NOT NULL,
  `score_tb` varchar(255) NOT NULL,
  `score_b` varchar(255) NOT NULL,
  `score_ab` varchar(255) NOT NULL,
  `accueil_drag` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jcdd_jeu`
--

INSERT INTO `jcdd_jeu` (`id_jeu`, `nom_jeu`, `categorie_1`, `categorie_2`, `message`, `photo`, `photo_source`, `photo_licence`, `texte_fin`, `score_tb`, `score_b`, `score_ab`, `accueil_drag`) VALUES
(1, 'Matrimoine du 6e arrondissement', 'sculptrices et peintres', 'écrivaines', 'Pour approfondir, découvrez d\'autres lieux du matrimoine parisien avec <a href=\"http://matrimoinedeparis.com\"><i>Le Matrimoine de Paris</i></a> d\'Edith Vallée, <a href=\"http://laguidedevoyage.com/produit/la-guide-de-voyage-paris/\"><i>La guide de voyage : Paris</i></a> de Charlotte Soulary et Anaïs Bourdet et la carte interactive du <a href=\"https://matrimoine-parisien.home.blog\">matrimoine parisien</a>.', './img/jeux/Parcours6eArrondissement.jpg', 'https://commons.wikimedia.org/wiki/File:Paris_5e_%26_6e_arrondissement_-_Eug%C3%A8ne_Andriveau-Goujon.jpg', 'domaine public', '<p>Parmi les initiatives qui visent à faire connaître les <b>femmes artistes</b>, le <a href=\"https://awarewomenartists.com/artistes_femmes/\">répertoire de l\'association AWARE</a> regroupe des artistes femmes du champ des arts plastiques, nées entre 1860 et 1972. Le musée d\'Orsay a proposé en 2019 un <a href=\"https://www.musee-orsay.fr/fr/collections/femmes-art-et-pouvoir.html\">parcours <i>Femmes, art et pouvoir</i></a> dans ses collections.</p><p>Quant aux autrices, l\'association <b>Le deuxième texte</b> vise à donner leur place aux femmes de lettres dans le canon littéraire enseigné en France. Elle propose notament une carte de France des autrices dans le domaine public, sur le site du défi #JeLaLis qui permet de choisir une autrice pour la promouvoir de la manière la plus inventive possible.</p>', 'Bravo ! L\'histoire des créatrices du sixième arrondissement n\'a pas de secret pour toi !', 'Tu n\'as pas fait beaucoup d\'erreurs dans votre découverte du matrimoine du 6e arrondissement, continue à t\'informer sur l\'histoire des créatrices pour avoir de meilleurs résultats sur les autres arrondissements.', 'Tu as fait beaucoup d\'erreurs mais c\'est l\'occasion de progresser dans ta découverte du matrimoine !', 'Classe les artistes ensemble, grâce aux informations que tu as eu à la première étape tu peux maintenant classer ces femmes en 2 catégories la scène et le salon. Déplace les photos des femmes vers l\'endroit qui te semble le plus approprié.'),
(2, 'Matrimoine du 1er arrondissement par Edith Vallée', 'la scène', 'le salon', 'Pour approfondir, découvrez d\'autres lieux du matrimoine parisien avec <a href=\"http://matrimoinedeparis.com\"><i>Le Matrimoine de Paris</i></a> d\'Edith Vallée, <a href=\"http://laguidedevoyage.com/produit/la-guide-de-voyage-paris/\"><i>La guide de voyage : Paris</i></a> de Charlotte Soulary et Anaïs Bourdet et la carte interactive du <a href=\"https://matrimoine-parisien.home.blog\">matrimoine parisien</a>.', './img/jeux/Parcours1erArrondissementEdithVallee.jpg', 'https://commons.wikimedia.org/wiki/File:Paris_1er_arrondissement_-_Eug%C3%A8ne_Andriveau-Goujon.jpg', 'domaine public', 'loremmm2', 'Bien joué digne d\'un vrai explorateur !', 'Bravo tu as tout trouvé !', 'Tu as enfin reussi a tout trouvé.', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jcdd_contenu`
--
ALTER TABLE `jcdd_contenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jcdd_jeu`
--
ALTER TABLE `jcdd_jeu`
  ADD PRIMARY KEY (`id_jeu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jcdd_contenu`
--
ALTER TABLE `jcdd_contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `jcdd_jeu`
--
ALTER TABLE `jcdd_jeu`
  MODIFY `id_jeu` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
