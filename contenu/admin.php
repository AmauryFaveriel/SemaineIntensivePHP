<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 13/02/18
 * Time: 09:33
 */
//Connect to database
require_once "connexion.php";
//Select informations needed into table 'adminLogin' to show page
$requeteAdmin = "SELECT
`login`
FROM
`adminLogin`
;";
$stmtAdmin=$conn->prepare($requeteAdmin);
$stmtAdmin->execute();
$rowAdmin = $stmtAdmin->fetch(PDO::FETCH_ASSOC);
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
<?php //Show error describe in URL
if (isset($_GET['error'])) { ?>
    <div class="error"><?=$_GET['error']?></div>
<?php } ?>
<h1>Panneau administrateur</h1>

<!-- GESTION DES VOITURES -->
<h2>Voitures</h2>
<p>Bonjour <?=$rowAdmin['login']?></p>
<a href="add.php">Ajouter</a>
<table style="width:100%;">
    <tr>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Couleur</th>
        <th>Année</th>
        <th>Gamme</th>
        <th>Pays d'origine</th>
        <th>Immatriculation</th>
        <th>Kilométrage</th>
        <th>Nombre possesseurs</th>
        <th>Vendeur</th>
        <th>Etat</th>
        <th>Prix</th>
        <th>Action</th>
    </tr>

    <?php
    //Select informations needed into table 'voitures' to show page
    $requete ="SELECT
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
          ;";
    $stmt=$conn->prepare($requete);
    $stmt->execute();
    //Create html element for each element in database
    while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?=$row['marque']?></td>
            <td><?=$row['modele']?></td>
            <td><?=$row['couleur']?></td>
            <td><?=$row['annee']?></td>
            <td><?=$row['gamme']?></td>
            <td><?=$row['paysdorigine']?></td>
            <td><?=$row['plaque']?></td>
            <td><?=$row['kilometrage']?></td>
            <td><?=$row['nbrPossesseur']?></td>
            <td><?=$row['vendeur']?></td>
            <td><?=$row['etat']?></td>
            <td><?=$row['prix']?></td>
            <td>
                <a href="delete.php?id=<?=$row['id']//Link to car delete page?>">Supprimer</a>
                <a href="edit.php?id=<?=$row['id']//Link to car edit page?>">Modifier</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>
<hr />
<!-- Link to change account value page -->
    <a href="changeAccount.php">Changer mes informations de connection</a><br>
<!-- Link to index page -->
<a href="index.php">Index</a>
</body>
</html>