<?php 
    session_start();
    require 'header.php'; 
?>
    <div class="container-fluid">
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Panier</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <div class="ligne_panier">
                <div class="panier_img">
                    <img src="./images/IMG-20221012-WA0013.jpg" alt="">
                </div>
                <div class="qte">
                    <form action="">
                        <select name="" id="">
                            <?php
                            for ($i=1; $i < 6; $i++) { 
                            ?>
                                <option value=""><?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </form>
                </div>
                <div class="price">
                    <h5 class="">500 Fcfa</h5> 
                </div>
                <div class="erase">
                    <a href="">
                        <i class="bi bi-gear"></i>
                    </a>
                </div>
                <div class="erase">
                    <a href="">
                        <i class="bi bi-trash3"></i>
                    </a>
                </div>
            </div>
            <div class="barre"></div>
            <div class="total">
                <div class="txt_total">
                    <p>Total :</p>
                </div>
                <div class="total_price">
                    <h5>1500 Fcfa</h5>
                </div>
            </div>
            <div class="commande">
                <a href="">Commander</a>
            </div>
          </div>
        </div>
      </div>
    
    

    <div class="bloc1 accueil" id="accueil">
        <div class="text">
            <h1>Les bayas</h1>
            <p>Révéler encore plus votre féminité avec nos perles de hanche</p>
            <a href="" class="btn_normal" hidden>Decouvrir</a>
        </div>
    </div>
   
    <div class="bloc2 catégorie p-5" id="categorie">
        <div class="titre">
            <h2>
                categorie
            </h2>
        </div>
        <div class="content container">
            <div class="row d-flex">
                <div class="col-md-4">
                    <a href="voir_plus.php?id=<?="Bracelet"?>">
                        <img src="./images/bg_bra.jpg" alt="">
                        <div class="txt_cat">
                            <p class="cat">
                                Catégorie
                            </p>
                            <p class="name_cat">
                                Bracelet
                            </p>
                        </div>
                    </a>
                </div>
                
                <div class="col-md-4">
                    <a href="voir_plus.php?id=<?="baya"?>">
                        <img src="./images/bg_baya.jpg" alt="">
                        <div class="txt_cat">
                            <p class="cat">
                                Catégorie
                            </p>
                            <p class="name_cat">
                                Baya
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="voir_plus.php?id=<?="chevillère"?>">
                        <img src="./images/bg_chv.jpg" alt="">
                        <div class="txt_cat">
                            <p class="cat">
                                Catégorie
                            </p>
                            <p class="name_cat">
                                Chevillere
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bloc3 création" id="création">
        <div class="titre">
            <h2>
                créations
            </h2>
        </div>
        <div class="txt">
            <p>
                Nous allions votre goût et notre savoir-faire pour créer des accessoires qui vous ressemble. Découvrer notre large gamme d’accessoires en perles faits à la main pour votre plaisir.
            </p>
        </div>
    </div>

    <div class="bloc4 produits" id="produits">
        <div class="titre">
            <h2>
                produits
            </h2>
        </div>
        <div class="content_card">
        

        <div class="container mt-4  mb-5">
            <div class="row">
            <?php
                include('../admin/connexion.php');

                $requet = "SELECT * FROM produit"; 
                $result = $connexion -> query($requet);
                while ($valeur = $result->fetch()) 
                {
            ?>
             <!--card start--> 
                <div class="col-md-4 mt-5">
                    <div class="card">
                        <img src="<?= $valeur['img']?>" height="200vh" alt="" class="card-img-top w-100">
                        <div class="card-body">
                            <div class="row d-flex">
                                <div class="">
                                    <h2 class="card-body"><?= $valeur['prix']?> Fcfa</h2> 
                                    <a href="" type="button" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye-fill"></i></a>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="card-text"><?= $valeur['descriptions']?></p>
                            </div>
                            <div class="btn_content">
                                <a href="ajouterPanier.php?id=<?= $valeur['id']?>" class="btn_exp">ajouter au panier</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--card end--> 
            <?php
                }
            ?>  
            </div>
        </div>
        
    </div>
    
    <!-- Modal voir plus sur article -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="font-weigth-ligth ml-4">Description</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-2 p-3">
                    <div class="col-md-6">
                        <img src="" alt="" width="100%" height="100vh" class="rounded">
                    </div>
                    <div class="col-md-6">
                        <h2 class="product_name"></h2>
                        <p style="box-sizing: border-box;" class="product_desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam cupiditate repellendus</p>
                        <p>Review : &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-star text-warning ml-2"></i>
                            <i class="fa fa-star text-warning ml-2"></i>
                            <i class="fa fa-star text-warning ml-2"></i>
                            <i class="fa fa-star text-warning ml-2"></i>
                            <i class="fa fa-star  ml-2"></i>
                        </p>
                        <h4 class="product_price">

                        </h4>
                        <button class="btn btn-success mt-2" style="width: 150px;">Add ro card</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


    <div class="bloc5 plus p-5">
        <div class="content">
            <div class="row">
                <div class="col-md-4 ">
                    <h2>service de livraison</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam obcae</p>
                </div>
                <div class="col-md-4">
                    <h2>CUSTIMISER VOS COMMANDES</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam obcae</p>
                </div>
                <div class="col-md-4">
                    <h2>CUSTOMER SUPPORT</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam obcae</p>
                </div>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>
</body>
</html>