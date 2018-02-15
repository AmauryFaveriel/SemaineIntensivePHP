<?php
/**
 * Created by PhpStorm.
 * User: amaury
 * Date: 15/02/18
 * Time: 12:59
 */
require_once "connexion.php";
$requete = "SELECT
`login`
FROM
`adminLogin`
;";
$stmt=$conn->prepare($requete);
$stmt->execute();
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
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
<form action="doChangeLogin.php" method="post">
    <label for="login">Nom de compte : </label> <input type="text" name="login" value="<?=$row['login']?>">
    <input type="submit" value="Changer le nom de compte">
</form>
<form action="doChangePassword.php" method="post">
    <label for="oldPassword">Mot de passe actuel : </label> <input type="password" name="oldPassword">
    <label for="newPassword">Nouveau mot de passe : </label> <input type="password" name="newPassword">
    <input type="submit" value="Changer le mot de passe">
</form>
</body>
</html>
