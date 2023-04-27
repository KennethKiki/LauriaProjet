<?php require 'header.php'; ?>

    <div class="bloc4 produits" id="produits">
        <div class="content_card">
            <div class="container mt-4 d-flex mb-5">
                <div class="row">
                <?php
                    include('../admin/connexion.php');

                    if (isset($_GET['id']) AND !empty($_GET['id'])) 
                    {
                        $id = $_GET['id'];

                        $requet = "SELECT * FROM produit WHERE categorie = '$id'";
                        $result = $connexion -> query($requet);
                            while ($valeur = $result->fetch()) 
                            {
                            ?>
                                <!--bloc a répété-->
                                    <div class="col-md-4 mt-5">
                                        <div class="card">
                                            <img src="<?= $valeur['img'] ?>" height="200vh" alt="" class="card-img-top w-100">
                                                <div class="card-body">
                                                    <div class="row d-flex">
                                                    <div class="">
                                                        <h2 class="card-body"><?= $valeur['prix'] ?> Fcfa</h2> 
                                                        <a href="" type="button" class="card-link" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-eye-fill"></i></a>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p class="card-text"><?= $valeur['descriptions'] ?></p>
                                                </div>
                                                <div class="btn_content">
                                                    <a href="" class="btn_exp">ajouter au panier</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!--fin bloc a répété-->
                            
                            <?php
                            }
                        }
                    
                ?>
                </div>
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
    <?php require 'footer.php';?>
</body>
</html>