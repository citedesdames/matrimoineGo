<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="MatrimoineGo">
    <title>
        <?php
    $titreJeu = "Jeu Cité des dames";
    echo $titreJeu;
    ?>
    </title>
    <!--    <link rel="shortcut icon" href="">-->

<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
<!------------------------------jquery-------------------------->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<!------------------------CDN jquery punch----------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script> 

    <!----------------------------------- osm bulding --------------------------------->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
    <!--    -->


    <link href="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.css" rel="stylesheet">


    <script src="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.js"></script>

    <!----------------------------------------zingtouch-------------------------------->

   <script src="js/matrimoineGo.js"></script>
   <link rel="stylesheet" href="css/style.css">


        <?php
        
        //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université--------------------------
    
        ?>
        
   
   
    <script type="text/javascript">
    
        function distance(x1,y1,x2,y2){
                
            return Math.sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2));
            }
        var xCreatrice=0;
        var yCreatrice=0;

            var score=10;
        var nbrElementPoint=0;
//bonne réponse ou mauvaise
        var imgRevient=true;

        function changeScore(point){
        $(".Tscore").append("<div class='negatif'>"+point+"</div>");
        $(".negatif").css({"left": $(".Tscore")[1].offsetLeft+ "px", "top":"-10px"}); 
                    if(point=="+1"){
                        $(".negatif").css({"color":"green"}); 
                     $(".negatif").animate({"top":"-200px","opacity":"0.2"},2000,function(){$(".negatif").remove();});
                        nbrElementPoint=nbrElementPoint+1;
                            console.log(nbrElementPoint); 
                        
                        score = score + 1; 
                        
                         if(nbrElementPoint==5){
                //niveau terminé
                
            niveauTerminer();

            }
                    }
                    if(point=="-1"){
                        $(".negatif").css({"color":"red"}); 
                    $(".negatif").animate({"top":"5px","opacity":"0.2"},2000,function(){$(".negatif").remove();});
                        score = score - 1; 

                    }
                    $("#Tscore").html(score);

        } 
        
        function niveauTerminer(){
         
            
            
            //création d'une modale
           console.log( score);
            
            pop_up('Ton score est de '+score+'.','Etape suivante','drag.php?id=<?php echo $_GET['id']; ?>&amp;score='+score,false,false);
        
        }    
        
        function devoileCarte(){
            
            $(".relative").animate({top:"0vh"},2000);
        }
        

        $(document).ready(function() {
            
            pop_up("<?php echo $accueil_jeu; ?>","","",true,false);
            
            devoileCarte();
        // initialisation du score
        $("#Tscore").html(score);
  
    
            


            map.addControl(new mapboxgl.GeolocateControl({positionOptions: {enableHighAccuracy: true},trackUserLocation: true}));

            

        });
        

    </script>
    <!------------------------------------------fin zingtouch-------------------------->
   
</head>

<body id="body3">

    <div class="menuFemme">

        <?php
//creation du menu femme (jcdd_contenu)
        $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice_femme,indice_lieu, photo_lieu, photo_lieu_source, photo_lieu_licence, date_naissance, date_mort, question_quizz, reponse1, reponse2, reponse3, ok_reponse1, ok_reponse2, ok_reponse3 FROM jcdd_contenu WHERE jeu = ? ORDER BY RAND();";
        
        
        $req = $link->prepare($sql);
        $req -> execute([($_GET['id'])]);
        

        while($data = $req -> fetch()){
            
            $balise_A_ouvrante="";
            $balise_A_fermante="";
            if ($data['photo_lieu_source']!="") {
                $balise_A_fermante="</a>";
                $balise_A_ouvrante='<a href=\\"'.$data['photo_lieu_source'].' \\"rel=\\"follow\\" target=\\"_blank\\">';

            }
            echo '<div  id="p'.$data['id'].'" class="relative"><img src="'.$data['photo_femme'].'" class="photoFemme" id="i'.$data['id'].'" alt="'.$data['femme'].'"><img class="questionMark" id="f'.$data['id'].'" src="img/icon/question-markB.png" alt="bouton qui est-ce" title="qui est-ce ?">

<script>
$("#f'.$data['id'].'").click(function() {
            pop_up( "<strong style=\"color:#D07A25; font-size:1.5rem;margin:2px;\">'.$data['femme'].' ('.$data['date_naissance'].'-'.$data['date_mort'].')</strong><br>'.str_replace('"','\\"',$data['indice_femme']).' <br>","","",true,false);    
            });
            
             $(document).on("click","#m'.$data['id'].'",function(){
                pop_up("'.$data['indice_lieu'].'<br><img class=\"imgIndiceLieu\" src=\"'.$data['photo_lieu'].'\" alt=\"\"><div class=\"center\"><br>'.$balise_A_ouvrante.$data['photo_lieu_licence'].$balise_A_fermante.'</div><h2>Bonus Quizz</h2> <h4 style=\"margin:0;\">'.str_replace('"','\\"',$data['question_quizz']).'</h4><br><input type=\"checkbox\" id=\"rep1\" name=\"rep1\" data-reponse1=\"'.$data['ok_reponse1'].'\"><label for=\"rep1\">'.$data['reponse1'].'</label><br><input type=\"checkbox\" id=\"rep2\" name=\"rep2\"data-reponse2=\"'.$data['ok_reponse2'].'\"><label for=\"rep2\">'.$data['reponse2'].'</label><br><input type=\"checkbox\" id=\"rep3\" name=\"rep3\"data-reponse3=\"'.$data['ok_reponse3'].'\"><label for=\"rep3\">'.$data['reponse3'].'</label><br><input class=\"butSol\" type=\"submit\" value=\"Solution\">","","",false,true);

            });
</script>
            
            
               

            </div>';
           
            }
//preparation de la carte-------------
$sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice_femme ,categorie FROM jcdd_contenu WHERE jeu = ?  AND categorie>0 ORDER BY RAND()" ;
        
        $req = $link->prepare($sql);
        $req -> execute([$_GET['id']]);
        $moyennelg=0;
        $moyennelt=0;
        $compteur=0;
        while($data = $req -> fetch()){
        
            $lg= $data['longitude'];
            $lt= $data['latitude'];
            $moyennelg += $lg;
            $moyennelt += $lt;
            $compteur ++;
            }
        $moyennelg/=$compteur;
        $moyennelt/=$compteur;
        
//        echo ('<script>
//        console.log('.$moyennelg.');
//        console.log('.$moyennelt.');
//        console.log('.$compteur.');
//
//        </script>')
        ?>
        
    </div>

    <!----------------------  . map  ------------------------------->



    <div id="map" style="align-content: center;justify-content:center;height:90vh; margin-top:10vh; margin-bottom:auto"></div>
    <script type="text/javascript">$(document).ready(function() {

    $('.relative').draggable({
            scroll: false,
            containment: ".body3",
            revert: false
        ,
        cursorAt:{bottom:5},
        distance:50,
        snap:true,//valeur default
        both:true,
            
            start: function( event, ui ) {
             xCreatrice=$(this).css("left");
             yCreatrice=$(this).css("top");
//                console.log("start top is :" + ui.position.top)
//                console.log("start left is :" + ui.position.left)
                ui.helper.context.style.opacity="0.7";
                
            },
            drag: function(event, ui) {
//                console.log('draging.....');
            var distanceMini;
            var compteurDrag=0;
            var meilleurMarker;
                 $(".marker").each(function(){
                
            var c = $(this).css('transform') ;
            var t = c.replace(')','').split(',');
       
        
            var xp=ui.offset.left;
            var yp=ui.offset.top-parseInt($(this).css("height"));
            var xm=t[t.length-2];
            var ym=t[t.length-1];
                
                if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
             distanceMini= distance(xp,yp,xm,ym);
                    meilleurMarker=$(this);
                }
                     compteurDrag++;
                    })

//                console.log('d: '+distanceMini);
                if(distanceMini <50){
                    $(".marker").addClass('markerR');
                    $(".marker").removeClass('markerB');
                    meilleurMarker.addClass('markerB');
                    meilleurMarker.removeClass('markerR');
                    console.log("markeur");
//                    console.log(ui.helper.context.src);
                    console.log(ui.helper.context.firstElementChild.currentSrc);
                    console.log(ui);
                    
                }
                else{
                    meilleurMarker.addClass('markerR');
                    meilleurMarker.removeClass('markerB');
//                    console.log('rouge');

                }
                
            },
            stop: function( event, ui ) {
                imgRevient=true;

//                console.log("stop top is :" + ui.position.top)
//                console.log("stop left is :" + ui.position.left)
//                
                ui.helper.context.style.opacity="1";

               
               var distanceMini;
            var compteurDrag=0;
            var meilleurMarker;
                 $(".marker").each(function(){
                
            var c = $(this).css('transform') ;
            var t = c.replace(')','').split(',');
       
        
            var xp=ui.offset.left;
            var yp=ui.offset.top-parseInt($(this).css("height"));
            var xm=t[t.length-2];
            var ym=t[t.length-1];
                
                if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
             distanceMini= distance(xp,yp,xm,ym);
                    meilleurMarker=$(this);
                }
                     compteurDrag++;
                     $(this).children().hide();
                     console.log('cache');
                    })
//                console.log('d: '+distanceMini);
                if(distanceMini <50){
//                    console.log($(this).attr("id").replace("i","")+meilleurMarker.attr("id").replace("m","")); 
                    
                    
                     if($(this).attr("id").replace("p","")==meilleurMarker.attr("id").replace("m","")){
                    //bonne reponse      

                    changeScore("+1");
                    
                    //image bonne
                        imgRevient=false;
                        
                    ui.helper.context.style.display="none";                
                    meilleurMarker.removeClass('markerB');
                    meilleurMarker.css('background-image',"url("+ui.helper.context.firstElementChild.currentSrc+")");
                        
//                    $("#f'.$data['id'].'") (function() {
//            pop_up( "<strong style=\"color:#D07A25; font-size:1.5rem;margin:2px;\">'.$data['femme'].' ('.$data['date_naissance'].'-'.$data['date_mort'].')</strong><br>'.str_replace('"','\\"',$data['indice_femme']).' <br>","","",true,false);    
//            });
                         

                    }
                    else{
                    //si mauvaise reponse -1

                    changeScore("-1");
                    }
                   
                    
                    
                    
                }
                if(imgRevient==true){
                    //l'image de l'artiste retourne
                    ui.helper.context.style.display="block";
                    meilleurMarker.removeClass('markerB');
//                    meilleurMarker.css('background-image',ui.helper.context.src);
                    meilleurMarker.addClass('markerR');
                    $("#Tscore").html(score);
                }
                
                if(imgRevient){
                    $(this).animate({left:xCreatrice,top:yCreatrice},600,"easeOutCirc");

                    
                }
                
            }    
        });
            
            

    })
        
        
        mapboxgl.accessToken = '<?php echo ($clefApiMapbox);  ?>';
        var map = new mapboxgl.Map({
            style: 'https://data.osmbuildings.org/0.2/anonymous/style.json',
            center: [ <?php echo $moyennelg; ?> , <?php echo $moyennelt; ?> ],
            zoom: 14.5,
            pitch: 45,
            bearing: -17.6,
            container: 'map'
        });

        // The 'building' layer in the mapbox-streets vector source contains building-height
        // data from OpenStreetMap.
        map.on('load', function() {
            // Insert the layer beneath any symbol layer.
            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }

            map.addLayer({
                'id': '3d-buildings',
                'source': 'composite',
                'source-layer': 'building',
                'filter': ['==', 'extrude', 'true'],
                'type': 'fill-extrusion',
                'minzoom': 15,
                'paint': {
                    'fill-extrusion-color': '#aaa',

                    // use an 'interpolate' expression to add a smooth transition effect to the
                    // buildings as the user zooms in
                    'fill-extrusion-height': [
                        "interpolate", ["linear"],
                        ["zoom"],
                        15, 0,
                        15.05, ["get", "height"]
                    ],
                    'fill-extrusion-base': [
                        "interpolate", ["linear"],
                        ["zoom"],
                        15, 0,
                        15.05, ["get", "min_height"]
                    ],
                    'fill-extrusion-opacity': .6
                }
            }, labelLayerId);
        });





        map.on('load', function() {
            //   map.loadImage('https://upload.wikimedia.org/wikipedia/commons/thumb/6/60/Cat_silhouette.svg/400px-Cat_silhouette.svg.png', function(error, image) {
            //   if (error) throw error;
            //      map.addImage('cat', image);
            //      map.addLayer({
            //         "id": "points",
            //         "type": "symbol",
            //         "source": {
            //            "type": "geojson",
            //            "data": {
            //               "type": "FeatureCollection",
            //               "features": [{
            //                  "type": "Feature",
            //                  "geometry": {
            //                     "type": "Point",
            //                     "coordinates": [2.3344715,48.8408324]
            //                  }
            //               }]
            //            }
            //         },
            //         "layout": {
            //            "icon-image": "cat",
            //            "icon-size": 0.25
            //         }
            //      });
            //   });

            
    //Creation des marqueurs        
            
            var geojson = {
                type: 'FeatureCollection',
                features: [ <?php

                    $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice_lieu, adresse ,categorie FROM jcdd_contenu WHERE jeu = ? AND categorie>0 ORDER BY RAND()";

                    $req = $link -> prepare($sql);
                    $req -> execute([$_GET['id']]);
//                    $x= $lg-10;
//                    $y= $lt-10;
                    
                    while ($data = $req -> fetch()) {
                            
//                    $a=$xn-$x;
//                    $b=$yn-$y;
//                    $a=$a*$a;
//                    $b=$b*$b;
//                    $c= Math.sqrt($a+$b);
                        
                        
                        echo "  {
                            type: 'Feature',id:".$data['id'] ." ,
                            geometry: {
                                type: 'Point',
                                coordinates: [".$data['longitude'] .", ". $data['latitude'] ."]
                            },
                            properties: {
                                title: 'Mapbox',
                                description: \"".str_replace('"', '\"', $data['adresse']).
                                "\"
                            }
                        }, ";    
                    }

                    ?>
                ]
            };

            geojson.features.forEach(function(marker) {

                // create a HTML element for each feature
                var el = document.createElement('div');
                el.className = 'marker markerR';
                
               
                // make a marker for each feature and add to the map
                var mark= new mapboxgl.Marker(el, {
//                        draggable: true,
                    })
                    .setLngLat(marker.geometry.coordinates)
                    .addTo(map);
                mark._element.id="m"+marker.id;
//                console.log(marker);

            });
//            if($c<10){
//                      el.className='marker1' ;     
//                        }


        });


        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

    </script>

<div class="score">
    <p class="Tscore">Score:</p>
    <span class="Tscore" id="Tscore"></span>
 
    
</div>
    

</body>

</html>
