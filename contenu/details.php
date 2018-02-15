<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 14/02/18
 * Time: 23:43
 */
//Test if id is define
if (!isset($_GET['id'])) {
    headers('Location:index.php?noprovideddata');
    exit;
}
//Connect to database
require_once "connexion.php";
//Select informations needed into table 'voitures' to show page
$requete = 'SELECT
  `id`,
  `marque`,
  `modele`,
  `couleur`,
  `annee`,
  `gamme`,
  `paysdorigine`,
  `plaque`,
  `kilometrage`,
  `nbrPossesseur`,
  `vendeur`,
  `etat`,
  `prix`,
  `img`
  FROM
  voitures
  WHERE
  id = :id
  ;';
$stmt=$conn->prepare($requete);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$row['marque'].' '.$row['modele']?></title>
    <link rel="stylesheet" href="style/styleDetails.css">
</head>
<body>
<a href="index.php">Retour</a>
    <div class="container">
        <img class="img" src="img/<?=$row['img']?>" alt="<?=$row['marque'].' '.$row['modele']?>">
        <h2><?=$row['marque'].' '.$row['modele']?></h2>
        <h3><?=$row['annee']?></h3>
        <p>Gamme : <?=$row['gamme']?></p>
        <p>Couleur : <?=$row['couleur']?></p>
        <p>Etat : <?=$row['etat']?></p>
        <p>Immatriculation : <?=$row['plaque']?></p>
        <p>Kilometrage : <?=$row['kilometrage']?></p>
        <p>Pays d'origine : <?=$row['paysdorigine']?></p>
        <p>Vendeur : <?=$row['vendeur']?></p>
        <p>Nombre de possesseurs : <?=$row['nbrPossesseur']?></p>
        <h3><?=$row['prix']?> €</h3>
    </div>
</body>
</html>
