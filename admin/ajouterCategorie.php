<?php

function control($t1,$comparaison1,$comparaison2){
    include('connexion.php');
    $verification = ("SELECT * FROM $t1 WHERE nom_cat ='$comparaison1' AND type_cat ='$comparaison2'");
    $result = $connexion->query($verification);
    if ($result->rowcount()>0) {
        $reponse = false;
    }else {
        $reponse = true;
    }
    return $reponse;
}

/**********************************************************************************************************
                                        A J O U T E R
 * *********************************************************************************************************/
if (isset($_POST['ajouer'])) 
{
    if (isset($_POST['nom_cat']) && isset($_POST['type_cat']))
    {
        if (!empty($_POST['nom_cat']) && !empty($_POST['type_cat'])) 
        {
            $nom_cat = addslashes($_POST['nom_cat']);
            $type_cat = $_POST['type_cat'];
                            try 
                            {
                                include('connexion.php');
                                $requete = ("INSERT INTO categorie(nom_cat,type_cat) VALUE('$nom_cat', '$type_cat')");
                                $resultat = $connexion->exec($requete);
                                echo "success";
                            } 
                            catch (PDOException $e) 
                            {
                                echo "erreur", $e->getMessage();
                            } 
        } 
    }
    else 
    {
        echo "Insertion";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\vendor\bootstrap-icons\bootstrap-icons.css">
        <title></title>
    </head>
    <body>
        <!--A J O U T-->
        <div class="content">
            <div class="content-title">
                <h3>Ajouter un categorie</h3>
            </div>
            <div class="content-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-label" placeholder="Nom de la catégorie" name="nom_cat" required> <br>
                    <select name="type_cat" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="Article">Article</option>
                        <option value="Matériel">Matériel</option>
                    </select><br>
                    <input type="submit" value="Ajouer" name="ajouer"> 
                </form>
            </div>
        </div>
        <div>
            <h4><a href="menuCategorie.php">Retour</a></h4>
        </div>
    </body>
</html>