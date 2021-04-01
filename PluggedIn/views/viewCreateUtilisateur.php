<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <form action="createUtilisateur" method="post">
                <h2>Nom : <input name=nom type="text"> </h2>
                <h2>Prénom : <input name=prenom type="text"></h2>
                <p>Login : <input name=login type="text"></p>
                <p>Promo :
                    <select name="promotion">
                        <?php foreach ($promotions as $promoSelect) : ?>
                            <option value="<?= $promoSelect->libelle() ?>"><?= $promoSelect->libelle() ?></option>
                        <?php endforeach; ?>
                    </select>
                </p>
                <p>Centre : <input name=centre type="text"></p>
                <p> Role: <select name="role">
                        <option value="Etudiant">Etudiant</option>
                        <option value="Pilote">Pilote</option>                     
                    </select>
                <p>Mot de passe : <input name=mot_de_passe type="text"></p>
        </div>
        <div class="bouton_crud">
            <div class="detail_modif">

                <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Créer">
                <div class="popup" id="popup">
                    <h3>Vous êtes sûr de Créer?</h3>
                    <center>
                        <button class="form-btn" type="submit" name=create value="" onclick="hide('popupmodif')">Confirmer</button>
                        <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popupmodif')">Annuler</button>
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
</div>
<?php require_once('views/footer.php'); ?>