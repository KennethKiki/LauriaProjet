<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="dist\css\bootstrap.min.css">
        <link rel="stylesheet" href="assets\vendor\bootstrap-icons\bootstrap-icons.css">
        <title>Accueil</title>
    </head>
    <body>
        <!--A J O U T-->
        <div class="content">
            <div class="content-title">
                <h3>Ajouter un produit</h3>
            </div>
            <div class="content-body">
                <form action="traitement.php" method="post" enctype="multipart/form-data">
                    <input type="text" class="form-label" placeholder="Désignation" name="designation" required> <br>
                    <select name="categorie" id="">
                        <option value="" hidden>Choisir</option>
                        <option value="Bracelet">Bracelet</option>
                        <option value="Baya">Baya</option>
                        <option value="Chevillère">Chevillère</option>
                    </select><br>
                    <input type="file" name="img" id=""> <br>
                    <input type="number" class="form-label" placeholder="Prix" name="prix" required> <br>
                    <textarea name="descriptions" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="Ajouer" name="ajouer">
                </form>
            </div>
        </div>
        <div>
            <h4><a href="index.php">Retour</a></h4>
        </div>
    </body>
</html>