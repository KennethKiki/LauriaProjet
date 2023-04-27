<?php
include('traitement.php');
if((isset($_GET['id'])) && !(empty($_GET['id']))){
    $getId = $_GET['id'];
    include('connexion.php');
    $recherche = ("SELECT * FROM produit WHERE id ='$getId'");
    $result = $connexion->query($recherche);
    if ($result->rowcount()>0) {
        while ($valeur = $result->fetch()) 
        {
            $designation_alt = $valeur['designation'];
            $categorie_alt = $valeur['categorie'];
            $img_alt = $valeur['img'];
            $prix_alt = $valeur['prix'];
            $descriptions_alt = $valeur['descriptions'];
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
    if (isset($_POST['designation']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['descriptions'])) {
        if (!empty($_POST['designation']) && !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['descriptions'])) 
        {
            $designation = $_POST['designation'];
            $categorie = $_POST['categorie'];
            $prix = $_POST['prix'];
            $descriptions = $_POST['descriptions'];
                if(isset($_FILES['img']) && !empty($_FILES['img']))
                {
                    $ext = extention();
                    if((@$_FILES["img"]["type"]=="image/jpeg") OR (@$_FILES["img"]["type"]=="image/jpeg"))
                    {
                        @$result=move_uploaded_file($_FILES["img"]["tmp_name"],"image_produit/$designation.$ext");
                        if(!$result)
                        {
                            echo " Erreur de transfert fichier 1 n°",$_FILES["img"]["error"];
                        
                        }
                        else 
                        {
                            try 
                            {
                                include('connexion.php');
                                $requete = ("UPDATE produit SET designation= '$designation', categorie='$categorie', img='$designation.$ext', prix='$prix', descriptions='$descriptions' WHERE id='$getId' ");
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
                <h3>Ajouter un produit</h3>
            </div>
            <div class="content-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-label" placeholder="Désignation" name="designation" value="<?= $designation_alt ?>" required> <br>
                    <select name="categorie" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="Bracelet">Bracelet</option>
                        <option value="Baya">Baya</option>
                        <option value="Chevillère">Chevillère</option>
                    </select><br>
                    <input type="file" name="img" id=""> <br>
                    <input type="number" class="form-label" placeholder="Prix" name="prix" value="<?= $prix_alt ?>" required> <br>
                    <textarea name="descriptions" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Ajouer" name="modifier">
                </form>
            </div>
        </div>
        <div>
            <h4><a href="index.php">Retour</a></h4>
        </div>
</body>
</html>