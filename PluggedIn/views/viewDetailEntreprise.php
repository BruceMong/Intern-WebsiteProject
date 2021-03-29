<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">

        <div class="detail_presentation">
            <img src="<?= $entreprise->image() ?>" alt="image entreprise" width="100px" height="100px">
            <h2>Nom de l'entreprise: </h2>
            <h3><?= $entreprise->nom() ?></h3>
            <p>Secteur d'activité : </p>
            <p><?= $entreprise->secteur_activite() ?></p>
            <p>Nombres d'étudiants CESI déjà acceptés en stage: </p>
            <p><?= $entreprise->nombre_stagiaire_cesi() ?></p>
            <p>Contact Entreprise: </p>
            <p><?= $entreprise->mail() ?></p>
            <p>Localité: </p>
            <p><?= $entreprise->localite() ?></p>
            <p>Confiance Pilote: </p>
            <p><?= $entreprise->confiance_pilote() ?></p>
            <p>Evaluation Entreprise: </p>
            <p><?= $entreprise->evaluation_entreprise() ?></p>
        </div>
        <div class="bouton_crud">


            <div class="detail_modif">

                <form action="detailEntreprise" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">

                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <p>Nom entreprise : <input name="nom" type="text" value="<?= $entreprise->nom() ?>"> </p>
                        <br>
                        <p>Secteur d'activité :<input name="secteur_activite" type="text" value="<?= $entreprise->secteur_activite() ?>"> </p>
                        <p>Localité :<input name="localite" type="text" value="<?= $entreprise->localite() ?>"> </p>
                        <p>Nombre stagiaires CESI : <input name="nombre_stagiaire_cesi" type="text" value="<?= $entreprise->nombre_stagiaire_cesi() ?>"> </p>
                        <p>Evaluation entreprise : <input name="evaluation_entreprise" type="text" value="<?= $entreprise->evaluation_entreprise() ?>"></p>
                        <p>Confiance Pilote: <input name="confiance_pilote" type="text" value="<?= $entreprise->confiance_pilote() ?>"></p>
                        <p>Contact entreprise : <input name="mail" type="text" value="<?= $entreprise->mail() ?>"></p>
                        <p>image :<input name="image" type="text" value="<?= $entreprise->image() ?>"> </p>

                        <input type="text" name=modif class=hideElement value="">
                        <center style="margin-top: -15px;">
                            <button class="form-btn" type="submit" name=id value="<?= $entreprise->id_entreprise() ?>" onclick="hide('popupmodif')">Confirmer</button>
                            <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popupmodif')">Annuler</button>
                        </center>
                    </div>

            </div>
            </form>
        </div>

        <form action="detailEntreprise" method="post">
            <center>
                <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Supprimer">
            </center>
            <div class="popup" id="popup">
                <h3>Vous êtes sûr de supprimer?</h3>
                <center>
                    <input type="text" name=delete class=hideElement value="">
                    <button class="form-btn" type="submit" name=id value="<?= $entreprise->id_entreprise() ?>" onclick="hide('popupmodif')">Confirmer</button>
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
<?php require_once('views/footer.php'); ?>