<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Jeux cité des dames">
    <title>
<!--
        <?php
    $titreJeu = "Jeu Cité des dames";
    echo $titreJeu;
    ?>
-->
   
    </title>
    <!--    <link rel="shortcut icon" href="">-->
    <link rel="stylesheet" href="css/style.css">
<!------------------------- jquery ui ---------------------------->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<!------------------------CDN jquery punch----------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> 



<script>
    
    <?php
        
        //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université---------------------------

        

        $sql1 = "SELECT categorie_1, categorie_2, photo, photo_source, photo_licence, text_cat1, text_cat2, score_tb, score_b, score_ab FROM jcdd_jeux  WHERE id_jeu;";
        
        
        $req1 = $link->prepare($sql1);
        $req1 -> execute([($_GET['id'])]);
        
        while($donne = $req1 -> fetch()){
            echo 'var tres_bien="'.$donne['score_tb'].'";var bien="'.$donne['score_b'].'";var assez_bien="'.$donne['score_ab'].'";';
            $categorieA=$donne['categorie_1'];
            $categorieB=$donne['categorie_2'];
        }
        
        ?>
    
    
    

var scoreMj=<?php echo $_GET['score']; ?>;
var erreur=0;
    
$(document).on("click",".nbrErreur",function() {
 
    
    if ($('.cat1,.cat2').length >=erreur){
     var message_felicitation="";
        function niveauTerminer(){
            
            if(erreur==0){
                scoreMj=scoreMj+3;
            }
            scoreMj=scoreMj-erreur;
            message_felicitation= assez_bien;
            
            if (scoreMj>=7){
                message_felicitation= bien;
                
            }
            if (scoreMj>=13){
                message_felicitation= tres_bien;
                
            }
         
            
            
            //création d'une modale

             console.log(scoreMj);
                 $(".flexx").after('<div class="modalFin"><p>'+message_felicitation+'</p><div>Ton score est de '+scoreMj+'</div><div>Les 2 catégories étaient : <?php echo $categorieA; ?> et <?php echo $categorieB; ?></div><a class="buto" href="choix_jeux.php">RETOUR MENU</a></div>')
        
        }    
            niveauTerminer()
        
    }
            })
        
 
</script>
    
    </head>   

<body class="body4">
     <h1 class="titreBlanc" style="background-color: #FC706D;
">Classe les artistes ensemble</h1>

<!----------------------------partie script---------------------->
        <div class="flexx">
        <?php 
        
          //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université---------------------------
          $sql = "SELECT id,jeu,femme,photo_femme, femme, categorie  FROM jcdd_contenu WHERE categorie >0 AND jeu=? ORDER BY RAND();";
        
        
        $req = $link->prepare($sql);
        $req -> execute([$_GET['id']]);
        $i=0;
         while($data = $req -> fetch()){
            echo '<span  id="i'.$i.'"><img src="'.$data['photo_femme'].'" class="photoFemme2 categorie'.$data['categorie'].'" alt="'.$data['femme'].'"></span>';
             $i++;
         }
        ?>
        
        
      <script type="text/javascript">$(document).ready(function() {
        

    $('.photoFemme2').draggable({
            scroll: false,
            containment: ".contain",
            revert: false,
        
        snap:true,//valeur default
        both:true,
            
            start: function( event, ui ) {
               
//                console.log("start top is :" + ui.position.top)
//                console.log("start left is :" + ui.position.left)
            },
            drag: function(event, ui) {
//                console.log('draging.....');    
            },
            stop: function( event, ui ) {
                
                
                console.log("stop top is :" + ui.position.top)
//                console.log("stop left is :" + ui.position.left);
                console.log("addition :" + (parseInt(ui.position.left)+ (parseInt(ui.helper.context.clientWidth)/2)));
                    console.log(ui.offset.left);

               if(ui.offset.left+(ui.helper.context.clientWidth)/2<window.innerWidth/2 && document.getElementsByClassName('categorie1')  ){
                   
//                    console.log("categorie1");
                    $(this).addClass('cat1');
                    $(this).removeClass('cat2');
                    

                }
                else{
//                    console.log("categorie2");
                    $(this).addClass('cat2');
                    $(this).removeClass('cat1');
                }
//                console.log('intitialisation = '+ erreur);
                var erreur1=0;
                $('.photoFemme2').each(function(){
                                         
                     if(($(this).hasClass('cat1') && $(this).hasClass('categorie2')) ||($(this).hasClass('cat2') && $(this).hasClass('categorie1'))){
                            
                            erreur1=erreur1+1;
                            
                            }               
            
                                         
                                         })
                
                
//                console.log('intitialisation = '+ erreur);
                var erreur2=0;

                $('.photoFemme2').each(function(){
                                         
                     if(($(this).hasClass('cat1') && $(this).hasClass('categorie1')) ||($(this).hasClass('cat2') && $(this).hasClass('categorie2'))){
                            
                            erreur2=erreur2+1;
                            
                            }               
            
                                         
                                         })
                
                 erreur=erreur2;
                    if(erreur1<erreur2){
                        erreur=erreur1;
                    }
                
//                     console.log("erreur");
//                     console.log(erreur);
//                     console.log("erreur1");
//                     console.log(erreur1);
//                     console.log("erreur2");
//                     console.log(erreur2);
//                     console.log($(".cat1").length);
//                     console.log($(".cat2").length);

//            document.write('<div>Print('+erreur+')</div>');
//            $('.nbrErreur').remove(erreur);
                
                
//             $('.nbrErreur').html('Nombre d\'érreur: '+erreur);
                
                
//            $('.nbrErreur').replaceWith(erreur);
//             $('.nbrErreur').append(erreur);

            }   

        });


    })
    </script>
     </div>
     <div class="contain">
         <div class="left"></div>
         <div class="right"></div>
     </div>
     <button class="nbrErreur">verifié</button>
</body>
</html>