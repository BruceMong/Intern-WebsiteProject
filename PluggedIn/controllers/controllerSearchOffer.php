<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Recherche d\'offre';

$modelOffer = new ModelOffer($bdd);
$offers = $modelOffer->getOffers();

require_once('views/viewSearchOffer.php');