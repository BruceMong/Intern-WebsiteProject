<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Recherche d\'utilisateur';

// On détermine sur quelle page on se trouve
if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}

if ($_SESSION['droits'][0]->rechercher_compte_etudiant() != 1) {
    header('Location:' . URL . 'error');
}

$modelUtilisateur = new ModelUtilisateur($bdd);
$nbArticle = $modelUtilisateur->countUtilisateur();
$parPage = 5;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;

if (isset($_POST['trierPar']))
    $utilisateurs = $modelUtilisateur->getUtilisateurPaginationOrderBy($_POST['trierPar'], $premier, $parPage);
else
    $utilisateurs = $modelUtilisateur->getUtilisateurPagination($premier, $parPage);


$modelProfil = new ModelProfil($bdd);
$modelPromotion = new ModelPromotion($bdd);
$modelDroit = new ModelDroit($bdd);

require_once('views/viewSearchUtilisateur.php');
