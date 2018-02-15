<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 13/02/18
 * Time: 09:33
 */
require_once "connexion.php";
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
<h1>Panneau administrateur</h1>

<!-- GESTION DES VOITURES -->
<h2>Voitures</h2>
<p>Bonjour <?=$rowAdmin['login']?></p>
<!-- va chercher la page add.php afin de retourner à la page d'ajout-->
<a href="add.php">Ajouter</a>
<table style="width:100%;">
    <!-- toute les colonnes (th) du tableau (tr) -->
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
    // ici on crée la variable requête et on lui dit de sélectionner toutes les informations de (FROM) la table voitures.

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
    $stmt=$conn->prepare($requete);//stmt va récupéré la variable connexion et donc les informations qui sont dans la
    // base de données (prépare les informations et ensuite execute)

    $stmt->execute();  // il execute = récupération des informations dans la variable requête provenant de la base de donnée

    while(false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)):?>  <!-- on crée un boucle permettant d'afficher les informations une à une -->

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
                <a href="delete.php?id=<?=$row['id']?>">Supprimer</a> <!-- lien permettant de suprimer et modifier chaque ligne.-->

                <a href="edit.php?id=<?=$row['id']?>">Modifier</a>
            </td>
        </tr>
    <?php endwhile;?>
</table>
<hr />
<!-- GESTION DES PIECES -->

    <a href="changeAccount.php">Changer mes informations de connection</a><br>
<a href="index.php">Index</a> <!-- lien permettant de voir la page de présentation des voitures -->
</body>
</html>