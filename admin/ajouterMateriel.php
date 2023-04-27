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

function control($t1,$comparaison1,$comparaison2){
    include('connexion.php');
    $verification = ("SELECT * FROM $t1 WHERE designation ='$comparaison1' AND categorie ='$comparaison2'");
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
if (isset($_POST['ajouer'])) {
    if (isset($_POST['categorie']) && isset($_POST['couleur'])) {
        if (!empty($_POST['categorie']) && !empty($_POST['couleur'])) 
        {
            $designation = $_POST['designation'];
            $categorie = $_POST['categorie'];
            $couleur = $_POST['couleur'];
            $reponse = control("materiel",$designation,$categorie);
            if(@$reponse)
            {
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
                                $requete = ("INSERT INTO materiel(designation,categorie,img_mat,couleur,etat) VALUE('$designation','$categorie', '$designation.$ext', '$couleur','Disponible')");
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
            }
            else 
            {
                echo "Cet matériel existe dèja";
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
        <link rel="stylesheet" href="dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\vendor\bootstrap-icons\bootstrap-icons.css">
        <title></title>
    </head>
    <body>
        <!--A J O U T-->
        <div class="content">
            <div class="content-title">
                <h3>Ajouter un materiel</h3>
            </div>
            <div class="content-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-label" placeholder="Désignation" name="designation" > <br>
                    <select name="categorie" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="Corde">Corde</option>
                        <option value="Perle">Perle</option>
                    </select><br>
                    <input type="file" name="img_mat" id=""> <br>
                    <input type="text" name="couleur" placeholder="Couleur">
                    <input type="submit" value="Ajouer" name="ajouer"> <br>
                </form>
            </div>
        </div>
        <div>
            <h4><a href="menuMateriel.php">Retour</a></h4>
        </div>
    </body>
</html>