<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Jeux cité des dames">
    <title>
        <?php
    $titreJeu = "Jeu Cité des dames";
    echo $titreJeu;
    ?>
    </title>
    <!--    <link rel="shortcut icon" href="">-->
    <link rel="stylesheet" href="css/style.css">


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

    <script>


    </script>

    <script type="text/javascript">
    
        function distance(x1,y1,x2,y2){
                
            return Math.sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2));
            }
        
        
        $(document).ready(function() {
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
    
            $(".questionMark").click(function() {
                console.log("click percu");
                $(this).parent().find(".interoN").addClass("interoY");
            })
            $(document).click(function() {
                console.log(("to"));
                if ($(".interoY").length >= 2) {
                    $(".interoN").removeClass("interoY");
                    console.log(("tata"));

                }




            })






        });

    </script>
    <!------------------------------------------fin zingtouch-------------------------->
</head>

<body id="body3">

    <div class="menuFemme">

        <?php
        
        //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université---------------------------

        

        $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice  FROM jcdd_contenu WHERE jeu = ? ORDER BY RAND();";
        
        
        $req = $link->prepare($sql);
        $req -> execute([($_GET['id'])]);
        

        while($data = $req -> fetch()){
            echo '<div  id="p'.$data['id'].'" class="relative"><img src="'.$data['photo_femme'].'" class="photoFemme" alt="'.$data['femme'].'"><img class="questionMark" src="img/icon/question-markB.png" alt="bouton qui est-ce" title="qui est-ce ?">


            
            <div class="interoN">
                   
                    <strong style="color:#D07A25; font-size: 1.5rem"></strong> 
                    <br>
                   '.$data['indice'].'
                    <br>

                </div>

            </div>';
           
            }
//preparation de la carte-------------
$sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice ,categorie FROM jcdd_contenu WHERE jeu = " .($_GET['id'])." AND categorie>0 ORDER BY RAND()" ;
        
        $req = $link->prepare($sql);
        $req -> execute();
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



    <div id="map" style="height:100vh;"></div>
    <script type="text/javascript">$(document).ready(function() {

    $('.photoFemme').draggable({
            scroll: false,
            containment: ".body3",
            revert: true,
        cursorAt:{bottom:5},
        distance:50,
        snap:true,//valeur default
        both:true,
            
            start: function( event, ui ) {
                console.log("start top is :" + ui.position.top)
                console.log("start left is :" + ui.position.left)
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
            var yp=ui.offset.top;
            var xm=t[t.length-2];
            var ym=t[t.length-1];
                
                if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
             distanceMini= distance(xp,yp,xm,ym);
                    meilleurMarker=$(this);
                }
                     compteurDrag++;
                    })

                console.log('d: '+distanceMini);
                if(distanceMini <30){
                    meilleurMarker.addClass('markerB');
                    meilleurMarker.removeClass('markerR');
                    
                    
                }
                else{
                    meilleurMarker.addClass('markerR');
                    meilleurMarker.removeClass('markerB');
                    console.log('rouge');

                }
                
            },
            stop: function( event, ui ) {
                console.log("stop top is :" + ui.position.top)
                console.log("stop left is :" + ui.position.left)
                
                ui.helper.context.style.opacity="1";

               
               var distanceMini;
            var compteurDrag=0;
            var meilleurMarker;
                 $(".marker").each(function(){
                
            var c = $(this).css('transform') ;
            var t = c.replace(')','').split(',');
       
        
            var xp=ui.offset.left;
            var yp=ui.offset.top;
            var xm=t[t.length-2];
            var ym=t[t.length-1];
                
                if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
             distanceMini= distance(xp,yp,xm,ym);
                    meilleurMarker=$(this);
                }
                     compteurDrag++;
                    })

                console.log('d: '+distanceMini);
                if(distanceMini <30){
                    ui.helper.context.style.display="none";
                    
                    
                }
                else{
                    ui.helper.context.style.display="block";

                }
                
            }    
        });
        
//        $('#target').droppable({
//            accept:"#widget"
//        });
//        // Getter
//var accept = $( "#target" ).droppable( "option", "accept" );
// 
//// Setter
//$( "#target" ).droppable( "option", "accept", ".special" );

    })
        mapboxgl.accessToken = '<?php include("keyG.php"); ?>';
        var map = new mapboxgl.Map({
            style: 'https://data.osmbuildings.org/0.2/anonymous/style.json',
            center: [ <?php echo $moyennelg; ?> , <?php echo $moyennelt; ?> ],
            zoom: 13.5,
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

                    $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice, adresse ,categorie FROM jcdd_contenu WHERE jeu = ".($_GET['id']).
                    " AND categorie>0 ORDER BY RAND()";

                    $req = $link -> prepare($sql);
                    $req -> execute();
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


     <div style="z-index:10000;position:fixed; bottom:0; right:0;"><a href="drag.php?id=1">Etape suivante</a></div>


</body>

</html>
