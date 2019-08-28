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
</head>

<body class="body2">
    <!--<h1 class="titreBlanc"><?php echo $titreJeu; ?> </h1>-->
    <div style="width:100%;text-align:center;"><img src="./img/logo.png" alt="Matrimoine GO - Paris" style="width:50%;text-align:center;max-width:250px;margin:20px;"></div>
    <div class="containerBut">
        <p><?php echo $bienvenue; ?></p>
        <a href="choix_jeux.php" class="but">Commencer !</a>
    
        <div class="bas"><small><i>Un <a href="https://github.com/Avgilles/jeuxCiteDesDames/">jeu</a> créé par <a href="http://gillesavraam.com">Gilles Avraam</a>, sur un concept d'<a href="http://matrimoinedeparis.com">Edith Vallée</a></i></small></div>
    </div>
</body>

</html>
