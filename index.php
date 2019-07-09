<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cité des dames</title>

</head>

<body>
    <?php
    echo "<h1>Jeux cité des dames</h1>";

    $link = new PDO('mysql:host=127.0.0.1;dbname=jcdd', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
   $sql = "SELECT id_jeu,nom_jeu,photo FROM jcdd_jeux ";
// On prépare la requête avant l'envoi :
$req = $link->prepare($sql);
$req -> execute();
// On crée une liste déroulante avec les résultats
echo "<ul>";
while($data = $req -> fetch()){
  // On affiche chaque résultat sous forme d'un item de la liste
  echo '<li id="'.$data['id_jeu'].'"> <b>'.$data['nom_jeu'].',<img src="'.$data['photo'].'" class=""></b>';
}
$req = null;
echo "</ul>";

    $link = null;
    ?>
</body>

</html>
