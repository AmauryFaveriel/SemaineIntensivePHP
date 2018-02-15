<?php
//Connect to database
require_once "connexion.php";
//Select informations needed into table 'voitures' to show page
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
    <link rel="stylesheet" href="style/reset.css">
    <title>Motor Legend</title>
</head>
<body>

<?php //Show error describe in URL
if (isset($_GET['error'])) { ?>
    <div class="error"><?=$_GET['error']?></div>
<?php } ?>

<div class="containerAll">
    <h1 class="title">Motor Legends</h1>

    <div class="container">
        <?php //Create html element for each element in database
        while (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

            <div class="carContainer">
                <a href="details.php?id=<?=$row['id']//Link to car detail page?>">
                    <img class="carImage" src="img/<?=$row['img']?>" alt="<?=$row['marque'].' '.$row['modele']?>">
                    <h2 class="carName"><?=$row['marque'].' '.$row['modele']?></h2>
                    <h3 class="carName"><?=$row['annee']?></h3>
                </a>
            </div>

        <?php endwhile;?>
    </div>
    <!-- Link to admin connexion page -->
    <a class="linkAdmin" href="login.php">Admin</a>
</div>

</body>
</html>