<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Recherche d\'utilisateur';

$modelUtilisateur = new ModelUtilisateur($bdd);
$utilisateur = $modelUtilisateur->getUtilisateur("Bruce.Mongthe");

$modelProfil = new ModelProfil($bdd);
$profil = $modelProfil->getProfil($utilisateur->id_profil());

$modelPromotion = new ModelPromotion($bdd);
$promotion = $modelPromotion->getPromotion($utilisateur->id_promotion());

$modelDroit = new ModelDroit($bdd);
$droit = $modelDroit->getDroit($utilisateur->id_users());




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
