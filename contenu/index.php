<?php
require_once "connexion.php";
$requete = "SELECT
    `id`,
    `marque`,
    `modele`,
    `annee`,
    `img`
    FROM
    `voitures`
    ;";
$stmt = $conn->prepare($requete);
$stmt->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Motor Legend</title>
</head>
<body>
<?php if (isset($_GET['error'])) { ?>
    <div class="error"><?=$_GET['error']?></div>
<?php } ?>

<div class="container">
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

        <div class="carContainer">
            <img class="carImage" src="img/<?=$row['img']?>" alt="<?=$row['marque'].' '.$row['modele']?>">
            <h2 class="firstCar-image-brand"><?=$row['marque'].' '.$row['modele']?></h2>
            <h3><?=$row['annee']?></h3>
        </div>

    <?php endwhile;?>
</div>

</body>
</html>