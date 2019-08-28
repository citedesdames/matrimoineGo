<!DOCTYPE html>
<html lang="fr">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="MatrimoineGo">
    <title>
     <?php
        
        //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université--------------------------
    
      
    echo $titreJeu;
    ?>
    </title>
<!--    <link rel="shortcut icon" href="">-->
    <link rel="stylesheet" href="css/style.css">
    <!------------------------------jquery-------------------------->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
    
    <script src="js/matrimoineGo.js"></script>
    
   
     <script>

    
    </script>    
    
</head>

<body class="body2">
   <h1 class="titreBlanc">Choix du jeux</h1>
   
    <div class="container">
        <?php
    
        //----------chargement du site soit local soit université---------------------------

            include ('jeuConnexion.php');
        //----------chargement du site soit local soit université---------------------------

    
   $sql = "SELECT id_jeu,nom_jeu,photo FROM jcdd_jeu ";
// On prépare la requête avant l'envoi :
$req = $link->prepare($sql);
$req -> execute();
// On crée une liste déroulante avec les résultats

while($data = $req -> fetch()){
  // On affiche chaque résultat sous forme d'un item de la liste
  echo '<div class="flexBox" id="'.$data['id_jeu'].'"><a class="centre" href="./jeu.php?id='.$data['id_jeu'].'" > <div class="titreJeu">'.$data['nom_jeu'].'</div><img class="box" src="'.$data['photo'].'" ></a></div>';
}
$req = null;


    $link = null;
    ?>
    </div>
    
</body>

</html>
