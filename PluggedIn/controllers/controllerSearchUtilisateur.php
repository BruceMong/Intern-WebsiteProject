<?php

$t = 'Recherche d\'utilisateur';

// On détermine sur quelle page on se trouve
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}

$modelUtilisateur = new ModelUtilisateur($bdd);
$nbArticle = $modelUtilisateur->countUtilisateur();
$parPage = 5;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;


//$utilisateurs = $modelUtilisateur->getUtilisateurs();
$utilisateurs = $modelUtilisateur->getUtilisateurPagination($premier, $parPage);

$modelProfil = new ModelProfil($bdd);
//$profil = $modelProfil->getProfil($utilisateur->id_profil());

$modelPromotion = new ModelPromotion($bdd);
//$promotion = $modelPromotion->getPromotion($utilisateur->id_promotion());

$modelDroit = new ModelDroit($bdd);
//$droit = $modelDroit->getDroit($utilisateur->id_users());








require_once('views/viewSearchUtilisateur.php');
