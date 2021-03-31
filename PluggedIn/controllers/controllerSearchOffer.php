<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Recherche d\'offre';


if ($_SESSION['droits'][0]->rechercher_offre() != 1) {
    header('Location:' . URL . 'error');
}


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



if (isset($trierPar)) {
    $trierPar = strip_tags($_POST['trierPar']);
    $offers = $modelOffer->getOffersPagination($trierPar, $premier, $parPage);
} else
    $offers = $modelOffer->getOffersPagination($premier, $parPage);


require_once('views/viewSearchOffer.php');
