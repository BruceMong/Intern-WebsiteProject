<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Détail de l\'offre';

$modelEntreprise = new ModelEntreprise($bdd);
$modelOffer = new ModelOffer($bdd);
$offer = $modelOffer->getOffer($_POST['id']);
$entreprise = $modelEntreprise->getEntrepriseByName( $offer->entreprise());

require_once('views/viewDetailOffer.php');
