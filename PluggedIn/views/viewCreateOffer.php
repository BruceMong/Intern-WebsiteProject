<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container_creer">


        <form action="createOffer" method="post">
            <div class="detail_presentation">
                <h2>Nom de l'entreprise: </h2>
                <select name="entreprise">
                    <?php foreach ($entreprises as $entreprise) : ?>
                        <option value="<?= $entreprise->nom() ?>"><?= $entreprise->nom() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="detail_stats">
                <h2>Informations sur l'offre</h2> <br>
                <p>Durée du stage : </p> <input name=duree_stage type="text" class="info_modif" value="">
                <p>Durée de l'offre : </p> <input name=duree_offre type="text" class="info_modif" value="">
                <p>Nombres de places offertes : </p><input name=nombre_place type="text" class="info_modif" value="">
                <p>Base de rémunération : </p><input name=base_remuneration type="text" class="info_modif" value="">
                <p>Date de l'offre : </p><input name=date type="text" class="info_modif" value="">
                <p>Types de promotions concernées : </p>
                <select name="type_promo_concerne">
                    <?php foreach ($promotions as $promoSelect) : ?>
                        <option value="<?= $promoSelect->libelle() ?>"><?= $promoSelect->libelle() ?></option>
                    <?php endforeach; ?>
                </select>

            </div>
            <div class="detail_competence">
                <h2>Compétences requises : </h2>
                <input name="competences" type="text" class="info_modif" value="">

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


                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once('views/footer.php'); ?>