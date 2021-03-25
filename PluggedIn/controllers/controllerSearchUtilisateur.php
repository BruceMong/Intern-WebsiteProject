<?php

$t = 'Recherche d\'utilisateur';


if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}


$modelOffer = new ModelOffer($bdd);
$nbArticle = $modelOffer->countOffers();
$parPage = 5;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;


$offers = $modelOffer->getOffersPagination($premier, $parPage);





require_once('views/viewSearchUtilisateur.php');
