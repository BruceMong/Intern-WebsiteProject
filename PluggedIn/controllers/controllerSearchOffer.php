<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Recherche d\'offre';

$modelOffer = new ModelOffer($bdd);
$offers = $modelOffer->getOffers();


$nbArticle = $modelOffer->CountOffers();
$parArticle = 10;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;

require_once('views/viewSearchOffer.php');
