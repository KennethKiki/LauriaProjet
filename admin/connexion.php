<?php

    try
    {
       $connexion = new PDO("mysql: host=localhost; dbname=laurybangles", "root", "") ;
       $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        echo"erreur: " .$e->getMessage();
    }

?>