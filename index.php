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
   
    <div class="containerBut">

        <?php
    
        //----------chargement du site soit local soit université---------------------------

            include ('jeuConnexion.php');
        //----------chargement du site soit local soit université---------------------------
        echo $bienvenue
            
            
        ?>
      
       
      
    
           

       <a href="choix_jeux.php" class="but">Commencer !</a>
        
    </div>
    
    <div class="bas">Créer par GILLES AVRAAM</div>   
       
</body>

</html>
