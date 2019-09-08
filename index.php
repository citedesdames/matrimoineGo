<!DOCTYPE html>
<html lang="fr">
<?php
// Chargement des données de configuration du jeu
include ('jeuConnexion.php');
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php echo $titreJeu; ?>">
    <title><?php echo $titreJeu; ?></title>
    <link rel="shortcut icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
    <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script src="./js/matrimoineGo.js"></script>
</head>

<body class="body2">
    <!--<h1 class="titreBlanc"><?php echo $titreJeu; ?> </h1>-->
    <div style="width:100%;text-align:center;">
       <img src="./img/logo.png" alt="Logo <?php echo $titreJeu; ?>" style="width:50%;text-align:center;max-width:250px;margin:20px;">
    </div>
    <div class="containerBut">
        <?php echo $bienvenue; ?>
        <a href="choix_jeux.php" class="but">Commencer !</a>
        <div class="bas"><small><i>Un <a href="https://github.com/Avgilles/jeuxCiteDesDames/">jeu</a> réalisé par <a href="http://gillesavraam.com">Gilles Avraam</a>, sur un concept d'<a href="http://matrimoinedeparis.com">Edith Vallée</a> d'après son livre <i><a href="http://matrimoinedeparis.com/">Le matrimoine de Paris : 20 itinéraires, 20 arrondissements</a> (Bonneton)</i></small>.<br/>
            <button class="but js-aPropos" style="background-color:#999999;">À propos...</button>
        </div>
    </div>
</body>
<script type="text/javascript">
// Détection du clic sur le bouton "vérifier"
$(document).on("click",".js-aPropos",function() {
    pop_up("<strong>À propos de Matrimoine Go</strong>","<?php echo $a_propos; ?><p>Le moteur de ce jeu est disponible sous licence GPL <a href=\"https://github.com/Avgilles/jeuxCiteDesDames\">sur GitHub</a>. Il a été réalisé par <a href=\"http://gillesavraam.com\">Gilles Avraam</a> sur un concept d'<a href=\"http://matrimoinedeparis.com\">Edith Vallée</a> d'après son livre <i><a href=\"http://matrimoinedeparis.com/\">Le matrimoine de Paris : 20 itinéraires, 20 arrondissements</a></i> (Bonneton). Le code de ce jeu a été programmé par Gilles pendant son stage de première année de <a href=\"http://www.dut-mmi-champs.fr/\">DUT MMI</a> à l'<a href=\"http://iut.u-pem.fr\">IUT de Marne-la-Vallée</a>, stage encadré par <a href=\"http://igm.univ-mlv.fr/~gambette\">Philippe Gambette</a>, réalisé au <a href=\"http://ligm.u-pem.fr\">LIGM</a>, dans le cadre du projet de recherche <a href=\"http://citedesdames.hypotheses.fr\">Cité des dames</a>.</p><p>Le code programmé en PHP, MySQL et Javascript utilise notamment les bibliothèques <a href=\"http://jquery.com\">jQuery</a>, <a href=\"https://jqueryui.com/\">jQuery UI</a>, <a href=\"http://touchpunch.furf.com/</p>\">jQuery UI TouchPunch</a>, <a href=\"https://www.mapbox.com/\">mapbox</a>, des données d'<a href=\"https://www.openstreetmap.org\">OpenStreetMap</a> et d'<a href=\"https://osmbuildings.org/\">OSM Buildings</a> et des icônes de <a href=\"https://www.flaticon.com/\">flaticon.com</a>","","",true,true);
})

</script>
</html>
