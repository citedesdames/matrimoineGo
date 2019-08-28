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
    <meta name="description" content="MatrimoineGo">
    <title><?php echo $titreJeu; ?></title>
    <link rel="shortcut icon" href="./img/favicon.ico">
    <link rel="stylesheet" href="css/style.css">
<!------------------------- jquery ui ---------------------------->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<!------------------------CDN jquery punch----------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> 
<!----------------------- Matrimoine GO -------------------------->
<script src="js/matrimoineGo.js"></script>
       
<script>   
<?php
// Chargement des données de configuration de cette étape du jeu
$sql1 = "SELECT categorie_1, categorie_2, photo, photo_source, photo_licence, texte_fin, score_tb, score_b, score_ab, accueil_drag FROM jcdd_jeu WHERE id_jeu= ?;";

$req1 = $link->prepare($sql1);
$req1 -> execute([$_GET['id']]);

while($donnee = $req1 -> fetch()){
    // Configuration des messages possibles en fonction du score
    echo 'var tres_bien="'.$donnee['score_tb'].'";var bien="'.$donnee['score_b'].'";var assez_bien="'.$donnee['score_ab'].'";';
    $categorieA = $donnee['categorie_1'];
    $categorieB = $donnee['categorie_2'];
    $accueil_drag = $donnee['accueil_drag'];
    $texte_fin = $donnee['texte_fin'];
}

// Récupération dans la base de données des noms de femmes dans chaque catégorie
$sql = "SELECT id, jeu, photo_femme, femme, categorie  FROM jcdd_contenu WHERE categorie >0 AND jeu=? ORDER BY RAND();";

$req = $link->prepare($sql);
$req -> execute([$_GET['id']]);
$femmesCategorieA = ".";
$femmesCategorieB = ".";
while($data = $req -> fetch()){
    if($data["categorie"]=="1"){
        if(strlen($femmesCategorieA) > 0){
           $femmesCategorieA .= ",";
        }
        $femmesCategorieA .= $data["femme"];
    }
    if($data["categorie"]=="2"){
        if(strlen($femmesCategorieB) > 0){
           $femmesCategorieB .= ",";
        }
        $femmesCategorieB .= $data["femme"];
    }
}

?>
    
var scoreMj = <?php echo intval($_GET['score']); ?>;
var erreur = 0;

// Affichage d'une fenêtre modale à la fin de cette étape du jeu
function finNiveau(){
    // Mise à jour du score en fonction du nombre d'erreurs
    if(erreur == 0){
        scoreMj = scoreMj+3;
    }
    scoreMj=scoreMj-erreur;
   
    // Préparation du message final en fonction du score
    var message_felicitation = assez_bien;
    if (scoreMj >= 7){
        message_felicitation = bien;
    }
    if (scoreMj >= 13){
        message_felicitation = tres_bien;
    }
      
    // Affichage d'une fenêtre modale avec le score et le message final
    pop_up("<div class=\"modalFin\"><div><p>Vous avez fait "+erreur+" erreurs : il fallait rassembler les créatrices de la catégorie <?php echo $categorie_A;?> () et de la catégorie <?php echo $categorie_B;?> ().<br/><?php echo $texte_fin;?></p></div><div><p>Votre score final est de "+scoreMj+"<br/><b>"+message_felicitation+"</b></p></div>","Retour à la liste des jeux","choix_jeux.php",false,false);

}

// Détection du clic sur le bouton "vérifier"
$(document).on("click",".nbrErreur",function() {
    if ($('.cat1,.cat2').length >=5){
        // Si toutes les images ont été déplacées
        $('.nbrErreur').hide();
        finNiveau();
    }
})
        
 
</script>
</head>   

<body class="body4">
<!--<h1 class="titreBlanc" style="background-color: #FC706D;">Classe les artistes ensemble</h1>-->

<!----------------------------partie script---------------------->
<div class="flexx">
<?php 

// Récupération dans la base de données des infos sur les portraits de femmes à afficher
$sql = "SELECT id, jeu, photo_femme, femme, categorie  FROM jcdd_contenu WHERE categorie >0 AND jeu=? ORDER BY RAND();";

$req = $link->prepare($sql);
$req -> execute([$_GET['id']]);
$i=0;
while($data = $req -> fetch()){
    // Affichage du portrait en haut de la page
    echo '<span  id="i'.$i.'"><img src="'.$data['photo_femme'].'" class="photoFemme2 categorie'.$data['categorie'].'" alt="'.$data['femme'].'"></span>';
    
    $i++;
}
?>
        
<script type="text/javascript">$(document).ready(function(){

// Affichage du message d'accueil              
pop_up("<?php echo $accueil_drag ?>","","",true,false);
              
// Fermeture de toute fenêtre modale ouverte quand on clique sur la croix de la fenêtre
close();
        
// Gestion des actions de glisser-déplacer des portraits
$('.photoFemme2').draggable({
    scroll: false,
    containment: ".contain",
    revert: false,
    snap: true, //valeur par défaut
    both: true,
    
    start: function( event, ui){
        //console.log("start top is :" + ui.position.top)
        //console.log("start left is :" + ui.position.left)
    },
    drag: function(event, ui){
        //console.log('draging.....');    
    },
    stop: function(event, ui) {
        // On lâche le portrait
        //console.log("stop top is :" + ui.position.top)
        //console.log("addition :" + (parseInt(ui.position.left) + (parseInt(ui.helper.context.clientWidth)/2)));
        //console.log("décalage horizontal : " + ui.offset.left);

        if(ui.offset.left+(ui.helper.context.clientWidth)/2 < window.innerWidth/2 && document.getElementsByClassName('categorie1')){
            // Le portrait a été déplacé dans la partie gauche
            //console.log("categorie1");
            $(this).addClass('cat1');
            $(this).removeClass('cat2');
        } else {
            // Le portrait a été déplacé dans la partie droite
            //console.log("categorie2");
            $(this).addClass('cat2');
            $(this).removeClass('cat1');
        }
        
        // Comptage du nombre d'erreurs
        var erreur1 = 0;
        $('.photoFemme2').each(function(){
            if(($(this).hasClass('cat1') && $(this).hasClass('categorie2')) || ($(this).hasClass('cat2') && $(this).hasClass('categorie1'))){
                erreur1=erreur1+1;
            }               
        })
                
        var erreur2 = 0;
        $('.photoFemme2').each(function(){
            if(($(this).hasClass('cat1') && $(this).hasClass('categorie1')) || ($(this).hasClass('cat2') && $(this).hasClass('categorie2'))){
                erreur2 = erreur2+1;
            }               
        })
                
        erreur = erreur2;
        if(erreur1 < erreur2){
            erreur = erreur1;
        }
    }   
});

})
</script>
    </div>
    <div class="contain">
        <div class="left"></div>
        <div class="right"></div>
    </div>
    <button class="nbrErreur">Vérifier !</button>
</body>
</html>