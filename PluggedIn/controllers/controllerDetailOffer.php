<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Détail de l\'offre';

$modelOffer = new ModelOffer($bdd);
$offers = $modelOffer->getOffer();

require_once('views/viewDetailOffer.php');
