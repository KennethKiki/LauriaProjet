<?php
function extention(){
    if (@$_FILES["img_mat"]["type"]=="image/jpeg") 
    {
        $ext = "jpg";
    }
    elseif (@$_FILES["img_mat"]["type"]=="image/png"){
        $ext = "png";
    }
    return $ext;
}
if((isset($_GET['id'])) && !(empty($_GET['id']))){
    $getId = $_GET['id'];
    include('connexion.php');
    $recherche = ("SELECT * FROM materiel WHERE id ='$getId'");
    $result = $connexion->query($recherche);
    if ($result->rowcount()>0) {
        while ($valeur = $result->fetch()) 
        {
            $designation_alt = $valeur['designation'];
            $categorie_alt = $valeur['categorie'];
            $img_mat_alt = $valeur['img_mat'];
            $couleur_alt = $valeur['couleur'];
            $etat_alt = $valeur['etat'];
        }
    }
}

/**********************************************************************************************************
                                        M O D I F I E R
 * *********************************************************************************************************/
if (isset($_POST['modifier'])) {
    if((isset($_GET['id'])) && !(empty($_GET['id']))){
        $getId = $_GET['id'];
    }
    if (isset($_POST['categorie']) && isset($_POST['couleur']) && isset($_POST['etat'])) {
        if (!empty($_POST['categorie']) && !empty($_POST['couleur']) && !empty($_POST['etat'])) 
        {
            $designation = $_POST['designation'];
            $categorie = $_POST['categorie'];
            $couleur = $_POST['couleur'];
            $etat = $_POST['etat'];
                if(isset($_FILES['img_mat']) && !empty($_FILES['img_mat']))
                {
                    $ext = extention();
                    if((@$_FILES["img_mat"]["type"]=="image/jpeg") OR (@$_FILES["img_mat"]["type"]=="image/jpeg"))
                    {
                        @$result=move_uploaded_file($_FILES["img_mat"]["tmp_name"],"image_matériel/$designation.$ext");
                        if(!$result)
                        {
                            echo " Erreur de transfert fichier 1 n°",$_FILES["img_mat"]["error"];
                        
                        }
                        else 
                        {
                            try 
                            {
                                include('connexion.php');
                                $requete = ("UPDATE materiel SET designation='$designation', categorie='$categorie', img_mat='$designation.$ext', couleur='$couleur', etat='$etat' WHERE id='$getId' ");
                                $resultat = $connexion->exec($requete);
                                echo "success";
                            } 
                            catch (PDOException $e) 
                            {
                                echo "erreur", $e->getMessage();
                            } 
                        }    
                    }else 
                    {
                        echo "Le fichier n'est pas pise en compte";
                    }
                }
            else 
            {
                echo "Cet article existe dèja";
            }
        }
        else 
        {
            echo "vide";
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
    <title>Document</title>
</head>
<body>
        <!--M O D I F I E R-->
        <div class="content">
            <div class="content-title">
                <h3>Modifier materiel</h3>
            </div>
            <div class="content-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-label" placeholder="Désignation" name="designation" value="<?= $designation_alt ?>" > <br>
                    <select name="categorie" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="Corde">Corde</option>
                        <option value="Perle">Perle</option>
                    </select><br>
                    <input type="file" name="img_mat" id=""> <br>
                    <input type="text" name="couleur"> <br>
                    <select name="etat" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="En stock">En stock</option>
                        <option value="Indisponible">Indisponible</option>
                    </select><br>
                    <input type="submit" value="Ajouer" name="modifier">
                </form>
            </div>
        </div>
        <div>
            <h4><a href="menuMateriel.php">Retour</a></h4>
        </div>
</body>
</html>