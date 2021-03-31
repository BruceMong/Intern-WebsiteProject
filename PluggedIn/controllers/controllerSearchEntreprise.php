<?php
session_start();
if (empty($_SESSION['utilisateur']))
    header('Location:' . URL . 'login');

$t = 'Recherche d\'entreprise';



if ($_SESSION['droits'][0]->rechercher_entreprise() != 1) {
    header('Location:' . URL . 'error');
}





if (isset($_POST['page']) && !empty($_POST['page'])) {
    $currentPage = (int) strip_tags($_POST['page']);
} else {
    $currentPage = 1;
}


$modelEntreprise = new ModelEntreprise($bdd);
$nbArticle = $modelEntreprise->countEntreprises();
$parPage = 5;
$pages = ceil($nbArticle / $parPage);

$premier = ($currentPage * $parPage) - $parPage;


if (isset($_POST['trierPar']))
    $entreprises = $modelEntreprise->getEntreprisesPaginationOrderBy($_POST['trierPar'], $premier, $parPage);
else
    $entreprises = $modelEntreprise->getEntreprisesPagination($premier, $parPage);


require_once('views/viewSearchEntreprise.php');
