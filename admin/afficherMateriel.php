<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="assets\vendor\bootstrap-icons\bootstrap-icons.css">
    <title>Accueil</title>
</head>
<body>
    
    <!--A F F I C H A G E-->
    <table>
    <thead>
        <tr>
            <th scope="col">Désignation</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Image</th>
            <th scope="col">Prix</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
        <?php
                include('connexion.php');
                $affiche = ("SELECT * FROM materiel");
                $result = $connexion->query($affiche);
                while ($valeur = $result->fetch()) {
            ?>
            
            <tbody>
            <tr>
                <td><?= $valeur['designation']?></td>
                <td><?= $valeur['categorie']?></td>
                <td><?= $valeur['img_mat']?></td>
                <td><?= $valeur['couleur']?></td>
                <td><?= $valeur['etat']?></td>
                <td><a href="modifierMateriel.php?id=<?= $valeur['id']?>">Modifier</a>
                <a href="supprimerMateriel.php?id=<?= $valeur['id']?>">Supprimer</a>
                </td>
            </tr>       
	        </tbody>
            <?php
            }
            ?> 
        </table>
        <div>
            <h4><a href="menuMateriel.php">Retour</a></h4>
        </div>
    
        </body>
</html>