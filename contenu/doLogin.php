<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 15/02/18
 * Time: 14:22
 */
//Test input to controle if user put value in each input, if not, return to index.php with error
if(!isset($_POST['login']) || !isset($_POST['password'])) {
    header('Location:index.php?noprovideddata');
    exit;
}
//Connect to database
require_once "connexion.php";
//Select informations needed into table 'adminLogin' to show page
$requete = "SELECT
`login`,
`password`
FROM
`adminLogin`
;";
$stmt = $conn->prepare($requete);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
//Test if login and password are in database
if($_POST['login'] === $row['login'] && $_POST['password'] === $row['password']) {
    header('Location:admin.php');
} else { //Return to index with error code if bad login or password
    header('Location:index.php?badidentifiant');
}