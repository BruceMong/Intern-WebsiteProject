<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <?php if($_SESSION['droits'][0]->creer_entreprise() == 1){?>
            <a class="login" href="createEntreprise">
            <input type="button" value="Créer une Entreprise">
        </a>
        <?php };?>
        

        <form action="searchEntreprise" method="post">
            <select name="trierPar">
                <option value="nom">nom</option>
                <option value="secteur_activite">secteur_activite</option>
                <option value="nombre_stagiaire_cesi">nombre_stagiaire_cesi</option>
                <option value="confiance_pilote">confiance_pilote</option>
                <option value="evaluation_entreprise">evaluation_entreprise</option>
                <option value="image">image</option>
                <option value="localite">localite</option>
                <option value="mail">mail</option>
            </select>
            </p>
            <button type="submit" class="button_to_detail"> Valider </button>

        </form>

    </header>

    <div class="article-container">
        <?php foreach ($entreprises as $entreprise) : ?>
            <form action="detailEntreprise" method="post">
                <button type="submit" class="button_to_detail" name="id" value=<?= $entreprise->id_entreprise() ?>>
                    <div class="offer" style="height: 200;">
                        <p>Nom:<br><?= $entreprise->nom() ?></p>
                        <p>Secteur d'activite: <br><?= $entreprise->secteur_activite() ?></p>
                        <p>Nombre stagiaire Cesi: <br><?= $entreprise->nombre_stagiaire_cesi() ?></p>
                        <p>Confiance Pilote: <br><?= $entreprise->confiance_pilote() ?></p>
                        <p>Localité: <br><?= $entreprise->localite() ?></p>
                        <p>Evaluation Entreprise: <br><?= $entreprise->evaluation_entreprise() ?></p>
                        <p>Contact Entreprise: <br><?= $entreprise->mail() ?></p>
                        <img src="<?= $entreprise->image() ?>" width="100px" height="100px">
                    </div>
                </button>
            </form>
        <?php endforeach; ?>
    </div>


    <nav class="nav_pagination">
        <ul class="pagination">
            <form action="searchEntreprise" method="post" class="form_pagination">
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