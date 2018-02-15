<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 15/02/18
 * Time: 13:08
 */
if(!isset($_POST['login'])) {
    header('Location:admin.php?noprovidedlogin');
    exit;
}
require_once "connexion.php";
$requete = "UPDATE
`adminLogin`
SET
`login` = :login
;";
$stmt = $conn -> prepare($requete);
$stmt->bindValue(':login',htmlentities($_POST['login']));
$stmt->execute();
header('Location:admin.php');
