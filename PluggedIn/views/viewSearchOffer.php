<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <?php if ($_SESSION['droits'][0]->creer_offre() == 1) { ?>
            <a class="login" href="createOffer">
                <input type="button" value="Créer une Offre">
            </a>
        <?php }; ?>

        <p> trier par :
        <form action="searchOffer" method="post">
            <select name="trierPar">
                <option value="competences">Compétences</option>
                <option value="type_promo_concerne">Entreprise</option>
                <option value="login">Promo concernées</option>
                <option value="duree_stage">Durée du stage</option>
                <option value="duree_offre">Durée de l'offre</option>
                <option value="base_remuneration">Base rémunération</option>
                <option value="nombre_place">Nombre place</option>
                <option value="date">Date</option>
            </select>
            </p>
            <button type="submit" class="button_to_detail"> Valider </button>

        </form>

    </header>


    <div class="article-container">
        <?php foreach ($offers as $offer) : ?>
            <form action="detailOffer" method="post">
                <button type="submit" class="button_to_detail" name="id" value="<?= $offer->id_offre() ?>">
                    <div class="offer" style="height: 200;">
                        <img src="https://yt3.ggpht.com/ytc/AAUvwniJcudFBvjhncQ4O0DaTopCR9eFqPV6hoGGZsVl4A=s900-c-k-c0x00ffffff-no-rj" alt="Error" class="img-offer">
                        <p>Nom de l'entreprise<br><?= $offer->entreprise() ?></p>
                        <p>Compétences requises <br><?= $offer->competences() ?></p>
                        <p>Type de promotions concernées <br><?= $offer->type_promo_concerne() ?></p>
                        <p>Durée du stage <br><?= $offer->duree_stage() ?></p>
                        <p>Nombres de places offertes <br><?= $offer->nombre_place() ?></p>
                        <p>Base de rémunération<br><?= $offer->base_remuneration() ?></p>
                        <p>Date de l'offre <br><?= $offer->date() ?></p>
                    </div>
                </button>
            </form>
        <?php endforeach; ?>
    </div>



    <nav class="nav_pagination">
        <ul class="pagination">
            <form action="searchOffer" method="post" class="form_pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <button type="submit" class="page-link" name="page" value="<?= $currentPage - 1 ?>"> Précédente </button>
                </li>
                <?php for ($page = 1; $page <= $pages; $page++) : ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <button type="submit" class="page-link" name="page" value="<?= $page ?>"> <?= $page ?> </button>
                    </li>
                <?php endfor ?>
                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <button type="submit" class="page-link" name="page" value="<?= $currentPage + 1 ?>"> Suivant </button>
                </li>
            </form>
        </ul>
    </nav>


</div>



<?php require_once('views/footer.php'); ?>