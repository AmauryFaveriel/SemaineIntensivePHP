<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 15/02/18
 * Time: 14:22
 */
if(!isset($_POST['login']) || !isset($_POST['password'])) {
    header('Location:index.php?noprovideddata');
    exit;
}

require_once "connexion.php";
$requete = "SELECT
`login`,
`password`
FROM
`adminLogin`
;";
$stmt = $conn->prepare($requete);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($_POST['login'] === $row['login'] && $_POST['password'] === $row['password']) {
    header('Location:admin.php');
} else {
    header('Location:index.php?badidentifiant');
}