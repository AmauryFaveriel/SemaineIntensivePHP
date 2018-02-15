<?php
try { //try to connect to database 'ok'
    $conn = new PDO('mysql:host=localhost;dbname=ok', 'root', 'root');
} catch (PDOException $exception) { //if can't connect, return error message
    die('Impossible de se connecter à la basse de données');
}
?>