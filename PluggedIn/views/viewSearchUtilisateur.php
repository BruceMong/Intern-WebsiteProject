<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <a class="login" href="createOffer">
            <input type="button" value="Creer une Offre">
        </a>

    </header>


    <div class="offer-container">


        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <form action="detailUtilisateur" method="post">
                <button type="submit" class="button_to_detail" name="id" value="1">
                    <div class="offer" style="height: 200;">
 
                        <p>Nom : <?= $utilisateur->nom() ?> </p>
                        <p>Prénom : <?= $utilisateur->prenom() ?></p>
                        <p>Login : <?= $utilisateur->login() ?> </p>
                        <p>Promo : <?=  $promotion->getPromotion($utilisateur->id_users())->libelle()    ?>  </p>
                        <p>Centre : <?= $utilisateur->centre() ?> </p> 
                        <p>Role :   <?= $profil->libelle() ?> </p>

                    </div>
                </button>
            </form>
        <?php endforeach; ?>
    </div>

    <nav>
        <ul class="pagination">
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
        </ul>
    </nav>


</div>



<?php require_once('views/footer.php'); ?>