<?php
try { //try to connect to database 'ok'
    $conn = new PDO('mysql:host=localhost;dbname=ok', 'root', 'root');
} catch (PDOException $exception) { //if can't connect, return error message
    die('Impossible de se connecter à la basse de données');
}
?>

<!-- la variable connexion permet de lié le php à ma base de donnée pour intéragir avec elle et catch c'est l'exeption,
 c'est à dire l'erreur. Si il y as une erreur on affiche un message -->

