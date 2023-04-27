<?php
/*

    session_start();
    $prixtotal=0;
    if(isset($_POST["envoi"]))
    {
    // AJOUTER
    if($_POST["envoi"]=="AJOUTER" && $_POST["code"]!="" && $_POST["article"]!=""
    && $_POST["prix"]!="")
    {
    $code=$_POST["code"]; 
    $article= $_POST["article"]; 
    $prix= $_POST["prix"]; 
    $_SESSION['code']= $_SESSION['code']."//".$code; 
    $_SESSION['article']= $_SESSION['article']."//".$article; 
    $_SESSION['prix']= $_SESSION['prix']."//".$prix; 
    echo $_SESSION['code'];
    } // VÉRIFIER
    if($_POST["envoi"]=="VERIFIER")
    {
    echo "<table border=\"1\" >";
    echo "<tr><td colspan=\"3\"><b>Récapitulatif de votre commande</b></td>";
    echo "<tr><th>&nbsp;code&nbsp;</th><th>&nbsp;article&nbsp;
    </ th><th>&nbsp;prix&nbsp;</th>";
    $total=0;
    $tab_code=explode("//",$_SESSION['code']); 
    $tab_article=explode("//",$_SESSION['article']); 
    $tab_prix=explode("//",$_SESSION['prix']); 
    for($i=1;$i<count($tab_code);$i++) 
    {
    echo "<tr> <td>{$tab_code[$i]}</td> <td>{$tab_article[$i]}
    </td><td>".sprintf("%01.2f", $tab_prix[$i])."</td>";
    $prixtotal+=$tab_prix[$i]; 
    }
    echo "<tr> <td colspan=2> PRIX TOTAL </td> <td>". sprintf("%01.2f", $prixtotal)."
    </td>";
    echo "</table>";
    } // ENREGISTRER
    if($_POST["envoi"]=="ENREGISTRER")
    {
    $idfile=fopen("commande.txt",'w');
    //*************************************
    $tab_code=explode("//",$_SESSION['code']);
    $tab_article=explode("//",$_SESSION['article']);
    $tab_prix=explode("//",$_SESSION['prix']);
    for($i=0;$i<count($tab_code);$i++) 
    {
    fwrite($idfile, $tab_code[$i]." ; ".$tab_article[$i]." ; ".$tab_prix[$i]."; \n");
    }
    fclose($idfile);
    } // LOGOUT
    if($_POST["envoi"]=="LOGOUT")
    {
    session_unset(); 
    session_destroy(); 
    echo "<h3>La session est terminée</h3>";
    } $_POST["envoi"]=""; 
    } ?>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <title>Gestion de paniers</title>
    </head>
    <body>
    <form action="brouillon.php" method="post" enctype
    ="application/x-www-form-urlencoded">
    <fieldset>
    <legend><b>Saisies d'articles</b></legend>
    <table>
    <tbody>
    <tr>
    <th>code : </th>
    <td> <input type="text" name="code" /></td>
    </tr>
    <tr>
    <th>article : </th>
    <td><input type="text" name="article" /></td>
    </tr>
    <tr>
    <th>prix :</th>
    <td><input type="text" name="prix" /></td>
    </tr>
    <tr>
    <td colspan="3">
    <input type="submit" name="envoi" value="AJOUTER" />
    <input type="submit" name="envoi" value="VÉRIFIER" />
    <input type="submit" name="envoi" value="ENREGISTRER" />
    <input type="submit" name="envoi" value="LOGOUT" />
    </td>
    </tr>
    </tbody>
    </table>
    </fieldset>
    </form>
    </body>
*/
   
    verif(5);

    function verif($id)
    {
        $tab = ["1","2"];
        for($i = 0; $i< 2; $i++)
        {
            if ($tab[$i] == $id) 
            {
                $rs = "true";
            }
            else
            {
                $rs = "false";
            }
        }
        echo $rs;
    }
?>