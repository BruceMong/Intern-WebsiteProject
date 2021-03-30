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
            <p><?= $entreprise->confiance_pilote() ?></p>
        </div>
        <div class="bouton_crud">
            <div class="detail_aside">
                <form action="detailOffer" method="post">
                    <input type="text" name=id value="<?= $offer->id_offre() ?>" class=hideElement />
                    <center>
                        <?php
                        if ($modelWish_list->checkWish_list($_SESSION['utilisateur'], $offer->id_offre()))
                            echo '<button type="submit" name=wish_listP value=delete >Retirer de la wish-list</button>';
                        else
                            echo '<button type="submit" name=wish_listP  value=add >Ajouter a la wish-list</button>';
                        ?>
                    </center>
                </form>
                <form action="" method="post">
                    <center>
                        <input type="button" value="Postuler à l'offre    ">
                    </center>
                </form>
            </div>

            <div class="detail_modif">

                <form action="detailOffer" method="post">
                    <center>
                        <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    </center>
                    <div class="popupmodif" id="popupmodif">
                        <p>Nom de l'entreprise :</p>
                        <select name="entreprise">
                            <?php foreach ($entreprises as $entSelect) : ?>
                                <option value="<?= $entSelect->nom() ?>"><?= $entSelect->nom() ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p>Durée du stage (nb semaine): <input name=duree_stage type="text" value="<?= $offer->duree_stage() ?>"></p>
                        <p>Durée de l'offre (nb semaine): <input name=duree_offre type="text" value="<?= $offer->duree_offre() ?>"></p>
                        <p>Nombres de places offertes : <input name=nombre_place type="text" value="<?= $offer->nombre_place() ?>"></p>
                        <p>Base de rémunération : <input name=base_remuneration type="text" value="<?= $offer->base_remuneration() ?>"></p>
                        <p>Date de l'offre (YYYY-MM-DD) : <input name=date type="text" value="<?= $offer->date() ?>"></p> <br>
                        <p>Types de promotions concernées : </p> <select name="type_promo_concerne">
                            <?php foreach ($promotions as $promoSelect) : ?>
                                <option value="<?= $promoSelect->libelle() ?>"><?= $promoSelect->libelle() ?></option>
                            <?php endforeach; ?>
                        </select>

                        <p>Compétences requises : </p>
                        <div class=""><input name=competences type="text" value="<?= $offer->competences() ?>">


                            <input type="text" name=modif class=hideElement value="">
                            <center>
                                <button class="form-btn" type="submit" onclick="hide('popupmodif')">Confirmer</button>
                                <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popupmodif')">Annuler</button>
                            </center>
                        </div>

                    </div>
                </form>

                <form action="detailOffer" method="post">
                    <center>
                        <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Supprimer">
                    </center>
                    <div class="popup" id="popup">
                        <h3>Vous êtes sûr de supprimer?</h3>
                        <input type="text" name=delete class=hideElement value="">
                        <center>
                            <button class="form-btn" type="submit" name=id value="<?= $offer->id_offre() ?>" onclick="hide('popup')">Confirmer</button>
                            <button class="form-btn-cancel -nooutline" type="reset" onclick="hide('popup')">Annuler</button>
                        </center>
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

        <div class="detail_stats">
            <h2>Informations sur l'offre</h2> <br>
            <p>Durée du stage : </p> <?= $offer->duree_stage() ?>
            <p>Nombres de places offertes : </p><?= $offer->nombre_place() ?>
            <p>Base de rémunération : </p><?= $offer->base_remuneration() ?>
            <p>Date de l'offre : </p><?= $offer->date() ?>
            <p>Types de promotions concernées : </p><?= $offer->type_promo_concerne() ?>

        </div>
        <div class="detail_competence">
            <h2>Compétences requises : </h2>
            <?= $offer->competences() ?>

        </div>

    </div>
</div>
<?php require_once('views/footer.php'); ?>