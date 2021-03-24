<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



    <div class="detail_presentation">
            <img src="<?= $entreprise->image() ?>" alt="image entreprise" width="100px" height="100px">
            <h2>Nom de l'entreprise: </h2> <input type="text" class="info_modif" value="<?= $entreprise->nom() ?>">
            <p>Secteur d'activité : </p> <input type="text" class="info_modif" value="<?= $entreprise->secteur_activite() ?>">
            <p>Nombres d'étudiants CESI déjà acceptés en stage: </p> <input type="text" class="info_modif" value="<?= $entreprise->nombre_stagiaire_cesi() ?>">
        </div>
        <div class="bouton_crud">
            <div class="detail_aside">
                <form action="" method="post">
                    <input type="button" value="Ajouter à la wish-list">
                </form>
                <form action="" method="post">
                    <input type="button" value="Postuler à l'offre    ">
                    < </form>
            </div>

            <div class="detail_modif">

                <form action="" method="post">
                    <input type="button" value="Modifier">
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
            <p>Durée du stage : <?= $offer->duree_stage() ?></p>
            <p>Nombres de places offertes : <?= $offer->nombre_place() ?> </p>
            <p>Base de rémunération : <?= $offer->base_remuneration() ?></p>
            <p>Date de l'offre : <?php $offer->date() ?> </p>
            <p>Typesde promotions concernées : <?= $offer->type_promo_concerne() ?></p>

        </div>
        <div class="detail_competence">
            <h2>Compétences requises : </h2>
            <?= $offer->competences() ?>
        </div>

    </div>
</div>
<?php require_once('views/footer.php'); ?>