<?php
session_start();
// JE VÉRIFIE QUE L'ADMINISTRATEUR EST BIEN AUTHENTIFIÉ
if (empty($_SESSION['admin']))
    header('Location:' . URL . 'login');

$modelArticle = new ModelArticle($bdd);

// JE VÉRIFIE SI UN ARTICLE EST POSTÉ
if (!empty($_POST)) {
    extract($_POST);
    $errors = array();
    // JE SÉCURISE LES DONNÉES
    $title = strip_tags($title);
    $content = strip_tags($content);

    if (empty($title))
        array_push($errors, 'Entrez un titre');

    if (empty($content))
        array_push($errors, 'Entrez du contenu');

    if (!empty($content) && strlen($content) < 15)
        array_push($errors, '15 caractères minimum...');

    // SI TOUT EST OK, L'ARTICLE EST AJOUTÉ EN BDD
    if (count($errors) == 0) {
        $art = new Article(array('title' => $title, 'content' => $content));

        $modelArticle->addArticle($art);

        $success = 'Votre article a bien été publié';

        unset($title);
        unset($content);
    }
}

$t = 'Ajouter';

require_once('views/viewAjouter.php');
