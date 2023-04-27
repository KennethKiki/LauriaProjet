<?php session_start();?>
<?php include_once('header.php'); ?>        
           <div class="form_content container justify-content-center mt-5 mb-5">
                <form action="" method="post">
                    <div class="row ligne_form mb-4">
                        <div class="col"><input type="text" name="id" placeholder="Nom prénom" id="" value="<?php if(!empty($_SESSION['id'])){ echo $_SESSION['id'];}?>"></div>
                    </div>
                    <div class="row ligne_form mb-4">
                        <div class="col"><input type="email" name="email" placeholder="nom@gmail.com" id=""></div>
                    </div>
                    <div class="row  mb-4">
                        <div class="col-4"><input type="number" name="num" id="" value="<?php if(!empty($_SESSION['num'])){ echo $_SESSION['num'];}?>"></div>
                        <div class="col-4"><input type="text" name="qtier" placeholder="Votre quatier" id="" value="<?php if(!empty($_SESSION['qtier'])){ echo $_SESSION['qtier'];}?>"></div>
                        <div class="col-4">
                            <select class="" name="ville">
                                <option value="Calavi">Calavi</option>
                                <option value="Cotonou">Cotonou</option>
                                <option value="Porto-Novo">Porto-Novo</option>
                            </select>
                        </div>
                       
                    </div>
                    <div class="row btn_ctn p-3">
                        <a type="submit" name="send" class="mybtn">Continuer</a>
                    </div>
                </form>
            </div>
<?php include_once('footer.php'); ?> 

