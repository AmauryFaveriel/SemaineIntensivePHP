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
<a href="admin.php">Annuler l'ajout</a>
<form action="doadd.php" method="post" enctype="multipart/form-data">
    <label for="marque">Marque</label> <input type="text" name="marque"><br>
    <label for="modele">Modèle</label> <input type="text" name="modele"><br>
    <label for="couleur">Couleur</label> <input type="text" name="couleur"><br>
    <label for="annee">Année</label> <input type="number" name="annee"><br>
    <label for="gamme">Gamme</label> <input type="text" name="gamme"><br>
    <label for="paysdorigine">Pays d'origine</label> <input type="text" name="paysdorigine"><br>
    <label for="plaque">Plaque d'immatriculation</label> <input type="text" name="plaque"><br>
    <label for="kilometrage">Kilométrage</label> <input type="number" name="kilometrage"><br>
    <label for="nbrPossesseur">Nombre de possesseurs</label> <input type="number" name="nbrPossesseur"><br>
    <label for="vendeur">Vendeur</label> <input type="text" name="vendeur"><br>
    <label for="etat">État</label> <input type="text" name="etat"><br>
    <label for="prix">Prix</label> <input type="number" name="prix"><br>
    <label for="img">Image</label> <input type="file" name="img"><br>
    <input type="submit" value="Ajouter">
</form>

</body>
</html>