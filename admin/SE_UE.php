<?php

if (isset($_POST['envoyer']))
{
   $nom = $_POST['nom_ue'];
   $entite_id = $_POST['entite_id'];
   include('connexion.php');
   $requete = "INSERT INTO UE (
       nom,
       entite_id
   ) VALUES ('$nom','$entite_id')";  
   $execute = $connexion->exec($requete);
   if ($execute) {
       echo "Sucess";
   }else {
       echo "Erreur";
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
    <nav>
        <a href="">ENREGISTREMENT</a>
        <ul>
            <li><a href="" class="nav_link">Accueil</a></li>
            <li><a href="" class="nav_link">A propos</a></li>
            <li><a href="" class="nav_link connexion">Connexion</a></li>
        </ul>
    </nav>
    <form action="" method="POST">
        <div>
            <input type="text" name="nom_ue" required><br>
            <input type="number" name="entite_id" required><br>
            <input type="submit" name="envoyer">
        </div>  
    </form>
    
</body>
</html>