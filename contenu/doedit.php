<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 13/02/18
 * Time: 14:23
 */
//Test input to controle if user put value in each input, if not, return to admin.php with error
if(!isset($_POST['marque']) || !isset($_POST['modele']) || !isset($_POST['couleur']) ||  !isset($_POST['annee']) || !isset($_POST['gamme']) || !isset($_POST['paysdorigine']) || !isset($_POST['plaque']) || !isset($_POST['kilometrage']) || !isset($_POST['nbrPossesseur']) || !isset($_POST['vendeur']) || !isset($_POST['etat']) || !isset($_POST['prix'])){
    header('Location:admin.php?nopostdata');
    exit;
}
//Connect to database
require_once "connexion.php";
//Update values into table 'voitures'
if(($_FILES['img']['name'])!==''){
    //Test if file was put at input 'img'
    $requete = "UPDATE
`voitures`
SET
`marque` = :marque,
`modele` = :modele,
`couleur` = :couleur,
`annee` = :annee,
`gamme` = :gamme,
`paysdorigine` = :paysdorigine,
`plaque` = :plaque,
`kilometrage` = :kilometrage,
`nbrPossesseur` = :nbrPossesseur,
`vendeur` = :vendeur,
`etat` = :etat,
`prix` = :prix,
`img` = :img
WHERE
id = :id
;";
} else { //If file wasn't put, img file isn't update
    $requete = "UPDATE
`voitures`
SET
`marque` = :marque,
`modele` = :modele,
`couleur` = :couleur,
`annee` = :annee,
`gamme` = :gamme,
`paysdorigine` = :paysdorigine,
`plaque` = :plaque,
`kilometrage` = :kilometrage,
`nbrPossesseur` = :nbrPossesseur,
`vendeur` = :vendeur,
`etat` = :etat,
`prix` = :prix
WHERE
id = :id
;";
}

if(($_FILES['img']['name'])!=='') {
    //Put file return by $_FILES['img'] in /img
    $uploadfile='img/'.$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
}

$stmt=$conn->prepare($requete);
$stmt->bindValue(':marque', htmlentities($_POST['marque']));
$stmt->bindValue(':modele', htmlentities($_POST['modele']));
$stmt->bindValue(':couleur', htmlentities($_POST['couleur']));
$stmt->bindValue(':annee', htmlentities($_POST['annee']));
$stmt->bindvalue(':gamme', htmlentities($_POST['gamme']));
$stmt->bindValue(':paysdorigine', htmlentities($_POST['paysdorigine']));
$stmt->bindValue(':plaque', htmlentities($_POST['plaque']));
$stmt->bindValue(':kilometrage', htmlentities($_POST['kilometrage']));
$stmt->bindValue(':nbrPossesseur', htmlentities($_POST['nbrPossesseur']));
$stmt->bindValue(':vendeur', htmlentities($_POST['vendeur']));
$stmt->bindValue(':etat', htmlentities($_POST['etat']));
$stmt->bindValue(':prix', htmlentities($_POST['prix']));
$stmt->bindValue(':id', htmlentities($_POST['id']));
if(($_FILES['img']['name'])!==''){
    $stmt->bindValue(':img',htmlentities( $_FILES['img']['name']));
}
$stmt->execute();
//Return to admin.php
header('Location:admin.php');