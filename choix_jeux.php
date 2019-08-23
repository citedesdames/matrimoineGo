<!DOCTYPE html>
<html lang="fr">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Jeux cité des dames">
    <title>
    <?php
    $titreJeu = "MatrimoineGo";
    echo $titreJeu;
    ?>
    </title>
<!--    <link rel="shortcut icon" href="">-->
    <link rel="stylesheet" href="css/style.css">
    

</head>

<body class="body2">
   <h1 class="titreBlanc"><?php echo $titreJeu; ?> </h1>
   
    <div class="container">
        <?php
    
        //----------chargement du site soit local soit université---------------------------

            include ('jeuConnexion.php');
        //----------chargement du site soit local soit université---------------------------

    
   $sql = "SELECT id_jeu,nom_jeu,photo FROM jcdd_jeux ";
// On prépare la requête avant l'envoi :
$req = $link->prepare($sql);
$req -> execute();
// On crée une liste déroulante avec les résultats

while($data = $req -> fetch()){
  // On affiche chaque résultat sous forme d'un item de la liste
  echo '<div class="flexBox" id="'.$data['id_jeu'].'"><a class="centre" href="./jeu.php?id='.$data['id_jeu'].'" > <div class="titreJeu">'.$data['nom_jeu'].',</div><img class="box" src="'.$data['photo'].'" ></a></div>';
}
$req = null;


    $link = null;
    ?>
    </div>
    
</body>

</html>
