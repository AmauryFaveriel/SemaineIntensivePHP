<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 15/02/18
 * Time: 13:19
 */
if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword'])) {
    header('Location:admin.php?noprovidedpassword');
    exit;
}
require_once "connexion.php";
$requete = "SELECT
`password`
FROM
`adminLogin`
;";
$stmt = $conn->prepare($requete);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if($_POST['oldPassword'] === $row['password']) {
    $requete = "UPDATE
`adminLogin`
SET
`password` = :password
;";
    $stmt = $conn->prepare($requete);
    $stmt->bindValue(':password', htmlentities($_POST['newPassword']));
    $stmt->execute();
    header('Location:admin.php');
} else {
    header('Location:admin.php?badpassword');
}

