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
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
        </tr>
    </thead>
        <?php
                include('connexion.php');
                $affiche = ("SELECT * FROM categorie");
                $result = $connexion->query($affiche);
                while ($valeur = $result->fetch()) {
            ?>
            
            <tbody>
            <tr>
                <td><?= $valeur['nom_cat']?></td>
                <td><?= $valeur['type_cat']?></td>
                <td>
                <a href="supprimerCategorie.php?id=<?= $valeur['id']?>">Supprimer</a>
                </td>
            </tr>       
	        </tbody>
            <?php
            }
            ?> 
        </table>
        <div>
            <h4><a href="menuCategorie.php">Retour</a></h4>
        </div>
    
        </body>
</html>