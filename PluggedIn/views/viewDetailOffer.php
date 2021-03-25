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
        </div>
        <div class="bouton_crud">
            <div class="detail_aside">
                <form action="" method="post">
                    <input type="button" value="Ajouter à la wish-list">
                </form>
                <form action="" method="post">
                    <input type="button" value="Postuler à l'offre    ">
                </form>
            </div>

            <div class="detail_modif">

                <form action="" method="post">
                    <input type="button" class="buttonmodif" href="#" onclick="show('popupmodif')" value="Modifier">
                    <div class="popupmodif" id="popupmodif">
                        <img src="<?= $entreprise->image() ?>" alt="image entreprise" width="50px" height="50px">
                        <h3>Nom de l'entreprise : <?= $entreprise->nom() ?></h3>
                        <br>
                        <h4>Informations sur l'offre</h4> <br>
                        <p>Durée du stage : <input type="text" value="<?= $offer->duree_stage() ?>"></p>
                        <p>Nombres de places offertes : <input type="text" value="<?= $offer->nombre_place() ?>"></p>
                        <p>Base de rémunération : <input type="text" value="<?= $offer->base_remuneration() ?>"></p>
                        <p>Date de l'offre : <input type="text" value="<?php $offer->date() ?>"></p>
                        <p>Typesde promotions concernées : <input type="text" value="<?= $offer->type_promo_concerne() ?>"></p>
                        <br>
                        <h4>Compétences requises : </h4>
                        <div class="detail_modif_competence"><input type="text" value="<?= $offer->competences() ?>">
                            <a href="#" onclick="hide('popupmodif')">Annuler</a>
                            <a href="#" onclick="hide('popupmodif')">Confirmer</a>
                </div>

                    </div>
                </form>

                <form action="" method="post">
                    <input type="button" class="buttonsupp" href="#" onclick="show('popup')" value="Supprimer">
                    <div class="popup" id="popup">
                        <h3>Vous êtes sûr de modifier?</h3>
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

        <div class="detail_stats">
            <h2>Informations sur l'offre</h2> <br>
            <p>Durée du stage : </p> <?= $offer->duree_stage() ?>
            <p>Nombres de places offertes : </p><?= $offer->nombre_place() ?>
            <p>Base de rémunération : </p><?= $offer->base_remuneration() ?>
            <p>Date de l'offre : </p><?php $offer->date() ?>
            <p>Typesde promotions concernées : </p>"<?= $offer->type_promo_concerne() ?>

        </div>
        <div class="detail_competence">
            <h2>Compétences requises : </h2>
            <?= $offer->competences() ?>

        </div>

    </div>
</div>
<?php require_once('views/footer.php'); ?>