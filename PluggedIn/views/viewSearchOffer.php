
<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class = bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <a class="login" href="CreateOffer">
            <input type="button" value="Creer une Offre">
        </a>

    </header>

    <div class="offer-container" style="overflow-y: scroll; height:1000px;">




        <?php foreach($offers as $offer): ?>
        <div class="offer" style="height: 200;">
            <img src="https://yt3.ggpht.com/ytc/AAUvwniJcudFBvjhncQ4O0DaTopCR9eFqPV6hoGGZsVl4A=s900-c-k-c0x00ffffff-no-rj" alt="Error" class="img-offer">
            <p>Nom de l'entreprise<br><?= $offer->entreprise()?></p>
            <p>Localité: <br><?= $offer->localite()?></p>
            <p>Compétences requises <br><?= $offer->competences()?></p>
            <p>Type de promotions concernées <br><?= $offer->type_promo_concerne()?></p>
            <p>Durée du stage <br><?= $offer->duree_stage()?></p>
            <p>Nombres de places offertes <br><?= $offer->nombre_place()?></p>
            <p>Base de rémunération<br><?= $offer->base_remuneration()?></p>
            <p>Date de l'offre <br> ?</p>


            <a href="index"><span class="linkContent"> </span> </a>
        </div>
    <?php endforeach; ?>

    </div>
</div>


<?php require_once('views/footer.php'); ?>