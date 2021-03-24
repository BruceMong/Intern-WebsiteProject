<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Recherche d\'offre';

$modelOffer = new ModelOffer($bdd);
$offers = $modelOffer->getOffers();


// On détermine sur quelle page on se trouve
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}


$nbArticle = $modelOffer->CountOffers();
$parPage = 10;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;

require_once('views/viewSearchOffer.php');
