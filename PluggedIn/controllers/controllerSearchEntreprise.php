<?php
$t = 'Recherche d\'entreprise';

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

$entreprises = $modelEntreprise->getEntreprisesPagination($premier, $parPage);


require_once('views/viewSearchEntreprise.php');
