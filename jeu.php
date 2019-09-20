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
    <title><?php echo $titreJeu;?></title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/style.css?v=<?php echo (time());?>">
<!------------------------------jquery-------------------------->
<script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script>
<!------------------------CDN jquery punch----------------------->
<script src="./js/jquery.ui.touch-punch.js"></script> 
<!---------------------------- MapBox -------------------------->
<script src='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.0.0/mapbox-gl.css' rel='stylesheet' />
<!------------------------- OSM Buildings ----------------------->
<link href="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.css" rel="stylesheet">
<script src="https://cdn.osmbuildings.org/4.0.1/OSMBuildings.js"></script>
<!----------------------- Matrimoine GO -------------------------->
<script src="js/matrimoineGo.js?v=<?php echo (time());?>"></script>
<script type="text/javascript">
function distance(x1,y1,x2,y2){
    return Math.sqrt((x1-x2)*(x1-x2)+(y1-y2)*(y1-y2));
}

var xCreatrice = 0;
var yCreatrice = 0;
var score = 10;
var nbrElementPoint=0;
//bonne réponse ou mauvaise
var imgRevient = true;

function changeScore(point){
    $("#plurielScore").append("<div class='negatif'>"+point+"</div>");
    $(".negatif").css({"left": $("#Tscore")[0].offsetLeft+ "px", "top":"-10px"}); 
    if(point=="+1"){
        $(".negatif").css({"color":"green"}); 
        $(".negatif").animate({"top":"-200px","opacity":"0.2"},2000,function(){$(".negatif").remove();});
        nbrElementPoint = nbrElementPoint + 1;
        console.log(nbrElementPoint); 
        score = score + 1; 
    }
    if(point=="-1"){
        $(".negatif").css({"color":"red"}); 
        $(".negatif").animate({"top":"5px","opacity":"0.2"},2000,function(){$(".negatif").remove();});
        score = score - 1; 
            console.log("-1");

    }
    $("#Tscore").html(score);
    if((score>-2) && (score<2)){
       $("#plurielScore").hide();
    } else {  
       $("#plurielScore").show();
    }
    // Mise à jour du lien de passage à l'étape suivante
    $("#nextStep").attr("href","drag.php?id=<?php echo intval($_GET['id']); ?>&score="+score);
} 
        
function finNiveau1(){
    // Création d'une modale
    //console.log(score);
    pop_up('','<center><?php echo $messageScore ?>'+score+'.</center>','&Eacute;tape suivante','drag.php?id=<?php echo intval($_GET['id']); ?>&score='+score,false,false);
}    
        
function devoileCarte(){
    $(".relative").animate({top:"0vh"},2000);
}

$(document).ready(function() {
    pop_up("<p><strong>Première étape</strong></p>","<?php echo $accueil_jeu; ?>","","",true,false);
    devoileCarte();
    
    // initialisation du score
    $("#Tscore").html(score);
    
    map.addControl(new mapboxgl.GeolocateControl({positionOptions: {enableHighAccuracy: true},trackUserLocation: true}));
});
</script>
</head>

<body id="body3">
    <div class="menuFemme">

<?php
// Création du menu femme (jcdd_contenu) et de la modale de biographie
$sql = "SELECT id, jeu, femme, photo_femme, photo_femme_source, photo_femme_licence, longitude, latitude, indice_femme,indice_lieu, photo_lieu, photo_lieu_source, photo_lieu_licence, date_naissance, date_mort, question_quizz, reponse1, reponse2, reponse3, ok_reponse1, ok_reponse2, ok_reponse3, biographie FROM jcdd_contenu WHERE jeu = ? ORDER BY RAND();";
$titreFemme = 'var titre =["","","","","",""];';
$biographie = 'var bio =["","","","",""];';
$req = $link->prepare($sql);
$req -> execute([intval($_GET['id'])]);

while($data = $req -> fetch()){        
    $balise_A_ouvrante="";
    $balise_A_fermante="";
    if ($data['photo_lieu_source']!="") {
        $balise_A_fermante="</a>";
        $balise_A_ouvrante='<a href=\\"'.$data['photo_lieu_source'].' \\"rel=\\"follow\\" target=\\"_blank\\">';
    }
    $titreFemme.='titre['.$data['id'].']="'.$data["femme"].'";';
    $biographie.='bio['.$data['id'].']="<p><img src=\\"'.$data['photo_femme'].'\\" style=\\"float:right;margin-left:20px;\\" alt=\\"'.$data['femme'].'\\">'.$data["biographie"].'</p><p>Source du portrait : <a href=\\"'.$data['photo_femme_source'].' \\"rel=\\"follow\\" target=\\"_blank\\">'.$data['photo_femme_licence'].'</a></p>";';
                
    echo '<div  id="p'.$data['id'].'" class="relative"><img src="'.$data['photo_femme'].'" class="photoFemme" id="i'.$data['id'].'" alt="'.$data['femme'].'"><img class="questionMark" id="f'.$data['id'].'" src="img/icon/question-markB.png" alt="bouton qui est-ce" title="qui est-ce ?">

<script>
    $("#f'.$data['id'].'").click(function() {
            pop_up("<span style=\"color:#FC706D; font-size:1.1rem;margin:2px;\">'.$data['femme'].'</span>","<p>'.str_replace('"','\\"',$data['indice_femme']).'</p><p>Source du portrait : <a href=\\"'.$data['photo_femme_source'].' \\"rel=\\"follow\\" target=\\"_blank\\">'.$data['photo_femme_licence'].'</a></p>","","",true,false);    
            });
            
    $(document).on("click","#m'.$data['id'].'",function(){
        pop_up("","<strong>Indice :</strong> '.$data['indice_lieu'].'<br><img class=\"imgIndiceLieu\" src=\"'.$data['photo_lieu'].'\" alt=\"\"><div class=\"center\"><br>'.$balise_A_ouvrante.$data['photo_lieu_licence'].$balise_A_fermante.'</div><h2>Bonus Quizz</h2> <h4 style=\"margin:0;\">'.str_replace('"','\\"',$data['question_quizz']).'</h4><br><input type=\"checkbox\" id=\"rep1\" name=\"rep1\" data-reponse1=\"'.$data['ok_reponse1'].'\"><label id=\"t_quizz1\" for=\"rep1\">'.str_replace('"','\\"',$data['reponse1']).'</label><br><input type=\"checkbox\" id=\"rep2\" name=\"rep2\"data-reponse2=\"'.$data['ok_reponse2'].'\"><label id=\"t_quizz2\" for=\"rep2\">'.str_replace('"','\\"',$data['reponse2']).'</label><br><input type=\"checkbox\" id=\"rep3\" name=\"rep3\"data-reponse3=\"'.$data['ok_reponse3'].'\"><label id=\"t_quizz3\" for=\"rep3\">'.str_replace('"','\\"',$data['reponse3']).'</label><br><input class=\"butSol\" type=\"submit\" value=\"Solution\">","","",true,true);
    });
</script>
</div>';
           
}
?>
    </div>

<?php 
//Préparation de la carte-------------
$sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice_femme ,categorie FROM jcdd_contenu WHERE jeu = ?  AND categorie>0 ORDER BY RAND()" ;
$req = $link->prepare($sql);
$req -> execute([intval($_GET['id'])]);
$moyennelg = 0;
$moyennelt = 0;
$compteur = 0;
while($data = $req -> fetch()){
    $lg= $data['longitude'];
    $lt= $data['latitude'];
    $moyennelg += $lg;
    $moyennelt += $lt;
    $compteur ++;
}
$moyennelg /= $compteur;
$moyennelt /= $compteur;
?>

<div id="map" style="align-content: center;justify-content:center;height:90vh; margin-top:10vh; margin-bottom:auto"></div>
<script type="text/javascript">$(document).ready(function() {

<?php 
echo $biographie; 
echo $titreFemme; 
?>
            
$('.relative').draggable({
    scroll: false,
    containment: ".body3",
    revert: false,
    cursorAt: {bottom:5},
    distance: 50,
    snap: true,//valeur default
    both: true,
            
    start: function( event, ui ) {
        xCreatrice=$(this).css("left");
        yCreatrice=$(this).css("top");
        ui.helper.context.style.opacity="0.7";
    },
    drag: function(event, ui) {
        var distanceMini;
        var compteurDrag=0;
        var meilleurMarker;
        $(".marker").each(function(){
            var c = $(this).css('transform') ;
            var t = c.replace(')','').split(',');
            var xp = ui.offset.left;
            var yp = ui.offset.top-parseInt($(this).css("height"));
            var xm = t[t.length-2];
            var ym = t[t.length-1];
            if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
                distanceMini= distance(xp,yp,xm,ym);
                meilleurMarker=$(this);
            }
            compteurDrag++;
        })

        if(distanceMini <50){
            $(".marker").addClass('markerR');
            $(".marker").removeClass('markerB');
            meilleurMarker.addClass('markerB');
            meilleurMarker.removeClass('markerR');
            //console.log("markeur");
            //console.log(ui.helper.context.firstElementChild.currentSrc);
            //console.log(ui);
        } else{
            meilleurMarker.addClass('markerR');
            meilleurMarker.removeClass('markerB');
        }
    },
    stop: function( event, ui ) {
        imgRevient=true;    
        ui.helper.context.style.opacity="1";
        
        var distanceMini;
        var compteurDrag = 0;
        var meilleurMarker;
        $(".marker").each(function(){
            var c = $(this).css('transform') ;
            var t = c.replace(')','').split(',');
            var xp = ui.offset.left;
            var yp = ui.offset.top-parseInt($(this).css("height"));
            var xm = t[t.length-2];
            var ym = t[t.length-1];
            if(compteurDrag==0 || distance(xp,yp,xm,ym)<distanceMini){
                distanceMini= distance(xp,yp,xm,ym);
                meilleurMarker=$(this);
            }
            compteurDrag++;
            $(this).children().hide();
            //console.log('cache');
        })
        
        if(distanceMini <50){
            if($(this).attr("id").replace("p","") == meilleurMarker.attr("id").replace("m","")){
            // Bonne réponse
            changeScore("+1");
            
            // Remplacement de l'image du marqueur par le portrait de la femme
            imgRevient=false;
            ui.helper.context.style.display = "none";                
            meilleurMarker.removeClass('markerB');
            meilleurMarker.css('background-image',"url("+ui.helper.context.firstElementChild.currentSrc+")");
                        
            // Affichage de la biographie
            pop_up('<span style=\"color:#FC706D; font-size:1.1rem;margin:2px;\">'+titre[$(this).attr("id").replace("p","")]+' ',''+bio[$(this).attr("id").replace("p","")]+'','','',true,true);
            } else{
                // Si mauvaise réponse, -1
                changeScore("-1");
            }
        }
        if(imgRevient==true){
            // L'image de l'artiste revient à son emplacement initial
            ui.helper.context.style.display="block";
            meilleurMarker.removeClass('markerB');
            meilleurMarker.addClass('markerR');
            $("#Tscore").html(score);
        }
                
        if(imgRevient){
            $(this).animate({left:xCreatrice,top:yCreatrice},600,"easeOutCirc");
        }
    }
});
});
        
// Initialisation de la carte
mapboxgl.accessToken = '<?php echo ($clefApiMapbox);  ?>';
var map = new mapboxgl.Map({
    style: 'https://data.osmbuildings.org/0.2/anonymous/style.json',
    center: [ <?php echo $moyennelg; ?> , <?php echo $moyennelt; ?> ],
    zoom: 15.3,
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
    //Création des marqueurs        
            
    var geojson = {
        type: 'FeatureCollection',
        features: [ <?php

$sql = "SELECT id,jeu,femme,photo_femme, femme, longitude, latitude, indice_lieu, adresse ,categorie FROM jcdd_contenu WHERE jeu = ? AND categorie>0 ORDER BY RAND()";
$req = $link -> prepare($sql);
$req -> execute([intval($_GET['id'])]);
while ($data = $req -> fetch()) {
    echo "{
        type: 'Feature',id:".$data['id'] ." ,
        geometry: {
        type: 'Point',
            coordinates: [".$data['longitude'] .", ". $data['latitude'] ."]
        },
        properties: {
            title: 'Mapbox',
            description: \"".str_replace('"', '\"', $data['adresse'])."\"
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
        var mark = new mapboxgl.Marker(el, {})
                   .setLngLat(marker.geometry.coordinates)
                   .addTo(map);
        mark._element.id="m"+marker.id;
    });

});

// Add zoom and rotation controls to the map.
map.addControl(new mapboxgl.NavigationControl());
</script>

<div class="score">
    <span class="Tscore"><span id="Tscore"></span> point<span id="plurielScore">s</span></span>
    <div class="Tscore" style="position:absolute;right:20px;    "><a id="nextStep" href="drag.php?id=<?php echo intval($_GET['id']); ?>&amp;score=10">&Eacute;tape suivante</a></div>
</div>

</body>
</html>