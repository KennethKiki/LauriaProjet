<?php session_start(); ?>
<?php require 'header.php'; ?>
    
    <div class="form container">
        <form action="" method="post">
            
            <div class="row">
                <div class="col-md-6"><label for="">Prénom*</label><input type="text"></div>
                <div class="col-md-6"><label for="">Nom*</label><input type="text"></div>
            </div>
            <div class="row">
                <div class="col-md-6"><label for="">Numéro*</label><input type="text"></div>
                <div class="col-md-6"><label for="">Email*</label><input type="email"></div>
            </div>
            <div class="row">
                <div class="col-12"><label for="">Sujet</label><input type="text"></div>
                <div class="col-12"><label for="">Message</label><textarea name="" id=""  rows="5"></textarea></div>
                
            </div>
            
            <div class="mybtn">
                <a href="">Envoyer</a>
            </div>

        </form>
    </div>
    <?php require 'footer.php'; ?>
</body>
</html>