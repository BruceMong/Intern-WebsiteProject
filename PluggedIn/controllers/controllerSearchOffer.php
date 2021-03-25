<?php

$t = 'Recherche d\'offre';


// On détermine sur quelle page on se trouve
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

require_once('views/viewSearchOffer.php');
