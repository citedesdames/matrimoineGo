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
                   
                   
                    console.log("categorie1");
                    $(this).addClass('cat1');
                    $(this).removeClass('cat2');
                    

                }
                else{
                    console.log("categorie2");
                    $(this).addClass('cat2');
                    $(this).removeClass('cat1');
                }
                var erreur=0;
                console.log('intitialisation = '+ erreur);

                $('.photoFemme2').each(function(){
                                         
                     if(($(this).hasClass('cat1') && $(this).hasClass('categorie2')) ||($(this).hasClass('cat2') && $(this).hasClass('categorie1'))){
                            
                            erreur=erreur+1;

                            }               
                            console.log(erreur);
            
                                         
                                         })
//            document.write('<div>Print('+erreur+')</div>');
//            $('.nbrErreur').remove(erreur);
             $('.nbrErreur').html('Nombre d\'érreur: '+erreur);
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
     <div class="nbrErreur"></div>
</body>
</html>