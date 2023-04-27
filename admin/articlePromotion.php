<?php
if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $categoriePromo = $_GET['categorie'];
}

            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <thead>
        <tr>
            <th scope="col">Selectionner</th>
            <th scope="col">Désignation</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Image</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
        <?php
                include('connexion.php');
                $affiche = ("SELECT * FROM produit WHERE categorie='$categoriePromo'");
                $result = $connexion->query($affiche);
                $nbr=$result->rowCount();
                while ($valeur = $result->fetch()) {
                    
            ?>
            
            <tbody>
            <tr>
                <form action="" method="post">
                    <td><input type="checkbox" value="<?= $valeur['id']?>" name="<?= $valeur['designation']?>"></td>
                    <td><?= $valeur['designation']?></td>
                    <td><?= $valeur['categorie']?></td>
                    <td><?= $valeur['img']?></td>
                    <td><?= $valeur['prix']?></td>
                    <td><?= $valeur['descriptions']?></td>
            </tr>       
	        </tbody>
            <?php
            } 
            ?> 
        </table>
            <input type="submit" value="Valider" name="valider">
        </form>
        <div>
            <h4><a href="menuPromotion.php">Retour</a></h4>
        </div>
</body>
</html>