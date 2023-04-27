<?php session_start();?>
<?php
 //suppresion
 if(isset($_GET['del']))
 {
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
 }

 if (isset($_POST["add"])) {
    
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="panier.css">
    <title>Laury Bangles</title>
</head>
<body>
    <nav>
            
        <div class="nav_bloc1">
            <div class="search">
                <input type="search" name="" id="" class="search1">
                <input type="submit" value="Recherche" class="btn-search">
            </div>
            <div class="menu">
                <p>
                    <a class=""  data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                    </a>
                </p>
            </div>
            
            <div class="logo">
                <a href="">
                    <img src="./images/lauria_logo_1.2.jpg" alt="" width="50px">
                </a>
            </div>
            
            <div class="panier">
                <a href="" class="position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="bi bi-cart3"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                          <?php
                                if ($_SESSION) {
                                    echo array_sum($_SESSION['panier']);
                                }else{
                                    echo 0;
                                }
                                 
                            ?>
                        </span>
                </a>
            </div>
                
        </div>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="cards">
                <div class="nav_bloc">
                    <ul>
                        <li><a href="index.php#accueil">Accueil</a></li>
                        <li><a href="index.php#categorie">Categorie</a></li>
                        <li><a href="index.php#produits">nos produits</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
          </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="nav_bloc">
                    <ul>
                        <li><a href="index.php#accueil">Accueil</a></li>
                        <li><a href="index.php#categorie">Categorie</a></li>
                        <li><a href="index.php#produits">nos produits</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nav_bloc2">
            <ul>
                <li><a href="index.php#accueil">Accueil</a></li>
                <li><a href="index.php#categorie">Categorie</a></li>
                <li><a href="index.php#produits">nos produits</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
    </nav>
    <form action="" methode= "post">
        <section class="panier_content">
            <div class="panier_card">
                <div class="row en_tete">
                    <div class="col">Produits</div>
                    <div class="col">Categorie</div>
                    <div class="col">Prix</div>
                    <div class="col">Quantite</div>
                    <div class="col">Actions</div>
                </div>
                <?php
                    require("../admin/connexion.php");
                    @$ids = array_keys($_SESSION['panier']);
                    if (empty($ids)) { echo "Votre panier est vide";}
                    else
                    {
                        $req = $connexion -> query("SELECT * FROM produit WHERE id IN (".implode(',', $ids).")");
                        foreach ($req as $valeur) 
                        {
                            @$total = $total + ($valeur['prix']*$_SESSION['panier'][$valeur['id']]);
                            
                ?>
                <div class="row ligne">
                    <div class="col"><img src="<?= $valeur['img']; ?>" alt="" height="80px" width="100px"></div>
                    <div class="col"><?= $valeur['categorie']; ?></div>
                    <div class="col"><?= $valeur['prix']; ?> fcfa</div>
                    <div class="col"> <?=$_SESSION['panier'][$valeur['id']] ?></div>
                    <div class="col d-flex">
                        <div class="row-6"> <a href="panier.php?del=<?=$valeur['id']?>">Supprimer</a></div>
                        <?php if ($valeur['categorie'] == "Bracelet" ) {?><div class="row-6" data-bs-toggle="collapse" href="#collapseExample<?= $valeur['id'] ?>" role="button" aria-expanded="false" aria-controls="collapseExample">Modifier</div><?php }?>
                    </div>
                    
                    <div class="collapse p-4" id="collapseExample<?= $valeur['id'] ?>">
                            <div class="card card-body">
                                <!--Modification pour les bracelets-->
                                <form action="infoclient.php" method="post">
                                <?php if($valeur['categorie'] == "Bracelet"){ $_SESSION['nbrArtModifier'] = $_SESSION['panier'][$valeur['id']];?>
                                    <?php for ($i=0; $i < $_SESSION['panier'][$valeur['id']]; $i++) {{?>
                                        <div class="row">
                                            <h5>Produis <?= $i+1 ?></h5>
                                            <div class="col-2">Color : </div>
                                            <div class="col-5">
                                                <select class="" name="couleur_1">
                                                    <option selected>Choisir une couleur</option>
                                                    <option value="Bleu">Bleu</option>
                                                    <option value="Rouge">Rouge</option>
                                                    <option value="Noir">Noir</option>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <select class="" name="couleur_2">
                                                    <option selected>Choisir une couleur</option>
                                                    <option value="Bleu">Bleu</option>
                                                    <option value="Rouge">Rouge</option>
                                                    <option value="Noir">Noir</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">Inscription : </div>
                                            <div class="col-10">
                                                <input type="text" name="message" id="">
                                            </div>
                                        </div>
                                    <?php }} ?>
                                <?php } ?>
                                <div class="row"><input type="submit" value="Effectué" name="modification" ></div>
                                </form>
                            </div>
                    </div>
                </div>
                <?php }} ?>
                <div class="row total">
                    </div><p>Total : <span><?php if(@$total){ echo $total;} else{ echo 0; } ?> Fcfa</span></p></div>
                </div>
            <?php if (!empty($ids)) 
            {
                ?>
                <div class="btn_cmd">
                    <a href="infoclient.php">commander</a>
                </div>
                <?php
            }
            ?>
            
            
        </section>
    </form>

    <footer>
        <div class="logo_footer">
            <a href=""><h2>Laurya Bangles</h2></a>
        </div>
        <div class="content_footer">
            <div class="media">
                <ul>
                    <div class="row">
                        <div class="">
                            <li><a href=""><img src="./images/facebook.jpeg" alt=""><p>Laury Bangles</p></a></li>
                       
                            <li><a href=""><img src="./images/insta.jpeg" alt=""> <p>@laury_bangles</p></a></li>
                        </div>
                        <div class="">
                            <li><a href=""><img src="./images/twiter.png" alt=""> <p>@laury_bangles</p></a></li>
                        
                            <li><a href=""><img src="./images/google.png" alt=""> <p>laurybangles@gmail.com</p></a></li>
                        </div>
                    </div>
                </ul>

                <div class="new">
                    <ul>
                        <li><a href=""><img src="./images/facebook.jpeg" alt=""></a></li>
                        <li><a href=""><img src="./images/insta.jpeg" alt=""></a></li>
                        <li><a href=""><img src="./images/twiter.png" alt=""></a></li>
                        <li><a href=""><img src="./images/google.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="autres">
                <ul>
                    <li><a href="">Livraison</a></li>
                    <li><a href="">Conditions d'utilisations</a></li>
                </ul>
            </div>
            <div class="maps"></div>
        </div>
        
          
    </footer>

    <script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

