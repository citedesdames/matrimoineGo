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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zingtouch/1.0.6/zingtouch.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 

    <!----------------------------------- osm bulding --------------------------------->
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
<!--    -->
    
    
    <link href="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.css" rel="stylesheet">


    <script src="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.js"></script>

    <!----------------------------------------zingtouch-------------------------------->

    <script>
//        var region = new ZingTouch.Region(document.getElementById('body3'));
//        var target = document.getElementById('photoFemme');
//
//        var childElement = document.getElementById('object');
//
//        activeRegion.bind(childElement, 'pan', function(event) {
//            //Perform Operations
//        });
//        var counter = 0;
//var region = new ZingTouch.Region(document.getElementById('body3'));
//var target = document.getElementById('photoFemme');
//
//region.bind(target, 'pan', function(e){
//  counter++;
//  document.getElementById('output').innerHTML = 
//    "Input currently panned: " + counter + " times";
//})

    </script>
 
<script type="text/javascript">$(document).ready(function() {
        
            $(".questionMark").click( function() {
            console.log("click percu");
         $(this).parent().find(".interoN").addClass("interoY");   
     })
        $(document).click( function(){
                             console.log(("to"));
            if ($(".interoY").length>=2){
                 $(".interoN").removeClass("interoY"); 
                            console.log(("tata"));

                }
             
            
             
         
         })
 
         
         
         
         
         
});</script>
    <!------------------------------------------fin zingtouch-------------------------->
</head>

<body id="body3">

    <div class="menuFemme">

        <?php
        
        //----------chargement du site soit local soit université---------------------------
        include ('jeuConnexion.php');
        
        //----------chargement du site soit local soit université---------------------------

        

        $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice  FROM jcdd_contenu WHERE jeu = " .($_GET['id'])." ORDER BY RAND();";
        
        
        $req = $link->prepare($sql);
        $req -> execute();
        

        while($data = $req -> fetch()){
            echo '<div  id="'.$data['id'].'" class="relative"><img src="'.$data['photo_femme'].'" class="photoFemme" alt="'.$data['femme'].'"><img class="questionMark" src="img/icon/question-markB.png" alt="bouton qui est-ce" title="qui est-ce ?">


            
            <div class="interoN">
                   
                    <strong style="color:#D07A25; font-size: 1.5rem"></strong> 
                    <br>
                   '.$data['indice'].'
                    <br>

                </div>

            </div>';
           
            }
//preparation de la carte-------------
$sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice FROM jcdd_contenu WHERE jeu = " .($_GET['id'])." ORDER BY RAND()";
        
        $req = $link->prepare($sql);
        $req -> execute();
        
        while($data = $req -> fetch()){
        
            $lg= $data['longitude'];
            $lt= $data['latitude'];

            }
        ?>
    </div>
    
<!----------------------  . map  ------------------------------->
    
    
    
    <div id="map" style="height:100vh;"></div>
<script>
mapboxgl.accessToken = '<?php include("keyG.php"); ?>';
var map = new mapboxgl.Map({
style: 'https://data.osmbuildings.org/0.2/anonymous/style.json',
center: [<?php echo $lg; ?>,<?php echo $lt; ?>],
zoom: 15.5,
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
   "interpolate", ["linear"], ["zoom"],
   15, 0,
   15.05, ["get", "height"]
   ],
   'fill-extrusion-base': [
   "interpolate", ["linear"], ["zoom"],
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
    
     var geojson = {
  type: 'FeatureCollection',
  features: [
    <?php
    
    $sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice, adresse FROM jcdd_contenu WHERE jeu = " .($_GET['id'])." ORDER BY RAND()";
        
        $req = $link->prepare($sql);
        $req -> execute();
    
   while($data = $req -> fetch()){
        
       echo " 
  {
    type: 'Feature',
    geometry: {
      type: 'Point',
      coordinates: [".$data['longitude'] .",". $data['latitude'] ."]},
    properties: {
      title: 'Mapbox',
      description: \"".str_replace('"','\"',$data['adresse']) ."\"
    }
  },";    
            }  
    
    ?>
  ]
};
    geojson.features.forEach(function(marker) {

  // create a HTML element for each feature
  var el = document.createElement('div');
  el.className = 'marker';
     
  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el,{draggable: true})
    .setLngLat(marker.geometry.coordinates)
    .addTo(map);
        
});
    

});


// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());
    
</script>


 

</body>

</html>
