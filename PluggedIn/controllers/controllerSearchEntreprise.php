<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();


$modelEntreprise = new ModelEntreprise($bdd);
$entreprises = $modelEntreprise->getEntreprises();

$t = 'Recherche d\'entreprise';

require_once('views/viewSearchEntreprise.php');
