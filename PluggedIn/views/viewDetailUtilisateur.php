<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>
<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="" alt="">
            <h2>Nom : <?= $utilisateur->nom() ?> Prénom : <?= $utilisateur->prenom() ?> </h2>
            <br>
            <p>Login : <?= $utilisateur->login() ?> </p>
            <p>Promotion : <?php $promoUtil = $modelPromotion->getPromotion($utilisateur->id_promotion()); echo $promoUtil->libelle();   ?></p>
            <p>Centre de formation : <?= $utilisateur->centre() ?> </p>
            <p>Role :<?php $profilUtil = $modelProfil->getProfil($utilisateur->id_profil()); echo $profilUtil->libelle()  ?> </p>

        </div>
        <div class="bouton_crud">


            <div class="detail_modif">

                <form action="" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <h3>Nom : <input type="text" value=""></h3>
                        <h3>Prénom : <input type="text" value=""></h3>
                        <p>Login : <input type="text" value=""></p>
                        <br>
                        <p>Promotion : <input type="text" value=""></p>
                        <br>
                        <p>Centre de formation : <input type="text" value=""></p>
                        <br>
                        <p>Role : <input type="text" value=""></p>
                        <center style="margin-top: 130px;">
                            <a href="#" onclick="hide('popupmodif')">Annuler</a>
                            <a href="#" onclick="hide('popupmodif')">Confirmer</a>
                        </center>
                    </div>

            </div>
            </form>

            <form action="" method="post">
                <center>
                    <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Supprimer">
                </center>
                <div class="popup" id="popup">
                    <h3>Vous êtes sûr de supprimer?</h3>
                    <center>
                        <a href="#" onclick="hide('popup')">Annuler</a>
                        <a href="#" onclick="hide('popup')">Confirmer</a>
                    </center>
                </div>

                <script>
                    $ = function(id) {
                        return document.getElementById(id);
                    }

                    var show = function(id) {
                        $(id).style.display = 'block';
                    }
                    var hide = function(id) {
                        $(id).style.display = 'none';
                    }
                </script>
            </form>
        </div>
    </div>

</div>
<?php require_once('views/footer.php'); ?>