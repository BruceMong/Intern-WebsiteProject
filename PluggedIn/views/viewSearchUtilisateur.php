<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <a class="login" href="createUtilisateur">
            <input type="button" value="Creer un utilisateur">
        </a>

    </header>

    <div class="article-container">   
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <form action="detailUtilisateur" method="post">
                <button type="submit" class="button_to_detail" name="id" value="1">
                    <div class="article_box" style="height: 200;">
                        <p>Nom : <?= $utilisateur->nom() ?> </p>
                        <p>Prénom : <?= $utilisateur->prenom() ?></p>
                        <p>Login : <?= $utilisateur->login() ?> </p>
                        <p>Promo : <?php $promoUtil = $modelPromotion->getPromotion($utilisateur->id_promotion()); echo $promoUtil->libelle();   ?>  </p>
                        <p>Centre : <?= $utilisateur->centre() ?> </p> 
                        <p>Role :   <?php $profilUtil = $modelProfil->getProfil($utilisateur->id_profil()); echo $profilUtil->libelle()  ?> </p>
                    </div>
                </button>
            </form>
        <?php endforeach; ?>
    </div>

    <nav class="nav_pagination">
        <ul class="pagination">
        <form action="searchUtilisateur" method="post" class = "form_pagination">
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