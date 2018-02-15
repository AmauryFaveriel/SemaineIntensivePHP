<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=ok', 'root', 'root');
} catch (PDOException $exception) {
    die($exception->getMessage());
}
?>

<!-- la variable connexion permet de lié le php à ma base de donnée pour intéragir avec elle et catch c'est l'exeption,
 c'est à dire l'erreur. Si il y as une erreur on affiche un message -->

