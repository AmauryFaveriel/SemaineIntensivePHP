<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 13/02/18
 * Time: 14:12
 */
//Test if id is define
if(!isset($_GET['id'])) {
    header('Location:admin.php?noprovidededit');
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
  `prix`
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
    <title>Document</title>
</head>
<body>
    <form action="doedit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <label for="marque">Marque</label> <input type="text" name="marque" value="<?=$row['marque']?>"><br>
        <label for="modele">Modèle</label> <input type="text" name="modele" value="<?=$row['modele']?>"><br>
        <label for="couleur">Couleur</label> <input type="text" name="couleur" value="<?=$row['couleur']?>"><br>
        <label for="annee">Année</label> <input type="number" name="annee" value="<?=$row['annee']?>"><br>
        <label for="gamme">Gamme</label> <input type="text" name="gamme" value="<?=$row['gamme']?>"><br>
        <label for="paysdorigine">Pays d'origine</label> <input type="text" name="paysdorigine" value="<?=$row['paysdorigine']?>"><br>
        <label for="plaque">Plaque d'immatriculation</label> <input type="text" name="plaque" value="<?=$row['plaque']?>"><br>
        <label for="kilometrage">Kilométrage</label> <input type="number" name="kilometrage" value="<?=$row['kilometrage']?>"><br>
        <label for="nbrPossesseur">Nombre de possesseurs</label> <input type="number" name="nbrPossesseur" value="<?=$row['nbrPossesseur']?>"><br>
        <label for="vendeur">Vendeur</label> <input type="text" name="vendeur" value="<?=$row['vendeur']?>"><br>
        <label for="etat">État</label> <input type="text" name="etat" value="<?=$row['etat']?>"><br>
        <label for="prix">Prix</label> <input type="number" name="prix" value="<?=$row['prix']?>"><br>
        <label for="img">Image</label> <input type="file" name="img"><br>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
