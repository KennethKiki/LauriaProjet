<?php 
if(isset($_GET['id']) && !(empty($_GET['id']))){
    $getId = $_GET['id'];
    /**********************************************************************************************************
                                        S U P P R I M E R
 * *********************************************************************************************************/
    include("connexion.php");
    $suppression = ("DELETE FROM categorie WHERE id='$getId'");
    $result = $connexion->exec($suppression);
    if ($result) {
        header("Location:afficherCategorie.php");
    }
    $connexion = NULL;
}else {
    echo "Aucune catégorie retrouver";
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
<div>
    <h4><a href="menuCategorie.php">Retour</a></h4>
</div>
</body>
</html>