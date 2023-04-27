
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
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
                <a href="panier.php" class="position-relative" >
                        <i class="bi bi-cart3"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill">
                            <?php
                                if (@$_SESSION['panier']) {
                                    echo array_sum(@$_SESSION['panier']);
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
                        <li><a href="index.php#accueil">ACCUEIL</a></li>
                        <li><a href="index.php#categorie">CATEGORIE</a></li>
                        <li><a href="index.php#produits">NOS PRODUITS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>
            </div>
          </div>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <div class="nav_bloc">
                    <ul>
                        <li><a href="index.php#accueil">ACCUEIL</a></li>
                        <li><a href="index.php#categorie">CATEGORIE</a></li>
                        <li><a href="index.php#produits">NOS PRODUITS</a></li>
                        <li><a href="contact.php">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nav_bloc2">
            <ul>
                <li><a href="index.php#accueil">ACCUEIL</a></li>
                <li><a href="index.php#categorie">CATEGORIE</a></li>
                <li><a href="index.php#produits">NOS PRODUITS</a></li>
                <li><a href="contact.php">CONTACT</a></li>
            </ul>
        </div>
    </nav>