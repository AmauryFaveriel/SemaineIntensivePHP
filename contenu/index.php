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

<h1>Motor Legends</h1>

<div class="container">
    <?php while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

        <div class="carContainer">
            <a href="details.php?id=<?=$row['id']?>">
                <img class="carImage" src="img/<?=$row['img']?>" alt="<?=$row['marque'].' '.$row['modele']?>">
                <h2 class="firstCar-image-brand"><?=$row['marque'].' '.$row['modele']?></h2>
                <h3><?=$row['annee']?></h3>
            </a>
        </div>

    <?php endwhile;?>
</div>
<a href="admin.php">Admin</a>

</body>
</html>