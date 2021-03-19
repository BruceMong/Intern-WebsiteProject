<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if(empty($_SESSION['admin']))
    header('Location:'.URL.'login');

 $modelArticle = new ModelArticle($bdd);
 $modelComment = new ModelComment($bdd);

// JE VÉRIFIE SI UN ÉPISODE EST SUPPRIMÉ
if(!empty($_POST['delete']))
{
    extract($_POST);    
    
    $modelArticle->deleteArticle($art);

    $success = 'Votre article à bien été supprimé !';     
}

// JE RÉCUPÈRE LA LISTE DE TOUS LES ARTICLES
$articles = $modelArticle->getArticles();

// JE COMPTE LE NOMBRE DE COMMENTAIRES SIGNALÉS
$alertComments = $modelComment->countAlertComments();

$t = 'Admin';

require_once('views/viewAdmin.php');