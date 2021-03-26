<?php
// CRÉATION DE L'OBJET MANAGER
// $modelArticle = new ModelArticle($bdd);

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
//$articles = $modelArticle->getArticles();

$t = 'Détail de l\'entreprise';

$modelEntreprise = new ModelEntreprise($bdd);
$entreprise = $modelEntreprise->getEntreprise($_POST['id']);

require_once('views/viewDetailEntreprise.php');
