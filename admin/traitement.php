<?php
function extention(){
    if (@$_FILES["img"]["type"]=="image/jpeg") 
    {
        $ext = "jpg";
    }
    elseif (@$_FILES["img"]["type"]=="image/png"){
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
    if (isset($_POST['designation']) && isset($_POST['categorie']) && isset($_POST['prix']) && isset($_POST['descriptions'])) {
        if (!empty($_POST['designation']) && !empty($_POST['categorie']) && !empty($_POST['prix']) && !empty($_POST['descriptions'])) 
        {
            $designation = $_POST['designation'];
            $categorie = $_POST['categorie'];
            $prix = $_POST['prix'];
            $descriptions = $_POST['descriptions'];
            $reponse = control("produit",$designation,$categorie);
            if(@$reponse)
            {
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
                                $requete = ("INSERT INTO produit(designation,categorie,img,prix,descriptions) VALUE('$designation','$categorie', '$designation.$ext', '$prix', '$descriptions')");
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