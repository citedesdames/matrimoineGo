
<?php

$titreJeu = "MatrimoineGo";

$link = new PDO('mysql:host=127.0.0.1;dbname=jcdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));


$clefApiMapbox= 'clef_mapbox';

$messageScore="Votre score est de ";

$bienvenue=" <p><strong>Bienvenue sur MatrimoineGo !</strong></p><p>Grâce à MatrimoineGo tu vas pouvoir connaître les grandes artistes du premier arrondissement de Paris. Le but est de retrouver quelle femme correspond à quel emplacement sur la carte.</p><p>Tu peux le faire depuis chez toi ou en allant sur place:</p>";

$accueil_jeu="<p>Relie chaque portait de chaque femme en le déplaçant avec ton doigt, mais attention à ton score ! Si tu te trompes celui-ci descendra, par contre si tu réussis il augmentera ! Tu peux t'aider des indices en appuyant sur le point d'interrogation en haut des photos de femme ou en appuyant sur les marqueurs sur la carte. Bonne chance !</p>";


$accueil_drag="Classe les artistes ensemble, grâce aux informations que tu as eues à la première étape tu peux maintenant classer ces femmes en 2 catégories, la scène et le salon. Déplace les photos des femmes vers l'endroit qui te semble le plus approprié.";

$choix_jeu="Choisis le parcours que tu veux effectuer.";

$a_propos = "<p>Concept du jeu par <a href=\\\"http://matrimoinedeparis.com\\\">Edith Vallée</a>.</p>";

?>