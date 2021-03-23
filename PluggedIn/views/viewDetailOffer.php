<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>

<div class=bloc_page>
    <div class="detail_container">



        <div class="detail_presentation">
            <img src="<?= $entreprise->image() ?>" alt="image entreprise" width="100px" height="100px">
            <h2>Nom de l'entreprise: <?= $entreprise->nom() ?></h2>
            <p>Secteur d'activité : <?= $entreprise->secteur_activite() ?></p>
            <p>Localité: <?= $offer->localite() ?></p>
            <p>Nombres d'étudiants CESI déjà acceptés en stage: <?= $entreprise->nombre_stagiaire_cesi() ?></p>
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
                    <input type="button" value="Supprimer">
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