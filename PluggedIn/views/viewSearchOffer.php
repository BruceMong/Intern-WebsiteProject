<?php require_once('views/header.php'); ?>
<?php require_once('views/nav.php'); ?>


<div class=bloc_search>
    <header>

        <form class="search-container">
            <input type="text" id="search-bar" placeholder="Rechercher">
            <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
        </form>

        <a class="login" href="CreateOffer">
            <input type="button" value="Creer une Offre">
        </a>

    </header>

    <div class="offer-container" style="height:1000px;">

        <?php //Pagination https://raw.githubusercontent.com/simonjsuh/pagination-in-php/master/index.php

        $results_per_page = 10; //Nombre de résultats par page
        $number_results = $offer->fetchColumn(); //mysqli_num_rows($offer); //déterminer le nombre d'offres
        $number_pages = ceil($number_results / $number_pages); //Déterminer le nombres de pages qu'il va y avoir(arrondi sup)
        if (!isset($_GET['page'])) { //Déterminer la page actuelle
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
        $this_page_first_result = ($page - 1) * $results_per_page; //Determine le premier resultat qui va s'afficher sur la page
        $sql = 'SELECT * FROM alphabet LIMIT ' . $this_page_first_result . ',' .  $results_per_page; //recupérer les resultats pour page actuelle
        $con = mysqli_connect('localhost', 'root', '');
        $result = mysqli_query($con, $sql); //requete
        while ($row = mysqli_fetch_array($result)) {
            echo '<form action="detailOffer" method="post">
            <button type="submit" class="button_to_detail" name="id" value="1">
                <div class="offer" style="height: 200;">
                <img src="https://yt3.ggpht.com/ytc/AAUvwniJcudFBvjhncQ4O0DaTopCR9eFqPV6hoGGZsVl4A=s900-c-k-c0x00ffffff-no-rj" alt="Error" class="img-offer">' .
                "<p>Nom de l'entreprise<br><?= $offer->entreprise() ?></p>
                    <p>Localité: <br><?= $offer->localite() ?></p>
                    <p>Compétences requises <br><?= $offer->competences() ?></p>
                    <p>Type de promotions concernées <br><?= $offer->type_promo_concerne() ?></p>
                    <p>Durée du stage <br><?= $offer->duree_stage() ?></p>
                    <p>Nombres de places offertes <br><?= $offer->nombre_place() ?></p>
                    <p>Base de rémunération<br><?= $offer->base_remuneration() ?></p>
                    <p>Date de l'offre <br> ?</p>
                </div>
            </button>
        </form>";
        }
        for ($page=1;$page<=$number_pages;$page++) {
            echo '<a href="index.php?page=' . $page . '">' . $page . '</a> ';
          }

        ?>

    </div>
</div>


<?php require_once('views/footer.php'); ?>