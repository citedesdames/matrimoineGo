-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  sqletud.u-pem.fr
-- Généré le :  Lun 08 Juillet 2019 à 18:00
-- Version du serveur :  5.5.62-0+deb8u1-log
-- Version de PHP :  7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gavraam_db`
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
  `indice` text NOT NULL,
  `solution` text CHARACTER SET utf8mb4 NOT NULL,
  `photo_lieu` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_lieu_source` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `photo_lieu_licence` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `source_texte` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jcdd_contenu`
--

INSERT INTO `jcdd_contenu` (`id`, `jeu`, `femme`, `categorie`, `adresse`, `latitude`, `longitude`, `indice`, `solution`, `photo_lieu`, `photo_lieu_source`, `photo_lieu_licence`, `source_texte`) VALUES
(0, 1, 'Rosa Bonheur', '1', '32 rue d\'Assas, Paris', '48.8478364', '2.3290141', 'Rosa Bonheur avait auparavant son atelier dans une autre portion de la rue qui s\'appelait rue de l\'Ouest.', 'En 1854, la peintre Rosa Bonheur déménage de son précédent atelier <a href=\"http://vergue.com/post/643/Rue-Assas\">rue de l\'Ouest</a> pour un atelier <a href=\"https://archive.org/details/rosabonheursavie00rogeuoft/page/60\">rue d\'Assas</a>. Elle quitte cet atelier en 1860.', 'https://s3.eu-west-3.amazonaws.com/pop-phototeque/joconde/50130000063/96-020316.jpg', 'https://www.pop.culture.gouv.fr/notice/joconde/50130000063', 'domaine public', 'CC-BY-SA 4.0 - Philippe Gambette'),
(0, 1, 'Hélène Bertaux', '1', 'Jardin du Luxembourg, Paris', '48.8481491', '2.3365903', 'Une autre version, en bronze, de cette sculpture de marbre d\'Hélène Bertaux, se trouve au Petit Palais', 'Cette sculpture d\'Hélène Bertaux, intitulée \"Psyché sous l\'emprise du mystère\", a été acquise en 1889 par l\'Etat et déposée en 1923 au sénat.', 'https://upload.wikimedia.org/wikipedia/commons/1/14/Psyche_sous_l%27emprise_du_mystere_statue.jpg', 'https://commons.wikimedia.org/wiki/File:Psyche_sous_l%27emprise_du_mystere_statue.jpg', 'CC-BY-SA 4.0 - Wikimédia Commons (Eutouring)', 'CC-BY-SA 4.0 - Philippe Gambette'),
(0, 1, 'Camille Claudel', '1', '117 rue Notre-Dame-des-Champs, Paris', '48.8408324', '2.3344715', 'Camille Claudel habitait au 110 de cette rue et étudiait non loin de là, à l\'Académie Colarossi', 'La sculptrice Camille Claudel louait un atelier au 117 rue Notre-Dame avec notamment la sculptrice anglaise Jessie Lipscomb, rencontrée à l\'Académie Colarossi.', 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Camille_Claudel_atelier.jpg', 'https://fr.wikipedia.org/wiki/Fichier:Camille_Claudel_atelier.jpg', 'domaine public - Photographie de William Elborne (1887)', 'CC-BY-SA 4.0 - Philippe Gambette'),
(0, 1, 'Marguerite de Navarre', '2', 'Jardin du Luxembourg, Paris', '48.846242', '2.3365033', 'Marguerite d\'Angoulême est devenue en 1527 reine de Navarre.', 'Cette statue commandée en 1845 à Joseph Stanislas Lescorne et réalisée en 1848 représente Marguerite de Navarre, qui en plus de son rôle de reine, protectrice de nombreux artistes de la Renaissance, a aussi écrit elle-même, par exemple L\'Heptaméron, un recueil de nouvelles.', 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Marguerite_d%27Angouleme.JPG', 'https://commons.wikimedia.org/wiki/File:Marguerite_d%27Angouleme.JPG', 'CC-BY-SA 3.0 - Wikimedia Commons (LPLT)', 'CC-BY-SA 4.0 - Philippe Gambette'),
(0, 1, 'George Sand', '2', 'Jardin du Luxembourg, Paris', '48.8465393', '2.3397631', 'Cette statue de George Sand, qui mesure 1,8m de haut, a été inaugurée en juillet 1904.', 'François-Léon Sicard s\'est inspiré d\'un tableau de George Sand par Auguste Charpentier pour le monument dédié à cette autrice, qui a écrit plus de 70 et 50 volumes d\'œuvres diverses.', 'https://upload.wikimedia.org/wikipedia/commons/7/7b/Fran%C3%A7ois-L%C3%A9on_Sicard_-_George_Sand.JPG', 'https://commons.wikimedia.org/wiki/File:Fran%C3%A7ois-L%C3%A9on_Sicard_-_George_Sand.JPG', 'domaine public - Wikimédia Commons - Daderot', 'CC-BY-SA 4.0 - Philippe Gambette'),
(0, 1, 'Maria Deraismes', '0', 'Square des Épinettes, Paris', '48.8938386', '2.3264057', 'Cette statue a été inaugurée en 1898, fondue en 1943 puis reproduite et réinstallée en 1983.', 'Cette statue ne se trouve pas dans le 6e arrondissement mais dans le square des Épinettes, dans le 17e arrondissement de Paris.', 'https://upload.wikimedia.org/wikipedia/commons/2/28/Barrias_Maria_Deraismes_Epinettes_Paris_17e.jpg', 'https://commons.wikimedia.org/wiki/File:Barrias_Maria_Deraismes_Epinettes_Paris_17e.jpg', 'CC-BY-SA 3.0 - Wikimedia Commons (Siren-Com)', 'CC-BY-SA 4.0 - Philippe Gambette');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
