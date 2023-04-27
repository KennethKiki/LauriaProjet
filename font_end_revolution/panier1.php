<?php session_start();?>
<?php require('header.php');?>
<div class="page_panier">
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
                <table class="table container">
                    <tbody>
                        <tr>
                            <td> <img src="<?=$valeur['img'];?>" alt="" width="150px" heigth="100%"></td>
                            <td><?=$valeur['prix'];?></td>
                            <td><?=$_SESSION['panier'][$valeur['id']];?></td>
                            <td><?=$valeur['descriptions'];?></td>
                            <td> <a href="panier.php?del=<?=$valeur['id']?>">suprimer</a></td>
                        </tr>
                    </tbody>
                </table>
    <?php
            }
        }
    ?>
    <div class="container">
        <div class="row d-flex panier_page">
            <div class="col-2">Total :</div>
            <div class="col-10"><?= @$total; ?></div>
        </div>
        <div class="row">
            <div class="p p-5 text-center"><a href="">COMMANDER</a></div>
        </div>
    </div>
</div>  
<section class="panier_content">
        <div class="panier_card">
            <div class="row en_tete">
                <div class="col">Produits</div>
                <div class="col">Categorie</div>
                <div class="col">Prix</div>
                <div class="col">Quantite</div>
                <div class="col">Actions</div>
            </div>
            <div class="row ligne">
                <div class="col"><img src="./images/IMG-20221012-WA0016.jpg" alt="" height="80px" width="100px"></div>
                <div class="col">BAYA</div>
                <div class="col">1000 fcfa</div>
                <div class="col">
                    <select name="" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col d-flex">
                    <div class="row-6">Modifier</div>
                    <div class="row-6">Supprimer</div>
                </div>
            </div>
            <div class="row ligne">
                <div class="col"><img src="./images/IMG-20221012-WA0016.jpg" alt="" height="80px" width="100px"></div>
                <div class="col">BAYA</div>
                <div class="col">1000 fcfa</div>
                <div class="col">
                    <select name="" id="" >
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col d-flex">
                    <div class="row-6">Modifier</div>
                    <div class="row-6">Supprimer</div>
                </div>
            </div>
            <div class="row ligne">
                <div class="col"><img src="./images/IMG-20221012-WA0016.jpg" alt="" height="80px" width="100px"></div>
                <div class="col">BAYA</div>
                <div class="col">1000 fcfa</div>
                <div class="col">
                    <select name="" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <div class="col d-flex">
                    <div class="row-6">Modifier</div>
                    <div class="row-6">Supprimer</div>
                </div>
            </div>
            <div class="row total">
                <p>Total :<span>  100 000 Fcfa</span></p>
            </div>
        </div>

        <div class="btn_cmd">
            <a href="">Commander</a>
        </div>
    </section>

 <?php require('footer.php');?>

 <?php
 //suppresion
 if(isset($_GET['del']))
 {
    $id_del = $_GET['del'];
    unset($_SESSION['panier'][$id_del]);
 }
 ?>