<?php
//inclure la page de connexion
include_once('../admin/connexion.php');
//création d'une session
if(!isset($_SESSION)){ session_start(); }
//panier par défaut
if(!isset($_SESSION['panier'])){ $_SESSION['panier'] = array(); }

if(isset($_GET['id']) && !empty($_GET['id']))
{
    //verifions si le produit existe
    $id = $_GET['id'];
    $req = $connexion-> prepare("SELECT * FROM produit WHERE id = ?");
    $res = $req -> execute(array($id));

    if($req->rowCount() == 0)
    {
        header('Location:erreur_produit.php');
    }

    if(isset($_SESSION['panier'][$id])){ $_SESSION['panier'][$id]++;}
    else{
        $_SESSION['panier'][$id] = 1;
    }

    header('Location:index.php#produits');
    
}
?>