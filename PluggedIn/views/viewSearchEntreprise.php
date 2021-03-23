<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <a class="login" href="CreateOffer">
            <input type="button" value="Creer une Entreprise">
        </a>

    </header>

    <div class="offer-container" style="overflow-y: scroll; height:1000px;">





        <?php foreach ($entreprises as $entreprise) : ?>
            <div class="offer" style="height: 200;">
                <p>Nom:<br><?= $entreprise->nom() ?></p>
                <p>Secteur d'activite: <br><?= $entreprise->secteur_activite() ?></p>
                <p>Nombre stagiaire Cesi: <br><?= $entreprise->nombre_stagiaire_cesi() ?></p>
                <p>Confiance Pilote: <br><?= $entreprise->confiance_pilote() ?></p>
                <p>Localité: <br><?= $entreprise->localite() ?></p>
                <p>Evaluation Entreprise: <br><?= $entreprise->evaluation_entreprise() ?></p>
                <img src="<?= $entreprise->image() ?>" width="100px" height="100px">
                <a href="index"><span class="linkContent"> </span> </a>
            </div>
        <?php endforeach; ?>




    </div>

</div>


<?php require_once('views/footer.php'); ?>